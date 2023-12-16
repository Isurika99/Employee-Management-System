<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Tid = $_POST["Tid"];
    $activity = $_POST["activity"];

    // Perform the SQL query to insert data into the database table (assuming the table name is 'activity_table')
    $sql = "INSERT INTO taskactivities (Tid,activity) VALUES ('$Tid','$activity')";

    if ($conn->query($sql) === TRUE) {
        // Data inserted successfully
        echo "New record created successfully";
    } else {
        // Error occurred while inserting data
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>