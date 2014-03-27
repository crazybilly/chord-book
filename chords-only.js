 $(document).ready(function() {


	$("title").html("Alida's Chord List");


	$('body').prepend('<div id="chords"></div>');

	$('.ft0').appendTo('#chords');
	$('.ft2').appendTo('#chords');

	//$('div [style*="position"]').remove();
	$('.ft1').remove();
	$('.ft3').remove();


 }); /* close the jQuery */
