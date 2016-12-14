<!DOCTYPE html>
<html lang="sv">

<head>
	<title>CodePlay</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<div class="container">
	<div class="row">
		<div class=" col-xs-offset-3 col-xs-6 col-xs-offset-3 col-sm-offset-3 col-sm-6 col-sm-offset-3 hidden-md hidden-lg ">
			<div id="titlesxsm"><a href="index.php"><img src="bilder/logga.png" alt="CODEPLAY" width="120%" class="img-responsive center-block"></a></div>
		</div>

		<div class="hidden-xs hidden-sm col-md-offset-3 col-md-6 col-md-offset-3 col-lg-offset-3 col-lg-6 col-lg-offset-3">	
			<div id="titlemdlg"><a href="index.php"><img src="bilder/logga.png" alt="CODEPLAY" width="50%" class="img-responsive center-block"></a></div>
		</div>
	</div>
	<div class="row">
		<div class=" col-xs-12 col-sm-12 col-md-offset-3 col-md-6 col-md-offset-3 col-lg-offset-3 col-lg-6 col-lg-offset-3 ">
			
			<form action="controlladd.php" method="post">
				<h2>Time to post a video!</h2><br>

				Type in the title of your video (max 20 characters)<br>
				<input type="text" name="title" placeholder="My First Video" maxlength="20" required><br>

				Description: (max 250)<br>
				<textarea name="description" placeholder="This is my video where i show you my trix.." maxlength="250" required></textarea><br>

				Your name: (min 10/max 25) <br>
				<input type="text" name="creator" placeholder="Peter Mc.Donald" minlength="10" maxlength="25" required><br>

				Time of the video: (HH:MM:SS)<br>
				<input type="time" name="time" required><br>

				Upload the video: (max 100MB, MP4)<br>
				<input type="file" name="name" required><br>
				
				Upload a startimage:<br>
				<input type="file" name="startimg" required><br>

				<input type="submit" name="submit" value="Add" id="submit">
			</form>

		</div>
	</div>
</div>		