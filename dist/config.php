<?php

$git = "git";
$remote = "https://github.com/stegriff/sscp";
$destination_dir = ".";

function sh($commands)
{
	return `2>&1 $commands`;
}

?>