<div class="container">
	<!-- Breadcrumbs line -->
	<div class="crumbs">
		<ul id="breadcrumbs" class="breadcrumb">
			<li class="current">
				<i class="icon-picture"></i>
				<a href="#">Banner Management</a>
			</li>
			<li>Edit Banner</li>
		</ul>

		<ul class="crumb-buttons">
			<li><a href="<?php echo site_url('webadmin/banner/data');?>"  title="Back to List"><i class="icon-hand-left"></i><span>BACK TO LIST</span></a></li>
		</ul>
	</div>
	<!-- /Breadcrumbs line -->
	<div class="page-header"></div>

	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4><i class="icon-reorder"></i>Edit Banner</h4>
				<div class="toolbar no-padding">
					<div class="btn-group">
						<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
					</div>
				</div>
			</div>
			<div class="widget-content">
				<?php if($this->session->flashdata('error')){ ?>
					<div class="alert alert-danger fade in">
						<i class="icon-remove close" data-dismiss="alert"></i>
						<strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
					</div>
				<?php } ?>
				<form class="form-horizontal row-border" action="<?php echo site_url('webadmin/banner/update'); ?>" method="post" enctype="multipart/form-data">
					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
					<input type="hidden" name="id" value="<?php echo $id; ?>" />
					<div class="form-group">
						<label class="col-md-2 control-label">Banner:</label>
						<div class="col-md-8">
							<img src="<?php echo base_url('uploads/banner'.$id.'.jpg'); ?>" style="margin-bottom:10px;" id="imgInp" />
							<img src="#" style="display:none;margin-bottom:10px;" id="imgInp" />
							<input type="file" data-style="fileinput" name="userfile" id="pic" />
							<span class="help-block">Filetype: jpg Only Max Resolution 1280X700</span>
						</div>
					</div>									
					<div class="row">
						<div class="table-footer">
							<div class="col-md-6">
							</div>
							<div class="col-md-4">
								<button class="btn btn-primary navbar-right">UPDATE DATA</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
		<!-- /Table with Footer -->				
			</div>
			<!-- /.container -->
<script>
	$(document).ready(function() {
		$('.select2-select-00').select2({
			allowClear: true
		});
		$("#pic").change(function(){
            readURL(this);
        });
            
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#imgInp').attr('src', e.target.result);
                    $('#imgInp').css('display', 'block');
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
	});
</script>