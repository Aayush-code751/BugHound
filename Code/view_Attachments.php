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
<html>
<head>
<title> Attachments</title>
<!-- <link rel="stylesheet" href="style.css" type="text/css" /> -->
<style>
*
{
 padding:0;
 margin:0;
}
body
{
 background:#fff;
 font-family:Georgia, "Times New Roman", Times, serif;
 text-align:center;
}
#header
{
 background:#00a2d1;
 width:100%;
 height:50px;
 color:#fff;
 font-size:36px;
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
</style>
</head>
<body>
<div id="header">
<label>View Attachments</label>
</div>
<div id="body">
 <table width="80%" border="1">
    <tr>
    <th colspan="4">your uploads...<label></th>
    </tr>
    <tr>
    <td>File Name</td>
    <td>File Type</td>
    <td>File Size(B)</td>
    <td>View</td>
    </tr>
    <?php

 require_once("connection_to_root.php");
 $query = " Select * From bugtable ";
 $result = mysqli_query($con,$query);
 while($row=mysqli_fetch_assoc($result))
 {
  ?>
        <tr>
        <td><?php echo $row['attachment'] ?></td>
        <td><?php echo $row['attachment_type'] ?></td>
        <td><?php echo $row['attachment_size'] ?></td>
        <td><a href="uploads/<?php echo $row['attachment'] ?>" target="_blank">view file</a></td>
        </tr>
        <?php
 }
 ?>
    </table>
    
</div>
</body>
</html>