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

    // require_once("connection_to_root.php");

    if(isset($_POST['submit']))
    {
        require_once("connection_to_root.php");
        
        if( empty(mysqli_real_escape_string($con,$_POST['prog_id'])) || empty(mysqli_real_escape_string($con,$_POST['area'])))
        {
            echo "<SCRIPT type='text/javascript'>
            alert('please fill the fields');
            window.location.replace('areasForm.php');
            </SCRIPT>";
        }
        else
        {
            // $UserID = $_POST['id'];  
            $prog_id = mysqli_real_escape_string($con,$_POST['prog_id']);


            if(strlen(mysqli_real_escape_string($con,$_POST['area']))<2)
            {
                echo "<SCRIPT type='text/javascript'>
                alert('area field cannot be less than 2 characters');
                window.location.replace('areasForm.php');
                </SCRIPT>";
            } 
            $area = mysqli_real_escape_string($con,$_POST['area']);   

            
           
            $query = " INSERT INTO areas (prog_id,area) values('$prog_id','$area')";
            $result = mysqli_query($con,$query);

            if(!$result)
            {
           
                echo "<SCRIPT type='text/javascript'>
                alert('please check query');
                window.location.replace('areasForm.php');
                </SCRIPT>";
            }


            echo "<SCRIPT type='text/javascript'>
            alert('value inserted');
            window.location.replace('areasForm.php');
            </SCRIPT>";
            // header("location:areasForm.php");
            exit();
        }

       
      
    }
    else
    {
        // echo "error on isset()";
        echo "<SCRIPT type='text/javascript'>
            alert('error on isset');
            window.location.replace('areasForm.php');
            </SCRIPT>";
    }
   

?>