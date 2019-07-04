<?php

session_start();
include("../../Inc/dbh.inc.php");

if (isset($_POST['id'])) {

    $id = $_POST['id'];

    echo $id;

    $stmt = $conn->prepare("SELECT * FROM `users` WHERE gid = (?)");
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows == 0) {
        return "notexist";
    }
    else {
        return "";
    }
    exit;
    
}

?>