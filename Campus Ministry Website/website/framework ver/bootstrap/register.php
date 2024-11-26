<?php
include("config/config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register Staff</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="bg-primary" style="background-image: url('assets/img/background.jpg'); background-size: cover; background-position: center;">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                <div class="card-body">
                                    
                                    <form id="registerForm" enctype="multipart/form-data">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputFirstName" name="inputFirstName" type="text" placeholder="Enter your first name" required />
                                                    <label for="inputFirstName">*First name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" id="inputLastName" name="inputLastName" type="text" placeholder="Enter your last name" required />
                                                    <label for="inputLastName">*Last name</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input class="form-control" id="inputEmail" name="inputEmail" type="text" placeholder="*Enter staff email" required />
                                            <span class="input-group-text" id="basic-addon2">@adzu.edu.ph</span>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputPassword" name="inputPassword" type="password" placeholder="Create a password" required />
                                                    <label for="inputPassword">*Password</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputPasswordConfirm" name="inputPasswordConfirm" type="password" placeholder="Confirm password" required />
                                                    <label for="inputPasswordConfirm">*Confirm Password</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                                <select class="form-control" id="inputType" name="inputType" required>
                                                    <option value="" disabled selected>Select</option>
                                                    <option value="Developer">Developer</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Retreat">Retreat</option>
                                                    <option value="Recollection 01">Recollection 01</option>
                                                    <option value="Recollection 02">Recollection 02</option>
                                                </select>
                                                <label for="Account">Account Type</label>
                                            </div>
                                    
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid">
                                                <button class="btn btn-primary btn-block" id="createAccBtn">Create Account</button> <!-- removed: type="submit"  for manual actions -->
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="main-page.php">Back to dashboard</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  <!-- cuz the top part is j querry  le prepare make doc ready to listen -->
    

    <!-- AJAX script -->
    <script src="js/button-functions.js"></script>

    
</body>
</html>
