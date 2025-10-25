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
                                    <i class="fa fa-plus"></i> Tambah File Baru
                                </button>

                                <div id="fileInputsContainer">
                                    <!-- Existing files -->
                                    <?php foreach ($lampiranFiles as $index => $file): ?>
                                        <div class="file-input-group mb-2 existing-file">
                                            <div class="row align-items-center">
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control form-control-sm file-name-input" placeholder="Nama file (tanpa ekstensi)" name="file_names[]" value="<?= isset($file['custom_name']) ? $file['custom_name'] : '' ?>">
                                                    <input type="hidden" name="existing_files[]" value="<?= isset($file['saved_name']) ? $file['saved_name'] : $file ?>">
                                                    <small class="existing-file-badge">File Existing</small>
                                                </div>
                                                <div class="col-md-5">
                                                    <input class="form-control form-control-sm file-input" type="file" name="_file_lampiran[]" accept="image/*, application/pdf" onchange="validateSingleFile(this)" style="display: none;">
                                                    <button type="button" class="btn btn-sm btn-outline-secondary btn-replace-file" onclick="enableFileReplace(this)">
                                                        <i class="fa fa-sync-alt"></i> Ganti File
                                                    </button>
                                                    <small class="text-muted d-block mt-1">
                                                        File: <?= isset($file['saved_name']) ? $file['saved_name'] : '' ?>
                                                    </small>
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
                                                        <span class="file-name">
                                                            <i class="fa fa-file"></i>
                                                            File saat ini: <?= isset($file['custom_name']) ? $file['custom_name'] : $file['saved_name'] ?>
                                                        </span>
                                                        <a target="_blank" href="<?= base_url() . '/uploads/dokumen/' . $file['saved_name'] ?>" class="badge badge-pill badge-soft-success ml-2">
                                                            <i class="fa fa-eye"></i> Lihat
                                                        </a>
                                                        <span class="file-size ml-2">
                                                            <?php
                                                            $filePath = FCPATH . "uploads/dokumen/" . $file['saved_name'];
                                                            if (file_exists($filePath)) {
                                                                $fileSize = filesize($filePath);
                                                                $sizeInMB = round($fileSize / (1024 * 1024), 2);
                                                                echo "($sizeInMB MB)";
                                                            }
                                                            ?>
                                                        </span>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>

                                    <!-- Template for new file inputs -->
                                    <div class="file-input-group mb-2 new-file" id="newFileTemplate" style="display: none;">
                                        <div class="row align-items-center">
                                            <div class="col-md-5">
                                                <input type="text" class="form-control form-control-sm file-name-input" placeholder="Nama file (tanpa ekstensi)" name="file_names[]">
                                                <small class="new-file-badge">File Baru</small>
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

    <style>
        .file-input-group {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
            border: 1px solid #dee2e6;
            transition: all 0.3s ease;
        }

        .file-input-group.existing-file {
            background-color: #f8fff9;
            border-left: 4px solid #28a745;
            border: 1px solid #c3e6cb;
        }

        .file-input-group.new-file {
            background-color: #f0f8ff;
            border-left: 4px solid #007bff;
            border: 1px solid #b8daff;
        }

        .file-input-group:hover {
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .existing-file-badge {
            background-color: #28a745;
            color: white;
            padding: 3px 10px;
            border-radius: 12px;
            font-size: 10px;
            margin-top: 5px;
            display: inline-block;
            font-weight: 500;
        }

        .new-file-badge {
            background-color: #007bff;
            color: white;
            padding: 3px 10px;
            border-radius: 12px;
            font-size: 10px;
            margin-top: 5px;
            display: inline-block;
            font-weight: 500;
        }

        .file-info {
            font-size: 12px;
            color: #495057;
            padding: 8px;
            background-color: #f8f9fa;
            border-radius: 4px;
            border-left: 3px solid #6c757d;
        }

        .file-name {
            font-weight: 500;
            color: #212529;
        }

        .file-size {
            color: #6c757d;
            font-size: 11px;
        }

        .file-error {
            color: #dc3545;
            font-size: 11px;
            padding: 5px;
            background-color: #f8d7da;
            border-radius: 4px;
            border-left: 3px solid #dc3545;
        }

        .btn-replace-file {
            font-size: 11px;
            padding: 4px 8px;
        }

        .file-preview {
            min-height: 20px;
        }

        .help-block {
            font-size: 12px;
        }

        .help-block ul {
            margin-bottom: 0;
        }

        .text-muted {
            font-size: 11px;
        }

        .file-marked-deleted {
            opacity: 0.6;
            background-color: #ffe6e6 !important;
            border-left: 4px solid #dc3545 !important;
            border: 1px solid #f5c6cb !important;
        }

        .file-marked-deleted::before {
            content: "Akan dihapus";
            position: absolute;
            top: -8px;
            right: -8px;
            background: #dc3545;
            color: white;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: bold;
            z-index: 1;
        }

        .file-marked-deleted .file-name-input,
        .file-marked-deleted .file-input,
        .file-marked-deleted .btn-danger {
            opacity: 0.5;
            pointer-events: none;
        }
    </style>

    <script>
        let fileInputCounter = <?= count($lampiranFiles) ?>;

        function addFileInput() {
            fileInputCounter++;
            const container = document.getElementById('fileInputsContainer');
            const template = document.getElementById('newFileTemplate');

            const newFileInput = template.cloneNode(true);
            newFileInput.id = '';
            newFileInput.style.display = 'block';
            newFileInput.classList.add('new-file');

            container.appendChild(newFileInput);
            updateRemoveButtons();
        }

        function removeFileInput(button) {
            const fileInputGroup = button.closest('.file-input-group');
            const isExistingFile = fileInputGroup.classList.contains('existing-file');

            if (isExistingFile) {
                Swal.fire({
                    title: 'Hapus File?',
                    text: 'File akan dihapus saat data disimpan',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Tambahkan class untuk menandai file yang dihapus
                        fileInputGroup.classList.add('file-marked-deleted');
                        fileInputGroup.style.opacity = '0.5';
                        fileInputGroup.style.backgroundColor = '#ffe6e6';

                        // Nonaktifkan semua input dalam group ini
                        const inputs = fileInputGroup.querySelectorAll('input, button');
                        inputs.forEach(input => {
                            input.disabled = true;
                        });

                        // Tandai file untuk dihapus
                        const existingFileInput = fileInputGroup.querySelector('input[name="existing_files[]"]');
                        if (existingFileInput) {
                            const deletedFileInput = document.createElement('input');
                            deletedFileInput.type = 'hidden';
                            deletedFileInput.name = 'deleted_files[]';
                            deletedFileInput.value = existingFileInput.value;
                            document.getElementById('formEditModalData').appendChild(deletedFileInput);
                        }

                        updateRemoveButtons();
                    }
                });
            } else {
                fileInputGroup.remove();
                updateRemoveButtons();
            }
        }

        function updateRemoveButtons() {
            const fileInputGroups = document.querySelectorAll('.file-input-group:not(.file-marked-deleted)');
            const removeButtons = document.querySelectorAll('.file-input-group .btn-danger');

            // Hitung hanya file yang tidak ditandai untuk dihapus
            const activeFileCount = fileInputGroups.length;

            // Disable remove button jika hanya satu file yang aktif
            if (activeFileCount === 1) {
                removeButtons.forEach(button => {
                    const fileInputGroup = button.closest('.file-input-group');
                    if (!fileInputGroup.classList.contains('file-marked-deleted')) {
                        button.disabled = true;
                        button.title = 'Tidak dapat menghapus satu-satunya file';
                    }
                });
            } else {
                removeButtons.forEach(button => {
                    const fileInputGroup = button.closest('.file-input-group');
                    if (!fileInputGroup.classList.contains('file-marked-deleted')) {
                        button.disabled = false;
                        button.title = '';
                    }
                });
            }
        }

        function enableFileReplace(button) {
            const fileInput = button.previousElementSibling;
            const fileGroup = button.closest('.file-input-group');

            fileInput.style.display = 'block';
            button.style.display = 'none';

            // Tampilkan pesan
            const previewContainer = fileGroup.querySelector('.file-preview');
            previewContainer.innerHTML += `
                <div class="file-info mt-1">
                    <small class="text-warning">
                        <i class="fa fa-exclamation-triangle"></i> 
                        File akan diganti dengan yang baru
                    </small>
                </div>
            `;
        }

        function validateSingleFile(input) {
            const file = input.files[0];
            const previewContainer = input.closest('.file-input-group').querySelector('.file-preview');
            const fileGroup = input.closest('.file-input-group');

            // Hapus pesan sebelumnya kecuali info file existing
            const existingFileInfo = previewContainer.querySelector('.file-info:first-child');
            previewContainer.innerHTML = '';
            if (existingFileInfo) {
                previewContainer.appendChild(existingFileInfo);
            }

            if (!file) {
                return;
            }

            const validation = validateFile(file);

            if (!validation.isValid) {
                previewContainer.innerHTML += `
                    <div class="file-error mt-1">
                        <strong>${file.name}</strong> - ${validation.error}
                    </div>
                `;
                input.value = '';
            } else {
                const sizeInMB = (file.size / (1024 * 1024)).toFixed(2);
                previewContainer.innerHTML += `
                    <div class="file-info mt-1">
                        <span class="file-name">File baru: ${file.name}</span>
                        <span class="file-size">(${sizeInMB} MB)</span>
                    </div>
                `;

                // Auto-fill filename if empty
                const fileNameInput = fileGroup.querySelector('.file-name-input');
                if (!fileNameInput.value.trim()) {
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
            const fileNameInputs = document.querySelectorAll('input[name="file_names[]"]');
            let hasNewFileUpload = false;
            let isValid = true;
            let errorMessages = [];

            // Reset semua border terlebih dahulu
            fileNameInputs.forEach(input => {
                input.style.borderColor = '';
            });

            // Check if there are any new file uploads
            fileInputs.forEach(input => {
                const fileInputGroup = input.closest('.file-input-group');
                // Skip files yang ditandai untuk dihapus
                if (!fileInputGroup.classList.contains('file-marked-deleted') && input.files && input.files[0]) {
                    hasNewFileUpload = true;
                }
            });

            // Validasi hanya untuk file yang TIDAK ditandai untuk dihapus
            fileNameInputs.forEach((fileNameInput, index) => {
                const fileInputGroup = fileNameInput.closest('.file-input-group');
                const fileInput = fileInputs[index];

                // Skip validasi untuk file yang ditandai untuk dihapus
                if (fileInputGroup.classList.contains('file-marked-deleted')) {
                    return;
                }

                const file = fileInput.files ? fileInput.files[0] : null;
                const isExistingFile = fileInputGroup.classList.contains('existing-file');

                // Jika ada file baru yang diupload
                if (file) {
                    if (!fileNameInput.value.trim()) {
                        isValid = false;
                        errorMessages.push(`File "${file.name}" belum memiliki nama`);
                        fileNameInput.style.borderColor = '#dc3545';
                    }
                }
                // Jika file existing tanpa upload baru
                else if (isExistingFile && !file) {
                    if (!fileNameInput.value.trim()) {
                        isValid = false;
                        errorMessages.push(`Nama file tidak boleh kosong`);
                        fileNameInput.style.borderColor = '#dc3545';
                    }
                }
                // Jika file baru tanpa file yang dipilih
                else if (!isExistingFile && !file && fileNameInput.value.trim()) {
                    isValid = false;
                    errorMessages.push(`Nama file "${fileNameInput.value}" tidak memiliki file yang dipilih`);
                    fileInput.style.borderColor = '#dc3545';
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
                if (input.files && input.files[0]) {
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

            // Add new-file class to template
            const template = document.getElementById('newFileTemplate');
            if (template) {
                template.classList.add('new-file');
            }
        });
    </script>
<?php } ?>