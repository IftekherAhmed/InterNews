<!-- header  -->
<?php include('include/header.php');?>
<!--End header-->
	
	<!--Login form-->
	<?php echo form_open('ct_login/login'); ?> 		
		<div class="form-group">
			<?php echo form_error('email', '<div class="text-danger">', '</div>');?>
			<?php echo form_label('Email');?>
			<div class="input-group custom-form-left-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><span class="fa fa-envelope"></span></span>
				</div>									
				<?php echo form_input(['name'=>'email', 'class'=>'form-control', 'type'=>'email', 'placeholder'=>'Email']); ?>
			</div>
		</div>	
		<div class="form-group">
			<?php echo form_error('password', '<div class="text-danger">', '</div>');?>
			<?php echo form_label('Password');?>
			<div class="input-group custom-form-left-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><span class="fa fa-lock"></span></span>
				</div>									
				<?php echo form_input(['name'=>'password', 'class'=>'form-control', 'type'=>'password', 'placeholder'=>'Password']); ?>
			</div>
		</div>
		<div class="form-group">
			<label class="custom-switch">
				<?php echo form_checkbox('remember_me', 1, False);?>
				<span class="custom-switch-checkbox-slider"></span>remember me
			</label>
		</div>			
		<?php echo form_input(['type'=>'submit', 'name'=>'login', 'value'=>'Login', 'class'=>'btn btn-primary mt-2']);?>
	<?php echo form_close(); ?> 
	<!--End Login form-->	
    	
<!-- footer  -->
<?php include('include/footer.php');?>
<!--End footer-->
	