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
                        <label for="nama_terdakwa" class="col-sm-2 control-label">Nama Terdakwa</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_terdakwa" value="<?= ($isEdit) ? $data->nama_terdakwa : '' ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="membaca" class="col-sm-2 control-label">Membaca</label>
                        <div class="col-sm-10">
                            <textarea name="membaca" class="summernote"><?= ($isEdit) ? $data->membaca : '' ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tgl_menetapkan" class="col-sm-2 control-label">Tgl & Waktu</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" name="tgl_menetapkan" value="<?= ($isEdit) ? $data->tgl_menetapkan : '' ?>" required>
                        </div>
                        <div class="col-sm-2">
                            <input type="time" class="form-control" name="wkt_menetapkan" value="<?= ($isEdit) ? $data->wkt_menetapkan : '' ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tgl_ditetapkan" class="col-sm-2 control-label">Tgl Ditetapkan</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" name="tgl_ditetapkan" value="<?= ($isEdit) ? $data->tgl_ditetapkan : '' ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_hakim" class="col-sm-2 control-label">Nama Hakim</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_hakim" value="<?= ($isEdit) ? $data->nama_hakim : '' ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="file_hs" class="col-sm-2 control-label">File Hasil Sidang</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="file_hs" value="<?= ($isEdit) ? $data->file_hs : '' ?>" <?= ($isEdit) ? '' : 'required' ?>>
                            <?php if ($isEdit) : ?>
                                <small class="text-danger">
                                    Jika tidak ingin mengubah file hasil sidang maka harap dikosongkan
                                </small>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <?= button_back('penetapan_hs') ?>
                    <button type="submit" class="btn btn-success pull-right">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('layouts/footer') ?>