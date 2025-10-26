<?= $this->extend('web/templates/egov/index'); ?>

<?= $this->section('content'); ?>

<div class="jl_home_bw">
    <section class="home_section1">
        <div class="container">
            <!-- <baner> -->
            <div class="row ">
                <div class="col-md-12 col-sm-12">

                    <div class="jl-w-slider jl_full_feature_w mb-0">
                        <div class="jl-eb-slider jelly_loading_pro" data-arrows="true" data-play="true" data-effect="false" data-speed="500" data-autospeed="7000" data-loop="true" data-dots="false" data-swipe="true" data-items="1" data-xs-items="1" data-sm-items="1" data-md-items="1" data-lg-items="1" data-xl-items="1">
                            <?php if (isset($dataSliders)) { ?>
                                <?php if (count($dataSliders) > 0) { ?>
                                    <?php foreach ($dataSliders as $key => $value) { ?>
                                        <div class="item-slide jl_radus_e">
                                            <div class="slide-inner">
                                                <a href="javascript:;">
                                                    <img src="<?= base_url() . 'uploads/slider/' . $value->image ?>" title="<?= $value->judul ?>" />
                                                </a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>

                </div>
                <!-- Pengumuman -->
                <div class="col-md-12 col-sm-12 mb-3">

                    <!-- <div class="header-spacer"></div> -->
                    <div id="pengumuman" class="pengumuman">
                        <div class="info-dinas-header ">
                            <span class="re-info">Pengumuman <i class="fas fa-bullhorn text-light"></i></span>
                        </div>
                        <div class="dinas-info col-md-12">
                            <?php if (isset($dataWidgetPengumuman)) { ?>
                                <?php if (count($dataWidgetPengumuman) > 0) { ?>
                                    <marquee onMouseOver="this.stop()" onMouseOut="this.start()" class="item">
                                        <?php foreach ($dataWidgetPengumuman as $key => $value) { ?>
                                            <span style="color:#f5f5f5;background:orange;padding:3px 5px;"><?= $value->created_at ?></span>
                                            <span class="pointer" onclick="lihatpengumuman('<?= $value->url ?>')"><?= $value->judul ?></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <?php } ?>
                                    </marquee>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>


            <!-- berita utama -->
            <section>
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="jl_m_center blog-style-one blog-small-grid">
                            <div class="jl-w-slider jl_full_feature_w">
                                <!-- <div class="jl-eb-slider jelly_loading_pro" data-arrows="true" data-play="true" data-effect="false" data-speed="500" data-autospeed="7000" data-loop="true" data-dots="true" data-swipe="true" data-items="1" data-xs-items="1" data-sm-items="1" data-md-items="1" data-lg-items="1" data-xl-items="1"> -->
                                <?php if (isset($dataWidgetBerita)) { ?>
                                    <?php if (count($dataWidgetBerita) > 0) { ?>
                                        <?php foreach ($dataWidgetBerita as $key => $value) { ?>
                                            <?php if ($key == 0) { ?>
                                                <div class="item-slide jl_m_center_w jl_radus_e">
                                                    <div class="slide-inner">
                                                        <div class="jl_m_center_w jl_radus_e">
                                                            <div class="jl_f_img_bg" style="background-image: url('<?= base_url() ?>uploads/berita/<?= $value->image ?>');"></div>
                                                            <a href="<?= base_url('web/berita') . '/' . $value->tanggal . '/' . $value->url ?>" class="jl_f_img_link"></a>
                                                            <div class="text-box">
                                                                <div class="d-flex align-items-center">
                                                                    <span class="badge badge-primary">
                                                                        <a href="javascript:;"><?= $value->kategori ?></a>
                                                                    </span>
                                                                    <span class="jl_post_meta pl-2 pb-3">
                                                                        <span class="post-date" style="color:#305b90;"> <?= $value->tanggal ?></span>
                                                                    </span>
                                                                </div>

                                                                <h3>
                                                                    <a href="<?= base_url('web/berita') . '/' . $value->tanggal . '/' . $value->url ?>"><?= $value->judul ?></a>
                                                                </h3>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>

                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <?php if (isset($dataBeritaPopular)) { ?>
                            <?php if (count($dataBeritaPopular) > 0) { ?>
                                <?php foreach ($dataBeritaPopular as $key => $value) { ?>
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
                    </div>
                </div>
            </section>

            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <!-- counter -->
                    <div class="jl-w-slider jl_full_feature_w mb-1">
                        <div class="jl-eb-slider jelly_loading_pro" data-arrows="true" data-play="true" data-effect="false" data-speed="500" data-autospeed="7000" data-loop="true" data-dots="false" data-swipe="true" data-items="4" data-xs-items="2" data-sm-items="2" data-md-items="4" data-lg-items="4" data-xl-items="4">

                            <div class="item-slide" style="margin-top: 60px;">
                                <div class="container">
                                    <div class="card card-profile" style="border-color: #00a7e1;">
                                        <div class="card-body p-1">
                                            <div class="profile-image-wrapper">
                                                <div class="profile-image no-border shadow-none">
                                                    <div class="avatars" style="color: #00a7e1;">
                                                        <i class="fa fa-university fa-4x "></i>

                                                    </div>
                                                </div>
                                            </div>
                                            <h3 class="title-cardx" style="padding-top: 20px;">
                                                <a href="#" tabindex="-1">0</a>
                                            </h3>
                                            <div class="font-small">
                                                <span class="text-muted">RUP</span>
                                            </div>
                                            <a href="#" target="_blank">
                                                <span class="badge badge-light-primary profile-badge" title="Sumber Data">Lihat <i class="fas fa-arrow-right"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="item-slide" style="margin-top: 60px;">
                                <div class="container">
                                    <div class="card card-profile" style="border-color: #3ddc97;">
                                        <div class="card-body p-1">
                                            <div class="profile-image-wrapper">
                                                <div class="profile-image no-border shadow-none">
                                                    <div class="avatars" style="color: #3ddc97;">
                                                        <i class="fas fa-chalkboard-teacher fa-4x "></i>

                                                    </div>
                                                </div>
                                            </div>
                                            <h3 class="title-cardx" style="padding-top: 20px;">
                                                <a href="#" tabindex="-1">0</a>
                                            </h3>
                                            <div class="font-small">
                                                <span class="text-muted">Peng. Pemilihan</span>
                                            </div>
                                            <a href="#" target="_blank">
                                                <span class="badge badge-light-primary profile-badge" title="Sumber Data">Lihat <i class="fas fa-arrow-right"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="item-slide" style="margin-top: 60px;">
                                <div class="container">
                                    <div class="card card-profile" style="border-color: #e4cc37;">
                                        <div class="card-body p-1">
                                            <div class="profile-image-wrapper">
                                                <div class="profile-image no-border shadow-none">
                                                    <div class="avatars" style="color: #e4cc37;">
                                                        <i class="fas fa-child fa-4x "></i>

                                                    </div>
                                                </div>
                                            </div>
                                            <h3 class="title-cardx" style="padding-top: 20px;">
                                                <a href="#" tabindex="-1">0</a>
                                            </h3>
                                            <div class="font-small">
                                                <span class="text-muted">Hasil Pemilihan</span>
                                            </div>
                                            <a href="#" target="_blank">
                                                <span class="badge badge-light-primary profile-badge" title="Sumber Data">Lihat <i class="fas fa-arrow-right"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="item-slide" style="margin-top: 60px;">
                                <div class="container">
                                    <div class="card card-profile" style="border-color: #f06543;">
                                        <div class="card-body p-1">
                                            <div class="profile-image-wrapper">
                                                <div class="profile-image no-border shadow-none">
                                                    <div class="avatars" style="color: #f06543;">
                                                        <i class="fas fa-boxes fa-4x "></i>

                                                    </div>
                                                </div>
                                            </div>
                                            <h3 class="title-cardx" style="padding-top: 20px;">
                                                <a href="#" tabindex="-1">0</a>
                                            </h3>
                                            <div class="font-small">
                                                <span class="text-muted">Terpilih</span>
                                            </div>
                                            <a href="#" target="_blank">
                                                <span class="badge badge-light-primary profile-badge" title="Sumber Data">Lihat <i class="fas fa-arrow-right"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>



                    <!-- <div class="section-title">
                        <h1 class="d-flex justify-content-between">
                            <a class="text-uppercase" href="opini.html">TERKINI</a>
                            <span class="pr-2" style="font-size:14px; padding-top:2px"><a href="opini.html">MORE <i class="fas fa-chevron-right"></i></a></span>
                        </h1>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6 col-12">
                            <div class="card p-0 shadow-sm" style="margin-bottom: 10px;">
                                <div class="card-body p-1">
                                    <div class="row align-items-center">
                                        <div class="col-3 p-0  pl-3">
                                            <a href="detail/pengaruh-kemajuan-teknologi-komunikasi-dan-informasi-terhadap-karakter-anak.html">
                                                <img src="<?= base_url('assets') ?>/img/informasi/berita/1690274601_e67e70d3ccacdc0c476b.png" alt="Pengaruh Kemajuan Teknologi Komunikasi dan Informasi Terhadap Karakter Anak" class="rounded">
                                            </a>
                                        </div>
                                        <div class="col-9">
                                            <h3 class="title-card">
                                                <a href="detail/pengaruh-kemajuan-teknologi-komunikasi-dan-informasi-terhadap-karakter-anak.html" tabindex="-1">Pengaruh Kemajuan Teknologi Komunikasi dan Informasi Terhadap Karakter Anak</a>
                                            </h3>
                                            <span class="jl_post_meta">
                                                <span class="text-primary">
                                                    <a href="category/artikel.html">Artikel</a>
                                                </span>
                                                <span> | </span>
                                                <span class="post-date" style="color:#647277;">Senin, 19 Juli 2021</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="card p-0 shadow-sm" style="margin-bottom: 10px;">
                                <div class="card-body p-1">
                                    <div class="row align-items-center">
                                        <div class="col-3 p-0  pl-3">
                                            <a href="https://cms.datagoe.com/detail/lantik-karo-perencanaan-dan-organisasi-ini-pesan-menpora-amali">
                                                <img src="<?= base_url('assets') ?>/img/informasi/berita/1649427829_79b53cb35750dfca57cd.jpg" alt="Lantik Karo Perencanaan dan Organisasi, Ini Pesan Menpora Amali" class="rounded">
                                            </a>
                                        </div>
                                        <div class="col-9">
                                            <h3 class="title-card">
                                                <a href="https://cms.datagoe.com/detail/lantik-karo-perencanaan-dan-organisasi-ini-pesan-menpora-amali" tabindex="-1">Lantik Karo Perencanaan dan Organisasi, Ini Pesan Menpora Amali</a>
                                            </h3>
                                            <span class="jl_post_meta">
                                                <span class="text-primary">
                                                    <a href="category/berita-dinas.html">Berita Dinas</a>
                                                </span>
                                                <span> | </span>
                                                <span class="post-date" style="color:#647277;">Sabtu, 17 Juli 2021</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="card p-0 shadow-sm" style="margin-bottom: 10px;">
                                <div class="card-body p-1">
                                    <div class="row align-items-center">
                                        <div class="col-3 p-0  pl-3">
                                            <a href="detail/buka-peluang-ekonomi-kreatif-dengan-infrastuktur-dan-talenta-digital.html">
                                                <img src="<?= base_url('assets') ?>/img/informasi/berita/1649428629_ebe3cbb1ca13030c101c.jpeg" alt="Buka Peluang Ekonomi Kreatif dengan Infrastuktur dan Talenta Digital" class="rounded">
                                            </a>
                                        </div>
                                        <div class="col-9">
                                            <h3 class="title-card">
                                                <a href="detail/buka-peluang-ekonomi-kreatif-dengan-infrastuktur-dan-talenta-digital.html" tabindex="-1">Buka Peluang Ekonomi Kreatif dengan Infrastuktur dan Talenta Digital</a>
                                            </h3>
                                            <span class="jl_post_meta">
                                                <span class="text-primary">
                                                    <a href="category/berita-dinas.html">Berita Dinas</a>
                                                </span>
                                                <span> | </span>
                                                <span class="post-date" style="color:#647277;">Senin, 28 Juni 2021</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="card p-0 shadow-sm" style="margin-bottom: 10px;">
                                <div class="card-body p-1">
                                    <div class="row align-items-center">
                                        <div class="col-3 p-0  pl-3">
                                            <a href="detail/lkpp-2020-raih-wtp-ini-harapan-presiden-jokowi-kepada-pimpinan-kementerianlembaga.html">
                                                <img src="<?= base_url('assets') ?>/img/informasi/berita/1649427954_de93dccf8d3260bef391.jpeg" alt="LKPP 2020 Raih WTP, Ini Harapan Presiden Jokowi kepada Pimpinan Kementerian/Lembaga" class="rounded">
                                            </a>
                                        </div>
                                        <div class="col-9">
                                            <h3 class="title-card">
                                                <a href="detail/lkpp-2020-raih-wtp-ini-harapan-presiden-jokowi-kepada-pimpinan-kementerianlembaga.html" tabindex="-1">LKPP 2020 Raih WTP, Ini Harapan Presiden Jokowi kepada Pimpinan Kementerian/Lembaga</a>
                                            </h3>
                                            <span class="jl_post_meta">
                                                <span class="text-primary">
                                                    <a href="category/berita-dinas.html">Berita Dinas</a>
                                                </span>
                                                <span> | </span>
                                                <span class="post-date" style="color:#647277;">Jumat, 25 Juni 2021</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="card p-0 shadow-sm" style="margin-bottom: 10px;">
                                <div class="card-body p-1">
                                    <div class="row align-items-center">
                                        <div class="col-3 p-0  pl-3">
                                            <a href="detail/menpora-amali-hadiri-penyampaian-lhp-lkpp-2020-secara-virtual.html">
                                                <img src="<?= base_url('assets') ?>/img/informasi/berita/1649428562_63cd1f00021540e3b0eb.jpeg" alt="Menpora Amali Hadiri Penyampaian LHP LKPP 2020 Secara Virtual" class="rounded">
                                            </a>
                                        </div>
                                        <div class="col-9">
                                            <h3 class="title-card">
                                                <a href="detail/menpora-amali-hadiri-penyampaian-lhp-lkpp-2020-secara-virtual.html" tabindex="-1">Menpora Amali Hadiri Penyampaian LHP LKPP 2020 Secara Virtual</a>
                                            </h3>
                                            <span class="jl_post_meta">
                                                <span class="text-primary">
                                                    <a href="category/berita-dinas.html">Berita Dinas</a>
                                                </span>
                                                <span> | </span>
                                                <span class="post-date" style="color:#647277;">Jumat, 25 Juni 2021</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="card p-0 shadow-sm" style="margin-bottom: 10px;">
                                <div class="card-body p-1">
                                    <div class="row align-items-center">
                                        <div class="col-3 p-0  pl-3">
                                            <a href="detail/menpora-puji-ketum-fpti-yenny-wahid-atas-prestasi-dua-atlet-panjat-tebing-indonesia.html">
                                                <img src="<?= base_url('assets') ?>/img/informasi/berita/1649428155_00e0f38eb04f08218555.jpg" alt="Menpora Puji Ketum FPTI Yenny Wahid atas Prestasi Dua Atlet Panjat Tebing Indonesia" class="rounded">
                                            </a>
                                        </div>
                                        <div class="col-9">
                                            <h3 class="title-card">
                                                <a href="detail/menpora-puji-ketum-fpti-yenny-wahid-atas-prestasi-dua-atlet-panjat-tebing-indonesia.html" tabindex="-1">Menpora Puji Ketum FPTI Yenny Wahid atas Prestasi Dua Atlet Panjat Tebing Indonesia</a>
                                            </h3>
                                            <span class="jl_post_meta">
                                                <span class="text-primary">
                                                    <a href="category/olahraga.html">Olahraga</a>
                                                </span>
                                                <span> | </span>
                                                <span class="post-date" style="color:#647277;">Senin, 31 Mei 2021</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- iklan -->

                    <div class="jl-w-slider jl_full_feature_w mb-4">
                        <div class="jl-eb-slider jelly_loading_pro" data-arrows="true" data-play="true" data-effect="false" data-speed="500" data-autospeed="7000" data-loop="true" data-dots="false" data-swipe="true" data-items="1" data-xs-items="1" data-sm-items="1" data-md-items="1" data-lg-items="1" data-xl-items="1">
                            <div class="item-slide jl_radus_e">
                                <div class="slide-inner">
                                    <a href="index.html" target="_blank">
                                        <img src="<?= base_url('assets') ?>/img/banner/1658642029_3da19d397e07fd8c975c.jpeg" title="Tetap Terapkan Protokol Kesehatan" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- 6 berita pilihan -->
                    <div class="section-title">
                        <h1 class="d-flex justify-content-between">
                            <a class="text-uppercase" href="#">BERITA BAGIAN</a>
                            <!-- <span class="pr-2" style="font-size:14px; padding-top:2px"><a href="#">MORE <i class="fas fa-chevron-right"></i></a></span> -->
                        </h1>
                    </div>
                    <div class="row mb-4">
                        <!-- loop -->
                        <?php if (isset($dataWidgetBerita)) { ?>
                            <?php if (count($dataWidgetBerita) > 0) { ?>
                                <?php foreach ($dataWidgetBerita as $key => $value) { ?>
                                    <div class="col-md-6 col-12">
                                        <div class="card p-0 shadow-sm" style="margin-bottom: 10px;">
                                            <div class="card-body p-1">
                                                <div class="row align-items-center">
                                                    <div class="col-3 p-0  pl-3">
                                                        <a href="<?= base_url('web/berita') . '/' . $value->tanggal . '/' . $value->url ?>">
                                                            <img src="<?= base_url() ?>uploads/berita/<?= $value->image ?>" alt="<?= $value->judul ?>" class="rounded">
                                                        </a>
                                                    </div>
                                                    <div class="col-9">
                                                        <h3 class="title-card">
                                                            <a href="<?= base_url('web/berita') . '/' . $value->tanggal . '/' . $value->url ?>" tabindex="-1"><?= $value->judul ?></a>
                                                        </h3>
                                                        <span class="jl_post_meta">
                                                            <span class="text-primary">
                                                                <a href="#">Admin</a>
                                                            </span>
                                                            <span> | </span>
                                                            <span class="post-date" style="color:#647277;"><?= $value->tanggal ?></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                        <!-- end lopp -->
                    </div>
                    <!-- section layanan -->
                    <section class="">
                        <div class="section-title">
                            <h1><a href="layanan.html">INFORMASI</a></h1>
                        </div>
                        <div class="jl-w-slider jl_full_feature_w">
                            <div class="jl-eb-slider jelly_loading_pro" data-arrows="true" data-play="true" data-effect="false" data-speed="500" data-autospeed="7000" data-loop="true" data-dots="false" data-swipe="true" data-items="4" data-xs-items="2" data-sm-items="2" data-md-items="3" data-lg-items="3" data-xl-items="3">
                                <div class="item-slide" style="margin-top: 60px;">

                                    <div class="container">
                                        <div class="card card-profile shadow-sm">
                                            <div class="card-body p-1">
                                                <div class="profile-image-wrapper">
                                                    <div class="profile-image">
                                                        <div class="avatar">
                                                            <img src="<?= base_url('assets') ?>/img/section/1655792214_70107ab76c42da98cef0.png" alt="Card Picture">
                                                        </div>
                                                    </div>
                                                </div>
                                                <h3 class="title-card" style="padding-top: 60px;">
                                                    <a href="<?= base_url('web') ?>/layanan" tabindex="-1">LAYANAN</a>
                                                </h3>
                                                <!-- <div class="font-small">
                                                                <span class="text-muted">Sistem transaksi online program Pengelolaan Data...</span>
                                                            </div> -->
                                                <a href="<?= base_url('web') ?>/layanan" target="_blank">
                                                    <span class="badge badge-light-primary profile-badge">Kunjungi <i class="fas fa-arrow-right"></i></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="item-slide" style="margin-top: 60px;">

                                    <div class="container">
                                        <div class="card card-profile shadow-sm">
                                            <div class="card-body p-1">
                                                <div class="profile-image-wrapper">
                                                    <div class="profile-image">
                                                        <div class="avatar">
                                                            <img src="<?= base_url('assets') ?>/img/section/1655792202_eca61b1640dcdda50be4.png" alt="Card Picture">
                                                        </div>
                                                    </div>
                                                </div>
                                                <h3 class="title-card" style="padding-top: 60px;">
                                                    <a href="<?= base_url('web') ?>/survey" tabindex="-1">SURVEI</a>
                                                </h3>
                                                <!-- <div class="font-small">
                                                                <span class="text-muted">Sistem transaksi online program Pengelolaan Data...</span>
                                                            </div> -->
                                                <a href="<?= base_url('web') ?>/survey" target="_blank">
                                                    <span class="badge badge-light-primary profile-badge">Kunjungi <i class="fas fa-arrow-right"></i></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="item-slide" style="margin-top: 60px;">

                                    <div class="container">
                                        <div class="card card-profile shadow-sm">
                                            <div class="card-body p-1">
                                                <div class="profile-image-wrapper">
                                                    <div class="profile-image">
                                                        <div class="avatar">
                                                            <img src="<?= base_url('assets') ?>/img/section/1655791207_4c583efb71366983ae12.png" alt="Card Picture">
                                                        </div>
                                                    </div>
                                                </div>
                                                <h3 class="title-card" style="padding-top: 60px;">
                                                    <a href="<?= base_url('web') ?>/agenda" tabindex="-1">AGENDA</a>
                                                </h3>
                                                <!-- <div class="font-small">
                                                                <span class="text-muted">Sistem transaksi online program Pengelolaan Data...</span>
                                                            </div> -->
                                                <a href="<?= base_url('web') ?>/agenda" target="_blank">
                                                    <span class="badge badge-light-primary profile-badge">Kunjungi <i class="fas fa-arrow-right"></i></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="item-slide" style="margin-top: 60px;">

                                    <div class="container">
                                        <div class="card card-profile shadow-sm">
                                            <div class="card-body p-1">
                                                <div class="profile-image-wrapper">
                                                    <div class="profile-image">
                                                        <div class="avatar">
                                                            <img src="<?= base_url('assets') ?>/img/section/1655791375_bed701f9e766b52f59ac.png" alt="Card Picture">
                                                        </div>
                                                    </div>
                                                </div>
                                                <h3 class="title-card" style="padding-top: 60px;">
                                                    <a href="<?= base_url('web') ?>/bankdata" tabindex="-1">BANK DATA</a>
                                                </h3>
                                                <!-- <div class="font-small">
                                                                <span class="text-muted">Sistem transaksi online program Pengelolaan Data...</span>
                                                            </div> -->
                                                <a href="<?= base_url('web') ?>/bankdata" target="_blank">
                                                    <span class="badge badge-light-primary profile-badge">Kunjungi <i class="fas fa-arrow-right"></i></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="item-slide" style="margin-top: 60px;">

                                    <div class="container">
                                        <div class="card card-profile shadow-sm">
                                            <div class="card-body p-1">
                                                <div class="profile-image-wrapper">
                                                    <div class="profile-image">
                                                        <div class="avatar">
                                                            <img src="<?= base_url('assets') ?>/img/section/1655791791_3724d6d86a2f9576a145.png" alt="Card Picture">
                                                        </div>
                                                    </div>
                                                </div>
                                                <h3 class="title-card" style="padding-top: 60px;">
                                                    <a href="<?= base_url('web') ?>/pegawai" tabindex="-1">PEGAWAI</a>
                                                </h3>
                                                <!-- <div class="font-small">
                                                                <span class="text-muted">Sistem transaksi online program Pengelolaan Data...</span>
                                                            </div> -->
                                                <a href="<?= base_url('web') ?>/pegawai" target="_blank">
                                                    <span class="badge badge-light-primary profile-badge">Kunjungi <i class="fas fa-arrow-right"></i></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="item-slide" style="margin-top: 60px;">

                                    <div class="container">
                                        <div class="card card-profile shadow-sm">
                                            <div class="card-body p-1">
                                                <div class="profile-image-wrapper">
                                                    <div class="profile-image">
                                                        <div class="avatar">
                                                            <img src="<?= base_url('assets') ?>/img/section/1655791700_3a9c6901c6da15da8cb0.png" alt="Card Picture">
                                                        </div>
                                                    </div>
                                                </div>
                                                <h3 class="title-card" style="padding-top: 60px;">
                                                    <a href="<?= base_url('web') ?>/struktur" tabindex="-1">STRUKTUR</a>
                                                </h3>
                                                <!-- <div class="font-small">
                                                                <span class="text-muted">Sistem transaksi online program Pengelolaan Data...</span>
                                                            </div> -->
                                                <a href="<?= base_url('web') ?>/struktur" target="_blank">
                                                    <span class="badge badge-light-primary profile-badge">Kunjungi <i class="fas fa-arrow-right"></i></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="item-slide" style="margin-top: 60px;">

                                    <div class="container">
                                        <div class="card card-profile shadow-sm">
                                            <div class="card-body p-1">
                                                <div class="profile-image-wrapper">
                                                    <div class="profile-image">
                                                        <div class="avatar">
                                                            <img src="<?= base_url('assets') ?>/img/section/1655791541_d700245f9a864657be9d.png" alt="Card Picture">
                                                        </div>
                                                    </div>
                                                </div>
                                                <h3 class="title-card" style="padding-top: 60px;">
                                                    <a href="<?= base_url('web') ?>/visi-misi" tabindex="-1">VISI MISI</a>
                                                </h3>
                                                <!-- <div class="font-small">
                                                                <span class="text-muted">Sistem transaksi online program Pengelolaan Data...</span>
                                                            </div> -->
                                                <a href="<?= base_url('web') ?>/visi-misi" target="_blank">
                                                    <span class="badge badge-light-primary profile-badge">Kunjungi <i class="fas fa-arrow-right"></i></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- EBOOK -->
                    <!-- <div class="section-title">
                        <h1 class="d-flex justify-content-between">
                            <a class="text-uppercase" href="ebook.html">EBOOK</a>
                            <span class="pr-2" style="font-size:14px; padding-top:2px"><a href="ebook.html">MORE <i class="fas fa-chevron-right"></i></a></span>
                        </h1>
                    </div>
                    <div class="widget_jl_wrapper">
                        <div class="bt_post_widget">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="jl_topik_center blog-style-one blog-small-grid">
                                        <div class="jl_topik_center_w jl_radus_e" style="max-height: 350px!important;">
                                            <div class="jl_f_img_bg" style="background-image: url('<?= base_url('assets') ?>/img/ebook/thumb/thumb_1639400811_8036ce709ce1978cbe3d.png');"></div>
                                            <a onclick="lihatbook('8','Informasi Publik')" title="Lihat Detail" class="jl_f_img_link"></a>

                                            <div class="text-box">
                                                <div class="jl_post_meta">
                                                    <span class="jl_post_meta jl_f_cat"><a class="post-category-color-text" style="background: #305b90;" href="index.html">Informasi Publik</a></span>
                                                </div>
                                                <h3>
                                                    <a href="bacabuku/1639400811_c09db5abd955a1bf3bc5.pdf.html" title="Baca Buku" target="_blank" onclick="updatehit('8')">
                                                        Ebook Author </a>

                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="jl_topik_center blog-style-one blog-small-grid">
                                        <div class="jl_topik_center_w jl_radus_e" style="max-height: 350px!important;">
                                            <div class="jl_f_img_bg" style="background-image: url('<?= base_url('assets') ?>/img/ebook/thumb/thumb_1639361251_8c7e8af5a81339c63bf9.png');"></div>
                                            <a onclick="lihatbook('7','Informasi Publik')" title="Lihat Detail" class="jl_f_img_link"></a>

                                            <div class="text-box">
                                                <div class="jl_post_meta">
                                                    <span class="jl_post_meta jl_f_cat"><a class="post-category-color-text" style="background: #305b90;" href="index.html">Informasi Publik</a></span>
                                                </div>
                                                <h3>
                                                    <a href="bacabuku/1639361251_5298acf8cc7605860af8.pdf.html" title="Baca Buku" target="_blank" onclick="updatehit('7')">
                                                        Internet Marketing </a>

                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="jl_topik_center blog-style-one blog-small-grid">
                                        <div class="jl_topik_center_w jl_radus_e" style="max-height: 350px!important;">
                                            <div class="jl_f_img_bg" style="background-image: url('<?= base_url('assets') ?>/img/ebook/thumb/thumb_1639579019_ea6360db0359f7106061.jpg');"></div>
                                            <a onclick="lihatbook('6','Cerita Rakyat')" title="Lihat Detail" class="jl_f_img_link"></a>

                                            <div class="text-box">
                                                <div class="jl_post_meta">
                                                    <span class="jl_post_meta jl_f_cat"><a class="post-category-color-text" style="background: #305b90;" href="index.html">Cerita Rakyat</a></span>
                                                </div>
                                                <h3>
                                                    <a href="bacabuku/1634358817_58dd7a7fdb1651781f28.pdf.html" title="Baca Buku" target="_blank" onclick="updatehit('6')">
                                                        Legenda Putri Duyung </a>

                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="jl_topik_center blog-style-one blog-small-grid">
                                        <div class="jl_topik_center_w jl_radus_e" style="max-height: 350px!important;">
                                            <div class="jl_f_img_bg" style="background-image: url('<?= base_url('assets') ?>/img/ebook/thumb/thumb_1639578966_3427d41502e76bb7fb11.jpg');"></div>
                                            <a onclick="lihatbook('5','Informasi Publik')" title="Lihat Detail" class="jl_f_img_link"></a>

                                            <div class="text-box">
                                                <div class="jl_post_meta">
                                                    <span class="jl_post_meta jl_f_cat"><a class="post-category-color-text" style="background: #305b90;" href="index.html">Informasi Publik</a></span>
                                                </div>
                                                <h3>
                                                    <a href="bacabuku/1634288761_8dbbb2854600cb088a00.pdf.html" title="Baca Buku" target="_blank" onclick="updatehit('5')">
                                                        Mengelola Kualitas Layanan di bidang Telekomunikasi </a>

                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="d-flex justify-content-center">

                            </div>

                        </div>
                    </div> -->
                    <!-- end ebook -->
                    <!-- Foto -->
                    <div class="section-title">
                        <h1><a href="foto.html">GALERI FOTO</a></h1>
                    </div>
                    <div class="jl-w-slider jl_full_feature_w">
                        <div class="jl-eb-slider jelly_loading_pro" data-arrows="true" data-play="true" data-effect="false" data-speed="500" data-autospeed="7000" data-loop="true" data-dots="false" data-swipe="true" data-items="2" data-xs-items="2" data-sm-items="2" data-md-items="2" data-lg-items="2" data-xl-items="2">
                            <?php if (isset($dataFoto)) { ?>
                                <?php if (count($dataFoto) > 0) { ?>
                                    <?php foreach ($dataFoto as $key => $value) { ?>
                                        <div class=" item-slide jl_m_center_w jl_radus_e">
                                            <div class="slide-inner m-1">
                                                <div class="card-mod jl_grid_w shadow-sm">
                                                    <div class="jl_img_box jl_radus_e">
                                                        <a onclick="lihatfoto('<?= $value->id ?>','<?= $value->judul ?>')"> <span class="jl_post_type_icon"><i class="jli-gallery"></i></span>
                                                            <img width="500" height="350" src="<?= base_url('uploads/foto') . '/' . $value->url ?>" class="attachment-sprasa_slider_grid_small size-sprasa_slider_grid_small wp-post-image" alt="" loading="lazy">
                                                        </a>
                                                    </div>
                                                    <span class="jl_post_meta pl-2">
                                                        <span class="post-date" style="color:#305b90;"><?= $value->created_at ?></span>
                                                    </span>
                                                    <div class="video-text pl-2 pr-2 pb-2">
                                                        <h3><a onclick="lihatfoto('<?= $value->id ?>','<?= $value->judul ?>')">Detail</a></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>

                    <!-- end content -->
                </div>
                <!-- Widget kanan  -->
                <div class="col-md-4 col-sm-12">
                    <div class="theiaStickySidebar">
                        <!-- sambutan -->
                        <!-- <div class="section-title">
                            <h1 class="text-uppercase"><a href="opini.html">Admin Dinas</a></h1>
                        </div>
                        <div class="card p-0 shadow-sm" style="margin-bottom: 10px;">
                            <div class="card-body p-1 ">
                                <div class=" justify-content-between align-items-center text-center">
                                    <a rel="nofollow" data-toggle="modal" data-target="#modalViewsambutan" data-backdrop="static" data-keyboard="false"><img src="<?= base_url('assets') ?>/img/konfigurasi/pimpinan/1666974119_e6c4ee83f9e5204955fe.png" title="Baca sambutan Admin Dinas"></a>
                                    <br>

                                    <span class="badge badge-light-primary profile-badge text-center">Agus Suptianto <i class="fas fa-arrow-right"></i></span>

                                </div>

                            </div>
                        </div> -->
                        <!-- end sambutan -->
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
                                                        <span class="post-date" style="color:#647277;"><?= $value->creaated_at ?></span>
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

<?= $this->endSection(); ?>

<?= $this->section('scriptTop'); ?>

<?= $this->endSection(); ?>