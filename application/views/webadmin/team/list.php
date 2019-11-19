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
				<a href="#"><?php echo $title; ?></a>
			</li>			
		</ul>
		<ul class="crumb-buttons">
			<li><a href="<?php echo site_url('webadmin/team/add/'); ?>" title="add data team"><i class="icon-plus"></i><span>ADD DATA</span></a></li>
			<li><a data-toggle="modal" href="<?php echo site_url('webadmin/team/edit_position/'); ?>"><i class="icon-sort"></i><span>EDIT POSITION</span></a></li>
		</ul>
	</div>
	<!-- /Breadcrumbs line -->
	<!--=== Page Header ===-->
	<div class="page-header"></div>
	<!-- /Page Header -->

	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4><i class="icon-reorder"></i> All <?php echo $title; ?></h4>
			</div>
			<div class="widget-content ">
				<!-- <div style="clear:both; height:10px;"></div> -->
				<?php if($this->session->flashdata('done')){ ?>
					<div class="alert alert-success fade in">
						<i class="icon-remove close" data-dismiss="alert"></i>
						<strong>Success!</strong> <?php echo 'team '.$this->session->flashdata('done'); ?> 
					</div>
				<?php } ?>								
				<?php if($this->session->flashdata('warning')){ ?>
					<div class="alert alert-danger fade in">
						<i class="icon-remove close" data-dismiss="alert"></i>
						<strong>Success!</strong> <?php echo 'team '.$this->session->flashdata('warning'); ?> 
					</div>
				<?php } ?>
				<?php if($list->num_rows() == 0 ){ ?> <div class="well well-sm"> No Data Found</div>
				<?php }else{
					$i = $page_offset + 1;
					// $i = 1;
					foreach ( $list->result() as  $row ) {
						$twitter = ($row->twitter) ? $row->twitter : '-' ;
						$linkedin = ($row->linkedin) ? $row->linkedin : '-' ;
						$social = 'Twitter: '. $twitter.'<br />';
						$social .= 'Linkedin: '. $linkedin.'<br />';
						$desc = '<a data-toggle="modal" href="#DescModal'.$row->id.'">View Description</a>';
						$pict = "<img src='".base_url('uploads/team/'.$row->picture)."' style='width:200px;' />";
						$action = '<span class="btn-group align-center" style="width:100%;">
										<a href="'.site_url('webadmin/team/edit/'.$row->id).'" class="bs-tooltip" title="" data-original-title="Edit"><i class="icon-pencil"></i></a>
										<a href="'.site_url('webadmin/team/delete/'.$row->id).'" class="bs-tooltip confirm-dialog" title="" data-original-title="Delete"><i class="icon-trash"></i></a>
									</span>';
						$this->table->add_row($i, $row->name, $row->position, $pict, $social, $desc, $action);
						$i++;
					}
					echo $this->table->generate();
				}
				?>						
				<div class="row">
					<div class="table-footer">
						<div class="col-md-6">
						</div>
						<div class="col-md-6">
							<?php echo $pagination; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<!-- /Table with Footer -->
</div>
	<!-- /.container -->

<?php foreach ($list->result() as $dt) { ?>
	<!-- Modal dialog -->
	<div class="modal fade" id="DescModal<?php echo $dt->id; ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Description</h4>
				</div>
				<div class="modal-body">
					<?php echo $dt->description; ?>
				</div>
				<div class="modal-footer">
					<!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->	
<?php } ?>