<?php if (isset($data)) { ?>
    <?php
    // Decode data lampiran untuk multiple files
    $lampiranFiles = [];
    if ($data->lampiran !== null) {
        $decodedFiles = json_decode($data->lampiran, true);
        if (json_last_error() === JSON_ERROR_NONE && is_array($decodedFiles)) {
            $lampiranFiles = $decodedFiles;
        } else {
            // Fallback untuk data lama (single file)
            $lampiranFiles[] = [
                'saved_name' => $data->lampiran,
                'custom_name' => 'Lampiran',
                'original_name' => 'Lampiran'
            ];
        }
    }
    ?>
    <form id="formEditModalData" action="./editSave" method="post" enctype="multipart/form-data">
        <input type="hidden" id="_id" name="_id" value="<?= $data->id ?>">
        <input type="hidden" id="_old_lampiran" name="_old_lampiran" value="<?= htmlspecialchars($data->lampiran) ?>">
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-10">
                    <label for="_judul" class="col-form-label">Judul Dokumen:</label>
                    <input type="text" class="form-control judul" value="<?= $data->judul ?>" id="_judul" name="_judul" placeholder="Judul Dokumen..." onfocusin="inputFocus(this);">
                    <div class="help-block _judul"></div>
                </div>
                <div class="col-lg-2">
                    <label for="_tahun" class="col-form-label">Tahun:</label>
                    <div class="position-relative" id="datepicker5">
                        <input type="text" class="form-control" name="_tahun" value="<?= $data->tahun ?>" data-provide="datepicker" data-date-container='#datepicker5' data-date-format="yyyy" data-date-min-view-mode="2">
                    </div>
                </div>
                <div class="col-lg-10">
                    <label for="_sumber" class="col-form-label">Sumber Data:</label>
                    <input type="text" class="form-control sumber" value="<?= $data->sumber_data ?>" id="_sumber" name="_sumber" placeholder="Sumber data..." onfocusin="inputFocus(this);">
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
                                    <!-- Existing files -->
                                    <?php foreach ($lampiranFiles as $index => $file): ?>
                                        <div class="file-input-group mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control form-control-sm file-name-input" placeholder="Nama file (tanpa ekstensi)" name="file_names[]" value="<?= isset($file['custom_name']) ? $file['custom_name'] : '' ?>">
                                                    <input type="hidden" name="existing_files[]" value="<?= isset($file['saved_name']) ? $file['saved_name'] : $file ?>">
                                                </div>
                                                <div class="col-md-5">
                                                    <input class="form-control form-control-sm file-input" type="file" name="_file_lampiran[]" accept="image/*, application/pdf" onchange="validateSingleFile(this)">
                                                    <small class="text-muted">Kosongkan jika tidak ingin mengubah file</small>
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button" class="btn btn-sm btn-danger" onclick="removeFileInput(this)" <?= count($lampiranFiles) === 1 ? 'disabled' : '' ?>>
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="file-preview mt-1">
                                                <?php if (isset($file['saved_name'])): ?>
                                                    <div class="file-info">
                                                        <span class="file-name">File saat ini: <?= isset($file['custom_name']) ? $file['custom_name'] : $file['saved_name'] ?></span>
                                                        <a target="_blank" href="<?= base_url() . '/uploads/dokumen/' . $file['saved_name'] ?>" class="badge badge-pill badge-soft-success ml-2">Lihat</a>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>

                                    <!-- Template for new file inputs -->
                                    <div class="file-input-group mb-2" id="newFileTemplate" style="display: none;">
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
                                    </div>
                                </div>

                                <p class="font-size-11">Format : <code data-toggle="tooltip" data-placement="bottom" title="jpg, png, jpeg, pdf">Images/PDF</code> and Maximum File Size <code>5 Mb</code> per file</p>
                                <div class="help-block _file_lampiran" for="_file_lampiran"></div>
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
        let fileInputCounter = <?= count($lampiranFiles) ?>;

        function addFileInput() {
            fileInputCounter++;
            const container = document.getElementById('fileInputsContainer');
            const template = document.getElementById('newFileTemplate');

            const newFileInput = template.cloneNode(true);
            newFileInput.id = '';
            newFileInput.style.display = 'block';

            container.appendChild(newFileInput);
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
                // Jika file dihapus, hapus preview baru
                if (!previewContainer.querySelector('.file-info')) {
                    previewContainer.innerHTML = '';
                }
                return;
            }

            const validation = validateFile(file);

            if (!validation.isValid) {
                previewContainer.innerHTML = `
                    <div class="file-error">
                        <strong>${file.name}</strong> - ${validation.error}
                    </div>
                `;
                input.value = '';
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
                    const fileNameWithoutExt = file.name.replace(/\.[^/.]+$/, "");
                    fileNameInput.value = fileNameWithoutExt;
                }
            }
        }

        function validateFile(file) {
            const mime_types = ['image/jpg', 'image/jpeg', 'image/png', 'application/pdf'];
            const maxSize = 5 * 1024 * 1024;

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

                // Only validate if file is selected
                if (file) {
                    if (!fileNameInput.value.trim()) {
                        isValid = false;
                        errorMessages.push(`File "${file.name}" belum memiliki nama`);
                        fileNameInput.style.borderColor = '#dc3545';
                    } else {
                        fileNameInput.style.borderColor = '';
                    }

                    const validation = validateFile(file);
                    if (!validation.isValid) {
                        isValid = false;
                        errorMessages.push(`File "${file.name}": ${validation.error}`);
                    }
                } else {
                    // For existing files without new file, name is required
                    if (!fileNameInput.value.trim()) {
                        isValid = false;
                        errorMessages.push(`Nama file tidak boleh kosong`);
                        fileNameInput.style.borderColor = '#dc3545';
                    } else {
                        fileNameInput.style.borderColor = '';
                    }
                }
            });

            return {
                isValid: isValid,
                errors: errorMessages
            };
        }

        $("#formEditModalData").on("submit", function(e) {
            e.preventDefault();
            const id = document.getElementsByName('_id')[0].value;
            const judul = document.getElementsByName('_judul')[0].value;
            const tahun = document.getElementsByName('_tahun')[0].value;
            const sumber = document.getElementsByName('_sumber')[0].value;

            let status;
            if ($('#status_publikasi').is(":checked")) {
                status = "1";
            } else {
                status = "0";
            }

            // Basic validation
            if (judul === "" || tahun === "" || sumber === "") {
                Swal.fire("Peringatan!", "Semua field harus diisi.", "warning");
                return false;
            }

            if (judul.length < 5 || judul.length > 250) {
                Swal.fire("Peringatan!", "Judul harus antara 5-250 karakter.", "warning");
                return false;
            }

            // File validation
            const fileValidation = validateAllFiles();
            if (!fileValidation.isValid) {
                Swal.fire("Peringatan!", fileValidation.errors.join('<br>'), "warning");
                return false;
            }

            const formUpload = new FormData();
            formUpload.append('id', id);
            formUpload.append('judul', judul);
            formUpload.append('tahun', tahun);
            formUpload.append('sumber_data', sumber);
            formUpload.append('status', status);

            // Append existing files
            const existingFiles = document.querySelectorAll('input[name="existing_files[]"]');
            existingFiles.forEach((input, index) => {
                formUpload.append('existing_files[]', input.value);
            });

            // Append files and names
            const fileInputs = document.querySelectorAll('input[name="_file_lampiran[]"]');
            const fileNameInputs = document.querySelectorAll('input[name="file_names[]"]');

            fileInputs.forEach((input, index) => {
                if (input.files[0]) {
                    formUpload.append('_file_lampiran[]', input.files[0]);
                }
                formUpload.append('file_names[]', fileNameInputs[index].value);
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

        // Initialize remove buttons
        document.addEventListener('DOMContentLoaded', function() {
            updateRemoveButtons();
        });
    </script>
<?php } ?>