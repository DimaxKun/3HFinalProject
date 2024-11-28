<?php
include 'db.php';
$id = $_GET['id'];
$conn->query("DELETE FROM Services WHERE service_id='$id'");
header("Location: admin_dashboard.php");
?>
