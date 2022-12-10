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
                            <td width="80%"><?= $data->nama ?></td>
                        </tr>
                        <tr>
                            <td width="17%">Membaca</td>
                            <td width="3%">:</td>
                            <td width="80%"><?= $data->membaca ?></td>
                        </tr>
                        <tr>
                            <td width="17%">Mengingat</td>
                            <td width="3%">:</td>
                            <td width="80%"><?= $data->mengingat ?></td>
                        </tr>
                        <tr>
                            <td width="17%">Mengadili</td>
                            <td width="3%">:</td>
                            <td width="80%"><?= $data->mengadili ?></td>
                        </tr>
                        <tr>
                            <td width="17%">Tgl ditetapkan</td>
                            <td width="3%">:</td>
                            <td width="80%"><?= tanggal($data->tgl_ditetapkan) ?></td>
                        </tr>
                        <tr>
                            <td width="17%">Hakim Ketua</td>
                            <td width="3%">:</td>
                            <td width="80%"><?= $data->hakim_ketua ?></td>
                        </tr>
                        <tr>
                            <td width="17%">Hakim Anggota (1)</td>
                            <td width="3%">:</td>
                            <td width="80%"><?= $data->hakim_satu ?></td>
                        </tr>
                        <tr>
                            <td width="17%">Hakim Anggota (2)</td>
                            <td width="3%">:</td>
                            <td width="80%"><?= $data->hakim_dua ?></td>
                        </tr>
                        <tr>
                            <td width="17%">Panitera Pengganti</td>
                            <td width="3%">:</td>
                            <td width="80%"><?= $data->panitera_pengganti ?></td>
                        </tr>
                        <tr>
                            <td width="17%">File Hasil Sidang</td>
                            <td width="3%">:</td>
                            <td width="80%">
                                <a href="<?= base_url('asset/petikan-putusan/' . $data->file) ?>" class="btn btn-xs btn-info" target="_blank">
                                    <i class="fa fa-download"></i> <?= $data->file ?>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td width="17%">Status</td>
                            <td width="3%">:</td>
                            <td width="80%"><?= $data->status ?></td>
                        </tr>
                        <?php if ($this->session->userdata('level_user') == 'panitera_pengganti') : ?>
                            <?php if ($data->file == null) : ?>
                                <?php if ($data->status != 'DITOLAK') : ?>
                                    <tr>
                                        <td width="17%">Validasi</td>
                                        <td width="3%">:</td>
                                        <td width="80%">
                                            <form class="form-inline" action="<?= site_url('petikan_putusan/validasi/' . $data->id) ?>" method="POST" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="panitera_pengganti" placeholder="Nama Panitera Pengganti" required>
                                                </div>
                                                <button type="submit" class="btn btn-info">
                                                    Validasi
                                                </button>
                                                <a href="<?= site_url('petikan_putusan/berkas_tolak/' . $data->id) ?>" class="btn btn-danger">Tolak Berkas</a>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if ($data->status != 'DITOLAK') : ?>
                            <?php if ($this->session->userdata('level_user') == 'majelis_hakim') : ?>
                                <?php if ($data->tujuan_kejaksaan == null && $data->tujuan_lapas == null) : ?>
                                    <tr>
                                        <td width="17%">Tujuan</td>
                                        <td width="3%">:</td>
                                        <td width="80%">
                                            <form class="form-inline" action="<?= site_url('petikan_putusan/update_tujuan/' . $data->id) ?>" method="POST" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <input type="file" name="file" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <select name="tujuan_kejaksaan" id="tujuan_kejaksaan" class="form-control">
                                                        <option value="" selected>Pilih Kejaksaan</option>
                                                        <option value="kejaksaan_minahasa">
                                                            Kejaksaan Minahasa
                                                        </option>
                                                        <option value="kejaksaan_minahasa_selatan">
                                                            Kejaksaan Minahasa Selatan
                                                        </option>
                                                        <option value="kejaksaan_tomohon">
                                                            Kejaksaan Tomohon
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <select name="tujuan_lapas" id="tujuan_lapas" class="form-control">
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
                                                <button type="submit" class="btn btn-info" style="margin-top: 1rem;">
                                                    Kirim ke Tujuan
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('layouts/footer') ?>