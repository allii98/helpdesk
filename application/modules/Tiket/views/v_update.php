<div class="container-fluid">
    <?php foreach ($isi as $d) : ?>
    <div class="row ">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="body">
                    <form action="<?= base_url('Tiket/editpost') ?>" method="POST" enctype="multipart/form-data">
                        <p>No Tiket : <?= $d->id_tiket ?> (<?= $d->tanggal_tiket ?>)</p>
                        <input type="hidden" name="tglmulai" value="<?= $d->tanggal_tiket ?>" id="">
                        <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 m-b-30"> <?php if ($d->foto == 0) { ?>
                                <a href="<?php echo base_url() ?>assets/images/broken.png"> <img
                                        class="img-fluid img-thumbnail"
                                        src="<?php echo base_url() ?>assets/images/broken.png" width="200px" alt="">
                                </a>
                                <?php } else { ?>
                                <a href="<?php echo base_url() ?>assets/uploads/tiket/<?= $d->foto ?>"> <img
                                        class="img-fluid img-thumbnail"
                                        src="<?php echo base_url('assets/uploads/tiket/' . $d->foto) ?>" width="200px"
                                        alt="">
                                </a>
                                <?php } ?>
                                <br>
                                <br>
                                <small class="text-muted">Nama User: </small>
                                <p><?= $d->nama ?></p>
                                <input type="hidden" name="no_tiket" value="<?= $d->id_tiket ?>" id="">
                                <input type="hidden" name="user" value="<?= $d->id_user ?>" id="">
                                <hr>
                                <small class="text-muted">Kondisi/Masalah: </small>
                                <p><?= $d->kondisi ?> </p>
                                <hr>
                                <small class="text-muted">Prioritas: </small>
                                <p><?php if ($d->prioritas == 1) { ?>
                                    Belum diatur
                                    <?php
                                        } else if ($d->prioritas == 2) { ?>
                                    <span class="badge badge-info">Normal</span>
                                    <?php
                                        } else if ($d->prioritas == 3) {
                                        ?>
                                    <span class="badge badge-primary">Utama</span>
                                    <?php
                                        } else if ($d->prioritas == 4) {
                                        ?>
                                    <span class="badge badge-success">Luar biasa</span>
                                    <?php
                                        }
                                        ?>
                                </p>
                                <hr>
                                <small class="text-muted">Tanggal: </small>
                                <div class="form-group">
                                    <p> <input class="form-control" placeholder="Tanggal" onfocus="(this.type='date')"
                                            name="tgl" aria-required="true" autocomplete="off" required> </p>
                                </div>
                                <hr>
                                <small class="text-muted">Nama Petugas: </small>
                                <div class="form-group">
                                    <input type="hidden" name="petugas" id="petugas">
                                    <p> <select name="nama_petugas" id="nama_petugas" class="form-control" required>
                                            <option selected disabled>Pilih Nama</option>
                                            <?php foreach ($petugas as $u) : ?>
                                            <option <?= $u['id_petugas'] == $d->nama_petugas ? "selected" : "" ?>
                                                value="<?= $u['nama_petugas'] ?>"><?= $u['nama_petugas'] ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select></p>
                                </div>
                                <small class="text-muted">Category : </small>
                                <div class="form-group">
                                    <input type="hidden" name="" value="<?= $d->kategori ?>" id="">
                                    <?php $jenis = $this->input->post('jenis') ? $this->input->post('jenis') : $d->kategori ?>
                                    <p> <select name="jenis" id="kat" class="form-control" required>
                                            <option value="1">Assets</option>
                                            <option value="2" <?= $jenis == 2 ? 'selected' : null  ?>>Non Assets
                                            </option>
                                        </select> </p>
                                </div>
                                <hr>
                                <small class="text-muted">Category Assets: </small>
                                <div class="form-group">
                                    <input type="hidden" name="" value="<?= $d->id_kat ?>" id="">
                                    <p> <select name="kat" id="kategori" class="selectpicker">
                                            <option selected disabled>Pilih Category</option>
                                            <?php foreach ($kat as $u) : ?>
                                            <option <?= $u['id_qty'] == $d->id_kat ? "selected" : "" ?>
                                                value="<?= $u['id_qty'] ?>"><?= $u['category'] ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <button class="btn btn-raised btn-danger waves-effect" type="button"
                                            id="resetForm">Reset</button>
                                    </p>
                                </div>
                                <hr>
                                <small class="text-muted">Asset: </small>
                                <div class="form-group">
                                    <input type="hidden" name="merk" value="<?= $d->kat_aset ?>" id="id_aset">
                                    <p><input type="text" class="form-control" name="aset" id="isi_aset"
                                            autocomplete="off" value="<?= $d->kat_aset ?>" readonly></p>
                                </div>
                                <hr>

                            </div>

                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 m-b-30">

                                <small class="text-muted">Category non assets: </small>
                                <div class="form-group">
                                    <input type="hidden" name="" value="<?= $d->id_kat_non ?>" id="">
                                    <p> <select name="kat_non" id="kat-non" class="selectpicker ">
                                            <option selected disabled>Pilih Category</option>
                                            <?php foreach ($kategori as $u) : ?>
                                            <option <?= $u['id_kategori'] == $d->id_kat_non ? "selected" : "" ?>
                                                value="<?= $u['id_kategori'] ?>"><?= $u['nama_kategori'] ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <button id="reset" class="btn btn-raised btn-danger waves-effect"
                                            type="button">Reset</button>
                                    </p>
                                </div>
                                <hr>
                                <small class="text-muted">Non Asset: </small>
                                <div class="form-group">
                                    <input type="hidden" name="id_non" id="id_non_aset" value="<?= $d->id_aset ?>">
                                    <p><input type="text" class="form-control" name="non" value="<?= $d->nama_aset ?>"
                                            id="isi_non_aset" autocomplete="off" readonly></p>
                                </div>
                                <hr>

                                <small class="text-muted">Tindakan: </small>
                                <div class="form-group">
                                    <input type="hidden" name="id_tiket_tindakan" value="<?= $d->id_tiket ?>" id="">
                                    <p>
                                        <?php $tindakan = $this->input->post('tindakan') ? $this->input->post('tindakan') :  $d->tindakan ?>
                                        <select name="tindakan" id="tindakan" class="selectpicker form-control"
                                            required>
                                            <!-- <option selected disabled>Pilih Tindakan</option> -->
                                            <option value="1" <?= $tindakan == 1 ? 'selected' : null  ?>>Telp</option>
                                            <option value="2" <?= $tindakan == 2 ? 'selected' : null  ?>>Chat WA
                                            </option>
                                            <option value="3" <?= $tindakan == 3 ? 'selected' : null  ?>>Ke TKP</option>
                                        </select>
                                    </p>
                                </div>
                                <hr>
                                <small class="text-muted">Solusi: </small>
                                <div class="form-group">
                                    <p>
                                        <select name="solusi" id="solusi" class="selectpicker form-control" required>
                                            <?php $solusi = $this->input->post('solusi') ? $this->input->post('solusi') :  $d->solusi ?>
                                            <option value="2" <?= $solusi == 2 ? 'selected' : null  ?>>Progress</span>
                                            </option>
                                            <option value="4" <?= $solusi == 4 ? 'selected' : null  ?>>Butuh
                                                bantuan</span>
                                            </option>
                                            <option value="3" <?= $solusi == 3 ? 'selected' : null  ?>>Selesai</span>
                                            </option>
                                        </select>
                                    </p>
                                </div>
                                <hr>
                                <small class="text-muted">Petugas Bantuan (isi jika butuh bantuan): </small>
                                <div class="form-group">
                                    <input type="hidden" name="p" id="isi_petugas">
                                    <p><select name="bantuan" id="bantuan" class="selectpicker form-control">
                                            <option selected disabled>Pilih Nama</option>
                                            <?php foreach ($petugas as $u) : ?>
                                            <option <?= $u['id_petugas'] == $d->petugas_bantuan ? "selected" : "" ?>
                                                value="<?= $u['id_petugas'] ?>"><?= $u['nama_petugas'] ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </p>


                                </div>
                                <hr>
                                <small class="text-muted">Catatan Solusi: </small>
                                <div class="form-group">
                                    <p> <input type="text" class="form-control" name="catatan"
                                            value="<?= $d->catatan ?>" autocomplete="off" required> </p>
                                </div>
                                <hr>
                                <small class="text-muted">Penyebab Kerusakkan: </small>
                                <div class="form-group">
                                    <p> <select name="faktor" id="faktor" class="selectpicker form-control">
                                            <option selected disabled>Pilih Kerusakkan</option>
                                            <option value="1">Human error</span>
                                            </option>
                                            <option value="2">Faktor listrik</span>
                                            </option>
                                            <option value="3">Petir</span>
                                            </option>
                                            <option value="4">Expired</span>
                                            </option>
                                            <option value="5">Lainnya</span>
                                            </option>
                                        </select> </p>
                                </div>
                                <hr>
                                <small class="text-muted">Foto: </small>
                                <div class="form-group">
                                    <input type="hidden" name="old" value="<?= $d->foto_hasil ?>" id="">
                                    <p> <input type="file" class="dropify" name="img"> </p>
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

<div class="container-fluid">
    <!-- modal tambah -->
    <div class="modal fade " id="modal-aset" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" id="modal-isi" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="title">Data Assets</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">

                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table id="aset"
                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">No</th>
                                            <th style="text-align: center;">Nama Asset</th>
                                            <th style="text-align: center;">Lokasi</th>
                                            <th style="text-align: center;">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade " id="modal-non-aset" tabindex="-1" data-backdrop="static" data-keyboard="false"
        role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" id="modal-isi" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="title">Data Non Assets</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">

                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table id="nonaset"
                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">No</th>
                                            <!-- <th style="text-align: center;">ID</th> -->
                                            <th style="text-align: center;">Nama Asset</th>
                                            <th style="text-align: center;">#</th>

                                        </tr>
                                    </thead>

                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<script>
$('#resetForm').on("click", function() {
    $("#kategori").val('default');
    $("#isi_aset").val("");
    $("#kategori").selectpicker("refresh");
});

$('#reset').on("click", function() {
    $("#kat-non").val('default');
    $("#isi_non_aset").val("");
    $("#kat-non").selectpicker("refresh");
});


$('#kat').change(function() {
    var kat = this.value;
    if (kat == 1) {
        $('#kategori').prop("disabled", false);
        $('#kat-non').prop("disabled", true);
        $('#kategori').selectpicker('refresh');

    } else if (kat == 2) {
        $('#kategori').prop("disabled", true);
        $('#kat-non').prop("disabled", false);
        $('#kat-non').selectpicker('refresh');
    }
});
$('#bantuan').change(function() {
    $.ajax({
        type: 'post',
        url: '<?= site_url('Tiket/getisipetugas'); ?>',
        data: {
            id: this.value
        },
        success: function(response) {

            data = JSON.parse(response);
            $.each(data, function(index, value) {
                var opsi = value.nama_petugas;
                $('#isi_petugas').val(opsi);
            });

        },
        error: function(request) {
            console.log(request.responseText);
        }
    });
});



$('#nama_petugas').change(function() {
    $.ajax({
        type: 'post',
        url: '<?= site_url('Tiket/getisipetugas'); ?>',
        data: {
            id: this.value
        },
        success: function(response) {

            data = JSON.parse(response);
            $.each(data, function(index, value) {
                var opsi = value.nama_petugas;
                $('#petugas').val(opsi);
            });

        },
        error: function(request) {
            console.log(request.responseText);
        }
    });
});

$('#kategori').change(function() {

    var table = $('#aset').DataTable();

    table
        .clear()
        .draw();
    $.ajax({
        type: 'post',
        url: '<?= site_url('Tiket/getisiaset'); ?>',
        data: {
            id: this.value
        },
        success: function(response) {
            $("#modal-aset").modal();
            data = JSON.parse(response);
            for (i = 0; i < data.length; i++) {
                // console.log(data[i]);

                $('#aset').DataTable().row.add([
                    i + 1,
                    // data[i].id_assets,
                    data[i].merk,
                    data[i].lokasi,

                    `
                            <button type="button" class="btn btn-success" style="margin:2px;" title="Pilih" id="pilih" data-id_assets="${data[i].id_assets}" data-merk="${data[i].merk}" ><i class="zmdi zmdi-check"></i>  Pilih</button>
                            `
                ]).draw(false);

            }

        },
        error: function(request) {
            console.log(request.responseText);
        }
    });
});

$(document).ready(function() {
    $(document).on('click', '#pilih', function() {
        var id = $(this).data('id_assets');
        // console.log(id);
        var merk = $(this).data('merk');
        $('#id_aset').val(id);
        $('#isi_aset').val(merk);
        $("#modal-aset").modal('hide');
    });
});

$('#kat-non').change(function() {
    var table = $('#nonaset').DataTable();

    table
        .clear()
        .draw();
    $.ajax({
        type: 'post',
        url: '<?= site_url('Tiket/getisinonaset'); ?>',
        data: {
            id: this.value
        },
        success: function(response) {
            $("#modal-non-aset").modal();
            data = JSON.parse(response);
            for (i = 0; i < data.length; i++) {
                // console.log(data[i]);

                $('#nonaset').DataTable().row.add([
                    i + 1,
                    // data[i].id_assets,
                    data[i].nama_aset,

                    `
                            <button type="button" class="btn btn-success" style="margin:2px;" title="Pilih" id="klik" data-id_aset="${data[i].id_aset}" data-nama_aset="${data[i].nama_aset}" ><i class="zmdi zmdi-check"></i>  Pilih</button>
                            `
                ]).draw(false);

            }

        },
        error: function(request) {
            console.log(request.responseText);
        }
    });
});

$(document).ready(function() {
    $(document).on('click', '#klik', function() {
        var id = $(this).data('id_aset');
        // console.log(id);
        var merk = $(this).data('nama_aset');
        $('#id_non_aset').val(id);
        $('#isi_non_aset').val(merk);
        $("#modal-non-aset").modal('hide');
    });
});
</script>