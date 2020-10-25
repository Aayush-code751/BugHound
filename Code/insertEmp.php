<?php
include 'validate_user.php';		
isLoggedIn();
$valid_level =  isValidLevel(3);
if(!$valid_level) {
  echo "<SCRIPT type='text/javascript'>
  alert('User is Not allowed');
  window.location.replace('HomePage.php');
  </SCRIPT>";			
}
?>
<?php

    if(isset($_POST['submit']))
    {
        require_once("connection_to_root.php");
      
        if( empty(mysqli_real_escape_string($con,$_POST['name'])) || empty(mysqli_real_escape_string($con,$_POST['password']))|| empty(mysqli_real_escape_string($con,$_POST['username'])) || empty(mysqli_real_escape_string($con,$_POST['userlevel'])))
        {
            
            echo "<SCRIPT type='text/javascript'>
            alert('Please Fill in the Blanks');
            window.location.replace('employeeForm.php');
            </SCRIPT>";	
        }
        else if(mysqli_real_escape_string($con,$_POST['userlevel']) < 1 || mysqli_real_escape_string($con,$_POST['userlevel']) >3 )
        {
            
            echo "<SCRIPT type='text/javascript'>
            alert('userlevel should be between 1 - 3');
            window.location.replace('employeeForm.php');
            </SCRIPT>";	

            
        }
        else if(strlen(mysqli_real_escape_string($con,$_POST['password'])) < 6){

            echo "<SCRIPT type='text/javascript'>
            alert('password should be atleast 6 characters');
            window.location.replace('employeeForm.php');
            </SCRIPT>";	
            
        }
        else if(strlen(mysqli_real_escape_string($con,$_POST['name'])) < 2){

           
            echo "<SCRIPT type='text/javascript'>
            alert('name should be atleast 2 characters');
            window.location.replace('employeeForm.php');
            </SCRIPT>";
        }
        else if(strlen(mysqli_real_escape_string($con,$_POST['username'])) < 2){

            echo "<SCRIPT type='text/javascript'>
            alert('username should be atleast 2 characters');
            window.location.replace('employeeForm.php');
            </SCRIPT>";
        }
        else
        {
            // $UserID = $_POST['id'];  
            
            $name = mysqli_real_escape_string($con,$_POST['name']);
            $password = mysqli_real_escape_string($con,$_POST['password']);    
            $username = mysqli_real_escape_string($con,$_POST['username']);
            $userlevel = mysqli_real_escape_string($con,$_POST['userlevel']);
           
            $query = " INSERT INTO employees (name,username,password,userlevel) values('$name','$username','$password','$userlevel')";
            $result = mysqli_query($con,$query);

            if(!$result)
            {
           
                echo "<SCRIPT type='text/javascript'>
            alert('Please check your query');
            window.location.replace('employeeForm.php');
            </SCRIPT>";	
            }

            echo "<SCRIPT type='text/javascript'>
  alert('value inserted');
  window.location.replace('employeeForm.php');
  </SCRIPT>";
        // header("location:employeeForm.php");
        exit();
        }

        
      
    }
    else
    {
        echo "error on isset()";
        echo "<SCRIPT type='text/javascript'>
            alert('error in isset(submit)');
            window.location.replace('employeeForm.php');
            </SCRIPT>";	
    }
   

?>