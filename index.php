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
    <form action="sendmail.inc.php" method="post">
        <lable>email</lable>>
        <input type="text" name="email" maxlength="40">
        <br>
        <input type="submit" value="Register">
    </form>

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
