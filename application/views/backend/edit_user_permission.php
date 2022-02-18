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
							
					<!--Edit User Permission-->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="card custom-content-area">
							<div class="card-header"> 
								<?php echo anchor('ct_backend/index', '<span class="fa fa-puzzle-piece"></span> Dashboard', 'title="Dashboard"');?> / User Permission
							</div>
							<div class="card-body p-4">								
								<div class="row">
									<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
										<div class="responsive-table table-custom">	
											<?php 
												if(!empty($target_user_permission->user_id)){
											?>
											<?php echo form_open("ct_backend/edit_user_permission/{$target_user_permission->user_id}", ['id'=>'user_permission_form', 'class'=>'custom-form-input custom-form-button']); ?>
												<table class="table">
													<thead>
														<tr>
															<th>Option</th>
															<th>Status</th>
														</tr>
													</thead>
													<tbody>	
														<tr>
															<td><span class="fa fa-plus"></span> Add</td>
															<td>
																<div class="form-group">
																	<label class="custom-switch">
																		<?php 
																			if($target_user_permission->add_data == 1){
																				echo form_checkbox('add_data', 1, True);
																			}else{
																				echo form_checkbox('add_data', 1, False);
																			}
																		?>
																		<span class="custom-switch-checkbox-slider"></span>
																	</label>
																</div>	
															</td>
														</tr>
														<tr>
															<td><span class="fa fa-cut"></span> Edit</td>
															<td>
																<div class="form-group">
																	<label class="custom-switch">
																		<?php 
																			if($target_user_permission->edit_data == 1){
																				echo form_checkbox('edit_data', 1, True);
																			}else{
																				echo form_checkbox('edit_data', 1, False);
																			}
																		?>
																		<span class="custom-switch-checkbox-slider"></span>
																	</label>
																</div>	
															</td>
														</tr>
														<tr>
															<td><span class="fa fa-eye"></span> View</td>
															<td>
																<div class="form-group">
																	<label class="custom-switch">
																		<?php 
																			if($target_user_permission->view_data == 1){
																				echo form_checkbox('view_data', 1, True);
																			}else{
																				echo form_checkbox('view_data', 1, False);
																			}
																		?>
																		<span class="custom-switch-checkbox-slider"></span>
																	</label>
																</div>	
															</td>
														</tr>
														<tr>
															<td><span class="fa fa-trash"></span> Delete</td>
															<td>
																<div class="form-group">
																	<label class="custom-switch">
																		<?php 
																			if($target_user_permission->delete_data == 1){
																				echo form_checkbox('delete_data', 1, True);
																			}else{
																				echo form_checkbox('delete_data', 1, False);
																			}
																		?>
																		<span class="custom-switch-checkbox-slider"></span>
																	</label>
																</div>	
															</td>
														</tr>
														<tr>
															<td><span class="fa fa-bezier-curve"></span> Category</td>
															<td>
																<div class="form-group">
																	<label class="custom-switch">
																		<?php 
																			if($target_user_permission->category == 1){
																				echo form_checkbox('category', 1, True);
																			}else{
																				echo form_checkbox('category', 1, False);
																			}
																		?>
																		<span class="custom-switch-checkbox-slider"></span>
																	</label>
																</div>	
															</td>
														</tr>
														<tr>
															<td><span class="fa fa-envelope"></span> Message</td>
															<td>
																<div class="form-group">
																	<label class="custom-switch">
																		<?php 
																			if($target_user_permission->message == 1){
																				echo form_checkbox('message', 1, True);
																			}else{
																				echo form_checkbox('message', 1, False);
																			}
																		?>
																		<span class="custom-switch-checkbox-slider"></span>
																	</label>
																</div>	
															</td>
														</tr>
														<tr>
															<td><span class="fa fa-pager"></span> Page</td>
															<td>
																<div class="form-group">
																	<label class="custom-switch">
																		<?php 
																			if($target_user_permission->page == 1){
																				echo form_checkbox('page', 1, True);
																			}else{
																				echo form_checkbox('page', 1, False);
																			}
																		?>
																		<span class="custom-switch-checkbox-slider"></span>
																	</label>
																</div>	
															</td>
														</tr>
														<tr>
															<td><span class="fa fa-newspaper"></span> News</td>
															<td>
																<div class="form-group">
																	<label class="custom-switch">
																		<?php 
																			if($target_user_permission->news == 1){
																				echo form_checkbox('news', 1, True);
																			}else{
																				echo form_checkbox('news', 1, False);
																			}
																		?>
																		<span class="custom-switch-checkbox-slider"></span>
																	</label>
																</div>	
															</td>
														</tr>
														<tr>
															<td><span class="fa fa-images"></span> Gallery</td>
															<td>
																<div class="form-group">
																	<label class="custom-switch">
																		<?php 
																			if($target_user_permission->gallery == 1){
																				echo form_checkbox('gallery', 1, True);
																			}else{
																				echo form_checkbox('gallery', 1, False);
																			}
																		?>
																		<span class="custom-switch-checkbox-slider"></span>
																	</label>
																</div>	
															</td>
														</tr>
														<tr>
															<td><span class="fab fa-youtube"></span> Video</td>
															<td>
																<div class="form-group">
																	<label class="custom-switch">
																		<?php 
																			if($target_user_permission->video == 1){
																				echo form_checkbox('video', 1, True);
																			}else{
																				echo form_checkbox('video', 1, False);
																			}
																		?>
																		<span class="custom-switch-checkbox-slider"></span>
																	</label>
																</div>	
															</td>
														</tr>
														<tr>
															<td><span class="fa fa-ad"></span> Advertisement</td>
															<td>
																<div class="form-group">
																	<label class="custom-switch">
																		<?php 
																			if($target_user_permission->advertisement == 1){
																				echo form_checkbox('advertisement', 1, True);
																			}else{
																				echo form_checkbox('advertisement', 1, False);
																			}
																		?>
																		<span class="custom-switch-checkbox-slider"></span>
																	</label>
																</div>	
															</td>
														</tr>
														<tr>
															<td><span class="fa fa-code"></span> SEO</td>
															<td>
																<div class="form-group">
																	<label class="custom-switch">
																		<?php 
																			if($target_user_permission->seo == 1){
																				echo form_checkbox('seo', 1, True);
																			}else{
																				echo form_checkbox('seo', 1, False);
																			}
																		?>
																		<span class="custom-switch-checkbox-slider"></span>
																	</label>
																</div>	
															</td>
														</tr>
														<tr>
															<td><span class="fa fa-boxes"></span> Widget</td>
															<td>
																<div class="form-group">
																	<label class="custom-switch">
																		<?php 
																			if($target_user_permission->widget == 1){
																				echo form_checkbox('widget', 1, True);
																			}else{
																				echo form_checkbox('widget', 1, False);
																			}
																		?>
																		<span class="custom-switch-checkbox-slider"></span>
																	</label>
																</div>	
															</td>
														</tr>
														<tr>
															<td><span class="fa fa-archive"></span> Poll</td>
															<td>
																<div class="form-group">
																	<label class="custom-switch">
																		<?php 
																			if($target_user_permission->poll == 1){
																				echo form_checkbox('poll', 1, True);
																			}else{
																				echo form_checkbox('poll', 1, False);
																			}
																		?>
																		<span class="custom-switch-checkbox-slider"></span>
																	</label>
																</div>	
															</td>
														</tr>
														<tr>
															<td><span class="fa fa-user-edit"></span> User</td>
															<td>
																<div class="form-group">
																	<label class="custom-switch">
																		<?php 
																			if($target_user_permission->user == 1){
																				echo form_checkbox('user', 1, True);
																			}else{
																				echo form_checkbox('user', 1, False);
																			}
																		?>
																		<span class="custom-switch-checkbox-slider"></span>
																	</label>
																</div>	
															</td>
														</tr>
														<tr>
															<td><span class="fa fa-user-check"></span> User Permission</td>
															<td>
																<div class="form-group">
																	<label class="custom-switch">
																		<?php 
																			if($target_user_permission->user_permission == 1){
																				echo form_checkbox('user_permission', 1, True);
																			}else{
																				echo form_checkbox('user_permission', 1, False);
																			}
																		?>
																		<span class="custom-switch-checkbox-slider"></span>
																	</label>
																</div>	
															</td>
														</tr>
														<tr>
															<td><span class="fa fa-columns"></span> Sketch</td>
															<td>
																<div class="form-group">
																	<label class="custom-switch">
																		<?php 
																			if($target_user_permission->sketch == 1){
																				echo form_checkbox('sketch', 1, True);
																			}else{
																				echo form_checkbox('sketch', 1, False);
																			}
																		?>
																		<span class="custom-switch-checkbox-slider"></span>
																	</label>
																</div>	
															</td>
														</tr>
														<tr>
															<td><span class="fa fa-tools"></span> Setting</td>
															<td>
																<div class="form-group">
																	<label class="custom-switch">
																		<?php 
																			if($target_user_permission->setting == 1){
																				echo form_checkbox('setting', 1, True);
																			}else{
																				echo form_checkbox('setting', 1, False);
																			}
																		?>
																		<span class="custom-switch-checkbox-slider"></span>
																	</label>
																</div>		
															</td>
														</tr>													
													</tbody>
												</table>
											<br />
											<?php echo form_button('', 'Save', 'id="edit_user_permission" class="btn btn-primary"');?>	
											<?php echo form_close(); ?> 							
											<?php 
												} 
											?> 							
										</div>
									</div>
								</div>
							</div>
						</div>					
					</div>	
					<!--End Edit User Permission-->	
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
	
	<!--Ajax Query-->
	<script>	
	$(function(){	
		//Edit User Permission		
		$('#edit_user_permission').on('click', function(){	
			var url  = $('#user_permission_form').attr('action');
			var data = $('#user_permission_form').serialize();
			
			$.ajax({
				type: 'ajax',
				method: 'post',
				url: url,
				data: data,
				async: false,
				dataType: 'json',
				success: function(response){
					if(response.success){					
						toast();
						function toast(){
							$.toast({
								text: 'User permission '+response.type+' successfully!', 		
								icon: 'success' 
							});
						}
					}else{						
						toast();
						function toast(){
							$.toast({
								text: 'Operation unsuccessful!', 		
								icon: 'error' 
							});
						}
					}
				}					
			});
		});
		//End Edit User Permission	
	});
	</script>
	<!--End Ajax Query-->	
</body>
</html>