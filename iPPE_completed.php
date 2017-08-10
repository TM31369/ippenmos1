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
</head>

<body>
<div id="header"><img src="logo ippe.png" width="838" height="198"> <img src="TM_LOGO.png" width="111" height="53"></div>
<!-- /#header -->
<!-- /#adbox -->
<div id="contents">
  <div class="body style14">
    <form action="iPPE_update_run.php" method="post" name="form1" class="style80" id="form1">
	      <table width="958" border="1" bgcolor="#FFFFFF">
        <tr>
          <td width="948" height="26"><div align="right" class="style105">
            <div align="center" class="style110">VIEW DATA </div>
          </div></td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <table width="926" height="1755" align="center" class="style80">
        <tr valign="baseline">
          <td height="27" class="style80"><div align="left" class="style14 style142 style217 style52 style55 style72 style72"><strong>I/C Number </strong></div></td>
          <td class="style80"><div align="left" class="style72 style14 style80 style217 style52 style55 style72"><strong>:</strong></div></td>
          <td class="style80"><div align="left" class="style72 style217 style143 style159 style14 style55 style72"><strong>
            <span class="style70"><?php echo $row_kemaskiniteam['id']; ?></span>
            <label>
            <input hidden type="text" name="id" value="<?php echo $id;  ?>" />
            </label>
          </strong></div></td>
        </tr>
        <tr valign="baseline">
          <td height="18" class="style80"><div align="left" class="style14 style142 style217 style52 style55 style72 style72"><strong>Name </strong></div></td>
          <td class="style80"><div align="left" class="style72 style14 style80 style217 style52 style55 style72"><strong>:</strong></div></td>
          <td class="style80"><div align="left" class="style72 style217 style80 style14 style55 style72"><strong><?php echo $row_kemaskiniteam['Employee']; ?></strong></div></td>
        </tr>
        <tr valign="baseline">
          <td width="161" height="18" class="style80"><div align="left" class="style14 style142 style217 style52 style55 style72 style72"><strong>Staff No </strong></div></td>
          <td width="14" class="style80"><div align="left" class="style72 style14 style80 style217 style52 style55 style72"><strong>:</strong></div></td>
          <td width="735" class="style80"><div align="left" class="style72 style217 style80 style14 style55 style72"><strong><?php echo $row_kemaskiniteam['Staff_No']; ?></strong></div></td>
        </tr>
        <tr valign="baseline">
          <td height="18"><strong><span class="style72 style14 style142 style217 style52 style55"><strong><span class="style52 style217 style142 style72 style72">Unit</span></strong></span></strong></td>
          <td class="style80"><div align="left" class="style72 style14 style80 style217 style52 style55 style72"><strong>:</strong></div></td>
          <td class="style80"><div align="left" class="style72 style217 style80 style14 style55 style72"><strong>
              <label></label>
              <span class="style217 style94">
              <label></label>
              </span><?php echo $row_kemaskiniteam['Unit']; ?></strong></div></td>
        </tr>
        <tr valign="baseline">
          <td height="18"><strong><span class="style72 style14 style142 style217 style52 style55"><strong><span class="style52 style217 style142 style72 style72">Essential Task</span></strong></span></strong></td>
          <td class="style80"><div align="left" class="style72 style14 style80 style217 style52 style55 style72"><strong>:</strong></div></td>
          <td class="style80"><div align="left" class="style72 style217 style80 style14 style55 style72"><strong>
              <label></label>
              <span class="style217 style94">
              <label></label>
          
              <label></label>
              </span><?php echo $row_kemaskiniteam['Essential_Task']; ?></strong></div></td>
        </tr>
        <tr valign="baseline">
          <td height="18" class="style80"><div align="left" class="style217 style142 style144 style14 style20 style52 style18 style55 style56 style72">
              <p>Zone</p>
          </div></td>
          <td class="style80"><div align="left" class="style217 style80 style14 style20 style52 style18 style55 style56 style74 style72">
              <p>:</p>
          </div></td>
          <td class="style80"><span class="style72"><strong><?php echo $row_kemaskiniteam['Zone']; ?></strong></span></td>
        </tr>
        <tr valign="baseline">
          <td height="18" class="style80"><div align="left" class="style217 style142 style145 style14 style20 style52 style18 style55 style56 style72">
              <p>Regional</p>
          </div></td>
          <td class="style80"><div align="left" class="style217 style80 style14 style20 style52 style18 style55 style56 style76 style72">
              <p>:</p>
          </div></td>
          <td class="style80"><div align="left" class="style217 style80 style14 style18 style55 style56 style77 style72">
              <p><span class="style217 style94">
                <label>
                <?php echo $row_kemaskiniteam['State_type']; ?></label>
              </span></p>
          </div></td>
        </tr>
        <tr valign="baseline">
          <td height="18" class="style80"><div align="left" class="style217 style142 style146 style14 style20 style52 style18 style55 style56 style72">
              <p>State</p>
          </div></td>
          <td class="style80"><div align="left" class="style217 style80 style14 style20 style52 style18 style55 style56 style79 style72">
              <p>:</p>
          </div></td>
          <td class="style80"><div align="left" class="style217 style14 style18 style55 style56 style80 style72">
              <p>
                <label></label>
              <?php echo $row_kemaskiniteam['State']; ?></p>
          </div></td>
        </tr>
          <td colspan="3" height="20"><p class="style71 style72"><span class="style55">______________________________________________________________________________________________________<br>
          </span><br>
            </p>
              <p class="style71 style72">Safety Equipment (SE) /Work Equipment (WE) : </p>
              <p class="style71 style72">&nbsp;</p>
            <table width="667" border="0" align="left" cellspacing="0">
              <tr>
                <td width="20" valign="baseline" class="style55 style72 style72"><strong>1) </strong></td>
                <td width="229" valign="baseline" class="style72 style56 style72"><div align="left" class="style217 style80 style55 style52 ">
                    <p><span class="style217"><strong>
                      <label></label>
                                        </strong></span> Safety Helmet</p>
                </div></td>
                <td width="10" class="style83 style72">:</td>
                <td width="379" class="style83 style72">   <?php echo $row_kemaskiniteam['Safety_Helmet']; ?>&nbsp;</td>
                <td width="7" class="style83 style72">&nbsp;</td>
              </tr>
              <tr>
                <td height="43" valign="baseline" class="style55 style72 style72">&nbsp;</td>
                <td class="style83 style72"><label for="label">Year Received Safety Helmet</label></td>
                <td class="style83 style72">:</td>
                <td class="style83 style72"><span class="style98"><?php echo $row_kemaskiniteam['Year_Received_Safety_Helmet']; ?></span></td>
                <td class="style98 style72">&nbsp;</td>
              </tr>
              <tr>
                <td valign="baseline" class="style55 style72 style72"><strong>2)</strong></td>
                <td valign="baseline" class="style72 style83 style72"><div align="left" class="style217 style80 style55 style52 ">
                    <p><span class="style217"><strong>
                      <label></label>
                                          </strong></span> Safety Vest
                      <label for="label"></label>
                    </p>
                </div></td>
                <td class="style86 style72">:</td>
                <td class="style86 style72"><span class="style98"><?php echo $row_kemaskiniteam['Safety_Vest']; ?></span></td>
                <td class="style86 style72">&nbsp;</td>
              </tr>
              <tr>
                <td height="45" valign="baseline" class="style55 style72 style72">&nbsp;</td>
                <td class="style86 style72"><label for="label">Year Received Safety Vest</label></td>
                <td class="style86 style72">:</td>
                <td class="style86 style72"><span class="style98"><?php echo $row_kemaskiniteam['Year_Received_Safety_Vest']; ?></span></td>
                <td class="style98 style72">&nbsp;</td>
              </tr>
              <tr>
                <td valign="baseline" class="style55 style72 style72"><strong>3)</strong></td>
                <td valign="baseline" class="style72 style83 style72"><div align="left" class="style217 style80 style55 style52 ">
                    <p><span class="style217"><strong>
                      <label></label>
                      </strong></span>Full Body Harnes (FBH)</p>
                </div></td>
                <td class="style86 style72">:</td>
                <td class="style86 style72"><span class="style98"><?php echo $row_kemaskiniteam['Full_Body_Harness']; ?></span></td>
                <td class="style86 style72">&nbsp;</td>
              </tr>
              <tr>
                <td valign="baseline" class="style55 style72 style72">&nbsp;</td>
                <td class="style86 style72"><label for="label">Year Received FBH </label></td>
                <td class="style86 style72">:</td>
                <td class="style86 style72"><span class="style98"><?php echo $row_kemaskiniteam['Year_Received_FBH']; ?></span></td>
                <td class="style98 style72">&nbsp;</td>
              </tr>

              <tr>
                <td height="42" valign="baseline" class="style55 style72 style72">&nbsp;</td>
                <td valign="baseline" class="style72 style86 style72"><div align="right"><strong>FBH S/N </strong></div></td>
                <td class="style98 style72">:</td>
                <td class="style98 style72"><?php echo $row_kemaskiniteam['sn_fbh']; ?></td>
                <td class="style98 style72">&nbsp;</td>
              </tr>
              <tr>
                <td valign="baseline" class="style55 style72 style72"><strong>4)</strong></td>
                <td valign="baseline" class="style72 style98 style72"><div align="left" class="style217 style80 style55 style52 ">
                    <p><span class="style217"><strong>
                      <label></label>
                                          </strong></span> FBH Trained
                      <label for="label"></label>
                    </p>
                </div></td>
                <td class="style98 style72">:</td>
                <td class="style98 style72"><?php echo $row_kemaskiniteam['FBH_Trained']; ?></td>
                <td class="style98 style72">&nbsp;</td>
              </tr>
              <tr>
                <td height="41" valign="baseline" class="style55 style72 style72">&nbsp;</td>
                <td class="style98 style72"><label for="label">Year Trained FBH</label></td>
                <td class="style98 style72">:</td>
                <td class="style98 style72"><?php echo $row_kemaskiniteam['Year_Trained_FBH']; ?></td>
                <td class="style98 style72">&nbsp;</td>
              </tr>
              <tr>
                <td valign="baseline" class="style55 style72 style72"><strong>5)</strong></td>
                <td valign="baseline" class="style72 style98 style72"><div align="left" class="style217 style80 style55 style52 ">
                    <p><span class="style217 ">
                      <label></label>
                    </span>Ladder</p>
                </div></td>
                <td class="style98 style72">:</td>
                <td class="style98 style72"><?php echo $row_kemaskiniteam['Ladder']; ?></td>
                <td class="style98 style72">&nbsp;</td>
              </tr>
              <tr>
                <td height="38" valign="baseline" class="style55 style72 style72">&nbsp;</td>
                <td class="style98 style72">Year Received Ladder </td>
                <td class="style98 style72">:</td>
                <td class="style98 style72"><?php echo $row_kemaskiniteam['Year_Received_Ladder']; ?></td>
                <td class="style98 style72">&nbsp;</td>
              </tr>
              <tr>
                <td valign="baseline" class="style55 style72 style72"><strong>6)</strong></td>
                <td valign="baseline" class="style72 style95 style72"><div align="left" class="style217 style80 style55 style52 ">
                    <p><span class="style217 ">
                      <label></label>
                    </span> Safety shoe </p>
                </div></td>
                <td class="style98 style72">:</td>
                <td class="style98 style72"><?php echo $row_kemaskiniteam['Safety_Shoe']; ?></td>
                <td class="style98 style72">&nbsp;</td>
              </tr>
              <tr>
                <td valign="baseline" class="style55 style72 style72">&nbsp;</td>
                <td class="style98 style72">Year Received Safety Shoe </td>
                <td class="style98 style72">:</td>
                <td class="style98 style72"><?php echo $row_kemaskiniteam['Year_Received_Safety_Shoe']; ?></td>
                <td class="style98 style72">&nbsp;</td>
              </tr>
              <tr>
                <td valign="baseline" class="style55 style72 style72">&nbsp;</td>
                <td valign="baseline" class="style72 style95 style72"><div align="right"><strong>Shoe Size </strong></div></td>
                <td class="style98 style72">:</td>
                <td class="style98 style72"><?php echo $row_kemaskiniteam['shoe_size']; ?></td>
                <td class="style98 style72">&nbsp;</td>
              </tr>
              <tr>
                <td valign="baseline" class="style55 style72 style72"><strong>7)</strong></td>
                <td valign="baseline" class="style72 style95 style72"><div align="left" class="style217 style80 style55 style52 ">
                    <p><span class="style217 ">
                      <label></label>
                    </span> Safety Spectacles </p>
                </div></td>
                <td class="style98 style72">:</td>
                <td class="style98 style72"><?php echo $row_kemaskiniteam['Safety_spec']; ?></td>
                <td class="style98 style72">&nbsp;</td>
              </tr>
              <tr>
                <td valign="baseline" class="style55 style72 style72">&nbsp;</td>
                <td class="style83 style72"><label for="label">Year Received Safety Spectacles </label></td>
                <td class="style83 style72">:</td>
                <td class="style83 style72"><span class="style98"><?php echo $row_kemaskiniteam['Year_Received_Safety_spec']; ?></span></td>
                <td class="style98 style72">&nbsp;</td>
              </tr>
              <tr>
                <td valign="baseline" class="style55 style72 style72">&nbsp;</td>
                <td valign="baseline" class="style72 style95 style72">&nbsp;</td>
                <td class="style98 style72">&nbsp;</td>
                <td class="style98 style72">&nbsp;</td>
                <td class="style98 style72">&nbsp;</td>
              </tr>
            </table>            
            <p>&nbsp;</p>
            <p class="style71 style72">&nbsp;</p>
            <p class="style71 style72">&nbsp;</p>
            <p class="style71 style72">&nbsp;</p>
            <p class="style71 style72">&nbsp;</p>
            <p class="style71 style72">&nbsp;</p>
            <p class="style71 style72">&nbsp;</p>
            <p class="style71 style72">&nbsp;</p>
            <p class="style71 style72">&nbsp;</p>
            <p class="style71 style72">&nbsp;</p>
            <p class="style71 style72">&nbsp;</p>
            <p class="style71 style72">&nbsp;</p>
            <p class="style71 style72">&nbsp;</p>
            <p class="style71 style72">&nbsp;</p>
            <p class="style71 style72"><span class="style102">______________________________________________________________________________________________________<br>
            </span></p></td>
          <tr>
            <td colspan="3" height="20"><p class="style71">Test Gear (TG) : </p>
              <table width="806" height="109" align="left">
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
                  <td width="144" class="style72"><span class="style98"><?php echo $row_kemaskiniteam['jenis_testgear']; ?></span></td>
                  <td width="37" class="style72">&nbsp;</td>
                  <td width="216" class="style72"><strong>Test Gear Type</strong></td>
                  <td width="5" class="style72">:</td>
                  <td width="144" class="style72"><span class="style98"><?php echo $row_kemaskiniteam['jenis_testgear2']; ?></span></td>
                </tr>
                <tr>
                  <td class="style72">Test Gear Serial No (S/N)</td>
                  <td class="style72">:</td>
                  <td class="style72"><span class="style98"><?php echo $row_kemaskiniteam['serial_no_testgear']; ?></span></td>
                  <td class="style72">&nbsp;</td>
                  <td class="style72">Test Gear Serial No (S/N)</td>
                  <td class="style72">:</td>
                  <td class="style72"><span class="style98"><?php echo $row_kemaskiniteam['serial_no_testgear2']; ?></span></td>
                </tr>
                <tr>
                  <td class="style72">Calibration Date</td>
                  <td class="style72">:</td>
                  <td class="style72"><span class="style98"><?php echo $row_kemaskiniteam['calibration_date']; ?></span></td>
                  <td class="style72">&nbsp;</td>
                  <td class="style72">Calibration Date</td>
                  <td class="style72">:</td>
                  <td class="style72"><span class="style98"><?php echo $row_kemaskiniteam['calibration_date2']; ?></span></td>
                </tr>
                <tr>
                  <td class="style72">Test Gear Location</td>
                  <td class="style72">:</td>
                  <td class="style72"><span class="style98"><?php echo $row_kemaskiniteam['lokasi_testgear']; ?></span></td>
                  <td class="style72">&nbsp;</td>
                  <td class="style72">Test Gear Location</td>
                  <td class="style72">:</td>
                  <td class="style72"><span class="style98"><?php echo $row_kemaskiniteam['lokasi_testgear2']; ?></span></td>
                </tr>
              </table>              
              <p class="style72">&nbsp;</p>
              <p class="style72">&nbsp;</p>
              <p class="style72">&nbsp;</p>
              <p class="style72">&nbsp;</p>
              <p class="style72"><br>
                <br>
              </p>
              <table width="808" align="left">
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
                  <td width="144" class="style72"><span class="style98"><?php echo $row_kemaskiniteam['jenis_testgear3']; ?></span></td>
                  <td width="41" class="style72">&nbsp;</td>
                  <td width="216" class="style72"><strong>Test Gear Type</strong></td>
                  <td width="5" class="style72">:</td>
                  <td width="144" class="style72"><span class="style98"><?php echo $row_kemaskiniteam['jenis_testgear4']; ?></span></td>
                </tr>
                <tr>
                  <td class="style72">Test Gear Serial No (S/N)</td>
                  <td class="style72">:</td>
                  <td class="style72"><span class="style98"><?php echo $row_kemaskiniteam['serial_no_testgear3']; ?></span></td>
                  <td class="style72">&nbsp;</td>
                  <td class="style72">Test Gear Serial No (S/N)</td>
                  <td class="style72">:</td>
                  <td class="style72"><span class="style98"><?php echo $row_kemaskiniteam['serial_no_testgear4']; ?></span></td>
                </tr>
                <tr>
                  <td class="style72">Calibration Date</td>
                  <td class="style72">:</td>
                  <td class="style72"><span class="style98"><?php echo $row_kemaskiniteam['calibration_date3']; ?></span></td>
                  <td class="style72">&nbsp;</td>
                  <td class="style72">Calibration Date</td>
                  <td class="style72">:</td>
                  <td class="style72"><span class="style98"><?php echo $row_kemaskiniteam['calibration_date4']; ?></span></td>
                </tr>
                <tr>
                  <td class="style72">Test Gear Location</td>
                  <td class="style72">:</td>
                  <td class="style72"><span class="style98"><?php echo $row_kemaskiniteam['lokasi_testgear3']; ?></span></td>
                  <td class="style72">&nbsp;</td>
                  <td class="style72">Test Gear Location</td>
                  <td class="style72">:</td>
                  <td class="style72"><span class="style98"><?php echo $row_kemaskiniteam['lokasi_testgear4']; ?></span></td>
                </tr>
              </table>              
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p class="style71">&nbsp;</p>
              <p class="style71">&nbsp;</p>
              <p class="style71">&nbsp;</p>
              <p class="style71">&nbsp;</p>
              <p class="style71">&nbsp;</p>
              <p class="style71"><span class="style102">______________________________________________________________________________________________________<br>
              </span></p></td>          
          <tr>
            <td colspan="3" height="20"><p class="style71">Ladder : </p>
              <table width="806" height="109" align="left">
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
                  <td width="144" class="style72"><span class="style98"><?php echo $row_kemaskiniteam['jenis_tangga']; ?></span></td>
                  <td width="37" class="style72">&nbsp;</td>
                  <td width="223" class="style72">Ladder Type</td>
                  <td width="5" class="style72"><span class="style72">:</span></td>
                  <td width="144" class="style72"><span class="style98"><?php echo $row_kemaskiniteam['jenis_tangga2']; ?></span></td>
                </tr>
                <tr>
                  <td class="style72"><strong>Ladder Serial No (S/N)</strong></td>
                  <td class="style72"><span class="style72">:</span></td>
                  <td class="style72"><span class="style98"><?php echo $row_kemaskiniteam['serial_no_tangga']; ?></span></td>
                  <td class="style72">&nbsp;</td>
                  <td class="style72"><strong>Ladder Serial No (S/N)</strong></td>
                  <td class="style72"><span class="style72">:</span></td>
                  <td class="style72"><span class="style98"><?php echo $row_kemaskiniteam['serial_no_tangga2']; ?></span></td>
                </tr>
                <tr>
                  <td class="style72"><strong>Ladder Location</strong></td>
                  <td class="style72"><span class="style72">:</span></td>
                  <td class="style72"><span class="style98"><?php echo $row_kemaskiniteam['lokasi_tangga']; ?></span></td>
                  <td class="style72">&nbsp;</td>
                  <td class="style72"><strong>Ladder Location</strong></td>
                  <td class="style72"><span class="style72">:</span></td>
                  <td class="style72"><span class="style98"><?php echo $row_kemaskiniteam['lokasi_tangga2']; ?></span></td>
                </tr>
                <tr>
                  <td class="style72"><strong>Condition of Ladder </strong></td>
                  <td class="style72"><span class="style72">:</span></td>
                  <td class="style72"><span class="style98"><?php echo $row_kemaskiniteam['condition_of_ladder']; ?></span></td>
                  <td class="style72">&nbsp;</td>
                  <td class="style72"><strong>Condition of Ladder </strong></td>
                  <td class="style72"><span class="style72">:</span></td>
                  <td class="style72"><span class="style98"><?php echo $row_kemaskiniteam['condition_of_ladder2']; ?></span></td>
                </tr>
              </table>              
              <p class="style72">&nbsp;</p>
              <p class="style72"><br>
              </p>
              <p class="style72">&nbsp;</p>
              <p class="style72">&nbsp;</p>
              <p class="style72">&nbsp;</p>
              <p class="style72">&nbsp;</p>
              <p class="style71"><span class="style102">______________________________________________________________________________________________________<br>
            </span></p></td>
          <tr>
            <td colspan="3" height="20"><p class="style71">TM Vehicle  : </p>
              <table width="360" height="47">
                <tr>
                  <td class="style72">Type TM Vehicle </td>
                  <td class="style72">:</td>
                  <td class="style72"><span class="style98"><?php echo $row_kemaskiniteam['type_vehicle']; ?></span></td>
                </tr>
                <tr>
                  <td class="style72">TM Vehicle Number </td>
                  <td class="style72">:</td>
                  <td class="style72"><span class="style98"><?php echo $row_kemaskiniteam['no_pendaftaran_kenderaan_tm']; ?></span></td>
                </tr>
              </table>            </td>
          <tr>
            <td colspan="3" height="20"><p align="center" class="style125 style19"><span class="style100"><span class="style102">______________________________________________________________________________________________________</span></span></p>
              <p align="center" class="style125 style19"><span class="style100">STATUS</span></p>
              <p align="center" class="style105 style109">Date Last Update = <?php echo $row_kemaskiniteam['date_last_update']; ?></p>
              <p align="center" class="style103"><strong>Status </strong>: <span class="style217"><strong>
              <label><span class="style98"><?php echo $row_kemaskiniteam['Status']; ?></span></label></strong></span></p></td>
      </table>
      <p align="center" class="style125 style19">
        <label for="checkbox"></label>
        <label for="label5"></label>
      </p>
      <div align="center" class="style103">
        <p class="style108">&nbsp;</p>
        <table width="958" border="1" bgcolor="#FFFFFF">
          <tr>
            <td width="948" height="26"><div align="right" class="style105">
              <ul id="css3menu1" class="topmenu">
                <li><a href="iPPE_search_completed.php" title="BACK TO SEARCH FOR UPDATE OTHERS" style="height:18px;line-height:18px;">BACK </a></li>
              </ul>
              Date update today =
              <input name="date_last_update" type="text" class="style105" id="date_last_update" value="<?php echo date("d/m/Y");?>" size="10" />
            </div></td>
          </tr>
        </table>
      </div>
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
</body>
</html>