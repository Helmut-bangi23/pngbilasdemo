<?php

include './include/header.php';
include './include/navbar.php';

?>

<!-- /////////////////////////////////////////////////Main//////////////////////////////////////////////////////////// -->

<div class="container mt-4 mb-5">

    <!-- Welcome Text -->
    <div class="text-center mb-5">
        <h2 class="display-5">👋 Welcome to Our Blog Page</h2>
        <p class="lead text-muted">Discover the latest updates, insights, and stories here.</p>
    </div>

    <div class="row">

      <?php
      include 'Sql/config.php';

      $sql = "SELECT * FROM add_product";
      $table = mysqli_query($conn, $sql);
      $i = 1;
      if(mysqli_num_rows($table) > 0){
          while ($row = mysqli_fetch_array($table)) {
      ?>

      <div class="col col-md-4 pl-5">
        <div class="card" style="width: 20rem;">
          <!-- Product Image -->
          <img class="card-img-top img-fluid img-responsive rounded product-image" 
               src="/E-commerces/E-Commerce/admin/index/img/uploads/<?php echo $row['pimg'];?>"
               alt="<?php echo $row['pname']; ?>">

          <div class="card-block">
            <!-- Product Name -->
            <h4 class="card-title"><?php echo $row['pname'];?></h4>

            <!-- Product Description -->
            <p class="card-text">Description: <?php echo $row['pdesc'];?></p>

            <!-- Ratings -->
            <div class="d-flex flex-row mb-3">
              <div class="ratings mr-2">
                <?php 
                  $rating = !empty($row['prating']) ? (float)$row['prating'] : 0; 

                  // Full stars
                  for ($star = 1; $star <= floor($rating); $star++) {
                      echo '<i class="fa fa-star text-warning"></i>';
                  }

                  // Half star if needed
                  if ($rating - floor($rating) >= 0.5) {
                      echo '<i class="fa fa-star-half-o text-warning"></i>';
                  }

                  // Empty stars
                  for ($star = ceil($rating); $star < 5; $star++) {
                      echo '<i class="fa fa-star-o text-muted"></i>';
                  }
                ?>
              </div>
              <span><?php echo number_format($rating, 1); ?>/5</span>
            </div>

          </div>
        </div>
      </div>

      <?php
          $i++;
          }
      }

      // Close connection
      mysqli_close($conn);
      ?>

<?php
include 'include/footer.php';
?>   
