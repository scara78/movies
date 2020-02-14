<?php

$id_film = get_idfilm();
$data = get_trailer($id_film);
?>
<!-- <iframe width="100%" height="100%" src="https://database.gdriveplayer.us/player.php?imdb=tt7286456" frameborder="0"></iframe> -->
<iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?= $data ?>" frameborder="0"></iframe>