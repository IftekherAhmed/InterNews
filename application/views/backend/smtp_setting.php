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
								<?php echo anchor('ct_backend/index', '<span class="fa fa-puzzle-piece"></span> Dashboard', 'title="Dashboard"');?> / SMTP Setting
							</div>
							<div class="card-body row p-4">															
								<!--Add Setting-->
								<?php echo form_open('', ['id'=>'setting_form', 'class'=>'col custom-form-input custom-form-button']); ?> 
								<div class="row">								
										<!--Setting Tab-->
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">							
										<div class="custom-tab">						
											<ul class="nav nav-tabs news-tab-nav" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" href="#smtp_setting_tab" role="tab" data-toggle="tab">
														<span class="fa fa-envelope"></span> SMTP
													</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" href="#template_setting_tab" role="tab" data-toggle="tab">
														<span class="fa fa-wrench"></span> Template
													</a>
												</li>												
											</ul>
											<!-- Tab panes -->
											<div class="tab-content news-tab-container">
												<div role="tabpanel" class="tab-pane active" id="smtp_setting_tab">
													<div class="row">	
														<div class="col-xl-4 col-lg-4 col-md-6 col-lg-12">
															<div class="row">
																<div class="col-xl-8 col-lg-8 col-md-12 col-lg-12 pl-0">
																	<div class="form-group">
																		<?php echo form_label('Email');?>
																		<?php echo form_error('sending_email', '<div class="text-danger">', '</div>');?>
																		<?php echo form_input(['name'=>'sending_email', 'class'=>'form-control', 'placeholder'=>'Email', 'value'=>$setting_data->sending_email]); ?>
																	</div>	
																</div>
																<div class="col-xl-4 col-lg-4 col-md-12 col-lg-12 p-0">
																	<div class="form-group">
																		<?php echo form_label('Name');?>
																		<?php echo form_error('sending_name', '<div class="text-danger">', '</div>');?>
																		<?php echo form_input(['name'=>'sending_name', 'class'=>'form-control', 'placeholder'=>'Name', 'value'=>$setting_data->sending_name]); ?>
																	</div>												
																</div>
															</div>
															
															<div class="form-group">
																<?php echo form_label('Password');?>
																<?php echo form_error('sending_email_password', '<div class="text-danger">', '</div>');?>
																<?php echo form_input(['name'=>'sending_email_password', 'class'=>'form-control', 'placeholder'=>'Password']); ?>
															</div>
															
															<div class="form-group">
																<?php echo form_label('Protocol');?>
																<?php echo form_error('protocol', '<div class="text-danger">', '</div>');?>
																<?php echo form_input(['name'=>'protocol', 'class'=>'form-control', 'placeholder'=>'Protocol', 'value'=>$setting_data->protocol]); ?>
															</div>	
															
															<div class="form-group">
																<?php echo form_label('SMTP Host');?>
																<?php echo form_error('smtp_host', '<div class="text-danger">', '</div>');?>
																<?php echo form_input(['name'=>'smtp_host', 'class'=>'form-control', 'placeholder'=>'SMTP Host', 'value'=>$setting_data->smtp_host]); ?>
															</div>	
															
															<div class="form-group">
																<?php echo form_label('SMTP Port');?>
																<?php echo form_error('smtp_port', '<div class="text-danger">', '</div>');?>
																<?php echo form_input(['name'=>'smtp_port', 'class'=>'form-control', 'placeholder'=>'SMTP Port', 'value'=>$setting_data->smtp_port]); ?>
															</div>
															
															<div class="form-group">
																<?php echo form_label('SMTP Timeout');?>
																<?php echo form_error('smtp_timeout', '<div class="text-danger">', '</div>');?>
																<?php echo form_input(['name'=>'smtp_timeout', 'class'=>'form-control', 'placeholder'=>'SMTP Timeout', 'value'=>$setting_data->smtp_timeout]); ?>
															</div>										
														</div>
													</div>
												</div>
												
												<div role="tabpanel" class="tab-pane fade" id="template_setting_tab">
													<div class="row">														
														<div class="col-xl-4 col-lg-4 col-md-6 col-lg-12">	
															<div class="form-group">
																<?php echo form_label('Mail Header');?>
																<?php echo form_error('sending_mail_header', '<div class="text-danger">', '</div>');?>
																<?php echo form_textarea(['name'=>'sending_mail_header', 'class'=>'form-control', 'placeholder'=>'Mail Header', 'value'=>$setting_data->sending_mail_header]); ?>
															</div>
															
															<div class="form-group">
																<?php echo form_label('Basic text');?>
																<?php echo form_error('mail_basic_text', '<div class="text-danger">', '</div>');?>
																<?php echo form_textarea(['name'=>'mail_basic_text', 'class'=>'form-control', 'placeholder'=>'Basic text', 'value'=>$setting_data->mail_basic_text]); ?>
															</div>	
															
															<div class="form-group">
																<?php echo form_label('Mail Footer');?>
																<?php echo form_error('sending_mail_footer', '<div class="text-danger">', '</div>');?>
																<?php echo form_textarea(['name'=>'sending_mail_footer', 'class'=>'form-control', 'placeholder'=>'Mail Footer', 'value'=>$setting_data->sending_mail_footer]); ?>
															</div>																					
														</div>	
														
														<div class="col-xl-8 col-lg-8 col-md-6 col-lg-12">		
															<!DOCTYPE html>
															<html>
															<head>
															<style>
															table{width: 600px;border: 1px solid aliceblue;overflow: hidden;margin: 0 auto;padding: 10px;}
															tr.header{}
															tr.header td{}
															tr.header img{width: 200px;display: block;margin: 0 auto;}
															tr.header hr{border: 1px solid aliceblue;}
															tr.message{}
															tr.message td{padding: 10px 10px;}
															tr.footer{background: #78BDF2;text-align: center;}
															tr.footer td{padding: 10px 0px;}
															tr.footer a{color: #fff;text-decoration: none;font-size: 20px;}
															</style>
															</head>
															<body>
															<table>
																<tr class="header">
																	<td>
																		<img src="http://localhost/project/InterNews/assets/images/default/logo.png" alt="logo" />
																		<hr />
																	</td>
																</tr>
																<tr class="message">
																	<td>
																		Hello
																	</td>
																</tr>
																<tr class="message">
																	<td>
																		Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
																	</td>
																</tr>
																<tr class="footer">
																	<td>
																		<a href="">InterNews</a>
																	</td>
																</tr>
															</table>
															</body>
															</html>														
														</div>					
													</div>
												</div>
												
											</div>
										</div>
									</div>
									<!--End Setting Tab-->								
									<div class="col-xl-12 col-lg-12 col-md-12 col-lg-12">	
										<?php echo form_button('', 'Save', 'id="edit_setting" class="btn btn-primary"');?>	
										<?php echo form_reset('', 'Reset', 'class="btn btn-danger"');?>
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
	
<!--Footer-->
<?php include('include/footer.php');?>
<!--End Footer-->
	<!--Ajax Query-->
	<script>	
		var base_url = '<?php echo base_url();?>';
		$(function(){			
			// Edit Setting
			var id = 1;
			$('#setting_form').attr('action', base_url+'ct_backend/edit_smtp_setting/' + id);
			$('#edit_setting').on('click', function(){	
				var url = $('#setting_form').attr('action');
				var data = $('#setting_form').serialize();
				var sending_email = $('input[name=sending_email]');
				var sending_name = $('input[name=sending_name]');
				var sending_email_password = $('input[name=sending_email_password]');
				
				var result = '';
				if(sending_email.val()==''){
					sending_email.addClass('form-control is-invalid');
				}else{
					sending_email.removeClass('is-invalid');
					result ='1';
				}
				if(sending_name.val()==''){
					sending_name.addClass('form-control is-invalid');
				}else{
					sending_name.removeClass('is-invalid');
					result +='2';
				}

				if(result =='12'){
					$.ajax({
						type: 'ajax',
						method: 'post',
						url: url,
						data: data,
						async: false,
						dataType: 'json',
						success: function(response){
							if(response.success){						
								toast();
								function toast(){
									$.toast({
										text: 'SMTP Setting '+response.type+' successfully!', 		
										icon: 'success' 
									});
								}
							}else{						
								toast();
								function toast(){
									$.toast({
										text: 'Operation unsuccessful!', 		
										icon: 'error' 
									});
								}
							}
						}					
					});
				}
			});
			//End Edit Setting		
		});
	</script>
	<!--End Ajax Query-->
</body>
</html>	