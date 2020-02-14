<?php
SESSION_START();
require "session.php";
if (!empty($_POST['id_film'])) {
    $dataBaru = array(
        'id_film'  => $_POST['id_film'],
        'link'  => $_POST['link']
    );
    $file = file_get_contents('file/json/link_film.json');
    $data = json_decode($file, true);
    unset($_POST["add"]);
    $data["results"] = array_values($data["results"]);
    array_push($data["results"], $dataBaru);
    file_put_contents("file/json/link_film.json", json_encode($data));
    header("Location: stream.php");
}
$pagename = "Add Drive";
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
                    <form method="POST" action="">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-sm-8">
                                    <label for="exampleInputEmail1"><b> Film : </b></label>
                                    <input type="text" class="col-8 form-control" name="id_film" id="id_film" aria-describedby="id_film" placeholder="Ex : 66bd21">
                                    <small id="id_film" class="form-text text-muted">http://namadomain.com/movie/the-lion-king-2019-<b>66bd21</b></small>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8">
                                    <label for="exampleInputEmail1"><b> Google Drive ID : </b></label>
                                    <input type="text" class="col-8 form-control" name="driveid" id="driveid" value="https://drive.google.com/file/d/driveid_disini/view" aria-describedby="emailHelp" placeholder="ex : 1S870-wU8HHbyt4a9D2SjUP2n6Md4s06G">
                                    <small id="driveid" class="form-text text-muted">Ex : https://drive.google.com/file/d/<b>1S870-wU8HHbyt4a9D2SjUP2n6Md4s06G</b>/view</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8">
                                    <label for="exampleInputEmail1"><b> Poster [optional] : </b></label>
                                    <input type="text" class="col-8 form-control" name="poster" id="poster" aria-describedby="poster" placeholder="Ex : https://www.gdriveplayer.us/poster/34775.jpg.">
                                    <small id="poster" class="form-text text-muted">Ex : https://www.gdriveplayer.us/poster/34775.jpg</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8">
                                    <label for="exampleInputEmail1"><b> Link Subtitle : </b></label>
                                    <input type="text" class="col-8 form-control" name="subtitle" id="subtitle" aria-describedby="subtitle" placeholder="Ex : https://subscene.com/subtitles/wonder-woman-2017/indonesian/1575005.">
                                    <small id="subtitle" class="form-text text-muted">Ex : http://subtitle.gdriveplayer.us/subtitle/mr._robot.s04e06.web.xlf.ok.srt </small>
                                    <br /><b> OR </b><br />
                                    <label for="exampleInputEmail1"><a href="https://gdriveplayer.us/#usage" target="_blank">KLIK DISINI</a> untuk Upload subtitle .srt / generate langsung</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8">
                                    <label for="exampleFormControlTextarea1"><b> Link Source : </b></label>
                                    <textarea class="col-8 form-control" id="link_source" name="link_source" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8">
                                    <label for="exampleFormControlTextarea1"><b> Link Streaming : </b></label>
                                    <textarea class="col-8 form-control" id="link" name="link" rows="5"></textarea>
                                </div>
                            </div>
                            <div id="preview" class="c</div>ol-8"></div>

                            <div class="form-group">
                                <div class="col-sm-8" style="margin-top: 10px;">
                                    <label for="exampleFormControlTextarea1"> </label>
                                    <input type="button" class="btn btn-success mb-2 mr-sm-2" id="display" value="Retrieve" />
                                    <button type="submit" class="btn btn-primary mb-2 mr-sm-2">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include 'stream_drive_retrieve.php'; ?>
<?php include 'footer.php'; ?>