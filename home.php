<?php
if (ROOT == '/') {
    $profile = profile();
    include_once('wp-includes/meta/meta.php');
    include_once('header.php');
?>
    <div class="gmr-boxaftermenu">
        <div class="container">
            <div class="gmr-social-icon clearfix">
                <ul class="pull-left gmr-socialicon-share">
                    <li class="facebook"><a href="#" class="share-facebook" onclick="popUp=window.open('https://www.facebook.com/sharer/sharer.php?u=<?= site_url() ?>/', 'popupwindow', 'scrollbars=yes,height=300,width=550');popUp.focus();return false" rel="nofollow" title="Share this"><span class="social_facebook"></span>Sharer</a></li>
                    <li class="twitter"><a href="#" class="share-twitter" onclick="popUp=window.open('https://twitter.com/share?url=<?= site_url() ?>/&amp;text=LayarKaca21%20-%20Nonton%20Film%20Streaming%20Dunia21%20Indoxxi%20Lk21%202019', 'popupwindow', 'scrollbars=yes,height=300,width=550');popUp.focus();return false" rel="nofollow" title="Tweet this"><span class="social_twitter"></span>Tweet</a></li>
                    <li class="whatsapp"><a class="share-whatsapp" href="https://api.whatsapp.com/send?text=LayarKaca21%20-%20Nonton%20Film%20Streaming%20Dunia21%20Indoxxi%20Lk21%202019 <?= site_url() ?>/" rel="nofollow" title="Whatsapp">WhatsApp</a></li>
                </ul>
                <ul class="pull-right social-icon"></ul>
            </div>
            <div class="gmr-notification">
                <strong>LayarKaca21</strong> LK21 adalah web Nonton Film Bioskop Gratis LK21 CinemaIndo XXI Ganool Film Terbaru Subtitle Indonesia | LayarKaca21 dan Nonton Streaming film Subtitle Indonesia.
            </div>
            <div class="clearfix gmr-element-carousel">
                <div class="gmr-owl-wrap">
                    <div class="gmr-owl-carousel owl-carousel owl-theme owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage">
                                <?php slider($results); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php adshometop(); ?>
        </div>
    </div>
    </header>

    <div id="content" class="gmr-content" style="transform: none;">
        <div class="container">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="muvipro-posts-1" class="home-widget widget muvipro-posts-module">
                        <div class="row">
                            <div class="col-md-10">
                                <h3 class="homemodule-title">Now Playing</h3>
                            </div>
                            <div class="col-md-2">
                                <div class="module-linktitle">
                                    <h4><a href="<?= site_url() ?>" title="Permalink to: Featured">More Movie</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="row grid-container gmr-module-posts">
                            <?php now_playing($results); ?>
                        </div>
                    </div>
                    <div id="muvipro-posts-2" class="home-widget widget muvipro-posts-module">
                        <div class="row">
                            <div class="col-md-10">
                                <h3 class="homemodule-title">Latest Movies</h3>
                            </div>
                            <div class="col-md-2">
                                <div class="module-linktitle">
                                    <h4><a href="<?= site_url() ?>" title="Permalink to: Featured">More Movie</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="row grid-container gmr-module-posts">
                            <?php film_show(); ?>
                        </div>
                    </div>
                    <div id="muvipro-posts-3" class="home-widget widget muvipro-posts-module">
                        <div class="row">
                            <div class="col-md-10">
                                <h3 class="homemodule-title">Latest Series</h3>
                            </div>
                            <div class="col-md-2">
                                <div class="module-linktitle">
                                    <h4><a href="<?= site_url() ?>" title="Permalink to: Featured">More Movie</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="row grid-container gmr-module-posts">
                            <?php tv_now_playing($results); ?>
                            <?php tv_details(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container gmr-maincontent" style="transform: none;">
            <div class="row" style="transform: none;">
                <div id="primary" class="content-area col-md-9 gmr-grid">
                    <h3 class="homemodule-title">Top Rated</h3>
                    <main id="main" class="site-main" role="main">
                        <header>
                            <h1 class="page-title screen-reader-text">LayarKaca21 – Nonton Film Streaming Dunia21 Indoxxi Lk21 2019</h1>
                        </header>
                        <div id="gmr-main-load" class="row grid-container">
                            <?php top_rated($results); ?>
                        </div>
                    </main><!-- #main -->
                </div><!-- #primary -->
                <?php include_once('sidebar.php') ?>
            </div><!-- .row -->
        </div><!-- .container -->
        <div id="stop-container"></div>
    </div><!-- .gmr-content -->
    <?php include_once('footer.php') ?>
<?php } ?>