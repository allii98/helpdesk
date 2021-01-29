<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title><?= $tittle; ?></title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.min.css">
</head>

<body class="theme-blush">

    <div class="authentication">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <form class="card auth_form" action="<?= base_url('Login/proses') ?>" method="POST">
                        <div class="header">
                            <img class="logo" src="<?php echo base_url() ?>assets/images/logo.svg" alt="">
                            <h5>Log in</h5>
                            <p><?php echo $this->session->flashdata('pesan'); ?></p>
                        </div>
                        <div class="body">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="username" placeholder="Username"
                                    autocomplete="off" autofocus>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" name="pass" placeholder="Password">
                                <div class="input-group-append">
                                    <span class="input-group-text"><a href="#" class="forgot" title="Forgot Password"><i
                                                class="zmdi zmdi-lock"></i></a></span>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">SIGN
                                IN</button>

                        </div>
                    </form>
                    <div class="copyright text-center">

                        <span>MIS@2021&nbsp;<a href="http://msalgroup.com/homepage/about.html" target="_blank">MSAL
                                GROUP</a></span>
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12">
                    <div class="card">
                        <img src="<?php echo base_url() ?>assets/images/signin.svg" alt="Sign In" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url() ?>assets/bundles/libscripts.bundle.js"></script>
    <script src="<?php echo base_url() ?>assets/bundles/vendorscripts.bundle.js"></script>
    <!-- Lib Scripts Plugin Js -->
</body>

</html>