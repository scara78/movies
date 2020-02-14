<?php

$driveid = $_POST['driveid'];
$poster = $_POST['poster'];
$subtitle = $_POST['subtitle'];

$link = 'http://gdriveplayer.us/embed2.php?link=' . $driveid . '&subtitle=' . $subtitle . '&poster=' . $poster . '&button=no&encrypt=yes';

$link_results = file_get_contents($link);
$hapus = array('<iframe src="', '" frameborder="0" width="100%" height="400" allowfullscreen="allowfullscreen"></iframe>');
$results = str_replace($hapus, '', $link_results,);
echo $results;
