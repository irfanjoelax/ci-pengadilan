<?php $this->load->view('layouts/header') ?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <td width="17%">No. Perkara</td>
                            <td width="3%">:</td>
                            <td width="80%"><?= $data->no_perkara ?></td>
                        </tr>
                        <tr>
                            <td width="17%">Terdakwa</td>
                            <td width="3%">:</td>
                            <td width="80%"><?= $data->nama_terdakwa ?></td>
                        </tr>
                        <tr>
                            <td width="17%">Membaca</td>
                            <td width="3%">:</td>
                            <td width="80%"><?= $data->membaca ?></td>
                        </tr>
                        <tr>
                            <td width="17%">Tgl/Waktu Menetapkan</td>
                            <td width="3%">:</td>
                            <td width="80%"><?= $data->tgl_menetapkan ?> / <?= $data->wkt_menetapkan ?></td>
                        </tr>
                        <tr>
                            <td width="17%">Tgl ditetapkan</td>
                            <td width="3%">:</td>
                            <td width="80%"><?= $data->tgl_ditetapkan ?></td>
                        </tr>
                        <tr>
                            <td width="17%">Nama Hakim</td>
                            <td width="3%">:</td>
                            <td width="80%"><?= $data->tgl_ditetapkan ?></td>
                        </tr>
                        <tr>
                            <td width="17%">File Hasil Sidang</td>
                            <td width="3%">:</td>
                            <td width="80%">
                                <a href="<?= base_url('asset/penetapan-hs/' . $data->file_hs) ?>" class="btn btn-xs btn-info" target="_blank">
                                    <i class="fa fa-download"></i> <?= $data->file_hs ?>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td width="17%">Status</td>
                            <td width="3%">:</td>
                            <td width="80%"><?= $data->status_hs ?></td>
                        </tr>
                        <?php if ($data->status_hs === 'PROSES') : ?>
                            <?php if ($this->session->userdata('level_user') == 'panitera_pengganti') : ?>
                                <tr>
                                    <td width="17%">Validasi</td>
                                    <td width="3%">:</td>
                                    <td width="80%">
                                        <a href="<?= site_url('penetapan_hs/validasi_pp/' . $data->id_hs) ?>" class="btn btn-info">Validasi Selesai</a>

                                        <?php if ($data->status_hs === 'PROSES') : ?>
                                            <a href="<?= site_url('penetapan_hs/berkas_tolak/' . $data->id_hs) ?>" class="btn btn-danger">Tolak Berkas</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if ($data->status_hs === 'Validasi PP') : ?>
                            <?php if ($this->session->userdata('level_user') == 'majelis_hakim') : ?>
                                <tr>
                                    <td width="17%">Tujuan</td>
                                    <td width="3%">:</td>
                                    <td width="80%">
                                        <?php
                                        if ($data->tujuan_hs == null) {
                                        ?>
                                            <form class="form-inline" action="<?= site_url('penetapan_hs/update_tujuan/' . $data->id_hs) ?>" method="POST" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <input type="file" name="file_hs" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <select name="tujuan_hs" class="form-control" required>
                                                        <option value="" selected>Pilih Lapas</option>
                                                        <option value="lapas_minahasa">
                                                            Lapas Minahasa
                                                        </option>
                                                        <option value="lapas_tomohon">
                                                            Lapas Tomohon
                                                        </option>
                                                        <option value="rutan_minahasa_selatan">
                                                            Rutan Minahasa Selatan
                                                        </option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-info">
                                                    Validasi Selesai
                                                </button>
                                            </form>
                                        <?php
                                        } else {
                                            echo strtoupper(str_replace('_', ' ', $data->tujuan_hs));
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('layouts/footer') ?>