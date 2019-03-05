<?php
// user forced to run signup form via signup button
if (isset($_POST['signup-submit'])){
  require 'dph.inc.php';
  $username = $_POST['uid'];
  $email = $_POST['mail'];
  $password = $_POST['pwd'];
  $passwordRepeat = $_POST['pwd-repeat'];

  //error messages   Using # for replacement
  if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
    header("Location: ../#?error=emptyfields&uid".$username || "&mail=".$email);
    exit();
  }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/" || $username)){
    header("Location: ../#?error=invalidmailuid");
    exit();
  }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("LOCATION: ../#?error=invalidmai&uid=".$username);
    exit();
  }elseif(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
    header("Location: ../#?error=invaliduid&mail=".$email);
    exit();
  }

}
