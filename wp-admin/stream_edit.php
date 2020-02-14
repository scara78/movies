<?php
SESSION_START();
require "session.php";

if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $jsonfile = stream_id();
    $jsonfile = $jsonfile[$id];
}

if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];
    $getfile = file_get_contents('file/json/link_film.json');
    $all = json_decode($getfile, true);
    $jsonfile = $all["results"];
    $jsonfile = $jsonfile[$id];

    $post["id_film"] = isset($_POST["id_film"]) ? $_POST["id_film"] : "";
    $post["link"] = isset($_POST["link"]) ? $_POST["link"] : "";

    if ($jsonfile) {
        unset($all["results"][$id]);
        $all["results"][$id] = $post;
        $all["results"] = array_values($all["results"]);
        file_put_contents("file/json/link_film.json", json_encode($all));
    }
    header("Location:stream.php");
}
?>
<?php $pagename = "Edit Stream"; ?>
<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>
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
                    <?php if (isset($_GET["id"])) : ?>
                        <form method="POST" action="" class="form-horizontal">
                            <input type="hidden" value="<?php echo $id ?>" name="id" />
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="add_movie" class="col-sm-2 control-label">ID Film</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="<?= $jsonfile["id_film"] ?>" name="id_film" placeholder="ID Film   ..">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="add_movie" class="col-sm-2 control-label">Link Stream</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" rows="3" name="link" value="<?= $jsonfile["link"] ?>" placeholder="Link Stream ..."><?= $jsonfile["link"] ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="add_movie" class="col-sm-2 control-label"></label>
                                    <div class="col-sm-8">
                                        <button type="submit" class="btn btn-info pull-left">Update</button>
                                        <a href="stream.php" type="button" class="btn btn-default pull-right">Batal</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include 'footer.php'; ?>