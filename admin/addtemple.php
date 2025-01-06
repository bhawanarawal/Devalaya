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

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="style.css">

    <link rel="icon" href="Favicon.png">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Register Form</title>
</head>

<body>


    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
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
        </div>
        </div>

    </main>
</body>

</html>
<script>
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    toggle.addEventListener('click', function() {
        if (password.type === "password") {
            password.type = 'text';
        } else {
            password.type = 'password';
        }
        this.classList.toggle('bi-eye');
    });
</script>