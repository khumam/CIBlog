<div class="content">
    <div class="row">
        <div class="col-md-5">
            <div class="card card-user">
                <div class="card-header">
                    <h5>Header Image</h5>
                </div>
                <div class="card-body">
                    <img src="<?php echo $post['image_uri']; ?>" alt="">
                </div>
                <div class="card-footer text-center my-2">
                    <a href="<?php echo base_url('dashboard/posts'); ?>" class="btn btn-info"> <i class="nc-icon nc-minimal-left"></i> Kembali</a>
                    <a href="<?php echo base_url('dashboard/editpost/' . $post['id']); ?>" class="btn btn-success"> <i class="nc-icon nc-ruler-pencil"></i> Sunting Post</a>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card card-user">
                <div class="card-header">
                    <h5>Detail Post</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="row d-flex align-items-center">
                                <div class="col-md-1 col-1 mr-2">
                                    <i class="nc-icon nc-credit-card" style="font-size: 2em;"></i>
                                </div>
                                <div class="col-md-9 col-9">
                                    <b>Id Post</b><br><?php echo $post['id']; ?>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row d-flex align-items-center">
                                <div class="col-md-1 col-1 mr-2">
                                    <i class="nc-icon nc-bookmark-2" style="font-size: 2em;"></i>
                                </div>
                                <div class="col-md-9 col-9">
                                    <b>Judul</b><br><?php echo $post['judul']; ?>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row d-flex align-items-center">
                                <div class="col-md-1 col-1 mr-2">
                                    <i class="nc-icon nc-single-copy-04" style="font-size: 2em;"></i>
                                </div>
                                <div class="col-md-9 col-9">
                                    <b>Sub Judul</b><br><?php echo $post['sub_judul']; ?>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row d-flex align-items-center">
                                <div class="col-md-1 col-1 mr-2">
                                    <i class="nc-icon nc-tap-01" style="font-size: 2em;"></i>
                                </div>
                                <div class="col-md-9 col-9">
                                    <b>Link</b><br><?php echo '<a href="' . base_url('home/post/') . $post['uri'] . '">' . base_url('home/post/') . $post['uri'] . '</a>'; ?>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row d-flex align-items-center">
                                <div class="col-md-1 col-1 mr-2">
                                    <i class="nc-icon nc-paper" style="font-size: 2em;"></i>
                                </div>
                                <div class="col-md-9 col-9">
                                    <b>Kategori</b><br><?php echo $post['kategori']; ?>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row d-flex align-items-center">
                                <div class="col-md-1 col-1 mr-2">
                                    <i class="nc-icon nc-single-02" style="font-size: 2em;"></i>
                                </div>
                                <div class="col-md-9 col-9">
                                    <b>Author</b><br><?php echo $post['author']; ?>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row d-flex align-items-center">
                                <div class="col-md-1 col-1 mr-2">
                                    <i class="nc-icon nc-calendar-60" style="font-size: 2em;"></i>
                                </div>
                                <div class="col-md-9 col-9">
                                    <b>Created</b><br><?php echo $post['created']; ?>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row d-flex align-items-center">
                                <div class="col-md-1 col-1 mr-2">
                                    <i class="nc-icon nc-tag-content" style="font-size: 2em;"></i>
                                </div>
                                <div class="col-md-9 col-9">
                                    <b>Tags</b><br><?php echo $post['tag']; ?>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
</div>