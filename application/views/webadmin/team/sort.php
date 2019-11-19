<style>
  #sort { list-style-type: none; margin: 0; padding: 0; width: 100%; }
  #sort li { margin: 0 5px 5px 5px; padding: 10px; background: #E4E4E4; cursor: move; }
  #sort li span { position: absolute; margin-left: 9px; }
  </style>
<div class="container">
<!-- Breadcrumbs line -->
	<div class="crumbs">
		<ul id="breadcrumbs" class="breadcrumb">
			<li>
				<i class="icon-tags"></i>
				<a href="#"><?php echo $title; ?> Management</a>
			</li>			
			<li>
				<a href="#"><?php echo $title; ?> List</a>
			</li>			
			<li class="current">
				<a href="#"> Edit <?php echo $title; ?> Position</a>
			</li>
		</ul>
		<ul class="crumb-buttons">
			<li><a href="<?php echo site_url('webadmin/team/data/'); ?>" title="add data team"><i class="icon-plus"></i><span>BACK TO LIST</span></a></li>
		</ul>
	</div>
	<!-- /Breadcrumbs line -->
	<!--=== Page Header ===-->
	<div class="page-header"></div>
	<!-- /Page Header -->

	<div class="col-md-8">
		<div class="widget box">
			<div class="widget-header">
				<h4><i class="icon-reorder"></i> Edit <?php echo $title; ?> Position</h4>
			</div>
			<div class="widget-content ">
				<!-- <div style="clear:both; height:10px;"></div> -->
				<?php if($this->session->flashdata('done')){ ?>
					<div class="alert alert-success fade in">
						<i class="icon-remove close" data-dismiss="alert"></i>
						<strong>Success!</strong> <?php echo 'data '.$this->session->flashdata('done'); ?> 
					</div>
				<?php } ?>								
				<?php if($this->session->flashdata('warning')){ ?>
					<div class="alert alert-danger fade in">
						<i class="icon-remove close" data-dismiss="alert"></i>
						<strong>Success!</strong> <?php echo 'data '.$this->session->flashdata('warning'); ?> 
					</div>
				<?php } ?>
				<?php if($list->num_rows() == 0 ){ ?> <div class="well well-sm"> No Data Found</div>
				<?php }else{
					$i = 1;
					echo "<ul id='sort'>";// $i = 1;
					foreach ( $list->result() as  $row ) { ?>
					<li id="<?php echo $row->id; ?>"><i class="icon-sort"></i><span><?php echo $row->name; ?></span></li>

					<?php
						
					}
					echo "</ul>";
				}
				?>						
				<div class="row">
					<div class="table-footer">
						<div class="col-md-6">
						</div>
						<div class="col-md-6">
							<form class="form-horizontal row-border" action="<?php echo site_url('webadmin/team/update_position'); ?>" method="post" enctype="multipart/form-data">
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
								<input type="hidden" name="position" class="position" />
								<button class="btn btn-primary navbar-right">UPDATE POSITION</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<!-- /Table with Footer -->
</div>
<script>
	$(document).ready(function() {
		$('#sort').sortable({
		update: function(event, ui) {
			var result = $(this).sortable('toArray');
			$('.position').val(result);
			}
	});
	});
</script>