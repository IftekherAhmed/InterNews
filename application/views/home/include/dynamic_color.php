<?php echo "<style>"; ?>
/*********************/
/****** General ******/
/*********************/
/*Featured news*/
.slider div.description-area p.category {
    background: <?php echo $controller->single_color_data('featured_news_category_bg')->color_code; ?>;
}

.slider div.description-area p.category a {
	color: <?php echo $controller->single_color_data('featured_news_category_color')->color_code; ?>;
}

/*Thumbnail*/
.thumbnail div.description-area p.category {
    background: <?php echo $controller->single_color_data('thumbnail_news_category_bg')->color_code; ?>;
}

.thumbnail div.description-area p.category a {
	color: <?php echo $controller->single_color_data('thumbnail_news_category_color')->color_code; ?>;
}

/*Section title*/
.category-title,
.category-title-2 {
	border-bottom: 2px solid <?php echo $controller->single_color_data('section_title_bg')->color_code; ?>;
}

.category-title h3,
.category-title-2 h3 {
	background: <?php echo $controller->single_color_data('section_title_bg')->color_code; ?>;
	color: <?php echo $controller->single_color_data('section_title_color')->color_code; ?>;
}

.category-title h3::before,
.category-title-2 h3::before {
	background: <?php echo $controller->single_color_data('section_title_bg')->color_code; ?>;
	opacity: 0.8;
}

.category-title h3::after,
.category-title-2 h3::after {
	background: <?php echo $controller->single_color_data('section_title_bg')->color_code; ?>;
}

/*Pagination*/
.pagination-content li {
	border: 1px solid <?php echo $controller->single_color_data('pagination_item_color')->color_code; ?>;
	background: <?php echo $controller->single_color_data('pagination_item_bg')->color_code; ?>;
}

.pagination-content li:hover {
	background: <?php echo $controller->single_color_data('pagination_item_hover_bg')->color_code; ?>
}

.pagination-content li:hover a {
	color: <?php echo $controller->single_color_data('pagination_item_hover_color')->color_code; ?>;
}

.pagination-content li.active {
	background: <?php echo $controller->single_color_data('pagination_item_active_bg')->color_code; ?>;
}

.pagination-content li.active a.page-link {
	color: <?php echo $controller->single_color_data('pagination_item_active_color')->color_code; ?>;
}

.pagination-content a {
	color: <?php echo $controller->single_color_data('pagination_item_color')->color_code; ?>;
}

.pagination-content a:hover {
	color: <?php echo $controller->single_color_data('pagination_item_hover_color')->color_code; ?>;
}

/*Scrol up*/
#scrollup, #scrolldown {
	background: <?php echo $controller->single_color_data('scroll_up_bg')->color_code; ?>;
	color: <?php echo $controller->single_color_data('scroll_up_color')->color_code; ?>;
}

#scrollup:hover, #scrolldown:hover {
	background: <?php echo $controller->single_color_data('scroll_up_hover_bg')->color_code; ?>;
	color: <?php echo $controller->single_color_data('scroll_up_hover_color')->color_code; ?>;
}

/*User profile tab*/
.user-profile-tab-nav a.nav-link {
	background: <?php echo $controller->single_color_data('user_profile_tab_item_bg')->color_code; ?>;
	color: <?php echo $controller->single_color_data('user_profile_tab_item_color')->color_code; ?> !important;
}

.user-profile-tab-nav a.active {
	background: <?php echo $controller->single_color_data('user_profile_tab_item_active_bg')->color_code; ?> !important;
	color: <?php echo $controller->single_color_data('user_profile_tab_item_active_color')->color_code; ?> !important;
}

/*Notice*/
.notice-container {
	background: <?php echo $controller->single_color_data('notice_bg')->color_code; ?>;
}

.notice-container div.modal-body {
	border: 1px solid <?php echo $controller->single_color_data('notice_border')->color_code; ?>;
	color: <?php echo $controller->single_color_data('notice_color')->color_code; ?>;
}


/*********************/
/****** Header *******/
/*********************/
/*Header Bar*/
.header-address-bar {
	background: <?php echo $controller->single_color_data('header_bar_bg')->color_code; ?>;
	color: <?php echo $controller->single_color_data('header_bar_color')->color_code; ?>;
}

.header-address-bar div.left-bar p {	
	border-right: 1px solid <?php echo $controller->single_color_data('header_bar_color')->color_code; ?>;
	color: <?php echo $controller->single_color_data('header_bar_color')->color_code; ?>;
}

.header-address-bar div.right-bar p {
	border-right: 1px solid <?php echo $controller->single_color_data('header_bar_color')->color_code; ?>;
}

.header-address-bar div.right-bar a {
	color: <?php echo $controller->single_color_data('header_bar_color')->color_code; ?>;
}

/*Search*/
.search-form input[type=text] {
	border: 1px solid <?php echo $controller->single_color_data('search_bg')->color_code; ?>;
}

.search-form input.btn, .search-form button.btn {
	background: <?php echo $controller->single_color_data('search_bg')->color_code; ?>;
	color: <?php echo $controller->single_color_data('search_color')->color_code; ?>;
	border: 1px solid <?php echo $controller->single_color_data('search_bg')->color_code; ?>;
}

/*Menu*/
.menu-section {
	background: <?php echo $controller->single_color_data('menu_bg')->color_code; ?>;
	border: 1px solid <?php echo $controller->single_color_data('menu_item_active_bg')->color_code; ?>;
}

.menu-toggler {
	background: <?php echo $controller->single_color_data('menu_item_active_bg')->color_code; ?>;
	color: <?php echo $controller->single_color_data('menu_item_active_color')->color_code; ?>efe;
}

.menu-container a.nav-link {
	color: <?php echo $controller->single_color_data('menu_item_color')->color_code; ?>;
}

.menu-container a:hover,
.menu-container a:focus {
	background: <?php echo $controller->single_color_data('menu_item_hover_bg')->color_code; ?>;
	color: <?php echo $controller->single_color_data('menu_item_hover_color')->color_code; ?>;
}

.menu-container a.active {
	background: <?php echo $controller->single_color_data('menu_item_active_bg')->color_code; ?>;
	color: <?php echo $controller->single_color_data('menu_item_active_color')->color_code; ?>;
}

.menu-container a.active:hover {
	background: <?php echo $controller->single_color_data('menu_item_active_bg')->color_code; ?>;
}

.menu-container span#sub_menu_toggler {
	color: <?php echo $controller->single_color_data('menu_item_color')->color_code; ?>;
}

.menu-container a.menu-list-hide {
	color: <?php echo $controller->single_color_data('menu_item_color')->color_code; ?>;
	border-bottom: 1px dashed <?php echo $controller->single_color_data('menu_item_color')->color_code; ?>;
}


/*Sub menu*/
.dropdown-menu-container a.dropdown-item {
	background: <?php echo $controller->single_color_data('menu_sub_item_bg')->color_code; ?>;
	color: <?php echo $controller->single_color_data('menu_sub_item_color')->color_code; ?>;
}

.dropdown-menu-container a.dropdown-item:hover {
	background: <?php echo $controller->single_color_data('menu_sub_item_hover_bg')->color_code; ?>;
	color: <?php echo $controller->single_color_data('menu_sub_item_hover_color')->color_code; ?>;
}


/*********************/
/****** Footer *******/
/*********************/
/*Footer bar*/
.footer-bar-area {
	background: <?php echo $controller->single_color_data('footer_bar_bg')->color_code; ?>;	
}

.footer-bar-content {
	color: <?php echo $controller->single_color_data('footer_bar_color')->color_code; ?>;
}

.footer-bar-content a {
	color: <?php echo $controller->single_color_data('footer_bar_anchor_color')->color_code; ?>;
}

/*Footer*/
.footer-area {
	background: <?php echo $controller->single_color_data('footer_copyright_bg')->color_code; ?>;
}

.footer-copyright-area p {
	color: <?php echo $controller->single_color_data('footer_copyright_color')->color_code; ?>;
}


/*********************/
/****** Sidebar ******/
/*********************/
/*Tab*/
.news-tab-nav a {
	background: <?php echo $controller->single_color_data('side_bar_tab_item_bg')->color_code; ?>;
	color: <?php echo $controller->single_color_data('side_bar_tab_item_color')->color_code; ?> !important;
}

.news-tab-nav a.active {	
	background: <?php echo $controller->single_color_data('side_bar_tab_active_item_bg')->color_code; ?> !important;
	color: <?php echo $controller->single_color_data('side_bar_tab_active_item_color')->color_code; ?> !important;
}

/*Archive calendar*/ 
.archive_calendar_area{
  border: 1px solid <?php echo $controller->single_color_data('side_bar_archive_bg')->color_code; ?>;
}

.archive_calendar_date_today {
	background: <?php echo $controller->single_color_data('side_bar_archive_bg')->color_code; ?>;
	color: <?php echo $controller->single_color_data('side_bar_archive_color')->color_code; ?>;
}

.archive_calendar a.ui-state-default {
	background: transparent;
	border-color: rgba(0, 0, 0, 0.1);
	color: <?php echo $controller->single_color_data('side_bar_archive_bg')->color_code; ?>;
}

.archive_calendar a.ui-state-default:hover{
	background: <?php echo $controller->single_color_data('side_bar_archive_date_hover_bg')->color_code; ?>;
	border-color: <?php echo $controller->single_color_data('side_bar_archive_date_hover_color')->color_code; ?>;
	color: <?php echo $controller->single_color_data('side_bar_archive_date_hover_color')->color_code; ?>;
}

.archive_calendar a.ui-state-active{
	background: <?php echo $controller->single_color_data('side_bar_archive_date_active_bg')->color_code; ?>;
	color: <?php echo $controller->single_color_data('side_bar_archive_date_active_color')->color_code; ?>;
}

/*Poll*/
.poll-area {	
	border: 1px solid <?php echo $controller->single_color_data('side_bar_poll_bg')->color_code; ?>;
}

.poll-each p.question {	
	background: <?php echo $controller->single_color_data('side_bar_poll_bg')->color_code; ?>;
	color: <?php echo $controller->single_color_data('side_bar_poll_color')->color_code; ?>;
}

.poll-form input.radio:checked ~ label.custom-control-label::before {
	background-color: <?php echo $controller->single_color_data('side_bar_poll_option_color')->color_code; ?>;
}

.poll-form input.radio:active ~ label.custom-control-label::before {
	background-color: <?php echo $controller->single_color_data('side_bar_poll_option_color')->color_code; ?>;
}

.poll-form input.radio:focus ~ label.custom-control-label::before {
	box-shadow: 0 0 0 1px <?php echo $controller->single_color_data('side_bar_poll_option_color')->color_code; ?>, 0 0 0 0.2rem <?php echo $controller->single_color_data('side_bar_poll_option_color')->color_code; ?>;
}

.poll-form input.btn {	
	background: <?php echo $controller->single_color_data('side_bar_poll_button_bg')->color_code; ?>;
	color: <?php echo $controller->single_color_data('side_bar_poll_button_color')->color_code; ?>;
}


/*********************/
/******* News ********/
/*********************/
/*Sidebar*/
.news-tab-container a {
	color: <?php echo $controller->single_color_data('news_title_color')->color_code; ?>;
}

.exclusive-news-area a {
	color: <?php echo $controller->single_color_data('news_title_color')->color_code; ?>;
}

/*General*/
.home-news-item h3.card-title a {
	color: <?php echo $controller->single_color_data('news_title_color')->color_code; ?>;
}

.home-news-item div.card-text {
	color: <?php echo $controller->single_color_data('news_description_color')->color_code; ?>;
}

.home-news-item li a {	
	color: <?php echo $controller->single_color_data('news_title_color')->color_code; ?>;
}

/*Breaking news*/
.breaking-news-ticker{
	background: <?php echo $controller->single_color_data('breaking_news_bg')->color_code; ?>;
}

.bn-label{
  background-color: <?php echo $controller->single_color_data('breaking_news_heading_bg')->color_code; ?>;
  color: <?php echo $controller->single_color_data('breaking_news_heading_color')->color_code; ?>;
}

.bn-news ul li a{
  color: <?php echo $controller->single_color_data('breaking_news_item_color')->color_code; ?>;
}

/*Home page*/
/*13section*/
.home-news-item-lg{	
	background: <?php echo $controller->single_color_data('home_13_section_1_news_bg')->color_code; ?>;
}

.home-news-item-lg div.card-body h3.card-title a {	
	color: <?php echo $controller->single_color_data('home_13_section_1_news_title_color')->color_code; ?>;
}

.home-news-item-lg div.card-text {	
	color: <?php echo $controller->single_color_data('home_13_section_1_news_description_color')->color_code; ?>;
}

/*14section*/
.slide-news-content {
	background: <?php echo $controller->single_color_data('home_14_section_news_bg')->color_code; ?>;
}

.slide-news-title a {
	color: <?php echo $controller->single_color_data('home_14_section_news_title_color')->color_code; ?>;
}

/*Category page*/
.category-news-item-md{	
	background: <?php echo $controller->single_color_data('category_1_2_news_bg')->color_code; ?>;
}

.category-news-item-md div.card-body h3.card-title a {	
	color: <?php echo $controller->single_color_data('category_1_2_news_title_color')->color_code; ?>;
}

.category-news-item-md div.card-text {	
	color: <?php echo $controller->single_color_data('category_1_2_news_description_color')->color_code; ?>;
}

.category-news-item-lg{	
	background: <?php echo $controller->single_color_data('category_3_news_bg')->color_code; ?>;
}

.category-news-item-lg div.media-body h3.media-title a {	
	color: <?php echo $controller->single_color_data('category_3_news_news_title_color')->color_code; ?>;
}

.category-news-item-lg div.media-body div.news-description {
	color: <?php echo $controller->single_color_data('category_3_news_description_color')->color_code; ?>;
}

/*News page*/
/*Breadcrumb*/
.news-breadcrumb { 
	background: <?php echo $controller->single_color_data('news_breadcrumb_bg')->color_code; ?>;
}

.news-breadcrumb li a {
	background: <?php echo $controller->single_color_data('news_breadcrumb_1_list_bg')->color_code; ?>; 
	color: <?php echo $controller->single_color_data('news_breadcrumb_1_list_color')->color_code; ?>;
}

.news-breadcrumb li a:after { 
	border-left: 30px solid <?php echo $controller->single_color_data('news_breadcrumb_1_list_bg')->color_code; ?>;
}

.news-breadcrumb li:nth-child(2) a { 
	background: <?php echo $controller->single_color_data('news_breadcrumb_2_list_bg')->color_code; ?>; 
	color: <?php echo $controller->single_color_data('news_breadcrumb_2_list_color')->color_code; ?>;
}

.news-breadcrumb li:nth-child(2) a:after { 
	border-left-color: <?php echo $controller->single_color_data('news_breadcrumb_2_list_bg')->color_code; ?>; 
}

.news-breadcrumb li:last-child a {
	color: <?php echo $controller->single_color_data('news_breadcrumb_3_list_color')->color_code; ?>;
}

/*News page content*/
.news-content {	
	background: <?php echo $controller->single_color_data('news_page_bg')->color_code; ?>;
}	

.news-content-header {
	background: <?php echo $controller->single_color_data('news_page_heading_bg')->color_code; ?>;
	border-left: 5px solid <?php echo $controller->single_color_data('news_page_heading_border')->color_code; ?>;
}

.news-content-header h3.news-title {
	color: <?php echo $controller->single_color_data('news_page_news_title_color')->color_code; ?>;	
}

.news-content-header h4.news-sub-title {	
	color: <?php echo $controller->single_color_data('news_page_news_sub_title_color')->color_code; ?>;
}

.news-content-header div.news-information {	
	color: <?php echo $controller->single_color_data('news_page_news_information_color')->color_code; ?>;
}

.news-content-body div.news-description {
	color: <?php echo $controller->single_color_data('news_page_news_description_color')->color_code; ?>;
}


/*********************/
/******* Video *******/
/*********************/
.home-video-content p {
	background: <?php echo $controller->single_color_data('video_title_bg')->color_code; ?>;
	color: <?php echo $controller->single_color_data('video_title_color')->color_code; ?>;
}

.video-page-content p {
	background: <?php echo $controller->single_color_data('video_title_bg')->color_code; ?>;
	color: <?php echo $controller->single_color_data('video_title_color')->color_code; ?>;
}


/*********************/
/******* Page *******/
/*********************/
.page-content h3 {
	color: <?php echo $controller->single_color_data('page_heading_color')->color_code; ?>;
	border-bottom: 2px solid <?php echo $controller->single_color_data('page_heading_color')->color_code; ?>;
}

.page-desc p {
	color: <?php echo $controller->single_color_data('page_description_color')->color_code; ?>;
}

/*Contact Page*/
.contact-list span {
	background: <?php echo $controller->single_color_data('contact_page_icon_bg')->color_code; ?>;
	color: <?php echo $controller->single_color_data('contact_page_icon_color')->color_code; ?>;
}

.custom-form input, .custom-form textarea, .custom-form select {
	border: 1px solid <?php echo $controller->single_color_data('contact_page_form_button_bg')->color_code; ?>;
}

.custom-form input:focus, .custom-form textarea:focus {
	box-shadow: 0px 0px 2px 0px <?php echo $controller->single_color_data('contact_page_form_button_bg')->color_code; ?>;
	border: 1px solid <?php echo $controller->single_color_data('contact_page_form_button_bg')->color_code; ?>;
}

.custom-form .btn-primary {
	background: <?php echo $controller->single_color_data('contact_page_form_button_bg')->color_code; ?>;
	color: <?php echo $controller->single_color_data('contact_page_form_button_color')->color_code; ?>;
}

.custom-form .btn-primary:active {
	background: <?php echo $controller->single_color_data('contact_page_form_button_bg')->color_code; ?> !important;
}

.custom-form label {
	color: <?php echo $controller->single_color_data('contact_page_link_color')->color_code; ?>;
}

.page-desc a {
	color: <?php echo $controller->single_color_data('contact_page_link_color')->color_code; ?>;
}
<?php echo "</style>"; ?>