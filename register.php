<?php 
session_start();

	include("connection.php");
	include("functions.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["Name"];
    $telephone = $_POST["telephone"];
    $email = $_POST["email"];
    $username = $_POST["Username"];
    $password = $_POST["password"]; 
    $cpassword = $_POST["cpassword"];
    

        if(!empty($name) && !empty($password) && !is_numeric($name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into register (id,name,telephone,email,username,password) values ('$user_id','$name ','$telephone','$email','$username','$password')";

			mysqli_query($con, $query);

			header("Location: log2.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}

?>