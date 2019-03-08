<?php
$rand= rand(10, 20);// random number generator
$to = $_POST['email'];
$header ='From:Tested@TechSupport.com';
$subject ='Verification Code';

$message = "Your Random number is";
$message .= $rand;
$message .= "Thank you-TechSupport";

if(empty($to))
{
    echo "Email Is Empty";
}
else
{
    if (mail($to,$subject,$message,$header)){

     echo 'Check Your Email For Verfication Code';
    }
    else{
        echo 'Failed';
    }
}
?>
