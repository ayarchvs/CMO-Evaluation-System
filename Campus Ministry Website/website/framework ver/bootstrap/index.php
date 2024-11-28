

<?php 
include("config/config.php");
session_start();

$error = isset($_SESSION['login_error']) ? $_SESSION['login_error'] : '';
$email = isset($_SESSION['login_email']) ? $_SESSION['login_email'] : '';
unset($_SESSION['login_error']);
unset($_SESSION['login_email']);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - MyADZU</title>
        <link href="css/styles.css" rel="stylesheet" />
        <style>
            body {
                background-color: #0a1f44;
                background-image: url('assets/img/login.png');
                background-size: cover;
                background-position: center;
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                position: relative;
                overflow: hidden;
            }
            body::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: radial-gradient(circle at center, transparent 0%, #0a1f44 70%);
            }

            h1 {
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        p {
            font-size: 1.1rem;
            font-weight: 300;
            margin-bottom: 2rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
            color: black;
        }

            .login-container {
                max-width: 400px;
                width: 100%;
                padding: 20px;
                position: relative;
                z-index: 1;
                display: flex;
                align-items: center;
                flex-direction: column;
            }
            .logo {
                width: 120px;
                height: 120px;
                margin: 0 auto 20px;
                display: block;
                background-color: white;
                border-radius: 50%;
                padding: 10px;
            }
            .card {
                background-color: transparent !important;
                border: none;
                border-radius: 10px;
            }
            .form-control {
                background-color: rgba(255, 255, 255, 0.9);
                border: none;
                height: 48px;
                text-align: center;
                font-size: 18px;
                width: 300px;
            }
            .btn-primary {
                background-color: #ffc107;
                border-color: #ffc107;
                color: #000;
                height: 48px;
                font-size: 18px;
                font-weight: 500;
            }
            .btn-primary:hover {
                background-color: #ffca2c;
                border-color: #ffca2c;
            }
        </style>
    </head>
    <body>
        <div class="stars"></div>
        <div class="login-container">
            <div style=" background:white; border-radius:200px">
                <img src="assets/img/CMOlogo.png" alt="Logo" style="max-width:300px; margin-bottom: 10px;">
            </div>
            <h1 class="text-center text-white mb-2">Campus Ministry Office</h1>
            <div class="card">
                <div class="card-body">
                    <?php if ($error): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <form action="login.php" method="POST">
                        <div class="mb-3">
                            <input class="form-control" id="inputEmail" name="email" type="text" placeholder="Email Address" value="<?php echo htmlspecialchars($email); ?>" required />
                        </div>
                        <div class="mb-3">
                            <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Password" required />
                        </div>
                        <div class="d-grid">
                            <input type="submit" class="btn btn-primary" name="submit" value="Login">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>