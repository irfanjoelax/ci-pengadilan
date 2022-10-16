<?php $this->load->view('layouts/header') ?>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <form class="form-horizontal" action="<?= site_url('profile/update/' . $this->session->userdata('id_user')) ?>" method="POST">
                <div class="box-body">
                    <div class="form-group">
                        <label for="fullname_user" class="col-sm-2 control-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="fullname_user" value="<?= $this->session->userdata('fullname_user') ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name_user" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="name_user" value="<?= $this->session->userdata('name_user') ?>" required>
                        </div>
                    </div>
                    <div class=" form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="pass_user" placeholder="***">
                            <small class="text-danger">
                                Jika tidak ingin mengubah Password harap dikosongkan
                            </small>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success pull-right">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('layouts/footer') ?>