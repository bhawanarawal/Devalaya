<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../admin/connection.php');
require '../vendor/autoload.php';
$db = new PDO('mysql:host=localhost;dbname=devalaya_db', 'root', '');
$auth = new \Delight\Auth\Auth($db);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$emailSent = false;
$errorMessage = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    try {
        // Generate a reset token
        $resetToken = $auth->forgotPassword($email, function ($selector, $token) use ($email) {
            
            $mail = new PHPMailer(true);

            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server (e.g., smtp.gmail.com for Gmail)
            $mail->SMTPAuth = true;
            $mail->Username = 'bhwbi.rawal@gmail.com'; // Replace with your email
            $mail->Password = 'ycyx lxvn rxhu avgt'; // Replace with your app password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use TLS
            $mail->Port = 587; // Port for TLS

            // Recipients
            $mail->setFrom('bhwbi.rawal@gmail.com', 'Password Reset');
            $mail->addAddress($email);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';
            $mail->Body = "Click the link to reset your password: <a href='http://localhost/devalaya/auth/reset.php?selector=$selector&token=$token'>Reset Password</a>";

            $mail->send();
            $emailSent = true;
        }, 3600);

    } catch (\Delight\Auth\InvalidEmailException $e) {
        $errorMessage = 'Invalid email address.';
    } catch (\Delight\Auth\EmailNotVerifiedException $e) {
        $errorMessage = 'Email not verified.';
    } catch (\Delight\Auth\ResetDisabledException $e) {
        $errorMessage = 'Password reset is disabled.';
    } catch (\Delight\Auth\TooManyRequestsException $e) {
        $errorMessage = 'Too many requests. Please try again later.';
    } catch (Exception $e) {
        $errorMessage = 'Error sending email: ' . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
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
            font-size: 0.9rem;
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
            <?php if ($emailSent): ?>
                <div class="alert alert-success">An email has been sent to <?php echo htmlspecialchars($email); ?>. Please check your inbox to reset your password.</div>
            <?php else: ?>
                <!-- Display error message at the top of the form -->
                <?php if ($errorMessage): ?>
                    <div class="alert alert-danger"><?php echo htmlspecialchars($errorMessage); ?></div>
                <?php endif; ?>

                <div class="text-center mb-3">
                    <h2>Password Recover</h2>
                </div>
                <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Provide the email address associated with your account to recover your password.</h2>
                <form action="" method="POST">
                    <div class="row gy-2 overflow-hidden">
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                                <label for="email" class="form-label">Email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-grid my-3">
                                <button class="btn btn-primary btn-lg" type="submit">Reset Password</button>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex gap-2 justify-content-between">
                                <a href="login.php" class="link-primary text-decoration-none">Log In</a>
                                <a href="register.php" class="link-primary text-decoration-none">Register</a>
                            </div>
                        </div>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>