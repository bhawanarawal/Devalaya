<?php
session_start();
include('./admin/connection.php');

// Fetch all temples
$templedata = [];
$sql1 = "SELECT id, name FROM temple ORDER BY name";
$res = $con->query($sql1);
if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        $templedata[] = $row;
    }
}

// Fetch images based on the selected temple (if any)
$data = [];
if (isset($_GET["id"]) && !empty($_GET["id"])) {
    // If a temple ID is selected, fetch images for that temple
    $temple_id = $_GET["id"];
    $sql2 = "SELECT * FROM gallery WHERE temple_id='$temple_id'";
} else {
    // If no temple is selected, fetch all images
    $sql2 = "SELECT * FROM gallery";
}

$res_all = $con->query($sql2);
if ($res_all->num_rows > 0) {
    while ($row = $res_all->fetch_assoc()) {
        $data[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="./admin/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="./admin/css/sb-admin-2.css" rel="stylesheet">
    <style>
        .galleryimage img {
            width: 200px;
            height: auto;
            margin: 10px;
        }
        .hidden {
            display: none;
        }
        .image-row {
            display: flex;
            flex-wrap: wrap;
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
                    <h1>Temple Images</h1>
                    <div class="gallery">
                        <!-- Show "All Temples" button -->
                        <a href='galleries.php' class="btn btn-light">All Temples</a>
                        <?php
                        // Show buttons for each temple
                        foreach ($templedata as $row) {
                        ?>
                            <a href='galleries.php?id=<?php echo $row["id"]; ?>' class="btn btn-light"><?php echo $row["name"]; ?></a>
                        <?php } ?>
                    </div>

                    <div class="galleryimage">
                        <?php
                        // Display images in rows
                        $rowsToShowInitially = 3; // Show 3 rows initially
                        $imagesPerRow = 5; // Number of images per row
                        $totalRows = ceil(count($data) / $imagesPerRow); // Total rows based on images

                        foreach ($data as $index => $row) {
                            if ($index % $imagesPerRow == 0) {
                                $rowNumber = ($index / $imagesPerRow) + 1;
                                echo '<div class="image-row' . ($rowNumber > $rowsToShowInitially ? ' hidden' : '') . '">';
                            }
                            ?>
                            <img src="<?php echo 'admin/'.$row["image_path"]; ?>" alt="Temple Image" />
                            <?php
                            if (($index + 1) % $imagesPerRow == 0 || $index == count($data) - 1) {
                                echo '</div>';
                            }
                        }
                        ?>
                    </div>

                    <!-- Load More Button -->
                    <!-- <?php if ($totalRows > $rowsToShowInitially) : ?>
                        <button id="loadMore" class="btn btn-primary mt-3">Load More</button>
                    <?php endif; ?> -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    
    <!-- Bootstrap core JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script>
        // JavaScript for Load More functionality
        document.getElementById('loadMore')?.addEventListener('click', function () {
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