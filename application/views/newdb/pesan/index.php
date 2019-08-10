<div class="content">

    <?php if ($this->session->flashdata('sukses')) : ?>
        <div class="alert alert-success" role="alert">
            <span><?php echo $this->session->flashdata('sukses'); ?></span>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('gagal')) : ?>
        <div class="alert alert-danger" role="alert">
            <span><?php echo $this->session->flashdata('gagal'); ?></span>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-stats">
                <div class="card-header">
                    <h5>List Pesan Masuk</h5>
                </div>
                <div class="card-body">

                    <?php if (!$pesans) : ?>
                        <h6>Tidak ada data</h6>
                    <?php else : ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Lengkap</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pesans as $pesan) : ?>
                                        <tr <?php if ($pesan['baca'] == 1) echo 'style="background:#dddddd"'; ?>>
                                            <td><?php echo ++$start; ?></td>
                                            <td><?php echo $pesan['nama']; ?></td>
                                            <td><?php echo $pesan['email']; ?></td>
                                            <td>
                                                <a href="<?php echo base_url('dashboard/detailpesan/' . $pesan['id']); ?>" class="badge badge-warning"><i class="nc-icon nc-zoom-split"></i></a>
                                                <a href="<?php echo base_url('dashboard/hapuspesan/' . $pesan['id']); ?>" class="badge badge-danger"><i class="nc-icon nc-simple-remove"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="card-footer pt-5 pb-3">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>
    </div>
</div>