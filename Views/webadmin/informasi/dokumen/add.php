<form id="formAddModalData" action="./addSave" method="post" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-10">
                <label for="_judul" class="col-form-label">Judul Dokumen:</label>
                <input type="text" class="form-control judul" id="_judul" name="_judul" placeholder="Judul dokumen..." onfocusin="inputFocus(this);">
                <div class="help-block _judul"></div>
            </div>
            <div class="col-lg-2">
                <label for="_tahun" class="col-form-label">Tahun:</label>
                <div class="position-relative" id="datepicker5">
                    <input type="text" class="form-control" name="_tahun" data-provide="datepicker" data-date-container='#datepicker5' data-date-format="yyyy" data-date-min-view-mode="2">
                </div>
            </div>
            <div class="col-lg-10">
                <label for="_sumber" class="col-form-label">Sumber Data:</label>
                <input type="text" class="form-control sumber" id="_sumber" name="_sumber" placeholder="Sumber data..." onfocusin="inputFocus(this);">
                <div class="help-block _sumber"></div>
            </div>
            <div class="col-lg-12 mt-4">
                <div class="row mt-4">
                    <div class="col-lg-6">
                        <div class="mt-3">
                            <label for="_file_lampiran" class="form-label">Lampiran Dokumen: </label>
                            <input class="form-control" type="file" id="_file_lampiran" name="_file_lampiran" onFocus="inputFocus(this);" accept="image/*, application/pdf" onchange="loadFilePdf()">
                            <p class="font-size-11">Format : <code data-toggle="tooltip" data-placement="bottom" title="jpg, png, jpeg, pdf">Images</code> and Maximum File Size <code>5 Mb</code></p>
                            <div class="help-block _file_lampiran" for="_file_lampiran"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 text-end">
                <h5 class="font-size-14 mb-3">Status Publikasi</h5>
                <div>
                    <input type="checkbox" id="status_publikasi" name="status_publikasi" switch="success" checked />
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
        <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
    </div>
</form>

<script>
    function loadFilePdf() {
        const inputF = document.getElementsByName('_file_lampiran')[0];
        if (inputF.files && inputF.files[0]) {
            var fileF = inputF.files[0];

            var mime_typesF = ['image/jpg', 'image/jpeg', 'image/png', 'application/pdf'];

            if (mime_typesF.indexOf(fileF.type) == -1) {
                inputF.value = "";
                // $('.imagePreviewUpload').attr('src', '');
                Swal.fire(
                    'Warning!!!',
                    "Hanya file type gambar yang diizinkan.",
                    'warning'
                );
                return false;
            }

            if (fileF.size > 1 * 5124 * 1000) {
                inputF.value = "";
                // $('.imagePreviewUpload').attr('src', '');
                Swal.fire(
                    'Warning!!!',
                    "Ukuran file tidak boleh lebih dari 5 Mb.",
                    'warning'
                );
                return false;
            }

            // var reader = new FileReader();

            // reader.onload = function(e) {
            //     $('.imagePreviewUpload').attr('src', e.target.result);
            // }

            // reader.readAsDataURL(input.files[0]);
        } else {
            console.log("failed Load");
        }
    }

    $("#formAddModalData").on("submit", function(e) {
        e.preventDefault();
        const judul = document.getElementsByName('_judul')[0].value;
        const sumber = document.getElementsByName('_sumber')[0].value;
        const tahun = document.getElementsByName('_tahun')[0].value;
        const fileNameLampiran = document.getElementsByName('_file_lampiran')[0].value;

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

        if (sumber === "") {
            $("input#_sumber").css("color", "#dc3545");
            $("input#_sumber").css("border-color", "#dc3545");
            $('._sumber').html('<ul role="alert" style="color: #dc3545; list-style-type:none; padding-inline-start: 10px;"><li style="color: #dc3545;">Sumber data tidak boleh kosong.</li></ul>');
            return false;
        }

        if (tahun === "") {
            $("input#_tahun").css("color", "#dc3545");
            $("input#_tahun").css("border-color", "#dc3545");
            $('._tahun').html('<ul role="alert" style="color: #dc3545; list-style-type:none; padding-inline-start: 10px;"><li style="color: #dc3545;">Tahun tidak boleh kosong.</li></ul>');
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

        if (fileNameLampiran === "") {
            Swal.fire(
                "Peringatan!",
                "File dokumen belum dipilih.",
                "warning"
            );
            return true;
        }

        const formUpload = new FormData();
        const fileF = document.getElementsByName('_file_lampiran')[0].files[0];
        formUpload.append('_file_lampiran', fileF);
        formUpload.append('tahun', tahun);
        formUpload.append('sumber_data', sumber);
        formUpload.append('judul', judul);
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
            url: "./addSave",
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
                    // ambilId("status").innerHTML = "gagal";
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
                    // ambilId("status").innerHTML = resul.message;
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
                // ambilId("status").innerHTML = "Upload Failed";
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