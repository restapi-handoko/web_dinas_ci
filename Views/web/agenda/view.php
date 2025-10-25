<div class="modal fade" id="modalview">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="card-header ">
                <h6 class="modal-title mt-0">Detail Agenda </h6>
            </div>
            <div class="modal-body">
                <img id='img_load' width='100%' src='<?= base_url('assets') ?>/img/informasi/agenda/default.png'>
                <table class="table table-bordered table-hover table-striped">
                    <tbody>
                        <tr>
                            <td colspan="2"><strong><?= $agenda->judul ?></strong></td>
                        </tr>
                        <?php if ($agenda->image !== NULL) { ?>
                            <!-- <tr>
                                <td colspan="2">

                                </td>
                            </tr> -->
                        <?php } ?>
                        <tr>
                            <td>Tanggal</td>
                            <td><?= $agenda->tanggal_mulai !== NULL ? 'Mulai : <b>' . $agenda->tanggal_mulai . '</b>' : '' ?><?= $agenda->tanggal_selesai !== NULL ? ' Sampai Dengan : <b>' . $agenda->tanggal_selesai . '</b>' : '' ?></td>
                        </tr>
                        <tr>
                            <td>Tempat</td>
                            <td><strong><?= $agenda->deskripsi ?></strong></td>
                        </tr>
                        <tr>
                            <td>Jam</td>
                            <td><strong><?= $agenda->jam ?></strong></td>
                        </tr>
                        <tr>
                            <td>Pengirim / Penyelenggara</td>
                            <td><strong><?= $agenda->penyelenggara ?></strong></td>
                        </tr>
                    </tbody>
                </table> <!-- </div> -->
            </div>
            <p class="p-1 mb-1 mt-1"> <a class="ml-3 btn btn-danger" type="button" data-dismiss="modal">Tutup</a> </p>
        </div>
    </div>
</div>