<?php
SESSION_START();
require "session.php";
$get_id = generate_id();
if (!empty($_POST)) {
    $file = file_get_contents('file/json/film.json');
    $data = json_decode($file, true);
    unset($_POST["add"]);
    $data["results"] = array_values($data["results"]);
    array_push($data["results"], $_POST);
    file_put_contents("file/json/film.json", json_encode($data));
    header("Location: movies.php");
}
?>
<?php $pagename = "Add Movie"; ?>
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
                    <form method="POST" action="" class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="add_movie" class="col-sm-2 control-label">Judul</label>
                                <div class="col-sm-8">
                                    <input type="hidden" class="form-control" value="<?php echo $get_id ?>" name="id_film">
                                    <input type="text" class="form-control" name="title" placeholder="Judul">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="add_movie" class="col-sm-2 control-label">Link Gambar</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="linkgambar" placeholder="Link Gambar">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="add_movie" class="col-sm-2 control-label">Genre</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="genre" placeholder="Genre">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="add_movie" class="col-sm-2 control-label">Tahun</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="tahun" placeholder="Tahun">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="add_movie" class="col-sm-2 control-label">Link Server 1</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="link1" placeholder="Link Server 1">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="add_movie" class="col-sm-2 control-label">Link Server 2</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="link2" placeholder="Link Server 2">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="add_movie" class="col-sm-2 control-label"></label>
                                <div class="col-sm-8">
                                    <div class="btn-group">
                                        <button type="submit" class="btn btn-info pull-left mr-sm-2">Post</button>
                                        <a href="movies.php" type="button" class="btn btn-default pull-right">Batal</a>
                                    </div>
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