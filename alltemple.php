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
            font-size: 1.8rem;
            color: black;
            text-align: center;
        }

        h1 .fa-om {
            color: #ff5722;
            margin: 0 10px;
        }

        .class {
            margin-right: 15rem;
            margin-top: 1rem;
            display: flex;
            gap: 3.5rem;
        }

        .class button {
            border: none;
            background-color: white;
            font-size: 25px;
            color: #999;
        }

        .class button:hover, .class button:checked~label {
            border: none;
            background-color: white;
            font-size: 25px;
            color: red;
        }

        .classbutton .btn-light {
            border: 1px solid black;
            color: black;
            border-radius: 5px;
            padding: 0 50px;
            font-weight: bold;
            text-transform: lowercase;
        }

        .alltemples-header .class .btn-light:hover {
            background-color: dodgerblue;
            color: #f8f9fa;
        }

        .hidden-row {
            display: none; /* Hide extra rows initially */
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
                        <div class="row" id="templesContainer">
                            <?php
                            $i = 0;
                            foreach ($data as $row) {
                                $i++;
                                $sql = "select * from gallery where temple_id = " . $row['id'] . " limit 1";
                                $res = $con->query($sql);
                                $img = $res->fetch_assoc();

                                // Add the "hidden-row" class to rows beyond the first 2
                                $hiddenClass = ($i > 8) ? 'hidden-row' : '';
                            ?>
                                <div class="col-lg-3 <?php echo $hiddenClass; ?>">
                                    <div class="card">
                                        <img
                                            src="admin/<?php echo $img['image_path']; ?>"
                                            class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title"><b><?php echo $row["name"]; ?></b></h5>
                                            <p class="card-text">
                                                Deity :<?php echo substr($row["deity"], 0, 20) . ".."; ?>
                                            </p>
                                            <div class="class">
                                                <form action="alltemple.php" method="POST" name="like">
                                                    <input type="hidden" name="templeid" value="<?php echo $row["id"]; ?>" />
                                                    <button type="submit" name="like">❤</button>
                                                </form>
                                                <div class="classbutton">
                                                    <a href='temples.php?id=<?php echo $row["id"]; ?>' data-mdb-ripple-init class='btn btn-light'>See More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="temple-button">
                            <a href="javascript:void(0);" id="loadMoreBtn" data-mdb-ripple-init class="btn btn-primary">Load More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php require_once 'footer.php'; ?>

    <!-- MDB -->
   
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const loadMoreBtn = document.getElementById("loadMoreBtn");
            const templesContainer = document.getElementById("templesContainer");
            const hiddenRows = document.querySelectorAll(".hidden-row");
            const templesPerClick = 4; // Number of temples to load per click
            let currentIndex = 0;

            loadMoreBtn.addEventListener("click", () => {
                for (let i = currentIndex; i < currentIndex + templesPerClick; i++) {
                    if (hiddenRows[i]) {
                        hiddenRows[i].classList.remove("hidden-row"); // Show hidden temples
                    }
                }
                currentIndex += templesPerClick;

                // Hide the "Load More" button if all temples are shown
                if (currentIndex >= hiddenRows.length) {
                    loadMoreBtn.style.display = "none";
                }
            });
        });
    </script>
     <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.1.0/mdb.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>