<?php
include 'DataBase.php';

$sql = "SELECT m.motor,a.magnet from motor m,magnet a where a.id=1 and m.id=1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
     if($row["motor"]=='1'and $row["magnet"]=='1'){
		 echo "Usa  este deschisa.";
	 }else if($row["motor"]=='1' and $row["magnet"]=='0'){
		 echo "Aveti ceva probleme.  ";
		 echo "Usa este inchisa.";
		 }else if($row["motor"]=='0' and $row["magnet"]=='0'){
			 echo "Usa este inchisa.";
			 }else if($row["motor"]=='0' and $row["magnet"]=='1'){
				 echo "Aveti ceva probleme.  ";
				 echo "Usa este deschisa.";
				 }
} 
}else {
  echo "0 results";
}

mysqli_close($conn);

?>