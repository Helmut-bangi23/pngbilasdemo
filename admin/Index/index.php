<!DOCTYPE html>
<html>
<head>
	<title>Ecommerce Software Admin</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>

<body>

<?php
include 'include/sidebar.php';
include 'include/top-header.php';
include 'Sql/config.php';

// Total Sales
$sql_sales = "SELECT SUM(product_price) AS total_sales FROM ordered WHERE status = 'Delivered'";
$res_sales = mysqli_query($conn, $sql_sales);
$row_sales = mysqli_fetch_assoc($res_sales);
$total_sales = $row_sales['total_sales'] ?? 0;

// Total Orders
$sql_orders = "SELECT COUNT(*) AS total_orders FROM ordered";
$res_orders = mysqli_query($conn, $sql_orders);
$row_orders = mysqli_fetch_assoc($res_orders);
$total_orders = $row_orders['total_orders'] ?? 0;

// Total Products
$sql_products = "SELECT COUNT(*) AS total_products FROM add_product";
$res_products = mysqli_query($conn, $sql_products);
$row_products = mysqli_fetch_assoc($res_products);
$total_products = $row_products['total_products'] ?? 0;
?>

<div class="container-fluid body-area mt-5">
	<div class="row mt-3">
		<div class="col-md-12 col-sm-12">
			<h5 class="pt-4 ml-3">Dashboard</h5>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-sm-12 card-area  mt-3">
			<div class="card">
				<div class="parent">
					<div class="icon"><i class="fas fa-rupee-sign"></i></div>
					<div class="total-area">
						<p class="text-muted pt-4">Total Sales</p>
						<h6><i class="fas fa-rupee-sign"></i> <?php echo number_format($total_sales, 2); ?></h6>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-sm-12 card-area mt-3">
			<div class="card">
				<div class="parent">
					<div class="icon"><i class="fas fa-shopping-cart" id="icon"></i></div>
					<div class="total-area2">
						<p class="text-muted pt-4">Total Orders</p>
						<h6><?php echo $total_orders; ?></h6>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-sm-12 card-area mt-3">
			<div class="card">
				<div class="parent">
					<div class="icon"><i class="fas fa-shopping-bag" id="icon2"></i></div>
					<div class="total-area2">
						<p class="text-muted pt-4">Total Products</p>
						<h6><?php echo $total_products; ?></h6>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Latest Orders -->
	<div class="col-md-12 col-sm-12 lower-area mt-5 p-3">
		<h5>Latest Orders</h5>
		<div class="table-responsive mt-3">
			<table class="table noborder">
				<thead>
					<tr>
						<th>ID</th>
						<th>Customer</th>
						<th>Product</th>
						<th>Price</th>
						<th>Status</th>
						<th>Delivery Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$sql = "SELECT ID, customer_name, product_name, product_price, status, Delivery_Date 
						FROM ordered
						ORDER BY Delivery_Date DESC 
						LIMIT 10";
				$result = mysqli_query($conn, $sql);

				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						// Status styling
						$statusClass = "";
						if ($row['status'] == "Delivered") {
							$statusClass = "text-success'><mark class='bgs";
						} elseif ($row['status'] == "Cancelled") {
							$statusClass = "text-danger'><mark class='bgd";
						} elseif ($row['status'] == "Pending") {
							$statusClass = "text-warning'><mark class='bgw";
						} else {
							$statusClass = "text-muted";
						}

						echo "<tr>
								<td class='text-muted'>{$row['ID']}</td>
								<td>{$row['customer_name']}</td>
								<td>{$row['product_name']}</td>
								<td class='text-muted'>$" . number_format($row['product_price'], 2) . "</td>
								<td class='{$statusClass}'>{$row['status']}</mark></td>
								<td class='text-muted'>" . date('d.m.Y', strtotime($row['Delivery_Date'])) . "</td>
								<td>
									<form method='post' action='update_order_status.php' style='display:inline-block;'>
										<input type='hidden' name='order_id' value='{$row['ID']}'>
										<button type='submit' name='action' value='Approved' class='btn btn-success btn-sm'>Approve</button>
									</form>
									<form method='post' action='update_order_status.php' style='display:inline-block;'>
										<input type='hidden' name='order_id' value='{$row['ID']}'>
										<button type='submit' name='action' value='Cancelled' class='btn btn-danger btn-sm'>Disapprove</button>
									</form>
								</td>
							  </tr>";
					}
				} else {
					echo "<tr><td colspan='7' class='text-center text-muted'>No orders found</td></tr>";
				}
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php include 'include/footer.php'; ?>

</body>
</html>
