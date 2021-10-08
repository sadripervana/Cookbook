<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Numbers</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<h1 class="title"><a href="index.php"><</a> Numbers </h1>
	<a id="top" href="#bottom" ><h1>Go bottom</h1></a>

	You want to apply a piece of code to a range of integers.
	Solution
	Use a for loop: <br>
	<?php 
	$start = 3;
	$end = 7;
	for ($i = $start; $i <= $end; $i++) {
		printf("%d squared is %d\n", $i, $i * $i);
		print "<br>";
	}
	print "<br>";

	$numbers = range(3, 7);
	print count($numbers);
	foreach ($numbers as $n) {
		printf("%d squared is %d\n", $n, $n * $n);
		print "<br>";
	}
	print "<br>";
	foreach ($numbers as $n) {
		printf("%d cubed is %d\n", $n, $n * $n * $n);
		print "<br>";
	}
	?>
	<hr>2.10 Formatting Numbers <br>
	If you always need specific characters as decimal point and thousands separators, use
	number_format() : <br>
	<?php 
	$number = 1234056.9269;
	echo $formatted1 = number_format($number)."<br>";
	echo $formatted2 = number_format($number, 2)."<br>";
	echo $formatted3 = number_format($number, 2, ",", ".")."<br>";


$number = 3145.92653; // your number
list($int, $dec) = explode('.', $number);
// $formatted is 31,415.92653
echo $formatted = number_format($number, strlen($dec));
echo "<br>";

// per te shtuar classen NUMBERFORMATTER instalo kete
// sudo apt-get install php-intl
// service apache2 restart
$f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
echo $f->format(123456);
echo "<br>";

$number = '1234.56';
$france = new NumberFormatter("en", NumberFormatter::SPELLOUT);
// $formatted is "mille-deux-cent-trente-quatre virgule cinq six"
$formatted = $france->format($number);
echo $formatted;
echo "<br>";
$number = 1234.56;
// US uses $ , and .
// $formatted1 is $1,234.56
$usa = new NumberFormatter("en-US", NumberFormatter::CURRENCY);
echo $formatted1 = $usa->format($number);
echo "<br>";
// France uses , and €
// $formatted2 is 1 234,56 €
$france = new NumberFormatter("fr-FR", NumberFormatter::CURRENCY);
echo $formatted2 = $france->format($number);
echo "<br>";

$number = 1234.56;
// US uses € , and . for Euro
// $formatted is €1,234.56
$usa = new NumberFormatter("en-US", NumberFormatter::CURRENCY);
echo $formatted = $usa->formatCurrency($number, 'EUR');
?>

<hr> Printing Correct Plurals <br>
<?php 

function may_pluralize($singular_word, $amount_of){
		//array of special plurals
	$plurals = [ 'fish' => 'fish', 'person' => 'people'];

		//only one
	if(1 == $amount_of) {
		return $singular_word;
	}

		//more than one, special plural
	if(isset($plurals[$singular_word])){
		return $plurals[$singular_word];
	}
		//more than one, standard plural: add 's' to end of word
	return $singular_word . 's';
}

$number_of_fish = 3;
echo $out1 = "I meet $number_of_fish " . may_pluralize('person', $number_of_fish) . '.';
?>

<br>
<a id="topp" href="#bottom" ><h1>Go bottom</h1></a>
<a id="bottomm" href="#top" ><h1>Go up</h1></a>
<a id="bottom" href="#top"><h1>Go Up</h1></a>
</body>
</html>