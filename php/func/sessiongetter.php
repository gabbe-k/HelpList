<?php
  session_start();
  $param = $_POST['param'];
  echo $_SESSION[$param];
 ?>
