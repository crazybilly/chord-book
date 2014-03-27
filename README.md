# CRAZYBILLY'S CHORD BOOK

A decent way to get chord charts on a laptop, computer or phone. The chord book lets you write yoru own chord charts in ChordPro format, then transpose them as necessary. It's mobile-ready with a responsive design, so small screens are only pain because they don't have a lot of pixels.

It also has a drag-and-drop setlist builder with support for different instruments and a visual look at songs' energy levels throughout the set. 

Crazybilly's Chord Book was written by Jake Tolbert (http://jaket.is-a-geek.com/blog) and is licesned under the GPL v2 or later.

## INSTALLATION

To install, you'll need a LAMP server. I'm serious about the L part--the chord book relies on a bash script which calls chordii and pdftohtml.

There's no fancy installer, and I can't remember whether or not I hard-coded it to look in yourdomain.com/chord or not. I hope not. But I probably did accidentally.

So here's how I'd install it:

0. Install chordii and pdftohtml 
1. Create a directory named "chord" off the root of your http directory.
2. Drop all the files there.
3. Create a mySQL database called chord and use chord.sql to populate it.
4. Edit db.php, entering the credentials for your new database
5. Visit yourserver/chord in a web browser and go to town.
6. Chord charts are written in ChordPro format (http://www.vromans.org/johan/projects/Chordii/chordpro/index.html).


## CAVEATS

### Security Stinks
SQL queries are not parameterized and I use GET requests, so somebody could pretty easily drop your whole database by visiting the wrong URL. I know this is a problem, but I'm much too lazy to fix it right now. 

### My Band is Hardcoded 
One of the handy things I can do with the chord book is determine who's playing electric, acoustic or banjo on which song. 

Unfortunately, I hard coded the names of band members into the database, so you're stuck with my band's names. Also, the only options for instruments are:

* acoustic guitar
* electric guitar
* banjo

Why did I do this? Why don't I fix it (see the reason that the security problem isn't fixed)?

