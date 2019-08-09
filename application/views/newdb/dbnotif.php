<?php if ($this->session->flashdata('sukses')) : ?>
    <div class="alert alert-success" role="alert">
        <span><?php echo $this->session->flashdata('sukses'); ?></span>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('gagal')) : ?>
    <div class="alert alert-danger" role="alert">
        <span><?php echo $this->session->flashdata('gagal'); ?></span>
    </div>
<?php endif; ?>