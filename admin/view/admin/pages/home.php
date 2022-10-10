<?php 
require('./../layouts/header.php');
if (!isset($_SESSION)) { 
    session_start(); 
} 

if (!isset($_SESSION['account'])) {
    header('Location:login.php');
} else {
    header('Location:dashboard.php');
}

require('./../layouts/footer.php');