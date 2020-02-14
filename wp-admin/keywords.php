<?php
SESSION_START();
require "session.php";
if (isset($_POST['keywordtitle'])) {
    $filekeywordtitle = '../wp-content/uploads/keyword/keyword.txt';
    $filekeyworddirector = '../wp-content/uploads/keyword/director.txt';
    $filekeywordcast = '../wp-content/uploads/keyword/cast.txt';

    file_put_contents($filekeywordtitle, $_POST['keywordtitle']);
    file_put_contents($filekeyworddirector, $_POST['keyworddirector']);
    file_put_contents($filekeywordcast, $_POST['keywordcast']);
}
$pagename = "Keywords";
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
                <form action="" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Keyword Title</label>
                        <textarea class="form-control" name="keywordtitle" id="keywordtitle" rows="10"><?php echo keywords_title(); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">keyword Director</label>
                        <textarea class="form-control" name="keyworddirector" id="keyworddirector" rows="10"><?php echo keywords_director(); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Keyword Cast</label>
                        <textarea class="form-control" name="keywordcast" id="keywordcast" rows="10"><?php echo keywords_cast(); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Simpan</button>
                </form>
            </div>
        </div>
    </section>
</div>
<?php include 'footer.php' ?>