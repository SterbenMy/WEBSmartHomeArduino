<?php
class info{
 public $link='';
 function __construct($temperature, $humidity, $gaz){
  $this->connect();
  $this->storeInDB($temperature, $humidity, $gaz);
 }
 
 function connect(){
  $this->link = mysqli_connect('localhost','root','') or die('Cannot connect to the DB');
  mysqli_select_db($this->link,'cristilicenta') or die('Cannot select the DB');
 }
 
 function storeInDB($temperature, $humidity, $gaz){
  $query = "update afisare set umid='".$humidity."', temp='".$temperature."', gaz='".$gaz."' where id = '1'";
  $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
 }
 
}
if($_GET['temperature'] != '' and  $_GET['humidity'] != '' and  $_GET['gaz'] != ''){
 $dht11=new info($_GET['temperature'],$_GET['humidity'],$_GET['gaz']);
}
