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

 
    if(isset($_POST['update']))
    {
        require_once("connection_to_root.php");
        if( empty(mysqli_real_escape_string($con,$_POST['name'])) || empty(mysqli_real_escape_string($con,$_POST['password']))|| empty(mysqli_real_escape_string($con,$_POST['username'])) || empty(mysqli_real_escape_string($con,$_POST['userlevel'])))
        {
            
            echo "<SCRIPT type='text/javascript'>
            alert('Please Fill in the Blanks');
            window.location.replace('viewEmpEditableTable.php');

            </SCRIPT>";	
        }
        else if(mysqli_real_escape_string($con,$_POST['userlevel']) < 1 || mysqli_real_escape_string($con,$_POST['userlevel']) >3 )
        {
            
            echo "<SCRIPT type='text/javascript'>
            alert('userlevel should be between 1 - 3');
            window.location.replace('viewEmpEditableTable.php');
            </SCRIPT>";	

            
        }
        else if(strlen(mysqli_real_escape_string($con,$_POST['password'])) < 6){

            echo "<SCRIPT type='text/javascript'>
            alert('password should be atleast 6 characters');
            window.location.replace('viewEmpEditableTable.php');
            </SCRIPT>";	
            
        }
        else if(strlen(mysqli_real_escape_string($con,$_POST['name'])) < 2){

           
            echo "<SCRIPT type='text/javascript'>
            alert('name should be atleast 2 characters');
            window.location.replace('viewEmpEditableTable.php');
            </SCRIPT>";
        }
        else if(strlen(mysqli_real_escape_string($con,$_POST['username'])) < 2){

            echo "<SCRIPT type='text/javascript'>
            alert('username should be atleast 2 characters');
            window.location.replace('viewEmpEditableTable.php');
            </SCRIPT>";
        }

        else{
        require_once("connection_to_root.php");

        $emp_id = mysqli_real_escape_string($con,$_POST['emp_id']);
        $name = mysqli_real_escape_string($con,$_POST['name']);
        $password = mysqli_real_escape_string($con,$_POST['password']);
        $username = mysqli_real_escape_string($con,$_POST['username']);
        $userlevel = mysqli_real_escape_string($con,$_POST['userlevel']);
        $query = " UPDATE employees set name = '".$name."', password='".$password."',username='".$username."',userlevel='".$userlevel."' WHERE emp_id='".$emp_id."' ";
        $result = mysqli_query($con,$query);
 
        if(!$result)
        {
            echo "<SCRIPT type='text/javascript'>
            alert('please check your query');
            window.location.replace('viewEmpEditableTable.php');
            </SCRIPT>";
            
            
        }
        
        echo "<SCRIPT type='text/javascript'>
        alert('value updated');
        window.location.replace('viewEmpEditableTable.php');
        </SCRIPT>";
    }
    }
    else if(isset($_POST['delete']))
    {
        require_once("connection_to_root.php");

        $emp_id = $_POST['emp_id'];
        
        // $name = $_POST['name'];
        
        // $password = $_POST['password'];
        // $username = $_POST['username'];
        // $userlevel = $_POST['userlevel'];
        $query = " DELETE FROM employees WHERE emp_id='" . $emp_id . "'";
        $result = mysqli_query($con,$query);
 
        if(!$result)
        {
            header("location:viewEmpEditableTable.php");
            echo "<SCRIPT type='text/javascript'>
            alert('please check your query Or Some Foreign Key might be present in other table');
            window.location.replace('viewEmpEditableTable.php');
            </SCRIPT>";
        }
        echo "<SCRIPT type='text/javascript'>
            alert('value deleted');
            window.location.replace('viewEmpEditableTable.php');
            </SCRIPT>";
        
    }
    else
    {
        // header("location:viewEmpEditableTable.php");
        echo "<SCRIPT type='text/javascript'>
            alert('error in isset()');
            window.location.replace('viewEmpEditableTable.php');
            </SCRIPT>";
    }
 
?>