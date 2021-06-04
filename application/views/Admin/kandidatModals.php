<!--Tambah Data-->
<form enctype='multipart/form-data' action="<?=base_url("Admin/createKandidat")?>" method="POST">

	<div class="modal fade text-left" id="info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" 
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title white" id="myModalLabel130">
					Tambah Data Kandidat
				</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
					<i data-feather="x"></i>
				</button>
			</div>
			<div class="modal-body">

				<p>
					<input type="text" class="form-control" name="no_urut" value="<?php echo $no_urut;?>" readonly>
				</p>
				<p>
					<input type="text" class="form-control" name="nama_kandidat" placeholder="Enter Nama Ketua" required>
				</p>
				<p>
					<input type="text" class="form-control" name="nama_wakil_kandidat" placeholder="Enter Nama Wakil Kandidat" required>
				</p>
				<p>
					<input  id="foto" type="file" name="foto" class="form-control" required>
				</p>
				<p>
					<input type="text" class="form-control" name="masa_jabatan" placeholder="Enter Masa Jabatan" required>
				</p>
				<p>
					<input type="text" class="form-control" name="slogan" placeholder="Enter Slogan" required>
				</p>

				<section class="section">
					<div class="row">
						<div class="col-12">
							<div class="card-body">
								<textarea class="summernoteVisi" id="" name="visi" required><b>Visi Kandidat Osis</b><br>Masukan Visi Ketua dan Wakil Kandidat Osis</textarea>
							</div>
						</div>
					</div>
				</section>

				<section class="section">
					<div class="row">
						<div class="col-12">
							<div class="card-body">
								<textarea class="summernoteMisi" id="" name="misi" required><b>Misi Kandidat Osis</b><br>Masukan Misi Ketua dan Wakil Kandidat Osis</textarea>
							</div>
						</div>
					</div>
				</section>
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

<!-- Detail Data -->
<?php foreach ($kandidat as $detail):?> 

	<div class="modal fade text-left" id="detail<?= $detail['id_kandidat'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header bg-info">
					<h5 class="modal-title white" id="myModalLabel130">
						Detail Kandidat Osis
					</h5>
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body">
					<p align="center">
						<i><b>Slogan, Visi dan Misi Ketua dan Wakil Ketua Osis</b></i>
					</p>
					<hr>
					<p align="center">
						<img src="<?= base_url('assets/images/faces/') ?><?= $detail['foto'] ?>" alt="Profile" style="min-height: 350px; max-height:350px;"/>
					</p>

					<p align="center">
						<b>No Urut <?= $detail ['no_urut']?></b>
					</p>
					<hr>
					<p align="center">
						<i><b>Slogan : <?= $detail ['slogan'] ?></b></i>
					</p>

					<p align="">
						<?= $detail ['visi'] ?>
					</p>

					<p align="">
						<?= $detail ['misi'] ?>
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
<?php endforeach ?>

<!-- Edit Data -->
<?php foreach ($kandidat as $edit):?>

	<form enctype='multipart/form-data' action="<?=base_url("Admin/editKandidat")?>/<?=$edit['id_kandidat']?>" method="POST">

		<div class="modal fade text-left" id="edit<?=$edit['id_kandidat']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
				<div class="modal-content">
					<div class="modal-header bg-info">
						<h5 class="modal-title white" id="myModalLabel130">
							Ubah Data Kandidat
						</h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<i data-feather="x"></i>
						</button>
					</div>
					<div class="modal-body">
						<p>
							<input type="text" class="form-control" name="" value="<?= $edit['no_urut']?>" readonly>
						</p>
						<p>
							<input type="text" class="form-control" name="nama_kandidat" placeholder="Enter Nama Ketua" value="<?= $edit['nama_kandidat']?>">
						</p>
						<p>
							<input type="text" class="form-control" name="nama_wakil_kandidat" placeholder="Enter Nama Wakil Kandidat" value="<?= $edit['nama_wakil_kandidat']?>">
						</p>
						<p>
							<div class="panel panel-default">
								<div class="panel-body text-center">
									<img src="<?= base_url('assets/images/faces/') ?><?= $edit['foto'] ?>" alt="Profile" style="min-height: 75px; max-height:75px;"/>
								</div><br>
								<div class="panel-footer">
									<input class="form-control" type="file" id="foto" name="foto">
								</div>
							</div>
						</p>

						<p>
							<input type="text" class="form-control" name="masa_jabatan" placeholder="Enter Masa Jabatan" value="<?= $edit['masa_jabatan']?>">
						</p>
						<p>
							<input type="text" class="form-control" name="slogan" placeholder="Enter Slogan" value="<?= $edit['slogan']?>">
						</p>

						<div class="form-group">
							<select name="status" class="form-select" id="basicSelect"">
								<option value="" disabled="">Status</option>
								<option <?=$edit['status']==='Berjalan'?'selected':''?>>
								Berjalan</option>
								<option <?=$edit['status']==='Berakhir'?'selected':''?>>
								Berakhir</option>	
							</select>
						</div>

						<section class="section">
							<div class="row">
								<div class="col-12">
									<div class="card-body">
										<textarea class="summernoteVisi" id="" data-toggle="visi" name="visi"><?= $edit['visi']?></textarea>
									</div>
								</div>
							</div>
						</section>

						<section class="section">
							<div class="row">
								<div class="col-12">
									<div class="card-body">
										<textarea class="summernoteMisi" id="" name="misi"><?= $edit['misi']?></textarea>
									</div>
								</div>
							</div>
						</section>
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
<?php endforeach ?>

<!-- Hapus Data -->
<?php foreach ($kandidat as $hapus):?> 
	<div class="modal fade text-left" id="hapus<?=$hapus['id_kandidat']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header bg-info">
					<h5 class="modal-title white" id="myModalLabel130">
						Hapus Data Kandidat
					</h5>
				</div>
				<div class="modal-body">
					<p>Apakah anda yakin ingin menghapus data dengan no urut = <?= $hapus['no_urut']?></p>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
						<i class="bx bx-x d-block d-sm-none"></i>
						<span class="d-none d-sm-block">Close</span>
					</button>
				</button>
				<a button type="submit" class="btn btn-info ml-1" href="<?= base_url('Admin/deleteKandidat')?>/<?= $hapus['id_kandidat']?>">
					<i class="bx bx-check d-block d-sm-none"></i>
					<span class="d-none d-sm-block">Hapus</span>
				</a>
			</div>
		</div>
	</div>
</div>

<?php endforeach ?>