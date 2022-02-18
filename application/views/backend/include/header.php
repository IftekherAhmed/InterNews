<?php
	//Session user data
	$session_user           = $this->session->userdata();	
	$logged_user_id         = $session_user['id'];
	$logged_user_image      = $session_user['image'];
	$logged_user_first_name = $session_user['first_name'];	
	$logged_user_last_name  = $session_user['last_name'];	
	$logged_user_dob 		= $session_user['dob'];
	$logged_user_mobile 	= $session_user['mobile'];
	$logged_user_link 		= $session_user['link'];	
	$logged_user_email 		= $session_user['email'];
	$logged_user_gender 	= $session_user['gender'];
	$logged_user_position 	= $session_user['position'];	
	$logged_user_address 	= $session_user['address'];	
	$logged_user_password 	= $session_user['password'];
	$logged_user_joined 	= $session_user['joined'];	
	
	//Site title
	$site_title_f_p = $site_title->title;	
?>
<head>
    <!--Title-->
    <title><?php echo $page_title; ?> | <?php echo $site_title_f_p; ?></title>
    <!--end Title-->
	
	<!--Meta Tag-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--End Meta Tag-->
	
    <!--Favicon-->
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/default/favicon.png" />  
    <!--End Favicon-->	
	
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css" type="text/css">
    <!--Bootstrap alpha CSS-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-alpha.css" type="text/css">
    <!--Summernote css -->  
    <link href="<?php echo base_url();?>assets/plugins/summernote/summernote-bs4.css" rel="stylesheet">
	<!--Sidebar-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/sidebar.css" type="text/css">
    <!--Backend Grid CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/backend-grid.css" type="text/css">
    <!--Dashboard CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/dashboard.css" type="text/css">
    <!--Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css" type="text/css">
	<!--Fontawesome-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/all.css" type="text/css" />
    <!--Datatable CSS -->
	<link href='<?php echo base_url();?>assets/plugins/datatable/css/buttons.bootstrap4.min.css' rel='stylesheet' type='text/css'>
    <link href='<?php echo base_url();?>assets/plugins/datatable/css/dataTables.bootstrap4.min.css' rel='stylesheet' type='text/css'>
    <!--Preload CSS -->
	<link href="<?php echo base_url();?>assets/plugins/pace/pace.css" rel="stylesheet" type="text/css" />
    <!--Tags-input css -->  
	<link href="<?php echo base_url();?>assets/plugins/tags-input/jquery.tagsinput-revisited.min.css" rel="stylesheet" type="text/css" />
    <!--Morris Chart css -->  
	<link href="<?php echo base_url();?>assets/plugins/morris/css/morris.css" rel="stylesheet" type="text/css" />
    <!-- lightGallery CSS -->
	<link href="<?php echo base_url();?>assets/plugins/lightGallery/css/lightgallery.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/lightGallery/css/custom-lightgallery.css" rel="stylesheet" type="text/css" />
    <!--Scroll up and down CSS-->
	<link href="<?php echo base_url();?>assets/plugins/scroll_up_down/scroll_up_down.css" rel="stylesheet" type="text/css" />
    <!-- full calendar CSS -->
	<link href="<?php echo base_url();?>assets/plugins/fullcalendar/css/fullcalendar.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/fullcalendar/css/custom-fullcalendar.css" rel="stylesheet" type="text/css" />
    <!--Toast CSS -->
	<link href="<?php echo base_url();?>assets/plugins/toast/css/jquery.toast.css" rel="stylesheet" type="text/css" />
</head>