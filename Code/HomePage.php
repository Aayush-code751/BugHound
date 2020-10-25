
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" ahref="CSS/bootstrap.css"/>
    <title>home-Form</title>
</head>
<style>

input[type=submit] {
    background-color: #8bd6ae;
   
border-radius:0.12em;
font-family:'Roboto',sans-serif;
 font-weight:300;

    border: none;
    color: white;
    padding: 20px 36px;
    text-decoration: none;
    margin: 5px 4px;
transition: all 0.2s;
 box-sizing: border-box;
    cursor: pointer;  
}
input[type=button] {
    background-color:#0568f2;
    background: -webkit-linear-gradient(to bottom,#daf7f6, );
  background: linear-gradient(to bottom, #daf7f6,);
   
border-radius:0.12em;
font-family:'Roboto',sans-serif;
 font-weight:300;
    border: none;
    color: white;
    padding: 20px 36px;
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
<body class="bg-dark" onload="myFunc()">
 <center>
        
       
 
<form style=" margin-top: 200px;">

            <input type="button" class="button"  onclick="window.location.href = 'employeeForm.php';" value="Employee ", id="db1"  />
			      <input type="button" class="button button2" onclick="window.location.href = 'programsForm.php';" value="Program" id="db2"/>
            <input type="button" class="button button3" onclick="window.location.href = 'areasForm.php';" value="Area" id="db3"/>
            <input type="button"  class="button button4" onclick="window.location.href = 'bugSection.php';" value="Bug Section" id="db4"/>
            <input type="button"  class="button button5" onclick="window.location.href = 'exportForm.php';" value="Export Tables" id="db5"/>

            
 </form>

 <?php
  
  include 'validate_user.php';		
  isLoggedIn();
  
  $valid_level =  isValidLevel(3);
  if(!$valid_level) {
  echo"<SCRIPT type='text/javascript'>
    var x = document.getElementById('db1');
    var y = document.getElementById('db2');
     var z=document.getElementById('db3');
     var a=document.getElementById('db5');  
    x.style.display = 'none';
    y.style.display = 'none';
    z.style.display = 'none';
    a.style.display ='none' ;
    </SCRIPT>";			
  }
?>
 


<form action="logout.php" method="post">

<input type="submit" onclick="window.location.href = 'logout.php';" value="Log Out" />
</form>



</center>

</body>
</html>