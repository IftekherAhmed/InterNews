<!DOCTYPE html>
<html lang="en">
<!--Header-->
<?php include('include/header.php');?>
<!--End Header-->
<body>

	<!--Wrapper-->
    <div class="wrapper">
	
        <!--Sidebar-->
        <?php include('include/sidebar.php');?>
		<!--End Sidebar-->
	
        <!--Page Content-->
        <div id="content">			
			
			<!--Header Bar-->
			<?php include('include/header_bar.php');?>
			<!--End Header Bar-->

			<!--Second Content-->	
			<div class="custom-content-area-wrapper">	
				<!--Row-->
				<div class="row">
							
					<!--User Page-->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="card custom-content-area">
							<div class="card-header"> 
								<?php echo anchor('ct_backend/index', '<span class="fa fa-puzzle-piece"></span> Dashboard', 'title="Dashboard"');?> / <?php echo $user_data->first_name."&nbsp;".$user_data->last_name; ?>
							</div>
							<div class="card-body p-4">	
								<?php echo form_open_multipart("ct_backend/change_password/{$user_data->id}", ['class'=>'custom-form-input custom-form-button']); ?> 
									<div class="row">									
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-2">													
											<div class="form-group">
												<?php echo form_label('Old Password');?>	
												<?php echo form_input(['name'=>'input_old_password', 'class'=>'form-control', 'placeholder'=>'Old Password']); ?>
											</div>			
											
											<div class="form-group">
												<?php echo form_label('New Password');?>	
												<?php echo form_input(['name'=>'password', 'class'=>'form-control', 'placeholder'=>'New Password']); ?>
												<?php echo form_input(['name'=>'re_password', 'class'=>'form-control', 'placeholder'=>'Re Password']); ?>
											</div>	
										</div>
										
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
											<?php echo form_error('input_old_password', '<div class="text-danger">', '</div>');?>
											<?php echo form_error('password', '<div class="text-danger">', '</div>');?>
											<?php echo form_error('re_password', '<div class="text-danger">', '</div>');?>
										</div>	
										
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
											<?php echo form_submit(['class'=>'btn btn-primary', 'type'=>'submit', 'value'=>'Save']);?>		
											<?php echo form_reset('', 'Reset', 'class="btn btn-danger"');?>	
										</div>										
									</div>
								</form>								
							</div>
						</div>					
					</div>	
					<!--End User Page-->	
				</div>
				<!--End Row-->
			</div>	
			<!--End Second Content Section-->
			
			<!--Copyright-->	
			<div class="col footer-bar">
				<div>
					<p>
						<?php echo $site_footer->copyright; ?>
					</p>
				</div>
			</div>
			<!--End Copyright-->				
        </div>	
		<!--End Page Content-->
    </div>
	<!--End Wrapper-->
	
<!--Footer-->
<?php include('include/footer.php');?>
<!--End Footer-->		
</body>
</html>	