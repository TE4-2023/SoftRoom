<?php
require '../connect.php';
session_start();
session_destroy(); 
header("Location: ../../logga-in"); 
exit();
?>