<?php 

    session_start();
    include("../../Inc/dbh.inc.php");

    if (isset($_POST['id'])) {

        $id = $_POST['id'];

        $stmt = $conn->prepare("SELECT * FROM `users` WHERE gid = (?)");
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $res = $stmt->get_result();

        if ($res->num_rows == 0) {
   
            $name = $_POST['name'];
            $email = $_POST['email'];
            $isteacher = $_POST['isteacher'];


        echo $id;

            $stmt = $conn->prepare("INSERT INTO users (gid,email,name,isTeachr) VALUES (?,?,?,?)");
            $stmt->bind_param('ssss', $id, $email, $name, $isteacher);
            $stmt->execute();

        } 
        else {
            echo "user is in database";
        }

        exit;
    }
?>