<!--header-->	
<div class="header-bar-area">
	<div class="header-bar">

		<!--Collapse button-->	
		<button type="button" id="sidebarCollapse" class="custom-sidebar-collapse-btn">
			<span class="fa fa-align-center"></span>
		</button>
		<!--end Collapse button-->	
		
		<!--Notification section-->				
		<div class="float-right">	
			<div class="notification-area">	
				
				<!--Home Notification-->
				<div class="notification-item">		
					<?php echo anchor('ct_home/index', '<span class="fa fa-home"></span>', ['target' => '_blank', 'class'=>'single-notification']);?>
				</div>
				<!--End Home Notification-->		
			
				<!--Message-->
				<?php
					if($logged_user_position == "Admin" || $logged_user_position == "Moderator"){
					$unseen_message_number = $controller->total_unseen_message();
				?>
				<div class="dropdown notification-item">		
					<a href="#" class="notification-toggler" id="message_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="far fa-envelope"></span>
						<sup>
							<?php 
								if($unseen_message_number <= 9){
									echo "0".$unseen_message_number; 
								}else{
									echo $unseen_message_number; 
								}
							?>
						</sup>
					</a>
					<div class="dropdown-menu message-notification" aria-labelledby="message_dropdown">
						<div class="card">
							<div class="card-body custome-badge">					
								<div class="list-group">
									<ul>
									<?php
										$header_message_list = $controller->header_message_list();
										if(!empty($header_message_list)){
											foreach($header_message_list as $message_list_row){
												if($message_list_row->watched == 1){
													echo "<li>";
												}else{
													echo "<li class='unseen'>";
												}												
												echo "<a href='".base_url()."ct_backend/message_view/".$message_list_row->id."' class='text-link'>".$message_list_row->from_email."</a>";
												echo "<p>".$message_list_row->message."</p>";
												echo "<span>-".nice_date($message_list_row->send_at, 'M j,y')."</span>";
												echo "</li>";
											}
										}
										
									?>
									</ul>
								</div>
								
							</div> 
							<div class="card-footer">
								<div class="custom-form-button">
									<?php echo anchor("ct_backend/message_page", 'See all', ['class' => 'text-link', 'title' => 'View Profile']);?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
					}
				?>
				<!--End Message-->
				
				<!--Profile Notification-->
				<div class="dropdown notification-item">		
					<a href="#" class="notification-toggler" id="profile_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="fa fa-user"></span> <?php echo $logged_user_first_name; ?>
					</a>
					<div class="dropdown-menu profile-notification" aria-labelledby="profile_dropdown">
						<div class="card">
							<div class="card-body custome-badge">					
								<?php if(isset($logged_user_image)){?>
									<img src="<?php echo base_url();?>assets/images/user/<?php echo $logged_user_image; ?>" class="img-thumbnail" alt="<?php echo $logged_user_first_name; ?>">
								<?php }else{?>
									<img src="<?php echo base_url();?>assets/images/default/avatar_blank.png" class="img-thumbnail" alt="<?php echo $logged_user_first_name; ?>">
								<?php }?>
								
								<div class="profile-box-content">
									<label><?php echo $logged_user_first_name; ?> <?php echo $logged_user_last_name; ?></label>
									<span class="badge badge-primary"><?php echo $logged_user_position; ?></span>
								</div>
								
							</div> 
							<div class="card-footer">
								<div class="custom-form-button">
									<?php echo anchor("ct_backend/user_view/{$logged_user_id}", '<span class="fa fa-eye"></span>', ['class' => 'btn btn-sm btn-primary', 'title' => 'View Profile']);?>
									<?php echo anchor("ct_backend/edit_user_page/{$logged_user_id}", '<span class="fa fa-pencil-alt"></span>', ['class' => 'btn btn-sm btn-warning', 'title' => 'Edit Profile']);?>
									<?php echo anchor('ct_login/logout', '<span class="fa fa-sign-out-alt"></span>', ['class' => 'btn btn-sm btn-danger', 'title' => 'Logout']);?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--End Profile Notification-->				
			</div>		
		</div>				
		<!--end Notification section-->					
	</div>
</div>
<!--end Header-->