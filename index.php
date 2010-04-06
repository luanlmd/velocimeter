<!DOCTYPE html> 
<html>
	<head>
		<title>Velocimeter - Connection Speed Test</title>
		<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
		<style>
			html, body { width:100% height:100%; }
			body { background:black; }
			#wrapper { margin:auto; width:800px; background: white; padding:15px 20px; border-radius: 10px }
			#begin { margin-bottom:10px; }
			.hidden { display:none; }
		</style>
		<script>
			$(document).ready(function()
			{
				var progress = 0;
				var loadTime = new Date().getTime();

				function ping()
				{
					$.get('ping.php', null, function()
					{
						now = new Date().getTime();
						$('#ping').append(now - loadTime);
					});
				}
				ping();
				
				$('#begin').click(function()
				{
					$("#progressbar").show().progressbar({ value: progress });
					var interval = setInterval(function()
					{
						progress += 5;
						$("#progressbar").show().progressbar({ value: progress });
					},500);
		
					$(this).attr('disabled', 'disabled').val('working...');
					$('#result').slideUp().html('');
					testTime = new Date().getTime();
		
					$.get('stream.php', null, function(data)
					{
						ping();
						clearTimeout(interval);
						progress = 0;
						$("#progressbar").hide();
						$('#begin').removeAttr('disabled').val('Test again');
						filesize = data.length/1024/1024;
						time = (new Date().getTime() - testTime) / 1000;
						$('#result').append('<li>In ' + time + ' seconds you have downloaded ' + filesize + ' MBytes</li>');
						$('#result').append('<li>Speed: ' + filesize/time + ' MBps (Mega Bytes per second)</li>');
						$('#result').append('<li>Or ' + (filesize * 8)/time + ' Mbps (Mega bits per second)</li>');
						$('#result').slideDown();		
					});
				});

				$('#begin').trigger('click');
			});
		</script>
	</head>
	<body>
		<div id="wrapper">
			<h1>Velocimeter</h1>
			<p>Ping to this server: <span id="ping"></span> miliseconds</p>
			<input type="button" id="begin" value="Begin test" />
			<div class="hidden" id="progressbar"></div>
			<ul id="result">
			</ul>
		</div>
	</body>
</html>
