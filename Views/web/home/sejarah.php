<?= $this->extend('web/templates/egov/index'); ?>

<?= $this->section('content'); ?>

<div class="jl_home_bw">
    <section id="content_main" class="clearfix jl_spost">
        <div class="container">
            <div class="row main_content">
                <!-- Widget Kiri -->
                <div class="col-md-8  loop-large-post" id="content">
                    <div class="widget_container content_page">
                        <div class="post-2838 post type-post status-publish format-standard has-post-thumbnail hentry category-sports tag-gaming" id="post-2838">
                            <div class="single_section_content box blog_large_post_style">
                                <div class="jl_single_style2">
                                    <div class="single_post_entry_content single_bellow_left_align jl_top_single_title jl_top_title_feature">
                                        <span class="meta-category-small single_meta_category">
                                            <a class="post-category-color-text" style="background:#305b90" href="<?= base_url() ?>"><i class="fa fa-home"></i></a>
                                        </span>
                                        <!-- <span class="meta-category-small single_meta_category">
                                            <a class="post-category-color-text" style="background:#305b90" href="#">
                                                <i class="fa fa-chevron-right"></i>
                                            </a>
                                        </span> -->
                                        <span class="meta-category-small single_meta_category">
                                            <a class="post-category-color-text" style="background:#305b90">Page</a>
                                        </span>
                                        <div class="d-none d-lg-block d-xl-block">
                                            <!-- <span class="meta-category-small single_meta_category">
                                                <a class="post-category-color-text" style="background:#305b90" href="#">
                                                    <i class="fa fa-chevron-right"></i>
                                                </a>
                                            </span> -->
                                            <span class="meta-category-small single_meta_category">
                                                <a class="post-category-color-text" style="background:#305b90" href="#">
                                                    Sejarah</i>
                                                </a>
                                            </span>
                                        </div>
                                        <h6><span class="badge badge-light-primary"></span></h6>
                                        <h2 class="single_post_title_main">Sejarah</h2>

                                        <!-- <span class="jl_post_meta">
                                            <div class="row align-items-center">
                                                <div class="col-md-4 col-6">
                                                    <span style="color:#305b90;font-style:italic;">Selasa, 25 Mei 2021 | Dibaca : 1878 x</span>
                                                </div>
                                            </div>
                                        </span> -->
                                        <!-- <span class="jl_post_meta">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <ul class="entry__meta" style="padding: 0px;">
                                                    <li class="author-avatar penulis-info">
                                                        <div class="d-flex align-items-center">
                                                            <img class="pic alignnone photo" alt="" src="<?= base_url('assets') ?>/img/user/1723273287_fceb142dbae7f7e6d320.png" style="max-width: 30px">
                                                            <a class="ml-1" href="javascript:;">
                                                                <span class="entry-author__name">Admin</span>
                                                            </a>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <ul class="entry__meta text-right">
                                                    <li class="entry__meta-date">
                                                        <span style="color:#305b90;"><?php //echo $data->tanggal 
                                                                                        ?> | Dibaca : <?php //echo $data->view 
                                                                                                        ?> x</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </span> -->


                                    </div>
                                    <!-- <div class="single_content_header jl_single_feature_below">
                                        <div class="">
                                            <img width="100%" height="650" src="../public/img/informasi/profil/1649391138_5a957340d4671f1969a2.png" class="" alt="" loading="lazy">
                                        </div>
                                    </div> -->
                                </div>
                                <div class="post_content_w mt-4">
                                    <div class="post_sw">
                                        <div class="post_s">
                                            <div class="jl_single_share_wrapper jl_clear_at">
                                                <ul class="single_post_share_icon_post">
                                                    <li class="single_post_share_facebook">
                                                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?= base_url('web') ?>/sejarah" target="_blank"><i class="jli-facebook"></i>
                                                        </a>
                                                    </li>
                                                    <li class="single_post_share_twitter">
                                                        <a href="https://twitter.com/intent/tweet?url=<?= base_url('web') ?>/sejarah" target="_blank"><i class="jli-twitter"></i>
                                                        </a>
                                                    </li>
                                                    <li class="single_post_share_whatsapp">
                                                        <a href="whatsapp://send?text=<?= base_url('web') ?>/sejarah" target="_blank"><i class="fab fa-whatsapp"></i>
                                                        </a>
                                                    </li>
                                                    <li class="single_post_share_linkedin">
                                                        <a onClick="myCopy()"><i class="jli-link"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post_content jl_contentx">
                                        <div style="padding: 0px;">
                                            <?= $data->isi ?>
                                            <!-- <p class="MsoNormal" style="line-height:150%"><span style="font-size: 16px;"><b>visi misi datagoe</b></span></p> -->
                                        </div>
                                        <hr>
                                        <div class="single_post_entry_content single_bellow_left_align jl_top_single_title jl_top_title_feature">
                                            <span class="jl_post_meta">
                                                <ul class="entry__meta" style="padding: 0px;">

                                                </ul>
                                            </span>
                                        </div>
                                    </div>

                                </div>
                                <div class="clearfix"></div>

                            </div>
                        </div>
                        <div class="brack_space"></div>
                    </div>
                </div>
                <!-- Widget kanan  -->
                <div class="col-md-4 col-sm-12">
                    <div class="theiaStickySidebar">
                        <div class="section-title">
                            <h1 class="text-uppercase"><a href="opini.html">Berita Popular</a></h1>
                        </div>
                        <?php if (isset($dataWidgetBerita)) { ?>
                            <?php if (count($dataWidgetBerita) > 0) { ?>
                                <?php foreach ($dataWidgetBerita as $key => $value) { ?>
                                    <div class="card p-0 shadow-sm" style="margin-bottom: 10px;">
                                        <div class="card-body p-1">
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col-4 pr-2">
                                                    <a href="<?= base_url('web/berita') . '/' . $value->tanggal . '/' . $value->url ?>">
                                                        <img src="<?= base_url() ?>uploads/berita/<?= $value->image ?>" alt="<?= $value->judul ?>" class="rounded">
                                                    </a>
                                                    <!-- <h3 class="text-primary pl-3">1</h3> -->
                                                </div>
                                                <div class="col-8 pl-0">
                                                    <h3 class="title-card">
                                                        <a href="<?= base_url('web/berita') . '/' . $value->tanggal . '/' . $value->url ?>" tabindex="-1"><?= $value->judul ?></a>
                                                    </h3>
                                                    <span class="jl_post_meta">
                                                        <span class="text-primary">
                                                            <a href="javascript:;"><?= $value->kategori ?></a>
                                                        </span>
                                                        <span> | </span>
                                                        <span class="post-date" style="color:#647277;"><?= $value->tanggal ?></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                        <div class="section-title">
                            <h1>Pengumuman</h1>
                        </div>
                        <?php if (isset($dataWidgetPengumuman)) { ?>
                            <?php if (count($dataWidgetPengumuman) > 0) { ?>
                                <?php foreach ($dataWidgetPengumuman as $key => $value) { ?>
                                    <div class="card p-0 shadow-sm" style="margin-bottom: 10px;">
                                        <div class="card-body p-1">
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col-2 pr-0">
                                                    <h3 class="text-primary pl-3"><?= $key + 1 ?></h3>
                                                </div>
                                                <div class="col-10 pl-0">
                                                    <h3 class="title-card">
                                                        <a href="<?= base_url('web/pengumuman') . '/' . $value->url ?>" tabindex="-1"><?= $value->judul ?></a>
                                                    </h3>
                                                    <span class="jl_post_meta">
                                                        <!-- <span class="text-primary">
                                                            <a href="category/artikel.html" class="cate">Artikel</a>
                                                        </span>
                                                        <span> | </span> -->
                                                        <span class="post-date" style="color:#647277;"><?= $value->created_at ?></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>


                        <!-- <section class="home_section1">
                            <div class="section-title">
                                <h1><a href="infografis.html">INFOGRAFIS</a></h1>
                            </div>
                            <div class="jl-w-slider jl_full_feature_w mb-4">
                                <div class="jl-eb-slider jelly_loading_pro" data-arrows="true" data-play="true" data-effect="false" data-speed="500" data-autospeed="7000" data-loop="true" data-dots="true" data-swipe="true" data-items="1" data-xs-items="1" data-sm-items="1" data-md-items="1" data-lg-items="1" data-xl-items="1">
                                    <div class="item-slide">
                                        <div class="slide-inner">
                                            <div class="jl_grid_overlay jl_w_menu jl_clear_at">
                                                <div class="jl_grid_overlay_col">
                                                    <div class="jl_grid_verlay_wrap jl_radus_e">
                                                        <a onclick="lihatinfo('9')">
                                                            <div class="jl_f_img_bg" style="background-image: url('<?= base_url('assets') ?>/img/informasi/infografis/1666836591_a7f275b099bba1f337dc.png');"></div>
                                                            <a href="<?= base_url('assets') ?>/img/informasi/infografis/1666836591_a7f275b099bba1f337dc.png" download>
                                                                <span class="jl_post_type_icon"><i class="jli-gallery"></i></span>
                                                            </a>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-slide">
                                        <div class="slide-inner">
                                            <div class="jl_grid_overlay jl_w_menu jl_clear_at">
                                                <div class="jl_grid_overlay_col">
                                                    <div class="jl_grid_verlay_wrap jl_radus_e">
                                                        <a onclick="lihatinfo('7')">
                                                            <div class="jl_f_img_bg" style="background-image: url('<?= base_url('assets') ?>/img/informasi/infografis/1666836763_7199eae813fcf44003c1.jpg');"></div>
                                                            <a href="<?= base_url('assets') ?>/img/informasi/infografis/1666836763_7199eae813fcf44003c1.jpg" download>
                                                                <span class="jl_post_type_icon"><i class="jli-gallery"></i></span>
                                                            </a>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-slide">
                                        <div class="slide-inner">
                                            <div class="jl_grid_overlay jl_w_menu jl_clear_at">
                                                <div class="jl_grid_overlay_col">
                                                    <div class="jl_grid_verlay_wrap jl_radus_e">
                                                        <a onclick="lihatinfo('6')">
                                                            <div class="jl_f_img_bg" style="background-image: url('<?= base_url('assets') ?>/img/informasi/infografis/1638761531_e0124927df005023b977.jpeg');"></div>
                                                            <a href="<?= base_url('assets') ?>/img/informasi/infografis/1638761531_e0124927df005023b977.jpeg" download>
                                                                <span class="jl_post_type_icon"><i class="jli-gallery"></i></span>
                                                            </a>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-slide">
                                        <div class="slide-inner">
                                            <div class="jl_grid_overlay jl_w_menu jl_clear_at">
                                                <div class="jl_grid_overlay_col">
                                                    <div class="jl_grid_verlay_wrap jl_radus_e">
                                                        <a onclick="lihatinfo('5')">
                                                            <div class="jl_f_img_bg" style="background-image: url('<?= base_url('assets') ?>/img/informasi/infografis/1638761953_37739d0da03652bb60cd.png');"></div>
                                                            <a href="<?= base_url('assets') ?>/img/informasi/infografis/1638761953_37739d0da03652bb60cd.png" download>
                                                                <span class="jl_post_type_icon"><i class="jli-gallery"></i></span>
                                                            </a>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-slide">
                                        <div class="slide-inner">
                                            <div class="jl_grid_overlay jl_w_menu jl_clear_at">
                                                <div class="jl_grid_overlay_col">
                                                    <div class="jl_grid_verlay_wrap jl_radus_e">
                                                        <a onclick="lihatinfo('4')">
                                                            <div class="jl_f_img_bg" style="background-image: url('<?= base_url('assets') ?>/img/informasi/infografis/1638761583_c0d10721fde79e3224a5.jpg');"></div>
                                                            <a href="<?= base_url('assets') ?>/img/informasi/infografis/1638761583_c0d10721fde79e3224a5.jpg" download>
                                                                <span class="jl_post_type_icon"><i class="jli-gallery"></i></span>
                                                            </a>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-slide">
                                        <div class="slide-inner">
                                            <div class="jl_grid_overlay jl_w_menu jl_clear_at">
                                                <div class="jl_grid_overlay_col">
                                                    <div class="jl_grid_verlay_wrap jl_radus_e">
                                                        <a onclick="lihatinfo('3')">
                                                            <div class="jl_f_img_bg" style="background-image: url('<?= base_url('assets') ?>/img/informasi/infografis/1638761689_1ee8af85c9b1b4f8ee5b.jpeg');"></div>
                                                            <a href="<?= base_url('assets') ?>/img/informasi/infografis/1638761689_1ee8af85c9b1b4f8ee5b.jpeg" download>
                                                                <span class="jl_post_type_icon"><i class="jli-gallery"></i></span>
                                                            </a>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-slide">
                                        <div class="slide-inner">
                                            <div class="jl_grid_overlay jl_w_menu jl_clear_at">
                                                <div class="jl_grid_overlay_col">
                                                    <div class="jl_grid_verlay_wrap jl_radus_e">
                                                        <a onclick="lihatinfo('2')">
                                                            <div class="jl_f_img_bg" style="background-image: url('<?= base_url('assets') ?>/img/informasi/infografis/1638761743_e37a26ddd2b4a5be19c4.jpeg');"></div>
                                                            <a href="<?= base_url('assets') ?>/img/informasi/infografis/1638761743_e37a26ddd2b4a5be19c4.jpeg" download>
                                                                <span class="jl_post_type_icon"><i class="jli-gallery"></i></span>
                                                            </a>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-slide">
                                        <div class="slide-inner">
                                            <div class="jl_grid_overlay jl_w_menu jl_clear_at">
                                                <div class="jl_grid_overlay_col">
                                                    <div class="jl_grid_verlay_wrap jl_radus_e">
                                                        <a onclick="lihatinfo('1')">
                                                            <div class="jl_f_img_bg" style="background-image: url('<?= base_url('assets') ?>/img/informasi/infografis/1638761650_69a7e858b593cba59fb4.jpg');"></div>
                                                            <a href="<?= base_url('assets') ?>/img/informasi/infografis/1638761650_69a7e858b593cba59fb4.jpg" download>
                                                                <span class="jl_post_type_icon"><i class="jli-gallery"></i></span>
                                                            </a>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section> -->
                        <hr />
                        <!-- jajak pendapat -->
                        <div class="section-title">
                            <h1 class="text-uppercase"><a href="opini.html">Jajak Pendapat</a></h1>
                        </div>

                        <div class="card p-0 shadow-sm" style="margin-bottom: 10px;">
                            <div class="card-body p-2">

                                <!-- Sidebar Widget ISI POLING -->
                                <div class="text-left text-primary">
                                    <b>Bagaimanakah menurut Anda dengan Pelayanan dan Kinerja Bagian Pengadaan Barang dan Jasa Sekretariat Daerah Kab. Lampung Tengah ?</b>
                                    <hr>
                                    <form action="https://cms.datagoe.com/" class="formtambah" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                        <input type="hidden" name="csrf_tokencmsdatagoe" value="54e75f03c3ccb5e008b102e10bc27b73"> <input class=pointer type=radio name=poling_id id=poling_id value='2' />
                                        <class style="color:#666;font-size:14px; padding:2px required">
                                            <div class='invalid-feedback errorpoling_id'></div>&nbsp;&nbsp;Sangat Baik<br /> <input class=pointer type=radio name=poling_id id=poling_id value='3' />
                                            <class style="color:#666;font-size:14px; padding:2px required">
                                                <div class='invalid-feedback errorpoling_id'></div>&nbsp;&nbsp;Baik<br /> <input class=pointer type=radio name=poling_id id=poling_id value='4' />
                                                <class style="color:#666;font-size:14px; padding:2px required">
                                                    <div class='invalid-feedback errorpoling_id'></div>&nbsp;&nbsp;Cukup Baik<br /> <input class=pointer type=radio name=poling_id id=poling_id value='6' />
                                                    <class style="color:#666;font-size:14px; padding:2px required">
                                                        <div class='invalid-feedback errorpoling_id'></div>&nbsp;&nbsp;Belum Tahu<br /> <br>
                                                        <center class='mb-2'>
                                                            <input style='width: 110px; padding:2px; font-size:12px;' type=button class='btn btn-primary btnsimpanisipoling' value='PILIH' />
                                                            <input style='width: 110px; padding:2px; font-size:12px;' type=button class='btn btn-info btnlihatpoling' value='LIHAT HASIL' />
                                    </form>
                                    </center>
                                </div>


                                <!-- END ISI POLING -->

                                <!-- Sidebar Widget ISI POLING -->
                            </div>
                        </div>
                        <!-- end jajak -->

                        <!-- <div class="section-title home_section1">
                                <h1 class="text-uppercase"><a href="/informasi">MUTIARA</a></h1>
                            </div> -->

                        <div class="section-title">
                            <h1 class="text-uppercase"><a href="#">Agenda</a></h1>
                        </div>
                        <!-- loop -->
                        <?php if (isset($dataAgenda)) { ?>
                            <?php if (count($dataAgenda) > 0) { ?>
                                <?php foreach ($dataAgenda as $key => $value) { ?>
                                    <div class="card p-0 shadow-sm" style="margin-bottom: 10px;">
                                        <div class="card-body p-1">
                                            <div class="row align-items-center">
                                                <div class="col-3 p-0  pl-3">
                                                    <a onclick="lihatagenda('<?= $value->url ?>')">

                                                        <img class="rounded" src="<?= base_url('assets') ?>/img/informasi/agenda/agenda128.png" alt="agenda" style="width: 75px; height:auto">
                                                    </a>
                                                </div>
                                                <div class="col-9">
                                                    <h3 class="title-card">
                                                        <a onclick="lihatagenda('<?= $value->url ?>')" tabindex="-1"><?= $value->judul ?></a>
                                                    </h3>
                                                    <span class="jl_post_meta">
                                                        <!-- <span class="text-primary">
                                                            Lembata - NTT </span>
                                                        <span> | </span> -->
                                                        <span class="post-date" style="color:#647277;"><?= $value->tanggal ?></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>

                        <hr>
                        <div class="card p-2" style="margin-bottom: 1px;">
                            <div class="card-body p-1">
                                <h3 class="title-card">
                                    “Mewujudkan Kabupaten Lampung Tengah sebagai <i style="color:#AC0C0C;">kota budaya</i> yang Modern, Tangguh, Gesit, Kreatif dan Sejahtera” </h3>
                            </div>
                        </div>

                        <div class="section-title home_section1">
                            <h1 class="text-uppercase"><a href="https://goo.gl/maps/QVtSNqKmgkHTBUCN8">KANTOR KAMI</a></h1>
                        </div>
                        <style type="text/css" media="screen">
                            iframe {
                                height: 250px;
                                width: 100%;
                            }
                        </style>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d834.4279860241364!2d105.21089284490535!3d-4.977783227678374!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40af5b0acdfd77%3A0xc510aceca59cc656!2s26C6%2BV6C%2C%20Gn.%20Sugih%2C%20Kec.%20Gn.%20Sugih%2C%20Kabupaten%20Lampung%20Tengah%2C%20Lampung!5e0!3m2!1sid!2sid!4v1761308296968!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<!-- LINK ALL -->
<section class="container home_section1 pt-3">

    <div class="row mb-3">
        <div class="jl-w-slider jl_full_feature_w mb-3">
            <div class="jl-eb-slider jelly_loading_pro" data-arrows="true" data-play="true" data-effect="false" data-speed="550" data-autospeed="7000" data-loop="true" data-dots="false" data-swipe="true" data-items="4" data-xs-items="2" data-sm-items="2" data-md-items="4" data-lg-items="4" data-xl-items="4">
                <div class="item-slide jl_radus_e">
                    <div class="slide-inner">
                        <div class="card p-0 m-2 shadow-sm">
                            <div class="card-body p-2">
                                <div class="d-flex justify-content-center">
                                    <center>
                                        <a href="https://oss.go.id/" target="_blank">
                                            <img src="<?= base_url('assets') ?>/img/linkterkait/1682579463_a43db32ae5ae81fc0a2f.png" alt="" style="max-height: 47px" />

                                            OSS </a>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-slide jl_radus_e">
                    <div class="slide-inner">
                        <div class="card p-0 m-2 shadow-sm">
                            <div class="card-body p-2">
                                <div class="d-flex justify-content-center">
                                    <center>
                                        <a href="https://sicantik.go.id/" target="_blank">
                                            <img src="<?= base_url('assets') ?>/img/linkterkait/1682599955_a81d39f9d1c298801b4b.jpg" alt="" style="max-height: 47px" />

                                            Sicantik Cloud </a>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-slide jl_radus_e">
                    <div class="slide-inner">
                        <div class="card p-0 m-2 shadow-sm">
                            <div class="card-body p-2">
                                <div class="d-flex justify-content-center">
                                    <center>
                                        <a href="https://www.kominfo.go.id/" target="_blank">
                                            <img src="<?= base_url('assets') ?>/img/linkterkait/1624851972_da31dfea25f48c80a51d.png" alt="" style="max-height: 47px" />

                                            Kominfo </a>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-slide jl_radus_e">
                    <div class="slide-inner">
                        <div class="card p-0 m-2 shadow-sm">
                            <div class="card-body p-2">
                                <div class="d-flex justify-content-center">
                                    <center>
                                        <a href="https://lapor.go.id" target="_blank">
                                            <img src="<?= base_url('assets') ?>/img/linkterkait/1681902947_870056369b988232f4ff.png" alt="" style="max-height: 47px" />

                                            LAPOR.GO.ID </a>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end loop -->
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>

<?= $this->section('scriptBottom'); ?>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('.content, .sidebar').theiaStickySidebar({
            additionalMarginTop: 70
        });
        jQuery('.content, .post_sw').theiaStickySidebar({
            additionalMarginTop: 100
        });
    });
</script>
<script>
    function myCopy() {
        var dummy = document.createElement('input'),
            text = window.location.href;
        document.body.appendChild(dummy);
        dummy.value = text;
        dummy.select();
        document.execCommand('copy');
        document.body.removeChild(dummy);
    }
</script>
<?= $this->endSection(); ?>

<?= $this->section('scriptTop'); ?>

<?= $this->endSection(); ?>