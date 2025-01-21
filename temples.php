<?php
session_start();
include('./admin/connection.php');
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

?>
<?php require_once 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/temple.css">
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
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .temples-header {
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.4)), url('images/temple-bg.jpg');
            background-size: cover;
            color: white;
            text-align: center;
            padding: 50px 20px;
        }
        .temples-header h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            text-transform: uppercase;
        }
        .temples-header h4 {
            margin: 10px 0;
            font-size: 1.2rem;
        }
        .temples-header p {
            margin-top: 20px;
            font-size: 1.1rem;
            line-height: 1.6;
            color: #e0e0e0;
        }
        .gallery {
            margin: 30px auto;
            max-width: 1200px;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .gallery h3 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.8rem;
            color: #333;
        }
        .gallery img {
            width: 100%;
            max-width: 300px;
            height: auto;
            margin: 10px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
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
    </style>
</head>

<body>
    <section class="temples-header">
        <h1><b><?php echo $row["name"]; ?></b></h1>
        <h4><b>Estd : <?php echo $row["made_year"]; ?></b></h4>
        <h4><b>Location : <?php echo $row["address"]; ?></b></h4>
        <h4><b>Deity : <?php echo $row["deity"]; ?></b></h4>
        <p><?php echo $row["details"]; ?></p>
        <div class="gallery">
            <h3>Site Images</h3>
            
            <?php
            $i = 0;
            foreach ($images as $image) {
                $i++;
            ?>
                <img src="admin/<?php echo $image["image_path"]; ?>" />
            <?php } ?>
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