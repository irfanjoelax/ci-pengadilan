<?php $this->load->view('layouts/header') ?>
<div class="row">
    <div class="col-xs-12">

        <div class="box box-success">
            <div class="box-header text-right">
                <a href="<?= site_url('user/create') ?>" class="btn btn-success mb-3">
                    Tambah Data
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped datatables">
                    <thead>
                        <tr>
                            <th class="text-center" width="5%">No. </th>
                            <th class="text-left" width="37%">Nama Lengkap</th>
                            <th class="text-left" width="23%">Username</th>
                            <th class="text-center" width="20%">Level</th>
                            <th class="text-center" width="15%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $row) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-left"><?= $row->fullname_user ?></td>
                                <td class="text-left"><?= $row->name_user ?></td>
                                <td class="text-center">
                                    <span class="label label-default">
                                        <?= strtoupper(str_replace('_', ' ', $row->level_user)) ?>
                                    </span>
                                </td>
                                <td class=" text-center">
                                    <a href="<?= site_url('user/edit/' . $row->id_user) ?>" class="btn btn-warning btn-xs">
                                        Edit
                                    </a>
                                    <a onclick="return confirm(`Apakah yakin ingin menghapus data berikut ini?`)" href="<?= site_url('user/delete/' . $row->id_user) ?>" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
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