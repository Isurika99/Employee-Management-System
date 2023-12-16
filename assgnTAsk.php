<?php

$Tasktid=$_POST["Tasktid"];
$activity=$_POST["activity"];



$dbname="project";

$conn=mysqli_connect("localhost","root" , "" , "project");


//Check Connection

if(!$conn){
    die ("Connection faild:" . mysqli_connect_error());
}
else{
    echo "Connect succesfully"."<br>";
}

//insert 
$sql="INSERT INTO taskactivities(activityid,Tid,activity) VALUES ('','$Tasktid','$activity')";

if(mysqli_query($conn ,$sql)){
	echo "New recode created succesfully";
}
else{
	echo "Error".$sql."<br>".mysqli_error($conn);
}

mysqli_close($conn);

?>