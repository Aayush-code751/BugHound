
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" ahref="CSS/bootstrap.css"/>
    <title>home-Form</title>
</head>
<style>
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

input[type=submit] {
    background-color: #8bd6ae;
   
border-radius:0.12em;
font-family:'Roboto',sans-serif;
 font-weight:300;

    border: none;
    color: white;
    padding: 17px 36px;
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
    padding: 18px 36px;
    text-decoration: none;
    margin: 5px 4px;
transition: all 0.2s;
 box-sizing: border-box;
    cursor: pointer;  
}
.nav_size{
    font-size: 12px;
  }

</style>
<body class="bg-dark" onload="myFunc()">
 
  <center>      
       
 
<form style=" margin-top: 200px;">

            <input type="button" class="button"  onclick="window.location.href = 'bugForm.php';" value="Insert Bug", id="db1"  />
			      <input type="button" class="button button2" onclick="window.location.href = 'searchPage_BugForm.php';" value="Search Bug" id="db2"/>
            <!-- <input type="button" class="button button3" onclick="window.location.href = 'update_or_deleteBug.php';" value="Update Bug" id="db3"/> -->
            <!-- <input type="button"  class="button button4" onclick="window.location.href = 'bugSection.php';" value="Bug Section" id="db4"/>
            <input type="button"  class="button button5" onclick="window.location.href = 'exportForm.php';" value="Export Tables" id="db5"/> -->

            
 </form>

 <?php
  
  include 'validate_user.php';		
  isLoggedIn();
  
  $valid_level =  isValidLevel(2);
  if(!$valid_level) {
  echo"<SCRIPT type='text/javascript'>
  
    var y = document.getElementById('db2');
     var z=document.getElementById('db3');
   
    y.style.display = 'none';
    z.style.display = 'none';
  
    </SCRIPT>";			
  }
?>
 
  <form action="HomePage.php" method="post">
        

        <input type="submit" class="button button4 nav_size" name="submit" value="Go To HomePage">
      </form> 

<form action="logout.php" method="post">

<input type="submit" class="button button4 nav_size" onclick="window.location.href = 'logout.php';" value="Log Out" />
</form>





</center>

</body>
</html>