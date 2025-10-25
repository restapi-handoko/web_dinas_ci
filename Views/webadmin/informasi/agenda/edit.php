<?php if (isset($data)) { ?>
    <form id="formEditModalData" action="./editSave" method="post" enctype="multipart/form-data">
        <input type="hidden" id="_id" name="_id" value="<?= $data->id ?>">
        <input type="hidden" id="_old_image" name="_old_image" value="<?= $data->image ?>">
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-2">
                    <label for="_tanggal" class="col-form-label">Tanggal Mulai:</label>
                    <input type="date" class="form-control tanggal" value="<?= $data->tanggal_mulai ?>" id="_tanggal" name="_tanggal" onfocusin="inputFocus(this);" required />
                    <div class="help-block _tanggal"></div>
                </div>
                <div class="col-lg-2">
                    <label for="_tanggal_selesai" class="col-form-label">Tanggal Selesai:</label>
                    <input type="date" class="form-control tanggal_selesai" value="<?= $data->tanggal_selesai ?>" id="_tanggal_selesai" name="_tanggal_selesai" onfocusin="inputFocus(this);" required />
                    <div class="help-block _tanggal_selesai"></div>
                </div>
                <div class="col-lg-2">
                    <label for="_jam" class="col-form-label">Jam:</label>
                    <input type="time" class="form-control jam" value="<?= $data->jam ?>" id="_jam" name="_jam" onfocusin="inputFocus(this);" required />
                    <div class="help-block _jam"></div>
                </div>
                <div class="col-lg-10">
                    <label for="_judul" class="col-form-label">Judul Agenda:</label>
                    <input type="text" class="form-control judul" value="<?= $data->judul ?>" id="_judul" name="_judul" placeholder="Judul..." onfocusin="inputFocus(this);">
                    <div class="help-block _judul"></div>
                </div>
                <div class="col-lg-12">
                    <label for="_isi" class="col-form-label">Tempat:</label>
                    <input type="text" class="form-control isi" value="<?= $data->deskripsi ?>" id="_isi" name="_isi" placeholder="Tempat..." onfocusin="inputFocus(this);">
                    <div class="help-block _isi"></div>
                    <!-- <textarea id="_isi" name="_isi"></textarea> -->
                </div>
                <div class="col-lg-10">
                    <label for="_penyelenggara" class="col-form-label">Penyelenggara / Pengirim:</label>
                    <input type="text" class="form-control penyelenggara" value="<?= $data->penyelenggara ?>" id="_penyelenggara" name="_penyelenggara" placeholder="Penyelenggara..." onfocusin="inputFocus(this);">
                    <div class="help-block _penyelenggara"></div>
                </div>
                <div class="col-lg-12 mt-4">
                    <div class="row mt-4">
                        <div class="col-lg-6">
                            <div class="mt-3">
                                <label for="_file" class="form-label">Gambar Agenda Jika Ada: </label>
                                <input class="form-control" type="file" id="_file" name="_file" onFocus="inputFocus(this);" accept="image/*" onchange="loadFileImage()">
                                <p class="font-size-11">Format : <code data-toggle="tooltip" data-placement="bottom" title="jpg, png, jpeg">Images</code> and Maximum File Size <code>500 Kb</code></p>
                                <div class="help-block _file" for="_file"></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <div class="preview-image-upload">
                                    <?php if ($data->image !== null) { ?>
                                        <img class="imagePreviewUpload" src="<?= base_url('uploads/agenda') . '/' . $data->image ?>" id="imagePreviewUpload" />
                                    <?php } else { ?>
                                        <img class="imagePreviewUpload" id="imagePreviewUpload" />
                                    <?php } ?>
                                    <button type="button" class="btn-remove-preview-image">Remove</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 text-end">
                    <h5 class="font-size-14 mb-3">Status Publikasi</h5>
                    <div>
                        <input type="checkbox" id="status_publikasi" name="status_publikasi" switch="success" <?= (int)$data->status === 1 ? ' checked' : '' ?> />
                        <label for="status_publikasi" data-on-label="Yes" data-off-label="No"></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <div class="col-8">
                <div>
                    <progress id="progressBar" value="0" max="100" style="width:100%; display: none;"></progress>
                </div>
                <div>
                    <h3 id="status" style="font-size: 15px; margin: 8px auto;"></h3>
                </div>
                <div>
                    <p id="loaded_n_total" style="margin-bottom: 0px;"></p>
                </div>
            </div>
            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
        </div>
    </form>

    <script>
        initSelect2("_kategori", '.content-detailModal');

        // ClassicEditor.create(document.querySelector('#_isi'), {
        //     simpleUpload: {
        //         uploadUrl: "./uploadImage"
        //     }
        // }).then(editors => {
        //     editorAdd = editors
        // }).catch(error => {
        //     console.log(error);
        // });

        function loadFileImage() {
            const input = document.getElementsByName('_file')[0];
            if (input.files && input.files[0]) {
                var file = input.files[0];

                var mime_types = ['image/jpg', 'image/jpeg', 'image/png'];

                if (mime_types.indexOf(file.type) == -1) {
                    input.value = "";
                    $('.imagePreviewUpload').attr('src', '');
                    Swal.fire(
                        'Warning!!!',
                        "Hanya file type gambar yang diizinkan.",
                        'warning'
                    );
                    return false;
                }

                if (file.size > 1 * 1024 * 1000) {
                    input.value = "";
                    $('.imagePreviewUpload').attr('src', '');
                    Swal.fire(
                        'Warning!!!',
                        "Ukuran file tidak boleh lebih dari 1 Mb.",
                        'warning'
                    );
                    return false;
                }

                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.imagePreviewUpload').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            } else {
                console.log("failed Load");
            }
        }

        $("#formEditModalData").on("submit", function(e) {
            e.preventDefault();
            const id = document.getElementsByName('_id')[0].value;
            const old_image = document.getElementsByName('_old_image')[0].value;
            const judul = document.getElementsByName('_judul')[0].value;
            const tanggal_mulai = document.getElementsByName('_tanggal')[0].value;
            const tanggal_selesai = document.getElementsByName('_tanggal_selesai')[0].value;
            const jam = document.getElementsByName('_jam')[0].value;
            const penyelenggara = document.getElementsByName('_penyelenggara')[0].value;
            const isi = document.getElementsByName('_isi')[0].value;
            const fileName = document.getElementsByName('_file')[0].value;

            let status;
            if ($('#status_publikasi').is(":checked")) {
                status = "1";
            } else {
                status = "0";
            }

            if (judul === "") {
                $("input#_judul").css("color", "#dc3545");
                $("input#_judul").css("border-color", "#dc3545");
                $('._judul').html('<ul role="alert" style="color: #dc3545; list-style-type:none; padding-inline-start: 10px;"><li style="color: #dc3545;">Judul tidak boleh kosong.</li></ul>');
                return false;
            }

            if (judul.length < 5) {
                $("input#_judul").css("color", "#dc3545");
                $("input#_judul").css("border-color", "#dc3545");
                $('._judul').html('<ul role="alert" style="color: #dc3545; list-style-type:none; padding-inline-start: 10px;"><li style="color: #dc3545;">Judul minimal 5 karakter.</li></ul>');
                return false;
            }

            if (judul.length > 250) {
                $("input#_judul").css("color", "#dc3545");
                $("input#_judul").css("border-color", "#dc3545");
                $('._judul').html('<ul role="alert" style="color: #dc3545; list-style-type:none; padding-inline-start: 10px;"><li style="color: #dc3545;">Judul maksimal 250 karakter.</li></ul>');
                return false;
            }

            if (tanggal_mulai === "") {
                $("input#_tanggal").css("color", "#dc3545");
                $("input#_tanggal").css("border-color", "#dc3545");
                $('._tanggal').html('<ul role="alert" style="color: #dc3545; list-style-type:none; padding-inline-start: 10px;"><li style="color: #dc3545;">Tanggal Mulai tidak boleh kosong.</li></ul>');
                return false;
            }
            if (tanggal_selesai === "") {
                $("input#_tanggal_selesai").css("color", "#dc3545");
                $("input#_tanggal_selesai").css("border-color", "#dc3545");
                $('._tanggal_selesai').html('<ul role="alert" style="color: #dc3545; list-style-type:none; padding-inline-start: 10px;"><li style="color: #dc3545;">Tanggal Selesai tidak boleh kosong.</li></ul>');
                return false;
            }
            if (jam === "") {
                $("input#_jam").css("color", "#dc3545");
                $("input#_jam").css("border-color", "#dc3545");
                $('._jam').html('<ul role="alert" style="color: #dc3545; list-style-type:none; padding-inline-start: 10px;"><li style="color: #dc3545;">Jam tidak boleh kosong.</li></ul>');
                return false;
            }
            if (penyelenggara === "") {
                $("input#_penyelenggara").css("color", "#dc3545");
                $("input#_penyelenggara").css("border-color", "#dc3545");
                $('._penyelenggara').html('<ul role="alert" style="color: #dc3545; list-style-type:none; padding-inline-start: 10px;"><li style="color: #dc3545;">Penyelenggara tidak boleh kosong.</li></ul>');
                return false;
            }

            if (isi === "") {
                $("input#_isi").css("color", "#dc3545");
                $("input#_isi").css("border-color", "#dc3545");
                $('._isi').html('<ul role="alert" style="color: #dc3545; list-style-type:none; padding-inline-start: 10px;"><li style="color: #dc3545;">Tempat tidak boleh kosong.</li></ul>');
                return false;
            }

            const formUpload = new FormData();
            if (fileName !== "") {
                const file = document.getElementsByName('_file')[0].files[0];
                formUpload.append('_file', file);
            }
            formUpload.append('id', id);
            formUpload.append('judul', judul);
            formUpload.append('tanggal_mulai', tanggal_mulai);
            formUpload.append('tanggal_selesai', tanggal_selesai);
            formUpload.append('jam', jam);
            formUpload.append('penyelenggara', penyelenggara);
            formUpload.append('isi', isi);
            formUpload.append('status', status);

            $.ajax({
                xhr: function() {
                    let xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt) {
                        if (evt.lengthComputable) {
                            ambilId("loaded_n_total").innerHTML = "Uploaded " + evt.loaded + " bytes of " + evt.total;
                            var percent = (evt.loaded / evt.total) * 100;
                            ambilId("progressBar").value = Math.round(percent);
                            // ambilId("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
                        }
                    }, false);
                    return xhr;
                },
                url: "./editSave",
                type: 'POST',
                data: formUpload,
                contentType: false,
                cache: false,
                processData: false,
                dataType: 'JSON',
                beforeSend: function() {
                    ambilId("progressBar").style.display = "block";
                    // ambilId("status").innerHTML = "Mulai mengupload . . .";
                    ambilId("status").style.color = "blue";
                    ambilId("progressBar").value = 0;
                    ambilId("loaded_n_total").innerHTML = "";
                    $('div.modal-content-loading').block({
                        message: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
                    });
                },
                success: function(resul) {
                    $('div.modal-content-loading').unblock();

                    if (resul.status !== 200) {
                        ambilId("status").innerHTML = "";
                        ambilId("status").style.color = "red";
                        ambilId("progressBar").value = 0;
                        ambilId("loaded_n_total").innerHTML = "";
                        if (resul.status !== 201) {
                            if (resul.status === 401) {
                                Swal.fire(
                                    'Failed!',
                                    resul.message,
                                    'warning'
                                ).then((valRes) => {
                                    reloadPage();
                                });
                            } else {
                                Swal.fire(
                                    'GAGAL!',
                                    resul.message,
                                    'warning'
                                );
                            }
                        } else {
                            Swal.fire(
                                'Peringatan!',
                                resul.message,
                                'success'
                            ).then((valRes) => {
                                reloadPage();
                            })
                        }
                    } else {
                        ambilId("status").innerHTML = "";
                        ambilId("status").style.color = "green";
                        ambilId("progressBar").value = 100;
                        Swal.fire(
                            'SELAMAT!',
                            resul.message,
                            'success'
                        ).then((valRes) => {
                            reloadPage();
                        })
                    }
                },
                error: function(erro) {
                    console.log(erro);
                    ambilId("status").innerHTML = "";
                    ambilId("status").style.color = "red";
                    $('div.modal-content-loading').unblock();
                    Swal.fire(
                        'PERINGATAN!',
                        "Trafik sedang penuh, silahkan ulangi beberapa saat lagi.",
                        'warning'
                    );
                }
            });
        });
    </script>
<?php } ?>