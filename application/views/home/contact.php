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
            <p>Ada kritik atau saran? Atau hanya ingin mengenal Kami lebih dekat? Jangan sungkan untuk menghubungi Kami. Hubungi Kami dengan cepat di form di bawah ini. Salam Literasi</p>
            <form action="" method="post" id="contactForm">
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Nama</label>
                        <input type="text" class="form-control" placeholder="Nama lengkap" id="name" required data-validation-required-message="Masukkan nama lengkap Anda" name="nama">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Alamat email valid</label>
                        <input type="email" class="form-control" placeholder="Alamat email" id="email" required data-validation-required-message="Alamat email digunakan untuk menerima pesan balasan." name="email">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Pesan</label>
                        <textarea rows="5" name="pesan" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Masukkan pesan Anda di sini"></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <br>
                <div id="success"></div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary" id="sendMessageButton">Kirimkan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<hr>