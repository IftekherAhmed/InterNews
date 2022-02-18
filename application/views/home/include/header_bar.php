<!--Header area-->
<div class="header-address-bar">
	<div class="row">
		<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
			<div class="left-bar">
				<?php 
					if($setting_data->header_location == 1){
				?>
				<p>	<span class="fa fa-map-marker-alt"></span>
					<?php
						echo $setting_data->city;
					?>
				</p>
				<?php
					} 
				?>
				<?php 
					if($setting_data->header_date == 1){
				?>
				<p>
					<?php
						echo date("l, M j,Y");
					?>
				</p>
				<?php
					} 
				?>
				<?php 
					if($setting_data->header_last_update == 1){
				?>
				<p>
					<?php echo $controller->news_last_date();?>
				</p>
				<?php
					} 
				?>
			</div>
		</div>
		
		<div class="col-xl-8 col-lg-8 col-md-6 col-sm-12">
			<div class="right-bar">
				<?php
					$page = $controller->page_list();
					if($page){
						foreach($page as $page_list){
							echo "<p><a href='".base_url()."page/$page_list->id'>$page_list->title</a></p>";
						}
					}
					echo "<p>".anchor('contact', 'Contact', ['class' => ''])."</p>";
					if ($this->session->userdata('email') != FALSE){
						echo "<p><a href='".base_url()."ct_backend/index'>Dashboard</a></p>";
					}else{
						echo "<p>".anchor('login', 'Login', ['class' => ''])."</p>";
					}					
				?>
			</div>
		</div>		
	</div>	
</div>

<!--Container-fluid-->
<div class="container-fluid">
	<div class="row">
		<!--header logo area-->
		<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
			<div class="logo-section">
				<a href="<?php echo base_url(); ?>home">
					<img src="<?php echo base_url();?>assets/images/default/logo.png" class="" alt="logo" />
				</a>
			</div>		
		</div>
		<!--End header logo area-->
		
		<!--End header ad -->
		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
			<div class="header-ad">
				<?php 
					$header_ad = $controller->header_ad();								
					if($header_ad){
						foreach($header_ad as $header_ad_row){
							echo html_entity_decode($header_ad_row->input);
						}
					}
				
				?>
			</div>			
		</div>
		<!--End header ad -->
		
		<!--menu search area-->	
		<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
			<?php 
				if($setting_data->search == 1){
			?>
			<div class="search-form-area">
				<?php echo form_open('', ['class'=>'form-inline search-form', 'id'=>'search_form']); ?> 
					<div class="input-group">
						<?php echo form_input(['name'=>'search_input', 'class'=>'form-control', 'type'=>'text', 'placeholder'=>'']); ?>
						<div class="input-group-append">
							
							<?php echo form_submit(['name'=>'submit', 'class'=>'btn', 'id'=>'search_btn', 'value'=>'Search']);?>
						</div>
					</div>
				<?php echo form_close(); ?>	
			</div>	
			<?php 
				}
			?>
		</div>
		<!--End menu search area-->		
	</div>
<!--End Container-fluid-->
</div>

<!--Sticky-->
<?php
	if($setting_data->sticky_menu == 1){
		$sticky_menu = "sticky-top";
	}else{
		$sticky_menu = "";
	}
?>
<div class="<?php echo $sticky_menu; ?>">
	<!--End Container-fluid-->
	<div class="container-fluid">
		<!--NavBar-->
		<nav class="navbar navbar-expand-lg menu-section">
			<div class="container-fluid">
				<button class="navbar-toggler menu-toggler" id="menu_toggler">
					<span class="fa fa-bars"></span>
				</button>
				
				<div class="collapse navbar-collapse" id="NavBar">			
					<?php 
						$first_uri_segment  = $this->uri->segment(1);
						$second_uri_segment = $this->uri->segment(1)."/".$this->uri->segment(2);
						$category_segment   = $this->uri->segment(1)."/".$this->uri->segment(2);
					?>
					<ul class="navbar-nav mr-auto menu-container">						
						<li>
						<?php 
							if($first_uri_segment == "home" || $first_uri_segment == "" || $second_uri_segment == "ct_home/index"){
								echo anchor('home', '<span class="fa fa-home"></span> Home', ['class' => 'nav-link active']);
							}else{
								echo anchor('home', '<span class="fa fa-home"></span> Home', ['class' => 'nav-link']);
							}				
						?>
						</li>
						
						<?php							
							$container_category = $controller->container_category_list();
							if($container_category){
								foreach($container_category as $container_category_list){
									echo "<li class='nav-item dropdown dropdown-menu-container'>";
									
									$sub_category = $controller->sub_category_list($container_category_list->id);							
									if(!empty($sub_category)){
										if($category_segment == "category/".$container_category_list->id){
											echo "<span id='sub_menu_toggler' class='menu-toggler fa fa-angle-down'></span>";
											echo anchor('category/'.$container_category_list->id, ''.$container_category_list->title.'', ['class' => 'nav-link active']);
										}else{
											echo "<span id='sub_menu_toggler' class='menu-toggler fa fa-angle-down'></span>";
											echo anchor('category/'.$container_category_list->id, ''.$container_category_list->title.'', ['class' => 'nav-link']);
										}
										echo "<div class='dropdown-menu animate slideIn'>";
										foreach($sub_category as $sub_category_list){
											echo anchor('category/'.$sub_category_list->id, ''.$sub_category_list->title.'', ['class' => 'dropdown-item']);
										}
										echo "</div>";
									}else{
										if($category_segment == "category/".$container_category_list->id){
											echo anchor('category/'.$container_category_list->id, ''.$container_category_list->title.'', ['class' => 'nav-link active']);
										}else{
											echo anchor('category/'.$container_category_list->id, ''.$container_category_list->title.'', ['class' => 'nav-link']);
										}
									}							
									echo "</li>";
								}
							}
						?>
						
						<li>
						<?php 
							if($first_uri_segment == "video"){
								echo anchor('video', 'Video', ['class' => 'nav-link active']);
							}else{
								echo anchor('video', 'Video', ['class' => 'nav-link']);
							}				
						?>
						</li>
						<li>
							<a href="#" class="menu-list-hide" id="menu_list_hide">
								<span class="fa fa-times"></span> Close
							</a>
						</li>
					</ul>					
				</div>
			</div>
		</nav>
		<!--End NavBar-->
	</div>
	<!--End Container-fluid-->
</div>
<!--End Sticky-->	
<!--End Header area-->	