<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>ABC Company</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>

    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">AbC ComPanY</h2>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="index.html">HOME</a></li>
                    
                    
                </ul>
            </div>

           

        </div> 
        <div class="content">
            <h1>Hello! <span><?php echo $user_data['username']; ?></span> </h1>
            

                <div class="form">
                <form action="empDetails.php" method="post">
                    <input type="text" name="eid" placeholder="Eid">
                    <input type="submit" value="My task" class="btnn">
                    <button class="btnn"><a href="index.html">LogOut</a></button>
                </form>

                </div>
                    </div>
                </div>
        </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>
</body>
</html>