<?php
include '../config/config.php';
include '../access_control.php';  // Include the access control file
session_start();

require '../phpspreadsheet/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure the user is logged in and Staff_ID is available
    if (!isset($_SESSION['Staff_ID'])) {
        echo "You must be logged in to add an event.";
        exit;
    }

    // Get logged-in Staff_ID from session
    $staff_id = $_SESSION['Staff_ID'];

    // Get and sanitize form data
    $eventType = filter_input(INPUT_POST, 'eventType', FILTER_SANITIZE_STRING);
    $eventMonth = filter_input(INPUT_POST, 'eventMonth', FILTER_VALIDATE_INT);
    $eventDay = filter_input(INPUT_POST, 'eventDay', FILTER_VALIDATE_INT);
    $eventYear = filter_input(INPUT_POST, 'eventYear', FILTER_VALIDATE_INT);
    $eventCourse = filter_input(INPUT_POST, 'eventCourse', FILTER_SANITIZE_STRING);
    $religion = filter_input(INPUT_POST, 'religion', FILTER_SANITIZE_STRING);
    $location = filter_input(INPUT_POST, 'eventLocation', FILTER_SANITIZE_STRING);

    // Check if the user has permission to add this event type
    if (!can_manage_event($eventType)) {
        echo "You do not have permission to add this type of event.";
        exit;
    }

    // Handle file upload
    $fileRef = null;
    if (isset($_FILES['excelFile']) && $_FILES['excelFile']['error'] == 0) {
        //Determine the upload folder based on the event type
        $baseUploadDir = '../Evaluation Forms/';
        $eventFolders = [
            "Retreat" => "Retreat/",
            "Recollection 01" => "Recollection 01/",
            "Recollection 02" => "Recollection 02/",
        ];

        if (array_key_exists($eventType, $eventFolders)) {
            $uploadDir = $baseUploadDir . $eventFolders[$eventType];
        } else {
            echo "Invalid event type.";
            exit;
        }

        // Ensure the directory exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileRef = $uploadDir . basename($_FILES['excelFile']['name']);

        if (!move_uploaded_file($_FILES['excelFile']['tmp_name'], $fileRef)) {
            echo "File upload failed.";
            exit;
        }

        $sql = "INSERT INTO event (Staff_ID, E_Type, E_Year, E_Month, E_Day, E_Course, E_Religion, E_Location, E_file_ref) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isiiissss", $staff_id, $eventType, $eventYear, $eventMonth, $eventDay, $eventCourse, $religion, $location, $fileRef);

        if ($stmt->execute()) {
            echo "success";
            $event_id = $conn->insert_id;

            if ($fileRef) {
                $reader = new Xlsx();
                try {
                    $spreadsheet = $reader->load($fileRef);
                    $worksheet = $spreadsheet->getActiveSheet();
                    $worksheet_arr = $worksheet->toArray();
                    
                    unset($worksheet_arr[0]);
        
                    foreach ($worksheet_arr as $row) {
                        $lastName = $row[2]; 
                        $firstName = $row[3];  
                        $studentID = $row[4]; 
                        $course = $row[5]; 
                        $gender = $row[6]; 
                        $age = $row[7]; 
                        $venue = $row[8]; 
                        $date = $row[9];
        
                        $formattedDate = date("Y-m-d", strtotime($date));
                        
                        $L1 = $row[12];
                        $L2 = $row[13];
                        $L3 = $row[14];
                        $L4 = $row[15];
                        $L5 = $row[16];
                        $L6 = $row[17];
        
                        $sql = "INSERT INTO new_events 
                        (
                        student_id,
                        Event_ID,
                        lastname, 
                        firstname, 
                        course, 
                        gender, 
                        age, 
                        venue,
                        `date`,
                        L1, L2, L3, L4, L5, L6
                        ) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param(
                            "iissssissiiiiii", 
                            $studentID, 
                            $event_id,
                            $lastName, 
                            $firstName, 
                            $course, 
                            $gender, 
                            $age, 
                            $venue,
                            $formattedDate,
                            $L1, $L2, $L3, $L4, $L5, $L6
                        );
                        $stmt->execute();
                    }
                } catch (Exception $e) {
                    echo 'Error reading file: ',  $e->getMessage();
                    exit;
                }
            }
        } else {
            echo "Error: " . $stmt->error;
        }
    }
    
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
