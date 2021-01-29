<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
<div class="container-fluid">
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary btn-round" data-toggle="modal"
                        data-target="#tambah">Tambah data
                    </button>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No Handphone</th>
                                    <th>Departement</th>
                                    <th>#</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1;
                                if (isset($petugas)) {
                                    foreach ($petugas as $p) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $p['nama_petugas'] ?></td>
                                    <td><?= $p['email'] ?></td>
                                    <td><?= $p['no_hp'] ?></td>
                                    <td><?= $p['dept'] ?></td>
                                    <td>
                                        <button type="button" title="update" data-toggle="modal"
                                            data-target="#update<?= $p['id_petugas'] ?>"
                                            class="btn btn-primary btn-icon btn-icon-mini btn-round"> <i
                                                class="zmdi zmdi-border-color"></i> </button>
                                        <a href="<?php echo base_url('Petugas/hapus/' . $p['id_petugas']) ?>"
                                            class="btn btn-danger btn-icon btn-icon-mini btn-round tombol-hapus"
                                            title="Delete">
                                            <i class="zmdi zmdi-delete"></i>
                                        </a>
                                        <!-- <button type="button" title="delete"
                                                class="btn btn-danger btn-icon btn-icon-mini btn-round tombol-hapus"> <i
                                                    class="zmdi zmdi-delete"></i> </button> -->
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
    <!-- modal tambah -->
    <div class="modal fade " id="tambah" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="tambah">Tambah Data</h4>
                </div>
                <form action="<?= base_url('Petugas/tambah') ?>" method="POST" class="form-horizontal">
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                <label for="nama">Nama</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8">
                                <div class="form-group">
                                    <input type="text" id="nama" class="form-control" placeholder="Masukkan Nama"
                                        name="nama" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                <label for="email">Email</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8">
                                <div class="form-group">
                                    <input type="email" id="email" class="form-control" name="email"
                                        placeholder="Masukan Email" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                <label for="no">Nomer Handphone</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8">
                                <div class="form-group">
                                    <input type="number" id="no" class="form-control"
                                        placeholder="Masukkan Nomer Handphone" name="no" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                <label for="dept">Dept</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8">
                                <div class="form-group">
                                    <input type="text" id="dept" class="form-control" name="dept"
                                        placeholder="Masukkan Departement" autocomplete="off" required>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">Simpan</button>
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modal update -->
    <?php foreach ($petugas as $d) : ?>
    <div class="modal fade " id="update<?= $d['id_petugas'] ?>" tabindex="-1" role="dialog" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="update">Update Data</h4>
                </div>
                <form action="<?= base_url('Petugas/update') ?>" method="POST" class="form-horizontal">
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                <label for="nama">Nama</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?= $d['id_petugas'] ?>" id="">
                                    <input type="text" id="nama" class="form-control" value="<?= $d['nama_petugas'] ?>"
                                        name="nama" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                <label for="email">Email</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8">
                                <div class="form-group">
                                    <input type="email" id="email" class="form-control" value="<?= $d['email'] ?>"
                                        name="email" placeholder="Masukan Email" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                <label for="no">Nomer Handphone</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8">
                                <div class="form-group">
                                    <input type="number" id="no" class="form-control" value="<?= $d['no_hp'] ?>"
                                        name="no" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                <label for="dept">Dept</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8">
                                <div class="form-group">
                                    <input type="text" id="dept" class="form-control" name="dept"
                                        value="<?= $d['dept'] ?>" autocomplete="off" required>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">Update</button>
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<script type="text/javascript">
const flashData = $('.flash-data').data('flashdata');
// console.log(flashData);

if (flashData) {

    swal(
        "Success!",
        "Data petugas " + flashData + "!",
        "success",
    );

}


//untuk tombol hapus

$('.tombol-hapus').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href')
    swal({
            title: "Apakah anda yakin?",
            text: "Data petugas akan dihapus!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("Data petugas berhasil dihapus!", {
                    icon: "success",
                });
                document.location.href = href;

            }
        });
});
</script>