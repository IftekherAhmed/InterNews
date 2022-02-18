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
							
					<!--User View Page-->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="card custom-content-area">
							<div class="card-header"> 
								<?php echo anchor('ct_backend/index', '<span class="fa fa-puzzle-piece"></span> Dashboard', 'title="Dashboard"');?> / <?php echo $user_data->first_name."&nbsp;".$user_data->last_name; ?>
								<span class="float-right badge custom-badge-info"><?php echo $user_news_count;?></span>
							</div>
							<div class="card-body row p-4">	
								<!--Profile and User News List Tab-->
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">							
									<div class="custom-tab">						
										<ul class="nav nav-tabs news-tab-nav" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" href="#profile" role="tab" data-toggle="tab">
													<span class="fa fa-user"></span> Profile
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#user_news" role="tab" data-toggle="tab">
													<span class="fa fa-newspaper"></span> <?php echo $user_data->first_name; ?>'s news
												</a>
											</li>
										</ul>
										<!-- Tab panes -->
										<div class="tab-content news-tab-container">
											<div role="tabpanel" class="tab-pane active" id="profile">
												<div class="row">							
													<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 profile-image-area custom-form-button">
														<img src="<?php echo base_url();?>assets/images/user/<?php echo $user_data->image; ?>" class="img-thumbnail" width="250" height="250" alt="image">
														
														<div class="row">
															<div class="col custome-badge">
																<h3><?php echo $user_data->first_name."&nbsp;".$user_data->last_name; ?></h3><hr />
																
																<p><?php echo $user_data->message; ?></p><hr />
																<p>Position: <span class="badge badge-primary"><?php echo $user_data->position; ?></span></p>
																<a href="http://www.<?php echo $user_data->web_link;?>"><span class="fa fa-link"></span> Link</a>
															</div>
														</div>
														
														<?php echo anchor("ct_backend/edit_user_page/{$user_data->id}", '<span class="fa fa-pencil-alt"></span> Edit Profile', ['class' => 'btn btn-block btn-info', 'title' => 'Edit Profile']);?>
													</div>
													
													<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 profile-content-area">
														<div class="pl-3">
															<p><b>Number</b>:    <?php echo $user_data->mobile; ?></p>
															<p><b>Email</b>:     <?php echo $user_data->email; ?></p>
															<p><b>Gender</b>:    <?php echo $user_data->gender; ?></p>
															<p><b>Birthday</b>:  <?php echo nice_date($user_data->dob, 'F j,Y'); ?></p>
															<p><b>Address</b>:   <?php echo $user_data->address; ?></p>
															<p><b>Added By</b>:  <?php 
																						echo "<a href=".base_url()."ct_backend/user_view/".$user_data->referenced_by.">";
																						echo $controller->single_user_data($user_data->referenced_by)->first_name;
																						echo "</a>";
																				 ?>
															</p>
															<p><b>Total News</b>:   <?php 
																							if(!empty($user_news)){
																								echo count($user_news); 
																							}else{
																								echo "{$user_data->first_name} has not published any news yet!";
																							}
																							?>
															</p>
															<p><b>Joined</b>:    <?php echo nice_date($user_data->joined, 'M j,y'); ?></p>
														</div>
													</div>
													<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12"></div>
												</div>
											</div>
											<div role="tabpanel" class="tab-pane fade" id="user_news">
												<div class="row">													
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 profile-activity-area">
														<div class="responsive-table table-custom">
															<table class="table custom-form-button custom-square-button" id="user_news_list">
																<thead>
																	<tr>
																		<th>Image</th>
																		<th>Title</th>
																		<th>Category</th>
																		<th>Published</th>
																		<th>Action</th>
																	</tr>
																</thead>
																<tbody>												
																<?php if(!empty($user_news)){?>
																	<?php foreach($user_news as $user_news_row){?>
																	<tr>
																		<td>
																			<?php 
																				echo "<a href=".base_url()."assets/images/news_featured_image/".$user_news_row->image.">
																					<img class='img-thumbnail' src=".base_url()."assets/images/news_featured_image/".$user_news_row->image." alt='news imag' width='100' />
																				</a>";
																			?>
																		</td>
																		<td>
																			<?php echo anchor("ct_backend/news_view/{$user_news_row->slug}", "{$user_news_row->news_title}", ['class' => 'text-info', 'title' => "{$user_news_row->news_title}"]);?>
																		</td>
																		<td>
																			<?php echo $user_news_row->category_title;?>
																		</td>
																		<td>
																			<?php echo nice_date($user_news_row->news_published, 'M j,y');?>
																		</td>
																		
																		<td>														
																			<?php 
																				echo anchor("ct_backend/news_view/{$user_news_row->slug}", "<span class='fa fa-eye'></span>", ['class' => 'btn btn-primary btn-sm', 'title' => "View"]);
																				
																				if($user_data->id == $logged_user_id || $this->logged_user_type == "Admin" || $this->logged_user_type == "Moderator"){	
																					echo anchor("ct_backend/edit_news_page/{$user_news_row->id}", "<span class='fa fa-pencil-alt'></span>", ['class' => 'btn btn-info btn-sm', 'title' => "Edit"]);
																										
																					echo '<a href="javascript:;" class="btn btn-danger btn-sm news-delete" data-id="'.$user_news_row->id.'" title=""><span class="fa fa-trash"></span></a>';
																				}
																			?>
																		</td>													
																	</tr>												
																	<?php };?>											
																<?php }else{?>
																	<tr>
																		<td colspan="5" class="pl-2">
																			<?php echo $user_data->first_name; ?> has not posted any news!
																		</td>					
																	</tr>	
																<?php };?>	
																</tbody>
															</table>
														</div>
													</div>									
												</div>
											</div>
										</div>
									</div>
								</div>
								<!--End Profile and User News List Tab-->
							</div>
						</div>					
					</div>	
					<!--End User View Page-->	
				</div>
				<!--End Row-->
			</div>	
			<!--End Second Content Section-->
			
			<!--News Delete Modal-->
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
			<!--End News Delete Modal-->	
			
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
			var table = $('#user_news_list').DataTable({
				lengthChange: true,
				ordering: true,
				columnDefs: [{
					targets: [0, 4],
					orderable: false,
					searchable: false
				}]
			});		
			//Delete News
			$('#user_news_list').on('click', '.news-delete', function(){
				var id = $(this).attr('data-id');
				$('#delete_Modal').modal('show');
				$('#btn_delete').unbind().on('click', function(){
					$.ajax({
						type: 'ajax',
						method: 'get',
						async: false,
						url: base_url+'ct_backend/delete_news/' +id,
						dataType: 'json',
						success: function(){
							$('#delete_Modal').modal('hide');						
							toast();
							function toast(){
								$.toast({
									text: 'Successfully deleted news!', 		
									icon: 'success'
								});
							}
							location.reload();
						},error: function(){				
							toast();
							function toast(){
								$.toast({
									text: 'News deleting unsuccessfull!', 		
									icon: 'error'
								});
							}
						}
					});
				});
			});
			//End Delete News	
		});
	</script>
	<!--End Ajax Query-->
</body>
</html>	