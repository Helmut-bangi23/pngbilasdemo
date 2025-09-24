<?php
include 'Sql/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = intval($_POST['order_id']);
    $action   = $_POST['action'];

    if ($order_id > 0 && in_array($action, ['Approved', 'Cancelled'])) {
        $sql = "UPDATE ordered SET status = ? WHERE ID = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "si", $action, $order_id);
        mysqli_stmt_execute($stmt);
    }
}
header("Location: admin-dashboard.php"); // redirect back to dashboard
exit();
