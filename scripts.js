$(document).ready(function()
{
	var loadTime = new Date().getTime();
	
	$.get('ping.php', null, function()
	{
		now = new Date().getTime();
		$('#ping').append(now - loadTime);
	});
	
	$('#begin').click(function()
	{
		$('#result').slideUp().html('');
		testTime = new Date().getTime();
		$.get('stream.php', null, function(data)
		{
			filesize = data.length/1024/1024;
			time = (new Date().getTime() - testTime) / 1000;
			$('#result').append('<li>In ' + time + ' seconds you have downloaded ' + filesize + ' MBytes</li>');
			$('#result').append('<li>Your connection speed is ' + filesize/time + ' MBps (Mega Bytes per second)</li>');
			$('#result').append('<li>Or ' + (filesize * 8)/time + ' Mbps (Mega Bits per second)</li>');
			$('#result').slideDown();		
		});
	});
});
