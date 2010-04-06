<?php
// No cache at all!
Header('Cache-Control: no-cache');
Header('Pragma: no-cache');
?>
<!DOCTYPE html> 
<html>
	<head>
		<title>Velocimeter - Connection Speed Test</title>
		<style>
			html, body { width:100% height:100%; }
			body { background:black; }
			#wrapper { margin:auto; width:800px; background: white; padding:20px; border-radius: 10px }
		</style>
	</head>
	<body>
	<div id="wrapper">
		<h1>Velocimeter</h1>
		<p>Testing your connection...</p>
<?php
flush();
echo '<!-';
$start = microtime(true);
$bytes = 0;
while(true)
{
    echo str_pad('', 1024, '.');
    $bytes += 1024;
    flush();
	if (microtime(true) >= $start + 10) { break; }
}
$finish = microtime(true);
$duration = $finish - $start;
echo '->';
?>
			<!--p>Test finished in <?php echo round($deltat,3) ?> seconds.</p>
			<p>Downloaded <?php echo $bytes ?> bytes.</p-->
			<p>Your speed is <?php echo round(($bytes/1024) / $duration, 3) ?> Kb/s</p>
		</div>
	</body>
</html>
