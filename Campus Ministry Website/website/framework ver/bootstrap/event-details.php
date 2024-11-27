<?php 
    include "config/config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Event Details</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<style>
    
</style>


<body class="sb-nav-fixed">



    <!--  nav start  -->

    <?php
    include "modules/navigation-panel.php";
    ?>

    <!-- end nav panel -->
    
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <!-- <h1 class="mt-4">Retreat</h1> -->

                <?php
                    if (isset($_GET['id'])) {
                        $eventId = $_GET['id'];
                        
                        $eventId = intval($eventId); 

                        $sql = "SELECT * FROM `event` WHERE `Event_ID` = $eventId";
                        $result = mysqli_query($conn, $sql);

                        if ($result && mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            $event_type = $row['E_Type'];
                            $event_date = $row['E_Year'] . "/" . $row['E_Month'] . "/" . $row['E_Day'];

                                echo '<h1 class="mt-4">' . $event_type . ' (' . $event_date . ')</h1>';
                        }
                    }
                ?>

                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="main-page.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Tables</li>
                </ol>
                <!-- <div class="card mb-4">
                    <div class="card-body">
                        DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                        <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                    </div>
                </div> -->

                <!-- this container is for the event details -->
                <div class="container-fluid">
                    <!--details for religion and Course in one row-->

                    <?php

                    if (isset($_GET['id'])) {
                        $eventId = $_GET['id'];
                    } else {
                    }
                    
                    $sql =  "SELECT * FROM `event` WHERE `Event_ID` = $eventId";
                    $result = mysqli_query($conn, $sql);

                    if ($result && mysqli_num_rows($result) > 0) {
                        // Fetch the row as an associative array
                        $row = mysqli_fetch_assoc($result);
                        $Religion = $row['E_Religion'];
                        $Location = $row['E_Location'];
                        $Course = $row['E_Course'];
                        $filePath = $row['E_file_ref'];
            
                        // Display the details
                        echo
                        '
                        <div class="row">
                            <div class="col-md-3">
                                <div class="input-group mb-4">
                                    <span class="input-group-text">Religion</span>
                                    <input type="text" class="form-control" value="'.$Religion.'" disabled>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-4">
                                    <span class="input-group-text">Course</span>
                                    <input type="text" class="form-control" value="'.$Course.'" disabled>
                                </div>
                            </div>
                        </div>


                        <!--details for religion and Course in one row (2)-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-5">
                                    <span class="input-group-text">Venue</span>
                                    <input type="text" class="form-control" value="'.$Location.'" disabled>
                                </div>
                            </div>
                        </div>
                        '
                        ;
                    }
                    ?>
                </div>


                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Logistics
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple1">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Course</th>
                                    <th>Gender</th>
                                    <th>Process</th>
                                    <th>Anchorperson</th>
                                    <th>Schedules</th>
                                    <th>Confession/Mass</th>
                                    <th>Venue/Facilites</th>
                                    <th>General Rating</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Course</th>
                                    <th>Gender</th>
                                    <th>Process</th>
                                    <th>Anchorperson</th>
                                    <th>Schedules</th>
                                    <th>Confession/Mass</th>
                                    <th>Venue/Facilites</th>
                                    <th>General Rating</th>
                                </tr>
                            </tfoot>

                            <tbody>
                                <?php
                                $id = isset($_GET['id']) ? $_GET['id'] : null;
                                $sql = "SELECT * from new_events WHERE Event_ID = $id";
                                $result = mysqli_query($conn, $sql);
                                if($result){
                                    while ($row = mysqli_fetch_assoc($result)){
                                        $studentID = $row['student_id'];
                                        $name = $row['lastname'] . ", " . $row['firstname'];
                                        $course = $row['course'];
                                        $gender = $row['gender'];
                                        $L1 = $row['L1'];
                                        $L2 = $row['L2'];
                                        $L3 = $row['L3'];
                                        $L4 = $row['L4'];
                                        $L5 = $row['L5'];
                                        $L6 = $row['L6'];

                                        echo
                                        '   
                                            <tr>
                                                <td>'.$studentID.'</td>
                                                <td>'.$name.'</td>
                                                <td>'.$course.'</td>
                                                <td>'.$gender.'</td>
                                                <td>'.$L1.'</td>
                                                <td>'.$L2.'</td>
                                                <td>'.$L3.'</td>
                                                <td>'.$L4.'</td>
                                                <td>'.$L5.'</td>
                                                <td>'.$L6.'</td>
                                            </tr>
                                        ';
                                    }
                                }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>

                    <div class="card-body">
                        <table id='datatablesSimple3'>
                            <thead>
                                <tr>
                                    <th>Value</th>
                                    <th>Poor (1)</th>
                                    <th>Fair (2)</th>
                                    <th>Good (3)</th>
                                    <th>Very Good (4)</th>
                                    <th>Excellent (5)</th>
                                </tr>
                            </thead>

                        <?php
                            $id = isset($_GET['id']) ? $_GET['id'] : null;
                            $columns = ['L1', 'L2', 'L3', 'L4', 'L5', 'L6'];
                            $labels = ['Process', 'Anchorperson', 'Schedules', 'Confession/Mass', 'Venue/Facilities', 'General Rating'];
                                    
                            foreach ($columns as $index => $column) {
                                // Prepare the query to count votes for each scale value (1-5) in the specified column
                                $query = "
                                    SELECT 
                                        COUNT(CASE WHEN $column = 1 THEN 1 END) AS voted_1,
                                        COUNT(CASE WHEN $column = 2 THEN 1 END) AS voted_2,
                                        COUNT(CASE WHEN $column = 3 THEN 1 END) AS voted_3,
                                        COUNT(CASE WHEN $column = 4 THEN 1 END) AS voted_4,
                                        COUNT(CASE WHEN $column = 5 THEN 1 END) AS voted_5
                                    FROM new_events WHERE event_id = $id
                                ";
                
                                $result = $conn->query($query);
                
                                if ($result) {
                                    $counts = $result->fetch_assoc();

                                    echo "<tr>
                                            <td>{$labels[$index]}</td>
                                            <td>{$counts['voted_1']}</td>
                                            <td>{$counts['voted_2']}</td>
                                            <td>{$counts['voted_3']}</td>
                                            <td>{$counts['voted_4']}</td>
                                            <td>{$counts['voted_5']}</td>
                                        </tr>";
                                } else {
                                    echo "<tr><td colspan='6'>No data found for $column</td></tr>";
                                }
                            }
                        ?>
                        </table>
                    </div>
                </div>

            <div class="">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Stacked Bar Chart: Ratings per Question
                    </div>
                    <div class="card-body"><canvas id="myBarChart" width="100%" height="50  "></canvas></div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Bar Chart: Courses Distribution (Students)
                        </div>
                        <div class="card-body"><canvas id="myBarChart02" width="100%" height="50  "></canvas></div>
                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-pie me-1"></i>
                            Pie Chart: Gender Distribution
                        </div>
                        <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2023</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="assets/demo/chart-pie-demo.js"></script>
</body>

</html>