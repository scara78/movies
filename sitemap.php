<?php
if (preg_match('/\/sitemap.xml/', $_SERVER['REQUEST_URI'])) {
	include('wp-includes/sitemap/sitemap.php');
	exit;
}
/*--------------------------------------------------
Url SuperSitemap
--------------------------------------------------*/

require 'wp-includes/vendor/autoload.php';
require 'wp-includes/source/API-MOVIE.php';

if (preg_match('/\/(sitemap)\-(.*)\.xml$/', $_SERVER['REQUEST_URI'])) {
	include('wp-includes/sitemap/sitemap-movies.php');
	exit;
}
if (preg_match('/\/(post-sitemap)\-(.*)\.xml$/', $_SERVER['REQUEST_URI'])) {
	include('wp-includes/sitemap/sitemap-post.php');
	exit;
}
if (preg_match('/\/(director-sitemap)\-(.*)\.xml$/', $_SERVER['REQUEST_URI'])) {
	include('wp-includes/sitemap/sitemap-director.php');
	exit;
}
if (preg_match('/\/(cast-sitemap)\-(.*)\.xml$/', $_SERVER['REQUEST_URI'])) {
	include('wp-includes/sitemap/sitemap-cast.php');
	exit;
}
