<?php
include 'DataBase.php';

$sql = "SELECT temp,umid,gaz,data from caracteristici where DATE_FORMAT(data, '%Y-%m-%d') = CURDATE()";
$result = mysqli_query($conn, $sql);
$dataTemp ='';
$dataUmid ='';
$dataGaz ='';

while($row = mysqli_fetch_array($result))
{
	$dataTemp .= "{Ora: '".$row["data"]."',Temperatura:".$row["temp"]."},";
	$dataUmid .= "{Ora: '".$row["data"]."',Umiditatea:".$row["umid"]."},";
	$dataGaz  .= "{Ora: '".$row["data"]."',Gaz:".$row["gaz"]."},";
}
	$dataTemp=substr($dataTemp,0,-2);
	$dataUmid=substr($dataUmid,0,-2);
	$dataGaz=substr($dataGaz,0,-2);
	//echo $dataTemp;
	//echo $dataUmid;
	//echo $dataGaz;
?>