<?php
include 'DataBase.php';

$sql = "SELECT l.led,m.foto from led l,magnet m where m.id=1 and l.id=1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
     if($row["led"]=='1' and $row["foto"]<=400){
		 echo "Lumina este aprinsa";
	 }else if($row["led"]=='1' and $row["foto"]>=200){
		 echo "Aveti ceva probleme.  ";
		 echo "Lumina este stinsa.";
	 }else if($row["led"]=='0' and $row["foto"]>=400){
		 echo "Lumina este stinsa.";
	 }else if($row["led"]=='0' and $row["foto"]<=400){
		 echo "Aveti ceva probleme.  ";
		 echo "Lumina este aprinsa.";
	 }
  }
} else {
  echo "0 results";
}

mysqli_close($conn);

?>