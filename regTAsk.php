<?php

session_start();


$Tid=$_POST["Tid"];
$Tname=$_POST["Tname"];
$strDate=$_POST["strDate"];
$endDate=$_POST["endDate"];
$nature=$_POST["nature"];
$dbname="project";

$conn=mysqli_connect("localhost","root" , "" , "project");


//Check Connection

if(!$conn){
    die ("Connection faild:" . mysqli_connect_error());
}
else{
    header("Location:Activity.php");
}

//insert 
$sql="INSERT INTO task(Tid,Name,Start_date,end_date,nature) VALUES ('$Tid','$Tname','$strDate','$endDate','$nature')";

if(mysqli_query($conn ,$sql)){
	echo "New recode created succesfully";
    
}
else{
	echo "Error".$sql."<br>".mysqli_error($conn);
}

mysqli_close($conn);

?>