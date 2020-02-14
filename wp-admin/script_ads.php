<?php
SESSION_START();
require "session.php";
if (isset($_POST['headertext'])) {
    file_put_contents('file/txt/header.txt', $_POST['headertext']);
    file_put_contents('file/txt/footer.txt', $_POST['footertext']);
    file_put_contents('file/txt/adshomeatas.txt', $_POST['adshomeatas']);
    file_put_contents('file/txt/adssingle.txt', $_POST['adssingle']);
    file_put_contents('file/txt/adswatchatas.txt', $_POST['adswatchatas']);
    file_put_contents('file/txt/adswatchbawah.txt', $_POST['adswatchbawah']);
}
?>
<?php $pagename = "Ads & Script"; ?>
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
                <form action="" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Header.php</label>
                        <textarea class="form-control" name="headertext" id="headertext" rows="10"><?php echo ads_header(); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Footer.php</label>
                        <textarea class="form-control" name="footertext" id="footertext" rows="10"><?php echo ads_footer(); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Ads Home Atas</label>
                        <textarea class="form-control" name="adshomeatas" id="adshomeatas" rows="10"><?php echo ads_homeatas(); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Ads Single Popunder / Native Atas</label>
                        <textarea class="form-control" name="adssingle" id="adssingle" rows="10"><?php echo ads_single(); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Ads Watch Popunder / Native Atas</label>
                        <textarea class="form-control" name="adswatchatas" id="adswatchatas" rows="10"><?php echo ads_watchatas(); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Ads Watch Native Bawah</label>
                        <textarea class="form-control" name="adswatchbawah" id="adswatchbawah" rows="10"><?php echo ads_watchbawah(); ?></textarea>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-8" style="margin-top: 10px;">
                            <label for="exampleFormControlTextarea1"> </label>
                            <button type="submit" class="btn btn-primary mb-2">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?php include 'footer.php' ?>