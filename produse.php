<?php
include("config.php");
include("navigationbar.php");

$sql = "select* from honey";
$result = $conn->query($sql);
echo '<img src = "imagini/logo.png">';
echo '<img src = "imagini/logo.png">';
while ($row = $result->fetch_assoc()) {
    echo '<span>' . $row["honey_name"] . '</span>';
    echo '<span>' . $row["honey_price"] . '</span>';
    echo '<span>' . $row["honey_quantity"] . '</span>';
}