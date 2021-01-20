<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<title>HOME Arduino</title>
<link rel="shortcut icon" type="image/png" href="logo.png"/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a href="main.php" class="navbar-left"><img src="logo.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="main.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Utilizatori.php">Utilizatori</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a href="logout.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Logout</a>
    </form>
  </div>
</nav>
<table class="table" >
  <thead class="thead-dark">
    <tr>
	  <th scope="col">Id</th>
      <th scope="col">Nume</th>
      <th scope="col">Prenume</th>
      <th scope="col">Username</th>
	  <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  include 'DataBase.php';
    global $conn;
	$sql ="select * from user ";
	$result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($result)){?>
  <tr>
		<td><?php echo $row['id_User'];?></td>
		<td><?php echo $row['Nume'];?></td>
		<td><?php echo $row['Prenume'];?></td>
		<td><?php echo $row['username'];?></td>
		<td><a name="edit"   href="editUtilizator.php?edit=<?php echo $row['id_User'];?>">Edit</a></td>
		<td><a name="delete" href="showUtilizatori.php?delete=<?php echo $row['id_User'];?>">Delete</a></td>
  </tr>
  <?php } ?>
  </tbody>
</table>
<br>
		<div>
			<a href="Adauga.php"  class="btn btn-primary btn-lg pull-right" style=" position: absolute;
  right:50px;" role="button" aria-pressed="true">Adauga</a>
		</div>

</body>
</html>