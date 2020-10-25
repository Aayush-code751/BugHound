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
    <title>View Areas </title>
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
     width:200px;
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
        
        <div style=" margin-left: 242px;">        
        <!--
        <input type="text"  placeholder="area_id" name="" readonly>
       	
        <input type="text"  placeholder="program name" name="" readonly>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text"  placeholder="prog_id" name="" readonly>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text"  placeholder="area" name="" readonly >
       -->
        <table style="width:10%">
        <tr>
        <th style="padding-left: 200px;">Area_id</th>
        <th style="padding-left: 100px;">Program Name</th>
        <th style="padding-left: 150px;">prog_id</th>
        <th style="padding-left: 120px;">Area</th>
        
        </tr>
        </table>
        </div>
                       
                            <?php 
                            
                                        require_once("connection_to_root.php");
                                        // $query = " select * from areas ";
                                        $id=$_POST['prog_id'];

                                        $query = "SELECT areas.area_id,areas.prog_id,areas.area,programs.program
                                        From areas 
                                        Left JOIN programs
                                        ON areas.prog_id = programs.prog_id WHERE areas.prog_id= $id";
                            $result = mysqli_query($con,$query);

                                    while($row=mysqli_fetch_assoc($result))
                                    {
                            ?>
                                       
                                      

                                       <center>  

                            <form   name="areaForm" method="POST"  action="update_or_deleteAreas.php">
                               <table>
                                       <tr id="<?php $row['area_id']; ?>">
                                           <td>
                                           <input  type="text"   name="area_id" value="<?php echo $row['area_id']; ?>" readonly>
                                           <input  type="text"   name="program" value="<?php echo $row['program']; ?>" readonly>
                                           <input  type="text"   name="program" value="<?php echo $row['prog_id']; ?>" readonly>

                                           <input type="text"    name="area" value="<?php echo $row['area']; ?>" >
                                           
                                           
                                           <!-- <input  type="submit" name="update" value="update" style="margin-left:50px">
                                           <input onclick="myConfirm()"   type="submit" name="delete" value="delete"> -->
                                          </td>
                                      </tr>
                                      <!-- <button onclick="myFunction()">Click me</button> -->
                               </table>
                            </form>


                            
                            
 <script language=Javascript>
//                             function myFunction()
//                             {
//                                 // var x = document.getElementsByClassName("remove_readonly");
//                                 // document.getElementByClass('myInput').removeAttribute('readonly');
// console.log("52");
//                                 var list = document.getElementsByClassName("remove_readonly");
//                                  for (var i = 0; i < list.length; i++) {
//                                     console.log("55");
//                                  list[i].readOnly=false;
//                                  console.log("57");
//                             }

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
                            <form action="areasForm.php" method="post">
                            <input type="submit" name="submit" value="GoTo areas" style=" background-color:#0568f2;">
                            </form>
                            </div>
                            </center>    
</body>
</html>