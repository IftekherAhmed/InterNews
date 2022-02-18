<!DOCTYPE html>
<html lang="en">
<!--including header section-->
<?php include('include/header.php');?>
<!--End including header section-->
<body id="news_view_page">		
	<!--this code is for facebook comment plugin-->
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v4.0"></script>
	<!--end facebook comment plugin-->	
	
	<!--including header_bar section-->
	<?php include('include/header_bar.php');?>
	<!--End including header_bar section-->
	
	<!--main content area-->
	<div class="container-fluid main-content">	
		<div class="row">			
			
			<!--lefte side-->
			<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 left-side">			
				<div class="news-area">			
					<div class="row">
						<!--news details-->
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="news-content">	
							
								<?php 
									if($setting_data->news_breadcrumb == 1){
								?>
								<div class="news-breadcrumb-area">
									<ul class="news-breadcrumb">
										<li>
											<a href="<?php echo base_url()."home"; ?>">
												<span class="fa fa-home"></span> Home
											</a>
										
										</li>
										
										<li>
											<a href="<?php echo base_url()."category/{$news_data->category_id}"; ?>">
												<?php echo $news_data->category_title;?>
											</a>
										</li>
										
										<li>
											
										</li>
										
										<li>
											<a href="#">
												<?php echo word_limiter($news_data->news_title, 7); ?>
											</a>
										</li>
									</ul>
								</div>
								<?php 
									}
								?>
								
								<div class="news-content-header">
									<h4 class="news-sub-title"><?php echo $news_data->sub_title; ?></h4>
									<h3 class="news-title">
										<?php echo $news_data->news_title; ?>
										<?php
											if($news_data->exclusive == 1){
												echo "[Exclusive]";
											}
										?>		
									</h3>									
									
									<div class="news-assistant">
										<div class="news-assistant-btn-container">
											<button class="btn btn-secondary increase"><span class="fa fa-plus"></span></button>
											<button class="btn btn-secondary decrease"><span class="fa fa-minus"></span></button>
											<button class="btn btn-secondary" id="print_page"><span class="fa fa-print"></span></button>
										</div>
									</div>	
								
									<div class="news-information">										
										<p>
											Published: <?php echo nice_date($news_data->news_published, 'M j,Y. h.ia'); ?> &nbsp;
										</p>
										
										<p>
											<span class="fa fa-user"></span> 
											<?php 
												if(empty($news_data->news_behalf_as)){
												?>
												<a href="<?php echo base_url()."user/{$news_data->news_publisher_id}"; ?>">
													<?php echo $news_data->publisher_name;?>
												</a> &nbsp; 
											<?php 
												}else{
													echo $news_data->news_behalf_as;
												}
											?>
										</p>
									</div>	
								</div>	
								
								<div class="news-content-body">
									<div class="news-featured-img-container">
										<?php 
											if(!empty($news_data->video_link)){
										?>
										<iframe class="news-video" width="" height="" src="https://www.youtube.com/embed/<?php echo $news_data->video_link; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
										<?php 
											}else{
										?>
										<img class="news-image img-fluid" src="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $news_data->news_image; ?>" alt="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $news_data->news_title; ?>">
										<?php if(!empty($news_data->image_caption)){
											echo "<p class='news-image-caption'>".$news_data->image_caption."</p>";
										}								
										?>									
										<?php 
											}
										?>
									</div>									
									
									<div class="news-description">
										<?php echo $news_data->description; ?>
										<?php 
											if(!empty($news_data->news_courtesy)){
												echo "<hr /><p>News courtesy: <b>".$news_data->news_courtesy."</b></p>";
											}
										?>								
									</div>	
									<?php 
										if(!empty($news_data->video_link)){
									?>
									<div class="news-featured-img-container">
										<img class="news-image img-fluid" src="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $news_data->news_image; ?>" alt="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $news_data->news_title; ?>">
										<p class="news-image-caption"><?php echo $news_data->image_caption; ?></p>
									</div>	
									<?php 
										}
									?>
									
									<div class="news-tag">
										<span class="fa fa-tag"></span>
										<?php 
											$sectied_news_tags = explode(",", $news_data->tags);
											foreach($sectied_news_tags as $sectied_news_tags_row){
												echo "<a href='".base_url()."tags/".$sectied_news_tags_row."' class='tag'>".$sectied_news_tags_row."</a>";
											}
										?>
									</div>
										
									<!--Social Share-->
									<?php 
										if($setting_data->news_share == 1){
									?>
									<div class="news-share">
										<div class="my-plugin-share" share-url="<?php echo $site_url; ?>" show-count="false"></div>
									</div>
									<?php 
										}
									?>
									<!--End Social Share-->
								</div>					
							</div>					
						</div>
						<!--End news details-->	
						
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
						
						<!--News Extra Images-->	
						<?php 
							$news_images = $controller->single_news_images_list($news_data->id);
							if(!empty($news_images)){
						?>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 light-gallery-area">
							<div id="lightgallery" class="row">	
								<?php
									foreach($news_images as $news_images_row){
								?>
								<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12" data-src="<?php echo base_url();?>assets/images/news_extra_image/<?php echo $news_images_row->image; ?>" data-sub-html="<h4><?php echo $news_images_row->caption; ?></h4>">
									<div class="light-gallery-each news-extra-images">
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
					<br />
					
					<!--Comment-->
					<?php 
						if($setting_data->news_facebook_comments == 1){
					?>
					<div class="category-title">
						<h3>Comment</h3>
					</div>
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="card give-comment">							
								<div class="card-body">
									<div id="fb-root"></div>
									<!--facebook comment plugin-->	
									<div class="fb-comments" data-href="<?php echo $site_url; ?>" data-width="100%" data-numposts="5"></div>
									<!--end facebook comment plugin-->	
								</div>
							</div>
						</div>
					</div>
					<?php 
						}
					?>
					<!--End Comment-->
					
					<br />
					
					<!--Related News-->
					<?php 
						if($setting_data->news_related_post == 1){
					?>
					<div class="category-title">
						<h3>Related News</h3>
					</div>
					<div class="row">	
						<?php 						
							$related_news = $controller->sketch_news_list($news_data->category_id, 2, 0);
							if($related_news){
								foreach($related_news as $related_news_list){
						?>	
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
								<div class="card home-news-item">
									<div class="image-container">	
										<?php 
											if(!empty($related_news_list->video_link)){
										?>
										<iframe class="" width="" height="" src="https://www.youtube.com/embed/<?php echo $related_news_list->video_link; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
										<?php 
											}else{
										?>
										<img src="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $related_news_list->news_image;?>" alt="<?php echo $related_news_list->news_title;?>" class="card-img-top" />
										<?php 
											}
										?>										
									</div>
									<div class="card-body">
										<h3 class="card-title news-title">
											<a href="<?php echo base_url()."news/{$related_news_list->slug}";?>">
												<?php echo word_limiter($related_news_list->news_title, 7);?>	
												<?php
													if($related_news_list->exclusive == 1){
														echo "[Exclusive]";
													}
												?>	
											</a>
										</h3>
										<div class="card-text"><?php echo word_limiter($related_news_list->description, 20);?></div>
									</div>
								</div>
							</div>
						<?php
								}
							}						
						?>	
					
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 wow fadeInUp">
							<div class="card home-news-item">
								<div class="card-body">
									<ul>
										<?php 	
											$related_news_side = $controller->sketch_news_list($news_data->category_id, 4, 2);
											if($related_news_side){
												foreach($related_news_side as $related_news_side_news_list){
										?>	
											<li>	
												<img src="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $related_news_side_news_list->news_image;?>" alt="<?php echo $related_news_side_news_list->news_title;?>" />
												
												<a href="<?php echo base_url()."news/{$related_news_side_news_list->slug}";?>" 
													data-toggle="popover" 
													data-img="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $related_news_side_news_list->news_image;?>" 
													data-header="<?php echo $related_news_side_news_list->news_title;?>" 
													data-desc="<?php echo word_limiter($related_news_side_news_list->description, 20);?>">
													<?php echo word_limiter($related_news_side_news_list->news_title, 7);?>
													<?php
														if($related_news_side_news_list->exclusive == 1){
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
					</div>
					<?php 
						}
					?>
					<!--End Related News-->
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
			
			//lightgallery
			lightgallery()
			function lightgallery(){
				$('#lightgallery').lightGallery();
			}	
			
			//Font resizer
			font_resizer()
			function font_resizer(){
				var resize = new Array('.news-description');
				resize = resize.join(',');

				//increases font size when "+" is clicked
				$(".increase").click(function() {
				var originalFontSize = $(resize).css('font-size');
				var originalFontNumber = parseFloat(originalFontSize, 10);
				var newFontSize = originalFontNumber * 1.2;
				$(resize).css('font-size', newFontSize);
				return false;
				});

				//decrease font size when "-" is clicked
				$(".decrease").click(function() {
				var originalFontSize = $(resize).css('font-size');
				var originalFontNumber = parseFloat(originalFontSize, 10);
				var newFontSize = originalFontNumber * 0.8;
				$(resize).css('font-size', newFontSize);
				return false;
				});
			}	
			
			//News Print	
			news_print();		
			function news_print(){
				$("#news_view_page").find('#print_page').on('click', function() {
					//Print news_view_page with custom options
					$("#news_view_page").print({
						//Use Global styles
						globalStyles : true,
						//Add link with attrbute media=print
						mediaPrint : false,
						//Custom stylesheet
						stylesheet : "http://fonts.googleapis.com/css?family=Inconsolata",
						//Print in a hidden iframe
						iframe : false,
						//Don't print this
						noPrintSelector : ".avoid-this",
						//Add this at top
						prepend : "",
						//Add this on bottom
						append : "",
						//Log to console when printing is done via a deffered callback
						deferred: $.Deferred().done(function() { console.log('Printing done', arguments); })
					});
				});	
			}		
		});
	</script>
</body>
</html>