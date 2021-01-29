<div class="container-fluid">
    <?php foreach ($isi as $d) : ?>
    <div class="row ">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="body">
                    <form action="<?= base_url('Tiket/apply') ?>" method="POST">
                        <p><?= $d->tanggal_tiket ?></p>
                        <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                            <div class="col-xl-5 col-lg-8 col-md-6 col-sm-12 m-b-30"> <?php if ($d->foto == 0) { ?>
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
                                <input type="hidden" name="no_tiket" value="<?= $d->id_tiket ?>" id="">
                                <hr>
                                <small class="text-muted">Nama User: </small>
                                <p><?= $d->nama ?></p>
                                <input type="hidden" name="user" value="<?= $d->id_user ?>" id="">
                                <hr>
                                <small class="text-muted">Kondisi/Masalah: </small>
                                <p><?= $d->kondisi ?> </p>
                                <!-- <input type="hidden" name="kondisi" value="<?= $d->kondisi ?>" id=""> -->
                                <hr>
                                <small class="text-muted">Prioritas: </small>
                                <div class="form-group">
                                    <p> <select name="prioritas" id="prioritas" class="form-control" required>
                                            <option selected disabled>Pilih Prioritas</option>
                                            <option value="2">Normal</option>
                                            <option value="3">Utama</option>
                                            <option value="4">Luar Biasa</option>
                                        </select></p>
                                </div>
                                <hr>
                                <small class="text-muted">Nama: </small>
                                <div class="form-group">
                                    <p> <input type="text" class="form-control" name="nama_acc" placeholder="Nama"
                                            autocomplete="off" required> </p>
                                </div>
                                <hr>
                                <button class="btn btn-raised btn-primary waves-effect" type="submit">Kirim</button>
                                <button class="btn btn-raised btn-danger waves-effect" type="button"
                                    onclick="window.location='<?php echo base_url('Tiket') ?>'">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>