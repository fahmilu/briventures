<script>
	$(document).ready(function() {
		$("a.confirm-dialog").click(function(e) {
			var url = $(this).attr("href");
			e.preventDefault();
			bootbox.confirm("Are you sure want to delete this item?", function(confirmed) {
				if(confirmed){
					window.location = url;
				}
				// console.log("Confirmed: "+confirmed);

			});
		});
	});
</script>
<div class="container">
<!-- Breadcrumbs line -->
	<div class="crumbs">
		<ul id="breadcrumbs" class="breadcrumb">
			<li class="current">
				<i class="icon-picture"></i>
				<a href="#">Banner Management</a>
			</li>
			<li>Banner List</li>
		</ul>
		<ul class="crumb-buttons">
			<li><a href="<?php echo site_url('webadmin/banner/add/'); ?>" title="add data banner"><i class="icon-plus"></i><span>ADD DATA</span></a></li>
		</ul>
	</div>
	<!-- /Breadcrumbs line -->
	<!--=== Page Header ===-->
	<div class="page-header"></div>
	<!-- /Page Header -->

	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4><i class="icon-reorder"></i> BANNER LIST</h4>
				<div class="toolbar no-padding">
					<div class="btn-group">
						<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
					</div>
				</div>
			</div>
			<div class="widget-content">
				<?php if($this->session->flashdata('done')){ ?>
					<script>
					$(document).ready(function() {
						setTimeout(function() { window.onload = window.location.reload(); }, 2000);
					});
					</script>
					<div class="alert alert-success fade in">
						<i class="icon-remove close" data-dismiss="alert"></i>
						<strong>Success!</strong> <?php echo 'Banner '.$this->session->flashdata('done'); ?> 
					</div>
				<?php } ?>								
				<?php if($this->session->flashdata('warning')){ ?>
					<div class="alert alert-danger fade in">
						<i class="icon-remove close" data-dismiss="alert"></i>
						<strong>Success!</strong> <?php echo 'Banner '.$this->session->flashdata('warning'); ?> 
					</div>
				<?php } ?>
				<?php for ($i=1; $i < 4; $i++){
						$pict = "<img src='".base_url('uploads/banner'.$i).".jpg' style='width: 300px;' />";
						$action = '<span class="btn-group align-center" style="width:100%;">
										<a href="'.site_url('webadmin/banner/edit/'.$i).'" class="bs-tooltip" title="" data-original-title="Edit"><i class="icon-pencil"></i> EDIT</a>
									</span>';
						$this->table->add_row($i, $pict, $action);
						}
					echo $this->table->generate();
				?>						
			</div>
		</div>
	</div>
		<!-- /Table with Footer -->
</div>
	<!-- /.container -->