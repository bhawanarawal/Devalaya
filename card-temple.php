<div class="carousel-inner py-4">
      <!-- Single item -->
      <div class="carousel-item active">
        <div class="container">
          <div class="row">

            <?php
            $i = 0;
            foreach ($data as $row) {
              $i++;
              $sql = "select * from gallery where temple_id = ".$row['id']." limit 1";
              $res = $con->query($sql);
              
              $img = $res->fetch_assoc();
            ?>
              <div class="col-lg-4">
                <div class="card">
                  <img
                    src="admin/<?php echo $img['image_path'];?>"
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