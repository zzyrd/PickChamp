<?php
	session_start();
?>
<html>
<head>
    <title>Pick Champ Data Management System</title>
    <!--  I USE BOOTSTRAP BECAUSE IT MAKES FORMATTING/LIFE EASIER -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"><!-- Optional theme -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script><!-- Latest compiled and minified JavaScript -->
    <script type="text/javascript" src="js/highcharts.js"></script>
    <script type="text/javascript" src="js/chart.js"></script>
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
    <a href="insert.php" class="btn btn-success">Insert Team</a>
    <a href="insert2.php" class="btn btn-success">Insert Game</a>
   <input class=" btn btn-success" type="submit" name="logout" value="Logout"/>
   <a href="password.php" class="btn btn-success">Change passward</a>
   <?php
   //var_dump($_SESSION['usertype']);exit;
   if($_SESSION['usertype']=='a')
				{
					echo '<a href="register.php" class="btn btn-warning">New staff</a>';
					echo '<a href="manage.php" class="btn btn-warning">User management</a>';
				}
				?>
   
   
   </form>
   
   
    
    
    </div></td>
  </tr>
  <tr>
    <td height="362" valign="top" bgcolor="#000000">
    <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
    <!--<div align="center"><a href="#" onclick="javascript:alert('To be continued.')"><font size="4" color="White"><strong>Sort data by profile characteristics</strong></font><br><br></a></div>-->
    <div align="center"><a href="statistics.php" rel="home"><font size="4" color="White"><strong>Sort and filter data by sports team or user</strong></font><br><br></a></div>
    <!--<div align="center"><a href="#" onclick="javascript:alert('To be continued.')"><font size="4" color="White"><strong>General user statistics</strong></font><br><br></a></div>-->
    <!--<div align="center"><a href="javascript:document.dataform.submit()"><font size="4" color="White"><strong>User activity graph</strong></font><br><br></a></div>-->
    <!--<div align="center"><input class=" btn btn-success" type="submit" name="echo" value="User activity graph"/><br><br></a></div>-->
    
    </form>
    
    </td>
    <td>
    
    
    
    <div class="container">
			
			<?php
				
					
					//$link = mysqli_connect("us-cdbr-azure-central-a.cloudapp.net","b29047e64d24dd","41d9265c","cs3380-cgkdb") or die ("Connection Error " . mysqli_error($link));
					


					
				/*		
				if($_SESSION['islogin']!='1')
				{
					header("Location: index.php");
					exit;
				}
				*/
				if($_SESSION['usertype']=='a')
				{
					echo ' Welcome Admin! You have super privileges';
				}
				elseif($_SESSION['usertype']=='s')
				{
					echo 'Welcome ' . $_SESSION['username'] . '!';
				}
				else
				{
					header("Location: index.php");
					exit;
				}
						
						
   				//if(isset($_POST['echo']))
				//{
                                    ?>
                                        <div id="charts"></div>
                                    <?php
					//echo '<img src="chart.jpg" width="1200" height="800">';
				//}
					
				
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
           
		</div>
    
    
    
    
    </td>
  </tr>
</table>
</body>
</html>
