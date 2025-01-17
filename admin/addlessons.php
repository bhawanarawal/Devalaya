<?php session_start(); ?>
<?php
include('connection.php');


if (isset($_POST["add_lessons"])) {
    $quote = $_POST["lesson_quote"];
    $source = $_POST["lesson_source"];

    mysqli_query($con, "INSERT INTO lessons (quote, source) VALUES ('$quote', '$source')");
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
                        <div class="card-header">New Lesson</div>
                        <div class="card-body">
                            <form action="#" method="POST" name="add_events" enctype="multipart/form-data">

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Quote</label>
                                    <div class="col-md-4">
                                        <textarea rows="8" class="form-control" name="lesson_quote"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Source</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="lesson_source" required autofocus>
                                    </div>
                                </div>

                                <div class="col-md-4 offset-md-4">
                                    <input type="submit" value="Save" name="add_lessons">
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