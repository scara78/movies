<?php
$profile = profile();
if (isset($q)) {
    $q = str_replace(array('search/', 'movies/'), '', $q);
    $title = urldecode($q);
    $title = str_replace(array('-', 'download'), ' ', $title);
    $title = mb_convert_case(ember($title), MB_CASE_TITLE, "UTF-8");
    $url = rawurlencode($title);
}
include_once('wp-includes/meta/meta_single.php');
include_once('header.php');

?>
<?php adssingleatas() ?>
<div id="content" class="gmr-content" style="transform: none;">
    <div class="container">
    </div>
    <div class="container gmr-maincontent" style="transform: none;">
        <div class="row" style="transform: none;">
            <div id="primary" class="content-area col-md-12 gmr-grid">
                <h3 class="homemodule-title">Nonton Film Layarkaca21 : <?= $title; ?></h3>
                <main id="main" class="site-main" role="main">
                    <header>
                        <h1 class="page-title screen-reader-text">LayarKaca21 – Nonton Film Streaming Dunia21 Indoxxi Lk21 2019</h1>
                    </header>
                    <div id="gmr-main-load" class="row grid-container">
                        <?php
                        $data = single_total($url);
                        $totalresults = $data["total_results"];
                        $results = $data["results"];
                        if ($totalresults != 0) {
                            single_show($results);
                        } else {
                            youtube_results($url);
                        }
                        ?>
                        <?php
                        $data = single_series($url);
                        $totalresults = $data["total_results"];
                        $results = $data["results"];
                        if ($totalresults != 0) {
                            single_show_series($results);
                        }
                        ?>
                    </div>
                </main>
            </div>
        </div>
    </div>
    <div id="stop-container"></div>
</div>

<?php include_once('footer.php') ?>