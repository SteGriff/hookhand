<?php

// setup-script - called by the setup.htm page

header("content-type: text/plain");

//The credentials file just needs to set $deployment_key to some secret value.
require 'credentials.php';
require 'config.php';

/*
	Linked variables:
	$deployment_key
	$git
	$remote
	$destination_dir
*/

$supplied_key = $_POST['key'] ;

if ($supplied_key == $deployment_key)
{
	$output = `2>&1 $git clone $remote $destination_dir`;
	echo "The local terminal says:\r\n";
	echo $output;
	if (!(stristr($output, 'error') || stristr($output, 'fatal')))
	{
		echo "(The process appears to have succeeded! Congrats!)";
	}
}
else
{
	echo "Deployment key incorrect";
}

?>