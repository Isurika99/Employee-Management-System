
<!DOCTYPE html>
<html lang="en">
<head>
    <title>ABC Company</title>
    <link rel="stylesheet" href="activity.css">
</head>
<body>

    <div class="main">
        <form action="assignTAsk.php" method="post" id="taskForm">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">AbC ComPanY</h2>
            </div>

            <div class="menu">
                <ul>
                    <li></li><li></li>
                    <li><a href="index.html">HOME</a></li>
                    
                </ul>
            </div>
        </div> 
                <div class="form">
                    <h2>Task Activity</h2>
                    <input type=""value="Task Id">
                    <select name="Tid" value="Task Id">
                    <?php
                    $dbname="project";
                    $conn=mysqli_connect("localhost","root" , "" , "project");
                    //Check Connection

                    if(!$conn){
                    die ("Connection faild:" . mysqli_connect_error());
                     }

                    $sql = "SELECT Tid FROM task";
                    $result = $conn->query($sql);

                     if ($result->num_rows > 0) {

                   
                     while($row = $result->fetch_assoc()) {

                    
                    echo "<option value='" . $row['Tid'] . "'>" . $row['Tid'] . "</option>";
                    }
                    } else {

                    
                    echo "<option value=''>No Task IDs found</option>";
                    }

                    $conn->close();

                    ?>
                    </select>
                    <input type="text" name="activity" id="activity" placeholder="Activity">
                    <button type="button" class="sub" onclick="addTask()">Add </button>

                    <h3>Activity Details:</h3>
                    <br>
                    <table id="activityTable">
                         <tr>
                             <th>Task ID</th>
                            <th>Activity</th>
                        </tr>
                    </table>
                    <button type="button" class="sub" onclick="saveToDatabase()">Save DB</button>
                    <table>
                        <tr></tr>
                        <tr>
                    <td><a href="task.html"><input  type="button" value="Back" id="button" class="sub"></a></td>
                    <td><a href="assign.php"><input  type="button" value="Next" id="button" class="sub"></a></td>
                        </tr>
                    </table>
        
                </div>
                    </div>
                    </form>
                </div>
                
        </div>
   
        <script>
        function addTask() {
    var Tid = document.querySelector('select[name="Tid"]').value;
    var activity = document.getElementById("activity").value;

    var table = document.getElementById("activityTable");
    var row = table.insertRow(-1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    

    cell1.innerHTML = Tid;
    cell2.innerHTML = activity;
}

function saveToDatabase() {
    // Assuming you have an XMLHttpRequest object or use fetch API to send data to the server.
    // Example using fetch API:
    var tableRows = document.getElementById("activityTable").rows;
    var data = [];

    // Iterate through table rows and extract data
    for (var i = 1; i < tableRows.length; i++) {
        var row = tableRows[i];
        var Tid = row.cells[0].innerHTML;
        var activity = row.cells[1].innerHTML;
        data.push({ Tid: Tid,  activity: activity });
    }

    // Send the data to the server (you need to implement the server-side logic to handle this data)
    fetch('saveData.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
    .then(response => {
        // Redirect to assign.php after saving the data
        window.location.href = 'assign.php';
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}
    </script>

    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>