<?php

header("content-type: text/plain");

echo "Start\r\n";

$files_to_condense = ['deploy.php', 'hookhand-setup.php'];

foreach($files_to_condense as $filename)
{
	echo "==\r\nCondense $filename\r\n";

	condense($filename);
}

function condense($filename)
{
	$content = file_get_contents($filename);

	//Run regex replacing every included/required filename
	// with the actual content of that file
	//echo "Before:\r\n$content";
	
	$content = preg_replace_callback(
		"/(include|require) ?\(?'?(.*\.php)'?\)? ?;/",
		function($matches)
		{
			//$matches looks like ["require 'credentials.php';", "require", "credentials.php"]
			// So treat match no. 2 as a filename and open it
			return file_get_contents($matches[2]);
		},
		$content);
	
	//echo "\r\n====\r\nAfter:\r\n$content";
	
	//TODO Write $content back into the file
}


?>