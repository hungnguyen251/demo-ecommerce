<?php 
require('./../layouts/header.php');

if (!isset($_SESSION['account'])) {
    header('Location:login.php');
} else {
    header('Location:home.php');
}

require('./../layouts/footer.php');