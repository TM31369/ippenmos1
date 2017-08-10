<?php

include("function/func.php");
include("function/dbconn.php");

if($_POST['loginBtn2'])
{


$loginStmt="select * from password where staffID='".$_POST["ID2"]."' and password='".$_POST["password2"]."'";
	$loginDb=getResult($loginStmt,$dbc);
	echo $loginNumRows=mysql_num_rows($loginDb);

	if($loginNumRows>0)
	{
		$fetchLogin=mysql_fetch_array($loginDb);
				
		
		switch($fetchLogin["status"])
		{	
				case 'bpqsippe':
				$_SESSION['name']=$fetchLogin["name"];
				$_SESSION['status']=$fetchLogin["status"];
				$url="home.php";
				echo"<script>window.confirm(\"WELCOME TO i-PPE NMO PORTAL....HAVE A NICE DAY\");</script>";
	echo"<script>window.location=\"$url\"</script>";
				
				
				  break;
				  
				
				  
				
				case 'johor':
				$_SESSION['name']=$fetchLogin["name"];
				$_SESSION['status']=$fetchLogin["status"];
				
				$url="home_johor.php";
				echo"<script>window.confirm(\"WELCOME TO i-PPE NMO PORTAL....HAVE A NICE DAY\");</script>";
	echo"<script>window.location=\"$url\"</script>";
				  break;
				  
				
				case 'kedah':
				$_SESSION['name']=$fetchLogin["name"];
				$_SESSION['status']=$fetchLogin["status"];
				
				$url="home_kedah.php";
				echo"<script>window.confirm(\"WELCOME TO i-PPE NMO PORTAL....HAVE A NICE DAY\");</script>";
	echo"<script>window.location=\"$url\"</script>";
				  break;
				  

				case 'kelantan':
				$_SESSION['name']=$fetchLogin["name"];
				$_SESSION['status']=$fetchLogin["status"];
				
				$url="home_kelantan.php";
				echo"<script>window.confirm(\"WELCOME TO i-PPE NMO PORTAL....HAVE A NICE DAY\");</script>";
	echo"<script>window.location=\"$url\"</script>";
				  break;
				
 
				case 'kl':
				$_SESSION['name']=$fetchLogin["name"];
				$_SESSION['status']=$fetchLogin["status"];
				
				$url="home_kl.php";
				echo"<script>window.confirm(\"WELCOME TO i-PPE NMO PORTAL....HAVE A NICE DAY\");</script>";
	echo"<script>window.location=\"$url\"</script>";
				  break;
				  
				  
				  
 
				case 'melaka':
				$_SESSION['name']=$fetchLogin["name"];
				$_SESSION['status']=$fetchLogin["status"];
				
				$url="home_melaka.php";
				echo"<script>window.confirm(\"WELCOME TO i-PPE NMO PORTAL....HAVE A NICE DAY\");</script>";
	echo"<script>window.location=\"$url\"</script>";
				  break;
				  

				case 'n9':
				$_SESSION['name']=$fetchLogin["name"];
				$_SESSION['status']=$fetchLogin["status"];
				
				$url="home_n9.php";
				echo"<script>window.confirm(\"WELCOME TO i-PPE NMO PORTAL....HAVE A NICE DAY\");</script>";
	echo"<script>window.location=\"$url\"</script>";
				  break;
				  

				case 'pp':
				$_SESSION['name']=$fetchLogin["name"];
				$_SESSION['status']=$fetchLogin["status"];
				
				$url="home_pp.php";
				echo"<script>window.confirm(\"WELCOME TO i-PPE NMO PORTAL....HAVE A NICE DAY\");</script>";
	echo"<script>window.location=\"$url\"</script>";
				  break;
				  

				case 'pahang':
				$_SESSION['name']=$fetchLogin["name"];
				$_SESSION['status']=$fetchLogin["status"];
				
				$url="home_pahang.php";
				echo"<script>window.confirm(\"WELCOME TO i-PPE NMO PORTAL....HAVE A NICE DAY\");</script>";
	echo"<script>window.location=\"$url\"</script>";
				  break;
				  

				case 'perak':
				$_SESSION['name']=$fetchLogin["name"];
				$_SESSION['status']=$fetchLogin["status"];
				
				$url="home_perak.php";
				echo"<script>window.confirm(\"WELCOME TO i-PPE NMO PORTAL....HAVE A NICE DAY\");</script>";
	echo"<script>window.location=\"$url\"</script>";
				  break;
				  
				  
				  
				case 'perlis':
				$_SESSION['name']=$fetchLogin["name"];
				$_SESSION['status']=$fetchLogin["status"];
				
				$url="home_perlis.php";
				echo"<script>window.confirm(\"WELCOME TO i-PPE NMO PORTAL....HAVE A NICE DAY\");</script>";
	echo"<script>window.location=\"$url\"</script>";
				 
				  break;
				  
				  case 'sabah':
				$_SESSION['name']=$fetchLogin["name"];
				$_SESSION['status']=$fetchLogin["status"];
				
				$url="home_sabah.php";
				echo"<script>window.confirm(\"WELCOME TO i-PPE NMO PORTAL....HAVE A NICE DAY\");</script>";
	echo"<script>window.location=\"$url\"</script>";
				 
				  break;
				  
				  
				  case 'sarawak':
				$_SESSION['name']=$fetchLogin["name"];
				$_SESSION['status']=$fetchLogin["status"];
				
				$url="home_sarawak.php";
				echo"<script>window.confirm(\"WELCOME TO i-PPE NMO PORTAL....HAVE A NICE DAY\");</script>";
	echo"<script>window.location=\"$url\"</script>";
				 
				  break;
				  
				  
				  case 'selangor':
				$_SESSION['name']=$fetchLogin["name"];
				$_SESSION['status']=$fetchLogin["status"];
				
				$url="home_selangor.php";
				echo"<script>window.confirm(\"WELCOME TO i-PPE NMO PORTAL....HAVE A NICE DAY\");</script>";
	echo"<script>window.location=\"$url\"</script>";
				 
				  break;
				  
				  
				  case 'terengganu':
				$_SESSION['name']=$fetchLogin["name"];
				$_SESSION['status']=$fetchLogin["status"];
				
				$url="home_terengganu.php";
				echo"<script>window.confirm(\"WELCOME TO i-PPE NMO PORTAL....HAVE A NICE DAY\");</script>";
	echo"<script>window.location=\"$url\"</script>";
				 
				  break;
				  
				  
				  
				  case 'cyberjaya':
				$_SESSION['name']=$fetchLogin["name"];
				$_SESSION['status']=$fetchLogin["status"];
				
				$url="home_Cyberjaya.php";
				echo"<script>window.confirm(\"WELCOME TO i-PPE NMO PORTAL....HAVE A NICE DAY\");</script>";
	echo"<script>window.location=\"$url\"</script>";
				 
				  break;
				  
				default;
				
		}
	}
	else
	$url="iPPE_login.php";
	echo"<script>window.alert(\"WRONG PASSWORD OR STAFF ID\");</script>";
	
	redirect($url);
}
?>

