<?php $pagename = "Timeline"; ?>
<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>
<?php
date_default_timezone_set('Asia/Jakarta');
$date = date('Y-m-d');
$time = date('H:i');
?>

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
        <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                <span class="bg-red">
                    <?= $date; ?>
                </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
                <i class="fa fa-envelope bg-blue"></i>

                <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"><?= $time; ?></i></span>

                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you text</h3>

                    <div class="timeline-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat similique consequatur veniam alias doloremque inventore voluptatum reiciendis animi magni ratione distinctio totam, voluptates harum ab quia sit quibusdam iusto neque.
                    </div>
                    <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs">Read more</a>
                        <!-- <a class="btn btn-danger btn-xs">Delete</a> -->
                    </div>
                </div>
            </li>
            <!-- END timeline item -->
        </ul>
    </section>
</div>
<?php include 'footer.php'; ?>