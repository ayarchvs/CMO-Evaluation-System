<?php
session_start();
$username = $_SESSION['username'];
$upperCase = strtoupper($username);
$staffID = $_SESSION['Staff_ID'];
$admin = $_SESSION['is_admin'];

$adminPermission = '';
if ($admin != 0) {
    $adminPermission = <<<ADMINPERMISSION
    <li class="nav-item">
        <a class="nav-link" href="staff-list.php">
            <i class="fas fa-users"></i> Staff List
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="register.php">
            <i class="fas fa-user-plus"></i> Register Staff
        </a>
    </li>
    ADMINPERMISSION;
}

$htmlContent = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Ministry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');

        .navbar {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
        }

        .navbar-nav {
            flex-direction: row;
            align-items: center;
        }

        .navbar-nav .nav-item {
            margin-right: 1rem;
        }

        .navbar-nav .nav-link {
            transition: color 0.3s ease;
            padding: 0.5rem 1rem;
        }

        .navbar-nav .nav-link:hover {
            color: #ffc107 !important;
        }

        .navbar-brand {
            margin-right: 2rem;
        }

        @media (max-width: 768px) {
            .navbar-nav {
                flex-wrap: wrap;
                justify-content: center;
            }

            .navbar-nav .nav-item {
                margin: 0.25rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="main-page.php">Campus Ministry</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="main-page.php">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add-event.html">
                            <i class="fas fa-chart-area"></i> Add Event
                        </a>
                    </li>
                    {$adminPermission}
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user fa-fw"></i> Welcome {$upperCase}!
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><button class="dropdown-item staff-update-btn" data-id="{$staffID}">Update</button></li>
                            <li><hr class="dropdown-divider"/></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Modal for Updating Staff Information -->
    <div class="modal fade" id="updateStaffModal" tabindex="-1" aria-labelledby="updateStaffModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateStaffModalLabel">Update User Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="updateStaffForm">
                        <input type="hidden" id="updateStaffId" name="StaffId">

                        <!-- First Name -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="updateStaffFirstName" name="firstName" placeholder="First Name" required>
                            <label for="updateStaffFirstName">*First Name</label>
                        </div>

                        <!-- Last Name -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="updateStaffLastName" name="lastName" placeholder="Last Name" required>
                            <label for="updateStaffLastName">*Last Name</label>
                        </div>

                        <!-- Type -->
                        <div class="form-floating mb-3">
                            <select class="form-control" id="updateStaffType" name="type" required>
                                <option value="" disabled selected>Select Type</option>
                                <option value="Developer">Developer</option>
                                <option value="Admin">Admin</option>
                                <option value="Retreat">Retreat</option>
                                <option value="Recollection 01">Recollection 01</option>
                                <option value="Recollection 02">Recollection 02</option>
                            </select>
                            <label for="updateStaffType">Type</label>
                        </div>

                        <!-- Email -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="updateStaffEmail" name="email" placeholder="Email" required >
                            <label for="updateStaffEmail">*Email &nbsp; (example@adzu.edu.ph)</label>
                        </div>

                        <!-- Password Groups -->
                        <div class="form-floating mb-3 bg-warning">
                            <p class="text-center">New Password (when needed)</p>
                        </div>

                        <!-- Password -->
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="updateStaffPassword" name="password" placeholder="Password">
                            <label for="updateStaffPassword">New Password</label>
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="updateStaffConfirmPassword" name="confirmPassword" placeholder="Confirm Password">
                            <label for="updateStaffConfirmPassword">Confirm Password</label>
                        </div>

                        <!-- Submit Button -->
                        <button class="btn btn-primary update-information-btn">Update Information</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/staff-options.js"></script>
</body>
</html>
HTML;

echo $htmlContent;
?>