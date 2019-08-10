<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="<?php echo base_url(); ?>"><?php echo $webData['web_name']; ?></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('home/search'); ?>">Search</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('home/contact'); ?>">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('home/login'); ?>">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>