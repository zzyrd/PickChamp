<!--Name ZHIHAO ZHANG
    ID 14192560
    CS3380
-->
<?php
    //connect to db
 $link = mysqli_connect("us-cdbr-azure-central-a.cloudapp.net", "b4c7b9a31c031e", "6b55f895", "pickcham-zgjmyy") or die("Connect Error ". mysqli_error($link));

//no table was provided, display error message
function fail() {
	header("Location: fail.php");
}
//display editable textbox for attribute $key
function printInput($key) {

	if($key == "GameTime"){
	
	echo "<div class='form-group'>";
	echo "<label class='inputdefault'>".$key."</label>";
	echo "<input class='form-control' type='text' name='".$key."' value='' placeholder='yyyy-mm-dd hh:mm:ss' required>";
	echo "</div>";
	
	}
	else{
	  echo "<div class='form-group'>";
	  echo "<label class='inputdefault'>".$key."</label>";
	  echo "<input class='form-control' type='text' name='".$key."' value='' required>";
	  echo "</div>";
	
	}
}

//editable form for inserting new record into the city table
function displayOptionOfCity() {
    echo "<h2>Save new record to the Game table...</h2>";
    printInput('GameID');
    printInput('HomeTeam');
    printInput('GuestTeam');
    printInput('GameTime');
	echo "<br>";
	echo "<br>";
	echo "<input class='btn btn-info' type='submit' name='save' value='SAVE'> ";
	echo "<a class='btn btn-danger' href='main.php'>BACK</a>";	
	
}
//Save new record into city table
function saveRecord() {
	global $link;
    //insert into game table
	$sql = "INSERT INTO game VALUES(?,?,?,?)";
	if ($stmt = mysqli_prepare($link, $sql)) {//prepare successful
		mysqli_stmt_bind_param($stmt, "ssss", $_POST['GameID'], $_POST['HomeTeam'], $_POST['GuestTeam'], $_POST['GameTime']) or die("bind param");
		//mysqli_stmt_bind_param($stmt, "ssss", $_POST['GameID'], $_POST['HomeTeam'], $_POST['GuestTeam'], NOW()) or die("bind param");
		if(mysqli_stmt_execute($stmt)) {//execute successful
			echo "<h2>Successfully insert Record</h2>";
		} else {
		    echo "WRONG1";
		 
		} 
	   mysqli_stmt_close($stmt);	
	}else { //prepare failed
	    echo "WRONG2";
	
	} 

   //insert into team_game table
   $sql2 = "INSERT INTO team_game VALUES(?,?)";	
   if ($stmt = mysqli_prepare($link, $sql2)) {//prepare successful
		mysqli_stmt_bind_param($stmt, "ss", $_POST['HomeTeam'], $_POST['GameID']) or die("bind param");
		if(mysqli_stmt_execute($stmt)) {//execute successful
			echo "<h2>Successfully insert Record</h2>";
		} else {
		    echo "WRONG1";
		 
		} 
	   mysqli_stmt_close($stmt);	
	}else { //prepare failed
	    echo "WRONG2";
	
	}
	if ($stmt = mysqli_prepare($link, $sql2)) {//prepare successful
		mysqli_stmt_bind_param($stmt, "ss", $_POST['GuestTeam'], $_POST['GameID']) or die("bind param");
		if(mysqli_stmt_execute($stmt)) {//execute successful
			echo "<h2>Successfully insert Record</h2>";
		} else {
		    echo "WRONG1";
		 
		} 
	   mysqli_stmt_close($stmt);	
	}else { //prepare failed
	    echo "WRONG2";
	
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
           <form action = "insert2.php" method="POST">    
        
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