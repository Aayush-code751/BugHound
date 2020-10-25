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
        
        // if(strlen($_POST['area'])<2)
        // {
        //     // echo ' Please Fill in the area field ';
        //     echo "<SCRIPT type='text/javascript'>
        //     alert('area field cannot be less than 2 characters');
        //     window.location.replace('viewAreasEditableTable.php');
        //     </SCRIPT>";
        // }
        require_once("connection_to_root.php");

        if(strlen(mysqli_real_escape_string($con,$_POST['area']))<2)
        {
            echo "<SCRIPT type='text/javascript'>
            alert('area field cannot be less than 2 characters');
            window.location.replace('viewAreasEditableTable.php');
            </SCRIPT>";
        }
        
        else
        {



        require_once("connection_to_root.php");


        $area_id = $_POST['area_id'];
        $prog_id = $_POST['prog_id'];
       
        $area = mysqli_real_escape_string($con,$_POST['area']);
       
        $query = " UPDATE areas set prog_id='".$prog_id."',area='".$area."' WHERE area_id='".$area_id."' ";
        $result = mysqli_query($con,$query);
 
        if($result)
        {
            // header("location:viewAreasEditableTable_copy.php");
            echo "<SCRIPT type='text/javascript'>
            alert('value updated');
            window.location.replace('viewAreasEditableTable.php');
            </SCRIPT>";
            
        }
        else
        {
            // echo ' Please Check Your Query ';
            echo "<SCRIPT type='text/javascript'>
            alert('Please check your query');
            window.location.replace('viewAreasEditableTable.php');
            </SCRIPT>";
        }
        }
    }
    else  if(isset($_POST['delete']))
    {
        require_once("connection_to_root.php");

        $area_id = $_POST['area_id'];
        
        // $name = $_POST['name'];
        
        // $password = $_POST['password'];
        // $username = $_POST['username'];
        // $userlevel = $_POST['userlevel'];
        $query = " DELETE FROM areas WHERE area_id='" . $area_id . "'";
        $result = mysqli_query($con,$query);
 
        if($result)
        {
            // header("location:viewAreasEditableTable_copy.php");
            echo "<SCRIPT type='text/javascript'>
            alert('value deleted');
            window.location.replace('viewAreasEditableTable.php');
            </SCRIPT>";
        }
        else
        {
            // echo ' Please Check Your Query ';
            echo "<SCRIPT type='text/javascript'>
            alert('Please check your query or some Foreign Key might be present in other table');
            window.location.replace('viewAreasEditableTable.php');
            </SCRIPT>";
        }
    }
    else
    {
        // header("location:viewAreasEditableTable_copy.php");
        echo "<SCRIPT type='text/javascript'>
            alert('problem in isset()');
            window.location.replace('viewAreasEditableTable.php');
            </SCRIPT>";
    }
 
?>