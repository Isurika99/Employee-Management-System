<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Details</title>

    <style>
       body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
             box-sizing: border-box;
            outline: none; border:none;
            text-decoration: none;
            background: url(pexels-photo-733857.webp) no-repeat;
            background-size: cover;
            
        }
        th,tr {
            text-align: left;
            padding:20px;
            margin:10px;

        }
        h1{
               background: #e50d67;
               color:#fff;
               border-radius: 5px;
               padding:0 15px;
           }
           h2{
               background: #e50d67;
               color:#fff;
               border-radius: 5px;
               padding:0 15px;
           }
        .form-type {
            text-align: right;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .btnn{
            width: 350px;
            height: 100px;
            background: #e50d67;
            border: none;
            margin-top: 30px;
            font-size: 18px;
            border-radius: 10px;
            cursor: pointer;
            color: #fff;
            transition: 0.4s ease;
}
    </style>
</head>

<body>
<div>
<h2>Assign Details</h2>

    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve Eid from the form
        $eid = $_POST["eid"];

        // Establish a database connection (assuming you have a database connection setup)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL query to retrieve data based on Eid
        $sql = "SELECT * FROM assign WHERE Eid = '$eid'";

        // Execute the query
        $result = $conn->query($sql);

        // Display data in a table
        if ($result->num_rows > 0) {
            echo "<table border='1'>";
            echo "<tr><th>Eid</th><th>Tid</th><th>Date Assigned</th><th>Activity ID</th><th>Remark</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['Eid']}</td><td>{$row['Tid']}</td><td>{$row['dateassign']}</td><td>{$row['activityid']}</td><td>{$row['remarks']}</td></tr>";
            }

            echo "</table>";
        } else {
            echo "No records found for Eid: $eid";
        }

        // Close the database connection
        $conn->close();
    } else {
        // If the form is not submitted, redirect to the form page
        header("Location: index.html");
    }
    ?>


<br>
<br>

    <h2>Your Task and Activity Details</h2>

    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve Eid from the form
        $eid = $_POST["eid"];

        // Establish a database connection (assuming you have a database connection setup)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL query to retrieve data based on Eid
        $sql = "SELECT a.Eid, a.Tid, t.Name, ta.activity FROM assign a INNER JOIN task t ON a.Tid = t.Tid INNER JOIN taskactivities ta ON a.activityid = ta.activityid WHERE a.Eid = '$eid'";

        // Execute the query
        $result = $conn->query($sql);

        // Display data in a table
        if ($result->num_rows > 0) {
            echo "<table border='1'>";
            echo "<tr><th>Eid</th><th>Tid</th><th>Name</th><th>Activity</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['Eid']}</td><td>{$row['Tid']}</td><td>{$row['Name']}</td><td>{$row['activity']}</td></tr>";
            }

            echo "</table>";
        } else {
            echo "No records found for Eid: $eid";
        }

        // Close the database connection
        $conn->close();
    } else {
        // If the form is not submitted, redirect to the form page
        header("Location: index.html");
    }
    ?>
    <br>
     <a href="empdash.php" target="_blank" class="btnn">Back</a>
</div>

</body>

</html>
