<?php
session_start();
$username = $_SESSION['username'];
$staffID = $_SESSION['Staff_ID'];
$htmlContent = <<<HTML
            <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
                <!-- Navbar Brand-->
                <a class="navbar-brand ps-3" href="main-page.php">Campus Ministry</a>
                <!-- Sidebar Toggle-->
                <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
                    
                <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                    <div style="color:white;">
                        <div class="small">Hello, User</div>
                        $username
                    </div>
                </div>
                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <button class="dropdown-item staff-update-btn" data-id="$staffID">Update</button>
                            <li><hr class="dropdown-divider"/></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div id="layoutSidenav">
                <div id="layoutSidenav_nav">
                    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                        <div class="sb-sidenav-menu">
                            <div class="nav">

                                <a class="nav-link" href="main-page.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Dashboard
                                </a>
                                
                                <a class="nav-link" href="add-event.html">
                                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                    Add Event
                                </a>

                                <a class="nav-link" href="staff-list.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                    Staff List
                                </a>

                                <a class="nav-link" href="register.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                    Register Staff
                                </a>

                            </div>
                        </div>
                    </nav>
                </div>


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
                                    <button class="btn btn-primary update-information-btn" >Update Information</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>s

                <script src="js/staff-options.js"></script>
            HTML;
echo $htmlContent;
?>
</html>