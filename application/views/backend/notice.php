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
							
					<!--Notice Page-->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="card custom-content-area">
							<div class="card-header"> 
								<?php echo anchor('ct_backend/index', '<span class="fa fa-puzzle-piece"></span> Dashboard', 'title="Dashboard"');?> / Notice											
								<img src="<?php echo base_url()."assets/images/default/content_loader.gif"; ?>" alt="data loader" class="content_loader" id="content_loader" />
								<span class="float-right badge custom-badge-info"><?php echo $total_notice;?></span>
							</div>
							<div class="card-body row p-4">	
							
								<!--Notice List-->
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-2" id="data_list_box">
									<div class="responsive-table table-custom">
										<table class="table custom-form-button custom-square-button" id="show_notice">
											<thead>
												<tr>
													<th>Title</th>
													<th>Notice</th>
													<th>Modal</th>
													<th>Sidebar</th>
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
								<!--End Notice List-->
							
								<!--Add Notice-->
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-2" id="add_data_box">
									<div class="card">
										<div class="card-header" id="add_edit_data_post_header"> </div>
										<div class="card-body">
											<?php echo form_open('', ['id'=>'notice_form', 'class'=>'custom-form-input']); ?> 
												<?php echo form_input(['name'=>'publisher_id', 'type'=>'hidden', 'value'=>$logged_user_id]); ?>
												
												<div class="row">
													<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
														<div class="form-group">
															<?php echo form_label('Title');?>	
															<?php echo form_input(['name'=>'title', 'class'=>'form-control', 'placeholder'=>'Title']); ?>
														</div>
													</div>
												</div>	
												
												<div class="form-group">
													<label class="custom-control custom-checkbox">
														<input type="checkbox" id="modal_checkbox" name="modal" value="1" class="custom-control-input" />
														<span class="custom-control-indicator"></span>
														<span class="custom-control-description"> Modal</span>
													</label>
													
													<label class="custom-control custom-checkbox">
														<input type="checkbox" id="sidebar_checkbox" name="sidebar" value="1" class="custom-control-input" />
														<span class="custom-control-indicator"></span>
														<span class="custom-control-description"> Sidebar</span>
													</label>
												</div>
												
												<!--Add media-->
												<div class="custom-form-button">
													<div class="form-group">
														<a href="#" class="btn btn-info" data-toggle="modal" data-target="#notice_media_modal"><span class="fa fa-images"></span> Media</a>
													</div>
												</div>
												<!--End Add media-->	
												
												<div class="form-group">
													<?php echo form_label('Notice');?>	
													<?php echo form_textarea(['name'=>'notice', 'class'=>'form-control summernote', 'placeholder'=>'Notice']); ?>
												</div>
												
												<div class="custom-form-button">
													<?php echo form_button('', 'Save', 'id="add_notice" class="btn btn-primary"');?>	
													<?php echo form_button('', 'Close', 'id="close_data" class="btn btn-danger"');?>	
												</div>																			
											<?php echo form_close(); ?> 
										</div>
									</div>
								</div>
								<!--End Add Notice-->					
							
							</div>
						</div>					
					</div>	
					<!--End Notice Page-->	
				</div>
				<!--End Row-->
			</div>	
			<!--End Second Content Section-->
			
			<!--Page media-->
			
			<!-- Modal -->
			<div class="modal fade bd-example-modal-lg" id="notice_media_modal" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-body">
							<div class="custom-tab">	
								<ul class="nav nav-tabs page-tab-nav" role="tablist">
									<li class="nav-item">
										<a class="nav-link" href="#add_notice_media" role="tab" data-toggle="tab">
											<span class="fa fa-plus"></span> Add notice media
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link active" href="#notice_media_list" role="tab" data-toggle="tab">
											<span class="fa fa-images"></span> Media list
										</a>
									</li>
								</ul>
								<!-- Tab panes -->
								<div class="tab-content page-tab-container">
									<div role="tabpanel" class="tab-pane fade" id="add_notice_media">
										<div class="row">
											<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
												<div class="card">
													<div class="card-header">Add notice media</div>
													<div class="card-body">	
														<?php echo form_open_multipart('ct_backend/add_news_extra_images', ['class'=>'custom-form-input custom-form-button']); ?> 
															<?php echo form_input(['name'=>'publisher_id', 'type'=>'hidden', 'value'=>$logged_user_id]); ?>
															<div class="form-group">
																<div class="custom-file">
																	<input type="file" name="image[]" id="notice-image-tag" class="custom-file-input" multiple="" accept="image/*">	
																	<label class="custom-file-label" for="notice-image-tag">Image</label>				
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
														<?php echo form_close(); ?>
													</div>
												</div>
											</div>
										</div>					
									</div>
									<div role="tabpanel" class="tab-pane active" id="notice_media_list">
										<div class="row">
											<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
												<div class="responsive-table table-custom">
													<table class="table custom-form-button custom-square-button">
														<thead>
															<tr>
																<th>Image</th>
																<th>Link</th>
																<th>Published</th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody>											
															<?php
																if($notice_media_list){										
																	foreach($notice_media_list as $notice_media_list_row){
																		$notice_media_link  = base_url()."assets/images/news_extra_image/".$notice_media_list_row->news_extra_image;
																		$notice_media_published = $notice_media_list_row->news_extra_images_published;

																		echo "<tr>";
																		echo "<td><img src='".base_url()."assets/images/news_extra_image/".$notice_media_list_row->news_extra_image."' class='img-fluid' width='120' alt='news image' /></td>";
																		echo "<td>";
																		echo "<textarea  id='bar".$notice_media_list_row->id."'>".$notice_media_link."</textarea>";
																		echo "</td>";
																		echo "<td>".nice_date($notice_media_published, 'M j,y')."</td>";
																		echo "<td><a href='javascript:;' class='btn btn-info btn-sm clipboard_btn' title='link' data-clipboard-action='copy' data-clipboard-target='#bar".$notice_media_list_row->id."'><span class='fa fa-copy'></span></a></td>";
																		echo "</tr>";
																	}
																}				 				
															?>											
														</tbody>
													</table>
												</div>
											</div>
										</div>	
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
			<!--End News media-->
			
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
			
			<!--Notice Delete Modal-->
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
			<!--End Notice Delete Modal-->	
			
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
			//Show Notice
			show_notice();	
			function show_notice(){
				var table = $('#show_notice').DataTable({
					ajax: base_url+'ct_backend/show_notice',
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
				
				//Notice form will be reset when clicked Notice close button
				$('#close_data, #close_data_btn').on('click', function(){
					$('#notice_form')[0].reset();
				});	
				
				//Add New Notice	
				$('#add_data_btn').on('click', function(){
					$('#add_edit_data_post_header').text('Add New Notice');
					$('#notice_form').attr('action', base_url+'ct_backend/add_notice/');
				});
				
				$('#add_notice').on('click', function(){	
					var url = $('#notice_form').attr('action');
					var data = $('#notice_form').serialize();
					var title = $('input[name=title]');
					var notice = $('textarea[name=notice]');
					var result = '';
					if(title.val()==''){
						title.addClass('form-control is-invalid');
					}else{
						title.removeClass('is-invalid');
						result ='1';
					}
					
					if(notice.val()==''){
						notice.addClass('form-control is-invalid');
					}else{
						notice.removeClass('is-invalid');
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
									$('#notice_form')[0].reset();	
									$("#add_data_box").toggle(300);		
									$("#data_list_box").toggle(300);
									$("#add_data_btn").fadeToggle(300);
									$("#close_data_btn").fadeToggle(300);						
									toast();
									function toast(){
										$.toast({
											text: 'Notice '+response.type+' successfully!', 		
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
				//End Add Notice
				
				//Edit Notice
				$('#show_notice').on('click', '.notice-edit', function(){			
					var id = $(this).attr('data_id');
					$("#add_data_box").toggle(300);		
					$("#data_list_box").toggle(300);	
					$("#add_data_btn").fadeToggle(300);
					$("#close_data_btn").fadeToggle(300);
					$('#add_edit_data_post_header').text('Edit Notice');
					$('#notice_form').attr('action', base_url+'ct_backend/edit_notice/' + id);
					$.ajax({
						type: 'ajax',
						method: 'get',
						url: base_url+'ct_backend/single_notice_data/'+id,
						async: false,
						dataType: 'json',
						success: function(data){
							$('input[name=title]').val(data.title);
							$('textarea[name=notice]').val(data.notice);
							
							if(data.modal == 1){
								$( "#modal_checkbox" ).prop( "checked", true );
							}else{
								$( "#modal_checkbox" ).prop( "checked", false );
							}
							
							if(data.sidebar == 1){
								$( "#sidebar_checkbox" ).prop( "checked", true );
							}else{
								$( "#sidebar_checkbox" ).prop( "checked", false );
							}
						},
						error: function(){					
							toast();
							function toast(){
								$.toast({
									text: 'Could not get notice data!', 		
									icon: 'warning'
								});
							}
						}
					});
				});
				//End Edit Notice	
				
				//Delete Notice
				$('#show_notice').on('click', '.notice-delete', function(){
					var id = $(this).attr('data_id');
					$('#delete_Modal').modal('show');
					$('#btn_delete').unbind().on('click', function(){
						$.ajax({
							type: 'ajax',
							method: 'get',
							async: false,
							url: base_url+'ct_backend/delete_notice/' +id,
							dataType: 'json',
							success: function(){
								$('#delete_Modal').modal('hide');						
								toast();
								function toast(){
									$.toast({
										text: 'Successfully deleted notice!', 		
										icon: 'success'
									});
								}
								table.ajax.reload(); 
							},error: function(){				
								toast();
								function toast(){
									$.toast({
										text: 'Notice deleting unsuccessfull!', 		
										icon: 'error'
									});
								}
							}
						});
					});
				});
				//End Delete Notice		
				
				//Summernote text editor
				summernote();
				function summernote(){
					$('.summernote').summernote({
						imageAttributes: {
							icon: '<i class="note-icon-pencil"/>',
							figureClass: 'figureClass',
							figcaptionClass: 'captionClass',
							captionText: 'Caption Goes Here.',
							manageAspectRatio: true // true = Lock the Image Width/Height, Default to true
						},
						popover: {
							image: [
								['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
								['float', ['floatLeft', 'floatRight', 'floatNone']],
								['remove', ['removeMedia']],
								['custom', ['imageAttributes']],
							],
						},
						placeholder: 'Description',
						tabsize: 2,
						height: 300
					});
				}		

				//News media Link copy to clipboard 
				copy_to_clipboard();
				function copy_to_clipboard(){
					var clipboard = new ClipboardJS('.clipboard_btn');
				}				
			}//End Show Notice	
		});
	</script>
	<!--End Ajax Query-->	
</body>
</html>	