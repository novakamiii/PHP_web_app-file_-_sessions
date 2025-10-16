<?php
include 'db.php';
header('Content-Type: application/json');

$query = "SELECT id, prod_name AS name, price, category, stock, description, img, date_added FROM products";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo json_encode(['error' => mysqli_error($conn)]);
    exit;
}

$products = [];

while ($row = mysqli_fetch_assoc($result)) {
    $row['image'] = 'img/products/' . $row['category'] . '/' . $row['img'] . '.jpg';
    $products[] = $row;
}

echo json_encode($products);
exit;
?>
