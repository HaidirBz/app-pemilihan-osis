<?php $this->load->view("Admin/layout/sidebar"); ?>
<?php $this->load->view("Admin/layout/header");  ?>

<div class="page-heading">
	<div class="page-title">
		<div class="row">
			<div class="col-12 col-md-6 order-md-1 order-last">
				<h3></h3>
			</div>
			<div class="col-12 col-md-6 order-md-2 order-first">
				<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= base_url("Admin")?>">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Mengelola Kandidat</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">View Calon Kandidat</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="table-responsive">
				<!-- Button trigger for info theme modal -->
				<button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#info">
					<span class="fa-fw select-all fas"></span>Tambah
				</button>

				<table class="table table-striped" id="table">
					<thead>
						<tr>
							<th>No Urut</th>
							<th>Nama Ketua</th>
							<th>Nama Wakil</th>
							<th>Foto</th>
							<th>Untuk Periode</th>
							<th>Status Pemilihan</th>
							<th>Opsi</th>
						</tr>
					</thead>

					<tbody>
						<?php foreach ($kandidat as $k): ?>
							<tr>
								<td><?= $k['no_urut'] ?></td>
								<td><?= $k['nama_kandidat'] ?></td>
								<td><?= $k['nama_wakil_kandidat'] ?></td>
								<td><img src="<?= base_url('assets/images/faces/') ?><?= $k['foto'] ?>" alt="Profile <?= $k['foto']?>" style="min-height: 50px; max-height:50px;"/>
								</td>
								<td><?= $k['masa_jabatan'] ?></td>
								<td><?= $k['status'] ?></td>
								<td>
									<!-- Detail -->
									<button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#detail<?= $k['id_kandidat'] ?>"><span class="fa-fw select-all fas"></span>
									</button>

									<!-- Ubah Data -->
									<button type="button" class="btn btn-outline-success" id="" data-bs-toggle="modal" data-bs-target="#edit<?= $k['id_kandidat'] ?>"><span class="fa-fw select-all fas"></span>
									</button>

									<!-- Hapus Data -->
									<button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#hapus<?= $k['id_kandidat'] ?>"><span class="fa-fw select-all fas"></span></button>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view("Admin/layout/footer"); ?>