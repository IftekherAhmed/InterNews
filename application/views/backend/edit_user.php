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
								<?php echo form_open_multipart("ct_backend/edit_user/{$user_data->id}", ['class'=>'custom-form-input custom-form-button']); ?> 
									<div class="row">									
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-2">												
											<div class="form-group">
												<?php echo form_label('Full Name');?>	
												<?php echo form_input(['name'=>'first_name', 'class'=>'form-control', 'placeholder'=>'First Name', 'value'=>$user_data->first_name]); ?>
												<?php echo form_input(['name'=>'last_name', 'class'=>'form-control', 'placeholder'=>'Last Name', 'value'=>$user_data->last_name]); ?>
											</div>	
											
											<div class="form-group">
												<?php echo form_label('Mobile');?>	
												<?php echo form_input(['name'=>'mobile', 'class'=>'form-control', 'placeholder'=>'Mobile number', 'value'=>$user_data->mobile]); ?>
											</div>	
											
											<div class="form-group">
												<?php echo form_error('email', '<div class="text-danger">', '</div>');?>
												<?php echo form_label('Email');?>	
												<?php echo form_input(['name'=>'email', 'type'=>'email', 'class'=>'form-control', 'placeholder'=>'Email', 'value'=>$user_data->email]); ?>
											</div>	
											
											<div class="form-group">
												<?php echo form_label('Birthday');?>	
												<?php echo form_input(['name'=>'dob', 'type'=>'date', 'class'=>'form-control']); ?>
											</div>												
											
											<div class="form-group">
												<?php echo form_label('Gender');?>
												<select name="gender" class="custom-select">
												  <option value="Male">Male</option>
												  <option value="Female">Female</option>
												  <option value="Other">Other</option>
												</select>
											</div>												
											
												<?php if($logged_user_position == "Admin"){ ?>
												<div class="form-group">
													<?php echo form_label('Position');?>
														<select name="position" class="custom-select">
														  <option value="Reporter">Reporter</option>
														  <option value="Moderator">Moderator</option>
														  <option value="Admin">Admin</option>
														</select>
												</div>	
												<?php }	?>
											
											<div class="form-group">
												<?php echo form_label('Link');?>	
												<?php echo form_input(['name'=>'web_link', 'class'=>'form-control', 'placeholder'=>'Link', 'value'=>$user_data->web_link]); ?>
											</div>			
											
											<div class="form-group">
											<?php
												if($logged_user_position == $user_data->id || $logged_user_position == "Admin"){
													echo form_label('Message');
													echo form_textarea(['name'=>'message', 'class'=>'form-control', 'placeholder'=>'Message', 'value'=>$user_data->message]);
												}
											?>
											</div>	
										</div>
										
										<div class="col-xl-1 col-lg-1 col-md-1 col-sm-12">
										</div>
									
										<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-2">
											<?php echo form_label('Profile Picture');?>												
											<img src="<?php echo base_url();?>assets/images/user/<?php echo $user_data->image;?>" id="profile-img-tag" class="img-thumbnail" width="100%" height="250" alt="Profile Image" />
											
											<div class="custom-file my-3">
												<?php echo form_upload(['name'=>'image', 'class'=>'custom-file-input', 'id'=>'profile-img']); ?>
												<label class="custom-file-label" for="profile-img">Profile picture</label>
											</div>		
											
											<div class="form-group">
												<?php echo form_label('Address');?>	
												<?php echo form_textarea(['name'=>'address', 'class'=>'form-control', 'placeholder'=>'Address', 'value'=>$user_data->address]); ?>
											</div>		
											<?php
												if($logged_user_id == $user_data->id || $logged_user_position == "Admin"){
													echo anchor('ct_backend/change_password_page/'.$user_data->id.'', 'Change Password', ['class' => 'mr-2 text-danger']); 
												}
												if($logged_user_position == "Admin"){
													echo anchor('ct_backend/edit_user_permission_page/'.$user_data->id.'', 'User Permission', ['class' => 'ml-2 text-info']);
												}
											?>
										</div>
									
										<div class="col-xl-1 col-lg-1 col-md-1 col-sm-12">										
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
		
	<!--Input Image File Preview-->
	<script>		
		profile_image();
		function profile_image(){
			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function (e) {
						$('#profile-img-tag').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				}
			}
			
			$("#profile-img").change(function(){
				readURL(this);
			});
		}
	</script>		
	<!--End Input Image File Preview-->
</body>
</html>	