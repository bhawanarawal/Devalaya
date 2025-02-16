<?php
session_start();
include('../admin/connection.php');
$users = [];
$sql = "select email,username from users";
$res = $con->query($sql);
if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        $users[] = $row;
    }
}
require '../vendor/autoload.php';
$db = new PDO('mysql:host=localhost;dbname=devalaya_db', 'root', '');
$auth = new \Delight\Auth\Auth($db);

if (isset($_POST['save'])) {
    $userEmail=$_POST['useremail'];
    if (isset($_POST['superadmin'])) {

        try {
            $auth->admin()->addRoleForUserByEmail($userEmail, \Delight\Auth\Role::SUPER_ADMIN);
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            die('Unknown email address');
        }
    } 
    if (isset($_POST['admin'])) {

        try {
            $auth->admin()->addRoleForUserByEmail($userEmail, \Delight\Auth\Role::ADMIN);
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            die('Unknown email address');
        }
    } 
    if (isset($_POST['subscriber'])) {

        try {
            $auth->admin()->addRoleForUserByEmail($userEmail, \Delight\Auth\Role::SUBSCRIBER);
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            die('Unknown email address');
        }
    } 
}
?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="login.css">
</head>

<body>

    <form method="POST" action="" class="p-3 mt-3">
        <select class="form-select" name="useremail">
            <option selected>Please Select User</option>
            <?php
            $i = 0;
            foreach ($users as $user) {
                $i++;
            ?>

                <option value="<?php echo $user["email"]; ?>"><?php echo $user["username"] . '(' . $user["email"] . ')'; ?></option>
            <?php } ?>

        </select>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" name="superadmin">
            <label class="form-check-label" for="flexSwitchCheckDefault">Super Admin</label>
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" name="admin" checked>
            <label class="form-check-label" for="flexSwitchCheckChecked">Admin</label>
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" name="subscriber" checked>
            <label class="form-check-label" for="flexSwitchCheckChecked">Subscriber</label>
        </div>
       
      
        <button class="btn mt-3" type="submit" name="save">Save</button>
    </form>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>