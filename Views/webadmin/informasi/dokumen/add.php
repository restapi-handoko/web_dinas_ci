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
                            <input class="form-control" type="file" id="_file_lampiran" name="_file_lampiran[]" multiple onFocus="inputFocus(this);" accept="image/*, application/pdf" onchange="loadMultipleFiles(this)">
                            <p class="font-size-11">Format : <code data-toggle="tooltip" data-placement="bottom" title="jpg, png, jpeg, pdf">Images/PDF</code> and Maximum File Size <code>5 Mb</code> per file</p>
                            <div class="help-block _file_lampiran" for="_file_lampiran"></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <div id="filePreviewContainer" class="file-preview-container">
                                <p class="text-muted">File yang akan diupload:</p>
                                <div id="selectedFilesList"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-12 mt-4">
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
            </div> -->
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

<style>
    .file-preview-container {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 10px;
        max-height: 200px;
        overflow-y: auto;
    }

    .file-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 5px;
        border-bottom: 1px solid #f0f0f0;
    }

    .file-item:last-child {
        border-bottom: none;
    }

    .file-name {
        font-size: 12px;
        flex-grow: 1;
    }

    .file-size {
        font-size: 11px;
        color: #6c757d;
        margin-left: 10px;
    }

    .file-remove {
        color: #dc3545;
        cursor: pointer;
        margin-left: 10px;
    }

    .file-error {
        color: #dc3545;
        font-size: 11px;
    }
</style>

<script>
    let selectedFiles = [];

    function loadMultipleFiles(input) {
        const files = input.files;
        selectedFiles = [];
        const fileListContainer = document.getElementById('selectedFilesList');
        fileListContainer.innerHTML = '';

        if (files.length === 0) {
            fileListContainer.innerHTML = '<p class="text-muted">Tidak ada file dipilih</p>';
            return;
        }

        let hasError = false;

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const fileItem = validateFile(file);

            if (fileItem.isValid) {
                selectedFiles.push(file);
                addFileToList(file.name, file.size, i);
            } else {
                hasError = true;
                addFileToList(file.name, file.size, i, fileItem.error);
            }
        }

        if (hasError) {
            // Reset input jika ada error
            input.value = '';
            selectedFiles = [];
            fileListContainer.innerHTML = '<p class="text-danger">Ada file yang tidak valid. Silakan pilih file kembali.</p>';
        }
    }

    function validateFile(file) {
        const mime_types = ['image/jpg', 'image/jpeg', 'image/png', 'application/pdf'];
        const maxSize = 5 * 1024 * 1024; // 5MB

        if (mime_types.indexOf(file.type) === -1) {
            return {
                isValid: false,
                error: 'Format file tidak didukung'
            };
        }

        if (file.size > maxSize) {
            return {
                isValid: false,
                error: 'Ukuran file melebihi 5MB'
            };
        }

        return {
            isValid: true,
            error: null
        };
    }

    function addFileToList(fileName, fileSize, index, error = null) {
        const fileListContainer = document.getElementById('selectedFilesList');
        const fileItem = document.createElement('div');
        fileItem.className = 'file-item';

        const sizeInMB = (fileSize / (1024 * 1024)).toFixed(2);

        if (error) {
            fileItem.innerHTML = `
            <div>
                <div class="file-name text-danger">${fileName}</div>
                <div class="file-error">${error}</div>
            </div>
            <div class="file-remove" onclick="removeFile(${index})">×</div>
        `;
        } else {
            fileItem.innerHTML = `
            <div>
                <div class="file-name">${fileName}</div>
                <div class="file-size">${sizeInMB} MB</div>
            </div>
            <div class="file-remove" onclick="removeFile(${index})">×</div>
        `;
        }

        fileListContainer.appendChild(fileItem);
    }

    function removeFile(index) {
        const input = document.getElementById('_file_lampiran');
        const dt = new DataTransfer();

        // Add all files except the one to remove
        for (let i = 0; i < input.files.length; i++) {
            if (i !== index) {
                dt.items.add(input.files[i]);
            }
        }

        input.files = dt.files;
        loadMultipleFiles(input); // Refresh the list
    }

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
                Swal.fire(
                    'Warning!!!',
                    "Ukuran file tidak boleh lebih dari 5 Mb.",
                    'warning'
                );
                return false;
            }
        } else {
            console.log("failed Load");
        }
    }

    $("#formAddModalData").on("submit", function(e) {
        e.preventDefault();
        const judul = document.getElementsByName('_judul')[0].value;
        const sumber = document.getElementsByName('_sumber')[0].value;
        const tahun = document.getElementsByName('_tahun')[0].value;
        // const fileNameLampiran = document.getElementsByName('_file_lampiran')[0].value;
        const files = document.getElementsByName('_file_lampiran[]')[0].files;

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

        if (files.length === 0) {
            Swal.fire(
                "Peringatan!",
                "Pilih minimal satu file dokumen.",
                "warning"
            );
            return false;
        }

        // Validasi semua file
        for (let i = 0; i < files.length; i++) {
            const validation = validateFile(files[i]);
            if (!validation.isValid) {
                Swal.fire(
                    "Peringatan!",
                    `File "${files[i].name}" tidak valid: ${validation.error}`,
                    "warning"
                );
                return false;
            }
        }

        // if (fileNameLampiran === "") {
        //     Swal.fire(
        //         "Peringatan!",
        //         "File dokumen belum dipilih.",
        //         "warning"
        //     );
        //     return true;
        // }

        const formUpload = new FormData();
        for (let i = 0; i < files.length; i++) {
            formUpload.append('_file_lampiran[]', files[i]);
        }
        // const fileF = document.getElementsByName('_file_lampiran')[0].files[0];
        // formUpload.append('_file_lampiran', fileF);
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