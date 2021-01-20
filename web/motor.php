

<?php
$con =mysqli_connect("localhost","root","","cristilicenta");

// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "SELECT motor FROM motor where id = 1";

$result = $con->query($sql);
$row = $result->fetch_assoc();
   echo $row["motor"];

mysqli_close($con);
?>