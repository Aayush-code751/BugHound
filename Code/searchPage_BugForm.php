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
			?>



            
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
    body {
  background: #daf7f6;
  background: -webkit-linear-gradient(to bottom,#daf7f6 );
  background: linear-gradient(to bottom, #daf7f6);
  
}
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
}
    </style>   
     <title>search bug Form</title>
</head>
<body >
 <center>
<div class="card-body" style=" margin-top: 200px;">
 
    <form action="SearchedBug_New.php" name="searchPage_bugForm" method="post" enctype="multipart/form-data"  onsubmit="return validate()" >
                            
                               <!-- <input type="text" class="form-control mb-2" placeholder=" Employee id " name="id">    -->
                               <!--prog id -->
            <label > Program : </label>
            <select  name="prog_id" > 
            <option value=<?php echo NULL ?>></option>

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
            </select> &nbsp;&nbsp;

                              <label > Report Type : </label>
                              <select name="report_type">
                              <option value=""></option>
                              <option value="Coding Error">Coding Error</option>
                              <option value="Design issue">Design issue</option>
                              <option value="Suggestion">Suggestion</option>
                              <option value="Documentation">Documentation</option>
                              <option value="Hardware">Hardware</option>
                              <option value="Query">Query</option>
                              
                              </select><br><br>

                              <label > Severity : </label>
                              <select name="severity">
                              <option value=""></option>
                              <option value="Minor">Minor</option>
                              <option value="Serious">Serious</option>
                              <option value="Fatal">Fatal</option>
                             
                              </select> &nbsp;&nbsp;


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
                              </select>&nbsp;&nbsp;

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
                               </select> &nbsp;&nbsp;

                               <label > Status : </label>
                              <select name="status">
                              <option value="open">open</option>
                              <option value="closed">closed</option>
                              <option value="resolved">resolved</option>
                              <option value="">none</option>

                             
                              </select>
                              <br><br>


                              <label > Priority : </label>
                              <select name="priority">
                              <option value=""></option>
                              <option value="Fix immediately">Fix immediately</option>
                              <option value="Fix as soon as possible">Fix as soon as possible</option>
                              <option value="Fix before next milestone">Fix before next milestone</option>
                              <option value="Fix before release">Fix before release</option>
                              <option value="Fix if possible">Fix if possible</option>
                              <option value="Optional">Optional</option>

                              </select>&nbsp;&nbsp;

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

                               </select>&nbsp;&nbsp;



                               <label > Reported by : </label>
                                <select  name="reported_by" > 
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
                               </select>
                               <br><br>


                               <label >Report Date:</label>
                              <input type="date"  name="date"> &nbsp;&nbsp;

                             

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
                               </select>&nbsp;&nbsp;

                            

                               <br><br><br> <input type="submit" name="search" value="search">




                            </form>

                            <form action="View_All_Bugs.php" method="post">
                            <input type="submit" name="Search_All" value="Search_All">
                            </form>

                            
 
                        </div>
                    

        <!-- <form action="viewEmpEditableTable.php" method="post">
        

  <input type="submit" name="submit" value="VIEW">
</form> -->

<!-- <form action="HomePage.php" method="post">
  <input type="submit" name="submit" value="GOTO HOMEPAGE">

</form> -->
<input style="background-color: #f44336;" type="button" name="cancel" value="cancel / Reset"  onclick="window.location.href = 'searchPage_BugForm.php';"  /><br><br>

<input type="button" name="bugsection" value="Go To Bug Section"  onclick="window.location.href = 'bugSection.php';"  />

<script language=Javascript>

function validate() {

if(searchPage_bugForm.prog_id.value == "" && searchPage_bugForm.report_type.value== ""  && searchPage_bugForm.severity.value== "" && searchPage_bugForm.area_id.value== "" && searchPage_bugForm.assigned_to.value== "" && searchPage_bugForm.status.value== "" && searchPage_bugForm.priority.value== "" && searchPage_bugForm.resolution.value== "" && searchPage_bugForm.reported_by.value== "" && searchPage_bugForm.resolved_by.value== "" && searchPage_bugForm.date.value== "")
{

alert ("need to select atleast one field");

return false;

}

return true;

}
</script>
</center>
</body>
</html>