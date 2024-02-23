<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>Data Umat<?= $this->endSection(); ?>

<?= $this->section('styles'); ?>
<link href="<?= base_url('sbadmin2/vendor/datatables/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="mb-4">
    <a href="<?= url_to('DataUmat::tambah') ?>" class="btn btn-primary">Tambah Data Umat</a>
</div>

<?php if (session('message') !== null) : ?>
    <div class="alert alert-success" role="alert"><?= session('message') ?></div>
<?php endif ?>

<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Nama Lengkap</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Nama Lengkap</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
            <?php foreach ($data_umat as $umat) : ?>
                <tr>
                    <td><?= $umat->nama_lengkap; ?></td>
                    <td><?= $umat->alamat; ?></td>
                    <td><?= $umat->no_hp; ?></td>
                    <td>
                        <a href="<?= url_to('DataUmat::edit', $umat->id) ?>" class="btn btn-success">Edit</a>
                        <a href="#" class="btn btn-danger" onclick="event.preventDefault();deleterecord(<?= $umat->id; ?>, '<?= url_to('DataUmat::delete', $umat->id) ?>')">Delete</a>
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