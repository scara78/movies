<?php
SESSION_START();
require "session.php";
$pagename = "Stream Source";
include 'header.php';
include 'sidebar.php'; ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?= $pagename; ?>
            <small>
                <a href=stream_add.php>
                    <button type="button" class="btn btn-block btn-default btn-xs">Add Stream</button>
                </a>
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
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= $pagename; ?></h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Link Embed</th>
                                        <th style="width: auto">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $results = stream();
                                    $no = 0;
                                    foreach ($results as $index => $obj) : $no++;  ?>
                                        <tr>
                                            <td><?= $obj->id_film; ?></td>
                                            <td><a href="<?= $obj->link; ?>" target="_blank" title="Open Link">Link <i class="fa fa-fw fa-external-link"></i></a></td>
                                            <td>
                                                <a href="/movie/<?= $obj->id_film ?>" target="_blank" title="Visit Post">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                                <a href="stream_edit.php?id=<?= $index ?>">
                                                    <i class="fa fa-fw fa-edit"></i>
                                                </a>
                                                <a href="stream_del.php?id=<?= $index ?>">
                                                    <i class="fa fa-fw fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include 'footer.php'; ?>