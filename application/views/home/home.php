<!DOCTYPE html>
<html lang="en">
<!--including header section-->
<?php include('include/header.php');?>
<!--End including header section-->
<body>	
	<!--Preloader-->	
	<?php
		if($setting_data->pre_loader == 1){
	?>	
		<div class="fakeLoader"></div>
	<?php
		}
	?>			
	<!--End Preloader-->	
	<!--including header_bar section-->
	<?php include('include/header_bar.php');?>
	<!--End including header_bar section-->
	
	<!--main content area-->
	<div class="container-fluid main-content">				
		<!--First Row-->	
		<div class="row">	
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 p-0">						
				<!--First Section-->
				<!-- Breaking-news-ticker -->	
				<?php
					if($setting_data->breaking_news == 1){
				?>			
				<div class="breaking-news-ticker" id="newsTicker">				
					<div class="bn-label">
						<?php echo $setting_data->breaking_news_title; ?>
					</div>
					<div class="bn-news">
						<ul>
						<?php 
							$section_1 = $controller->sketch_news_list($home_sketch->section_1, 10, 0);
							if($section_1){
								foreach($section_1 as $section_1_news_list){											
									if($section_1_news_list->exclusive == 1){
										$exclusive = "[Exclusive]";
									}else{
										$exclusive = "";
									}												
									echo "<li>";
									echo "<a href='".base_url()."news/{$section_1_news_list->slug}"."'>";
									echo "<span class='bn-seperator' style='background-image: url(".base_url()."assets/images/default/breaking_news.png);'></span>";
									echo word_limiter($section_1_news_list->news_title, 10). $exclusive;
									echo "</a>";
									echo "</li>";
								}
							}						
						?>	
						</ul>
					</div>
				</div>	
				<?php
					}
				?>			
				<!--End Breaking-news-ticker-->		
				<!--End First Section-->
			</div>
						
			<!--lefte side-->
			<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 left-side">				
				<div class="home-news-area">								
					<!--Second Row-->
					<div class="row">					
						<!--Second & Third-->
						<!--Second Section-->
						<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 slider-container owl-carousel owl-theme" id="featured_news">
							<?php 
								$section_2 = $controller->sketch_news_list($home_sketch->section_2, 4, 0);
								if($section_2){
									foreach($section_2 as $section_2_news_list){
							?>
							<div class="slider">
								<div class="slider-img">
									<img src="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_2_news_list->news_image;?>" alt="<?php echo $section_2_news_list->news_title;?>" class="img-fluid" />
								</div>
								<div class="description-area">
									<p>
										<span class="fa fa-calendar-alt"></span> <?php echo nice_date($section_2_news_list->news_published, 'M j, y');?>
									</p>
									<p>
										<span class="fa fa-user"></span>  
										<?php 
											if(empty($section_2_news_list->news_behalf_as)){
											?>
											<a href="<?php echo base_url()."user/{$section_2_news_list->news_publisher_id}"; ?>">
												<?php echo $section_2_news_list->publisher_name;?>
											</a> &nbsp; 
										<?php 
											}else{
												echo $section_2_news_list->news_behalf_as;
											}
										?>
									</p>
									<p class="category"> 
										<a href="<?php echo base_url()."category/{$section_2_news_list->category_id}"; ?>">
											<?php echo $section_2_news_list->category_title;?>
										</a>
									</p>
								</div>	
								<div class="slider-shadow">
								</div>	
									<div class="slider-con">
										<h3>
											<a href="<?php echo base_url()."news/{$section_2_news_list->slug}";?>">
												<?php echo word_limiter($section_2_news_list->news_title, 8);?>
												<?php
													if($section_2_news_list->exclusive == 1){
														echo "[Exclusive]";
													}
												?>												
											</a>
										</h3>
									</div>			
							</div>
							<?php
									}
								}						
							?>		
						</div>
						<!--End Second Section-->				
					
						<!--Third Section-->
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">	
							<div class="row">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 thumbnail-container">
								<?php 
									$section_3_left = $controller->sketch_news_list($home_sketch->section_3, 2, 0);
									if($section_3_left){
										foreach($section_3_left as $section_3_news_list){
								?>
								<div class="thumbnail">
									<div class="thumbnail-img">
										<img src="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_3_news_list->news_image;?>" alt="<?php echo $section_3_news_list->news_title;?>" class="img-fluid" />
									</div>
									<div class="thumbnail-shadow"></div>
									<div class="description-area">
										<p>
											<span class="fa fa-calendar-alt"></span> <?php echo nice_date($section_3_news_list->news_published, 'M j, y');?>
										</p>
										<p>
											<span class="fa fa-user"></span> 
											<?php 
												if(empty($section_3_news_list->news_behalf_as)){
												?>
												<a href="<?php echo base_url()."user/{$section_3_news_list->news_publisher_id}"; ?>">
													<?php echo $section_3_news_list->publisher_name;?>
												</a> &nbsp; 
											<?php 
												}else{
													echo $section_3_news_list->news_behalf_as;
												}
											?>
										</p>
										<p class="category">  <a href="<?php echo base_url()."category/{$section_3_news_list->category_id}"; ?>"><?php echo $section_3_news_list->category_title;?></a></p>
									</div>	
									<div class="thumbnail-con">
										<h4>
											<a href="<?php echo base_url()."news/{$section_3_news_list->slug}";?>">
												<?php echo word_limiter($section_3_news_list->news_title, 7);?>
												<?php
													if($section_3_news_list->exclusive == 1){
														echo "[Exclusive]";
													}
												?>	
											</a>
										</h4>
									</div>			
								</div>									
								<?php
										}
									}						
								?>										
								</div>
							</div>							
						</div>
						<!--End Third Section-->	
						<!--end Second & Third-->	
						
						<!--Fourth Section-->
						<div class="category-title">
							<h3><?php echo $controller->sketch_category_data($home_sketch->section_4)->title;?></h3>
						</div>	
						<?php 
							$section_4 = $controller->sketch_news_list($home_sketch->section_4, 2, 0);
							if($section_4){
								foreach($section_4 as $section_4_news_list){
						?>	
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 wow fadeInRight">
								<div class="card home-news-item">
									<div class="image-container">																			
										<?php 
											if(!empty($section_4_news_list->video_link)){
										?>
										<iframe class="" width="" height="" src="https://www.youtube.com/embed/<?php echo $section_4_news_list->video_link; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
										<?php 
											}else{
										?>
										<img src="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_4_news_list->news_image;?>" alt="<?php echo $section_4_news_list->news_title;?>" class="card-img-top" />
										<?php 
											}
										?>										
									</div>
									<div class="card-body">
										<h3 class="card-title">
											<a href="<?php echo base_url()."news/{$section_4_news_list->slug}";?>">
												<?php echo word_limiter($section_4_news_list->news_title, 7);?>
												<?php
													if($section_4_news_list->exclusive == 1){
														echo "[Exclusive]";
													}
												?>	
											</a>
										</h3>	
										<div class="card-text"><?php echo word_limiter($section_4_news_list->description, 20);?></div>
									</div>
								</div>
							</div>
						<?php
								}
							}						
						?>	
					
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 wow fadeInLeft">
							<div class="card home-news-item">
								<div class="card-body">
									<ul>
										<?php 
											$section_4_side = $controller->sketch_news_list($home_sketch->section_4, 4, 2);
											if($section_4_side){
												foreach($section_4_side as $section_4_side_news_list){
										?>	
											<li>	
												<img src="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_4_side_news_list->news_image;?>" alt="<?php echo $section_4_side_news_list->news_title;?>" />											
												<a href="<?php echo base_url()."news/{$section_4_side_news_list->slug}";?>" 
													data-toggle="popover" 
													data-img="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_4_side_news_list->news_image;?>" 
													data-header="<?php echo $section_4_side_news_list->news_title;?>" 
													data-desc="<?php echo word_limiter($section_4_side_news_list->description, 20);?>">
													<?php echo word_limiter($section_4_side_news_list->news_title, 7);?>		
													<?php
														if($section_4_side_news_list->exclusive == 1){
															echo "[Exclusive]";
														}
													?>
												</a>
											</li>
										<?php
												}
											}						
										?>								
									</ul>
								</div>
							</div>
						</div>												
						<!--News category view-->
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="news-category-details">
								<?php
									$news_category_view_id_4 = $controller->sketch_category_data($home_sketch->section_4)->id;
									echo anchor("category/{$news_category_view_id_4}", 'See more..', ['class' => '']);
								?>
							</div>							
						</div>		
						<!--End News category view-->
						<!--End Fourth Section-->					
						
						<!--Fifth Section-->
						<div class="category-title">
							<h3><?php echo $controller->sketch_category_data($home_sketch->section_5)->title;?></h3>
						</div>				
						<?php 
							$section_5 = $controller->sketch_news_list($home_sketch->section_5, 1, 0);
							if($section_5){
								foreach($section_5 as $section_5_news_list){
						?>	
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 wow fadeInLeft">
								<div class="card home-news-item">
									<div class="image-container">	
										<?php 
											if(!empty($section_5_news_list->video_link)){
										?>
										<iframe class="" width="" height="" src="https://www.youtube.com/embed/<?php echo $section_5_news_list->video_link; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
										<?php 
											}else{
										?>
										<img src="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_5_news_list->news_image;?>" alt="<?php echo $section_5_news_list->news_title;?>" class="card-img-top" />
										<?php 
											}
										?>										
									</div>
									<div class="card-body">
										<h3 class="card-title">
											<a href="<?php echo base_url()."news/{$section_5_news_list->slug}";?>">
												<?php echo word_limiter($section_5_news_list->news_title, 7);?>
												<?php
													if($section_5_news_list->exclusive == 1){
														echo "[Exclusive]";
													}
												?>	
											</a>
										</h3>	
										<div class="card-text"><?php echo word_limiter($section_5_news_list->description, 20);?></div>
									</div>
								</div>
							</div>
						<?php
								}
							}						
						?>	
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
							<div class="card home-news-item">
								<div class="card-body">
									<ul>
										<?php 
											$section_5_side = $controller->sketch_news_list($home_sketch->section_5, 4, 1);
											if($section_5_side){
												foreach($section_5_side as $section_5_side_news_list){
										?>	
											<li>	
												<img src="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_5_side_news_list->news_image;?>" alt="<?php echo $section_5_side_news_list->news_title;?>" />
												
												<a href="<?php echo base_url()."news/{$section_5_side_news_list->slug}";?>" 
													data-toggle="popover" 
													data-img="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_5_side_news_list->news_image;?>" 
													data-header="<?php echo $section_5_side_news_list->news_title;?>" 
													data-desc="<?php echo word_limiter($section_5_side_news_list->description, 20);?>">
													<?php echo word_limiter($section_5_side_news_list->news_title, 7);?>	
													<?php
														if($section_5_side_news_list->exclusive == 1){
															echo "[Exclusive]";
														}
													?>	
												</a>
											</li>
										<?php
												}
											}						
										?>								
									</ul>
								</div>
							</div>
						</div>
						
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 wow fadeInDown">
							<div class="card home-news-item">
								<div class="card-body">
									<ul>
										<?php 
											$section_5_side_2 = $controller->sketch_news_list($home_sketch->section_5, 4, 5);
											if($section_5_side_2){
												foreach($section_5_side_2 as $section_5_side_news_list){
										?>	
											<li>	
												<img src="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_5_side_news_list->news_image;?>" alt="<?php echo $section_5_side_news_list->news_title;?>" />
												
												<a href="<?php echo base_url()."news/{$section_5_side_news_list->slug}";?>" 
													data-toggle="popover" 
													data-img="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_5_side_news_list->news_image;?>" 
													data-header="<?php echo $section_5_side_news_list->news_title;?>" 
													data-desc="<?php echo word_limiter($section_5_side_news_list->description, 20);?>">
													<?php echo word_limiter($section_5_side_news_list->news_title, 7);?>			
													<?php
														if($section_5_side_news_list->exclusive == 1){
															echo "[Exclusive]";
														}
													?>	
												</a>												
											</li>
										<?php
												}
											}						
										?>								
									</ul>
								</div>
							</div>
						</div>													
						<!--News category view-->
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="news-category-details">
								<?php
									$news_category_view_id_5 = $controller->sketch_category_data($home_sketch->section_5)->id;
									echo anchor("category/{$news_category_view_id_5}", 'See more..', ['class' => '']);
								?>
							</div>							
						</div>		
						<!--End News category view-->		
						<!--End Fifth Section-->
					
						<!--Sixth Section-->
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 wow fadeInRight">
							<div class="category-title">
								<h3><?php echo $controller->sketch_category_data($home_sketch->section_6)->title;?></h3>
							</div>
							<?php 
								$section_6 = $controller->sketch_news_list($home_sketch->section_6, 1, 0);
								if($section_6){
									foreach($section_6 as $section_6_news_list){
							?>					
							<div class="card home-news-item">
								<div class="image-container">
									<?php 
										if(!empty($section_6_news_list->video_link)){
									?>
									<iframe class="" width="" height="" src="https://www.youtube.com/embed/<?php echo $section_6_news_list->video_link; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
									<?php 
										}else{
									?>
									<img src="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_6_news_list->news_image;?>" alt="<?php echo $section_6_news_list->news_title;?>" class="card-img-top" />
									<?php 
										}
									?>										
								</div>
								<div class="card-body">
									<h3 class="card-title">
										<a href="<?php echo base_url()."news/{$section_6_news_list->slug}";?>">
											<?php echo word_limiter($section_6_news_list->news_title, 7);?>	
											<?php
												if($section_6_news_list->exclusive == 1){
													echo "[Exclusive]";
												}
											?>	
										</a>
									</h3>
									<div class="card-text"><?php echo word_limiter($section_6_news_list->description, 20);?></div>
								</div>
							</div>
							<?php
									}
								}						
							?>	
						
							<div class="card home-news-item">
								<div class="card-body">
									<ul>
										<?php 
											$section_6_bottom = $controller->sketch_news_list($home_sketch->section_6, 4, 1);
											if($section_6_bottom){
												foreach($section_6_bottom as $section_6_bottom_news_list){
										?>	
											<li>										
												<img src="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_6_bottom_news_list->news_image;?>" alt="<?php echo $section_6_bottom_news_list->news_title;?>" />									
												<a href="<?php echo base_url()."news/{$section_6_bottom_news_list->slug}";?>" 
													data-toggle="popover" 
													data-img="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_6_bottom_news_list->news_image;?>" 
													data-header="<?php echo $section_6_bottom_news_list->news_title;?>" 
													data-desc="<?php echo word_limiter($section_6_bottom_news_list->description, 20);?>">
													<?php echo word_limiter($section_6_bottom_news_list->news_title, 7);?>
													<?php
														if($section_6_bottom_news_list->exclusive == 1){
															echo "[Exclusive]";
														}
													?>	
												</a>
											</li>
										<?php
												}
											}						
										?>								
									</ul>
								</div>										
								<!--News category view-->
								<div class="news-category-details">
									<?php
										$news_category_view_id_6 = $controller->sketch_category_data($home_sketch->section_6)->id;
										echo anchor("category/{$news_category_view_id_6}", 'See more..', ['class' => '']);
									?>
								</div>	
								<!--End News category view-->
							</div>	
						</div>			
						<!--End Sixth Section-->
					
						<!--Seven Section-->
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
							<div class="category-title">
								<h3><?php echo $controller->sketch_category_data($home_sketch->section_7)->title;?></h3>
							</div>
							<?php 
								$section_7 = $controller->sketch_news_list($home_sketch->section_7, 1, 0);
								if($section_7){
									foreach($section_7 as $section_7_news_list){
							?>					
							<div class="card home-news-item">
								<div class="image-container">	
									<?php 
										if(!empty($section_7_news_list->video_link)){
									?>
									<iframe class="" width="" height="" src="https://www.youtube.com/embed/<?php echo $section_7_news_list->video_link; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
									<?php 
										}else{
									?>
									<img src="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_7_news_list->news_image;?>" alt="<?php echo $section_7_news_list->news_title;?>" class="card-img-top" />
									<?php 
										}
									?>										
								</div>
								<div class="card-body">
									<h3 class="card-title">
										<a href="<?php echo base_url()."news/{$section_7_news_list->slug}";?>">
											<?php echo word_limiter($section_7_news_list->news_title, 7);?>	
											<?php
												if($section_7_news_list->exclusive == 1){
													echo "[Exclusive]";
												}
											?>
										</a>
									</h3>									
									<div class="card-text"><?php echo word_limiter($section_7_news_list->description, 20);?></div>
								</div>
							</div>
							<?php
									}
								}						
							?>	
						
							<div class="card home-news-item">
								<div class="card-body">
									<ul>
										<?php 
											$section_7_bottom = $controller->sketch_news_list($home_sketch->section_7, 4, 1);
											if($section_7_bottom){
												foreach($section_7_bottom as $section_7_bottom_news_list){
										?>	
											<li>										
												<img src="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_7_bottom_news_list->news_image;?>" alt="<?php echo $section_7_bottom_news_list->news_title;?>" />										
												<a href="<?php echo base_url()."news/{$section_7_bottom_news_list->slug}";?>" 
													data-toggle="popover" 
													data-img="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_7_bottom_news_list->news_image;?>" 
													data-header="<?php echo $section_7_bottom_news_list->news_title;?>" 
													data-desc="<?php echo word_limiter($section_7_bottom_news_list->description, 20);?>">
													<?php echo word_limiter($section_7_bottom_news_list->news_title, 7);?>	
													<?php
														if($section_7_bottom_news_list->exclusive == 1){
															echo "[Exclusive]";
														}
													?>	
												</a>
											</li>
										<?php
												}
											}						
										?>								
									</ul>
								</div>									
								<!--News category view-->
								<div class="news-category-details">
									<?php
										$news_category_view_id_7 = $controller->sketch_category_data($home_sketch->section_7)->id;
										echo anchor("category/{$news_category_view_id_7}", 'See more..', ['class' => '']);
									?>
								</div>	
								<!--End News category view-->
							</div>	
						</div>		
						<!--End Seven Section-->
					
						<!--Eight Section-->
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 wow fadeInLeft">
							<div class="category-title">
								<h3><?php echo $controller->sketch_category_data($home_sketch->section_8)->title;?></h3>
							</div>
							<?php 
								$section_8 = $controller->sketch_news_list($home_sketch->section_8, 1, 0);
								if($section_8){
									foreach($section_8 as $section_8_news_list){
							?>					
							<div class="card home-news-item">
								<div class="image-container">	
									<?php 
										if(!empty($section_8_news_list->video_link)){
									?>
									<iframe class="" width="" height="" src="https://www.youtube.com/embed/<?php echo $section_8_news_list->video_link; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
									<?php 
										}else{
									?>
									<img src="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_8_news_list->news_image;?>" alt="<?php echo $section_8_news_list->news_title;?>" class="card-img-top" />
									<?php 
										}
									?>										
								</div>
								<div class="card-body">
									<h3 class="card-title">
										<a href="<?php echo base_url()."news/{$section_8_news_list->slug}";?>">
											<?php echo word_limiter($section_8_news_list->news_title, 7);?>	
											<?php
												if($section_8_news_list->exclusive == 1){
													echo "[Exclusive]";
												}
											?>	
										</a>
									</h3>
									<div class="card-text"><?php echo word_limiter($section_8_news_list->description, 20);?></div>
								</div>
							</div>
							<?php
									}
								}						
							?>	
						
							<div class="card home-news-item">
								<div class="card-body">
									<ul>
										<?php 
											$section_8_bottom = $controller->sketch_news_list($home_sketch->section_8, 4, 1);
											if($section_8_bottom){
												foreach($section_8_bottom as $section_8_bottom_news_list){
										?>	
											<li>										
												<img src="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_8_bottom_news_list->news_image;?>" alt="<?php echo $section_8_bottom_news_list->news_title;?>" />										
												<a href="<?php echo base_url()."news/{$section_8_bottom_news_list->slug}";?>" 
													data-toggle="popover" 
													data-img="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_8_bottom_news_list->news_image;?>" 
													data-header="<?php echo $section_8_bottom_news_list->news_title;?>" 
													data-desc="<?php echo word_limiter($section_8_bottom_news_list->description, 20);?>">
													<?php echo word_limiter($section_8_bottom_news_list->news_title, 7);?>	
													<?php
														if($section_8_bottom_news_list->exclusive == 1){
															echo "[Exclusive]";
														}
													?>	
												</a>
											</li>
										<?php
												}
											}						
										?>								
									</ul>
								</div>									
								<!--News category view-->
								<div class="news-category-details">
									<?php
										$news_category_view_id_8 = $controller->sketch_category_data($home_sketch->section_8)->id;
										echo anchor("category/{$news_category_view_id_8}", 'See more..', ['class' => '']);
									?>
								</div>	
								<!--End News category view-->
							</div>	
						</div>		
						<!--End Eight Section-->
						
						<!--Body First Ad-->
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="body-ad">
								<?php 	
									$body_ad = $controller->body_ad(1, 0);								
									if($body_ad){
										foreach($body_ad as $body_ad_row){
								?>	
								<?php echo $body_ad_row->input;?>
								<?php
										}
									}						
								?>	
							</div>					
						</div>
						<!--End Body First Ad-->
								
						<!--Gallery-->
						<div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 wow fadeInRight">	
							<div class="category-title">
								<h3>Gallery</h3>
							</div>	
							<div class="gallery-container slider-container">
								<div class="owl-carousel owl-theme lightgallery" id="gallery_slide">
									<?php 	
										$gallery_list = $controller->gallery_list();								
										if($gallery_list){
											foreach($gallery_list as $gallery_list_row){
									?>	
										<div class="slider" data-src="<?php echo base_url();?>assets/images/gallery/<?php echo $gallery_list_row->image; ?>" data-sub-html="<h4><?php echo $gallery_list_row->caption; ?></h4>">
											<div class="slider-img">
												<a href="#">
													<img src="<?php echo base_url();?>assets/images/gallery/<?php echo $gallery_list_row->image;?>" alt="<?php echo $gallery_list_row->image;?>" class="img-fluid" />
												</a>												
											</div>
											<div class="gallery-con">
												<p class="slider-caption"><?php echo $gallery_list_row->caption;?></p>
											</div>			
										</div>
									<?php
											}
										}						
									?>			
								</div>
							</div>
						</div>
						<!--End Gallery-->					
					
						<!--Nine Section-->
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 wow fadeInLeft">
							<div class="category-title">
								<h3><?php echo $controller->sketch_category_data($home_sketch->section_9)->title;?></h3>
							</div>						
							<div class="card home-news-item">
								<div class="card-body">
									<ul>
										<?php 
											$section_9 = $controller->sketch_news_list($home_sketch->section_9, 5, 0);
											if($section_9){
												foreach($section_9 as $section_9_news_list){
										?>	
											<li>										
												<img src="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_9_news_list->news_image;?>" alt="<?php echo $section_9_news_list->news_title;?>" />										
												<a href="<?php echo base_url()."news/{$section_9_news_list->slug}";?>" 
													data-toggle="popover" 
													data-img="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_9_news_list->news_image;?>" 
													data-header="<?php echo $section_9_news_list->news_title;?>" 
													data-desc="<?php echo word_limiter($section_9_news_list->description, 20);?>">
													<?php echo word_limiter($section_9_news_list->news_title, 7);?>	
													<?php
														if($section_9_news_list->exclusive == 1){
															echo "[Exclusive]";
														}
													?>	
												</a>
											</li>
										<?php
												}
											}						
										?>								
									</ul>	
								</div>
								<!--News category view-->
								<div class="news-category-details">
									<?php
										$news_category_view_id_9 = $controller->sketch_category_data($home_sketch->section_9)->id;
										echo anchor("category/{$news_category_view_id_9}", 'See more..', ['class' => '']);
									?>
								</div>	
								<!--End News category view-->
							</div>			
						</div>			
						<!--End Nine Section-->
					
						<!--Ten Section-->
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 wow fadeInLeft">
							<div class="category-title">
								<h3><?php echo $controller->sketch_category_data($home_sketch->section_10)->title;?></h3>
							</div>
							<?php 
								$section_10 = $controller->sketch_news_list($home_sketch->section_10, 1, 0);
								if($section_10){
									foreach($section_10 as $section_10_news_list){
							?>					
							<div class="card home-news-item">
								<div class="image-container">
									<?php 
										if(!empty($section_10_news_list->video_link)){
									?>
									<iframe class="" width="" height="" src="https://www.youtube.com/embed/<?php echo $section_10_news_list->video_link; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
									<?php 
										}else{
									?>
									<img src="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_10_news_list->news_image;?>" alt="<?php echo $section_10_news_list->news_title;?>" class="card-img-top" />
									<?php 
										}
									?>										
								</div>
								<div class="card-body">
									<h3 class="card-title">
										<a href="<?php echo base_url()."news/{$section_10_news_list->slug}";?>">
											<?php echo word_limiter($section_10_news_list->news_title, 7);?>		
											<?php
												if($section_10_news_list->exclusive == 1){
													echo "[Exclusive]";
												}
											?>	
										</a>
									</h3>
									<div class="card-text"><?php echo word_limiter($section_10_news_list->description, 20);?></div>
								</div>
							</div>
							<?php
									}
								}						
							?>	
						
							<div class="card home-news-item">
								<div class="card-body">
									<ul>
										<?php 
											$section_10_bottom = $controller->sketch_news_list($home_sketch->section_10, 4, 1);
											if($section_10_bottom){
												foreach($section_10_bottom as $section_10_bottom_news_list){
										?>	
											<li>										
												<img src="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_10_bottom_news_list->news_image;?>" alt="<?php echo $section_10_bottom_news_list->news_title;?>" />										
												<a href="<?php echo base_url()."news/{$section_10_bottom_news_list->slug}";?>" 
													data-toggle="popover" 
													data-img="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_10_bottom_news_list->news_image;?>" 
													data-header="<?php echo $section_10_bottom_news_list->news_title;?>" 
													data-desc="<?php echo word_limiter($section_10_bottom_news_list->description, 20);?>">
													<?php echo word_limiter($section_10_bottom_news_list->news_title, 7);?>		
													<?php
														if($section_10_bottom_news_list->exclusive == 1){
															echo "[Exclusive]";
														}
													?>	
												</a>
											</li>
										<?php
												}
											}						
										?>								
									</ul>
								</div>								
								<!--News category view-->
								<div class="news-category-details">
									<?php
										$news_category_view_id_10 = $controller->sketch_category_data($home_sketch->section_10)->id;
										echo anchor("category/{$news_category_view_id_10}", 'See more..', ['class' => '']);
									?>
								</div>	
								<!--End News category view-->
							</div>		
						</div>		
						<!--End Ten Section-->
					
						<!--Eleven Section-->
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
							<div class="category-title">
								<h3><?php echo $controller->sketch_category_data($home_sketch->section_11)->title;?></h3>
							</div>
							<?php 
								$section_11 = $controller->sketch_news_list($home_sketch->section_11, 1, 0);
								if($section_11){
									foreach($section_11 as $section_11_news_list){
							?>					
							<div class="card home-news-item">
								<div class="image-container">	
									<?php 
										if(!empty($section_11_news_list->video_link)){
									?>
									<iframe class="" width="" height="" src="https://www.youtube.com/embed/<?php echo $section_11_news_list->video_link; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
									<?php 
										}else{
									?>
									<img src="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_11_news_list->news_image;?>" alt="<?php echo $section_11_news_list->news_title;?>" class="card-img-top" />
									<?php 
										}
									?>										
								</div>
								<div class="card-body">
									<h3 class="card-title">
										<a href="<?php echo base_url()."news/{$section_11_news_list->slug}";?>">
											<?php echo word_limiter($section_11_news_list->news_title, 7);?>	
											<?php
												if($section_11_news_list->exclusive == 1){
													echo "[Exclusive]";
												}
											?>	
										</a>
									</h3>
									<div class="card-text"><?php echo word_limiter($section_11_news_list->description, 20);?></div>
								</div>
							</div>
							<?php
									}
								}						
							?>	
						
							<div class="card home-news-item">
								<div class="card-body">
									<ul>
										<?php 
											$section_11_bottom = $controller->sketch_news_list($home_sketch->section_11, 4, 1);
											if($section_11_bottom){
												foreach($section_11_bottom as $section_11_bottom_news_list){
										?>	
											<li>										
												<img src="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_11_bottom_news_list->news_image;?>" alt="<?php echo $section_11_bottom_news_list->news_title;?>" />										
												
												<a href="<?php echo base_url()."news/{$section_11_bottom_news_list->slug}";?>" 
													data-toggle="popover" 
													data-img="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_11_bottom_news_list->news_image;?>" 
													data-header="<?php echo $section_11_bottom_news_list->news_title;?>" 
													data-desc="<?php echo word_limiter($section_11_bottom_news_list->description, 20);?>">
													<?php echo word_limiter($section_11_bottom_news_list->news_title, 7);?>		
													<?php
														if($section_11_bottom_news_list->exclusive == 1){
															echo "[Exclusive]";
														}
													?>	
												</a>
											</li>
										<?php
												}
											}						
										?>								
									</ul>
								</div>										
								<!--News category view-->
								<div class="news-category-details">
									<?php
										$news_category_view_id_11 = $controller->sketch_category_data($home_sketch->section_11)->id;
										echo anchor("category/{$news_category_view_id_11}", 'See more..', ['class' => '']);
									?>
								</div>	
								<!--End News category view-->
							</div>
						</div>				
						<!--End Eleven Section-->
					
						<!--Twelve Section-->
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 wow fadeInRight">
							<div class="category-title">
								<h3><?php echo $controller->sketch_category_data($home_sketch->section_12)->title;?></h3>
							</div>
							<?php 
								$section_12 = $controller->sketch_news_list($home_sketch->section_12, 1, 0);
								if($section_12){
									foreach($section_12 as $section_12_news_list){
							?>					
							<div class="card home-news-item">
								<div class="image-container">	
									<?php 
										if(!empty($section_12_news_list->video_link)){
									?>
									<iframe class="" width="" height="" src="https://www.youtube.com/embed/<?php echo $section_12_news_list->video_link; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
									<?php 
										}else{
									?>
									<img src="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_12_news_list->news_image;?>" alt="<?php echo $section_12_news_list->news_title;?>" class="card-img-top" />
									<?php 
										}
									?>										
								</div>
								<div class="card-body">
									<h3 class="card-title">
										<a href="<?php echo base_url()."news/{$section_12_news_list->slug}";?>">
											<?php echo word_limiter($section_12_news_list->news_title, 7);?>	
											<?php
												if($section_12_news_list->exclusive == 1){
													echo "[Exclusive]";
												}
											?>	
										</a>
									</h3>
									<div class="card-text"><?php echo word_limiter($section_12_news_list->description, 20);?></div>
								</div>
							</div>
							<?php
									}
								}						
							?>	
						
							<div class="card home-news-item">
								<div class="card-body">
									<ul>
										<?php 
											$section_12_bottom = $controller->sketch_news_list($home_sketch->section_12, 4, 1);
											if($section_12_bottom){
												foreach($section_12_bottom as $section_12_section_bottom_news_list){
										?>	
											<li>										
												<img src="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_12_section_bottom_news_list->news_image;?>" alt="<?php echo $section_12_section_bottom_news_list->news_title;?>" />										
												<a href="<?php echo base_url()."news/{$section_12_section_bottom_news_list->slug}";?>" 	
													data-toggle="popover" 
													data-img="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_12_section_bottom_news_list->news_image;?>" 
													data-header="<?php echo $section_12_section_bottom_news_list->news_title;?>" 
													data-desc="<?php echo word_limiter($section_12_section_bottom_news_list->description, 20);?>">
													<?php echo word_limiter($section_12_section_bottom_news_list->news_title, 7);?>	
													<?php
														if($section_12_section_bottom_news_list->exclusive == 1){
															echo "[Exclusive]";
														}
													?>	
												</a>
											</li>
										<?php
												}
											}						
										?>								
									</ul>
								</div>							
								<!--News category view-->
								<div class="news-category-details">
									<?php
										$news_category_view_id_12 = $controller->sketch_category_data($home_sketch->section_12)->id;
										echo anchor("category/{$news_category_view_id_12}", 'See more..', ['class' => '']);
									?>
								</div>	
								<!--End News category view-->
							</div>		
						</div>		
						<!--End Twelve Section-->
						
						<!--Body Second Ad-->
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="body-ad">
								<?php 	
									$body_second_ad = $controller->body_ad(1, 1);								
									if($body_second_ad){
										foreach($body_second_ad as $body_second_ad_row){
								?>									
								<?php echo $body_second_ad_row->input;?>
								<?php
										}
									}						
								?>	
							</div>					
						</div>
						<!--End Body Second Ad-->
					</div>		
					<!--End Second Row-->
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
			
			<!--Full width-->
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">			
				<div class="row">					
					
					<!--Thirteen Section-->
					<div class="category-title">
						<h3><?php echo $controller->sketch_category_data($home_sketch->section_13)->title;?></h3>
					</div>
					<div class="row">
						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
							<div class="row">
								<?php 
									$section_13 = $controller->sketch_news_list($home_sketch->section_13, 1, 0);
									if($section_13){
									foreach($section_13 as $section_13_news_list){
								?>	
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 wow fadeInLeft">
										<div class="card home-news-item-lg">
											<div class="image-container">
												<?php 
													if(!empty($section_13_news_list->video_link)){
												?>
												<iframe class="" width="" height="" src="https://www.youtube.com/embed/<?php echo $section_13_news_list->video_link; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
												<?php 
													}else{
												?>
												<img src="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_13_news_list->news_image;?>" alt="<?php echo $section_13_news_list->news_title;?>" class="card-img-top" />
												<?php 
													}
												?>										
											</div>
											<div class="card-body">
												<h3 class="card-title">
													<a href="<?php echo base_url()."news/{$section_13_news_list->slug}";?>">
														<?php echo word_limiter($section_13_news_list->news_title, 7);?>		
														<?php
															if($section_13_news_list->exclusive == 1){
																echo "[Exclusive]";
															}
														?>	
													</a>
												</h3>											
												<div class="card-text">
													<?php echo word_limiter($section_13_news_list->description, 50);?>
												</div>
												<div class="news-tag">
													<span class="fa fa-tag"></span>
													<?php 
														$section_13_news_tags = explode(",", $section_13_news_list->tags);
														foreach($section_13_news_tags as $section_13_news_tags_row){
															echo "<a href='".base_url()."tags/".$section_13_news_tags_row."' class='tag'>".$section_13_news_tags_row."</a>";
														}
													?>
												</div>
											</div>
										</div>
									</div>
								<?php
										}
									}						
								?>									
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 wow fadeInRight">
							<div class="row">
								<?php 
									$section_13 = $controller->sketch_news_list($home_sketch->section_13, 4, 1);
									if($section_13){
									foreach($section_13 as $section_13_news_list){
								?>	
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 wow fadeIn">
										<div class="card home-news-item">
											<div class="image-container">
												<?php 
													if(!empty($section_13_news_list->video_link)){
												?>
												<iframe class="" width="" height="" src="https://www.youtube.com/embed/<?php echo $section_13_news_list->video_link; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
												<?php 
													}else{
												?>
												<img src="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_13_news_list->news_image;?>" alt="<?php echo $section_13_news_list->news_title;?>" class="card-img-top" />
												<?php 
													}
												?>										
											</div>
											<div class="card-body">
												<h3 class="card-title">
													<a href="<?php echo base_url()."news/{$section_13_news_list->slug}";?>">
														<?php echo word_limiter($section_13_news_list->news_title, 7);?>		
														<?php
															if($section_13_news_list->exclusive == 1){
																echo "[Exclusive]";
															}
														?>	
													</a>
												</h3>
												<div class="card-text"><?php echo word_limiter($section_13_news_list->description, 20);?></div>
											</div>
										</div>
									</div>
								<?php
										}
									}						
								?>	
							</div>
						</div>
					</div>
																
					<!--News category view-->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="news-category-details">
							<?php
								$news_category_view_id_15 = $controller->sketch_category_data($home_sketch->section_13)->id;
								echo anchor("category/{$news_category_view_id_15}", 'See more..', ['class' => '']);
							?>
						</div>							
					</div>		
					<!--End News category view-->		
					<!--End Thirteen Section-->		
					
					<!--Video-->
					<div class="category-title">
						<h3>Video</h3>
					</div>
					
					<!--video-->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 wow fadeIn">
						<div class="row">						
							<?php 	
								$video_list = $controller->video_list(3, 0);								
								if($video_list){
									foreach($video_list as $video_list_row){
							?>	
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 home-video-container">
								<div class="home-video-content">	
									<iframe width="" height="250" src="https://www.youtube.com/embed/<?php echo $video_list_row->link;?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
									<p><?php echo word_limiter($video_list_row->caption, 7);?></p>
								</div>	
							</div>	
							<?php
									}
								}						
							?>	
						</div>										
					</div>	
															
					<!--video page view-->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="news-category-details">
							<?php									
								echo anchor("video", 'See more..', ['class' => '']);
							?>
						</div>							
					</div>		
					<!--End video page view-->						
					<!--End video-->	

					
					<!--Fourteen Section-->
					<div class="category-title">
						<h3><?php echo $controller->sketch_category_data($home_sketch->section_14)->title;?></h3>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 wow zoomIn">
						<div class="slide-news-container owl-carousel owl-theme" id="news_slide">						
							<?php 
								$section_14 = $controller->sketch_news_list($home_sketch->section_14, 10, 0);
								if($section_14){
									foreach($section_14 as $section_14_news_list){
							?>	
								<div class="slide-news-content">
									<div class="slide-news-image-container">
										<img src="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_14_news_list->news_image;?>" alt="<?php echo $section_14_news_list->news_title;?>" class="slide-news-image" />
									</div>								
									
									<h3 class="slide-news-title">
										<a href="<?php echo base_url()."news/{$section_14_news_list->slug}";?>">
											<?php echo word_limiter($section_14_news_list->news_title, 10);?>
											<?php
												if($section_14_news_list->exclusive == 1){
													echo "[Exclusive]";
												}
											?>	
										</a>
									</h3>
								</div>
							<?php
									}
								}						
							?>								
						</div>
					</div>													
					<!--News category view-->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="news-category-details">
							<?php
								$news_category_view_id_13 = $controller->sketch_category_data($home_sketch->section_14)->id;
								echo anchor("category/{$news_category_view_id_13}", 'See more..', ['class' => '']);
							?>
						</div>							
					</div>		
					<!--End News category view-->		
					<!--End Fourteen Section-->	
				
					<!--Fifteen Section-->
					<div class="category-title">
						<h3><?php echo $controller->sketch_category_data($home_sketch->section_15)->title;?></h3>
					</div>						
					<?php 
						$section_15 = $controller->sketch_news_list($home_sketch->section_15, 2, 0);
						if($section_15){
							foreach($section_15 as $section_15_news_list){
					?>	
						<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 wow fadeInLeft">
							<div class="card home-news-item">
								<div class="image-container">	
									<?php 
										if(!empty($section_15_news_list->video_link)){
									?>
									<iframe class="" width="" height="" src="https://www.youtube.com/embed/<?php echo $section_15_news_list->video_link; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
									<?php 
										}else{
									?>
									<img src="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_15_news_list->news_image;?>" alt="<?php echo $section_15_news_list->news_title;?>" class="card-img-top" />
									<?php 
										}
									?>										
								</div>
								<div class="card-body">
									<h3 class="card-title">
										<a href="<?php echo base_url()."news/{$section_15_news_list->slug}";?>">
											<?php echo word_limiter($section_15_news_list->news_title, 7);?>	
											<?php
												if($section_15_news_list->exclusive == 1){
													echo "[Exclusive]";
												}
											?>	
										</a>
									</h3>
									<div class="card-text"><?php echo word_limiter($section_15_news_list->description, 20);?></div>
								</div>
							</div>
						</div>
					<?php
							}
						}						
					?>	
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 wow fadeInUp">
						<div class="card home-news-item">
							<div class="card-body">
								<ul>
									<?php 
										$section_15_side = $controller->sketch_news_list($home_sketch->section_15, 4, 2);
										if($section_15_side){
											foreach($section_15_side as $section_15_side_news_list){
									?>	
										<li>	
											<img src="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_15_side_news_list->news_image;?>" alt="<?php echo $section_15_side_news_list->news_title;?>" />
											
											<a href="<?php echo base_url()."news/{$section_15_side_news_list->slug}";?>" 
												data-toggle="popover" 
												data-img="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_15_side_news_list->news_image;?>" 
												data-header="<?php echo $section_15_side_news_list->news_title;?>" 
												data-desc="<?php echo word_limiter($section_15_side_news_list->description, 20);?>">
												<?php echo word_limiter($section_15_side_news_list->news_title, 7);?>
												<?php
													if($section_15_side_news_list->exclusive == 1){
														echo "[Exclusive]";
													}
												?>	
											</a>
										</li>
									<?php
											}
										}						
									?>								
								</ul>
							</div>
						</div>
					</div>
					
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 wow fadeInDown">
						<div class="card home-news-item">
							<div class="card-body">
								<ul>
									<?php 
										$section_15_side_2 = $controller->sketch_news_list($home_sketch->section_15, 4, 6);
										if($section_15_side_2){
											foreach($section_15_side_2 as $section_15_side_news_list){
									?>	
										<li>	
											<img src="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_15_side_news_list->news_image;?>" alt="<?php echo $section_15_side_news_list->news_title;?>" />
											
											<a href="<?php echo base_url()."news/{$section_15_side_news_list->slug}";?>" 
												data-toggle="popover" 
												data-img="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $section_15_side_news_list->news_image;?>" 
												data-header="<?php echo $section_15_side_news_list->news_title;?>" 
												data-desc="<?php echo word_limiter($section_15_side_news_list->description, 20);?>">
												<?php echo word_limiter($section_15_side_news_list->news_title, 7);?>
												<?php
													if($section_15_side_news_list->exclusive == 1){
														echo "[Exclusive]";
													}
												?>	
											</a>
										</li>
									<?php
											}
										}						
									?>								
								</ul>
							</div>
						</div>
					</div>													
					<!--News category view-->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="news-category-details">
							<?php
								$news_category_view_id_14 = $controller->sketch_category_data($home_sketch->section_15)->id;
								echo anchor("category/{$news_category_view_id_14}", 'See more..', ['class' => '']);
							?>
						</div>							
					</div>		
					<!--End News category view-->		
					<!--End Fifteen Section-->
					
				</div>
			</div>
			<!--End Full width-->						
		</div>				
		<!--End First Row-->	
	</div>
	<!--End main content area-->


	<!--Modal Notice-->	
	<?php 
		$modal_notice_list = $controller->notice_list(1, 0);								
		if(!empty($modal_notice_list)){
			foreach($modal_notice_list as $modal_notice_list_row){
				if($modal_notice_list_row->modal == 1){
	?>	
	<div class="modal notice-area" tabindex="-1" id="modal_notice" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content notice-container">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>					
					<?php 	
						echo "<p class='title'>".$modal_notice_list_row->title."</p>";
						echo "<hr />";
						echo "<p class='description'>".$modal_notice_list_row->notice."</p>";					
					?>	
				</div>
			</div>
		</div>
	</div>	
	<?php 
				}
			}
		}	
	?>
	<!--End Modal Notice-->
	
<!--including footer section-->
<?php include('include/footer.php');?>
<!--End including footer section-->
	<script>		
		var base_url = '<?php echo base_url();?>';
		$(function() {			
			// Modal Notice
			modal_notice();
			function modal_notice(){
				if($('#modal_notice').length == 1){
					$('#modal_notice').modal('show');
				}
			}	
			
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
			
			//Preloader
			preloader();
			function preloader() {
				$.fakeLoader({
					bgColor: '#03244B',
					spinner:"spinner1"
				});
			}
			
			//NewsTicker
			newsTicker();
			function newsTicker() {
				$('#newsTicker').breakingNews({
					effect: 'scroll'
				});
			}
			
			//Animation
			animation();
			function animation() {
				new WOW().init();
			}		
			
			//lightgallery
			lightGallery();
			function lightGallery(){
				$('.lightgallery').lightGallery();
			}		
			
			// Featured news and Gallery slide
			featured_news_gallery_slide();
			function featured_news_gallery_slide(){
				$('#featured_news, #gallery_slide').owlCarousel({
					loop: true,
					margin: 0,
					nav: false,
					/*navText: ["<span class='fa fa-angle-left'></span>","<span class='fa fa-angle-right'></span>"],*/
					dots: false,
					autoplay: true,
					animateIn: 'fadeIn',
					animateOut: 'fadeOut',
					autoplayTimeout: 5000,
					autoplayHoverPause: true,
					responsive: {
						0: {
							items: 1
						},
						600: {
							items: 1
						},
						1000: {
							items: 1
						}
					}
				});
			}
			
			//News slide
			news_slide();
			function news_slide(){
				$('#news_slide').owlCarousel({
					loop: true,
					margin: 10,
					nav: true,
					navText: ["<span class='fa fa-angle-left'></span>","<span class='fa fa-angle-right'></span>"],
					dots: true,
					autoplay: true,
					autoplayTimeout: 10000,
					autoplayHoverPause: true,
					responsive: {
						0: {
							items: 1
						},
						600: {
							items: 2
						},
						1000: {
							items: 4
						}
					}
				});
			}
		});
	</script>
</body>
</html>