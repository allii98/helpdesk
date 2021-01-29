<div class="container-fluid">
    <div class="row clearfix">


        <div class="col-md-8 col-lg-12">
            <div class="card">
                <!-- <div class="header">
                    <h2><strong>Kerusakkan berdasarkan category</strong></h2>

                </div> -->
                <div class="body">
                    <div class="table-responsive">
                        <!-- <form id="tracking"> -->
                        <table id="masalah"
                            class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kondisi/Masalah</th>
                                    <th>Category</th>
                                    <th>Solusi</th>
                                    <th>Petugas</th>
                                    <th>Foto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                if (isset($tiket)) {
                                    foreach ($tiket as $d) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $d['kondisi'] ?></td>
                                    <td>
                                        <?php if ($d['category'] == null) { ?>
                                        <?= $d['nama_kategori'] ?>
                                        <?php } else if ($d['nama_kategori'] == null) { ?>
                                        <?= $d['category'] ?>
                                        <?php } ?>
                                    </td>
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
                                    <td><?= $d['nama_petugas'] ?></td>


                                    <td style="text-align:center"><?php if ($d['filefoto'] != null) { ?>
                                        <img src="<?php echo base_url('assets/uploads/tiket/' . $d['filefoto']) ?>"
                                            width="60px">
                                        <?php } else { ?>
                                        <p>Tidak ada foto</p>
                                        <?php } ?>
                                    </td>


                                </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                        <!-- </form> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-lg-6">
            <div class="card">

            </div>
        </div>

    </div>
</div>