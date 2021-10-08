<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Calendar</title>
	<style>
	.prev { text-align: left; }
	.next { text-align: right; }
	.day, .month, .weekday { text-align: center; }
	.today { background: yellow; }
	.blank { }
</style>
</head>
<body>
	<?php 
	$month = isset($_GET['month']) ? intval($_GET['month']) : date('m');
$year = isset($_GET['year']) ? intval($_GET['year']) : date('Y');
$cal = new LittleCalendar($month, $year);
print $cal->html();
 ?>
</body>
</html>