<?php
$isDebug = false;
if ($isDebug) {
	error_reporting(E_ALL);
	ini_set('display_errors', 'off');
} else {
	error_reporting(0);
	ini_set('display_errors', 'off');
}
require_once('function.php');

if (!ob_start("ob_gzhandler")) ob_start();

include('search.php');
include('robots.php');
include('sitemap.php');

###### $qq pencarian arah kemana ############# 

if (preg_match('/\//', $_SERVER['REQUEST_URI'])) {

	if (preg_match('/\/movie\//', $_SERVER['REQUEST_URI'])) {
		preg_match_all('/^\/movie\/(.*)\/(.*)/', $_SERVER['REQUEST_URI'], $qq, PREG_SET_ORDER);
		$yid = $qq[0][1];
		$q = $qq[0][2];
		include('watch.php');
		exit;
	}
	if (!preg_match('/_[0-9]{1,}|\/movie\//', $_SERVER['REQUEST_URI'])) {
		preg_match_all('/\/(movies|play|list|songs|admin)\/(.*)/', $_SERVER['REQUEST_URI'], $qq, PREG_SET_ORDER);
		$q = $qq[0][2];
	}
	$kwu = str_replace('.html', '', $_SERVER['REQUEST_URI']);
	$kwu = trim($kwu, '/');
	$kws = explode('/', $kwu);
	$q = end($kws);
	if (preg_match('/_[0-9]{1,}/', $_SERVER['REQUEST_URI'])  && preg_match('/\/movies\/|\/music\/|\/songs\/|\/list\/|\/admin\//', $_SERVER['REQUEST_URI'])) {
		preg_match_all('/\/(movies|play|list|songs|music)\/(.*)_(.*)/', $_SERVER['REQUEST_URI'], $qq, PREG_SET_ORDER);
		$q = $qq[0][2];
		$p = $qq[0][3];
	}
}

$tags = explode('/', ROOT);
$tag = $tags[1];

if (!preg_match('/^\/(movies|play|list|songs|music)\//', $_SERVER['REQUEST_URI']) && ROOT != '/') {
	$kwu = preg_replace('/(.*)\.[\w]{3,4}/', '\1', $_SERVER['REQUEST_URI']);
	$kwu = trim($kwu, '/');
	$kws = explode('/', $kwu);
	$q = end($kws);
}

$day = gmdate('D, d M');
$y = gmdate('Y') - 1;
$h = gmdate('H:i:s');
$expire = $day . ' ' . $y . ' ' . $h;
header('Expires: ' . $expire . ' GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
header("Vary: Accept-Encoding");
header('Content-Type: text/html; charset=utf-8');

###### redirect jika URL bukan permalink ############# 
if (preg_match('/\?q/', $_SERVER['REQUEST_URI'])) {
	$rew = $_SERVER['REQUEST_URI'];
	$rew = preg_replace('/(.*)\&x=(.*)/', '\1', $rew);
	if (!preg_match('/&p=/', $rew)) {
		$rq = explode('q=', $rew);
		$rsearch = end($rq);
		$rsearch = preg_replace('/\+|\s|\%20|(-{2,})/', '-', $rsearch);
		header('location: http://' . $_SERVER["HTTP_HOST"] . '/' . $rsearch . '');
		exit;
	} else {
		$rsearch = potong($rew, 'q=', '&p');
		$rsearch = preg_replace('/\+|\s|\%20|(-{2,})/', '-', $rsearch);
		$rhal = explode('p=', $rew);
		$rpg = end($rhal);
		header('location: http://' . $_SERVER["HTTP_HOST"] . '/' . $rsearch . '_' . $rpg . '');
		exit;
	}
}
################ end redirect ####################
?>
<?php include_once('home.php'); ?>	

<?php

###### jika selain wathc dan etc yang ada dibawah maka redirect ############# 

if (!preg_match('/^\/(movie|movies|iamadmin|dmca|ads|play|genre|trailer|eps|series)/', $_SERVER['REQUEST_URI']) && ROOT != '/') {
	require_once('single.php');
	exit;
} elseif (preg_match('/^\/movies\//', $_SERVER['REQUEST_URI'])) {
	require_once('single.php');
	exit;
} elseif (preg_match('/^\/eps\//', $_SERVER['REQUEST_URI'])) {
	require_once('episode.php');
	exit;
} elseif (preg_match('/^\/series\//', $_SERVER['REQUEST_URI'])) {
	require_once('series.php');
	exit;
} elseif (preg_match('/^\/genre\//', $_SERVER['REQUEST_URI'])) {
	require_once('single.php');
	exit;
} elseif (preg_match('/iamadmin/', $_SERVER['REQUEST_URI'])) {
	header("Location: wp-admin/");
	exit;
} elseif (preg_match('/^\/dmca/', $_SERVER['REQUEST_URI'])) {
	require_once('wp-includes/page/DMCA.php');
	exit;
} elseif (preg_match('/^\/ads/', $_SERVER['REQUEST_URI'])) {
	require_once('wp-includes/page/Ads.php');
	exit;
} elseif (preg_match('/^\/play/', $_SERVER['REQUEST_URI'])) {
	require_once('post.php');
	exit;
} elseif (preg_match('/^\/trailer/', $_SERVER['REQUEST_URI'])) {
	require_once('wp-includes/page/Trailer.php');
	exit;
}
?>
