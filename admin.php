<?php
session_start();
include("connection.php");
include("functions.php");

// Check if the user is authenticated as an admin (you should implement this)

$employee = null; // Initialize the employee variable

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search_employee"])) {
    $search_email = $_POST["email"];

    // Query the database to retrieve the employee's details using the provided email
    $query = "SELECT * FROM register WHERE email = '$search_email'";
    $result = mysqli_query($con, $query);

    if ($result) {
        $employee = mysqli_fetch_assoc($result);
    } else {
        echo "Error in searching for the employee.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["assign"]) && $employee) {
    $employee_id = $employee['id']; 
    $eid = $_POST["Eid"];
    $designation = $_POST["Designation"];

    // Update the database with Eid and designation for the employee (assuming 'register' is the table name)
    $update_query = "UPDATE Employee SET Eid = '$eid', Designation = '$designation' WHERE id = '$employee_id'";
    mysqli_query($con, $update_query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <h1>Admin Dashboard</h1>

    <form method="post">
        <label for="email">Search Employee by Email:</label>
        <input type="email" name="email" id="email" required>
        <input type="submit" name="search_employee" value="Search">
    </form>

    <?php if ($employee) { ?>
        <h2>Employee Details</h2>
        <p>Name: <?php echo $employee['name']; ?></p>
        <p>Telephone: <?php echo $employee['telephone']; ?></p>
        <p>Email: <?php echo $employee['email']; ?></p>
        <p>Username: <?php echo $employee['username']; ?></p>
    <?php } ?>

    <form method="post" action="admin.php">
        <input type="text" name="Eid" placeholder="Eid">
        <input type="text" name="Designation" placeholder="Designation">
        <input type="submit" name="assign" value="Assign Eid and Designation">
    </form>
    <a href="logout.php">Logout</a>
</body>
</html>