<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>Aplikasi Helpdesk</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Favicon-->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert.css" />
    <!-- JQuery DataTable Css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
    <!-- boostrapp select -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap-select/css/bootstrap-select.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/dropify/css/dropify.min.css">
    <!-- Custom Css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.min.css">
</head>

<body class="theme-blush">

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img class="zmdi-hc-spin" src="<?php echo base_url() ?>assets/images/loader.svg"
                    width="48" height="48" alt="Aero"></div>
            <p>Please wait...</p>
        </div>
    </div>

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>

    <!-- Main Search -->
    <div id="search">
        <button id="close" type="button" class="close btn btn-primary btn-icon btn-icon-mini btn-round">x</button>
        <form>
            <input type="search" value="" placeholder="Search..." />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

    <!-- Right Icon menu Sidebar -->
    <div class="navbar-right">

    </div>

    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <div class="navbar-brand">
            <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
            <a href="<?= base_url('Home') ?>"><img src="<?php echo base_url() ?>assets/images/logo.svg" width="25"
                    alt="Aero"><span class="m-l-10">Mashedes</span></a>
        </div>
        <div class="menu">
            <ul class="list">
                <!-- <li>
                    <div class="user-info">`
                        <a class="image" href="profile.html"><img
                                src="<?php echo base_url() ?>assets/images/profile_av.jpg" alt="User"></a>
                        <div class="detail">
                            <h4>Michael</h4>
                            <small>Super Admin</small>
                        </div>
                    </div>
                </li> -->
                <li class="active open"><a href="<?= base_url('Home') ?>"><i
                            class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>

                <li><a href="<?= base_url('Login') ?>"><i class="zmdi zmdi-account"></i><span>Admin</span></a></li>

            </ul>
        </div>
    </aside>

    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs sm">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#setting"><i
                        class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#chat"><i
                        class="zmdi zmdi-comments"></i></a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="setting">
                <div class="slim_scroll">
                    <div class="card">
                        <h6>Theme Option</h6>
                        <div class="light_dark">
                            <div class="radio">
                                <input type="radio" name="radio1" id="lighttheme" value="light" checked="">
                                <label for="lighttheme">Light Mode</label>
                            </div>
                            <div class="radio mb-0">
                                <input type="radio" name="radio1" id="darktheme" value="dark">
                                <label for="darktheme">Dark Mode</label>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <h6>Color Skins</h6>
                        <ul class="choose-skin list-unstyled">
                            <li data-theme="purple">
                                <div class="purple"></div>
                            </li>
                            <li data-theme="blue">
                                <div class="blue"></div>
                            </li>
                            <li data-theme="cyan">
                                <div class="cyan"></div>
                            </li>
                            <li data-theme="green">
                                <div class="green"></div>
                            </li>
                            <li data-theme="orange">
                                <div class="orange"></div>
                            </li>
                            <li data-theme="blush" class="active">
                                <div class="blush"></div>
                            </li>
                        </ul>
                    </div>
                    <div class="card">
                        <h6>General Settings</h6>
                        <ul class="setting-list list-unstyled">
                            <li>
                                <div class="checkbox rtl_support">
                                    <input id="checkbox1" type="checkbox" value="rtl_view">
                                    <label for="checkbox1">RTL Version</label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox ms_bar">
                                    <input id="checkbox2" type="checkbox" value="mini_active">
                                    <label for="checkbox2">Mini Sidebar</label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <input id="checkbox3" type="checkbox" checked="">
                                    <label for="checkbox3">Notifications</label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <input id="checkbox4" type="checkbox">
                                    <label for="checkbox4">Auto Updates</label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <input id="checkbox5" type="checkbox" checked="">
                                    <label for="checkbox5">Offline</label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <input id="checkbox6" type="checkbox" checked="">
                                    <label for="checkbox6">Location Permission</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-pane right_chat" id="chat">
                <div class="slim_scroll">
                    <div class="card">
                        <ul class="list-unstyled">
                            <li class="online">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <img class="media-object "
                                            src="<?php echo base_url() ?>assets/images/xs/avatar4.jpg" alt="">
                                        <div class="media-body">
                                            <span class="name">Sophia <small class="float-right">11:00AM</small></span>
                                            <span class="message">There are many variations of passages of Lorem Ipsum
                                                available</span>
                                            <span class="badge badge-outline status"></span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="online">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <img class="media-object "
                                            src="<?php echo base_url() ?>assets/images/xs/avatar5.jpg" alt="">
                                        <div class="media-body">
                                            <span class="name">Grayson <small class="float-right">11:30AM</small></span>
                                            <span class="message">All the Lorem Ipsum generators on the</span>
                                            <span class="badge badge-outline status"></span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="offline">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <img class="media-object "
                                            src="<?php echo base_url() ?>assets/images/xs/avatar2.jpg" alt="">
                                        <div class="media-body">
                                            <span class="name">Isabella <small
                                                    class="float-right">11:31AM</small></span>
                                            <span class="message">Contrary to popular belief, Lorem Ipsum</span>
                                            <span class="badge badge-outline status"></span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="me">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <img class="media-object "
                                            src="<?php echo base_url() ?>assets/images/xs/avatar1.jpg" alt="">
                                        <div class="media-body">
                                            <span class="name">John <small class="float-right">05:00PM</small></span>
                                            <span class="message">It is a long established fact that a reader</span>
                                            <span class="badge badge-outline status"></span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="online">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <img class="media-object "
                                            src="<?php echo base_url() ?>assets/images/xs/avatar3.jpg" alt="">
                                        <div class="media-body">
                                            <span class="name">Alexander <small
                                                    class="float-right">06:08PM</small></span>
                                            <span class="message">Richard McClintock, a Latin professor</span>
                                            <span class="badge badge-outline status"></span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </aside>
    <!-- Jquery Core Js -->
    <script src="<?php echo base_url() ?>assets/bundles/libscripts.bundle.js"></script>
    <!-- Lib Scripts Plugin Js -->
    <script src="<?php echo base_url() ?>assets/bundles/vendorscripts.bundle.js"></script>
    <!-- Lib Scripts Plugin Js -->
    <script src="<?php echo base_url() ?>assets/plugins/dropify/js/dropify.min.js"></script>

    <!-- <script src="<?php echo base_url() ?>assets/dist/sweetalert2.all.min.js"></script> -->
    <script src="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/pages/ui/sweetalert.js"></script>


    <section class="content">
        <?php echo $contents ?>
    </section>




    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url() ?>assets/bundles/datatablescripts.bundle.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js">
    </script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js">
    </script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>

    <script src="<?php echo base_url() ?>assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
    <script src="<?php echo base_url() ?>assets/js/pages/tables/jquery-datatable.js"></script>
    <script src="<?php echo base_url() ?>assets/js/pages/forms/dropify.js"></script>




</body>

</html>