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
							
					<!--Ad Page-->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="card custom-content-area">
							<div class="card-header"> <?php echo anchor('ct_backend/index', '<span class="fa fa-puzzle-piece"></span> Dashboard', 'title="Dashboard"');?> / Ad											
								<img src="<?php echo base_url()."assets/images/default/content_loader.gif"; ?>" alt="data loader" class="content_loader" id="content_loader" />
								<span class="float-right badge custom-badge-info"><?php echo $total_ad;?></span>
							</div>
							<div class="card-body row p-4">								
								<!--Ad List-->
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-2" id="data_list_box">
									<div class="responsive-table table-custom">
										<table class="table custom-form-button custom-square-button" id="show_ad">
											<thead>
												<tr>
													<th>Input</th>
													<th>Publisher</th>
													<th>Type</th>
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
								<!--End Ad List-->
							
								<!--Add Ad-->
								<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2" id="add_data_box">
									<div class="card">
										<div class="card-header" id="add_edit_data_post_header"> </div>
										<div class="card-body">
											<?php echo form_open('', ['id'=>'ad_form', 'class'=>'custom-form-input custom-form-button']); ?> 
												<?php echo form_input(['name'=>'publisher_id', 'type'=>'hidden', 'value'=>$logged_user_id]); ?>
												
												<div class="form-group">
													<?php echo form_label('Input');?>	
													<?php echo form_textarea(['name'=>'input', 'class'=>'form-control', 'placeholder'=>'Input']); ?>
												</div>
											
												<div class="form-group">
													<?php echo form_label('Ad type');?>
													<select name="type" class="custom-select">
													  <option id="Type_Header" value="Header">Header (645px*80px)</option>
													  <option id="Type_Sidebar" value="Sidebar">Sidebar (325px*auto)</option>
													  <option id="Type_Body" value="Body">Body (957px*auto)</option>
													</select>
												</div>
												
												<?php echo form_button('', 'Save', 'id="add_ad" class="btn btn-primary"');?>	
												<?php echo form_button('', 'Close', 'id="close_data" class="btn btn-danger"');?>								
											<?php echo form_close(); ?> 
										</div>
									</div>
								</div>
								<!--End Add Ad-->
							</div>
						</div>					
					</div>	
					<!--End Ad Page-->	
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
			
			<!--Ad Delete Modal-->
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
			<!--End Ad Delete Modal-->	
			
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
			//Show Ad
			show_ad();	
			function show_ad(){	
				var table = $('#show_ad').DataTable({
					ajax: base_url+'ct_backend/show_ad',
					lengthChange: false,
					searching: false,
					ordering: false
				});	
				
				//Reload Category After 5 Seconds
				setInterval(function(){
					table.ajax.reload(); 		
					$("#content_loader").toggle().fadeOut(4000);
				}, 60000);					
								
				// Set Ad Visible
				$('#show_ad').on('click', '.ad-show', function(){
					var id = $(this).attr('data_id');
					$.ajax({
						type: 'ajax',
						method: 'get',
						async: false,
						url: base_url+'ct_backend/set_ad_show/' +id,
						dataType: 'json',
						success: function(){					
							toast();
							function toast(){
								$.toast({
									text: 'Ad transformed successfully!', 		
									icon: 'success' 
								});
								table.ajax.reload(); 
							}
						},error: function(){					
							toast();
							function toast(){
								$.toast({
									text: 'Ad transforming unsuccessfull!', 		
									icon: 'error' 
								});
							}
						}
					});
				});
				//End Set Ad Visible
				
				// Set Ad Hide
				$('#show_ad').on('click', '.ad-hide', function(){
					var id = $(this).attr('data_id');
					$.ajax({
						type: 'ajax',
						method: 'get',
						async: false,
						url: base_url+'ct_backend/set_ad_hide/' +id,
						dataType: 'json',
						success: function(){				
							toast();
							function toast(){
								$.toast({
									text: 'Ad transformed successfully!', 		
									icon: 'success' 
								});
								table.ajax.reload(); 
							}
						},error: function(){				
							toast();
							function toast(){
								$.toast({
									text: 'Ad transforming unsuccessfull!', 		
									icon: 'error' 
								});
							}
						}
					});	
				});
				// End Set Ad
				
				//Ad form will be reset when clicked Ad close button
				$('#close_data, #close_data_btn').on('click', function(){
					$('#ad_form')[0].reset();
				});				
				
				//Add New Ad	
				$('#add_data_btn').on('click', function(){
					$('#add_edit_data_post_header').text('Add New Ad');
					$('#ad_form').attr('action', base_url+'ct_backend/add_ad/');
				});
				
				$('#add_ad').on('click', function(){	
					var url = $('#ad_form').attr('action');
					var data = $('#ad_form').serialize();
					var input = $('textarea[name=input]');
					var result = '';
					if(input.val()==''){
						input.addClass('form-control is-invalid');
					}else{
						input.removeClass('is-invalid');
						result ='1';
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
									$('#ad_form')[0].reset();	
									$("#add_data_box").toggle(300);
									$("#data_list_box").toggle(300);
									$("#add_data_btn").fadeToggle(300);
									$("#close_data_btn").fadeToggle(300);						
									toast();
									function toast(){
										$.toast({
											text: 'Ad '+response.type+' successfully!', 		
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
				//End Add Ad
				
				//Edit Ad
				$('#show_ad').on('click', '.ad-edit', function(){			
					var id = $(this).attr('data_id');
					$("#add_data_box").toggle(300);	
					$("#data_list_box").toggle(300);	
					$("#add_data_btn").fadeToggle(300);
					$("#close_data_btn").fadeToggle(300);	
					$('#add_edit_data_post_header').text('Edit Ad');
					$('#ad_form').attr('action', base_url+'ct_backend/edit_ad/' + id);
					$.ajax({
						type: 'ajax',
						method: 'get',
						url: base_url+'ct_backend/single_ad_data/'+id,
						async: false,
						dataType: 'json',
						success: function(data){
							$('textarea[name=input]').val(data.input);
							
							if(data.type == 'Header'){
								$( "#Type_Header" ).prop( "selected", true );
							}
							
							if(data.type == 'Sidebar'){
								$( "#Type_Sidebar" ).prop( "selected", true );
							}
							
							if(data.type == 'Body'){
								$( "#Type_Body" ).prop( "selected", true );
							}
						},
						error: function(){					
							toast();
							function toast(){
								$.toast({
									text: 'Could not get Ad data!', 		
									icon: 'warning'
								});
							}
						}
					});
				});
				//End Edit Ad	
				
				//Delete Ad
				$('#show_ad').on('click', '.ad-delete', function(){
					var id = $(this).attr('data_id');
					$('#delete_Modal').modal('show');
					$('#btn_delete').unbind().on('click', function(){
						$.ajax({
							type: 'ajax',
							method: 'get',
							async: false,
							url: base_url+'ct_backend/delete_ad/' +id,
							dataType: 'json',
							success: function(){
								$('#delete_Modal').modal('hide');						
								toast();
								function toast(){
									$.toast({
										text: 'Successfully deleted ad!', 		
										icon: 'success'
									});
								}
								table.ajax.reload(); 
							},error: function(){				
								toast();
								function toast(){
									$.toast({
										text: 'Ad deleting unsuccessfull!', 		
										icon: 'error'
									});
								}
							}
						});
					});
				});
				//End Delete Ad					
			}//End Show Ad			
		});
	</script>
	<!--End Ajax Query-->	
</body>
</html>	