<?php
include 'DataBase.php';

if(isset($_POST['save'])){
	$username =$_POST['username'];
	$password =$_POST['password'];
	$nume 	  =$_POST['Nume'];
	$prenume  =$_POST['Prenume'];
	
    global $conn;
	$sql ="INSERT INTO user (username,password,Nume,Prenume) VALUES('$username','$password','$nume','$prenume')";
	mysqli_query($conn,$sql);
	
	header('location: Utilizatori.php');
	
}

?>
