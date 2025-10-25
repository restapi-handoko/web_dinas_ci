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
                    <div class="col-lg-12">
                        <div class="mt-3">
                            <label class="form-label">Lampiran Dokumen: </label>
                            <button type="button" class="btn btn-sm btn-primary mb-2" onclick="addFileInput()">
                                <i class="fa fa-plus"></i> Tambah File
                            </button>

                            <div id="fileInputsContainer">
                                <!-- Dynamic file inputs will be added here -->
                                <div class="file-input-group mb-2">
                                    <div class="row align-items-center">
                                        <div class="col-md-5">
                                            <input type="text" class="form-control form-control-sm file-name-input" placeholder="Nama file (tanpa ekstensi)" name="file_names[]">
                                        </div>
                                        <div class="col-md-5">
                                            <input class="form-control form-control-sm file-input" type="file" name="_file_lampiran[]" accept="image/*, application/pdf">
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-sm btn-danger" onclick="removeFileInput(this)" disabled>
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="file-preview mt-1"></div>
                                </div>
                            </div>

                            <p class="font-size-11">Format : <code data-toggle="tooltip" data-placement="bottom" title="jpg, png, jpeg, pdf">Images/PDF</code> and Maximum File Size <code>5 Mb</code> per file</p>
                            <div class="help-block _file_lampiran" for="_file_lampiran"></div>
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
    .file-input-group {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 10px;
        background-color: #f8f9fa;
    }

    .file-input-group:not(:first-child) {
        margin-top: 10px;
    }

    .file-preview {
        font-size: 12px;
        color: #6c757d;
    }

    .file-preview .file-info {
        display: flex;
        justify-content: between;
        align-items: center;
    }

    .file-preview .file-name {
        font-weight: 500;
    }

    .file-preview .file-size {
        color: #6c757d;
        margin-left: 10px;
    }

    .file-preview .file-error {
        color: #dc3545;
        font-size: 11px;
    }

    .file-name-input {
        font-size: 12px;
    }
</style>
<script>
    let fileInputCounter = 1;

    function addFileInput() {
        fileInputCounter++;
        const container = document.getElementById('fileInputsContainer');

        const newFileInput = document.createElement('div');
        newFileInput.className = 'file-input-group mb-2';
        newFileInput.innerHTML = `
        <div class="row align-items-center">
            <div class="col-md-5">
                <input type="text" class="form-control form-control-sm file-name-input" placeholder="Nama file (tanpa ekstensi)" name="file_names[]">
            </div>
            <div class="col-md-5">
                <input class="form-control form-control-sm file-input" type="file" name="_file_lampiran[]" accept="image/*, application/pdf" onchange="validateSingleFile(this)">
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-sm btn-danger" onclick="removeFileInput(this)">
                    <i class="fa fa-times"></i>
                </button>
            </div>
        </div>
        <div class="file-preview mt-1"></div>
    `;

        container.appendChild(newFileInput);

        // Enable remove button for all inputs if there's more than one
        updateRemoveButtons();
    }

    function removeFileInput(button) {
        const fileInputGroup = button.closest('.file-input-group');
        fileInputGroup.remove();
        updateRemoveButtons();
    }

    function updateRemoveButtons() {
        const fileInputGroups = document.querySelectorAll('.file-input-group');
        const removeButtons = document.querySelectorAll('.file-input-group .btn-danger');

        // Disable remove button if only one input remains
        if (fileInputGroups.length === 1) {
            removeButtons[0].disabled = true;
        } else {
            removeButtons.forEach(button => {
                button.disabled = false;
            });
        }
    }

    function validateSingleFile(input) {
        const file = input.files[0];
        const previewContainer = input.closest('.file-input-group').querySelector('.file-preview');

        if (!file) {
            previewContainer.innerHTML = '';
            return;
        }

        const validation = validateFile(file);

        if (!validation.isValid) {
            previewContainer.innerHTML = `
            <div class="file-error">
                <strong>${file.name}</strong> - ${validation.error}
            </div>
        `;
            input.value = ''; // Clear invalid file
        } else {
            const sizeInMB = (file.size / (1024 * 1024)).toFixed(2);
            previewContainer.innerHTML = `
            <div class="file-info">
                <span class="file-name">${file.name}</span>
                <span class="file-size">(${sizeInMB} MB)</span>
            </div>
        `;

            // Auto-fill filename if empty
            const fileNameInput = input.closest('.file-input-group').querySelector('.file-name-input');
            if (!fileNameInput.value) {
                const fileNameWithoutExt = file.name.replace(/\.[^/.]+$/, ""); // Remove extension
                fileNameInput.value = fileNameWithoutExt;
            }
        }
    }

    function validateFile(file) {
        const mime_types = ['image/jpg', 'image/jpeg', 'image/png', 'application/pdf'];
        const maxSize = 5 * 1024 * 1024; // 5MB

        if (mime_types.indexOf(file.type) === -1) {
            return {
                isValid: false,
                error: 'Format file tidak didukung. Hanya JPG, PNG, PDF yang diizinkan.'
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

    function validateAllFiles() {
        const fileInputs = document.querySelectorAll('input[name="_file_lampiran[]"]');
        let isValid = true;
        let errorMessages = [];

        fileInputs.forEach((input, index) => {
            const file = input.files[0];
            const fileNameInput = input.closest('.file-input-group').querySelector('.file-name-input');

            // Check if file is selected but no name
            if (file && !fileNameInput.value.trim()) {
                isValid = false;
                errorMessages.push(`File "${file.name}" belum memiliki nama`);
                fileNameInput.style.borderColor = '#dc3545';
            } else {
                fileNameInput.style.borderColor = '';
            }

            // Check if name is provided but no file
            if (fileNameInput.value.trim() && !file) {
                isValid = false;
                errorMessages.push(`Nama file "${fileNameInput.value}" tidak memiliki file`);
                input.style.borderColor = '#dc3545';
            } else {
                input.style.borderColor = '';
            }

            // Validate file type and size
            if (file) {
                const validation = validateFile(file);
                if (!validation.isValid) {
                    isValid = false;
                    errorMessages.push(`File "${file.name}": ${validation.error}`);
                }
            }
        });

        return {
            isValid: isValid,
            errors: errorMessages
        };
    }

    $("#formAddModalData").on("submit", function(e) {
        e.preventDefault();
        const judul = document.getElementsByName('_judul')[0].value;
        const sumber = document.getElementsByName('_sumber')[0].value;
        const tahun = document.getElementsByName('_tahun')[0].value;
        // const fileNameLampiran = document.getElementsByName('_file_lampiran')[0].value;
        // const files = document.getElementsByName('_file_lampiran[]')[0].files;

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

        // Validasi files
        const fileValidation = validateAllFiles();
        if (!fileValidation.isValid) {
            Swal.fire(
                "Peringatan!",
                fileValidation.errors.join('<br>'),
                "warning"
            );
            return false;
        }

        // Check if at least one file is selected
        const fileInputs = document.querySelectorAll('input[name="_file_lampiran[]"]');
        let hasFiles = false;
        fileInputs.forEach(input => {
            if (input.files[0]) {
                hasFiles = true;
            }
        });

        if (!hasFiles) {
            Swal.fire(
                "Peringatan!",
                "Pilih minimal satu file dokumen.",
                "warning"
            );
            return false;
        }

        const formUpload = new FormData();

        formUpload.append('tahun', tahun);
        formUpload.append('sumber_data', sumber);
        formUpload.append('judul', judul);
        formUpload.append('status', status);
        // Append files and their names
        const fileInputsArray = document.querySelectorAll('input[name="_file_lampiran[]"]');
        const fileNameInputs = document.querySelectorAll('input[name="file_names[]"]');

        fileInputsArray.forEach((input, index) => {
            if (input.files[0]) {
                formUpload.append('_file_lampiran[]', input.files[0]);
                formUpload.append('file_names[]', fileNameInputs[index].value);
            }
        });

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

    document.addEventListener('DOMContentLoaded', function() {
        updateRemoveButtons();
    });
</script>