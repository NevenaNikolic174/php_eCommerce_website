<?php
include("path.php");
session_start();

unset($_SESSION['id']); 
unset($_SESSION['username']);
unset($_SESSION['role']);
unset($_SESSION['message']); 
unset($_SESSION['type']);

session_destroy();

header('location: http://localhost/webio/index.php');

?>