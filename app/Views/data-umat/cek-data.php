<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>Cek Data Umat<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<p>Akun anda belum terhubung dengan data umat. Silahkan validasi dengan NIK anda.</p>

<form action="<?= url_to('DataUmat::data_saya') ?>" method="post">
    <?= csrf_field() ?>
    <div class="mb-2">
        <label for="nik">Input NIK</label>
        <input type="text" name="nik" class="form-control" required>
        <input type="text" name="action" class="form-control" value="cek_nik" hidden required>
    </div>
    <button type="submit" class="btn btn-primary">Cek NIK</button>
</form>

<?= $this->endSection(); ?>