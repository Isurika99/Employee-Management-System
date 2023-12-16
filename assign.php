<!DOCTYPE html>
<html lang="en">
<head>
    <title>ABC Company</title>
    <link rel="stylesheet" href="activity.css">
</head>
<body>

    <div class="main">
        <form action="AssignInput.php" method="post">
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
                    <h2>Assign Task to Employee</h2>
                    <input type=""value="Eid">
                    <select name="Eid" value="Eid">
                    <?php
                            $dbname="project";
                            $conn=mysqli_connect("localhost","root" , "" , "project");
                            //Check Connection
                            if(!$conn){
                                die ("Connection faild:" . mysqli_connect_error());
                            }
                            
                            // SQL query to retrieve Task IDs from the Task table
                            $sql = "SELECT Eid FROM employee";
                            $result = $conn->query($sql);
                            
                            // Check if there are any records
                            if ($result->num_rows > 0) {
                                
                            // Output data of each row
                            while($row = $result->fetch_assoc()) {
                                
                            // Output Task ID as an option in the dropdown list
                            echo "<option value='" . $row['Eid'] . "'>" . $row['Eid'] . "</option>";
                            }
                        } else {

                            // Handle the case where no Task IDs are available

                            echo "<option value=''>No Task IDs found</option>";
  
                        }

                        // Close the database connection

                        $conn->close();
                        ?>
                        </select>


                    <input type=""value="Task Id">
                    <select name="tasktid" >
                    <?php
                            $dbname="project";
                            $conn=mysqli_connect("localhost","root" , "" , "project");
                            
                            if(!$conn){
                                die ("Connection faild:" . mysqli_connect_error());
                            }
                            
                            $sql = "SELECT Tid FROM taskactivities";
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

                        <input type=""value="Activity Id">
                    <select name="ActivityID" >
                    <?php
                            $dbname="project";
                            $conn=mysqli_connect("localhost","root" , "" , "project");
                            
                            if(!$conn){
                                die ("Connection faild:" . mysqli_connect_error());
                            }
                            
                            
                            $sql = "SELECT activityid FROM taskactivities";
                            $result = $conn->query($sql);
                            
                            
                            if ($result->num_rows > 0) {
                                
                            
                            while($row = $result->fetch_assoc()) {
                                
                            
                            echo "<option value='" . $row['activityid'] . "'>" . $row['activityid'] . "</option>";
                            }
                        } else {

                           

                            echo "<option value=''>No Task IDs found</option>";
  
                        }

                        $conn->close();
                        ?>
                        </select>

                    <input type="date" name="assignDate" placeholder="Assign Date" required>

                   
                    <input type="text" name="remark" placeholder="Remark">
                    <input type="submit" value="Submit" class="sub">
                    
                    <table>
                        <tr></tr>
                        <tr>
                    <td><a href="Activity.php"><input  type="button" value="Back" id="button" class="sub"></a></td>
                    <td><a href="report.php"><input  type="button" value="Next"  id="button" class="sub"></a></td>
                        </tr>
                    </table>

                    

                </div>
                    </div>
                </div>
        </div>
    </form>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>