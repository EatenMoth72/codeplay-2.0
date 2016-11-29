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

    		// Update the button text to 'Pause'
    		playButton.innerHTML = src= "bilder/pause.png";
  		}

  		else {
    		// Pause the video
    		video.pause();

    		// Update the button text to 'Play'
    		playButton.innerHTML = src= "bilder/play.png";
  		}
	});

	// Event listener for the mute button
	muteButton.addEventListener("click", function() {
  		if (video.muted == false) {
    	// Mute the video
   		video.muted = true;

    	// Update the button text
    	muteButton.innerHTML = "Unmute";
  		} 

  		else {
    		// Unmute the video
    		video.muted = false;

    		// Update the button text
    		muteButton.innerHTML = "Mute";
  		}
	});

	// Event listener for the full-screen button
	fullScreenButton.addEventListener("click", function() {
  		if (video.requestFullscreen) {
    		video.requestFullscreen();
  		} 

  		else if (video.mozRequestFullScreen) {
    		video.mozRequestFullScreen(); // Firefox
  		} 

  		else if (video.webkitRequestFullscreen) {
    		video.webkitRequestFullscreen(); // Chrome and Safari
  		}

      controlbar.classList.add("fullscreen-controls")
      document.getElementById("fullScreenButton").style.visibility = "hidden";
	});


    // Event listener for the minimizescreen button
  minimizeScreenButton.addEventListener("click", function() {
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

      controlbar.classList.remove("fullscreen-controls")
      document.getElementById("minimizeScreenButton").style.visibility = "hidden";
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




