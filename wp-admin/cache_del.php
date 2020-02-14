<?php
ob_start();
session_start();
require 'session.php';

if (htmlspecialchars($_GET["id"]) == 'movies') {
    $foldercache = cache_path();
    $hapuscache = rrmdir($foldercache);
    header("Location: cache.php");
} elseif (htmlspecialchars($_GET["id"]) == 'sitemap') {
    $foldercache = cache_sitemap();
    $hapuscache = rrmdir($foldercache);
    header("Location: cache.php");
} elseif (htmlspecialchars($_GET['id']) == 'trailer') {
    $foldercache = cache_trailer();
    $hapuscache = rrmdir($foldercache);
    header("Location: cache.php");
}
