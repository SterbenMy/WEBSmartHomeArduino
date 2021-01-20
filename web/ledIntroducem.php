

<?php
$con =mysqli_connect("localhost","root","","cristilicenta");

// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
//echo "Connect Successfully. Host info: " . mysqli_get_host_info($con);
$sql = "SELECT led FROM led where id= 1";

$result = $con->query($sql);
$row = $result->fetch_assoc();
   echo $row["led"];

mysqli_close($con);
?>