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
							
					<!--News List Page-->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="card custom-content-area">
							<div class="card-header"> 
								<?php echo anchor('ct_backend/index', '<span class="fa fa-puzzle-piece"></span> Dashboard', 'title="Dashboard"');?> / News List											
								<img src="<?php echo base_url()."assets/images/default/content_loader.gif"; ?>" alt="data loader" class="content_loader" id="content_loader" />
								<span class="float-right badge custom-badge-info"><?php echo $total_news;?></span>
							</div>
							<div class="card-body p-4">									
							   <!--table-->
							   <?php echo form_open('ct_backend/delete_multiple_news/', ['id'=>'delete_multiple_news']); ?> 
								<div class="dataTables_wrapper dt-bootstrap4 responsive-table table-custom">
								    <table id="show_news" class="table custom-form-button custom-square-button">
										<thead>
											<tr>
												<th>
													<div class="form-check m-0">
														<input class="form-check-input" type="checkbox" id="check_all_checkbox" />
														<label class="form-check-label p-0" for="check_all_checkbox">
															<a href="javascript:;" class="text-white" id="delete_multiple_news_btn">
																<span class="fa fa-trash"></span>
															</a> 
														</label>
													</div>
												</th>
												<th>Image</th>
												<th>Title</th>
												<th>Description</th>
												<th>Publisher</th>
												<th>Category</th>
												<th>Status</th>
												<th>Published</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>	
										</tbody>
									</table>
							   </div>							
								<?php echo form_close(); ?> 
							   <!--End table-->							   
							</div>
						</div>					
					</div>	
					<!--End News List Page-->	
				</div>
				<!--End Row-->
			</div>	
			<!--End Second Content Section-->
			
			<!--View modal-->
			<div class="modal fade bd-example-modal-lg" id="news-view-modal" tabindex="-1" role="dialog" aria-labelledby="item-short-view" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="item-short-view"></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div>
								<p><b>Title</b>: <span id="v_news_title"></span></p>
								<p><b>Description</b>: <span id="v_news_description"></span></p>
								<p><b>Publisher</b>: <span id="v_news_publisher"></span></p>
								<p><b>Category</b>: <span id="v_news_category"></span></p>
								<p><b>Status</b>: <span id="v_news_status"></span></p>
								<p><b>Published</b>: <span id="v_news_published"></span></p>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!--End View Modal-->
			
			<!--News Quick Edit Modal-->
			<div class="modal fade bd-example-modal-lg" id="news-quick-edit-modal" tabindex="-1" role="dialog" aria-labelledby="item-short-edit" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="item-short-edit"></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div>				
								<?php echo form_open('', ['class'=>'custom-form-input', 'id'=>'quick_edit_news_form']); ?> 
									<div class="row">
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-2">	
											<?php echo form_input(['name'=>'id', 'type'=>'hidden', 'id'=>'qe_news_id']); ?>						
											<div class="form-group">
											<?php echo form_input(['name'=>'title', 'id'=>'qe_news_title', 'class'=>'form-control', 'type'=>'text', 'placeholder'=>'Title']); ?>
											</div>												

											<?php echo form_textarea(['name'=>'description', 'id'=>'qe_news_description', 'class'=>'form-control', 'placeholder'=>'Textarea']); ?>
											<br />
											<div class="custom-form-button">
											<?php echo form_button('', 'Update', 'id="quick_edit_news_btn" class="btn btn-info"');?>	
											</div>						
										</div>	
									</div>
								<?php echo form_close(); ?> 
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!--End News Quick Edit Modal-->
			
			<!--News Delete Modal-->
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
			<!--End News Delete Modal-->	
			
			<!--Multiple News Delete Modal-->
			<div class="modal fade" id="multiple_delete_Modal" tabindex="-1" role="dialog" aria-labelledby="multiple_delete_Modal_label" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="multiple_delete_Modal_label">Confirm Delete</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							Do you want to delete this?
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="button" id="multiple_delete_Modal_btn" class="btn btn-outline-danger">Delete</button>
						</div>
					</div>
				</div>
			</div>
			<!--End Multiple News Delete Modal-->	
								
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
			//Show News
			show_news();
			function show_news(){
				var table = $('#show_news').DataTable({
					ajax: base_url+'ct_backend/show_news',
					lengthChange: true,
					ordering: true,
					columnDefs: [{
						targets: [0, 1, 8],
						orderable: false,
						searchable: false
					}]
				});	
			
				setInterval( function () {
					table.ajax.reload(); 		
					$("#content_loader").toggle().fadeOut(6000);
				}, 60000 );		
				//End Show News*/
				
				// Set News Approve
				$('#show_news').on('click', '.news-approve', function(){
					var id = $(this).attr('data_id');
					$.ajax({
						type: 'ajax',
						method: 'get',
						async: false,
						url: base_url+'ct_backend/set_news_approve/' +id,
						dataType: 'json',
						success: function(){					
							toast();
							function toast(){
								$.toast({
									text: 'Successfully news approved!', 		
									icon: 'success' 
								});
								table.ajax.reload(); 
							}
						},error: function(){					
							toast();
							function toast(){
								$.toast({
									text: 'News transforming unsuccessfull!', 		
									icon: 'error' 
								});
							}
						}
					});
				});
				//End Set News Approve
				
				// Set News Pending
				$('#show_news').on('click', '.news-pending', function(){
					var id = $(this).attr('data_id');
					$.ajax({
						type: 'ajax',
						method: 'get',
						async: false,
						url: base_url+'ct_backend/set_news_pending/' +id,
						dataType: 'json',
						success: function(){				
							toast();
							function toast(){
								$.toast({
									text: 'Successfully News transformed into pending!', 		
									icon: 'success' 
								});
								table.ajax.reload(); 
							}
						},error: function(){				
							toast();
							function toast(){
								$.toast({
									text: 'News transforming unsuccessfull!', 		
									icon: 'error' 
								});
							}
						}
					});	
				});
				// End Set News
				
				//Show Single News
				$('#show_news').on('click', '.news-modal-view', function(){
					$('#news-view-modal').modal('show');
					$('#news-view-modal').find('.modal-title').text('News View');
					
					var data = table.row( $(this).parents('tr') ).data();
					$('#v_news_title').html(data[2]);  
					$('#v_news_description').html(data[3]);  
					$('#v_news_publisher').html(data[4]); 
					$('#v_news_category').html(data[5]);  
					$('#v_news_status').html(data[6]); 								
					$('#v_news_published').html(data[7]); 								
				});
				//End Show Single News
				
				//Quick edit Single News
				$('#show_news').on('click', '.news-quick-edit', function(){
					var id = $(this).attr('data_id');
					$('#news-quick-edit-modal').modal('show');
					$('#news-quick-edit-modal').find('.modal-title').text('News Quick Edit');
					$('#quick_edit_news_form').attr('action', base_url+'ct_backend/quick_edit_news/' + id);
					
					var data = table.row( $(this).parents('tr') ).data();
					$('#qe_news_id').val(id);  
					$('#qe_news_title').val(data[2]);  
					$('#qe_news_description').val(data[3]); 

					//Edit Quick Edit
					$('#quick_edit_news_btn').on('click', function(){	
						var url = $('#quick_edit_news_form').attr('action');
						var data = $('#quick_edit_news_form').serialize();
						var title = $('input[name=title]');
						var description = $('textarea[name=description]');
						var result = '';
						if(title.val()==''){
							title.addClass('form-control is-invalid');
						}else{
							title.removeClass('is-invalid');
							result +='1';
						}
						if(description.val()==''){
							description.addClass('form-control is-invalid');
						}else{
							description.removeClass('is-invalid');
							result +='2';
						}

						if(result !=''){
							$.ajax({
								type: 'ajax',
								method: 'post',
								url: url,
								data: data,
								async: false,
								dataType: 'json',
								success: function(response){								
									$('#news-quick-edit-modal').modal('hide');
									if(response.success){
										$('#quick_edit_news_form')[0].reset();							
										toast();
										function toast(){
											$.toast({
												text: 'News '+response.type+' successfully!', 		
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
					//End Add News				
				});
				//End Show Single News
				
				//Delete News
				$('#show_news').on('click', '.news-delete', function(){
					var id = $(this).attr('data_id');
					$('#delete_Modal').modal('show');
					$('#btn_delete').unbind().on('click', function(){
						$.ajax({
							type: 'ajax',
							method: 'get',
							async: false,
							url: base_url+'ct_backend/delete_news/' +id,
							dataType: 'json',
							success: function(){
								$('#delete_Modal').modal('hide');						
								toast();
								function toast(){
									$.toast({
										text: 'Successfully deleted news!', 		
										icon: 'success'
									});
								}
								table.ajax.reload(); 
							},error: function(){				
								toast();
								function toast(){
									$.toast({
										text: 'news deleting unsuccessfull!', 		
										icon: 'error'
									});
								}
							}
						});
					});
				});
				//End Delete News	
				
				//Delete Multiple News
				$('#delete_multiple_news').on('click', '#delete_multiple_news_btn', function(){					
					$('#multiple_delete_Modal').modal('show');
					$('#multiple_delete_Modal_btn').unbind().on('click', function(){
						$('#delete_multiple_news').submit();
					});
				});
				//End Delete Multiple News	
			}
			//End Show News		
		});
	</script>
	<!--End Ajax Query-->
</body>
</html>