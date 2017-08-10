<?php
/*	
if($_POST['Safety_Helmet']=="Select")
{
	$msg="SEE BESIDE DATA----->PLEASE SELECT SAFETY HELMET YES OR NO.... THE FIELD COMPULSORY";
 echo"<script>window.alert(\"$msg\");</script>";
 $path = "iPPE_update.php";
    echo"<script>window.location=\"$path\"</script>";
}
elseif($_POST['Safety_Vest']=="Select")
{
$msg="SEE BESIDE DATA----->PLEASE SELECT SAFETY VEST YES OR NO.... THE FIELD COMPULSORY";
 echo"<script>window.alert(\"$msg\");</script>";
 $path = "iPPE_update.php";
    echo"<script>window.location=\"$path\"</script>";
}
elseif($_POST['Full_Body_Harness']=="Select")
{
$msg="SEE BESIDE DATA----->PLEASE SELECT FULL BODY HARNESS YES OR NO.... THE FIELD COMPULSORY";
 echo"<script>window.alert(\"$msg\");</script>";
 $path = "iPPE_update.php";
    echo"<script>window.location=\"$path\"</script>";
}
elseif($_POST['FBH_Trained']=="Select")
{
$msg="SEE BESIDE DATA----->PLEASE SELECT FBH TRAINED YES OR NO.... THE FIELD COMPULSORY";
 echo"<script>window.alert(\"$msg\");</script>";
 $path = "iPPE_update.php";
    echo"<script>window.location=\"$path\"</script>";
}
elseif($_POST['Safety_Shoe']=="Select")
{
$msg="SEE BESIDE DATA----->PLEASE SELECT SAFETY SHOE YES OR NO.... THE FIELD COMPULSORY";
 echo"<script>window.alert(\"$msg\");</script>";
 $path = "iPPE_update.php";
    echo"<script>window.location=\"$path\"</script>";
}

elseif($_POST['Ladder']=="Select")
{
$msg="SEE BESIDE DATA----->PLEASE SELECT LADDER YES OR NO.... THE FIELD COMPULSORY";
 echo"<script>window.alert(\"$msg\");</script>";
 $path = "iPPE_update.php";
    echo"<script>window.location=\"$path\"</script>";
}

elseif($_POST['shoe_size']=="Select Shoe Size")
{
$msg="SEE BESIDE DATA----->PLEASE SELECT SHOE SIZE YES OR NO.... THE FIELD COMPULSORY";
 echo"<script>window.alert(\"$msg\");</script>";
 $path = "iPPE_update.php";
    echo"<script>window.location=\"$path\"</script>";
}

elseif($_POST['Year_Received_Safety_Helmet']=="")
{
$msg="SEE BESIDE DATA----->YEAR RECEIVED SAFETY HELMET NOT FILL IN...THE FIELD COMPULSORY";
 echo"<script>window.alert(\"$msg\");</script>";
 $path = "iPPE_update.php";
    echo"<script>window.location=\"$path\"</script>";
}


elseif($_POST['Year_Received_Safety_Vest']=="")
{
$msg="SEE BESIDE DATA----->YEAR RECEIVED SAFETY VEST NOT FILL IN...THE FIELD COMPULSORY";
 echo"<script>window.alert(\"$msg\");</script>";
 $path = "iPPE_update.php";
    echo"<script>window.location=\"$path\"</script>";
}


elseif($_POST['Year_Received_FBH']=="")
{
$msg="SEE BESIDE DATA----->YEAR RECEIVED FBH NOT FILL IN...THE FIELD COMPULSORY";
 echo"<script>window.alert(\"$msg\");</script>";
 $path = "iPPE_update.php";
    echo"<script>window.location=\"$path\"</script>";
}


elseif($_POST['Year_Trained_FBH']=="")
{
$msg="SEE BESIDE DATA----->YEAR TRAINED FBH NOT FILL IN...THE FIELD COMPULSORY";
 echo"<script>window.alert(\"$msg\");</script>";
 $path = "iPPE_update.php";
    echo"<script>window.location=\"$path\"</script>";
}

elseif($_POST['Year_Received_Safety_Shoe']=="")
{
$msg="SEE BESIDE DATA----->YEAR RECEIVED SAFETY SHOE NOT FILL IN...THE FIELD COMPULSORY";
 echo"<script>window.alert(\"$msg\");</script>";
 $path = "iPPE_update.php";
    echo"<script>window.location=\"$path\"</script>";
}
elseif($_POST['Year_Received_Ladder']=="")
{
$msg="SEE BESIDE DATA----->YEAR RECEIVED LADDER NOT FILL IN...THE FIELD COMPULSORY";
 echo"<script>window.alert(\"$msg\");</script>";
 $path = "iPPE_update.php";
    echo"<script>window.location=\"$path\"</script>";
}
elseif($_POST['sn_fbh']=="")
{
$msg="SEE BESIDE DATA----->SERIAL NUMBER FBH NOT FILL IN...THE FIELD COMPULSORY";
 echo"<script>window.alert(\"$msg\");</script>";
 $path = "iPPE_update.php";
    echo"<script>window.location=\"$path\"</script>";
}
else
{
*/
$con = mysql_connect("localhost","root","az123");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
	
	
	
	mysql_select_db("iPPE", $con);

$id=$_POST['id'];
$Employee=$_POST['Employee'];
$Staff_No=$_POST['Staff_No'];
$Unit=$_POST['Unit'];
$Essential_Task=$_POST['Essential_Task'];
$Organizational_unit=$_POST['Organizational_unit'];
$Zone=$_POST['Zone'];
$State_type=$_POST['State_type'];
$State=$_POST['State'];
$Status=$_POST['Status'];
$date_last_update=$_POST['date_last_update'];

$Safety_Helmet=$_POST['Safety_Helmet'];
$Safety_Vest =$_POST['Safety_Vest'];
$Full_Body_Harness =$_POST['Full_Body_Harness'];
$FBH_Trained =$_POST['FBH_Trained'];
$Safety_Shoe =$_POST['Safety_Shoe'];
$Safety_spec =$_POST['Safety_spec'];
$Ladder =$_POST['Ladder'];

$Year_Received_Safety_Helmet=$_POST['Year_Received_Safety_Helmet'];
$Year_Received_Safety_Vest=$_POST['Year_Received_Safety_Vest'];
$Year_Received_FBH=$_POST['Year_Received_FBH'];
$Year_Trained_FBH =$_POST['Year_Trained_FBH'];
$Year_Received_Safety_Shoe=$_POST['Year_Received_Safety_Shoe'];
$Year_Received_Safety_spec=$_POST['Year_Received_Safety_spec'];
$Year_Received_Ladder=$_POST['Year_Received_Ladder'];
$sn_fbh=$_POST['sn_fbh'];
$shoe_size=$_POST['shoe_size'];


$jenis_testgear=$_POST['jenis_testgear'];
$serial_no_testgear=$_POST['serial_no_testgear'];
$calibration_date=$_POST['calibration_date'];
$lokasi_testgear=$_POST['lokasi_testgear'];

$jenis_testgear2=$_POST['jenis_testgear2'];
$serial_no_testgear2=$_POST['serial_no_testgear2'];
$calibration_date2=$_POST['calibration_date2'];
$lokasi_testgear2=$_POST['lokasi_testgear2'];

$jenis_testgear3=$_POST['jenis_testgear3'];
$serial_no_testgear3=$_POST['serial_no_testgear3'];
$calibration_date3=$_POST['calibration_date3'];
$lokasi_testgear3=$_POST['lokasi_testgear3'];

$jenis_testgear4=$_POST['jenis_testgear4'];
$serial_no_testgear4=$_POST['serial_no_testgear4'];
$calibration_date4=$_POST['calibration_date4'];
$lokasi_testgear4=$_POST['lokasi_testgear4'];


$jenis_tangga=$_POST['jenis_tangga'];
$serial_no_tangga=$_POST['serial_no_tangga'];
$lokasi_tangga=$_POST['lokasi_tangga'];
$condition_of_ladder=$_POST['condition_of_ladder'];

$jenis_tangga2=$_POST['jenis_tangga2'];
$serial_no_tangga2=$_POST['serial_no_tangga2'];
$lokasi_tangga2=$_POST['lokasi_tangga2'];
$condition_of_ladder2=$_POST['condition_of_ladder2'];


$type_vehicle=$_POST['type_vehicle'];
$no_pendaftaran_kenderaan_tm=$_POST['no_pendaftaran_kenderaan_tm'];


$mysql_query="UPDATE ippe SET id='$id' ,Organizational_unit='$Organizational_unit', Unit='$Unit', Essential_Task='$Essential_Task',Zone='$Zone',State_type='$State_type',Status='$Status',jenis_testgear='$jenis_testgear',serial_no_testgear='$serial_no_testgear',calibration_date='$calibration_date',lokasi_testgear='$lokasi_testgear',jenis_testgear2='$jenis_testgear2',serial_no_testgear2='$serial_no_testgear2',calibration_date2='$calibration_date2',lokasi_testgear2='$lokasi_testgear2',jenis_testgear3='$jenis_testgear3',serial_no_testgear3='$serial_no_testgear3',calibration_date3='$calibration_date3',lokasi_testgear3='$lokasi_testgear3',jenis_testgear4='$jenis_testgear4',serial_no_testgear4='$serial_no_testgear4',calibration_date4='$calibration_date4',lokasi_testgear4='$lokasi_testgear4',jenis_tangga='$jenis_tangga',serial_no_tangga='$serial_no_tangga',lokasi_tangga='$lokasi_tangga',condition_of_ladder='$condition_of_ladder',jenis_tangga2='$jenis_tangga2',serial_no_tangga2='$serial_no_tangga2',lokasi_tangga2='$lokasi_tangga2', condition_of_ladder2='$condition_of_ladder2',no_pendaftaran_kenderaan_tm='$no_pendaftaran_kenderaan_tm' ,type_vehicle='$type_vehicle', shoe_size='$shoe_size' , date_last_update='$date_last_update' , State='$State' , Safety_Helmet='$Safety_Helmet' , Safety_Vest='$Safety_Vest' , Full_Body_Harness='$Full_Body_Harness' , FBH_Trained='$FBH_Trained' , Safety_Shoe='$Safety_Shoe', Safety_spec='$Safety_spec', Ladder='$Ladder' , Year_Received_Safety_Helmet='$Year_Received_Safety_Helmet' , Year_Received_Safety_Vest='$Year_Received_Safety_Vest' , Year_Received_FBH='$Year_Received_FBH' , Year_Trained_FBH='$Year_Trained_FBH' , Year_Received_Safety_Shoe='$Year_Received_Safety_Shoe' , Year_Received_Safety_spec='$Year_Received_Safety_spec' , Year_Received_Ladder='$Year_Received_Ladder' , sn_fbh='$sn_fbh' WHERE id='$id'";


if (!mysql_query($mysql_query,$con))
  {
 echo "<script>alert(\"Cannot success, please try again!!.\");</script>";
$url="iPPE_search_pending.php";
echo"<script>window.location=\"$url\"</script>";
  }
else
{

  echo "<script>alert(\"Update success!!.\");</script>";
$url="iPPE_search_pending.php";
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
  
  
  