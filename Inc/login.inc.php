<?php
if (isset($_POST['login-submit'])){
  require 'dbh.inc.php';
  $mailuid =$_POST['mailuid'];
  $password =$_POST['pwd'];
}
