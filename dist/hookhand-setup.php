<?php

// hookhand-setup - called by the hookhand.htm setup page

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
	//We can't just do `git clone` as it won't work in current directory
	// because these webhook files are there.
	// http://stackoverflow.com/a/16811212
	$output .= sh("$git init $destination_dir");
	$output .= sh("cd $destination_dir");
	$output .= sh("$git remote add -t \\* -f origin $remote");
	$output .= sh("$git checkout master");
	
	echo "The local terminal says:\r\n";
	echo $output;
	if (stripos($output, 'error') === false && stripos($output, 'fatal') === false)
	{
		echo "\r\n(The process appears to have succeeded! Congrats!)\r\n";
		echo "You can now delete hookhand_setup.php and hookhand.htm \r\n";
	}
}
else
{
	echo "Deployment key incorrect";
}

?>