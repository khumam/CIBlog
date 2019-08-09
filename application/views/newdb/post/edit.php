<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-user">
                <div class="card-header">
                    <h5>Sunting Postingan</h5>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <?php echo form_error('judul'); ?>
                            <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Postingan" value="<?php echo $post['judul']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="subjudul">Sub Judul</label>
                            <?php echo form_error('subjudul'); ?>
                            <input type="text" class="form-control" name="subjudul" id="subjudul" placeholder="Sub Judul Postingan" value="<?php echo $post['sub_judul']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for=" summernote">Artikel</label>
                            <?php echo form_error('artikel'); ?>
                            <textarea id="summernote" name="artikel" class="form-control" required><?php echo $post['isi']; ?></textarea><br>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="custom-select" id="kategori" name="kategori" required>
                                <?php foreach ($categories as $category) : ?>
                                    <option value="<?php echo $category['kategoripost']; ?>" <?php if ($post['kategori'] == $category['kategoripost']) echo 'selected="selected"'; ?>)><?php echo $category['kategoripost']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Gambar Latar</label>
                            <?php echo form_error('image'); ?>
                            <input type="text" class="form-control" name="image" id="image" placeholder="Unsplash URL" value="<?php echo $post['image_uri']; ?>" required>
                            <small class="text-mutted">Cari gambar di Unsplash, copy link nya, dan tempel di sini.</small>
                        </div>
                        <div class="form-group">
                            <label for="tag">Tags</label>
                            <?php echo form_error('tag'); ?>
                            <input type="text" class="form-control" name="tag" id="tag" placeholder="News, Tips" value="<?php echo $post['tag']; ?>" required>
                            <small class="text-mutted">Pisahkan dengan koma (,)</small>
                        </div>
                        <div class="row">
                            <div class="update ml-auto mr-auto">
                                <a href="<?php echo base_url('dashboard/posts'); ?>" class="btn btn-primary btn-round">Kembali</a>
                                <button type="submit" class="btn btn-success btn-round">Update Postingan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>