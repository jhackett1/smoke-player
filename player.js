// Scripts for the live radio player

// Autoplay
document.addEventListener("DOMContentLoaded", function(){
  playPause();
});

// Handle play/pause actions
function playPause(){
  // Grab DOM elements
  var audio = document.querySelector('audio');
  var button = document.querySelector('section.controls button');
  if (audio.paused) {
    // Change the icon
    button.classList.remove('fa-play');
    button.classList.add('fa-pause');
    // Make the play request
    audio.play();
  } else {
    // On pause
    audio.pause();
    // Rip out and replace src attribute of all sources, "stopping" the player
    var source = document.querySelectorAll('audio source');
    for (var i = 0; i < source.length; i++) {
      var tempSrc = source[i].src;
      source[i].src = '';
      source[i].src = tempSrc;
    }
    // Change icon
    button.classList.remove('fa-pause');
    button.classList.add('fa-play');
  }
};

// Grab radio data API response and display

function fetchShowData(){
  // Variable to hold API endpoint
  let endpoint = "http://smoke.media/wp-json/shows/now_playing";
  // Set up and make HTTP request
  var xmlHttp = new XMLHttpRequest();
  xmlHttp.onreadystatechange = function() {
  if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
    // Pass response to the processor function
    processData(xmlHttp.responseText);
  }
  xmlHttp.open("GET", endpoint, true); // true for asynchronous
  xmlHttp.send(null);

  // Process data
  function processData(res){
    // Grab DOM elements
    var time = document.querySelector('section.data h3');
    var title = document.querySelector('section.data h2');
    var desc = document.querySelector('section.data p');
    var icon = document.querySelector('section.data div.show-image');
    // Get the current date
    var now = new Date();
    // Convert data to JS object
    var res = JSON.parse(res);
    // For testing
    console.table(res);
    // Display data, with fallback
    if (res.success == 1) {
      // If there's a show, display the info here
      time.innerHTML = "From " + res.show.tx_time.substr(0,2) + ":" + res.show.tx_time.substr(2,4);
      title.innerHTML = res.show.title;
      desc.innerHTML = res.show.desc;
      // Seperate icon fallback, because lots of shows have no icon
      if (res.show.icon_thumb == false) {
        icon.style.backgroundImage = `url('/wp-content/plugins/smoke-player/noicon.jpg')`;
      } else {
        icon.style.backgroundImage = "url(" + res.show.icon_thumb + ")";
      }
    } else {
      // Fallback data
      time.innerHTML = "From " + now.getHours() + ":00";
      title.innerHTML = 'Smoke Jukebox';
      desc.innerHTML = 'All the best tracks from the Smoke Radio catalogue.';
      icon.style.backgroundImage = `url('/wp-content/plugins/smoke-player/noicon.jpg')`;
    }
  }
}
// Initial load
fetchShowData();
// Check every five minutes
setTimeout(function(){
  fetchShowData()
}, 300000)
