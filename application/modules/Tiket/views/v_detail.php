<div class="container-fluid">
    <?php foreach ($isi as $d) : ?>
    <div class="row ">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="body">
                    <p><?= $d->tanggal_tiket ?></p>
                    <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                        <div class="col-xl-4 col-lg-8 col-md-6 col-sm-12 m-b-30"> <?php if ($d->foto == 0) { ?>
                            <a href="<?php echo base_url() ?>assets/images/broken.png"> <img
                                    class="img-fluid img-thumbnail"
                                    src="<?php echo base_url() ?>assets/images/broken.png" width="250px" alt="">
                            </a>
                            <?php } else { ?>
                            <a href="<?php echo base_url() ?>assets/uploads/tiket/<?= $d->foto ?>"> <img
                                    class="img-fluid img-thumbnail"
                                    src="<?php echo base_url('assets/uploads/tiket/' . $d->foto) ?>" width="250px"
                                    alt="">
                            </a>
                            <?php } ?>

                        </div>
                        <div class="col-xl-6 col-lg-8 col-md-6 col-sm-12 m-b-30">
                            <small class="text-muted">No Tiket : </small>
                            <p><?= $d->id_tiket ?></p>
                            <hr>
                            <small class="text-muted">Nama User: </small>
                            <p><?= $d->nama ?></p>
                            <hr>
                            <small class="text-muted">Kondisi/Masalah: </small>
                            <p><?= $d->kondisi ?></p>
                            <hr>
                        </div>

                    </div>

                    <!-- <div class="col-sm-8">


                            <small class="text-muted">Kategori: </small>
                            <p><?= $d->category ?></p>
                            <?php if ($d->category == 0) { ?>
                            <p>Belum diatur</p>
                            <?php } ?>
                            <hr>


                        </div> -->
                </div>
            </div>
        </div>

    </div>
</div>
<?php endforeach; ?>


<div class="container-fluid">


    <div class="row clearfix">
        <div class="col-md-12 col-lg-6">
            <div class="card">
                <div class="header">
                    <h2><strong>System Tracking</strong></h2>

                </div>
                <div class="body">
                    <?php $no = 1;
                    foreach ($tracking as $t) { ?>
                    <ul class="list-unstyled activity">
                        <li class="a_code">
                            <h4><?= $t['status'] ?></h4>

                            <p><?php if ($t['filefoto'] == null) { ?>
                            <p></p>
                            <?php } else { ?>
                            <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                                <div class="col-xl-4 col-lg-8 col-md-6 col-sm-12 m-b-30">
                                    <a target="_blank"
                                        href="<?php echo base_url() ?>assets/uploads/tiket/<?= $t['filefoto'] ?>"> <img
                                            class="img-fluid img-thumbnail"
                                            src="<?php echo base_url('assets/uploads/tiket/' . $t['filefoto']) ?>"
                                            width="100px" alt="">
                                    </a>
                                </div>
                            </div>

                            <?php } ?>
                            </p>
                            <p><?= $t['deskripsi'] ?></p>

                            <small>By: <?= $t['nama'] ?> (<?= $t['tanggal'] ?>)</small>
                        </li>


                    </ul>
                    <?php $no++;
                    } ?>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6">
            <?php foreach ($isi as $p) : ?>
            <div class="card">
                <div class="header">
                    <h2><strong>Processed By</strong></h2>

                </div>
                <div class="body">
                    <small class="text-muted">Tanggal Diproses: </small>
                    <?php if ($p->date_acc == 0) { ?>
                    <p>-</p>
                    <?php } else { ?>

                    <p><?= date_format(date_create($p->date_acc), 'd-m-Y  H:i:s') ?></p>
                    <?php } ?>
                    <hr>

                    <small class="text-muted">Tanggal Selesai: </small>
                    <?php if ($p->date_done == 0) { ?>
                    <p>-</p>
                    <?php } else { ?>

                    <p><?= date_format(date_create($p->date_done), 'd-m-Y  H:i:s') ?></p>
                    <?php } ?>
                    <hr>
                    <div class="progress-container progress-primary">
                        <span class="progress-badge">In Progress</span>
                        <div class="progress">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60"
                                aria-valuemin="0" aria-valuemax="100" style="width: <?= $p->progres ?>%;">
                                <span class="progress-value"><?= $p->progres ?>%</span>
                            </div>
                        </div>
                    </div>

                    <hr>

                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>