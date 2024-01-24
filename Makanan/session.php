<?php
session_start();
include 'conn.php';
if(!isset($_SESSION ['userID']) || (trim($_SESSION['userID']) == '')){
	header('location:index.php');
	exit();
}

$session_id = $_SESSION['userID']; 
$session_id = $_SESSION['username']; 

?>