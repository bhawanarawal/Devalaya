<?php session_start(); ?>
<?php
include('connection.php');


if (isset($_POST["add_temple"])) {
    $name = $_POST["templename"];
    $detail = $_POST["templedetails"];
    $deity = $_POST["templedeity"];
    $address = $_POST["templeaddress"];
    $madeyear = $_POST["templemadeyear"];

    mysqli_query($con, "INSERT INTO temple (name, details, address, deity, made_year) VALUES ('$name', '$detail',' $address','$deity','$madeyear')");
    $temple_id = mysqli_insert_id($con);

    $uploadDirectory = "./temple_gallery/";
    foreach ($_FILES['templeimages']['tmp_name'] as $key => $value) {

        $file_tmpname = $_FILES['templeimages']['tmp_name'][$key];
        $file_name = $_FILES['templeimages']['name'][$key];
        $time = date("d-m-Y") . "-" . time();
        $file_name = $time . "-" . $file_name;
        // Set upload file path
        $filepath = $uploadDirectory . $file_name;

        move_uploaded_file($file_tmpname, $filepath);
        $sql = "insert into gallery(image_path,temple_id) values ('$filepath',$temple_id)";
        mysqli_query($con, $sql);
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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php require_once('includes/sidebar.php'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php require_once('includes/header.php'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <div class="card">
                        <div class="card-header">New Temple site Information</div>
                        <div class="card-body">
                            <form action="#" method="POST" name="add_temple" enctype="multipart/form-data">

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Temple Name</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="templename" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Details</label>
                                    <div class="col-md-6">
                                        <textarea rows="10" class="form-control" name="templedetails"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Deity</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="templedeity" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Address</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="templeaddress" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Made Year</label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" name="templemadeyear">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Images</label>
                                    <div class="col-md-6">
                                        <input type="file" accept="image/*" multiple class="form-control" name="templeimages[]">
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                    <input type="submit" value="Save" name="add_temple">
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy;Devalaya 2025</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"></script>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
</body>

</html>