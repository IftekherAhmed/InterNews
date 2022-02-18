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
							
					<!--Poll option edit Page-->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="card custom-content-area">
							<div class="card-header"> 
								<?php echo anchor('ct_backend/index', '<span class="fa fa-puzzle-piece"></span> Dashboard', 'title="Dashboard"');?> / <?php echo $target_poll->question; ?>
							</div>
							<div class="card-body row p-4">	
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-2">
									<div class="custom-tab">	
										<ul class="nav nav-tabs page-tab-nav" role="tablist">
											<li class="nav-item">
												<a class="nav-link" href="#add_poll_option_tab" role="tab" data-toggle="tab">
													<span class="fa fa-plus"></span> Add option
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link active" href="#poll_option_list_tab" role="tab" data-toggle="tab">
													<span class="fa fa-archive"></span> Option list
												</a>
											</li>
										</ul>
										<!-- Tab panes -->
										<div class="tab-content page-tab-container">
											<div role="tabpanel" class="tab-pane fade" id="add_poll_option_tab">
												<div class="row">
													<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">													
														<?php echo form_open("ct_backend/add_target_poll_option/{$target_poll->id}", ['class'=>'custom-form-input']); ?> 
															
															<div id="dynamic_poll_option">
																<?php echo form_label('Option');?>
																<div class="form-group">	
																	<div class="input-group custom-form-right-group">
																		<?php echo form_input(['name'=>'option[]', 'class'=>'form-control', 'placeholder'=>'Option']); ?>
																		<div class="input-group-append">
																			<button type="button" name="add" id="plus_option" class="btn btn-sm btn-success">
																				<span class="fa fa-plus"></span>
																			</button>
																		</div>
																	</div>
																</div>	
															</div>	
															<div class="custom-form-button">
																<?php echo form_submit(['name'=>'submit', 'class'=>'btn btn-primary', 'type'=>'submit', 'value'=>'Save']); ?>	
															</div>												
														<?php echo form_close(); ?> 
													</div>
												</div>					
											</div>
											<div role="tabpanel" class="tab-pane active" id="poll_option_list_tab">
												<div class="row">
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
														<div class="responsive-table table-custom">
														<?php 
															if(!empty($target_poll_options)){
														?>
															<table class="table table-bordered custom-form-button" id="poll_option_table">
																<thead>
																	<tr>
																		<th>Option</th>
																		<th>Action</th>
																	</tr>
																</thead>
																<tbody>	
																	<?php 
																		foreach($target_poll_options as $target_poll_options_row){
																			echo "<tr>";
																			echo "<td>";
																			echo form_open("ct_backend/poll_option_edit/{$target_poll_options_row->id}", ['class'=>'custom-form-input custom-form-button']);
																			echo "<div class='form-group'>";
																			echo form_input(['name'=>'option', 'class'=>'form-control', 'placeholder'=>'Option', 'value'=> $target_poll_options_row->option]);
																			echo "</div>";
																			echo form_submit(['name'=>'submit', 'class'=>'btn btn-primary', 'type'=>'submit', 'value'=>'Save']);	
																			echo form_close();
																			echo "</td>";
																			echo "<td>";
																			echo "<a href='javascript:;' class='btn btn-danger btn-sm poll-option-delete' data_id='".$target_poll_options_row->id."'><span class='fa fa-trash'></span> Delete</a>";
																			echo "</td>";
																			echo "</tr>";
																		}										
																	?>
																</tbody>
															</table>
															<?php
																}else{
																}								
															?>
														</div>
													</div>
												</div>	
											</div>
										</div>
									</div>
								</div>						
							</div>
						</div>					
					</div>	
					<!--End Poll option edit Page-->	
				</div>
				<!--End Row-->
			</div>	
			<!--End Second Content Section-->	
			
			<!--Poll option Delete Modal-->
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
			<!--End Poll option Delete Modal-->	
			
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
			// Poll Option	
			// Plus Poll input option
			var i=1;
			$("#dynamic_poll_option").on('click', '#plus_option', function(){
				i++;
				$('#dynamic_poll_option').append('<div class="form-group" id="poll_option_row'+i+'"><div class="input-group custom-form-right-group"><input type="text" name="option[]" placeholder="Option" class="form-control option_list" /><div class="input-group-append"><button type="button" name="remove" id="'+i+'" class="btn btn-sm btn-danger btn_poll_option_remove"><span class="fa fa-trash"></span></button></div></div></div>');
			});	
	
			// Minus Poll input option
			$("#dynamic_poll_option").on('click', '.btn_poll_option_remove', function(){
				var button_id = $(this).attr("id"); 
				$('#poll_option_row'+button_id+'').remove();
			});	
			
			//Delete poll option
			$('#poll_option_table').on('click', '.poll-option-delete', function(){
				var id = $(this).attr('data_id');
				$('#delete_Modal').modal('show');
				$('#btn_delete').unbind().on('click', function(){
					$.ajax({
						type: 'ajax',
						method: 'get',
						async: false,
						url: base_url+'ct_backend/delete_poll_option/' +id,
						dataType: 'json',
						success: function(){
							$('#delete_Modal').modal('hide');						
							toast();
							function toast(){
								$.toast({
									text: 'Successfully deleted poll option!', 		
									icon: 'success'
								});
							}
							location.reload();
						},error: function(){				
							toast();
							function toast(){
								$.toast({
									text: 'Poll option deleting unsuccessfull!', 		
									icon: 'error'
								});
							}
						}
					});
				});
			});
			//End Delete poll option				
		});	
	</script>
	<!--End Ajax Query-->
</body>
</html>