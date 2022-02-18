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
							
					<!--Setting Page-->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="card custom-content-area">
							<div class="card-header"> 
								<?php echo anchor('ct_backend/index', '<span class="fa fa-puzzle-piece"></span> Dashboard', 'title="Dashboard"');?> / General Setting
							</div>
							<div class="card-body row p-4">															
								<!--Add Setting-->
								<?php echo form_open_multipart('ct_backend/edit_general_setting/1', ['id'=>'setting_form', 'class'=>'col custom-form-input custom-form-button']); ?> 
								<div class="row">
									<!--Setting Tab-->
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">							
										<div class="custom-tab">						
											<ul class="nav nav-tabs news-tab-nav" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" href="#general_setting_tab" role="tab" data-toggle="tab">
														<span class="fa fa-wrench"></span> General
													</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" href="#contact_setting_tab" role="tab" data-toggle="tab">
														<span class="fa fa-envelope"></span> Contact
													</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" href="#social_setting_tab" role="tab" data-toggle="tab">
														<span class="fa fa-project-diagram"></span> Social
													</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" href="#graphic_setting_tab" role="tab" data-toggle="tab">
														<span class="fa fa-images"></span> Graphic
													</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" href="#advance_setting_tab" role="tab" data-toggle="tab">
														<span class="fa fa-broom"></span> Advance
													</a>
												</li>
											</ul>
											<!-- Tab panes -->
											<div class="tab-content news-tab-container">
												<div role="tabpanel" class="tab-pane active" id="general_setting_tab">
													<div class="row mb-4">
														<div class="col-xl-2 col-lg-2 col-md-3 col-lg-12 mb-2">
															<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
																<a class="nav-link active m-0" id="v-pills-general-tab" data-toggle="pill" href="#v-pills-general" role="tab" aria-controls="v-pills-general" aria-selected="true">General</a>
																
																<a class="nav-link m-0" id="v-pills-header-tab" data-toggle="pill" href="#v-pills-header" role="tab" aria-controls="v-pills-header" aria-selected="false">Header</a>
																
																<a class="nav-link m-0" id="v-pills-footer-tab" data-toggle="pill" href="#v-pills-footer" role="tab" aria-controls="v-pills-footer" aria-selected="false">Footer</a>
																
																<a class="nav-link m-0" id="v-pills-news-tab" data-toggle="pill" href="#v-pills-news" role="tab" aria-controls="v-pills-news" aria-selected="false">News</a>
																
																<a class="nav-link m-0" id="v-pills-sidebar-tab" data-toggle="pill" href="#v-pills-sidebar" role="tab" aria-controls="v-pills-sidebar" aria-selected="false">Sidebar</a>
															</div>
														</div>
														
														<div class="col-xl-10 col-lg-10 col-md-9 col-lg-12">
															<div class="tab-content" id="v-pills-tabContent">
																<div class="tab-pane fade show active p-0" id="v-pills-general" role="tabpanel" aria-labelledby="v-pills-general-tab">
																	<div class="row">
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">
																			<div class="form-group">
																				<?php echo form_label('Pre loader');?>
																				<select name="pre_loader" class="custom-select">
																				<?php 
																					if($setting_data->pre_loader == 1){				
																				?>
																				  <option value="1">Show</option>
																				  <option value="0">Hide</option>
																				<?php
																					}else{
																				?>
																				  <option value="0">Hide</option>
																				  <option value="1">Show</option>
																				<?php																
																					}
																				?> 
																				</select>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Search');?>
																				<select name="search" class="custom-select">
																				<?php 
																					if($setting_data->search == 1){				
																				?>
																				  <option value="1">Show</option>
																				  <option value="0">Hide</option>
																				<?php
																					}else{
																				?>
																				  <option value="0">Hide</option>
																				  <option value="1">Show</option>
																				<?php																
																					}
																				?> 
																				</select>
																			</div>
															
																			<div class="form-group">
																				<?php echo form_label('Scroll up');?>
																				<select name="scroll_up" class="custom-select">
																				<?php 
																					if($setting_data->scroll_up == 1){				
																				?>
																				  <option value="1">Show</option>
																				  <option value="0">Hide</option>
																				<?php
																					}else{
																				?>
																				  <option value="0">Hide</option>
																				  <option value="1">Show</option>
																				<?php																
																					}
																				?> 
																				</select>
																			</div>
																		</div>
																	</div>
																</div>
																
																<div class="tab-pane fade p-0" id="v-pills-header" role="tabpanel" aria-labelledby="v-pills-header-tab">
																	<div class="row">
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">
																			<div class="form-group">
																				<?php echo form_label('Header: Location');?>
																				<select name="header_location" class="custom-select">
																				<?php 
																					if($setting_data->header_location == 1){				
																				?>
																				  <option value="1">Show</option>
																				  <option value="0">Hide</option>
																				<?php
																					}else{
																				?>
																				  <option value="0">Hide</option>
																				  <option value="1">Show</option>
																				<?php																
																					}
																				?> 
																				</select>
																			</div>	
																			
																			<div class="form-group">
																				<?php echo form_label('Header: Date');?>
																				<select name="header_date" class="custom-select">
																				<?php 
																					if($setting_data->header_date == 1){				
																				?>
																				  <option value="1">Show</option>
																				  <option value="0">Hide</option>
																				<?php
																					}else{
																				?>
																				  <option value="0">Hide</option>
																				  <option value="1">Show</option>
																				<?php																
																					}
																				?> 
																				</select>
																			</div>	
																		</div>
																		
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">
																			<div class="form-group">
																				<?php echo form_label('Header: Last Update');?>
																				<select name="header_last_update" class="custom-select">
																				<?php 
																					if($setting_data->header_last_update == 1){				
																				?>
																				  <option value="1">Show</option>
																				  <option value="0">Hide</option>
																				<?php
																					}else{
																				?>
																				  <option value="0">Hide</option>
																				  <option value="1">Show</option>
																				<?php																
																					}
																				?> 
																				</select>
																			</div>	
																			<div class="form-group">
																				<?php echo form_label('Sticky menu');?>
																				<select name="sticky_menu" class="custom-select">
																				<?php 
																					if($setting_data->pre_loader == 1){				
																				?>
																				  <option value="1">Yes</option>
																				  <option value="0">No</option>
																				<?php
																					}else{
																				?>
																				  <option value="0">No</option>
																				  <option value="1">Yes</option>
																				<?php																
																					}
																				?> 
																				</select>
																			</div>	
																		</div>
																	</div>																
																</div>
																
																<div class="tab-pane fade p-0" id="v-pills-footer" role="tabpanel" aria-labelledby="v-pills-footer-tab">
																	<div class="row">																		
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">
																			<div class="form-group">
																				<?php echo form_label('Copyright');?>
																				<?php echo form_error('copyright', '<div class="text-danger">', '</div>');?>
																				<?php echo form_input(['name'=>'copyright', 'class'=>'form-control', 'placeholder'=>'Copyright', 'value'=>$setting_data->copyright]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Footer Text');?>
																				<?php echo form_error('footer_text', '<div class="text-danger">', '</div>');?>
																				<?php echo form_textarea(['name'=>'footer_text', 'class'=>'form-control', 'placeholder'=>'Footer Text', 'value'=>$setting_data->footer_text]); ?>
																			</div>	
																		</div>
																		
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">
																			<div class="form-group">
																				<?php echo form_label('Footer bar');?>
																				<select name="footer_bar" class="custom-select">
																				<?php 
																					if($setting_data->footer_bar == 1){				
																				?>
																				  <option value="1">Show</option>
																				  <option value="0">Hide</option>
																				<?php
																					}else{
																				?>
																				  <option value="0">Hide</option>
																				  <option value="1">Show</option>
																				<?php																
																					}
																				?> 
																				</select>
																			</div>
																		</div>
																	</div>
																</div>
																
																<div class="tab-pane fade p-0" id="v-pills-news" role="tabpanel" aria-labelledby="v-pills-news-tab">
																	<div class="row">
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">
																			<div class="form-group">
																				<?php echo form_label('Breaking news title');?>
																				<?php echo form_error('breaking_news_title', '<div class="text-danger">', '</div>');?>
																				<?php echo form_input(['name'=>'breaking_news_title', 'class'=>'form-control', 'placeholder'=>'Breaking news title', 'value'=>$setting_data->breaking_news_title]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Breaking news');?>
																				<select name="breaking_news" class="custom-select">
																				<?php 
																					if($setting_data->breaking_news == 1){				
																				?>
																				  <option value="1">Show</option>
																				  <option value="0">Hide</option>
																				<?php
																					}else{
																				?>
																				  <option value="0">Hide</option>
																				  <option value="1">Show</option>
																				<?php																
																					}
																				?> 
																				</select>
																			</div>	
																			
																			<div class="form-group">
																				<?php echo form_label('News breadcrumb');?>
																				<select name="news_breadcrumb" class="custom-select">
																				<?php 
																					if($setting_data->news_breadcrumb == 1){				
																				?>
																				  <option value="1">Show</option>
																				  <option value="0">Hide</option>
																				<?php
																					}else{
																				?>
																				  <option value="0">Hide</option>
																				  <option value="1">Show</option>
																				<?php																
																					}
																				?> 
																				</select>
																			</div>
																		</div>
																		
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">
																			<div class="form-group">
																				<?php echo form_label('News share');?>
																				<select name="news_share" class="custom-select">
																				<?php 
																					if($setting_data->news_share == 1){				
																				?>
																				  <option value="1">Show</option>
																				  <option value="0">Hide</option>
																				<?php
																					}else{
																				?>
																				  <option value="0">Hide</option>
																				  <option value="1">Show</option>
																				<?php																
																					}
																				?> 
																				</select>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('News facebook comments');?>
																				<select name="news_facebook_comments" class="custom-select">
																				<?php 
																					if($setting_data->news_facebook_comments == 1){				
																				?>
																				  <option value="1">Show</option>
																				  <option value="0">Hide</option>
																				<?php
																					}else{
																				?>
																				  <option value="0">Hide</option>
																				  <option value="1">Show</option>
																				<?php																
																					}
																				?> 
																				</select>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('News related post');?>
																				<select name="news_related_post" class="custom-select">
																				<?php 
																					if($setting_data->news_related_post == 1){				
																				?>
																				  <option value="1">Show</option>
																				  <option value="0">Hide</option>
																				<?php
																					}else{
																				?>
																				  <option value="0">Hide</option>
																				  <option value="1">Show</option>
																				<?php																
																					}
																				?> 
																				</select>
																			</div>
																		</div>
																	</div>
																</div>
																
																<div class="tab-pane fade p-0" id="v-pills-sidebar" role="tabpanel" aria-labelledby="v-pills-sidebar-tab">
																	<div class="row">
																		<div class="col-xl-4 col-lg-4 col-md-6 col-lg-12">
																			<div class="form-group">
																				<?php echo form_label('Sidebar recent & popular post');?>
																				<select name="sidebar_recent_popular_post" class="custom-select">
																				<?php 
																					if($setting_data->sidebar_recent_popular_post == 1){				
																				?>
																				  <option value="1">Show</option>
																				  <option value="0">Hide</option>
																				<?php
																					}else{
																				?>
																				  <option value="0">Hide</option>
																				  <option value="1">Show</option>
																				<?php																
																					}
																				?> 
																				</select>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Sidebar exclusive post');?>
																				<select name="sidebar_exclusive_post" class="custom-select">
																				<?php 
																					if($setting_data->sidebar_exclusive_post == 1){				
																				?>
																				  <option value="1">Show</option>
																				  <option value="0">Hide</option>
																				<?php
																					}else{
																				?>
																				  <option value="0">Hide</option>
																				  <option value="1">Show</option>
																				<?php																
																					}
																				?> 
																				</select>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Sidebar archive search');?>
																				<select name="sidebar_archive_search" class="custom-select">
																				<?php 
																					if($setting_data->sidebar_archive_search == 1){				
																				?>
																				  <option value="1">Show</option>
																				  <option value="0">Hide</option>
																				<?php
																					}else{
																				?>
																				  <option value="0">Hide</option>
																				  <option value="1">Show</option>
																				<?php																
																					}
																				?> 
																				</select>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												
												<div role="tabpanel" class="tab-pane fade" id="contact_setting_tab">
													<div class="row">
														<div class="col-xl-4 col-lg-4 col-md-6 col-lg-12">	
															<div class="form-group">
																<?php echo form_label('Phone');?>
																<?php echo form_error('phone', '<div class="text-danger">', '</div>');?>
																<?php echo form_input(['name'=>'phone', 'class'=>'form-control', 'placeholder'=>'Phone', 'value'=>$setting_data->phone]); ?>
															</div>		
															
															<div class="form-group">
																<?php echo form_label('Email');?>
																<?php echo form_error('email', '<div class="text-danger">', '</div>');?>
																<?php echo form_input(['name'=>'email', 'class'=>'form-control', 'placeholder'=>'Email', 'value'=>$setting_data->email]); ?>
															</div>															
															
															<div class="form-group">
																<?php echo form_label('Time Zone');?>
																<?php echo form_error('timezone', '<div class="text-danger">', '</div>');?>
																<?php echo form_input(['name'=>'timezone', 'class'=>'form-control', 'placeholder'=>'Time Zone', 'value'=>$setting_data->timezone]); ?>
															</div>	
															
															<div class="form-group">
																<?php echo form_label('City');?>
																<?php echo form_error('city', '<div class="text-danger">', '</div>');?>
																<?php echo form_input(['name'=>'city', 'class'=>'form-control', 'placeholder'=>'City', 'value'=>$setting_data->city]); ?>
															</div>								
														</div>	
														
														<div class="col-xl-4 col-lg-4 col-md-6 col-lg-12">	
															<div class="form-group">
																<?php echo form_label('Address');?>
																<?php echo form_error('address', '<div class="text-danger">', '</div>');?>
																<?php echo form_textarea(['name'=>'address', 'class'=>'form-control', 'placeholder'=>'Address', 'value'=>$setting_data->address]); ?>
															</div>									
														</div>						
													</div>
												</div>
												
												<div role="tabpanel" class="tab-pane fade" id="social_setting_tab">
													<div class="row">
														<div class="col-xl-4 col-lg-4 col-md-6 col-lg-12">	
															<div class="form-group">
																<?php echo form_label('Facebook');?>
																<?php echo form_error('facebook', '<div class="text-danger">', '</div>');?>
																<?php echo form_input(['name'=>'facebook', 'class'=>'form-control', 'placeholder'=>'Facebook', 'value'=>$setting_data->facebook]); ?>
															</div>	
															
															<div class="form-group">
																<?php echo form_label('Twitter');?>
																<?php echo form_error('twitter', '<div class="text-danger">', '</div>');?>
																<?php echo form_input(['name'=>'twitter', 'class'=>'form-control', 'placeholder'=>'Twitter', 'value'=>$setting_data->twitter]); ?>
															</div>
															
															<div class="form-group">
																<?php echo form_label('Pinterest');?>
																<?php echo form_error('pinterest', '<div class="text-danger">', '</div>');?>
																<?php echo form_input(['name'=>'pinterest', 'class'=>'form-control', 'placeholder'=>'Pinterest', 'value'=>$setting_data->pinterest]); ?>
															</div>	
															
															<div class="form-group">
																<?php echo form_label('Instagram');?>
																<?php echo form_error('instagram', '<div class="text-danger">', '</div>');?>
																<?php echo form_input(['name'=>'instagram', 'class'=>'form-control', 'placeholder'=>'Instagram', 'value'=>$setting_data->instagram]); ?>
															</div>						
														</div>	
														
														<div class="col-xl-4 col-lg-4 col-md-6 col-lg-12">
															<div class="form-group">
																<?php echo form_label('Youtube');?>
																<?php echo form_error('youtube', '<div class="text-danger">', '</div>');?>
																<?php echo form_input(['name'=>'youtube', 'class'=>'form-control', 'placeholder'=>'Youtube', 'value'=>$setting_data->youtube]); ?>
															</div>	
															
															<div class="form-group">
																<?php echo form_label('Snapchat');?>
																<?php echo form_error('snapchat', '<div class="text-danger">', '</div>');?>
																<?php echo form_input(['name'=>'snapchat', 'class'=>'form-control', 'placeholder'=>'Snapchat', 'value'=>$setting_data->snapchat]); ?>
															</div>		
															
															<div class="form-group">
																<?php echo form_label('Vimeo');?>
																<?php echo form_error('vimeo', '<div class="text-danger">', '</div>');?>
																<?php echo form_input(['name'=>'vimeo', 'class'=>'form-control', 'placeholder'=>'Vimeo', 'value'=>$setting_data->vimeo]); ?>
															</div>								
														</div>						
													</div>
												</div>
												
												<div role="tabpanel" class="tab-pane fade" id="graphic_setting_tab">
													<div class="row">													
														<div class="col-xl-8 col-lg-8 col-md-8 col-lg-12 mb-3">
															<div class="responsive-table table-custom">
																<table class="table">
																	<thead>
																		<tr>
																			<th>Form</th>
																			<th width="25%">Image</th>
																		</tr>
																	</thead>
																	<tbody>	
																		<tr>
																			<td>
																				<div class="form-group">
																					<?php echo form_label('Logo');?>
																					<div class="custom-file">
																						<?php echo form_upload(['name'=>'logo', 'class'=>'custom-file-input', 'accept'=>'image/*']);?>
																						<label class="custom-file-label">select</label>
																						<small class="form-text text-muted">Only .png file is applicable</small>
																					</div>
																				</div>
																			</td>	
																			<td>
																				<img src="<?php echo base_url()."assets/images/default/logo.png";?>" class="img-fluid" alt="logo" />
																			</td>					
																		</tr>	
																		
																		<tr>
																			<td>
																				<div class="form-group">
																					<?php echo form_label('Collapsed Logo');?>
																					<div class="custom-file">
																						<?php echo form_upload(['name'=>'collapsed_logo', 'class'=>'custom-file-input', 'accept'=>'image/*']);?>
																						<label class="custom-file-label">select</label>
																						<small class="form-text text-muted">Only .png file is applicable</small>
																					</div>	
																				</div>	
																			</td>	
																			<td>
																				<img src="<?php echo base_url()."assets/images/default/collapsed_logo.png";?>" class="img-fluid" alt="collapsed_logo" />
																			</td>					
																		</tr>
																		
																		<tr>
																			<td>
																				<div class="form-group">
																					<?php echo form_label('Favicon');?>
																					<div class="custom-file">
																						<?php echo form_upload(['name'=>'favicon', 'class'=>'custom-file-input', 'accept'=>'image/*']);?>
																						<label class="custom-file-label">select</label>
																						<small class="form-text text-muted">Only .png file is applicable</small>
																					</div>	
																				</div>	
																			</td>	
																			<td>
																				<img src="<?php echo base_url()."assets/images/default/favicon.png";?>" class="img-fluid" alt="favicon" />
																			</td>					
																		</tr>
																		
																		<tr>
																			<td>
																				<div class="form-group">
																					<?php echo form_label('Footer Logo');?>
																					<div class="custom-file">
																						<?php echo form_upload(['name'=>'footer_logo', 'class'=>'custom-file-input', 'accept'=>'image/*']);?>
																						<label class="custom-file-label">select</label>
																						<small class="form-text text-muted">Only .png file is applicable</small>
																					</div>	
																				</div>
																			</td>	
																			<td>
																				<img src="<?php echo base_url()."assets/images/default/footer_logo.png";?>" class="img-fluid" alt="footer_logo" />
																			</td>					
																		</tr>
																		
																		<tr>
																			<td>
																				<div class="form-group">
																					<?php echo form_label('Watermark');?>				
																					<div class="custom-file">
																						<?php echo form_upload(['name'=>'watermark', 'class'=>'custom-file-input', 'accept'=>'image/*']);?>
																						<label class="custom-file-label">select</label>
																						<small class="form-text text-muted">Only .png file is applicable</small>
																					</div>												
																				</div>	
																			</td>	
																			<td>
																				<img src="<?php echo base_url()."assets/images/default/watermark.png";?>" class="img-fluid" alt="watermark" />
																			</td>					
																		</tr>
																		
																		<tr>
																			<td>
																				<div class="form-group">
																					<?php echo form_label('Default News Image');?>						
																					<div class="custom-file">
																						<?php echo form_upload(['name'=>'default_news_image', 'class'=>'custom-file-input', 'accept'=>'image/*']);?>
																						<label class="custom-file-label">select</label>
																						<small class="form-text text-muted">Only .png file is applicable</small>
																					</div>												
																				</div>		
																			</td>	
																			<td>
																				<img src="<?php echo base_url()."assets/images/news_featured_image/blank_news.png";?>" class="img-fluid" alt="blank_news" />
																			</td>					
																		</tr>
																		
																		<tr>
																			<td>
																				<div class="form-group">
																					<?php echo form_label('Background Image');?>						
																					<div class="custom-file">
																						<?php echo form_upload(['name'=>'background_image', 'class'=>'custom-file-input', 'accept'=>'image/*']);?>
																						<label class="custom-file-label">select</label>
																						<small class="form-text text-muted">Only .png file is applicable</small>
																					</div>												
																				</div>
																			</td>	
																			<td>
																				<img src="<?php echo base_url()."assets/images/default/background.png";?>" class="img-fluid" alt="background" />
																			</td>					
																		</tr>
																	</tbody>
																</table>
															</div>
															
														</div>					
													</div>
												</div>												
												
												<div role="tabpanel" class="tab-pane fade" id="advance_setting_tab">
													<div class="row">
														<div class="col-xl-4 col-lg-4 col-md-6 col-lg-12">	
															<div class="form-group">
																<?php echo form_label('CSS');?>
																<?php echo form_error('css', '<div class="text-danger">', '</div>');?>
																<?php echo form_textarea(['name'=>'css', 'class'=>'form-control', 'placeholder'=>'Cascading style sheets', 'value'=>$setting_data->css]); ?>
															</div>																						
														</div>		
														
														<div class="col-xl-4 col-lg-4 col-md-6 col-lg-12">	
															<div class="form-group">
																<?php echo form_label('JS');?>
																<?php echo form_error('js', '<div class="text-danger">', '</div>');?>
																<?php echo form_textarea(['name'=>'js', 'class'=>'form-control', 'placeholder'=>'Javascript', 'value'=>$setting_data->js]); ?>
															</div>																						
														</div>						
													</div>
												</div>
											</div>
										</div>
									</div>
									<!--End Setting Tab-->
								
									<div class="col-xl-12 col-lg-12 col-md-12 col-lg-12">	
										<?php echo form_submit(['id'=>'edit_setting', 'class'=>'btn btn-primary', 'type'=>'submit', 'value'=>'Save']);?>	
										<?php echo form_reset('', 'Reset', 'class="btn btn-danger"');?>
									</div>
								</div>
								<?php echo form_close(); ?> 
								<!--End Add Setting-->						
							</div>
						</div>					
					</div>	
					<!--End Setting Page-->	
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