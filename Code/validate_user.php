		<?php
			session_start();
			
			function isLoggedIn(){
				if(!isset($_SESSION['login'])) {
					echo "<SCRIPT type='text/javascript'>
					alert('User is Not Logged In');
					window.location.replace('login.php');
					</SCRIPT>";	
				}	
			}
			
			function isValidLevel($min_level){
				$userlevel =  (int)$_SESSION['userlevel'];
				if($userlevel < $min_level) {
					return false;
				}
				return true;
			}
		?>