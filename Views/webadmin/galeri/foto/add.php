<form id="formAddModalData" action="./addSave" method="post" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-10">
                <label for="_album" class="col-form-label">Album:</label>
                <input type="text" class="form-control album" id="_album" name="_album" placeholder="Ketik atau pilih album..." onfocusin="inputFocus(this); showAlbumSuggestions()" oninput="showAlbumSuggestions()" onblur="hideAlbumSuggestions()" autocomplete="off">
                <div id="albumSuggestions" class="album-suggestions"></div>
                <div class="help-block _album"></div>
            </div>
            <div class="col-lg-10">
                <label for="_judul" class="col-form-label">Judul:</label>
                <input type="text" class="form-control judul" id="_judul" name="_judul" placeholder="Judul..." onfocusin="inputFocus(this);">
                <div class="help-block _judul"></div>
            </div>
            <div class="col-lg-12 mt-4">
                <div class="row mt-4">
                    <div class="col-lg-6">
                        <div class="mt-3">
                            <label for="_file" class="form-label">Gambar: </label>
                            <input class="form-control" type="file" id="_file" name="_file" onFocus="inputFocus(this);" accept="image/*" onchange="loadFileImage()">
                            <p class="font-size-11">Format : <code data-toggle="tooltip" data-placement="bottom" title="jpg, png, jpeg">Images</code> and Maximum File Size <code>1 Mb</code></p>
                            <div class="help-block _file" for="_file"></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <div class="preview-image-upload">
                                <img class="imagePreviewUpload" id="imagePreviewUpload" />
                                <button type="button" class="btn-remove-preview-image">Remove</button>
                            </div>
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
<style>
    .album-suggestions {
        position: absolute;
        background: white;
        border: 1px solid #ddd;
        border-radius: 4px;
        max-height: 200px;
        overflow-y: auto;
        z-index: 1000;
        width: calc(100% - 30px);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        display: none;
    }

    .album-suggestion-item {
        padding: 8px 12px;
        cursor: pointer;
        border-bottom: 1px solid #f0f0f0;
    }

    .album-suggestion-item:hover {
        background-color: #f8f9fa;
    }

    .album-suggestion-item:last-child {
        border-bottom: none;
    }

    .album-suggestion-item.active {
        background-color: #007bff;
        color: white;
    }
</style>

<script>
    let albumSuggestions = [];
    let currentSuggestionIndex = -1;

    // Fungsi untuk memuat suggestions album dari database
    function loadAlbumSuggestions() {
        $.ajax({
            url: './getAlbums', // Ganti dengan endpoint yang sesuai
            type: 'GET',
            dataType: 'JSON',
            success: function(resul) {
                if (resul.status === 200) {
                    albumSuggestions = resul.data;
                }
            },
            error: function() {
                console.log('Gagal memuat suggestions album');
            }
        });
    }

    // Fungsi untuk menampilkan suggestions
    function showAlbumSuggestions() {
        const input = document.getElementById('_album');
        const suggestionsContainer = document.getElementById('albumSuggestions');
        const inputValue = input.value.toLowerCase();

        if (inputValue.length < 1) {
            suggestionsContainer.style.display = 'none';
            return;
        }

        const filteredSuggestions = albumSuggestions.filter(album =>
            album.nama_album.toLowerCase().includes(inputValue)
        );

        if (filteredSuggestions.length === 0) {
            suggestionsContainer.style.display = 'none';
            return;
        }

        suggestionsContainer.innerHTML = '';
        filteredSuggestions.forEach((suggestion, index) => {
            const div = document.createElement('div');
            div.className = 'album-suggestion-item';
            div.textContent = suggestion.nama_album;
            div.onclick = function() {
                selectAlbumSuggestion(suggestion.nama_album);
            };
            suggestionsContainer.appendChild(div);
        });

        suggestionsContainer.style.display = 'block';
        currentSuggestionIndex = -1;
    }

    // Fungsi untuk menyembunyikan suggestions
    function hideAlbumSuggestions() {
        setTimeout(() => {
            const suggestionsContainer = document.getElementById('albumSuggestions');
            suggestionsContainer.style.display = 'none';
        }, 200);
    }

    // Fungsi untuk memilih suggestion
    function selectAlbumSuggestion(albumName) {
        document.getElementById('_album').value = albumName;
        document.getElementById('albumSuggestions').style.display = 'none';
        currentSuggestionIndex = -1;
    }

    // Handle keyboard navigation
    document.getElementById('_album').addEventListener('keydown', function(e) {
        const suggestionsContainer = document.getElementById('albumSuggestions');
        const items = suggestionsContainer.getElementsByClassName('album-suggestion-item');

        if (e.key === 'ArrowDown') {
            e.preventDefault();
            if (currentSuggestionIndex < items.length - 1) {
                currentSuggestionIndex++;
                updateActiveSuggestion(items);
            }
        } else if (e.key === 'ArrowUp') {
            e.preventDefault();
            if (currentSuggestionIndex > 0) {
                currentSuggestionIndex--;
                updateActiveSuggestion(items);
            }
        } else if (e.key === 'Enter' && currentSuggestionIndex >= 0) {
            e.preventDefault();
            items[currentSuggestionIndex].click();
        } else if (e.key === 'Escape') {
            suggestionsContainer.style.display = 'none';
            currentSuggestionIndex = -1;
        }
    });

    function updateActiveSuggestion(items) {
        for (let i = 0; i < items.length; i++) {
            if (i === currentSuggestionIndex) {
                items[i].classList.add('active');
            } else {
                items[i].classList.remove('active');
            }
        }
    }

    // Panggil fungsi load suggestions ketika modal dibuka
    document.addEventListener('DOMContentLoaded', function() {
        loadAlbumSuggestions();
    });

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

    $("#formAddModalData").on("submit", function(e) {
        e.preventDefault();
        const album = document.getElementsByName('_album')[0].value;
        const judul = document.getElementsByName('_judul')[0].value;
        const fileName = document.getElementsByName('_file')[0].value;

        let status;
        if ($('#status_publikasi').is(":checked")) {
            status = "1";
        } else {
            status = "0";
        }

        if (album === "") {
            $("input#_album").css("color", "#dc3545");
            $("input#_album").css("border-color", "#dc3545");
            $('._album').html('<ul role="alert" style="color: #dc3545; list-style-type:none; padding-inline-start: 10px;"><li style="color: #dc3545;">Album tidak boleh kosong.</li></ul>');
            return false;
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

        if (judul.length > 100) {
            $("input#_judul").css("color", "#dc3545");
            $("input#_judul").css("border-color", "#dc3545");
            $('._judul').html('<ul role="alert" style="color: #dc3545; list-style-type:none; padding-inline-start: 10px;"><li style="color: #dc3545;">Judul maksimal 50 karakter.</li></ul>');
            return false;
        }

        if (fileName === "") {
            Swal.fire(
                "Peringatan!",
                "Gambar belum dipilih.",
                "warning"
            );
            return true;
        }

        const formUpload = new FormData();
        const file = document.getElementsByName('_file')[0].files[0];
        formUpload.append('_file', file);
        formUpload.append('album', album);
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