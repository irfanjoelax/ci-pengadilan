<?php $this->load->view('layouts/header') ?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <form class="form-horizontal" action="<?= $url ?>" method="POST" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label for="no_perkara" class="col-sm-2 control-label">No. Perkara</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="no_perkara" value="<?= ($isEdit) ? $data->no_perkara : '' ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="col-sm-2 control-label">Nama Terdakwa</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" value="<?= ($isEdit) ? $data->nama : '' ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir" class="col-sm-2 control-label">Tempat Lahir</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="tempat_lahir" value="<?= ($isEdit) ? $data->tempat_lahir : '' ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Umur & Tgl Lahir</label>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="umur" value="<?= ($isEdit) ? $data->umur : '' ?>" placeholder="0" required>
                        </div>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" name="tgl_lahir" value="<?= ($isEdit) ? $data->tgl_lahir : '' ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kelamin" class="col-sm-2 control-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <label class="radio-inline">
                                <input type="radio" name="kelamin" id="inlineRadio1" value="Laki-Laki" <?= ($isEdit) ? is_checked($data->kelamin, 'Laki-Laki') : '' ?>> Laki-Laki
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="kelamin" id="inlineRadio2" value="Perempuan" <?= ($isEdit) ? is_checked($data->kelamin, 'Perempuan') : '' ?>> Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kebangsaan" class="col-sm-2 control-label">Kebangsaan</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="kebangsaan" value="<?= ($isEdit) ? $data->kebangsaan : 'Indonesia' ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tempat_tinggal" class="col-sm-2 control-label">Tempat Tinggal</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tempat_tinggal" value="<?= ($isEdit) ? $data->tempat_tinggal : '' ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="agama" class="col-sm-2 control-label">Agama</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="agama" value="<?= ($isEdit) ? $data->agama : '' ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan" class="col-sm-2 control-label">Pekerjaan</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="pekerjaan" value="<?= ($isEdit) ? $data->pekerjaan : '' ?>" required>
                        </div>
                    </div>
                    <?php
                    $membaca = '1. Penyidik tidak dilakukan Penahanan  ';
                    ?>
                    <div class="form-group">
                        <label for="membaca" class="col-sm-2 control-label">Membaca</label>
                        <div class="col-sm-10">
                            <textarea name="membaca" class="summernote"><?= ($isEdit) ? $data->membaca : $membaca ?></textarea>
                        </div>
                    </div>
                    <?php
                    $mengingat = 'mengingat, bahwa terdakwa telah didakwa melakukan tindak pidana sebagaimana diatur dalam Pasal ';
                    ?>
                    <div class="form-group">
                        <label for="mengingat" class="col-sm-2 control-label">Mengingat</label>
                        <div class="col-sm-10">
                            <textarea name="mengingat" class="summernote"><?= ($isEdit) ? $data->mengingat : $mengingat ?></textarea>
                        </div>
                    </div>
                    <?php
                    $mengadili = 'mengingat, bahwa terdakwa telah didakwa melakukan tindak pidana sebagaimana diatur dalam Pasal ';
                    ?>
                    <div class="form-group">
                        <label for="mengadili" class="col-sm-2 control-label">mengadili</label>
                        <div class="col-sm-10">
                            <textarea name="mengadili" class="summernote"><?= ($isEdit) ? $data->mengadili : '' ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tgl_ditetapkan" class="col-sm-2 control-label">Tgl Ditetapkan</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" name="tgl_ditetapkan" value="<?= ($isEdit) ? $data->tgl_ditetapkan : '' ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="hakim_ketua" class="col-sm-2 control-label">Hakim Ketua</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="hakim_ketua" value="<?= ($isEdit) ? $data->hakim_ketua : '' ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="hakim_satu" class="col-sm-2 control-label">Hakim Anggota (1)</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="hakim_satu" value="<?= ($isEdit) ? $data->hakim_satu : '' ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="hakim_dua" class="col-sm-2 control-label">Hakim Anggota (2)</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="hakim_dua" value="<?= ($isEdit) ? $data->hakim_dua : '' ?>" required>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <?= button_back('petikan_putusan') ?>
                    <button type="submit" class="btn btn-success pull-right">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('layouts/footer') ?>