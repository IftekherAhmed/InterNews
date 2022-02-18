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
							
					<!--Sketch Page-->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="card custom-content-area">
							<div class="card-header"> 
								<?php echo anchor('ct_backend/index', '<span class="fa fa-puzzle-piece"></span> Dashboard', 'title="Dashboard"');?> / Sketch
							</div>															
																
							<div class="card-body row p-4">															
								<!--Add Sketch-->
								<?php echo form_open('ct_backend/edit_sketch/1', ['id'=>'sketch_form', 'class'=>'col custom-form-input custom-form-button']); ?> 
								<div class="row">
									<div class="col-xl-4 col-lg-4 col-md-6 col-lg-12">										
										<div class="form-group">
											<?php echo form_label('Section-1 (Breaking News)');?>	
											<select class="custom-select js-example-basic-single" name="section_1">
											<?php
												$sketch_category_1 = $controller->sketch_category($sketch_list->section_1);
												echo "<option value=".$sketch_category_1->id.">".$sketch_category_1->title."</option>";
											?>
											<?php if(count($category_list)):?>
											<?php foreach($category_list as $category_row):?>
											<?php echo"<option value='".$category_row->id."' value='".$category_row->id."'>".$category_row->title."</option>"; ?>
											<?php endforeach;?>
											<?php endif;?>
											</select>
										</div>	
									
										<div class="form-group">
											<?php echo form_label('Section-2 (Slider)');?>	
											<select class="custom-select js-example-basic-single" name="section_2">
											<?php
												$sketch_category_2 = $controller->sketch_category($sketch_list->section_2);
												echo "<option value=".$sketch_category_2->id.">".$sketch_category_2->title."</option>";
											?>
											<?php if(count($category_list)):?>
											<?php foreach($category_list as $category_row):?>
											<?php echo"<option value='".$category_row->id."' value='".$category_row->id."'>".$category_row->title."</option>"; ?>
											<?php endforeach;?>
											<?php endif;?>
											</select>
										</div>	
									
										<div class="form-group">
											<?php echo form_label('Section-3 (Thumbnail)');?>	
											<select class="custom-select js-example-basic-single" name="section_3">
											<?php
												$sketch_category_3 = $controller->sketch_category($sketch_list->section_3);
												echo "<option value=".$sketch_category_3->id.">".$sketch_category_3->title."</option>";
											?>
											<?php if(count($category_list)):?>
											<?php foreach($category_list as $category_row):?>
											<?php echo"<option value='".$category_row->id."' value='".$category_row->id."'>".$category_row->title."</option>"; ?>
											<?php endforeach;?>
											<?php endif;?>
											</select>
										</div>	
									
										<div class="form-group">
											<?php echo form_label('Section-4');?>	
											<select class="custom-select js-example-basic-single" name="section_4">
											<?php
												$sketch_category_4 = $controller->sketch_category($sketch_list->section_4);
												echo "<option value=".$sketch_category_4->id.">".$sketch_category_4->title."</option>";
											?>
											<?php if(count($category_list)):?>
											<?php foreach($category_list as $category_row):?>
											<?php echo"<option value='".$category_row->id."' value='".$category_row->id."'>".$category_row->title."</option>"; ?>
											<?php endforeach;?>
											<?php endif;?>
											</select>
										</div>	
									
										<div class="form-group">
											<?php echo form_label('Section-5');?>	
											<select class="custom-select js-example-basic-single" name="section_5">
											<?php
												$sketch_category_5 = $controller->sketch_category($sketch_list->section_5);
												echo "<option value=".$sketch_category_5->id.">".$sketch_category_5->title."</option>";
											?>
											<?php if(count($category_list)):?>
											<?php foreach($category_list as $category_row):?>
											<?php echo"<option value='".$category_row->id."' value='".$category_row->id."'>".$category_row->title."</option>"; ?>
											<?php endforeach;?>
											<?php endif;?>
											</select>
										</div>										
									</div>
									
									<div class="col-xl-4 col-lg-4 col-md-6 col-lg-12">										
										<div class="form-group">
											<?php echo form_label('Section-6');?>	
											<select class="custom-select js-example-basic-single" name="section_6">
											<?php
												$sketch_category_6 = $controller->sketch_category($sketch_list->section_6);
												echo "<option value=".$sketch_category_6->id.">".$sketch_category_6->title."</option>";
											?>
											<?php if(count($category_list)):?>
											<?php foreach($category_list as $category_row):?>
											<?php echo"<option value='".$category_row->id."' value='".$category_row->id."'>".$category_row->title."</option>"; ?>
											<?php endforeach;?>
											<?php endif;?>
											</select>
										</div>	
									
										<div class="form-group">
											<?php echo form_label('Section-7');?>	
											<select class="custom-select js-example-basic-single" name="section_7">
											<?php
												$sketch_category_7 = $controller->sketch_category($sketch_list->section_7);
												echo "<option value=".$sketch_category_7->id.">".$sketch_category_7->title."</option>";
											?>
											<?php if(count($category_list)):?>
											<?php foreach($category_list as $category_row):?>
											<?php echo"<option value='".$category_row->id."' value='".$category_row->id."'>".$category_row->title."</option>"; ?>
											<?php endforeach;?>
											<?php endif;?>
											</select>
										</div>	
									
										<div class="form-group">
											<?php echo form_label('Section-8');?>	
											<select class="custom-select js-example-basic-single" name="section_8">
											<?php
												$sketch_category_8 = $controller->sketch_category($sketch_list->section_8);
												echo "<option value=".$sketch_category_8->id.">".$sketch_category_8->title."</option>";
											?>
											<?php if(count($category_list)):?>
											<?php foreach($category_list as $category_row):?>
											<?php echo"<option value='".$category_row->id."' value='".$category_row->id."'>".$category_row->title."</option>"; ?>
											<?php endforeach;?>
											<?php endif;?>
											</select>
										</div>	
									
										<div class="form-group">
											<?php echo form_label('Section-9');?>	
											<select class="custom-select js-example-basic-single" name="section_9">
											<?php
												$sketch_category_9 = $controller->sketch_category($sketch_list->section_9);
												echo "<option value=".$sketch_category_9->id.">".$sketch_category_9->title."</option>";
											?>
											<?php if(count($category_list)):?>
											<?php foreach($category_list as $category_row):?>
											<?php echo"<option value='".$category_row->id."' value='".$category_row->id."'>".$category_row->title."</option>"; ?>
											<?php endforeach;?>
											<?php endif;?>
											</select>
										</div>	
									
										<div class="form-group">
											<?php echo form_label('Section-10');?>	
											<select class="custom-select js-example-basic-single" name="section_10">
											<?php
												$sketch_category_10 = $controller->sketch_category($sketch_list->section_10);
												echo "<option value=".$sketch_category_10->id.">".$sketch_category_10->title."</option>";
											?>
											<?php if(count($category_list)):?>
											<?php foreach($category_list as $category_row):?>
											<?php echo"<option value='".$category_row->id."' value='".$category_row->id."'>".$category_row->title."</option>"; ?>
											<?php endforeach;?>
											<?php endif;?>
											</select>
										</div>										
									</div>
									
									<div class="col-xl-4 col-lg-4 col-md-6 col-lg-12">										
										<div class="form-group">
											<?php echo form_label('Section-11');?>	
											<select class="custom-select js-example-basic-single" name="section_11">
											<?php
												$sketch_category_11 = $controller->sketch_category($sketch_list->section_11);
												echo "<option value=".$sketch_category_11->id.">".$sketch_category_11->title."</option>";
											?>
											<?php if(count($category_list)):?>
											<?php foreach($category_list as $category_row):?>
											<?php echo"<option value='".$category_row->id."' value='".$category_row->id."'>".$category_row->title."</option>"; ?>
											<?php endforeach;?>
											<?php endif;?>
											</select>
										</div>	
									
										<div class="form-group">
											<?php echo form_label('Section-12');?>	
											<select class="custom-select js-example-basic-single" name="section_12">
											<?php
												$sketch_category_12 = $controller->sketch_category($sketch_list->section_12);
												echo "<option value=".$sketch_category_12->id.">".$sketch_category_12->title."</option>";
											?>
											<?php if(count($category_list)):?>
											<?php foreach($category_list as $category_row):?>
											<?php echo"<option value='".$category_row->id."' value='".$category_row->id."'>".$category_row->title."</option>"; ?>
											<?php endforeach;?>
											<?php endif;?>
											</select>
										</div>	
									
										<div class="form-group">
											<?php echo form_label('Section-13');?>	
											<select class="custom-select js-example-basic-single" name="section_13">
											<?php
												$sketch_category_13 = $controller->sketch_category($sketch_list->section_13);
												echo "<option value=".$sketch_category_13->id.">".$sketch_category_13->title."</option>";
											?>
											<?php if(count($category_list)):?>
											<?php foreach($category_list as $category_row):?>
											<?php echo"<option value='".$category_row->id."' value='".$category_row->id."'>".$category_row->title."</option>"; ?>
											<?php endforeach;?>
											<?php endif;?>
											</select>
										</div>	
									
										<div class="form-group">
											<?php echo form_label('Section-14 (News Slider)');?>	
											<select class="custom-select js-example-basic-single" name="section_14">
											<?php
												$sketch_category_14 = $controller->sketch_category($sketch_list->section_14);
												echo "<option value=".$sketch_category_14->id.">".$sketch_category_14->title."</option>";
											?>
											<?php if(count($category_list)):?>
											<?php foreach($category_list as $category_row):?>
											<?php echo"<option value='".$category_row->id."' value='".$category_row->id."'>".$category_row->title."</option>"; ?>
											<?php endforeach;?>
											<?php endif;?>
											</select>
										</div>	
									
										<div class="form-group">
											<?php echo form_label('Section-15');?>	
											<select class="custom-select js-example-basic-single" name="section_15">
											<?php
												$sketch_category_15 = $controller->sketch_category($sketch_list->section_15);
												echo "<option value=".$sketch_category_15->id.">".$sketch_category_15->title."</option>";
											?>
											<?php if(count($category_list)):?>
											<?php foreach($category_list as $category_row):?>
											<?php echo"<option value='".$category_row->id."' value='".$category_row->id."'>".$category_row->title."</option>"; ?>
											<?php endforeach;?>
											<?php endif;?>
											</select>
										</div>										
									</div>
								
									<div class="col-xl-12 col-lg-12 col-md-12 col-lg-12">	
										<?php echo form_button('', 'Save', 'id="edit_sketch" class="btn btn-primary"');?>	
										<?php echo form_reset('', 'Reset', 'class="btn btn-danger"');?>
									</div>
								</div>
								<?php echo form_close(); ?> 
								<!--End Add Sketch-->						
							</div>
						</div>					
					</div>	
					<!--End Sketch Page-->	
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
			//Edit Sketch		
			$('#edit_sketch').on('click', function(){	
				var url          = $('#sketch_form').attr('action');
				var data         = $('#sketch_form').serialize();
				
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
									text: 'Sketch '+response.type+' successfully!', 		
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
			});
			//End Edit Sketch	
		});
	</script>
	<!--End Ajax Query-->	
</body>
</html>	