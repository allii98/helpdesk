<div class="container-fluid">
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">


                <div class="body">
                    <form action="<?= base_url('Laporan/filter') ?>" method="GET">
                        <div class="row clearfix">

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <!-- <input type="hidden" name="tgl" id="tgl" value="" /> -->
                                    <input class="form-control" placeholder="Tanggal" onfocus="(this.type='date')"
                                        name="tanggal" aria-required="true" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <select name="nama" id="nama" class="selectpicker form-control"
                                        data-live-search="true" required>
                                        <option selected disabled>Pilih Nama User</option>
                                        <?php foreach ($user as $u) : ?>
                                        <option value="<?= $u['id_user'] ?>"><?= $u['nama'] ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <select name="kategori" id="kategori" class="form-control" required>
                                        <option value="0" selected readonly>Pilih Category </option>
                                        <option value="1">Assets</option>
                                        <option value="2">Non Assets</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <select name="solusi" id="solusi" class="form-control" required>
                                        <option value="1" selected readonly>Pilih Solusi</option>
                                        <option value="1">Waiting</option>
                                        <option value="2">Progress</option>
                                        <option value="4">Butuh Bantuan</option>
                                        <option value="3">Selesai</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary">filter</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





</div>

<div class="container-fluid">
    <div class="row clearfix">


        <div class="col-lg-12">
            <div class="card">
                <div class="body">
                    <div class="table-responsive">
                        <table id="tiket1"
                            class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Tiket</th>
                                    <th>Tanggal</th>
                                    <th>Nama Users</th>
                                    <th>Category</th>
                                    <th>Kondisi/Masalah</th>
                                    <th>Solusi</th>
                                    <th>Prioritas</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1;
                                if (isset($tiket)) {
                                    foreach ($tiket as $d) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $d['id_tiket'] ?></td>
                                    <td><?= $d['tanggal_tiket'] ?></td>
                                    <td><?= $d['nama'] ?></td>
                                    <td>
                                        <?php if ($d['kategori'] == 1) { ?>
                                        <p>Assets</p>
                                        <?php } else if ($d['kategori'] == 2) { ?>
                                        <p>Non Assets</p>
                                        <?php } ?>
                                    </td>
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
                                                } else if ($d['solusi'] == 4) { ?>
                                        <span class="badge badge-danger">Butuh bantuan</span>
                                        <?php } ?>

                                    </td>
                                    <td style="text-align: center;">
                                        <?php if ($d['prioritas'] == 1) { ?>
                                        <p>Belum diatur</p>
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
                                        <span class="badge badge-success">Luar Biasa</span>
                                        <?php
                                                }
                                                ?>
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

<script>
// daterangepicker
$(document).ready(function() {
    $('#tanggal').daterangepicker()
});

$("#tanggal").on("change paste keyup", function() {
    // $("#pos-sale-form input[name='tgl']").val($(this).val());
    var ab = this.value;
    console.log(ab);
    $("input[name=\"tgl\"]").val(ab);
});
</script>