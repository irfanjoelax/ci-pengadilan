<?php $this->load->view('layouts/header') ?>
<div class="row">
    <div class="col-xs-12">

        <div class="box box-success">
            <?php if ($this->session->userdata('level_user') == 'admin') : ?>
                <div class="box-header text-right">
                    <a href="<?= site_url('penahanan_hakim/create') ?>" class="btn btn-success mb-3">
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
                                <td class="text-center"><?= $row->nama ?></td>
                                <td class="text-center"><?= $row->status ?></td>
                                <td class="text-center">
                                    <span class="label label-default">
                                        <?= strtoupper(str_replace('_', ' ', $row->tujuan_lapas)) ?>
                                    </span>
                                </td>
                                <td class=" text-center">
                                    <?php
                                    $level_user = $this->session->userdata('level_user');
                                    $level_array = [
                                        'lapas_minahasa', 'rutan_minahasa_selatan', 'lapas_tomohon'
                                    ];

                                    if (in_array($level_user, $level_array)) : ?>
                                        <?= button_print('penahanan_hakim/print/' . $row->id) ?>
                                    <?php endif; ?>

                                    <?php if ($this->session->userdata('level_user') == 'panitera_pengganti') : ?>
                                        <?= button_show('penahanan_hakim/show/' . $row->id) ?>
                                        <?= button_download('asset/penahanan-hakim/' . $row->file) ?>
                                    <?php endif; ?>

                                    <?php if ($this->session->userdata('level_user') == 'admin') : ?>
                                        <?= button_edit('penahanan_hakim/edit/' . $row->id) ?>
                                        <?= button_delete('penahanan_hakim/delete/' . $row->id) ?>
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