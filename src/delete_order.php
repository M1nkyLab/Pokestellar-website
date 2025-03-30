<?php
require 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->prepare("DELETE FROM orders WHERE id = ?")->execute([$id]);
}

header("Location: admin.php");
?>
