<?php
/*
Template Name: Audio Page
For Wordpress: maintain PHP WP tags.
*/
 ?>
<link type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/music/player.css" rel="stylesheet" />
<div id="player">
<img id="song-image"/>
<p id="song-title"></p>
<p id="pianst">Pianst: Randolph Hokanson</p>
<input type="hidden" id="audiofile"/>
    <audio id="myaudio">
      HTML5 audio not supported
    </audio> 
     <div id="button-container">
        <button class="prev" title="Previous Composition" onclick="Previous();">
        <button class="play" title="Play/Pause" onclick="playAudio();">
        </button>
        </button>
        <button class="next" title="Next Composition" onclick="Next();">
        </button>
    </div>
</div> <!-- player -->
<script>
var current_index = 0 // Our current index
var sourceURL = "<?php echo get_stylesheet_directory_uri(); ?>/music/three-parts/";
var  songs =[
        {
            music: sourceURL + "IMSLP70887_Cmajor_BWV787.mp3",
            composition: "BWV 787 C Major",
            image: sourceURL + "BWV787_Cmajor_1_sinfonia-300x300.jpg"
        }, 
        {
            music:  sourceURL + "IMSLP70888_Cminor_BWV788.mp3",
            composition: "BWV 788 C Minor",
            image: sourceURL + "BWV788_CMinor_2_sinfonia-300x300.jpg"
        },
        {
            music: sourceURL + "IMSLP70889_Dmajor_BWV789.mp3",
            composition: "BWV 789 D Major",
            image: sourceURL + "BWV789_DMinor_3_sinfonia-300x300.jpg"
         },
         {
            music: sourceURL + "IMSLP70903_Dminor_BWV790.mp3",
            composition: "BWV 790 D Minor",
            image: sourceURL + "BWV790_Dminor_4_sinfonia-300x300.jpg"
         },
         {
            music: sourceURL + "IMSLP70891_EflatMajor_BWV791.mp3",
            composition: "BWV 791 E&#9837; Major",
            image: sourceURL + "BWV791_EflatMajor_5_sinfonia-300x300.jpg"
         },
         {
            music: sourceURL + "IMSLP70892_EMajor_BWV792.mp3",
            composition: "BWV 792 E Major",
            image: sourceURL + "BWV792_Emajor_6_sinfonia-300x300.jpg"
         },
         {
            music: sourceURL + "IMSLP70893_Eminor_BWV793.mp3",
            composition: "BWV 793 E Major",
            image: sourceURL + "BWV793_Eminor_7_sinfonia-300x300.jpg"
         },
         {
            music: sourceURL + "IMSLP70894_Fmajor_BWV794.mp3",
            composition: "BWV 794 F Major",
            image: sourceURL + "BWV797_Gminor_11_sinfonia-300x300.jpg"
         },
         {
            music: sourceURL + "IMSLP70895_Fminor_BWV795.mp3",
            composition: "BWV 795 F Minor",
            image: sourceURL + "BWV795_Fminor_9-300x300.jpg"
         },
         {
            music: sourceURL + "IMSLP70896_Gmajor_BWV796.mp3",
            composition: "BWV 796 G Major",
            image: sourceURL + "BWV796_Gmajor_10_sinfonia-300x300.jpg"
         },
         {
            music: sourceURL + "IMSLP70897_Gminor_BWV797.mp3",
            composition: "BWV 797 G Minor",
            image: sourceURL + "BWV797_Gminor_sinfonia-300x300.jpg"
         },
         {
            music: sourceURL + "IMSLP70898_Amajor_BWV798.mp3",
            composition: "BWV 798 A Major",
            image: sourceURL + "BWV798_Amjor_12_sinfonia-300x300.jpg"
         },
           {
            music: sourceURL + "IMSLP70899_Aminor_BWV799.mp3",
            composition: "BWV 799 A Minor",
            image: sourceURL + "BWV799_Aminor_13_sinfonia-300x300.jpg"
         },
           {
            music: sourceURL + "IMSLP70900_BflatMajor_BWV800.mp3",
            composition: "BWV 800 B&#9837; Major",
            image: sourceURL + "BWV800_Bbmajor_14_sinfonia-300x300.jpg"
         },
           {
            music: sourceURL + "IMSLP70900_BflatMajor_BWV800.mp3",
            composition: "BWV 800 B&#9837; Major",
            image: sourceURL + "BWV800_Bbmajor_14_sinfonia-300x300.jpg"
         },
         {
            music: sourceURL + "IMSLP70901_Bminor_BWV801.mp3",
            composition: "BWV 801 B Minor",
            image: sourceURL + "BWV801_Bminor_15_sinfonia-300x300.jpg"
         }
]; 
//initial image, title, song 
document.getElementById("song-image").src = '' + songs[0].image; 
var songTitle = document.getElementById("song-title");
songTitle.innerHTML = songs[0].composition;
document.getElementById("song-title").value = songs[0].composition;
document.getElementById("audiofile").value = songs[0].music;
var audioURL = document.getElementById('audiofile'); 
var oAudio = document.getElementById('myaudio');
//oAudio.play();
var nextBtn = document.getElementById('next'); 
var previousBtn = document.getElementById('previous')
var currentFile = "";

  function playAudio() {
            // Check for audio element support.
            if (window.HTMLAudioElement) {
                try {
                    var oAudio = document.getElementById('myaudio');
                    var btn = document.getElementById('play'); 
                    var audioURL = document.getElementById('audiofile'); 
                    //if song is loaded.
                    if (audioURL.value !== currentFile) {
                        oAudio.src = audioURL.value;
                        currentFile = audioURL.value;                       
                    }
                    // Tests the paused attribute and set state. 
                    if (oAudio.paused) {
                        oAudio.play();
                        console.log('Stop');
                    }
                    else {
                        oAudio.pause();
                        console.log('Play');
                      }
                    }
                catch (e) {
                    // Fail silently but show in F12 developer tools console
                     if(window.console && console.error("Error:" + e));
                }
            }
        }

//call to go to next item
  function Next() {
    // If we're at the last index, go to zero, else go to the next index
      current_index = (current_index === (songs.length - 1) ? 0 : current_index + 1);
      UpdateSong(); // Call update
      }

//call to go to previous item
  function Previous() {
    // If we're at the first index (0), go to the last, otherwise go to the previous index
      current_index = (current_index === 0 ? (songs.length - 1) : current_index - 1);
      UpdateSong(); // Call update
      }

//call to update music index
  function UpdateSong() {
      document.getElementById('song-image').src = '' + songs[current_index].image;
      songTitle.innerHTML = songs[current_index].composition;
      document.getElementById("song-title").value = songs[current_index].composition;
      document.getElementById("audiofile").value = '' + songs[current_index].music;
      var oAudio = document.getElementById('myaudio');
      var songPath = document.getElementById("audiofile").value
      console.log(songPath);
      var songPlaying = oAudio;
      console.log(songPlaying);
      oAudio.play();
      var isPlay = oAudio.play();
      console.log(isPlay);
          if (window.HTMLAudioElement) {
                try {
                    var oAudio = document.getElementById('myaudio');
                    var nextBtn = document.getElementById('next'); 
                    var previousBtn = document.getElementById('previous'); 
                    var audioURL = document.getElementById('audiofile'); 
                    //assigns music file path.
                    if (audioURL.value !== currentFile) {
                        oAudio.src = audioURL.value;
                        currentFile = audioURL.value;                       
                    } 
                    if (oAudio.paused) {
                        oAudio.play();
                        //console.log(Stop);
                    } else {
                        oAudio.pause();
                        //console.log(Play);
                    }
                   //oAudio.play();
                }
                catch (e) {
                    // Fail silently but show in F12 developer tools console
                    if(window.console && console.error("Error:" + e));
                }
            }
        }            // Rewinds to next song
</script>
