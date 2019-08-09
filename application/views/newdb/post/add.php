<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-user">
                <div class="card-header">
                    <h5>Tambahkan Postingan Baru</h5>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Postingan" required>
                        </div>
                        <div class="form-group">
                            <label for="subjudul">Sub Judul</label>
                            <input type="text" class="form-control" name="subjudul" id="subjudul" placeholder="Sub Judul Postingan" required>
                        </div>
                        <div class="form-group">
                            <label for="summernote">Artikel</label>
                            <textarea id="summernote" name="artikel" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="custom-select" id="kategori" name="kategori" required>
                                <option selected>Pilih</option>
                                <?php foreach ($categories as $category) : ?>
                                    <option value="<?php echo $category['kategoripost']; ?>"><?php echo $category['kategoripost']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="text" class="form-control" name="image" id="image" placeholder="Unsplash URL" required>
                            <small class="text-mutted">Cari gambar di Unsplash, copy link nya, dan tempel di sini.</small>
                        </div>
                        <div class="form-group">
                            <label for="tag">Tags</label>
                            <input type="text" class="form-control" name="tag" id="tag" placeholder="News, Tips, etc..." required>
                            <small class="text-mutted">Pisahkan dengan koma (,)</small>
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
    </div>
</div>