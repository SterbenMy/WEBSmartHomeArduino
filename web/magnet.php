<?php
class magnet{
 public $link='';
 function __construct($magnet,$foto){
  $this->connect();
  $this->storeInDB($magnet,$foto);
 }
 
 function connect(){
  $this->link = mysqli_connect('localhost','root','') or die('Cannot connect to the DB');
  mysqli_select_db($this->link,'cristilicenta') or die('Cannot select the DB');
 }
 
 function storeInDB($magnet,$foto){
  $query = "update magnet set magnet='".$magnet."', foto='".$foto."' where id = '1'";
  $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
 }
 
}
if($_GET['magnet'] != '' and $_GET['foto']){
 $magnet=new magnet($_GET['magnet'],$_GET['foto']);
}