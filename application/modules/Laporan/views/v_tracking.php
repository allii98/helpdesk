<div class="header">
    <h2><strong>System Tracking</strong></h2>

</div>
<div class="body">
    <?php $no = 1;
    foreach ($tracking as $t) { ?>
    <ul class="list-unstyled activity">
        <li class="a_code">
            <h4><?= $t['status'] ?></h4>

            <p><?php if ($t['filefoto'] == null) { ?>
            <p></p>
            <?php } else { ?>
            <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                <div class="col-xl-4 col-lg-8 col-md-6 col-sm-12 m-b-30">
                    <a target="_blank" href="<?php echo base_url() ?>assets/uploads/tiket/<?= $t['filefoto'] ?>"> <img
                            class="img-fluid img-thumbnail"
                            src="<?php echo base_url('assets/uploads/tiket/' . $t['filefoto']) ?>" width="100px" alt="">
                    </a>
                </div>
            </div>

            <?php } ?>
            </p>
            <p><?= $t['deskripsi'] ?></p>

            <small>By: <?= $t['nama'] ?> (<?= $t['tanggal'] ?>)</small>
        </li>


    </ul>
    <?php $no++;
    } ?>
</div>