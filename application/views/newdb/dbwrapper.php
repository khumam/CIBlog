<!-- Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"-->

<div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
        <div class="logo">
            <!-- <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="../assets/img/logo-small.png">
            </div>
        </a> -->
            <a href="http://blog.literator.me" class="simple-text logo-normal">
                Literator
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li <?php if (!$this->uri->segment('2')) echo 'class="active"'; ?>>
                    <a href="<?php echo base_url('dashboard'); ?>">
                        <i class="nc-icon nc-bank"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li <?php if ($this->uri->segment('2') == 'posts') echo 'class="active"'; ?>>
                    <a href="<?php echo base_url('dashboard/posts'); ?>">
                        <i class="nc-icon nc-tile-56"></i>
                        <p>Posts</p>
                    </a>
                </li>
                <li <?php if ($this->uri->segment('2') == 'akunsettings') echo 'class="active"'; ?>>
                    <a href="<?php echo base_url('dashboard/akunsettings'); ?>">
                        <i class="nc-icon nc-single-02"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <?php if ($this->session->userdata('role') == 'admin') : ?>
                    <li <?php if ($this->uri->segment('2') == 'pesan') echo 'class="active"'; ?>>
                        <a href="<?php echo base_url('dashboard/pesan'); ?>">
                            <div class="row d-flex align-items-center">
                                <div class="col">
                                    <i class="nc-icon nc-delivery-fast"></i>
                                    <p>Pesan</p>
                                </div>
                                <?php if ($unreadmsg != 0) : ?>
                                    <div class="col">
                                        <p class="badge badge-danger float-right" style="font-size: 14px"><?php echo $unreadmsg; ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </a>
                    </li>
                    <li <?php if ($this->uri->segment('2') == 'akun') echo 'class="active"'; ?>>
                        <a href="<?php echo base_url('dashboard/akun'); ?>">
                            <i class="nc-icon nc-settings-gear-65"></i>
                            <p>Akun</p>
                        </a>
                    </li>
                    <li <?php if ($this->uri->segment('2') == 'websettings') echo 'class="active"'; ?>>
                        <a href="<?php echo base_url('dashboard/websettings'); ?>">
                            <i class="nc-icon nc-settings"></i>
                            <p>Web Settings</p>
                        </a>
                    </li>
                <?php endif; ?>
                <li>
                    <a href="<?php echo base_url('dashboard/logout'); ?>">
                        <i class="nc-icon nc-spaceship"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">