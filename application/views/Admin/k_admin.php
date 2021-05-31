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
						<li class="breadcrumb-item active" aria-current="page">Mengelola Admin</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">View Admin</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="table-responsive">
				<!-- Button trigger for info theme modal -->
				<button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#info">
					<span class="fa-fw select-all fas"></span>Tambah
				</button>

				<!--Tambah Data-->
				<form enctype='multipart/form-data' action="<?=base_url("Admin/createAdmin")?>" method="POST">

					<div class="modal fade text-left" id="info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" 
					aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
						<div class="modal-content">
							<div class="modal-header bg-info">
								<h5 class="modal-title white" id="myModalLabel130">
									Tambah Data Admin
								</h5>
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<i data-feather="x"></i>
								</button>
							</div>
							<div class="modal-body">
								<p>
									<input type="text" class="form-control" id=""  name="kode_admin" placeholder="Enter Kode">
								</p>

								<p>
									<input type="text" class="form-control" id=""  name="nama_admin" placeholder="Enter Nama" required>
								</p>

								<div class="form-group">
									<select name="jk" class="form-select" id="basicSelect" required">
										<option disabled="" value="" selected="">Jenis Kelamin</option>
										<option>L</option>
										<option>P</option>
									</select>
								</div>

								<p>
									<input type="text" class="form-control" id=""  name="alamat" placeholder="Enter Alamat" 
									required>
								</p>

								<p>
									<input type="text" class="form-control" id=""  name="no_hp" placeholder="Enter No Handphone" required>
								</p>

								<p>
									<input type="email" class="form-control" id=""  name="email" placeholder="Enter Email" required>
								</p>

								<p>
									<input  id="foto" type="file" name="foto" class="form-control" required>
								</p>
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
									<i class="bx bx-x d-block d-sm-none"></i>
									<span class="d-none d-sm-block">Close</span>
								</button>
								<button type="submit" class="btn btn-info ml-1">
									<i class="bx bx-check d-block d-sm-none"></i>
									<span class="d-none d-sm-block">Accept</span>
								</button>
							</div>
						</div>
					</div>
				</div>
			</form>

			<table class="table table-striped" id="#table">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode</th>
						<th>Nama</th>
						<th>Jenis Kelamin</th>
						<th>Alamat</th>
						<th>No Telepon</th>
						<th>Email</th>
						<th>Foto</th>
						<th>Status</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no =1; foreach ($admin as $a): ?>
					<tr>
						<td><?= $no++; ?></td>
						<td><?= $a['kode_admin'] ?></td>
						<td><?= $a['nama_admin'] ?></td>
						<td><?= $a['jk'] ?></td>
						<td><?= $a['alamat'] ?></td>
						<td><?= $a['no_hp'] ?></td>
						<td><?= $a['email'] ?></td>
						<td>
							<img src="<?= base_url('assets/images/faces/') ?><?= $a['foto'] ?>" alt="Profile <?= $a['foto'] ?>" style="min-height: 50px; max-height:50px;" />
						</td>
						<td><span class=""><?= $a['status'] ?></span></td>
						<td>
							<button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#edit<?= $a['id_admin'] ?>">
								<span class="fa-fw select-all fas"></span></button>

								<!--Ubah Data-->
								<form enctype='multipart/form-data' action="<?=base_url("Admin/editAdmin")?>/<?=$a['id_admin']?>" method="POST">

									<div class="modal fade text-left" id="edit<?=$a['id_admin']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
											<div class="modal-content">
												<div class="modal-header bg-info">
													<h5 class="modal-title white" id="myModalLabel130">
														Ubah Data Admin
													</h5>
												</div>

												<div class="modal-body">
													<p>
														<input type="text" class="form-control" id=""  name="kode_admin" value="<?= $a['kode_admin']?>" placeholder="Enter Kode" disabled>
													</p>

													<p>
														<input type="text" class="form-control" id=""  name="nama_admin" placeholder="Enter Nama" value="<?= $a['nama_admin']?>">
													</p>

													<div class="form-group">
														<select name="jk" class="form-select" id="basicSelect" required">
															<option value="" disabled="">Jenis Kelamin</option>
															<option <?=$a['jk']==='L'?'selected':''?>>L</option>
															<option <?=$a['jk']==='P'?'selected':''?>>P</option>               
														</select>
													</div>

													<p>
														<input type="text" class="form-control" id=""  name="alamat" placeholder="Enter Alamat" value="<?= $a['alamat']?>">
													</p>

													<p>
														<input type="text" class="form-control" id=""  name="no_hp" placeholder="Enter No Handphone" value="<?= $a['no_hp']?>">
													</p>

													<p>
														<input type="email" class="form-control" id=""  name="email" placeholder="Enter Email" value="<?= $a['email']?>">
													</p>

													<div class="form-group">
														<select name="status" class="form-select" id="basicSelect" required">
															<option value="" disabled="">Status</option>
															<option <?=$a['status']==='Aktif'?'selected':''?>>Aktif</option>
															<option <?=$a['status']==='Non-Aktif'?'selected':''?>>Non-Aktif</option>	
														</select>
													</div>

													<p>
														<div class="panel panel-default">
															<div class="panel-body text-center">
																<img src="<?= base_url('assets/images/faces/') ?><?= $a['foto'] ?>" alt="Profile" style="min-height: 75px; max-height:75px;"/>
															</div><br>
															<div class="panel-footer">
																<input class="form-control" type="file" id="foto" name="foto">
															</div>
														</div>
													</p>

												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
														<i class="bx bx-x d-block d-sm-none"></i>
														<span class="d-none d-sm-block">Close</span>
													</button>
													<button type="submit" class="btn btn-info ml-1">
														<i class="bx bx-check d-block d-sm-none"></i>
														<span class="d-none d-sm-block">Accept</span>
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>

							<button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#hapus<?= $a['id_admin'] ?>"><span class="fa-fw select-all fas"></span>
							</button>
							<!--Proses hapus-->
							<div class="modal fade text-left" id="hapus<?=$a['id_admin']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
									<div class="modal-content">
										<div class="modal-header bg-info">
											<h5 class="modal-title white" id="myModalLabel130">
												Hapus Data Admin
											</h5>
										</div>
										<div class="modal-body">
											<p>Apakah anda yakin ingin menghapus data dengan username = <?= $a['nama_admin']?></p>

										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
												<i class="bx bx-x d-block d-sm-none"></i>
												<span class="d-none d-sm-block">Close</span>
											</button>
										</button>
										<a button type="submit" class="btn btn-info ml-1" href="<?= base_url('Admin/deleteAdmin')?>/<?= $a['id_admin']?>">
											<i class="bx bx-check d-block d-sm-none"></i>
											<span class="d-none d-sm-block">Hapus</span>
										</a>
									</div>
								</div>
							</div>
							<!--End modals Ubah data -->
						</div>
					</td>
				<?php endforeach ?>
			</tr>
		</tbody>
	</table>
</div>
</div>
</div>
</div>

<?php $this->load->view("Admin/layout/footer"); ?>