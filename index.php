<!DOCTYLE html> 
<html>
	<head>
		<title>Paranoid Voting System</title>
	</head>
	
	<link rel="stylesheet" type="text/css" href="style.css" media="screen">
	
<body> 
<div id="container" style="text-align: center;">
	<div id="header">
	<h1>Which Superhero Do You Want to Vote?</h1>
	</div>

<form action="index.php" method="post" align="center">  	
	<p>&nbsp;</p>
	<input type="submit" name="superman" value="Vote For Superman"/> 	
	<input type="submit" name="batman" value="Vote For Batman"/> 
	<input type="submit" name="noone" value="Both are Bad!"/> 			
</form>
<?php 
$con = mysqli_connect("yourMSQL-host","yourMSQL-user","yourMSQL-password","yourMSQL-database");

if(isset($_POST['superman'])){
	
	$vote_superman = "update players set superman=superman+1";	
	$run_superman = mysqli_query($con, $vote_superman);	
	if($run_superman){	
	echo "<h2 align='center'>+1 Vote added to Superman!</h2>"; 
	echo "<h2 align='center'><a href='index.php?results'>View Results</a></h2>";		
	}
}

if(isset($_POST['batman'])){
	
	$vote_batman = "update players set batman=batman+1";
	$run_batman = mysqli_query($con, $vote_batman);
	
	if($run_batman){	
	echo "<h2 align='center'>+1 Vote added to Batman!</h2>"; 
	echo "<h2 align='center'><a href='index.php?results'>View Results</a></h2>";	
	}
}

if(isset($_POST['noone'])){
	
	$vote_noone = "update players set noone=noone+1";	
	$run_noone = mysqli_query($con, $vote_noone);
	
	if($run_noone){
	echo "<h2 align='center'>+1 Vote added to Both are Bad!</h2>"; 
	echo "<h2 align='center'><a href='index.php?results'>View Results</a></h2>";
	}
}

if(isset($_GET['results'])){

	$get_votes = "select * from players";	
	$run_votes = mysqli_query($con, $get_votes); 
	$row_votes = mysqli_fetch_array($run_votes); 
	
	$superman = $row_votes['superman'];
	$batman = $row_votes['batman'];
	$noone = $row_votes['noone'];
	
	$count = $superman+$batman+$noone; 
	
	$per_superman = round($superman*100/$count) . "%";
	$per_batman = round($batman*100/$count) . "%";
	$per_noone = round($noone*100/$count) . "%";
	
	echo "
	<div style='background:lime; padding:10px; text-align:center;'>		 
		<center>
		<h2>Results So Far:</h2>		
		<p style='background:black; color:white; padding:10px; width:500px;'>		
		<b>Superman:</b> $superman ($per_superman)		
		</p>		
		<p style='background:black; color:white; padding:10px; width:500px;'>		
		<b>Batman:</b> $batman ($per_batman)		
		</p>				
		<p style='background:black; color:white; padding:10px; width:500px;'>		
		<b>Both are Bad!:</b> $noone ($per_noone)		
		</p>
		</center>	
	</div>
	";
}
?>
	<div id="footer">
		<h1>Created by: Gray Hat Security</h1>
	</div>
</div>	
</body>
</html>
<?php exit; ?>