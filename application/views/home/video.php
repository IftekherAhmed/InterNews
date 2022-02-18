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
				<div class="video-page-area">
					<div class="row">
						<?php if(!empty($video_list)){?>		
						<?php foreach($video_list as $video_list_row){?>				
							<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">	
								<div class="video-container">	
									<div class="video-page-content">	
										<iframe width="" height="300" src="https://www.youtube.com/embed/<?php echo $video_list_row->link;?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
										<p>
											<?php echo $video_list_row->caption;?> |
											<span><?php echo nice_date($video_list_row->published, 'M j, y');?></span>
										</p>
									</div>
								</div>
							</div>
						<?php }?>
						<?php 
						}else{
						echo "<div class='page-content'>							
								<div class='page-desc'>
									<h3>Sorry no video found!</h3>
								</div>
							</div>";
						}
						?>				
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