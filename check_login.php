<?php
session_start();
if(!isset($_SESSION['admin_name'])){
	echo "<script>parent.location.href='login.html';</script>";
}
?>
