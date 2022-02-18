<!--footer bar-->
<?php 
	if($setting_data->footer_bar == 1){
?>
<div class="container-fluid footer-bar-area">	
	<div class="footer-bar">	
		<div class="row">
			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 footer-bar-image">				
				<img src="<?php echo base_url();?>assets/images/default/footer_logo.png" class="" alt="logo" />
			</div>
			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
				<div class="footer-bar-content">
					<p><?php echo $site_footer->footer_text; ?></p>
					<p>
					<?php if(!empty($setting_data->facebook)){?>
						<a href="https://www.facebook.com/<?php echo $site_footer->facebook; ?>">
							<span class="fab fa-facebook-f"></span> Facebook
						</a>
					<?php }?>	
					<?php if(!empty($setting_data->twitter)){?>
						<a href="https://www.twitter.com/<?php echo $site_footer->twitter; ?>">
							<span class="fab fa-twitter"></span> Twitter
						</a>
					<?php }?>	
					<?php if(!empty($setting_data->youtube)){?>
						<a href="https://www.youtube.com/<?php echo $site_footer->youtube; ?>">
							<span class="fab fa-youtube"></span> Youtube
						</a>
					<?php }?>	
					</p>	
				</div>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
				<div class="footer-bar-content">
					<p><span class="fa fa-map-marker-alt"></span> <?php echo $site_footer->address; ?></p>				
					<ul>
					<?php
						$page = $controller->page_list();
						if($page){
							foreach($page as $page_list){
								echo "<li>";
								echo "<a href='".base_url()."page/$page_list->id'>$page_list->title</a>";
								echo "</li>";
							}
						}
						echo "<li>".anchor('contact', 'Contact', ['class' => ''])."</li>";
						echo "<li>".anchor('login', 'Login', ['class' => ''])."</li>";
					?>
					</ul>
				</div>
			</div>
		</div>					
	</div>
</div>
<?php 
	}
?>
<!--End footer bar-->

<!--footer copyright-->
<div class="container-fluid footer-area">	
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 footer-copyright-area">
			<p><?php echo $site_footer->copyright; ?></p>		
		</div>
	</div>					
</div>
<!--End footer copyright-->

<!--Scroll up-->
<?php 
	if($setting_data->scroll_up == 1){
?>
<a id="scrollup" class="scrollup-home" href="#top"><span class="fa fa-chevron-up"></span></a> 
<?php 
	}
?>
<!--Scroll down-->
<!--<a id="scrolldown" href="#bottom"><span class="fa fa-chevron-down"></span></a>-->

<!-- jquery v3.4.1 js -->
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<!-- popper js -->	
<script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
<!--Summernote js -->  	
<script src="<?php echo base_url();?>assets/plugins/summernote/summernote-bs4.js" ></script>
<!-- custom js -->	
<script src="<?php echo base_url();?>assets/js/custom.js"></script>	
<!--jquery_ui js-->	
<script src="<?php echo base_url();?>assets/plugins/jquery_ui/jquery-ui.min.js"></script>	
<!--fakeloader js-->	
<script src="<?php echo base_url();?>assets/plugins/fakeloader/js/fakeLoader.min.js"></script>	
<!--news-ticker js file -->
<script src="<?php echo base_url();?>assets/plugins/breaking-news-ticker/breaking-news-ticker.min.js"></script>
<!--animate js file -->
<script src="<?php echo base_url();?>assets/plugins/animate/js/wow.min.js"></script>
<!--OwlCarousel js file -->
<script src="<?php echo base_url();?>assets/plugins/OwlCarousel/owl.carousel.min.js"></script>	 
<!-- lightGallery js -->  
<script src="<?php echo base_url();?>assets/plugins/lightGallery/js/lightgallery-all.js"></script>  
<!--Scroll up and down js-->
<script src="<?php echo base_url();?>assets/plugins/scroll_up_down/scroll_up_down.js"></script>
<!--Print js-->
<script src="<?php echo base_url();?>assets/plugins/print/jQuery.print.js"></script>  
<!--Share js-->
<script src="https://share.my-plugin.com/share.min.js?v=3.0"></script>  
<!--Toast js-->
<script src="<?php echo base_url();?>assets/plugins/toast/js/jquery.toast.js"></script> 
<!--Toast Notification-->
<?php 
	//If is there any error notification to show then it will work.
	if($this->session->flashdata('error')):
?>		
<script>		
toast();
function toast(){
	$.toast({
		text: '<?php echo $this->session->flashdata("error"); ?>', 
		icon: 'error' 
	});
}
</script>
<?php
	endif;	
?>
<?php
	//If is there any success notification to show then it will work.
	if($this->session->flashdata('success')):
?>			
<script>	
toast();
function toast(){
	$.toast({
		text: '<?php echo $this->session->flashdata("success"); ?>', 
		icon: 'success' 
	});
}
</script>
<?php
	endif;	
?>
<!--Ajax Query-->
<script>	
	var base_url = '<?php echo base_url();?>';
	$(function(){				
		//Search Form
		$('#search_btn').on('click', function(){				
			var search_input = $('input[name=search_input]');				
			var result = '';
			if(search_input.val()==''){
				var result = '';
			}else{
				var result = 1;
			}
			if(result =='1'){
				$('#search_form').attr('action', base_url+'ct_home/news_search/');
			}			
		});
		//End Search Form
	});
</script>
<!--End Ajax Query-->

<!--Input Javascript-->
<script>
<?php echo html_entity_decode($setting_data->js); ?>
</script>
<!--Input Javascript-->