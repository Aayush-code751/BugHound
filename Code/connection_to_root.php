<?php
// $servername="localhost";
// $root="root";
// $dbname="bughound";

// $conn=mysqli_connect($servername,$root);

// $connectDB= mysqli_select_db($conn, $dbname);

// if($connectDB)
// {
//     echo "connected";
// }
// else
// {
//     die("connection failed. ".mysqli_connect_error());
// }

$con=mysqli_connect("localhost","root","","bughound");
if(!$con)
{
    die(" Connection Error ");
}

?>