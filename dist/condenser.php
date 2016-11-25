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
	//Read whole file and split into lines in OS-independent way
	$content = file_get_contents($filename);
	//$lines = preg_split("/\r\n|\n|\r/", $content);
	
	echo "Before:\r\n$content";
	
	$content = preg_replace_callback(
		"/(include|require) ?\(?'?(.*\.php)'?\)? ?;/",
		function($matches)
		{
			//Matches is like ["require 'credentials.php';", "require", "credentials.php"]
			// So open the content of match no. 2
			return file_get_contents($matches[2]);
		},
		$content);
	
	echo "\r\n====\r\nAfter:\r\n$content";
	
	// //Find include and require lines
	// foreach($lines as $line)
	// {
		// //Look for keyword 'require' (PHP keywords are case insensitive)
		// if (stripos($line, 'require') !== false || stripos($line, 'include') !== false)
		// {
			// echo "Parse '$line'\r\n";
			// $included_file = preg_replace("/(include|require) ?\(?'?(.*\.php)'?\)? ?;?/", "$2", $line);
			// echo "Got '$included_file'\r\n\r\n";
			// $included_file_content = ;
			
		// }
	// }
	
}


?>