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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" ahref="CSS/bootstrap.css"/>
    <title>home-Form</title>

<style>
input[type=submit] {
    background-color: #0568f2;; 
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
    background-color:#8bd6ae;
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
<body class="bg-dark" style=" margin-top: 200px;">
 
        
  <center>     
 

<div>
<form method="POST"   action="exportToCSVorXML_new.php" >
<input  type="submit" class="new1" name="employeesToCSV" value="Export employees to CSV" style="background-color:#f7b740;">
<input  type="submit" class="new1" name="programsToCSV" value="Export programs to CSV" style="background-color:#f7b740;">
<input  type="submit" class="new1" name="areasToCSV" value="Export areas to CSV" style="background-color:#f7b740;">
<input  type="submit" class="new1" name="bugsToCSV" value="Export bugs to CSV" style="background-color:#f7b740;">


</form>


<form method="POST"  action="exportToCSVorXML_new.php" >
<input  type="submit" class="button button2" name="employeesToXML" value="Export employees to XML">
<input  type="submit" class="button" name="programsToXML" value="Export programs to XML">
<input  type="submit" class="button button3" name="areasToXML" value="Export areas to XML">
<input  type="submit" class="button button2" name="bugsToXML" value="Export bugs to XML">

</form>


</div>

   
<form action="HomePage.php" method="post">
  <input type="submit" name="submit" value="Goto HomePage" style="background-color:#8bd6ae;">
</form>

<form action="logout.php" method="post">

<input type="submit" onclick="window.location.href = 'logout.php';" value="Log Out" style="background-color:#8bd6ae;"/>
</form>



</center>

</body>
</html>