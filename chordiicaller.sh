#! /bin/bash
# usage 
# chordiicaller.sh [-t 1] input output
# -t -- the number of semitones you want to transpose


# see if you've got a transpose argument
if [ "$1" == "-t" ]; then
		TRANSP=$2
		INFILE=$3
		OUTFILE=$4
	else 
		TRANSP=0
		INFILE=$1
		OUTFILE=$2
	fi

# build in sanity checks: if [$IN == FALSE | $OUT == FALSE ) { die }
#   the loop(s) below doesn't work
#
if [$INFILE == ""] 
	then
		echo "please specify an input file"
		exit 1
	else
		if ["$OUTFILE" == ""]
			then
				echo "please specify an output file"
				exit 2
		fi
	fi

# tack on screen format (format.conf)
cat format.conf $INFILE > /tmp/chord.chrd

# run chordii and convert to pdf
#chordii -a -P letter -C Helvetica-Black -c 17 -T Helvetica -t 16 -G -x $TRANSP $INFILE | ps2pdf - > /tmp/chord.pdf 
chordii -a -x $TRANSP /tmp/chord.chrd | ps2pdf - > /tmp/chord.pdf 

# pdf -> html 
pdftohtml -c -noframes -zoom 1 -i -q /tmp/chord.pdf /tmp/chord.html

# remove the awful gray background
# sed s/#A0A0A0/white/ /tmp/chord.html > $OUTFILE
sed s/#A0A0A0/white/ /tmp/chord.html > /tmp/chord2.html
sed s/Times\;/Helvetica\;font-weight:bold\;/ /tmp/chord2.html > $OUTFILE

# clean up tmp files
rm /tmp/chord.chrd
rm /tmp/chord.pdf
rm /tmp/chord.html
