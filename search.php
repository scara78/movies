<?php
if (isset($_GET['q'])) {
	$q = $_GET['q'];
	$q = strip_tags($q);
	$q = preg_replace('/\+|\s|\%20|\.|(-{2,})/', '-', $q);
	$q = preg_replace('/\-\-+/', '-', $q);
	$q = trim($q, '-');
	$q = strtolower($q);
	header('location: ' . site_url() . '/movies/' . $q . '');
	exit;
}
