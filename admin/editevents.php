<?php session_start();
include('connection.php');
$data = [];
$sql = "select * from events where id='{$_GET["id"]}'";
$res = $con->query($sql);
if ($res->num_rows > 0) {
    $row = $res->fetch_assoc();
}
?>
<?php
if (isset($_POST["add_events"])) {
    $name = $_POST["eventname"];
    $detail = $_POST["eventdetails"];
    $date = $_POST["eventdate"];
    $contact = $_POST["contact"];

    $query = "UPDATE events SET name= '$name', details= '$detail', event_date='$date', contact='$contact' WHERE id={$_GET["id"]}";
    mysqli_query($con, $query);

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

                    <!-- Page Heading -->


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <div class="card-header">Update Events Information</div>
                            <div class="card-body">
                                <form action="#" method="POST" name="add_events" enctype="multipart/form-data">

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Temple</label>
                                    <div class="col-md-6">
                                        <select class="form-select" name="eventtempleid">
                                            <option selected>Please Select Temple</option>
                                            <?php
                                            $i = 0;
                                            foreach ($temples as $temple) {
                                                $i++;
                                            ?>

                                                <option value="<?php echo $temple["id"]; ?>"><?php echo $temple["name"]; ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                </div>

                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">Event Name</label>
                                        <div class="col-md-6">
                                            <input type="text" value="<?php echo $row["name"]; ?>" class="form-control" name="eventname" required autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">Details</label>
                                        <div class="col-md-6">
                                            <textarea rows="10" class="form-control" name="eventdetails">
                                        <?php echo $row["details"]; ?>
                                    </textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">Event Date</label>
                                        <div class="col-md-6">
                                            <input type="date" value="<?php echo $row["event_date"]; ?>" class="form-control" name="eventdate" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">Contact</label>
                                        <div class="col-md-6">
                                            <input type="text" value="<?php echo $row["contact"]; ?>" class="form-control" name="contact" required>
                                        </div>
                                    </div>

                                    

                                    <div class="col-md-6 offset-md-4">
                                        <input type="submit" value="Save" name="add_events">
                                    </div>
                                </form>
                            </div>

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
                        <span>Copyright &copy; Devalaya 2025</span>
                    </div>
                </div>
            </footer>
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