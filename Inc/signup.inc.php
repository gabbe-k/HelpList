<?php
// user forced to run signup form via signup button
if (isset($_POST['signup-submit'])){
  require 'dbh.inc.php';
  $username = $_POST['uid'];
  $email = $_POST['mail'];
  $password = $_POST['pwd'];
  $passwordRepeat = $_POST['pwd-repeat'];
  //error messages   Using # for replacement
  if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
    header("Location: ../index.php?page=signup&error=emptyfields&uid".$username || "&mail=".$email);
    exit();
  }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/" || $username)){
    header("Location: ../index.php?page=signup&error=invalidmailuid");
    exit();
  }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("LOCATION: ../index.php?page=signup&error=invalidmai&uid=".$username);
    exit();
  }elseif(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
    header("Location: ../index.php?page=signup&error=invaliduid&mail=".$email);
    exit();
  }elseif($password !== $passwordRepeat){
    header("Location: ../index.php?page=signup&error=passwordcheck&uid=".$username || "&mail=".$email);
    exit();
    }
    // Does the username alreaddy exist?
    else {
      $Teachr = $_POST['isTeachr'];
      $sql = "SELECT * FROM users WHERE uid=?;";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../index.php?page=signup&error=sqlerror");
        exit();
      }else{
        mysqli_stmt_bind_param($stmt, "s", $mailuid);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck > 0){
          header("Location: ../index.php?page=signup&error=usertaken&mail=".$email);
          exit();
        }else{
          $sql = "INSERT INTO users (uid, email, pwd, isTeachr) VALUES (?,?,?,?);";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../index.php?page=signup&error=sqlerror");
            exit();
          }else{
            // Hash password
            $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
            //Generates user id

            mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $hashedpwd, $Teachr);
            mysqli_stmt_execute($stmt);
            $sql = "SELECT id FROM users WHERE uid=$username";
            mysqli_stmt_store_result($row);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_execute($stmt);
            session_start();
            $_SESSION['userId'] = $row['id'];
            $_SESSION['userUid'] = $row['uid'];
            header("Location: ../index.php?signup=sucsess");
            exit();
          }
        }
      }
    }
  }else{
    header("Location: ../index.php?page=signup");
    exit();
  }
?>
