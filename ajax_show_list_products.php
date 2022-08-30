<?php
require_once "./assets/database/db-connect.php";
header('Content-Type: application/json');

$sql = "SELECT * FROM products WHERE promo is null ";
$ssql = "SELECT * FROM products WHERE promo is not null ";

$resultPromo = mysqli_query($conn, $ssql);
$resultNoPromo = mysqli_query($conn, $sql);

$productNoPromo = [];
$productPromo = [];

while ($productNoPromo = getData($resultNoPromo)){
    $dataNoPromo[] = $productNoPromo;
}

while ($productPromo = getData($resultPromo)){
    $datatPromo[] = $productPromo;
}

echo json_encode([
    'products_promo' => $datatPromo,
    'products' => $dataNoPromo,
]);

exit;
?>