<?php
  session_start();
  $param = $_POST['param'];
  $_SESSION[$param] = $_POST['value'];
  echo $_SESSION[$param];
 ?>
