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
							
					<!--Message Page-->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="card custom-content-area">
							<div class="card-header"> 
								<?php echo anchor('ct_backend/index', '<span class="fa fa-puzzle-piece"></span> Dashboard', 'title="Dashboard"');?> / Message											
								<img src="<?php echo base_url()."assets/images/default/content_loader.gif"; ?>" alt="data loader" class="content_loader" id="content_loader" />
								<span class="float-right badge custom-badge-info"><?php echo $total_message;?></span>
							</div>
							<div class="card-body row p-4">	
								
								<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 email-left-side mb-2">
									<ul class="list-group">
										<li class="list-group-item d-flex justify-content-between" id="mail_inbox">
											<?php echo anchor("ct_backend/message_page", '<span class="fa fa-inbox"></span> Inbox', ['title' => 'Inbox']);?>
											<span class="badge badge-warning"><?php echo $total_unseen_message;?></span>
										</li>
										<li class="list-group-item d-flex justify-content-between active">
											<a href="#" title="Send"><span class="fa fa-share"></span> Send</a>
											<span class="badge badge-success"><?php echo $total_send_message;?></span>
										</li>
									</ul>
								</div>
							
								<div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 view-email-right-side mb-2">	
									<div class="inbox-email-right-side mb-2" id="data_list_box">										
										<!--Send Message List-->
										<div id="show_send_message">																						
										</div>										
										<!--End Send Message List-->
									</div>									
								</div>	
								<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12"></div>					
							</div>
						</div>					
					</div>	
					<!--End Message Page-->	
				</div>
				<!--End Row-->
			</div>				
							
			<!--Message Delete Modal-->
			<div class="modal fade" id="delete_Modal" tabindex="-1" role="dialog" aria-labelledby="delete_modal_label" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="delete_modal_label">Confirm Delete</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							Do you want to delete this?
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="button" id="btn_delete" class="btn btn-outline-danger">Delete</button>
						</div>
					</div>
				</div>
			</div>
			<!--End Message Delete Modal-->
			
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
			//Reload Message After 5 Seconds
			setInterval(function(){
				show_send_message(); 		
				$("#content_loader").toggle().fadeOut(4000);
			}, 10000);	
			
			//Show Message
			show_send_message();
			function show_send_message(){
				$.ajax({
					url: base_url+'ct_backend/show_send_message',
					type: "POST",
					cache: false,
					success: function(data){
						$('#show_send_message').html(data); 
					}
				});
			}
			//End Show Message	
			
			//Delete Message
			$('#show_send_message').on('click', '.message-delete', function(){
				var id = $(this).attr('data_id');
				$('#delete_Modal').modal('show');
				$('#btn_delete').unbind().on('click', function(){
					$.ajax({
						type: 'ajax',
						method: 'get',
						async: false,
						url: base_url+'ct_backend/delete_message/' +id,
						dataType: 'json',
						success: function(){
							$('#delete_Modal').modal('hide');						
							toast();
							function toast(){
								$.toast({
									text: 'Successfully deleted message!', 		
									icon: 'success'
								});
							}
							show_send_message();	
						},error: function(){				
							toast();
							function toast(){
								$.toast({
									text: 'Message deleting unsuccessfull!', 		
									icon: 'error'
								});
							}
						}
					});
				});
			});
			//End Delete Message					
		});
	</script>
	<!--End Ajax Query-->	
</body>
</html>