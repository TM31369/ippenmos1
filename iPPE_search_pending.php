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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_kemaskiniteam = 15;
$pageNum_kemaskiniteam = 0;
if (isset($_GET['pageNum_kemaskiniteam'])) {
  $pageNum_kemaskiniteam = $_GET['pageNum_kemaskiniteam'];
}
$startRow_kemaskiniteam = $pageNum_kemaskiniteam * $maxRows_kemaskiniteam;

$con = mysql_connect("localhost","root","az123");
mysql_select_db(ippe, $con);
$query_kemaskiniteam = "SELECT * FROM ippe";
$query_limit_kemaskiniteam = sprintf("%s LIMIT %d, %d", $query_kemaskiniteam, $startRow_kemaskiniteam, $maxRows_kemaskiniteam);
$kemaskiniteam = mysql_query($query_limit_kemaskiniteam, $con) or die(mysql_error());
$row_kemaskiniteam = mysql_fetch_assoc($kemaskiniteam);

if (isset($_GET['totalRows_kemaskiniteam'])) {
  $totalRows_kemaskiniteam = $_GET['totalRows_kemaskiniteam'];
} else {
  $all_kemaskiniteam = mysql_query($query_kemaskiniteam);
  $totalRows_kemaskiniteam = mysql_num_rows($all_kemaskiniteam);
}
$totalPages_kemaskiniteam = ceil($totalRows_kemaskiniteam/$maxRows_kemaskiniteam)-1;

$queryString_kemaskiniteam = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_kemaskiniteam") == false && 
        stristr($param, "totalRows_kemaskiniteam") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_kemaskiniteam = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_kemaskiniteam = sprintf("&totalRows_kemaskiniteam=%d%s", $totalRows_kemaskiniteam, $queryString_kemaskiniteam);
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
.style126 {font-weight: bold; font-style: italic; color: #FF0000;}
.style15 {font-family: "Times New Roman", Times, serif; font-size: medium; font-weight: bold; }
.style17 {font-family: "Times New Roman", Times, serif; font-size: medium; }
.style18 {font-weight: bold; font-family: "Times New Roman", Times, serif;}
.style20 {
	font-weight: bold;
	font-size: large;
}
-->
    </style>
</head>

<body>
<!-- /#header -->
<!-- /#adbox -->
<div id="contents">
  <div class="body style14">
    <form name="form1" method="post" action="">
      <div class="style20" id="header">
        <div align="center"><img src="logo ippe.png" width="838" height="198">
          <ul id="css3menu1" class="topmenu">
            <li class="topfirst"><a href="home.php" title="Home" style="height:18px;line-height:18px;">Home</a></li>
            <li><a href="iPPE_search_completed.php" title="View Data" style="height:18px;line-height:18px;">View Data</a></li>
            <li><a href="iPPE_search_pending.php" title="Update Data" style="height:18px;line-height:18px;">Update Data</a></li>
            <li><a href="load_excel.php" title="Download File" style="height:18px;line-height:18px;">Download File</a></li>
            <li><a href="training.php" title="Training" style="height:18px;line-height:18px;">Training</a></li>
            <li><a href="contact.php" title="Contact" style="height:18px;line-height:18px;">Contact</a></li>
            <li class="toplast"><a href="iPPE_login.php" title="Logout" style="height:18px;line-height:18px;">Logout</a></li>
          </ul>
          <img src="TM_LOGO.png" width="111" height="53"></div>
      </div>
      <div align="center" class="style20">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>UPDATE PERSONAL PROTECTIVE EQUIPMENT      </p>
      </div>
      <table width="867" border="1" 
align="center" cellpadding
="5px" cellspacing="1" style=" border:1px solid silver">
        
        <tr>
          <td width="198">&nbsp;</td>
          <td width="518"><p class="style17"><span class="style18">IC Number </span>
              <input type="text" name="search" size="30" />
              <span class="style126">
                  <input name="submit" type="submit" value="Search" />
              </span></p>          </td>
          <td width="109">&nbsp;</td>
        </tr>
        <tr bgcolor="#666666" style="color:#FFFFFF">
          <td><div align="center" class="style17"><strong>IC Number </strong></div></td>
          <td><div align="center" class="style15">Employee Name </div></td>
          <td><div align="center" class="style17"><strong>Update</strong><strong>
            <? 
$search=$_POST["search"]; 
$flag=0; 
$query="select * from ippe where id like '%$search%' "; 
$result=mysql_query($query); 
                         while ($row = mysql_fetch_array($result)) { $flag=1;
                        echo "<tr ><td>",$row[0],"</td>
						 
						 <td>",$row[1],"</td>
						  
<td><a href='iPPE_update.php?id=",$row[0],"'><center><img src='pencil.png'></center></a>"; 
                         } 
                         if($flag==0) 
                         echo "<tr><td colspan='3' align='center' style='
color:red'>Record not 
found</td></tr>"; 
?>
          </strong></div></td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
      </table>
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
  <span class="footnote">Develop by Nurhayati Binti Othman | NMOS CFx &copy; Copyright &copy; 2011. All rights reserved</span> </div>
<!-- /#footer -->
</body>
</html>