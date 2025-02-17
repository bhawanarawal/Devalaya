<?php
session_start();
include('./admin/connection.php');


$templedata = [];
$sql1 = "SELECT id, name FROM temple ORDER BY name";
$res = $con->query($sql1);
if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        $templedata[] = $row;
    }
}


$data = [];
if (isset($_GET["id"]) && !empty($_GET["id"])) {

    $temple_id = $_GET["id"];
    $sql2 = "SELECT * FROM gallery WHERE temple_id='$temple_id'";
} else {

    $sql2 = "SELECT * FROM gallery";
}

$res_all = $con->query($sql2);
if ($res_all->num_rows > 0) {
    while ($row = $res_all->fetch_assoc()) {
        $data[] = $row;
    }
}
?>
<?php require_once 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Temple Gallery</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="./admin/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="./admin/css/sb-admin-2.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }



        .galleryimage img {
            width: 250px;
            height: 200px;
            margin: 10px;
            border-radius: 10px;
            border: 2px solid black;
            transition: transform 0.3s ease;
        }

        .galleryimage img:hover {
            transform: scale(2.05);
        }

        .hidden {
            display: none;
        }

        .image-row {
            display: flex;

            justify-content: space-around;
        }

        h2 .fa-om {
            color: #ff5722;
            margin: 0 10px;
        }

        .btn-temple {
            margin: 5px;
        }

        #loadMore {
            margin-top: 20px;
        }
    </style>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h2 class="text-center my-4"><b><i class="fa-solid fa-om"></i>Temple Images<i class="fa-solid fa-om"></i></b></h2>

                    <!-- Temple Filter Buttons -->
                    <div class="text-center mb-4">
                        <a href='galleries.php' class="btn btn-primary btn-temple">All Temples</a>
                        <?php foreach ($templedata as $row) : ?>
                            <a href='galleries.php?id=<?php echo $row["id"]; ?>' class="btn btn-outline-primary btn-temple">
                                <?php echo $row["name"]; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>

                    <!-- Image Gallery -->
                    <div class="galleryimage">
                        <?php
                        $rowsToShowInitially = 3; // Show 3 rows initially
                        $imagesPerRow = 5; // Number of images per row
                        $totalRows = ceil(count($data) / $imagesPerRow); // Total rows based on images

                        foreach ($data as $index => $row) {
                            if ($index % $imagesPerRow == 0) {
                                $rowNumber = ($index / $imagesPerRow) + 1;
                                echo '<div class="image-row' . ($rowNumber > $rowsToShowInitially ? ' hidden' : '') . '">';
                            }
                        ?>
                            <img src="<?php echo 'admin/' . $row["image_path"]; ?>" alt="Temple Image" />
                        <?php
                            if (($index + 1) % $imagesPerRow == 0 || $index == count($data) - 1) {
                                echo '</div>';
                            }
                        }
                        ?>
                    </div>

                    <!-- Load More Button -->
                    <?php if ($totalRows > $rowsToShowInitially) : ?>
                        <!-- <div class="text-center">
                            <button id="loadMore" class="btn btn-primary">Load More</button>
                        </div> -->
                    <?php endif; ?>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages -->
    <script src="js/sb-admin-2.min.js"></script>
    <script>
        // JavaScript for Load More functionality
        document.getElementById('loadMore')?.addEventListener('click', function() {
            const hiddenRows = document.querySelectorAll('.image-row.hidden');
            const rowsToShow = 1; // Show 1 more row on each click

            for (let i = 0; i < rowsToShow && i < hiddenRows.length; i++) {
                hiddenRows[i].classList.remove('hidden');
            }

            // Hide the button if no more rows are left
            if (hiddenRows.length <= rowsToShow) {
                this.style.display = 'none';
            }
        });
    </script>
</body>

</html>