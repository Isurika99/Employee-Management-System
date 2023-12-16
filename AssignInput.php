<?php
session_start();

$Eid=$_POST["Eid"];
$tasktid=$_POST["tasktid"];
$assignDate=$_POST["assignDate"];
$ActivityID=$_POST["ActivityID"];
$remark=$_POST["remark"];
//$dbname="project";

$conn=mysqli_connect("localhost","root" , "" , "project");


//Check Connection

if(!$conn){
    die ("Connection faild:" . mysqli_connect_error());
}
else{
    //header("Location: report.php");
     

    
}

//echo '<script>alert("Welcome to Geeks for Geeks")</script>';
/*
//insert 

mysqli_query($conn ,$sql);
*/
$sql="INSERT INTO assign VALUES ('$Eid','$tasktid','$assignDate','$ActivityID','$remark')";

if(mysqli_query($conn ,$sql)){
	header('Location: report.php');

    
}
else{
	echo "Error".$sql."<br>".mysqli_error($conn);
    echo '<script>alert("Welcome to Geeks for Geeks")</script>';
    
}

mysqli_close($conn);

?>