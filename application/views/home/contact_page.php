<!DOCTYPE html>
<html lang="en">
<!--including header section-->
<?php include('include/header.php');?>
<!--End including header section-->
<body>	
	<!--including header_bar section-->
	<?php include('include/header_bar.php');?>
	<!--End including header_bar section-->
	
	<!--main content area-->
	<div class="container-fluid main-content">	
		<div class="row">			
			
			<!--lefte side-->
			<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 left-side">
				<div class="page-area">
					<div class="row">
					
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="page-content">							
								<div class="page-desc">
									<h3>Contact</h3>
									<div class="row">
										<div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
											<table class="table table-border contact-list">
											<?php if(!empty($setting_data->phone)){?>
												<tr>
													<td><span class="fa fa-phone"></span></td>
													<td>
														<a href="#"><?php echo $setting_data->phone; ?></a> 
													</td>
												</tr>
											<?php }?>
											<?php if(!empty($setting_data->email)){?>
												<tr>
													<td><span class="fa fa-envelope"></span></td>
													<td>
														<a href="mailto:<?php echo $setting_data->email; ?>"><?php echo $setting_data->email; ?></a> 
													</td>
												</tr>
											<?php }?>
											<?php if(!empty($setting_data->facebook)){?>
												<tr>
													<td><span class="fab fa-facebook-f"></span></td>
													<td>
														<a href="https://www.facebook.com/<?php echo $setting_data->facebook; ?>">Facebook</a> 
													</td>
												</tr>
											<?php }?>
											<?php if(!empty($setting_data->twitter)){?>
												<tr>
													<td><span class="fab fa-twitter"></span></td>
													<td>
														<a href="https://www.twitter.com/<?php echo $setting_data->twitter; ?>">Twitter</a> 
													</td>
												</tr>
											<?php }?>
											<?php if(!empty($setting_data->pinterest)){?>
												<tr>
													<td><span class="fab fa-pinterest"></span></td>
													<td>
														<a href="https://www.pinterest.com/<?php echo $setting_data->pinterest; ?>">Pinterest</a> 
													</td>
												</tr>
											<?php }?>
											<?php if(!empty($setting_data->instagram)){?>
												<tr>
													<td><span class="fab fa-instagram"></span></td>
													<td>
														<a href="https://www.instagram.com/<?php echo $setting_data->instagram; ?>">Instagram</a> 
													</td>
												</tr>
											<?php }?>
											<?php if(!empty($setting_data->youtube)){?>
												<tr>
													<td><span class="fab fa-youtube"></span></td>
													<td>
														<a href="https://www.youtube.com/<?php echo $setting_data->youtube; ?>">Youtube</a> 
													</td>
												</tr>
											<?php }?>
											<?php if(!empty($setting_data->snapchat)){?>
												<tr>
													<td><span class="fab fa-snapchat"></span></td>
													<td>
														<a href="https://www.snapchat.com/<?php echo $setting_data->snapchat; ?>">Snapchat</a> 
													</td>
												</tr>
											<?php }?>
											<?php if(!empty($setting_data->vimeo)){?>
												<tr>
													<td><span class="fab fa-vimeo"></span></td>
													<td>
														<a href="https://www.vimeo.com/<?php echo $setting_data->vimeo; ?>">Vimeo</a> 
													</td>
												</tr>
											<?php }?>
											</table>		
										</div>
										
										<div class="col-xl-1 col-lg-1 col-md-12 col-sm-12"></div>
										
										<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 custom-form">
											<?php echo form_open('ct_home/send_message'); ?> 
												<?php echo form_input(['name'=>'type', 'type'=>'hidden', 'value'=>'received']); ?>
												<div class="form-group">
													<?php echo form_error('from_email', '<div class="text-danger">', '</div>');?>
													<?php echo form_input(['name'=>'from_email', 'class'=>'form-control', 'type'=>'text', 'placeholder'=>'Email']); ?>
												</div>
												
												<div class="form-group">												
													<?php echo form_error('message', '<div class="text-danger">', '</div>');?>
													<?php echo form_textarea(['name'=>'message', 'class'=>'form-control', 'placeholder'=>'Message']); ?>
												</div>
												<?php echo form_submit(['name'=>'submit', 'class'=>'btn btn-primary', 'value'=>'Send']);?>
											<?php echo form_close(); ?>		
										</div>
										
									</div>	
								</div>
							</div>
						</div>						
					</div>					
				</div>
			</div>
			<!--End left-side-->
			
			<!--Right side-->
			<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 right-side sidebar-area">			
				<!--including sidebar section-->
				<?php include('include/sidebar.php');?>
				<!--End including sidebar section-->		
			</div>
			<!--End Right side-->
		</div>
	</div>
	<!--End main content area-->	

<!--including footer section-->
<?php include('include/footer.php');?>
<!--End including footer section-->

	<script>
		var base_url = '<?php echo base_url();?>';
		$(function() {		
			//Archive Search
			archive_search();
			function archive_search() {
				$( "#datepicker" ).datepicker({
					dateFormat: 'yy-mm-dd',
					changeMonth: true,
					changeYear: true,
					onSelect: function(dateText, inst) { 
					window.location = base_url+'archive/' + (dateText);
					}
				});
			}		
		});	
	</script>
</body>
</html>