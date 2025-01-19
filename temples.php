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
</head>

<body>
    <section class="temples-header">
        <h1><b><?php echo $row["name"]; ?></b></h1>
        <h4><b>Estd. <?php echo $row["made_year"]; ?></b></h4>
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



    <!-- MDB -->
    <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.1.0/mdb.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>