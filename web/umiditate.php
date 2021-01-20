<?php
include 'DataBase.php';

$sql = "SELECT umid from afisare where id=1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo $row["umid"];
  }
} else {
  echo "0 results";
}

mysqli_close($conn);

?>