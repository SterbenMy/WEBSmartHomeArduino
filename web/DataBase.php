<?php

//$servername ="localhost";
//$username ="id13812249_macaricristianlicenta";
//$password = "Cristisuper19@gmail.com";
//$dbnam="id13812249_licenta";
$servername ="localhost";
$username ="root";
$password = "";
$dbnam="cristilicenta";

$conn = mysqli_connect($servername,$username,$password,$dbnam);
if($conn)
	{
	
	}
	else
	{
		die("Connection failed because ".mysqli_connect_error());
	}

?>