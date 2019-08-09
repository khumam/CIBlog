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
                    <h5>Posts</h5>
                </div>
                <div class="card-body">
                    <p class="card-category">Halaman untuk mengelola artikel. Tambahkan postingan baru atau kelola melalui tabel di bawah.</p>
                    <a href="<?php echo base_url('dashboard/addpost'); ?>" class="btn btn-success"><i class="nc-icon nc-simple-add mr-1"></i> Tambah Postingan</a>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card card-s">
                <div class="card-header">
                    <h5>List Posts</h5>
                </div>
                <div class="card-body">
                    <?php if (!$posts) : ?>
                        Tidak ada data
                    <?php else : ?>
                        <div class="table-responsive">
                            <table class="table table-striped" style="font-size: 16px;">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Dilihat</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($posts as $post) : ?>
                                        <tr>
                                            <th scope="row"><?php echo ++$start; ?></th>
                                            <td><?php echo $post['judul']; ?></td>
                                            <td><?php echo $post['kategori']; ?></td>
                                            <td><?php echo $post['seen']; ?> x</td>
                                            <td><a href="<?php echo base_url('dashboard/detailpost/' . $post['id']); ?>" class="badge badge-warning"><i class="nc-icon nc-zoom-split"></i></a>
                                                <a href="<?php echo base_url('dashboard/editpost/' . $post['id']); ?>" class="badge badge-success"><i class="nc-icon nc-settings-gear-65"></i></a>
                                                <a href="<?php echo base_url('dashboard/hapuspost/' . $post['id']); ?>" class="badge badge-danger"><i class="nc-icon nc-simple-remove"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="card-footer">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>
    </div>
</div>