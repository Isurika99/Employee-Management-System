<?php
// Start the session (if not already started)
session_start();

$username="Isuri99";
$password="1234";




    $user_name=$_POST['usname'];
    $ps_word=$_POST['psword'];


    if ($user_name == $username ){
        if($ps_word == $password)
    
     {
       

        $_SESSION['username'] ="Isurika";
        $_SESSION['password'] ="1234";
        

        
      
        header("Location: index.html");
        exit();
    } else {
       
        echo "Incorrect username or password!";
    }}
// Check if the user is already logged in, redirect to home if true
if (isset($_SESSION['username'])) {
    header("Location: register.html");
    exit();
}


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";

    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get user input
    $entered_username = $_POST['username'];
    $entered_password = $_POST['password'];

    // Validate user credentials using prepared statements
    $sql = "SELECT * FROM employee WHERE username='$entered_username' AND password='$entered_password'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $entered_username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($entered_password, $user['password'])) {
            // Valid credentials, start a session and store the username
            $_SESSION['username'] = $entered_username;

            // Redirect to the rmp.html page
            header("Location: register.html");
            exit();
        } else {
            // Invalid password, display an error message
            $error_message = "Invalid username or password";
        }
    } else {
        // Invalid username, display an error message
        $error_message = "Invalid username or password";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}


?>