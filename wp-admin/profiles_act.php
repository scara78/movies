<?php

if (!empty($_POST)) {
    $file = file_get_contents('file/json/profile.json');
    $data = json_decode($file, true);

    $data["website_name"] = isset($_POST["website_name"]) ? $_POST["website_name"] : "";
    $data["description"] = isset($_POST["description"]) ? $_POST["description"] : "";
    $data["logo_url"] = isset($_POST["logo_url"]) ? $_POST["logo_url"] : "";
    $data["favicon"] = isset($_POST["favicon"]) ? $_POST["favicon"] : "";

    $upd = json_encode($data);
    file_put_contents('file/json/profile.json', $upd);
    $ae['success_msg'] = 'Setting Update!';
    header("Location: profiles.php");
}
