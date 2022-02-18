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
							
					<!--User page-->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="card custom-content-area">
							<div class="card-header"> 
								<?php echo anchor('ct_backend/index', '<span class="fa fa-puzzle-piece"></span> Dashboard', 'title="Dashboard"');?> / Add User
							</div>
							<div class="card-body p-4">	
								<?php echo form_open_multipart('ct_backend/add_user', ['class'=>'custom-form-input custom-form-button']); ?> 
									<div class="row">									
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-2">	
											<?php echo form_input(['name'=>'referenced_by', 'type'=>'hidden', 'value'=>$logged_user_id]); ?>										
											<div class="form-group">
												<?php echo form_label('Full Name');?>	
												<input type="text" name="first_name" class="form-control" placeholder="First Name" value="<?php if(isset($_POST['first_name'])){ echo htmlentities($_POST['first_name']);}?>" />
												<input type="text" name="last_name" class="form-control" placeholder="Last Name" value="<?php if(isset($_POST['last_name'])){ echo htmlentities($_POST['last_name']);}?>" />
											</div>	
											
											<div class="form-group">
												<?php echo form_label('Mobile');?>	
												<input type="text" name="mobile" class="form-control" placeholder="Mobile number" value="<?php if(isset($_POST['mobile'])){ echo htmlentities($_POST['mobile']);}?>" />
											</div>	
											
											<div class="form-group">
												<?php echo form_error('email', '<div class="text-danger">', '</div>');?>
												<?php echo form_label('Email');?>	
												<input type="email" name="email" class="form-control" placeholder="Email" value="<?php if(isset($_POST['email'])){ echo htmlentities($_POST['email']);}?>" />
											</div>		
											
											<div class="form-group">
												<?php echo form_error('password', '<div class="text-danger">', '</div>');?>
												<?php echo form_label('Password');?>		
												<input type="text" name="password" class="form-control" placeholder="Password" value="<?php if(isset($_POST['password'])){ echo htmlentities($_POST['password']);}?>" />
												<input type="text" name="re_password" class="form-control" placeholder="Re password" value="<?php if(isset($_POST['re_password'])){ echo htmlentities($_POST['re_password']);}?>" />
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
											
											<div class="form-group">
												<?php echo form_label('Position');?>
												<select name="position" class="custom-select">
												  <option value="Reporter">Reporter</option>
												  <option value="Moderator">Moderator</option>
												  <option value="Admin">Admin</option>
												</select>
											</div>	
											
											<div class="form-group">
												<?php echo form_label('Link');?>	
												<input type="text" name="web_link" class="form-control" placeholder="Link" value="<?php if(isset($_POST['web_link'])){ echo htmlentities($_POST['web_link']);}?>" />
											</div>	
										</div>
										
										<div class="col-xl-1 col-lg-1 col-md-1 col-sm-12">
										</div>
									
										<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-2">
											<?php echo form_label('Profile Picture');?>												
											<img src="<?php echo base_url();?>assets/images/default/avatar_blank.png" id="profile-img-tag" class="img-thumbnail" width="100%" height="250" alt="Profile Image" />
											
											<div class="custom-file my-3">
												<?php echo form_upload(['name'=>'image', 'class'=>'custom-file-input', 'id'=>'profile-img']); ?>
												<label class="custom-file-label" for="profile-img">Profile picture</label>
											</div>		
											
											<div class="form-group">
												<?php echo form_label('Address');?>	
												<textarea name="address" rows="10" class="form-control" placeholder="Address"><?php if(isset($_POST['address'])){ echo htmlentities($_POST['address']);}?></textarea>
											</div>																							
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
					<!--End User page-->	
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
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$('#profile-img-tag').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}
		
		profile_image();
		function profile_image(){
			$("#profile-img").change(function(){
				readURL(this);
			});
		}
	</script>	
	<!--End Input Image File Preview-->	
</body>
</html>	