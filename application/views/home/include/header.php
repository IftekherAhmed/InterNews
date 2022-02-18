<?php	
	$site_title_f_p = $site_title->title;	
	$sub_title_f_p  = $site_title->sub_title;
	$site_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";	
	
	// It usually helpful for social sharing your site
	if(!isset($meta_tag_image)){
		$meta_tag_image = base_url()."assets/images/default/logo.png";
	}else{
		$meta_tag_image = base_url()."assets/images/news_featured_image/".$meta_tag_image;
	}
?>
<head>
    <title><?php echo $page_title;?> | <?php echo $site_title_f_p;?></title>	
	
	<!--Meta Tag-->
	<meta charset="utf-8">
	<meta name="copyright"              content="<?php echo htmlentities($site_footer->copyright); ?>"> 
	<meta name="description"            content="<?php echo htmlentities($meta_tag->description); ?>">
	<meta name="keywords"               content="<?php echo htmlentities($meta_tag->tags); ?>">	
	<meta name="DC.title"               content="<?php echo htmlentities($meta_tag->title); ?>">
	<meta property="og:type"            content="article" />
	<meta property="og:title"           content="<?php echo htmlentities($meta_tag->title); ?>" />
	<meta property="og:description"     content="<?php echo htmlentities($meta_tag->description); ?>" />
	<meta property="og:image"           content="<?php echo htmlentities($meta_tag_image); ?>">
	<meta property="og:url"             content="<?php echo $site_url;?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--End Meta Tag-->
	
    <!--Favicon-->
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/default/favicon.png" />  
    <!--End Favicon-->	
	
	<!--bootstrap css-->
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap alpha CSS-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-alpha.css" type="text/css"> 
    <!--Summernote css -->  	
    <link href="<?php echo base_url();?>assets/plugins/summernote/summernote-bs4.css" rel="stylesheet">
	<!--home css-->
    <link href="<?php echo base_url();?>assets/css/home.css" rel="stylesheet" type="text/css" />
	<!--animate css-->
    <link href="<?php echo base_url();?>assets/plugins/animate/css/animate.css" rel="stylesheet" type="text/css" />
	<!--Home grid css-->
    <link href="<?php echo base_url();?>assets/css/home-grid.css" rel="stylesheet" type="text/css" />
	<!--responsive css-->
    <link href="<?php echo base_url();?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<!--fontawesom css file -->
    <link href="<?php echo base_url();?>assets/plugins/fontawesome/css/all.css" rel="stylesheet" type="text/css" />	
	<!--jquery_ui css file -->
    <link href="<?php echo base_url();?>assets/plugins/jquery_ui/jquery-ui.css" rel="stylesheet" type="text/css" />		
    <link href="<?php echo base_url();?>assets/plugins/jquery_ui/jquery-ui-calendar.css" rel="stylesheet" type="text/css" />		
	<!--fakeloader css file -->
    <link href="<?php echo base_url();?>assets/plugins/fakeloader/css/fakeLoader.min.css" rel="stylesheet" type="text/css" />	
	<!--news-ticker css file -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/plugins/breaking-news-ticker/breaking-news-ticker.css">
	<!--OwlCarousel css file -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/plugins/OwlCarousel/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/plugins/OwlCarousel/owl.theme.default.min.css">
    <!-- lightGallery CSS -->
	<link href="<?php echo base_url();?>assets/plugins/lightGallery/css/lightgallery.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/lightGallery/css/custom-lightgallery.css" rel="stylesheet" type="text/css" />
    <!--Scroll up and down CSS-->
	<link href="<?php echo base_url();?>assets/plugins/scroll_up_down/scroll_up_down.css" rel="stylesheet" type="text/css" />
    <!--Toast CSS -->
	<link href="<?php echo base_url();?>assets/plugins/toast/css/jquery.toast.css" rel="stylesheet" type="text/css" />
	<!--Input CSS-->
	<style>
		<?php echo html_entity_decode($setting_data->css); ?>
	</style>
	<!--Input CSS-->	
	<!--Dynamic CSS-->	
	<?php include('dynamic_color.php');?>
	<!--Dynamic CSS-->	
</head>