<?php

$MV_API_ARRAY = dirname(__FILE__) . '/API-MOVIE.txt';
$MV_API_LIST = file_get_contents($MV_API_ARRAY);
$APIKEYMV = explode("\n", $MV_API_LIST);
$randomKeysmv = array_rand($APIKEYMV, 1);
$movieapi = trim($APIKEYMV[$randomKeysmv]);
$api = $movieapi;
