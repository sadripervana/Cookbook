<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dates & Times</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<h1 class="title"><a href="index.php"><</a> Dates & Times </h1>
	<a id="top" href="#bottom" ><h1>Go bottom</h1></a>
	<?php
	$stamp = mktime(0,0,0,1,1,1986);
	print date('l',$stamp);

	echo '<br>	Finding the current date and time :';
	print date('r');

	echo '<br> Or, use a DateTime object. Its format() method works just like the date() function:';
	$when = new DateTime();
	print $when->format('r');

	echo '<br> Finding time parts: ';
	$now_1 = getdate();
	$now_2 = localtime();
	print "{$now_1['hours']}:{$now_1['minutes']}:{$now_1['seconds']}\n";
	print "$now_2[2]:$now_2[1]:$now_2[0]";

// seconds Seconds
// minutes Minutes
// hours Hours
// mday Day of the month
// wday Day of the week, numeric (Sunday is 0, Saturday is 6)
// mon Month, numeric
// year Year, numeric (4 digits)
// yday Day of the year, numeric (e.g., 299)
// weekday Day of the week, textual, full (e.g., “Friday”)
// month Month, textual, full (e.g., “January”)
// 0 Seconds since epoch (what time() returns)
// 
	echo '<br> Finding the month, day, and year;';
	$a = getdate();
	printf('%s %d, %d',$a['month'],$a['mday'],$a['year']);

// Type Character Description Range or examples
// Hour H Hour, numeric, 24-hour clock, leading zero 00–23
// Hour h Hour, numeric, 12-hour clock, leading zero 01–12
// Hour G Hour, numeric, 24-hour clock 0–23
// Hour g Hour, numeric, 12-hour clock 1–12
// Hour A Ante/Post Meridiem designation AM, PM
// Hour a Ante/Post Meridiem designation am, pm
// Minute i Minute, numeric 00–59
// Second s Second, numeric 00–59
// Second u Microseconds, string 000000–999999
// Day d Day of the month, numeric, leading zero 01–31
// Day j Day of the month, numeric 1–31
// Day z Day of the year, numeric 0–365
// Day N Day of the week, numeric (Monday is 1) 1–7
// 
// 
// Type Character Description  Range or examples
// Day w
// Day of the week, numeric (Sunday is 0)  0–6
// Day S English ordinal suffix for day of the month, textual “st,” “th,” “nd,” “rd”
// Week D Abbreviated weekday name Mon, Tue, Wed, Thu, Fri, Sat, Sun
// Week l Full weekday name Monday, Tuesday, Wednesday Thursday, Friday,
// Saturday, Sunday
// Week W ISO 8601:1988 week number in the year, numeric, 1–53
// week 1 is the first week that has at least 4 days
// in the current year, Monday is the first day of the
// week
// Month F Full month name January–December
// Month M Abbreviated month name Jan–Dec
// Month m Month, numeric, leading zero 01–12
// Month n Month, numeric 1–12
// Month t Month length in days, numeric 28, 29, 30, 31
// Year Y Year, numeric, including century e.g., 2016
// Year y Year without century, numeric e.g., 16
// Year o ISO 8601 year with century; numeric; the four- e.g. 2016
// digit year corresponding to the ISO week number;
// same as Y except if the ISO week number belongs
// to the previous or next year, that year is used
// instead
// Year L Leap year flag (yes is 1) 0, 1
// Time zone O Hour offset from GMT, ±HHMM (e.g., −0400,
// +0230) −1200–+1200
// Time zone P Like O , but with a colon −12:00 –+12:00
// Time zone Z Seconds offset from GMT; west of GMT is negative, -43200–50400
// east of GMT is positive
// Time zone e Time zone identifier e.g., America/New_York
// Time zone T Time zone abbreviation e.g., EDT
// Time zone I Daylight saving time flag (yes is 1) 0, 1
// Compound c ISO 8601–formatted date and time e.g., 2012-09-06T15:29:34+0000
// Compound r RFC 2822–formatted date e.g., Thu, 22 Aug 2002 16:01:07
// +0200
// Other U Seconds since the Unix epoch 0−2147483647
// Other B Swatch Internet time 000–999
	?>
	<hr> Example 3-14. Calculating the difference between two dates <br>
	<?php 
	$first = new DateTime("1965-05-10 7:32:56pm", new DateTimeZone('America/New_York'));
	$second = new DateTime("1962-11-20 4:29:11am", new DateTimeZone('America/New_York'));
	$diff = $second->diff($first);
	printf("The two dates have %d weeks, %s days, " .
		"%d hours, %d minutes, and %d seconds " .
		"elapsed between them.",
		floor($diff->format('%a') / 7),
		$diff->format('%a') % 7,
		$diff->format('%h'),
		$diff->format('%i'),
		$diff->format('%s'));

	echo "<br><br> 3-15. Calculating the elapsed-time difference between two dates
// 7:32:56 pm on May 10, 1965 <br>";
	$first_local = new DateTime("1965-05-10 7:32:56pm",new DateTimeZone('America/New_York'));
// 4:29:11 am on November 20, 1962
	$second_local = new DateTime("1962-11-20 4:29:11am",
		new DateTimeZone('America/New_York'));
	$first = new DateTime('@' . $first_local->getTimestamp());
	$second = new DateTime('@' . $second_local->getTimestamp());
	$diff = $second->diff($first);
	printf("~The two dates have %d weeks, %s days, " .
		"%d hours, %d minutes, and %d seconds " .
		"elapsed between them.",
		floor($diff->format('%a') / 7),
		$diff->format('%a') % 7,
		$diff->format('%h'),
		$diff->format('%i'),
		$diff->format('%s'));

	echo "<hr>The function strtotime() understands words about the current time:<br>";
	$a = strtotime('now');
	print date(DATE_RFC850, $a);
	print "<br>";
	$a = strtotime('now + 3 months');
	print date(DATE_RFC850, $a);
	print "<br>";

	$a = strtotime('5/12/2014');
	print date(DATE_RFC850, $a);
	print "<br>";
	$a = strtotime('12 may 2014');
	print date(DATE_RFC850, $a);
	print "<br>";
// Monday, 12-May-14 00:00:00 UTC
// Monday, 12-May-14 00:00:00 UTC
// It understands relative times and dates:
	$a = strtotime('last thursday');
	print date(DATE_RFC850, $a);
	print "<br>";
// On February 12, 2013
echo "------ str to time";
	$a = strtotime('+ 1 day');
	print date(DATE_RFC850, $a);

	print "<br>";
// On February 12, 2013
	$a = strtotime('2019-9-9');
	print date(DATE_RFC850, $a);
	?>
<hr>3.9 Adding to or Subtracting from a Date <br>
<?php 
date_default_timezone_set('America/New_York');
	$birthday = new DateTime('September 9, 2021');
// When is 40 weeks before $birthday?
$human_gestation = new DateInterval('P40W');
$birthday->sub($human_gestation);
print $birthday->format(DateTime::RFC850);
print "<br>";
// What if it was an elephant, not a human?
$elephant_gestation = new DateInterval('P616D');
// 3.9 Adding to or Subtracting from a Date
$birthday->add($elephant_gestation);
print $birthday->format(DateTime::RFC850);

 ?>

 <hr>Generating an ID with microtime() <br>
<?php 
echo microtime()."<br>";
list($microseconds,$seconds) = explode(' ',microtime());
echo $id = $seconds.$microseconds.getmypid()."<br>";
echo getmypid();
 ?>

 <hr>Gjenerating time ranges <br>
 <?php 
 // Start on August 1
$start = new DateTime('August 1, 2014');
// End date is exclusive, so this will stop on August 31
$end = new DateTime('September 1, 2014');
// Go 1 day at a time
$interval = new DateInterval('P1D');
 $range1 = new DatePeriod($start, $interval, $end);
// Here’s another way to do the same thing:
// Start on August 1
$start = new DateTime('August 1, 2014');
// Go 1 day at a time
$interval= new DateInterval('P1D');
// Recur 30 times more after the first occurrence.
$recurrences = 30;
$range2 = new DatePeriod($start, $interval, $recurrences); 

$range3 = new DatePeriod('R30/2014-08-01T00:00:00Z/P1D');

foreach ($range3 as $d) {
print "A day in August is " . $d->format('d') . "<br>";
}

?>

	<br>
	<a id="topp" href="#bottom" ><h1>Go bottom</h1></a>
	<a id="bottomm" href="#top" ><h1>Go up</h1></a>
	<a id="bottom" href="#top"><h1>Go Up</h1></a>
</body>
</html>