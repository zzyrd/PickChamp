<!--Name ZHIHAO ZHANG
    ID 14192560
    CS3380
-->
<?php
    //connect to db
 $link = mysqli_connect("us-cdbr-azure-central-a.cloudapp.net", "b4c7b9a31c031e", "6b55f895", "pickcham-zgjmyy") or die("Connect Error ". mysqli_error($link));
 $sql = "SELECT leagueName FROM sport ORDER BY leagueName ASC";
  $result = mysqli_query($link,$sql);
//no table was provided, display error message
function fail() {
	header("Location: fail.php");
}
//display editable textbox for attribute $key
function printInput($key) {
	echo "<div class='form-group'>";
	echo "<label class='inputdefault'>".$key."</label>";
	echo "<input class='form-control' type='text' name='".$key."' value='' required>";
	echo "</div>";
}
//display selection for choosing countrycode
function printSelection($key, $value){
    echo "<div class='form-group'>";
	echo "<label class='inputdefault'>".$key."</label>";
	echo "<select name='".$key."'>";
	$selected = $_POST[$key];
	while($row = mysqli_fetch_assoc($value)){
             foreach($row as $k => $field) {
              if($selected == $field){
                 echo "<option value='".$field."'selected>".$field."</option>";  
               }
               else{
		             echo "<option value='".$field."'>".$field."</option>";  
		      }
	        }  
	  }
	     
     echo "</select> ";
}
//editable form for inserting new record into the city table
function displayOptionOfCity($result) {
    echo "<h2>Save new record to the Team table...</h2>";
    printInput('TeamName');
	printSelection("League", $result);
	echo "<br>";
	echo "<br>";
	echo "<input class='btn btn-info' type='submit' name='save' value='SAVE'> ";
	echo "<a class='btn btn-danger' href='main.php'>BACK</a>";	
	
}
//Save new record into city table
function saveRecord() {
	global $link;
	$param = $_POST['League'];
	$query ="SELECT leagueName FROM sport Where leagueName = ?";
	//
	if ($stmt = mysqli_prepare($link, $query)) {//prepare successful
		mysqli_stmt_bind_param($stmt, "s", $param) or die("bind param");
		
		if(mysqli_stmt_execute($stmt)) {//execute successful
		 
			 mysqli_stmt_bind_result($stmt, $leagueName);
			 while (mysqli_stmt_fetch($stmt)){
			  $League = $leagueName;
			 }
		} else { 
		    
			fail(); 
		} 
	   mysqli_stmt_close($stmt);	
	}else { //prepare failed
	  
		fail(); 
	} 
	
	$sql = "INSERT INTO team VALUES(?,?)";
	if ($stmt = mysqli_prepare($link, $sql)) {//prepare successful
		mysqli_stmt_bind_param($stmt, "ss", $_POST['TeamName'], $League) or die("bind param");
		if(mysqli_stmt_execute($stmt)) {//execute successful
			echo "<h2>Successfully insert Record</h2>";
		} else {
		   
			fail(); 
		} 
	   mysqli_stmt_close($stmt);	
	}else { //prepare failed
	   
		fail(); 
	} 
	
}
?>
<html>
	<head>
		<!--  I USE BOOTSTRAP BECAUSE IT MAKES FORMATTING/LIFE EASIER -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"><!-- Optional theme -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script><!-- Latest compiled and minified JavaScript -->
	</head>
	<body>
		<div class="container">
           <form action = "insert.php" method="POST">    
        
           <?php

                  displayOptionOfCity($result);
                  if(isset($_POST['save'])){
                       saveRecord();
                  }

        ?>
        </form>
		</div>
	</body>
</html>
<?php
    mysqli_close($link);
?>