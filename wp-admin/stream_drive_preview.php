<?php

$driveid = $_POST['driveid'];
$poster = $_POST['poster'];
$subtitle = $_POST['subtitle'];
$link = 'http://gdriveplayer.us/embed2.php?link=' . $driveid . '&subtitle=' . $subtitle . '&poster=' . $poster . '&button=no&encrypt=yes';
$link_results = file_get_contents($link);
echo $link_results;
