<?php
session_start();


unset($_SESSION['store']);

header('location:index.php');

?>