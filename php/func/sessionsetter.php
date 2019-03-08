<?php
  session_start();
  $_SESSION['numPost'] = $_POST['numPost'];
  echo $_SESSION['numPost'];

  function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}

  debug_to_console($_SESSION['numPost']);
  debug_to_console("aaaa");
 ?>
