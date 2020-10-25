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
            if(isset($_POST['Search_All']))
            {
                require_once("connection_to_root.php");
                $query = " SELECT * FROM bugtable 
                Left JOIN programs
                ON bugtable.prog_id = programs.prog_id Where status <> 'closed'";

                 $result = mysqli_query($con,$query);
                 if(!$result)
                 {
                //   echo $query;
                    echo "<SCRIPT type='text/javascript'>
                alert('Please check your query');
                 window.location.replace('searchPage_BugForm.php');
                </SCRIPT>";	
                 }
                //   echo $query;
     
    //             echo "<SCRIPT type='text/javascript'>
    //   alert('value inserted');
    //    window.location.replace('bugForm.php');
    //    </SCRIPT>";

            }
            else
            {
        echo "<SCRIPT type='text/javascript'>
      alert('Please click search all to se all bugs');
       window.location.replace('searchPage_BugForm.php');
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
    *
{
 padding:0;
 margin:0;
}
body
{
    background: #daf7f6;
  background: -webkit-linear-gradient(to bottom,#daf7f6 );
  background: linear-gradient(to bottom, #daf7f6);
 font-family:Georgia, "Times New Roman", Times, serif;
 text-align:center;
}
#header
{
 background:#00a2d1;
 width:100%;
 height:50px;
 color:#fff;
 font-size:30px;
 font-family:Verdana, Geneva, sans-serif;
}
#body
{
 margin-top:100px;
}
#body table
{
 margin:0 auto;
 position:relative;
 bottom:50px;
}
table td,th
{
 padding:20px;
 border: solid #9fa8b0 1px;
 border-collapse:collapse;
}
#footer
{
 text-align:center;
 position:absolute;
 left:0;
 right:0;
 margin:0 auto;
 bottom:50px;
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
    <title>Employee Form</title>
</head>
<body id="body">
<table width="60%" border="1">
<tr>
    <th colspan="5">All Bugs<label></th>
    </tr>
   <tr>
   
      <th>Bug ID</th>
      <th>Program</th>
      <th>Program name</th>
      <th>status(Will not show closed ones)</th>
     
      <th>Summary</th>

   </tr>

   <?php while($row=mysqli_fetch_assoc($result)) 
   {
       ?>
   <tr>
      <td><form action="update_or_deleteBug.php" method="post">
        

        <input type="submit" name="bug_id_thrown" value="<?php echo $row['bug_id']; ?>">
      </form></td>
      <td><?php echo $row['prog_id'] ?></td>
      <td><?php echo $row['program'] ?></td>
      <td><?php echo $row['status'] ?></td>
    
      <td><?php echo $row['problem_summary'] ?></td>
      
   </tr>


   <?php 
       }
   ?>


</table>
<input type="button" name="search" value="Go To Bug Search Section"  onclick="window.location.href = 'searchPage_BugForm.php';"  />


</body>
</html>