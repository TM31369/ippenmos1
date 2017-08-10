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
.style3 {font-family: Georgia, "Times New Roman", Times, serif; font-weight: bold; }
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
.style104 {
	color: #0066FF;
	font-size: 12px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-style: italic;
}
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
  });
  </script> 
</head>

<body>
<div id="header"><img src="logo ippe.png" width="838" height="198"> <img src="TM_LOGO.png" width="111" height="53"></div>
<!-- /#header -->
<!-- /#adbox -->
<div id="contents">
  <div class="body style14">
    <p align="center" class="style20"><form action="training_update_run.php" name=feedback method=post enctype="multipart/form-data" onSubmit="return validate()"><form action="training_update_run.php" name=feedback method=post enctype="multipart/form-data" onSubmit="return validate()">
	      <table width="958" border="1" bgcolor="#FFFFFF">
        <tr>
          <td width="948" height="26"><div align="right" class="style105">
            <div align="center" class="style110">LIST OF TRAINING  </div>
          </div></td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <table width="926" height="110" align="center" class="style80">
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
          <td colspan="3" height="20"><p class="style71"><br>
            List of Training : </p>
              <table width="607" border="0" align="left" cellspacing="0">
                <tr>
                  <td width="20" valign="baseline" class="style55 style72"><strong>1) </strong></td>
                  <td width="159" valign="baseline" class="style72 style56"><div align="left" class="style217 style80 style55 style52 ">
                      <p><span class="style217"><strong>
                        <label></label>
                    </strong></span>PLAKS</p>
                  </div></td>
                  <td width="5" class="style98">:</td>
                  <td width="197" class="style98"><?php
			  if ($row_kemaskiniteam['training1']=="")
			  {?>
                      <select name="training1" id="training1">
                        <option value="">Select</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                      <?php
			  }
			  ?>
                      <?php
			  if ($row_kemaskiniteam['training1']=="Yes")
			  {?>
                      <select name="training1" id="training1">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                      <?php
			  }
			  ?>
                      <?php
			  if ($row_kemaskiniteam['training1']=="No")
			  {?>
                      <select name="training1" id="training1">
                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                      </select>
                      <?php
			  }
			  ?></td>
                  <td width="8" class="style98">&nbsp;</td>
                </tr>
                <tr>
                  <td valign="baseline" class="style55 style72"><strong>2)</strong></td>
                  <td valign="baseline" class="style72 style83"><div align="left" class="style217 style80 style55 style52 ">
                      <p><span class="style217"><strong>
                        <label></label>
                        </strong></span>AESP-TM </p>
                  </div></td>
                  <td class="style98">:</td>
                  <td class="style98"><?php
			  if ($row_kemaskiniteam['training2']=="")
			  {?>
                      <select name="training2" id="training2">
                        <option value="">Select</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                      <?php
			  }
			  ?>
                      <?php
			  if ($row_kemaskiniteam['training2']=="Yes")
			  {?>
                      <select name="training2" id="training2">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                      <?php
			  }
			  ?>
                      <?php
			  if ($row_kemaskiniteam['training2']=="No")
			  {?>
                      <select name="training2" id="training2">
                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                      </select>
                      <?php
			  }
			  ?></td>
                  <td class="style98">&nbsp;</td>
                </tr>
                <tr>
                  <td valign="baseline" class="style55 style72"><strong>3)</strong></td>
                  <td valign="baseline" class="style72 style83"><div align="left" class="style217 style80 style55 style52 ">
                      <p><span class="style217"><strong>
                        <label></label>
                      </strong></span>AGTES</p>
                  </div></td>
                  <td class="style98">:</td>
                  <td class="style98"><?php
			  if ($row_kemaskiniteam['training3']=="")
			  {?>
                      <select name="training3" id="training3">
                        <option value="">Select</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                      <?php
			  }
			  ?>
                      <?php
			  if ($row_kemaskiniteam['training3']=="Yes")
			  {?>
                      <select name="training3" id="training3">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                      <?php
			  }
			  ?>
                      <?php
			  if ($row_kemaskiniteam['training3']=="No")
			  {?>
                      <select name="training3" id="training3">
                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                      </select>
                      <?php
			  }
			  ?></td>
                  <td class="style98">&nbsp;</td>
                </tr>

                <tr>
                  <td valign="baseline" class="style55 style72"><strong>4)</strong></td>
                  <td valign="baseline" class="style72 style98"><div align="left" class="style217 style80 style55 style52 ">
                      <p><span class="style217"><strong>
                        <label></label>
                        </strong></span>Poles Proficiency (FBH + Ladder)</p>
                  </div></td>
                  <td class="style98">:</td>
                  <td class="style98"><?php
			  if ($row_kemaskiniteam['training4']=="")
			  {?>
                      <select name="training4" id="training4">
                        <option value="">Select</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                      <?php
			  }
			  ?>
                      <?php
			  if ($row_kemaskiniteam['training4']=="Yes")
			  {?>
                      <select name="training4" id="training4">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                      <?php
			  }
			  ?>
                      <?php
			  if ($row_kemaskiniteam['training4']=="No")
			  {?>
                      <select name="training4" id="training4">
                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                      </select>
                      <?php
			  }
			  ?></td>
                  <td class="style98">&nbsp;</td>
                </tr>
                <tr>
                  <td valign="baseline" class="style55 style72"><strong>5)</strong></td>
                  <td valign="baseline" class="style72 style98"><div align="left" class="style217 style80 style55 style52 ">
                      <p><span class="style217 ">
                        <label></label>
                      </span>Vertical Ladder </p>
                  </div></td>
                  <td class="style98">:</td>
                  <td class="style98"><?php
			  if ($row_kemaskiniteam['training5']=="")
			  {?>
                      <select name="training5" id="training5">
                        <option value="">Select</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                      <?php
			  }
			  ?>
                      <?php
			  if ($row_kemaskiniteam['training5']=="Yes")
			  {?>
                      <select name="training5" id="training5">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                      <?php
			  }
			  ?>
                      <?php
			  if ($row_kemaskiniteam['training5']=="No")
			  {?>
                      <select name="training5" id="training5">
                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                      </select>
                      <?php
			  }
			  ?></td>
                  <td class="style98">&nbsp;</td>
                </tr>
                <tr>
                  <td valign="baseline" class="style55 style72"><strong>6)</strong></td>
                  <td valign="baseline" class="style72 style95"><div align="left" class="style217 style80 style55 style52 ">
                      <p><span class="style217 ">
                        <label></label>
                      </span>Aerial Rigger</p>
                  </div></td>
                  <td class="style98">:</td>
                  <td class="style98"><?php
			  if ($row_kemaskiniteam['training6']=="")
			  {?>
                      <select name="training6" id="training6">
                        <option value="">Select</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                      <?php
			  }
			  ?>
                      <?php
			  if ($row_kemaskiniteam['training6']=="Yes")
			  {?>
                      <select name="training6" id="training6">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                      <?php
			  }
			  ?>
                      <?php
			  if ($row_kemaskiniteam['training6']=="No")
			  {?>
                      <select name="training6" id="training6">
                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                      </select>
                      <?php
			  }
			  ?></td>
                  <td class="style98">&nbsp;</td>
                </tr>
              </table>
            <p class="style71">&nbsp;</p></td>
      </table>
      <p align="center" class="style125 style19">
        <label for="checkbox"></label>
        <label for="label5"></label>
      </p>
      <p align="center" class="style125 style19">&nbsp;</p>
      <div align="center" class="style103">
        <p align="left">
          <input name="Submit" type="submit" class="style98" value="UPDATE NOW" />
        </p>
        <p align="left">&nbsp;</p>
        <p align="left">&nbsp;</p>
        <table width="958" border="1" bgcolor="#FFFFFF">
          <tr>
            <td width="948" height="26"><div align="right" class="style105">
              <ul id="css3menu1" class="topmenu">
                <li><a href="training.php" title="BACK TO SEARCH FOR UPDATE OTHERS" style="height:18px;line-height:18px;">BACK </a></li>
              </ul>
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
			<li><span>Email</span><p>: company@email.com</p></li>
			<li><span>Address</span><p>: 189 Lorem Ipsum Pellentesque, Mauris Etiam ut velit odio Proin id nisi enim 0000</p></li>
			<li><span>Phone</span><p>: 117-683-9187-000</p></li>
		</ul>
		<ul id="connect">
			<h3>Get Updated</h3>
			<li><a href="blog.html">Blog</a></li>
			<li><a href="http://facebook.com/freewebsitetemplates" target="_blank">Facebook</a></li>
			<li><a href="http://twitter.com/fwtemplates" target="_blank">Twitter</a></li>
		</ul>
		<div id="newsletter">
			<p><b>Sign-up for Newsletter</b>
				In sollicitudin vulputate metus, sed commodo diam elementum nec. Sed et risus sed magna convallis adipiscing.
			</p>
			<form action="" method="">
				<input type="text" value="Name" class="txtfield" onBlur="javascript:if(this.value==''){this.value=this.defaultValue;}" onFocus="javascript:if(this.value==this.defaultValue){this.value='';}" />
				<input type="text" value="Enter Email Address" class="txtfield" onBlur="javascript:if(this.value==''){this.value=this.defaultValue;}" onFocus="javascript:if(this.value==this.defaultValue){this.value='';}" />
				<input type="submit" value="" class="button" />
			</form>
		</div>
		<span class="footnote">&copy; Copyright &copy; 2011. All rights reserved</span>
	</div> <!-- /#footer -->
	

		  
		  
	
</body>
</html>