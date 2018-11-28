<?php session_start();
date_default_timezone_set('Asia/Kolkata');
if($_SESSION['username']=="")
{
	header("location:index.php");exit;
}
include("conn.php");

$contents="Lead Created Date,Sr No.,Project Name,Services Offered For,Name,Email Id,Country Code,Mobile Number,Country,City,Landline Code,Landline Number,Source of Information,Comments\n";

//Mysql query to get records from datanbase
$query = mysqli_query($conn,"SELECT * from easylease_old");

//While loop to fetch the records
$i = $rows = 0;
while($row = mysqli_fetch_array($query))
{ 
	$i++;
	$contents.=$row['submitDT'].",";
	$contents.=$i.",";// Sr. no
	$contents.=$row['project_name'].",";
	$contents.=$row['services_offered'].","; 
	$contents.=$row['name'].",";
	$contents.=$row['email'].",";
	$contents.=$row['country_code'].",";
	$contents.=$row['mobile'].",";
	$contents.=$row['country'].",";
	$contents.=$row['city'].",";
	$contents.=$row['landline_code'].",";
	$contents.=$row['landline_number'].",";
	$contents.=$row['source_of_info'].",";	
	$contents.=$row['comments']."\n";	
}

// remove html and php tags etc.
$contents = strip_tags($contents); 
header("Content-type: application/csv");
//header to make force download the file
Header("Content-Disposition: attachment; filename=EasyLease_".date('d-M-Y').".csv");
print $contents;
?>
       