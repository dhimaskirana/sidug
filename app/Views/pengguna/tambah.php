<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>Tambah Pengguna<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="mb-4">
    <a href="<?= url_to('Pengguna::index') ?>" class="btn btn-primary">Kembali</a>
</div>

<form action="<?= url_to('Pengguna::tambah') ?>" method="post">
    <?= csrf_field() ?>
    <div class="mb-4">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Username">
    </div>
    <div class="mb-4">
        <label for="email">Email</label>
        <input type="text" name="email" class="form-control" placeholder="Email">
    </div>
    <div class="mb-4">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password">
    </div>
    <div class="mb-4">
        <label for="repeat_password">Repeat Password</label>
        <input type="password" name="repeat_password" class="form-control" placeholder="Repeat Password">
    </div>
    <div class="mb-4">
        <label for="roles">Select Role</label>
        <select name="roles" id="roles" class="form-control">
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

<?= $this->endSection(); ?>