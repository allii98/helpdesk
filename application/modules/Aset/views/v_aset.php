<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
<div class="container-fluid">

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">

                </div>
                <div class="body">

                    <div class="table-responsive">
                        <table id="aset"
                            class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Merk</th>
                                    <th>Kategori</th>
                                    <th>Serial Number</th>
                                    <th>Lokasi</th>
                                    <th>#</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1;
                                if (isset($isi)) {
                                    foreach ($isi as $a) { ?>
                                <tr>
                                    <td><?= $no++  ?></td>
                                    <td><?= $a->kode_assets ?></td>
                                    <td><?= $a->merk ?></td>
                                    <td><?= $a->category ?></td>
                                    <td><?= $a->serial_number ?></td>
                                    <td><?= $a->lokasi ?></td>
                                    <td>
                                        <button type="button" class="btn btn-raised btn-primary btn-round waves-effect"
                                            data-toggle="modal"
                                            data-target="#largeModal<?= $a->id_assets ?>">Detail</button>
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




<div class="container-fluid">
    <?php $no = 0;
    foreach ($isi as $a) : $no++; ?>
    <div class="modal fade" id="largeModal<?= $a->id_assets ?>" tabindex="-1" role="dialog" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="largeModalLabel">Detail Data</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="" value="<?$a->id_assets?>" id="">
                    <div class="table-responsive">
                        <table id="aset"
                            class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Merk</th>
                                    <th>Kategori</th>
                                    <th>Serial Number</th>
                                    <th>Lokasi</th>
                                    <th>CPU</th>
                                    <th>RAM</th>
                                    <th>Stotage</th>
                                    <th>GPU</th>
                                    <th>Display</th>
                                    <th>Lainya</th>
                                    <th>Tgl Pembelian</th>
                                    <th>Kondisi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>

                                <tr>
                                    <td><?= $no++  ?></td>
                                    <td><?= $a->kode_assets ?></td>
                                    <td><?= $a->merk ?></td>
                                    <td><?= $a->category ?></td>
                                    <td><?= $a->serial_number ?></td>
                                    <td><?= $a->lokasi ?></td>
                                    <td><?= $a->cpu ?></td>
                                    <td><?= $a->ram ?></td>
                                    <td><?= $a->storage ?></td>
                                    <td><?= $a->gpu ?></td>
                                    <td><?= $a->display ?></td>
                                    <td><?= $a->lain ?></td>
                                    <td><?= $a->tgl_pembelian ?></td>
                                    <td>
                                        <?php
                                            if ($a->kondisi == 1) {
                                            ?>
                                        <p>BAIK</p>
                                        <?php
                                            } else {
                                            ?>
                                        <p>RUSAK</p>
                                        <?php
                                            }
                                            ?>
                                    </td>
                                    <td>
                                        <?php
                                            if ($a->status_unit == 1 and $a->kondisi == 1) {
                                            ?>
                                        <p style="color: green;"><b>Tersedia!</b></p>
                                        <?php
                                            } elseif ($a->kondisi == 0) {
                                            ?>
                                        <p style="color: red;"><b>Rusak</b></p>
                                        <?php
                                            } else {
                                            ?>
                                        <p style="color: blue;"><b>Dipinjam</b></p>
                                        <?php
                                            }
                                            ?>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-default btn-round waves-effect">SAVE CHANGES</button> -->
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>