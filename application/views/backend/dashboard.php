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
					<!--News Number-->
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-2">
						<div class="card widget-panel">
							<div class="card-body widget-panel-body widget-danger">
								<h1>
								<?php echo $total_pending_news; ?>
								</h1>
								<span class="fa fa-newspaper"></span>
								<p>Pending News</p>
							</div>    
							<div class="text-center widget-danger-footer"><?php echo anchor('ct_backend/news_list_page', 'Details', 'class="text-white" title="News"');?></div>   
						</div>					
					</div>
					<!--End News Number-->
				
					<!--Gallery Number-->
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-2">
						<div class="card widget-panel">
							<div class="card-body widget-panel-body widget-warning">
								<h1><?php echo $total_gallery;?></h1>
								<span class="fa fa-images"></span>
								<p>Gallery</p>
							</div>  
							<div class="text-center widget-warning-footer"><?php echo anchor('ct_backend/gallery_page', 'Details', 'class="text-white" title="News"');?></div>     
						</div>					
					</div>
					<!--End News Number-->
				
					<!--Moderator Number-->
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-2">
						<div class="card widget-panel">
							<div class="card-body widget-panel-body widget-primary">
								<h1><?php echo $total_moderator;?></h1>
								<span class="fa fa-user-edit"></span>
								<p>Moderator</p>
							</div>   
							<div class="text-center widget-primary-footer"><?php echo anchor('ct_backend/user_list_page', 'Details', 'class="text-white" title="News"');?></div>    
						</div>					
					</div>
					<!--End Moderator Number-->
				
					<!--Reporter Number-->
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-2">
						<div class="card widget-panel">
							<div class="card-body widget-panel-body widget-info">
								<h1><?php echo $total_reporter;?></h1>
								<span class="fa fa-user-tie"></span>
								<p>Reporter</p>
							</div> 
							<div class="text-center widget-info-footer"><?php echo anchor('ct_backend/user_list_page', 'Details', 'class="text-white" title="News"');?></div>      
						</div>					
					</div>
					<!--End Reporter Number-->					
				</div>
				<!--End Row-->
				
				<!--Row-->
				<div class="row">				
					<!--Draft-->	
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2">
						<!--Draft List-->
						<div class="card dashboard-draft-area" id="data_list_box">
							<div class="card-header"> 
								Draft list 
								<img src="<?php echo base_url()."assets/images/default/content_loader.gif"; ?>" alt="data loader" class="content_loader" id="content_loader" />
								<span class="float-right badge custom-badge-info"><?php echo $total_draft;?></span>
							</div>
							<div class="card-body" id="show_draft">	
							
							</div>    
						</div>
						<!--End Draft List-->
							
						<!--Add and Edit Draft-->
						<div class="card dashboard-chat-area" id="add_data_box">
							<div class="card-header" id="add_edit_data_post_header"> </div>
							<div class="card-body">								
								<?php echo form_open('', ['id'=>'draft_form', 'class'=>'custom-form-input custom-form-button']); ?> 
									<?php echo form_input(['name'=>'publisher_id', 'type'=>'hidden', 'value'=>$logged_user_id]); ?>
									<div class="form-group">
										<?php echo form_label('Title');?>	
										<?php echo form_input(['name'=>'title', 'class'=>'form-control', 'placeholder'=>'Title']); ?>
									</div>	
									
									<div class="form-group">
										<?php echo form_label('Description');?>	
										<?php echo form_textarea(['name'=>'description', 'class'=>'form-control', 'placeholder'=>'Description']); ?>
									</div>					
																
									<?php echo form_button('', 'Save', 'id="add_draft" class="btn btn-primary"');?>	
									<?php echo form_button('', 'Close', 'id="close_data" class="btn btn-danger"');?>								
								<?php echo form_close(); ?> 
							</div>    
						</div>			
						<!--End Add and Edit Draft-->				
					</div>
					<!--End Draft-->
						
					<!--News Report-->
					<!--Weekly News View Chart-->	
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
						<div class="card mb-2">
							<div class="card-header"> News Visited</div>
							<div class="card-body">		
								<?php if(!empty($last_week_data)):?>					
									<div class="chart-each" id="last_week_news_hit"></div>
								<?php else:?>
								<p>No news posted in last saven days!</p>
								<?php endif;?>	
								<?php $last_week_data = json_encode($last_week_data);?>						
							</div>    
						</div>  
					</div>  		
					<!--End Weekly News View Chart-->	
						
					<!--Site daily Report-->
					<!--Site visitor chart-->	
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="card mb-2">
							<div class="card-header"> Site Visited</div>
							<div class="card-body">	
								<?php if(!empty($show_site_visitor)):?>	
									<div class="chart-each" id="show_site_hit"></div>
								<?php else:?>
								<p>No visitor found!</p>
								<?php endif;?>	
								<?php $show_site_visitor = json_encode($show_site_visitor);?>						
							</div>    
						</div>  
					</div>  		
					<!--End Site visitor chart-->					
					 		
					<!--Calendar News-->	
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="card mb-2">
							<div class="card-header"> Monthly report</div>
							<div class="card-body">
								<div id="calendar_news_list"></div>							
							</div>    
						</div> 
					</div>
					<!--End Calendar News-->	
					<!--End News Report-->						
				</div>
				<!--End Row-->				
			</div>
			<!--End Second Content-->	
			
			<!--Add & Close Data Button-->
			<div class="add-data-area">
				<div class="add-data" id="add_data_btn">
					<a href="#" class="add"><span class="fa fa-plus"></span></a>
				</div>
				<div class="add-data" style="display:none;" id="close_data_btn">
					<a href="#" class="close"><span class="fa fa-times"></span></a>
				</div>
			</div>
			<!--End Add & Close Data Button-->		
			
			<!--Draft Delete Modal-->
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
			<!--End Draft Delete Modal-->
			
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
			//Reload Draft and Message After 5 Seconds
			setInterval(function(){
				show_draft(); 	
				$("#content_loader").toggle().fadeOut(4000);
			}, 10000);		
			
			//Show Draft
			show_draft();	
			function show_draft(){
				$.ajax({
					url: base_url+'ct_backend/show_draft',
					type: "POST",
					cache: false,
					success: function(data){
						$('#show_draft').html(data); 
					}
				});
			}
			//End Show Draft	
			
			//Draft form will be reset when clicked Draft close button
			$('#close_data, #close_data_btn').on('click', function(){
				$('#draft_form')[0].reset();
			});	
			
			//Add New Draft	
			$('#add_data_btn').on('click', function(){
				$('#add_edit_data_post_header').text('Add New Draft');
				$('#draft_form').attr('action', base_url+'ct_backend/add_draft/');
			});
			$('#add_draft').on('click', function(){	
				var url = $('#draft_form').attr('action');
				var data = $('#draft_form').serialize();
				var title = $('input[name=title]');
				var description = $('textarea[name=description]');
				var result = '';
				if(title.val()==''){
					title.addClass('form-control is-invalid');
				}else{
					title.removeClass('is-invalid');
					result ='1';
				}
				if(description.val()==''){
					description.addClass('form-control is-invalid');
				}else{
					description.removeClass('is-invalid');
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
								$('#draft_form')[0].reset();	
								$("#add_data_box").toggle(300);
								$("#data_list_box").toggle(300);
								$("#add_data_btn").fadeToggle(300);
								$("#close_data_btn").fadeToggle(300);						
								toast();
								function toast(){
									$.toast({
										text: 'Draft '+response.type+' successfully!', 		
										icon: 'success' 
									});
								}
								show_draft();	
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
			//End Add Draft
			
			//Edit Draft
			$('#show_draft').on('click', '.draft-edit', function(){			
				var id = $(this).attr('data_id');
				$("#add_data_box").toggle(300);
				$("#data_list_box").toggle(300);	
				$("#add_data_btn").fadeToggle(300);
				$("#close_data_btn").fadeToggle(300);	
				$('#add_edit_data_post_header').text('Edit Draft');
				$('#draft_form').attr('action', base_url+'ct_backend/edit_draft/' + id);
				$.ajax({
					type: 'ajax',
					method: 'get',
					url: base_url+'ct_backend/single_draft_data/'+id,
					async: false,
					dataType: 'json',
					success: function(data){
						$('input[name=title]').val(data.title);
						$('textarea[name=description]').val(data.description);
					},
					error: function(){					
						toast();
						function toast(){
							$.toast({
								text: 'Could not get draft data!', 		
								icon: 'warning'
							});
						}
					}
				});
			});
			//End Edit Draft	
			
			//Delete Draft
			$('#show_draft').on('click', '.draft-delete', function(){
				var id = $(this).attr('data_id');
				$('#delete_Modal').modal('show');
				$('#btn_delete').unbind().on('click', function(){
					$.ajax({
						type: 'ajax',
						method: 'get',
						async: false,
						url: base_url+'ct_backend/delete_draft/' +id,
						dataType: 'json',
						success: function(){
							$('#delete_Modal').modal('hide');						
							toast();
							function toast(){
								$.toast({
									text: 'Successfully deleted draft!', 		
									icon: 'success'
								});
							}
							show_draft();	
						},error: function(){				
							toast();
							function toast(){
								$.toast({
									text: 'Draft deleting unsuccessfull!', 		
									icon: 'error'
								});
							}
						}
					});
				});
			});
			//End Delete Draft	
			
			// Weekly News Hit counter
			if(<?php echo $last_week_data;?>.length){
				news_hit_chart_area();
				function news_hit_chart_area(){
					new Morris.Area({			
						element: 'last_week_news_hit',
						resize: true,		  
						data: <?php echo $last_week_data;?>,
						xkey: 'published',						
						xLabelAngle: 60,
						ykeys: ['hit'],
						labels: ['Hit', 'published'],
						lineColors: ['#5E7784'],
						lineWidth: ['1px'],
						hideHover: 'auto',
						fillOpacity: '0.6'
					});	
				}		
			}			
			// End Weekly News Hit counter
			
			// Site visitor counter
			if(<?php echo $show_site_visitor;?>.length){
				show_site_hit_chart_area();
				function show_site_hit_chart_area(){
					new Morris.Line({	
						element: 'show_site_hit',
						resize: true,		  
						data: <?php echo $show_site_visitor;?>,
						xkey: 'date',						
						xLabelAngle: 60,
						ykeys: ['total'],
						labels: ['View', 'date'],
						lineColors: ['#5E7784'],
						lineWidth: ['1px'],
						hideHover: 'auto',
						fillOpacity: '0.6'
					});	
				}		
			}			
			// End Site visitor counter
			
			//Monthly news report
			news_calendar();
			function news_calendar(){
				 var calendar = $('#calendar_news_list').fullCalendar({
					editable:true,            
					header: {
						right: 'prev,next today',
						center: 'title',
						left: 'month,basicWeek,basicDay'
					},
					navLinks: true, // can click day/week names to navigate views
					editable: true,
					eventLimit: true, // allow "more" link when too many events
					events: base_url+'ct_backend/calendar_news_list',
				});	
			}
			//End Monthly news report       
		});
	</script>
	<!--End Ajax Query-->
</body>
</html>