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
        
        if( empty(mysqli_real_escape_string($con,$_POST['program'])) || empty(mysqli_real_escape_string($con,$_POST['program_release']))|| empty(mysqli_real_escape_string($con,$_POST['program_version'])))
        {
            // echo "Please Fill in the Blanks " ;
            echo "<SCRIPT type='text/javascript'>
                   alert('Please Fill in the Blanks');
                   window.location.replace('programsForm.php');
                   </SCRIPT>";
        }
        else
        {
            // $UserID = $_POST['id'];  
            $program = mysqli_real_escape_string($con,$_POST['program']);
            $program_release = mysqli_real_escape_string($con,$_POST['program_release']);    
            $program_version = mysqli_real_escape_string($con,$_POST['program_version']);
           
           
            $query = " INSERT INTO programs (program,program_release,program_version) values('$program','$program_release','$program_version')";
            $result = mysqli_query($con,$query);

            if(!$result)
            {
           
                // echo "Please check your query " ;
                echo "<SCRIPT type='text/javascript'>
                   alert('please check your query');
                   window.location.replace('programsForm.php');
                   </SCRIPT>";
                
            }

            echo "<SCRIPT type='text/javascript'>
  alert('value inserted');
  window.location.replace('programsForm.php');
  </SCRIPT>";
        // header("location:programsForm.php");
        }

        
      
    }
    else
    {
    //  echo "error on isset()";
     echo "<SCRIPT type='text/javascript'>
  alert('error on isset()');
  window.location.replace('programsForm.php');
  </SCRIPT>";
    }
   

?>