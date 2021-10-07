<?php 

	function db_connect(){
	    $conn = new PDO("mysql:host=localhost;dbname=fc_thaina", 'root', "");
	  
	    return $conn;
	}
?>