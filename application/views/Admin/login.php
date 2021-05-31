<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Pemilihan Osis</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/app.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/pages/auth.css">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <!--<div class="auth-logo">-->
                        <a href="#"><img src="<?=base_url()?>/assets/images/logo/logo.png" alt="Logo"></a>
                    <!--</div>-->
                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-5"></p>

                    <?php if ($this->session->flashdata('err')): ?>
                      <div class="alert alert-light-danger color-danger">
                        <i class="bi bi-exclamation-circle"></i>
                        <?= $this->session->flashdata('err') ?> 
                    </div>
                <?php endif ?>

                <form action="<?= base_url('Auth/cekLogin')?>" method="post">
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" name="kode_admin" class="form-control form-control-xl" placeholder="kode admin">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" name="password" class="form-control form-control-xl" placeholder="Password">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                </form>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">
            </div>
        </div>
    </div>
</div>
</body>
</html>