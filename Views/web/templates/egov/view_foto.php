<div class="modal fade" id="modalview">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="card-header mt-0">
                <h6 class="modal-title m-0"><?= $foto->album ?></h6>
            </div>
            <div class="modal-body">
                <img width='100%' src='<?= base_url('uploads/foto') . '/' . $foto->image ?>'>
                <table class="table table-bordered table-hover table-striped">
                    <tbody>
                        <tr>
                            <td colspan="2"><strong><?= $foto->judul ?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <p class="p-1 mb-1"> <a class="ml-3 btn btn-danger" type="button" data-dismiss="modal">Tutup</a> </p>
        </div>
    </div>
</div>