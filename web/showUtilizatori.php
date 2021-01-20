<?php

include 'DataBase.php';
    global $conn;
	$sql ="select * from user ";
	$result = mysqli_query($conn,$sql);
// stergem
if(isset($_GET['delete'])){
	$id=$_GET['delete'];
	mysqli_query($conn,"DELETE FROM user WHERE id_User ='$id'");
	header('location: Utilizatori.php');
}



?>
