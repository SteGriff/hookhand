<?php

$git = "git";
$remote = "https://github.com/stegriff/sscp";
$destination_dir = ".";
$allow_get = false;

function sh($commands)
{
	return `2>&1 $commands`;
}

?>