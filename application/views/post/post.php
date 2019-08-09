<!-- Page Header -->
<header class="masthead" style="background-image: url('<?php echo $post['image_uri']; ?>')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-heading">
                    <h1><?php echo $post['judul']; ?></h1>
                    <h2 class="subheading"><?php echo $post['sub_judul']; ?></h2>
                    <span class="meta">Posted by
                        <a href="#"><?php echo $post['fullname']; ?></a> as <?php echo $post['alias']; ?>
                        on <?php echo $post['created']; ?></span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <?php echo $post['isi']; ?>
            </div>
        </div>
    </div>
</article>

<hr>