<?php
//"use a server site is local host"//
	$server = 'localhost';
	$user   = 'root';
	$pass   = '';
	
	try{
		$con = new PDO("mysql:host=$server;dbname=fb",$user,$pass);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		}catch(PDOException  $e){
		echo $e->getMessage();
	}

 ?>
