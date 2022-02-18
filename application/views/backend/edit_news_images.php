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
							
					<!--News Images Page-->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="card custom-content-area">
							<div class="card-header"> 
								<?php echo anchor('ct_backend/index', '<span class="fa fa-puzzle-piece"></span> Dashboard', 'title="Dashboard"');?> / Edit News Images
							</div>
							<div class="card-body row p-4">								
								<!--News Images List-->
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-2" id="data_list_box">
									<div class="responsive-table table-custom">
									<?php 
										if(!empty($news_image_data)){										
											echo "<div class='custom-form-button mb-2'>";
											echo anchor("ct_backend/add_news_extra_images_page/{$news_id}", "<span class='fa fa-plus'></span> Add more images.", array('title' => 'Add more Images', 'class'=>'btn btn-primary'));
											echo "</div>";
									?>
										<table class="table table-bordered custom-form-button">
											<thead>
												<tr>
													<th>Image</th>
													<th>Caption</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody id="edit_news_extra_images">	
												<?php 
													foreach($news_image_data as $news_image_data_row){
														echo "<tr>";
														echo "<td><img class='img-thumbnail' src=".base_url()."assets/images/news_extra_image/".$news_image_data_row->image." alt='news imag' width='80' /></td>";
														//echo "<td>".$news_image_data_row->caption."</td>";
														echo "<td>";
														echo form_open("ct_backend/edit_news_extra_images/{$news_image_data_row->id}", ['class'=>'custom-form-input custom-form-button']);
														echo "<div class='form-group'>";
														echo form_input(['name'=>'caption', 'class'=>'form-control', 'placeholder'=>'Caption', 'value'=> $news_image_data_row->caption]);
														echo "</div>";
														echo form_submit(['name'=>'submit', 'class'=>'btn btn-primary btn-sm', 'type'=>'submit', 'value'=>'Save']);	
														echo form_close();
														echo "</td>";
														echo "<td>";
														echo "<a href='javascript:;' class='btn btn-danger btn-sm image-delete' data_id='".$news_image_data_row->id."'><span class='fa fa-trash'></span> Delete</a>";
														echo "</td>";
														echo "</tr>";
													}										
												?>
											</tbody>
										</table>
										<?php
											}else{
												echo "<div class='custom-form-button'>";
												echo anchor("ct_backend/add_news_extra_images_page/{$news_id}", "<span class='fa fa-plus'></span> Add images.", array('title' => 'Add Images', 'class'=>'btn btn-primary'));
												echo "</div>";
											}								
										?>
									</div>
								</div>
								<!--End News Images List-->								
							</div>
						</div>					
					</div>	
					<!--End News Images Page-->	
				</div>
				<!--End Row-->
			</div>	
			<!--End Second Content Section-->
			
			<!--Images Delete Modal-->
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
			<!--End Images Delete Modal-->		
			
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
			//Delete News Images
			$('#edit_news_extra_images').on('click', '.image-delete', function(){
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
							location.reload();
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
			//End Delete News image	
		});
	</script>
	<!--End Ajax Query-->
</body>
</html>