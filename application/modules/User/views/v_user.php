<div class="container-fluid">
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">


                <div class="body">
                    <div class="table-responsive">
                        <table id="table1"
                            class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1;
                                if (isset($isi)) {
                                    foreach ($isi as $data) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data['nama'] ?></td>
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
$(document).ready(function() {
    $('#table1').DataTable();
})
</script>