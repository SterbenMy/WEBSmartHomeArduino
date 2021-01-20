<?php
session_start();
include 'DataBase.php';
    global $conn;
if(isset($_GET['edit'])){
	$id=$_GET['edit'];
	
	$rec=mysqli_query($conn,"select * from user where id_User='$id'");
	$record=mysqli_fetch_array($rec);
	$nume =$record['Nume'];
	$prenume=$record['Prenume'];
	$username=$record['username'];
	$password=$record['password'];
	$id=$record['id_User'];
}
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
<br>

<section>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-6">
          <div class="row">
            <div class="col text-center">
              <h1>Editeaza persoana</h1>
              <p class="text-h3">Editati datele persoanei alese</p>
            </div>
          </div>
			<form action ="editProces.php" method = "POST">
			<input type="hidden" name="id" value="<?php echo $id;?>">
		<div class="row align-items-center">
            <div class="col mt-4">
              <input type="text" name="Nume" class="form-control" value="<?php echo $nume;?>" placeholder="Nume" required>
            </div>
          </div>
          <div class="row align-items-center mt-4">
            <div class="col">
              <input type="text" name="Prenume" class="form-control" value="<?php echo $prenume;?>" placeholder="Prenume" required>
            </div>
          </div>
		  <div class="row align-items-center mt-4">
            <div class="col">
              <input type="text" name="username" class="form-control" value="<?php echo $username;?>" placeholder="Username" required>
            </div>
          </div>
         <div class="row align-items-center mt-4">
            <div class="col">
              <input type="passwrod" name="password" class="form-control" value="<?php echo $password;?>" placeholder="Password" required>
            </div>
          </div>
		  <br>
		<div class="form-group">
			<input type="submit" name="save" value="save" class="btn float-right login_btn">
		</div>
			</form>
</section>
</body>
</html>