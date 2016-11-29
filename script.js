window.onload = function() {

  // Video
  var video = document.getElementById("video");

  // Video Controllers
  var controlbar = document.getElementById("video-controls");

  // Buttons
  var playButton = document.getElementById("play-pause");
  var muteButton = document.getElementById("mute");
  var fullScreenButton = document.getElementById("full-screen");
  var minimizeScreenButton = document.getElementById("minimizescreen");

  // Sliders
  var seekBar = document.getElementById("seek-bar");
  var volumeBar = document.getElementById("volume-bar");




// Event listener for the play/pause button
	playButton.addEventListener("click", function() {
  		if (video.paused == true) {
    		// Play the video
    		video.play();

    		// Update the button image to 'Pause'
    		playButton.src= "bilder/pause.png";
  		}

  		else {
    		// Pause the video
    		video.pause();

    		// Update the button image to 'Play'
    		playButton.src= "bilder/play.png";
  		}
	});

	// Event listener for the mute button
	muteButton.addEventListener("click", function() {
  		if (video.muted == false) {
      	// Mute the video
     		video.muted = true;

      	// Update the button image to 'unmute'
      	muteButton.src = "bilder/mute.png";
    		} 

  		else {
    		// Unmute the video
    		video.muted = false;

    		// Update the button image to 'mute'
    		muteButton.src = "bilder/volume.png";
  		}
	});

	// Event listener for the full-screen button
	fullScreenButton.addEventListener("click", function() {
  		if (video.requestFullscreen) {
    		video.requestFullscreen();

        // Update the button image to 'minimizescreen'
        fullScreenButton.src= "bilder/minimizescreen.png";
  		} 

  		else if (video.mozRequestFullScreen) {
    		video.mozRequestFullScreen(); // Firefox

        // Update the button image to 'minimizescreen'
        fullScreenButton.src= "bilder/minimizescreen.png";
  		} 

  		else if (video.webkitRequestFullscreen) {
    		video.webkitRequestFullscreen(); // Chrome and Safari

        // Update the button image to 'minimizescreen'
        fullScreenButton.src= "bilder/minimizescreen.png";
  		}

      controlbar.classList.add("fullscreen-controls")

      if (video.requestFullscreen) {
            // exit full-screen
         if (document.exitFullscreen) {
              document.exitFullscreen();
          } 

          else if (document.webkitExitFullscreen) {
            document.webkitExitFullscreen();
          } 

          else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
          } 

          else if (document.msExitFullscreen) {
            document.msExitFullscreen();
          }

          // Update the button image to 'fullscreen'
          fullScreenButton.src= "bilder/fullscreen.png";

          controlbar.classList.remove("fullscreen-controls")
      }

	});




	// Event listener for the seek bar
	seekBar.addEventListener("change", function() {
  		// Calculate the new time
  		var time = video.duration * (seekBar.value / 100);

  		// Update the video time
  		video.currentTime = time;
	});

	// Update the seek bar as the video plays
	video.addEventListener("timeupdate", function() {
  		// Calculate the slider value
  		var value = (100 / video.duration) * video.currentTime;

  		// Update the slider value
  		seekBar.value = value;
	});

	// Pause the video when the slider handle is being dragged
	seekBar.addEventListener("mousedown", function() {
  		video.pause();
	});

	// Play the video when the slider handle is dropped
	seekBar.addEventListener("mouseup", function() {
  		video.play();
	});

	// Event listener for the volume bar
	volumeBar.addEventListener("change", function() {
  		// Update the video volume
  		video.volume = volumeBar.value;
	});
}




