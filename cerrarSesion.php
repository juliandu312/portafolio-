<?php
session_start();
if (empty($_SESSION['AdminID'])) {
    header('location:index.php');
    exit();
}
session_unset();
session_destroy();
header('location:index.php');