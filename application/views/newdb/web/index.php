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
        <div class="col-md-7">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Web Settings</h5>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="namaweb">Nama Web</label>
                            <input type="text" name="namaweb" id="namaweb" class="form-control" placeholder="Nama Web" value="<?php echo $webData['web_name']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="sloganweb">Slogan Web</label>
                            <input type="text" name="sloganweb" id="sloganweb" class="form-control" placeholder="Slogan Web" value="<?php echo $webData['web_slogan']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="webdesc">Deskripsi Web</label>
                            <textarea name="webdesc" id="webdesc" class="form-control" placeholder="Deskripsi Web" required><?php echo $webData['web_desc']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="authorweb">Author Web</label>
                            <input type="text" name="authorweb" id="authorweb" class="form-control" placeholder="Author" value="<?php echo $webData['web_author']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="googlekey">Google Key</label>
                            <input type="text" name="googlekey" id="googlekey" class="form-control" placeholder="Google Key" value="<?php echo $webData['google_key']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="perpage">Post per Page</label>
                            <input type="number" name="perpage" id="perpage" class="form-control" placeholder="Google Key" value="<?php echo $webData['post_per_page']; ?>">
                        </div>
                        <div class="row">
                            <div class="update ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary btn-round">Update Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Header Image</h5>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img src="<?php echo base_url('assets/setting/img/' . $webData['header_image']); ?>" height="200px" width="auto">
                    </div>
                    <form action="<?php echo base_url('dashboard/savewebsettings'); ?>" method="post" class="mt-4" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="headerimage" aria-describedby="headerimage" name="headerimage">
                                <label class="custom-file-label" for="headerimage">Choose file</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="update ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary btn-round">Update Image</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>