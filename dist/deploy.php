<?php

// deploy - the target of the webhook

header("content-type: text/plain");

//The credentials file just needs to set $deployment_key to some secret value.
require 'credentials.php';
require 'config.php';

$supplied_key = $_POST['key'] ;

if ($supplied_key == $deployment_key)
{
	$output = `2>&1 $git pull`;
	echo $output;
}
else
{
	echo "Deployment key incorrect";
}

?>