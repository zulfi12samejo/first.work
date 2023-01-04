<?php 
	include('db.php');
	$uname = $_POST['username'];
	$email= $_POST['email'];
	$password= $_POST['password'];

	if($con){
		
		$sql = "INSERT INTO user (name,email,password)VALUES (:n,:email,:password)";
		
try{
		$query = $con->prepare($sql);

		$query->bindParam(':n',$uname);
		$query->bindParam(':email',$email);
		$query->bindParam(':password',$password);
		$res = $query->execute();
		if($res){
			echo "Data inserted";
		}
	}catch(PDOException $e){
		echo $e->getMessage();
	}
	}
?>