<?php foreach ($aset as $a) : ?>
<div class="modal-content">
    <div class="modal-header">
        <h5 class="title" id="tambah">Update Data Assets</h5>
    </div>
    <form action="<?= base_url('Asset/updateAset') ?>" method="POST" class="form-horizontal">
        <div class="modal-body">
            <div class="row clearfix">

                <div class="col-sm-12 col-md-12 col-sm-8">
                    <small class="text-muted">Category: </small>
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?= $a['id_aset'] ?>" id="">
                        <input type="hidden" name="id_kat" value="<?= $a['id_kat'] ?>" id="">

                        <p> <select name="kat" id="kat" class="form-control" required>
                                <?php foreach ($kat as $u) : ?>
                                <option <?= $u['id_kategori'] == $a['id_kat'] ? "selected" : ""  ?>
                                    value="<?= $u['id_kategori'] ?>"><?= $u['nama_kategori'] ?></option>
                                <?php endforeach; ?>
                            </select> </p>
                    </div>
                    <hr>
                </div>
                <div class="col-sm-12 col-md-12 col-sm-8">
                    <small class="text-muted">Nama Assets: </small>
                    <div class="form-group">
                        <p> <input type="text" class="form-control" name="merk" value="<?= $a['nama_aset'] ?>"
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

<?php endforeach; ?>