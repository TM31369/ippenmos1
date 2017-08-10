
<?php

$con = mysql_connect("localhost","root","az123");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("iPPE", $con);
	
$id=$_POST['id'];
$Employee=$_POST['Employee'];
$Gender=$_POST['Gender'];
$Staff_No=$_POST['Staff_No'];
$Rept_To=$_POST['Rept_To'];
$Positions=$_POST['Positions'];
$Organizational_unit=$_POST['Organizational_unit'];
$Cost_Center=$_POST['Cost_Center'];
$Executive_Non_Executive=$_POST[''];
$Unit=$_POST['Unit'];
$Functions=$_POST['Functions'];
$Zone=$_POST['Zone'];
$State_type=$_POST['State_type'];
$State=$_POST['State'];
$Safety_Helmet=$_POST['Safety_Helmet'];
$Safety_Vest =$_POST['Safety_Vest'];
$Full_Body_Harness =$_POST['Full_Body_Harness'];
$FBH_Trained =$_POST['FBH_Trained'];
$Safety_Shoe =$_POST['Safety_Shoe'];
$Ladder =$_POST['Ladder'];
$Year_Received_Safety_Helmet=$_POST['Year_Received_Safety_Helmet'];
$Year_Received_Safety_Vest=$_POST['Year_Received_Safety_Vest'];
$Year_Received_FBH=$_POST['Year_Received_FBH'];
$Year_Trained_FBH =$_POST['Year_Trained_FBH'];
$Year_Received_Safety_Shoe=$_POST['Year_Received_Safety_Shoe'];
$Year_Received_Ladder=$_POST['Year_Received_Ladder'];
$Status=$_POST['Status'];
$date_last_update=$_POST['date_last_update'];

	
$mysql_query="INSERT INTO ippe (id,	Employee,	Gender,	Staff_No,	Rept_To,	Positions,	Organizational_unit,	Cost_Center,	Executive_Non_Executive,	State,	Unit,	Functions,	State_type,	Zone, Status )
VALUES ('$id',	'$Employee',	'$Gender',	'$Staff_No',	'$Rept_To',	'$Positions',	'$Organizational_unit',	'$Cost_Center',	'$Executive_Non_Executive',	'$State',	'$Unit',	'$Function',	'$State_type',	'$Zone', 'PENDING' )";

if (!mysql_query($mysql_query,$con))
  {
 echo "<script>alert(\"Cannot success, please try again!!.\");</script>";
$url="iPPE_login.php";
echo"<script>window.location=\"$url\"</script>";
  }
else
{

  echo "<script>alert(\"Update success!!.\");</script>";
$url="iPPE_login.php";
echo"<script>window.location=\"$url\"</script>";
//include("kemaskiniteam.php");
exit;
}
/*
mysql_close($con)
$mysql_query="UPDATE ippe SET id='$id' ,

id='$id',
Staff_No='$Staff_No',	
Rept_To='$Rept_To',
Positions='$Positions',	
Organizational_unit='$Organizational_unit', 	
Cost_Center='$Cost_Center',
Executive_Non_Executive='$Executive_Non_Executive', 	
State='$State',
Unit='$Unit',
Function='4Function',	
Zone='$Zone',
Safety_Helmet='$Safety_Helmet',	
Year_Received_Safety_Helmet='$Year_Received_Safety_Helmet',	
Safety_Vest='$Safety_Vest',
Year_Received_Safety_Vest='$Year_Received_Safety_Vest',	
Full_Body_Harness='$Full_Body_Harness',
Year_Received_FBH='$Year_Received_FBH',
FBH_Trained='$FBH_Trained',
Year_Trained_FBH='$Year_Trained_FBH',	
Safety_Shoe='$Safety_Shoe',
Year_Received_Safety_Shoe='$Year_Received_Safety_Shoe',	
Ladder='$Ladder' and Year_Received_Ladder='$Year_Received_Ladder'  WHERE id='$id'"*/;
?>
  
  
  