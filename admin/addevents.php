<?php session_start(); ?>
<?php
include('connection.php');


if (isset($_POST["add_events"])) {
    $name = $_POST["eventname"];
    $detail = $_POST["eventdetails"];
    $date = $_POST["eventdate"];
    $contact = $_POST["contact"];

    mysqli_query($con, "INSERT INTO events (name, details, event_date, contact) VALUES ('$name', '$detail',' $date','$contact')");
    mysqli_insert_id($con);

    
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

<div class="container-fluid">


                    <div class="card">
                        <div class="card-header">New Events Information</div>
                        <div class="card-body">
                            <form action="#" method="POST" name="add_events" enctype="multipart/form-data">

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Event Name</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="eventname" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Details</label>
                                    <div class="col-md-6">
                                        <textarea rows="10" class="form-control" name="eventdetails"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Event Date</label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" name="eventdate">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Contact</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="contact">
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                    <input type="submit" value="Save" name="add_events">
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
                </div>
            <!-- /.container-fluid -->

        </div>

    </div>

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
