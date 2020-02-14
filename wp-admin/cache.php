<?php
SESSION_START();
require "session.php";

if (isset($_POST['cachefilm'])) {

    $filecache = 'file/txt/cachepath.txt';
    $filecachesitemap = 'file/txt/cachesitemappath.txt';
    $cache_trailer = 'file/txt/cachetrailer.txt';

    file_put_contents($filecache, $_POST['cachefilm']);
    file_put_contents($filecachesitemap, $_POST['cachesitemap']);
    file_put_contents($cache_trailer, $_POST['cachetrailer']);
}

$pagename = "Cache";
include 'header.php';
include 'sidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?= $pagename; ?>
            <small>
                <button type="button" id="display" class="btn btn-block btn-default btn-xs">Get Path</button>
                <!-- <input type="button" class="btn btn-success mb-2 mr-sm-2" id="display" value="Retrieve" /> -->
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?= $pagename; ?></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered table-hover">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Path Cache Film</label>
                            <input type="text" class="form-control" name="cachefilm" id="cachefilm" value="<?= cache_path() ?>">
                            <label for="exampleFormControlInput1" id="cachepath" style="display: none;"></label>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Path Cache Sitemap</label>
                            <input type="text" class="form-control" name="cachesitemap" id="cachesitemap" value="<?= cache_sitemap() ?>">
                            <label for="exampleFormControlInput1" id="sitemappath" style="display: none;"></label>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Path Cache Sitemap</label>
                            <input type="text" class="form-control" name="cachetrailer" id="cachetrailer" value="<?= cache_trailer() ?>">
                            <label for="exampleFormControlInput1" id="trailerpath" style="display: none;"></label>
                        </div>
                        <button type=" submit" class="btn btn-primary mb-2">Simpan</button>
                    </form>
                </table>
            </div>
        </div>
        <div class="card-deck mb-3 text-center">
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Cache API Request <strong>Film Data</strong> themoviedb.org</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title"><?= cache_path_size() ?> <small class="text-muted">/ kb</small></h1>
                    <a href="cache_del.php?id=movies"><button type="button" class="btn btn-lg btn-block btn-primary">Hapus Semua Cache</button></a>
                </div>
            </div>
        </div>
        <div class="card-deck mb-3 text-center">
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Cache API Request <strong>Sitemap Data</strong> themoviedb.org</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title"><?= sitemap_cache_size() ?> <small class="text-muted">/ kb</small></h1>
                    <a href="cache_del.php?id=sitemap"><button type="button" class="btn btn-lg btn-block btn-primary">Hapus Semua Cache</button></a>
                </div>
            </div>
        </div>
        <div class="card-deck mb-3 text-center">
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Cache API Request <strong>Trailer Data</strong> themoviedb.org</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title"><?= trailer_cache_size() ?> <small class="text-muted">/ kb</small></h1>
                    <a href="cache_del.php?id=trailer"><button type="button" class="btn btn-lg btn-block btn-primary">Hapus Semua Cache</button></a>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include 'cache_getpath.php'; ?>
<?php include 'footer.php' ?>