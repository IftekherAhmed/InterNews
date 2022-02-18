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
								<span class="float-right badge custom-badge-info"><?php echo $total_unseen_message;?></span>
							</div>
							<div class="card-body row p-4">	
								<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 email-left-side mb-2">
									<ul class="list-group">
										<li class="list-group-item" id="compose_mail">
											<a href="#" title="Compose mail"><span class="fa fa-plus"></span> Compose mail</a>
										</li>
										<li class="list-group-item d-flex justify-content-between active" id="mail_inbox">
											<a href="#" title="Inbox"><span class="fa fa-inbox"></span> Inbox</a>
											<span class="badge badge-warning"><?php echo $total_unseen_message;?></span>
										</li>
										<li class="list-group-item d-flex justify-content-between">
											<?php echo anchor("ct_backend/send_message_page", '<span class="fa fa-share"></span> Send', ['title' => 'Send']);?>
											<span class="badge badge-success"><?php echo $total_send_message;?></span>
										</li>
									</ul>
								</div>
							
								<div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 view-email-right-side mb-2">	
									<div class="inbox-email-right-side mb-2" id="data_list_box">								
										<!--Message List-->	
										<div id="show_message">																							
										</div>								
										<!--End Message List-->
									</div>			
									<!--Add and Edit Message-->
									<div class="card dashboard-chat-area" id="add_data_box">
										<div class="card-header" id="add_edit_data_post_header"> </div>
										<div class="card-body">								
											<?php echo form_open('', ['id'=>'mail_form', 'class'=>'custom-form-input custom-form-button']); ?> 
												<?php echo form_input(['name'=>'type', 'type'=>'hidden', 'value'=>'send']); ?>
												<?php echo form_input(['name'=>'parent_id', 'type'=>'hidden']); ?>
												<?php echo form_input(['name'=>'watched', 'type'=>'hidden', 'value'=>0]); ?>
												<div class="row">
													<div class="col-xl-8 col-lg-8 col-md-12 col-lg-12 pl-0">												
														<div class="form-group">
															<?php echo form_label('Sender Email');?>	
															<?php echo form_input(['name'=>'from_email', 'class'=>'form-control custom-input-readonly', 'value'=>$smtp_setting_view->sending_email]); ?>
														</div>	
													</div>
													<div class="col-xl-4 col-lg-4 col-md-12 col-lg-12 p-0">													
														<div class="form-group">
															<?php echo form_label('Sender Name');?>
															<?php echo form_error('sender_name', '<div class="text-danger">', '</div>');?>
															<?php echo form_input(['name'=>'sender_name', 'class'=>'form-control custom-input-readonly', 'placeholder'=>'Sender Name', 'value'=>$smtp_setting_view->sending_name]); ?>
														</div>												
													</div>
												</div>
												
												<div class="form-group">
													<?php echo form_input(['name'=>'to_email', 'class'=>'form-control', 'placeholder'=>'receiver email']); ?>
												</div>	
												
												<div class="form-group">
													<?php echo form_input(['name'=>'subject', 'class'=>'form-control', 'placeholder'=>'Subject']); ?>
												</div>	
												
												<div class="form-group">
													<?php echo form_textarea(['name'=>'message', 'class'=>'form-control', 'placeholder'=>'Message']); ?>
												</div>																										
																		
												<?php echo form_button('', 'Send', 'id="send_mail" class="btn btn-primary"');?>	
												<?php echo form_button('', 'Close', 'id="close_data" class="btn btn-danger"');?>								
											<?php echo form_close(); ?> 
										</div>    
									</div>			
									<!--End Add and Edit Message-->									
								</div>	
								<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12"></div>					
							</div>
						</div>					
					</div>	
					<!--End Message Page-->	
				</div>
				<!--End Row-->
			</div>	
		
					
			<!--Add & Close Data Button-->
			<div class="add-data-area">
				<div class="add-data" id="add_data_btn">
					<a href="#" class="add"><span class="fa fa-plus"></span></a>
				</div>
				<div class="add-data" style="display:none;" id="close_data_btn">
					<a href="#" class="close"><span class="fa fa-times"></span></a>
				</div>
			</div>
			<!--End Add & Close Data Button-->		
			
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
		
			//add post box menu class toggler
			$("#add_data_btn, #close_data_btn").on('click', function() {
				$("#compose_mail").toggleClass("active");
				$("#mail_inbox").toggleClass("active");
			});
		
			//add post box toggler
			$("#compose_mail, #mail_inbox").on('click', function() {
				$("#add_data_box").toggle(300);
				$("#data_list_box").toggle(300);
				$("#add_data_btn").fadeToggle(300);
				$("#close_data_btn").fadeToggle(300);
				$("#compose_mail").toggleClass("active");
				$("#mail_inbox").toggleClass("active");
			});
		
			//Reload Message After 5 Seconds
			setInterval(function(){
				show_message(); 		
				$("#content_loader").toggle().fadeOut(4000);
			}, 10000);	
			
			//Show Message
			show_message();
			function show_message(){
				$.ajax({
					url: base_url+'ct_backend/show_message',
					type: "POST",
					cache: false,
					success: function(data){
						$('#show_message').html(data); 
					}
				});
			}
			//End Show Message	
			
			//Send Mail
			$('#add_data_btn, #compose_mail').on('click', function(){
				$('#add_edit_data_post_header').text('Compose new email');
				$('#mail_form').attr('action', base_url+'ct_backend/send_mail/');
			});
			
			$('#send_mail').on('click', function(){	
				var url = $('#mail_form').attr('action');
				var data = $('#mail_form').serialize();
				var to_email = $('input[name=to_email]');
				var message = $('textarea[name=message]');
				var result = '';
				if(to_email.val()==''){
					to_email.addClass('form-control is-invalid');
				}else{
					to_email.removeClass('is-invalid');
					result ='1';
				}
				if(message.val()==''){
					message.addClass('form-control is-invalid');
				}else{
					message.removeClass('is-invalid');
					result +='2';
				}

				if(result =='12'){
					$.ajax({
						type: 'ajax',
						method: 'post',
						url: url,
						data: data,
						async: false,
						dataType: 'json',
						success: function(response){
							if(response.success){
								$('#mail_form')[0].reset();	
								$("#add_data_box").toggle(300);
								$("#data_list_box").toggle(300);
								$("#add_data_btn").fadeToggle(300);
								$("#close_data_btn").fadeToggle(300);
								$("#compose_mail").toggleClass("active");
								$("#mail_inbox").toggleClass("active");						
								toast();
								function toast(){
									$.toast({
										text: 'Message '+response.type+' successfully!', 		
										icon: 'success' 
									});
								}
								show_message();	
							}else{						
								toast();
								function toast(){
									$.toast({
										text: 'Operation unsuccessful!', 		
										icon: 'error' 
									});
								}
							}
						}				
					});
				}
			});
			//End Send Mail
			
			//Reply Mail
			$('#show_message').on('click', '.reply-mail', function(){			
				var id = $(this).attr('data_id');
				$('#add_edit_data_post_header').text('Reply Mail');
				$('#mail_form').attr('action', base_url+'ct_backend/reply_mail/');
				
				$("#add_data_box").toggle(300);
				$("#data_list_box").toggle(300);
				$("#add_data_btn").fadeToggle(300);
				$("#close_data_btn").fadeToggle(300);
				$("#compose_mail").toggleClass("active");
				$("#mail_inbox").toggleClass("active");
				
				$.ajax({
					type: 'ajax',
					method: 'get',
					url: base_url+'ct_backend/single_message_data/'+id,
					async: false,
					dataType: 'json',
					success: function(data){
						$('input[name=to_email]').val(data.from_email);
						$('input[name=parent_id]').val(id);
					},
					error: function(){					
						toast();
						function toast(){
							$.toast({
								text: 'Could not get message data!', 		
								icon: 'warning'
							});
						}
					}
				});
			});
			//End Reply Mail
			
			//Delete Message
			$('#show_message').on('click', '.message-delete', function(){
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
							show_message();	
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