<?php 
	$email = 'diu@gmail@.com';
if (strpos($email, '@') === 3) {
print 'There was no @ in the e-mail address!';
}else {
	print "Valid $email";
}
 $pos = stripos($email, '@');
 echo $pos;
 ?>