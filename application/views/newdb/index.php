<div class="content">
    <div class="row">
        <div class="col-md-3">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-success">
                                <i class="nc-icon nc-single-copy-04 text-success"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Total<br>Postingan</p>
                                <p class="card-title"><?php echo $countPosts; ?> Post
                                    <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i> Update <?php echo date('H:i:s, d M Y'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-primary">
                                <i class="nc-icon nc-planet text-primary"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Total Kunjungan</p>
                                <p class="card-title"><?php echo $totalKunjungan; ?>
                                    <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i> Update <?php echo date('H:i:s, d M Y'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-paper text-warning"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Jumlah Kontribusi</p>
                                <p class="card-title"><?php echo $countPostsUser; ?> Post
                                    <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i> Update <?php echo date('H:i:s, d M Y'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-danger">
                                <i class="nc-icon nc-tv-2 text-danger"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Jumlah Penayangan</p>
                                <p class="card-title"><?php echo $totalPenayangan; ?>
                                    <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i> Update <?php echo date('H:i:s, d M Y'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if ($lastPost) : ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-stats">
                    <div class="card-header">
                        <h5>Postingan terbaru</h5>
                    </div>
                    <div class="card-body">
                        <div class="row d-flex align-items-center">
                            <div class="col-md-1 col-1 mr-2 text-center">
                                <i class="nc-icon nc-paper" style="font-size: 2em;"></i>
                            </div>
                            <div class="col-md-9 col-9">
                                <h5><a href="<?php echo base_url('home/post/' . $lastPost['uri']); ?>"> <?php echo $lastPost['judul']; ?></a></h5>
                                <p>Posted By <?php echo $lastPost['fullname']; ?> as <?php echo $lastPost['alias']; ?><br>at <?php echo $lastPost['created']; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
    <?php endif; ?>