<?php

header("content-type: text/plain");

echo "Start\r\n";

$files_to_condense = ['deploy.php', 'hookhand-setup.php'];

foreach($files_to_condense as $filename)
{
	echo "==\r\nCondense $filename\r\n";

	$success = condense($filename);
	echo "Success: $success\r\n";
	
	if ($success)
	{
		//TODO delete the original file with unlink()
	}
}

echo "Finished\r\n";

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
	
	//Write $content back into the file
	$bytes_written = file_put_contents($filename, $content);
	return $bytes_written !== false;
}


?>