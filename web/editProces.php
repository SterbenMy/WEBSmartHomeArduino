<?php

include 'DataBase.php';
    global $conn;

if(isset($_POST['save'])){
	$username =$_POST['username'];
	$password =$_POST['password'];
	$nume 	  =$_POST['Nume'];
	$prenume  =$_POST['Prenume'];
	$id  	  =$_POST['id'];
	
	mysqli_query($conn,"UPDATE user SET username='$username',Prenume='$prenume',Nume='$nume',password='$password' where id_User=$id");
	
	header('Location: Utilizatori.php');
}
?>
