<?php

if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $all = file_get_contents('file/json/link_film.json');
    $all = json_decode($all, true);
    $jsonfile = $all["results"];
    $jsonfile = $jsonfile[$id];

    if ($jsonfile) {
        unset($all["results"][$id]);
        $all["results"] = array_values($all["results"]);
        file_put_contents("file/json/link_film.json", json_encode($all));
    }
    header("Location: stream.php");
}
