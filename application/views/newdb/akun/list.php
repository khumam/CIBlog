<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-stats">
                <div class="card-header">
                    <h5>List Akun Admin dan Writer</h5>
                </div>
                <div class="card-body">

                    <?php if (!$akuns) : ?>
                        <h6>Tidak ada data</h6>
                    <?php else : ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Lengkap</th>
                                        <th scope="col">Sebagai</th>
                                        <th scope="col">Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($akuns as $akun) : ?>
                                        <tr>
                                            <td><?php echo ++$start; ?></td>
                                            <td><?php echo $akun['fullname']; ?></td>
                                            <td><?php echo $akun['alias']; ?></td>
                                            <td><?php echo $akun['role']; ?></td>
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