<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>Statistik<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
	<div class="col-lg-4">
		<div class="card border-left-primary shadow py-2 mb-4">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="font-weight-bold text-primary text-uppercase mb-1">Jumlah Total Umat</div>
						<div class="h2 mb-0 font-weight-bold text-gray-800"><?= $data_statistik['jumlah_umat'] ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-users fa-3x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card border-left-warning shadow py-2 mb-4">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="font-weight-bold text-warning text-uppercase mb-1">Jumlah Umat Laki-laki</div>
						<div class="h2 mb-0 font-weight-bold text-gray-800"><?= $data_statistik['jumlah_laki_laki'] ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-male fa-3x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card border-left-info shadow py-2 mb-4">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="font-weight-bold text-info text-uppercase mb-1">Jumlah Umat Perempuan</div>
						<div class="h2 mb-0 font-weight-bold text-gray-800"><?= $data_statistik['jumlah_perempuan'] ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-female fa-3x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		<div class="card shadow mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold">Statistik berdasarkan golongan darah</h6>
			</div>
			<div class="card-body">
				<div id="goldar"></div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card shadow mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold">Statistik berdasarkan umur</h6>
			</div>
			<div class="card-body">
				<div id="umur_umat"></div>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
	var golongan_darah_cart = new ApexCharts(document.querySelector("#goldar"), {
		chart: {
			type: 'bar'
		},
		series: [{
			data: <?php echo json_encode($data_statistik['golongan_darah']); ?>
		}]
	});
	golongan_darah_cart.render();
	var umur_umat_cart = new ApexCharts(document.querySelector("#umur_umat"), {
		chart: {
			type: 'bar'
		},
		series: [{
			data: <?php echo json_encode($data_statistik['umur_umat']); ?>
		}]
	});
	umur_umat_cart.render();
</script>
<?= $this->endSection(); ?>