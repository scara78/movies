<?php

if ($_SERVER['REQUEST_URI'] == '/robots.txt') {

	header('Content-Type: text/plain');
	echo "User-agent: *
	\r\n";
	echo "Sitemap: http://" . $_SERVER['HTTP_HOST'] . "/sitemap.xml\r\n";
	exit;
}
