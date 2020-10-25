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
    <!-- <link rel="stylesheet" a href="CSS/bootstrap.css"/> -->
    <title>View Programs </title>
    <style>
input[type=submit] {
    background-color: #8bd6ae;
border-radius:0.12em;
font-family:'Roboto',sans-serif;
 font-weight:200;
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
     height:20px;
     width:100px;
    }
input[type=password]
    {
     font-size:.8em;
     height:30px;
     width:200px;
    }

   
body {
  background: #daf7f6;
  background: -webkit-linear-gradient(to bottom,#daf7f6 );
  background: linear-gradient(to bottom, #daf7f6);
  
}

   </style>
</head>
<body class="bg-dark" style=" margin-top: 30px;">
 
        <div class="container">
           
           <div  style=" margin-left: 242px;">
        <!--           
        <input type="text"  placeholder="prog_id" name="" readonly>
        <input type="text"  placeholder="program" name="" readonly>
        <input type="text"  placeholder="program_release" name="" readonly>
        <input type="text"  placeholder="program_version" name="" readonly>-->
        <table style="width:10%">
        <tr>
        <th style="padding-left: 170px;">prog_id</th>
        <th style="padding-left: 40px;">Program </th>
        <th style="padding-left: 50px;">program<br>release</th>
        <th style="padding-left: 50px;">program<br>version</th>
        
        </tr>
        </table>
        </div>

                  <center>         
                            <?php 
                            
                                        require_once("connection_to_root.php");
                                        $query = " select * from programs ";
                            $result = mysqli_query($con,$query);
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                            ?>
                                       
                                  


                            <form   name="programForm" method="POST"  action="update_or_deletePrograms.php">
                               <table>
                                       <tr>
                                           <td>
                                           <input type="text"   name="prog_id" value="<?php echo $row['prog_id']; ?>" readonly>
                                           <input  type="text"   name="program" value="<?php echo $row['program']; ?>" >
                                           <input type="text"    name="program_release" value="<?php echo $row['program_release']; ?>" >
                                           <input   type="text"   name="program_version" value="<?php echo $row['program_version']; ?>" >
                                           
                                           
                                           <input  type="submit" name="update" value="update">
                                           <input onclick="myConfirm()"   type="submit" name="delete" value="delete">
                                          </td>
                                      </tr>
                               </table>
                            </form>
                            
 <script language=Javascript>

 function myConfirm() {
 var result = confirm("Want to delete?");
 if (result==true) {
        return true;
                } 
        else
         {
         return false;
    }
  }

          
    </script>


                            <?php
                                    }
                                 
                            ?>
              
        </div>
        <div style=" margin-left: 500px;">  
                            <form action="programsForm.php" method="post">
                            <input type="submit" name="submit" value="GoTo programs" style=" background-color:#0568f2;">
                            </form>
                            </div>
                            </center>
    
</body>
</html>