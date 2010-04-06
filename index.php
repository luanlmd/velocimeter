<!DOCTYPE html> 
<html>
	<head>
		<title>Velocimeter - Connection Speed Test</title>
		<style>
			html, body { width:100% height:100%; }
			body { background:black; }
			#wrapper { margin:auto; width:800px; background: white; padding:15px 20px; border-radius: 10px }
		</style>
	</head>
	<body>
	<div id="wrapper">
		<h1>Velocimeter</h1>
		<p>Testing your connection...</p>
<?php
$kb=512;
echo "\n";
echo "<!--";
flush();
$time = explode(" ",microtime());
$start = $time[0] + $time[1];
//die(var_dump($start));
//$start = date('u');
for($x=0;$x<$kb;$x++){
    echo str_pad('', 1024, '.');
    flush();
}
$time = explode(" ",microtime());
$finish = $time[0] + $time[1];
//$finish = date('u');
$deltat = $finish - $start;
echo "-->\n";
?>
			<p>Test finished in <?php echo $deltat ?> seconds.</p>
			<p>Your speed is <?php echo round($kb / $deltat, 3) ?> Kb/s</p>
		</div>
	</body>
</html>
