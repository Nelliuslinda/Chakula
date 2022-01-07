<?php
include("path.php");
session_start();
unset($_SESSION['UserID']);
unset($_SESSION['username']);
unset($_SESSION['Admin']);
unset($_SESSION['message']);
unset($_SESSION['type']);
session_destroy();

header('location:' . BASE_URL . '/index.php');
?>