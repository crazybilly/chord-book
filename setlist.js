$(document).ready(function() {


/*------------------   setlist stuff   --------------------------------------- */


 	/* add song to setlist when you click add */
	$("#songs ul li .add").click( function () {
		 $(this).parent().parent().clone(true).appendTo("#set ul");
		 setlistcontents = savesetlist();
		});

	/* make the remove button work */
	$(".remove").click( function () {
		$(this).parent().parent().remove();
		 setlistcontents = savesetlist();
		});

	/* make sortable thing work */
	$(".sortable").sortable({
		update: function () {
		 	setlistcontents = savesetlist();
			}
	});
	$(".sortable").disableSelection();

	/* make the mobile tools gear open the desktools div */
	$(".expandtools").click( function () {
		$(this).parent().parent().parent().find(".songdesktools").toggleClass('show').parent().redrawForWebkit();
		});
		
	$(".mobileUp").click( function () {
		song = $(this).parent().parent().parent();
		song.insertBefore(song.prev());
		setlistcontents = savesetlist();
		});

	$(".mobileDown").click( function () {
		song = $(this).parent().parent().parent();
		song.insertAfter(song.next());
		setlistcontents = savesetlist();
		});


	/* a function to make webkit redraw when I make style changes */
	(function($) {
   	 $.fn.redrawForWebkit = function() {
	        this[0].style.display = 'none';
	        this[0].offsetHeight;
	        this[0].style.display = 'block';
	    };
	})(jQuery);
	


/*------------------   form stuff   --------------------------------------- */

	/* submit the setlist selector on submit */
	 $(function () {
        $("#setlist-chooser").live("change keyup", function () {
            $("#setchooser").submit();
         });
     });


	/* -------Creating setlists --------------*/

	/* modal dialog for creating setlists */
	$("#newsetform").dialog({
		autoOpen: false,
		height: 250,
		width: 350,
		position: ['center',60],
		title: "Create a setlist",
		zIndex: 10,
		modal: true,
		buttons: {
			"Create" : function () 
				 { 
					 $("#newsetform form").submit();
				 },
			Cancel: function () {
				$( this ).dialog ("close");
				}
			}
	});

	/* to open the modal dialog for creating setlists */
	$( "#newset" )
			.button()
			.click(function() {
				$( "#newsetform" ).dialog( "open" );
			}); 

	/* empty the default values in the newset form */
	$("#newsetform input").val("");

	/* turn on the datepicker */
		/* format the date */

		/* turn it on */
		$(function() {
			$('.setlistdate').datepicker( { dateFormat: "yy-mm-dd" });
		});
	


	/* --------- Editing setlists -----------------*/

	/* modal dialog for editing setlists */
	$("#editsetform").dialog({
		autoOpen: false,
		height: 250,
		width: 350,
		position: ['center',60],
		title: "Edit a setlist",
		zIndex: 10,
		modal: true,
		buttons: {
			"Save" : function () 
				 { 
					 $("#editsetform form").submit();
				 },
			Cancel: function () {
				$( this ).dialog ("close");
				}
			}
	});

	/* to open the modal dialog for editing setlists */
	$( "#editset" )
			.button()
			.click(function() {
				$( "#editsetform" ).dialog( "open" );
			}); 


	/* -------------- Changing song keys -----------------*/

	/* modal dialog for changing the key of a song */
	$("#changesongkey").dialog({
		autoOpen: false,
		height: 200,
		width: 300,
		position: ['center',60],
		title: "Select a default key",
		zIndex: 10,
		modal: true,
		buttons: {
			"Save" : function () 
				 { 
					 $("#changesongkey form").submit();
				 },
			Cancel: function () {
				$( this ).dialog ("close");
				}
			}
	});

	/* to open the modal dialog for changing a song key*/
	$( ".key" )
			.button()
			.click(function() {
				$( "#changesongkey" ).dialog( "open" );
				
				/* fill hidden song input */
				s = $(this).parent().parent().val()
				$("#changesongkey form input[name*='s']").val(s);

				/* set the default key as selected */
				k = $(this).children().html();
				o = "#changesongkey option[value='"+k+"']";
				$(o).attr("selected","selected");

			}); 



/*------------------   ajax stuff for saving setlists  --------------------------------------- */


	/* when you make a change to the setlist, save it to the db */
		/* call this whenever you make a change to the setlist */
	function savesetlist () {


		/* prep the vars */
		songlist = getsetsonglist () ;
		keylist  = getsetkeylist () ;
		lID = $("#setlist-chooser option:selected").val();
		
		/* fill the form */
		$("#setupdater #lid").val(lID);
		$("#setupdater #list").val(songlist);
		$("#setupdater #keys").val(keylist);

		/* now submit the form via ajax */
		$.post("setlistupdate.php", $("#setupdater").serialize());
	}


	/* returns the song contents of the #set box: sIDs in order in an array */
	function getsetsonglist () {

		var setcontents = new Array();

		/* get the sIDs of each li */
		for (i = 0; i < $("#set li").length; i++) {
			s = "#set li:eq("+ i + ")";
			setcontents.push( $(s).val() ); 
			}

		return setcontents;
		}


	/* returns the song contents of the #set box: sIDs in order in an array */
	function getsetkeylist () {

		var setcontents = new Array();

		/* get the sIDs of each li */
		for (i = 0; i < $("#set li").length; i++) {
			s = "#set li:eq("+ i + ")";
			setcontents.push( $(s).find(".key").children().html().trim() ); 
			}

		return setcontents;
		}



}); /* close the jQuery */
