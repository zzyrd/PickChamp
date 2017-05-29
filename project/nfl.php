<?php
	session_start();
?>
<html>
<head>
<!--  I USE BOOTSTRAP BECAUSE IT MAKES FORMATTING/LIFE EASIER -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"><!-- Optional theme -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script><!-- Latest compiled and minified JavaScript -->
<title>Pick Champ Data Management System</title>
</head>

<body>
<table width="1359" border="0">
  <tr>
    <td colspan="2"><img src="PICK-CHAMP-HEADER.jpg" width="1260" height="240" /></td>
  </tr>
  <tr>
    <td width="220" height="38" bgcolor="#000000"><div align="center"><a href="http://pickchamp.co/" rel="home"><font size="4" color="LawnGreen"><strong>Pick Champ</strong></font></a></div></td>
    <td width="919" bgcolor="#000000"><div align="right">
    <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
	<a href="pick.php" class="btn btn-success">MAIN</a>
	<a href="nfl.php" class="btn btn-success">NFL</a>
	<a href="nhl.php" class="btn btn-success">NHL</a>
	<a href="mlb.php" class="btn btn-success">MLB</a>
   <input class=" btn btn-success" type="submit" name="logout" value="Logout"/>
   <a href="password.php" class="btn btn-success">Change passward</a>
   </form>
   
   
   
    
    
    </div></td>
  </tr>
  <tr>
    <td height="362" bgcolor="#000000">&nbsp;</td>
    <td>
    
    
    
    
    <div class="container">
    
       <?php
        if($_SESSION['islogin']!='1')
				{
					header("Location: index.php");
					exit;
				}
				
				echo $_SESSION['username'];
				
				if(isset($_POST['logout']))
				{
					$link = mysqli_connect("us-cdbr-azure-central-a.cloudapp.net","b4c7b9a31c031e","6b55f895","pickcham-zgjmyy") or die ("Connection Error " . mysqli_error($link));
					date_default_timezone_set("America/Chicago");
							$time2=date('Y-m-d H:i:s');
					$query2='UPDATE logins SET time_of_logout="' . $time2 . '" WHERE userName = "' . $_SESSION['username'].'";';
							$query3='UPDATE logins SET logoutTimes=logoutTimes+1 WHERE userName = "' . $_SESSION['username'].'";';
							mysqli_query($link, $query2);
							mysqli_query($link, $query3);
					
					
					
					// remove all session variables
					session_unset();
					// destroy the session
					session_destroy();
					//echo 'You logged out!';
					header("Location: index.php");
					
					
					
				}
			
				?>
               <br>NFL PICKS</br>
			<br><a href="nfl_w14.php" class="btn btn-success">WEEK14</a></br>
			<br><a href="nfl_w15.php" class="btn btn-success">WEEK15</a></br>
			<br><a href="nfl_w16.php" class="btn btn-success">WEEK16</a></br>
    
    
    
    
    
    </td>
  </tr>
</table>
</body>
</html>
