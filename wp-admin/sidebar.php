<?php $active = $_SERVER['PHP_SELF']; ?>
<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="<?php if($active == '/wp-admin/home.php'){echo 'active';} ?>">
                <a href="home.php">
                    <i class="fa fa-dashboard"></i><span>Dashboard</span>
                </a>
            </li>
            <li class="<?php if($active == '/wp-admin/movies.php' || $active == "/wp-admin/movies_add.php"){echo 'active';} ?> treeview">
                <a href="#">
                    <i class="fa fa-film"></i>
                    <span>Movies</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if($active == '/wp-admin/movies.php'){echo 'active';} ?>"><a href="movies.php"><i class="fa fa-circle-o"></i> All Movies</a></li>
                    <li class="<?php if($active == '/wp-admin/movies_add.php'){echo 'active';}?>"><a href="movies_add.php"><i class="fa fa-circle-o"></i> Add New</a></li>
                </ul>
            </li>
            <li class="<?php if($active == '/wp-admin/stream.php' || $active == "/wp-admin/stream_add.php" || $active == "/wp-admin/stream_drive.php"){echo 'active';} ?> treeview">
                <a href="#">
                    <i class="fa fa-link"></i>
                    <span>Url Stream</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if($active == '/wp-admin/stream.php'){echo 'active';} ?>"><a href="stream.php"><i class="fa fa-circle-o"></i> All Stream</a></li>
                    <li class="<?php if($active == '/wp-admin/stream_add.php'){echo 'active';}?>"><a href="stream_add.php"><i class="fa fa-circle-o"></i> Add New</a></li>
                    <li class="<?php if($active == '/wp-admin/stream_drive.php'){echo 'active';}?>"><a href="stream_drive.php"><i class="fa fa-circle-o"></i> Add Drive</a></li>
                </ul>
            </li>
            <li class="<?php if($active == '/wp-admin/script_ads.php'){echo 'active';} ?>">
                <a href="script_ads.php">
                <i class="fa fa-code"></i> <span>Script & Ads</span></a>
            </li>
            <li class="<?php if($active == '/wp-admin/keywords.php'){echo 'active';} ?>">
                <a href="keywords.php">
                <i class="fa fa-database"></i> <span>Keyword</span></a>
            </li>
            <li class="<?php if($active == '/wp-admin/cache.php'){echo 'active';} ?>">
                <a href="cache.php">
                <i class="fa fa-book"></i> <span>Cache</span></a>
            </li>
            <li class="<?php if($active == '/wp-admin/api.php'){echo 'active';} ?>">
                <a href="api.php">
                <i class="fa fa-file-text-o"></i> <span>Api TMDB</span></a>
            </li>
            <li class="<?php if($active == '/wp-admin/themes.php'){echo 'active';} ?>">
                <a href="themes.php">
                <i class="fa fa-envira"></i> <span>Themes</span></a>
            </li>
            <li class="<?php if($active == '/wp-admin/site.php'){echo 'active';} ?>">
                <a href="/" target="_blank">
                <i class="fa fa-external-link"></i> <span>Site</span></a>
            </li>
            <li class="<?php if($active == '/wp-admin/profiles.php'){echo 'active';} ?>">
                <a href="profiles.php">
                <i class="fa fa-cog"></i> <span>Settings</span></a>
            </li>
            <li class="<?php if($active == '/wp-admin/password.php'){echo 'active';} ?>">
                <a href="password.php">
                <i class="fa fa-key"></i> <span>Password</span></a>
            </li>
            <li class="<?php if($active == '/wp-admin/logout.php'){echo 'active';} ?>">
                <a href="logout.php">
                <i class="fa fa-sign-out"></i> <span>Logout</span></a>
            </li>
        </ul>
    </section>
</aside>