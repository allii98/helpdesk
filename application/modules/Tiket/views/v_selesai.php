<div class="body_scroll">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2><?= $tittle; ?></h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('Admin') ?>"><i class="zmdi zmdi-home"></i>
                            Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);"><?= $tittle; ?></a></li>
                </ul>
                <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                        class="zmdi zmdi-sort-amount-desc"></i></button>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                        class="zmdi zmdi-arrow-right"></i></button>
            </div>
        </div>
    </div>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
    <div class="container-fluid">

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">

                    </div>
                    <div class="body">

                        <div class="table-responsive">
                            <table id="tiket1"
                                class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Tiket</th>
                                        <th>Tanggal</th>
                                        <th>Nama</th>
                                        <th>Kondisi/Masalah</th>
                                        <th>Solusi</th>
                                        <th>Prioritas</th>
                                        <th width="250px">#</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1;
                                    if (isset($selesai)) {
                                        foreach ($selesai as $d) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $d['id_tiket'] ?></td>
                                        <td><?= $d['tanggal_tiket'] ?></td>
                                        <td><?= $d['nama'] ?></td>
                                        <td><?= $d['kondisi'] ?></td>
                                        <td>
                                            <?php if ($d['solusi'] == 1) { ?>
                                            <span class="badge badge-warning">Waiting</span>
                                            <?php
                                                    } else if ($d['solusi'] == 2) { ?>
                                            <span class="badge badge-info">Progress</span>
                                            <?php
                                                    } else if ($d['solusi'] == 3) {
                                                    ?>
                                            <span class="badge badge-success">Selesai</span>
                                            <?php
                                                    }
                                                    ?>
                                        </td>
                                        <td>
                                            <?php if ($d['prioritas'] == 1) { ?>
                                            <span class="badge badge-warning">Pending</span>
                                            <?php
                                                    } else if ($d['prioritas'] == 2) { ?>
                                            <span class="badge badge-info">Normal</span>
                                            <?php
                                                    } else if ($d['prioritas'] == 3) {
                                                    ?>
                                            <span class="badge badge-primary">Utama</span>
                                            <?php
                                                    } else if ($d['prioritas'] == 4) {
                                                    ?>
                                            <span class="badge badge-success">Selesai</span>
                                            <?php
                                                    }
                                                    ?>
                                        </td>

                                        <td style="text-align: center;">
                                            <a href="<?php echo base_url('Tiket/detail/' . $d['id_tiket']) ?>"
                                                class="btn btn-primary btn-icon btn-icon-mini btn-round" title="Detail">
                                                <i class="zmdi zmdi-search"></i>
                                            </a>
                                            <a href="<?php echo base_url('Tiket/approve/' . $d['id_tiket']) ?>"
                                                class="btn btn-success btn-icon btn-icon-mini btn-round"
                                                title="Approve">
                                                <i class="zmdi zmdi-check"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php }
                                    } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>

<script type="text/javascript">
const flashData = $('.flash-data').data('flashdata');
// console.log(flashData);

if (flashData) {

    swal(
        "Success!",
        "Tiket " + flashData + "diproses",
        "success",
    );

}
</script>