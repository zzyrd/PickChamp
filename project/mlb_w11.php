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
                <form action = "mlb_w11.php" method="POST" >
			<table class="table table-hover" width= "800" border ="2" cellpadding = "2" cellspacing = "2" >
			<br>MLB 11<br>
			<br>Winner Picks<br>
			<br><img src="Logos/Chargers.png" width="200" height="200">Chargers<input type= 'radio' name= 'pick1' value = 'A' checked> <input type= 'radio' name= 'pick1' value = 'B' checked>Raiders<img src="Logos/Raiders.png" width="200" height="200"></br>
			<br><img src="Logos/Redskins.png" width="200" height="200">Redskins<input type= 'radio' name= 'pick2' value = 'A' checked> <input type= 'radio' name= 'pick2' value = 'B' checked>Eagles<img src="Logos/Eagles.png" width="200" height="200"></br>
			<br><img src="Logos/Colts.png" width="200" height="200">Colts<input type= 'radio' name= 'pick3' value = 'A' checked> <input type= 'radio' name= 'pick3' value = 'B' checked>Dolphins<img src="Logos/Dolphins.png" width="200" height="200"></br>
			<br><img src="Logos/Bears.png" width="200" height="200">Bears<input type= 'radio' name= 'pick4' value = 'A' checked> <input type= 'radio' name= 'pick4' value = 'B' checked>Buccaneers<img src="Logos/Buccaneers.png" width="200" height="200"></br>
			<br><img src="Logos/Browns.png" width="200" height="200">Browns<input type= 'radio' name= 'pick5' value = 'A' checked> <input type= 'radio' name= 'pick5' value = 'B' checked>Chiefs<img src="Logos/Chiefs.png" width="200" height="200"></br>
			<input class="btn btn-info" type="submit" name="submit" value = "submit">
			</table>
    
             <?php
                 $link = mysqli_connect("us-cdbr-azure-central-a.cloudapp.net", "b4c7b9a31c031e", "6b55f895", "pickcham-zgjmyy") or die("Connect Error ". mysqli_error($link));
                if(isset($_POST['submit'])){
					echo $_POST['pick1'];
					echo $_POST['pick2'];
					echo $_POST['pick3'];
					echo $_POST['pick4'];
					echo $_POST['pick5'];
					if($_POST['pick1'] == '' || $_POST['pick2'] == '' || $_POST['pick3'] == '' || $_POST['pick4'] == '' || $_POST['pick5'] == ''){
				       
				       echo "<h2>Please make your pick!</h2>";
				   }
				   else{
					$sql = "INSERT INTO pick VALUES(DEFAULT, ?, 'MLB', '11', ?, ?, ?, ?, ?);";
					if ($stmt = mysqli_prepare($link, $sql)) {//prepare successful
		               mysqli_stmt_bind_param($stmt, "ssssss", $_SESSION['username'], $_POST['pick1'], $_POST['pick2'], $_POST['pick3'], $_POST['pick4'], $_POST['pick5']) or die("bind param");

		              if(mysqli_stmt_execute($stmt)) {//execute successful
						echo "<h2>Successfully insert Record</h2>"; 
	                	} 
	                  else {
		                    echo "<h2>Execute error</h2>";
	                   }
	                        mysqli_stmt_close($stmt);	
	                 }
	                 else { //prepare failed
	                         echo "<h2>Prepare error</h2>";
                   	 } 
                   }	
			}
        ?>
              </form>
    
    
    </td>
  </tr>
</table>
</body>
</html>
