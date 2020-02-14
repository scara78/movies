<?php
SESSION_START();
require "session.php";

if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $json = mv_edit_get();
    $json = $json[$id];
}
if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];
    $getfile = file_get_contents('file/json/film.json');
    $all = json_decode($getfile, true);
    $jsonfile = $all["results"];
    $jsonfile = $jsonfile[$id];

    $post["id_film"] = isset($_POST["id_film"]) ? $_POST["id_film"] : "";
    $post["title"] = isset($_POST["title"]) ? $_POST["title"] : "";
    $post["linkgambar"] = isset($_POST["linkgambar"]) ? $_POST["linkgambar"] : "";
    $post["genre"] = isset($_POST["genre"]) ? $_POST["genre"] : "";
    $post["tahun"] = isset($_POST["tahun"]) ? $_POST["tahun"] : "";
    $post["link1"] = isset($_POST["link1"]) ? $_POST["link1"] : "";
    $post["link2"] = isset($_POST["link2"]) ? $_POST["link2"] : "";

    if ($jsonfile) {
        unset($all["results"][$id]);
        $all["results"][$id] = $post;
        $all["results"] = array_values($all["results"]);
        file_put_contents("file/json/film.json", json_encode($all));
    }
    header("Location:movies.php");
}
?>
<?php $pagename = "Edit Movie"; ?>
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
                            <div class="box-body">
                                <input type="hidden" value="<?php echo $id ?>" name="id">
                                <div class="form-group">
                                    <label for="add_movie" class="col-sm-2 control-label">ID Film</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="<?php echo $json["id_film"] ?>" name="id_film" placeholder="id_film">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="add_movie" class="col-sm-2 control-label">Judul</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="<?php echo $json["title"] ?>" name="title" placeholder="Judul">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="add_movie" class="col-sm-2 control-label">Link Gambar</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="<?php echo $json["linkgambar"] ?>" name="linkgambar" placeholder="Link Gambar">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="add_movie" class="col-sm-2 control-label">Genre</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="<?php echo $json["genre"] ?>" name="genre" placeholder="Genre">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="add_movie" class="col-sm-2 control-label">Tahun</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="<?php echo $json["tahun"] ?>" name="tahun" placeholder="Tahun">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="add_movie" class="col-sm-2 control-label">Link Server 1</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="<?php echo $json["link1"] ?>" name="link1" placeholder="Link Server 1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="add_movie" class="col-sm-2 control-label">Link Server 2</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="<?php echo $json["link2"] ?>" name="link2" placeholder="Link Server 2">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="add_movie" class="col-sm-2 control-label"></label>
                                    <div class="col-sm-8">
                                        <div class="btn-group">
                                            <button type="submit" class="btn btn-info pull-left mr-sm-2">Update</button>
                                            <a href="movies.php" type="button" class="btn btn-default pull-right">Batal</a>
                                        </div>
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