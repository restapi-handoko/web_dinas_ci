<?= $this->extend('web/templates/index'); ?>

<?= $this->section('content'); ?>

<div id="content" class="site-content">

    <div id="primary" class="content-area container">
        <main id="main" class="site-main" role="main">
            <div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_row-no-padding">
                <div class="wpb_column vc_column_container vc_col-sm-12">
                    <div class="vc_column-inner vc_custom_1548857379852">
                        <div class="wpb_wrapper">

                            <div class="home-banner theme-bg" style="background-color:<?= $footer->warna ?>">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                                    <ol class="carousel-indicators">
                                        <?php if (isset($dataSliders)) { ?>
                                            <?php if (count($dataSliders) > 0) { ?>
                                                <?php foreach ($dataSliders as $key => $value) { ?>
                                                    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $key ?>" <?= ($key == 0) ? "class='active'" : '' ?>></li>
                                                <?php } ?>
                                            <?php } ?>
                                        <?php } ?>
                                    </ol>
                                    </ol>

                                    <div class="carousel-inner">
                                        <?php if (isset($dataSliders)) { ?>
                                            <?php if (count($dataSliders) > 0) { ?>
                                                <?php foreach ($dataSliders as $key => $value) { ?>
                                                    <div class="carousel-item <?= $key == 0 ? "active" : "" ?>">
                                                        <img src="<?= base_url() . 'uploads/slider/' . $value->image ?>" class="d-block w-100" alt="<?= $value->judul ?>">
                                                    </div>
                                                <?php } ?>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>

                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="vc_row-full-width vc_clearfix"></div>

            <br>
            <div class="vc_row-full-width vc_clearfix"></div>
            <div id="blog" data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid vc_custom_1550325921674 vc_row-has-fill">
                <div class="shapes-box">
                    <span data-parallax='{"x": 150, "y": -20, "rotateZ":500}'>
                        <img src="<?= base_url('assets') ?>/wp-content/uploads/2019/01/fl-shape-1.png" alt="">
                    </span>
                    <span data-parallax='{"x": 250, "y": 150, "rotateZ":500}'>
                        <img src="<?= base_url('assets') ?>/wp-content/uploads/2019/01/fl-shape-2.png" alt="">
                    </span>
                    <span data-parallax='{"x": -180, "y": 80, "rotateY":2000}'>
                        <img src="<?= base_url('assets') ?>/wp-content/uploads/2019/01/fl-shape-3.png" alt="">
                    </span>
                    <span data-parallax='{"x": -20, "y": 180}'>
                        <img src="<?= base_url('assets') ?>/wp-content/uploads/2019/01/fl-shape-4.png" alt="">
                    </span>
                    <span data-parallax='{"x": 300, "y": 70}'>
                        <img src="<?= base_url('assets') ?>/wp-content/uploads/2019/01/fl-shape-5.png" alt="">
                    </span>
                    <span data-parallax='{"x": 250, "y": 180, "rotateZ":1500}'>
                        <img src="<?= base_url('assets') ?>/wp-content/uploads/2019/01/fl-shape-6.png" alt="">
                    </span>
                    <span data-parallax='{"x": 250, "y": 180, "rotateZ":2000}'>
                        <img src="<?= base_url('assets') ?>/wp-content/uploads/2019/01/fl-shape-7.png" alt="">
                    </span>
                    <span data-parallax='{"x": 60, "y": 150}'>
                        <img src="<?= base_url('assets') ?>/wp-content/uploads/2019/01/fl-shape-9.png" alt="">
                    </span>
                    <span data-parallax='{"x": -30, "y": 150, "rotateZ":1500}'>
                        <img src="<?= base_url('assets') ?>/wp-content/uploads/2019/01/fl-shape-1.png" alt="">
                    </span>
                </div>
                <div class="wpb_column vc_column_container vc_col-sm-12">

                    <div class="vc_column-inner vc_custom_1548857428660">
                        <div class="wpb_wrapper">
                            <div class="section-title-wrapper row justify-content-center " style="margin-bottom:30px;">
                                <div class="col-md-10 col-lg-8 col-xl-7">
                                    <div class="section-title    text-center">
                                        <h2 class="dark-color  font-alt title">Berita Terbaru</h2>
                                        <div class="sep"></div>
                                        <p>Berita Terbaru <?= $footer->judul ?> Kabupaten Lampung Tengah.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="blog-posts-home ">
                                <div class="row">
                                    <?php if (isset($dataBeritas)) { ?>
                                        <?php if (count($dataBeritas) > 0) { ?>
                                            <?php foreach ($dataBeritas as $key => $value) { ?>
                                                <div class="col-md-4" style="height:550px">
                                                    <div class="blog-item">
                                                        <div class="blog-img">
                                                            <a href="<?= base_url('web/berita') . '/' . $value->tanggal . '/' . $value->url ?>">
                                                                <img src="<?= base_url() ?>uploads/berita/<?= $value->image ?>" alt="<?= $value->judul ?>" style="height:250px">
                                                            </a>
                                                        </div>

                                                        <div class="blog-content">
                                                            <div class="entry-meta">
                                                                <div class="post-meta"><?= $value->tanggal ?></div>
                                                            </div>
                                                            <h4 class="font-alt"><a class="dark-color" href="<?= base_url('web/berita') . '/' . $value->tanggal . '/' . $value->url ?>"><?= $value->judul ?></a></h4>
                                                            <p><?= substr(@$value->deskripsi, 0, 100); ?>&hellip;</p>
                                                        </div>
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

            <div class="vc_row-full-width vc_clearfix"></div>
        </main>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('scriptBottom'); ?>

<?= $this->endSection(); ?>

<?= $this->section('scriptTop'); ?>

<?= $this->endSection(); ?>