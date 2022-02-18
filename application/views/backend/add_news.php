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
				
					<!--News page-->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="card custom-content-area">
							<div class="card-header"> 
								<?php echo anchor('ct_backend/index', '<span class="fa fa-puzzle-piece"></span> Dashboard', 'title="Dashboard"');?> / Add News
							</div>
							<div class="card-body p-4">	
								<?php echo form_open_multipart('ct_backend/add_news', ['class'=>'custom-form-input']); ?> 
									<div class="row">
										<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2">
											<?php echo form_input(['name'=>'publisher_id', 'type'=>'hidden', 'value'=>$logged_user_id]); ?>
											<?php echo form_input(['name'=>'publisher_position', 'type'=>'hidden', 'value'=>$logged_user_position]); ?>										
											<div class="form-group">
												<?php echo form_label('Title*');?>	
												<?php echo form_error('title', '<div class="text-danger">', '</div>');?>
												<input type="text" name="title" class="form-control" placeholder="Title" value="<?php if(isset($_POST['title'])){ echo htmlentities($_POST['title']);}?>" />
											</div>		
											
											<div class="form-group">
												<?php echo form_label('Sub title');?>	
												<?php echo form_error('sub_title', '<div class="text-danger">', '</div>');?>
												<input type="text" name="sub_title" class="form-control" placeholder="Sub title" value="<?php if(isset($_POST['sub_title'])){ echo htmlentities($_POST['sub_title']);}?>" />
											</div>	
											
											<div class="form-group custom-tags-input">
												<?php echo form_label('Tags');?>	
												<?php echo form_error('tags', '<div class="text-danger">', '</div>');?>
												<input type="text" name="tags" class="form-control" id="input-tags" placeholder="Tags" value="<?php if(isset($_POST['tags'])){ echo htmlentities($_POST['tags']);}?>" />
											</div>
											
											<div class="form-group">
												<?php echo form_label('Exclusive');?>
												<select name="exclusive" class="custom-select">
												  <option value="0">No</option>
												  <option value="1">Yes</option>
												</select>
											</div>
											
											<div class="form-group">
												<div class="card">
													<div class="card-header">Category</div>
													<div class="card-body" style="height:180px; overflow-y: scroll;">
														<?php if(count($category_list)):?>
														<?php foreach($category_list as $category_row):?>
														<div class="form-group">
															<label class="custom-control custom-checkbox">
																<input type="checkbox" name="category_id[]" value="<?php echo $category_row->id;?>" class="custom-control-input checkbox_check_uncheck" />
																<span class="custom-control-indicator"></span>
																<span class="custom-control-description"> <?php echo $category_row->title; ?></span>
															</label>
														</div>														
														<?php endforeach;?>
														<?php endif;?>
													</div>
													<div class="card-footer">
														<div class="form-group m-0">
															<label class="custom-control custom-checkbox m-0">
																<?php echo form_checkbox(['name'=>'', 'class'=>'custom-control-input', 'id'=>'check_all_checkbox']); ?>
																<span class="custom-control-indicator"></span>
																<span class="custom-control-description"> Check all</span>
															</label>
														</div>
													</div>
												</div>												
											</div>
											
											<div class="form-group">
												<?php echo form_label('News courtesy');?>	
												<?php echo form_error('news_courtesy', '<div class="text-danger">', '</div>');?>
												<input type="text" name="news_courtesy" class="form-control" placeholder="News courtesy" value="<?php if(isset($_POST['news_courtesy'])){ echo htmlentities($_POST['news_courtesy']);}?>" />
											</div>												
										</div>
										
										<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2">		
											<?php echo form_label('Image');?>									
											<img src="<?php echo base_url();?>assets/images/news_featured_image/blank_news.png" id="news-image" class="img-thumbnail img-fluid" width="100%" height="250" alt="News Image" />
											<div class="custom-file my-3">
												<?php echo form_upload(['name'=>'image', 'id'=>'news-image-tag', 'class'=>'custom-file-input', 'ata-preview-file-type'=>'any', 'accept'=>'image/*']);?>
												<label class="custom-file-label" for="news-image-tag">Image</label>
											</div>		
											
											<div class="form-group">
												<?php echo form_label('Image Caption');?>	
												<?php echo form_error('image_caption', '<div class="text-danger">', '</div>');?>
												<input type="text" name="image_caption" class="form-control" placeholder="Image caption" value="<?php if(isset($_POST['image_caption'])){ echo htmlentities($_POST['image_caption']);}?>" />
											</div>	
											
											<div class="form-group">
												<?php echo form_label('Watermark');?>
												<select name="watermark" class="custom-select">
												  <option value="0">No</option>
												  <option value="1">Yes</option>
												</select>
											</div>
											
											<div class="form-group">
												<?php echo form_label('News behalf as');?>	
												<?php echo form_error('news_behalf_as', '<div class="text-danger">', '</div>');?>
												<input type="text" name="news_behalf_as" class="form-control" placeholder="News behalf as" value="<?php if(isset($_POST['news_behalf_as'])){ echo htmlentities($_POST['news_behalf_as']);}?>" />
											</div>		
											
											<div class="form-group">
												<?php echo form_label('Video link');?>	
												<?php echo form_error('video_link', '<div class="text-danger">', '</div>');?>
												<input type="text" name="video_link" class="form-control" placeholder="Video link" value="<?php if(isset($_POST['video_link'])){ echo htmlentities($_POST['video_link']);}?>" />
												<small class="form-text text-muted">
													Video Link should like this: https://www.youtube.com/watch?v=W-j4QGAgNu8
												</small>
											</div>	
										</div>										

										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-2">
											<!--Add media-->
											<div class="custom-form-button ">
												<div class="form-group">
													<a href="#" class="btn btn-info" data-toggle="modal" data-target="#news_images_modal"><span class="fa fa-images"></span> Media</a>
												</div>
											</div>
											<!--End Add media-->

											<?php echo form_label('Description*');?>	
											<?php echo form_error('description', '<div class="text-danger">', '</div>');?>
											<textarea name="description" class="form-control summernote" placeholder="Description"><?php if(isset($_POST['description'])){ echo htmlentities($_POST['description']);}?></textarea>
											<br />
											<div class="custom-form-button ">
												<?php echo form_submit(['name'=>'submit', 'class'=>'btn btn-primary', 'value'=>'Publish']);?>
												<?php echo form_reset('', 'Reset', 'class="btn btn-danger"');?>
											</div>
										</div>
									</div>
								<?php echo form_close(); ?>								
							</div>
						</div>					
					</div>	
					<!--End News page-->	
				</div>
				<!--End Row-->
			</div>	
			<!--End Second Content-->	

			<!--News media-->
			<div class="modal fade bd-example-modal-lg" id="news_images_modal" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-body">
							<div class="custom-tab">	
								<ul class="nav nav-tabs news-tab-nav" role="tablist">
									<li class="nav-item">
										<a class="nav-link" href="#add_news_media" role="tab" data-toggle="tab">
											<span class="fa fa-plus"></span> Add news media
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link active" href="#news_media_list" role="tab" data-toggle="tab">
											<span class="fa fa-images"></span> Media list
										</a>
									</li>
								</ul>
								<!-- Tab panes -->
								<div class="tab-content news-tab-container">
									<div role="tabpanel" class="tab-pane fade" id="add_news_media">
										<div class="row">
											<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
												<div class="card">
													<div class="card-header">Add news media</div>
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
														<?php echo form_close(); ?>
													</div>
												</div>
											</div>
										</div>					
									</div>
									<div role="tabpanel" class="tab-pane active" id="news_media_list">
										<div class="row">
											<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
												<div class="responsive-table table-custom">
													<table class="table custom-form-button custom-square-button" id="show_news_images_list">
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
																if($news_media_list){										
																	foreach($news_media_list as $news_media_list_row){										
																		$news_media_link  = base_url()."assets/images/news_extra_image/".$news_media_list_row->news_extra_image;
																		$news_media_published = $news_media_list_row->news_extra_images_published;

																		echo "<tr>";
																		echo "<td><img src='".base_url()."assets/images/news_extra_image/".$news_media_list_row->news_extra_image."' class='img-fluid' width='120' alt='news image' /></td>";
																		echo "<td>";
																		echo "<textarea  id='bar".$news_media_list_row->id."'>".$news_media_link."</textarea>";
																		echo "</td>";
																		echo "<td>".nice_date($news_media_published, 'M j,y')."</td>";
																		echo "<td><a href='javascript:;' class='btn btn-info btn-sm clipboard_btn' title='link' data-clipboard-action='copy' data-clipboard-target='#bar".$news_media_list_row->id."'><span class='fa fa-copy'></span></a></td>";
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
	
	<script>
		$(function(){		
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

			//TagsInput		
			tagsinput();
			function tagsinput(){
				$('#input-tags').tagsInput();
			}			
			
			//Input Image File Preview
			image_input();
			function image_input(){
				function readURL(input) {
					if (input.files && input.files[0]) {
						var reader = new FileReader();
						reader.onload = function (e) {
							$('#news-image').attr('src', e.target.result);
						}
						reader.readAsDataURL(input.files[0]);
					}
				}
				$("#news-image-tag").change(function(){
					readURL(this);
				}); 
			}		

			//News media Link copy to clipboard 
			copy_to_clipboard();
			function copy_to_clipboard(){
				var clipboard = new ClipboardJS('.clipboard_btn');
			}
		});
	</script>	
</body>
</html>