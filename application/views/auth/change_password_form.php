<?php
$old_password = array(
	'name'	=> 'old_password',
	'id'	=> 'old_password',
	'value' => set_value('old_password'),
	'class' => 'form-control',
	'size' 	=> 30,
);
$new_password = array(
	'name'	=> 'new_password',
	'id'	=> 'new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'class' => 'form-control',
	'size'	=> 30,
);
$confirm_new_password = array(
	'name'	=> 'confirm_new_password',
	'id'	=> 'confirm_new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'class' => 'form-control',
	'size' 	=> 30,
);
?>
<div class="container">
	<!-- Breadcrumbs line -->
	<div class="crumbs">
		<ul id="breadcrumbs" class="breadcrumb">
			<li class="current">
				<i class="icon-key"></i>
				Change Password
			</li>
		</ul>

<!-- 					<ul class="crumb-buttons">
			<li><a href="charts.html" title=""><i class="icon-signal"></i><span>Statistics</span></a></li>
		</ul> -->
	</div>
	<!-- /Breadcrumbs line -->

	<!--=== Page Header ===-->
	<!-- /Page Header -->
	<?php echo form_open($this->uri->uri_string()); ?>
	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
	<table class="table-no-inner-border" style="margin: 28px;">
		<tr>
			<td style="padding:5px;"><?php echo form_label('Old Password', $old_password['id']); ?></td>
			<td style="padding:5px;"><?php echo form_password($old_password); ?></td>
			<td style="color: red;"><?php echo form_error($old_password['name']); ?><?php echo isset($errors[$old_password['name']])?$errors[$old_password['name']]:''; ?></td>
		</tr>
		<tr>
			<td style="padding:5px;"><?php echo form_label('New Password', $new_password['id']); ?></td>
			<td style="padding:5px;"><?php echo form_password($new_password); ?></td>
			<td style="color: red;"><?php echo form_error($new_password['name']); ?><?php echo isset($errors[$new_password['name']])?$errors[$new_password['name']]:''; ?></td>
		</tr>
		<tr>
			<td style="padding:5px;"><?php echo form_label('Confirm New Password', $confirm_new_password['id']); ?></td>
			<td style="padding:5px;"><?php echo form_password($confirm_new_password); ?></td>
			<td style="color: red;"><?php echo form_error($confirm_new_password['name']); ?><?php echo isset($errors[$confirm_new_password['name']])?$errors[$confirm_new_password['name']]:''; ?></td>
		</tr>		
		<tr>
			<td style="padding:5px;"></td>
			<td style="padding:5px;"><button class="btn btn-primary navbar-right">CHANGE PASSWORD</button></td>
			<td style="color: red;"></td>
		</tr>
	</table>
	<?php //echo form_submit('change', 'Change Password'); ?>
	<?php echo form_close(); ?>
</div>
<!-- /.container -->