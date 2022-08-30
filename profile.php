<?php
session_start(); 
echo "Thông tin tài khoản của bạn: ";
echo "<br>";
print_r("Tên: . " . $_SESSION['account']['name'] . ""); 
echo '<br>';
print_r("Email: . " . $_SESSION['account']['email'] . ""); 
echo '<br>';
print_r("Password: . " . $_SESSION['account']['password'] . ""); 
echo '<br>';

if (!isset($_SESSION['account'])) {
    header('Location:login.php');
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
    <a href="logout.php">Thoát</a>

</body>
</html>