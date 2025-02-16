<?php
session_start();
include('./admin/connection.php');
require './vendor/autoload.php';
$db = new PDO('mysql:host=localhost;dbname=devalaya_db', 'root', '');
$auth = new \Delight\Auth\Auth($db);
$sql = "select * from temple where id={$_GET["id"]}";
$res = $con->query($sql);
if ($res->num_rows > 0) {
    $row = $res->fetch_assoc();
}
$gallerysql = "select * from gallery where temple_id={$_GET["id"]}";
$galleryres = $con->query($gallerysql);
$images = [];
if ($galleryres->num_rows > 0) {
    while ($galleryrow = $galleryres->fetch_assoc()) {
        $images[] = $galleryrow;
    }
}

if (isset($_POST["review"])) {
    $templeid = $_POST["templeid"];
    $rating = $_POST["rating"];
    $comment = $_POST["comment"];
    $username = $auth->isLoggedIn() ? $auth->getUsername() : "anonymous user";
    mysqli_query($con, "INSERT INTO reviews (rating,comment,commented_by, temple_id) VALUES ($rating,'$comment','$username', $templeid)");
}
?>
<?php require_once 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row["name"]; ?></title>
    <link rel="stylesheet" href="css/temple.css">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.1.0/mdb.min.css" rel="stylesheet" />

    <style>
        body {
            font-family: Georgia, 'Times New Roman', Times, serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .alltemples-header {
            background: white;
            background-size: cover;
            color: white;
            text-align: center;
            padding: 20px 10px;
        }

        .alltemples-header h1 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            text-transform: uppercase;
            color: black;
        }

        .alltemples-header h2 {
            font-size: 2rem;
            margin-top: 30px;
            margin-bottom: 15px;
            color: black;
            text-align: justify;
            margin-left: 1rem;
            font-weight: bold;
        }

        .alltemples-header h4 {
            margin: 5px 0;
            font-size: 1rem;
            color: black;
        }

        .alltemples-header p {
            margin-top: 1rem;
            font-size: 1rem;
            line-height: 1.6;
            color: black;
            text-align: justify;
            padding: 0 20px;
        }

        .gallery {
            margin: 10px auto;
            max-width: 1200px;
            padding: 20px;
            border-radius: 10px;
        }

        .gallery h3 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.8rem;
            color: #333;
            font-weight: bold;
        }

        .gallery img {
            width: 100%;
            max-width: 150px;
            height: 150px;
            margin: 5px;
            border-radius: 10px;
            border: 1px solid black;
            transition: transform 0.3s;
        }

        .gallery img:hover {
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            .gallery img {
                max-width: 100%;
            }
        }

        .star-rating {
            direction: rtl;
            display: inline-block;
            cursor: pointer;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            color: black;
            font-size: 34px;
            padding: 0 2px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .form-control {
            border-color: dodgerblue;
        }

        .star-rating label:hover,
        .star-rating label:hover~label,
        .star-rating input:checked~label {
            color: #ffc107;
        }

        form button {
            margin-top: 1rem;
            width: 15%;
        }
    </style>
</head>

<body>
    <section class="alltemples-header">
        <h1><b><?php echo $row["name"]; ?></b></h1>
    
        <h4><b>Location : <?php echo $row["address"]; ?></b></h4>
        <h4><b>Deity : <?php echo $row["deity"]; ?></b></h4>

        <!-- Introduction Section -->
        <h2>About <?php echo $row["name"]; ?></h2>
        <p><?php echo $row["made_year"]; ?></p>

        <!-- Details Section -->
        <h2>Historical Background</h2>
        <p><?php echo $row["details"]; ?></p>


        <!-- Gallery Section -->
        <div class="gallery">
            <h3>Gallery</h3>
            <?php
            $i = 0;
            foreach ($images as $image) {
                $i++;
            ?>
                <img src="admin/<?php echo $image["image_path"]; ?>" />
            <?php } ?>
        </div>

        <!-- Review Form -->
        <form name="review" method="POST" action="#">
            <input type="hidden" name="templeid" value="<?php echo $row["id"]; ?>" />
            <p class="col-form-label text-center">Please Rate this Site</p>

            <div class="star-rating animated-stars">
                <input type="radio" id="star5" name="rating" value="5">
                <label for="star5"><i class="fa-solid fa-star"></i></label>
                <input type="radio" id="star4" name="rating" value="4">
                <label for="star4"><i class="fa-solid fa-star"></i></label>
                <input type="radio" id="star3" name="rating" value="3">
                <label for="star3"><i class="fa-solid fa-star"></i></label>
                <input type="radio" id="star2" name="rating" value="2">
                <label for="star2"><i class="fa-solid fa-star"></i></label>
                <input type="radio" id="star1" name="rating" value="1">
                <label for="star1"><i class="fa-solid fa-star"></i></label>
            </div>
            <textarea rows="5" name="comment" class="form-control" placeholder="Your Comment..."></textarea>
            <button type="submit" name="review" class="btn btn-primary">Send</button>
        </form>
    </section>

    <?php require_once 'footer.php'; ?>
    <!-- MDB -->
    <script>
        document.querySelectorAll('.star-rating:not(.readonly) label').forEach(star => {
            star.addEventListener('click', function() {
                this.style.transform = 'scale(1.2)';
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                }, 200);
            });
        });
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.1.0/mdb.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>