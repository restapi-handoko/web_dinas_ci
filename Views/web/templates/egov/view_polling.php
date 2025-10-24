<div class="modal fade" id="modalview" tabindex="-1" aria-labelledby="modalviewLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card-header p-1">
                <h6 class="modal-title mt-1">&nbsp;&nbsp;Hasil Jajak Pendapat</h6>
            </div>
            <div class="modal-body">
                <table class="table table-hover p-0">
                    <tbody>
                        <?php if (isset($polling) && count($polling) > 0) { ?>
                            <?php
                            // Hitung total responden
                            $totalResponden = 0;
                            foreach ($polling as $item) {
                                $totalResponden += $item->jumlah;
                            }
                            ?>

                            <?php foreach ($polling as $item) {
                                // Hitung persentase
                                $persentase = $totalResponden > 0 ? ($item->jumlah / $totalResponden) * 100 : 0;
                                $persentaseFormatted = number_format($persentase, 1);

                                // Tentukan warna progress bar berdasarkan nilai
                                $progressBarClass = '';
                                switch ($item->nilai) {
                                    case 2: // Sangat Baik
                                        $progressBarClass = 'bg-success';
                                        break;
                                    case 3: // Baik
                                        $progressBarClass = 'bg-primary';
                                        break;
                                    case 4: // Cukup Baik
                                        $progressBarClass = 'bg-warning';
                                        break;
                                    case 6: // Belum Tahu
                                        $progressBarClass = 'bg-secondary';
                                        break;
                                    default:
                                        $progressBarClass = 'bg-info';
                                }
                            ?>
                                <tr>
                                    <td width="200">
                                        <?= $item->keterangan ?>
                                        <a class="text-danger">(<code><?= $item->jumlah ?></code>)
                                    </td>
                                    <td>
                                        <div class="progress p-0" style="height: 20px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated p-0 <?= $progressBarClass ?>"
                                                role="progressbar"
                                                style="width: <?= $persentase ?>%"
                                                aria-valuenow="<?= $persentase ?>"
                                                aria-valuemin="0"
                                                aria-valuemax="100">
                                                <?= $persentaseFormatted ?>%
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>

                            <!-- Total Responden -->
                            <tr>
                                <td colspan="2">
                                    <b>Jumlah Responden :</b>
                                    <a class="text-danger"><?= $totalResponden ?></a>
                                </td>
                            </tr>

                        <?php } else { ?>
                            <tr>
                                <td colspan="2" class="text-center">
                                    <div class="alert alert-info p-2">
                                        <i class="fas fa-info-circle"></i> Belum ada data polling
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer p-1">
                <a class="d-inline float-left btn btn-danger" data-dismiss="modal">Tutup</a>
            </div>
        </div>
    </div>
</div>