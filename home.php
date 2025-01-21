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

$events = [];
$eventres = $con->query("select * from events order by event_date desc");
if ($eventres->num_rows > 0) {
  while ($row = $eventres->fetch_assoc()) {
    $events[] = $row;
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
  <h3><i class="fa-solid fa-om"></i>Temples<i class="fa-solid fa-om"></i></h3>
  <h1><b>Most Popular Temples</b></h1>
  <!-- Carousel wrapper -->
  <div
    id="carouselMultiItemExample"
    data-mdb-carousel-init class="carousel slide carousel-dark text-center"
    data-mdb-ride="carousel">
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
                    <a href='temples.php?id=<?php echo $row["id"]; ?>' data-mdb-ripple-init class='btn btn-light'>See More</a>

                  </div>
                </div>
              </div>
            <?php } ?>
            <div class="temple-button">
              <a href="alltemple.php" data-mdb-ripple-init class="btn btn-primary">See More Temples</a>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- Inner -->
  </div>
</section>

<section class="section-about">
  <h3><i class="fa-solid fa-om"></i>Sacred Knowledge<i class="fa-solid fa-om"></i></h3>
  <h1><b>Some Life Lessons</b></h1>
  <div id="image">

    <div class="bottom-div">
      <img src="images/black-1.webp" alt="">

    </div>
  </div>
  <div class="text">
    <h2><i class="fa-solid fa-om"></i> We Hindus believe in the holy Vedas, the eternal light of divine knowledge</h2>
    <h4>"Satyameva Jayate" - Truth alone triumphs</h4>
    <ul class="two-column-list">
      <p><i class="fa-solid fa-check"></i> Rig-veda</p>
      <p><i class="fa-solid fa-check"></i>Sama-Veda</p>
      <p><i class="fa-solid fa-check"></i>Yajur-Veda</p>
      <p><i class="fa-solid fa-check"></i>Atharva-Veda</p>
    </ul>


    <a href="lessons.php" class="btn btn-primary btn-lg">learn More</a>
  </div>

</section>
<section class="section-events">
  <h3><i class="fa-solid fa-om"></i>Festivals<i class="fa-solid fa-om"></i></h3>
  <h1><b>Some Events</b></h1>

  <div class="eventsslider-container">
  <div class="eventsslider">
    <?php
    $i = 0;
    foreach ($events as $row) {
      $i++;
    ?>
      <div class="eventscard" style="width: 15rem;">
        <img class="card-img-top" src="images/home-12.webp" alt="Card image cap">
        <div class="eventscard-body">
          <h5 class="eventscard-title"><b><?php echo $row["name"]; ?></b></h5>
          <h2 class="card-title">Date: <i class="fa-solid fa-calendar-days"></i><b><?php echo $row["event_date"]; ?></b></h2>
          <p class="eventscard-text"><?php echo substr($row["details"], 0, 100) . '...'; ?></p>
          <a href="temples.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">See More</a>
        </div>
      </div>
    <?php } ?>
  </div>
  <!-- Navigation Buttons -->
  <button class="prev-btn">❮</button>
  <button class="next-btn">❯</button>
</div>

</section>



<?php require_once 'footer.php'; ?>

<!-- MDB -->
<script src="script.js"></script>
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.1.0/mdb.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>