<?php
include('../admin/connection.php'); 
require '../vendor/autoload.php';
$db = new PDO('mysql:host=localhost;dbname=devalaya_db', 'root', '');
$auth = new \Delight\Auth\Auth($db);



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'];
    $newPassword = $_POST['new_password'];

    try {
        $auth->resetPassword($token, $newPassword);
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

$token = $_GET['token'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
</head>
<body>
    <h1>Reset Password</h1>
    <form method="POST">
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password" required>
        <button type="submit">Reset Password</button>
    </form>
</body>
</html>