 $(document).ready(function() {


	$("title").html("Chord Chart");

	/* toggle the kitchen sink w/ the gear */
	$(".gear .opener").click(function () {
		$(".overlay").toggle();	
		$(".keysub").hide();	
		
	});

	/* toggle the key selector */
	$(".key ").click(function () {
		$(".keysub").toggle();	
		$(".overlay").hide();	
	});

       $(function () {
           $("#capo-dropdown").live("change keyup", function () {
               $("#tools").submit();
           });
       });


	/* close any open stuff if you click elsewhere or hit esc */
	var closable = $(".overlay, .keysub");


	$( document ).on( 'keydown', function ( e ) {
    	if ( e.keyCode === 27 ) {
	        closable.hide();
	    }
	});


	/* get rid of automatically generated div width for chord charts */
	var chords = $('div:gt(9)');
	chords.css('width','');

 }); /* close the jQuery */
