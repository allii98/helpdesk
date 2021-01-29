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
                                    <th>PT</th>
                                    <th>Kondisi/Masalah</th>
                                    <th>Solusi</th>
                                    <th>Prioritas</th>
                                    <th width="300%">Tindakan</th>
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
                                    <td></td>
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
                                        <a href="<?php echo base_url('Tiket/approve/' . $d['id_tiket']) ?>"
                                            class="btn btn-primary btn-sm" title="Solusi">Pilih</a>
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

                                    <td style="text-align: center;">
                                        <?php if ($d['solusi'] == 3) { ?>
                                        <a href="<?php echo base_url('Tiket/detail/' . $d['id_tiket']) ?>"
                                            class="btn btn-primary btn-sm" title="Detail">Detail
                                        </a>
                                        <a href="<?php echo base_url('Tiket/delete/' . $d['id_tiket']) ?>"
                                            class="btn btn-danger btn-sm tombol-hapus" title="Delete">Delete
                                        </a>
                                        <?php } else if ($d['solusi'] == 2 || $d['solusi'] == 4) { ?>
                                        <a href="<?php echo base_url('Tiket/edit/' . $d['id_tiket']) ?>"
                                            class="btn btn-primary btn-sm" title="Update">Update</a>
                                        <?php } else { ?>
                                        <a href="<?php echo base_url('Tiket/updateTugas/' . $d['id_tiket']) ?>"
                                            class="btn btn-primary btn-sm" title="Tindakan">Pilih </a>
                                        <?php } ?>
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


//untuk tombol hapus

$('.tombol-hapus').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href')
    swal({
            title: "Apakah anda yakin?",
            text: "Data tiket akan dihapus!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("Data tiket berhasil dihapus!", {
                    icon: "success",
                });
                document.location.href = href;

            }
        });
});
</script>