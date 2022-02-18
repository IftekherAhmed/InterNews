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
							
					<!--Video Page-->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="card custom-content-area">
							<div class="card-header"> 
								<?php echo anchor('ct_backend/index', '<span class="fa fa-puzzle-piece"></span> Dashboard', 'title="Dashboard"');?> / Video											
								<img src="<?php echo base_url()."assets/images/default/content_loader.gif"; ?>" alt="data loader" class="content_loader" id="content_loader" />
								<span class="float-right badge custom-badge-info"><?php echo $total_video;?></span>
							</div>
							<div class="card-body row p-4">	
							
								<!--video List-->
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-2" id="data_list_box">
									<div class="responsive-table table-custom">
										<table class="table custom-form-button custom-square-button" id="show_video">
											<thead>
												<tr>
													<th>Link</th>
													<th>Publisher</th>
													<th>Published</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>	
											
											</tbody>
										</table>
									</div>
								</div>
								<!--End Video List-->
							
								<!--Add Video-->
								<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2" id="add_data_box">
									<div class="card">
										<div class="card-header" id="add_edit_data_post_header"> </div>
										<div class="card-body">
											<?php echo form_open('', ['id'=>'video_form', 'class'=>'custom-form-input custom-form-button']); ?> 
												<?php echo form_input(['name'=>'publisher_id', 'type'=>'hidden', 'value'=>$logged_user_id]); ?>
												<div class="form-group">
													<?php echo form_label('Caption');?>	
												<?php echo form_error('caption', '<div class="text-danger">', '</div>');?>
													<?php echo form_input(['name'=>'caption', 'class'=>'form-control', 'placeholder'=>'Caption']); ?>
												</div>
												
												<div class="form-group">
													<?php echo form_label('Link');?>	
													<?php echo form_textarea(['name'=>'link', 'class'=>'form-control', 'placeholder'=>'Link']); ?>
													<small class="form-text text-muted">Link should like this: https://www.youtube.com/watch?v=W-j4QGAgNu8</small>
												</div>		
												
												<?php echo form_button('', 'Save', 'id="add_video" class="btn btn-primary"');?>	
												<?php echo form_button('', 'Close', 'id="close_data" class="btn btn-danger"');?>								
											<?php echo form_close(); ?> 
										</div>
									</div>
								</div>
								<!--End Add Video-->
							</div>
						</div>					
					</div>	
					<!--End Video Page-->	
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
			
			<!--Video Delete Modal-->
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
			<!--End Video Delete Modal-->	
			
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
			//Show Video
			show_video();
			function show_video(){
				var table = $('#show_video').DataTable({
					ajax: base_url+'ct_backend/show_video',
					lengthChange: true,
					searching: false,
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
				
				//Video form will be reset when clicked Video close button
				$('#close_data, #close_data_btn').on('click', function(){
					$('#video_form')[0].reset();
				});	
				
				//Add New Video	
				$('#add_data_btn').on('click', function(){
					$('#add_edit_data_post_header').text('Add New Video');
					$('#video_form').attr('action', base_url+'ct_backend/add_video/');
				});
				
				$('#add_video').on('click', function(){	
					var url = $('#video_form').attr('action');
					var data = $('#video_form').serialize();
					var link = $('textarea[name=link]');
					var result = '';
					var caption = $('input[name=caption]');	
					if(caption.val()==''){
						caption.addClass('form-control is-invalid');
					}else{
						caption.removeClass('is-invalid');
						result ='1';
					}
					if(link.val()==''){
						link.addClass('form-control is-invalid');
					}else{
						link.removeClass('is-invalid');
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
									$('#video_form')[0].reset();	
									$("#add_data_box").toggle(300);
									$("#data_list_box").toggle(300);
									$("#add_data_btn").fadeToggle(300);
									$("#close_data_btn").fadeToggle(300);						
									toast();
									function toast(){
										$.toast({
											text: 'Video '+response.type+' successfully!', 		
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
				//End Add Video
				
				//Edit Video
				$('#show_video').on('click', '.video-edit', function(){			
					var id = $(this).attr('data_id');
					$("#add_data_box").toggle(300);	
					$("#data_list_box").toggle(300);		
					$("#add_data_btn").fadeToggle(300);
					$("#close_data_btn").fadeToggle(300);
					$('#add_edit_data_post_header').text('Edit Video');
					$('#video_form').attr('action', base_url+'ct_backend/edit_video/' + id);
					$.ajax({
						type: 'ajax',
						method: 'get',
						url: base_url+'ct_backend/single_video_data/'+id,
						async: false,
						dataType: 'json',
						success: function(data){
							$('input[name=caption]').val(data.caption);
							$('textarea[name=link]').val('https://www.youtube.com/watch?v='+data.link);
						},
						error: function(){					
							toast();
							function toast(){
								$.toast({
									text: 'Could not get video data!', 		
									icon: 'warning'
								});
							}
						}
					});
				});
				//End Edit Video
				
				//Delete Video
				$('#show_video').on('click', '.video-delete', function(){
					var id = $(this).attr('data_id');
					$('#delete_Modal').modal('show');
					$('#btn_delete').unbind().on('click', function(){
						$.ajax({
							type: 'ajax',
							method: 'get',
							async: false,
							url: base_url+'ct_backend/delete_video/' +id,
							dataType: 'json',
							success: function(){
								$('#delete_Modal').modal('hide');						
								toast();
								function toast(){
									$.toast({
										text: 'Successfully deleted video!', 		
										icon: 'success'
									});
								}
								table.ajax.reload(); 
							},error: function(){				
								toast();
								function toast(){
									$.toast({
										text: 'Video deleting unsuccessfull!', 		
										icon: 'error'
									});
								}
							}
						});
					});
				});
				//End Delete Video	
			}//End Show Video					
		});
	</script>
	<!--End Ajax Query-->	
</body>
</html>	