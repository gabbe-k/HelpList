<?php
//if not using xampp, use online servername instead of localhost.
$conn = mysqli_connect('localhost', 'root', '', 'helplist');

if (!$conn){
   die("Connection failed: ".mysqli_connect_error());
}
?>
