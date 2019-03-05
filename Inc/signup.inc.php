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
  }elseif($password !== $passwordRepeat){
    header("Location: ../#?error=passwordcheck&uid=".$username || "&mail=".$email);
    exit();
    }
    // Does the username alreaddy exist?
    else {
      $sql = "SELECT * FROM # WHERE uidUsers=?;";
      $stmt =mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../#?error=sqlerror");
        exit();
      }else{
        mysqli_stmt_bin_param($stmt, "s", $mailuid);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck > 0){
          header("Location: ../#?error=usertaken&mail=".$email);
          exit();
        }else{
          $sql "INSERT INTO # (uidUsers, emailUsers, pwdUsers) VALUES (?,?,?);";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../#?error=sqlerror");
            exit();
          }else{
            // Hash password
            $hashedpwd = passsword_hash($password, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedpwd);
            mysqli_stmt_execute($stmt);
            $sql = "SELECT idUsers FROM # WHERE uidUsers=$username";
            mysqli_stmt_store_result($row);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_execute($stmt);
            session_start();
            $_SESSION['userId'] = $row['idUsers'];
            $_SESSION['userUid'] = $row['uidUsers'];
            header("Location: ../#?signup=sucsess");
            exit();
          }
        }
      }
    }
  }else{
    header("Location: ../#");
    exit();
  }
?>
