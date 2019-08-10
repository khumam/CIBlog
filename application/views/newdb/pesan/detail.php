<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-user">
                <div class="card-header">
                    <h5>Pesan baru</h5>
                    <p>Dari <?php echo $pesan['nama']; ?> ( <?php echo $pesan['email']; ?> )</p>
                    <p>Pada <?php echo $pesan['created']; ?></p>
                </div>
                <div class="card-body">
                    <p>
                        <?php echo $pesan['pesan']; ?>
                    </p>
                </div>
                <div class="card-footer">
                    <a href="<?php echo base_url('dashboard/hapuspesan/' . $pesan['id']); ?>" class="btn btn-danger float-right mx-3"><i class="nc-icon nc-simple-remove"></i> Hapus</a>
                    <a href="<?php echo base_url('dashboard/pesan'); ?>" class="btn btn-info float-right"><i class="nc-icon nc-minimal-left"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>