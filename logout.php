<?php
session_start();

if (isset($_SESSION['account'])) {
    session_unset();
    header('Location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatile" content="IE=edge" />
    <title>BT2</title>
</head>
<body>
    <!-- <a href="login.php">Quay về trang đăng nhập</a> -->
</body>
</html>