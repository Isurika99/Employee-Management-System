<?php 
 session_start();
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>
    <?php
        $_SESSION['username'] ="Isurika";
        $_SESSION['password'] ="1234";


        $username=$_POST["username"];
        $password=$_POST["password"];

        if($username=="Isurika"){
            if($password=="1234"){

                header("location:admindash.php");
            }
            
        
        else{
            echo"Login failed";
        }
    }
        else{
            echo"Login failed" ;
        }

        
?>
 

 </body>
 </html>