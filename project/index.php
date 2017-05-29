<?php
	if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) { // if request is not secure, redirect to secure url
	   $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	   header('Location: ' . $url);
	    //exit;
	}
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
    
   
   
   
   
    
    
    </div></td>
  </tr>
  <tr>
    <td height="362" bgcolor="#000000">&nbsp;</td>
    <td>
    
    
    
    
    <div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-3">
				
                 
							
                            </div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<h2>Login</h2>
					<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
						<div class="row form-group">
								<input class='form-control' type="text" name="username" placeholder="username">
						</div>
						<div class="row form-group">
								<input class='form-control' type="password" name="password" placeholder="password">
						</div>
						<div class="row form-group">
								<input class=" btn btn-info" type="submit" name="submit" value="Login"/>
                                <a href="register2.php" class="btn btn-warning">Register</a>
                                <!--<input class=" btn btn-info" type="submit" name="logout" value="Logout"/>-->
						</div>
					</form>
                    <!--<a href="register.php" class="btn btn-primary">New user</a>-->
				</div>
                
			</div>
			<?php
			
							//echo("Hello".$time2);
				if(isset($_POST['submit'])) { // Was the form submitted?
					
					$link = mysqli_connect("us-cdbr-azure-central-a.cloudapp.net","b4c7b9a31c031e","6b55f895","pickcham-zgjmyy") or die ("Connection Error " . mysqli_error($link));
					






					/*
					$sql = 'SELECT salt, hashed_password FROM users WHERE username = $1';
					if ($stmt = mysqli_prepare($link, $sql)) {
						mysqli_stmt_bind_param($stmt, "s", $_POST['username']);
						mysqli_stmt_execute($stmt) or die("execute");
					}
					$result = mysqli_stmt_get_result($stmt);
					*/
					
					$sql = 'SELECT salt, hashed_password, usertype FROM users WHERE username = "';
					$query=$sql . $_POST['username'].'";';
					$result = mysqli_query($link, $query);
						$row = mysqli_fetch_assoc($result);
						$localhash = sha1( $row['salt'] . $_POST['password'] );
						if ($localhash == $row['hashed_password'])
						{
							echo 'You logged in!';
							// Set session variables
							$_SESSION['username'] = $_POST['username'];
							$_SESSION['usertype'] = $row['usertype'];
							$_SESSION['islogin'] = '1';
							
							
							//set time
							//date_default_timezone_set("America/Chicago");
							//$time=date('Y-m-d H:i:s');
							//echo("Hello".$time);
							//$sql2='UPDATE logins SET time_of_login=" WHERE userName = "';
							//=$sql2 . $_POST['username'].'";';
							
							date_default_timezone_set("America/Chicago");
							$time2=date('Y-m-d H:i:s');
							$query2='UPDATE logins SET time_of_login="' . $time2 . '" WHERE userName = "' . $_POST['username'].'";';
							$query3='UPDATE logins SET loginTimes=loginTimes+1 WHERE userName = "' . $_POST['username'].'";';
							mysqli_query($link, $query2);
							mysqli_query($link, $query3);
							
							
							
							
							
							
							/*
							if($_SESSION['usertype']=='a')
							{
								echo ' Welcome Admin! You have super privileges';
							}
							else
							{
								echo 'Welcome ' . $_SESSION['username'] . '!';
							}
							*/
							//echo '<br><input class=" btn btn-info" type="logout" name="logout" value="Logout"/>';
							
							if($_SESSION['usertype']=='c')
							{
								header("Location: pick.php");
							}
							else
							{
								header("Location: main.php");/////////////////////////////
							}
							
						}
						else
						{
							echo 'Password error!';
							/*
							echo $row['hashed_password'];
							echo '<br>';
							echo $localhash;
							echo '<br>';
							echo $_SESSION['usertype'];
							*/
						}
						/*
						if($_SESSION['islogin']=='1')
							{
								echo ' <input class=" btn btn-info" type="submit" name="logout" value="Logout"/>';
							}
						*/
						
   
    
					
				}
				/*
				if(isset($_POST['logout']))
				{
					// remove all session variables
					session_unset();
					// destroy the session
					session_destroy();
					echo 'You logged out!';
				}
				*/
			?>
		</div>
    
    
    
    
    
    </td>
  </tr>
</table>
</body>
</html>
