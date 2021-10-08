<!DOCTYPE html>
<head>
  <html lang="en">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Strings</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <a id="top" href="#bottom" ><h1>Go bottom</h1></a><br>


  <?php 

// StrPos
  echo "strpos() — Find the position of the first occurrence of a substring in a string <br>";
  $email = 'diu@gmail@.com';
  if (strpos($email, '@') === 3) {
    print 'There was no @ in the e-mail address!';
  }else {
   print "Valid $email";
 }
 $pos = stripos($email, '@');
 echo $pos;

 // Substring to select your substring,
 echo "<hr><br> Substring to select your substring,<br>";
 $substring = substr($string,$start,$length);
 $username = substr('sadri pervana',0,8);

 print $username;
 print "<br>";
 print substr('watch out for that tree',6,5);
 print "<br>";
// Using substr( ) with length past the end of the string
 print substr('watch out for that tree',20,5);
 print "<br>";
// $start is negative, substr() counts back from the end of the string to determine
// where your substring starts, as shown in Example 1-12.
// Example 1-12. Using substr( ) with negative start
 print substr('watch out for that tree',-6);
 print "<br>";
 print substr('watch out for that tree',-17,5);
 print "<br>";

// Replacing a substring with substr_replace( )
 echo "<hr><br>Replacing a substring with substr_replace( ) <br>";
 $credit_card = '4111 1111 1111 1111';
 print substr_replace($credit_card,'xxxx ',0,strlen($credit_card)-4);
 echo '<br>';

// Processing each byte in a string
 echo "<hr><br> Processing each byte in a string<br>";
 $string = "This weekend, I'm going shopping for a pet chicken.";
 $vowels = 0;
 for ($i = 0, $j = strlen($string); $i < $j; $i++) {
  if (strstr('aeiouAEIOU',$string[$i])) {
    $vowels++;
  }
}
echo "$vowels <br>";

function lookandsay($s) {
// initialize the return value to the empty string
  $r = '';
// $m holds the character we're counting, initialize to the first
// character in the string
  $m = $s[0];
// $n is the number of $m's we've seen, initialize to 1
  $n = 1;
  for ($i = 1, $j = strlen($s); $i < $j; $i++) {
// if this character is the same as the last one
    if ($s[$i] == $m) {
// increment the count of this character
      $n++;
    } else {
// otherwise, add the count and character to the return value
      $r .= $n.$m;
// set the character we're looking for to the current one
      $m = $s[$i];
// and reset the count to 1
      $n = 1;
    }
  }
// return the built up string as well as the last count and character
// 1.4 Processing a String One Byte at a Time
  return $r.$n.$m;
}
for ($i = 0, $s = 1; $i < 10; $i++) {
  $s = lookandsay($s);
  print "$s<br>";
}

// 1.5 Reversing a String by Word or Byte
// Problem
// You want to reverse the words or the bytes in a string.
echo "<hr><br> Use strrev() to reverse by byte <br>";
print strrev('This is not a palindrome.');

echo "<br> To reverse by words, explode the string by word boundary, reverse the words, and then
rejoin<br>";
$s = "Once uppon a time there was a turtle.";
//break the string up into words
$words = explode(' ', $s);
// reverse the array of words
echo '<pre>'. var_dump($words);
$words = array_reverse($words);
//rebuild the string
$s = implode(' ', $words);
print $s;

$reversed_s = implode(' ', array_reverse(explode(' ', $s)));
echo $reversed_s;

// 1.6 Generating a Random String
echo "<hr><br> Generating a Random String <br>";
function str_rand($length = 32, $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'){
  if(!is_int($length) || $length < 0){
    return false;
  }
  $characters_length = strlen($characters) - 1;
  $sring = '';
  for ($i = $length; $i > 0; $i--){
    $string .=$characters[mt_rand(0, $characters_length)];
  }
  return $string;
}
print str_rand(16);


// Swithch tabs and spaces
echo "<hr><br> Switch tabs to spaces<br>";

$tabbed = str_replace(' ', '&nbsp;&nbsp;&nbsp;&nbsp; ',"Hello There World! Have a Awesome Day!");
$spaced = str_replace('    ', ' ', 'Hello  There    World!    Have   a   Awesome   Day!  ');
print "With Tabs: <pre> $tabbed </pre>";
print "With Spaces: <pre> $spaced </pre>";

//Use the tab_expand() function shown
// in Example 1-22 to turn tabs to spaces in a way that respects tab stops.
echo "<hr><br>to turn tabs to spaces in a way that respects tab stops.<br> ";

function tab_expand($text){
  while(strstr($text,"\t")){
    $text = preg_replace_callback('/^([^\t\n]*)(\t+)/m',
      'tab_expand_helper', $text);
  }
  return $text;
}

function tab_expand_helper($matches){
  $tab_stop = 5;
  return $matches[1] . str_repeat(' ',strlen($matches[2]) * $tab_stop - (strlen($matches[1]) % $tab_stop));
}

$spaced = tab_expand('Hello  There    World!    Have   a   Awesome   Day! 
  Hello  There    World! \t Have   a   Awesome   Day!
  Hello  There    World!    Have   a   Awesome   Day!
  Hello  There    World!    Have   a   Awesome   Day! ');
echo $spaced;


echo "<hr><br>Use ucfirst() or ucwords() to capitalize the first letter of one or more words, as shown
in Example 1-24.
Example 1-24. Capitalizing letters <br>";
print ucfirst("ucfirst: how do you do today?<br>");
print ucwords("ucwords: the price of wales<br>");
print strtoupper("i'm not yelling!<br>");
print strtolower('<A HREF="one.php">ONE</A><br>');

echo '<hr>';

$books = array( array('Elmer Gantry', 'Sinclair Lewis', 1927),
  array('The Scarlatti Inheritance','Robert Ludlum', 1971),
  array('The Parsifal Mosaic','William Styron', 1979) );
foreach ($books as $book) {
  print pack('A25A15A4', $book[0], $book[1], $book[2]) . "\n";
}
echo "<br>";
$books = array( array('Elmer Gantry', 'Sinclair Lewis', 1927),
  array('The Scarlatti Inheritance','Robert Ludlum', 1971),
  array('The Parsifal Mosaic','William Styron', 1979) );

foreach($books as $book){
  $title = str_pad(substr($book[0], 0, 25), 25,'.');
  $author = str_pad(substr($book[1], 0, 15), 15, '.');
  $year = str_pad(substr($book[2],0,4),4,'~');
  print "$title$author$year\n";
}
echo "<hr>str_split()<br>";


$str = "Hello Friend";

$arr1 = str_split($str);
$arr2 = str_split($str, 3);

print_r($arr1);
print_r($arr2);

echo "<hr>Wrapping Text at a Certain Line Length<br>";

$s = "Four score and seven years ago our fathers brought forth on this continent 
              a new nation, conceived in liberty and dedicated to the proposition 
that all men are created equal.";
print "<pre>\n".wordwrap($s,50)."\n</pre>";

echo "<hr><h2>Chapter 2.Numbers</h2><br>";
echo '1'."1";
?>

<br>
<a id="topp" href="#bottom" ><h1>Got bottom</h1></a>
<a id="bottomm" href="#top" ><h1>Got up</h1></a>
<a id="bottom" href="#top"><h1>Go Up</h1></a>
</body>
</html>