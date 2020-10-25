<?php
			include 'validate_user.php';		
            isLoggedIn();
            $valid_level =  isValidLevel(1);
            if(!$valid_level) {
              echo "<SCRIPT type='text/javascript'>
              alert('User is Not allowed');
              window.location.replace('HomePage.php');
              </SCRIPT>";			
            }
			?>



            
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Bug Form</title>
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
    background-color:#0568f2;
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
input[type=text]
    {
     font-size:.8em;
     height:30px;
     width:200px;
    }
input[type=password]
    {
     font-size:.8em;
     height:30px;
     width:200px;
    }
.new1
{
    background-color:#0568f2;
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
<body  >

                           

                  <br>     
<div class="card-body" >
 <center>
 <h2> Bug Form</h2>
    <form action="insertBugTable.php" name="bugForm" method="post" enctype="multipart/form-data"  onsubmit="return validate()" style=" margin-top: 50px;" >
                            
                               <!-- <input type="text" class="form-control mb-2" placeholder=" Employee id " name="id">    -->
                               <!--prog id -->
          <div class="form-group">
            <label > Program : </label>
            <select  name="prog_id" style="width:150px;height:25px;"  > 
            <option value=""></option>
            <?php 
                require_once("connection_to_root.php");
                $query = " Select * From programs ";
                $result = mysqli_query($con,$query);
                while($row=mysqli_fetch_assoc($result))
            {
             ?>
                                
                           

                 <option value=<?php echo $row['prog_id'];?> >
                     <?php echo $row['prog_id'].' - '.$row['program'].' - '.$row['program_release'].' - '.$row['program_version'];?>
                 </option>
                                
                     <?php 

            }
                            
                    ?>
            </select>&nbsp;&nbsp;&nbsp;

                            <!-- <label > Report Type : </label>
                              <select name="report_type">
                              <option value=""></option>
                              <option value="Coding Error">Coding Error</option>
                              <option value="Design issue">Design issue</option>
                              <option value="Suggestion">Suggestion</option>
                              <option value="Documentation">Documentation</option>
                              <option value="Hardware">Hardware</option>
                              <option value="Query">Query</option>
                              
                              </select>&nbsp;&nbsp;&nbsp; -->

                              <label > Report Type : </label>
                              <select name="report_type">
                              <option value=""></option>
                              <option value="Coding Error">Coding Error</option>
                              <option value="Design issue">Design issue</option>
                              <option value="Suggestion">Suggestion</option>
                              <option value="Documentation">Documentation</option>
                              <option value="Hardware">Hardware</option>
                              <option value="Query">Query</option>
                              
                              </select>&nbsp;&nbsp;&nbsp;

                              <label > Severity : </label>
                              <select name="severity">
                              <option value=""></option>
                              <option value="Minor">Minor</option>
                              <option value="Serious">Serious</option>
                              <option value="Fatal">Fatal</option>
                             
                              </select>&nbsp;&nbsp;&nbsp;
                              
                              
                              <label >Reproducible : </label>
                              <select name="reproducible">
                              <option value=""></option>
                              <option value="YES">YES</option>
                              <option value="NO">NO</option>
                              
                              </select><br><br><br>
                              </div>
                              <div class="form-group">
                              <p >
                               <label >Problem Summary : </label>
                               <textarea name="problem_summary" rows="1" cols="50"></textarea>
                              </p>&nbsp;&nbsp;&nbsp;
                              
                              
                              <p >
                               <label style="vertical-align:top;">Problem : </label>
                               <textarea name="problem" rows="5" cols="40"></textarea>
                              </p><br><br>

                               <label > Reported by : </label>
                                <select  name="reported_by" >
                                <option value=""></option> 
                                <?php 
                                require_once("connection_to_root.php");
                                $query = " Select * From employees ";
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
                               </select>&nbsp;&nbsp;&nbsp;
                               </div>

                               <label >Date:</label>
                              <input type="date"  name="date"> <br><br><br>

                              <hr width="50%" style="height:2px;border-width:0;color:gray;background-color:gray">

                              <div class="form-group">
                               <label > Area : </label>
                                <select  name="area_id" > 
                                <option value=<?php echo NULL ?>></option>
                                <?php 
                                require_once("connection_to_root.php");
                                $query = " Select area_id,area From areas ";
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
                              </select>&nbsp;&nbsp;&nbsp;

                              <!-- <label > Report Type : </label>
                              <select name="report_type">
                              <option value=""></option>
                              <option value="Coding Error">Coding Error</option>
                              <option value="Design issue">Design issue</option>
                              <option value="Suggestion">Suggestion</option>
                              <option value="Documentation">Documentation</option>
                              <option value="Hardware">Hardware</option>
                              <option value="Query">Query</option>
                              
                              </select><br><br> -->

                              <!-- <label > Severity : </label>
                              <select name="severity">
                              <option value=""></option>
                              <option value="Minor">Minor</option>
                              <option value="Serious">Serious</option>
                              <option value="Fatal">Fatal</option>
                             
                              </select> -->



                              <label > Assigned To : </label>
                                <select  name="assigned_to" > 
                                <option value=<?php echo NULL ?>></option>
                                <?php 
                                require_once("connection_to_root.php");
                                $query = " Select * From employees ";
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
                               </select>&nbsp;&nbsp;&nbsp;

                               <label > Resolved by  : </label>
                                <select  name="resolved_by" > 
                                <option value=<?php echo NULL ?>></option>
                                <?php 
                                require_once("connection_to_root.php");
                                $query = " Select * From employees ";
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
                               </select>&nbsp;&nbsp;&nbsp;
                               </div>
                               <label >Resolved Date:</label>
                              <input type="date"  name="resolved_date"><br><br><br>



                               <label > Tested by  : </label>
                                <select  name="tested_by" > 
                                <option value=<?php echo NULL ?>></option>
                                <?php 
                                require_once("connection_to_root.php");
                                $query = " Select * From employees ";
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
                               </select>&nbsp;&nbsp;&nbsp;

                               <label >Test Date:</label>
                              <input type="date"  name="test_date"> 
                               <br><br><br>

                               <!-- <p >
                               <label >Problem Summary : </label>
                               <textarea name="problem_summary" rows="1" cols="70"></textarea>
                              </p> -->

                               <!-- <p >
                               <label style="vertical-align:top;">Problem : </label>
                               <textarea name="problem" rows="5" cols="40"></textarea>
                              </p> -->

                              <!-- <label >Reproducible : </label>
                              <select name="reproducible">
                              <option value=""></option>
                              <option value="YES">YES</option>
                              <option value="NO">NO</option>
                              
                              </select> -->

                              <!-- <label >Date:</label>
                              <input type="date"  name="date"> <br><br> -->

                              <p >
                               <label style="vertical-align:top;">Suggested Fix : </label>
                               <textarea name="suggested_fix" rows="5" cols="40"></textarea>
                              </p>&nbsp;&nbsp;&nbsp;

                              <p >
                               <label style="vertical-align:top;">Comments : </label>
                               <textarea name="comments" rows="5" cols="40"></textarea>
                              </p>&nbsp;&nbsp;&nbsp;
                              <div class="form-group">

                              <label > Status : </label>
                              <select name="status">
                              <!-- <option value=""></option> -->
                              <option value="open">open</option>
                              <option value="closed">closed</option>
                              <option value="resolved">resolved</option>
                             
                              </select>&nbsp;&nbsp;&nbsp;

                              <label > Priority : </label>
                              <select name="priority">
                              <option value=""></option>
                              <option value="Fix immediately">Fix immediately</option>
                              <option value="Fix as soon as possible">Fix as soon as possible</option>
                              <option value="Fix before next milestone">Fix before next milestone</option>
                              <option value="Fix before release">Fix before release</option>
                              <option value="Fix if possible">Fix if possible</option>
                              <option value="Optional">Optional</option>

                              </select>&nbsp;&nbsp;&nbsp;

                              <label > Resolution : </label>
                              <select  name="resolution">

                              <option value=""></option>
                              <option value="Pending">Pending</option>
                              <option value="Fixed">Fixed</option>
                              <option value="Irreproducible">Irreproducible</option>
                              <option value="Deffered">Deffered</option>
                              <option value="As designed">As designed</option>
                              <option value="Withdrawen by repoerter">Withdrawen by repoerter</option>
                              <option value="Need more info">Need more info</option>
                              <option value="Disagree with suggestion">Disagree with suggestion</option>
                              <option value="Duplicate">Duplicate</option>

                               </select>&nbsp;&nbsp;&nbsp;

                            </div>

                              <label > Resolution Version : </label>
                              <input type="text"   name="resolution_version">&nbsp;&nbsp;&nbsp;

                               <label > Deferred : </label>
                              <select name="resolution_version">
                              <option value=""></option>
                              <option value="YES">YES</option>
                              <option value="NO">NO</option>

                              </select><br><br>




                              <hr width="50%" style="height:2px;border-width:0;color:gray;background-color:gray">
                                 
                              <br>
                              <!-- <label >Attachments :</label> -->
                              <!-- <input type="File"  name="attachment"> -->


                           <br><br> <input type="submit" name="submit" value="submit">&nbsp;&nbsp;&nbsp;

                            </form>
 
                            <input style="background-color: #f44336;" type="button" name="cancel" value="cancel"  onclick="window.location.href = 'bugForm.php';"  /><br><br>

                        </div><br>
                    

        <!-- <form action="viewEmpEditableTable.php" method="post">
        

  <input type="submit" name="submit" value="VIEW">
</form> -->
<div style=" margin-left: 550px;margin-bottom:50px;"> 
<input  type="button" name="go_back" value="Go to bug section"  onclick="window.location.href = 'bugSection.php';"  />
</div>


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
</center>
</body>
</html>