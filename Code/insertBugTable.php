<?php
include 'validate_user.php';		
isLoggedIn();
$valid_level =  isValidLevel(1);
if(!$valid_level) {
  echo "<SCRIPT type='text/javascript'>
  alert('User is Not allowed');
  window.location.replace('bugSection.php');
  </SCRIPT>";			
}
?>
<?php

    if(isset($_POST['submit']))
    {
        require_once("connection_to_root.php");
        if( empty($_POST['prog_id']) || empty($_POST['reported_by']) || empty($_POST['report_type']) || empty($_POST['severity'])|| empty($_POST['reproducible'])|| empty($_POST['problem_summary'])||  empty($_POST['date']))
        {
            
            echo "<SCRIPT type='text/javascript'>
            alert(' Filling  prog id ,reported by, report type,severity,reproducible,problem summary, problem,date is mandatory');
            window.location.replace('bugForm.php');
            </SCRIPT>";	
        }
        else
        {
            // $UserID = $_POST['id'];  
            
            $prog_id = $_POST['prog_id'];
            $reported_by = $_POST['reported_by'];
             $area_id = 'NULL';
             if(!empty($_POST['area_id']))
            {
                $area_id=$_POST['area_id'];
            
               }
               
               
            $assigned_to = 'NULL';
               if(!empty($_POST['assigned_to']))
            {
                $assigned_to=$_POST['assigned_to'];
            
               }

               $resolved_by = 'NULL';
               if(!empty($_POST['resolved_by']))
            {
                $resolved_by=$_POST['resolved_by'];
            
               }

               $tested_by = 'NULL';
               if(!empty($_POST['tested_by']))
            {
                $tested_by=$_POST['tested_by'];
            
               }

               $report_type = '';
               if(!empty($_POST['report_type']))
            {
                $report_type=$_POST['report_type'];
            
               }

               $severity = '';
               if(!empty($_POST['severity']))
            {
                $severity=$_POST['severity'];
            
               }
               $problem_summary= mysqli_real_escape_string($con,$_POST['problem_summary']);
               ;

               $problem=mysqli_real_escape_string($con,$_POST['problem']);

               $reproducible=$_POST['reproducible'];

               $date=$_POST['date'];

               $resolved_date=$_POST['resolved_date'];

               $test_date=$_POST['test_date'];

               $suggested_fix=mysqli_real_escape_string($con,$_POST['suggested_fix']);

               $comments=mysqli_real_escape_string($con,$_POST['comments']);;

               $status=$_POST['status'];

               $priority=$_POST['priority'];

               $resolution=$_POST['resolution'];

               $resolution_version=mysqli_real_escape_string($con,$_POST['resolution_version']);

               
            //    $attachment='';
            //    $attachment_type='';
            //    $attachment_size='';
            //    if($_FILES["attachment"]["name"]!='')
            //    {
            //     $attachment = rand(1000,100000)."-".$_FILES['attachment']['name'];
            //     $attachment_loc = $_FILES['attachment']['tmp_name'];
            //  $attachment_size = $_FILES['attachment']['size'];
            //  $attachment_type = $_FILES['attachment']['type'];
            //  $folder="uploads/";
             
            //  move_uploaded_file($attachment_loc,$folder.$attachment);
            //    }




           
           
            $query = " INSERT INTO bugtable (prog_id,area_id,report_type,severity,problem_summary,problem,reproducible,reported_by,date,suggested_fix,assigned_to,comments,status,priority,resolution,resolution_version,resolved_by,resolved_date,tested_by,test_date) 
                                    values($prog_id,$area_id,'$report_type','$severity','$problem_summary','$problem','$reproducible',$reported_by,'$date','$suggested_fix',$assigned_to,'$comments','$status','$priority','$resolution','$resolution_version',$resolved_by,'$resolved_date',$tested_by,'$test_date')";
               
            $result = mysqli_query($con,$query);
            // $query = " INSERT INTO bugtable (prog_id,area_id,reported_by,assigned_to,resolved_by,tested_by) values($prog_id,$area_id,$reported_by,NULL,NULL,NULL)";
            // $result = mysqli_query($con,$query);
           
            // $query = " INSERT INTO bugtable (prog_id, area_id, report_type, severity, problem_summary, problem, reproducible, reported_by, date, suggested_fix, assigned_to, comments, status, priority, resolution, resolution_version, resolved_by, resolved_date, tested_by, test_date, deferred) 
            // values($prog_id, NULL, '', '', '', '', '', $reported_by, '', '', NULL, '', '', '', '', '', NULL, '', NULL, '', '')";
            

            if(!$result)
            {
            // echo $query;
               echo "<SCRIPT type='text/javascript'>
           alert('Please check your query');
            window.location.replace('bugForm.php');
           </SCRIPT>";	
            }
            // echo $query;

           echo "<SCRIPT type='text/javascript'>
 alert('value inserted');
  window.location.replace('bugForm.php');
  </SCRIPT>";
      
        }

  
    }
    else
    {
        echo "error on isset()";
        echo "<SCRIPT type='text/javascript'>
            alert('error in isset(submit)');
            window.location.replace('bugForm.php');
            </SCRIPT>";	
    }
   

?>