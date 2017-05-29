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
    <td width="819" bgcolor="#000000"><div align="right">
    
   
   <a href="main.php" class="btn btn-success">Back</a>
   
   
    
    
    </div></td>
  </tr>
  <tr>
    <td height="362" bgcolor="#000000">&nbsp;</td>
    <td>
    
    
    
    
    <div class="container">
    <?php
        if($_SESSION['usertype']!='a')
		{
			echo 'Insufficient permissions<br/><a href="main.php" class="btn btn-primary">Return</a>';
			exit;
		}
				?>
			<div class="row">
            
                    <table class="table table-hover">
				<thead>
					<tr>
						<th></th>
						<th>User Name</th>
                        <th>User Type</th>
					</tr>
				</thead>
                <?php
			$link = mysqli_connect("us-cdbr-azure-central-a.cloudapp.net","b4c7b9a31c031e","6b55f895","pickcham-zgjmyy") or die ("Connection Error " . mysqli_error($link));				
					$sql = 'SELECT username, usertype FROM users;';
					$stmt = mysqli_prepare($link, $sql);
					//$result = mysqli_query($link, $query);
					mysqli_stmt_execute($stmt);
   					/* bind variables to prepared statement */
    				mysqli_stmt_bind_result($stmt, $col1, $col2);
					while (mysqli_stmt_fetch($stmt)) {
		
							?>
				<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
					<!--<input type="hidden" name="table" value="city">-->
					<tr>
                        
						<?php
						if($col2!='a')
						{echo '<td><input class="btn btn-danger" type="submit" name="delete" value="Delete"></td>';}
						else
						{echo '<td><input class="btn btn-default" type="submit" name="" value="Can not delete"></td>';}
				        echo '<td><input type="hidden" name="userName" value="'.$col1.'">'. $col1.'</td>';
						if($col2=='a')
						{echo '<td><input type="hidden" name="userType" value="'.$col2.'">Administrator</td>';}
						elseif($col2=='s')
						{echo '<td><input type="hidden" name="userType" value="'.$col2.'">Staff</td>';}
						else
						{echo '<td><input type="hidden" name="userType" value="'.$col2.'">Client</td>';}
						
				            	
						?>
					</tr>
				</form>
			<?php
    					}
			?>
            
            </div>
            
           
		 <?php
				if(isset($_POST['delete'])) { // Was the form submitted?
    				$sql = "DELETE FROM users WHERE username=?";
					$sql2 = "DELETE FROM logins WHERE username=?";
					if ($stmt = mysqli_prepare($link, $sql) and $stmt2 = mysqli_prepare($link, $sql2)) {//prepare successful
						mysqli_stmt_bind_param($stmt, "s", $_POST['userName']) or die("bind param");
						mysqli_stmt_bind_param($stmt2, "s", $_POST['userName']) or die("bind param");
						if(mysqli_stmt_execute($stmt2) and mysqli_stmt_execute($stmt)) {//execute successful
							echo '<h2>Successfully Deleted Record</h2>';
						} else { 
							echo '<h2>Delete fail.</h2>';
							//echo $_POST['userName'];
						}
					} else { //prepare failed
						echo '<h2>Delete fail.</h2>';
					}
				}
   			?>
        
        
        </div>
    
    
    
    </td>
  </tr>
</table>
</body>
</html>
