<?php
	/**
	 * GIT DEPLOYMENT SCRIPT
	 *
	 * Sourced from:
	 *
	 *		https://gist.github.com/1809044
	 *
	 * This is intended to extend the original source and add some simple auth to prevent accidental 
	 * triggering. Intended to be used with a private GitLab repo and used as part of the GitLab CI workflow.
	 */


/* ******************************************** */
/*                    Auth                      */
/* ******************************************** */

// Get the supplied key from the request

// Get the saved key for comparison from file

// Compare the 2 keys and proceed if a match


/* ******************************************** */
/*                    Auth                      */
/* ******************************************** */


	// The commands
	$commands = array(
		'echo $PWD',
		'whoami',
		'git pull',
		'git status',
		'git submodule sync',
		'git submodule update',
		'git submodule status',
	);
	// Run the commands for output
	$output = '';
	foreach($commands AS $command){
		// Run it
		$tmp = shell_exec($command);
		// Output
		$output .= "<span style=\"color: #6BE234;\">\$</span> <span style=\"color: #729FCF;\">{$command}\n</span>";
		$output .= htmlentities(trim($tmp)) . "\n";
	}
	// Make it pretty for manual user access (and why not?)
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>GIT DEPLOYMENT SCRIPT</title>
</head>
<body style="background-color: #000000; color: #FFFFFF; font-weight: bold; padding: 0 10px;">
<pre>
 .  ____  .    ____________________________
 |/      \|   |                            |
[| <span style="color: #FF0000;">&hearts;    &hearts;</span> |]  | Git Deployment Script v0.1 |
 |___==___|  /              &copy; oodavid 2012 |
              |____________________________|

<?php echo $output; ?>
</pre>
</body>
</html>