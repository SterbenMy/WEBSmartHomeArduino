<?php
session_start();
include 'DataBase.php';
if(isset($_POST['login'])){
	$usernamee =$_POST['username'];
	$password =$_POST['password'];
	
    global $conn;
	$sql ="select * from user where username= '".$usernamee."' AND password= '".$password."'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	
	
	if($row['username'] == $usernamee && $row['password']==$password )
		{
		$_SESSION['username']=$usernamee;
		header("Location: main.php"); 
		}else{
			header("Location: index.php?error=minus");
		}
		
		
	
}

?>
