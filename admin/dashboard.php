<?php
session_start();
require '../vendor/autoload.php';
$db = new PDO('mysql:host=localhost;dbname=devalaya_db', 'root', '');
$auth = new \Delight\Auth\Auth($db);
if (!$auth->isLoggedIn()) {
    header("location:/devalaya/auth/login.php");
}
else if (!$auth->hasAnyRole(\Delight\Auth\Role::SUPER_ADMIN, \Delight\Auth\Role::ADMIN)) {
    header("location:/devalaya/home.php");
}

include('connection.php');
$result = $con->query("select count(*) as 'total' from temple");
$row = mysqli_fetch_array($result);
$sitecount = $row['total'];

$resultgallery = $con->query("select count(*) as 'total' from gallery");
$rowgallery = mysqli_fetch_array($resultgallery);
$imagecount = $rowgallery['total'];

$resultlessons = $con->query("select count(*) as 'total' from lessons");
$rowlessons = mysqli_fetch_array($resultlessons);
$lessonscount = $rowlessons['total'];

$resultevents = $con->query("select count(*) as 'total' from events");
$rowevents = mysqli_fetch_array($resultevents);
$eventscount = $rowevents['total'];



// $sql = "select t.name temple_name, count(f.temple_id) fav_count , count(r.temple_id) comments from temple t 
// join favourite f on f.temple_id=t.id
// left join reviews r on r.temple_id=t.id
// group by f.temple_id,r.temple_id";
// $sql="SELECT 
//             t.name AS temple_name, 
//             (SELECT COUNT(*) FROM favourite f WHERE f.temple_id = t.id) AS fav_count, 
//             (SELECT COUNT(*) FROM reviews r WHERE r.temple_id = t.id) AS comments ,
//         FROM temple t";
$sql = "SELECT 
            t.name AS temple_name, 
            (SELECT COUNT(*) FROM favourite f WHERE f.temple_id = t.id) AS fav_count, 
            (SELECT COUNT(*) FROM reviews r WHERE r.temple_id = t.id) AS comments,
            (SELECT AVG(rating) FROM reviews r WHERE r.temple_id = t.id) AS average_rating
            -- (SELECT SUM(rating) FROM reviews r WHERE r.temple_id = t.id) AS total_rating
        FROM temple t limit 9";
$data = [];
$res = $con->query($sql);
if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
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

                    <!-- Content Row -->
                    <div class="row">


                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Heritage Sites</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sitecount; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-house fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Gallery Images</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $imagecount; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-image fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Lessons
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $lessonscount; ?></div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-book fa-2x "></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total Events</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $eventscount; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-calendar-days fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->


                    <!-- Pie Chart -->


                    <table class="table table-bordered ">
                        <thead class="table-success text-black">
                            <tr>
                                <th scope="col">SN</th>
                                <th scope="col">Temple Name</th>
                                <th scope="col">Favorite Count</th>
                                <th scope="col">Comment Count</th>
                                <th scope="col">Total Rating</th>
                            </tr>
                        </thead>
                        <tbody><?php
                                $i = 0;
                                foreach ($data as $row) {
                                    $i++;
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo $row["temple_name"]; ?></td>
                                    <td><?php echo $row["fav_count"]; ?></td>
                                    <td><?php echo $row["comments"]; ?></td>
                                    <td><?php echo number_format($row["average_rating"],2); ?></td>

                                </tr>
                            <?php } ?>


                        </tbody>
                    </table>
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