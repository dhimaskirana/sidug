<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>Edit User : <?= $data_umat->nama_lengkap ?><?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="mb-4">
    <a href="<?= url_to('DataUmat::index') ?>" class="btn btn-primary">Kembali</a>
</div>

<?php if (session('message') !== null) : ?>
    <div class="alert alert-success" role="alert"><?= session('message') ?></div>
<?php endif ?>

<?php $errors = session()->getFlashdata('errors'); ?>
<?php if (!empty($errors)) : ?>
    <div class="alert alert-danger" role="alert">Ada kesalahan yang perlu anda perhatikan!</div>
<?php endif; ?>

<form action="<?= url_to('DataUmat::edit', $data_umat->id) ?>" method="post">
    <?= csrf_field() ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="mb-4">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" value="<?= $data_umat->nama_lengkap ?>">
                <?= isset($errors['nama_lengkap']) ? '<p class="text-danger">' . $errors['nama_lengkap'] . '</p>' : '' ?>
            </div>
            <div class="mb-4">
                <label for="nik">NIK</label>
                <input type="text" name="nik" class="form-control" value="<?= $data_umat->nik ?>">
                <?= isset($errors['nik']) ? '<p class="text-danger">' . $errors['nik'] . '</p>' : '' ?>
            </div>
            <div class="mb-4">
                <label for="nokk">No Kartu Keluarga</label>
                <input type="text" name="nokk" class="form-control" value="<?= $data_umat->nokk ?>">
                <?= isset($errors['nokk']) ? '<p class="text-danger">' . $errors['nokk'] . '</p>' : '' ?>
            </div>
            <div class="mb-4">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10"><?= $data_umat->alamat ?></textarea>
                <?= isset($errors['alamat']) ? '<p class="text-danger">' . $errors['alamat'] . '</p>' : '' ?>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="mb-4">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" value="<?= $data_umat->tempat_lahir ?>">
                <?= isset($errors['tempat_lahir']) ? '<p class="text-danger">' . $errors['tempat_lahir'] . '</p>' : '' ?>
            </div>
            <div class="mb-4">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" value="<?= $data_umat->tanggal_lahir ?>">
                <?= isset($errors['tanggal_lahir']) ? '<p class="text-danger">' . $errors['tanggal_lahir'] . '</p>' : '' ?>
            </div>
            <div class="mb-4">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                    <option value="LAKI-LAKI" <?= $data_umat->jenis_kelamin == 'LAKI-LAKI' ? ' selected' : '' ?>>LAKI-LAKI</option>
                    <option value="PEREMPUAN" <?= $data_umat->jenis_kelamin == 'PEREMPUAN' ? ' selected' : '' ?>>PEREMPUAN</option>
                </select>
                <?= isset($errors['jenis_kelamin']) ? '<p class="text-danger">' . $errors['jenis_kelamin'] . '</p>' : '' ?>
            </div>
            <div class="mb-4">
                <label for="golongan_darah">Golongan Darah</label>
                <input type="text" name="golongan_darah" class="form-control" value="<?= $data_umat->golongan_darah ?>">
                <?= isset($errors['golongan_darah']) ? '<p class="text-danger">' . $errors['golongan_darah'] . '</p>' : '' ?>
            </div>
            <div class="mb-4">
                <label for="no_hp">No HP</label>
                <input type="text" name="no_hp" class="form-control" value="<?= $data_umat->no_hp ?>">
                <?= isset($errors['no_hp']) ? '<p class="text-danger">' . $errors['no_hp'] . '</p>' : '' ?>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

<?= $this->endSection(); ?>