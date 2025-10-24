<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?= isset($title) ? $title : "Administrator" ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Website Resmi Bagian PGB Kab. Lampung Tengah" name="description" />
    <meta content="handokowae.my.id" name="author" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="keywords" content="lampung, lampung tengah, kabupaten lampung tengah">

    <meta property="og:title" content="Website Resmi Bagian PGB Kab. Lampung Tengah" />
    <meta property="og:url" content="<?= base_url() ?>" />
    <meta property="og:image" content="<?= base_url('favicon/android-icon-192x192.png'); ?>" />
    <meta property="og:description" content="Website Resmi Bagian PGB Kab. Lampung Tengah" />

    <meta itemprop="name" content="Website Resmi Bagian PGB Kab. Lampung Tengah" />
    <meta itemprop="description" content="Website Resmi Bagian PGB Kab. Lampung Tengah" />
    <meta itemprop="image" content="<?= base_url() . 'favicon/android-icon-192x192.png' ?>" />

    <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url() . 'favicon/apple-icon-57x57.png' ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= base_url() . 'favicon/apple-icon-60x60.png' ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url() . 'favicon/apple-icon-72x72.png' ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() . 'favicon/apple-icon-76x76.png' ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url() . 'favicon/apple-icon-114x114.png' ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url() . 'favicon/apple-icon-120x120.png' ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url() . 'favicon/apple-icon-144x144.png' ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url() . 'favicon/apple-icon-152x152.png' ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() . 'favicon/apple-icon-180x180.png' ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url() . 'favicon/android-icon-192x192.png' ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() . 'favicon/favicon-32x32.png' ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url() . 'favicon/favicon-96x96.png' ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() . 'favicon/favicon-16x16.png' ?>">
    <link rel="manifest" href="<?= base_url() . 'favicon/manifest.json' ?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= base_url() . 'favicon/ms-icon-144x144.png' ?>">
    <meta name="theme-color" content="#ffffff">

    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container content-loading">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Welcome Back !</h5>
                                        <p>Sign in to continue . . .</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="<?= base_url() ?>assets/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="auth-logo">
                                <a href="index.html" class="auth-logo-light">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="<?= base_url() ?>assets/images/logo-light.svg" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>

                                <a href="index.html" class="auth-logo-dark">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="<?= base_url() ?>assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                <form class="form-horizontal" action="./auth/login" method="post">

                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                            <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember-check">
                                        <label class="form-check-label" for="remember-check">
                                            Remember me
                                        </label>
                                    </div>

                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Masuk</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <h5 class="font-size-14 mb-3">Sign in with</h5>

                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="javascript::void()" class="social-list-item bg-primary text-white border-primary">
                                                    <i class="mdi mdi-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript::void()" class="social-list-item bg-info text-white border-info">
                                                    <i class="mdi mdi-twitter"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript::void()" class="social-list-item bg-danger text-white border-danger">
                                                    <i class="mdi mdi-google"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">

                        <div>
                            <!-- <p>Don't have an account ? <a href="auth-register.html" class="fw-medium text-primary"> Signup now </a> </p> -->
                            <p>© <script>
                                    document.write(new Date().getFullYear())
                                </script> Disdikbud Kab. Lampung Tengah. Supported <i class="mdi mdi-heart text-danger"></i> by <a href="https://diskominfotik.lampungtengahkab.go.id">Diskominfotik Kab. Lampung Tengah</a></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end account-pages -->

    <!-- JAVASCRIPT -->
    <script src="<?= base_url() ?>assets/libs/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/js/blockUI.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/node-waves/waves.min.js"></script>
    <!-- App js -->
    <script src="<?= base_url() ?>assets/js/app.js"></script>
    <script src="<?= base_url() ?>assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <script>
        <?php if (isset($error)) { ?>
            Swal.fire(
                "Peringatan!",
                '<?= $error ?>',
                "warning"
            );
        <?php } ?>
        $("form").on("submit", function(e) {

            e.preventDefault();
            var dataString = $(this).serialize();
            $.ajax({
                type: "POST",
                url: './auth/login',
                data: dataString,
                dataType: 'JSON',
                beforeSend: function() {
                    loading = true;
                    $('div.content-loading').block({
                        message: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
                    });
                },
                success: function(msg) {
                    console.log(msg);
                    if (msg.status != 200) {
                        if (msg.status !== 201) {
                            if (msg.status !== 202) {
                                $('div.content-loading').unblock();
                                loading = false;
                                Swal.fire(
                                    "Gagal!",
                                    msg.message,
                                    "warning"
                                );
                            } else {
                                Swal.fire(
                                    "Warning!",
                                    msg.message,
                                    "warning"
                                ).then((valRes) => {
                                    // setTimeout(function() {
                                    document.location.href = msg.redirect;
                                    // }, 2000);

                                })
                            }
                        } else {
                            Swal.fire(
                                'Berhasil!',
                                msg.message,
                                'success'
                            ).then((valRes) => {
                                // setTimeout(function() {
                                document.location.href = msg.redirect;
                                // }, 2000);
                            })
                        }
                    } else {
                        Swal.fire(
                            'Berhasil!',
                            msg.message,
                            'success'
                        ).then((valRes) => {
                            // setTimeout(function() {
                            document.location.href = msg.redirect;
                            // }, 2000);
                            // document.location.href = window.location.href + "dashboard";
                        })
                    }
                },
                error: function(data) {
                    console.log(data);
                    loading = false;
                    $('div.content-loading').unblock();
                    Swal.fire(
                        'Gagal!',
                        "Trafik sedang penuh, silahkan ulangi beberapa saat lagi.",
                        'warning'
                    );
                }
            });

        });
    </script>
</body>

</html>