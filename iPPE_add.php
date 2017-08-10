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
 FBH_Trained=%s,  Safety_Shoe=%s,  Ladder=%s, Year_Received_Safety_Helmet=%s, Year_Received_Safety_Vest=%s,  Year_Received_FBH=%s,  Year_Trained_FBH=%s, 
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 TransitioCentral//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitioCentral.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" href="setting button_files/css3menu1/style.css" type="text/css" />
<!-- TemplateBeginEditable name="doctitle" -->
<title>Untitled Document</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" --><!-- TemplateEndEditable -->
<style type="text/css">
<!--
body {
	background-image: url(1%20(22).jpeg);
	background-image: url(green-network-wallpaper-abstract-wallpapers-green-abstract-wallpaper-1920x1080-feature-wall-uk-for-home-homebase-border-design-wallpapers-free-download-next.jpg);
	background-repeat: repeat;
}
.style7 {font-size: 36px; font-weight: bold; }
.style69 {
	font-size: 14px;
	font-weight: bold;
}
.style80 {font-size: 14px}
.style81 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style83 {color: #990000}
.style84 {
	font-family: "Courier New", Courier, monospace;
	font-weight: bold;
}
.style85 {font-family: Georgia; }
.style3 {color: #FF0000}
.style97 {
	font-style: italic;
	font-weight: bold;
	color: #000066;
	font-size: xx-large;
	font-family: "Times New Roman", Times, serif;
}
.style90 {font-family: "Courier New", Courier, monospace}
.style100 {
	font-size: 10px;
	color: #FF0000;
	font-style: italic;
}
.style123 {	color: #CC0000;
	font-weight: bold;
	font-size: 14px;
}
.style125 {font-size: 10}
-->
</style>
</head>

<body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="967" height="409" border="1" align="center" bordercolor="#999999" bgcolor="#999999">
 <tr bgcolor="#FFFFCC">
    <td width="905" class="style24"><div align="right" class="style81">
        <p>&nbsp;</p>
      <p align="center" class="style34"><span class="style97">ADD NEW STAFF </span></p>
      <p align="center" class="style34"><br />
      </p>
    </div></td>
  </tr>
  <tr>
    <td height="233" bgcolor="#FFFFCC"><form action="iPPE_add_run.php" method="post" name="form1" class="style85" id="form1">
      <p><span class="style69">
          <input type="hidden" name="id" value="<?php echo $row_kemaskiniteam['id']; ?>" />
        <input type="hidden" name="MM_update" value="form1" />
      </span><span class="style69"> </span></p>
      <table width="846" height="365" border="0" align="center" bordercolor="#000000" class="style7">
        <tr valign="baseline">
          <td height="27" class="style183"><div align="left" class="style217 style80">I/C Number </div></td>
          <td class="style183"><div align="left" class="style217 style80">:</div></td>
          <td class="style183"><div align="left" class="style217 style80 style83">
            <label>
            <input name="id" type="text" id="id" maxlength="12" />
            </label>
            <span class="style217 style80 style85"> <span class="style100">*911222107777</span></span></div></td>
          </tr>
        <tr valign="baseline">
          <td height="25" class="style183"><div align="left" class="style217 style80">Name Employee </div></td>
          <td class="style183"><div align="left" class="style217 style80">:</div></td>
          <td class="style183"><div align="left" class="style217 style80">
              <input name="Employee" type="text" id="Employee" />
          </div></td>
        </tr>
        <tr valign="baseline">
          <td height="25" class="style183"><div align="left" class="style217 style80">Gender</div></td>
          <td class="style183"><div align="left" class="style217 style80">:</div></td>
          <td class="style183"><div align="left" class="style217 style80">
            <label>
            <input name="Gender" type="radio" id="Gender" value="Male" />
            Male</label>
            <label>
<input name="Gender" type="radio" id="Gender" value="Female" />            
Female</label>
          </div></td>
          </tr>
        <tr valign="baseline">
          <td width="230" height="26" class="style183"><div align="left" class="style217 style80">Staff No </div></td>
          <td width="10" class="style183"><div align="left" class="style217 style80">:</div></td>
          <td width="592" class="style100"><div align="left" class="style102 style217 style125 style3"><em>
              <input name="Staff_No" type="text" id="Staff_No" />
              <span class="style217 style2 style5">*TM322222</span></em></div></td>
        </tr>
        <tr valign="baseline">
          <td height="27" class="style183"><div align="left" class="style217 style80">Rept To </div></td>
          <td class="style183"><div align="left" class="style217 style80">:</div></td>
          <td class="style100"><div align="left" class="style102 style217 style125 style3"><em>
              <input name="Rept_To2" type="text" id="Rept_To2" />
              <span class="style217 style85"> <span class="style5">*example : Manager </span></span></em></div></td>
        </tr>
        <tr valign="baseline">
          <td height="25" class="style183"><div align="left" class="style217 style80">Positions</div></td>
          <td class="style183"><div align="left" class="style217 style80">:</div></td>
          <td class="style100"><div align="left" class="style102 style217 style125 style3"><em>
              <input name="Positions2" type="text" id="Positions2" />
              <span class="style217 style2 style5">*Pembantu Pegawai Teknik</span></em></div></td>
        </tr>
        <tr valign="baseline">
          <td height="26" class="style183"><div align="left" class="style217 style80">Organizational Unit</div></td>
          <td class="style183"><div align="left" class="style217 style80">:</div></td>
          <td class="style100"><div align="left" class="style102 style217 style125 style3"><em>
              <input name="Organizational_unit2" type="text" id="Organizational_unit2" />
              <span class="style217 style2 style5">*Workteam ENZ Gombak</span></em></div></td>
        </tr>
        <tr valign="baseline">
          <td height="27" class="style183"><div align="left" class="style217 style80"> Cost Center</div></td>
          <td class="style183"><div align="left" class="style217 style80">:</div></td>
          <td class="style100"><div align="left" class="style102 style217 style125 style3"><em>
              <input name="Cost_Center2" type="text" id="Cost_Center2" />
              <span class="style217 style2 style5"><span class="style217 style5">*WPBB1G</span></span></em></div></td>
        </tr>
        <tr valign="baseline" class="style101">
          <td height="25" class="style183"><div align="left" class="style217 style80">Executive Or Non Executive</div></td>
          <td class="style183"><div align="left" class="style217 style80">:</div></td>
          <td class="style5"><div align="left" class="style217 style80 style2 style9 style5">
              <select name="Executive_Non_Executive" id="Executive_Non_Executive">
               <option value=""> Select Executive or Non Executive</option>
                <option value="Executive">Executive</option>
                <option value="Non Executive">Non Executive</option>
              </select>
          </div></td>
        </tr>
        <tr valign="baseline" class="style101">
          <td height="26" class="style183"><div align="left" class="style217 style80">State </div></td>
          <td class="style183"><div align="left" class="style217 style80">:</div></td>
          <td class="style5"><div align="left" class="style217 style80 style2 style9 style5">
              <label></label>
              <select name="State" id="State">
             	  <option value=""> Select State</option>
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
              </span></div></td>
        </tr>
        <tr valign="baseline" class="style101">
          <td height="19" class="style183"><span class="style217 style80">Unit </span></td>
          <td class="style183"><span class="style217 style80">:</span></td>
          <td class="style5"><div align="left" class="style217 style80 style2 style9 style5">
              <select name="Unit" id="Unit">
                <option value="">Select Unit</option>
                <option value="JCC">JCC</option>
                <option value="DDZ">DDZ</option>
                <option value="SDZ">SDZ</option>
                <option value="ENZ">ENZ</option>
                <option value="FINANCE">FINANCE</option>
                <option value="BSQM">BSQM</option>
                <option value="CNZ">CNZ</option>
              </select>
          </div></td>
        </tr>
        <tr valign="baseline" class="style101">
          <td height="19" class="style183"><span class="style217 style80">Function </span></td>
          <td class="style183"><span class="style217 style80">:</span></td>
          <td class="style183"><div align="left" class="style217 style80"><span class="style217 style90 style94"> </span>
                  <input name="Function" type="text" id="Function" />
                  <span class="style5 style9 style2 style217"><em><span class="style100">*Assurance HSBB Team</span></em></span></div></td>
        </tr>
        <tr valign="baseline" class="style101">
          <td height="19" class="style183"><div align="left" class="style217 style80 style85">
              <p>Zone</p>
          </div></td>
          <td class="style183"><div align="left" class="style217 style80 style85">
              <p>:</p>
          </div></td>
          <td class="style183"><div align="left" class="style217 style80 style85"><span class="style217 style80 style85 style2 style9 style5">
              <select name="Zone" id="Zone">
         	  <option value=""> Select Zone</option>
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
                <option value="Nusajaya &amp; Pontian">Nusajaya &amp; Pontian</option>
                <option value="Pandan"> Pandan</option>
                <option value="Pelangi"> Pelangi</option>
                <option value="Segamat"> Segamat</option>
                <option value="Senai &amp; Kulai">Senai &amp; Kulai</option>
                <option value="Skudai"> Skudai</option>
                <option value="Tampoi"> Tampoi</option>
              </select>
          </span></div></td>
        </tr>
        <tr valign="baseline" class="style101">
          <td height="19" class="style183"><div align="left" class="style217 style80">
              <p>Regional</p>
          </div></td>
          <td class="style183"><div align="left" class="style217 style80">
              <p>:</p>
          </div></td>
          <td class="style183"><div align="left" class="style217 style80 style85">
              <p><span class="style217 style94">
                <label></label>
                </span><span class="style217 style94">
                <select name="State_type" id="State_type">
				  <option value=""> Select Regional</option>
                  <option value="Central Funtion">Central Funtion</option>
                  <option value="Central">Central</option>
                  <option value="Southern">Southern</option>
                  <option value="Northern">Northern</option>
                  <option value="Eastern">Eastern</option>
                  <option value="Sabah">Sabah</option>
                  <option value="Sarawak">Sarawak</option>
                
                </select>
                </span></p>
          </div></td>
        </tr>
      </table>
      <p>
        <label for="checkbox"></label>
        <label for="label5"></label>
      </p>
      <div align="center">
        <p>
          <input name="Submit" type="submit" class="style69" value="ADD STAFF" />
        </p>
      </div>
    </form></p></td>
  </tr>
  <tr bgcolor="#FFFFCC">
    <td height="23" class="style24"><div align="right"><a href="iPPE_login.php" class="style84"></a>
      <form id="form2" method="post" action="iPPE_login.php">
        <label>
        <div align="center">
          <p>
            <input name="Submit2" type="submit" class="style69" value="BACK" />
          </p>
          <p>&nbsp;</p>
          <p><span class="style123"><a href="home.php"></a></span> </p>
        </div>
        </form>
      </div></td>
  </tr>
</table>
<p align="right"><a href="iPPE_search.php.php" class="style84"></a></p>
<p>&nbsp;</p>
<div align="center"></div>
<div align="center"></div>

		  
		  
</body>
</html>
