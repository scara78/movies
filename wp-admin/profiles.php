<?php
SESSION_START();
require "session.php";


$file = file_get_contents('file/json/profile.json');
$data = json_decode($file, true);

$website_name = $data['website_name'];
$description = $data['description'];
$logo_url = $data['logo_url'];
$favicon = $data['favicon'];


?>
<?php $pagename = "Profile Setting"; ?>
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
                    <?php if (isset($ae['success_msg'])) { ?>
                        <div class="alert alert-success" id="mydiv"><?php echo $ae['success_msg']; ?></div>
                    <?php } elseif (isset($ae['error_msg'])) { ?>
                        <div class="alert alert-danger" id="mydiv"><?php echo $ae['error_msg']; ?></div>
                    <?php } ?>
                    <form method="POST" action="profiles_act.php" class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="add_movie" class="col-sm-2 control-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="website_name" placeholder="Website Name" value="<?php echo $website_name ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="add_movie" class="col-sm-2 control-label">Deskrispi</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="description" placeholder="Deskrispi" value="<?php echo $description ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="add_movie" class="col-sm-2 control-label">Logo Url</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="logo_url" id="logo_url" placeholder="Logo Url" value="<?php echo $logo_url ?>">
                                    <button type="button" onclick="myFunction()" style="margin-top: 10px;" class="btn bg-olive btn-flat">Uploads Logo</button>
                                </div>
                            </div>

                            <div class=" form-group">
                                <label for="add_movie" class="col-sm-2 control-label">Favicon</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="favicon" id="favicon" placeholder="Favicon" value="<?php echo $favicon ?>">
                                    <button type="button" onclick="myFunctionFavicon()" style="margin-top: 10px;" class="btn bg-olive btn-flat">Uploads Favicon</button>

                                </div>
                            </div>
                            <div class=" form-group">
                                <label for="add_movie" class="col-sm-2 control-label"></label>
                                <div class="col-sm-8">
                                    <div class="btn-group">
                                        <button type="submit" class="btn btn-info pull-left mr-sm-2">Simpan</button>
                                        <a href="movies.php" type="button" class="btn btn-default pull-right">Batal</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                    <div class="form-group">
                        <label for="add_movie" class="col-sm-2 control-label"></label>
                        <div class="col-sm-8">
                            <div id="upload_sub" style="display:none; background-color:white; border-style: solid; border-color: black;">
                                <label for="add_movie" class="col-sm-2 control-label">Upload Logo</label>
                                <div style=" margin: 20px">
                                    <br />
                                    Note : allowed extension : (.jpg .jpeg and .png ). max file : 1MB ukuran : 355 x 85 pixel
                                    <form id="uploadimage" method="post" enctype="multipart/form-data">
                                        <input type="file" name="file" id="file" required />
                                        <input type="submit" value="Upload" class="submit" />
                                    </form>
                                    <br />
                                </div>
                            </div>
                            <div id="upload_fav" style="display:none; background-color:white; border-style: solid; border-color: black;">
                                <label for="add_movie" class="col-sm-2 control-label">Uplad Favicon</label>
                                <div style=" margin: 20px">
                                    <br />
                                    Note : allowed extension : (.jpg .jpeg and .png ). max file : 1MB ukuran : 355 x 85 pixel
                                    <form id="uploadfavicon" method="post" enctype="multipart/form-data">
                                        <input type="file" name="file" id="file" required />
                                        <input type="submit" value="Upload" class="submit" />
                                    </form>
                                    <br />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script>
    $(document).ready(function(e) {
        $("#uploadimage").on('submit', (function(e) {
            e.preventDefault();
            $.ajax({
                url: "ajax_php_file.php", // Url to which the request is send
                type: "POST", // Type of request to be send, called as method
                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false, // The content type used when sending data to the server.
                cache: false, // To unable request pages to be cached
                processData: false, // To send DOMDocument or non processed data file it is set to false
                success: function(data) // A function to be called if request succeeds
                {
                    document.getElementById("logo_url").value = data;
                }
            });
        }));
        $("#uploadfavicon").on('submit', (function(e) {
            e.preventDefault();
            $.ajax({
                url: "ajax_php_file.php", // Url to which the request is send
                type: "POST", // Type of request to be send, called as method
                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false, // The content type used when sending data to the server.
                cache: false, // To unable request pages to be cached
                processData: false, // To send DOMDocument or non processed data file it is set to false
                success: function(data) // A function to be called if request succeeds
                {
                    document.getElementById("favicon").value = data;
                }
            });
        }));

    });
</script>
<script>
    setTimeout(function() {
        $('#mydiv').fadeOut('fast');
    }, 1000);
</script>

<script>
    function myFunction() {
        var x = document.getElementById("upload_sub");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    function myFunctionFavicon() {
        var x = document.getElementById("upload_fav");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
<?php include 'footer.php'; ?>