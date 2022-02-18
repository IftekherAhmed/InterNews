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
							
					<!--Setting Page-->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="card custom-content-area">
							<div class="card-header"> 
								<?php echo anchor('ct_backend/index', '<span class="fa fa-puzzle-piece"></span> Dashboard', 'title="Dashboard"');?> / Color Setting
							</div>
							<div class="card-body row p-4">															
								<!--Add Setting-->
								<?php echo form_open('ct_backend/edit_color_setting', ['class'=>'col custom-form-input custom-form-button', 'id'=>'color_setting_form']); ?> 
								<div class="row">
									<!--Setting Tab-->
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">							
										<div class="custom-tab">						
											<ul class="nav nav-tabs news-tab-nav" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" href="#general_setting_tab" role="tab" data-toggle="tab">
														General
													</a>
												</li>
												
												<li class="nav-item">
													<a class="nav-link" href="#header_setting_tab" role="tab" data-toggle="tab">
														Header
													</a>
												</li>
												
												<li class="nav-item">
													<a class="nav-link" href="#footer_setting_tab" role="tab" data-toggle="tab">
														Footer
													</a>
												</li>
												
												<li class="nav-item">
													<a class="nav-link" href="#sidebar_setting_tab" role="tab" data-toggle="tab">
														Sidebar
													</a>
												</li>
												
												<li class="nav-item">
													<a class="nav-link" href="#news_setting_tab" role="tab" data-toggle="tab">
														News
													</a>
												</li>
												
												<li class="nav-item">
													<a class="nav-link" href="#video_setting_tab" role="tab" data-toggle="tab">
														Video
													</a>
												</li>
												
												<li class="nav-item">
													<a class="nav-link" href="#page_setting_tab" role="tab" data-toggle="tab">
														Page
													</a>
												</li>
											</ul>
											<!-- Tab panes -->
											
											<!--Setting Tab-->
											<div class="tab-content news-tab-container">
												
												<!--General Setting Tab-->
												<div role="tabpanel" class="tab-pane active" id="general_setting_tab">
													<div class="row mb-4">
														<div class="col-xl-2 col-lg-2 col-md-3 col-lg-12 mb-2">
															<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
																<a class="nav-link active m-0" id="v-pills-featured-news-tab" data-toggle="pill" href="#v-pills-featured-news" role="tab" aria-controls="v-pills-featured-news" aria-selected="true">Featured News</a>
																
																<a class="nav-link m-0" id="v-pills-thumbnail-news-tab" data-toggle="pill" href="#v-pills-thumbnail-news" role="tab" aria-controls="v-pills-thumbnail-news" aria-selected="true">Thumbnail News</a>
																
																<a class="nav-link m-0" id="v-pills-section-heading-tab" data-toggle="pill" href="#v-pills-section-heading" role="tab" aria-controls="v-pills-section-heading" aria-selected="true">Section Heading</a>
																
																<a class="nav-link m-0" id="v-pills-paginaiton-tab" data-toggle="pill" href="#v-pills-paginaiton" role="tab" aria-controls="v-pills-paginaiton" aria-selected="true">Pagination</a>
																
																<a class="nav-link m-0" id="v-pills-scroll-up-tab" data-toggle="pill" href="#v-pills-scroll-up" role="tab" aria-controls="v-pills-scroll-up" aria-selected="true">Scroll up</a>
																
																<a class="nav-link m-0" id="v-pills-user-profile-tab" data-toggle="pill" href="#v-pills-user-profile" role="tab" aria-controls="v-pills-user-profile" aria-selected="true">User Profile</a>
																
																<a class="nav-link m-0" id="v-pills-notice-tab" data-toggle="pill" href="#v-pills-notice" role="tab" aria-controls="v-pills-notice" aria-selected="true">Notice</a>
															</div>
														</div>
														
														<div class="col-xl-10 col-lg-10 col-md-9 col-lg-12">
															<div class="tab-content" id="v-pills-tabContent">
																<div class="tab-pane fade show active p-0" id="v-pills-featured-news" role="tabpanel" aria-labelledby="v-pills-featured-news-tab">
																	<div class="row">
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">
																			<div class="form-group">
																				<?php echo form_label('Featured news category background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'featured_news_category_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('featured_news_category_bg')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Featured news category color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'featured_news_category_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('featured_news_category_color')->color_code]); ?>
																			</div>
																		</div>
																	</div>
																</div>
																
																<div class="tab-pane fade show p-0" id="v-pills-thumbnail-news" role="tabpanel" aria-labelledby="v-pills-thumbnail-news-tab">
																	<div class="row">
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">					
																			<div class="form-group">
																				<?php echo form_label('Thumbnail news category background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'thumbnail_news_category_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('thumbnail_news_category_bg')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Thumbnail news category color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'thumbnail_news_category_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('thumbnail_news_category_color')->color_code]); ?>
																			</div>
																		</div>
																	</div>
																</div>
																
																<div class="tab-pane fade show p-0" id="v-pills-section-heading" role="tabpanel" aria-labelledby="v-pills-section-heading-tab">
																	<div class="row">
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">					
																			<div class="form-group">
																				<?php echo form_label('Section title background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'section_title_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('section_title_bg')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Section title color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'section_title_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('section_title_color')->color_code]); ?>
																			</div>
																		</div>
																	</div>
																</div>
																
																<div class="tab-pane fade show p-0" id="v-pills-paginaiton" role="tabpanel" aria-labelledby="v-pills-paginaiton-tab">
																	<div class="row">
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">
																			<div class="form-group">
																				<?php echo form_label('Pagination item background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'pagination_item_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('pagination_item_bg')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Pagination item color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'pagination_item_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('pagination_item_color')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Pagination item hover background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'pagination_item_hover_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('pagination_item_hover_bg')->color_code]); ?>
																			</div>
																		</div>
																			
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">
																			<div class="form-group">
																				<?php echo form_label('Pagination item hover color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'pagination_item_hover_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('pagination_item_hover_color')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Pagination item active background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'pagination_item_active_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('pagination_item_active_bg')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Pagination item active color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'pagination_item_active_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('pagination_item_active_color')->color_code]); ?>
																			</div>
																		</div>
																	</div>
																</div>
																
																<div class="tab-pane fade show p-0" id="v-pills-scroll-up" role="tabpanel" aria-labelledby="v-pills-scroll-up-tab">
																	<div class="row">
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">
																			<div class="form-group">
																				<?php echo form_label('Scroll up background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'scroll_up_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('scroll_up_bg')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Scroll up color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'scroll_up_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('scroll_up_color')->color_code]); ?>
																			</div>																	
																		</div>
																			
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">
																			<div class="form-group">
																				<?php echo form_label('Scroll up hover background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'scroll_up_hover_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('scroll_up_hover_bg')->color_code]); ?>
																			</div>	
																			
																			<div class="form-group">
																				<?php echo form_label('Scroll up hover color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'scroll_up_hover_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('scroll_up_hover_color')->color_code]); ?>
																			</div>																	
																		</div>
																	</div>
																</div>
																
																<div class="tab-pane fade show p-0" id="v-pills-user-profile" role="tabpanel" aria-labelledby="v-pills-user-profile-tab">
																	<div class="row">
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">
																			<div class="form-group">
																				<?php echo form_label('User profile tab item background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'user_profile_tab_item_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('user_profile_tab_item_bg')->color_code]); ?>
																			</div>	
																			
																			<div class="form-group">
																				<?php echo form_label('User profile tab item color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'user_profile_tab_item_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('user_profile_tab_item_color')->color_code]); ?>
																			</div>	
																		</div>	
																			
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">
																			<div class="form-group">
																				<?php echo form_label('User profile tab item active background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'user_profile_tab_item_active_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('user_profile_tab_item_active_bg')->color_code]); ?>
																			</div>	
																			
																			<div class="form-group">
																				<?php echo form_label('User profile tab item active color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'user_profile_tab_item_active_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('user_profile_tab_item_active_color')->color_code]); ?>
																			</div>
																		</div>
																	</div>
																</div>
																
																<div class="tab-pane fade show p-0" id="v-pills-notice" role="tabpanel" aria-labelledby="v-pills-notice-tab">
																	<div class="row">
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">
																			<div class="form-group">
																				<?php echo form_label('Notice background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'notice_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('notice_bg')->color_code]); ?>
																			</div>	
																			
																			<div class="form-group">
																				<?php echo form_label('Notice border');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'notice_border']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('notice_border')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Notice color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'notice_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('notice_color')->color_code]); ?>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!--End General Setting Tab-->
												
												<!--Header Setting Tab-->
												<div role="tabpanel" class="tab-pane" id="header_setting_tab">
													<div class="row mb-4">
														<div class="col-xl-2 col-lg-2 col-md-3 col-lg-12 mb-2">
															<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
																<a class="nav-link active m-0" id="v-pills-header-bar-tab" data-toggle="pill" href="#v-pills-header-bar" role="tab" aria-controls="v-pills-header-bar" aria-selected="true">Header Bar</a>
																
																<a class="nav-link m-0" id="v-pills-search-tab" data-toggle="pill" href="#v-pills-search" role="tab" aria-controls="v-pills-search" aria-selected="true">Search</a>
																
																<a class="nav-link m-0" id="v-pills-menu-tab" data-toggle="pill" href="#v-pills-menu" role="tab" aria-controls="v-pills-menu" aria-selected="true">Menu</a>
															</div>
														</div>
														
														<div class="col-xl-10 col-lg-10 col-md-9 col-lg-12">
															<div class="tab-content" id="v-pills-tabContent">
																<div class="tab-pane fade show active p-0" id="v-pills-header-bar" role="tabpanel" aria-labelledby="v-pills-header-bar-tab">
																	<div class="row">
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">
																			<div class="form-group">
																				<?php echo form_label('Header bar background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'header_bar_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('header_bar_bg')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Header bar color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'header_bar_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('header_bar_color')->color_code]); ?>
																			</div>
																		</div>
																	</div>
																</div>
																
																<div class="tab-pane fade show p-0" id="v-pills-search" role="tabpanel" aria-labelledby="v-pills-search-tab">
																	<div class="row">
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">
																			<div class="form-group">
																				<?php echo form_label('Search background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'search_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('search_bg')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Search color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'search_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('search_color')->color_code]); ?>
																			</div>
																		</div>
																	</div>
																</div>
																
																<div class="tab-pane fade show p-0" id="v-pills-menu" role="tabpanel" aria-labelledby="v-pills-menu-tab">
																	<div class="row">
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">
																			<div class="form-group">
																				<?php echo form_label('Menu background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'menu_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('menu_bg')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Menu item background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'menu_item_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('menu_item_bg')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Menu item color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'menu_item_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('menu_item_color')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Menu item hover background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'menu_item_hover_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('menu_item_hover_bg')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Menu item hover color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'menu_item_hover_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('menu_item_hover_color')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Menu item active background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'menu_item_active_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('menu_item_active_bg')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Menu item active color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'menu_item_active_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('menu_item_active_color')->color_code]); ?>
																			</div>
																		</div>
																		
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">
																			<div class="form-group">
																				<?php echo form_label('Menu sub item background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'menu_sub_item_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('menu_sub_item_bg')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Menu sub item color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'menu_sub_item_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('menu_sub_item_color')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Menu sub item hover background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'menu_sub_item_hover_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('menu_sub_item_hover_bg')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Menu sub_item hover color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'menu_sub_item_hover_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('menu_sub_item_hover_color')->color_code]); ?>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!--End Header Setting Tab-->

												<!--Footer Setting Tab-->
												<div role="tabpanel" class="tab-pane" id="footer_setting_tab">
													<div class="row mb-4">
														<div class="col-xl-2 col-lg-2 col-md-3 col-lg-12 mb-2">
															<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
																<a class="nav-link active m-0" id="v-pills-footer-bar-tab" data-toggle="pill" href="#v-pills-footer-bar" role="tab" aria-controls="v-pills-footer-bar" aria-selected="true">Footer Bar</a>
															
																<a class="nav-link m-0" id="v-pills-footer-tab" data-toggle="pill" href="#v-pills-footer" role="tab" aria-controls="v-pills-footer" aria-selected="true">Footer</a>
															</div>
														</div>
														
														<div class="col-xl-10 col-lg-10 col-md-9 col-lg-12">
															<div class="tab-content" id="v-pills-tabContent">
																<div class="tab-pane fade show active p-0" id="v-pills-footer-bar" role="tabpanel" aria-labelledby="v-pills-footer-bar-tab">
																	<div class="row">
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">
																			<div class="form-group">
																				<?php echo form_label('Footer-bar background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'footer_bar_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('footer_bar_bg')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Footer-bar color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'footer_bar_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('footer_bar_color')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Footer-bar anchor color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'footer_bar_anchor_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('footer_bar_anchor_color')->color_code]); ?>
																			</div>
																		</div>
																	</div>
																</div>
																
																<div class="tab-pane fade show p-0" id="v-pills-footer" role="tabpanel" aria-labelledby="v-pills-footer-tab">
																	<div class="row">
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">
																			<div class="form-group">
																				<?php echo form_label('Footer copyright background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'footer_copyright_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('footer_copyright_bg')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Footer copyright color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'footer_copyright_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('footer_copyright_color')->color_code]); ?>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!--End Footer Setting Tab-->

												<!--End Sidebar Setting Tab-->
												<div role="tabpanel" class="tab-pane" id="sidebar_setting_tab">
													<div class="row mb-4">
														<div class="col-xl-2 col-lg-2 col-md-3 col-lg-12 mb-2">
															<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
																<a class="nav-link active m-0" id="v-pills-sidebar-tab-tab" data-toggle="pill" href="#v-pills-sidebar-tab" role="tab" aria-controls="v-pills-sidebar-tab" aria-selected="true">Tab</a>
																
																<a class="nav-link m-0" id="v-pills-archive-tab" data-toggle="pill" href="#v-pills-archive" role="tab" aria-controls="v-pills-archive" aria-selected="true">Archive</a>
																
																<a class="nav-link m-0" id="v-pills-poll-tab" data-toggle="pill" href="#v-pills-poll" role="tab" aria-controls="v-pills-poll" aria-selected="true">Poll</a>
															</div>
														</div>
														
														<div class="col-xl-10 col-lg-10 col-md-9 col-lg-12">
															<div class="tab-content" id="v-pills-tabContent">
																<div class="tab-pane fade show active p-0" id="v-pills-sidebar-tab" role="tabpanel" aria-labelledby="v-pills-sidebar-tab-tab">
																	<div class="row">
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">
																			<div class="form-group">
																				<?php echo form_label('Sidebar tab item background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'side_bar_tab_item_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('side_bar_tab_item_bg')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Sidebar tab item color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'side_bar_tab_item_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('side_bar_tab_item_color')->color_code]); ?>
																			</div>
																		</div>
																			
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">
																			<div class="form-group">
																				<?php echo form_label('Sidebar tab active item background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'side_bar_tab_active_item_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('side_bar_tab_active_item_bg')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Sidebar tab active item color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'side_bar_tab_active_item_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('side_bar_tab_active_item_color')->color_code]); ?>
																			</div>
																		</div>
																	</div>
																</div>
																
																<div class="tab-pane fade show p-0" id="v-pills-archive" role="tabpanel" aria-labelledby="v-pills-archive-tab">
																	<div class="row">
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">
																			<div class="form-group">
																				<?php echo form_label('Sidebar archive background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'side_bar_archive_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('side_bar_archive_bg')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Sidebar archive color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'side_bar_archive_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('side_bar_archive_color')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Sidebar archive date hover background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'side_bar_archive_date_hover_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('side_bar_archive_date_hover_bg')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Sidebar archive date hover color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'side_bar_archive_date_hover_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('side_bar_archive_date_hover_color')->color_code]); ?>
																			</div>
																		</div>
																			
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">
																			<div class="form-group">
																				<?php echo form_label('Sidebar archive active date background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'side_bar_archive_date_active_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('side_bar_archive_date_active_bg')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Sidebar archive active date color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'side_bar_archive_date_active_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('side_bar_archive_date_active_color')->color_code]); ?>
																			</div>	
																		</div>
																	</div>
																</div>
																
																<div class="tab-pane fade show p-0" id="v-pills-poll" role="tabpanel" aria-labelledby="v-pills-poll-tab">
																	<div class="row">
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">
																			<div class="form-group">
																				<?php echo form_label('Sidebar poll background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'side_bar_poll_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('side_bar_poll_bg')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Sidebar poll color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'side_bar_poll_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('side_bar_poll_color')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Sidebar poll option color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'side_bar_poll_option_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('side_bar_poll_option_color')->color_code]); ?>
																			</div>
																		</div>
																			
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">
																			<div class="form-group">
																				<?php echo form_label('Sidebar poll button background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'side_bar_poll_button_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('side_bar_poll_button_bg')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Sidebar poll button color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'side_bar_poll_button_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('side_bar_poll_button_color')->color_code]); ?>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!--End Sidebar Setting Tab-->

												<!--End News Setting Tab-->
												<div role="tabpanel" class="tab-pane" id="news_setting_tab">
													<div class="row mb-4">
														<div class="col-xl-2 col-lg-2 col-md-3 col-lg-12 mb-2">
															<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
																<a class="nav-link active m-0" id="v-pills-general-news-tab" data-toggle="pill" href="#v-pills-general-news" role="tab" aria-controls="v-pills-general-news" aria-selected="true">General News</a>
																
																<a class="nav-link m-0" id="v-pills-home-page-tab" data-toggle="pill" href="#v-pills-home-page" role="tab" aria-controls="v-pills-home-page" aria-selected="true">Home Page</a>
																
																<a class="nav-link m-0" id="v-pills-category-page-tab" data-toggle="pill" href="#v-pills-category-page" role="tab" aria-controls="v-pills-category-page" aria-selected="true">Category Page</a>
																
																<a class="nav-link m-0" id="v-pills-news-page-tab" data-toggle="pill" href="#v-pills-news-page" role="tab" aria-controls="v-pills-news-page" aria-selected="true">News Page</a>
															</div>
														</div>
														
														<div class="col-xl-10 col-lg-10 col-md-9 col-lg-12">
															<div class="tab-content" id="v-pills-tabContent">
																<div class="tab-pane fade show active p-0" id="v-pills-general-news" role="tabpanel" aria-labelledby="v-pills-general-news-tab">
																	<div class="row">
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">
																			<div class="form-group">
																				<?php echo form_label('News title color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'news_title_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('news_title_color')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('News description color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'news_description_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('news_description_color')->color_code]); ?>
																			</div>
																		</div>
																	</div>
																</div>
																
																<div class="tab-pane fade show p-0" id="v-pills-home-page" role="tabpanel" aria-labelledby="v-pills-home-page-tab">
																	<div class="row">																		
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">	
																			<div class="form-group">
																				<?php echo form_label('Breaking news background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'breaking_news_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('breaking_news_bg')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Breaking news heading background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'breaking_news_heading_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('breaking_news_heading_bg')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Breaking news heading color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'breaking_news_heading_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('breaking_news_heading_color')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Breaking news item color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'breaking_news_item_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('breaking_news_item_color')->color_code]); ?>
																			</div>
																		</div>
																		
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">	
																			<div class="form-group">
																				<?php echo form_label('Home 13section 1st news background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'home_13_section_1_news_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('home_13_section_1_news_bg')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Home 13section 1st news color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'home_13_section_1_news_title_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('home_13_section_1_news_title_color')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Home 13section 1st news description color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'home_13_section_1_news_description_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('home_13_section_1_news_description_color')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Home 14section news background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'home_14_section_news_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('home_14_section_news_bg')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Home 14section news title color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'home_14_section_news_title_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('home_14_section_news_title_color')->color_code]); ?>
																			</div>
																		</div>
																	</div>
																</div>
																
																<div class="tab-pane fade show p-0" id="v-pills-category-page" role="tabpanel" aria-labelledby="v-pills-category-page-tab">
																	<div class="row">
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">
																			<div class="form-group">
																				<?php echo form_label('Category 1st & 2nd news background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'category_1_2_news_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('category_1_2_news_bg')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Category 1st & 2nd news title color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'category_1_2_news_title_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('category_1_2_news_title_color')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Category 1st & 2nd news description color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'category_1_2_news_description_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('category_1_2_news_description_color')->color_code]); ?>
																			</div>
																		</div>
																		
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">
																			<div class="form-group">
																				<?php echo form_label('Category 3rd news background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'category_3_news_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('category_3_news_bg')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Category 3rd news title color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'category_3_news_news_title_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('category_3_news_news_title_color')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Category 3rd news description color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'category_3_news_description_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('category_3_news_description_color')->color_code]); ?>
																			</div>
																		</div>
																	</div>
																</div>
																
																<div class="tab-pane fade show p-0" id="v-pills-news-page" role="tabpanel" aria-labelledby="v-pills-news-page-tab">
																	<div class="row">
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">
																			<div class="form-group">
																				<?php echo form_label('News page background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'news_page_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('news_page_bg')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('News breadcrumb background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'news_breadcrumb_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('news_breadcrumb_bg')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('News breadcrumb 1st list background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'news_breadcrumb_1_list_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('news_breadcrumb_1_list_bg')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('News breadcrumb 1st list color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'news_breadcrumb_1_list_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('news_breadcrumb_1_list_color')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('News breadcrumb 2nd list background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'news_breadcrumb_2_list_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('news_breadcrumb_2_list_bg')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('News breadcrumb 2nd list color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'news_breadcrumb_2_list_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('news_breadcrumb_2_list_color')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('News breadcrumb 3rd list color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'news_breadcrumb_3_list_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('news_breadcrumb_3_list_color')->color_code]); ?>
																			</div>
																		</div>
																		
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">
																			<div class="form-group">
																				<?php echo form_label('News page heading background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'news_page_heading_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('news_page_heading_bg')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('News page heading border');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'news_page_heading_border']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('news_page_heading_border')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('News page news title color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'news_page_news_title_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('news_page_news_title_color')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('News page news sub title color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'news_page_news_sub_title_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('news_page_news_sub_title_color')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('News page news information color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'news_page_news_information_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('news_page_news_information_color')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('News page news description color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'news_page_news_description_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('news_page_news_description_color')->color_code]); ?>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!--End News Setting Tab-->

												<!--Video Setting Tab-->
												<div role="tabpanel" class="tab-pane" id="video_setting_tab">
													<div class="row mb-4">
														<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">
															<div class="form-group">
																<?php echo form_label('Video title background');?>
																<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'video_title_bg']); ?>
																<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('video_title_bg')->color_code]); ?>
															</div>
															
															<div class="form-group">
																<?php echo form_label('Video title color');?>
																<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'video_title_color']); ?>
																<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('video_title_color')->color_code]); ?>
															</div>
														</div>
													</div>
												</div>
												<!--End Video Setting Tab-->

												<!--Page Setting Tab-->
												<div role="tabpanel" class="tab-pane" id="page_setting_tab">
													<div class="row mb-4">
													
														<div class="col-xl-2 col-lg-2 col-md-3 col-lg-12 mb-2">
															<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
																<a class="nav-link active m-0" id="v-pills-page-general-tab" data-toggle="pill" href="#v-pills-page-general" role="tab" aria-controls="v-pills-page-general" aria-selected="true">General</a>
															
																<a class="nav-link m-0" id="v-pills-page-contact-tab" data-toggle="pill" href="#v-pills-page-contact" role="tab" aria-controls="v-pills-page-contact" aria-selected="true">Contact</a>
															</div>
														</div>
														
														<div class="col-xl-10 col-lg-10 col-md-9 col-lg-12">
															<div class="tab-content" id="v-pills-tabContent">
																<div class="tab-pane fade show active p-0" id="v-pills-page-general" role="tabpanel" aria-labelledby="v-pills-page-general-tab">
																	<div class="row">
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">
																			<div class="form-group">
																				<?php echo form_label('Page heading color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'page_heading_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('page_heading_color')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Page description color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'page_description_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('page_description_color')->color_code]); ?>
																			</div>
																		</div>
																	</div>
																</div>
																
																<div class="tab-pane fade show p-0" id="v-pills-page-contact" role="tabpanel" aria-labelledby="v-pills-page-contact-tab">
																	<div class="row">
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">
																			<div class="form-group">
																				<?php echo form_label('Contact page icon background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'contact_page_icon_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('contact_page_icon_bg')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Contact page icon color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'contact_page_icon_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('contact_page_icon_color')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Contact page link color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'contact_page_link_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('contact_page_link_color')->color_code]); ?>
																			</div>
																		</div>
																			
																		<div class="col-xl-5 col-lg-5 col-md-6 col-lg-12">
																			<div class="form-group">
																				<?php echo form_label('Contact page button background');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'contact_page_form_button_bg']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('contact_page_form_button_bg')->color_code]); ?>
																			</div>
																			
																			<div class="form-group">
																				<?php echo form_label('Contact page button color');?>
																				<?php echo form_input(['name'=>'section_class[]', 'type'=>'hidden', 'value'=>'contact_page_form_button_color']); ?>
																				<?php echo form_input(['name'=>'color_code[]', 'type'=>'color', 'class'=>'form-control', 'value'=>$controller->single_color_data('contact_page_form_button_color')->color_code]); ?>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													
													</div>
												</div>
												<!--End Page Setting Tab-->		
												
											</div>
										</div>
									</div>
									<!--End Setting Tab-->
								
									<div class="col-xl-12 col-lg-12 col-md-12 col-lg-12">	
										<?php echo form_submit(['class'=>'btn btn-primary', 'type'=>'submit', 'value'=>'Save']);?>	
										<a href="#" class="btn btn-danger" id="color_reset">Reset</a> 
										<?php //echo form_reset('', 'Reset', 'class="btn btn-danger", id="color_reset"');?>
									</div>
								</div>
								<?php echo form_close(); ?> 
								<!--End Add Setting-->						
							</div>
						</div>					
					</div>	
					<!--End Setting Page-->	
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
	
	
			
	<!--Color Reset Modal-->
	<div class="modal fade" id="color_reset_modal" tabindex="-1" role="dialog" aria-labelledby="reset_modal_label" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="reset_modal_label">Confirm Reset</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Do you want to reset?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" id="btn_reset" class="btn btn-outline-danger">Reset</button>
				</div>
			</div>
		</div>
	</div>
	<!--End Color Reset Modal-->
	
<!--Footer-->
<?php include('include/footer.php');?>
<!--End Footer-->	
	
	<!--Ajax Query-->
	<script>	
		var base_url = '<?php echo base_url();?>';
		$(function(){			
			//Reset Color
			$('#color_setting_form').on('click', '#color_reset', function(){
				$('#color_reset_modal').modal('show');
				$('#btn_reset').unbind().on('click', function(){
					$('#color_reset_modal').modal('hide');
					window.location.href= base_url+'ct_backend/reset_color_setting';
				});
			});		
			//End Reset Color
		});
	</script>
	<!--End Ajax Query-->	
</body>
</html>	