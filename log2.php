<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['username'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from register where username = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['id'] = $user_data['id'];
						header("Location: empdash.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>ABC Company</title>
    <link rel="stylesheet" href="log.css">
</head>
<body>

    <div class="main">
        <form  method="post">
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
        
            


                <div class="form">
                    <h2>Login Here</h2>
                    <input type="text" name="username" placeholder="Username">
                    <input type="password" name="password" placeholder="Password ">
                    <input type="submit" value="Submit" class="sub">

                    <p class="link">Don't have an account<br>
                    <a href="register.html">Sign up </a> here</a></p>
                   
                </div>
                    </div>
                </div>
        </div>
    </form>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>