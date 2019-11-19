<link rel="stylesheet" href="<?php echo base_url('assets'); ?>/plugins/textext/css/textext.core.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('assets'); ?>/plugins/textext/css/textext.plugin.tags.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('assets'); ?>/plugins/textext/css/textext.plugin.autocomplete.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('assets'); ?>/plugins/textext/css/textext.plugin.focus.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('assets'); ?>/plugins/textext/css/textext.plugin.prompt.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('assets'); ?>/plugins/textext/css/textext.plugin.arrow.css" type="text/css" />
<script src="<?php echo base_url('assets'); ?>/plugins/textext/js/textext.core.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url('assets'); ?>/plugins/textext/js/textext.plugin.tags.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url('assets'); ?>/plugins/textext/js/textext.plugin.autocomplete.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url('assets'); ?>/plugins/textext/js/textext.plugin.suggestions.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url('assets'); ?>/plugins/textext/js/textext.plugin.filter.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url('assets'); ?>/plugins/textext/js/textext.plugin.focus.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url('assets'); ?>/plugins/textext/js/textext.plugin.prompt.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url('assets'); ?>/plugins/textext/js/textext.plugin.ajax.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url('assets'); ?>/plugins/textext/js/textext.plugin.arrow.js" type="text/javascript" charset="utf-8"></script>
<style>
	.text-wrap{
		width: 100%!important;
	}

	.text-wrap input{
		width: 100%!important;
		padding: 10px 0px;
	}
</style>
<script src="<?php echo base_url('assets'); ?>/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url('assets'); ?>/ckeditor/adapters/jquery.js"></script>
<script>
$( document ).ready( function() {
	$( 'textarea.content' ).ckeditor();

    $('input[name="tag"]').textext({plugins : 'tags autocomplete', tagsItems: [<?php echo $tags; ?>]}).bind('getSuggestions', function(e, data)
        {
            var list = [
                    <?php
                    foreach ($tag as $tag) {
                    	echo "'$tag',";
                    }
                    ?>],
                textext = $(e.target).textext()[0],
                query = (data ? data.query : '') || ''
                ;

            $(this).trigger(
                'setSuggestions',
                { result : textext.itemManager().filter(list, query) }
            );
        });

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
			<li><a href="<?php echo site_url('webadmin/portfolio/data');?>"  title="Back to List"><i class="icon-hand-left"></i><span>BACK TO LIST</span></a></li>
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
				<form class="form-horizontal row-border" action="<?php echo site_url('webadmin/portfolio/update'); ?>" method="post" enctype="multipart/form-data">
					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
					<input type="hidden" name="id" value="<?php echo $row->id; ?>" />
					<div class="form-group">
						<label class="col-md-2 control-label">Name:</label>
						<div class="col-md-4">
							<input type="text" name="name" class="form-control" value="<?php echo $row->name; ?>">
						</div>
					</div>						
<!-- 					<div class="form-group">
						<label class="col-md-2 control-label">is listed?:</label>
						<div class="col-md-1">
							<input type="checkbox" class="checkbox form-control islisted" <?php echo ($row->listed == 1) ? 'checked="checked"' : '' ;?> value="1" name="listed" />
						</div>
					</div> -->
					<div class="form-group listed_by" style="display: <?php echo ($row->listed == 1) ? 'block' : 'none' ;?>;">
						<label class="col-md-2 control-label">Listed by:</label>
						<div class="col-md-3">
							<input type="text" name="listed_by" class="form-control" value="<?php echo $row->listed_by; ?>" />
						</div>
					</div>	
					<div class="form-group">
						<label class="col-md-2 control-label">Positioning:</label>
						<div class="col-md-4">
							<input type="text" name="positioning" class="form-control" value="<?php echo $row->positioning; ?>">
						</div>
					</div>	
					<div class="form-group">
						<label class="col-md-2 control-label">Picture:</label>
						<div class="col-md-8">
							<?php if ($row->picture != '') { ?>
							<img src="<?php echo base_url('uploads/portfolio/'.$row->picture); ?>" style="margin-bottom:10px;" id="imgInp" />
							<?php } else {?>
							<img src="#" style="display:none;margin-bottom:10px;" id="imgInp" />
							<?php } ?>
							<input type="file" data-style="fileinput" name="userfile" id="pic" />
							<span class="help-block">Filetype: jpg, png, or gif, max size: 2MB, Max Resolution 1024x1024</span>
						</div>
					</div>					
					<div class="form-group">
						<label class="col-md-2 control-label">Content:</label>
						<div class="col-md-9">
							<textarea rows="15" name="description" class="form-control content"><?php echo $row->description; ?></textarea>
						</div>
					</div>			
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-md-3 control-label">Twitter:</label>
										<div class="col-md-9">
											<input type="name" name="twitter" class="form-control" value="<?php echo $row->twitter; ?>" />
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-md-3 control-label">Facebook:</label>
										<div class="col-md-9">
											<input type="name" name="facebook" class="form-control" value="<?php echo $row->facebook; ?>" />
										</div>
									</div>									
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-md-3 control-label">Linkedin:</label>
										<div class="col-md-9">
											<input type="name" name="linkedin" class="form-control" value="<?php echo $row->linkedin; ?>" />
										</div>
									</div>
								</div>
								<div class="col-md-6">					
									<div class="form-group">
										<label class="col-md-3 control-label">Instagram:</label>
										<div class="col-md-9">
											<input type="name" name="instagram" class="form-control" value="<?php echo $row->instagram; ?>" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-md-3 control-label">Email:</label>
										<div class="col-md-9">
											<input type="name" name="mail" class="form-control" value="<?php echo $row->mail; ?>" />
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-md-3 control-label">url:</label>
										<div class="col-md-9">
											<input type="name" name="url" class="form-control" value="<?php echo $row->url; ?>" />
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>
<!-- 					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-md-3 control-label">tag:</label>
										<div class="col-md-9">
											<input type="name" name="tag" class="form-control" />
											<span class="help-block">Press Enter for separator</span>
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>	 -->									
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
        
        $('.islisted').change(function(event) {
        	if($(this).is(':checked')){
        		$('.listed_by').fadeIn();
        	}else{
        		$('.listed_by').fadeOut();
        		$('input[name="listed_by"]').val('');
        	}
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