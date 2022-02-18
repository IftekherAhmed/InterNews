	<!--Tab news-->	
	<?php 
		if($setting_data->sidebar_recent_popular_post == 1){
	?>
	<div class="news-tab-area">						
		<ul class="nav nav-tabs news-tab-nav" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" href="#recent" role="tab" data-toggle="tab">Recent</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#popular" role="tab" data-toggle="tab">Popular</a>
			</li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content news-tab-container">
			<div role="tabpanel" class="tab-pane active" id="recent">
				<ul>
				<?php 
				$recent_news = $controller->recent_news_list();
				if($recent_news){
					foreach($recent_news as $recent_news_list){								
						if($recent_news_list->exclusive == 1){
							$exclusive = "[Exclusive]";
						}else{
							$exclusive = "";
						}	
						echo "<li>";
						echo "<img src='".base_url()."assets/images/news_featured_image/".$recent_news_list->image."' alt'".$recent_news_list->title."'/>";
						echo "<a href='".base_url()."news/{$recent_news_list->slug}"."'>".word_limiter($recent_news_list->title, 7). $exclusive."</a>";
						echo "</li>";
					}
				}
				?>
				</ul>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="popular">
				<ul>
				<?php 	
					$popular_news = $controller->popular_news();								
					if($popular_news){
						foreach($popular_news as $popular_news_row){								
							if($popular_news_row->exclusive == 1){
								$exclusive = "[Exclusive]";
							}else{
								$exclusive = "";
							}	
							echo "<li>";
							echo "<img src='".base_url()."assets/images/news_featured_image/".$popular_news_row->image."' alt'".$popular_news_row->title."'/>";
							echo "<a href='".base_url()."news/{$popular_news_row->slug}"."'>".word_limiter($popular_news_row->title, 7). $exclusive."</a>";
							echo "</li>";
						}
					}						
				?>	
				</ul>
			</div>
		</div>
	</div>	
	<?php 
		}
	?>
	<!--End Tab news-->	
	
	<!--Sidebar Notice-->	
	<?php 
		$sidebar_notice_list = $controller->notice_list(1, 0);								
		if(!empty($sidebar_notice_list)){
			foreach($sidebar_notice_list as $sidebar_notice_list_row){
				if($sidebar_notice_list_row->sidebar == 1){
	?>
	<div class="notice-area">
		<div class="notice-container">			
			<?php 	
				echo "<p class='title'>".$sidebar_notice_list_row->title."</p>";
				echo "<hr />";
				echo "<p class='description'>".$sidebar_notice_list_row->notice."</p>";					
			?>	
			
		</div>
	</div>
	<?php 
				}
			}
		}	
	?>
	<!--End Sidebar Notice-->	
			
	<!--Sidebar First Ad-->
	<div class="sidebar-ad-area">
		<?php 	
			$sidebar_ad = $controller->sidebar_ad(1, 0);								
			if($sidebar_ad){
				foreach($sidebar_ad as $sidebar_ad_row){
					echo html_entity_decode($sidebar_ad_row->input);
				}
			}						
		?>	
	</div>	
	<!--End Sidebar First Ad-->	
	
	<!--Exclusive news-->	
	<?php 
		if($setting_data->sidebar_exclusive_post == 1){
	?>
	<div class="category-title-2">
		<h3>Exclusive</h3>
	</div>
	<div class="exclusive-news-area">
		<ul>
			<?php 
				$exclusive_news = $controller->exclusive_news_list();
				if($exclusive_news){
					foreach($exclusive_news as $exclusive_news_list){	
						echo "<li>";
						echo "<img src='".base_url()."assets/images/news_featured_image/".$exclusive_news_list->image."' alt'".$exclusive_news_list->title."'/>";
						echo "<a href='".base_url()."news/{$exclusive_news_list->slug}"."'>".word_limiter($exclusive_news_list->title, 7)."</a>";
						echo "</li>";
					}
				}
			?>
		</ul>
	</div>
	<?php 
		}
	?>
	<!--End Exclusive news-->	
	
	<!--Archive Search-->
	<?php 
		if($setting_data->sidebar_archive_search == 1){
	?>
	<div class="category-title-2">
		<h3>Archive</h3>
	</div>
	<div class="archive_calendar_area">
		<div class="archive_calendar_date_today">
			<div class="right">
			<?php
				echo date("Y");
			?>
			</div>
			<div class="left">
			<?php
				echo "<b>".date("l")."</b>";
				echo "<br />";
				echo date("F, dS");
			?>
			</div>
		</div>	
		<div id="datepicker" class="archive_calendar">				
		</div>
	</div>	
	<?php 
		}
	?>	
	<!--End Archive Search-->

	<!--Sidebar second Ad-->
	<div class="sidebar-ad-area">
		<?php 	
			$sidebar_ad = $controller->sidebar_ad(1, 1);								
			if($sidebar_ad){
				foreach($sidebar_ad as $sidebar_ad_row){
					echo html_entity_decode($sidebar_ad_row->input);
				}
			}						
		?>	
	</div>	
	<!--End Sidebar second Ad-->
	
	<!--Widget-->
	<?php 	
		$widget_list = $controller->widget_list();								
		if($widget_list){
			foreach($widget_list as $widget_list_row){
	?>	
	<?php 
		if(!empty($widget_list_row->title)){
	?>
	<div class="category-title-2">
		<h3><?php echo $widget_list_row->title;?></h3>
	</div>
	<?php 
		}
	?>
	<div class="widget">								
		<?php echo html_entity_decode($widget_list_row->input);?>
	</div>		
	<?php
			}
		}						
	?>	
	<!--End Widget-->
	
	<!--Poll-->
	<?php 	
		$poll_list = $controller->poll_list();								
		if($poll_list){
		foreach($poll_list as $poll_list_row){
	?>		
	<?php 
		if(!empty($poll_list_row->question)){
			$poll_options_list = $controller->poll_options_list($poll_list_row->id);
	?>
	<div class="poll-area">
		<div class="poll-each">
			<p class="question"><?php echo $poll_list_row->question;?></p>
			<?php 
				// Check whether user gave vote or not
				$poll_id_cookie = "poll_id_".$poll_list_row->id;
				$check_visitor = $this->input->cookie($poll_id_cookie, FALSE);
				if(!isset($check_visitor)){
			?>
			<div class="poll-form">
				<?php echo form_open("ct_home/add_vote"); ?> 
					<?php echo form_input(['name'=>'poll_id', 'type'=>'hidden', 'value'=>$poll_list_row->id]); ?>
					<?php
						$poll_options_list_form = $controller->poll_options_list($poll_list_row->id);
						if($poll_options_list){
							foreach($poll_options_list_form as $poll_options_list_form_row){
					?>						
					<div class="custom-control custom-radio">
						<input type="radio" class="custom-control-input radio" id="<?php echo $poll_options_list_form_row->option;?>" name="poll_option_id" value="<?php echo $poll_options_list_form_row->id;?>">
						<label class="custom-control-label" for="<?php echo $poll_options_list_form_row->option;?>">
							<?php echo $poll_options_list_form_row->option;?>
						</label>
					 </div>
					 <br />
					<?php
							}
						}
					?>							
					<input type="submit" name="vote" value="Vote" class="btn" />
				</form>
			</div>				
			<?php
				}else{
					if($poll_options_list){							
						// Count total vote of this poll
						$total_vote = 0;
						foreach($poll_options_list as $total_poll_options_row){
							$total_vote = $total_vote + $total_poll_options_row->vote;
						}							
						// Poll option looping
						foreach($poll_options_list as $poll_options_list_row){
							$poll_vote       = $poll_options_list_row->vote;								
							$percentage_vote = round(($poll_vote/$total_vote)*100,2);							
							//echo $total_vote;
							
							$progress_bar_class = '';
							if($percentage_vote >= 70){
								$progress_bar_class = 'bg-success';
							}else if($percentage_vote >= 50 && $percentage_vote < 70){
								$progress_bar_class = 'bg-info';
							}else if($percentage_vote >= 25 && $percentage_vote < 50){
								$progress_bar_class = 'bg-warning';
							}else{
								$progress_bar_class = 'bg-danger';
							}	
			?>
			<div class="poll-option">
				<p class="poll-option-content">
					<?php echo $poll_options_list_row->option;?>
				</p>	
				<div class="progress">
					<div class="progress-bar <?php echo $progress_bar_class;?>" role="progressbar" style="width: <?php echo $percentage_vote;?>%;" aria-valuenow="<?php echo $percentage_vote;?>" aria-valuemin="0" aria-valuemax="100">
						<?php echo $percentage_vote;?>%
					</div>
				</div>
			</div>
			<?php
						}
					}
				}
			?>					
		</div>
	</div>
	<?php 
		}
	?>		
	<?php
			}
		}						
	?>	
	<!--End Poll-->	