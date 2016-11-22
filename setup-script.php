<?php

header("content-type: text/plain");

//The credentials file just needs to set $deployment_key to some secret value.
require 'credentials.php';
require 'config.php';

/*
	Linked variables:
	$deployment_key
	$git
	$remote
	$project_name
*/

$supplied_key = $_POST['key'] ;

if ($supplied_key == $deployment_key)
{
	$output = `2>&1 $git clone $remote $project_name`;
	echo "The local terminal says:\r\n";
	echo $output;
	$expected = "Cloning into $project_name...";
	if (strstr($output, $expected) !== false)
	{
		echo "(Looks good to me - we appear to be set up)";
	}
}
else
{
	echo "Deployment key incorrect";
}

?>