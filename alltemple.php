<?php
session_start();
include('./admin/connection.php');
require './vendor/autoload.php';
$db = new PDO('mysql:host=localhost;dbname=devalaya_db', 'root', '');
$auth = new \Delight\Auth\Auth($db);

$data = [];
$sql = "select * from temple order by made_year desc";
$res = $con->query($sql);
if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        $data[] = $row;
    }
}

if (isset($_POST["like"])) {
    $templeid = $_POST["templeid"];
    $username = $auth->isLoggedIn() ? $auth->getUsername() : "anonymous user";
    mysqli_query($con, "INSERT INTO favourite (username, temple_id) VALUES ('$username', $templeid)");
}
?>
<?php require_once 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Font Awesome -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet" />
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet" />
    <!-- MDB -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.1.0/mdb.min.css"
        rel="stylesheet" />
    <style>
       

        .alltemples-header h1 {
            font-size: 3rem;
            color: black;
            text-align: center;
        }

        h1 .fa-om {
            color: #ff5722;
            margin: 0 10px;
        }

        
    </style>

</head>

<body>
    <section class="alltemples-header">
        <h1><b><i class="fa-solid fa-om"></i>Temples<i class="fa-solid fa-om"></i></b></h1>
        <!-- Carousel wrapper -->
        <div
            id="carouselMultiItemExample"
            data-mdb-carousel-init class="carousel slide carousel-dark text-center"
            data-mdb-ride="carousel">
            <div class="carousel-inner py-4">
                <!-- Single item -->
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row">

                            <?php
                            $i = 0;
                            foreach ($data as $row) {
                                $i++;
                                $sql = "select * from gallery where temple_id = " . $row['id'] . " limit 1";
                                $res = $con->query($sql);

                                $img = $res->fetch_assoc();
                            ?>
                                <div class="col-lg-3">
                                    <div class="card">
                                        <img
                                            src="admin/<?php echo $img['image_path']; ?>"
                                            class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title"><b><?php echo $row["name"]; ?></b></h5>
                                            <p class="card-text">
                                                Deity :<?php echo $row["deity"]?>
                                            </p>
                                            <form action="alltemple.php" method="POST" name="like">
                                                <input type="hidden" name="templeid" value="<?php echo $row["id"]; ?>" />
                                                <input type="submit" name="like" value="Like" />
                                            </form>
                                            <a href='temples.php?id=<?php echo $row["id"]; ?>' data-mdb-ripple-init class='btn btn-light'>See More</a>

                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="temple-button">
                                <a href="alltemple.php" data-mdb-ripple-init class="btn btn-primary">Load More</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Inner -->
            </div>
    </section>
    <?php require_once 'footer.php'; ?>

    <!-- MDB -->
    <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.1.0/mdb.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>