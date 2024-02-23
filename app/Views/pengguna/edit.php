<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>Edit User : <?= $user->username ?><?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="mb-4">
    <a href="<?= url_to('Pengguna::index') ?>" class="btn btn-primary">Kembali</a>
</div>

<?php if (session('message') !== null) : ?>
    <div class="alert alert-success" role="alert"><?= session('message') ?></div>
<?php endif ?>

<form action="<?= url_to('Pengguna::edit', $user->id) ?>" method="post">
    <?= csrf_field() ?>
    <div class="mb-4">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Username" value="<?= $user->username ?>">
    </div>
    <div class="mb-4">
        <label for="email">Email</label>
        <input type="text" name="email" class="form-control" placeholder="Email" value="<?= $user->email ?>">
    </div>
    <div class="mb-4">
        <label for="roles">Select Role</label>
        <select name="roles" id="roles" class="form-control">
            <option value="admin" <?= in_array('admin', $user->getGroups()) ? ' selected' : ''  ?>>Admin</option>
            <option value="user" <?= in_array('user', $user->getGroups()) ? ' selected' : ''  ?>>User</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

<?= $this->endSection(); ?>