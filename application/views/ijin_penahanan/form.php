<?php $this->load->view('layouts/header') ?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <form class="form-horizontal" action="<?= $url ?>" method="POST" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label for="no_perkara" class="col-sm-2 control-label">No. Perkara</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="no_perkara" value="<?= ($isEdit) ? $data->no_perkara : $nomor ?>" required>
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
                    $membaca = 'Membaca surat permohonan perpanjangan masa tahanan dari Penyidik                          RESOR MINAHASA Nomor : ………  tanggal   ……… atas nama Tersangka:';
                    ?>
                    <div class="form-group">
                        <label for="membaca" class="col-sm-2 control-label">Membaca</label>
                        <div class="col-sm-10">
                            <textarea name="membaca" class="summernote"><?= ($isEdit) ? $data->membaca : $membaca ?></textarea>
                        </div>
                    </div>
                    <?php
                    $menimbang = 'Tersangka ditahan dalam tahanan Rutan masing-masing oleh:
1.	Penyidik sejak tanggal ……… sampai dengan  tanggal ………; 
2.	Perpanjangan Penuntut Umum sejak ……………… sampai dengan  tanggal ………;


Menimbang, bahwa Tersangka telah disangka melakukan tindak pidana sebagaimana diatur dalam Pasal ………...

Menimbang, bahwa untuk kepentingan penyidikan perlu memperpanjang masa tahanan Tersangka tersebut di atas;

Memperhatikan ………   tentang Hukum Acara Pidana;
';
                    ?>
                    <div class="form-group">
                        <label for="menimbang" class="col-sm-2 control-label">Menimbang</label>
                        <div class="col-sm-10">
                            <textarea name="menimbang" class="summernote"><?= ($isEdit) ? $data->menimbang : $menimbang ?></textarea>
                        </div>
                    </div>
                    <?php
                    $menetapkan = '1.	Memperpanjang masa tahanan Tersangka ………dalam tahanan ……… paling lama ………, dihitung sejak tanggal  ……… s/d tanggal ………;

2.	Memerintahkan agar salinan penetapan ini segera disampaikan kepada Tersangka dan keluarganya.
';
                    ?>
                    <div class="form-group">
                        <label for="menetapkan" class="col-sm-2 control-label">Menetapkan</label>
                        <div class="col-sm-10">
                            <textarea name="menetapkan" class="summernote"><?= ($isEdit) ? $data->menetapkan : $menetapkan ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tgl_ditetapkan" class="col-sm-2 control-label">Tgl Ditetapkan</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" name="tgl_ditetapkan" value="<?= ($isEdit) ? $data->tgl_ditetapkan : '' ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_ketua" class="col-sm-2 control-label">Nama Wakil Ketua</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_ketua" value="<?= ($isEdit) ? $data->nama_ketua : '' ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nip" class="col-sm-2 control-label">NIP Wakil Ketua</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="nip" value="<?= ($isEdit) ? $data->nip : '' ?>" required>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <?= button_back('ijin_penahanan') ?>
                    <button type="submit" class="btn btn-success pull-right">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('layouts/footer') ?>