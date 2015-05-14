/* 
	songs_register.js
	Author: Nick Markworth
 	Event registration for text fields and submit button
*/

// Register text fields
var songNameTextField = document.getElementById("songName");
var artistTextField = document.getElementById("artist");
var composerTextField = document.getElementById("composer");

// Register buttons
var submitButton = document.getElementById("submit");

// Add event handlers to buttons
submitButton.onclick = validateForm;