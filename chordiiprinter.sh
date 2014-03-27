#! /bin/bash
# usage 
# chordiiprinter.sh [-t 1] directory input output
# -t -- the number of semitones you want to transpose


# see if you've got a transpose argument
if [ "$1" == "-t" ]; then
		TRANSP=$2
		DIRECT=$3
		INFILE=$4
		OUTFILE=$5
	else 
		TRANSP=0
		DIRECT=$1
		INFILE=$2
		OUTFILE=$3
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
cat print.conf $INFILE > $DIRECT/chord.chrd

# run chordii and convert to pdf
chordii -a -x $TRANSP -C Helvetica-Bold -P letter $DIRECT/chord.chrd | ps2pdf - > $DIRECT/$OUTFILE

