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
                            <td width="17%">Menimbang</td>
                            <td width="3%">:</td>
                            <td width="80%"><?= $data->menimbang ?></td>
                        </tr>
                        <tr>
                            <td width="17%">Menetapkan</td>
                            <td width="3%">:</td>
                            <td width="80%"><?= $data->menetapkan ?></td>
                        </tr>
                        <tr>
                            <td width="17%">Tgl ditetapkan</td>
                            <td width="3%">:</td>
                            <td width="80%"><?= tanggal($data->tgl_ditetapkan) ?></td>
                        </tr>
                        <tr>
                            <td width="17%">Nama KPN</td>
                            <td width="3%">:</td>
                            <td width="80%"><?= $data->nama_ketua ?></td>
                        </tr>
                        <!-- <tr>
                            <td width="17%">File Hasil Sidang</td>
                            <td width="3%">:</td>
                            <td width="80%">
                                <a href="<?= base_url('asset/penahanan-kpn/' . $data->file) ?>" class="btn btn-xs btn-info" target="_blank">
                                    <i class="fa fa-download"></i> <?= $data->file ?>
                                </a>
                            </td>
                        </tr> -->
                        <tr>
                            <td width="17%">Status</td>
                            <td width="3%">:</td>
                            <td width="80%"><?= $data->status ?></td>
                        </tr>
                        <?php if ($this->session->userdata('level_user') == 'panitera_pengganti') : ?>
                            <tr>
                                <td width="17%">Validasi</td>
                                <td width="3%">:</td>
                                <td width="80%">
                                    <a href="<?= site_url('penahanan_kpn/validasi/' . $data->id) ?>" class="btn btn-info">
                                        Validasi Selesai
                                    </a>
                                </td>
                            </tr>
                        <?php endif; ?>
                        <?php if ($this->session->userdata('level_user') == 'ketua_pn') : ?>
                            <tr>
                                <td width="17%">Tujuan</td>
                                <td width="3%">:</td>
                                <td width="80%">
                                    <?php
                                    if ($data->tujuan_lapas == null) {
                                    ?>
                                        <form class="form-inline" action="<?= site_url('penahanan_kpn/update_tujuan/' . $data->id) ?>" method="POST" enctype="multipart/form-data">
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
                                            <button type="submit" class="btn btn-info">
                                                Kirim Ketujuan
                                            </button>
                                        </form>
                                    <?php
                                    } else {
                                        echo strtoupper(str_replace('_', ' ', $data->tujuan_kejaksaan)) . ' dan ' . strtoupper(str_replace('_', ' ', $data->tujuan_lapas));
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('layouts/footer') ?>