<?php 
	$db = new mysqli('localhost', 'root', '', 'bdnc');
	if(mysqli_connect_errno()){
 		echo mysqli_connect_error();
	} 
?>