<section class="pt-5 pb-5" style="height:100vh;background-image: url('<?php echo base_url('assets/setting/img/' . $webData['header_image']); ?>'); background-size: cover; background-repeat: no-repeat;">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="card p-4 m-4">
                <h5 class="text-center mb-4">Masuk ke Dashboard</h5>
                <?php if ($this->session->flashdata('sukses')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('sukses'); ?>
                    </div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('gagal')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $this->session->flashdata('gagal'); ?>
                    </div>
                <?php endif; ?>
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="usernameicon"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="usernameicon" name="username" autocomplete="off" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="password"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="password" name="password" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-info"><i class="fas fa-sign-in-alt"></i> Masuk</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
</section>