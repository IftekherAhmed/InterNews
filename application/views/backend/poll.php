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
							
					<!--Poll Page-->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="card custom-content-area">
							<div class="card-header"> <?php echo anchor('ct_backend/index', '<span class="fa fa-puzzle-piece"></span> Dashboard', 'title="Dashboard"');?> / Poll											
								<img src="<?php echo base_url()."assets/images/default/content_loader.gif"; ?>" alt="data loader" class="content_loader" id="content_loader" />
								<span class="float-right badge custom-badge-info"><?php echo $total_poll;?></span>
							</div>
							<div class="card-body row p-4">								
								<!--Poll List-->
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-2" id="data_list_box">
									<div class="responsive-table table-custom">
										<table class="table custom-form-button custom-square-button" id="show_poll">
											<thead>
												<tr>
													<th>Question</th>
													<th>Publisher</th>
													<th>Status</th>
													<th>Published</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>												
											</tbody>
										</table>
									</div>
								</div>
								<!--End Poll List-->
							
								<!--Add Poll-->
								<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2" id="add_data_box">
									<div class="card">
										<div class="card-header" id="add_edit_data_post_header"> </div>
										<div class="card-body">
											<?php echo form_open('', ['id'=>'poll_form', 'class'=>'custom-form-input']); ?> 	
												<?php echo form_input(['name'=>'publisher_id', 'type'=>'hidden', 'value'=>$logged_user_id]); ?>
												<div class="form-group">
													<?php echo form_label('Question');?>	
													<?php echo form_input(['name'=>'question', 'class'=>'form-control', 'placeholder'=>'Question']); ?>
												</div>	
												
												<div id="dynamic_poll_option">
													<?php echo form_label('Option');?>
													<div class="form-group">	
														<div class="input-group custom-form-right-group">
															<?php echo form_input(['name'=>'option[]', 'class'=>'form-control', 'placeholder'=>'Option']); ?>
															<div class="input-group-append">
																<button type="button" name="add" id="plus_option" class="btn btn-sm btn-success">
																	<span class="fa fa-plus"></span>
																</button>
															</div>
														</div>
													</div>	
												</div>	
												<div class="custom-form-button">
													<?php echo form_button('', 'Save', 'id="add_poll" class="btn btn-primary"');?>	
													<?php echo form_button('', 'Close', 'id="close_data" class="btn btn-danger"');?>
												</div>												
											<?php echo form_close(); ?> 
										</div>
									</div>
								</div>
								<!--End Add Poll-->
							</div>
						</div>					
					</div>	
					<!--End Poll Page-->	
				</div>
				<!--End Row-->
			</div>	
			<!--End Second Content Section-->
			
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
			
			<!--Poll Options Modal-->
			<div class="modal fade bd-example-modal-lg" id="poll_option_model" tabindex="-1" role="dialog" aria-labelledby="poll_option_model" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Poll Options</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="responsive-table table-custom">
								<table class="table custom-form-button custom-square-button" id="show_poll_options">
									<thead>
										<tr>
											<th>Option</th>
											<th>Vote</th>
										</tr>
									</thead>
									<tbody>												
									</tbody>
								</table>
							</div>						
						</div>
						<div class="modal-footer">
							<a href="#" class="btn btn-info" id="pool_option_edit_page" title="Edit">Edit</a>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!--End Poll Options Modal-->		
			
			<!--Poll Delete Modal-->
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
			<!--End Poll Delete Modal-->	
			
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
		
			//Show Poll
			show_poll();	
			function show_poll(){	
				var table = $('#show_poll').DataTable({
					ajax: base_url+'ct_backend/show_poll',
					lengthChange: false,
					ordering: true,
					columnDefs: [{
						targets: [3],
						orderable: false,
						searchable: false
					}]
				});	
				
				//Reload Category After 5 Seconds
				setInterval(function(){
					table.ajax.reload(); 		
					$("#content_loader").toggle().fadeOut(4000);
				}, 60000);					
								
				// Set Poll Visible
				$('#show_poll').on('click', '.poll-show', function(){
					var id = $(this).attr('data_id');
					$.ajax({
						type: 'ajax',
						method: 'get',
						async: false,
						url: base_url+'ct_backend/set_poll_show/' +id,
						dataType: 'json',
						success: function(){					
							toast();
							function toast(){
								$.toast({
									text: 'Poll transformed successfully!', 		
									icon: 'success' 
								});
								table.ajax.reload(); 
							}
						},error: function(){					
							toast();
							function toast(){
								$.toast({
									text: 'Poll transforming unsuccessfull!', 		
									icon: 'error' 
								});
							}
						}
					});
				});
				//End Set Poll Visible
				
				// Set Poll Hide
				$('#show_poll').on('click', '.poll-hide', function(){
					var id = $(this).attr('data_id');
					$.ajax({
						type: 'ajax',
						method: 'get',
						async: false,
						url: base_url+'ct_backend/set_poll_hide/' +id,
						dataType: 'json',
						success: function(){				
							toast();
							function toast(){
								$.toast({
									text: 'Poll transformed successfully!', 		
									icon: 'success' 
								});
								table.ajax.reload(); 
							}
						},error: function(){				
							toast();
							function toast(){
								$.toast({
									text: 'Poll transforming unsuccessfull!', 		
									icon: 'error' 
								});
							}
						}
					});	
				});
				// End Set Poll
				
				//Poll form will be reset when clicked Poll close button
				$('#close_data, #close_data_btn').on('click', function(){
					$('#poll_form')[0].reset();
				});				
				
				//Add New Poll	
				$('#add_data_btn').on('click', function(){
					$('#add_edit_data_post_header').text('Add New Poll');
					$('#poll_form').attr('action', base_url+'ct_backend/add_poll/');
				});
				
				$('#add_poll').on('click', function(){	
					var url = $('#poll_form').attr('action');
					var data = $('#poll_form').serialize();
					var question = $('input[name=question]');
					var result = '';
					if(question.val()==''){
						question.addClass('form-control is-invalid');
					}else{
						question.removeClass('is-invalid');
						result +='1';
					}

					if(result =='1'){
						$.ajax({
							type: 'ajax',
							method: 'post',
							url: url,
							data: data,
							async: false,
							dataType: 'json',
							success: function(response){
								if(response.success){
									$('#poll_form')[0].reset();	
									$("#add_data_box").toggle(300);
									$("#data_list_box").toggle(300);
									$("#add_data_btn").fadeToggle(300);
									$("#close_data_btn").fadeToggle(300);						
									toast();
									function toast(){
										$.toast({
											text: 'poll '+response.type+' successfully!', 		
											icon: 'success' 
										});
									}
									table.ajax.reload(); 
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
				//End Add Poll

				// Poll Option	
				// Plus Poll input option
				var i=1;
				$("#dynamic_poll_option").on('click', '#plus_option', function(){
					i++;
					$('#dynamic_poll_option').append('<div class="form-group" id="poll_option_row'+i+'"><div class="input-group custom-form-right-group"><input type="text" name="option[]" placeholder="Option" class="form-control option_list" /><div class="input-group-append"><button type="button" name="remove" id="'+i+'" class="btn btn-sm btn-danger btn_poll_option_remove"><span class="fa fa-trash"></span></button></div></div></div>');
				});	
		
				// Minus Poll input option
				$("#dynamic_poll_option").on('click', '.btn_poll_option_remove', function(){
					var button_id = $(this).attr("id"); 
					$('#poll_option_row'+button_id+'').remove();
				});
				
				//Edit Poll
				$('#show_poll').on('click', '.poll-edit', function(){			
					var id = $(this).attr('data_id');
					$("#dynamic_poll_option").hide();	
					$("#add_data_box").toggle(300);	
					$("#data_list_box").toggle(300);	
					$("#add_data_btn").fadeToggle(300);
					$("#close_data_btn").fadeToggle(300);	
					$('#add_edit_data_post_header').text('Edit Poll');
					$('#poll_form').attr('action', base_url+'ct_backend/edit_poll/' + id);
					$.ajax({
						type: 'ajax',
						method: 'get',
						url: base_url+'ct_backend/single_poll_data/'+id,
						async: false,
						dataType: 'json',
						success: function(data){
							$('input[name=question]').val(data.question);
						},
						error: function(){					
							toast();
							function toast(){
								$.toast({
									text: 'Could not get poll data!', 		
									icon: 'warning'
								});
							}
						}
					});
				});
				//End Edit Poll	
				
				//Delete Poll
				$('#show_poll').on('click', '.poll-delete', function(){
					var id = $(this).attr('data_id');
					$('#delete_Modal').modal('show');
					$('#btn_delete').unbind().on('click', function(){
						$.ajax({
							type: 'ajax',
							method: 'get',
							async: false,
							url: base_url+'ct_backend/delete_poll/' +id,
							dataType: 'json',
							success: function(){
								$('#delete_Modal').modal('hide');						
								toast();
								function toast(){
									$.toast({
										text: 'Successfully deleted poll!', 		
										icon: 'success'
									});
								}
								table.ajax.reload(); 
							},error: function(){				
								toast();
								function toast(){
									$.toast({
										text: 'Poll deleting unsuccessfull!', 		
										icon: 'error'
									});
								}
							}
						});
					});
				});
				//End Delete Poll	
				
				//Show Poll Options
				$('#show_poll').on('click', '.show-poll-options', function(){
					$('#poll_option_model').modal('show');	
					var id = $(this).attr('data_id');	
					$('#pool_option_edit_page').attr('href', base_url+'ct_backend/poll_option_edit_page/' +id);					
					var poll_option_table = $('#show_poll_options').DataTable({
						ajax: base_url+'ct_backend/show_poll_options/' +id,
						destroy: true,
						lengthChange: false,
						searching: false,
						ordering: false,
						paging: false,
					});	
				});
				//Show Poll Options					
			}//End Show Poll			
		});
	</script>
	<!--End Ajax Query-->	
</body>
</html>	