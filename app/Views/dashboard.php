<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>Dashboard<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="row">
	<div class="col-lg-6">

		<div class="card shadow mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold">Aplikasi SIDUG</h6>
			</div>
			<div class="card-body">
				<p>Selamat datang di Aplikasi SIDUG (Sistem Informasi Data Umat Gereja)</p>
				<p>Aplikasi ini merupakan rewrite dari aplikasi <a href="https://github.com/dhimaskirana/sisfopringgo/" target="_blank">sisfopringgo</a> yang saya kembangkan pada tahun 2018 menggunakan <a href="https://www.codeigniter.com/" target="_blank">Codeigniter</a> versi 3.1.13 namun versi lebih sederhana dengan menghilangkan fitur Lingkungan dan Wilayah</p>
				<p>Lingkungan dan Wilayah merupakan konsep hirarki pada gereja katolik, sedangkan aplikasi SIDUG diharapkan bisa digunakan secara universal oleh gereja katolik maupun gereja kristen.</p>
			</div>
		</div>

		<div class="card shadow mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold">Fitur Aplikasi SIDUG</h6>
			</div>
			<div class="card-body">
				<p>Fitur pada aplikasi ini:</p>
				<ol>
					<li>Pengelolaan data umat gereja</li>
					<li>Manajemen admin dan user</li>
					<li>Laporan statistik data umat gereja</li>
				</ol>
			</div>
		</div>

		<div class="card shadow mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold">Pengembangan Aplikasi SIDUG</h6>
			</div>
			<div class="card-body">
				<p>Aplikasi ini dikembangkan menggunakan <a href="https://www.codeigniter.com/" target="_blank">Codeigniter</a> versi 4.4.5</p>
				<p>Menggunakan template admin dari <a href="https://startbootstrap.com/theme/sb-admin-2" target="_blank">SB Admin 2</a></p>
			</div>
		</div>

	</div>
	<div class="col-lg-6">

		<div class="card shadow mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold">Pengelolaan Data Umat</h6>
			</div>
			<div class="card-body">
				<ol>
					<li>Tambah data umat</li>
					<li>Hapus data umat</li>
					<li>Update data umat</li>
					<li>Klaim data umat jika memiliki akun di aplikasi ini</li>
				</ol>
			</div>
		</div>

		<div class="card shadow mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold">Manajemen Admin dan User</h6>
			</div>
			<div class="card-body">
				<ol>
					<li>Admin : merupakan level user yang bisa mengelola keseluruhan aplikasi</li>
					<li>User : merupakan level user yang hanya bisa mengelola data umat milik sendiri</li>
				</ol>
			</div>
		</div>

		<div class="card shadow mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold">Laporan Statistik</h6>
			</div>
			<div class="card-body">
				<ol>
					<li>Menampilkan jumlah seluruh umat di gereja</li>
					<li>Menampilkan jumlah umat berjenis kelamin laki-laki / perempuan</li>
				</ol>
			</div>
		</div>

	</div>
</div>

<?= $this->endSection(); ?>