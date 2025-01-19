<?php
session_start();
include('./admin/connection.php');
$data = [];
$sql = "select * from temple order by made_year desc limit 3";
$res = $con->query($sql);
if ($res->num_rows > 0) {
  while ($row = $res->fetch_assoc()) {
    $data[] = $row;
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

</body>

</html>

<section>
  <div id="carouselExampleCaptions" class="carousel slide carousel-fade ">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/home-3.webp" alt="...">
        <div class="carousel-caption ">
          <h1><b>श्रीमद भागवत गीता</b></h1>
          <p>“Believe me ! I am the only truth”</p>
        </div>
      </div>

      <div class="carousel-item">
        <img src="images/home-4.webp" alt="...">
        <div class="carousel-caption">
          <h1><b>BHAGAVAD GITA :</b></h1>
          <p>“You are only entitled to the action, never to its fruits.”</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</section>

<section class="temples-header">
  <h1><b>Most Popular Temples</b></h1>
  <!-- Carousel wrapper -->
  <div
    id="carouselMultiItemExample"
    data-mdb-carousel-init class="carousel slide carousel-dark text-center"
    data-mdb-ride="carousel">
    <!-- Controls -->
    <!-- <div class="d-flex justify-content-center mb-2">
      <button data-mdb-button-init
        class="carousel-control-prev position-relative"
        type="button"
        data-mdb-target="#carouselMultiItemExample"
        data-mdb-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button data-mdb-button-init
        class="carousel-control-next position-relative"
        type="button"
        data-mdb-target="#carouselMultiItemExample"
        data-mdb-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div> -->
    <!-- Inner -->
    <div class="carousel-inner py-4">
      <!-- Single item -->
      <div class="carousel-item active">
        <div class="container">
          <div class="row">

            <?php
            $i = 0;
            foreach ($data as $row) {
              $i++;
            ?>
              <div class="col-lg-4">
                <div class="card">
                  <img
                    src="images/home-1.webp"
                    class="card-img-top">
                  <div class="card-body">
                    <h5 class="card-title"><b><?php echo $row["name"]; ?></b></h5>
                    <p class="card-text">
                      <?php echo substr($row["details"], 0, 100) . '...'; ?>
                    </p>
                    <a href='temples.php?id=<?php echo $row["id"]; ?>' data-mdb-ripple-init class='btn btn-primary'>See More</a>
                    
                  </div>
                </div>
              </div>
            <?php } ?>
            <a href="" data-mdb-ripple-init class="btn btn-primary">See More Temples</a>
          </div>
        </div>
      </div>
     
    </div>
    <!-- Inner -->
  </div>
</section>

<section class="section-about">
  <h1><b>Exploring Our Purpose</b></h1>
  <div id="image">

    <div class="bottom-div">


      <img src="images/home-13.webp" alt="">

    </div>

    <div class="top-div">

      <img src="images/home-10.webp" alt="">
    </div>
    <div class="third-div">

      <img src="images/image-12.jpg" alt="">

    </div>
  </div>
  <div id="text">
    <h1><i class="fa-solid fa-om"></i> We Hindus Believe In The Holy vedas :</h1>

    <p>"Where the walls of every temple whisper history, and every prayer becomes a connection to the divine."</p>


    <a href="about.php" class="btn btn-primary btn-lg">learn More</a>
  </div>

</section>

<section class="section-deities">
  <h1><b>Deities We Reverence</b></h1>
  <div class="responsive">
    <div class="gallery">
      <a target="_blank" href="img_5terre.jpg">
        <img src="images/home-14.webp" alt="Cinque Terre" width="600" height="400">
      </a>
      <div class="desc">Add a description of the image here</div>
    </div>
  </div>


  <div class="responsive">
    <div class="gallery">
      <a target="_blank" href="img_forest.jpg">
        <img src="img_forest.jpg" alt="Forest" width="600" height="400">
      </a>
      <div class="desc">Add a description of the image here</div>
    </div>
  </div>

  <div class="responsive">
    <div class="gallery">
      <a target="_blank" href="img_lights.jpg">
        <img src="img_lights.jpg" alt="Northern Lights" width="600" height="400">
      </a>
      <div class="desc">Add a description of the image here</div>
    </div>
  </div>

  <div class="responsive">
    <div class="gallery">
      <a target="_blank" href="img_mountains.jpg">
        <img src="img_mountains.jpg" alt="Mountains" width="600" height="400">
      </a>
      <div class="desc">Add a description of the image here</div>
    </div>
  </div>

  <div class="clearfix"></div>
</section>




<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.1.0/mdb.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>