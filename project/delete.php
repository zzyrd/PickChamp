
<?php
//connect to db
$link = mysqli_connect("us-cdbr-azure-central-a.cloudapp.net", "b4c7b9a31c031e", "6b55f895", "pickcham-zgjmyy") or die("Connect Error ". mysqli_error($link));//display non-editable textbox for attribute $key

//no table was provided, display error message
function fail() {
	header("Location: fail.php");
}

//Save updated city

//Delete selected city
function deleteSport(){
   global $link;
    $sql = "DELETE FROM sport WHERE leagueName = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {//prepare successful
		mysqli_stmt_bind_param($stmt, "s", $_POST['League']) or die("bind param");
		if(mysqli_stmt_execute($stmt)) {//execute successful
			echo "<h2>Successfully Delete Record</h2>";
		} else { 
			fail(); 
		} 
	   mysqli_stmt_close($stmt);	
	}else { //prepare failed
		fail(); 
	}
	echo "<a class='btn btn-info' href='statistics.php'>Back</a>"; 
}
//Save updated country

//Delete selected country
function deleteTeam(){
   global $link;
    $sql = "DELETE FROM team WHERE teamName = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {//prepare successful
		mysqli_stmt_bind_param($stmt, "s", $_POST['TeamName']) or die("bind param");
		if(mysqli_stmt_execute($stmt)) {//execute successful
			echo "<h2>Successfully Delete Record</h2>";
		} else { 
			fail(); 
		} 
	   mysqli_stmt_close($stmt);	
	}else { //prepare failed
		fail(); 
	}
	echo "<a class='btn btn-info' href='statistics.php'>Back</a>"; 
}

//delete selected language
function deleteGame(){
   global $link;
    $sql = "DELETE FROM game WHERE gameID = ? ";
    if ($stmt = mysqli_prepare($link, $sql)) {//prepare successful
		mysqli_stmt_bind_param($stmt, "s", $_POST['GameID']) or die("bind param");
		if(mysqli_stmt_execute($stmt)) {//execute successful
			echo "<h2>Successfully Delete Record</h2>";
		} else { 
			fail(); 
		} 
	   mysqli_stmt_close($stmt);	
	}else { //prepare failed
		fail(); 
	}
	echo "<a class='btn btn-info' href='statistics.php'>Back</a>"; 
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

<?php
	if(isset($_POST['delete'])){//sumbit came from index.php when delete button selected.
	   if(isset($_POST['table'])){//do we have table information
	      switch($_POST['table']){//what table are we deleting
	                case "sport":
	                deleteSport();
	                break;
	                
	                case "team":
	                deleteTeam();
	                break;
	                
	                case "game":
	                deleteGame();
	                break;
	                
	                default;
	                fail();
	                break;
	      }
	   }
	}
	
?>
		</div>
	</body>
</html>
<?php
    mysqli_close($link);
?>