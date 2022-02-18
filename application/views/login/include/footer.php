				</div>				
			</div>				
		</div>	
	</div>
</div>
<!--end login page-->		

<!-- jquery js -->
<script src="<?php echo base_url();?>assets/js/jquery.min.js" ></script>
<!-- popper js -->
<script src="<?php echo base_url();?>assets/js/popper.min.js" ></script>
<!-- bootstrap js -->
<script src="<?php echo base_url();?>assets/js/bootstrap.js" ></script>
<!-- custom js -->
<script src="<?php echo base_url();?>assets/js/custom.js" ></script>  
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
</body>
</html>