<!DOCTYLE html> 
<html>
	<head>
		<title>Paranoid Voting System</title>
	</head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--<link rel="stylesheet" type="text/css" href="style.css" media="screen">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css">-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
<body> 
<div id="container" style="text-align: center;">
	<div id="header">
	<h1>Which Superhero Do You Want to Vote?</h1>
	</div>

<form action="index.php" method="post" align="center">  	
	<p>&nbsp;</p>
	<button type="submit" name="superman" class="btn btn-secondary btn-lg">Vote For Superman</button>
	<button type="submit" name="batman" class="btn btn-secondary btn-lg">Vote For Batman</button>
	<button type="submit" name="noone" class="btn btn-secondary btn-lg">Both are Bad!</button>
	<button type="button" class="btn btn-secondary btn-lg" disabled>Donald Trump!!!</button>	
	<p>&nbsp;</p>	
</form>
<?php 
$con = mysqli_connect("yourMSQL-host","yourMSQL-user","yourMSQL-password","yourMSQL-database");

if(isset($_POST['superman'])){
	
	$vote_superman = "update players set superman=superman+1";	
	$run_superman = mysqli_query($con, $vote_superman);	
	if($run_superman){	
	print "<center>
			<div class=\"panel panel-success\" style=\"width: 50%;\">
					<div class=\"panel-heading\">
						<h3 class=\"panel-title\">You have successfully voted!</h3>
					</div>
					<div class=\"panel-body\">
						<h2>+1 Vote added to Superman!</h2>
						<h2><a href='index.php?results'>View Results</a></h2>
					</div>
			  </div>
		  </center>
		  
";		
	}
}

if(isset($_POST['batman'])){
	
	$vote_batman = "update players set batman=batman+1";
	$run_batman = mysqli_query($con, $vote_batman);
	
	if($run_batman){	
	echo " <center>
	<div class=\"panel panel-success\" style=\"width: 50%;\">
			<div class=\"panel-heading\">
				<h3 class=\"panel-title\">You have successfully voted!</h3>
			</div>
			<div class=\"panel-body\">
				<h2 align='center'>+1 Vote added to Batman!</h2> 
				<h2 align='center'><a href='index.php?results'>View Results</a></h2>
			</div>
		</div>
	
			</center>
		
			";	
	}
}

if(isset($_POST['noone'])){
	
	$vote_noone = "update players set noone=noone+1";	
	$run_noone = mysqli_query($con, $vote_noone);
	
	if($run_noone){
	echo "<center>
	<div class=\"panel panel-success\" style=\"width: 50%;\">
        <div class=\"panel-heading\">
            <h3 class=\"panel-title\">You have successfully voted!</h3>
        </div>
        <div class=\"panel-body\">
		<h2 align='center'>+1 Vote added to Both are Bad!</h2>
		<h2 align='center'><a href='index.php?results'>View Results</a></h2>			
		</div>
    </div>
	</center>
	";
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
	
	echo "<center>
		<div class=\"panel panel-info\"  style=\"width: 50%\";>
		  <div class=\"panel-heading\">Results So Far:
		  <div class=\"panel-body\">
						<div class=\"progress\">
						  <div class=\"progress-bar progress-bar-info progress-bar-striped\" role=\"progressbar\"
						  aria-valuenow=\"50\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: $per_superman\">
							<b>Superman:</b> $superman ($per_superman)
						  </div>
						</div>					
																					
						<div class=\"progress\">
						  <div class=\"progress-bar progress-bar-info progress-bar-striped\" role=\"progressbar\"
						  aria-valuenow=\"50\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: $per_batman\">
							<b>Batman:</b> $batman ($per_batman)	
						  </div>
						</div>		
						
						<div class=\"progress\">
						  <div class=\"progress-bar progress-bar-info progress-bar-striped\" role=\"progressbar\"
						  aria-valuenow=\"50\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: $per_noone\">
							<b>Both are Bad!:</b> $noone ($per_noone)
						  </div>
						</div>		
							
				</div>
				</div>
		</div>
	</center>
	";
}
?>

    <div class="panel-footer panel-custom" style="position:absolute; bottom:0; width:100%; text-align:center;">
        <div class="container-fluid">
			 <h2>Created by: Gray Hat Security 2016</h2>
        </div>
    </div>
 
</div>	
</body>
</html>
<?php exit; ?>
