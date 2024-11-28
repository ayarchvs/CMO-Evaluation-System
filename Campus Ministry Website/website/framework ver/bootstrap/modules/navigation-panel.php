<?php
session_start();
$username = $_SESSION['username'];

// this is le start of le whole nav panels

///**/

$htmlContent = <<<HTML
    
    
    <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #1c4966; color: white;">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="main-page.php" style="color: white;">Campus Ministry</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!" style="color: white;"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion" style="background-color: #1c4966;" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading" style="color: white;">Core</div>
                        <a class="nav-link" href="main-page.php" style="color: white;">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt" style="color: white;"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading" style="color: white;">Interface</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts" style="color: white;">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns" style="color: white;"></i></div>
                            Layouts
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down" style="color: white;"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="layout-static.html" style="color: white;">Static Navigation</a>
                                <a class="nav-link" href="layout-sidenav-light.html" style="color: white;">Light Sidenav</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages" style="color: white;">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open" style="color: white;"></i></div>
                            Pages
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down" style="color: white;"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth" style="color: white;">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down" style="color: white;"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="index.php" style="color: white;">Login</a>
                                        <a class="nav-link" href="register.php" style="color: white;">Register</a>
                                        <a class="nav-link" href="password.php" style="color: white;">Forgot Password</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError" style="color: white;">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down" style="color: white;"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="401.html" style="color: white;">401 Page</a>
                                        <a class="nav-link" href="404.html" style="color: white;">404 Page</a>
                                        <a class="nav-link" href="500.html" style="color: white;">500 Page</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading" style="color: white;">Addons</div>
                        <a class="nav-link" href="charts.php" style="color: white;">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area" style="color: white;"></i></div>
                            Charts
                        </a>
                        <a class="nav-link" href="tables.php" style="color: white;">
                            <div class="sb-nav-link-icon"><i class="fas fa-table" style="color: white;"></i></div>
                            Tables
                        </a>
                        <a class="nav-link" href="add-old-event.html" style="color: white;">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area" style="color: white;"></i></div>
                            Add Old Event
                        </a>
                        <a class="nav-link" href="old-event-details.php" style="color: white;">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area" style="color: white;"></i></div>
                            Old Event Details
                        </a>
                        <a class="nav-link" href="add-event.html" style="color: white;">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area" style="color: white;"></i></div>
                            Add Event
                        </a>
                        <a class="nav-link" href="event-details.php" style="color: white;">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area" style="color: white;"></i></div>
                            Event Details
                        </a>
                        <a class="nav-link" href="staff-list.php" style="color: white;">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area" style="color: white;"></i></div>
                            Staff List
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer" style="color: white;">
                    <div class="small">Logged in as:</div>
                    $username
                </div>
            </nav>
        </div>

HTML;

//*/  // this is le end of le whole nav panels

echo $htmlContent;

?>
</html>