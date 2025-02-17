<?php
include('../admin/connection.php'); 
require '../vendor/autoload.php';
$db = new PDO('mysql:host=localhost;dbname=devalaya_db', 'root', '');
$auth = new \Delight\Auth\Auth($db);

$message = null;
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newPassword = $_POST['new_password'];

    try {
        $auth->resetPassword($_GET['selector'], $_GET['token'], $newPassword);
        $message = 'Password has been reset successfully. Redirecting to login...';
        $success = true;
        echo "<script>setTimeout(function(){ window.location.href = 'login.php'; }, 3000);</script>";
    } catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
        $message = 'Invalid token.';
    } catch (\Delight\Auth\TokenExpiredException $e) {
        $message = 'Token has expired.';
    } catch (\Delight\Auth\ResetDisabledException $e) {
        $message = 'Password reset is disabled.';
    } catch (\Delight\Auth\InvalidPasswordException $e) {
        $message = 'Invalid password.';
    } catch (\Delight\Auth\TooManyRequestsException $e) {
        $message = 'Too many requests. Please try again later.';
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
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
        }
        .card {
            width: 100%;
            max-width: 400px;
        }
    </style>
</head>

<body>
    <div class="card border border-light-subtle rounded-3 shadow-sm">
        <div class="card-body p-3 p-md-4">
            <?php if ($message): ?>
                <div class="alert <?php echo $success ? 'alert-success' : 'alert-danger'; ?> text-center">
                    <?php echo htmlspecialchars($message); ?>
                </div>
            <?php endif; ?>
            <?php if (!$success): ?>
                <div class="text-center mb-3">
                    <h2>Reset Password</h2>
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
                </form>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
