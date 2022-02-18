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
			<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12">
				<div class="page-area">
					<div class="row">				
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 left-side">
							<div class="page-content">							
								<div class="page-desc">
									<h3><?php echo $page_view->title; ?></h3>
									<p><?php echo html_entity_decode($page_view->description); ?></p>	
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