<?php
include('db.php');
$query = "SELECT SUM(quantity) AS count FROM tbl_cart";
$result = mysqli_query($connection, $query);
$count = mysqli_fetch_assoc($result)['count'];
echo json_encode(['count' => $count]);
?>
