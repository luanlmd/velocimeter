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
echo '<!-';
flush();
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
			<p>Downloaded <?php echo $bytes ?> bytes in <?php echo round($duration,3) ?> seconds.</p>
			<p>Your speed is <?php echo round(($bytes/1024) / $duration, 3) ?> Kb/s</p>
		</div>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-683660-14");
pageTracker._trackPageview();
} catch(err) {}</script>
	</body>
</html>
