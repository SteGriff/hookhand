<?php

$git = "git";
$remote = "https://github.com/stegriff/sscp";
$destination_dir = ".";
$allow_get = false;

function sh($commands)
{
	return `2>&1 $commands`;
}

function info($logMsg)
{
	error_log("$logMsg\r\n", 3, "debug.log");
}

// Don't close this php block if you want to be able to use condenser.php