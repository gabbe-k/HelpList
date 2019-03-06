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

    <div class="content-wrap">
      <div class="header-outer-wrap">
        <?php include("view/header.php"); ?>
      </div>

      <div class="main-outer-wrap">
        <?php
        
        if (isset($_GET["page"]) && $_GET["page"] == "signup") {
          include("view/signup.php");
        }
        else {
          include("view/listview.php");
        }

        ?>
      </div>

      <div class="footer-outer-wrap">
        <?php include("view/footer.php"); ?>
      </div>

    </div>

  </body>
</html>
