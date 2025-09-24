

<?php

include 'include/header.php';
include 'include/navbar.php';

?>



  <!-- /////////////////////////////////////////////////Main//////////////////////////////////////////////////////////// -->

  <div class="container mt-4 mb-5">
    <div class="row">

  

      <?php

include 'Sql/config.php';


$sql = "SELECT * FROM add_product";

$table = mysqli_query($conn, $sql);
$i = 1;
if(mysqli_num_rows($table)>0){
    while ($row = mysqli_fetch_array($table)) {
     ?>



      <div class="col col-md-4 pl-5">
        <div class="card" style="width: 20rem;">
      
    <!----------- Fix image path-->
          <img class="card-img-top img-fluid img-responsive rounded product-image" 
          src="/E-commerces/E-Commerce/admin/index/img/uploads/<?php echo $row['pimg'];?>"
            alt="<?php echo $row['pname']; ?>">

          <div class="card-block">
            <h4 class="card-title"><?php echo $row['pname'];?></h4>
            <p class="card-text">Price: $.<?php echo $row['pprice'];?></p>
            <p class="card-text">Description: <?php echo $row['pdesc'];?></p>

    <!-- Ratings -->
          <div class="d-flex flex-row mb-3">
  <div class="ratings mr-2">
    <?php 
      // Make sure the column exists in your table
      $rating = !empty($row['prating']) ? (float)$row['prating'] : 0; 

      // Show full stars
      for ($star = 1; $star <= floor($rating); $star++) {
          echo '<i class="fa fa-star text-warning"></i>';
      }

      // Show half star if needed
      if ($rating - floor($rating) >= 0.5) {
          echo '<i class="fa fa-star-half-o text-warning"></i>';
      }

      // Show empty stars
      for ($star = ceil($rating); $star < 5; $star++) {
          echo '<i class="fa fa-star-o text-muted"></i>';
      }
    ?>
  </div>
  <span><?php echo number_format($rating, 1); ?>/5</span>
          </div>
            <!------------------ Add to Cart--->
            <form method="post" action="Sql/cart.php" enctype="multipart/form-data">
              <input type="hidden" name="product_image" value="<?php echo $row['pimg'];?>">
              <input type="hidden" name="product_name" value="<?php echo $row['pname']; ?>">
              <input type="hidden" name="product_price" value="<?php echo $row['pprice']; ?>">
              <input type="hidden" name="product_desc" value="<?php echo $row['pdesc']; ?>">
              <input type="submit" value="add to cart" name="add_to_cart" class="btn btn-primary">
            </form>


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