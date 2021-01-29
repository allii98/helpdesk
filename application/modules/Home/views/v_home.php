<div class="body_scroll">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2><?= $tittle; ?></h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('Home') ?>"><i class="zmdi zmdi-home"></i>
                            Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);"><?= $tittle; ?></a></li>
                </ul>
                <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                        class="zmdi zmdi-sort-amount-desc"></i></button>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <button id="tombol" class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                        class="zmdi zmdi-arrow-right"></i></button>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Buat Tiket</h2>
                        <p>Sampaikan keluhan anda.</p>

                    </div>
                    <div class="body">
                        <form action="<?= base_url('Home/simpan') ?>" id="form_validation" method="POST"
                            enctype="multipart/form-data">
                            <div class="form-group form-float">
                                <input class="form-control" placeholder="Tanggal" onfocus="(this.type='date')"
                                    name="tgl" aria-required="true" autocomplete="off" required>
                            </div>

                            <div class="form-group form-float">

                                <select name="nama" id="nama" class="selectpicker form-control" data-live-search="true"
                                    required>
                                    <option selected disabled>Pilih Nama</option>
                                    <?php foreach ($isi as $u) : ?>
                                    <option value="<?= $u['id_user'] ?>"><?= $u['nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <input type="hidden" name="nama_user" id="nama_user">
                            </div>
                            <div class="form-group form-float">
                                <input type="text" class="form-control" placeholder="Lokasi kerja" name="lok"
                                    autocomplete="off">
                            </div>
                            <div class="form-group form-float">
                                <input type="text" class="form-control" placeholder="Kondisi/Permasalah" name="kondisi"
                                    aria-required="true" autocomplete="off" required>
                            </div>


                            <div class="form-group form-float">
                                <input type="file" class="dropify" name="img">
                                <input type="hidden" name="old" value="0" id="">
                            </div>

                            <button class="btn btn-raised btn-primary waves-effect" type="submit">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('status') ?>"></div>

        <div class="flash-data" data-flashdata=""></div>
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
                                        <th>Nama</th>
                                        <th>Kondisi/Masalah</th>
                                        <th>Foto</th>
                                        <th>Prioritas</th>
                                        <th>Solusi</th>
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



<script type="text/javascript">
$('#nama').change(function() {
    $.ajax({
        type: 'post',
        url: '<?= site_url('Home/getisiuser'); ?>',
        data: {
            id: this.value
        },
        success: function(response) {

            data = JSON.parse(response);
            $.each(data, function(index, value) {
                var opsi = value.nama;
                $('#nama_user').val(opsi);
            });

        },
        error: function(request) {
            console.log(request.responseText);
        }
    });
});

$(document).ready(function() {
    $('#tiket1').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?php echo site_url('Home/get_ajax') ?>",
            "type": "POST"
        },
        "columnDefs ": [{
            "targets": [0],
            "orderable": false,
        }, ],
    });
})

const flashData = $('.flash-data').data('flashdata');
// console.log(flashData);

if (flashData) {

    swal(
        "Success!",
        "Permintaan Kamu " + flashData + " Diproses",
        "success",
    );

}
</script>