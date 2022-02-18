<!--User Access Permission-->
<?php	
	$add_permission                     = $controller->user_permission($logged_user_id)->add_data;			
	$edit_permission                    = $controller->user_permission($logged_user_id)->edit_data;			
	$view_permission                    = $controller->user_permission($logged_user_id)->view_data;			
	$delete_permission                  = $controller->user_permission($logged_user_id)->delete_data;			
	$category_permission                = $controller->user_permission($logged_user_id)->category;			
	$message_permission                 = $controller->user_permission($logged_user_id)->message;			
	$notice_permission                  = $controller->user_permission($logged_user_id)->notice;			
	$page_permission                    = $controller->user_permission($logged_user_id)->page;			
	$news_permission                    = $controller->user_permission($logged_user_id)->news;			
	$gallery_permission                 = $controller->user_permission($logged_user_id)->gallery;			
	$video_permission                   = $controller->user_permission($logged_user_id)->video;			
	$advertisement_permission           = $controller->user_permission($logged_user_id)->advertisement;			
	$seo_permission                     = $controller->user_permission($logged_user_id)->seo;			
	$widget_permission                  = $controller->user_permission($logged_user_id)->widget;			
	$user_permission                    = $controller->user_permission($logged_user_id)->user;			
	$user_permission_page_permission    = $controller->user_permission($logged_user_id)->user_permission;			
	$sketch_permission                  = $controller->user_permission($logged_user_id)->sketch;			
	$setting_permission                 = $controller->user_permission($logged_user_id)->setting;
?>
<!--End User Access Permission-->

<!--Sidebar-->
<nav id="sidebar">
	<!--Logo section-->
	<div class="sidebar-header">
		<img src="<?php echo base_url();?>assets/images/default/logo.png" class="logo-max" alt="logo"/>
		<img src="<?php echo base_url();?>assets/images/default/collapsed_logo.png" class="logo-min" alt="logo"/>
	</div>
	
	<?php $uri = $this->uri->segment(2);?>
	<ul class="list-unstyled components sidebar-ul" id="menu">			
		<!--Dashboard menu item-->				
		<?php 
			if($uri == 'index'){
		?>				
		<li class="active">
			<?php echo anchor('ct_backend/index', '<span class="fa fa-puzzle-piece"></span> Dashboard', 'title="Dashboard"');?>
			<p><?php echo anchor('ct_backend/index', 'Dashboard <span class="fa fa-puzzle-piece"></span>', 'title="Dashboard"');?></p>
		</li>	
		<?php
			}else{
		?>				
		<li>
			<?php echo anchor('ct_backend/index', '<span class="fa fa-puzzle-piece"></span> Dashboard', 'title="Dashboard"');?>
			<p><?php echo anchor('ct_backend/index', 'Dashboard <span class="fa fa-puzzle-piece"></span>', 'title="Dashboard"');?></p>
		</li>					
		<?php						
			}
		?>
		
		<!--Category menu item-->				
		<?php 
			if($category_permission == 1){
		?>			
			<?php 
				if($uri == 'category_page'){
			?>
			<li class="active">
				<?php echo anchor('ct_backend/category_page', '<span class="fa fa-bezier-curve"></span> Category', 'title="Category"');?>
				<p><?php echo anchor('ct_backend/category_page', 'Category <span class="fa fa-bezier-curve"></span>', 'title="Category"');?></p>
			</li>					
			<?php
				}else{
			?>				
			<li>
				<?php echo anchor('ct_backend/category_page', '<span class="fa fa-bezier-curve"></span> Category', 'title="Category"');?>
				<p><?php echo anchor('ct_backend/category_page', 'Category <span class="fa fa-bezier-curve"></span>', 'title="Category"');?></p>
			</li>	
			<?php						
				}
			?>		
		<?php						
			}
		?>	
		
		<!--Message menu item-->				
		<?php 
			if($message_permission == 1){
		?>			
			<?php 
				if($uri == 'message_page' || $uri == 'message_view' || $uri == 'send_message_page'){
			?>
			<li class="active">
				<?php echo anchor('ct_backend/message_page', '<span class="fa fa-envelope"></span> Message', 'title="Message"');?>
				<p><?php echo anchor('ct_backend/message_page', 'Message <span class="fa fa-envelope"></span>', 'title="Message"');?></p>
			</li>					
			<?php
				}else{
			?>				
			<li>
				<?php echo anchor('ct_backend/message_page', '<span class="fa fa-envelope"></span> Message', 'title="Message"');?>
				<p><?php echo anchor('ct_backend/message_page', 'Message <span class="fa fa-envelope"></span>', 'title="Message"');?></p>
			</li>	
			<?php						
				}
			?>		
		<?php						
			}
		?>	
				
		<!--Notice menu item-->				
		<?php 
			if($notice_permission == 1){
		?>						
			<?php 
				if($uri == 'notice_page'){
			?>
			<li class="active">
				<?php echo anchor('ct_backend/notice_page', '<span class="fa fa-bell"></span> Notice', 'title="Notice"');?>
				<p><?php echo anchor('ct_backend/notice_page', 'Notice <span class="fa fa-bell"></span>', 'title="Notice"');?></p>
			</li>					
			<?php
				}else{
			?>				
			<li>
				<?php echo anchor('ct_backend/notice_page', '<span class="fa fa-bell"></span> Notice', 'title="Notice"');?>
				<p><?php echo anchor('ct_backend/notice_page', 'Notice <span class="fa fa-bell"></span>', 'title="Notice"');?></p>
			</li>	
			<?php						
				}
			?>	
		<?php						
			}
		?>	
				
		<!--Page menu item-->				
		<?php 
			if($page_permission == 1){
		?>						
			<?php 
				if($uri == 'page_page'){
			?>
			<li class="active">
				<?php echo anchor('ct_backend/page_page', '<span class="fa fa-pager"></span> Page', 'title="Page"');?>
				<p><?php echo anchor('ct_backend/page_page', 'Page <span class="fa fa-pager"></span>', 'title="Page"');?></p>
			</li>					
			<?php
				}else{
			?>				
			<li>
				<?php echo anchor('ct_backend/page_page', '<span class="fa fa-pager"></span> Page', 'title="Page"');?>
				<p><?php echo anchor('ct_backend/page_page', 'Page <span class="fa fa-pager"></span>', 'title="Page"');?></p>
			</li>	
			<?php						
				}
			?>	
		<?php						
			}
		?>
		
		<!--news menu item-->				
		<?php 
			if($news_permission == 1){
		?>			
			<?php 
				if($uri == 'add_news_page' || $uri == 'news_list_page' || $uri == 'news_view' || $uri == 'edit_news_page' || $uri == 'news_additional_images_page' || $uri == 'add_news_extra_images_page'){
			?>
			<li id="news_menu_area" class="active">
				<a href="#" data-toggle="collapse" data-target="#news" aria-expanded="false" aria-controls="news">
					<span class="fa fa-newspaper"></span> News<span class="fa fa-angle-down dropdown-icon"></span>
				</a>
				<ul class="collapsed list-unstyled" id="news" aria-labelledby="news_menu_area" data-parent="#menu">
					<li>
						<?php echo anchor('ct_backend/add_news_page', '<span class="fa fa-plus"></span> Add News', 'title="Add News"');?>	
					</li>
					<li>
						<?php echo anchor('ct_backend/news_list_page', '<span class="fa fa-th-list"></span> News List', 'title="News List"');?>	
					</li>
					<li>
						<?php echo anchor('ct_backend/news_additional_images_page', '<span class="fa fa-images"></span> Additional images', 'title="Additional images"');?>	
					</li>
				</ul>
			</li>  	
			<?php
				}else{
			?>
			<li id="news_menu_area">
				<a href="#" data-toggle="collapse" data-target="#news" aria-expanded="false" aria-controls="news">
					<span class="fa fa-newspaper"></span> News<span class="fa fa-angle-down dropdown-icon"></span>
				</a>
				<ul class="collapse list-unstyled" id="news" aria-labelledby="news_menu_area" data-parent="#menu">
					<li>
						<?php echo anchor('ct_backend/add_news_page', '<span class="fa fa-plus"></span> Add News', 'title="Add News"');?>	
					</li>
					<li>
						<?php echo anchor('ct_backend/news_list_page', '<span class="fa fa-th-list"></span> News List', 'title="News List"');?>	
					</li>
					<li>
						<?php echo anchor('ct_backend/news_additional_images_page', '<span class="fa fa-images"></span> Additional images', 'title="Additional images"');?>	
					</li>
				</ul>
			</li>  
			<?php						
				}
			?>
		<?php						
			}
		?>					
		
		<!--Gallery menu item-->			
		<?php 
			if($gallery_permission == 1){
		?>			
			<?php 
				if($uri == 'gallery_page'){
			?>
			<li class="active">
				<?php echo anchor('ct_backend/gallery_page', '<span class="fa fa-images"></span> Gallery', 'title="Gallery"');?>
				<p><?php echo anchor('ct_backend/gallery_page', 'Gallery <span class="fa fa-images"></span>', 'title="Gallery"');?></p>
			</li>	
			<?php
				}else{
			?>
			<li>
				<?php echo anchor('ct_backend/gallery_page', '<span class="fa fa-images"></span> Gallery', 'title="Gallery"');?>
				<p><?php echo anchor('ct_backend/gallery_page', 'Gallery <span class="fa fa-images"></span>', 'title="Gallery"');?></p>
			</li>	
			<?php						
				}
			?>	
		<?php						
			}
		?>		
		
		<!--Video menu item-->			
		<?php 
			if($video_permission == 1){
		?>			
			<?php 
				if($uri == 'video_page'){
			?>
			<li class="active">
				<?php echo anchor('ct_backend/video_page', '<span class="fab fa-youtube"></span> Video', 'title="Video"');?>
				<p><?php echo anchor('ct_backend/video_page', 'Video <span class="fab fa-youtube"></span>', 'title="Video"');?></p>
			</li>	
			<?php
				}else{
			?>
			<li>
				<?php echo anchor('ct_backend/video_page', '<span class="fab fa-youtube"></span> Video', 'title="Video"');?>
				<p><?php echo anchor('ct_backend/video_page', 'Video <span class="fab fa-youtube"></span>', 'title="Video"');?></p>
			</li>
			<?php						
				}
			?>	
		<?php						
			}
		?>		
		
		<!--Ad menu item-->				
		<?php 
			if($advertisement_permission == 1){
		?>			
			<?php 
				if($uri == 'ad_page'){
			?>
			<li class="active">
				<?php echo anchor('ct_backend/ad_page', '<span class="fa fa-ad"></span> Ad', 'title="Ad"');?>
				<p><?php echo anchor('ct_backend/ad_page', 'Ad <span class="fa fa-ad"></span>', 'title="Ad"');?></p>
			</li>	
			<?php
				}else{
			?>			
			<li>
				<?php echo anchor('ct_backend/ad_page', '<span class="fa fa-ad"></span> Ad', 'title="Ad"');?>
				<p><?php echo anchor('ct_backend/ad_page', 'Ad <span class="fa fa-ad"></span>', 'title="Ad"');?></p>
			</li>	 
			<?php						
				}
			?>
		<?php						
			}
		?>	
		
		<!--SEO menu item-->			
		<?php 
			if($seo_permission == 1){
		?>			
			<?php 
				if($uri == 'seo_page'){
			?>
			<li class="active">
				<?php echo anchor('ct_backend/seo_page', '<span class="fa fa-code"></span> SEO', 'title="SEO"');?>
				<p><?php echo anchor('ct_backend/seo_page', 'SEO <span class="fa fa-code"></span>', 'title="SEO"');?></p>
			</li>	
			<?php
				}else{
			?>
			<li>
				<?php echo anchor('ct_backend/seo_page', '<span class="fa fa-code"></span> SEO', 'title="SEO"');?>
				<p><?php echo anchor('ct_backend/seo_page', 'SEO <span class="fa fa-code"></span>', 'title="SEO"');?></p>
			</li>
			<?php						
				}
			?>	
		<?php						
			}
		?>		
		
		<!--Widget menu item-->				
		<?php 
			if($widget_permission == 1){
		?>						
			<?php 
				if($uri == 'widget_page'){
			?>				
			<li class="active">
				<?php echo anchor('ct_backend/widget_page', '<span class="fa fa-boxes"></span> Widget', 'title="Widget"');?>
				<p><?php echo anchor('ct_backend/widget_page', 'Widget <span class="fa fa-boxes"></span>', 'title="Widget"');?></p>
			</li>	
			<?php
				}else{
			?>				
			<li>
				<?php echo anchor('ct_backend/widget_page', '<span class="fa fa-boxes"></span> Widget', 'title="Widget"');?>
				<p><?php echo anchor('ct_backend/widget_page', 'Widget <span class="fa fa-boxes"></span>', 'title="Widget"');?></p>
			</li>					
			<?php						
				}
			?>	
		<?php						
			}
		?>	
		
		<!--Poll menu item-->				
		<?php 
			if($widget_permission == 1){
		?>						
			<?php 
				if($uri == 'poll_page' || $uri == 'poll_option_edit_page'){
			?>				
			<li class="active">
				<?php echo anchor('ct_backend/poll_page', '<span class="fa fa-archive"></span> Poll', 'title="Poll"');?>
				<p><?php echo anchor('ct_backend/poll_page', 'Poll <span class="fa fa-archive"></span>', 'title="Poll"');?></p>
			</li>	
			<?php
				}else{
			?>				
			<li>
				<?php echo anchor('ct_backend/poll_page', '<span class="fa fa-archive"></span> Poll', 'title="Poll"');?>
				<p><?php echo anchor('ct_backend/poll_page', 'Poll <span class="fa fa-archive"></span>', 'title="Poll"');?></p>
			</li>					
			<?php						
				}
			?>	
		<?php						
			}
		?>
		
		<!--User menu item-->				
		<?php 
			if($user_permission == 1){
		?>			
			<?php 
				if($uri == 'add_user_page' || $uri == 'user_list_page' || $uri == 'edit_user_page' || $uri == 'change_password_page' || $uri == 'edit_user_permission_page' || $uri == 'user_view'){
			?>
			<li id="user_area" class="active">
				<a href="#" data-toggle="collapse" data-target="#user" aria-expanded="false" aria-controls="user">
					<span class="fa fa-user-edit"></span> User<span class="fa fa-angle-down dropdown-icon"></span>
				</a>
				<ul class="collapsed list-unstyled" id="user" aria-labelledby="user_area" data-parent="#menu">
					<li>
						<?php echo anchor('ct_backend/add_user_page', '<span class="fa fa-plus"></span> Add User', 'title="Add User"');?>	
					</li>
					<li>
						<?php echo anchor('ct_backend/user_list_page', '<span class="fa fa-th-list"></span> User List', 'title="User List"');?>	
					</li>
				</ul>
			</li>  
			<?php
				}else{
			?>
			<li id="user_area">
				<a href="#" data-toggle="collapse" data-target="#user" aria-expanded="false" aria-controls="user">
					<span class="fa fa-user-edit"></span> User<span class="fa fa-angle-down dropdown-icon"></span>
				</a>
				<ul class="collapse list-unstyled" id="user" aria-labelledby="user_area" data-parent="#menu">
					<li>
						<?php echo anchor('ct_backend/add_user_page', '<span class="fa fa-plus"></span> Add User', 'title="Add User"');?>	
					</li>
					<li>
						<?php echo anchor('ct_backend/user_list_page', '<span class="fa fa-th-list"></span> User List', 'title="User List"');?>	
					</li>
				</ul>
			</li> 
			<?php						
				}
			?>
		<?php						
			}
		?>	
		
		<!--Sketch menu item-->			
		<?php 
			if($sketch_permission == 1){
		?>			
			<?php 
				if($uri == 'sketch_page'){
			?>
			<li class="active">
				<?php echo anchor('ct_backend/sketch_page', '<span class="fa fa-columns"></span> Sketch', 'title="Sketch"');?>
				<p><?php echo anchor('ct_backend/sketch_page', 'Sketch <span class="fa fa-columns"></span>', 'title="Sketch"');?></p>
			</li>	
			<?php
				}else{
			?>
			<li>
				<?php echo anchor('ct_backend/sketch_page', '<span class="fa fa-columns"></span> Sketch', 'title="Sketch"');?>
				<p><?php echo anchor('ct_backend/sketch_page', 'Sketch <span class="fa fa-columns"></span>', 'title="Sketch"');?></p>
			</li>
			<?php						
				}
			?>	
		<?php						
			}
		?>
		
		<!--Setting menu item-->				
		<?php 
			if($setting_permission == 1){
		?>			
			<?php 
				if($uri == 'general_setting' || $uri == 'smtp_setting' || $uri == 'color_setting'){
			?>
			<li id="setting_area" class="active">
				<a href="#" data-toggle="collapse" data-target="#setting" aria-expanded="false" aria-controls="setting">
					<span class="fa fa-tools"></span> Setting<span class="fa fa-angle-down dropdown-icon"></span>
				</a>
				<ul class="collapsed list-unstyled" id="setting" aria-labelledby="setting_area" data-parent="#menu">
					<li>
						<?php echo anchor('ct_backend/general_setting', '<span class="fa fa-wrench"></span> General Setting', 'title="General Setting"');?>	
					</li>
					<li>
						<?php echo anchor('ct_backend/smtp_setting', '<span class="fa fa-wrench"></span> SMTP Setting', 'title="SMTP Setting"');?>	
					</li>
					<li>
						<?php echo anchor('ct_backend/color_setting', '<span class="fa fa-wrench"></span> Color Setting', 'title="Color Setting"');?>	
					</li>
				</ul>
			</li>  	
			<?php
				}else{
			?>
			<li id="setting_area">
				<a href="#" data-toggle="collapse" data-target="#setting" aria-expanded="false" aria-controls="setting">
					<span class="fa fa-tools"></span> Setting<span class="fa fa-angle-down dropdown-icon"></span>
				</a>
				<ul class="collapse list-unstyled" id="setting" aria-labelledby="setting_area" data-parent="#menu">
					<li>
						<?php echo anchor('ct_backend/general_setting', '<span class="fa fa-wrench"></span> General Setting', 'title="General Setting"');?>	
					</li>
					<li>
						<?php echo anchor('ct_backend/smtp_setting', '<span class="fa fa-wrench"></span> SMTP Setting', 'title="SMTP Setting"');?>	
					</li>
					<li>
						<?php echo anchor('ct_backend/color_setting', '<span class="fa fa-wrench"></span> Color Setting', 'title="Color Setting"');?>	
					</li>
				</ul>
			</li>  
			<?php						
				}
			?>
		<?php						
			}
		?>			
	</ul>
</nav>
<!--End Sidebar-->