<?php

header("content-type: text/plain");

//The credentials file just needs to set $deployment_key to some secret value.
require 'credentials.php';

$supplied_key = $_POST['key'] ;

if ($supplied_key == $deployment_key)
{
	$output = `git pull`;
	echo $output;
}
else
{
	echo "Deployment key incorrect";
}

?>