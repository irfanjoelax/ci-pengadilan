<?php $this->load->view('layouts/header') ?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <form class="form-horizontal" action="<?= $url ?>" method="POST">
                <div class="box-body">
                    <div class="form-group">
                        <label for="fullname_user" class="col-sm-2 control-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="fullname_user" value="<?= ($isEdit) ? $data->fullname_user : '' ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name_user" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="name_user" value="<?= ($isEdit) ? $data->name_user : '' ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name_user" class="col-sm-2 control-label">Level</label>
                        <div class="col-sm-4">
                            <select name="level_user" class="form-control" required>
                                <option value="admin" <?= ($isEdit) ? select_level($data->level_user, 'admin') : '' ?>>
                                    Admin
                                </option>
                                <option value="ketua_pn" <?= ($isEdit) ? select_level($data->level_user, 'ketua_pn') : '' ?>>
                                    Ketua PN
                                </option>
                                <option value="majelis_hakim" <?= ($isEdit) ? select_level($data->level_user, 'majelis_hakim') : '' ?>>
                                    Majelis Hakim
                                </option>
                                <option value="panitera_pengganti" <?= ($isEdit) ? select_level($data->level_user, 'panitera_pengganti') : '' ?>>
                                    Panitera Pengganti
                                </option>
                                <option value="kejaksaan_minahasa" <?= ($isEdit) ? select_level($data->level_user, 'kejaksaan_minahasa') : '' ?>>
                                    Kejaksaan Minahasa
                                </option>
                                <option value="kejaksaan_minahasa_selatan" <?= ($isEdit) ? select_level($data->level_user, 'kejaksaan_minahasa_selatan') : '' ?>>
                                    Kejaksaan Minahasa Selatan
                                </option>
                                <option value="kejaksaan_tomohon" <?= ($isEdit) ? select_level($data->level_user, 'kejaksaan_tomohon') : '' ?>>
                                    Kejaksaan Tomohon
                                </option>
                                <option value="lapas_minahasa" <?= ($isEdit) ? select_level($data->level_user, 'lapas_minahasa') : '' ?>>
                                    Lapas Minahasa
                                </option>
                                <option value="lapas_tomohon" <?= ($isEdit) ? select_level($data->level_user, 'lapas_tomohon') : '' ?>>
                                    Lapas Tomohon
                                </option>
                                <option value="rutan_minahasa_selatan" <?= ($isEdit) ? select_level($data->level_user, 'rutan_minahasa_selatan') : '' ?>>
                                    Rutan Minahasa Selatan
                                </option>
                                <option value="kepolisian_minahasa" <?= ($isEdit) ? select_level($data->level_user, 'kepolisian_minahasa') : '' ?>>
                                    Kepolisian Minahasa
                                </option>
                                <option value="kepolisian_tomohon" <?= ($isEdit) ? select_level($data->level_user, 'kepolisian_tomohon') : '' ?>>
                                    Kepolisian Tomohon
                                </option>
                                <option value="kepolisian_minahasa_tenggara" <?= ($isEdit) ? select_level($data->level_user, 'kepolisian_minahasa_tenggara') : '' ?>>
                                    Kepolisian Minahasa Tenggara
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="pass_user" placeholder="<?= ($isEdit) ? '*****' : 'Password default untuk user baru 123456'  ?>" <?= ($isEdit) ? '' : 'readonly' ?>>
                            <?php if ($isEdit) : ?>
                                <small class="text-danger">
                                    Jika tidak ingin mengubah Password harap kosongkan
                                </small>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <?= button_back('user') ?>
                    <button type="submit" class="btn btn-success pull-right">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('layouts/footer') ?>