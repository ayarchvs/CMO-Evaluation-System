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

<body class="sb-nav-fixed">

    <!-- Navigation Panel -->
    <?php
    include "modules/navigation-panel.php";
    ?>

    <!-- Main Content -->
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">

                <?php
                if (isset($_GET['id'])) {
                    $eventId = $_GET['id'];
                    $eventId = intval($eventId);

                    $sql = "SELECT * FROM event WHERE Event_ID = $eventId";
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
                    <li class="breadcrumb-item active">Event Details</li>
                </ol>

                <div class="container-fluid">
                    <?php
                    if (isset($_GET['id'])) {
                        $eventId = $_GET['id'];
                    }

                    $sql = "SELECT * FROM event WHERE Event_ID = $eventId";
                    $result = mysqli_query($conn, $sql);

                    if ($result && mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $Religion = $row['E_Religion'];
                        $Location = $row['E_Location'];
                        $Course = $row['E_Course'];

                        echo
                        '
                        <div class="row">
                            <div class="col-md-3">
                                <div class="input-group mb-4">
                                    <span class="input-group-text">Religion</span>
                                    <input type="text" class="form-control" value="' . $Religion . '" disabled>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-4">
                                    <span class="input-group-text">Course</span>
                                    <input type="text" class="form-control" value="' . $Course . '" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-5">
                                    <span class="input-group-text">Venue</span>
                                    <input type="text" class="form-control" value="' . $Location . '" disabled>
                                </div>
                            </div>
                        </div>';
                    }
                    ?>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Records
                    </div>


                    <div class="card-body">
                        <table id="datatablesSimple1">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Course</th>
                                    <th>Gender</th>
                                    <!-- <th>Age</th> -->
                                    <th>Process</th>
                                    <th>Anchorperson</th>
                                    <th>Schedules</th>
                                    <th>Confession/Mass</th>
                                    <th>Venue/Facilities</th>
                                    <th>General Rating</th>

                                    <th>Entering into the Retreat</th>
                                    <th>Looking Back</th>
                                    <th>Healing of Hurtful Memories</th>
                                    <th>Jesus of the Gospel</th>
                                    <th>Two Standards</th>
                                    <th>Paschal Mystery</th>
                                    <th>Resurrection</th>
                                    <th>Person for Others</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $id = isset($_GET['id']) ? $_GET['id'] : null;
                                $sql = "SELECT * from new_events WHERE Event_ID = $id";
                                $result = mysqli_query($conn, $sql);
                                if ($result) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $studentID = $row['student_id'];
                                        $name = $row['lastname'] . ", " . $row['firstname'];
                                        $course = $row['course'];
                                        $gender = $row['gender'];
                                        // $age = $row['age'];
                                        $L1 = $row['L1'];
                                        $L2 = $row['L2'];
                                        $L3 = $row['L3'];
                                        $L4 = $row['L4'];
                                        $L5 = $row['L5'];
                                        $L6 = $row['L6'];
                                        $C1 = $row['C1'];
                                        $C2 = $row['C2'];
                                        $C3 = $row['C3'];
                                        $C4 = $row['C4'];
                                        $C5 = $row['C5'];
                                        $C6 = $row['C6'];
                                        $C7 = $row['C7'];
                                        $C8 = $row['C8'];

                                        echo
                                        '   
                                            <tr>
                                                <td>' . $studentID . '</td>
                                                <td>' . $name . '</td>
                                                <td>' . $course . '</td>
                                                <td>' . $gender . '</td>
                                                <td>' . $L1 . '</td>
                                                <td>' . $L2 . '</td>
                                                <td>' . $L3 . '</td>
                                                <td>' . $L4 . '</td>
                                                <td>' . $L5 . '</td>
                                                <td>' . $L6 . '</td>
                                                <td>' . $C1 . '</td>
                                                <td>' . $C2 . '</td>
                                                <td>' . $C3 . '</td>
                                                <td>' . $C4 . '</td>
                                                <td>' . $C5 . '</td>
                                                <td>' . $C6 . '</td>
                                                <td>' . $C7 . '</td>
                                                <td>' . $C8 . '</td>
                                            </tr>
                                        ';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mb-3">
                        <label for="courseFilter" class="form-label">Filter by Course:</label>
                        <select id="courseFilter" class="form-select">
                            <option value="">All Courses</option>
                            <?php
                            $courseQuery = "SELECT DISTINCT course FROM new_events WHERE Event_ID = $id ORDER BY course";
                            $courseResult = mysqli_query($conn, $courseQuery);
                            while ($courseRow = mysqli_fetch_assoc($courseResult)) {
                                echo "<option value='" . htmlspecialchars($courseRow['course']) . "'>" . htmlspecialchars($courseRow['course']) . "</option>";
                            }
                            ?>
                        </select>
                    </div>


                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Logistics
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

                    <!-- Bar Chart Container for Logistics -->
                    <div>
                        <canvas id="myChart1" height =400vh></canvas>
                    </div>

                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Content
                    </div>
                    <div class="card-body">
                        <table id='datatablesSimple4'>
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
                            $columns = ['C1', 'C2', 'C3', 'C4', 'C5', 'C6', 'C7', 'C8'];
                            $labels = ['Entering into the Retreat', 'Looking Back', 'Healing of Hurtful Memories', 'Jesus of the Gospel', 'Two Standards', 'Paschal Mystery', 'Resurrection', 'Person for Others'];

                            foreach ($columns as $index => $column) {
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

                    <!-- Bar Chart Container -->
                    <div>
                        <canvas id="myChart2" height = 400vh    ></canvas>
                    </div>
                </div>

                <script>
                    let myChart1, myChart2;

                    function filterDataByCourse(course) {
                        const tables = ['datatablesSimple1', 'datatablesSimple3', 'datatablesSimple4'];
                        
                        tables.forEach(tableId => {
                            const table = document.getElementById(tableId);
                            const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
                            
                            for (let i = 0; i < rows.length; i++) {
                                if (tableId === 'datatablesSimple1') {
                                    const courseCell = rows[i].getElementsByTagName('td')[2]; // Assuming course is in the third column
                                    if (courseCell) {
                                        if (course === '' || courseCell.textContent === course) {
                                            rows[i].style.display = '';
                                        } else {
                                            rows[i].style.display = 'none';
                                        }
                                    }
                                } else {
                                    // For logistics and content tables, we'll update their data in updateCharts
                                    rows[i].style.display = '';
                                }
                            }
                        });

                        // Update charts
                        updateCharts(course);
                    }

                    function updateCharts(course) {
                        const logistics = '#datatablesSimple3 tbody tr';
                        const content = '#datatablesSimple4 tbody tr';
                        const logischart = 'myChart1';
                        const contentchart = 'myChart2';

                        // Filter data for charts
                        const chartDataLogis = extractTableData(logistics, course);
                        const chartDataContent = extractTableData(content, course);

                        // Update existing charts with new data
                        updateBarChart(myChart1, chartDataLogis);
                        updateBarChart(myChart2, chartDataContent);

                        // Update logistics and content tables
                        updateTable('datatablesSimple3', chartDataLogis);
                        updateTable('datatablesSimple4', chartDataContent);
                    }

                    function extractTableData(id, course) {
                        const labels = [];
                        const poorData = [];
                        const fairData = [];
                        const goodData = [];
                        const veryGoodData = [];
                        const excellentData = [];

                        const rows = document.querySelectorAll(id);

                        rows.forEach(row => {
                            const value = row.cells[0].textContent;

                            // Extract the ratings for each column (Poor, Fair, etc.)
                            let poor = 0, fair = 0, good = 0, veryGood = 0, excellent = 0;

                            // Filter data based on the selected course
                            const dataRows = document.querySelectorAll('#datatablesSimple1 tbody tr');
                            dataRows.forEach(dataRow => {
                                if (course === '' || dataRow.cells[2].textContent === course) {
                                    const columnIndex = Array.from(row.parentNode.children).indexOf(row) + 4; // +4 because ratings start from the 5th column
                                    const rating = parseInt(dataRow.cells[columnIndex].textContent);
                                    switch(rating) {
                                        case 1: poor++; break;
                                        case 2: fair++; break;
                                        case 3: good++; break;
                                        case 4: veryGood++; break;
                                        case 5: excellent++; break;
                                    }
                                }
                            });

                            labels.push(value);
                            poorData.push(poor);
                            fairData.push(fair);
                            goodData.push(good);
                            veryGoodData.push(veryGood);
                            excellentData.push(excellent);
                        });

                        return {
                            labels,
                            poorData,
                            fairData,
                            goodData,
                            veryGoodData,
                            excellentData
                        };
                    }

                    function createBarChart(data, chartId) {
                        const ctx = document.getElementById(chartId).getContext('2d');
                        return new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: data.labels,
                                datasets: [
                                    {
                                        label: 'Poor (1)',
                                        data: data.poorData,
                                        backgroundColor: 'rgba(233, 30, 99, 0.8)'
                                    },
                                    {
                                        label: 'Fair (2)',
                                        data: data.fairData,
                                        backgroundColor: 'rgba(33, 150, 243, 0.8)'
                                    },
                                    {
                                        label: 'Good (3)',
                                        data: data.goodData,
                                        backgroundColor: 'rgba(255, 193, 7, 0.8)'
                                    },
                                    {
                                        label: 'Very Good (4)',
                                        data: data.veryGoodData,
                                        backgroundColor: 'rgba(0, 200, 83, 0.8)'
                                    },
                                    {
                                        label: 'Excellent (5)',
                                        data: data.excellentData,
                                        backgroundColor: 'rgba(156, 39, 176, 0.8)'
                                    }
                                ]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    tooltip: {
                                        callbacks: {
                                            label: function (context) {
                                                return `${context.dataset.label}: ${context.raw} votes`;
                                            }
                                        }
                                    },
                                    legend: {
                                        position: 'top',
                                        labels: {
                                            font: {
                                                size: 14
                                            },
                                            color: '#333'
                                        }
                                    }
                                },
                                scales: {
                                    x: {
                                        stacked: true,
                                        grid: {
                                            display: false
                                        },
                                        ticks: {
                                            color: '#666',
                                            font: {
                                                size: 12
                                            },
                                        }
                                    },
                                    y: {
                                        stacked: true,
                                        beginAtZero: true,
                                        grid: {
                                            color: 'rgba(200, 200, 200, 0.3)'
                                        },
                                        ticks: {
                                            color: '#666',
                                            font: {
                                                size: 12
                                            },
                                            precision: 0
                                        }
                                    }
                                },
                            }
                        });
                    }

                    function updateBarChart(chart, newData) {
                        chart.data.labels = newData.labels;
                        chart.data.datasets[0].data = newData.poorData;
                        chart.data.datasets[1].data = newData.fairData;
                        chart.data.datasets[2].data = newData.goodData;
                        chart.data.datasets[3].data = newData.veryGoodData;
                        chart.data.datasets[4].data = newData.excellentData;
                        chart.update('none'); // Update without animation
                    }

                    function updateTable(tableId, data) {
                        const table = document.getElementById(tableId);
                        const tbody = table.getElementsByTagName('tbody')[0];
                        const rows = tbody.getElementsByTagName('tr');

                        for (let i = 0; i < rows.length; i++) {
                            const cells = rows[i].getElementsByTagName('td');
                            cells[1].textContent = data.poorData[i];
                            cells[2].textContent = data.fairData[i];
                            cells[3].textContent = data.goodData[i];
                            cells[4].textContent = data.veryGoodData[i];
                            cells[5].textContent = data.excellentData[i];
                        }
                    }

                    window.onload = function() {
                        const courseFilter = document.getElementById('courseFilter');
                        courseFilter.addEventListener('change', function() {
                            filterDataByCourse(this.value);
                        });

                        // Initial chart creation
                        const logistics = '#datatablesSimple3 tbody tr';
                        const content = '#datatablesSimple4 tbody tr';
                        const logischart = 'myChart1';
                        const contentchart = 'myChart2';
                        const chartDataLogis = extractTableData(logistics, '');
                        const chartDataContent = extractTableData(content, '');
                        myChart1 = createBarChart(chartDataLogis, logischart);
                        myChart2 = createBarChart(chartDataContent, contentchart);
                    };
                </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="assets/demo/chart-pie-demo.js"></script>
</body>
</html>