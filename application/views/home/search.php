<header class="masthead" style="background-image: url('<?php echo base_url('assets/setting/img/' . $webData['header_image']); ?>')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1><?php echo $webData['web_name']; ?></h1>
                    <span class="subheading"><?php echo $webData['web_slogan']; ?></span>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <form action="" method="post">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Kata kunci</span>
                    </div>
                    <input type="text" name="search" class="form-control" placeholder="Judul, tags, kategori, ..." autofocus>
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-info" name="tombolCari" value="Search">
                </div>
            </form>
        </div>
    </div>
</div>

<?php if ($this->input->post('search')) : ?>
    <div class="container pt-3">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">

                <?php if (!$posts) : ?>
                    <h3 class="post-subtitle">
                        Tidak ada postingan
                    </h3>
                <?php else : ?>

                    <?php foreach ($posts as $post) : ?>
                        <div class="post-preview">
                            <a href="<?php echo base_url('home/post/' . $post['uri']); ?>">
                                <h2 class="post-title">
                                    <?php echo $post['judul']; ?>
                                </h2>
                                <h3 class="post-subtitle">
                                    <?php echo $post['sub_judul']; ?>
                                </h3>
                            </a>
                            <p class="post-meta">Posted by
                                <a href="#"><?php echo $post['fullname']; ?></a> as <?php echo $post['alias']; ?>
                                on <?php echo $post['created']; ?></p>
                        </div>
                        <hr>
                    <?php endforeach; ?>



                    <!-- Pager -->
                    <div class="clearfix">
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
<?php endif; ?>

<hr>