<?php 
//"add from detabase from php user name in thje post and email nad password"//
	include('db.php');
	$uname = $_POST['username'];
	$email= $_POST['email'];
	$password= $_POST['password'];

	if($con){
		
		$sql = "INSERT INTO user (name,email,password)VALUES (:n,:email,:password)";
		
try{
		$query = $con->prepare($sql);

	//"query whaere user name  eamil and password add after it will excecute them"//
		$query->bindParam(':n',$uname);
		$query->bindParam(':email',$email);
		$query->bindParam(':password',$password);
		$res = $query->execute();
		if($res){
			//"in this data is inserted uploaded"//
			echo "Data inserted";
		}
	}catch(PDOException $e){
		echo $e->getMessage();
	}
	}
?>
