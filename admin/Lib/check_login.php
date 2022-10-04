<?php 
if (!isset($_SESSION)) { 
    session_start(); 
} 

if (!isset($_SESSION['account'])) {
  header('Location:login.php');
}

?>