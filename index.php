<?php
include('setup.php');

session_name('codeplay');
session_start();

if (empty($_SESSION['VideoID'])) {

	$_SESSION['VideoID'] = 2;
}

if (isset($_POST['changevideo'])) {
	$_SESSION['VideoID'] = $_POST['button'];
}	

?>

<!DOCTYPE html>
<html lang="sv">

<head>
	<title>CodePlay</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->

</head>

<body>

<div class="container">
	
	<div class="row">
		<div class=" col-xs-offset-1 col-xs-6 col-sm-offset-1 col-sm-6 hidden-md hidden-lg ">
			<div id="titlesxsm"><img src="bilder/logga.png" alt="CODEPLAY" width="120%" class="img-responsive center-block"></div>
		</div>

		<div class="hidden-xs hidden-sm col-md-offset-3 col-md-6 col-md-offset-3">	
			<div id="titlemdlg"><img src="bilder/logga.png" alt="CODEPLAY" width="50%" class="img-responsive center-block"></div>
		</div>
		
		<div class="col-xs-5 hidden-sm hidden-md hidden-lg "><a id="about" href="#bottom"><img src="bilder/aboutxs.png" alt="ABOUT US" width="75%" class="pull-right"></a></div>
		<div class="hidden-xs col-sm-5 hidden-md hidden-lg "><a id="about" href="#bottom"><img src="bilder/aboutsm.png" alt="ABOUT US" class="pull-right"></a></div>
	</div>

	<div class="row">
		<div class="hidden-xs hidden-sm col-md-3" id="aboutus">
			<div id="list">ABOUT US</div> 
			<img src="bilder/about2.jpg" alt="Bild på oss" width="100%">
			<p class="white"><br>Vi är två elever från NTI-skolan i Umeå, där vi går ett fjärde tekniskt år (T4) inom mjukvarudesign. Den här hemsidan har vi gjort under våran första praktikperiod på Codemill. Våran uppgift var att göra en HTML5 videospelare med egna kontroller, även kunna byta mellan några olika videor. Hemsidan skulle passa bra både olika enheter (mobil, suftplatta, dator). Det här är resultatet vi kom fram till och ni får gärna ge feedback till oss på:<br>liza_pettersson_@hotmail.com<br>eller<br>felix.sjovik@gmail.com<br><b>Tack för ditt besök!<br>MVH Liza Pettersson & Felix Sjövik</b><br>©</p>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-6">
			<div id="videoplayer" width="100%">			
				<?php 

		  		$query = "SELECT * FROM videos WHERE VideoID = '" . $_SESSION['VideoID'] . "'";

		  		$result = query($query);
		  	

			  	while ($row = mysqli_fetch_assoc($result)) {
					echo "<video id='video' width='100%'><source src='videos/" . $row['Video'];
					echo "'type='video/mp4'>Your browser does not support the video tag.</video>";
					?>		
				
					<nav id="video-controls">
						<input type="image" src="bilder/play.png" id="play-pause">
						<input type="range" id="seek-bar" value="0">
						<input type="image" src="bilder/fullscreen.png" id="full-screen">
						<input type="range" id="volume-bar" min="0" max="1" step="0.1" value="1">
						<input type="image" src="bilder/volume.png" id="mute">
					</nav>																

				<?php } ?>

			</div>
		</div>
		<?php 

  		$query = "SELECT * FROM videos WHERE VideoID = '" . $_SESSION['VideoID'] . "'";

  		$result = query($query);
  	

	  	while ($row = mysqli_fetch_assoc($result)) {
	  		echo "<div class='hidden-xs hidden-sm col-md-3' id='description'>";
			echo '<nav><b>' . $row['Title'] . "</b><b id='time'>" . $row['Time'] . '</b></nav>';
			echo '<p><br>' . $row['Description'] . '</p></div></div>';

			echo "<div class='row'><div class='col-xs-12 col-sm-12 hidden-md hidden-lg' id='description'>";
			echo '<nav><b>' . $row['Title'] . "</b><b id='time'>" . $row['Time'] . '</b></nav>';
			echo '<p><br>' . $row['Description'] . '</p></div></div>';		
		}
		?>
	
		</div>
		<div class="row">
		  	<div class="col-xs-12 col-sm-12 col-md-offset-3 col-md-6 col-md-offset-3" id="videolist">
		  		<div id="list">VIDEO LIST</div>
		  		<table><?php 

		  		$query = "SELECT * FROM videos ORDER BY date DESC";

		  		$result = query($query);
		  	

			  	while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr><td><img src='bilder/" . $row['Image'] .  "' width='90%'><br>";
					echo '<b>' . $row['Time'] . '</b><br>' . $row['Creator'] . '<br>' . $row['Date'] . '</td>';
					echo "<td><p><b>" . $row['Title'] . '</b><br>' . $row['Description'] . '</p>';

					echo "<form method='post'><input type='hidden' value='" . $row['VideoID'] . "' name='button'>";
					echo "<input type='submit' value='' name='changevideo' class='changevideo'></form></td></tr>";
					

				}
					
			  	?></table>	
		  	</div>
		</div>



		<div class="row" id="footer">
		  	  <div class="col-xs-12 col-sm-12 hidden-md hidden-lg" id="footsmall">
		  	<footer id="footxssm">
		  		<div id="aboutmeny">
		  			<a href="add.php" id="addmeny"><img src="bilder/add.png" alt="Add video" width="30%">
		  			<a href="#top" id="topmeny"><img src="bilder/top.png" alt="TOP" width="30%"></a>
		  		</div>
		  		<table>
					<tr id="abouttable"><td id="aboutimg"><img src="bilder/about.jpg" alt="Bild på oss" width="100%"></td>
						<td id="aboutinfo"><img src="bilder/aboutus2.png" alt="ABOUT US" width="30%">
						<p class="white"><br>Vi är två elever från NTI-skolan i Umeå, där vi går ett fjärde tekniskt år (T4) inom mjukvarudesign. Den här hemsidan har vi gjort under våran första praktikperiod på Codemill. Våran uppgift var att göra en HTML5 videospelare med egna kontroller, även kunna byta mellan några olika videor. Hemsidan skulle passa bra både olika enheter (mobil, suftplatta, dator). Det här är resultatet vi kom fram till och ni får gärna ge feedback till oss på:<br>liza_pettersson_@hotmail.com<br>eller<br>felix.sjovik@gmail.com<br><b>Tack för ditt besök!<br>MVH Liza Pettersson & Felix Sjövik<br>©</b></p></td>
					</tr>
				</table>
			</footer>
		  </div>
		  <div class="hidden-xs hidden-sm col-md-offset-10 col-md-2">
		  	<div id="fixedmeny">
		  		<a href="add.php"><img src="bilder/add.png" alt="Add video" width="30%"></a>
		  		<a href="#top"><img src="bilder/top.png" alt="TOP" width="30%"></a>
		  	</div>
		  </div>
		</div>



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="script.js"></script>

</div>
<a name="bottom">
<body>
</html>