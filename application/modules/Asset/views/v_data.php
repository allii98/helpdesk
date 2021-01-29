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
                                    <th style="text-align: center;">No</th>
                                    <th style="text-align: center;">Kode</th>
                                    <th style="text-align: center;">Nama Asset</th>
                                    <th style="text-align: center;">Category</th>
                                    <th style="text-align: center;">#</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1;
                                if (isset($aset)) {
                                    foreach ($aset as $p) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $p['kode'] ?></td>
                                    <td><?= $p['nama_aset'] ?></td>
                                    <td><?= $p['nama_kategori'] ?></td>
                                    <td>
                                        <button type="button" title="update"
                                            class="btn btn-primary btn-icon btn-icon-mini btn-round"
                                            onclick="asetModalEdit('<?= $p['id_aset'] ?>')"> <i
                                                class="zmdi zmdi-border-color"></i> </button>

                                        <a href="<?php echo base_url('Asset/hapusAset/' . $p['id_aset']) ?>"
                                            class="btn btn-danger btn-icon btn-icon-mini btn-round tombol-hapus"
                                            title="Delete">
                                            <i class="zmdi zmdi-delete"></i>
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


<div class="container-fluid">
    <!-- modal tambah -->


    <div class="modal fade " id="tambah" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="title" id="tambah">Tambah Data Assets</h5>
                </div>
                <form action="<?= base_url('Asset/tambahAset') ?>" method="POST" class="form-horizontal">
                    <div class="modal-body">
                        <div class="row clearfix">

                            <div class="col-sm-12 col-md-12 col-sm-8">
                                <small class="text-muted">Category: </small>
                                <div class="form-group">
                                    <p> <select name="kat" id="kat" class="form-control" required>
                                            <option selected disabled>Pilih Category</option>
                                            <?php foreach ($isi as $u) : ?>
                                            <option value="<?= $u['id_kategori'] ?>"><?= $u['nama_kategori'] ?></option>
                                            <?php endforeach; ?>
                                        </select> </p>
                                </div>
                                <hr>
                            </div>
                            <div class="col-sm-12 col-md-12 col-sm-8">
                                <small class="text-muted">Nama Assets: </small>
                                <div class="form-group">
                                    <p> <input type="text" class="form-control" name="merk"
                                            placeholder="Masukkan Nama Assets" autocomplete="off" required> </p>
                                </div>
                                <hr>
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
    <div class="modal fade " id="modal-update" role="dialog">
        <div class="modal-dialog modal-sm" id="modal-edit-container">

        </div>
    </div>
</div>

<script type="text/javascript">
// fungsi tampil modal edit
function asetModalEdit(id_aset) {
    $("#modal-update").modal();
    var url = "<?= base_url() ?>Asset/editaset/" + id_aset;
    // console.log(url);
    $("#modal-edit-container").load(url);
}


const flashData = $('.flash-data').data('flashdata');
// console.log(flashData);

if (flashData) {

    swal(
        "Success!",
        "Data Asset " + flashData + "!",
        "success",
    );

}


//untuk tombol hapus

$('.tombol-hapus').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href')
    swal({
            title: "Apakah anda yakin?",
            text: "Data asset akan dihapus!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("Data asset berhasil dihapus!", {
                    icon: "success",
                });
                document.location.href = href;

            }
        });
});
</script>