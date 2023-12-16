
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Assuming you have received the data as JSON
    $data = json_decode(file_get_contents('php://input'), true);

    // Establish a database connection (you've already done this in your HTML)
    $conn = mysqli_connect("localhost", "root", "", "project");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Iterate through the data and insert it into the database
    foreach ($data as $row) {
        $Tid = $row['Tid'];
        $activity = $row['activity'];

        $sql = "INSERT INTO taskactivities (Tid, activity) VALUES ('$Tid', '$activity')";

        if (mysqli_query($conn, $sql)) {
            // Data inserted successfully
        } else {
            // Handle the error if the insertion fails
        }
    }

    // Close the database connection
    mysqli_close($conn);

    // Redirect to assign.php after saving the data
    header("Location: assign.php");
    exit;
} else {
    // Handle the case where the script is accessed directly
    echo "Invalid request";
}
?>