<header class="header-wraper jl_header_magazine_style two_header_top_style header_layout_style3_custom jl_cus_top_share">
    <div class="header_top_bar_wrapper">
        <div class="container">
            <div class="row">
                <div class="logo_small_wrapper col-md-4 col-sm-12 col-xs-12 mt-3 d-flex align-items-center">
                    <a class="logo-mod-a text-center" href="<?= base_url('web') ?>/">
                        <img class="jl_logo_n logo_mod" src="<?= base_url() ?>/assets/wp-content/images/logo-dark.png" alt="CMS Datagoe" />
                    </a>
                    <div class="d-block d-sm-none search_header_menu jl_nav_mobile">
                        <div class="menu_mobile_icons">
                            <div class="jlm_w"><span class="jlma"></span><span class="jlmb"></span><span class="jlmc"></span>
                            </div>
                        </div>
                        <div class="search_header_wrapper search_form_menu_personal_click"><i class="jli-search"></i>
                        </div>
                        <div class="jl_day_night jl_day_en"> <span class="jl-night-toggle-icon">
                                <span class="jl_moon">
                                    <i class="jli-moon"></i>
                                </span>
                                <span class="jl_sun">
                                    <i class="jli-sun"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- iklan -->
                <div class="col-md-8 col-sm-12 col-xs-12 mt-3 mb-3 text-center">

                    <!-- iklan -->

                    <div class="jl-w-slider jl_full_feature_w ">
                        <div class="jl-eb-slider jelly_loading_pro" data-arrows="true" data-play="true" data-effect="false" data-speed="500" data-autospeed="7000" data-loop="true" data-dots="false" data-swipe="true" data-items="1" data-xs-items="1" data-sm-items="1" data-md-items="1" data-lg-items="1" data-xl-items="1">
                            <?php if (isset($dataSliderAds)) { ?>
                                <?php if (count($dataSliderAds) > 0) { ?>
                                    <?php foreach ($dataSliderAds as $key => $value) { ?>
                                        <div class="item-slide jl_radus_e">
                                            <div class="slide-inner">
                                                <a href="javascript:;">
                                                    <img src="<?= base_url() . 'uploads/sliderads/' . $value->image ?>" title="<?= $value->judul ?>" />
                                                </a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- Start Main menu -->
    <div class="jl_blank_nav"></div>
    <div id="menu_wrapper" class="menu_wrapper jl_menu_sticky jl_stick d-none d-md-block">
        <div class="container">
            <div class="main_menu ">
                <div class="menu-primary-container navigation_wrapper">

                    <div class="d-flex justify-content-between">
                        <ul id="mainmenu" class="jl_main_menu">
                            <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="<?= base_url() ?>"> <i class="fas fa-home"></i>HOME<span class="border-menu"></span> </a></li>

                            <li class="menu-item menu-item-has-children">
                                <a href="#">PROFIL<span class="border-menu"></span></a>
                                <ul class="sub-menu">
                                    <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="<?= base_url('web') ?>/sejarah"><i class="mdi mdi-library-books" style="font-size: small;"></i>Sejarah</a></li>
                                    <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="<?= base_url('web') ?>/visi-misi"><i class="mdi mdi-library-books" style="font-size: small;"></i>Visi dan Misi</a></li>
                                    <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="<?= base_url('web') ?>/struktur"><i class="fa fa-users" style="font-size: small;"></i>Struktur Organisasi</a></li>
                                    <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="<?= base_url('web') ?>/tugas-fungsi"><i class="mdi mdi-buffer" style="font-size: small;"></i>Tugas Pokok dan Fungsi</a></li>
                                    <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="<?= base_url('web') ?>/pegawai"><i class="fas fa-user-tie" style="font-size: small;"></i>Data Pegawai</a></li>
                                </ul>
                            </li>
                            <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="<?= base_url('web') ?>/berita"> <i class=""></i>BERITA<span class="border-menu"></span> </a></li>

                            <li class="menu-item menu-item-has-children">
                                <a href="#">INFORMASI<span class="border-menu"></span></a>
                                <ul class="sub-menu">
                                    <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="<?= base_url('web') ?>/pengadaan"><i class="fas fa-chalkboard-teacher" style="font-size: small;"></i>Pengadaan</a></li>
                                    <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="<?= base_url('web') ?>/pengumuman"><i class="fas fa-bullhorn" style="font-size: small;"></i>Pengumuman</a></li>
                                    <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="<?= base_url('web') ?>/agenda"><i class="far fa-calendar-check" style="font-size: small;"></i>Agenda</a></li>
                                    <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="<?= base_url('web') ?>/bankdata"><i class="fas fa-database" style="font-size: small;"></i>Bank Data</a></li>
                                    <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="<?= base_url('web') ?>/produkhukum"><i class="fa fa-balance-scale" style="font-size: small;"></i>Produk Hukum</a></li>
                                    <!-- <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="<?= base_url('web') ?>/infografis"><i class="far fa-images" style="font-size: small;"></i>Infografis</a></li> -->
                                    <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="<?= base_url('web') ?>/transparansi-inovasi"><i class="fas fa-chart-pie" style="font-size: small;"></i>Transparansi & Inovasi</a></li>
                                    <!-- <li class="menu-item menu-item-has-children"><a target="_parent" href="index.html#"><i class="fas fa-expand" style="font-size: small;"></i> Informasi Berkala</a> -->
                                    <ul class="sub-menu">
                                        <!-- looping sub-submenu -->
                                        <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="page/rpjpd.html"><i class="fas fa-sticky-note" style="font-size: small;"></i> Daftar Informasi Publik</a></li>

                                        <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="page/rencana-strategis.html"><i class="far fa-sticky-note" style="font-size: small;"></i> Rencana Strategis</a></li>

                                    </ul>
                            </li>
                            <li class="menu-item current-menu-item current_page_item"><a target="_blank" href="https://lapor.go.id/"><i class="mdi mdi-access-point-network" style="font-size: small;"></i>Pengaduan</a></li>
                        </ul>
                        </li>

                        <li class="menu-item menu-item-has-children">
                            <a href="#">GALERI<span class="border-menu"></span></a>
                            <ul class="sub-menu">
                                <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="<?= base_url('web') ?>/foto"><i class="far fa-image" style="font-size: small;"></i>Foto</a></li>
                                <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="<?= base_url('web') ?>/video"><i class="fas fa-video" style="font-size: small;"></i>Video</a></li>
                            </ul>
                        </li>

                        <!-- <li class="menu-item menu-item-has-children">
                            <a href="index.html#">INTERAKSI<span class="border-menu"></span></a>
                            <ul class="sub-menu">
                                <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="<?= base_url('web') ?>/survey"><i class="far fa-check-square" style="font-size: small;"></i>Survei</a></li>
                                <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="masukansaran.html"><i class="far fa-comments" style="font-size: small;"></i>Masukan Saran</a></li>
                                <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="bukutamu.html"><i class="far fa-comment-alt" style="font-size: small;"></i>Buku Tamu</a></li>
                            </ul>
                        </li> -->
                        <!-- <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="ebook.html"> <i class="mdi mdi-book-open-page-variant"></i>E-BOOK<span class="border-menu"></span> </a></li> -->

                        </ul>

                        <ul>
                            <li>
                                <div class="search_header_wrapper search_form_menu_personal_click"><i class="jli-search text-white"></i>
                                </div>
                            </li>
                            <li>
                                <div class="jl_day_night jl_day_en">
                                    <span class="jl-night-toggle-icon">
                                        <span class="jl_moon">
                                            <i class="jli-moon"></i>
                                        </span>
                                        <span class="jl_sun">
                                            <i class="jli-sun"></i>
                                        </span>
                                    </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- top menu -->
<div class="d-block d-sm-none scrollmenu jl_menu_sticky jl_stick">
    <div class="menu-primary-container navigation_wrapper">
        <ul id="mainmenu" class="jl_main_menu">
            <li class="menu-item current-menu-item current_page_item">
                <a href="<?= base_url() ?>">BERANDA<span class="border-menu"></span></a>
            </li>
            <li class="menu-item current-menu-item current_page_item">
                <a href="<?= base_url('web') ?>/pengadaan">PENGADAAN<span class="border-menu"></span></a>
            </li>
            <li class="menu-item current-menu-item current_page_item">
                <a href="<?= base_url('web') ?>/sejarah">PROFIL<span class="border-menu"></span></a>
            </li>
            <li class="menu-item current-menu-item current_page_item">
                <a href="<?= base_url('web') ?>/berita">BERITA<span class="border-menu"></span></a>
            </li>
            <li class="menu-item current-menu-item current_page_item">
                <a href="<?= base_url('web') ?>/pegawai">PEGAWAI<span class="border-menu"></span></a>
            </li>
            <li class="menu-item current-menu-item current_page_item">
                <a href="<?= base_url('web') ?>/transparansi-inovasi">TRANSPARANSI & INOVASI<span class="border-menu"></span></a>
            </li>
        </ul>
    </div>
</div>
<!-- menu mobile -->
<div id="content_nav" class="jl_mobile_nav_wrapper">
    <div id="nav" class="jl_mobile_nav_inner">
        <div class="menu_mobile_icons mobile_close_icons closed_menu"> <span class="jl_close_wapper"><span class="jl_close_1"></span><span class="jl_close_2"></span></span>
        </div>

        <ul id="mobile_menu_slide" class="menu_moble_slide">

            <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="<?= base_url() ?>"> <i class="fas fa-home"></i>HOME<span class="border-menu"></span> </a></li>

            <li class="menu-item menu-item-has-children">
                <a href="#">PROFIL<span class="border-menu"></span></a>
                <ul class="sub-menu">
                    <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="<?= base_url('web') ?>/sejarah"><i class="mdi mdi-library-books" style="font-size: small;"></i>Sejarah</a></li>
                    <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="<?= base_url('web') ?>/visi-misi"><i class="mdi mdi-library-books" style="font-size: small;"></i>Visi dan Misi</a></li>
                    <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="<?= base_url('web') ?>/struktur"><i class="fa fa-users" style="font-size: small;"></i>Struktur Organisasi</a></li>
                    <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="<?= base_url('web') ?>/tugas-fungsi"><i class="mdi mdi-buffer" style="font-size: small;"></i>Tugas Pokok dan Fungsi</a></li>
                    <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="<?= base_url('web') ?>/pegawai"><i class="fas fa-user-tie" style="font-size: small;"></i>Data Pegawai</a></li>
                </ul>
            </li>

            <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="<?= base_url('web') ?>/berita"> <i class=""></i>BERITA<span class="border-menu"></span> </a></li>

            <li class="menu-item menu-item-has-children">
                <a href="#">INFORMASI<span class="border-menu"></span></a>
                <ul class="sub-menu">
                    <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="<?= base_url('web') ?>/pengadaan"><i class="fas fa-chalkboard-teacher" style="font-size: small;"></i>Pengadaan</a></li>
                    <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="<?= base_url('web') ?>/pengumuman"><i class="fas fa-bullhorn" style="font-size: small;"></i>Pengumuman</a></li>
                    <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="<?= base_url('web') ?>/agenda"><i class="far fa-calendar-check" style="font-size: small;"></i>Agenda</a></li>
                    <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="<?= base_url('web') ?>/bankdata"><i class="fas fa-database" style="font-size: small;"></i>Bank Data</a></li>
                    <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="<?= base_url('web') ?>/produkhukum"><i class="fa fa-balance-scale" style="font-size: small;"></i>Produk Hukum</a></li>
                    <!-- <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="<?= base_url('web') ?>/infografis"><i class="far fa-images" style="font-size: small;"></i>Infografis</a></li> -->
                    <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="<?= base_url('web') ?>/transparansi-inovasi"><i class="fas fa-chart-pie" style="font-size: small;"></i>Transparansi & Inovasi</a></li>
                    <!-- <li class="menu-item menu-item-has-children"><a target="_parent" href="index.html#"><i class="fas fa-expand" style="font-size: small;"></i> Informasi Berkala</a> -->
                    <ul class="sub-menu">
                        <!-- looping sub-submenu -->
                        <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="page/rpjpd.html"><i class="fas fa-sticky-note" style="font-size: small;"></i> Daftar Informasi Publik</a></li>
                        <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="page/rencana-strategis.html"><i class="far fa-sticky-note" style="font-size: small;"></i> Rencana Strategis</a></li>
                    </ul>
            </li>
            <li class="menu-item current-menu-item current_page_item"><a target="_blank" href="https://lapor.go.id/"><i class="mdi mdi-access-point-network" style="font-size: small;"></i>Pengaduan</a></li>
        </ul>
        </li>

        <li class="menu-item menu-item-has-children">
            <a href="#">GALERI<span class="border-menu"></span></a>
            <ul class="sub-menu">
                <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="<?= base_url('web') ?>/foto"><i class="far fa-image" style="font-size: small;"></i>Foto</a></li>
                <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="<?= base_url('web') ?>/video"><i class="fas fa-video" style="font-size: small;"></i>Video</a></li>
            </ul>
        </li>

        <!-- <li class="menu-item menu-item-has-children">
            <a href="index.html#">INTERAKSI<span class="border-menu"></span></a>
            <ul class="sub-menu">
                <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="<?= base_url('web') ?>/survey"><i class="far fa-check-square" style="font-size: small;"></i>Survei</a></li>
                <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="masukansaran.html"><i class="far fa-comments" style="font-size: small;"></i>Masukan Saran</a></li>
                <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="bukutamu.html"><i class="far fa-comment-alt" style="font-size: small;"></i>Buku Tamu</a></li>
            </ul>
        </li> -->

        <!-- <li class="menu-item current-menu-item current_page_item"><a target="_parent" href="ebook.html"> <i class="mdi mdi-book-open-page-variant"></i>E-BOOK<span class="border-menu"></span> </a></li> -->

        </ul>

        <div id="sprasa_about_us_widget-3" class="widget jellywp_about_us_widget">
            <div class="widget_jl_wrapper about_widget_content">
                <div class="jellywp_about_us_widget_wrapper">
                    <div class="social_icons_widget">
                        <ul class="social-icons-list-widget icons_about_widget_display">
                            <li> <a href="<?= $footer->facebook ?>" class="facebook" target="_blank"><i class="jli-facebook"></i></a>
                            </li>
                            <li> <a href="<?= $footer->twitter ?>" class="twitter" target="_blank"><i class="jli-twitter"></i></a>
                            </li>
                            <li> <a href="<?= $footer->instagram ?>" class="instagram" target="_blank"><i class="jli-instagram"></i></a>
                            </li>
                            <!-- <li> <a href="#" class="youtube" target="_blank"><i class="jli-youtube"></i></a>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="search_form_menu_personal">
    <div class="menu_mobile_large_close"> <span class="jl_close_wapper search_form_menu_personal_click"><span class="jl_close_1"></span><span class="jl_close_2"></span></span>
    </div>
    <form method="GET" class="searchform_theme" action="<?= base_url('web') ?>/search">
        <!-- <input type="hidden" name="csrf_tokencmsdatagoe" value="54e75f03c3ccb5e008b102e10bc27b73"> -->
        <input type="hidden" name="kategori" id="kategori" value="">
        <input type="text" name="keyword" id="keyword" value="" placeholder="Pencarian..." class="search_btn" />
        <button type="submit" class="button"><i class="jli-search"></i>
        </button>
    </form>
</div>