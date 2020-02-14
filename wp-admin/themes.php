<?php
SESSION_START();
require "session.php";

$pilihtema = array(
    "red" => "red",
    "green" => "green",
    "blue" => "blue"
);

$getfilehome = file_get_contents('file/json/theme.json');
$jsonfilehome = json_decode($getfilehome);
$obj = $jsonfilehome->results;
$warna = $obj->theme;

if (!empty($_POST)) {
    $getfile = file_get_contents('file/json/theme.json');
    $all = json_decode($getfile, true);
    $jsonfile = $all["results"];

    $post["theme"] = isset($_POST["theme"]) ? $_POST["theme"] : "";

    if ($jsonfile) {
        unset($all["results"]);
        $all["results"] = $post;
        $all["results"] = $all["results"];
        file_put_contents("file/json/theme.json", json_encode($all));
    }
    header("Location:themes.php");
}

?>
<?php $pagename = "Themes"; ?>
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
        <!-- /.row -->
        <div class="row">
            <div class="col-md-8">
                <table class="table table-striped table-bordered table-hover">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Pilih Theme Color</label>
                            <select class="form-control" id="theme" name="theme">
                                <?php foreach ($pilihtema as $var => $interest) {
                                    $active = 'selected="selected"';
                                    if ($warna == $var) {
                                        echo '<option value="' . $var . '" ' . $active . '>' . ucwords($interest) . ' (Active)</option>';
                                    } else {
                                        echo '<option value="' . $var . '">' . ucwords($interest) . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <button type=" submit" class="btn btn-primary mb-2">Simpan Data</button>
                    </form>
                </table>
            </div>
        </div>
        <section class="content">

</div>
<?php include 'footer.php' ?>