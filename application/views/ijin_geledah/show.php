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
                            <td width="17%">Nama Ketua</td>
                            <td width="3%">:</td>
                            <td width="80%"><?= $data->nama_ketua ?></td>
                        </tr>
                        <tr>
                            <td width="17%">NIP Ketua</td>
                            <td width="3%">:</td>
                            <td width="80%"><?= $data->nip ?></td>
                        </tr>
                        <tr>
                            <td width="17%">Status</td>
                            <td width="3%">:</td>
                            <td width="80%"><?= $data->status ?></td>
                        </tr>
                        <?php if ($data->status != 'DITOLAK') : ?>
                            <tr>
                                <td width="17%">Tujuan</td>
                                <td width="3%">:</td>
                                <td width="80%">
                                    <?php
                                    if ($data->tujuan_kepolisian == null) {
                                    ?>
                                        <form class="form-inline" action="<?= site_url('ijin_geledah/update_tujuan/' . $data->id) ?>" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <input type="file" class="form-control" name="file" required>
                                            </div>
                                            <div class="form-group">
                                                <select name="tujuan_kepolisian" class="form-control" required>
                                                    <option value="kepolisian_minahasa" selected>
                                                        Kepolisian Minahasa
                                                    </option>
                                                    <option value="kepolisian_minahasa_tenggara">
                                                        Kepolisian Minahasa Tenggara
                                                    </option>
                                                    <option value="kepolisian_tomohon">
                                                        Kepolisian Tomohon
                                                    </option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-info">
                                                Kirim Ketujuan
                                            </button>
                                            <a href="<?= site_url('ijin_geledah/berkas_tolak/' . $data->id) ?>" class="btn btn-danger">Tolak Berkas</a>
                                        </form>
                                    <?php
                                    } else {
                                        echo strtoupper(str_replace('_', ' ', $data->tujuan_kepolisian));
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