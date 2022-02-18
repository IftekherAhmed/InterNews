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
							
					<!--Widget Page-->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="card custom-content-area">
							<div class="card-header"> <?php echo anchor('ct_backend/index', '<span class="fa fa-puzzle-piece"></span> Dashboard', 'title="Dashboard"');?> / Widget											
								<img src="<?php echo base_url()."assets/images/default/content_loader.gif"; ?>" alt="data loader" class="content_loader" id="content_loader" />
								<span class="float-right badge custom-badge-info"><?php echo $total_widget;?></span>
							</div>
							<div class="card-body row p-4">								
								<!--Widget List-->
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-2" id="data_list_box">
									<div class="responsive-table table-custom">
										<table class="table custom-form-button custom-square-button" id="show_widget">
											<thead>
												<tr>
													<th>Title</th>
													<th>Input</th>
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
								<!--End Widget List-->
							
								<!--Add Widget-->
								<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2" id="add_data_box">
									<div class="card">
										<div class="card-header" id="add_edit_data_post_header"> </div>
										<div class="card-body">
											<?php echo form_open('', ['id'=>'widget_form', 'class'=>'custom-form-input custom-form-button']); ?> 	
												<?php echo form_input(['name'=>'publisher_id', 'type'=>'hidden', 'value'=>$logged_user_id]); ?>
												<div class="form-group">
													<?php echo form_label('Title');?>	
													<?php echo form_input(['name'=>'title', 'class'=>'form-control', 'placeholder'=>'Title']); ?>
												</div>		
												
												<div class="form-group">
													<?php echo form_label('Input');?>	
													<?php echo form_textarea(['name'=>'input', 'class'=>'form-control', 'placeholder'=>'<Input>']); ?>
													<small class="form-text text-muted">
														325px*auto
													</small>
												</div>		
												
												<?php echo form_button('', 'Save', 'id="add_widget" class="btn btn-primary"');?>	
												<?php echo form_button('', 'Close', 'id="close_data" class="btn btn-danger"');?>								
											<?php echo form_close(); ?> 
										</div>
									</div>
								</div>
								<!--End Add Widget-->
							</div>
						</div>					
					</div>	
					<!--End Widget Page-->	
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
			
			<!--Widget Delete Modal-->
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
			<!--End Widget Delete Modal-->	
			
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
			//Show Widget
			show_widget();	
			function show_widget(){	
				var table = $('#show_widget').DataTable({
					ajax: base_url+'ct_backend/show_widget',
					lengthChange: false,
					ordering: true,
					columnDefs: [{
						targets: [4],
						orderable: false,
						searchable: false
					}]
				});	
				
				//Reload Category After 5 Seconds
				setInterval(function(){
					table.ajax.reload(); 		
					$("#content_loader").toggle().fadeOut(4000);
				}, 60000);					
								
				// Set Widget Visible
				$('#show_widget').on('click', '.widget-show', function(){
					var id = $(this).attr('data_id');
					$.ajax({
						type: 'ajax',
						method: 'get',
						async: false,
						url: base_url+'ct_backend/set_widget_show/' +id,
						dataType: 'json',
						success: function(){					
							toast();
							function toast(){
								$.toast({
									text: 'Widget transformed successfully!', 		
									icon: 'success' 
								});
								table.ajax.reload(); 
							}
						},error: function(){					
							toast();
							function toast(){
								$.toast({
									text: 'Widget transforming unsuccessfull!', 		
									icon: 'error' 
								});
							}
						}
					});
				});
				//End Set Widget Visible
				
				// Set Widget Hide
				$('#show_widget').on('click', '.widget-hide', function(){
					var id = $(this).attr('data_id');
					$.ajax({
						type: 'ajax',
						method: 'get',
						async: false,
						url: base_url+'ct_backend/set_widget_hide/' +id,
						dataType: 'json',
						success: function(){				
							toast();
							function toast(){
								$.toast({
									text: 'Widget transformed successfully!', 		
									icon: 'success' 
								});
								table.ajax.reload(); 
							}
						},error: function(){				
							toast();
							function toast(){
								$.toast({
									text: 'Widget transforming unsuccessfull!', 		
									icon: 'error' 
								});
							}
						}
					});	
				});
				// End Set Widget
				
				//Widget form will be reset when clicked Widget close button
				$('#close_data, #close_data_btn').on('click', function(){
					$('#widget_form')[0].reset();
				});				
				
				//Add New Widget	
				$('#add_data_btn').on('click', function(){
					$('#add_edit_data_post_header').text('Add New Widget');
					$('#widget_form').attr('action', base_url+'ct_backend/add_widget/');
				});
				
				$('#add_widget').on('click', function(){	
					var url = $('#widget_form').attr('action');
					var data = $('#widget_form').serialize();
					var title = $('input[name=title]');
					var input = $('textarea[name=input]');
					var result = '';
					if(title.val()==''){
						title.addClass('form-control is-invalid');
					}else{
						title.removeClass('is-invalid');
						result ='1';
					}
					if(input.val()==''){
						input.addClass('form-control is-invalid');
					}else{
						input.removeClass('is-invalid');
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
									$('#widget_form')[0].reset();	
									$("#add_data_box").toggle(300);
									$("#data_list_box").toggle(300);
									$("#add_data_btn").fadeToggle(300);
									$("#close_data_btn").fadeToggle(300);						
									toast();
									function toast(){
										$.toast({
											text: 'Widget '+response.type+' successfully!', 		
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
				//End Add Widget
				
				//Edit Widget
				$('#show_widget').on('click', '.widget-edit', function(){			
					var id = $(this).attr('data_id');
					$("#add_data_box").toggle(300);	
					$("#data_list_box").toggle(300);	
					$("#add_data_btn").fadeToggle(300);
					$("#close_data_btn").fadeToggle(300);	
					$('#add_edit_data_post_header').text('Edit Widget');
					$('#widget_form').attr('action', base_url+'ct_backend/edit_widget/' + id);
					$.ajax({
						type: 'ajax',
						method: 'get',
						url: base_url+'ct_backend/single_widget_data/'+id,
						async: false,
						dataType: 'json',
						success: function(data){
							$('input[name=title]').val(data.title);
							$('textarea[name=input]').val(data.input);
						},
						error: function(){					
							toast();
							function toast(){
								$.toast({
									text: 'Could not get widget data!', 		
									icon: 'warning'
								});
							}
						}
					});
				});
				//End Edit Widget	
				
				//Delete Widget
				$('#show_widget').on('click', '.widget-delete', function(){
					var id = $(this).attr('data_id');
					$('#delete_Modal').modal('show');
					$('#btn_delete').unbind().on('click', function(){
						$.ajax({
							type: 'ajax',
							method: 'get',
							async: false,
							url: base_url+'ct_backend/delete_widget/' +id,
							dataType: 'json',
							success: function(){
								$('#delete_Modal').modal('hide');						
								toast();
								function toast(){
									$.toast({
										text: 'Successfully deleted widget!', 		
										icon: 'success'
									});
								}
								table.ajax.reload(); 
							},error: function(){				
								toast();
								function toast(){
									$.toast({
										text: 'Widget deleting unsuccessfull!', 		
										icon: 'error'
									});
								}
							}
						});
					});
				});
				//End Delete Widget					
			}//End Show Widget			
		});
	</script>
	<!--End Ajax Query-->	
</body>
</html>	