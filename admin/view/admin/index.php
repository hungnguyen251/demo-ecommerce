<?php 
require('layouts/header.php');

// if (isset($_GET['controller'])) {
// 	$controller = $_GET['controller'];
// } else {
// 	$controller = '';
// }

// switch ($controller) {
// 	case 'test':
// 		echo "trang test";
// 		break;
	
// 	default:
// 		require('pages/login.php');
// 		break;
// }
if (!isset($_SESSION['account'])) {
    header('Location:login.php');
} else {
    header('Location:home.php');
}

require('layouts/footer.php');