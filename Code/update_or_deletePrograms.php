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

        if( empty(mysqli_real_escape_string($con,$_POST['program'])) || empty(mysqli_real_escape_string($con,$_POST['program_release']))|| empty(mysqli_real_escape_string($con,$_POST['program_version'])))
        {
            
            echo "<SCRIPT type='text/javascript'>
            alert('Please Fill in the Blanks');
            window.location.replace('viewProgramsEditableTable.php');
            </SCRIPT>";
        }
        
        else if(strlen(mysqli_real_escape_string($con,$_POST['program'])) < 3){

            echo " program should be atleast 3 characters";
            echo "<SCRIPT type='text/javascript'>
            alert('program should be atleast 3 characters');
            window.location.replace('viewProgramsEditableTable.php');
            </SCRIPT>";
        }
       
        
        else 
        {
        require_once("connection_to_root.php");

        $prog_id = $_POST['prog_id'];
      
        $program = mysqli_real_escape_string($con,$_POST['program']);
        $program_release = mysqli_real_escape_string($con,$_POST['program_release']);    
        $program_version = mysqli_real_escape_string($con,$_POST['program_version']);
       

        $query = " UPDATE programs set program = '".$program."',program_release='".$program_release."',program_version='".$program_version."' WHERE prog_id='".$prog_id."' ";
        $result = mysqli_query($con,$query);
 
        if($result)
        {
            // echo "query successful";
            // header("location:viewProgramsEditableTable.php");
            echo "<SCRIPT type='text/javascript'>
            alert('value updated');
            window.location.replace('viewProgramsEditableTable.php');
            </SCRIPT>";
        }
        else
        {
            // echo ' Please Check Your Query ';
            echo "<SCRIPT type='text/javascript'>
            alert('please check your query');
            window.location.replace('viewProgramsEditableTable.php');
            </SCRIPT>";
        }
      }
    }
    else if(isset($_POST['delete']))
    {
        require_once("connection_to_root.php");

        $prog_id = $_POST['prog_id'];
        
        // $name = $_POST['name'];
        
        // $password = $_POST['password'];
        // $username = $_POST['username'];
        // $userlevel = $_POST['userlevel'];
        $query = " DELETE FROM programs WHERE prog_id='" . $prog_id . "'";
        $result = mysqli_query($con,$query);
 
        if($result)
        {
            // header("location:viewProgramsEditableTable.php");
            echo "<SCRIPT type='text/javascript'>
            alert('value deleted');
            window.location.replace('viewProgramsEditableTable.php');
            </SCRIPT>";
        }
        else
        {
            echo "<SCRIPT type='text/javascript'>
            alert('did NOT delete because some attributes are FOREIGN KEY in another table or there is problem in the query');
            window.location.replace('viewProgramsEditableTable.php');
            </SCRIPT>";
        }
    }
    else
    {
        // header("location:viewProgramsEditableTable.php");
        echo "<SCRIPT type='text/javascript'>
        alert('problem in isset()');
        window.location.replace('viewProgramsEditableTable.php');
        </SCRIPT>";
    }
 
?>