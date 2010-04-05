<?php
$current = date('U')+10;
while(true)
{
	for ($i=0; $i<1024; $i++)
	{
		echo 'a';
	}
	flush();
	if ($current <= date('U')) { break; }
}
