<?php
SESSION_START();
require "session.php";

$acc = pass_get();
$pass = $acc['password'];
if (isset($_POST["username"])) {
    $newpass = md5($_POST["password"]);
    $oldpass = md5($_POST["passwordlama"]);
    if ($oldpass == $pass) {
        $acc["username"] = isset($_POST["username"]) ? $_POST["username"] : "";
        $acc["password"] = isset($newpass) ? $newpass : "";
        $newdata = json_encode($acc);
        file_put_contents('file/json/acc.json', $newdata);
        $ae['success_msg'] = 'Password berhasil diganti!';
    } else {
        $ae['error_msg'] = 'Password lama salah!';
    }
}

?>
<?php $pagename = "Change Password"; ?>
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
                <?php if (isset($ae['success_msg'])) { ?>
                    <div class="alert alert-success"><?php echo $ae['success_msg']; ?></div>
                <?php } elseif (isset($ae['error_msg'])) { ?>
                    <div class="alert alert-danger"><?php echo $ae['error_msg']; ?></div>
                <?php } ?>
                <form method="POST" action="password.php">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password Lama</label>
                        <input type="password" class="form-control" id="passwordlama" name="passwordlama">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password Baru</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="btn-group">
                        <button type="submit" class="btn btn-info pull-left mr-sm-2">Change</button>
                        <a href="movies.php" type="button" class="btn btn-default pull-right">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </section>

</div>
<?php include 'footer.php' ?>