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
                                    <th style="text-align: center;">Categorry</th>

                                    <th style="text-align: center;">#</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1;
                                if (isset($kat)) {
                                    foreach ($kat as $p) { ?>
                                <tr>
                                    <td style="text-align: center;"><?= $no++ ?></td>
                                    <td style="text-align: center;"><?= $p['nama_kategori'] ?></td>

                                    <td style="text-align: center;">
                                        <button type="button" title="update" data-toggle="modal"
                                            data-target="#update<?= $p['id_kategori'] ?>"
                                            class="btn btn-primary btn-icon btn-icon-mini btn-round"> <i
                                                class="zmdi zmdi-border-color"></i> </button>


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
                    <h5 class="title" id="tambah">Tambah Category</h5>
                </div>
                <form action="<?= base_url('Asset/tambah') ?>" method="POST" class="form-horizontal">
                    <div class="modal-body">
                        <div class="row clearfix">

                            <div class="col-sm-12 col-md-12 col-sm-8">
                                <small class="text-muted">Category: </small>
                                <div class="form-group">
                                    <p> <input type="text" class="form-control" name="kat" placeholder="Category"
                                            autocomplete="off" required> </p>
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
    <?php foreach ($kat as $k) : ?>
    <div class="modal fade " id="update<?= $k['id_kategori'] ?>" tabindex="-1" role="dialog" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="title" id="update">Update Category</h5>
                </div>
                <form action="<?= base_url('Asset/update') ?>" method="POST" class="form-horizontal">
                    <div class="modal-body">
                        <div class="row clearfix">

                            <div class="col-sm-12 col-md-12 col-sm-8">
                                <input type="hidden" name="id" value="<?= $k['id_kategori'] ?>" id="">
                                <small class="text-muted">Category: </small>
                                <div class="form-group">
                                    <p> <input type="text" class="form-control" name="kat"
                                            value="<?= $k['nama_kategori'] ?>" autocomplete="off" required> </p>
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
    <?php endforeach; ?>
</div>

<script type="text/javascript">
const flashData = $('.flash-data').data('flashdata');
// console.log(flashData);

if (flashData) {

    swal(
        "Success!",
        "Data Category " + flashData + "!",
        "success",
    );

}


//untuk tombol hapus

$('.tombol-hapus').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href')
    swal({
            title: "Apakah anda yakin?",
            text: "Data Category akan dihapus!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("Data Category berhasil dihapus!", {
                    icon: "success",
                });
                document.location.href = href;

            }
        });
});
</script>