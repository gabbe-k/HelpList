<?php
  include("../../Inc/dbh.inc.php");

  // Get and decode the POST data
  $userData = json_decode($_POST['userData']);

  if(!empty($userData)) {
    
    //Check if userdata exists in database 
    $stmt = $conn->prepare("SELECT * FROM $this->userTbl WHERE oauth_provider = $userData['oauth_provider'] AND oauth_uid = $userData['oauth_uid']");
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows == 0) {
      //Update user data if already exist
      $stmtUpd = $conn->prepare("UPDATE $this->userTbl SET
      first_name = $userData['first_name'], 
      last_name = $userData['last_name'], 
      email = $userData['email'], 
      gender = $userData['gender'], 
      locale = $userData['locale'], 
      picture = $userData['picture'], 
      link = $userData['link'], modified = NOW() 
      WHERE oauth_provider = $userData['oauth_provider'] 
      AND oauth_uid = $userData['oauth_uid']");
      $stmtUpd->execute();
    }
    else {
      //Insert userdata in db
      $stmtIns = $conn->prepare("INSERT INTO $this->userTbl SET
      oauth_provider = $userData['oauth_provider'], 
      oauth_uid = $userData['oauth_uid'], 
      first_name = $userData['first_name'], 
      last_name = $userData['last_name'], 
      email = $userData['email'], 
      gender = $userData['gender'], 
      locale = $userData['locale'], 
      picture = $userData['picture'], 
      link = $userData['link'], 
      created = NOW(), modified = NOW()");
      $stmtIns->execute();
    }

    return true;

  }

 ?>
