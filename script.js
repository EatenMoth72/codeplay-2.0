window.onload = function() {

  // Video
  var video = document.getElementById("video");

  // Video Controllers
  var controlbar = document.getElementById("video-controls");

  // Buttons
  var playButton = document.getElementById("play-pause");
  var muteButton = document.getElementById("mute");
  var fullScreenButton = document.getElementById("full-screen");

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

    	// Update the button image to 'mute'
    	muteButton.src= "bilder/volume.png";
  		} 

  		else {
    		// Unmute the video
    		video.muted = false;

    		// Update the button image to 'volume'
    		muteButton.src= "bilder/mute.png";
  		}
	});

	// Event listener for the full-screen button
	fullScreenButton.addEventListener("click", function() {		
    toggleFullScreen();     
  });

document.addEventListener("keydown", function(e) {
  if (e.keyCode == 13) {
    toggleFullScreen();
  }
}, false);

function toggleFullScreen() {
  if (!document.fullscreenElement &&    // alternative standard method
      !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement ) {  // current working methods
   
      if (video.requestFullscreen) {
        video.requestFullscreen();
      } 

      else if (video.mozRequestFullScreen) {
        video.mozRequestFullScreen(); // Firefox
      } 

      else if (video.webkitRequestFullscreen) {
        video.webkitRequestFullscreen(); // Chrome and Safari
      }

    fullScreenButton.src= "bilder/minimizescreen.png"
    controlbar.classList.add("fullscreen-controls")
  } 

  else {
    if (document.exitFullscreen) {
      document.exitFullscreen();
    } 
    else if (document.msExitFullscreen) {
      document.msExitFullscreen();
    } 
    else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } 
    else if (document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
    }

    fullScreenButton.src= "bilder/fullscreen.png"
    controlbar.classList.remove("fullscreen-controls")
  }
}


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

      if (volumeBar.value == 0) {
        muteButton.src= "bilder/mute.png";
      }
  });
}