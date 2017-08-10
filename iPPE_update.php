<?php

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE ippe SET  id=%s, Employee=%s,  Staff_No=%s, Organizational_unit=%s,  Zone=%s,  State_type=%s, State=%s,  Safety_Helmet=%s,  Safety_Vest=%s, Full_Body_Harness=%s, 
 FBH_Trained=%s,  Safety_Shoe=%s,  Ladder=%s, Safety_Helmet=%s, Year_Received_Safety_Helmet=%s, Year_Received_Safety_Vest=%s,  Year_Received_FBH=%s,  Year_Trained_FBH=%s, 
  Year_Received_Safety_Shoe=%s, Year_Received_Ladder=%s ,Status=%s
  ",
                       GetSQLValueString($_POST['id'], "text"),
                       GetSQLValueString($_POST['Employee'], "text"),
                       GetSQLValueString($_POST['Staff_No'], "text"),
                       GetSQLValueString($_POST['Organizational_unit'], "text"),
					    GetSQLValueString($_POST['Zone'], "text"),
                       GetSQLValueString($_POST['State_type'], "text"),
					    GetSQLValueString($_POST['State'], "text"),
						 GetSQLValueString($_POST['Safety_Helmet'], "text"),
						  GetSQLValueString($_POST['Safety_Vest'], "text"),
						   GetSQLValueString($_POST['Full_Body_Harness'], "text"),
						    GetSQLValueString($_POST['FBH_Trained'], "text"),
							GetSQLValueString($_POST['Safety_Shoe'], "text"),
							 GetSQLValueString($_POST['Ladder'], "text"),
							  GetSQLValueString($_POST['Year_Received_Safety_Helmet'], "text"),
							   GetSQLValueString($_POST['Year_Received_Safety_Vest'], "text"),
							    GetSQLValueString($_POST['Year_Received_FBH'], "text"),
								 GetSQLValueString($_POST['Year_Trained_FBH'], "text"),
								  GetSQLValueString($_POST['Year_Received_Safety_Shoe'], "text"),
								   GetSQLValueString($_POST['Year_Received_Ladder'], "text"),
								    GetSQLValueString($_POST['sn_fbh'], "text"),
								      
									  GetSQLValueString($_POST['jenis_testgear'], "text"),
									  GetSQLValueString($_POST['serial_no_testgear'], "text"),
									  GetSQLValueString($_POST['calibration_date'], "text"),
								      GetSQLValueString($_POST['lokasi_testgear'], "text"),
									  
									  
									    GetSQLValueString($_POST['jenis_testgear2'], "text"),
									  GetSQLValueString($_POST['serial_no_testgear2'], "text"),
									  GetSQLValueString($_POST['calibration_date2'], "text"),
								      GetSQLValueString($_POST['lokasi_testgear2'], "text"),
									  
									    GetSQLValueString($_POST['jenis_testgear3'], "text"),
									  GetSQLValueString($_POST['serial_no_testgear3'], "text"),
									  GetSQLValueString($_POST['calibration_date3'], "text"),
								      GetSQLValueString($_POST['lokasi_testgear3'], "text"),
									  
									    GetSQLValueString($_POST['jenis_testgear4'], "text"),
									  GetSQLValueString($_POST['serial_no_testgear4'], "text"),
									  GetSQLValueString($_POST['calibration_date4'], "text"),
								      GetSQLValueString($_POST['lokasi_testgear4'], "text"),
									  
									     GetSQLValueString($_POST['jenis_tangga'], "text"),
									  GetSQLValueString($_POST['serial_no_tangga'], "text"),
									  GetSQLValueString($_POST['lokasi_tangga'], "text"),
								      GetSQLValueString($_POST['condition_of_ladder'], "text"),
									  
									  
									  	     GetSQLValueString($_POST['jenis_tangga2'], "text"),
									  GetSQLValueString($_POST['serial_no_tangga2'], "text"),
									  GetSQLValueString($_POST['lokasi_tangga2'], "text"),
								      GetSQLValueString($_POST['condition_of_ladder2'], "text"),
									  
									  
								   	  GetSQLValueString($_POST['Status'], "text")  );




$con = mysql_connect("localhost","root","az123");

  $Result1 = mysql_query($updateSQL, $con) or die(mysql_error());
}

$colname_kemaskiniteam = "-1";
if (isset($_GET['id'])) {
  $colname_kemaskiniteam = $_GET['id'];
}
$con = mysql_connect("localhost","root","az123");
mysql_select_db("iPPE", $con);
$query_kemaskiniteam = sprintf("SELECT * FROM ippe WHERE id = %s", GetSQLValueString($colname_kemaskiniteam, "text"));
$kemaskiniteam = mysql_query($query_kemaskiniteam, $con) or die(mysql_error());
$row_kemaskiniteam = mysql_fetch_assoc($kemaskiniteam);
$totalRows_kemaskiniteam = mysql_num_rows($kemaskiniteam);
?>
<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>

  
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="button.css3prj_files/css3menu1/style.css" type="text/css" />
	<title>IPPE NMOS</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8" />	
	<!--[if lte IE 7]>
		<link rel="stylesheet" href="css/ie.css" type="text/css" charset="utf-8" />	
	<![endif]-->
    <style type="text/css">
<!--
.style14 {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: small;
}
.style18 {font-family: Georgia, "Times New Roman", Times, serif}
.style19 {
	font-size: small;
	font-weight: bold;
}
.style20 {
	font-weight: bold;
	color: #999999;
}
.style52 {font-size: small}
.style55 {color: #FFFFFF}
.style56 {
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style70 {color: #FFCC00}
.style71 {
	color: #FF9900;
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style72 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style74 {font-weight: bold}
.style76 {font-weight: bold}
.style77 {font-weight: bold}
.style79 {font-weight: bold}
.style80 {font-weight: bold}
.style83 {
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style86 {
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style94 {font-weight: bold}
.style95 {
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style98 {
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style100 {font-family: Verdana, Arial, Helvetica, sans-serif; color: #FF9900; }
.style101 {color: #FF9900}
.style102 {color: #999999}
.style103 {font-family: Verdana, Arial, Helvetica, sans-serif; color: #FFFFFF; }
.style105 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #0066FF;
	font-weight: bold;
	font-style: italic;
}
.style108 {
	color: #CCCCCC;
	font-weight: bold;
	font-style: italic;
}
.style109 {color: #CCCCCC}
.style110 {font-size: large}
-->
    </style>
		  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
	$("#datepicker1").datepicker();
	$("#datepicker2").datepicker();
	$("#datepicker3").datepicker();
	$("#datepicker4").datepicker();
	$("#datepicker5").datepicker();
		$("#datepicker6").datepicker();
  });
  </script> 
  <style type="text/css">
<!--
.style112 {color: #FF0000; font-style: italic; font-size: small; }
.style113 {
	color: #FF0000;
	font-style: italic;
	font-size: x-small;
}
-->
  </style>
</head>

<body>
<div id="header"><img src="logo ippe.png" width="838" height="198"> <img src="TM_LOGO.png" width="111" height="53"></div>
<!-- /#header -->
<!-- /#adbox -->
<div id="contents">
  <div class="body style14">
    <p align="center" class="style20"><form action="iPPE_update_run.php" name=feedback method=post enctype="multipart/form-data" onSubmit="return validate()">
	      <table width="958" border="1" bgcolor="#FFFFFF">
        <tr>
          <td width="948" height="26"><div align="right" class="style105">
            <div align="center" class="style110">UPDATE DATA </div>
          </div></td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <table width="926" height="303" align="center" class="style80">
        <tr valign="baseline">
          <td height="27" class="style80"><div align="left" class="style14 style142 style217 style52 style55 style72"><strong>I/C Number </strong></div></td>
          <td class="style80"><div align="left" class="style72 style14 style80 style217 style52 style55"><strong>:</strong></div></td>
          <td class="style80"><div align="left" class="style72 style217 style143 style159 style14 style55"><strong>
            <span class="style70"><?php echo $row_kemaskiniteam['id']; ?></span>
            <label>
            <input hidden type="text" name="id" value="<?php echo $id;  ?>" />
            </label>
          </strong></div></td>
        </tr>
        <tr valign="baseline">
          <td height="25" class="style80"><div align="left" class="style14 style142 style217 style52 style55 style72"><strong>Name </strong></div></td>
          <td class="style80"><div align="left" class="style72 style14 style80 style217 style52 style55"><strong>:</strong></div></td>
          <td class="style80"><div align="left" class="style72 style217 style80 style14 style55"><strong><?php echo $row_kemaskiniteam['Employee']; ?></strong></div></td>
        </tr>
        <tr valign="baseline">
          <td width="152" height="26" class="style80"><div align="left" class="style14 style142 style217 style52 style55 style72"><strong>Staff No </strong></div></td>
          <td width="5" class="style80"><div align="left" class="style72 style14 style80 style217 style52 style55"><strong>:</strong></div></td>
          <td width="753" class="style80"><div align="left" class="style72 style217 style80 style14 style55"><strong><?php echo $row_kemaskiniteam['Staff_No']; ?></strong></div></td>
        </tr>
        <tr valign="baseline">
          <td height="19"><strong><span class="style72 style14 style142 style217 style52 style55"><strong><span class="style52 style217 style142 style72">Unit</span></strong></span></strong></td>
          <td class="style80"><div align="left" class="style72 style14 style80 style217 style52 style55"><strong>:</strong></div></td>
          <td class="style80"><div align="left" class="style72 style217 style80 style14 style55"><strong>
              <label></label>
              <span class="style217 style94">
              <label>
              <?php
			  if ($row_kemaskiniteam['Unit']=="")
			  {?>
			   <select name="Unit" id="Unit">
              <option value="">Select Unit</option>
              <option value="AGM Office">AGM Office</option>
              <option value="BPQM">BPQM</option>
              <option value="CM">CM</option>
                <option value="CNZ">CNZ</option>
                <option value="DDZ">DDZ</option>
                <option value="ENZ">ENZ</option>
                <option value="GM Office">GM Office</option>
                <option value="GM/AGM Office">GM/AGM Office</option>
                <option value="JCC">JCC</option>
                <option value="NMOS">NMOS</option>
                <option value="OMDS">OMDS</option>
                <option value="Remote">Remote</option>
                <option value="SDZ">SDZ</option>
                <option value="SDZ &amp; DDZ">SDZ &amp; DDZ</option>
                <option value="STS">STS</option>
                <option value="VP Office">VP Office</option>
               </select>
              <?php
			  }
			  ?>
              <?php
				  if ($row_kemaskiniteam['Unit']=="AGM Office")
			  {?>
			   <select name="Unit" id="Unit">
              
              <option value="AGM Office">AGM Office</option>
              <option value="BPQM">BPQM</option>
              <option value="CM">CM</option>
                <option value="CNZ">CNZ</option>
                <option value="DDZ">DDZ</option>
                <option value="ENZ">ENZ</option>
                <option value="GM Office">GM Office</option>
                <option value="GM/AGM Office">GM/AGM Office</option>
                <option value="JCC">JCC</option>
                <option value="NMOS">NMOS</option>
                <option value="OMDS">OMDS</option>
                <option value="Remote">Remote</option>
                <option value="SDZ">SDZ</option>
                <option value="SDZ & DDZ">SDZ & DDZ</option>
                <option value="STS">STS</option>
                <option value="VP Office">VP Office</option>
               </select>
              <?php
			  }
			  ?>
       <?php
				  if ($row_kemaskiniteam['Unit']=="BPQM")
			  {?>
			   <select name="Unit" id="Unit">
              <option value="BPQM">BPQM</option>
              <option value="AGM Office">AGM Office</option>
              
              <option value="CM">CM</option>
                <option value="CNZ">CNZ</option>
                <option value="DDZ">DDZ</option>
                <option value="ENZ">ENZ</option>
                <option value="GM Office">GM Office</option>
                <option value="GM/AGM Office">GM/AGM Office</option>
                <option value="JCC">JCC</option>
                <option value="NMOS">NMOS</option>
                <option value="OMDS">OMDS</option>
                <option value="Remote">Remote</option>
                <option value="SDZ">SDZ</option>
                <option value="SDZ & DDZ">SDZ & DDZ</option>
                <option value="STS">STS</option>
                <option value="VP Office">VP Office</option>
               </select>
              <?php
			  }
			  ?>
              <?php
				  if ($row_kemaskiniteam['Unit']=="CM")
			  {?>
			   <select name="Unit" id="Unit">
               <option value="CM">CM</option>
              <option value="AGM Office">AGM Office</option>
              <option value="BPQM">BPQM</option>
             
                <option value="CNZ">CNZ</option>
                <option value="DDZ">DDZ</option>
                <option value="ENZ">ENZ</option>
                <option value="GM Office">GM Office</option>
                <option value="GM/AGM Office">GM/AGM Office</option>
                <option value="JCC">JCC</option>
                <option value="NMOS">NMOS</option>
                <option value="OMDS">OMDS</option>
                <option value="Remote">Remote</option>
                <option value="SDZ">SDZ</option>
                <option value="SDZ & DDZ">SDZ & DDZ</option>
                <option value="STS">STS</option>
                <option value="VP Office">VP Office</option>
               </select>
              <?php
			  }
			  ?>
			  
			  
			  
			  
             <?php
				  if ($row_kemaskiniteam['Unit']=="CNZ")
			  {?>
			   <select name="Unit" id="Unit">
               <option value="CNZ">CNZ</option>
              <option value="AGM Office">AGM Office</option>
              <option value="BPQM">BPQM</option>
              <option value="CM">CM</option>
               
                <option value="DDZ">DDZ</option>
                <option value="ENZ">ENZ</option>
                <option value="GM Office">GM Office</option>
                <option value="GM/AGM Office">GM/AGM Office</option>
                <option value="JCC">JCC</option>
                <option value="NMOS">NMOS</option>
                <option value="OMDS">OMDS</option>
                <option value="Remote">Remote</option>
                <option value="SDZ">SDZ</option>
                <option value="SDZ & DDZ">SDZ & DDZ</option>
                <option value="STS">STS</option>
                <option value="VP Office">VP Office</option>
               </select>
              <?php
			  }
			  ?>
			  
			  
			  
			  
              <?php
				  if ($row_kemaskiniteam['Unit']=="DDZ")
			  {?>
			   <select name="Unit" id="Unit">
                <option value="DDZ">DDZ</option>
              <option value="AGM Office">AGM Office</option>
              <option value="BPQM">BPQM</option>
              <option value="CM">CM</option>
                <option value="CNZ">CNZ</option>
              
                <option value="ENZ">ENZ</option>
                <option value="GM Office">GM Office</option>
                <option value="GM/AGM Office">GM/AGM Office</option>
                <option value="JCC">JCC</option>
                <option value="NMOS">NMOS</option>
                <option value="OMDS">OMDS</option>
                <option value="Remote">Remote</option>
                <option value="SDZ">SDZ</option>
                <option value="SDZ & DDZ">SDZ & DDZ</option>
                <option value="STS">STS</option>
                <option value="VP Office">VP Office</option>
               </select>
              <?php
			  }
			  ?>
             <?php
				  if ($row_kemaskiniteam['Unit']=="ENZ")
			  {?>
			   <select name="Unit" id="Unit">
                              <option value="ENZ">ENZ</option>
              <option value="AGM Office">AGM Office</option>
              <option value="BPQM">BPQM</option>
              <option value="CM">CM</option>
                <option value="CNZ">CNZ</option>
                <option value="DDZ">DDZ</option>

                <option value="GM Office">GM Office</option>
                <option value="GM/AGM Office">GM/AGM Office</option>
                <option value="JCC">JCC</option>
                <option value="NMOS">NMOS</option>
                <option value="OMDS">OMDS</option>
                <option value="Remote">Remote</option>
                <option value="SDZ">SDZ</option>
                <option value="SDZ & DDZ">SDZ & DDZ</option>
                <option value="STS">STS</option>
                <option value="VP Office">VP Office</option>
               </select>
              <?php
			  }
			  ?>
             <?php
				  if ($row_kemaskiniteam['Unit']=="GM Office")
			  {?>
			   <select name="Unit" id="Unit">
                <option value="GM Office">GM Office</option>
              <option value="AGM Office">AGM Office</option>
              <option value="BPQM">BPQM</option>
              <option value="CM">CM</option>
                <option value="CNZ">CNZ</option>
                <option value="DDZ">DDZ</option>
                <option value="ENZ">ENZ</option>
              
                <option value="GM/AGM Office">GM/AGM Office</option>
                <option value="JCC">JCC</option>
                <option value="NMOS">NMOS</option>
                <option value="OMDS">OMDS</option>
                <option value="Remote">Remote</option>
                <option value="SDZ">SDZ</option>
                <option value="SDZ & DDZ">SDZ & DDZ</option>
                <option value="STS">STS</option>
                <option value="VP Office">VP Office</option>
               </select>
              <?php
			  }
			  ?>
			  
			  
			   <?php
				  if ($row_kemaskiniteam['Unit']=="GM/AGM Office")
			  {?>
			   <select name="Unit" id="Unit">
                 <option value="GM/AGM Office">GM/AGM Office</option>
              <option value="AGM Office">AGM Office</option>
              <option value="BPQM">BPQM</option>
              <option value="CM">CM</option>
                <option value="CNZ">CNZ</option>
                <option value="DDZ">DDZ</option>
                <option value="ENZ">ENZ</option>
                <option value="GM Office">GM Office</option>
             
                <option value="JCC">JCC</option>
                <option value="NMOS">NMOS</option>
                <option value="OMDS">OMDS</option>
                <option value="Remote">Remote</option>
                <option value="SDZ">SDZ</option>
                <option value="SDZ & DDZ">SDZ & DDZ</option>
                <option value="STS">STS</option>
                <option value="VP Office">VP Office</option>
               </select>
              <?php
			  }
			  ?>
			  
			  
			  
			  
			  
			   <?php
				  if ($row_kemaskiniteam['Unit']=="JCC")
			  {?>
			   <select name="Unit" id="Unit">
                <option value="JCC">JCC</option>
              <option value="AGM Office">AGM Office</option>
              <option value="BPQM">BPQM</option>
              <option value="CM">CM</option>
                <option value="CNZ">CNZ</option>
                <option value="DDZ">DDZ</option>
                <option value="ENZ">ENZ</option>
                <option value="GM Office">GM Office</option>
                <option value="GM/AGM Office">GM/AGM Office</option>
              
                <option value="NMOS">NMOS</option>
                <option value="OMDS">OMDS</option>
                <option value="Remote">Remote</option>
                <option value="SDZ">SDZ</option>
                <option value="SDZ & DDZ">SDZ & DDZ</option>
                <option value="STS">STS</option>
                <option value="VP Office">VP Office</option>
               </select>
              <?php
			  }
			  ?>
			  
			  
			  
			  
			  
			  
			   <?php
				  if ($row_kemaskiniteam['Unit']=="NMOS")
			  {?>
			   <select name="Unit" id="Unit">
                <option value="NMOS">NMOS</option>
              <option value="AGM Office">AGM Office</option>
              <option value="BPQM">BPQM</option>
              <option value="CM">CM</option>
                <option value="CNZ">CNZ</option>
                <option value="DDZ">DDZ</option>
                <option value="ENZ">ENZ</option>
                <option value="GM Office">GM Office</option>
                <option value="GM/AGM Office">GM/AGM Office</option>
                <option value="JCC">JCC</option>
              
                <option value="OMDS">OMDS</option>
                <option value="Remote">Remote</option>
                <option value="SDZ">SDZ</option>
                <option value="SDZ & DDZ">SDZ & DDZ</option>
                <option value="STS">STS</option>
                <option value="VP Office">VP Office</option>
               </select>
              <?php
			  }
			  ?>
			  
			  
			  
			  
			  
			   <?php
				  if ($row_kemaskiniteam['Unit']=="OMDS")
			  {?>
			   <select name="Unit" id="Unit">
                <option value="OMDS">OMDS</option>
              <option value="AGM Office">AGM Office</option>
              <option value="BPQM">BPQM</option>
              <option value="CM">CM</option>
                <option value="CNZ">CNZ</option>
                <option value="DDZ">DDZ</option>
                <option value="ENZ">ENZ</option>
                <option value="GM Office">GM Office</option>
                <option value="GM/AGM Office">GM/AGM Office</option>
                <option value="JCC">JCC</option>
                <option value="NMOS">NMOS</option>
              
                <option value="Remote">Remote</option>
                <option value="SDZ">SDZ</option>
                <option value="SDZ & DDZ">SDZ & DDZ</option>
                <option value="STS">STS</option>
                <option value="VP Office">VP Office</option>
               </select>
              <?php
			  }
			  ?>
			  
			  
			  
			  
			  
			  
			  
			   <?php
				  if ($row_kemaskiniteam['Unit']=="Remote")
			  {?>
			   <select name="Unit" id="Unit">
               <option value="Remote">Remote</option>
              <option value="AGM Office">AGM Office</option>
              <option value="BPQM">BPQM</option>
              <option value="CM">CM</option>
                <option value="CNZ">CNZ</option>
                <option value="DDZ">DDZ</option>
                <option value="ENZ">ENZ</option>
                <option value="GM Office">GM Office</option>
                <option value="GM/AGM Office">GM/AGM Office</option>
                <option value="JCC">JCC</option>
                <option value="NMOS">NMOS</option>
                <option value="OMDS">OMDS</option>
               
                <option value="SDZ">SDZ</option>
                <option value="SDZ & DDZ">SDZ & DDZ</option>
                <option value="STS">STS</option>
                <option value="VP Office">VP Office</option>
               </select>
              <?php
			  }
			  ?>
			  
			  
			  
			  
			  
			  
			  
			  
			  
			   <?php
				  if ($row_kemaskiniteam['Unit']=="SDZ")
			  {?>
			   <select name="Unit" id="Unit">
               <option value="SDZ">SDZ</option>
              <option value="AGM Office">AGM Office</option>
              <option value="BPQM">BPQM</option>
              <option value="CM">CM</option>
                <option value="CNZ">CNZ</option>
                <option value="DDZ">DDZ</option>
                <option value="ENZ">ENZ</option>
                <option value="GM Office">GM Office</option>
                <option value="GM/AGM Office">GM/AGM Office</option>
                <option value="JCC">JCC</option>
                <option value="NMOS">NMOS</option>
                <option value="OMDS">OMDS</option>
                <option value="Remote">Remote</option>
               
                <option value="SDZ & DDZ">SDZ & DDZ</option>
                <option value="STS">STS</option>
                <option value="VP Office">VP Office</option>
               </select>
              <?php
			  }
			  ?>
			  
			  
			  
			  
			  
			  
			   <?php
				  if ($row_kemaskiniteam['Unit']=="SDZ & DDZ")
			  {?>
			   <select name="Unit" id="Unit">
                <option value="SDZ & DDZ">SDZ & DDZ</option>
              <option value="AGM Office">AGM Office</option>
              <option value="BPQM">BPQM</option>
              <option value="CM">CM</option>
                <option value="CNZ">CNZ</option>
                <option value="DDZ">DDZ</option>
                <option value="ENZ">ENZ</option>
                <option value="GM Office">GM Office</option>
                <option value="GM/AGM Office">GM/AGM Office</option>
                <option value="JCC">JCC</option>
                <option value="NMOS">NMOS</option>
                <option value="OMDS">OMDS</option>
                <option value="Remote">Remote</option>
                <option value="SDZ">SDZ</option>
              
                <option value="STS">STS</option>
                <option value="VP Office">VP Office</option>
               </select>
              <?php
			  }
			  ?>
			  
			  
			  
			  
			  
			   <?php
				  if ($row_kemaskiniteam['Unit']=="STS")
			  {?>
			   <select name="Unit" id="Unit">
               <option value="STS">STS</option>
              <option value="AGM Office">AGM Office</option>
              <option value="BPQM">BPQM</option>
              <option value="CM">CM</option>
                <option value="CNZ">CNZ</option>
                <option value="DDZ">DDZ</option>
                <option value="ENZ">ENZ</option>
                <option value="GM Office">GM Office</option>
                <option value="GM/AGM Office">GM/AGM Office</option>
                <option value="JCC">JCC</option>
                <option value="NMOS">NMOS</option>
                <option value="OMDS">OMDS</option>
                <option value="Remote">Remote</option>
                <option value="SDZ">SDZ</option>
                <option value="SDZ & DDZ">SDZ & DDZ</option>
               
                <option value="VP Office">VP Office</option>
               </select>
              <?php
			  }
			  ?>
			  
			  
			  
			  
			  
			   <?php
				  if ($row_kemaskiniteam['Unit']=="VP Office")
			  {?>
			   <select name="Unit" id="Unit">
               <option value="VP Office">VP Office</option>
              <option value="AGM Office">AGM Office</option>
              <option value="BPQM">BPQM</option>
              <option value="CM">CM</option>
                <option value="CNZ">CNZ</option>
                <option value="DDZ">DDZ</option>
                <option value="ENZ">ENZ</option>
                <option value="GM Office">GM Office</option>
                <option value="GM/AGM Office">GM/AGM Office</option>
                <option value="JCC">JCC</option>
                <option value="NMOS">NMOS</option>
                <option value="OMDS">OMDS</option>
                <option value="Remote">Remote</option>
                <option value="SDZ">SDZ</option>
                <option value="SDZ & DDZ">SDZ & DDZ</option>
                <option value="STS">STS</option>
               
               </select>
              <?php
			  }
			  ?>
			  
			  
			  
			  

              <br>
</label>
</span></strong></div></td>
        </tr>
        <tr valign="baseline">
          <td height="19"><strong><span class="style72 style14 style142 style217 style52 style55"><strong><span class="style52 style217 style142 style72">Essential Task</span></strong></span></strong></td>
          <td class="style80"><div align="left" class="style72 style14 style80 style217 style52 style55"><strong>:</strong></div></td>
          <td class="style80"><div align="left" class="style72 style217 style80 style14 style55"><strong>
              <label></label>
              <span class="style217 style94">
              <label></label>
          
              <label>
              <?php
			  if ($row_kemaskiniteam['Essential_Task']=="")
			  {?>
              <select name="Essential_Task" id="Essential_Task">
              
				 <option value="">Select essential task</option>
                  <option value="Admin">Admin</option>
                  <option value="SDZ Assurance">SDZ Assurance</option>
                  <option value="SDZ Fulfillment">SDZ Fulfillment</option>
                  <option value="MDF">MDF</option>
                  <option value="NMO Creator">NMO Creator</option>
                  <option value="JCC">JCC</option>
                  <option value="SO MJKH">SO MJKH</option>
                  <option value="Aerial Rigger">Aerial Rigger</option>
                  <option value="Transmission">Transmission</option>
                  <option value="Switching">Switching</option>
                  <option value="Hill Station">Hill Station</option>
                  <option value="DDZ">DDZ</option>
                  <option value="OFM">OFM</option>
                  <option value="PRM">PRM</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Essential_Task']=="Admin")
			  {?>
              <select name="Essential_Task" id="Essential_Task">
                  <option value="Admin">Admin</option>
                  <option value="SDZ Assurance">SDZ Assurance</option>
                  <option value="SDZ Fulfillment">SDZ Fulfillment</option>
                  <option value="MDF">MDF</option>
                  <option value="NMO Creator">NMO Creator</option>
                  <option value="JCC">JCC</option>
                  <option value="SO MJKH">SO MJKH</option>
                  <option value="Aerial Rigger">Aerial Rigger</option>
                  <option value="Transmission">Transmission</option>
                  <option value="Switching">Switching</option>
                  <option value="Hill Station">Hill Station</option>
                  <option value="DDZ">DDZ</option>
                  <option value="OFM">OFM</option>
                  <option value="PRM">PRM</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Essential_Task']=="SDZ Assurance")
			  {?>
              <select name="Essential_Task" id="Essential_Task">
                                  <option value="SDZ Assurance">SDZ Assurance</option>
								    <option value="Admin">Admin</option>
                  <option value="SDZ Fulfillment">SDZ Fulfillment</option>
                  <option value="MDF">MDF</option>
                  <option value="NMO Creator">NMO Creator</option>
                  <option value="JCC">JCC</option>
                  <option value="SO MJKH">SO MJKH</option>
                  <option value="Aerial Rigger">Aerial Rigger</option>
                  <option value="Transmission">Transmission</option>
                  <option value="Switching">Switching</option>
                  <option value="Hill Station">Hill Station</option>
                  <option value="DDZ">DDZ</option>
                  <option value="OFM">OFM</option>
                  <option value="PRM">PRM</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Essential_Task']=="SDZ Fulfillment")
			  {?>
              <select name="Essential_Task" id="Essential_Task">
			   <option value="SDZ Fulfillment">SDZ Fulfillment</option>
                  <option value="Admin">Admin</option>
                  <option value="SDZ Assurance">SDZ Assurance</option>
                  <option value="MDF">MDF</option>
                  <option value="NMO Creator">NMO Creator</option>
                  <option value="JCC">JCC</option>
                  <option value="SO MJKH">SO MJKH</option>
                  <option value="Aerial Rigger">Aerial Rigger</option>
                  <option value="Transmission">Transmission</option>
                  <option value="Switching">Switching</option>
                  <option value="Hill Station">Hill Station</option>
                  <option value="DDZ">DDZ</option>
                  <option value="OFM">OFM</option>
                  <option value="PRM">PRM</option>
              </select>
              <?php
			  }
			  ?>
              <br>
              <?php
			 if ($row_kemaskiniteam['Essential_Task']=="MDF")
			  {?>
              <select name="Essential_Task" id="Essential_Task">
			  <option value="MDF">MDF</option>
                  <option value="Admin">Admin</option>
                  <option value="SDZ Assurance">SDZ Assurance</option>
                  <option value="SDZ Fulfillment">SDZ Fulfillment</option>
                  <option value="NMO Creator">NMO Creator</option>
                  <option value="JCC">JCC</option>
                  <option value="SO MJKH">SO MJKH</option>
                  <option value="Aerial Rigger">Aerial Rigger</option>
                  <option value="Transmission">Transmission</option>
                  <option value="Switching">Switching</option>
                  <option value="Hill Station">Hill Station</option>
                  <option value="DDZ">DDZ</option>
                  <option value="OFM">OFM</option>
                  <option value="PRM">PRM</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			 if ($row_kemaskiniteam['Essential_Task']=="NMO Creator")
			  {?>
              <select name="Essential_Task" id="Essential_Task">
			                 <option value="NMO Creator">NMO Creator</option>
                  <option value="Admin">Admin</option>
                  <option value="SDZ Assurance">SDZ Assurance</option>
                  <option value="SDZ Fulfillment">SDZ Fulfillment</option>
                  <option value="MDF">MDF</option>
                     <option value="JCC">JCC</option>
                  <option value="SO MJKH">SO MJKH</option>
                  <option value="Aerial Rigger">Aerial Rigger</option>
                  <option value="Transmission">Transmission</option>
                  <option value="Switching">Switching</option>
                  <option value="Hill Station">Hill Station</option>
                  <option value="DDZ">DDZ</option>
                  <option value="OFM">OFM</option>
                  <option value="PRM">PRM</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Essential_Task']=="JCC")
			  {?>
              <select name="Essential_Task" id="Essential_Task">
			                    <option value="JCC">JCC</option>
                  <option value="Admin">Admin</option>
                  <option value="SDZ Assurance">SDZ Assurance</option>
                  <option value="SDZ Fulfillment">SDZ Fulfillment</option>
                  <option value="MDF">MDF</option>
                  <option value="NMO Creator">NMO Creator</option>
                  <option value="SO MJKH">SO MJKH</option>
                  <option value="Aerial Rigger">Aerial Rigger</option>
                  <option value="Transmission">Transmission</option>
                  <option value="Switching">Switching</option>
                  <option value="Hill Station">Hill Station</option>
                  <option value="DDZ">DDZ</option>
                  <option value="OFM">OFM</option>
                  <option value="PRM">PRM</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Essential_Task']=="SO MJKH")
			  {?>
              <select name="Essential_Task" id="Essential_Task">
			                    <option value="SO MJKH">SO MJKH</option>
                  <option value="Admin">Admin</option>
                  <option value="SDZ Assurance">SDZ Assurance</option>
                  <option value="SDZ Fulfillment">SDZ Fulfillment</option>
                  <option value="MDF">MDF</option>
                  <option value="NMO Creator">NMO Creator</option>
                  <option value="JCC">JCC</option>
                  <option value="Aerial Rigger">Aerial Rigger</option>
                  <option value="Transmission">Transmission</option>
                  <option value="Switching">Switching</option>
                  <option value="Hill Station">Hill Station</option>
                  <option value="DDZ">DDZ</option>
                  <option value="OFM">OFM</option>
                  <option value="PRM">PRM</option>
              </select>
              <?php
			  }
			  ?>
              <br>
              </label>
              </span>
              <?php
			  if ($row_kemaskiniteam['Essential_Task']=="Aerial Rigger")
			  {?>
             <select name="Essential_Task" id="Essential_Task">
			                   <option value="Aerial Rigger">Aerial Rigger</option>
                  <option value="Admin">Admin</option>
                  <option value="SDZ Assurance">SDZ Assurance</option>
                  <option value="SDZ Fulfillment">SDZ Fulfillment</option>
                  <option value="MDF">MDF</option>
                  <option value="NMO Creator">NMO Creator</option>
                  <option value="JCC">JCC</option>
                  <option value="SO MJKH">SO MJKH</option>
                  <option value="Transmission">Transmission</option>
                  <option value="Switching">Switching</option>
                  <option value="Hill Station">Hill Station</option>
                  <option value="DDZ">DDZ</option>
                  <option value="OFM">OFM</option>
                  <option value="PRM">PRM</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Essential_Task']=="Transmission")
			  {?>
			  <select name="Essential_Task" id="Essential_Task">
			                    <option value="Transmission">Transmission</option>
                  <option value="Admin">Admin</option>
                  <option value="SDZ Assurance">SDZ Assurance</option>
                  <option value="SDZ Fulfillment">SDZ Fulfillment</option>
                  <option value="MDF">MDF</option>
                  <option value="NMO Creator">NMO Creator</option>
                  <option value="JCC">JCC</option>
                  <option value="SO MJKH">SO MJKH</option>
                  <option value="Aerial Rigger">Aerial Rigger</option>
                  <option value="Switching">Switching</option>
                  <option value="Hill Station">Hill Station</option>
                  <option value="DDZ">DDZ</option>
                  <option value="OFM">OFM</option>
                  <option value="PRM">PRM</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Essential_Task']=="Switching")
			  {?>
			  <select name="Essential_Task" id="Essential_Task">
			                    <option value="Switching">Switching</option>
                  <option value="Admin">Admin</option>
                  <option value="SDZ Assurance">SDZ Assurance</option>
                  <option value="SDZ Fulfillment">SDZ Fulfillment</option>
                  <option value="MDF">MDF</option>
                  <option value="NMO Creator">NMO Creator</option>
                  <option value="JCC">JCC</option>
                  <option value="SO MJKH">SO MJKH</option>
                  <option value="Aerial Rigger">Aerial Rigger</option>
                  <option value="Transmission">Transmission</option>
                  <option value="Hill Station">Hill Station</option>
                  <option value="DDZ">DDZ</option>
                  <option value="OFM">OFM</option>
                  <option value="PRM">PRM</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			 if ($row_kemaskiniteam['Essential_Task']=="Hill Station")
			  {?>
			  <select name="Essential_Task" id="Essential_Task">
			                    <option value="Hill Station">Hill Station</option>
                  <option value="Admin">Admin</option>
                  <option value="SDZ Assurance">SDZ Assurance</option>
                  <option value="SDZ Fulfillment">SDZ Fulfillment</option>
                  <option value="MDF">MDF</option>
                  <option value="NMO Creator">NMO Creator</option>
                  <option value="JCC">JCC</option>
                  <option value="SO MJKH">SO MJKH</option>
                  <option value="Aerial Rigger">Aerial Rigger</option>
                  <option value="Transmission">Transmission</option>
                  <option value="Switching">Switching</option>
                  <option value="OFM">OFM</option>
                  <option value="PRM">PRM</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			 if ($row_kemaskiniteam['Essential_Task']=="DDZ")
			  {?>
			  <select name="Essential_Task" id="Essential_Task">
			                    <option value="DDZ">DDZ</option>
                  <option value="OFM">OFM</option>
				  <option value="Admin">Admin</option>
                  <option value="SDZ Assurance">SDZ Assurance</option>
                  <option value="SDZ Fulfillment">SDZ Fulfillment</option>
                  <option value="MDF">MDF</option>
                  <option value="NMO Creator">NMO Creator</option>
                  <option value="JCC">JCC</option>
                  <option value="SO MJKH">SO MJKH</option>
                  <option value="Aerial Rigger">Aerial Rigger</option>
                  <option value="Transmission">Transmission</option>
                  <option value="Switching">Switching</option>
                  <option value="Hill Station">Hill Station</option>
<option value="PRM">PRM</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Essential_Task']=="OFM")
			  {?>
              <strong>
              <select name="select2" id="select2">
                <option value="OFM">OFM</option>
                <option value="PRM">PRM</option>
                <option value="Admin">Admin</option>
                <option value="SDZ Assurance">SDZ Assurance</option>
                <option value="SDZ Fulfillment">SDZ Fulfillment</option>
                <option value="MDF">MDF</option>
                <option value="NMO Creator">NMO Creator</option>
                <option value="JCC">JCC</option>
                <option value="SO MJKH">SO MJKH</option>
                <option value="Aerial Rigger">Aerial Rigger</option>
                <option value="Transmission">Transmission</option>
                <option value="Switching">Switching</option>
                <option value="Hill Station">Hill Station</option>
                <option value="DDZ">DDZ</option>
              </select>
              </strong>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Essential_Task']=="PRM")
			  {?>
			  <select name="Essential_Task" id="Essential_Task">
                  <option value="Admin">Admin</option>
                  <option value="SDZ Assurance">SDZ Assurance</option>
                  <option value="SDZ Fulfillment">SDZ Fulfillment</option>
                  <option value="MDF">MDF</option>
                  <option value="NMO Creator">NMO Creator</option>
                  <option value="JCC">JCC</option>
                  <option value="SO MJKH">SO MJKH</option>
                  <option value="Aerial Rigger">Aerial Rigger</option>
                  <option value="Transmission">Transmission</option>
                  <option value="Switching">Switching</option>
                  <option value="Hill Station">Hill Station</option>
                  <option value="DDZ">DDZ</option>
                  <option value="OFM">OFM</option>
                  <option value="PRM">PRM</option>
              </select>
              <?php
			  }
			  ?>
          </strong></div></td>
        </tr>
        <tr valign="baseline">
          <td height="19" class="style80"><div align="left" class="style217 style142 style145 style14 style20 style52 style18 style55 style56">
              <p>Regional</p>
          </div></td>
          <td class="style80"><div align="left" class="style217 style80 style14 style20 style52 style18 style55 style56 style76">
              <p>:</p>
          </div></td>
          <td class="style80"><div align="left" class="style217 style80 style14 style18 style55 style56 style77">
              <p><span class="style217 style94">
                <label>
                <?php
			  if ($row_kemaskiniteam['State_type']=="")
			  {?>
                <select name="State_type" id="State_type">
                  <option value="">Select State Type</option>
                  <option value="Central Funtion">Central Funtion</option>
                  <option value="Central">Central</option>
                  <option value="Southern">Southern</option>
                  <option value="Northern">Northern</option>
                  <option value="Eastern">Eastern</option>
                  <option value="Sabah">Sabah</option>
                  <option value="Sarawak" selected>Sarawak</option>
                </select>
                <?php
			  }
			  ?>
                <?php
			  if ($row_kemaskiniteam['State_type']=="Central Funtion")
			  {?>
                <select name="State_type" id="State_type">
                  <option value="Central Funtion">Central Funtion</option>
                  <option value="Central">Central</option>
                  <option value="Southern">Southern</option>
                  <option value="Northern">Northern</option>
                  <option value="Eastern">Eastern</option>
                  <option value="Sabah">Sabah</option>
                  <option value="Sarawak">Sarawak</option>
                </select>
                <?php
			  }
			  ?>
                <?php
			  if ($row_kemaskiniteam['State_type']=="Central")
			  {?>
                <select name="State_type" id="State_type">
                  <option value="Central">Central</option>
                  <option value="Central Funtion">Central Funtion</option>
                  <option value="Southern">Southern</option>
                  <option value="Northern">Northern</option>
                  <option value="Eastern">Eastern</option>
                  <option value="Sabah">Sabah</option>
                  <option value="Sarawak">Sarawak</option>
                </select>
                <?php
			  }
			  ?>
                <?php
			  if ($row_kemaskiniteam['State_type']=="Southern")
			  {?>
                <select name="State_type" id="State_type">
                  <option value="Southern">Southern</option>
                  <option value="Central Funtion">Central Funtion</option>
                  <option value="Central">Central</option>
                  <option value="Northern">Northern</option>
                  <option value="Eastern">Eastern</option>
                  <option value="Sabah">Sabah</option>
                  <option value="Sarawak">Sarawak</option>
                </select>
                <?php
			  }
			  ?>
                <br>
                <?php
			 if ($row_kemaskiniteam['State_type']=="Northern")
			  {?>
                <select name="State_type" id="State_type">
                  <option value="Northern">Northern</option>
                  <option value="Central Funtion">Central Funtion</option>
                  <option value="Central">Central</option>
                  <option value="Southern">Southern</option>
                  <option value="Eastern">Eastern</option>
                  <option value="Sabah">Sabah</option>
                  <option value="Sarawak">Sarawak</option>
                </select>
                <?php
			  }
			  ?>
                <?php
			 if ($row_kemaskiniteam['State_type']=="Eastern")
			  {?>
                <select name="State_type" id="State_type">
                  <option value="Eastern">Eastern</option>
                  <option value="Central Funtion">Central Funtion</option>
                  <option value="Central">Central</option>
                  <option value="Southern">Southern</option>
                  <option value="Northern">Northern</option>
                  <option value="Sabah">Sabah</option>
                  <option value="Sarawak">Sarawak</option>
                </select>
                <?php
			  }
			  ?>
                <?php
			  if ($row_kemaskiniteam['State_type']=="Sabah")
			  {?>
                <select name="State_type" id="State_type">
                  <option value="Sabah">Sabah</option>
                  <option value="Central Funtion">Central Funtion</option>
                  <option value="Central">Central</option>
                  <option value="Southern">Southern</option>
                  <option value="Northern">Northern</option>
                  <option value="Eastern">Eastern</option>
                  <option value="Sarawak">Sarawak</option>
                </select>
                <?php
			  }
			  ?>
                <?php
			  if ($row_kemaskiniteam['State_type']=="Sarawak")
			  {?>
                <select name="State_type" id="State_type">
                  <option value="Sarawak">Sarawak</option>
                  <option value="Central Funtion">Central Funtion</option>
                  <option value="Central">Central</option>
                  <option value="Southern">Southern</option>
                  <option value="Northern">Northern</option>
                  <option value="Eastern">Eastern</option>
                  <option value="Sabah">Sabah</option>
                </select>
                <?php
			  }
			  ?>
                </label>
              </span></p>
          </div></td>
        </tr>
        <tr valign="baseline">
          <td height="19" class="style80"><div align="left" class="style217 style142 style146 style14 style20 style52 style18 style55 style56">
              <p>State</p>
          </div></td>
          <td class="style80"><div align="left" class="style217 style80 style14 style20 style52 style18 style55 style56 style79">
              <p>:</p>
          </div></td>
          <td class="style80"><div align="left" class="style217 style14 style18 style55 style56 style80">
              <p>
                <label></label>
                <label>
				
				<?php
			  if ($row_kemaskiniteam['State']=="")
			  {?>
    
                  <select name="State" id="State">
                    <option>Select State</option>
                   <option value="Kuala Lumpur">Kuala Lumpur</option>
                  <option value="Selangor">Selangor</option>
                  <option value="Perak">Perak</option>
                  <option value="Kedah">Kedah</option>
                  <option value="Perlis">Perlis</option>
                  <option value="Pulau Pinang">Pulau Pinang</option>
                  <option value="Negeri Sembilan">Negeri Sembilan</option>
                  <option value="Melaka">Melaka</option>
                  <option value="Johor">Johor</option>
                  <option value="Pahang">Pahang</option>
                  <option value="Kelantan">Kelantan</option>
                  <option value="Terengganu">Terengganu</option>
                  <option value="Sabah">Sabah</option>
                  <option value="Sarawak">Sarawak</option>
				  W.P. Labuan
Cyberjaya

                </select>
                  </select>
                  </span>
                  <?php
			  }
			  ?>
			  
			  
			  <?php
			  if ($row_kemaskiniteam['State']=="Kuala Lumpur")
			  {?>
    
                  <select name="State" id="State">
				                     <option value="Kuala Lumpur">Kuala Lumpur</option>
                  <option value="Selangor">Selangor</option>
                  <option value="Perak">Perak</option>
                  <option value="Kedah">Kedah</option>
                  <option value="Perlis">Perlis</option>
                  <option value="Pulau Pinang">Pulau Pinang</option>
                  <option value="Negeri Sembilan">Negeri Sembilan</option>
                  <option value="Melaka">Melaka</option>
                  <option value="Johor">Johor</option>
                  <option value="Pahang">Pahang</option>
                  <option value="Kelantan">Kelantan</option>
                  <option value="Terengganu">Terengganu</option>
                  <option value="Sabah">Sabah</option>
                  <option value="Sarawak">Sarawak</option>
                </select>
                  </select>
                  </span>
                  <?php
			  }
			  ?>
			
			
			
				  <?php
			  if ($row_kemaskiniteam['State']=="Selangor")
			  {?>
    
                  <select name="State" id="State">
				                    <option value="Selangor">Selangor</option>
				                     <option value="Kuala Lumpur">Kuala Lumpur</option>

                  <option value="Perak">Perak</option>
                  <option value="Kedah">Kedah</option>
                  <option value="Perlis">Perlis</option>
                  <option value="Pulau Pinang">Pulau Pinang</option>
                  <option value="Negeri Sembilan">Negeri Sembilan</option>
                  <option value="Melaka">Melaka</option>
                  <option value="Johor">Johor</option>
                  <option value="Pahang">Pahang</option>
                  <option value="Kelantan">Kelantan</option>
                  <option value="Terengganu">Terengganu</option>
                  <option value="Sabah">Sabah</option>
                  <option value="Sarawak">Sarawak</option>
                </select>
                  </select>
                  </span>
                  <?php
			  }
			  ?>
			  
			  		  <?php
			  if ($row_kemaskiniteam['State']=="Perak")
			  {?>
    
                  <select name="State" id="State">
				        <option value="Perak">Perak</option>
				                    <option value="Selangor">Selangor</option>
				                     <option value="Kuala Lumpur">Kuala Lumpur</option>

            
                  <option value="Kedah">Kedah</option>
                  <option value="Perlis">Perlis</option>
                  <option value="Pulau Pinang">Pulau Pinang</option>
                  <option value="Negeri Sembilan">Negeri Sembilan</option>
                  <option value="Melaka">Melaka</option>
                  <option value="Johor">Johor</option>
                  <option value="Pahang">Pahang</option>
                  <option value="Kelantan">Kelantan</option>
                  <option value="Terengganu">Terengganu</option>
                  <option value="Sabah">Sabah</option>
                  <option value="Sarawak">Sarawak</option>
                </select>
                  </select>
                  </span>
                  <?php
			  }
			  ?>
			  
			  
			  		  <?php
			  if ($row_kemaskiniteam['State']=="Kedah")
			  {?>
    
                  <select name="State" id="State">
				                    <option value="Kedah">Kedah</option>
				                    <option value="Selangor">Selangor</option>
				                     <option value="Kuala Lumpur">Kuala Lumpur</option>

                  <option value="Perak">Perak</option>

                  <option value="Perlis">Perlis</option>
                  <option value="Pulau Pinang">Pulau Pinang</option>
                  <option value="Negeri Sembilan">Negeri Sembilan</option>
                  <option value="Melaka">Melaka</option>
                  <option value="Johor">Johor</option>
                  <option value="Pahang">Pahang</option>
                  <option value="Kelantan">Kelantan</option>
                  <option value="Terengganu">Terengganu</option>
                  <option value="Sabah">Sabah</option>
                  <option value="Sarawak">Sarawak</option>
                </select>
                  </select>
                  </span>
                  <?php
			  }
			  ?>
			  
			  
			  
			  		  <?php
			  if ($row_kemaskiniteam['State']=="Perlis")
			  {?>
    
                  <select name="State" id="State">
				                   <option value="Perlis">Perlis</option>
				                    <option value="Selangor">Selangor</option>
				                     <option value="Kuala Lumpur">Kuala Lumpur</option>

                  <option value="Perak">Perak</option>
                  <option value="Kedah">Kedah</option>
 
                  <option value="Pulau Pinang">Pulau Pinang</option>
                  <option value="Negeri Sembilan">Negeri Sembilan</option>
                  <option value="Melaka">Melaka</option>
                  <option value="Johor">Johor</option>
                  <option value="Pahang">Pahang</option>
                  <option value="Kelantan">Kelantan</option>
                  <option value="Terengganu">Terengganu</option>
                  <option value="Sabah">Sabah</option>
                  <option value="Sarawak">Sarawak</option>
                </select>
                  </select>
                  </span>
                  <?php
			  }
			  ?>
			  
			  
			  
			  		  <?php
			  if ($row_kemaskiniteam['State']=="Pulau Pinang")
			  {?>
    
                  <select name="State" id="State">
				                    <option value="Pulau Pinang">Pulau Pinang</option>
				                    <option value="Selangor">Selangor</option>
				                     <option value="Kuala Lumpur">Kuala Lumpur</option>

                  <option value="Perak">Perak</option>
                  <option value="Kedah">Kedah</option>
                  <option value="Perlis">Perlis</option>

                  <option value="Negeri Sembilan">Negeri Sembilan</option>
                  <option value="Melaka">Melaka</option>
                  <option value="Johor">Johor</option>
                  <option value="Pahang">Pahang</option>
                  <option value="Kelantan">Kelantan</option>
                  <option value="Terengganu">Terengganu</option>
                  <option value="Sabah">Sabah</option>
                  <option value="Sarawak">Sarawak</option>
                </select>
                  </select>
                  </span>
                  <?php
			  }
			  ?>
			  
			  
			  
			  
			  		  <?php
			  if ($row_kemaskiniteam['State']=="Negeri Sembilan")
			  {?>
    
                  <select name="State" id="State">
				                    <option value="Negeri Sembilan">Negeri Sembilan</option>
				                    <option value="Selangor">Selangor</option>
				                     <option value="Kuala Lumpur">Kuala Lumpur</option>

                  <option value="Perak">Perak</option>
                  <option value="Kedah">Kedah</option>
                  <option value="Perlis">Perlis</option>
                  <option value="Pulau Pinang">Pulau Pinang</option>

                  <option value="Melaka">Melaka</option>
                  <option value="Johor">Johor</option>
                  <option value="Pahang">Pahang</option>
                  <option value="Kelantan">Kelantan</option>
                  <option value="Terengganu">Terengganu</option>
                  <option value="Sabah">Sabah</option>
                  <option value="Sarawak">Sarawak</option>
                </select>
                  </select>
                  </span>
                  <?php
			  }
			  ?>
			  
			  
			  
			  
			  		  <?php
			  if ($row_kemaskiniteam['State']=="Melaka")
			  {?>
    
                  <select name="State" id="State">
				                    <option value="Melaka">Melaka</option>
				                    <option value="Selangor">Selangor</option>
				                     <option value="Kuala Lumpur">Kuala Lumpur</option>

                  <option value="Perak">Perak</option>
                  <option value="Kedah">Kedah</option>
                  <option value="Perlis">Perlis</option>
                  <option value="Pulau Pinang">Pulau Pinang</option>
                  <option value="Negeri Sembilan">Negeri Sembilan</option>

                  <option value="Johor">Johor</option>
                  <option value="Pahang">Pahang</option>
                  <option value="Kelantan">Kelantan</option>
                  <option value="Terengganu">Terengganu</option>
                  <option value="Sabah">Sabah</option>
                  <option value="Sarawak">Sarawak</option>
                </select>
                  </select>
                  </span>
                  <?php
			  }
			  ?>
			  
			  
			  
			  
			  		  <?php
			  if ($row_kemaskiniteam['State']=="Johor")
			  {?>
    
                  <select name="State" id="State">
				                    <option value="Johor">Johor</option>
				                    <option value="Selangor">Selangor</option>
				                     <option value="Kuala Lumpur">Kuala Lumpur</option>

                  <option value="Perak">Perak</option>
                  <option value="Kedah">Kedah</option>
                  <option value="Perlis">Perlis</option>
                  <option value="Pulau Pinang">Pulau Pinang</option>
                  <option value="Negeri Sembilan">Negeri Sembilan</option>
                  <option value="Melaka">Melaka</option>

                  <option value="Pahang">Pahang</option>
                  <option value="Kelantan">Kelantan</option>
                  <option value="Terengganu">Terengganu</option>
                  <option value="Sabah">Sabah</option>
                  <option value="Sarawak">Sarawak</option>
                </select>
                  </select>
                  </span>
                  <?php
			  }
			  ?>
			  
			  
			  
			  		  <?php
			  if ($row_kemaskiniteam['State']=="Pahang")
			  {?>
    
                  <select name="State" id="State">
				                    <option value="Pahang">Pahang</option>
				                    <option value="Selangor">Selangor</option>
				                     <option value="Kuala Lumpur">Kuala Lumpur</option>

                  <option value="Perak">Perak</option>
                  <option value="Kedah">Kedah</option>
                  <option value="Perlis">Perlis</option>
                  <option value="Pulau Pinang">Pulau Pinang</option>
                  <option value="Negeri Sembilan">Negeri Sembilan</option>
                  <option value="Melaka">Melaka</option>
                  <option value="Johor">Johor</option>

                  <option value="Kelantan">Kelantan</option>
                  <option value="Terengganu">Terengganu</option>
                  <option value="Sabah">Sabah</option>
                  <option value="Sarawak">Sarawak</option>
                </select>
                  </select>
                  </span>
                  <?php
			  }
			  ?>
			  
			  
			  
			  
			  
			  		  <?php
			  if ($row_kemaskiniteam['State']=="Kelantan")
			  {?>
    
                  <select name="State" id="State">
				                    <option value="Kelantan">Kelantan</option>
				                    <option value="Selangor">Selangor</option>
				                     <option value="Kuala Lumpur">Kuala Lumpur</option>

                  <option value="Perak">Perak</option>
                  <option value="Kedah">Kedah</option>
                  <option value="Perlis">Perlis</option>
                  <option value="Pulau Pinang">Pulau Pinang</option>
                  <option value="Negeri Sembilan">Negeri Sembilan</option>
                  <option value="Melaka">Melaka</option>
                  <option value="Johor">Johor</option>
                  <option value="Pahang">Pahang</option>

                  <option value="Terengganu">Terengganu</option>
                  <option value="Sabah">Sabah</option>
                  <option value="Sarawak">Sarawak</option>
                </select>
                  </select>
                  </span>
                  <?php
			  }
			  ?>
			  
			  
			  
			  
			  
			  		  <?php
			  if ($row_kemaskiniteam['State']=="Terengganu")
			  {?>
    
                  <select name="State" id="State">
				                    <option value="Terengganu">Terengganu</option>
				                    <option value="Selangor">Selangor</option>
				                     <option value="Kuala Lumpur">Kuala Lumpur</option>

                  <option value="Perak">Perak</option>
                  <option value="Kedah">Kedah</option>
                  <option value="Perlis">Perlis</option>
                  <option value="Pulau Pinang">Pulau Pinang</option>
                  <option value="Negeri Sembilan">Negeri Sembilan</option>
                  <option value="Melaka">Melaka</option>
                  <option value="Johor">Johor</option>
                  <option value="Pahang">Pahang</option>
                  <option value="Kelantan">Kelantan</option>

                  <option value="Sabah">Sabah</option>
                  <option value="Sarawak">Sarawak</option>
                </select>
                  </select>
                  </span>
                  <?php
			  }
			  ?>
			  
			  
			  
			  
			  
			  		  <?php
			  if ($row_kemaskiniteam['State']=="Sabah")
			  {?>
    
                  <select name="State" id="State">
				                    <option value="Sabah">Sabah</option>
				                    <option value="Selangor">Selangor</option>
				                     <option value="Kuala Lumpur">Kuala Lumpur</option>

                  <option value="Perak">Perak</option>
                  <option value="Kedah">Kedah</option>
                  <option value="Perlis">Perlis</option>
                  <option value="Pulau Pinang">Pulau Pinang</option>
                  <option value="Negeri Sembilan">Negeri Sembilan</option>
                  <option value="Melaka">Melaka</option>
                  <option value="Johor">Johor</option>
                  <option value="Pahang">Pahang</option>
                  <option value="Kelantan">Kelantan</option>
                  <option value="Terengganu">Terengganu</option>

                  <option value="Sarawak">Sarawak</option>
                </select>
                  </select>
                  </span>
                  <?php
			  }
			  ?>
			  
			  
			  
			  	  <?php
			  if ($row_kemaskiniteam['State']=="Sarawak")
			  {?>
    
                  <select name="State" id="State">
				                                    <option value="Sarawak">Sarawak</option>
				                    <option value="Selangor">Selangor</option>
				                     <option value="Kuala Lumpur">Kuala Lumpur</option>

                  <option value="Perak">Perak</option>
                  <option value="Kedah">Kedah</option>
                  <option value="Perlis">Perlis</option>
                  <option value="Pulau Pinang">Pulau Pinang</option>
                  <option value="Negeri Sembilan">Negeri Sembilan</option>
                  <option value="Melaka">Melaka</option>
                  <option value="Johor">Johor</option>
                  <option value="Pahang">Pahang</option>
                  <option value="Kelantan">Kelantan</option>
                  <option value="Terengganu">Terengganu</option>
                </select>
                  </select>
                  </span>
                  <?php
			  }
			  ?>
                </label>
              </p>
          </div></td>
        </tr>
        <tr valign="baseline">
          <td height="19" class="style80"><div align="left" class="style217 style142 style144 style14 style20 style52 style18 style55 style56">
              <p>Zone</p>
          </div></td>
          <td class="style80"><div align="left" class="style217 style80 style14 style20 style52 style18 style55 style56 style74">
              <p>:</p>
          </div></td>
          <td class="style80"><div align="left" class="style72 style217 style80 style14 style55"><strong>
              <label><strong><strong><strong>
              <?php
			  if ($row_kemaskiniteam['Zone']=="")
			  {?>
              <select name="Zone" id="Zone">
                <option value="">Select Zone</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <strong><strong><strong><strong>
              <?php
			  }
			  ?>
              </strong></strong></strong></strong>
              <?php
			  if ($row_kemaskiniteam['Zone']=="ALS (JLT)")
			  {?>
              <select name="Zone" id="Zone">
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="ASTRO")
			  {?>
              <select name="Zone" id="Zone">
                <option value="ASTRO">ASTRO</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="ATSC")
			  {?>
              <select name="Zone" id="Zone">
                <option value="ATSC">ATSC</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="AWANA")
			  {?>
              <select name="Zone" id="Zone">
                <option value="AWANA">AWANA</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="BCCN")
			  {?>
              <select name="Zone" id="Zone">
                <option value="BCCN">BCCN</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="BCE")
			  {?>
              <select name="Zone" id="Zone">
                <option value="BCE">BCE</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="BFM")
			  {?>
              <select name="Zone" id="Zone">
                <option value="BFM">BFM</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="BGS")
			  {?>
              <select name="Zone" id="Zone">
                <option value="BGS">BGS</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="BGU")
			  {?>
              <select name="Zone" id="Zone">
                <option value="BGU">BGU</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="BINDAH")
			  {?>
              <select name="Zone" id="Zone">
                <option value="BINDAH">BINDAH</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="BJN")
			  {?>
              <select name="Zone" id="Zone">
                <option value="BJN">BJN</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="BKD")
			  {?>
              <select name="Zone" id="Zone">
                <option value="BKD">BKD</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="BKLG")
			  {?>
              <select name="Zone" id="Zone">
                <option value="BKLG">BKLG</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="BMTI")
			  {?>
              <select name="Zone" id="Zone">
                <option value="BMTI">BMTI</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="BSA")
			  {?>
              <select name="Zone" id="Zone">
                <option value="BSA">BSA</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="BSB")
			  {?>
              <select name="Zone" id="Zone">
                <option value="BSB">BSB</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="BTD")
			  {?>
              <select name="Zone" id="Zone">
                <option value="BTD">BTD</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="BTEMPIAS")
			  {?>
              <select name="Zone" id="Zone">
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="BTGL")
			  {?>
              <select name="Zone" id="Zone">
                <option value="BTGL">BTGL</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="CBJ TOWER")
			  {?>
              <select name="Zone" id="Zone">
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="Celcom Jeram")
			  {?>
              <select name="Zone" id="Zone">
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="CELCOM SG BUAYA")
			  {?>
              <select name="Zone" id="Zone">
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="CELCOM SG CHOH")
			  {?>
              <select name="Zone" id="Zone">
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="DIGI SG BAKAU")
			  {?>
              <select name="Zone" id="Zone">
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="KENNY RISE")
			  {?>
              <select name="Zone" id="Zone">
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="KL TOWER")
			  {?>
              <select name="Zone" id="Zone">
                <option value="KL TOWER">KL TOWER</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="KLG1")
			  {?>
              <select name="Zone" id="Zone">
                <option value="KLG1">KLG1</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="KLG2")
			  {?>
              <select name="Zone" id="Zone">
                <option value="KLG2">KLG2</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="KOG FCN")
			  {?>
              <select name="Zone" id="Zone">
                <option value="KOG FCN">KOG FCN</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="KSM")
			  {?>
              <select name="Zone" id="Zone">
                <option value="KSM">KSM</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="NTV7")
			  {?>
              <select name="Zone" id="Zone">
                <option value="NTV7">NTV7</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="PEJ DAERAH KS")
			  {?>
              <select name="Zone" id="Zone">
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="PEJ DAERAH SBR")
			  {?>
              <select name="Zone" id="Zone">
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="PHILEO")
			  {?>
              <select name="Zone" id="Zone">
                <option value="PHILEO">PHILEO</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="RCG")
			  {?>
              <select name="Zone" id="Zone">
                <option value="RCG">RCG</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="RTM KJ")
			  {?>
              <select name="Zone" id="Zone">
                <option value="RTM KJ">RTM KJ</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="SBA")
			  {?>
              <select name="Zone" id="Zone">
                <option value="SBA">SBA</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="SBS CORP")
			  {?>
              <select name="Zone" id="Zone">
                <option value="SBS CORP">SBS CORP</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="TROPICANA")
			  {?>
              <select name="Zone" id="Zone">
                <option value="TROPICANA">TROPICANA</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="TV3")
			  {?>
              <select name="Zone" id="Zone">
                <option value="TV3">TV3</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="ULU KALI")
			  {?>
              <select name="Zone" id="Zone">
                <option value="ULU KALI">ULU KALI</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="BANGI")
			  {?>
              <select name="Zone" id="Zone">
                <option value="BANGI">BANGI</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="BANGSAR")
			  {?>
              <select name="Zone" id="Zone">
                <option value="BANGSAR">BANGSAR</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="BUKIT ANGGERIK")
			  {?>
              <select name="Zone" id="Zone">
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="BUKIT RAJA/ KS")
			  {?>
              <select name="Zone" id="Zone">
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="CYBERJAYA")
			  {?>
              <select name="Zone" id="Zone">
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="GOMBAK")
			  {?>
              <select name="Zone" id="Zone">
                <option value="GOMBAK"> GOMBAK</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="KEPONG/ BATU")
			  {?>
              <select name="Zone" id="Zone">
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="KERAMAT")
			  {?>
              <select name="Zone" id="Zone">
                <option value="KERAMAT"> KERAMAT</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="KLANG")
			  {?>
              <select name="Zone" id="Zone">
                <option value="KLANG"> KLANG</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="MALURI")
			  {?>
              <select name="Zone" id="Zone">
                <option value="MALURI"> MALURI</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="PUCHONG")
			  {?>
              <select name="Zone" id="Zone">
                <option value="PUCHONG"> PUCHONG</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="RAWANG")
			  {?>
              <select name="Zone" id="Zone">
                <option value="RAWANG"> RAWANG</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="SHAH ALAM/ BANTING")
			  {?>
              <select name="Zone" id="Zone">
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="SUBANG JAYA")
			  {?>
              <select name="Zone" id="Zone">
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="TAMAN PETALING")
			  {?>
              <select name="Zone" id="Zone">
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="TAR")
			  {?>
              <select name="Zone" id="Zone">
                <option value="TAR"> TAR</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="TDI")
			  {?>
              <select name="Zone" id="Zone">
                <option value="TDI"> TDI</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="DUNGUN/ CHUKAI")
			  {?>
              <select name="Zone" id="Zone">
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="JERTIH")
			  {?>
              <select name="Zone" id="Zone">
                <option value="JERTIH"> JERTIH</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="KOTA BAHRU")
			  {?>
              <select name="Zone" id="Zone">
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="KUALA TERENGGANU")
			  {?>
              <select name="Zone" id="Zone">
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="MACHANG/ GUA MUSANG")
			  {?>
              <select name="Zone" id="Zone">
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="MARAN/ TEMERLOH")
			  {?>
              <select name="Zone" id="Zone">
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="MARAN/ TEMERLOH")
			  {?>
              <select name="Zone" id="Zone">
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="PASIR MAS")
			  {?>
              <select name="Zone" id="Zone">
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="RAUB")
			  {?>
              <select name="Zone" id="Zone">
                <option value="RAUB"> RAUB</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="TERUNTUM/ PE")
			  {?>
              <select name="Zone" id="Zone">
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="AIR ITAM")
			  {?>
              <select name="Zone" id="Zone">
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="ALOR SETAR")
			  {?>
              <select name="Zone" id="Zone">
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="BATU GAJAH")
			  {?>
              <select name="Zone" id="Zone">
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="BAYAN BARU")
			  {?>
              <select name="Zone" id="Zone">
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="BUKIT MERTAJAM")
			  {?>
              <select name="Zone" id="Zone">
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="BUTTERWORTH")
			  {?>
              <select name="Zone" id="Zone">
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="IPOH")
			  {?>
              <select name="Zone" id="Zone">
                <option value="IPOH"> IPOH</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="JITRA")
			  {?>
              <select name="Zone" id="Zone">
                <option value="JITRA"> JITRA</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>


                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="KUALA KANGSAR")
			  {?>
              <select name="Zone" id="Zone">
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="KULIM")
			  {?>
              <select name="Zone" id="Zone">
                <option value="KULIM"> KULIM</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="LANGKAWI")
			  {?>
              <select name="Zone" id="Zone">
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="PARIT BUNTAR")
			  {?>
              <select name="Zone" id="Zone">
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>

                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="PENANG CENTRAL")
			  {?>
              <select name="Zone" id="Zone">
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="PERLIS")
			  {?>
              <select name="Zone" id="Zone">
                <option value="PERLIS"> PERLIS</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="SEBERANG JAYA")
			  {?>
              <select name="Zone" id="Zone">
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="SETIAWAN")
			  {?>
              <select name="Zone" id="Zone">
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="SG PETANI")
			  {?>
              <select name="Zone" id="Zone">
                <option value="SG PETANI"> SG PETANI</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="TAIPING")
			  {?>
              <select name="Zone" id="Zone">
                <option value="TAIPING"> TAIPING</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="TAPAH")
			  {?>
              <select name="Zone" id="Zone">
                <option value="TAPAH"> TAPAH</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="TASEK")
			  {?>
              <select name="Zone" id="Zone">
                <option value="TASEK"> TASEK</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>

                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="TELUK INTAN")
			  {?>
              <select name="Zone" id="Zone">
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="KK")
			  {?>
              <select name="Zone" id="Zone">
                <option value="KK"> KK</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="LABUAN")
			  {?>
              <select name="Zone" id="Zone">
                <option value="LABUAN"> LABUAN</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="LAHAD DATU")
			  {?>
              <select name="Zone" id="Zone">
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="PBP SELATAN")
			  {?>
              <select name="Zone" id="Zone">
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="PBP UTARA")
			  {?>
              <select name="Zone" id="Zone">
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="SANDAKAN")
			  {?>
              <select name="Zone" id="Zone">
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="TAWAU")
			  {?>
              <select name="Zone" id="Zone">
                <option value="TAWAU"> TAWAU</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="BINTULU")
			  {?>
              <select name="Zone" id="Zone">
                <option value="BINTULU"> BINTULU</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="KUCHING")
			  {?>
              <select name="Zone" id="Zone">
                <option value="KUCHING"> KUCHING</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="MIRI")
			  {?>
              <select name="Zone" id="Zone">
                <option value="MIRI"> MIRI</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="SIBU")
			  {?>
              <select name="Zone" id="Zone">
                <option value="SIBU"> SIBU</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="SRI AMAN")
			  {?>
              <select name="Zone" id="Zone">
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="STAMPIN")
			  {?>
              <select name="Zone" id="Zone">
                <option value="STAMPIN"> STAMPIN</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="Batu Pahat")
			  {?>
              <select name="Zone" id="Zone">

                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="Kluang/Mersing")
			  {?>
              <select name="Zone" id="Zone">
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="Kota Tinggi")
			  {?>
              <select name="Zone" id="Zone">
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>

                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="Melaka Selatan")
			  {?>
              <select name="Zone" id="Zone">
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="Melaka Utara")
			  {?>
              <select name="Zone" id="Zone">
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="Muar")
			  {?>
              <select name="Zone" id="Zone">
                <option value="Muar"> Muar</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="NS Selatan")
			  {?>
              <select name="Zone" id="Zone">
                <option value="NS Selatan"> NS Selatan</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="NS Timur")
			  {?>
              <select name="Zone" id="Zone">
                <option value="NS Timur"> NS Timur</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="NS Utara")
			  {?>
              <select name="Zone" id="Zone">
                <option value="NS Utara"> NS Utara</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="Nusajaya & Pontian")
			  {?>
              <select name="Zone" id="Zone">
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="Pandan")
			  {?>
              <select name="Zone" id="Zone">
                <option value="Pandan"> Pandan</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="Pelangi")
			  {?>
              <select name="Zone" id="Zone">
                <option value="Pelangi"> Pelangi</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="Segamat")
			  {?>
              <select name="Zone" id="Zone">
                <option value="Segamat"> Segamat</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="Senai & Kulai")
			  {?>
              <select name="Zone" id="Zone">
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="Skudai")
			  {?>
              <select name="Zone" id="Zone">
                <option value="Skudai"> Skudai</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
              <?php
			  }
			  ?>
              <?php
			  if ($row_kemaskiniteam['Zone']=="Tampoi")
			  {?>
              <select name="Zone" id="Zone">
                <option value="Tampoi"> Tampoi</option>
                <option value="ALS (JLT)">ALS (JLT)</option>
                <option value="ASTRO">ASTRO</option>
                <option value="ATSC">ATSC</option>
                <option value="AWANA">AWANA</option>
                <option value="BCCN">BCCN</option>
                <option value="BCE">BCE</option>
                <option value="BFM">BFM</option>
                <option value="BGS">BGS</option>
                <option value="BGU">BGU</option>
                <option value="BINDAH">BINDAH</option>
                <option value="BJN">BJN</option>
                <option value="BKD">BKD</option>
                <option value="BKLG">BKLG</option>
                <option value="BMTI">BMTI</option>
                <option value="BSA">BSA</option>
                <option value="BSB">BSB</option>
                <option value="BTD">BTD</option>
                <option value="BTEMPIAS">BTEMPIAS</option>
                <option value="BTGL">BTGL</option>
                <option value="CBJ TOWER">CBJ TOWER</option>
                <option value="Celcom Jeram">Celcom Jeram</option>
                <option value="CELCOM SG BUAYA">CELCOM SG BUAYA</option>
                <option value="CELCOM SG CHOH">CELCOM SG CHOH</option>
                <option value="DIGI SG BAKAU">DIGI SG BAKAU</option>
                <option value="KENNY RISE">KENNY RISE</option>
                <option value="KL TOWER">KL TOWER</option>
                <option value="KLG1">KLG1</option>
                <option value="KLG2">KLG2</option>
                <option value="KOG FCN">KOG FCN</option>
                <option value="KSM">KSM</option>
                <option value="NTV7">NTV7</option>
                <option value="PEJ DAERAH KS">PEJ DAERAH KS</option>
                <option value="PEJ DAERAH SBR">PEJ DAERAH SBR</option>
                <option value="PHILEO">PHILEO</option>
                <option value="RCG">RCG</option>
                <option value="RTM KJ">RTM KJ</option>
                <option value="SBA">SBA</option>
                <option value="SBS CORP">SBS CORP</option>
                <option value="TROPICANA">TROPICANA</option>
                <option value="TV3">TV3</option>
                <option value="ULU KALI">ULU KALI</option>
                <option value="BANGI"> BANGI</option>
                <option value="BANGSAR"> BANGSAR</option>
                <option value="BUKIT ANGGERIK"> BUKIT ANGGERIK</option>
                <option value="BUKIT RAJA/ KS"> BUKIT RAJA/ KS</option>
                <option value="CYBERJAYA"> CYBERJAYA</option>
                <option value="GOMBAK"> GOMBAK</option>
                <option value="KEPONG/ BATU"> KEPONG/ BATU</option>
                <option value="KERAMAT"> KERAMAT</option>
                <option value="KLANG"> KLANG</option>
                <option value="MALURI"> MALURI</option>
                <option value="PUCHONG"> PUCHONG</option>
                <option value="RAWANG"> RAWANG</option>
                <option value="SHAH ALAM/ BANTING"> SHAH ALAM/ BANTING</option>
                <option value="SUBANG JAYA"> SUBANG JAYA</option>
                <option value="TAMAN PETALING"> TAMAN PETALING</option>
                <option value="TAR"> TAR</option>
                <option value="TDI"> TDI</option>
                <option value="DUNGUN/ CHUKAI"> DUNGUN/ CHUKAI</option>
                <option value="JERTIH"> JERTIH</option>
                <option value="KOTA BAHRU"> KOTA BAHRU</option>
                <option value="KUALA TERENGGANU"> KUALA TERENGGANU</option>
                <option value="MACHANG/ GUA MUSANG"> MACHANG/ GUA MUSANG</option>
                <option value="MARAN/ TEMERLOH"> MARAN/ TEMERLOH</option>
                <option value="PASIR MAS "> PASIR MAS </option>
                <option value="RAUB"> RAUB</option>
                <option value="TERUNTUM/ PE"> TERUNTUM/ PE</option>
                <option value="AIR ITAM"> AIR ITAM</option>
                <option value="ALOR SETAR"> ALOR SETAR</option>
                <option value="BATU GAJAH"> BATU GAJAH</option>
                <option value="BAYAN BARU"> BAYAN BARU</option>
                <option value="BUKIT MERTAJAM"> BUKIT MERTAJAM</option>
                <option value="BUTTERWORTH"> BUTTERWORTH</option>
                <option value="IPOH"> IPOH</option>
                <option value="JITRA"> JITRA</option>
                <option value="KUALA KANGSAR"> KUALA KANGSAR</option>
                <option value="KULIM"> KULIM</option>
                <option value="LANGKAWI"> LANGKAWI</option>
                <option value="PARIT BUNTAR"> PARIT BUNTAR</option>
                <option value="PENANG CENTRAL"> PENANG CENTRAL</option>
                <option value="PERLIS"> PERLIS</option>
                <option value="SEBERANG JAYA"> SEBERANG JAYA</option>
                <option value="SETIAWAN"> SETIAWAN</option>
                <option value="SG PETANI"> SG PETANI</option>
                <option value="TAIPING"> TAIPING</option>
                <option value="TAPAH"> TAPAH</option>
                <option value="TASEK"> TASEK</option>
                <option value="TELUK INTAN"> TELUK INTAN</option>
                <option value="KK"> KK</option>
                <option value="LABUAN"> LABUAN</option>
                <option value="LAHAD DATU"> LAHAD DATU</option>
                <option value="PBP SELATAN"> PBP SELATAN</option>
                <option value="PBP UTARA"> PBP UTARA</option>
                <option value="SANDAKAN"> SANDAKAN</option>
                <option value="TAWAU"> TAWAU</option>
                <option value="BINTULU"> BINTULU</option>
                <option value="KUCHING"> KUCHING</option>
                <option value="MIRI"> MIRI</option>
                <option value="SIBU"> SIBU</option>
                <option value="SRI AMAN"> SRI AMAN</option>
                <option value="STAMPIN"> STAMPIN</option>
                <option value="Batu Pahat"> Batu Pahat</option>
                <option value="Kluang/Mersing"> Kluang/Mersing</option>
                <option value="Kota Tinggi"> Kota Tinggi</option>
                <option value="Melaka Selatan"> Melaka Selatan</option>
                <option value="Melaka Utara"> Melaka Utara</option>
                <option value="Muar"> Muar</option>
                <option value="NS Selatan"> NS Selatan</option>
                <option value="NS Timur"> NS Timur</option>
                <option value="NS Utara"> NS Utara</option>
                <option value="Nusajaya & Pontian"> Nusajaya & Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai & Kulai"> Senai & Kulai</option>
                <option value="Skudai"> Skudai</option>
              </select>
              <?php
			  }
			  ?>
              </select>
              </strong></strong></strong></label>
          </strong></div></td>
        </tr>
          <td colspan="3" height="20"><p class="style71"><span class="style55">______________________________________________________________________________________________________<br>
          </span><br>
            Safety Equipment (SE) /Work Equipment (WE) : <span class="style112">* The fill is compalsory </span></p>
              <table width="904" border="1" align="center" cellspacing="0">
              <tr>
                <td width="20" valign="baseline" class="style55 style72"><strong>1) </strong></td>
                <td width="187" valign="baseline" class="style72 style56"><div align="left" class="style217 style80 style55 style52 ">
                    <p><span class="style217"><strong>
                      <label></label>
                                        </strong></span> Safety Helmet</p>
                </div></td>
                <td width="6" class="style83">:</td>
                <td width="152" class="style83"><?php
			  if ($row_kemaskiniteam['Safety_Helmet']=="")
			  {?>
                  <span class="style98">
                  <select name="Safety_Helmet" id="Safety_Helmet">
                   <option value="">Select</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                  </select>
                  </span>
                  <?php
			  }
			  ?>
                  <?php
			  if ($row_kemaskiniteam['Safety_Helmet']=="Yes")
			  {?>
                  <select name="Safety_Helmet" id="Safety_Helmet">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
					 <option value="Not Aplicable">Not Aplicable</option>
                  </select>
                  <?php
			  }
			  ?>
			  
			  
			      <?php
			  if ($row_kemaskiniteam['Safety_Helmet']=="No")
			  {?>
                  <select name="Safety_Helmet" id="Safety_Helmet">
                      <option value="No">No</option>
					   <option value="Yes">Yes</option>
					   <option value="Not Aplicable">Not Aplicable</option>
                  </select>
                <?php
			  }
			  ?>
			  
			  
                  <?php
			  if ($row_kemaskiniteam['Safety_Helmet']=="Not Aplicable")
			  {?>
                  <select name="Safety_Helmet" id="Safety_Helmet">
                      <option value="No">No</option>
					   <option value="Yes">Yes</option>
					   <option value="Not Aplicable">Not Aplicable</option>
                  </select>
                <?php
			  }
			  ?></td>
                <td width="6" class="style83">&nbsp;</td>
                <td width="219" class="style83"><label for="label">Year Received Safety Helmet</label></td>
                <td width="6" class="style83">:</td>
                <td width="274" class="style83"><input name="Year_Received_Safety_Helmet" id="datepicker" type="text" value="<?php echo htmlentities($row_kemaskiniteam['Year_Received_Safety_Helmet'], ENT_COMPAT, 'utf-8'); ?>" size="6"> 
                  <span class="style113">* if No , blank in the field </span>
                  <div>
                    <div></div>
                  </div>                  </td>
              </tr>
              <tr>
                <td valign="baseline" class="style55 style72"><strong>2)</strong></td>
                <td valign="baseline" class="style72 style83"><div align="left" class="style217 style80 style55 style52 ">
                    <p><span class="style217"><strong>
                      <label></label>
                                          </strong></span> Safety Vest
                      <label for="label"></label>
                    </p>
                </div></td>
                <td class="style86">:</td>
                <td class="style86"><?php
			  if ($row_kemaskiniteam['Safety_Vest']=="")
			  {?>
                  <select name="Safety_Vest" id="Safety_Vest">
                 <option value="">Select</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
					 <option value="Not Aplicable">Not Aplicable</option>
                  </select>
                  <?php
			  }
			  ?>
                  <?php
			  if ($row_kemaskiniteam['Safety_Vest']=="Yes")
			  {?>
                  <select name="Safety_Vest" id="Safety_Vest">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
					 <option value="Not Aplicable">Not Aplicable</option>
                  </select>
                  <?php
			  }
			  ?>
                  <?php
			  if ($row_kemaskiniteam['Safety_Vest']=="No")
			  {?>
                  <select name="Safety_Vest" id="Safety_Vest">
                    <option value="No">No</option>
                    <option value="Yes">Yes</option>
                    <option value="Not Aplicable">Not Aplicable</option>
                  </select>
                  <?php
			  }
			  ?>
			   <?php
			  if ($row_kemaskiniteam['Safety_Vest']=="Not Aplicable")
			  {?>
                 <select name="Safety_Vest" id="Safety_Vest">
				   <option value="Not Aplicable">Not Aplicable</option>
                      <option value="No">No</option>
					   <option value="Yes">Yes</option>
                  </select>
                <?php
			  }
			  ?>
			  
			  </td>
                <td class="style86">&nbsp;</td>
                <td class="style86"><label for="label">Year Received Safety Vest</label></td>
                <td class="style86">:</td>
                <td class="style86"><input name="Year_Received_Safety_Vest" id="datepicker1" type="text" value="<?php echo htmlentities($row_kemaskiniteam['Year_Received_Safety_Vest'], ENT_COMPAT, 'utf-8'); ?>" size="6">
                <label><span class="style113">* if No , blank in the field </span></label></td>
              </tr>
              <tr>
                <td valign="baseline" class="style55 style72"><strong>3)</strong></td>
                <td valign="baseline" class="style72 style83"><div align="left" class="style217 style80 style55 style52 ">
                    <p><span class="style217"><strong>
                      <label></label>
                      </strong></span>Full Body Harnes (FBH)</p>
                </div></td>
                <td class="style86">:</td>
                <td class="style86"><?php
			  if ($row_kemaskiniteam['Full_Body_Harness']=="")
			  {?>
                  <select name="Full_Body_Harness" id="Full_Body_Harness">
                 <option value="">Select</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
					 <option value="Not Aplicable">Not Aplicable</option>
                  </select>
                  <?php
			  }
			  ?>
                  <?php
			  if ($row_kemaskiniteam['Full_Body_Harness']=="Yes")
			  {?>
                  <select name="Full_Body_Harness" id="Full_Body_Harness">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
					 <option value="Not Aplicable">Not Aplicable</option>
                  </select>
                  <?php
			  }
			  ?>
                  <?php
			  if ($row_kemaskiniteam['Full_Body_Harness']=="No")
			  {?>
                  <select name="Full_Body_Harness" id="Full_Body_Harness">
                    <option value="No">No</option>
                    <option value="Yes">Yes</option>
                    <option value="Not Aplicable">Not Aplicable</option>
                  </select>
                  <?php
			  }
			  ?>
			   <?php
			  if ($row_kemaskiniteam['Full_Body_Harness']=="Not Aplicable")
			  {?>
                 <select name="Full_Body_Harness" id="Full_Body_Harness">
				   <option value="Not Aplicable">Not Aplicable</option>
                      <option value="No">No</option>
					   <option value="Yes">Yes</option>
                  </select>
                <?php
			  }
			  ?>
			  
			  
			  </td>
                <td class="style86">&nbsp;</td>
                <td class="style86"><label for="label">Year Received FBH </label></td>
                <td class="style86">:</td>
                <td class="style86"><input name="Year_Received_FBH" id="datepicker2" type="text" value="<?php echo htmlentities($row_kemaskiniteam['Year_Received_FBH'], ENT_COMPAT, 'utf-8'); ?>" size="6">
                <span class="style113">* if No , blank in the field </span></td>
              </tr>

              <tr>
                <td valign="baseline" class="style55 style72">&nbsp;</td>
                <td valign="baseline" class="style72 style86"><div align="right"><strong>FBH Serial Number </strong></div></td>
                <td class="style98">:</td>
                <td class="style98"><input name="sn_fbh" type="text" id="sn_fbh" value="<?php echo htmlentities($row_kemaskiniteam['sn_fbh'], ENT_COMPAT, 'utf-8'); ?>" size="12"></td>
                <td class="style98">&nbsp;</td>
                <td class="style98">&nbsp;</td>
                <td class="style98">&nbsp;</td>
                <td class="style98">&nbsp;</td>
              </tr>
              <tr>
                <td valign="baseline" class="style55 style72"><strong>4)</strong></td>
                <td valign="baseline" class="style72 style98"><div align="left" class="style217 style80 style55 style52 ">
                    <p><span class="style217"><strong>
                      <label></label>
                                          </strong></span> FBH Trained
                      <label for="label"></label>
                    </p>
                </div></td>
                <td class="style98">:</td>
                <td class="style98"><?php
			  if ($row_kemaskiniteam['FBH_Trained']=="")
			  {?>
                  <select name="FBH_Trained" id="FBH_Trained">
                    <option value="">Select</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
					  <option value="Not Aplicable">Not Aplicable</option>
                  </select>
                  <?php
			  }
			  ?>
                  <?php
			  if ($row_kemaskiniteam['FBH_Trained']=="Yes")
			  {?>
                  <select name="FBH_Trained" id="FBH_Trained">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
					  <option value="Not Aplicable">Not Aplicable</option>
                  </select>
                  <?php
			  }
			  ?>
                  <?php
			  if ($row_kemaskiniteam['FBH_Trained']=="No")
			  {?>
                  <select name="FBH_Trained" id="FBH_Trained">
                    <option value="No">No</option>
                    <option value="Yes">Yes</option>
                    <option value="Not Aplicable">Not Aplicable</option>
                  </select>
                  <?php
			  }
			  ?>
			    <?php
			  if ($row_kemaskiniteam['FBH_Trained']=="Not Aplicable")
			  {?>
                 <select name="FBH_Trained" id="FBH_Trained">
				   <option value="Not Aplicable">Not Aplicable</option>
                      <option value="No">No</option>
					   <option value="Yes">Yes</option>
                  </select>
                <?php
			  }
			  ?></td>
                <td class="style98">&nbsp;</td>
                <td class="style98"><label for="label">Year Trained FBH</label></td>
                <td class="style98">:</td>
                <td class="style98"><input name="Year_Trained_FBH" id="datepicker3" type="text" value="<?php echo htmlentities($row_kemaskiniteam['Year_Trained_FBH'], ENT_COMPAT, 'utf-8'); ?>" size="6">
                <span class="style113">* if No , blank in the field </span></td>
              </tr>
              <tr>
                <td valign="baseline" class="style55 style72"><strong>5)</strong></td>
                <td valign="baseline" class="style72 style98"><div align="left" class="style217 style80 style55 style52 ">
                    <p><span class="style217 ">
                      <label></label>
                    </span>Ladder</p>
                </div></td>
                <td class="style98">:</td>
                <td class="style98"><?php
			  if ($row_kemaskiniteam['Ladder']=="")
			  {?>
                  <select name="Ladder" id="Ladder">
                  <option value="">Select</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
					    <option value="Not Aplicable">Not Aplicable</option>
                  </select>
                  <?php
			  }
			  ?>
                  <?php
			  if ($row_kemaskiniteam['Ladder']=="Yes")
			  {?>
                  <select name="Ladder" id="Ladder">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
					    <option value="Not Aplicable">Not Aplicable</option>
                  </select>
                  <?php
			  }
			  ?>
                  <?php
			  if ($row_kemaskiniteam['Ladder']=="No")
			  {?>
                  <select name="Ladder" id="Ladder">
                    <option value="No">No</option>
                    <option value="Yes">Yes</option>
                    <option value="Not Aplicable">Not Aplicable</option>
                  </select>
                  <?php
			  }
			  ?>
			  
			  	    <?php
			  if ($row_kemaskiniteam['Ladder']=="Not Aplicable")
			  {?>
                 <select name="Ladder" id="Ladder">
				   <option value="Not Aplicable">Not Aplicable</option>
                      <option value="No">No</option>
					   <option value="Yes">Yes</option>
                  </select>
                <?php
			  }
			  ?>
			  
			  </td>
                <td class="style98">&nbsp;</td>
                <td class="style98">Year Received Ladder </td>
                <td class="style98">:</td>
                <td class="style98"><input name="Year_Received_Ladder" id="datepicker4" type="text" value="<?php echo htmlentities($row_kemaskiniteam['Year_Received_Ladder'], ENT_COMPAT, 'utf-8'); ?>" size="6">
                <span class="style113">* if No , blank in the field </span></td>
              </tr>
              <tr>
                <td valign="baseline" class="style55 style72"><strong>6)</strong></td>
                <td valign="baseline" class="style72 style95"><div align="left" class="style217 style80 style55 style52 ">
                    <p><span class="style217 ">
                      <label></label>
                    </span> Safety shoe </p>
                </div></td>
                <td class="style98">:</td>
                <td class="style98"><?php
			  if ($row_kemaskiniteam['Safety_Shoe']=="")
			  {?>
                  <select name="Safety_Shoe" id="Safety_Shoe">
                 <option value="">Select</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
					   <option value="Not Aplicable">Not Aplicable</option>
                  </select>
                  <?php
			  }
			  ?>
                  <?php
			  if ($row_kemaskiniteam['Safety_Shoe']=="Yes")
			  {?>
                  <select name="Safety_Shoe" id="Safety_Shoe">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
					   <option value="Not Aplicable">Not Aplicable</option>
                  </select>
                  <?php
			  }
			  ?>
                  <?php
			  if ($row_kemaskiniteam['Safety_Shoe']=="No")
			  {?>
                  <select name="Safety_Shoe" id="Safety_Shoe">
                    <option value="No">No</option>
                    <option value="Yes">Yes</option>
                    <option value="Not Aplicable">Not Aplicable</option>
                  </select>
                  <?php
			  }
			  ?>
			  	    <?php
			  if ($row_kemaskiniteam['Safety_Shoe']=="Not Aplicable")
			  {?>
                 <select name="Ladder" id="Ladder">
				   <option value="Not Aplicable">Not Aplicable</option>
                      <option value="No">No</option>
					   <option value="Yes">Yes</option>
                  </select>
                <?php
			  }
			  ?></td>
                <td class="style98">&nbsp;</td>
                <td class="style98">Year Received Safety Shoe </td>
                <td class="style98">:</td>
                <td class="style98"><input name="Year_Received_Safety_Shoe" id="datepicker5" type="text" value="<?php echo htmlentities($row_kemaskiniteam['Year_Received_Safety_Shoe'], ENT_COMPAT, 'utf-8'); ?>" size="6">
                <span class="style113">* if No , blank in the field </span></td>
              </tr>
              <tr>
                <td valign="baseline" class="style55 style72">&nbsp;</td>
                <td valign="baseline" class="style72 style95"><div align="right"><strong>Shoe Size </strong></div></td>
                <td class="style98">:</td>
                <td class="style98"><p>
                    <?php
			  if ($row_kemaskiniteam['shoe_size']=="")
			  {?>
                    <select name="shoe_size" id="shoe_size">
                      <option value="">Select Shoe Size</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                    </select>
                    <?php
			  }
			  ?>
                    <?php
			  if ($row_kemaskiniteam['shoe_size']=="1")
			  {?>
                    <select name="shoe_size" id="shoe_size">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                    </select>
                    <?php
			  }
			  ?>
                    <?php
			  if ($row_kemaskiniteam['shoe_size']=="2")
			  {?>
                    <select name="shoe_size" id="shoe_size">
                      <option value="2">2</option>
                      <option value="1">1</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                    </select>
                    <?php
			  }
			  ?>
                    <?php
			  if ($row_kemaskiniteam['shoe_size']=="3")
			  {?>
                    <select name="shoe_size" id="shoe_size">
                      <option value="3">3</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                    </select>
                    <?php
			  }
			  ?>
                    <?php
			  if ($row_kemaskiniteam['shoe_size']=="4")
			  {?>
                    <select name="shoe_size" id="shoe_size">
                      <option value="4">4</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                    </select>
                    <?php
			  }
			  ?>
                    <?php
			  if ($row_kemaskiniteam['shoe_size']=="5")
			  {?>
                    <select name="shoe_size" id="shoe_size">
                      <option value="5">5</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                    </select>
                    <?php
			  }
			  ?>
                    <?php
			  if ($row_kemaskiniteam['shoe_size']=="6")
			  {?>
                    <select name="shoe_size" id="shoe_size">
                      <option value="6">6</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                    </select>
                    <?php
			  }
			  ?>
                    <?php
			  if ($row_kemaskiniteam['shoe_size']=="7")
			  {?>
                    <select name="shoe_size" id="shoe_size">
                      <option value="7">7</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                    </select>
                    <?php
			  }
			  ?>
                    <?php
			  if ($row_kemaskiniteam['shoe_size']=="8")
			  {?>
                    <select name="shoe_size" id="shoe_size">
                      <option value="8">8</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                    </select>
                    <?php
			  }
			  ?>
                    <?php
			  if ($row_kemaskiniteam['shoe_size']=="9")
			  {?>
                    <select name="shoe_size" id="shoe_size">
                      <option value="9">9</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                    </select>
                    <?php
			  }
			  ?>
                    <?php
			  if ($row_kemaskiniteam['shoe_size']=="10")
			  {?>
                    <select name="shoe_size" id="shoe_size">
                      <option value="10">10</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                    </select>
                    <?php
			  }
			  ?>
                    <?php
			  if ($row_kemaskiniteam['shoe_size']=="11")
			  {?>
                    <select name="shoe_size" id="shoe_size">
                      <option value="11">11</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                    </select>
                    <?php
			  }
			  ?>
                    <?php
			  if ($row_kemaskiniteam['shoe_size']=="12")
			  {?>
                    <select name="shoe_size" id="shoe_size">
                      <option value="12">12</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                    </select>
                    <?php
			  }
			  ?>
                    <?php
			  if ($row_kemaskiniteam['shoe_size']=="13")
			  {?>
                    <select name="shoe_size" id="shoe_size">
                      <option value="13">13</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                    </select>
                    <?php
			  }
			  ?>
                    <?php
			  if ($row_kemaskiniteam['shoe_size']=="14")
			  {?>
                    <select name="shoe_size" id="shoe_size">
                      <option value="14">14</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                    </select>
                    <?php
			  }
			  ?>
                    <?php
			  if ($row_kemaskiniteam['shoe_size']=="15")
			  {?>
                    <select name="shoe_size" id="shoe_size">
                      <option value="15">15</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                    </select>
                    <?php
			  }
			  ?>
                    <?php
			  if ($row_kemaskiniteam['shoe_size']=="16")
			  {?>
                    <select name="shoe_size" id="shoe_size">
                      <option value="16">16</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                    </select>
                    <?php
			  }
			  ?>
                    <?php
			  if ($row_kemaskiniteam['shoe_size']=="17")
			  {?>
                    <select name="shoe_size" id="shoe_size">
                      <option value="17">17</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                    </select>
                    <?php
			  }
			  ?>
                    <?php
			  if ($row_kemaskiniteam['shoe_size']=="18")
			  {?>
                    <select name="shoe_size" id="shoe_size">
                      <option value="18">18</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                    </select>
                    <?php
			  }
			  ?>
                    <?php
			  if ($row_kemaskiniteam['shoe_size']=="19")
			  {?>
                    <select name="shoe_size" id="shoe_size">
                      <option value="19">19</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="20">20</option>
                    </select>
                    <?php
			  }
			  ?>
                    <?php
			  if ($row_kemaskiniteam['shoe_size']=="20")
			  {?>
                    <select name="select" id="select">
                      <option value="20">20</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                    </select>
                    <?php
			  }
			  ?>
                </p></td>
                <td class="style98">&nbsp;</td>
                <td class="style98">&nbsp;</td>
                <td class="style98">&nbsp;</td>
                <td class="style98">&nbsp;</td>
              </tr>
              <tr>
                <td valign="baseline" class="style55 style72"><strong>7)</strong></td>
                <td valign="baseline" class="style72 style95"><div align="left" class="style217 style80 style55 style52 ">
                    <p><span class="style217 ">
                      <label></label>
                    </span> Safety spectacles </p>
                </div></td>
                <td class="style98">:</td>
                <td class="style98"><?php
			  if ($row_kemaskiniteam['Safety_spec']=="")
			  {?>
                    <select name="Safety_spec" id="Safety_spec">
                      <option value="">Select</option>
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
					     <option value="Not Aplicable">Not Aplicable</option>
                    </select>
                    <?php
			  }
			  ?>
                    <?php
			  if ($row_kemaskiniteam['Safety_spec']=="Yes")
			  {?>
                    <select name="Safety_spec" id="Safety_spec">
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
					     <option value="Not Aplicable">Not Aplicable</option>
                    </select>
                    <?php
			  }
			  ?>
                    <?php
			  if ($row_kemaskiniteam['Safety_spec']=="No")
			  {?>
                    <select name="Safety_spec" id="Safety_spec">
                      <option value="No">No</option>
                      <option value="Yes">Yes</option>
                      <option value="Not Aplicable">Not Aplicable</option>
                    </select>
                    <?php
			  }
			  ?>
			  
			   <?php
			  if ($row_kemaskiniteam['Safety_spec']=="Not Aplicable")
			  {?>
                    <select name="Safety_spec" id="Safety_spec">
					        <option value="Not Aplicable">Not Aplicable</option>
                      <option value="No">No</option>
                      <option value="Yes">Yes</option>
              
                    </select>
                    <?php
			  }
			  ?>
			  </td>
                <td class="style98">&nbsp;</td>
                <td class="style98">Year Received Safety Spectacles </td>
                <td class="style98">:</td>
                <td class="style98"><input name="Year_Received_Safety_spec" id="datepicker6" type="text" value="<?php echo htmlentities($row_kemaskiniteam['Year_Received_Safety_spec'], ENT_COMPAT, 'utf-8'); ?>" size="6">
                  <span class="style113">* if No , blank in the field </span></td>
              </tr>
            </table>            
            <p class="style71"><span class="style102">______________________________________________________________________________________________________<br>
            </span></p></td>
          <tr>
            <td colspan="3" height="20"><p class="style71">Test Gear (TG) : <span class="style112">* The fill is optional compalsory </span></p>
              <table width="806" height="109" align="center">
                <tr>
                  <td height="40" colspan="3" class="style72"><div align="center" class="style101">
                    <div align="left">Test    Gear 1 </div>
                  </div></td>
                  <td class="style72"><div align="left"></div></td>
                  <td height="40" colspan="3" class="style72"><div align="center" class="style101">
                    <div align="left">Test    Gear 2 </div>
                  </div></td>
                </tr>
                <tr>
                  <td width="223" class="style72"><strong>Test Gear Type</strong></td>
                  <td width="5" class="style72">:</td>
                  <td width="144" class="style72"><input name="jenis_testgear" type="text" id="jenis_testgear" value="<?php echo htmlentities($row_kemaskiniteam['jenis_testgear'], ENT_COMPAT, 'utf-8'); ?>" /></td>
                  <td width="37" class="style72">&nbsp;</td>
                  <td width="216" class="style72"><strong>Test Gear Type</strong></td>
                  <td width="5" class="style72">:</td>
                  <td width="144" class="style72"><input name="jenis_testgear2" type="text" id="jenis_testgear2" value="<?php echo htmlentities($row_kemaskiniteam['jenis_testgear2'], ENT_COMPAT, 'utf-8'); ?>" /></td>
                </tr>
                <tr>
                  <td class="style72">Test Gear Serial No (S/N)</td>
                  <td class="style72">:</td>
                  <td class="style72"><input name="serial_no_testgear" type="text" id="serial_no_testgear" value="<?php echo htmlentities($row_kemaskiniteam['serial_no_testgear'], ENT_COMPAT, 'utf-8'); ?>" /></td>
                  <td class="style72">&nbsp;</td>
                  <td class="style72">Test Gear Serial No (S/N)</td>
                  <td class="style72">:</td>
                  <td class="style72"><input name="serial_no_testgear2" type="text" id="serial_no_testgear2" value="<?php echo htmlentities($row_kemaskiniteam['serial_no_testgear2'], ENT_COMPAT, 'utf-8'); ?>" /></td>
                </tr>
                <tr>
                  <td class="style72">Calibration Date</td>
                  <td class="style72">:</td>
                  <td class="style72"><input name="calibration_date" type="text" id="calibration_date" value="<?php echo htmlentities($row_kemaskiniteam['calibration_date'], ENT_COMPAT, 'utf-8'); ?>" /></td>
                  <td class="style72">&nbsp;</td>
                  <td class="style72">Calibration Date</td>
                  <td class="style72">:</td>
                  <td class="style72"><input name="calibration_date2" type="text" id="calibration_date2" value="<?php echo htmlentities($row_kemaskiniteam['calibration_date2'], ENT_COMPAT, 'utf-8'); ?>" /></td>
                </tr>
                <tr>
                  <td class="style72">Test Gear Location</td>
                  <td class="style72">:</td>
                  <td class="style72"><input name="lokasi_testgear" type="text" id="lokasi_testgear" value="<?php echo htmlentities($row_kemaskiniteam['lokasi_testgear'], ENT_COMPAT, 'utf-8'); ?>" /></td>
                  <td class="style72">&nbsp;</td>
                  <td class="style72">Test Gear Location</td>
                  <td class="style72">:</td>
                  <td class="style72"><input name="lokasi_testgear2" type="text" id="lokasi_testgear2" value="<?php echo htmlentities($row_kemaskiniteam['lokasi_testgear2'], ENT_COMPAT, 'utf-8'); ?>" /></td>
                </tr>
              </table>              
              <span class="style72"><br>
              </span>
              <table width="808" align="center">
                <tr>
                  <td height="40" colspan="3" class="style72"><div align="center" class="style101">
                    <div align="left">Test    Gear 3 </div>
                  </div></td>
                  <td class="style72"><div align="left"></div></td>
                  <td height="40" colspan="3" class="style72"><div align="center" class="style101">
                    <div align="left">Test    Gear 4 </div>
                  </div></td>
                </tr>
                <tr>
                  <td width="221" class="style72"><strong>Test Gear Type</strong></td>
                  <td width="5" class="style72">:</td>
                  <td width="144" class="style72"><input name="jenis_testgear3" type="text" id="jenis_testgear3" value="<?php echo htmlentities($row_kemaskiniteam['jenis_testgear3'], ENT_COMPAT, 'utf-8'); ?>" /></td>
                  <td width="41" class="style72">&nbsp;</td>
                  <td width="216" class="style72"><strong>Test Gear Type</strong></td>
                  <td width="5" class="style72">:</td>
                  <td width="144" class="style72"><input name="jenis_testgear4" type="text" id="jenis_testgear4" value="<?php echo htmlentities($row_kemaskiniteam['jenis_testgear4'], ENT_COMPAT, 'utf-8'); ?>" /></td>
                </tr>
                <tr>
                  <td class="style72">Test Gear Serial No (S/N)</td>
                  <td class="style72">:</td>
                  <td class="style72"><input name="serial_no_testgear3" type="text" id="serial_no_testgear3" value="<?php echo htmlentities($row_kemaskiniteam['serial_no_testgear3'], ENT_COMPAT, 'utf-8'); ?>" /></td>
                  <td class="style72">&nbsp;</td>
                  <td class="style72">Test Gear Serial No (S/N)</td>
                  <td class="style72">:</td>
                  <td class="style72"><input name="serial_no_testgear4" type="text" id="serial_no_testgear4" value="<?php echo htmlentities($row_kemaskiniteam['serial_no_testgear4'], ENT_COMPAT, 'utf-8'); ?>" /></td>
                </tr>
                <tr>
                  <td class="style72">Calibration Date</td>
                  <td class="style72">:</td>
                  <td class="style72"><input name="calibration_date3" type="text" id="calibration_date3" value="<?php echo htmlentities($row_kemaskiniteam['calibration_date3'], ENT_COMPAT, 'utf-8'); ?>" /></td>
                  <td class="style72">&nbsp;</td>
                  <td class="style72">Calibration Date</td>
                  <td class="style72">:</td>
                  <td class="style72"><input name="calibration_date4" type="text" id="calibration_date4" value="<?php echo htmlentities($row_kemaskiniteam['calibration_date4'], ENT_COMPAT, 'utf-8'); ?>" /></td>
                </tr>
                <tr>
                  <td class="style72">Test Gear Location</td>
                  <td class="style72">:</td>
                  <td class="style72"><input name="lokasi_testgear3" type="text" id="lokasi_testgear3" value="<?php echo htmlentities($row_kemaskiniteam['lokasi_testgear3'], ENT_COMPAT, 'utf-8'); ?>" /></td>
                  <td class="style72">&nbsp;</td>
                  <td class="style72">Test Gear Location</td>
                  <td class="style72">:</td>
                  <td class="style72"><input name="lokasi_testgear4" type="text" id="lokasi_testgear4" value="<?php echo htmlentities($row_kemaskiniteam['lokasi_testgear4'], ENT_COMPAT, 'utf-8'); ?>" /></td>
                </tr>
              </table>              
              <p class="style71"><span class="style102">______________________________________________________________________________________________________<br>
              </span></p></td>          
          <tr>
            <td colspan="3" height="20"><p class="style71"> Ladder : <span class="style112">* The fill is optional compalsory </span></p>
              <table width="806" height="109" align="center">
                <tr>
                  <td height="40" colspan="3" class="style72"><div align="center" class="style100">
                    <div align="left">Ladder 1 </div>
                  </div></td>
                  <td class="style72"><div align="left"></div></td>
                  <td height="40" colspan="3" class="style72"><div align="center" class="style100">
                    <div align="left">Ladder 2 </div>
                  </div></td>
                </tr>
                <tr>
                  <td width="223" class="style72">Ladder Type</td>
                  <td width="5" class="style72"><span class="style72">:</span></td>
                  <td width="144" class="style72"><input name="jenis_tangga" type="text" id="jenis_tangga" value="<?php echo htmlentities($row_kemaskiniteam['jenis_tangga'], ENT_COMPAT, 'utf-8'); ?>" /></td>
                  <td width="37" class="style72">&nbsp;</td>
                  <td width="223" class="style72">Ladder Type</td>
                  <td width="5" class="style72"><span class="style72">:</span></td>
                  <td width="144" class="style72"><input name="jenis_tangga2" type="text" id="jenis_tangga2" value="<?php echo htmlentities($row_kemaskiniteam['jenis_tangga2'], ENT_COMPAT, 'utf-8'); ?>" /></td>
                </tr>
                <tr>
                  <td class="style72"><strong>Ladder Serial No (S/N)</strong></td>
                  <td class="style72"><span class="style72">:</span></td>
                  <td class="style72"><strong>
                    <input name="serial_no_tangga" type="text" id="serial_no_tangga" value="<?php echo htmlentities($row_kemaskiniteam['serial_no_tangga'], ENT_COMPAT, 'utf-8'); ?>" />
                  </strong></td>
                  <td class="style72">&nbsp;</td>
                  <td class="style72"><strong>Ladder Serial No (S/N)</strong></td>
                  <td class="style72"><span class="style72">:</span></td>
                  <td class="style72"><strong>
                    <input name="serial_no_tangga2" type="text" id="serial_no_tangga2" value="<?php echo htmlentities($row_kemaskiniteam['serial_no_tangga2'], ENT_COMPAT, 'utf-8'); ?>" />
                  </strong></td>
                </tr>
                <tr>
                  <td class="style72"><strong>Ladder Location</strong></td>
                  <td class="style72"><span class="style72">:</span></td>
                  <td class="style72"><strong>
                    <input name="lokasi_tangga" type="text" id="lokasi_tangga" value="<?php echo htmlentities($row_kemaskiniteam['lokasi_tangga'], ENT_COMPAT, 'utf-8'); ?>" />
                  </strong></td>
                  <td class="style72">&nbsp;</td>
                  <td class="style72"><strong>Ladder Location</strong></td>
                  <td class="style72"><span class="style72">:</span></td>
                  <td class="style72"><strong>
                    <input name="lokasi_tangga2" type="text" id="lokasi_tangga2" value="<?php echo htmlentities($row_kemaskiniteam['lokasi_tangga2'], ENT_COMPAT, 'utf-8'); ?>" />
                  </strong></td>
                </tr>
                <tr>
                  <td class="style72"><strong>Condition of Ladder </strong></td>
                  <td class="style72"><span class="style72">:</span></td>
                  <td class="style72"><input name="condition_of_ladder" type="text" id="condition_of_ladder" value="<?php echo htmlentities($row_kemaskiniteam['condition_of_ladder'], ENT_COMPAT, 'utf-8'); ?>" /></td>
                  <td class="style72">&nbsp;</td>
                  <td class="style72"><strong>Condition of Ladder </strong></td>
                  <td class="style72"><span class="style72">:</span></td>
                  <td class="style72"><input name="condition_of_ladder2" type="text" id="condition_of_ladder2" value="<?php echo htmlentities($row_kemaskiniteam['condition_of_ladder2'], ENT_COMPAT, 'utf-8'); ?>" /></td>
                </tr>
              </table>              
              <span class="style72"><br>
              </span>
            <p class="style71"><span class="style102">______________________________________________________________________________________________________<br>
            </span></p></td>
          <tr>
            <td colspan="3" height="20"><p class="style71">TM Vehicle  : <span class="style112">* The fill is optional compalsory </span></p>
              <table width="360" height="47">
                <tr>
                  <td class="style72">Type TM Vehicle </td>
                  <td class="style72">:</td>
                  <td class="style72"><span class="style98">
                    <?php
			  if ($row_kemaskiniteam['type_vehicle']=="")
			  {?>
                    <select name="type_vehicle" id="type_vehicle">
                       <option value="">Select Type TM Vehicle</option>
                      <option value="Motorcycle">Motorcycle</option>
                      <option value="Kancil">Kancil</option>
                      <option value="Viva">Viva</option>
                      <option value="Kembara">Kembara</option>
                      <option value="4WD">4WD</option>
                      <option value="Van">Van</option>
					  <option value="Saga">Saga</option>
					    <option value="Not Aplicable">Not Aplicable</option>
                  </select>
                    <?php
			  }
			  ?>
                    <?php
			  if ($row_kemaskiniteam['type_vehicle']=="Motorcycle")
			  {?>
                   <select name="type_vehicle" id="type_vehicle">
                      <option value="Motorcycle">Motorcycle</option>
                      <option value="Kancil">Kancil</option>
                      <option value="Viva">Viva</option>
                      <option value="Kembara">Kembara</option>
                      <option value="4WD">4WD</option>
                      <option value="Van">Van</option>
					   <option value="Saga">Saga</option>
					     <option value="Not Aplicable">Not Aplicable</option>
                  </select>
                    <?php
			  }
			  ?>
                     <?php
			  if ($row_kemaskiniteam['type_vehicle']=="Kancil")
			  {?>
                   <select name="type_vehicle" id="type_vehicle">
				                         <option value="Kancil">Kancil</option>
                      <option value="Motorcycle">Motorcycle</option>

                      <option value="Viva">Viva</option>
                      <option value="Kembara">Kembara</option>
                      <option value="4WD">4WD</option>
                      <option value="Van">Van</option>
					   <option value="Saga">Saga</option>
					     <option value="Not Aplicable">Not Aplicable</option>
                  </select>
                    <?php
			  }
			  ?>
			   <?php
			  if ($row_kemaskiniteam['type_vehicle']=="Viva")
			  {?>
                   <select name="type_vehicle" id="type_vehicle">
				                         <option value="Viva">Viva</option>
                      <option value="Motorcycle">Motorcycle</option>
                      <option value="Kancil">Kancil</option>

                      <option value="Kembara">Kembara</option>
                      <option value="4WD">4WD</option>
                      <option value="Van">Van</option>
					   <option value="Saga">Saga</option>
					     <option value="Not Aplicable">Not Aplicable</option>
                  </select>
                    <?php
			  }
			  ?>
			   <?php
			  if ($row_kemaskiniteam['type_vehicle']=="Kembara")
			  {?>
                   <select name="type_vehicle" id="type_vehicle">
				   <option value="Kembara">Kembara</option>
                      <option value="Motorcycle">Motorcycle</option>
                      <option value="Kancil">Kancil</option>
                      <option value="Viva">Viva</option>
                      
                      <option value="4WD">4WD</option>
                      <option value="Van">Van</option>
					   <option value="Saga">Saga</option>
					     <option value="Not Aplicable">Not Aplicable</option>
                  </select>
                    <?php
			  }
			  ?>
			   <?php
			  if ($row_kemaskiniteam['type_vehicle']=="4WD")
			  {?>
                   <select name="type_vehicle" id="type_vehicle">
				   <option value="4WD">4WD</option>
                      <option value="Motorcycle">Motorcycle</option>
                      <option value="Kancil">Kancil</option>
                      <option value="Viva">Viva</option>
                      <option value="Kembara">Kembara</option>
                      
                      <option value="Van">Van</option>
					   <option value="Saga">Saga</option>
					     <option value="Not Aplicable">Not Aplicable</option>
                  </select>
                    <?php
			  }
			  ?>
			   <?php
			  if ($row_kemaskiniteam['type_vehicle']=="Van")
			  {?>
                   <select name="type_vehicle" id="type_vehicle">
				    <option value="Van">Van</option>
                      <option value="Motorcycle">Motorcycle</option>
                      <option value="Kancil">Kancil</option>
                      <option value="Viva">Viva</option>
                      <option value="Kembara">Kembara</option>
                      <option value="4WD">4WD</option>
                     
					   <option value="Saga">Saga</option>
					     <option value="Not Aplicable">Not Aplicable</option>
                  </select>
                    <?php
			  }
			  ?>
			     <?php
			  if ($row_kemaskiniteam['type_vehicle']=="Saga")
			  {?>
                   <select name="type_vehicle" id="type_vehicle">
				   <option value="Saga">Saga</option>
                      <option value="Motorcycle">Motorcycle</option>
                      <option value="Kancil">Kancil</option>
                      <option value="Viva">Viva</option>
                      <option value="Kembara">Kembara</option>
                      <option value="4WD">4WD</option>
                      <option value="Van">Van</option>
                      <option value="Not Aplicable">Not Aplicable</option>
                   </select>
                    <?php
			  }
			  ?>
			  
			  
			  
			  
			     <?php
			  if ($row_kemaskiniteam['type_vehicle']=="Not Aplicable")
			  {?>
                   <select name="type_vehicle" id="type_vehicle">
				    <option value="Not Aplicable">Not Aplicable</option>
				   <option value="Saga">Saga</option>
                      <option value="Motorcycle">Motorcycle</option>
                      <option value="Kancil">Kancil</option>
                      <option value="Viva">Viva</option>
                      <option value="Kembara">Kembara</option>
                      <option value="4WD">4WD</option>
                      <option value="Van">Van</option>
          
                   </select>
                    <?php
			  }
			  ?>
			  
                  </span></td>
                </tr>
                <tr>
                  <td class="style72">TM Vehicle Number </td>
                  <td class="style72">:</td>
                  <td class="style72"><input name="no_pendaftaran_kenderaan_tm" type="text" id="no_pendaftaran_kenderaan_tm" value="<?php echo htmlentities($row_kemaskiniteam['no_pendaftaran_kenderaan_tm'], ENT_COMPAT, 'utf-8'); ?>" /></td>
                </tr>
              </table>            </td>
          <tr>
            <td colspan="3" height="20"><p align="center" class="style125 style19"><span class="style100"><span class="style102">______________________________________________________________________________________________________</span></span></p>
              <p align="center" class="style125 style19"><span class="style100">STATUS</span></p>
              <p align="center" class="style105 style109">Date Last Update = <?php echo $row_kemaskiniteam['date_last_update']; ?></p>
              <p align="center" class="style103"><strong>Status </strong>: <span class="style217"><strong>
                <label>
                <?php
			  if ($row_kemaskiniteam['Status']=="PENDING")
			  {?>
                <select name="Status" id="Status">
                  <option value="PENDING">PENDING</option>
                  <option value="COMPLETED">COMPLETED</option>
                </select>
                <?php
			  }
			  ?>
                <?php
			  if ($row_kemaskiniteam['Status']=="COMPLETED")
			  {?>
                <select name="Status" id="Status">
                  <option value="COMPLETED">COMPLETED</option>
                  <option value="PENDING">PENDING</option>
                </select>
                <?php
			  }
			  ?>
                </label>
              </strong></span></p></td>
      </table>
      <p align="center" class="style125 style19">
        <label for="checkbox"></label>
        <label for="label5"></label>
      </p>
      <div align="center" class="style103">
        <p class="style108">*If you click UPDATE NOW, date update has  been change</p>
        <p>
          <input name="Submit" type="submit" class="style98" value="UPDATE NOW" />
        </p>
        <p>&nbsp;</p>
        <table width="958" border="1" bgcolor="#FFFFFF">
          <tr>
            <td width="948" height="26"><div align="right" class="style105">
              <ul id="css3menu1" class="topmenu">
                <li><a href="iPPE_search_pending.php" title="BACK TO SEARCH FOR UPDATE OTHERS" style="height:18px;line-height:18px;">BACK </a></li>
              </ul>
              Date update today =
              <input name="date_last_update" type="text" class="style105" id="date_last_update" value="<?php echo date("d/m/Y");?>" size="10" />
            </div></td>
          </tr>
        </table>
      </div>
	  
	  	<script type="text/javascript">
   <!--
      // Form validation code will come here.
      function validate()
      {  
         if( document.myForm.Unit.value == "" )
         {
            alert( "Please provide your Unit Name before Submit!" );
            return false;
         }
         return( true );
      }
   //-->
</script>
    </form>
  </div>
  
</div> 
<!-- /#contents -->
<div id="footer">
  <ul class="contacts">
    <h3>Contact Us</h3>
    <li>Che Azlisyam Che Sulaiman<br>
      OSH &amp; Risk Management Central Function<br>
    </li>
  </ul>
  <ul id="connect">
    <h3>&nbsp;</h3>
  </ul>
  <div id="newsletter">
    <ul class="contacts">
      <li>Tel : 013-4305642<br>
        Office : 0322406701</li>
      <li>Email : azlisyam@tm.com.my</li>
    </ul>
    <p>&nbsp;</p>
  </div>
  <span class="footnote">Create by Nurhayati Binti Othman | NMOS CFx &copy; Copyright &copy; 2011. All rights reserved</span> </div>
<!-- /#footer -->
	
	

</script>			 
<script language="JavaScript">
function openissue(){
	formwindow=dhtmlmodal.open('Issues', 'iframe', 'issue.cfm', 'Issue Details', 'width=900px,height=600px,center=1,resize=0,scrolling=1');
}

function validate() {	
	if(document.feedback.Safety_Helmet.value.length==0) {
		alert("Please Select Safety Helmet YES or NO");
		document.feedback.Safety_Helmet.focus();
		return false ;
	}
	if(document.feedback.Safety_Vest.value.length==0) {
		alert("Please Select Safety Vest YES or NO");
		document.feedback.Safety_Vest.focus();
		return false ;
	}
	if(document.feedback.Full_Body_Harness.value.length==0) {
		alert("Please Select Full Body Harness YES or NO");
		document.feedback.Full_Body_Harness.focus();
		return false ;
	
	}
	if(document.feedback.FBH_Trained.value.length==0) {
		alert("Please Select FBH Trained YES or NO");
		document.feedback.FBH_Trained.focus();
		return false ;
	}
	if(document.feedback.Ladder.value.length==0) {
		alert("Please Select Ladder YES or NO");
		document.feedback.Ladder.focus();
		return false ;
		}
	
	if(document.feedback.Safety_Shoe.value.length==0) {
		alert("Please Select Safety Shoe YES or NO");
		document.feedback.Safety_Shoe.focus();
		return false ;
		}
	if(document.feedback.Safety_spec.value.length==0) {
		alert("Please Select Safety Spectacles YES or NO");
		document.feedback.Safety_spec.focus();
		return false ;
		}
	

	
	
	return true;
	
}
//-->
          </script>
		  
		  
	
</body>
</html>