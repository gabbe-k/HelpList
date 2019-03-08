<!DOCTYPE html>
<?php
  session_start();
 ?>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="../css/master.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  <body>
    //Test
    <?php
        ini_set( 'display_errors', 1 );
        error_reporting( E_ALL );
        $from = "test@test.com";
        $to = "olliver.b13@gmail.com";
        $subject = "Checking PHP mail";
        $message = "PHP mail works just fine";
        $headers = "From:" . $from;
        mail($to, $subject, $message, $headers);
        ini_set($to,$subject);
        ini_set($message, $headers);
        echo "The email message was sent.";
    ?>

    <div class="content-wrap">
      <div class="header-outer-wrap">
        <?php include("view/header.php"); ?>
      </div>

      <div class="main-outer-wrap">
        <?php

        if (isset($_GET["page"]) && $_GET["page"] == "signup") {
          include("view/signup.php");
        }
        else if (isset($_GET["page"]) && $_GET["page"] == "listview") {
          include("view/listview.php");
        }
        else {
          include("view/classpick.php");
        }

        ?>
      </div>

      <div class="footer-outer-wrap">
        <?php include("view/footer.php"); ?>
      </div>

    </div>

  </body>
</html>
