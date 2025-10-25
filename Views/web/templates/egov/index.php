<!doctype html>
<html lang="in">

<head>
    <!-- SITE TITLE -->
    <meta name="description" content="<?= $footer->judul ?>">
    <!-- Favicon Icon -->
    <link rel="icon" href="<?= base_url('assets') ?>/wp-content/images/lampung-tengah.png" sizes="32x32" />
    <link rel="icon" href="<?= base_url('assets') ?>/wp-content/images/lampung-tengah.png" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="<?= base_url('assets') ?>/wp-content/images/lampung-tengah.png" />
    <meta name="msapplication-TileImage" content="<?= base_url('assets') ?>/wp-content/images/lampung-tengah.png" />

    <title><?= $title ?? "Dashboard" ?></title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Diskominfotik LT" name="author">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="index,follow" name="googlebot">
    <meta name="robots" content="index,follow">
    <meta content="In-Id" http-equiv="content-language">
    <meta content="id" name="language">
    <meta content="id" name="geo.country">
    <meta content="Indonesia" name="geo.placename">
    <link rel="canonical" href="https://diskominfotik.lampungtengahkab.go.id/" />

    <!-- facebook META -->
    <!-- <meta property="fb:pages" content="140586622674265" />
    <meta property="fb:app_id" content="140586622674265" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://diskominfotik.lampungtengahkab.go.id/">
    <meta property="og:title" content="Content Management System Datagoe">
    <meta property="og:image" content="https://cms.datagoe.com/<?= base_url('assets') ?>/img/konfigurasi/logo/p3.png">
    <meta property="og:site_name" content="https://cms.datagoe.com/">
    <meta property="og:description" content="Content Management System (CMS) DATAGOE dibuat khusus untuk situs pemerintahan, yayasan, sekolah, company profile dan lain-lain. CMS ini dibangun dengan Framework Codeigniter Versi 4.5.3 dan akan terus diupdate.">
    <meta property="article:author" content="https://www.facebook.com/datagoesoftware/" />
    <meta property="article:publisher" content="https://www.facebook.com/datagoesoftware/" />
    <meta property="og:image:width" content="600">
    <meta property="og:image:height" content="315">


    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@datagoe_wkc" />
    <meta name="twitter:creator" content="@datagoe_wkc">
    <meta name="twitter:title" content="Content Management System Datagoe" />
    <meta name="twitter:description" content="Content Management System (CMS) DATAGOE dibuat khusus untuk situs pemerintahan, yayasan, sekolah, company profile dan lain-lain. CMS ini dibangun dengan Framework Codeigniter Versi 4.5.3 dan akan terus diupdate." />
    <meta name="twitter:image:src" content="https://cms.datagoe.com/<?= base_url('assets') ?>/img/konfigurasi/logo/p3.png" /> -->

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/app-assets/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/assets/css/bootstrap.css%3Fv2=.css" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/app-assets/css/components.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/assets/css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?= base_url('assets') ?>/assets/css/responsive.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?= base_url('assets') ?>/assets/css/main.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?= base_url('assets') ?>/assets/css/colors.css" type="text/css" media="all">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/assets/css/dge.css" type="text/css" media="all">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/assets/fonts/fonts/font-awesome.min.css%3Fv=1.0.css">
    <script src="<?= base_url('assets') ?>/standar/assets/js/sweetalert2.js"></script>
    <link href="<?= base_url('assets') ?>/standar/assets/css/icons.css" rel="stylesheet" type="text/css">
    <script src="<?= base_url('assets') ?>/standar/assets/js/jquery.min.js"></script>

    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js?Skin=sunburst"></script>
    <style>
        .pointer {
            cursor: pointer;
        }

        .modal-dialog {
            overflow-y: initial !important
        }

        .modal-body {
            max-height: 450px;
            overflow-y: auto;
        }
    </style>
    <?= $this->renderSection('scriptTop'); ?>

</head>

<body class="mobile_nav_class jl-has-sidebar">



    <div class="options_layout_wrapper jl_clear_at jl_radius jl_none_box_styles jl_border_radiuss jl_en_day_night">
        <div class="options_layout_container full_layout_enable_front">
            <?= $this->include('web/templates/egov/header'); ?>

            <div class="mobile_menu_overlay"></div>

            <input type="hidden" name="csrf_tokencmsdatagoe" value="54e75f03c3ccb5e008b102e10bc27b73" id="csrf_tokencmsdatagoe" />

            <?= $this->renderSection('content'); ?>
            <?= $this->renderSection('scriptBottom'); ?>
            <script>
                $(document).ready(function() {});
            </script>

            <?= $this->include('web/templates/egov/footer'); ?>
        </div>
    </div>
    <script type='text/javascript' src='<?= base_url('assets') ?>/standar/__accessibilty/acc.js'></script>
    <link rel='stylesheet' type='text/css' property='stylesheet' href='<?= base_url('assets') ?>/standar/__accessibilty/style.css'>

    <script src="<?= base_url('assets') ?>/assets/js/jquery.js"></script>
    <script src="<?= base_url('assets') ?>/assets/js/bootstrap.min.js"></script>

    <script src="<?= base_url('assets') ?>/assets/js/fluidvids.js"></script>
    <script src="<?= base_url('assets') ?>/assets/js/slick.js"></script>
    <script src="<?= base_url('assets') ?>/assets/js/custom.js"></script>

    <script src="<?= base_url('assets') ?>/assets/js/dge/jquery-2.2.4.min.js"></script>
    <script src="<?= base_url('assets') ?>/assets/js/dge/bootstrap.min.js"></script>
    <script src="<?= base_url('assets') ?>/assets/js/dge/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets') ?>/assets/js/dge/accordiation.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/theia-sticky-sidebar@1.7.0/dist/ResizeSensor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/theia-sticky-sidebar@1.7.0/dist/theia-sticky-sidebar.min.js"></script>

</body>

<script nonce="${nonce}">
    $('.tambahkritik').click(function(e) {

        e.preventDefault();

        $.ajax({
            url: "<?= base_url('web') . '/kritik' ?>",
            dataType: "json",
            success: function(response) {
                $('.viewmodal').html(response.data).show();
                $('#modalview').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                $('#modalview').modal('show');
                // $('input[name=csrf_tokencmsdatagoe]').val(response.csrf_tokencmsdatagoe);
            },
            error: function(xhr, ajaxOptions, thrownerror) {
                // Swal.fire({
                //     title: "Maaf gagal load data!",
                //     icon: "error",
                //     showConfirmButton: false,
                //     timer: 3100
                // }).then(function() {
                //     window.location = '';
                // })
                $('input[name=csrf_tokencmsdatagoe]').val(response.csrf_tokencmsdatagoe);
            }
        });
    });


    $('.btnlihatpoling').click(function(e) {

        e.preventDefault();

        $.ajax({

            url: "<?= base_url('web') ?>/lihatpoling",
            dataType: "json",

            success: function(response) {
                $('.viewmodal').html(response.data).show();
                $('#modalview').modal({
                    // backdrop: 'static',
                    // keyboard: false
                });

                $('#modalview').modal('show');
                $('body').removeClass("modal-open");
                // $('input[name=csrf_tokencmsdatagoe]').val(response.csrf_tokencmsdatagoe);
            },
            error: function(xhr, ajaxOptions, thrownerror) {


                $('input[name=csrf_tokencmsdatagoe]').val(response.csrf_tokencmsdatagoe);
            }
        });
    });

    //view infografis-----------
    function lihatinfo(id_banner) {

        $.ajax({
            type: "post",
            url: "<?= base_url('web') ?>/formlihatinfo",
            data: {
                csrf_tokencmsdatagoe: $('input[name=csrf_tokencmsdatagoe]').val(),
                id_banner: id_banner
            },
            dataType: "json",

            success: function(response) {
                if (response.sukses) {

                    $('.viewmodal').html(response.sukses).show();
                    $('#modalview').modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    $('#modalview').modal('show');
                    $('body').removeClass("modal-open");
                    $('input[name=csrf_tokencmsdatagoe]').val(response.csrf_tokencmsdatagoe);
                }
            },

            error: function(xhr, ajaxOptions, thrownerror) {

                $('input[name=csrf_tokencmsdatagoe]').val(response.csrf_tokencmsdatagoe);
            }
        });
    }

    //view foto-----------
    function lihatfoto(foto_id, nama_kategori_foto) {

        $.ajax({
            type: "post",
            url: "<?= base_url('assets') ?>/formlihatfoto",
            data: {
                csrf_tokencmsdatagoe: $('input[name=csrf_tokencmsdatagoe]').val(),
                foto_id: foto_id,
                nama_kategori_foto: nama_kategori_foto
            },
            dataType: "json",

            success: function(response) {
                if (response.sukses) {

                    $('.viewmodal').html(response.sukses).show();
                    $('#modalview').modal({
                        // backdrop: 'static',
                        // keyboard: false
                    });
                    $('#modalview').modal('show');
                    $('body').removeClass("modal-open");
                    $('input[name=csrf_tokencmsdatagoe]').val(response.csrf_tokencmsdatagoe);
                }
            },
            error: function(xhr, ajaxOptions, thrownerror) {

                $('input[name=csrf_tokencmsdatagoe]').val(response.csrf_tokencmsdatagoe);
            }
        });
    }

    //view agenda-----------
    function lihatagenda(agenda_id) {

        $.ajax({
            type: "post",
            url: "<?= base_url('web/agenda') ?>/formlihatagenda",
            data: {
                // [csrfToken]: csrfHash,
                csrf_tokencmsdatagoe: $('input[name=csrf_tokencmsdatagoe]').val(),
                agenda_id: agenda_id
            },
            dataType: "json",

            success: function(response) {
                if (response.sukses) {

                    $('.viewmodal').html(response.sukses).show();
                    $('#modalview').modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    $('#modalview').modal('show');
                    $('body').removeClass("modal-open");
                    $('input[name=csrf_tokencmsdatagoe]').val(response.csrf_tokencmsdatagoe);
                }
            },
            error: function(xhr, ajaxOptions, thrownerror) {

                $('input[name=csrf_tokencmsdatagoe]').val(response.csrf_tokencmsdatagoe);
            }
        });
    }

    //view layanan-----------
    function lihatlayanan(informasi_id) {

        $.ajax({
            type: "post",
            url: "<?= base_url('assets') ?>/formlihatlayanan",
            data: {
                // [csrfToken]: csrfHash,
                csrf_tokencmsdatagoe: $('input[name=csrf_tokencmsdatagoe]').val(),
                informasi_id: informasi_id
            },
            dataType: "json",

            success: function(response) {
                if (response.sukses) {

                    $('.viewmodal').html(response.sukses).show();
                    $('#modalview').modal({
                        backdrop: 'static',
                        keyboard: false

                    });
                    $('#modalview').modal('show');
                    $('body').removeClass("modal-open");
                    $('input[name=csrf_tokencmsdatagoe]').val(response.csrf_tokencmsdatagoe);
                }
            },
            error: function(xhr, ajaxOptions, thrownerror) {

                $('input[name=csrf_tokencmsdatagoe]').val(response.csrf_tokencmsdatagoe);
            }
        });
    }



    //view pengumuman-----------
    function lihatpengumuman(informasi_id) {
        document.location.href = `<?= base_url('web/pengumuman') ?>/${informasi_id}`;

        // $.ajax({
        //     type: "post",
        //     url: "<?= base_url('assets') ?>/formlihatpengumuman",
        //     data: {
        //         // [csrfToken]: csrfHash,
        //         csrf_tokencmsdatagoe: $('input[name=csrf_tokencmsdatagoe]').val(),
        //         informasi_id: informasi_id
        //     },
        //     dataType: "json",

        //     success: function(response) {
        //         if (response.sukses) {

        //             $('.viewmodal').html(response.sukses).show();
        //             $('#modalview').modal({
        //                 backdrop: 'static',
        //                 keyboard: false
        //             });
        //             $('#modalview').modal('show');
        //             $('body').removeClass("modal-open");
        //             $('input[name=csrf_tokencmsdatagoe]').val(response.csrf_tokencmsdatagoe);
        //         }
        //     },
        //     error: function(xhr, ajaxOptions, thrownerror) {

        //         $('input[name=csrf_tokencmsdatagoe]').val(response.csrf_tokencmsdatagoe);
        //     }
        // });
    }

    //bank data
    function updatehits(bankdata_id) {

        $.ajax({
            url: "https://cms.datagoe.com/bankdata/getbankdata",
            data: {
                // [csrfToken]: csrfHash,
                csrf_tokencmsdatagoe: $('input[name=csrf_tokencmsdatagoe]').val(),
                bankdata_id: bankdata_id
            },
            dataType: "json",
            success: function(response) {
                $('.viewdata').html(response.data);
                $('input[name=csrf_tokencmsdatagoe]').val(response.csrf_tokencmsdatagoe);
            }

        });
    }

    // Ebook

    function lihatbook(ebook_id, kategoriebook_nama) {

        $.ajax({
            type: "post",
            url: "https://cms.datagoe.com/ebook/formlihat",
            data: {
                csrf_tokencmsdatagoe: $('input[name=csrf_tokencmsdatagoe]').val(),
                ebook_id: ebook_id,
                kategoriebook_nama: kategoriebook_nama,
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#modallihat').modal('show');
                    $('body').removeClass("modal-open");
                    $('input[name=csrf_tokencmsdatagoe]').val(response.csrf_tokencmsdatagoe);
                }
            },
            error: function(xhr, ajaxOptions, thrownerror) {

                $('input[name=csrf_tokencmsdatagoe]').val(response.csrf_tokencmsdatagoe);
            }
        });
    }

    //ebook data
    function updatehit(ebook_id) {

        $.ajax({
            url: "https://cms.datagoe.com/ebook/getebook",
            data: {
                csrf_tokencmsdatagoe: $('input[name=csrf_tokencmsdatagoe]').val(),
                ebook_id: ebook_id
            },
            dataType: "json",
            success: function(response) {
                $('.viewdata').html(response.data);
                $('input[name=csrf_tokencmsdatagoe]').val(response.csrf_tokencmsdatagoe);
            }

        });
    }

    //LIKE POSTING BERITA
    function likeposting(berita_id) {

        $.ajax({
            url: "https://cms.datagoe.com/berita/likeposting",
            data: {
                csrf_tokencmsdatagoe: $('input[name=csrf_tokencmsdatagoe]').val(),
                berita_id: berita_id
            },
            dataType: "json",
            success: function(response) {

                if (response.sukses) {
                    Swal.fire({
                        title: "Sukses!",
                        text: response.sukses,
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1550
                    }).then(function() {
                        // window.location = '';
                    });
                    $('input[name=csrf_tokencmsdatagoe]').val(response.csrf_tokencmsdatagoe);
                }

            },

            error: function(xhr, ajaxOptions, thrownerror) {

                $('input[name=csrf_tokencmsdatagoe]').val(response.csrf_tokencmsdatagoe);
            }

        });
    }

    function likepostingvid(video_id) {

        $.ajax({
            url: "https://cms.datagoe.com/video/likevideo",
            data: {
                csrf_tokencmsdatagoe: $('input[name=csrf_tokencmsdatagoe]').val(),
                video_id: video_id
            },
            dataType: "json",
            success: function(response) {

                if (response.sukses) {

                    Swal.fire({
                        title: "Sukses!",
                        text: response.sukses,
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1550
                    }).then(function() {
                        // window.location = '';
                    });
                }

            },

            error: function(xhr, ajaxOptions, thrownerror) {

                $('input[name=csrf_tokencmsdatagoe]').val(response.csrf_tokencmsdatagoe);
            }

        });
    }

    //lihat pegawai
    function lihatpegawai(pegawai_id) {

        $.ajax({
            type: "post",
            url: "https://cms.datagoe.com/pegawai/formlihat",
            data: {
                csrf_tokencmsdatagoe: $('input[name=csrf_tokencmsdatagoe]').val(),
                pegawai_id: pegawai_id,
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#modallihat').modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    $('#modallihat').modal('show');
                    $('body').removeClass("modal-open");
                    $('input[name=csrf_tokencmsdatagoe]').val(response.csrf_tokencmsdatagoe);
                }
            },
            error: function(xhr, ajaxOptions, thrownerror) {

                $('input[name=csrf_tokencmsdatagoe]').val(response.csrf_tokencmsdatagoe);
            }
        });
    }

    // poll
    $('.btnsimpanisipoling').click(function(e) {

        e.preventDefault();
        let form = $('.formtambah')[0];
        let data = new FormData(form);
        $.ajax({
            type: "post",
            url: '<?= base_url('web') ?>/ubahpoling',
            data: data,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            dataType: "json",
            beforeSend: function() {
                $('.btnsimpanisipoling').attr('disable', 'disable');
                $('.btnsimpanisipoling').html('<span class="spinner-border spinner-grow-sm" role="status" aria-hidden="true"></span> <i>Loading...</i>');
            },
            complete: function() {
                $('.btnsimpanisipoling').removeAttr('disable', 'disable');
                $('.btnsimpanisipoling').html('<i class="mdi mdi-content-save-all"></i>  Pilih');
            },
            success: function(response) {
                if (response.error) {

                    Swal.fire({
                        title: "Maaf..!",
                        html: `Silahkan pilih salah satu jawaban diatas. `,
                        icon: "error",
                        // showConfirmButton: false,
                        // timer: 3550
                    });
                    // $('input[name=csrf_tokencmsdatagoe]').val(response.csrf_tokencmsdatagoe);
                }
                if (response.gagal) {

                    Swal.fire({
                        title: "Maaf..!",
                        text: response.gagal,
                        icon: "error",
                        // showConfirmButton: false,
                        // timer: 3550
                    });
                    // $('input[name=csrf_tokencmsdatagoe]').val(response.csrf_tokencmsdatagoe);
                }
                if (response.sukses) {

                    Swal.fire({
                        title: "Sukses!",
                        text: response.sukses,
                        icon: "success",
                        // showConfirmButton: false,
                        // timer: 3550
                    }).then(function() {
                        window.location = '<?= base_url() ?>';
                    });
                }

            },
            error: function(xhr, ajaxOptions, thrownerror) {

                // $('input[name=csrf_tokencmsdatagoe]').val(response.csrf_tokencmsdatagoe);
            }
        });
    });
</script>
<div class="viewdata"></div>
<div class="viewmodal"></div>
<!-- 
<script>
    $('.modal-dialog').draggable();
    $(function() {

        var url = window.location.pathname,
            urlRegExp = new RegExp(url.replace(/\/$/) + "$");
        $('.menu a').each(function() {
            if (urlRegExp.test(this.href.replace(/\/$/, ''))) {
                $(this).addClass('active');
            }
        });

    });
</script>
 -->

<script src="<?= base_url('assets') ?>/standar/assets/js/purecounter.js"></script>

<div id="modalViewsambutan" class="modal hide fade in" data-keyboard="true" data-backdrop="static">
    <!-- <div class="modal hide fade in" data-backdrop="false" id="modalViewsambutan" tabindex="" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> -->
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card-body p-0">
                    <p style="text-align:justify; "><img src="<?= base_url('assets') ?>/img/konfigurasi/pimpinan/1666974119_e6c4ee83f9e5204955fe.png" style="float:left; padding: 8px;" height="180" class="img" />
                    <p class="MsoNormal" style="color: rgb(0, 0, 0); font-family: sans-serif; font-size: 14px;"><span open="" sans",="" sans-serif;="" font-size:="" 14.56px;="" text-align:="" center;"="" style="color: rgb(80, 93, 105); font-family: Nunito, sans-serif; font-size: 14.56px;">Selamat datang di Website kami Dinas Pemuda Olahraga dan Kebudayaan Kabupaten Lembata, Website ini dimaksudkan sebagai sarana publikasi untuk memberikan Informasi dan gambaran Dinas Pemuda Olahraga dan Kebudayaan Kabupaten Lembata dalam Hal Publikasi kepada masyarakat. Melalui keberadaan website ini kiranya masyarakat dapat mengetahui seluruh informasi tentang Kebijakan Pemerintah Kabupaten Lembata pengelolaan sektor Kepemudaan dan Keolahragaan di wilayah Pemerintahan Kabupaten Lembata.&nbsp;</span><span open="" ",="" sans-serif;="" font-size:="" 14.56px;="" text-align:="" "="" sans",="" center;"="" style="color: rgb(80, 93, 105); font-family: Nunito, sans-serif; font-size: 14.56px; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235);">Diharapkan website ini bisa dijadikan sebagai salah satu media komunikasi yang efektif, dapat memberi</span><span style="font-size: 16px;">﻿</span><span open="" ",="" sans-serif;="" font-size:="" 14.56px;="" text-align:="" "="" sans",="" center;"="" style="color: rgb(80, 93, 105); font-family: Nunito, sans-serif; font-size: 14.56px; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235);">kan informasi, layanan yang akurat dan akuntabel untuk membangun&nbsp;<span lang="EN-US" style="border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235);">olahraga</span>&nbsp;di Kabupaten&nbsp;<span lang="EN-US" style="border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235);">Lembata</span>.&nbsp;</span></p>
                    <p class="MsoNormal" style="color: rgb(0, 0, 0); font-family: sans-serif; font-size: 14px;"><span open="" sans",="" sans-serif;="" font-size:="" 14.56px;="" text-align:="" center;"="" style="color: rgb(80, 93, 105); font-family: Nunito, sans-serif; font-size: 14.56px;">Dan sebagai wujud rasa tanggungjawab kami dalam rangka meningkatkan pelayanan kepada masyarakat, maka kami adakan website dinas ini. Kritik dan saran terhadap kekurangan dan kesalahan yang ada sangat kami harapkan guna penyempurnaan Website ini dimasa akan datang. Semoga Website ini memberikan manfaat bagi kita semua. Terima Kasih..!</span></p>
                    </p>
                </div>
            </div>
            <p class="p-1 mb-1 mt-1">
                <a class="ml-3 btn btn-danger" type="button" data-dismiss="modal">Tutup</a>
            </p>

        </div>
    </div>
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

</html>