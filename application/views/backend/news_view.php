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
							
					<!--News View Page-->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="card custom-content-area">
							<div class="card-header"> 
								<?php echo anchor('ct_backend/index', '<span class="fa fa-puzzle-piece"></span> Dashboard', 'title="Dashboard"');?> / <?php echo $news_data->news_title; ?>
							</div>
							<div class="card-body p-4" id="news_view">
								<div class="custom-form-button custom-square-button">	
								
									<img src="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $news_data->image; ?>" class="img-thumbnail img-fluid" alt="<?php echo $news_data->news_title; ?>" width="600" />	
									
									<div class="my-1">
										Image Caption:<i class="text-muted">  <?php echo $news_data->image_caption; ?></i>
									</div>
									
									<div class="responsive-table table-custom">
										<?php 	
											$status = $news_data->news_status;
											if($status == 1){
												$status = '<a href="javascript:;" class="news-pending" data-id="'.$news_data->id.'" title="Pending"><span class="badge badge-default">Approved</span></a>';
											}else{
												$status = '<a href="javascript:;" class="news-approve" data-id="'.$news_data->id.'" title="Approve"><span class="badge badge-danger">Pending</span></a>';
											}										
										?>	
										<table class="table custom-form-button custom-square-button" id="show_news_images_list">
											<thead>
												<tr>
													<th>Field</th>
													<th>Data</th>
												</tr>
											</thead>
											<tbody>												
												<tr>
													<td>Title</td>
													<td><?php echo $news_data->news_title; ?></td>
												</tr>
												<tr>
													<td>Sub Title</td>
													<td><?php echo $news_data->sub_title; ?></td>
												</tr>
												<tr>
													<td>Category</td>
													<td><?php echo $news_data->category_title; ?></td>
												</tr>
												<tr>
													<td>Tags</td>
													<td><?php echo $news_data->tags; ?></td>
												</tr>
												<tr>
													<td>News behalf as</td>
													<td><?php echo $news_data->news_behalf_as; ?></td>
												</tr>
												<tr>
													<td>Reporter</td>
													<td>
														<?php echo anchor("ct_backend/user_view/{$news_data->news_publisher_id}", "{$news_data->news_publisher_name}");?>
													</td>
												</tr>
												<tr>
													<td>Exclusive</td>
													<td><?php if($news_data->exclusive == 1){ echo "Exclusive"; }else{ echo "No"; } ?></td>
												</tr>
												<tr>
													<td>Status</td>
													<td>
														<?php
															if($logged_user_position == $news_data->news_publisher_id || $logged_user_position == "Admin" || $logged_user_position == "Moderator"){
																echo $status;
															} 
														?>
													</td>
												</tr>
												<tr>
													<td>News courtesy</td>
													<td><?php echo $news_data->news_courtesy; ?></td>
												</tr>
												<tr>
													<td>Views</td>
													<td><?php echo $news_data->hit; ?></td>
												</tr>
												<tr>
													<td>Published</td>
													<td><?php echo nice_date($news_data->news_published, 'M j,Y. h.ia'); ?></td>
												</tr>
												<tr>
													<td>Description</td>
													<td><?php echo $news_data->description; ?></td>
												</tr>
												<tr>
													<td>Acion</td>
													<td>
													<?php
														if($logged_user_position == $news_data->news_publisher_id || $logged_user_position == "Admin" || $logged_user_position == "Moderator"){
															echo anchor("ct_backend/edit_news_page/{$news_data->id}", '<span class="fa fa-pencil-alt"></span> Edit News', ['class' => 'btn btn-info', 'title' => 'Edit News']);
														}
													?>	
													</td>
												</tr>
											</tbody>
										</table>
									</div>							
									
									<div class="mt-1">																
										<?php 
											if(!empty($news_data->video_link)){
										?>
										<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $news_data->video_link; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
										<?php 
											}
										?>
									</div>
								</div>
								
								<!--News Extra Images-->	
								<?php 
									$news_images = $controller->single_news_images_list($news_data->id);
									if(!empty($news_images)){
								?>
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 my-3 light-gallery-area">
									<div id="lightgallery" class="row">	
										<?php
											foreach($news_images as $news_images_row){
										?>
										<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12" data-src="<?php echo base_url();?>assets/images/news_extra_image/<?php echo $news_images_row->image; ?>" data-sub-html="<h4><?php echo $news_images_row->caption; ?></h4>">
											<div class="light-gallery-each">
												<a href="#">
													<img class="img-fluid" src="<?php echo base_url();?>assets/images/news_extra_image/<?php echo $news_images_row->image; ?>" alt="<?php echo $news_images_row->caption; ?>">
												</a>
												<p class="caption"><?php echo $news_images_row->caption; ?></p>
											</div>	
										</div>	
										<?php
											}
										?>								
									</div>
								</div>
								<?php
								}
								?>
								<!--End News Extra Images-->		
								
							</div>
						</div>					
					</div>	
					<!--End News View Page-->	
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
		var base_url = '<?php echo base_url();?>';
		$(function(){	
			//lightgallery
			lightgallery()
			function lightgallery(){
				$('#lightgallery').lightGallery();
			}
			
			// Set News Approve
			$('#news_view').on('click', '.news-approve', function(){
				var id = $(this).attr('data-id');
				$.ajax({
					type: 'ajax',
					method: 'get',
					async: false,
					url: base_url+'ct_backend/set_news_approve/' +id,
					dataType: 'json',
					success: function(){
						location.reload();					
						toast();
						function toast(){
							$.toast({
								text: 'Successfully News approved!', 		
								icon: 'success' 
							});
						}
					},error: function(){
						function toast(){
							$.toast({
								text: 'News transforming unsuccessfull!', 		
								icon: 'error' 
							});
						}
					}
				});
			});
			//End Set News Approve
			
			// Set News Pending
			$('#news_view').on('click', '.news-pending', function(){
				var id = $(this).attr('data-id');
				$.ajax({
					type: 'ajax',
					method: 'get',
					async: false,
					url: base_url+'ct_backend/set_news_pending/' +id,
					dataType: 'json',
					success: function(){
						location.reload();
						Toast();
						function Toast (){
							var priority = 'danger';
							var title    = 'Welcome';
							var message  = 'Successfully News transformed into pending!';
							$.toaster({ priority : priority, message : message });
						}
					},error: function(){
						Toast();
						function Toast (){
							var priority = 'danger';
							var title    = 'Error';
							var message  = 'News transforming unsuccessfull!';
							$.toaster({ priority : priority, message : message });
						}
					}
				});	
			});
			// End Set News
		});
	</script>
	<!--End Ajax Query-->
</body>
</html>	