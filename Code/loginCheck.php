<?php
session_start();
$con = mysqli_connect("localhost","root","","bughound"); 
mysqli_select_db($con, "bughound");

            $username =mysqli_real_escape_string($con,$_POST['username']);
            $password =mysqli_real_escape_string($con,$_POST['password']);
			
            $query = " SELECT * FROM employees WHERE username='" . $username . "' AND password='" . $password . "'";
			$result = mysqli_query($con,$query);
		  
			if (mysqli_num_rows($result) == 0)
			{ 
				echo "<SCRIPT type='text/javascript'>
					alert('Invalid Username/Password');
					window.location.replace('login.php');
					</SCRIPT>";
			}
			else
			{
				$row = mysqli_fetch_array($result);
				$userlevel = $row['userlevel'];
				//$cookie_name = "user_level";
				//setcookie(cookie_name, user_level,time()+3600 , '/');
				
				
				$_SESSION['userlevel'] = $userlevel;
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;
				$_SESSION['login'] = true;
				
				
		
	
				
				header("Location: HomePage.php");
				die();
			}



?>