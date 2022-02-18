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
							
					<!--SEO Page-->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="card custom-content-area">
							<div class="card-header"> 
								<?php echo anchor('ct_backend/index', '<span class="fa fa-puzzle-piece"></span> Dashboard', 'title="Dashboard"');?> / SEO
							</div>
							<div class="card-body row p-4">	
								<!--Add seo-->
								<?php echo form_open('ct_backend/edit_seo/1', ['id'=>'seo_form', 'class'=>'col custom-form-input custom-form-button']); ?> 
								<div class="row">
									<div class="col-xl-6 col-lg-6 col-md-6 col-lg-12">
																				
										<div class="form-group">
											<?php echo form_label('Title');?>
											<?php echo form_input(['name'=>'title', 'class'=>'form-control', 'placeholder'=>'Title', 'value'=>$seo_data->title]); ?>
										</div>		
																				
										<div class="form-group">
											<?php echo form_label('Sub Title');?>
											<?php echo form_input(['name'=>'sub_title', 'class'=>'form-control', 'placeholder'=>'Sub Title', 'value'=>$seo_data->sub_title]); ?>
										</div>
										
										<div class="form-group custom-tags-input">
											<?php echo form_label('Tags');?>
											<?php echo form_input(['name'=>'tags', 'class'=>'form-control', 'id'=>'input-tags', 'type'=>'text', 'value'=>$seo_data->tags]); ?>
										</div>	
									</div>
									
									<div class="col-xl-6 col-lg-6 col-md-6 col-lg-12">										
										<div class="form-group">
											<?php echo form_label('Description');?>	
											<?php echo form_textarea(['name'=>'description', 'class'=>'form-control', 'placeholder'=>'Description', 'value'=>$seo_data->description]); ?>
										</div>
									</div>
								
									<div class="col-xl-12 col-lg-12 col-md-12 col-lg-12">	
										<?php echo form_button('', 'Save', 'id="edit_seo" class="btn btn-primary"');?>
										<?php echo form_reset('', 'Reset', 'class="btn btn-danger"');?>
									</div>
								</div>
								<?php echo form_close(); ?> 							
								<!--End Add SEO-->
							</div>
						</div>					
					</div>	
					<!--End SEO Page-->	
				</div>
				<!--End Row-->
			</div>	
			<!--End Second Content Section-->
			
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
		$(function(){	
			//TagsInput		
			tagsinput();
			function tagsinput(){
				$('#input-tags').tagsInput();
			}
			
			//Edit SEO	
			$('#edit_seo').on('click', function(){	
				var url = $('#seo_form').attr('action');
				var data = $('#seo_form').serialize();
				var title = $('input[name=title]');
				var sub_title = $('input[name=sub_title]');
				var description = $('textarea[name=description]');
				var tags = $('input[name=tags]');			
				var result = '';
				
				if(title.val()==''){
					title.addClass('form-control is-invalid');
				}else{
					title.removeClass('is-invalid');
					result ='1';
				}if(sub_title.val()==''){
					sub_title.addClass('form-control is-invalid');
				}else{
					sub_title.removeClass('is-invalid');
					result +='2';
				}if(description.val()==''){
					description.addClass('form-control is-invalid');
				}else{
					description.removeClass('is-invalid');
					result +='3';
				}if(tags.val()==''){
					tags.addClass('form-control is-invalid');
				}else{
					tags.removeClass('is-invalid');
					result +='4';
				}

				if(result =='1234'){
					$.ajax({
						type: 'ajax',
						method: 'post',
						url: url,
						data: data,
						async: false,
						dataType: 'json',
						success: function(response){
							if(response.success){						
								toast();
								function toast(){
									$.toast({
										text: 'SEO '+response.type+' successfully!', 		
										icon: 'success' 
									});
								}
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
			//End Edit SEO
		});
	</script>
	<!--End Ajax Query-->	
</body>
</html>	