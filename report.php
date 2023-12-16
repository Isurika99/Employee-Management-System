<!DOCTYPE html>
<html lang="en">
<head>
    <title>ABC Company</title>
    <link rel="stylesheet" href="emp.css">
    <style>

    table {

            
    width: 100%;
    border-collapse: collapse;
    }
    th, td {
            border: 1px solid while;
            padding: 5px;
            text-align: left;
        }
        th {
            background-color: while;
        }
        </style>
</head>
<body>

    <div class="main">
        <form action="empReg.php" method="post">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">AbC ComPanY</h2>
            </div>

            <div class="menu">
                <ul>
                    <li><li></li></li>
                    <li><a href="index.html">HOME</a></li>
                    
                </ul>
            </div>

 
        </div> 
        
                <div class="form">
                    <h2 class="h2">Employee Task Report</h2>
                    <table class="details">
                        <tr>
                            <th>Employee ID</th>
                            <th>Employee Name</th>
                            <th>Task ID</th>
                            <th>Task Name</th>
            
        </tr>
                  

                </div>
                    </div>
                </div>
        </div>
    </form>
    <?php
       $dbname="project";

       $conn=mysqli_connect("localhost","root" , "" , "project");
   //Check Connection

   if(!$conn){
         die ("Connection faild:" . mysqli_connect_error());
         }
        
        
        $sql = "SELECT employee.Eid, employee.Name as EmployeeName, task.Tid, task.Name as TaskName
                FROM employee
                INNER JOIN assign ON employee.Eid = assign.Eid
                INNER JOIN task ON assign.Tid = task.Tid";
        
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row["Eid"]."</td>
                        <td>".$row["EmployeeName"]."</td>
                        <td>".$row["Tid"]."</td>
                        <td>".$row["TaskName"]."</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No data available</td></tr>";
        }
        
        // Close the database connection
        $conn->close();
        ?>
    </table>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>