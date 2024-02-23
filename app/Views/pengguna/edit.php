<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>Edit User : <?= $user->username ?><?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="mb-4">
    <a href="<?= url_to('Pengguna::index') ?>" class="btn btn-primary">Kembali</a>
    <a href="<?= url_to('Pengguna::update_password', $user->id) ?>" class="btn btn-warning">Update Password</a>
</div>

<?php $errors = session()->getFlashdata('errors'); ?>
<?php if (!empty($errors)) : ?>
    <div class="alert alert-danger" role="alert">Ada kesalahan yang perlu anda perhatikan!</div>
<?php endif; ?>

<?php if (session('message') !== null) : ?>
    <div class="alert alert-success" role="alert"><?= session('message') ?></div>
<?php endif ?>

<form action="<?= url_to('Pengguna::edit', $user->id) ?>" method="post">
    <?= csrf_field() ?>
    <div class="mb-4">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Username" value="<?= $user->username ?>">
        <?= isset($errors['username']) ? '<p class="text-danger">' . $errors['username'] . '</p>' : '' ?>
    </div>
    <div class="mb-4">
        <label for="email">Email</label>
        <input type="text" name="email" class="form-control" placeholder="Email" value="<?= $user->email ?>">
        <?= isset($errors['email']) ? '<p class="text-danger">' . $errors['email'] . '</p>' : '' ?>
    </div>
    <div class="mb-4">
        <label for="roles">Select Role</label>
        <select name="roles" id="roles" class="form-control">
            <option value="admin" <?= in_array('admin', $user->getGroups()) ? ' selected' : ''  ?>>Admin</option>
            <option value="user" <?= in_array('user', $user->getGroups()) ? ' selected' : ''  ?>>User</option>
        </select>
        <?= isset($errors['roles']) ? '<p class="text-danger">' . $errors['roles'] . '</p>' : '' ?>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

<?= $this->endSection(); ?>