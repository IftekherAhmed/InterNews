<?php	
	//Main site title
	$site_title_f_p = $site_title->title;	
	//Sub site title
	$sub_title_f_p  = $site_title->sub_title;	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--title-->
    <title><?php echo $page_title; ?> | <?php echo $site_title_f_p; ?></title>
    <!--end title-->
	
	<!--Meta Tag-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--End Meta Tag-->
	
    <!--favicon-->
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/default/favicon.png" />  
    <!--End favicon-->	
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css" type="text/css">
    <!-- Bootstrap alpha CSS-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-alpha.css" type="text/css">
	<!--fontawesome-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/all.css" type="text/css" />
    <!-- custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/dashboard.css" type="text/css">
    <!--Toast CSS -->
	<link href="<?php echo base_url();?>assets/plugins/toast/css/jquery.toast.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<!--login page-->
	<div class="lr-area">			
		<div class="row">		
			<div class="p-5 col-xl-4 col-lg-4 col-md-8 col-sm-10 my-2 offset-xl-4 offset-lg-4 offset-md-2 offset-sm-1">
				<div class="mx-4">
					<div class="lr-heading">
						<h2><?php echo $site_title_f_p; ?></h2>
						<p><?php echo $sub_title_f_p; ?></p>
					</div>					
					<div class="lr custom-form-input custom-form-button">