<script src="<?php echo base_url('assets'); ?>/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url('assets'); ?>/ckeditor/adapters/jquery.js"></script>
<script>
$( document ).ready( function() {
	$( 'textarea.content' ).ckeditor();
} );
</script>
<div class="container">
	<!-- Breadcrumbs line -->
	<div class="crumbs">
		<ul id="breadcrumbs" class="breadcrumb">		
			<li class="current">
				<a href="#"><?php echo $title; ?></a>
			</li>			
		</ul>

		<ul class="crumb-buttons">
			<li><a href="<?php echo site_url('webadmin/team/data');?>"  title="Back to List"><i class="icon-hand-left"></i><span>BACK TO LIST</span></a></li>
		</ul>
	</div>
	<!-- /Breadcrumbs line -->
	<div class="page-header"></div>

	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4><i class="icon-reorder"></i> <?php echo $title; ?></h4>
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
				<form class="form-horizontal row-border" action="<?php echo site_url('webadmin/team/submit'); ?>" method="post" enctype="multipart/form-data">
					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
					<div class="form-group">
						<label class="col-md-2 control-label">Name:</label>
						<div class="col-md-4">
							<input type="name" name="name" class="form-control">
						</div>
					</div>					
					<div class="form-group">
						<label class="col-md-2 control-label">Position:</label>
						<div class="col-md-8">
							<input type="name" name="position" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Photo:</label>
						<div class="col-md-8">
							<img src="#" style="display:none;margin-bottom:10px;" id="imgInp" />
							<input type="file" data-style="fileinput" name="userfile" id="pic" />
							<span class="help-block">Filetype: jpg, png, or gif, max size: 2MB, Max Resolution 1024x1024</span>
						</div>
					</div>					
					<div class="form-group">
						<label class="col-md-2 control-label">Description:</label>
						<div class="col-md-9">
							<textarea rows="15" name="description" class="form-control content"></textarea>
						</div>
					</div>			
					<div class="form-group">
						<label class="col-md-2 control-label">Twitter:</label>
						<div class="col-md-4">
							<input type="name" name="twitter" class="form-control">
						</div>
					</div>			
					<div class="form-group">
						<label class="col-md-2 control-label">Linkedin:</label>
						<div class="col-md-4">
							<input type="name" name="linkedin" class="form-control">
						</div>
					</div>															
					<div class="row">
						<div class="table-footer">
							<div class="col-md-6">
							</div>
							<div class="col-md-4">
								<button class="btn btn-primary navbar-right">SUBMIT DATA</button>
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

		$( ".datepicker" ).datepicker({
			defaultDate: +7,
			showOtherMonths:true,
			autoSize: true,
			appendText: '<span class="help-block">(dd-mm-yyyy)</span>',
			dateFormat: 'dd-mm-yy'
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