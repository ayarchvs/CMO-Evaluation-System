<?php
    include("config/config.php"); 
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    
        $email = trim($_POST['email']);
        $password = trim($_POST['password']); 

        $admin_email = 'admin@adzu.edu.ph';
        $admin_password = 'adminpassword';

        if (!empty($email) && !empty($password)) { 

            if ($email === $admin_email && $password === $admin_password) {
                $_SESSION['email'] = $sent_email;
                $_SESSION['username'] = "admin";
                header("Location: main-page.php");
                exit; 
            }

            $stmt = $conn->prepare("SELECT S_Password, S_Name FROM `staff` WHERE `S_Email` = ?"); 
            $stmt->bind_param("s", $email); 
            $stmt->execute(); 
            $stmt->store_result(); 

            if ($stmt->num_rows == 1){ 
                $stmt->bind_result($hashed_password, $name); 
                $stmt->fetch(); 

                if (password_verify($password, $hashed_password)){ 

                    $_SESSION['email'] = $sent_email; 
                    $_SESSION['username'] = $name;
                    echo "Login successful! Welcome, " . htmlspecialchars($email) . "."; 
                    header("Location: main-page.php");
                }else{
                    echo "<script>
                            alert('Wrong Password');
                            window.location.href = 'index.php';
                        </script>";
                    exit;
                }
            }else{
                echo "<script>
                        alert('Account Not Found');
                        window.location.href = 'index.php';
                    </script>";
                exit;
            }
    
            $stmt->close(); 
        }else{
            echo "Error!."; // fieldz are required ulit bro
        }
    }

    mysqli_close($conn);
?>