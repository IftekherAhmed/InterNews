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
							
					<!--Gallery Page-->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="card custom-content-area">
							<div class="card-header"> 
								<?php echo anchor('ct_backend/index', '<span class="fa fa-puzzle-piece"></span> Dashboard', 'title="Dashboard"');?> / Gallery											
								<img src="<?php echo base_url()."assets/images/default/content_loader.gif"; ?>" alt="data loader" class="content_loader" id="content_loader" />
								<span class="float-right badge custom-badge-info"><?php echo $total_gallery;?></span>
							</div>
							<div class="card-body row p-4">								
								<!--Gallery List-->
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-2" id="data_list_box">
									<div class="responsive-table table-custom">
										<table class="table custom-form-button custom-square-button" id="show_gallery">
											<thead>
												<tr>
													<th>Image</th>
													<th>Caption</th>
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
								<!--End Gallery List-->
								
								<!--Add Gallery-->
								<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2" id="add_data_box">
									<div class="card">
										<div class="card-header" id="add_edit_data_post_header"> </div>
										<div class="card-body">		
											<div class="form-group">
												<div id="edit_view_gallery_image"></div>
											</div>
											<?php echo form_open_multipart('', ['id'=>'gallery_form', 'class'=>'custom-form-input custom-form-button']); ?> 
												<?php echo form_input(['name'=>'publisher_id', 'type'=>'hidden', 'value'=>$logged_user_id]); ?>
												<div class="form-group">
													<?php echo form_label('Caption');?>	
												<?php echo form_error('caption', '<div class="text-danger">', '</div>');?>
													<?php echo form_input(['name'=>'caption', 'class'=>'form-control', 'placeholder'=>'Caption']); ?>
												</div>	
												
												<div class="form-group">
													<?php echo form_label('Image');?>	
													<div class="custom-file">
														<?php echo form_upload(['name'=>'image', 'id'=>'image', 'accept'=>'image/*', 'class'=>'custom-file-input', 'accept'=>'image/*', 'required'=>'required']); ?>
														<label class="custom-file-label">Image</label>
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
								<!--End Add Gallery-->	
							</div>
						</div>					
					</div>	
					<!--End Gallery Page-->	
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
			
			<!--Gallery View-->
			<div class="modal fade bd-example-modal-lg modal-view" id="gallery-view" tabindex="-1" role="dialog" aria-labelledby="item-short-view" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="item-short-view"></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
									<div id="gallery_image"></div>
								</div>
								<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
									<div class="pl-2">
										<h5 id="gallery_caption"></h5>
										<hr />
										<p>Publisher: <span id="gallery_publisher"></span></p>
										<p>Published: <span id="gallery_published"></span></p>
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
			<!--End Gallery View-->
			
			<!--Gallery Delete Modal-->
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
			<!--End Gallery Delete Modal-->		
			
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
			//Show Gallery
			show_gallery();	
			function show_gallery(){
				var table = $('#show_gallery').DataTable({
					ajax: base_url+'ct_backend/show_gallery',
					lengthChange: true,
					ordering: true,
					columnDefs: [{
						targets: [0, 4],
						orderable: false,
						searchable: false
					}]
				});	
				
				//Reload Category After 5 Seconds
				setInterval(function(){
					table.ajax.reload(); 		
					$("#content_loader").toggle().fadeOut(4000);
				}, 5000);
				
				
				//Show Single gallery
				$('#show_gallery').on('click', '.gallery-view', function(){
					$('#gallery-view').modal('show');			
					
					var data = table.row( $(this).parents('tr') ).data();
					$('#gallery-view').find('.modal-title').text(data[1]);
					$('#gallery_image').html(data[0]);  
					$('#gallery_caption').html(data[1]);  
					$('#gallery_publisher').html(data[2]);  
					$('#gallery_published').html(data[3]);  
				});
				//End Show Single gallery
				
				//Gallery form will be reset when clicked Gallery close button
				$('#close_data, #close_data_btn').on('click', function(){
					$('#gallery_form')[0].reset();
				});	
				
				//Add New Gallery	
				$('#add_data_btn').on('click', function(){
					$('#add_edit_data_post_header').text('Add New Gallery');
					$('#gallery_form').attr('action', base_url+'ct_backend/add_gallery/');
				});

				$('#add_gallery').on('click', function(){			
					var url = $('#gallery_form').attr('action');
					var data = $('#gallery_form').serialize();
					var caption = $('input[name=caption]');	
					var result = '';
					if(caption.val()==''){
						caption.addClass('form-control is-invalid');
					}else{
						caption.removeClass('is-invalid');
					}			
				});
				//End Add Gallery
				
				//Edit Gallery
				$('#show_gallery').on('click', '.gallery-edit', function(){			
					var id = $(this).attr('data_id');
					$("#add_data_box").toggle(300);	
					$("#data_list_box").toggle(300);		
					$("#add_data_btn").fadeToggle(300);
					$("#close_data_btn").fadeToggle(300);
					$('#add_edit_data_post_header').text('Edit Gallery');
					$('#gallery_form').attr('action', base_url+'ct_backend/edit_gallery/' + id);
					$.ajax({
						type: 'ajax',
						method: 'get',
						url: base_url+'ct_backend/single_gallery_data/'+id,
						async: false,
						dataType: 'json',
						success: function(data){
							$('input[name=caption]').val(data.caption);
							var edit_view_gallery_image = "<img src='"+base_url+"/assets/images/gallery/"+data.image+"' alt='gallery image' width='90%' />"; 
							$("#edit_view_gallery_image").html(edit_view_gallery_image);
							
						},
						error: function(){					
							toast();
							function toast(){
								$.toast({
									text: "Could not get gallery item's data!", 		
									icon: 'warning'
								});
							}
						}
					});
				});
				//End Edit Gallery	
				
				//Delete Gallery
				$('#show_gallery').on('click', '.gallery-delete', function(){
					var id = $(this).attr('data_id');
					$('#delete_Modal').modal('show');
					$('#btn_delete').unbind().on('click', function(){
						$.ajax({
							type: 'ajax',
							method: 'get',
							async: false,
							url: base_url+'ct_backend/delete_gallery/' +id,
							dataType: 'json',
							success: function(){
								$('#delete_Modal').modal('hide');						
								toast();
								function toast(){
									$.toast({
										text: 'Successfully deleted gallery item!', 		
										icon: 'success'
									});
								}
								table.ajax.reload(); 
							},error: function(){				
								toast();
								function toast(){
									$.toast({
										text: 'Gallery item deleting unsuccessfull!', 		
										icon: 'error'
									});
								}
							}
						});
					});
				});
				//End Delete Gallery		
			}//End Show Gallery			
		});
	</script>
	<!--End Ajax Query-->
</body>
</html>