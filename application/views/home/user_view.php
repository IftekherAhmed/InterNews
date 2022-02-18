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
							<div class="user-profile-area">
								<div class="row">
									<div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
										<div class="user-profile">
											<img src="<?php echo base_url();?>assets/images/user/<?php echo $user_data->image; ?>" class="img-fluid" border="0" alt="" />
											<h3><?php echo $user_data->first_name."&nbsp;".$user_data->last_name; ?></h3>
											<hr />
											<p class="message">
												<?php echo $user_data->message; ?>
											</p>
											<p class="position"><?php echo $user_data->position; ?></p>
										</div>
									</div>
									
									<div class="col-xl-9 col-lg-9 col-md-8 col-sm-12">
										<div class="user-profile-tab-area">
											<ul class="nav nav-tabs user-profile-tab-nav" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" href="#profile" role="tab" data-toggle="tab">Profile</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" href="#news" role="tab" data-toggle="tab">
														<?php echo $user_data->first_name."&nbsp;".$user_data->last_name; ?>'s News
													</a>
												</li>
											</ul>
											
											<!-- Tab panes -->
											<div class="tab-content user-profile-tab-container">
												<div role="tabpanel" class="tab-pane active" id="profile">
													<div class="row">
														<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 user-profile-details">
															<p><b>Number</b>:    <?php echo $user_data->mobile; ?></p>
															<p><b>Gender</b>:    <?php echo $user_data->gender; ?></p>
															<p><b>Birthday</b>:  <?php echo nice_date($user_data->dob, 'F j,Y'); ?></p>
															<p><b>Address</b>:   <?php echo $user_data->address; ?></p>
															<p><b>Joined</b>:    <?php echo nice_date($user_data->joined, 'M j, y'); ?></p>
															<p><b>Link</b>:      <a href="http://www.<?php echo $user_data->web_link;?>">link</a></p>
															<p><b>Total News</b>: <?php if(!empty($user_news)){ echo count($user_news); }else{ echo "{$user_data->first_name} has not published any news yet!"; } ?></p>
														</div>
													</div>															
												</div>
												
												<div role="tabpanel" class="tab-pane fade user-news-container" id="news">
													<ul class="user-news-list">
														<?php 
															if($user_news){
																foreach($user_news as $user_news_list){
														?>	
														<li>
															<div class="user-news-image">
															<?php 
																echo "<a href=".base_url()."assets/images/news_featured_image/".$user_news_list->news_image.">
																	<img class='img-fluid' src=".base_url()."assets/images/news_featured_image/".$user_news_list->news_image." alt='news imag' />
																</a>";
															?>
															</div>
															<a href="<?php echo base_url()."news/{$user_news_list->slug}";?>">
																<?php echo word_limiter($user_news_list->news_title, 7); ?>
																<?php
																	if($user_news_list->exclusive == 1){
																		echo "[Exclusive]";
																	}
																?>		
															</a>
															<div class="news-description"> 
																<?php echo word_limiter($user_news_list->description, 20);?>
															</div>	
														</li>
														<?php			
																}
															}
														?>
													</ul>	
												</div>
											</div>
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