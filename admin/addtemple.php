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

<?php require_once '../header.php'; ?>


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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>