<?

$dt = time();
$temp = "/tmp/chordicaller".$dt;
$l = $_GET['l'];

/* get all the songs in the set */
include ("db.php");

		$songq= "SELECT t.song_order, t.sid, s.song, s.songname, t.key FROM `SONGS_IN_SETS` t INNER JOIN `SONGS` s ON t.sid=s.sid WHERE t.lid = ".$l." ORDER BY t.SONG_ORDER" ;
		$songqresult = $link->query($songq);
		$i = 0;
		while ($i < $songqresult->num_rows) {
			$songlist[$i] = $songqresult->fetch_assoc();
			$i++;
			}


/* create a working tmp directory */
exec ('mkdir '.$temp);


$join = "gs -dBATCH -dNOPAUSE -q -sDEVICE=pdfwrite -sOutputFile=".$temp."/finished.pdf";

foreach ($songlist as $song) {
	/* input a value for songs that aren't capoed */
	if ($song["key"] == FALSE ) {
	$create = './chordiiprinter.sh '.$temp.' ./songs/'.$song["songname"].'.chrd '.$song["songname"].'.pdf'; 
		}
	else { 
	$create= './chordiiprinter.sh -t '.$song["key"].' '.$temp.' ./songs/'.$song["songname"].'.chrd '.$song["songname"].'.pdf'; 
	}


	
	$print = shell_exec ($create);


	$join = $join." ".$temp."/".$song['songname'].".pdf";

	}

	/* join the pdfs together */
	exec ($join);

	/* output the pdf  */
	header('Content-type: application/pdf'); 
	header('Content-Disposition: attachment; filename="'.$temp.'/finished.pdf"'); 
	readfile($temp."/finished.pdf");


/* clean up the working tmp directory */
exec ('rm '.$temp.' -r');


?>
