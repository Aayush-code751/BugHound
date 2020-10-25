<?php
	include 'validate_user.php';		
    isLoggedIn();
    $valid_level =  isValidLevel(2);
    if(!$valid_level) {
      echo "<SCRIPT type='text/javascript'>
      alert('User is Not allowed');
      window.location.replace('HomePage.php');
      </SCRIPT>";			
    }
if(isset($_POST['bug_id_thrown']))
{
    // id to search
    
        $bug_id = $_POST['bug_id_thrown'];
   
    
    
    // connect to mysql
    require_once("connection_to_root.php");
    
    // mysql search query
    $query = "SELECT * FROM `bugtable` WHERE `bug_id` = $bug_id LIMIT 1";
    
    
    $result = mysqli_query($con, $query);
    if(!$result)
    {
    // echo $query;
       echo "<SCRIPT type='text/javascript'>
   alert('Please check your query line 31');
    window.location.replace('searchPage_BugForm.php.php');
   </SCRIPT>";	
    }
    

    // if id exist 
    // show data in inputs
    if(mysqli_num_rows($result) > 0)
    {
      while ($row = mysqli_fetch_array($result))
      {
          //$id=$row['id'];
        
        $bug_id = $row['bug_id'];
        $prog_id = $row['prog_id'];
        $area_id= $row['area_id'];
        $report_type = $row['report_type'];
        $severity= $row['severity']; 
        $problem_summary = $row['problem_summary'];
        $problem = $row['problem'];
        $reproducible= $row['reproducible']; 
        $reported_by = $row['reported_by'];
        $date = $row['date'];
        $suggested_fix= $row['suggested_fix']; 
        $assigned_to = $row['assigned_to'];
        $comments = $row['comments'];
        $status= $row['status']; 
        $priority = $row['priority'];
        $resolution = $row['resolution'];
        $resolution_version= $row['resolution_version']; 
        $resolved_by = $row['resolved_by'];
        $resolved_date = $row['resolved_date'];
        $tested_by= $row['tested_by'];
        $test_date = $row['test_date'];
        $deferred = $row['deferred'];
        // $attachment = $row['attachment'];
       
        //        $attachment_type=$row['attachment_type'];
        //        $attachment_size=$row['attachment_size'];
        
     
     

      }  
    }

    
    // if the id not exist
    // show a message and clear inputs
    
    
    //mysqli_free_result($result);
//    mysqli_close($con);
    
}
else if(isset($_POST['search'])  )
{
    if( empty($_POST['bug_id']) )
    {
        
        echo "<SCRIPT type='text/javascript'>
        alert('Please enter a bug to search line 93');
        window.location.replace('update_or_deleteBug.php');
        </SCRIPT>";	
    }

    $bug_id = $_POST['bug_id'];
   
    
    
    // connect to mysql
    require_once("connection_to_root.php");
    
    // mysql search query
    $query = "SELECT * FROM `bugtable` WHERE `bug_id` = $bug_id LIMIT 1";
    
    
    $result = mysqli_query($con, $query);

    
    if(!$result)
    {
    // echo $query;
       echo "<SCRIPT type='text/javascript'>
   alert('Please check your query line 116');
    window.location.replace('update_or_deleteBug.php');
   </SCRIPT>";	
    }
    // if id exist 
    // show data in inputs
    if(mysqli_num_rows($result) > 0)
    {
      while ($row = mysqli_fetch_array($result))
      {
          //$id=$row['id'];
        
        $bug_id = $row['bug_id'];
        $prog_id = $row['prog_id'];
        $area_id= $row['area_id'];
        $report_type = $row['report_type'];
        $severity= $row['severity']; 
        $problem_summary = $row['problem_summary'];
        $problem = $row['problem'];
        $reproducible= $row['reproducible']; 
        $reported_by = $row['reported_by'];
        $date = $row['date'];
        $suggested_fix= $row['suggested_fix']; 
        $assigned_to = $row['assigned_to'];
        $comments = $row['comments'];
        $status= $row['status']; 
        $priority = $row['priority'];
        $resolution = $row['resolution'];
        $resolution_version= $row['resolution_version']; 
        $resolved_by = $row['resolved_by'];
        $resolved_date = $row['resolved_date'];
        $tested_by= $row['tested_by'];
        $test_date = $row['test_date'];
        $deferred = $row['deferred'];
        // $attachment = $row['attachment'];
       
        //        $attachment_type=$row['attachment_type'];
        //        $attachment_size=$row['attachment_size'];
        
     
     

      }  
    }

    
    // if the id not exist
    // show a message and clear inputs
    

}

    else if(isset($_POST['update']))
    {
        require_once("connection_to_root.php");
        if( empty($_POST['prog_id']) || empty($_POST['reported_by']) || empty($_POST['report_type']) || empty($_POST['severity'])|| empty($_POST['reproducible'])|| empty($_POST['problem_summary'])||  empty($_POST['date']))
        {
            
            echo "<SCRIPT type='text/javascript'>
            alert(' Filling  prog id ,reported by, report type,severity,reproducible,problem summary, problem,date is mandatory');
            
            </SCRIPT>";	

            $bug_id=$_POST['bug_id1'];
            if( empty($_POST['bug_id1']) )
    {
        
        echo "<SCRIPT type='text/javascript'>
        alert('Please enter a bug to search line 184');
        window.location.replace('update_or_deleteBug.php');
        </SCRIPT>";	
    }
            $query = "SELECT * FROM `bugtable` WHERE `bug_id` = '".$bug_id."' ";
            
            
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_assoc($result);
            if(!$result)
            {
            // echo $query;
               echo "<SCRIPT type='text/javascript'>
           alert('Please check your query line 197');
            window.location.replace('update_or_deleteBug.php');
           </SCRIPT>";	
            }
            
            $bug_id = $row['bug_id'];
        $prog_id = $row['prog_id'];
        $area_id= $row['area_id'];
        $report_type = $row['report_type'];
        $severity= $row['severity']; 
        $problem_summary = $row['problem_summary'];
        $problem = $row['problem'];
        $reproducible= $row['reproducible']; 
        $reported_by = $row['reported_by'];
        $date = $row['date'];
        $suggested_fix= $row['suggested_fix']; 
        $assigned_to = $row['assigned_to'];
        $comments = $row['comments'];
        $status= $row['status']; 
        $priority = $row['priority'];
        $resolution = $row['resolution'];
        $resolution_version=mysqli_real_escape_string($con,$_POST['resolution_version']);
        $resolved_by = $row['resolved_by'];
        $resolved_date = $row['resolved_date'];
        $tested_by= $row['tested_by'];
        $test_date = $row['test_date'];
        $deferred = $row['deferred'];
        // $attachment = $row['attachment'];


        }
        else
        {
            // $UserID = $_POST['id'];  
            //the post bug id is bugid1 as it should be a diff variable when are updating if we keep it to bug_id then it will again do search
            $bug_id=$_POST['bug_id1'];
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

               $problem_summary='';
               
               if(!empty(mysqli_real_escape_string($con,$_POST['problem_summary'])))
                {$problem_summary=mysqli_real_escape_string($con,$_POST['problem_summary']);}
                
                $problem='';
                if(!empty(mysqli_real_escape_string($con,$_POST['problem'])))
                {
               $problem=mysqli_real_escape_string($con,$_POST['problem']);
                }

                $reproducible='';
                if(!empty($_POST['reproducible']))
                {
                    $reproducible=$_POST['reproducible'];
                }
               

               $date='';
               if(!empty($_POST['date']))
               {
                $date=$_POST['date'];
               }
               

               $suggested_fix='';
               if(!empty(mysqli_real_escape_string($con,$_POST['suggested_fix'])))
               {
                $suggested_fix=mysqli_real_escape_string($con,$_POST['suggested_fix']);

               }
               

               $comments='';
               if(!empty(mysqli_real_escape_string($con,$_POST['comments'])))
               {
                $comments=mysqli_real_escape_string($con,$_POST['comments']);

               }
               

               $status='';
               if(!empty($_POST['status']))
               {
                $status=$_POST['status'];
               }
               
  
               $priority='';
               if(!empty($_POST['priority']))
               {
                $priority=$_POST['priority']; 
               }
               

               $resolution='';
               if(!empty($_POST['resolution']))
               {
                $resolution=$_POST['resolution'];
               }
               

               $resolution_version='';
               if(!empty(mysqli_real_escape_string($con,$_POST['resolution_version'])))
               {
                $resolution_version=mysqli_real_escape_string($con,$_POST['resolution_version']);
               }
               

              

               $resolved_date='';
               if(!empty($_POST['resolved_date']))
               {
                $resolved_date = $_POST['resolved_date'];
               }
               

               

               $test_date ='';
               if(!empty($_POST['test_date']))
               {
                $test_date = $_POST['test_date'];
               }
               

               $deferred='';
               if(!empty($_POST['deferred']))
               {
                $deferred = $_POST['deferred'];
               }
               

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


            $query= "UPDATE `bugtable` SET  `prog_id`='".$prog_id."',`area_id`=$area_id,`report_type`='".$report_type."',`severity`='".$severity."',
            `problem_summary`='".$problem_summary."',`problem`='".$problem."' ,`reproducible`='".$reproducible."' ,
            `reported_by`='".$reported_by."',`date`='".$date."',`suggested_fix`='".$suggested_fix."',`assigned_to`=$assigned_to,`comments`='".$comments."',`status`='".$status."',`priority`='".$priority."',`resolution`='".$resolution."',
            `resolution_version`='".$resolution_version."',`resolved_date`='".$resolved_date."',`resolved_by`=$resolved_by,`tested_by`=$tested_by,`test_date`='".$test_date."',`deferred`='".$deferred."'  WHERE `bug_id` = $bug_id";
  

           //,`resolved_by`='$resolved_by' ,`resolved_date`='".$resolved_date."',`tested_by`=$tested_by ,`test_date`='".$test_date."',`deferred`='".$deferred."', `attachments`='".$attachments."
           //echo $query;
         
            $result = mysqli_query($con,$query);
            if(!$result)
            {
            // echo $query;
               echo "<SCRIPT type='text/javascript'>
           alert('Please check your query line 402');
            window.location.replace('update_or_deleteBug.php');
           </SCRIPT>";	
            }
            // echo $query;

            // reinitializing

            $query = "SELECT * FROM `bugtable` WHERE `bug_id` = '".$bug_id."' ";
            
            
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_assoc($result);
            if(!$result)
            {
            // echo $query;
               echo "<SCRIPT type='text/javascript'>
           alert('Please check your query line 475');
            window.location.replace('update_or_deleteBug.php');
           </SCRIPT>";	
            }
            
            $bug_id = $row['bug_id'];
        $prog_id = $row['prog_id'];
        $area_id= $row['area_id'];
        $report_type = $row['report_type'];
        $severity= $row['severity']; 
        $problem_summary = $row['problem_summary'];
        $problem = $row['problem'];
        $reproducible= $row['reproducible']; 
        $reported_by = $row['reported_by'];
        $date = $row['date'];
        $suggested_fix= $row['suggested_fix']; 
        $assigned_to = $row['assigned_to'];
        $comments = $row['comments'];
        $status= $row['status']; 
        $priority = $row['priority'];
        $resolution = $row['resolution'];
        $resolution_version= $row['resolution_version']; 
        $resolved_by = $row['resolved_by'];
        $resolved_date = $row['resolved_date'];
        $tested_by= $row['tested_by'];
        $test_date = $row['test_date'];
        $deferred = $row['deferred'];
        // $attachment = $row['attachment'];

       
           echo "<SCRIPT type='text/javascript'>
                alert('Value Updated');
 
                 </SCRIPT>";
      
        }

  
    }
    else if(isset($_POST['insert_attachment']))
    {         require_once("connection_to_root.php");

        if($_FILES["attachment"]["name"]=='')
        {
            
            echo "<SCRIPT type='text/javascript'>
            alert('Please select a file line 465');
            
            </SCRIPT>";	

            
            if( empty($_POST['bug_id1']) )
                {
        
        echo "<SCRIPT type='text/javascript'>
        alert('Please enter a bug to search line 474');
        window.location.replace('update_or_deleteBug.php');
        </SCRIPT>";	
                  }
    $bug_id=$_POST['bug_id1'];
            $query = "SELECT * FROM `bugtable` WHERE `bug_id` = '".$bug_id."' ";
            
            
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_assoc($result);
            if(!$result)
            {
            // echo $query;
               echo "<SCRIPT type='text/javascript'>
           alert('Please check your query line 487');
            window.location.replace('update_or_deleteBug.php');
           </SCRIPT>";	
            }
            
            $bug_id = $row['bug_id'];
        $prog_id = $row['prog_id'];
        $area_id= $row['area_id'];
        $report_type = $row['report_type'];
        $severity= $row['severity']; 
        $problem_summary = $row['problem_summary'];
        $problem = $row['problem'];
        $reproducible= $row['reproducible']; 
        $reported_by = $row['reported_by'];
        $date = $row['date'];
        $suggested_fix= $row['suggested_fix']; 
        $assigned_to = $row['assigned_to'];
        $comments = $row['comments'];
        $status= $row['status']; 
        $priority = $row['priority'];
        $resolution = $row['resolution'];
        $resolution_version= $row['resolution_version']; 
        $resolved_by = $row['resolved_by'];
        $resolved_date = $row['resolved_date'];
        $tested_by= $row['tested_by'];
        $test_date = $row['test_date'];
        $deferred = $row['deferred'];
        // $attachment = $row['attachment'];


        }
        else
        {  require_once("connection_to_root.php");
            // this bug id is from post
        $bug_id=$_POST['bug_id1'];

        $query = "SELECT * FROM bugtable WHERE bug_id= $bug_id";
        $result = mysqli_query($con, $query);
        if(!$result)
        {
              echo "<SCRIPT type='text/javascript'>
            alert('Problem while updating attachment in line 527');
           
            </SCRIPT>";
        }

        $row=mysqli_fetch_assoc($result);
            // this bug id is from database

        $bug_id = $row['bug_id'];
        $prog_id = $row['prog_id'];
        $area_id= $row['area_id'];
        $report_type = $row['report_type'];
        $severity= $row['severity']; 
        $problem_summary = $row['problem_summary'];
        $problem = $row['problem'];
        $reproducible= $row['reproducible']; 
        $reported_by = $row['reported_by'];
        $date = $row['date'];
        $suggested_fix= $row['suggested_fix']; 
        $assigned_to = $row['assigned_to'];
        $comments = $row['comments'];
        $status= $row['status']; 
        $priority = $row['priority'];
        $resolution = $row['resolution'];
        $resolution_version= $row['resolution_version']; 
        $resolved_by = $row['resolved_by'];
        $resolved_date = $row['resolved_date'];
        $tested_by= $row['tested_by'];
        $test_date = $row['test_date'];
        $deferred = $row['deferred'];
        // $attachment = $row['attachment'];


               $attachment='';
               $attachment_type='';
               $attachment_size='';
               if($_FILES["attachment"]["name"]!='')
               {
                $attachment = rand(1000,100000)."-".$_FILES['attachment']['name'];
                $attachment_loc = $_FILES['attachment']['tmp_name'];
             $attachment_size = $_FILES['attachment']['size'];
             $attachment_type = $_FILES['attachment']['type'];
             $folder="uploads/";
             
             move_uploaded_file($attachment_loc,$folder.$attachment);
               }
               
               

            //    $query = "UPDATE `bugtable` SET  `prog_id`='".$prog_id."',`area_id`=$area_id,`report_type`='".$report_type."',`severity`='".$severity."',
            //    `problem_summary`='".$problem_summary."',`problem`='".$problem."' ,`reproducible`='".$reproducible."' ,
            //    `reported_by`='".$reported_by."',`date`='".$date."',`suggested_fix`='".$suggested_fix."',`assigned_to`=$assigned_to,`comments`='".$comments."',`status`='".$status."',`priority`='".$priority."',`resolution`='".$resolution."',
            //    `resolution_version`='".$resolution_version."',`resolved_date`='".$resolved_date."',`resolved_by`=$resolved_by,`tested_by`=$tested_by,`test_date`='".$test_date."',`deferred`='".$deferred."',attachment='".$attachment."',attachment_type='".$attachment_type."',attachment_size='".$attachment_size."'  WHERE `bug_id` = $bug_id";
            
            // $query= "UPDATE bugtable set attachment='".$attachment."',attachment_size='".$attachment_size."',attachment_type='".$attachment_type."' WHERE bug_id='".$bug_id."' ";
            require_once("connection_to_root.php");
            $query= "INSERT INTO attachments (attachment,attachment_type,attachment_size,bug_id) VALUES ('$attachment','$attachment_type','$attachment_size','$bug_id') ";

        //    " INSERT INTO `attachments` (`attachment_id`, `attachment`, `attachment_type`, `attachment_size`, `bug_id`) VALUES (NULL, 'aasasasass', 'asasasasasasa', '123455', '226') ";
            $result = mysqli_query($con,$query);
            echo $result;

            if(!$result)
        {
            echo $query;
              echo "<SCRIPT type='text/javascript'>
            alert('Problem while updating attachment in line 592 or No attachment selected');
           
            </SCRIPT>";
        }else
        {
            echo "<SCRIPT type='text/javascript'>
            alert('attachment inserted');
           
            </SCRIPT>";

        }

    }

            




    }

// in the first time inputs are empty
else
{
    $bug_id="";
    $prog_id = "";
    $area_id="";
    $report_type ="";
    $severity= ""; 
    $problem_summary = "";
    $problem = "";
    $reproducible= ""; 
    $reported_by = "";
    $date = "";
    $suggested_fix= ""; 
    $assigned_to = "";
    $comments = "";
    $status= ""; 
    $priority ="";
    $resolution = "";
    $resolution_version= ""; 
    $resolved_by = "";
    $resolved_date ="";
    $tested_by="";
    $test_date = "";
    $deferred = "";
    $attachment = "";
}
?>

    <!DOCTYPE html>

    <html>

    <head>

        <title> update and delete </title>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
   <style>
 input[type=submit] {
    background-color: #8bd6ae;
   
border-radius:0.12em;
font-family:'Roboto',sans-serif;
 font-weight:300;
    border: none;
    color: white;
    padding: 10px 36px;
    text-decoration: none;
    margin: 5px 4px;
transition: all 0.2s;
 box-sizing: border-box;
    cursor: pointer;  
}
input[type=button] {
    background-color: blue;
   
border-radius:0.12em;
font-family:'Roboto',sans-serif;
 font-weight:300;
    border: none;
    color: white;
    padding: 10px 36px;
    text-decoration: none;
    margin: 5px 4px;
transition: all 0.2s;
 box-sizing: border-box;
    cursor: pointer;  
}
   
body {
  background: #daf7f6;
  background: -webkit-linear-gradient(to bottom,#daf7f6 );
  background: linear-gradient(to bottom, #daf7f6);
  
}

   </style>

    </head>

    <body>
    <br>
    
    <center>
    <h2>Update Bug Report</h2>
        <form action="update_or_deleteBug.php" method="post" enctype="multipart/form-data" name="bugForm" onsubmit="return validate()">
        <br>

         
            <label form="">SELECT BUG  :</label>
                                <select  name="bug_id" style="width:150px;height:25px;" > 
                                <!-- <option value=""></option> -->
                                <?php 
        require_once("connection_to_root.php");
                                
                                $query = " Select bug_id From bugtable ";
                            $result = mysqli_query($con,$query);
                            
                            while($row=mysqli_fetch_assoc($result))
                            {
                                ?>
                                
                           

                                <option  value="<?php echo $row['bug_id'];?>">
                                <?php echo $row['bug_id'];?>
                                </option>
                                
                                <?php 

                            }
                            // mysqli_close($con);
                               ?>
                               </select>
                               <br>
                                
                    <div style="padding-left: 80px; ">     
                     <input type="submit" name="search" value="search" >
                     </div>
                  <br><br><br>

                  <div class="form-group">
                  <label > Bug ID:</label> <input type="text" name="bug_id1" value="<?php echo $bug_id;?>" readonly style="width:50px;height:25px;" > &nbsp;&nbsp;

            <!--<label > Program:</label><input type="text" name="prog_id" value="<?php echo $prog_id;?>" size="35">-->
                <label > Program : </label>
                            
                <select  name="prog_id" style="width:150px;height:25px;"> 
                                    
                            
                            <option value=<?php echo $prog_id;?>>
                             <?php echo $prog_id;?>
                            </option> 


                        <?php
                        require_once("connection_to_root.php");
                        $query = " SELECT * From programs ";
                                $result = mysqli_query($con,$query);
                                if(!$result)
            {
             echo $query;
               echo "<SCRIPT type='text/javascript'>
           alert('please check line 809, query unsuccessful');
            
           </SCRIPT>";	
            }
                                while($row=mysqli_fetch_assoc($result))
                                  {
                         ?>
                                <option value=<?php echo $row['prog_id'];?>>
                                <?php echo $row['prog_id'].' - '.$row['program'].' - '.$row['program_release'].' - '.$row['program_version'];?>
                                </option>     
                        <?php 
                          }       
                        ?>
                
                </select>
                &nbsp;&nbsp;


                <label >Area : </label >
                <select  name="area_id" style="width:100px;height:25px;" > 
                            
                                <option value=<?php echo $area_id;?>>
                                 <?php echo $area_id;?>
                                </option> 


                                <?php
                                require_once("connection_to_root.php");

                                $query = " Select area_id, area From areas ";
                               $result = mysqli_query($con,$query);
                            while($row=mysqli_fetch_assoc($result))
                            {
                                ?>
                                
                           

                                <option value=<?php echo $row['area_id'];?> >
                                <?php echo $row['area_id'].'-'.$row['area'];?>
                                </option>
                                
                                <?php 

                            }
                        
                               ?>
                              </select>
               <!-- <input type="text" name="area_id" value="<?php echo $area_id;?>" style="width:50px;height:25px;"><br><br> -->
            </div><br>

            <!--end of 1st row-->

             
            <div class="form-group">
            <label > Report Type : </label>
            <select name="report_type"  style="width:150px;height:25px;">
                              <option value="<?php echo $report_type;?>"><?php echo $report_type;?></option>
                              
                              <option value="Coding Error">Coding Error</option>
                              <option value="Design issue">Design issue</option>
                              <option value="Suggestion">Suggestion</option>
                              <option value="Documentation">Documentation</option>
                              <option value="Hardware">Hardware</option>
                              <option value="Query">Query</option>
             </select>
             &nbsp;&nbsp;
             
             <label > Severity : </label>
                              <select name="severity" style="width:150px;height:25px;">
                              <option value=<?php echo $severity;?>><?php echo $severity;?></option>
                              <option value="Minor">Minor</option>
                              <option value="Serious">Serious</option>
                              <option value="Fatal">Fatal</option>
                             
                              </select>
               <!--<input type="text" name="severity" value="<?php echo $severity;?>"><br><br>-->

                <br>
            </div>

           <!--end of 2st row problem_summary:    <input type="text" name="problem_summary" value="<?php echo $problem_summary;?>"><br><br>
         -->
        
           <div class="form-group">
           <br>
           <label style="vertical-align:top;">Problem Summary : </label>
         <textarea name="problem_summary" rows="2" cols="45"><?php echo $problem_summary;?></textarea>
               
                <br>
            </div>
          <!--end of 3st row Reproducible:  <br><br>-->


            <div class="form-group">
            
            <label style="vertical-align:top;">Problem : </label>
            <textarea name="problem" rows="4" cols="40"><?php echo $problem;?></textarea>

            
            &nbsp;&nbsp;
            <label style="vertical-align:top;">Reproducible : </label>
                              <select name="reproducible"  style="width:50px;height:25px;vertical-align:top;">
                              
                              <option value=<?php echo $reproducible;?>><?php echo $reproducible;?></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>

                              </select>
                <br>
            </div>
            <!--end of 4th row Reproducible:  <input type="text" name="reproducible" value="><br><br>-->



                
            <div class="form-group">
            <label style="vertical-align:top;">Suggested Fix : </label>
            <textarea name="suggested_fix" rows="3" cols="55"><?php echo $suggested_fix;?></textarea>
            </div>

 <!--end of 5th row -->



            <div class="form-group">
           
            <label > Reported by : </label>
                                <select  name="reported_by" style="width:80px;height:25px;" > 
                            
                                <option value=<?php echo $reported_by;?>>
                                 <?php echo $reported_by;?>
                                </option> 


                                <?php 
        require_once("connection_to_root.php");
        $query = " SELECT * From employees";
                    $result = mysqli_query($con,$query);
                            while($row=mysqli_fetch_assoc($result))
                            {
                                ?>        
                                <option value=<?php echo $row['emp_id']?> >
                                <?php echo $row['emp_id'].'-'.$row['name'].'-'.$row['username'] ;?>
                                </option>       
                                <?php 
                            }
                               ?>
                               </select>
                               &nbsp;&nbsp;
                               <label >Date :</label>
                              <input type="date"  name="date" value="<?php echo $date;?>"> <br><br>
                
            </div>
              
 <!--end of 6th row -->

            <div class="form-group">
            <hr width="50%" style="height:2px;border-width:0;color:gray;background-color:gray">

            <label style="vertical-align:top;"> Assigned_to:  </label>
                                <select  name="assigned_to" style="width:80px;height:25px;vertical-align:top;" > 
                                
                            
                                <option value=<?php echo $assigned_to;?>> <?php echo $assigned_to;?></option> 


                                <?php  
        require_once("connection_to_root.php");
        $query = " SELECT * From employees";
                    $result = mysqli_query($con,$query);
                            while($row=mysqli_fetch_assoc($result))
                            {
                                ?>
                                
                                <option value=<?php echo $row['emp_id']?> >
                                <?php echo $row['emp_id'].'-'.$row['name'].'-'.$row['username'] ;?>
                                </option> 
                                <?php 
                            }
                               ?>
                               </select>
                               &nbsp;&nbsp;&nbsp;&nbsp;
            <label style="vertical-align:top;">Comments : </label>
           <textarea name="comments" rows="3" cols="40"><?php echo $comments;?></textarea>
             </div> <br>

           <!--end of 7th row -->


             <div class="form-group">
                              <label > Status : </label>
                              <select name="status">
                              <option value="<?php echo $status;?>"><?php echo $status;?></option>
                              <option value="open">open</option>
                              <option value="closed">closed</option>
                              <option value="resolved">resolved</option>
                              </select>

                              &nbsp;&nbsp;&nbsp;&nbsp;


                              <label > Priority : </label>
                              <select name="priority">
                              <option value="<?php echo $priority;?>"><?php echo $priority;?></option>
                              <option value="Fix immediately">Fix immediately</option>
                              <option value="Fix as soon as possible">Fix as soon as possible</option>
                              <option value="Fix before next milestone">Fix before next milestone</option>
                              <option value="Fix before release">Fix before release</option>
                              <option value="Fix if possible">Fix if possible</option>
                              <option value="Optional">Optional</option>
                              </select>
                              &nbsp;&nbsp;&nbsp;&nbsp;

                              <label > Resolution : </label>
                              <select name="resolution">
                              <!-- <option value=""></option> -->
                              <option value=<?php echo $resolution;?>><?php echo $resolution;?></option>

                              <option value="Pending">Pending</option>
                              <option value="Fixed">Fixed</option>
                              <option value="Irreproducible">Irreproducible</option>
                              <option value="Deffered">Deffered</option>
                              <option value="As designed">As designed</option>
                              <option value="Withdrawen by repoerter">Withdrawen by repoerter</option>
                              <option value="Need more info">Need more info</option>
                              <option value="Disagree with suggestion">Disagree with suggestion</option>
                              <option value="Duplicate">Duplicate</option>

                              </select>
            </div><br>

<!--end of 8th row -->

            <div class="form-group">
                            <!-- <label > Resolution Version : </label>
                              <select name="resolution_version" style="width:70px;height:25px;">
                              <option value=<?php echo $resolution_version;?>><?php echo $resolution_version;?></option>
                              <option value="Pending">Pending</option>
                              <option value="Fixed">Fixed</option>
                              <option value="Irreproducible">Irreproducible</option>
                              <option value="Deffered">Deffered</option>
                              <option value="As designed">As designed</option>
                              <option value="Withdrawen by repoerter">Withdrawen by repoerter</option>
                              <option value="Need more info">Need more info</option>
                              <option value="Disagree with suggestion">Disagree with suggestion</option>
                              <option value="Duplicate">Duplicate</option>
                              </select>
                              &nbsp;&nbsp; -->

                              <label > Resolution Version : </label>
                              <input type="text"   name="resolution_version" value="<?php echo $resolution_version;?>">

                              
                              <label >  resolved_by:    </label > 
                              <select  name="resolved_by" style="width:80px;height:25px;vertical-align:top;" > 
                              
                                <option value=<?php echo $resolved_by;?>>
                                 <?php echo $resolved_by;?>
                                </option> 


                                <?php 
        require_once("connection_to_root.php");
        $query = " SELECT * From employees ";
                    $result = mysqli_query($con,$query);
                            while($row=mysqli_fetch_assoc($result))
                            {
                                ?>
                                
                                <option value=<?php echo $row['emp_id']?> >
                                <?php echo $row['emp_id'].'-'.$row['name'].'-'.$row['username'] ;?>
                                </option> 
                                <?php 
                            }
                               ?>
                               </select>
                            
                               &nbsp;&nbsp;

                               <label >Resolved Date:</label>
                              <input type="date"  name="resolved_date" value="<?php echo $resolved_date;?>"> <br><br>
                                  
                              
           
            </div><br>



<!--end of 9th row -->

            <div class="form-group">
            <label >  Tested by:    </label > 
                              <select  name="tested_by" style="width:80px;height:25px;vertical-align:top;" >
                            
                                <option value=<?php echo $tested_by;?>>
                                 <?php echo $tested_by;?>
                                </option> 


                                <?php  
        require_once("connection_to_root.php");
        $query = "SELECT * From employees";
                    $result = mysqli_query($con,$query);
                            while($row=mysqli_fetch_assoc($result))
                            {
                                ?>
                                
                                <option value=<?php echo $row['emp_id']?> >
                                <?php echo $row['emp_id'].'-'.$row['name'].'-'.$row['username'] ;?>
                                </option> 
                                <?php 
                            }
                               ?>
                               </select>
                            
                               &nbsp;&nbsp;

                               <label >Test Date:  </label>
                              <input type="date"  name="test_date" value="<?php echo $test_date;?>">
                              &nbsp;&nbsp;

                              <label > Deferred:   </label>
              
                              <select name="deferred"  style="width:50px;height:25px;vertical-align:top;">
                              <option value=<?php  echo $deferred;?>><?php  echo $deferred;?></option>
                              <option value="YES">YES</option>
                              <option value="NO">NO</option>
                              </select>
            
                </div><br>

                <!-- <hr width="50%" style="height:2px;border-width:0;color:gray;background-color:gray">
                <div class="form-group">
            <label > Attachments: </label >  <input type="File"  name="attachment">
               
               </div>&nbsp;&nbsp;&nbsp;&nbsp; -->

            <!--attachments:    <input type="file" name="attachments" ><br><br>
           -->
            <input type="submit" name="update" value="update" >
            <!-- <input type="submit" name="delete" value="delete" > -->
            </form>

<!-- ---------------------------------------------javascript validations--------------------------------------------------- -->

            <script language=Javascript>

function validate() {

if(bugForm.prog_id.value == ""){

alert ("program id need to filled");

return false;

}
if(bugForm.report_type.value == ""){

alert ("report_type is blank");

return false;

}
if(bugForm.date.value == ""){

alert ("date is blank");

return false;

}

if(bugForm.reported_by.value == ""){

alert ("reported_by is blank");

return false;

}
if(bugForm.severity.value == ""){

alert ("severity is blank");

return false;

}
if(bugForm.reproducible.value == ""){

alert ("reproducible is blank");

return false;

}
if(bugForm.problem_summary.value == ""){

alert ("summary is blank");

return false;

}
if(bugForm.problem_summary.value == " "){

alert ("only space in summary is not allowed");

return false;

}

if(bugForm.problem.value == " "){

alert ("only space in problem is not allowed");

return false;

}
if(bugForm.suggested_fix.value == " "){

alert ("only space in suggested fix is not allowed");

return false;

}
if(bugForm.comments.value == " "){

alert ("only space in comments is not allowed");

return false;

}

return true;

}
</script>


<!-- ------------------------------------------------------------------------------------------------ -->
            <form action="update_or_deleteBug.php" method="post" enctype="multipart/form-data">

            <!-- <hr width="50%" style="height:2px;border-width:0;color:gray;background-color:gray"> -->
                <div class="form-group">
            <input type="text"  name="bug_id" value="<?php echo $bug_id;?>"  style="display:none;" readonly><br><br>
             
              <input style="background-color:red" type="submit" name="search" value="cancel" >
               </div>&nbsp;&nbsp;&nbsp;&nbsp;

            </form>
<!-- ----------------------------------------view attachments-------------------------------------------------------- -->
<hr width="50%" style="height:2px;border-width:0;color:gray;background-color:gray">

<label >  Select Attachment To View:    </label > 
                              <select  name="attachment_dropdown"  style="width:200px;height:25px;vertical-align:top;" onchange="if(this.value!=''){var win = window.open(this.value, '_blank');win.focus();}">
                              <option>Select Attachment</option>
                                <?php  
        require_once("connection_to_root.php");
        $query = "SELECT * From attachments WHERE bug_id = $bug_id ";
      
                    $result = mysqli_query($con,$query);
                            while($row_attachments=mysqli_fetch_assoc($result))
                            {
                                ?>
                                
                                <option value="uploads/<?php echo $row_attachments['attachment'];?>" >
                                <?php echo $row_attachments['attachment'] ;?>
                                </option> 
                                <?php 
                            }
                               ?>
                               </select><br><br><br>
<!-- ----------------------------------------insert attachment-------------------------------------------------------- -->

        <form action="update_or_deleteBug.php" method="post" enctype="multipart/form-data">

                <div class="form-group">
            <label style="width:50px">Bug ID: </label >
            <input type="text"  name="bug_id1" value="<?php echo $bug_id;?>" readonly><br><br>
            <!-- <label >Update Attachments: </label > -->
              <input type="File"  name="attachment">
              <br>
              <input type="submit" name="insert_attachment" value="insert_attachment" >
               </div>&nbsp;&nbsp;&nbsp;&nbsp;

        </form>


            <form>

            <input type="button" name="search" value="Go To Search Page"  onclick="window.location.href = 'searchPage_BugForm.php';"  />
			      
            </form>
            <br><br><br><br><br><br><br>
          
        </center>

    </body>

    </html>