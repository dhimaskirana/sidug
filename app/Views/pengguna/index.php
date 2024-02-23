<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>Pengguna<?= $this->endSection(); ?>

<?= $this->section('styles'); ?>
<link href="<?= base_url('sbadmin2/vendor/datatables/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="mb-4">
    <a href="<?= url_to('Pengguna::tambah') ?>" class="btn btn-primary">Tambah Pengguna</a>
</div>

<?php if (session('message') !== null) : ?>
    <div class="alert alert-success" role="alert"><?= session('message') ?></div>
<?php endif ?>

<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user->username; ?></td>
                    <td><?= $user->email; ?></td>
                    <td><?php foreach ($user->getGroups() as $role) { ?>
                            <span class="badge badge-primary"><?= $role ?></span>
                        <?php }; ?>
                    </td>
                    <td>
                        <a href="<?= url_to('Pengguna::edit', $user->id) ?>" class="btn btn-success">Edit</a>
                        <?php if (user_id() != $user->id) : ?>
                            <a href="#" class="btn btn-danger" onclick="event.preventDefault();deleterecord(<?= $user->id; ?>, '<?= url_to('Pengguna::delete', $user->id) ?>')">Delete</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<!-- Page level plugins -->
<script src="<?= base_url('sbadmin2/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('sbadmin2/vendor/swal/swal.js'); ?>"></script>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });

    function deleterecord(itemid, url) {
        swal({
                title: "Hapus Data",
                text: "Apakah anda yakin menghapus data ini?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = url;
                }
            });
    }
</script>
<?= $this->endSection(); ?>