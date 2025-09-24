<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Order Now!!!</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      font-family: Arial;
      font-size: 17px;
      padding: 8px;
    }

    * {
      box-sizing: border-box;
    }

    .row {
      display: flex;
      flex-wrap: wrap;
      margin: 0 -16px;
    }

    .col-25 {
      flex: 25%;
      padding: 0 16px;
    }

    .col-50 {
      flex: 50%;
      padding: 0 16px;
    }

    .col-75 {
      flex: 75%;
      padding: 0 16px;
    }

    .container {
      background-color: #f2f2f2;
      padding: 5px 20px 15px 20px;
      border: 1px solid lightgrey;
      border-radius: 3px;
    }

    input[type=text] {
      width: 100%;
      margin-bottom: 20px;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    label {
      margin-bottom: 10px;
      display: block;
    }

    .icon-container {
      margin-bottom: 20px;
      padding: 7px 0;
      font-size: 24px;
    }

    .btn {
      background-color: #04AA6D;
      color: white;
      padding: 12px;
      margin: 10px 0;
      border: none;
      width: 100%;
      border-radius: 3px;
      cursor: pointer;
      font-size: 17px;
    }

    .btn:hover {
      background-color: #45a049;
    }

    a {
      color: #2196F3;
    }

    hr {
      border: 1px solid lightgrey;
    }

    span.price {
      float: right;
      color: grey;
    }

    @media (max-width: 800px) {
      .row {
        flex-direction: column-reverse;
      }

      .col-25 {
        margin-bottom: 20px;
      }
    }
  </style>
</head>

<body>

  <h1 class="btn btn-primary text-center">Order Now!!!</h1>

  <div class="row mt-1 mb-1 justify-content-center">
    <div class="col-md-12 text-center">
      <h5><a href="/E-commerces/E-Commerce/User/Index/index.php" style="text-decoration: none; font-weight: bold;">Return Home</a></h5>
    </div>
  </div>

  <div class="row p-3 justify-content-center">
    <div class="col-md-10">

      <div class="container">
        <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i></span></h4>

        <div class="card">
          <div class="card-header">
            <h4 class="text-center">View Orders</h4>
          </div>

          <div class="card-body">
            <table class="table table-responsive table-striped table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Product Name</th>
                  <th>Product Price</th>
                  <th>Product Image</th>
                  <th>Product Description</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include 'Sql/config.php';

                $sql = "SELECT * FROM cart";
                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['ID']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['product_name']) . "</td>";
                    echo "<td>$" . htmlspecialchars($row['product_price']) . "</td>";
                    echo "<td style='text-align:center;'><img src='/E-commerces/E-Commerce/admin/index/img/uploads/" . htmlspecialchars($row['product_image']) . "' class='img-thumbnail' height='50px' width='50px'></td>";
                    echo "<td>" . htmlspecialchars($row['product_desc']) . "</td>";
                    echo "</tr>";
                  }
                } else {
                  echo "<tr><td colspan='5'>No items in cart</td></tr>";
                }

                mysqli_close($conn);
                ?>
              </tbody>
            </table>
          </div>
        </div>

        <hr>
        <p>Total <span class="price" style="color:black"><b>$
            <?php
            include 'Sql/config.php';
            $fetch = "SELECT SUM(product_price) AS count_price FROM cart";
            $results = mysqli_query($conn, $fetch);
            $total = $results ? mysqli_fetch_assoc($results)['count_price'] : 0;
            echo number_format($total, 2);
            mysqli_close($conn);
            ?>
          </b></span></p>
      </div>

      <div class="container mt-4">
        <form action="Sql/order.php" method="post">
          <div class="row p-4">
            <div class="col-md-6 col-sm-12">
              <h3>Billing Address</h3>
              <label for="fname"><i class="fa fa-user"></i> Full Name</label>
              <input type="text" id="fname" name="firstname" placeholder="Enter Name" required>
              <label for="email"><i class="fa fa-envelope"></i> Email</label>
              <input type="text" id="email" name="email" placeholder="Enter Email" required>
              <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
              <input type="text" id="adr" name="address" placeholder="Enter Address" required>
              <label for="city"><i class="fa fa-institution"></i> City</label>
              <input type="text" id="city" name="city" placeholder="Enter City">
              <div class="row">
                <div class="col-50">
                  <label for="state">State</label>
                  <input type="text" id="state" name="state" placeholder="State">
                </div>
                <div class="col-50">
                  <label for="zip">Pin Code</label>
                  <input type="text" id="zip" name="zip" placeholder="Pin Code">
                </div>
              </div>
            </div>

            <div class="col-6">
              <h3>Payment</h3>
              <label>Accepted Cards</label>
              <div class="icon-container">
                <i class="fa fa-cc-visa" style="color:navy;"></i>
                <i class="fa fa-cc-amex" style="color:blue;"></i>
                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                <i class="fa fa-cc-discover" style="color:orange;"></i>
              </div>
              <label for="cname">Name on Card</label>
              <input type="text" id="cname" name="cardname" placeholder="Enter Name">
              <label for="ccnum">Credit card number</label>
              <input type="text" id="ccnum" name="cardnumber" placeholder="Enter Card Number">
              <label for="expmonth">Exp Month</label>
              <input type="text" id="expmonth" name="expmonth" placeholder="Exp Month">
              <div class="row">
                <div class="col-50">
                  <label for="expyear">Exp Year</label>
                  <input type="text" id="expyear" name="expyear" placeholder="Exp Year">
                </div>
                <div class="col-50">
                  <label for="cvv">CVV</label>
                  <input type="text" id="cvv" name="cvv" placeholder="CVV">
                </div>
              </div>
            </div>
          </div>

          <label>
            <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
          </label>
          <button type="submit" name="add_order" class="btn btn-primary">Proceed to checkout</button>
        </form>
      </div>

    </div>
  </div>

  <?php include 'include/footer.php'; ?>

</body>
</html>
