<?php
include('../admin/connection.php'); 
require '../vendor/autoload.php';
$db = new PDO('mysql:host=localhost;dbname=devalaya_db', 'root', '');
$auth = new \Delight\Auth\Auth($db);



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $newPassword = $_POST['new_password'];

    try {
       
        $auth->resetPassword($_GET['selector'],$_GET['token'], $newPassword);
        echo 'Password has been reset successfully.';
    } catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
        echo 'Invalid token.';
    } catch (\Delight\Auth\TokenExpiredException $e) {
        echo 'Token has expired.';
    } catch (\Delight\Auth\ResetDisabledException $e) {
        echo 'Password reset is disabled.';
    } catch (\Delight\Auth\InvalidPasswordException $e) {
        echo 'Invalid password.';
    } catch (\Delight\Auth\TooManyRequestsException $e) {
        echo 'Too many requests. Please try again later.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
        }

        .card {
            width: 100%;
            max-width: 400px;
        }

        h2 {
            font-size: 1.5rem;
        }

        .fs-6 {
            font-size: 3rem;
        }

        .form-floating input,
        .form-floating label {
            font-size: 0.9rem;
        }

        .btn-lg {
            font-size: 0.9rem;
            padding: 0.5rem 1rem;
        }

        .card-body {
            padding: 1.5rem;
        }

        .alert {
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <div class="card border border-light-subtle rounded-3 shadow-sm">
        <div class="card-body p-3 p-md-4">
            

                <div class="text-center mb-3">
                    <h2>Reset Password </h2>
                </div>
                
                <form action="" method="POST">
                    <div class="row gy-2 overflow-hidden">
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="password" class="form-control" name="new_password" id="new_password" required>
                                <label for="new_password" class="form-label">New Password</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-grid my-3">
                                <button class="btn btn-primary btn-lg" type="submit">Reset Password</button>
                            </div>
                        </div>
                        
                        </div>
                    </div>
                </form>
        </div>
    </div>
</body>

</html>


