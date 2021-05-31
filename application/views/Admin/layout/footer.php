<footer>
	<div class="footer clearfix mb-0 text-muted">
		<div class="float-start">
			<p>2021 &copy; Remake By.HaidirBz</p>
		</div>
	</footer>
</div>
</div>
<script src="<?= base_url();?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= base_url();?>/assets/js/bootstrap.bundle.min.js"></script>

<script src="<?= base_url()?>/assets/vendors/fontawesome/all.min.js"></script>

<script src="<?= base_url();?>/assets/vendors/apexcharts/apexcharts.js"></script>
<script src="<?= base_url();?>/assets/js/pages/dashboard.js"></script>

<script src="<?= base_url();?>/assets/js/main.js"></script>

<script src="<?= base_url()?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= base_url()?>/assets/js/bootstrap.bundle.min.js"></script>

<!--Data tables-->
<script src="<?= base_url()?>/assets/vendors/simple-datatables/simple-datatables.js"></script>
<script src="<?= base_url()?>/assets/assets/vendors/simple-datatables/simple-datatables.js"></script>

<script src="<?= base_url()?>/assets/vendors/jquery/jquery.min.js"></script>
<script src="<?= base_url()?>/assets/vendors/summernote/summernote-lite.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#summernote1').summernote({
            height:"150px",
            styleWithSpan:false
        });
        $('#summernote2').summernote({
            height:"150px",
            styleWithSpan:false
        });
        

    });

</script>

<script>
   let table = document.querySelector('#table');
   let dataTable = new simpleDatatables.DataTable(table);
</script>

</body>