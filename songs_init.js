/*
	songs_init.js
	Author: Nick Markworth
	Validate the quiz
*/

// Validate the songs form before submitting
function validateForm() {
	var flag = true;
	
	// Get the values from the text fields
	var songName = songNameTextField.value;
	var artist = artistTextField.value;
	var composer = composerTextField.value;
	
	// A regular expression used to test against the values above
	var regExp = /^[A-Za-z0-9\?\$'&!\(\)\.\-\s]*$/;
	
	// Make sure the song name is valid
	if (songName == "" || !regExp.test(songName)) {
		flag = false;
		alert("Please enter a song name. Name can include letters, numbers, and the special characters ?!$&'().-");
	}
	// Make sure the artist is valid
	else if (artist == "" || !regExp.test(artist)) {
		flag = false;
		alert("Please enter an artist. Artist can include letters, numbers, and the special characters ?!$&'().-");
	}
	// Make sure the composer is valid
	else if (composer == "" || !regExp.test(composer)) {
		flag = false;
		alert("Please enter a composer. Composer can include letters, numbers, and the special characters ?!$&'().-");
	}
	
	return flag;
}
