<?php
$warna = themes();
if ($warna == $warna) : ?>
    <link rel="stylesheet" id="muvipro-style-css" href="<?= site_url() ?>/wp-content/themes/muvipro/<?= $warna; ?>/style.css?ver=1.0.0" type="text/css" media="all" />
<?php endif; ?>
<link rel="icon" href="<?= site_url() ?>/wp-content/uploads/<?= $profile->favicon; ?>" sizes="32x32" />
<link rel="icon" href="<?= site_url() ?>/wp-content/uploads/<?= $profile->favicon; ?>" sizes="192x192" />
<link rel="apple-touch-icon-precomposed" href="<?= site_url() ?>/wp-content/uploads/<?= $profile->favicon; ?>" />
<meta name="generator" content="WordPress 5.2.3">
<?php adsheader(); ?>
</head>
<?php require_once('wp-includes/source/API-MOVIE.php'); ?>

<body data-rsssl="1" class="home blog gmr-theme idtheme kentooz gmr-sticky gmr-fullwidth-layout group-blog hfeed" itemscope="itemscope" itemtype="http://schema.org/WebPage" style="transform: none;">
    <a class="skip-link screen-reader-text" href="#main">Skip to content</a>
    <div class="site inner-wrap" id="site-container" style="transform: none;">
        <header id="masthead" class="site-header" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
            <div class="container">
                <div class="clearfix gmr-headwrapper">
                    <div class="list-table">
                        <div class="table-row">
                            <div class="table-cell logo-wrap">
                                <div class="gmr-logo"><a href="<?= site_url() ?>/" class="custom-logo-link" itemprop="url" title="LayarKaca21 - Nonton Film Streaming Dunia21 Indoxxi Lk21 2019"><img src="<?= site_url() ?>/wp-content/uploads/<?= $profile->logo_url; ?>" alt="LayarKaca21 - Nonton Film Streaming Dunia21 Indoxxi Lk21 2019" title="LayarKaca21 - Nonton Film Streaming Dunia21 Indoxxi Lk21 2019"></a></div>
                            </div>
                            <div class="table-cell search-wrap">
                                <div class="gmr-search">
                                    <a id="search-menu-button-top" class="responsive-searchbtn pull-right" href="#" rel="nofollow">
                                        <span class="icon_search"></span>
                                    </a>
                                    <form method="get" class="gmr-searchform searchform topsearchform" action="">
                                        <input type="text" name="q" id="q" placeholder="Search Movie">
                                    </form>
                                </div>
                            </div>
                            <div class="table-cell menutop-wrap">
                                <a id="gmr-topnavresponsive-menu" href="#menus" title="Menus" rel="nofollow" data-sidr="menus"></a>
                                <div class="close-topnavmenu-wrap"><a id="close-topnavmenu-button" rel="nofollow" href="#">Close Menu<span class="icon_close_alt2"></span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="top-header">
                <div class="gmr-menuwrap clearfix">
                    <div class="container">
                        <nav id="site-navigation" class="gmr-mainmenu" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
                            <ul id="primary-menu" class="menu">
                                <li id="menu-item-428" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-428"><a href="<?= site_url() ?>" aria-current="page" itemprop="url"><span itemprop="name"><i style="font-size:1em;" class="wpmi-icon wpmi-position-before wpmi-align-middle wpmi-size-1 dashicons dashicons-admin-home"></i>Homepage</span></a></li>
                                <li id="menu-item-325" class="col-2 menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-325"><a href="#" itemprop="url"><span itemprop="name"><i style="font-size:1em;" class="wpmi-icon wpmi-position-before wpmi-align-middle wpmi-size-1 dashicons dashicons-admin-site"></i>Country</span></a>
                                    <ul class="sub-menu">
                                        <li id="menu-item-326" class="menu-item menu-item-type-taxonomy menu-item-object-muvicountry menu-item-326"><a href="<?= site_url() ?>/country/australia/" itemprop="url"><span itemprop="name">Australia</span></a></li>
                                        <li id="menu-item-327" class="menu-item menu-item-type-taxonomy menu-item-object-muvicountry menu-item-327"><a href="<?= site_url() ?>/country/belgium/" itemprop="url"><span itemprop="name">Belgium</span></a></li>
                                        <li id="menu-item-328" class="menu-item menu-item-type-taxonomy menu-item-object-muvicountry menu-item-328"><a href="<?= site_url() ?>/country/bulgaria/" itemprop="url"><span itemprop="name">Bulgaria</span></a></li>
                                        <li id="menu-item-329" class="menu-item menu-item-type-taxonomy menu-item-object-muvicountry menu-item-329"><a href="<?= site_url() ?>/country/cambodia/" itemprop="url"><span itemprop="name">Cambodia</span></a></li>
                                        <li id="menu-item-330" class="menu-item menu-item-type-taxonomy menu-item-object-muvicountry menu-item-330"><a href="<?= site_url() ?>/country/canada/" itemprop="url"><span itemprop="name">Canada</span></a></li>
                                        <li id="menu-item-331" class="menu-item menu-item-type-taxonomy menu-item-object-muvicountry menu-item-331"><a href="<?= site_url() ?>/country/china/" itemprop="url"><span itemprop="name">China</span></a></li>
                                        <li id="menu-item-332" class="menu-item menu-item-type-taxonomy menu-item-object-muvicountry menu-item-332"><a href="<?= site_url() ?>/country/finland/" itemprop="url"><span itemprop="name">Finland</span></a></li>
                                        <li id="menu-item-333" class="menu-item menu-item-type-taxonomy menu-item-object-muvicountry menu-item-333"><a href="<?= site_url() ?>/country/france/" itemprop="url"><span itemprop="name">France</span></a></li>
                                        <li id="menu-item-334" class="menu-item menu-item-type-taxonomy menu-item-object-muvicountry menu-item-334"><a href="<?= site_url() ?>/country/germany/" itemprop="url"><span itemprop="name">Germany</span></a></li>
                                        <li id="menu-item-335" class="menu-item menu-item-type-taxonomy menu-item-object-muvicountry menu-item-335"><a href="<?= site_url() ?>/country/hong-kong/" itemprop="url"><span itemprop="name">Hong Kong</span></a></li>
                                        <li id="menu-item-336" class="menu-item menu-item-type-taxonomy menu-item-object-muvicountry menu-item-336"><a href="<?= site_url() ?>/country/india/" itemprop="url"><span itemprop="name">India</span></a></li>
                                        <li id="menu-item-337" class="menu-item menu-item-type-taxonomy menu-item-object-muvicountry menu-item-337"><a href="<?= site_url() ?>/country/indonesia/" itemprop="url"><span itemprop="name">Indonesia</span></a></li>
                                        <li id="menu-item-338" class="menu-item menu-item-type-taxonomy menu-item-object-muvicountry menu-item-338"><a href="<?= site_url() ?>/country/ireland/" itemprop="url"><span itemprop="name">Ireland</span></a></li>
                                        <li id="menu-item-339" class="menu-item menu-item-type-taxonomy menu-item-object-muvicountry menu-item-339"><a href="<?= site_url() ?>/country/japan/" itemprop="url"><span itemprop="name">Japan</span></a></li>
                                        <li id="menu-item-340" class="menu-item menu-item-type-taxonomy menu-item-object-muvicountry menu-item-340"><a href="<?= site_url() ?>/country/korea/" itemprop="url"><span itemprop="name">Korea</span></a></li>
                                        <li id="menu-item-341" class="menu-item menu-item-type-taxonomy menu-item-object-muvicountry menu-item-341"><a href="<?= site_url() ?>/country/norway/" itemprop="url"><span itemprop="name">Norway</span></a></li>
                                        <li id="menu-item-342" class="menu-item menu-item-type-taxonomy menu-item-object-muvicountry menu-item-342"><a href="<?= site_url() ?>/country/singapore/" itemprop="url"><span itemprop="name">Singapore</span></a></li>
                                        <li id="menu-item-343" class="menu-item menu-item-type-taxonomy menu-item-object-muvicountry menu-item-343"><a href="<?= site_url() ?>/country/thailand/" itemprop="url"><span itemprop="name">Thailand</span></a></li>
                                        <li id="menu-item-344" class="menu-item menu-item-type-taxonomy menu-item-object-muvicountry menu-item-344"><a href="<?= site_url() ?>/country/ukraine/" itemprop="url"><span itemprop="name">Ukraine</span></a></li>
                                        <li id="menu-item-345" class="menu-item menu-item-type-taxonomy menu-item-object-muvicountry menu-item-345"><a href="<?= site_url() ?>/country/united-kingdom/" itemprop="url"><span itemprop="name">United Kingdom</span></a></li>
                                        <li id="menu-item-346" class="menu-item menu-item-type-taxonomy menu-item-object-muvicountry menu-item-346"><a href="<?= site_url() ?>/country/usa/" itemprop="url"><span itemprop="name">USA</span></a></li>
                                    </ul>
                                </li>
                                <li id="menu-item-347" class="col-2 menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-347"><a href="#" itemprop="url"><span itemprop="name"><i style="font-size:1em;" class="wpmi-icon wpmi-position-before wpmi-align-middle wpmi-size-1 dashicons dashicons-format-video"></i>Genre</span></a>
                                    <ul class="sub-menu">
                                        <li id="menu-item-349" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-349"><a href="<?= site_url() ?>/action/" itemprop="url"><span itemprop="name">Action</span></a></li>
                                        <li id="menu-item-350" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-350"><a href="<?= site_url() ?>/adventure/" itemprop="url"><span itemprop="name">Adventure</span></a></li>
                                        <li id="menu-item-351" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-351"><a href="<?= site_url() ?>/animation/" itemprop="url"><span itemprop="name">Animation</span></a></li>
                                        <li id="menu-item-352" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-352"><a href="<?= site_url() ?>/comedy/" itemprop="url"><span itemprop="name">Comedy</span></a></li>
                                        <li id="menu-item-353" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-353"><a href="<?= site_url() ?>/crime/" itemprop="url"><span itemprop="name">Crime</span></a></li>
                                        <li id="menu-item-354" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-354"><a href="<?= site_url() ?>/documentary/" itemprop="url"><span itemprop="name">Documentary</span></a></li>
                                        <li id="menu-item-355" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-355"><a href="<?= site_url() ?>/drama/" itemprop="url"><span itemprop="name">Drama</span></a></li>
                                        <li id="menu-item-356" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-356"><a href="<?= site_url() ?>/family/" itemprop="url"><span itemprop="name">Family</span></a></li>
                                        <li id="menu-item-357" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-357"><a href="<?= site_url() ?>/fantasy/" itemprop="url"><span itemprop="name">Fantasy</span></a></li>
                                        <li id="menu-item-358" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-358"><a href="<?= site_url() ?>/history/" itemprop="url"><span itemprop="name">History</span></a></li>
                                        <li id="menu-item-359" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-359"><a href="<?= site_url() ?>/horror/" itemprop="url"><span itemprop="name">Horror</span></a></li>
                                        <li id="menu-item-360" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-360"><a href="<?= site_url() ?>/music/" itemprop="url"><span itemprop="name">Music</span></a></li>
                                        <li id="menu-item-361" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-361"><a href="<?= site_url() ?>/mystery/" itemprop="url"><span itemprop="name">Mystery</span></a></li>
                                        <li id="menu-item-362" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-362"><a href="<?= site_url() ?>/romance/" itemprop="url"><span itemprop="name">Romance</span></a></li>
                                        <li id="menu-item-363" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-363"><a href="<?= site_url() ?>/science-fiction/" itemprop="url"><span itemprop="name">Science Fiction</span></a></li>
                                        <li id="menu-item-364" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-364"><a href="<?= site_url() ?>/thriller/" itemprop="url"><span itemprop="name">Thriller</span></a></li>
                                        <li id="menu-item-365" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-365"><a href="<?= site_url() ?>/war/" itemprop="url"><span itemprop="name">War</span></a></li>
                                    </ul>
                                </li>
                                <li id="menu-item-368" class="col-2 menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-368"><a href="#" itemprop="url"><span itemprop="name"><i style="font-size:1em;" class="wpmi-icon wpmi-position-before wpmi-align-middle wpmi-size-1 dashicons dashicons-calendar-alt"></i>Years</span></a>
                                    <ul class="sub-menu">
                                        <li id="menu-item-370" class="menu-item menu-item-type-taxonomy menu-item-object-muviyear menu-item-370"><a href="<?= site_url() ?>/year/2000/" itemprop="url"><span itemprop="name">2000</span></a></li>
                                        <li id="menu-item-371" class="menu-item menu-item-type-taxonomy menu-item-object-muviyear menu-item-371"><a href="<?= site_url() ?>/year/2001/" itemprop="url"><span itemprop="name">2001</span></a></li>
                                        <li id="menu-item-372" class="menu-item menu-item-type-taxonomy menu-item-object-muviyear menu-item-372"><a href="<?= site_url() ?>/year/2002/" itemprop="url"><span itemprop="name">2002</span></a></li>
                                        <li id="menu-item-373" class="menu-item menu-item-type-taxonomy menu-item-object-muviyear menu-item-373"><a href="<?= site_url() ?>/year/2003/" itemprop="url"><span itemprop="name">2003</span></a></li>
                                        <li id="menu-item-374" class="menu-item menu-item-type-taxonomy menu-item-object-muviyear menu-item-374"><a href="<?= site_url() ?>/year/2004/" itemprop="url"><span itemprop="name">2004</span></a></li>
                                        <li id="menu-item-375" class="menu-item menu-item-type-taxonomy menu-item-object-muviyear menu-item-375"><a href="<?= site_url() ?>/year/2005/" itemprop="url"><span itemprop="name">2005</span></a></li>
                                        <li id="menu-item-376" class="menu-item menu-item-type-taxonomy menu-item-object-muviyear menu-item-376"><a href="<?= site_url() ?>/year/2006/" itemprop="url"><span itemprop="name">2006</span></a></li>
                                        <li id="menu-item-377" class="menu-item menu-item-type-taxonomy menu-item-object-muviyear menu-item-377"><a href="<?= site_url() ?>/year/2007/" itemprop="url"><span itemprop="name">2007</span></a></li>
                                        <li id="menu-item-378" class="menu-item menu-item-type-taxonomy menu-item-object-muviyear menu-item-378"><a href="<?= site_url() ?>/year/2008/" itemprop="url"><span itemprop="name">2008</span></a></li>
                                        <li id="menu-item-379" class="menu-item menu-item-type-taxonomy menu-item-object-muviyear menu-item-379"><a href="<?= site_url() ?>/year/2009/" itemprop="url"><span itemprop="name">2009</span></a></li>
                                        <li id="menu-item-380" class="menu-item menu-item-type-taxonomy menu-item-object-muviyear menu-item-380"><a href="<?= site_url() ?>/year/2010/" itemprop="url"><span itemprop="name">2010</span></a></li>
                                        <li id="menu-item-381" class="menu-item menu-item-type-taxonomy menu-item-object-muviyear menu-item-381"><a href="<?= site_url() ?>/year/2011/" itemprop="url"><span itemprop="name">2011</span></a></li>
                                        <li id="menu-item-382" class="menu-item menu-item-type-taxonomy menu-item-object-muviyear menu-item-382"><a href="<?= site_url() ?>/year/2012/" itemprop="url"><span itemprop="name">2012</span></a></li>
                                        <li id="menu-item-383" class="menu-item menu-item-type-taxonomy menu-item-object-muviyear menu-item-383"><a href="<?= site_url() ?>/year/2013/" itemprop="url"><span itemprop="name">2013</span></a></li>
                                        <li id="menu-item-384" class="menu-item menu-item-type-taxonomy menu-item-object-muviyear menu-item-384"><a href="<?= site_url() ?>/year/2014/" itemprop="url"><span itemprop="name">2014</span></a></li>
                                        <li id="menu-item-385" class="menu-item menu-item-type-taxonomy menu-item-object-muviyear menu-item-385"><a href="<?= site_url() ?>/year/2015/" itemprop="url"><span itemprop="name">2015</span></a></li>
                                        <li id="menu-item-386" class="menu-item menu-item-type-taxonomy menu-item-object-muviyear menu-item-386"><a href="<?= site_url() ?>/year/2016/" itemprop="url"><span itemprop="name">2016</span></a></li>
                                        <li id="menu-item-387" class="menu-item menu-item-type-taxonomy menu-item-object-muviyear menu-item-387"><a href="<?= site_url() ?>/year/2018/" itemprop="url"><span itemprop="name">2018</span></a></li>
                                        <li id="menu-item-388" class="menu-item menu-item-type-taxonomy menu-item-object-muviyear menu-item-388"><a href="<?= site_url() ?>/year/2019/" itemprop="url"><span itemprop="name">2019</span></a></li>
                                        <li id="menu-item-389" class="menu-item menu-item-type-taxonomy menu-item-object-muviyear menu-item-389"><a href="<?= site_url() ?>/year/2020/" itemprop="url"><span itemprop="name">2020</span></a></li>
                                    </ul>
                                </li>
                                <li id="menu-item-392" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-392"><a href="#" itemprop="url"><span itemprop="name"><i style="font-size:1em;" class="wpmi-icon wpmi-position-before wpmi-align-middle wpmi-size-1 dashicons dashicons-welcome-view-site"></i>Quality</span></a>
                                    <ul class="sub-menu">
                                        <li id="menu-item-393" class="menu-item menu-item-type-taxonomy menu-item-object-muviquality menu-item-393"><a href="<?= site_url() ?>/quality/bluray/" itemprop="url"><span itemprop="name">BluRay</span></a></li>
                                        <li id="menu-item-396" class="menu-item menu-item-type-taxonomy menu-item-object-muviquality menu-item-396"><a href="<?= site_url() ?>/quality/hdrip/" itemprop="url"><span itemprop="name">HDRIP</span></a></li>
                                        <li id="menu-item-398" class="menu-item menu-item-type-taxonomy menu-item-object-muviquality menu-item-398"><a href="<?= site_url() ?>/quality/web-dl/" itemprop="url"><span itemprop="name">WEB-DL</span></a></li>
                                        <li id="menu-item-397" class="menu-item menu-item-type-taxonomy menu-item-object-muviquality menu-item-397"><a href="<?= site_url() ?>/quality/hdtc/" itemprop="url"><span itemprop="name">HDTC</span></a></li>
                                        <li id="menu-item-395" class="menu-item menu-item-type-taxonomy menu-item-object-muviquality menu-item-395"><a href="<?= site_url() ?>/quality/hdcam/" itemprop="url"><span itemprop="name">HDCAM</span></a></li>
                                    </ul>
                                </li>
                                <li id="menu-item-426" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-426"><a href="/" itemprop="url"><span itemprop="name"><i style="font-size:1em;" class="wpmi-icon wpmi-position-before wpmi-align-middle wpmi-size-1 dashicons dashicons-chart-bar"></i>Information</span></a></li>
                                <li id="menu-item-424" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-424"><a href="<?= site_url() ?>/dmca/" itemprop="url"><span itemprop="name"><i style="font-size:1em;" class="wpmi-icon wpmi-position-before wpmi-align-middle wpmi-size-1 dashicons dashicons-id"></i>DMCA</span></a></li>
                                <li id="menu-item-425" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-425"><a href="<?= site_url() ?>/ads/" itemprop="url"><span itemprop="name"><i style="font-size:1em;" class="wpmi-icon wpmi-position-before wpmi-align-middle wpmi-size-1 dashicons dashicons-email-alt"></i>Ads</span></a></li>
                                <li id="menu-item-427" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-427"><a href="#" itemprop="url"><span itemprop="name"><i style="font-size:1em;" class="wpmi-icon wpmi-position-before wpmi-align-middle wpmi-size-1 dashicons dashicons-rss"></i>Download</span></a></li>
                            </ul>
                        </nav><!-- #site-navigation -->
                    </div>
                </div>
            </div><!-- .top-header -->

            <div class="second-header">
                <div class="gmr-secondmenuwrap clearfix">
                    <div class="container">
                        <nav id="site-navigation" class="gmr-secondmenu" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
                            <ul id="primary-menu" class="menu">
                                <li id="menu-item-627" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-627"><a href="<?= site_url() ?>/bioskopkeren/" itemprop="url"><span itemprop="name">BioskopKeren</span></a></li>
                                <li id="menu-item-628" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-628"><a href="<?= site_url() ?>/bos21/" itemprop="url"><span itemprop="name">bos21</span></a></li>
                                <li id="menu-item-629" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-629"><a href="<?= site_url() ?>/cinemaindo/" itemprop="url"><span itemprop="name">Cinemaindo</span></a></li>
                                <li id="menu-item-630" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-630"><a href="<?= site_url() ?>/cinemaxx1/" itemprop="url"><span itemprop="name">cinemaxx1</span></a></li>
                                <li id="menu-item-631" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-631"><a href="<?= site_url() ?>/dunia21/" itemprop="url"><span itemprop="name">Dunia21</span></a></li>
                                <li id="menu-item-632" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-632"><a href="<?= site_url() ?>/dutafilm/" itemprop="url"><span itemprop="name">dutafilm</span></a></li>
                                <li id="menu-item-633" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-633"><a href="<?= site_url() ?>/filmapik/" itemprop="url"><span itemprop="name">Filmapik</span></a></li>
                                <li id="menu-item-634" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-634"><a href="<?= site_url() ?>/filmbagoes/" itemprop="url"><span itemprop="name">filmbagoes</span></a></li>
                                <li id="menu-item-635" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-635"><a href="<?= site_url() ?>/grandxxi/" itemprop="url"><span itemprop="name">Grandxxi</span></a></li>
                                <li id="menu-item-636" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-636"><a href="<?= site_url() ?>/gudangmovies21/" itemprop="url"><span itemprop="name">gudangmovies21</span></a></li>
                                <li id="menu-item-638" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-638"><a href="<?= site_url() ?>/indoxxi/" itemprop="url"><span itemprop="name">Indoxxi</span></a></li>
                                <li id="menu-item-643" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-643"><a href="<?= site_url() ?>/ns21/" itemprop="url"><span itemprop="name">lk21</span></a></li>
                            </ul>
                        </nav><!-- #site-navigation -->
                    </div>
                </div>
            </div><!-- .top-header -->