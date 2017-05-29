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
    
   
   
   
   
    
    
    </div></td>
  </tr>
  <tr>
    <td height="362" bgcolor="#000000">&nbsp;</td>
    <td>
    
    
    
    
    <div class="container">
        <?php
		/*
        if($_SESSION['usertype']!='a')
		{
			echo 'Insufficient permissions<br/><a href="main.php" class="btn btn-primary">Return</a>';
			exit;
		}
		*/
				?>
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-3"></div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<h2>Create a user</h2>
					<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
						<div class="row form-group">
                        		<label class='inputdefault'>User Name</label>
								<input class='form-control' type="text" name="username" placeholder="username">
						</div>
						<div class="row form-group">
                        		<label class='inputdefault'>Password</label>
								<input class='form-control' type="password" name="password" placeholder="password">
						</div>
						<div class="row form-group">
								<input class=" btn btn-info" type="submit" name="submit" value="Register"/>
                                <a href="index.php" class="btn btn-primary">Back</a>
						</div>
					</form>
                    
				</div>
			</div>
			<?php
				if(isset($_POST['submit'])) { // Was the form submitted?
					
					$link = mysqli_connect("us-cdbr-azure-central-a.cloudapp.net","b4c7b9a31c031e","6b55f895","pickcham-zgjmyy") or die ("Connection Error " . mysqli_error($link));
					$sql = "INSERT INTO users(usertype,username,salt,hashed_password) VALUES ('c',?,?,?)";
					if ($stmt = mysqli_prepare($link, $sql)) {
						$user = $_POST['username'];
						$salt = mt_rand();
						$hpass = sha1($salt.$_POST['password'])  or die("bind param"); 
						mysqli_stmt_bind_param($stmt, "sss", $user, $salt, $hpass) or die("bind param");
						if(mysqli_stmt_execute($stmt)) {
							echo "<h4>Success</h4>";
						} else {
							echo "<h4>Failed</h4>";
						}
						
						
						$query2='INSERT INTO logins(username) VALUES("' . $_POST['username'].'");';
						mysqli_query($link, $query2);
						
					} else {
						die("prepare failed");
					}
				}
			?>
		</div>
    
    
    
    
    
    </td>
  </tr>
</table>
</body>
</html>
