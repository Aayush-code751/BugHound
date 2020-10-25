<?php  
// $conn = new mysqli('localhost', 'root', '');  
// mysqli_select_db($conn, 'crud');  

include 'validate_user.php';		
  isLoggedIn();
  $valid_level =  isValidLevel(3);
  if(!$valid_level) {
    echo "<SCRIPT type='text/javascript'>
    alert('User is Not allowed');
    window.location.replace('HomePage.php');
    </SCRIPT>";			
  }

  error_reporting(0);
  if($_POST['bugsToCSV'] == 'Export bugs to CSV')
{
require_once("connection_to_root.php");

$sql = "SELECT * FROM bugtable";  
$setRec = mysqli_query($con, $sql);  
$columnHeader = '';  
$columnHeader = "bug Id" . "\t" . " prog id" . "\t" . "area id" . "\t"."report type". "\t"."severity". "\t"."problem summary". "\t"."problem". "\t"."reproducible". "\t"."reported by". "\t"."date". "\t"."suggested fix". "\t"."assigned to". "\t"."comments". "\t"."status". "\t"."priority". "\t"."resolution". "\t"."resolution version". "\t"."resolved by". "\t"."resolved date". "\t"."tested by". "\t"."test date". "\t"."deferred". "\t"."attachment". "\t"."attachment_type". "\t"."attachment_size";  
$setData = '';  
  while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  

    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    
    $setData .= ""."\t".""."\t".trim($rowData) . "\n";  

}  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=bug_Detail.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  

  exit();
}else 
if($_POST['employeesToCSV'] == 'Export employees to CSV')
{
require_once("connection_to_root.php");

$sql = "SELECT * FROM employees";  
$setRec = mysqli_query($con, $sql);  
$columnHeader = '';  
$columnHeader = "emp Id" . "\t" . " Name" . "\t" . "user Name" . "\t"."password". "\t"."userlevel";  
$setData = '';  
  while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  

    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    
    $setData .= ""."\t".""."\t".trim($rowData) . "\n";  

}  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=employee_Detail.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  

  exit();
}
else
if( $_POST['programsToCSV'] == 'Export programs to CSV')
{
require_once("connection_to_root.php");

$sql = "SELECT * FROM programs";  
$setRec = mysqli_query($con, $sql);  
$columnHeader = '';  
$columnHeader = "program Id" . "\t" . " program" . "\t" . "program_release" . "\t"."program_version";  
$setData = '';  
  while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= ""."\t".""."\t".trim($rowData) . "\n";  
}  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=programs_Detail.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
  exit();
}
else
if($_POST['areasToCSV'] == 'Export areas to CSV')
{
require_once("connection_to_root.php");

$sql = "SELECT * FROM areas";  
$setRec = mysqli_query($con, $sql);  
$columnHeader = '';  
$columnHeader = "area Id" . "\t" . " program id" . "\t" . "areas";  
$setData = ""."\t".""."\t";  
  while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= ""."\t".""."\t".trim($rowData) . "\n";  
}  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=areas_Detail.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
  exit();
}
else
if($_POST['bugsToXML'] == 'Export bugs to XML')
{
  require_once("connection_to_root.php");
  error_reporting(0);

$query = mysqli_query($con, "SELECT * FROM bugtable");


$myFile = "bug.xml";
$fh = fopen($myFile, 'w') or die("can't open file"); 
$rss_txt .= '<?xml version="1.0" encoding="utf-8"?>';
$rss_txt .= "<rss version='2.0'>".PHP_EOL;
$rss_txt .= '<bugtable>'.PHP_EOL;
while($values_query = mysqli_fetch_assoc($query)) {
$rss_txt .= '<bug>';
$rss_txt .= '<bug_id>' .$values_query['bug_id']. '</bug_id>';
$rss_txt .= '<prog_id>' .$values_query['prog_id']. '</prog_id>';
$rss_txt .= '<area_id>' .$values_query['area_id']. '</area_id>';
$rss_txt .= '<report_type>' .$values_query['report_type']. '</report_type>';
$rss_txt .= '<severity>' .$values_query['severity']. '</severity>';
$rss_txt .= '<problem_summary>' .$values_query['problem_summary']. '</problem_summary>';
$rss_txt .= '<problem>' .$values_query['problem']. '</problem>';
$rss_txt .= '<reproducible>' .$values_query['reproducible']. '</reproducible>';
$rss_txt .= '<reported_by>' .$values_query['reported_by']. '</reported_by>';
$rss_txt .= '<date>' .$values_query['date']. '</date>';
$rss_txt .= '<suggested_fix>' .$values_query['suggested_fix']. '</suggested_fix>';
$rss_txt .= '<assigned_to>' .$values_query['assigned_to']. '</assigned_to>';
$rss_txt .= '<comments>' .$values_query['comments']. '</comments>';
$rss_txt .= '<status>' .$values_query['status']. '</status>';
$rss_txt .= '<priority>' .$values_query['priority']. '</priority>';
$rss_txt .= '<resolution>' .$values_query['resolution']. '</resolution>';
$rss_txt .= '<resolution_version>' .$values_query['resolution_version']. '</resolution_version>';
$rss_txt .= '<resolved_by>' .$values_query['resolved_by']. '</resolved_by>';
$rss_txt .= '<resolved_date>' .$values_query['resolved_date']. '</resolved_date>';
$rss_txt .= '<tested_by>' .$values_query['tested_by']. '</tested_by>';
$rss_txt .= '<test_date>' .$values_query['test_date']. '</test_date>';
$rss_txt .= '<deferred>' .$values_query['deferred']. '</deferred>';
$rss_txt .= '<attachment>' .$values_query['attachment']. '</attachment>';
$rss_txt .= '<attachment_size>' .$values_query['attachment_size']. '</attachment_size>';
$rss_txt .= '<attachment_type>' .$values_query['attachment_type']. '</attachment_type>';


$rss_txt .= '</bug>'.PHP_EOL;
}
$rss_txt .= '</bugtable>'.PHP_EOL;
$rss_txt .= '</rss>';
fwrite($fh, $rss_txt);
fclose($fh); 

echo "<SCRIPT type='text/javascript'>
  alert('xml created ');
  window.location.replace('exportForm.php');
  </SCRIPT>";

  exit();

}
else
if($_POST['employeesToXML'] == 'Export employees to XML')
{
  require_once("connection_to_root.php");
  error_reporting(0);

$query = mysqli_query($con, "SELECT * FROM employees");


$myFile = "EMPLOYEES.xml";
$fh = fopen($myFile, 'w') or die("can't open file"); 
$rss_txt .= '<?xml version="1.0" encoding="utf-8"?>';
$rss_txt .= "<rss version='2.0'>".PHP_EOL;
$rss_txt .= '<employees>'.PHP_EOL;
while($values_query = mysqli_fetch_assoc($query)) {
$rss_txt .= '<employee>';
$rss_txt .= '<ID>' .$values_query['emp_id']. '</ID>';
$rss_txt .= '<username>' .$values_query['username']. '</username>';
$rss_txt .= '<password>' .$values_query['password']. '</password>';
$rss_txt .= '<name>' .$values_query['name']. '</name>';
$rss_txt .= '<userlevel>' .$values_query['userlevel']. '</userlevel>';

$rss_txt .= '</employee>'.PHP_EOL;
}
$rss_txt .= '</employees>'.PHP_EOL;
$rss_txt .= '</rss>';
fwrite($fh, $rss_txt);
fclose($fh); 

echo "<SCRIPT type='text/javascript'>
  alert('xml created ');
  window.location.replace('exportForm.php');
  </SCRIPT>";

  exit();

}
else
if($_POST['programsToXML'] == 'Export programs to XML')
{
  require_once("connection_to_root.php");
  error_reporting(0);

$query = mysqli_query($con, "SELECT * FROM programs");


$myFile = "PROGRAMS.xml";
$fh = fopen($myFile, 'w') or die("can't open file"); 
$rss_txt .= '<?xml version="1.0" encoding="utf-8"?>';
$rss_txt .= "<rss version='2.0'>".PHP_EOL;
$rss_txt .= '<programs>'.PHP_EOL;
while($values_query = mysqli_fetch_assoc($query)) {
$rss_txt .= '<program>';
$rss_txt .= '<PROG_ID>' .$values_query['prog_id']. '</ID>';
$rss_txt .= '<program>' .$values_query['program']. '</program>';
$rss_txt .= '<program_version>' .$values_query['program_release']. '</program_release>';
$rss_txt .= '<program_version>' .$values_query['program_version']. '</program_version>';

$rss_txt .= '</program>'.PHP_EOL;
}
$rss_txt .= '</programs>'.PHP_EOL;
$rss_txt .= '</rss>';
fwrite($fh, $rss_txt);
fclose($fh); 

echo "<SCRIPT type='text/javascript'>
  alert('xml created ');
  window.location.replace('exportForm.php');
  </SCRIPT>";


  exit();
}else
if($_POST['areasToXML'] == 'Export areas to XML')
{
  require_once("connection_to_root.php");
  error_reporting(0);

$query = mysqli_query($con, "SELECT * FROM areas");


$myFile = "AREAS.xml";
$fh = fopen($myFile, 'w') or die("can't open file"); 
$rss_txt .= '<?xml version="1.0" encoding="utf-8"?>';
$rss_txt .= "<rss version='2.0'>".PHP_EOL;
$rss_txt .= '<AREAS>'.PHP_EOL;
while($values_query = mysqli_fetch_assoc($query)) {
$rss_txt .= '<AREA>';
$rss_txt .= '<area_id>' .$values_query['area_id']. '</area_id>';
$rss_txt .= '<prog_id>' .$values_query['prog_id']. '</prog_id>';
$rss_txt .= '<area>' .$values_query['area']. '</area>';

$rss_txt .= '</AREA>'.PHP_EOL;
}
$rss_txt .= '</AREAS>'.PHP_EOL;
$rss_txt .= '</rss>';
fwrite($fh, $rss_txt);
fclose($fh); 

echo "<SCRIPT type='text/javascript'>
  alert('xml created ');
  window.location.replace('exportForm.php');
  </SCRIPT>";

exit();

}
else
{
  echo "not into any isset ";
}


 ?> 