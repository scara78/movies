<?php
SESSION_START();
require "session.php";

if (isset($_POST['fileapi'])) {
    $fileapi = '../wp-includes/source/API-MOVIE.txt';
    file_put_contents($fileapi, $_POST['fileapi']);
}
$pagename = "Api TMDB";
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
                        <label for="exampleFormControlTextarea1">Api tmdb <small>(bisa lebih dari 1, harus enter)</small></label>
                        <textarea class="form-control" name="fileapi" id="fileapi" rows="10"><?php echo api_show(); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Simpan</button>
                </form>
            </div>
        </div>
    </section>
</div>
<?php include 'footer.php' ?>