<div class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-user">
                <div class="image">
                    <img src="<?php echo base_url('assets/setting/img/' . $webData['header_image']); ?>" alt="Literator background">
                </div>
                <div class="card-body">
                    <div class="author">
                        <a href="#">
                            <img class="avatar border-gray" src="<?php echo base_url('assets/setting/img/icon/boy.svg'); ?>" alt="...">
                            <h5 class="title"><?php echo $akunInfo['fullname']; ?></h5>
                        </a>
                        <p class="description">
                            <?php echo $akunInfo['username']; ?>
                        </p>
                    </div>
                    <p class="description text-center">
                        <?php echo $akunInfo['alias']; ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Sunting Profil</h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('dashboard/editakun'); ?>" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $akunInfo['username']; ?>" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label for="fullname">Nama Lengkap</label>
                            <input type="text" name="fullname" class="form-control" value="<?php echo $akunInfo['fullname']; ?>" placeholder="Nama lengkap" required>
                        </div>
                        <div class="form-group">
                            <label for="alias">Jabatan</label>
                            <input type="text" name="alias" class="form-control" value="<?php echo $akunInfo['alias']; ?>" placeholder="Jabatan" required>
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

        <div class="col-md-4">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Update Password</h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('dashboard/editakunpassword'); ?>" method="post">
                        <div class="form-group">
                            <label for="password">Password lama</label>
                            <input type="password" name="password" class="form-control" placeholder="Password Lama" required>
                        </div>
                        <div class="form-group">
                            <label for="newpassword">Password Baru</label>
                            <input type="password" name="newpassword" class="form-control" placeholder="Password Baru" required>
                        </div>
                        <div class="form-group">
                            <label for="confnewpassword">Ulangi Password Baru</label>
                            <input type="password" name="confnewpassword" class="form-control" placeholder="Ulangi Password Baru" required>
                        </div>
                        <div class="row">
                            <div class="update ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary btn-round">Update Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Tambahkan Writer</h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('dashboard/addwriter'); ?>" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label for="fullname">Nama Lengkap</label>
                            <input type="text" name="fullname" class="form-control" placeholder="Nama Lengkap" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="row">
                            <div class="update ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary btn-round">Daftarkan Writer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>