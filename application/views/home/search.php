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
				<div class="category-area">
					<div class="row">
						<?php if($search):?>		
						<?php foreach($search as $search_list):?>				
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 wow fadeIn">
								<div class="card category-news-item-sm">
									<div class="image-container">	
										<?php 
											if(!empty($search_list->video_link)){
										?>
										<iframe class="" width="" height="" src="https://www.youtube.com/embed/<?php echo $search_list->video_link; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
										<?php 
											}else{
										?>
										<img src="<?php echo base_url();?>assets/images/news_featured_image/<?php echo $search_list->news_image;?>" alt="<?php echo $search_list->news_title;?>" class="card-img-top" />
										<?php 
											}
										?>										
									</div>
									<div class="card-body">
										<h3 class="card-title">
											<a href="<?php echo base_url()."news/{$search_list->slug}";?>">
												<?php echo word_limiter($search_list->news_title, 7);?>
												<?php
													if($search_list->exclusive == 1){
														echo "[Exclusive]";
													}
												?>	
											</a>
										</h3>	
										<div class="card-text"><?php echo word_limiter($search_list->description, 20);?></div>
									</div>
								</div>
							</div>
						<?php endforeach;?>
						<?php else:?>
							<div class="page-content">							
								<div class="page-desc">
									<h3>Sorry no news found!</h3>
								</div>
							</div>
						<?php endif;?>				
					</div>
					
					<!--margin-->
					<div class="margin-x-10"></div>
					<!--End margin-->					

					<!--pagination-->	
					<nav class="pagination-area">
						<?php echo $this->pagination->create_links();?>
					</nav>
					<!--End pagination-->						
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