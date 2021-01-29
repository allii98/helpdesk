<div class="container-fluid">
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">


                <div class="body">
                    <form action="<?= base_url('Laporan/filterKat') ?>" method="GET">
                        <div class="row clearfix">

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input placeholder="Tanggal" onfocus="(this.type='date')" class="form-control"
                                        name="tanggal" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <select name="kategori" id="kategori" class="form-control" required>
                                        <option value="0" selected readonly>Pilih Category </option>
                                        <option value="1">Assets</option>
                                        <option value="2">Non Assets</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
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
                                    <th>Tanggal</th>

                                    <th>Category</th>
                                    <th>Kondisi/Masalah</th>
                                    <th>Solusi</th>
                                    <th>Catatan solusi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1;
                                if (isset($kat)) {
                                    foreach ($kat as $d) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $d['tanggal_tiket'] ?></td>
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

                                    <td><?= $d['catatan'] ?></td>


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