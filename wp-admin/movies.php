<?php
SESSION_START();
require "session.php";
$pagename = "Data Movie";
include 'header.php';
include 'sidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?= $pagename; ?>
            <small>
                <a href=movies_add.php>
                    <button type="button" class="btn btn-block btn-default btn-xs">Add Post</button>
                </a>
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?= $pagename; ?></li>
        </ol>
    </section>
    <section class="content">
        <!-- /.row -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?= $pagename; ?></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>No</th>
                                    <th>ID Film</th>
                                    <th>Title</th>
                                    <th style="width: auto"></th>
                                </tr>
                                <?php
                                $no = 0;
                                $results = movies_tampil();
                                foreach ($results as $index => $obj) : $no++;
                                    $id_film = $obj->id_film;
                                    $url = $obj->title;
                                    $url = url($url);
                                ?>
                                    <tr>
                                        <td><?= $index; ?></td>
                                        <td><?= $obj->id_film; ?></td>
                                        <td><?= $obj->title; ?></td>
                                        <td>
                                            <a href="/play/<?= $url . '-' . $id_film ?>" target="_blank">
                                                <i class="fa fa-fw fa-external-link-square"></i>
                                            </a>
                                            <a href="movies_edit.php?id=<?= $index ?>">
                                                <i class="fa fa-fw fa-edit"></i>
                                            </a>
                                            <a href="movies_del.php?id=<?= $index ?>">
                                                <i class="fa fa-fw fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>
<?php include 'footer.php'; ?>