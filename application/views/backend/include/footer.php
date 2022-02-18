<!--Scroll up-->
<a id="scrollup" class="scrollup-backend" href="#top"><span class="fa fa-chevron-up"></span></a> 
<!--Scroll down-->
<!--<a id="scrolldown" href="#bottom"><span class="fa fa-chevron-down"></span></a>-->

<!--jQuery js -->
<script src="<?php echo base_url();?>assets/js/jquery.min.js" ></script>
<!--Popper js -->
<script src="<?php echo base_url();?>assets/js/popper.min.js" ></script>
<!--Bootstrap js -->
<script src="<?php echo base_url();?>assets/js/bootstrap.js" ></script>
<!--Summernote js -->  
<script src="<?php echo base_url();?>assets/plugins/summernote/summernote-bs4.js" ></script>
<script src="<?php echo base_url();?>assets/plugins/summernote/summernote-image-attributes.js" ></script>
<!--sidebar js -->
<script src="<?php echo base_url();?>assets/js/sidebar.js" ></script>
<!--Custom js -->
<script src="<?php echo base_url();?>assets/js/custom.js" ></script>    
<!--Preload-->
<script src="<?php echo base_url();?>assets/plugins/pace/pace.min.js"></script> 
<!--DataTable js -->
<script src="<?php echo base_url();?>assets/plugins/datatable/js/jquery.dataTables.min.js"></script>   
<script src="<?php echo base_url();?>assets/plugins/datatable/js/dataTables.bootstrap4.min.js"></script>  
<!--Tags-input js-->
<script src="<?php echo base_url();?>assets/plugins/tags-input/jquery.tagsinput-revisited.min.js"></script> 
<!--Morris Chart js -->  
<script src="<?php echo base_url();?>assets/plugins/morris/js/raphael-min.js"></script> 
<script src="<?php echo base_url();?>assets/plugins/morris/js/morris.min.js"></script> 	 
<!-- lightGallery js -->  
<script src="<?php echo base_url();?>assets/plugins/lightGallery/js/lightgallery-all.js"></script>    
<!--Scroll up and down js-->
<script src="<?php echo base_url();?>assets/plugins/scroll_up_down/scroll_up_down.js"></script>      
<!-- full calendar js -->     
<script src="<?php echo base_url();?>assets/plugins/fullcalendar/js/moment.min.js"></script>   
<script src="<?php echo base_url();?>assets/plugins/fullcalendar/js/fullcalendar.min.js"></script> 
<!--Clipboard js-->
<script src="<?php echo base_url();?>assets/plugins/clipboard.js-master/clipboard.min.js"></script> 
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