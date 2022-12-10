<?php $this->load->view('layouts/header') ?>
<div class="row">
    <div class="col-xs-12">

        <div class="box box-success">
            <?php if ($this->session->userdata('level_user') == 'admin') : ?>
                <div class="box-header text-right">
                    <a href="<?= site_url('penetapan_hs/create') ?>" class="btn btn-success mb-3">
                        Tambah Data
                    </a>
                </div>
            <?php endif; ?>
            <div class="box-body">
                <table class="table table-bordered table-striped datatables">
                    <thead>
                        <tr>
                            <th class="text-center" width="5%">No. </th>
                            <th class="text-center" width="25%">No. Perkara</th>
                            <th class="text-center" width="30%">Nama Terdakwa</th>
                            <th class="text-center" width="10%">Status</th>
                            <th class="text-center" width="15%">Tujuan</th>
                            <th class="text-center" width="15%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center"><?= $row->no_perkara ?></td>
                                <td class="text-center"><?= $row->nama_terdakwa ?></td>
                                <td class="text-center"><?= $row->status_hs ?></td>
                                <td class="text-center">
                                    <span class="label label-default">
                                        <?= strtoupper(str_replace('_', ' ', $row->tujuan_hs)) ?>
                                    </span>
                                </td>
                                <td class=" text-center">
                                    <?php
                                    $level_user = $this->session->userdata('level_user');
                                    $level_array = [
                                        'kejaksaan_minahasa',
                                        'kejaksaan_minahasa_selatan',
                                        'kejaksaan_tomohon',
                                        'lapas_minahasa',
                                        'rutan_minahasa_selatan',
                                        'lapas_tomohon'
                                    ];

                                    if (in_array($level_user, $level_array)) : ?>
                                        <?php // button_print('penetapan_hs/print/' . $row->id_hs) 
                                        ?>
                                        <?= button_show('penetapan_hs/show/' . $row->id_hs) ?>
                                        <?= button_download('asset/penetapan-hs/' . $row->file_hs) ?>
                                    <?php endif; ?>

                                    <?php if ($level_user == 'panitera_pengganti' or $level_user == 'majelis_hakim') : ?>
                                        <?= button_show('penetapan_hs/show/' . $row->id_hs) ?>
                                        <?= button_download('asset/penetapan-hs/' . $row->file_hs) ?>
                                    <?php endif; ?>

                                    <?php if ($level_user == 'admin') : ?>
                                        <?= button_edit('penetapan_hs/edit/' . $row->id_hs) ?>
                                        <?= button_delete('penetapan_hs/delete/' . $row->id_hs) ?>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('layouts/footer') ?>