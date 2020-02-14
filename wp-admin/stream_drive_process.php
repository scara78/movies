<?php

$driveid = $_POST['driveid'];
$poster = $_POST['poster'];
$subtitle = $_POST['subtitle'];
$link = 'http://gdriveplayer.us/embed2.php?link=' . $driveid . '&subtitle=' . $subtitle . '&poster=' . $poster . '&encrypt=yes';
echo $link;
