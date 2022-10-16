<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?= APP_TITLE ?></title>
    <link rel="shortcut icon" href="<?= base_url(LOGO_URL) ?>" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="<?= base_url() ?>asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>asset/css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>asset/css/AdminLTE.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <img src="<?= base_url(LOGO_URL) ?>" width="100">
            <br>
            <strong><?= APP_TITLE_SHORT ?></strong>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg"><?= APP_TITLE ?></p>
            <form action="<?= site_url('auth/login') ?>" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Username" name="name_user" autofocus>
                    <i class="fa fa-user form-control-feedback"></i>
                </div>
                <div class=" form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="pass_user">
                    <i class="fa fa-lock form-control-feedback"></i>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-success btn-block btn-flat">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>