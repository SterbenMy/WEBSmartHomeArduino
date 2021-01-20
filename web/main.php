<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
	
<link href="https://fonts.googleapis.com/css?family=Baloo+2&amp;display=swap" rel="stylesheet"/>
<title>HOME Arduino</title>
<link rel="shortcut icon" type="image/png" href="logo.png"/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<style>

html body, body body {
 
  justify-content: center;
  align-items: center;
  background: white;
  text-align: center;
  color: white;
   margin-right: 15px !important; 
   margin-left: 15px !important;
}
html body .div, body body .div {
  margin: 0 auto;
  padding: 10px;
  border-radius: 10px;
  height: 250px;
  width: 500px;
  background: #123;
  font-family: "Baloo 2", cursive;
  
}
html body .div button, body body .div button {
  background: #F35;
  color: white;
  border: none;
  border-radius: 10px;
  font-family: "Baloo 2", cursive;

}
html body .div button:focus, body body .div button:focus {
  outline: none;
}
html body .div button:active, body body .div button:active {
  outline: none;
}
.ff {
	background: #123;
}
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
.jumbotron{
	 width: 100%;
	 height:150px;
}
</style>
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

<script>
setInterval(function () {
	var d = new Date();

	document.getElementById("Day").innerHTML = day(d.getDay());

	document.getElementById("Date").innerHTML =
		month(d.getMonth()) + " " + d.getDate() + " " + d.getFullYear();

	document.getElementById("Time").innerHTML =
		time(d.getHours()) +
		":" +
		place(d.getMinutes()) +
		":" +
		place(d.getSeconds()) +
		" " +
		am(d.getHours());

	function day(n) {
		let days = [
			"Duminica",
			"Luni",
			"Marti",
			"Miercuri",
			"Joi",
			"Vineri",
			"Sambata"
		];
		return days[n];
	}

	function month(n) {
		let months = [
			"Ianuarie",
			"Februarie",
			"Martie",
			"Aprilie",
			"Mai",
			"Iunie",
			"Iulie",
			"August",
			"Septembrie",
			"Octombrie",
			"Noiembrie",
			"Decembrie"
		];
		return months[n];
	}

	function time(n) {
		n = n % 12;
		return n == 0 ? 12 : n;
	}

	function place(n) {
		return n < 10 ? "0" + n : n;
	}

	function am(n) {
		return n > 12 ? "" : "";
	}
}, 1000);

var mode = false;
function bg() {
	mode = mode ? false : true;
	if (mode) {
		$("body").css("background", "#123");
		$(".div").css("background", "white");
		$(".ff").css("background", "white");
		$("body").css("color", "#123");
		$(".bty").html("Light Mode");
	} else {
		$("body").css("background", "white");
		$(".div").css("background", "#123");
		$(".ff").css("background", "#123");
		$("body").css("color", "white");
		$(".bty").html("Dark Mode");
	}
}

</script>
<script>
$(function(){
    setInterval(function(){ 
         $("#temp").load("temperatura.php");
         $("#umid").load("umiditate.php");
         $("#gaz").load("gazR.php");
         $("#status").load("statusLed.php");
		 $("#usa").load("statusMotor.php");
		 $("#gazStatus").load("statusGaz.php");
    }, 1000);
});
    
</script>
<script>
function ledOn(){
	
	var url = 'ledOn.php';

        // Create and send AJAX request
        var request = new XMLHttpRequest();
        request.open('POST', url, true);
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        request.send();
		
		
}

function ledOff(){

var url = 'ledOff.php';
	 var request = new XMLHttpRequest();
        request.open('POST', url, true);
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        request.send();
}
function motorOn(){
	
	var url = 'motorOn.php';
        // Create and send AJAX request
        var request = new XMLHttpRequest();
        request.open('POST', url, true);
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        request.send();
}

function motorOff(){
	
	var url = 'motorOff.php';
        // Create and send AJAX request
        var request = new XMLHttpRequest();
        request.open('POST', url, true);
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        request.send();
}	
</script>

<br><br>
<div class="row">
 <div class="col-md-4 ">
      <div class="card ff">
        <div class="ff card-header">
          <h3>Temperatura (°C)</h3>
        </div>
        <div class="ff card-body">
		<div class= "row">
		<h5 class="card-title col-6">Temperatura curenta (°C) </h5>
		<div class= "col-6">
               <button type="button" class="btn btn-light "><span id="temp"></span></button>
       </div>
		</div>
		<br>
		<div id="tempGraph"></div>
		</div>
      </div>
	  <br>
    </div>
  
  <br><br>
  <script>
  new Morris.Line({
		 element: 'tempGraph',
	     data:[<?php include 'Graph.php'; echo $dataTemp; ?> }],
		 xkey:'Ora',
		 ykeys: ['Temperatura'],
		 labels: ['Temperatura'],
		 hideHover:'auto',
		 stacked:true,
		 resize: true,
		 redraw: true
});
  
  </script>
 
   <div class=" col-md-4 offset-md-4">
      <div class="ff card ">
        <div class="ff card-header">
         <h3>Umiditate (%)</h3>
        </div>
        <div class="ff card-body">
		<div class= "row">
		<h5 class="card-title col">Umiditatea curenta (%)</h5>
		<div class= "col">
                <button type="button" class="btn btn-light "><span id="umid"></span></button>
       </div>
		</div>
		<br>
		<div id="umidGraph"></div>
        </div>
      </div>
    </div>
	<br>
  </div>
  <script>
   new Morris.Line({
		 element: 'umidGraph',
		 data:[<?php include 'Graph.php'; echo $dataUmid; ?> }],
		 xkey:'Ora',
		 ykeys: ['Umiditatea'],
		 labels: ['Umiditatea'],
		 hideHover:'auto',
		 stacked:true,
		 resize: true,
		 redraw: true
});
  </script>
   <br>
   
 <div class="row">
<div class="div col-md-3 offset-md-3">
	  <h2 id="Day"></h2>
      <h1 id="Date"> </h1>
      <h2 id="Time"> </h2>
	  <br><br>
      <button class="bty" onclick="bg()">Dark Mode</button>
    </div>
	<br>
  </div>
  <br>
 
  <div class="row">  
  <div class=" col-md-4 ">
      <div class="ff card ">
        <div class="ff card-header">
          <h3>Actiuni</h3>
        </div><br>
		<div class="row">
		<div class="col" style="font-size: large; text-align:left; margin-left:5px;">Lumina</div>
		<div class="col ">
			<button type="button" onclick="ledOn()" class="btn btn-primary btn-sm">Aprinde</button>
			&nbsp &nbsp
			<button type="button" onclick="ledOff()" class="btn btn-primary btn-sm">Stange</button>
			</div></div>
			<br>
			<h4 style="color:red; text-align:right;margin-right:60px; "  id="status"></h4>
			<br>
			<div class="row">
		<div class="col" style="font-size: large; text-align:left;margin-left:5px;">Usa</div>
		<div class="col">
			<button type="button" onclick="motorOn()" class="btn btn-primary btn-sm">Deschide</button>
			&nbsp &nbsp
			<button type="button" onclick="motorOff()" class="btn btn-primary btn-sm">Inchide</button>
			</div>
			</div>
			<br>
			<h4 style="color:red; text-align:right;margin-right:80px; " id="usa"></h4>
			<br>
			</div>
			<br>
        </div>
      
	  
    

	
  <div class=" col-md-4 offset-md-4">
      <div class="ff card ">
        <div class="ff card-header">
          <h3>Nivelul de Fum</h3>
        </div>
        <div class="ff card-body">
		<div class= "row">
		<h5 class="card-title col">Nivelul de Fum curent &nbsp;&nbsp;&nbsp;</h5>
		<div class= "col">
                <button type="button" class="btn btn-light "><span id="gaz"></span></button>
       </div>
		</div>
		<br>
			<h4 style="color:red; text-align:center; " id="gazStatus"></h4>
			<br>
        </div>
      </div>
    </div>
	</div>
  <br>

 
</body>
</html>