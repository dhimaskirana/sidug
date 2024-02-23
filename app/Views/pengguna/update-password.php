<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>Edit User : <?= $user->username ?><?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="mb-4">
    <a href="<?= url_to('Pengguna::edit', $user->id) ?>" class="btn btn-primary">Kembali</a>
</div>

<?php $errors = session()->getFlashdata('errors'); ?>
<?php if (!empty($errors)) : ?>
    <div class="alert alert-danger" role="alert">Ada kesalahan yang perlu anda perhatikan!</div>
<?php endif; ?>

<?php if (session('message') !== null) : ?>
    <div class="alert alert-success" role="alert"><?= session('message') ?></div>
<?php endif ?>

<form action="<?= url_to('Pengguna::update_password', $user->id) ?>" method="post">
    <?= csrf_field() ?>
    <div class="mb-4">
        <label for="password">Password Baru</label>
        <input type="password" name="password" class="form-control" placeholder="Password" value="<?= old('password'); ?>">
        <?= isset($errors['password']) ? '<p class="text-danger">' . $errors['password'] . '</p>' : '' ?>
    </div>
    <div class="mb-4">
        <label for="repeat_password">Repeat Password Baru</label>
        <input type="password" name="repeat_password" class="form-control" placeholder="Repeat Password" value="<?= old('repeat_password'); ?>">
        <?= isset($errors['repeat_password']) ? '<p class="text-danger">' . $errors['repeat_password'] . '</p>' : '' ?>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

<?= $this->endSection(); ?>