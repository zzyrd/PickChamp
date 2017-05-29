<?php
 //connection 
 $link = mysqli_connect("us-cdbr-azure-central-a.cloudapp.net", "b4c7b9a31c031e", "6b55f895", "pickcham-zgjmyy") or die("Connect Error ". mysqli_error($link));

          if($_POST['region'] == "sport"){
              if($_POST['text'] == ''){
                 $sql = "SELECT * FROM sport ORDER BY leagueName ASC";
            }
 	             $sql = "SELECT * FROM sport WHERE leagueName LIKE ? ORDER BY leagueName ASC";
 	          }
 	       
 	      if($_POST['region'] == "team"){
 	           if($_POST['text'] == ''){
                 $sql = "SELECT * FROM team ORDER BY teamName ASC";
                }  
                   $sql = "SELECT * FROM team WHERE teamName LIKE ? ORDER BY teamName ASC";       
 	        
 	         }

           if($_POST['region'] == "game"){
 	           if($_POST['text'] == ''){
                 $sql = "SELECT * FROM game ORDER BY gameID ASC"; 
                }       
                    $sql = "SELECT * FROM game WHERE (home LIKE ? OR guest LIKE ?) ORDER BY gameID ASC ";    
                            
           }
           
 	 
   
  function display_data($link, $sql) {
                 $param = "%{$_POST['text']}%";
                 if($_POST['region'] == "sport"){
                     echo "<thead>
                               <tr>
                                 
						          <th>League</th>
						          <th>Sports</th>
					          </tr>
				          </thead>";
				          
                 	if ($stmt = mysqli_prepare($link, $sql)) {//prepare successful
		                  mysqli_stmt_bind_param($stmt, "s", $param) or die("bind param");
			              mysqli_stmt_execute($stmt);
			            //show number of rows  
			              mysqli_stmt_store_result($stmt);
			              $row_count = mysqli_stmt_num_rows($stmt);
                          printf("Number of rows: %d  <br>", $row_count);
                          
	 		              mysqli_stmt_bind_result($stmt, $leagueName, $sport);
	 		         
	 		              
	 		         while (mysqli_stmt_fetch($stmt)) {
	 		           echo "<form action='delete.php' method='POST'>
					           <input type='hidden' name='table' value='sport'>";
					         
					           
                          echo "<tr>";   
                          //echo "<td><input class='btn btn-danger' type='submit' name='delete' value='Delete'></td>";
                          echo '<td><input type="hidden" name="League" value="'.$leagueName.'">'. $leagueName .'</td>';
                          echo '<td><input type="hidden" name="Sports" value="'.$sport.'">'. $sport .'</td>';
                         echo "</tr>";
                         
                       echo "</form>";
                     }
		                mysqli_stmt_close($stmt); 
                    } 
                 }
                 if($_POST['region'] == "team"){
                     echo "<thead>
                               <tr>
                                  <th></th>
						          <th>TeamName</th>
						          <th>League</th>
					          </tr>
				          </thead>";
                 	if ($stmt = mysqli_prepare($link, $sql)) {//prepare successful
		                  mysqli_stmt_bind_param($stmt, "s", $param) or die("bind param");
			              mysqli_stmt_execute($stmt);
			            //show number of rows  
			              mysqli_stmt_store_result($stmt);
			              $row_count = mysqli_stmt_num_rows($stmt);
                          printf("Number of rows: %d  <br>", $row_count);
                          
	 		              mysqli_stmt_bind_result($stmt, $teamName, $league);	
	 		         while (mysqli_stmt_fetch($stmt)) {
                           echo "<form action='delete.php' method='POST'>
					         <input type='hidden' name='table' value='team'>";
					         
					      echo "<tr>";        
                          echo "<td><input class='btn btn-danger' type='submit' name='delete' value='Delete'></td>";
                          echo '<td><input type="hidden" name="TeamName" value="'.$teamName.'">'. $teamName .'</td>';
                          echo '<td><input type="hidden" name="League" value="'.$league.'">'. $league .'</td>';
                          echo "</tr>";
                          
                        echo "</form>";
                     }
		                mysqli_stmt_close($stmt); 
                    } 
                 }
        
                 if($_POST['region'] == "game"){
                     echo "<thead>
                               <tr>
                               <th></th>
						          <th>GameID</th>
						          <th>Home</th>
						          <th>Guest</th>
						          <th>GameTime</th>
					          </tr>
				          </thead>";
                 	if ($stmt = mysqli_prepare($link, $sql)) {//prepare successful
		                  mysqli_stmt_bind_param($stmt, "ss", $param, $param) or die("bind param");
			              mysqli_stmt_execute($stmt);
			            //show number of rows  
			              mysqli_stmt_store_result($stmt);
			              $row_count = mysqli_stmt_num_rows($stmt);
                          printf("Number of rows: %d  <br>", $row_count);
                          
	 		              mysqli_stmt_bind_result($stmt, $gameID, $home, $guest, $gameTime);
	 		
	
	 		         while (mysqli_stmt_fetch($stmt)) {   
                          echo "<form action='delete.php' method='POST'>
					         <input type='hidden' name='table' value='game'>";
					         
					      echo "<tr>";
					       echo "<td><input class='btn btn-danger' type='submit' name='delete' value='Delete'></td>";
                          echo '<td><input type="hidden" name="GameID" value="'.$gameID.'">'. $gameID .'</td>';
                          echo '<td><input type="hidden" name="Home" value="'.$home.'">'. $home .'</td>';
                          echo '<td><input type="hidden" name="Guest" value="'.$guest.'">'. $guest .'</td>';
                          echo '<td><input type="hidden" name="GameTime" value="'.$gameTime.'">'. $gameTime .'</td>';
                          echo "</tr>";
                          
                          echo "</form>";
                     }
		                mysqli_stmt_close($stmt); 
                    } 
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
	   <div class="container" align="center" >
		   <form action = "statistics.php" method="POST" >
		    <br>
			<input type="text" name="text" >
			
			<input class="btn btn-info" type="submit" name="search" value = "search">
			<a class='btn btn-primary' href='main.php'>Back</a>
			<br>
			<?php
	              		
			      if($_POST['region'] == "sport"){
			        echo "<input type= 'radio' name= 'region' value = 'sport' checked> Sport";
			      }
			      else{
			           echo "<input type= 'radio' name= 'region' value = 'sport'> Sport";
			       }
			       if($_POST['region'] == "team"){
			         echo "<input type= 'radio' name= 'region' value = 'team' checked> Team";
			      }
			      else{
			           echo "<input type= 'radio' name= 'region' value = 'team'> Team";
			       }
			       if($_POST['region'] == "game"){
			        echo "<input type= 'radio' name= 'region' value = 'game' checked> Game";
			      }
			      else{
			           echo "<input type= 'radio' name= 'region' value = 'game'> Game";  
	    	      }	     

             
			?>
		</form>
	
		  <table class="table table-hover" width= "800" border ="2" cellpadding = "2" cellspacing = "2" >
          
           <?php 
                 if(isset($_POST['search'])){
                     display_data($link, $sql);
                  }                     
		   
            ?>
         </table>
	  </div>
	</body>
</html>
<?php
    mysqli_close($link);
?>