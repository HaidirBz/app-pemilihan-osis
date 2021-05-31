 <div id="main">
 	<header class="mb-3">
 		<a href="#" class="burger-btn d-block d-xl-none">
 			<i class="bi bi-justify fs-3"></i>
 		</a>
 	</header>

 	<div class="page-heading">
 		<h3>AKSES ADMIN</h3>
 	</div>

 	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 		<?php if ($this->session->flashdata('scc')) { ?>
 		<div class="alert  alert-success alert-dismissible fade show" role="alert">
 			<span class="badge badge-pill badge-success">Success</span> <?= $this->session->flashdata("scc") ?>
 			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 				<span aria-hidden="true">&times;</span>
 			</button>
 		</div>
 		
 		<?php } else if($this->session->flashdata('err')) { ?>
 		<div class="alert  alert-danger alert-dismissible fade show" role="alert">
 			<span class="badge badge-pill badge-danger">Field</span> <?= $this->session->flashdata("err") ?>
 			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 				<span aria-hidden="true">&times;</span>
 			</button>
 		</div>
 		<?php } ?>
 	</div>