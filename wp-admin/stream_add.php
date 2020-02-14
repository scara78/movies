<?php
SESSION_START();
require "session.php";
if (!empty($_POST)) {
    $location = "file/json/link_film.json";
    $file = file_get_contents($location);
    $data = json_decode($file, true);
    unset($_POST["add"]);
    $data["results"] = array_values($data["results"]);
    array_push($data["results"], $_POST);
    file_put_contents($location, json_encode($data));
    header("Location: stream.php");
}
$pagename = "Add Stream";
include 'header.php';
include 'sidebar.php'; ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?= $pagename; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?= $pagename; ?></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= $pagename; ?></h3>
                    </div>
                    <form method="POST" action="" class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="add_movie" class="col-sm-2 control-label">ID Film</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="id_film" placeholder="ID Film   ..">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="add_movie" class="col-sm-2 control-label">Link Stream</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="3" name="link" placeholder="Link Stream ..."></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="add_movie" class="col-sm-2 control-label"></label>
                                <div class="col-sm-8">
                                    <button type="submit" class="btn btn-info pull-left">Post</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include 'footer.php'; ?>