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
							
					<!--News Addional Images Page-->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="card custom-content-area">
							<div class="card-header"> 
								<?php echo anchor('ct_backend/index', '<span class="fa fa-puzzle-piece"></span> Dashboard', 'title="Dashboard"');?> / News Addional Images											
								<img src="<?php echo base_url()."assets/images/default/content_loader.gif"; ?>" alt="data loader" class="content_loader" id="content_loader" />
								<span class="float-right badge custom-badge-info"><?php echo $total_news_addional_images;?></span>
							</div>
							<div class="card-body row p-4">								
								<!--News Addional Images List-->
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-2" id="data_list_box">
									<?php echo form_open('ct_backend/delete_news_multiple_extra_images/', ['id'=>'delete_multiple_images']); ?> 
									<div class="responsive-table table-custom">
										<table class="table custom-form-button custom-square-button" id="show_news_images_list">
											<thead>
												<tr>
													<th>
														<div class="form-check m-0">
															<input class="form-check-input" type="checkbox" id="check_all_checkbox" />
															<label class="form-check-label p-0" for="check_all_checkbox">
																<a href="javascript:;" class="text-white" id="delete_multiple_images_btn">
																	<span class="fa fa-trash"></span>
																</a> 
															</label>
														</div>
													</th>
													<th>Image</th>
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
									<?php echo form_close(); ?> 
								</div>
								<!--End News Addional Images List-->
								
								<!--Add News Addional Images-->
								<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2" id="add_data_box">
									<div class="card">
										<div class="card-header" id="add_edit_data_post_header"> </div>
										<div class="card-body">	
											<?php echo form_open_multipart('ct_backend/add_news_extra_images', ['class'=>'custom-form-input custom-form-button']); ?> 
												<?php echo form_input(['name'=>'publisher_id', 'type'=>'hidden', 'value'=>$logged_user_id]); ?>
												<div class="form-group">
													<div class="custom-file">
														<input type="file" name="image[]" id="news-media-image-tag" class="custom-file-input" multiple="" accept="image/*">	
														<label class="custom-file-label" for="news-media-image-tag">Image</label>				
													</div>
												</div>
											
												<div class="form-group">
													<?php echo form_label('Watermark');?>
													<select name="watermark" class="custom-select">
													  <option value="0">No</option>
													  <option value="1">Yes</option>
													</select>
												</div>	
												<?php echo form_submit(['id'=>'add_gallery', 'class'=>'btn btn-primary', 'type'=>'submit', 'value'=>'Save']);?>	
												<?php echo form_button('', 'Close', 'id="close_data" class="btn btn-danger"');?>								
											<?php echo form_close(); ?>
										</div>
									</div>
								</div>
								<!--End Add News Addional Images-->	
							</div>
						</div>					
					</div>	
					<!--End News Addional Images Page-->	
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
			
			<!--News Addional Images View-->
			<div class="modal fade bd-example-modal-lg modal-view" id="news-image-view" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-body">
							<div class="row">
								<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
									<div id="view_news_additional_image"></div>
								</div>
								<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
									<div class="pl-2">
										<p id="news_image_link"></p>
										<hr />
										<p>Publisher: <span id="news_image_publisher"></span></p>
										<p>Published: <span id="news_image_published"></span></p>
									</div>
									
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!--End News Addional Images View-->
			
			<!--News Addional Images Delete Modal-->
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
			<!--End News Addional Images Delete Modal-->		
			
			<!--Multiple Images Delete Modal-->
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
			<!--End Multiple Images Delete Modal-->	
			
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
			//Show News Addional Images
			show_news_images_list();	
			function show_news_images_list(){
				var table = $('#show_news_images_list').DataTable({
					ajax: base_url+'ct_backend/show_news_images_list',
					lengthChange: true,
					searching: false,
					ordering: true,
					columnDefs: [{
						targets: [0, 1, 5],
						orderable: false,
						searchable: false
					}]
				});	
				
				//Reload Category After 5 Seconds
				setInterval(function(){
					//table.ajax.reload(); 		
					$("#content_loader").toggle().fadeOut(4000);
				}, 5000);			
				
				//Show Single News Addional Images
				$('#show_news_images_list').on('click', '.news-image-view', function(){
					$('#news-image-view').modal('show');			
					
					var data = table.row( $(this).parents('tr') ).data();
					$('#view_news_additional_image').html(data[1]);  
					$('#news_image_link').html(data[2]);  
					$('#news_image_publisher').html(data[3]);  
					$('#news_image_published').html(data[4]);  			
				});
				//End Show Single News Addional Images
				
				//News Addional Images form will be reset when clicked News Addional Images close button
				$('#close_data').on('click', function(){
					$('#gallery_form')[0].reset();
				});	
				
				//Add New News Addional Images	
				$('#add_data_btn').on('click', function(){
					$('#add_edit_data_post_header').text('Add New Images');
					$('#gallery_form').attr('action', base_url+'ct_backend/add_gallery/');
				});				

				//News media Link copy to clipboard 
				copy_to_clipboard();
				function copy_to_clipboard(){
					var clipboard = new ClipboardJS('.clipboard_btn');
				}

				//Delete News Addional Images
				$('#show_news_images_list').on('click', '.news-image-delete', function(){
					var id = $(this).attr('data_id');
					$('#delete_Modal').modal('show');
					$('#btn_delete').unbind().on('click', function(){
						$.ajax({
							type: 'ajax',
							method: 'get',
							async: false,
							url: base_url+'ct_backend/delete_news_extra_images/' +id,
							dataType: 'json',
							success: function(){
								$('#delete_Modal').modal('hide');						
								toast();
								function toast(){
									$.toast({
										text: 'Successfully deleted image!', 		
										icon: 'success'
									});
								}
								table.ajax.reload(); 
							},error: function(){				
								toast();
								function toast(){
									$.toast({
										text: 'Image deleting unsuccessfull!', 		
										icon: 'error'
									});
								}
							}
						});
					});
				});
				//End Delete News Addional image		
				
				//Delete Multiple Images
				$('#delete_multiple_images').on('click', '#delete_multiple_images_btn', function(){					
					$('#multiple_delete_Modal').modal('show');
					$('#multiple_delete_Modal_btn').unbind().on('click', function(){
						$('#delete_multiple_images').submit();
					});
				});
				//End Delete Multiple Images	
				
			}//End Show News Addional Images			
		});
	</script>
	<!--End Ajax Query-->
</body>
</html>