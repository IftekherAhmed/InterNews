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
								<?php echo anchor('ct_backend/index', '<span class="fa fa-puzzle-piece"></span> Dashboard', 'title="Dashboard"');?> / Add News Images
							</div>
							<div class="card-body p-4">	
								<?php echo form_open_multipart('ct_backend/add_news_extra_images', ['class'=>'custom-form-input']); ?> 
								<?php echo form_input(['name'=>'publisher_id', 'type'=>'hidden', 'value'=>$logged_user_id]); ?>
								<?php echo form_input(['name'=>'news_id', 'type'=>'hidden', 'value'=>$news_id]); ?>
									<div class="row">
										<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2">
											<div class="form-group">										
												<div class="custom-file">
													<input type="file" name="image[]" class="custom-file-input" multiple="" accept="image/*">	
													<label class="custom-file-label" for="news-image-tag">Image</label>								
												</div>
											</div>
											
											<div class="form-group">
												<?php echo form_label('Watermark');?>
												<select name="watermark" class="custom-select">
												  <option value="0">No</option>
												  <option value="1">Yes</option>
												</select>
											</div>											
										</div>
										
										<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2"></div>
										
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 custom-form-button mb-2">
											<?php echo form_submit(['name'=>'submit', 'class'=>'btn btn-primary', 'value'=>'Add images']);?>
											<?php echo anchor('ct_backend/news_list_page', 'Cancel', 'title="Cancel" class="btn btn-info"');?>
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
	
	<!--Input Image File Preview-->
	<script>
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$('#news-image').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}
		
		news_image_tag();
		function news_image_tag(){
			$("#news-image-tag").change(function(){
				readURL(this);
			});
		}
	</script>	
	<!--End Input Image File Preview-->
</body>
</html>