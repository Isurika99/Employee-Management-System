<?php
session_start();

$Eid=$_POST["Eid"];
$tel=$_POST["tel"];
$name=$_POST["name"];
$email=$_POST["email"];
$Designation=$_POST["Designation"];
$dbname="project";

$conn=mysqli_connect("localhost","root" , "" , "project");


//Check Connection

if(!$conn){
    die ("Connection faild:" . mysqli_connect_error());
}
else{
    header("Location:admindash.php");
}

//insert 
$sql="INSERT INTO employee(Eid,telephone,Name,email,Designation) VALUES ('$Eid','$tel','$name','$email','$Designation')";

if(mysqli_query($conn ,$sql)){
	
}
else{
	echo "Error".$sql."<br>".mysqli_error($conn);
}

mysqli_close($conn);

?>