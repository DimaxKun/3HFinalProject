<?php
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];

    $sql = "UPDATE Services SET service_name='$name', description='$desc', price='$price' WHERE service_id='$id'";
    if ($conn->query($sql) === TRUE) {
        header("Location: admin_dashboard.php");
    } else {
        echo "Error updating service: " . $conn->error;
    }
}
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM Services WHERE service_id='$id'")->fetch_assoc();
?>
<form method="POST">
    <input type="hidden" name="id" value="<?= $result['service_id'] ?>">
    <label>Name: <input type="text" name="name" value="<?= $result['service_name'] ?>"></label><br>
    <label>Description: <textarea name="desc"><?= $result['description'] ?></textarea></label><br>
    <label>Price: <input type="text" name="price" value="<?= $result['price'] ?>"></label><br>
    <button type="submit">Update</button>
</form>
