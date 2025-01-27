<?php require_once "config.php"; 
require './vendor/autoload.php';
$db = new PDO('mysql:host=localhost;dbname=devalaya_db', 'root', '');
$auth = new \Delight\Auth\Auth($db);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <link rel="stylesheet" href="<?php echo BASE_URL; ?>home.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>

  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand me-auto" href="home.php">
        <span><img src="images/icon-7.jpg">Devalaya</span>
      </a>

      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Devalaya</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link mx-lg-2 active" aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-lg-2" href="alltemple.php">Temples</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-lg-2" href="galleries.php">Gallery</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-lg-2" href="lessons.php">Lessons</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-lg-2" href="about.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-lg-2" href="contact.php">Contact</a>
            </li>
            <?php
      if ($auth->isLoggedIn()) {
      ?>
        <a><?php echo $auth->getUsername(); ?></a>
        <form method="POST">
          <a href="auth/logout.php" type="submit"  class="btn btn-danger" name="logout" >Logout</a>
          </form>
      <?php } else {
      ?>
        <a href="auth/login.php" class="login"><i class="fa-solid fa-user"></i></a>
      <?php }
      ?>

          </ul>
        </div>
      </div>
      
      <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"></script>
</body>

</html>