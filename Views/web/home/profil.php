<?= $this->extend('web/templates/index'); ?>

<?= $this->section('content'); ?>

<div id="content" class="site-content">

    <div class="page-title-section theme-bg parallax" style="background-color:<?= $footer->warna ?>;">
        <div class="container">
            <div class="page-title">
                <h1 class="font-alt">Profil</h1>
                <div id="breadcrumbs" class="breadcrumbs page-header-meta">
                    <div class="post-meta">
                        <span class="posted-on">
                            <a href="#" rel="bookmark">
                                <time class="entry-date published"><?= $footer->judul ?> <br> Kabupaten Lampung Tengah</time>
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <section class="section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-12" style="text-align:justify">
                            <div class="entry-content">
                                <h2><i class="themify-icon ti-pin-alt" style="color:<?= $footer->warna ?>"></i> Profil</h2>
                                <p><?= $data->isi ?></p>
                                <hr>
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main><!-- #main -->
    </div><!-- #primary -->

    <?= $this->endSection(); ?>

    <?= $this->section('scriptBottom'); ?>

    <?= $this->endSection(); ?>

    <?= $this->section('scriptTop'); ?>

    <?= $this->endSection(); ?>