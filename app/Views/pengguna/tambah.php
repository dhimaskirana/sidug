<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>Tambah Pengguna<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="mb-4">
    <a href="<?= url_to('Pengguna::index') ?>" class="btn btn-primary">Kembali</a>
</div>

<?php $errors = session()->getFlashdata('errors'); ?>
<?php if (!empty($errors)) : ?>
    <div class="alert alert-danger" role="alert">Ada kesalahan yang perlu anda perhatikan!</div>
<?php endif; ?>

<form action="<?= url_to('Pengguna::tambah') ?>" method="post">
    <?= csrf_field() ?>
    <div class="mb-4">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Username" value="<?= old('username'); ?>">
        <?= isset($errors['username']) ? '<p class="text-danger">' . $errors['username'] . '</p>' : '' ?>
    </div>
    <div class="mb-4">
        <label for="email">Email</label>
        <input type="text" name="email" class="form-control" placeholder="Email" value="<?= old('email'); ?>">
        <?= isset($errors['email']) ? '<p class="text-danger">' . $errors['email'] . '</p>' : '' ?>
    </div>
    <div class="mb-4">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" value="<?= old('password'); ?>">
        <?= isset($errors['password']) ? '<p class="text-danger">' . $errors['password'] . '</p>' : '' ?>
    </div>
    <div class="mb-4">
        <label for="repeat_password">Repeat Password</label>
        <input type="password" name="repeat_password" class="form-control" placeholder="Repeat Password" value="<?= old('repeat_password'); ?>">
        <?= isset($errors['repeat_password']) ? '<p class="text-danger">' . $errors['repeat_password'] . '</p>' : '' ?>
    </div>
    <div class="mb-4">
        <label for="roles">Select Role</label>
        <select name="roles" id="roles" class="form-control">
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>
        <?= isset($errors['roles']) ? '<p class="text-danger">' . $errors['roles'] . '</p>' : '' ?>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

<?= $this->endSection(); ?>