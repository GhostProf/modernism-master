<?php

// this script takes the individual articles and groups them into volumes

$volumes = array();
foreach (glob("*html") as $file) {
	$contents = file_get_contents($file);
	if (preg_match("/<body.*?>(.+?)<\/body>/is", $contents, $match)) {
		$body = $match[1];
		$volumes[substr($file,0,2)][] = $body;
	}
	else {die("Can't find body in $file");}
}

if (!file_exists('volumes')) {mkdir("volumes");}
foreach ($volumes as $volume => $bodies) {
	file_put_contents("volumes/$volume.html", "<html><head><meta http-equiv='content-type' content='text/html; charset=utf-8' /><title>Vol. $volume (JHUP)</title>" .
		implode("<hr /><hr />", $bodies) . "</body></html>");
}
