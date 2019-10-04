<?php
// FILE FOR LOGOUT ONLY

session_start();

if (session_destroy()){
	header("location:../login.php");
}
?>