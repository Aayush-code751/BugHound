
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
    <link rel="stylesheet" a href="CSS/bootstrap.css"/>
    <title>Employee Form</title>
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
    background-color:#a378ff;
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
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-title">
                            <h2 class="bg-success text-white text-center py-3"> Programs Form</h2>
                        </div>
                        <div class="card-body">
 
                            <form action="insertPrograms.php" name="programForm" method="post" onsubmit="return validate()">
                            
                               <!-- <input type="text" class="form-control mb-2" placeholder=" Employee id " name="id">    -->
                                <input type="text" class="form-control mb-2" placeholder=" Program Name " name="program">
                                <input type="text" class="form-control mb-2" placeholder=" Program Release " name="program_release">
                                <input type="text" class="form-control mb-2" placeholder=" Program Version " name="program_version">
                                <!-- <input type="text" class="form-control mb-2" placeholder=" User_level " name="userlevel"> -->
                                
                                <button class="new1" name="submit">Submit</button>
                            </form>
 
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form action="viewProgramsEditableTable.php" method="post">
  <input type="submit" name="submit" value="VIEW">
</form>



<form action="HomePage.php" method="post">
  <input type="submit" name="submit" value="GOTO HOMEPAGE">
</form>
<script language=Javascript>

function validate() {

if(programForm.name.value === ""){

alert ("program field must contain characters");

return false;

}

if(programForm.program_release.value === ""){

alert ("program_release must contain characters");

return false;

}
if(programForm.program_version.value === ""){

alert ("program_version must contain characters");

return false;

}

return true;

}
</script>
</center>
</body>
</html>