<?php defined('BASEPATH') OR exit('No direct script access allowed');

/****************************
	Controller Map
	1) Construct
	2) Timestamp 
	3) Dashboard
		3.1) Draft
	4) Category
	5) Message
	6) Notice
	7) Page
	8) News
	9) Gallery
	10) Video
	11) Ad
		11.1) Header Ad	
		11.2) Sidebar Ad	
		11.3) Body Ad	
	12) SEO
	13) Widget
	14) Poll
	15) User
	16) User Permission
	17) Sketch
	18) Setting
****************************/

class ct_backend extends CI_Controller {
	
	//User Access Permission Global variable
	public $logged_user_id;
	public $logged_user_type;
	public $add_permission;
	public $edit_permission;
	public $view_permission;
	public $delete_permission;
	public $category_permission;
	public $message_permission;
	public $notice_permission;
	public $page_permission;
	public $news_permission;
	public $gallery_permission;
	public $video_permission;
	public $advertisement_permission;
	public $seo_permission;
	public $widget_permission;
	public $poll_permission;
	public $user_permission;
	public $user_permission_page_permission;
	public $sketch_permission;
	public $setting_permission;
			
	// 1) Construct
	function __construct(){		
		parent::__construct();
		if ($this->session->userdata('email') != FALSE){	
			$this->load->model('md_backend', 'model');				
			$this->load->library('image_lib');
			
			//Default Time Zone
			$this->set_timezone();
			
			//User Permission Load
			$this->logged_user_id                     = $this->session->userdata('id');
			$this->logged_user_type                   = $this->session->userdata('position');
			$logged_user_id                           = $this->logged_user_id;
			$this->add_permission                     = $this->user_permission($logged_user_id)->add_data;			
			$this->edit_permission                    = $this->user_permission($logged_user_id)->edit_data;			
			$this->view_permission                    = $this->user_permission($logged_user_id)->view_data;			
			$this->delete_permission                  = $this->user_permission($logged_user_id)->delete_data;			
			$this->category_permission                = $this->user_permission($logged_user_id)->category;			
			$this->message_permission                 = $this->user_permission($logged_user_id)->message;			
			$this->notice_permission                  = $this->user_permission($logged_user_id)->notice;			
			$this->page_permission                    = $this->user_permission($logged_user_id)->page;			
			$this->news_permission                    = $this->user_permission($logged_user_id)->news;			
			$this->gallery_permission                 = $this->user_permission($logged_user_id)->gallery;			
			$this->video_permission                   = $this->user_permission($logged_user_id)->video;			
			$this->advertisement_permission           = $this->user_permission($logged_user_id)->advertisement;			
			$this->seo_permission                     = $this->user_permission($logged_user_id)->seo;			
			$this->widget_permission                  = $this->user_permission($logged_user_id)->widget;			
			$this->poll_permission                    = $this->user_permission($logged_user_id)->poll;			
			$this->user_permission                    = $this->user_permission($logged_user_id)->user;			
			$this->user_permission_page_permission    = $this->user_permission($logged_user_id)->user_permission;			
			$this->sketch_permission                  = $this->user_permission($logged_user_id)->sketch;			
			$this->setting_permission                 = $this->user_permission($logged_user_id)->setting;			
		}else { 
			$this->session->set_flashdata('error','You need to login first.');
			redirect('ct_login/index');
		}
	}

	// 2) Timestamp 
	public function timestamp($given_time){
		$given_time = strtotime($given_time);
        $current_time = time();
        if($current_time > $given_time){
            $different_time = $current_time - $given_time;

            $seconds = $different_time;
            $minutes = round($different_time / (60));
            $hours   = round($different_time / (60*60));
            $days    = round($different_time / (60*60*24));
            $weeks   = round($different_time / (60*60*24*7));
            $months  = round($different_time / (60*60*24*7*4.35));
            $years   = round($different_time / (60*60*24*30*12));
            $decades = round($different_time / (60*60*24*30*12*10));

            if($seconds <= 60){
				if($seconds <= 1){
					$time_ago = $seconds . "second ago.";
				}else if($seconds <= 59){
					$time_ago = $seconds . "seconds ago.";
				}else{}
                
            }else if($minutes <= 60){
				if($minutes <= 1){
					$time_ago = $minutes . " minute ago.";
				}else if($minutes <= 59){
					$time_ago = $minutes . " minutes ago.";
				}else{}
            }else if($hours <= 24){
				if($hours <= 1){
					$time_ago = $hours . " hour ago.";
				}else if($hours <= 59){
					$time_ago = $hours . " hours ago.";
				}else{}
            }else if($days <= 7){
				if($days <= 1){
					$time_ago = $days . " day ago.";
				}else if($days <= 59){
					$time_ago = $days . " days ago.";
				}else{}
            }else if($weeks <= 3){
				if($weeks <= 1){
					$time_ago = $weeks . " week ago.";
				}else if($weeks <= 3){
					$time_ago = $weeks . " weeks ago.";
				}else{}
            }else if($months <= 12){
				if($months <= 1){
					$time_ago = $months . " month ago.";
				}else if($months <= 59){
					$time_ago = $months . " months ago.";
				}else{}
            }else if($years <= 9){
				if($years <= 1){
					$time_ago = $years . " year ago.";
				}else{
					$time_ago = $years . " years ago.";
				}
            }else if($decades >= 10){
				if($decades <= 1){
					$time_ago = $decades . " decade ago.";
				}else{
					$time_ago = $decades . " decades ago.";
				}
            }else{}
            return $time_ago;
        }else{
            return "A few seconds ago.";
        }
	}
	
	// 3) Dashboard
	public function index(){
		$data = array();		
		$data['controller'] 	       = $this;	
		$data['site_title'] 	       = $this->model->site_title($site_title_id = 1);	
		$data['page_title']            = "Dashboard";
		$data['site_footer']           = $this->model->site_footer($site_footer_id = 1);
		$data['total_draft']           = $this->model->total_draft();
		$data['total_pending_news']    = $this->model->total_pending_news();
		$data['total_gallery']         = $this->model->total_gallery();
		$data['total_moderator']       = $this->model->total_moderator();
		$data['total_reporter']        = $this->model->total_reporter();		
		$data['last_week_data']        = $this->model->last_week_data();
		$data['show_site_visitor']     = $this->model->show_site_visitor();
		
		$cookie_name = "Site_visited_date_".date("Y-m-d");
		// It will count the hit of site
		$this->add_site_visitor($cookie_name);				
		$this->load->view('backend/dashboard', $data);
	}		
	
	// 3.1.1) Add Hit
	public function add_site_visitor($cookie_name){
		$check_visitor = $this->input->cookie($cookie_name, FALSE);		
		// visitor ip address
		$ip = $this->input->ip_address();
		if ($check_visitor == false) {
			setcookie($cookie_name, $ip, time() + 3600, "/"); // 1 hours (60*60*1)			
			$data = array();
			$data['ip'] = $ip;		
			$data['date'] = date("Y-m-d");			
			$this->model->add_site_visitor($data);
		}
	}
	
	// 3.2.1) Show Draft
	public function show_draft(){
		$result = $this->model->show_draft();	
		if(!empty($result)){
			foreach($result as $result_row){
				$id            = $result_row->id;
				$title         = $result_row->draft_title;
				$description   = $result_row->description;
				$publisher_id  = $result_row->publisher_id;
				$publisher     = $result_row->publisher_name;
				$published     = $result_row->draft_published;
				
				if($this->logged_user_id == $publisher_id || $this->logged_user_type == "Admin" || $this->logged_user_type == "Moderator"){	
					$html ='<div class="media dashboard-draft-each">
					<div class="media-body custom-form-button">
					<ul>
					<li class="dropdown">
					<a href="#" class="nav-link" data-toggle="dropdown">
					<span class="fa fa-ellipsis-h"></span>
					</a>
					<div class="dropdown-menu">
					<a href="javascript:;" class="dropdown-item draft-edit" data_id="'.$id.'" title="Edit"><span class="fa fa-pencil-alt"></span> Edit</a>
					<a href="javascript:;" class="dropdown-item draft-delete" data_id="'.$id.'" title="Delete"><span class="fa fa-trash"></span> Delete</a>
					</div>
					</li>
					</ul>
					<h6>'.$title.'</h6>
					<p>'.$description.'</p>
					<i>-'.nice_date($published, 'M j,y').'</i>
					<a href="user_view/'.$publisher_id.'"><span class="fa fa-user"></span> '.$publisher.'</a>
					</div>						
					</div>';	
				}else{
					$html ='<div class="media dashboard-draft-each">
					<div class="media-body custom-form-button">
					<h6>'.$title.'</h6>
					<p>'.$description.'</p>
					<i>-'.nice_date($published, 'M j,y').'</i>
					<a href="user_view/'.$publisher_id.'">'.$publisher.'</a>
					</div>						
					</div>';	
				}
				echo $html;
			}
		}else{
			echo "No data exist!";
		}
	}
	
	// 3.2.2) Single Draft Data
	public function single_draft_data($id){
		$result = $this->model->single_draft_data($id);
		echo json_encode($result);
	}
	
	// 3.2.3) Add Draft
	public function add_draft(){
		$data = $this->input->post();
		$result = $this->model->add_draft($data);			
		$notification['success'] = false;
		$notification['type'] = 'added';
		if($result){
			$notification['success'] = true;
		}
		echo json_encode($notification);		
	}
	
	// 3.2.4) Edit Draft
	public function edit_draft($id){
		$data = $this->input->post();
		$result = $this->model->edit_draft($id, $data);			
		$notification['success'] = false;
		$notification['type'] = 'updated';
		if($result){
			$notification['success'] = true;
		}
		echo json_encode($notification);		
	}
	
	// 3.2.5) Delete Draft
	public function delete_draft($id){
		$result = $this->model->delete_draft($id);
		echo json_encode($result);
	}
	
	// 3.3.1) Calendar news list
	public function calendar_news_list(){				
		$result = $this->model->show_news();
		if(!empty($result)){
			foreach($result as $result_row){				
				$data[] = array(
					'id'     => $result_row->id,
					'title'  => word_limiter($result_row->news_title, 5),
					'url'    => "news_view/{$result_row->slug}",
					'start'  => $result_row->news_published
				);	
			}			
			echo json_encode($data);
		}	
	}
	
	// 4.1) Category
	public function category_page(){
		if($this->category_permission == 1){
			$data = array();
			$data['controller']      = $this;
			$data['site_title']      = $this->model->site_title($site_title_id = 1);		
			$data['page_title']      = "Category";	
			$data['site_footer']     = $this->model->site_footer($site_footer_id = 1);			
			$data['category_list']   = $this->model->show_category();
			$data['total_category']  = $this->model->total_category();	
			$this->load->view('backend/category', $data);	
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access category');	
			redirect('ct_backend/index');		
		}		
	}
	
	// 4.2) Show Category
	public function show_category(){
		if($this->category_permission == 1){	
			$result = $this->model->show_category();		
			if(!empty($result)){
				foreach($result as $result_row){
					$id            = $result_row->id;
					$title         = $result_row->category_title;
					$parent_id     = $result_row->parent_id;				
					$parent_title  = $result_row->parent_title;	
					$publisher_id  = $result_row->publisher_id;	
					$publisher     = '<a href="user_view/'.$publisher_id.'">'.$result_row->publisher_name.'</a>';	
					$published     = nice_date($result_row->category_published, 'M j,y');					
					
					if($id == 1){
						$button_html   = '<a href="javascript:;" class="btn btn-info btn-sm category-edit" data_id="'.$id.'" title="Edit"><span class="fa fa-pencil-alt"></span></a>';
					}else{
						$button_html   = '<a href="javascript:;" class="btn btn-info btn-sm category-edit" data_id="'.$id.'" title="Edit"><span class="fa fa-pencil-alt"></span></a>
						<a href="javascript:;" class="btn btn-danger btn-sm category-delete" data_id="'.$id.'" title="Delete"><span class="fa fa-trash"></span></a>';
					}				
					
					$row = array($title, $parent_title, $publisher, $published, $button_html);
					$data[] = $row;	
				}		
				$output = array(
					"data" => $data
				);
				echo json_encode($output);	
			}else{					
				$output = "";
				echo json_encode($output);
			}	
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access category');	
			redirect('ct_backend/index');		
		}
	}
	
	// 4.3) Single Category Data
	public function single_category_data($id){	
		if($this->category_permission == 1){		
			$result = $this->model->single_category_data($id);
			echo json_encode($result);	
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access category');	
			redirect('ct_backend/index');		
		}
	}	
	
	// 4.4) Add Category
	public function add_category(){		
		if($this->category_permission == 1){
			if($this->add_permission == 1){
				$data = array();
				$data = $this->input->post();
				$parent_id   = $this->input->post('parent_id');
				
				if(!empty($parent_id)){
					$parent_name_query = $this->model->parent_category_name($parent_id);	
					$parent_title      = $parent_name_query->title;	
					$parent_type_set  = $this->model->parent_type_set($parent_id);	
					$type              = "Child";
				}else{
					$type         = "";
					$parent_title = "";	
				}
				
				$data = array(
				'title'        => $this->input->post('title'),
				'type'         => $type,
				'parent_id'    => $parent_id,
				'parent_title' => $parent_title,
				'publisher_id' => $data['publisher_id']
				);	
				
				$result = $this->model->add_category($data);			
				$notification['success'] = false;
				$notification['type'] = 'added';
				if($result){
					$notification['success'] = true;
				}
				echo json_encode($notification);	
			}else{	
				$this->session->set_flashdata('error','You are not permitted to add category');	
				redirect('ct_backend/index');		
			}				
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access category');	
			redirect('ct_backend/index');		
		}			
	}
	
	// 4.5) Edit Category
	public function edit_category($id){		
		if($this->category_permission == 1){	
			if($this->edit_permission == 1){			
				$parent_id   = $this->input->post('parent_id');
				if(!empty($parent_id)){
					$parent_type_set  = $this->model->parent_type_set($parent_id);	
					$type              = "Child";
					$parent_name_query = $this->model->parent_category_name($parent_id);	
					$parent_title      = $parent_name_query->title;	
				}else{
					$type         = "";
					$parent_title = "";	
				}	
				
				$data = array(
				'title'        => $this->input->post('title'),
				'parent_id'    => $parent_id,
				'parent_title' => $parent_title
				);		
				
				$result = $this->model->edit_category($id, $data);			
				$notification['success'] = false;
				$notification['type'] = 'updated';
				if($result){
					$notification['success'] = true;
				}
				echo json_encode($notification);
			}else{	
				$this->session->set_flashdata('error','You are not permitted to edit category');	
				redirect('ct_backend/index');		
			}	
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access category');	
			redirect('ct_backend/index');		
		}			
	}
	
	// 4.6) Delete Category
	public function delete_category($id){
		if($this->category_permission == 1){
			if($this->delete_permission == 1){
				$result = $this->model->delete_category($id);
				echo json_encode($result);	
			}else{	
				$this->session->set_flashdata('error','You are not permitted to delete category');	
				redirect('ct_backend/index');		
			}				
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access category');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 5.1) Show Message
	public function header_message_list(){
		$result = $this->model->show_message();		
		return $result;
	}
	
	// 5.2) Total message
	public function total_message(){
		$result = $this->model->total_message();
		return $result;
	}
	
	// 5.3) Total unseen message	
	public function total_unseen_message(){
		$result = $this->model->total_unseen_message();
		return $result;
	}
	
	// 5.4) Total send message
	public function total_send_message(){
		$result = $this->model->total_send_message();
		return $result;
	}
	
	// 5.5) Single message data
	public function single_message_data($id){	
		if($this->category_permission == 1){		
			$result = $this->model->single_message_data($id);
			echo json_encode($result);	
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access category');	
			redirect('ct_backend/index');		
		}
	}
	
	// 5.6) Message page
	public function message_page(){
		if($this->message_permission == 1){	
			$data = array();
			$data['controller']             = $this;
			$data['site_title']             = $this->model->site_title($site_title_id = 1);		
			$data['page_title']             = "Message";
			$data['total_message']          = $this->model->total_message();
			$data['total_unseen_message']   = $this->model->total_unseen_message();
			$data['total_send_message']     = $this->model->total_send_message();
			$data['smtp_setting_view']      = $this->model->smtp_setting_view($id = 1);		
			$data['site_footer']            = $this->model->site_footer($site_footer_id = 1);		
			$data['total_page']             = $this->model->total_page();		
			$this->load->view('backend/message', $data);
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access message');	
			redirect('ct_backend/index');		
		}	
	}	
	
	// 5.7) Show message
	public function show_message(){
		$result = $this->model->show_message();		
		if(!empty($result)){
			foreach($result as $result_row){
				$id            = $result_row->id;
				$from_email    = $result_row->from_email;
				$message       = $result_row->message;				
				$watched       = $result_row->watched;	
				$send_at       = $result_row->send_at;	
				
				if($watched == 0){
					$active_class = " mail-each-active";
					$image = '<img src="'.base_url().'assets/images/default/unseen_mail.png" class="float-left mr-2" width="50" height="50" alt="image">';
				}else{
					$active_class = "";
					$image = '<img src="'.base_url().'assets/images/default/seen_mail.png" class="float-left mr-2" width="50" height="50" alt="image">';
				}
				
				$html ='<div class="media mail-each'.$active_class.'">
					<div class="media-body">
						'.$image.'
						<a href="message_view/'.$id.'" title="">'.$from_email.'</a>						
						<div class="dropdown"><p class="mail-time">-'.nice_date($send_at, 'M j,y').'</p>			  
							<a href="javascript:;" class="reply-mail" data_id="'.$id.'" title="Reply"><span class="fa fa-reply"></span> Reply</a>
							<a href="javascript:;" class="text-danger message-delete" data_id="'.$id.'" title="Delete"><span class="fa fa-trash"></span> Delete</a>
						</div>
						<p>'.$message.'</p>											
					</div>
				</div>';			
				echo $html;
			}
		}else{
			echo "No data exist!";
		}
	}	
	
	// 5.8) Send mail
	public function send_mail(){	
		$to =  $this->input->post('to_email');  // User email pass here
		$subject = $this->input->post('subject');
		$smtp_setting = $this->model->smtp_setting_view($id = 1);	
			
		$from        = html_entity_decode($smtp_setting->sending_email); // Pass here your mail id
		$from_name   = html_entity_decode($smtp_setting->sending_name); // Pass here your name
		$basic_text  = html_entity_decode($smtp_setting->mail_basic_text); // Pass here your name

		$emailContent  = html_entity_decode($smtp_setting->sending_mail_header);
		$emailContent .= $basic_text."<br />";  //   Post message available here
		$emailContent .= html_entity_decode($this->input->post('message'));  //   Post message available here
		$emailContent .= html_entity_decode($smtp_setting->sending_mail_footer);
		
		$config['protocol']     = $smtp_setting->protocol;
		$config['smtp_host']    = $smtp_setting->smtp_host;
		$config['smtp_port']    = $smtp_setting->smtp_port;
		$config['smtp_timeout'] = $smtp_setting->smtp_timeout;

		$config['smtp_user']    = html_entity_decode($smtp_setting->sending_email);    //Important
		$config['smtp_pass']    = $this->encryption->decrypt($smtp_setting->sending_email_password);  //Important

		$config['charset']    = 'utf-8';
		$config['newline']    = "\r\n";
		$config['mailtype']   = 'html'; // or html
		$config['validation'] = TRUE; // bool whether to validate email or not 

		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->from($from, $from_name);
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($emailContent);
		//$this->email->send();
		if($this->email->send()) {
			$this->session->set_flashdata('success','Successfully sent message.');	
			$data = $this->input->post();
			unset($data['submit']);
			$result = $this->model->send_mail($data);			
			$notification['success'] = false;
			$notification['type'] = 'send';
			if($result){
				$notification['success'] = true;
			}
			echo json_encode($notification);	
		} else{
			show_error($this->email->print_debugger());
			$this->session->set_flashdata('error','Email sending faild.');	
		}
			
	}
	
	// 5.9) Reply mail
	public function reply_mail(){		
		$to =  $this->input->post('to_email');  // User email pass here
		$subject = $this->input->post('subject');
		$smtp_setting = $this->model->smtp_setting_view($id = 1);	
			
		$from      = html_entity_decode($smtp_setting->sending_email); // Pass here your mail id
		$from_name = html_entity_decode($smtp_setting->sending_name); // Pass here your name
		
		$emailContent = html_entity_decode($smtp_setting->sending_mail_header);
		$emailContent .= html_entity_decode($this->input->post('message'));  //   Post message available here
		$emailContent .= html_entity_decode($smtp_setting->sending_mail_footer);
		
		$config['protocol']     = $smtp_setting->protocol;
		$config['smtp_host']    = $smtp_setting->smtp_host;
		$config['smtp_port']    = $smtp_setting->smtp_port;
		$config['smtp_timeout'] = $smtp_setting->smtp_timeout;

		$config['smtp_user']    = html_entity_decode($smtp_setting->sending_email);    //Important
		$config['smtp_pass']    = $this->encryption->decrypt($smtp_setting->sending_email_password);  //Important

		$config['charset']    = 'utf-8';
		$config['newline']    = "\r\n";
		$config['mailtype'] = 'html'; // or html
		$config['validation'] = TRUE; // bool whether to validate email or not 

		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->from($from, $from_name);
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($emailContent);
		//$this->email->send();
		if($this->email->send()) {
			$this->session->set_flashdata('success','Successfully sent message.');	
			$data = $this->input->post();
			$result = $this->model->reply_mail($data);			
			$notification['success'] = false;
			$notification['type'] = 'updated';
			if($result){
				$notification['success'] = true;
			}
			echo json_encode($notification);	
		} else{
			show_error($this->email->print_debugger());
			$this->session->set_flashdata('error','Email sending faild.');	
		}		
				
	}	
	
	// 5.10) Message view
	public function message_view($id){
		$data = array();
		$data['controller'] = $this;	
		$data['site_title'] = $this->model->site_title($site_title_id = 1);		
		$data['site_footer']     = $this->model->site_footer($site_footer_id = 1);	
		$data['total_message'] = $this->model->total_message();			
		$data['total_unseen_message'] = $this->model->total_unseen_message();	
		$data['total_send_message']     = $this->model->total_send_message();
		$data['smtp_setting_view']   = $this->model->smtp_setting_view($smtp_setting_id = 1);		
		$data['message_data'] = $this->model->single_message_data($id);	
		
		if($data['message_data'] != FALSE){
			$data['message_watched'] = $this->model->message_watched($id);	
			$data['page_title'] = $data['message_data']->from_email;		
			$this->load->view('backend/message_view', $data);
		}else{
			//If the page does not exist
			show_error('Page Not Found!', '', 'An Error Was Encountered');
		}		
		
	}
	
	// 5.11) Send message page
	public function send_message_page(){
		if($this->message_permission == 1){	
			$data = array();
			$data['controller']             = $this;
			$data['site_title']             = $this->model->site_title($site_title_id = 1);		
			$data['page_title']             = "Send Message";
			$data['total_message']          = $this->model->total_message();
			$data['total_unseen_message']   = $this->model->total_unseen_message();
			$data['total_send_message']     = $this->model->total_send_message();
			$data['smtp_setting_view']   = $this->model->smtp_setting_view($id = 1);		
			$data['site_footer']            = $this->model->site_footer($site_footer_id = 1);		
			$data['total_page']             = $this->model->total_page();		
			$this->load->view('backend/send_message', $data);
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access message');	
			redirect('ct_backend/index');		
		}	
	}	
	
	// 5.11) Show send message
	public function show_send_message(){
		$result = $this->model->show_send_message();		
		if(!empty($result)){
			foreach($result as $result_row){
				$id            = $result_row->id;
				$parent_id     = $result_row->parent_id;
				$to_email      = $result_row->to_email;
				$message       = $result_row->message;				
				$watched       = $result_row->watched;	
				$send_at       = $result_row->send_at;	
				if($watched == 0){
					$active_class = " mail-each-active";
					$image = '<img src="'.base_url().'assets/images/default/seen_mail.png" class="float-left mr-2" width="50" height="50" alt="image">';
				}else{
					$active_class = "";
					$image = '<img src="'.base_url().'assets/images/default/seen_mail.png" class="float-left mr-2" width="50" height="50" alt="image">';
				}
				
				$html ='<div class="media mail-each'.$active_class.'">
					<div class="media-body">
						'.$image.'
						<a href="message_view/'.$id.'" title="">'.$to_email.'</a>						
						<div class="dropdown"><p class="mail-time">-'.nice_date($send_at, 'M j,y').'</p>	
							<a href="javascript:;" class="text-danger message-delete" data_id="'.$id.'" title="Delete"><span class="fa fa-trash"></span> Delete</a>
						</div>
						<p>'.$message.'</p>											
					</div>
				</div>';			
				echo $html;
			}
		}else{
			echo "No data exist!";
		}
	}		
	
	// 5.12) Delete Message
	public function delete_message($id){
		$result = $this->model->delete_message($id);
		echo json_encode($result);
	}	
	
	// 6.1) Notice
	public function notice_page(){	
		if($this->notice_permission == 1){
			$data = array();
			$data['controller']    			= $this;	
			$data['site_title']    			= $this->model->site_title($site_title_id = 1);	
			$data['page_title']    			= "Notice";
			$data['notice_media_list']      = $this->model->news_images_list_add_news_page();	
			$data['site_footer']   			= $this->model->site_footer($site_footer_id = 1);	
			$data['total_notice']  			= $this->model->total_notice();				
			$this->load->view('backend/notice', $data);	
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access notice');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 6.2) Show Notice
	public function show_notice(){	
		if($this->notice_permission == 1){
			$result = $this->model->show_notice();
			if(!empty($result)){
				foreach($result as $result_row){
					$id            = $result_row->id;
					$title         = html_entity_decode($result_row->title);
					$notice        = html_entity_decode($result_row->notice);
					$modal         = html_entity_decode($result_row->modal);
					$sidebar       = html_entity_decode($result_row->sidebar);
					$publisher_id  = $result_row->publisher_id;
					$publisher     = '<a href="user_view/'.$publisher_id.'">'.$result_row->publisher_name.'</a>';
					$published     = nice_date($result_row->ad_published, 'M j,y');	
					
					if($modal == 1){
						$modal = "<input type='checkbox' checked disabled />";
					}else{
						$modal = "<input type='checkbox' disabled />";						
					}
					
					if($sidebar == 1){
						$sidebar = "<input type='checkbox' checked disabled />";
					}else{
						$sidebar = "<input type='checkbox' disabled />";						
					}
					
					$button_html ='<a href="javascript:;" class="btn btn-info btn-sm notice-edit" data_id="'.$id.'" title="Edit"><span class="fa fa-pencil-alt"></span></a>
					<a href="javascript:;" class="btn btn-danger btn-sm notice-delete" data_id="'.$id.'" title="Delete"><span class="fa fa-trash"></span></a>';
					
					$row = array($title, $notice, $modal, $sidebar, $publisher, $published, $button_html);
					$data[] = $row;		
				}
				$output = array(
					"data" => $data
				);
				echo json_encode($output);	
			}else{					
				$output = "";
				echo json_encode($output);
			}			
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access notice');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 6.3) Single Notice Data
	public function single_notice_data($id){	
		if($this->notice_permission == 1){	
			$result = $this->model->single_notice_data($id);
			echo json_encode($result);
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access notice');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 6.4) Add Notice
	public function add_notice(){	
		if($this->notice_permission == 1){
			if($this->add_permission == 1){			
				$data = $this->input->post();
				$result = $this->model->add_notice($data);			
				$notification['success'] = false;
				$notification['type'] = 'added';
				
				if($result){
					$notification['success'] = true;
				}
				echo json_encode($notification);	
			}else{	
				$this->session->set_flashdata('error','You are not permitted to add notice');	
				redirect('ct_backend/index');		
			}		
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access notice');	
			redirect('ct_backend/index');		
		}		
	}
	
	// 6.5) Edit Notice
	public function edit_notice($id){	
		if($this->notice_permission == 1){
			if($this->edit_permission == 1){			
				$data = $this->input->post();
				
				if(!isset($data['modal'])){
					$data['modal'] = 0;
				}
				
				if(!isset($data['sidebar'])){
					$data['sidebar'] = 0;
				}			
				
				$result = $this->model->edit_notice($id, $data);			
				$notification['success'] = false;
				$notification['type'] = 'updated';
				
				if($result){
					$notification['success'] = true;
				}
				echo json_encode($notification);
			}else{	
				$this->session->set_flashdata('error','You are not permitted to edit notice');	
				redirect('ct_backend/index');		
			}			
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access notice');	
			redirect('ct_backend/index');		
		}		
	}
	
	// 6.6) Delete Sidebar Ad
	public function delete_notice($id){	
		if($this->notice_permission == 1){	
			if($this->delete_permission == 1){			
				$result = $this->model->delete_notice($id);
				echo json_encode($result);
			}else{	
				$this->session->set_flashdata('error','You are not permitted to delete notice');	
				redirect('ct_backend/index');		
			}	
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access notice');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 7.1) Page
	public function page_page(){
		if($this->page_permission == 1){	
			$data = array();
			$data['controller']		  = $this;
			$data['site_title']		  = $this->model->site_title($site_title_id = 1);		
			$data['page_title'] 	  = "Page";
			$data['page_media_list']  = $this->model->news_images_list_add_news_page();	
			$data['site_footer']      = $this->model->site_footer($site_footer_id = 1);		
			$data['total_page']  	  = $this->model->total_page();		
			$this->load->view('backend/page', $data);
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access page');	
			redirect('ct_backend/index');		
		}	
	}	
	
	// 7.2) Show page
	public function show_page(){
		if($this->page_permission == 1){	
			$result = $this->model->show_page();
			if(!empty($result)){
				foreach($result as $result_row){
					$id            = $result_row->id;
					$title         = $result_row->page_title;
					$description   = html_entity_decode(word_limiter($result_row->description, 10));			
					$publisher_id  = $result_row->publisher_id;		
					$publisher     = '<a href="user_view/'.$publisher_id.'">'.$result_row->publisher_name.'</a>';			
					$published     = nice_date($result_row->page_published, 'M j,y');				
					
					$button_html ='<a href="javascript:;" class="btn btn-info btn-sm page-edit" data_id="'.$id.'" title="Edit"><span class="fa fa-pencil-alt"></span></a>
					<a href="javascript:;" class="btn btn-danger btn-sm page-delete" data_id="'.$id.'" title="Delete"><span class="fa fa-trash"></span></a>';	
					
					$row = array($title, $description, $publisher, $published, $button_html);
					$data[] = $row;		
				}
				$output = array(
					"data" => $data
				);
				echo json_encode($output);	
			}else{					
				$output = "";
				echo json_encode($output);
			}		
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access page');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 7.3) Single page Data
	public function single_page_data($id){
		if($this->page_permission == 1){	
			$result = $this->model->single_page_data($id);
			echo json_encode($result);
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access page');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 7.4) Add page
	public function add_page(){		
		if($this->page_permission == 1){
			if($this->add_permission == 1){				
				$data = $this->input->post();
				$result = $this->model->add_page($data);			
				$notification['success'] = false;
				$notification['type'] = 'added';
				
				if($result){
					$notification['success'] = true;
				}
				echo json_encode($notification);
			}else{	
				$this->session->set_flashdata('error','You are not permitted to add page');	
				redirect('ct_backend/index');		
			}		
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access page');	
			redirect('ct_backend/index');		
		}		
	}
	
	// 7.5) Edit page
	public function edit_page($id){
		if($this->page_permission == 1){
			if($this->edit_permission == 1){				
				$data = $this->input->post();
				$result = $this->model->edit_page($id, $data);			
				$notification['success'] = false;
				$notification['type'] = 'updated';
				
				if($result){
					$notification['success'] = true;
				}
				echo json_encode($notification);	
			}else{	
				$this->session->set_flashdata('error','You are not permitted to edit page');	
				redirect('ct_backend/index');		
			}	
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access page');	
			redirect('ct_backend/index');		
		}		
	}
	
	// 7.6) Delete page
	public function delete_page($id){
		if($this->page_permission == 1){
			if($this->delete_permission == 1){
				$result = $this->model->delete_page($id);
				echo json_encode($result);
			}else{	
				$this->session->set_flashdata('error','You are not permitted to delete page');	
				redirect('ct_backend/index');		
			}
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access page');	
			redirect('ct_backend/index');		
		}	
	}	
	
	// 8.1) News
	public function news_list_page(){
		if($this->news_permission == 1){
			$data = array();
			$data['controller'] = $this;	
			$data['site_title'] = $this->model->site_title($site_title_id = 1);	
			$data['page_title'] = "News List";
			$data['site_footer']     = $this->model->site_footer($site_footer_id = 1);		
			$data['total_news']  = $this->model->total_news();		
			$this->load->view('backend/news_list', $data);
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access news');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 8.2) Show News
	public function show_news(){
		if($this->news_permission == 1){
			$result = $this->model->show_news();
			$data = array();
			if(!empty($result)){
				foreach($result as $result_row){
					$id                 = $result_row->id;				
					$title              = word_limiter($result_row->news_title, 5);
					$slug               = $result_row->slug;
					$exclusive          = $result_row->exclusive;
					$checkbox           = "<input type='checkbox' name='news_id[]' value='".$id."' class='checkbox_check_uncheck' />";
					
					$image              = '<a href="'.base_url()."assets/images/news_featured_image/".$result_row->image.'">
					<img class="img-thumbnail" src="'.base_url()."assets/images/news_featured_image/".$result_row->image.'" alt="news imag" width="100" />
					</a>';	
					
					$category_id        = $result_row->category_id;				
					$category_title     = $result_row->category_title;				
					$description        = word_limiter($result_row->description, 10);
					$tags               = $result_row->tags;
					$publisher_id       = $result_row->news_publisher_id;				
					$publisher_name     = '<a href="user_view/'.$publisher_id.'">'.$result_row->news_publisher_name.'</a>';				
					$status             = $result_row->news_status;				
					$published          = nice_date($result_row->news_published, 'M j,y');	

					if($status == 1){
						$status = '<a href="javascript:;" class="news-pending" data_id="'.$id.'" title="Pending">
							<input type="checkbox" checked />
						</a>';
					}else{
						$status = '<a href="javascript:;" class="news-approve" data_id="'.$id.'" title="Approve">
							<input type="checkbox" />
						</a>';
					}
					
					if($exclusive == 1){
						$title = word_limiter($result_row->news_title, 5)." [Exclusive]";
					}
					
					$button_html ='
					<a href="news_view/'.$slug.'" class="btn btn-primary btn-sm" title="View"><span class="fa fa-eye"></span></a>
					<a href="javascript:;" class="btn btn-info btn-sm news-quick-edit" data_id="'.$id.'" title="Quick edit"><span class="fa fa-pencil-ruler"></span></a>
					<a href="javascript:;" class="btn btn-dark btn-sm news-modal-view" data_id="'.$id.'" title="Quick view">Quick View</a>
					<a href="edit_news_page/'.$id.'" class="btn btn-warning btn-sm news-edit" data_id="'.$id.'" title="Edit"><span class="fa fa-pencil-alt"></span></a>
					<a href="javascript:;" class="btn btn-danger btn-sm news-delete" data_id="'.$id.'" title="Delete"><span class="fa fa-trash"></span></a>';
					
					$row = array($checkbox, $image, $title, $description, $publisher_name, $category_title, $status, $published, $button_html);
					$data[] = $row;				
				}					
				$output = array(
					"data" => $data
				);
				echo json_encode($output);					
			}else{					
				$output = "";
				echo json_encode($output);
			}	
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access news');	
			redirect('ct_backend/index');		
		}		
	}
	
	// 8.3) Single News Data
	public function single_news_data($id){
		if($this->news_permission == 1){	
			$result = $this->model->single_news_data($id);
			echo json_encode($result);
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access news');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 8.4) News View
	public function news_view($slug){
		if($this->news_permission == 1){
			$data = array();
			$data['controller'] = $this;	
			$data['site_title'] = $this->model->site_title($site_title_id = 1);
			$data['site_footer']     = $this->model->site_footer($site_footer_id = 1);	
			$data['news_data'] = $this->model->news_view($slug);	
			
			if($this->view_permission == 1){
				if($data['news_data'] != FALSE){
					// It will count the hit of each news
					$this->add_hit($slug);		
					$data['page_title'] = $data['news_data']->news_title;	
					$this->load->view('backend/news_view', $data);				
				}else{
					//If the page does not exist
					show_error('Page Not Found!', '', 'An Error Was Encountered');
				}	
			}else{	
				$this->session->set_flashdata('error','You are not permitted to view news');	
				redirect('ct_backend/index');		
			}		
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access news');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 8.5) Add Hit
	function add_hit($slug){
		$check_visitor = $this->input->cookie(urldecode($slug), FALSE);		
		// visitor ip address
		$ip = $this->input->ip_address();
		if ($check_visitor == false) {
			setcookie(urldecode($slug), $ip, time() + 3600, "/"); // 1 hour (60*60*1);
			$this->model->update_hit_count(urldecode($slug));
		}
	}
	
	// 8.6) Add News Page
	public function add_news_page(){
		if($this->news_permission == 1){
			if($this->add_permission == 1){	
				$data = array();
				$data['controller']       = $this;	
				$data['site_title']       = $this->model->site_title($site_title_id = 1);	
				$data['page_title']       = "Add News";	
				$data['site_footer']      = $this->model->site_footer($site_footer_id = 1);					
				$data['news_media_list']  = $this->model->news_images_list_add_news_page();			
				$data['category_list']    = $this->model->show_category();	
				$this->load->view('backend/add_news', $data);
			}else{	
				$this->session->set_flashdata('error','You are not permitted to add news');	
				redirect('ct_backend/index');		
			}		
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access news');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 8.7) Edit News Page
	public function edit_news_page($id){
		if($this->news_permission == 1){			
			$publisher_id = $this->model->single_news_data($id)->publisher_id;
			if($this->edit_permission == 1 || $this->logged_user_id == $publisher_id){			
				$data = array();
				$data['controller'] = $this;	
				$data['site_title'] = $this->model->site_title($site_title_id = 1);	
				$data['site_footer']     = $this->model->site_footer($site_footer_id = 1);		
				$data['target_news'] = $this->model->single_news_data($id);			
				
				if($data['target_news'] != FALSE){			
					$data['page_title'] = $data['target_news']->title;					
					$data['news_media_list']  = $this->model->news_images_list_add_news_page();				
					$data['category_list'] = $this->model->show_category();		
					$this->load->view('backend/edit_news', $data);
				}else{
					//If the page does not exist
					show_error('Page Not Found!', '', 'An Error Was Encountered');
				}	
			}else{	
				$this->session->set_flashdata('error','You are not permitted to edit news');	
				redirect('ct_backend/index');		
			}				
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access news');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 8.8) Add News
	public function add_news(){	
		if($this->news_permission == 1){
			if($this->add_permission == 1){
				$this->form_validation->set_rules('title', 'title', 'trim|required|min_length[8]');				
				$this->form_validation->set_rules('description', 'description', 'trim|required|min_length[6]');
				
				if ($this->form_validation->run() == FALSE){	
					$this->session->set_flashdata('error','Validation faild! Please fill correctly.');			
					$data = array();
					$data['controller'] = $this;	
					$data['site_title'] = $this->model->site_title($site_title_id = 1);	
					$data['page_title'] = "Add News";	
					$data['site_footer']     = $this->model->site_footer($site_footer_id = 1);			
					$data['category_list'] = $this->model->show_category();	
					$this->load->view('backend/add_news', $data);
				}else{
					$data = $this->input->post();	
					//$data['slug'] = url_title($data['title'], '_', true)."_".uniqid();	
					$data['slug'] = url_title(date('Y_m_d'), '_', true)."_".mt_rand(10, 99);
					
					if(!empty($data['video_link'])){
						$find_equal_on_video_link = '=';
						$video_string_position = strpos($data['video_link'], $find_equal_on_video_link);
						$data['video_link'] = substr($data['video_link'], $video_string_position+1);
					}else{
						$data['video_link'] = "";
					}
					
					if(empty($data['tags'])){							
						$seo_data = $this->model->single_seo_data($id = 1);	
						$data['tags'] = $seo_data->tags;
					}
									
					unset($data['submit']);
					
					if(!empty($_FILES['image']['name'])){
						$image = md5(uniqid(rand(), true));
						$config = array(
							'upload_path' => 'assets/images/news_featured_image',
							'allowed_types' => "gif|jpg|png|jpeg",
							'file_name' => $image
						);						
						$this->load->library('upload', $config);	
						$this->upload->initialize($config);			
						if($this->upload->do_upload('image')){
							$file_data      = $this->upload->data();
							$data['image']  = $file_data['file_name'];	
													
							//Watermark
							if($data['watermark'] == 1){
								$path = 'assets/images/news_featured_image/' . $data['image'];	
								$configwm['source_image'] = $path;
								$configwm['wm_overlay_path'] = 'assets/images/default/watermark.png';
								$configwm['wm_type'] = 'overlay';
								$configwm['wm_opacity'] = '100';
								$configwm['wm_vrt_alignment'] = 'middle';
								$configwm['wm_hor_alignment'] = 'center';
								$this->image_lib->initialize($configwm);
								$this->image_lib->watermark();					
								unset($data['watermark']);
							}else{				
								unset($data['watermark']);								
							}						
							
						}
					}else{			
						unset($data['watermark']);	
						$data['image'] = "blank_news.png";
					}					
							
					$publisher_position = $data['publisher_position'];
					if($publisher_position == "Admin"){
						$data['status'] = 1;
					}else if($publisher_position == "Moderator"){
						$data['status'] = 1;						
					}else if($publisher_position == "Reporter"){
						$data['status'] = 0;	
					}else{
						$data['status'] = 0;							
					}
					unset($data['publisher_position']);	
					
					$result                   = $this->model->add_news($data);			
					$notification['success']  = false;
					$notification['type']     = 'added';
					if($result){
						$notification['success'] = true;
					}					
					$this->session->set_flashdata('success','Successfullly added news.');					
					redirect("ct_backend/add_news_extra_images_page/$result");						
				}
			}else{	
				$this->session->set_flashdata('error','You are not permitted to add news');	
				redirect('ct_backend/index');		
			}		
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access news');	
			redirect('ct_backend/index');		
		}		
	}
	
	// 8.9) Approve News
	public function set_news_approve($id){
		if($this->news_permission == 1){
			$publisher_id = $this->model->single_news_data($id)->publisher_id;
			if($this->edit_permission == 1 || $this->logged_user_id == $publisher_id){			
				$data['status'] = 1;
				$result = $this->model->quick_edit_news($id, $data);			
				$notification['success'] = false;
				$notification['type'] = 'updated';
				
				if($result){
					$notification['success'] = true;
				}
				echo json_encode($notification);
			}else{	
				$this->session->set_flashdata('error','You are not permitted to approve news');	
				redirect('ct_backend/index');		
			}			
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access news');	
			redirect('ct_backend/index');		
		}		
	}
	
	// 8.10) Pending News
	public function set_news_pending($id){
		if($this->news_permission == 1){
			$publisher_id = $this->model->single_news_data($id)->publisher_id;
			if($this->edit_permission == 1 || $this->logged_user_id == $publisher_id){			
				$data['status'] = 0;
				$result = $this->model->quick_edit_news($id, $data);			
				$notification['success'] = false;
				$notification['type'] = 'updated';
				
				if($result){
					$notification['success'] = true;
				}
				echo json_encode($notification);
			}else{	
				$this->session->set_flashdata('error','You are not permitted to pending news');	
				redirect('ct_backend/index');		
			}			
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access news');	
			redirect('ct_backend/index');		
		}		
	}
	
	// 8.11) Quick Edit News
	public function quick_edit_news($id){
		if($this->news_permission == 1){
			$publisher_id = $this->model->single_news_data($id)->publisher_id;
			if($this->edit_permission == 1 || $this->logged_user_id == $publisher_id){			
				$data = $this->input->post();
				$result = $this->model->quick_edit_news($id, $data);			
				$notification['success'] = false;
				$notification['type'] = 'updated';
				
				if($result){
					$notification['success'] = true;
				}
				echo json_encode($notification);
			}else{	
				$this->session->set_flashdata('error','You are not permitted to edit news');	
				redirect('ct_backend/index');		
			}			
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access news');	
			redirect('ct_backend/index');		
		}		
	}
	
	// 8.12) Edit News
	public function edit_news($id){	
		if($this->news_permission == 1){
			$publisher_id = $this->model->single_news_data($id)->publisher_id;
			if($this->edit_permission == 1 || $this->logged_user_id == $publisher_id){	
				$this->form_validation->set_rules('title', 'title', 'trim|required|min_length[8]');
				$this->form_validation->set_rules('description', 'description', 'trim|required|min_length[6]');
				
				if ($this->form_validation->run() == FALSE){
					$data = array();
					$data['controller'] = $this;	
					$data['site_title'] = $this->model->site_title($site_title_id = 1);	
					$data['page_title'] = "Edit News";	
					$data['site_footer']     = $this->model->site_footer($site_footer_id = 1);					
					$data['category_list'] = $this->model->show_category();	
					$data['target_news'] = $this->model->single_news_data($id);	
					$this->load->view('backend/edit_news', $data);
				}else{	
					$data = $this->input->post();				
					$find_equal_on_video_link = '=';
					$video_string_position = strpos($data['video_link'], $find_equal_on_video_link);
					$data['video_link'] = substr($data['video_link'], $video_string_position+1);					
					
					if(empty($data['tags'])){							
						$seo_data = $this->model->single_seo_data($id = 1);	
						$data['tags'] = $seo_data->tags;
					}
						
					unset($data['submit']);
					
					if(!empty($_FILES['image']['name'])){
						$image_address = $this->model->single_news_data($id); 	
						$remove_image_address = $image_address->image;						
						if($remove_image_address != "blank_news.png"){
							@unlink('assets/images/news_featured_image/'.$remove_image_address);
						}			
						$image = md5(uniqid(rand(), true));
						$config = array(
							'upload_path' => 'assets/images/news_featured_image',
							'allowed_types' => "gif|jpg|png|jpeg",
							'file_name' => $image
						);	
						
						$this->load->library('upload', $config);
						$this->upload->initialize($config);			
						if($this->upload->do_upload('image')){
							$file_data      = $this->upload->data();
							$data['image']  = $file_data['file_name'];
							
							//Watermark
							if($data['watermark'] == 1){
								$path = 'assets/images/news_featured_image/' . $data['image'];	
								$configwm['source_image'] = $path;
								$configwm['wm_overlay_path'] = 'assets/images/default/watermark.png';
								$configwm['wm_type'] = 'overlay';
								$configwm['wm_opacity'] = '100';
								$configwm['wm_vrt_alignment'] = 'middle';
								$configwm['wm_hor_alignment'] = 'center';
								$this->image_lib->initialize($configwm);
								$this->image_lib->watermark();					
								unset($data['watermark']);
							}else{				
								unset($data['watermark']);								
							}
						}
						$result = $this->model->edit_news($id, $data);			
						$this->session->set_flashdata('success','Successfullly edited news.');
						redirect("ct_backend/news_list_page");	
					}else{				
						unset($data['watermark']);
						$result = $this->model->edit_news($id, $data);			
						$this->session->set_flashdata('success','Successfullly edited news.');
						redirect("ct_backend/news_list_page");		
					}	
				}			
			}else{	
				$this->session->set_flashdata('error','You are not permitted to edit news');	
				redirect('ct_backend/index');		
			}		
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access news');	
			redirect('ct_backend/index');		
		}		
	}
	
	// 8.13.1) Delete News
	public function delete_news($id){	
		if($this->news_permission == 1){
			$publisher_id = $this->model->single_news_data($id)->publisher_id;
			if($this->delete_permission == 1 || $this->logged_user_id == $publisher_id){				
				//Delete News's extra images
				$single_news_images_address = $this->model->single_news_images_list($id);
				
				if(!empty($single_news_images_address)){					
					foreach($single_news_images_address as $single_news_images_address_row){
						$remove_image_address = $single_news_images_address_row->image;
						if(isset($remove_image_address)){
							@unlink('assets/images/news_extra_image/'.$remove_image_address);		
							$result = $this->model->delete_news_extra_images_group($id);	
						}		
					}		
				}
				
				//Delete News's featured images
				$image_address = $this->model->single_news_data($id);				
				if(!empty($image_address)){					
					$remove_image_address = $image_address->image;
					if($remove_image_address != "blank_news.png"){
						@unlink('assets/images/news_featured_image/'.$remove_image_address);
					}
				}
				
				$result = $this->model->delete_news($id);
				echo json_encode($result);	
			}else{	
				$this->session->set_flashdata('error','You are not permitted to delete news');	
				redirect('ct_backend/index');		
			}	
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access news');	
			redirect('ct_backend/index');		
		}		
	}
	
	// 8.13.2) Delete Multiple News
	public function delete_multiple_news(){		
		if($this->news_permission == 1){
			if($this->delete_permission == 1){					
				$news_id = $this->input->post('news_id');				
				if($news_id > 0){
					//Delete News's extra images
					$multiple_news_images_address = $this->model->multiple_news_images_list($news_id);					
					if(!empty($multiple_news_images_address)){					
						foreach($multiple_news_images_address as $multiple_news_images_address_row){
							$remove_image_address = $multiple_news_images_address_row->image;
							if(isset($remove_image_address)){
								@unlink('assets/images/news_extra_image/'.$remove_image_address);		
								$result = $this->model->delete_multiple_news_extra_images($news_id);	
							}		
						}		
					}
					
					//Delete News's featured images
					$image_address = $this->model->multiple_news_data($news_id);				
					if(!empty($image_address)){						
						foreach($image_address as $multiple_news_image_address_row){
							$remove_image_address = $multiple_news_image_address_row->image;
							if(isset($remove_image_address)){
								@unlink('assets/images/news_featured_image/'.$remove_image_address);
							}		
						}
					}
					
					$result = $this->model->delete_multiple_news($news_id);				
					$this->session->set_flashdata('success','Successfully deleted news!');	
					redirect('ct_backend/news_list_page');		
				}else{
					$this->session->set_flashdata('error','please select news!');	
					redirect('ct_backend/news_list_page');	
				}
			}else{	
				$this->session->set_flashdata('error','You are not permitted to delete news');	
				redirect('ct_backend/index');		
			}	
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access news');	
			redirect('ct_backend/index');		
		}
	}	
	
	// 8.14) Add News Images page
	public function add_news_extra_images_page($id){
		if($this->news_permission == 1){	
			if($this->add_permission == 1){			
				$data = array();
				$data['controller'] = $this;	
				$data['site_title'] = $this->model->site_title($site_title_id = 1);	
				$data['page_title'] = "Add News Images";	
				$data['site_footer']= $this->model->site_footer($site_footer_id = 1);	
				$data['news_id']    = $id;
				$this->load->view('backend/add_news_images', $data);			
			}else{	
				$this->session->set_flashdata('error','You are not permitted to add news');	
				redirect('ct_backend/index');		
			}		
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access news');	
			redirect('ct_backend/index');		
		}		
	}			
	
	// 8.15) News Additional Images
	public function news_additional_images_page(){
		if($this->news_permission == 1){	
			$data = array();
			$data['controller']					 = $this;
			$data['site_title']					 = $this->model->site_title($site_title_id = 1);		
			$data['page_title'] 				 = "News Additional Images";
			$data['site_footer']                 = $this->model->site_footer($site_footer_id = 1);		
			$data['total_news_addional_images']  = $this->model->total_news_addional_images();				
			$this->load->view('backend/news_additional_images_page', $data);
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access news additional images');	
			redirect('ct_backend/index');		
		}	
	}	
	
	// 8.16) News Images list
	public function show_news_images_list(){	
		if($this->news_permission == 1){	
			$result = $this->model->news_images_list();		
			if(!empty($result)){
				foreach($result as $result_row){
					$id            = $result_row->id;					
					$image         = '<a href="'.base_url()."assets/images/news_extra_image/".$result_row->news_extra_image.'">
					<img class="img-thumbnail" src="'.base_url()."assets/images/news_extra_image/".$result_row->news_extra_image.'" alt="news additional image" width="80" />
					</a>';	
					$checkbox      = "<input type='checkbox' name='images_id[]' value='".$id."' class='checkbox_check_uncheck' />";					
					$link          = base_url()."assets/images/news_extra_image/".$result_row->news_extra_image;			
					
					$link_anchore  = "<textarea id='bar".$result_row->id."'>".$link."</textarea>";
					$publisher_id  = $result_row->news_extra_images_publisher_id;
					$publisher     = '<a href="user_view/'.$publisher_id.'">'.$result_row->publisher_name.'</a></td>';
					$published     = nice_date($result_row->news_extra_images_published, 'M j,y');			
					
					$button_html ='	
					<a href="javascript:;" class="btn btn-info btn-sm clipboard_btn" title="link" data-clipboard-action="copy" data-clipboard-target="#bar'.$result_row->id.'"><span class="fa fa-copy"></span></a>
					<a href="javascript:;" class="btn btn-primary btn-sm news-image-view" data_id="'.$id.'" title="view"><span class="fa fa-eye"></span></a>
					<a href="javascript:;" class="btn btn-danger btn-sm news-image-delete" data_id="'.$id.'" title="Delete"><span class="fa fa-trash"></span></a>';	
					
					$row = array($checkbox, $image, $link_anchore, $publisher, $published, $button_html);
					$data[] = $row;		
				}			
				$output = array(
					"data" => $data
				);
				echo json_encode($output);	
			}else{				
				$output = "";
				echo json_encode($output);
			}
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access gallery');	
			redirect('ct_backend/index');		
		}
	}
	
	// 8.17) Single News Images list
	public function single_news_images_list($id){	
		if($this->news_permission == 1){
			$result = $this->model->single_news_images_list($id);	
			return $result;	
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access news');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 8.18) Add News Images
	public function add_news_extra_images(){
		if($this->news_permission == 1){
			if($this->add_permission == 1){
				$data = array();			
				$data = $this->input->post();			
				unset($data['submit']);		
				
				$count = count($this->input->post($_FILES['image']['name']));
				for($i=0; $i<=$count; $i++){
					if(!empty($_FILES['image']['name'][$i])){
						$_FILES['file']['name'] = $_FILES['image']['name'][$i];
						$_FILES['file']['type'] = $_FILES['image']['type'][$i];
						$_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
						$_FILES['file']['error'] = $_FILES['image']['error'][$i];
						$_FILES['file']['size'] = $_FILES['image']['size'][$i];
						
						$unique_image = md5(uniqid(rand(), true));
						$config = array(
							'upload_path' => 'assets/images/news_extra_image',
							'allowed_types' => "gif|jpg|png|jpeg",
							'file_name' => $unique_image
						);	
						
						$this->load->library('upload',$config); 
						$this->upload->initialize($config);	
						if($this->upload->do_upload('file')){
							$upload_data = $this->upload->data();
							$data['image'] = $upload_data['file_name'];					
							
							//Watermark
							if($data['watermark'] == 1){
								$path = 'assets/images/news_extra_image/' . $data['image'];		
								$configwm['source_image'] = $path;
								$configwm['wm_overlay_path'] = 'assets/images/default/watermark.png';
								$configwm['wm_type'] = 'overlay';
								$configwm['wm_opacity'] = '100';
								$configwm['wm_vrt_alignment'] = 'middle';
								$configwm['wm_hor_alignment'] = 'center';
								$this->image_lib->initialize($configwm);
								$this->image_lib->watermark();					
								unset($data['watermark']);
							}else{				
								unset($data['watermark']);								
							}
							
							$result = $this->model->add_news_extra_images($data);	
						}
						$this->session->set_flashdata('success','Successfullly added news images.');				
					}else{	
						$data = array();
						$data['controller'] = $this;	
						$data['site_title'] = $this->model->site_title($site_title_id = 1);	
						$data['page_title'] = "News List";
						$data['site_footer']     = $this->model->site_footer($site_footer_id = 1);		
						$data['total_news']  = $this->model->total_news();		
						
						if ($this->agent->is_referral()){
							redirect($this->agent->referrer());
						}else{
							$this->load->view('backend/news_list', $data);
						}						
					}
				}
				redirect("ct_backend/news_list_page");	
			}else{	
				$this->session->set_flashdata('error','You are not permitted to add news images');	
				redirect('ct_backend/index');		
			}		
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access news');	
			redirect('ct_backend/index');		
		}	
	}	
	
	// 8.19) Edit News Images page
	public function edit_news_extra_images_page($id){	
		if($this->news_permission == 1){
			$publisher_id = $this->model->single_news_data($id)->publisher_id;
			if($this->edit_permission == 1 || $this->logged_user_id == $publisher_id){						
				$data = array();
				$data['controller']      = $this;	
				$data['site_title']      = $this->model->site_title($site_title_id = 1);	
				$data['page_title']      = "Edit News Images";	
				$data['site_footer']     = $this->model->site_footer($site_footer_id = 1);	
				$data['news_id']         = $id;	
				$data['news_image_data'] = $this->model->single_news_images_list($id);	
				$this->load->view('backend/edit_news_images', $data);
			}else{	
				$this->session->set_flashdata('error','You are not permitted to edit news images');	
				redirect('ct_backend/index');		
			}	
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access news');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 8.20) Edit News Images
	public function edit_news_extra_images($id){
		if($this->news_permission == 1){
			$news_id      = $this->model->news_single_images_data($id)->news_id;
			$publisher_id = $this->model->single_news_data($news_id)->publisher_id;
			if($this->edit_permission == 1 || $this->logged_user_id == $publisher_id){			
				$data = $this->input->post();
				unset($data['submit']);		
				$news_image_data = $this->model->news_single_images_data($id);
				$result = $this->model->edit_news_extra_images($id, $data);	
				$this->session->set_flashdata('success','Successfullly added news caption.');
				
				if ($this->agent->is_referral()){
					redirect($this->agent->referrer());
				}else{
					redirect('ct_backend/index');		
				}	
			}else{	
				$this->session->set_flashdata('error','You are not permitted to edit news images');	
				redirect('ct_backend/index');		
			}		
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access news');	
			redirect('ct_backend/index');		
		}	
	}	
	
	// 8.21.1) Delete News Images
	public function delete_news_extra_images($id){	
		if($this->news_permission == 1){
			$publisher_id = $this->model->news_single_images_data($id)->publisher_id;
			if($this->delete_permission == 1 || $this->logged_user_id == $publisher_id){				
				$image_address = $this->model->news_single_images_data($id);
				$remove_image_address = $image_address->image;
				@unlink('assets/images/news_extra_image/'.$remove_image_address);		
				$result = $this->model->delete_news_extra_images($id);		
				echo json_encode($result);
			}else{	
				$this->session->set_flashdata('error','You are not permitted to delete news images');	
				redirect('ct_backend/index');		
			}	
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access news');	
			redirect('ct_backend/index');		
		}	
	}	
	
	// 8.21.2) Delete News Multiple Images
	public function delete_news_multiple_extra_images(){	
		if($this->news_permission == 1){
			if($this->delete_permission == 1){	
				$images_id = $this->input->post('images_id');
				if($images_id > 0){
					$image_address = $this->model->news_multiple_images_data($images_id);				
					if(!empty($image_address)){						
						foreach($image_address as $news_multiple_image_address_row){
							$remove_image_address = $news_multiple_image_address_row->image;
							if(isset($remove_image_address)){
								@unlink('assets/images/news_extra_image/'.$remove_image_address);	
								$result = $this->model->delete_news_multiple_extra_images($images_id);	
							}		
						}				
						$this->session->set_flashdata('success','Successfully deleted images!');	
						redirect('ct_backend/news_additional_images_page');	
					}					
				}else{
					$this->session->set_flashdata('error','please select images!');	
					redirect('ct_backend/news_additional_images_page');						
				}			
			}else{	
				$this->session->set_flashdata('error','You are not permitted to delete news images');	
				redirect('ct_backend/index');		
			}	
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access news');	
			redirect('ct_backend/index');		
		}	
	}
		
	// 9.1) Gallery
	public function gallery_page(){
		if($this->gallery_permission == 1){	
			$data = array();
			$data['controller'] = $this;
			$data['site_title'] = $this->model->site_title($site_title_id = 1);		
			$data['page_title'] = "Gallery";
			$data['site_footer']     = $this->model->site_footer($site_footer_id = 1);		
			$data['total_gallery']  = $this->model->total_gallery();				
			$this->load->view('backend/gallery', $data);
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access gallery');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 9.2) Show Gallery
	public function show_gallery(){
		if($this->gallery_permission == 1){	
			$result = $this->model->show_gallery();		
			if(!empty($result)){
				foreach($result as $result_row){
					$id            = $result_row->id;
					$caption       = $result_row->caption;					
					$image         = '<a href="'.base_url()."assets/images/gallery/".$result_row->gallery_image.'">
					<img class="img-thumbnail" src="'.base_url()."assets/images/gallery/".$result_row->gallery_image.'" alt="gallery imag" width="80" />
					</a>';					
					$publisher_id  = $result_row->gallery_publisher_id;
					$publisher     = '<a href="user_view/'.$publisher_id.'">'.$result_row->publisher_name.'</a></td>';
					$published     = nice_date($result_row->gallery_published, 'M j,y');			
					
					$button_html ='	
					<a href="javascript:;" class="btn btn-primary btn-sm gallery-view" data_id="'.$id.'" title="view"><span class="fa fa-eye"></span></a>
					<a href="javascript:;" class="btn btn-info btn-sm gallery-edit" data_id="'.$id.'" title="Edit"><span class="fa fa-pencil-alt"></span></a>
					<a href="javascript:;" class="btn btn-danger btn-sm gallery-delete" data_id="'.$id.'" title="Delete"><span class="fa fa-trash"></span></a>';	
					
					$row = array($image, $caption, $publisher, $published, $button_html);
					$data[] = $row;		
				}			
				$output = array(
					"data" => $data
				);
				echo json_encode($output);	
			}else{					
				$output = "";
				echo json_encode($output);	
			}
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access gallery');	
			redirect('ct_backend/index');		
		}			
	}
	
	// 9.3) Single Gallery Data
	public function single_gallery_data($id){
		if($this->gallery_permission == 1){	
			$result = $this->model->single_gallery_data($id);
			echo json_encode($result);
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access gallery');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 9.4) Add Gallery
	public function add_gallery(){
		if($this->gallery_permission == 1){	
			if($this->add_permission == 1){			
				$this->form_validation->set_rules('caption', 'caption', 'trim|required|min_length[5]');			
				if ($this->form_validation->run() == FALSE){	
					$this->session->set_flashdata('error','Validation faild! Please fill correctly.');	
					redirect("ct_backend/gallery_page");	
				}else{		
					$data = $this->input->post();
					
					if(!empty($_FILES['image']['name'])){
						$image = md5(uniqid(rand(), true));
						$config = array(
							'upload_path' => 'assets/images/gallery',
							'allowed_types' => "gif|jpg|png|jpeg",
							'file_name' => $image
						);		
						
						$this->load->library('upload', $config);	
						$this->upload->initialize($config);			
						if($this->upload->do_upload('image')){
							$file_data      = $this->upload->data();
							$data['image']  = $file_data['file_name'];
							
							//Watermark
							if($data['watermark'] == 1){
								$path = 'assets/images/gallery/' . $data['image'];	
								$configwm['source_image'] = $path;
								$configwm['wm_overlay_path'] = 'assets/images/default/watermark.png';
								$configwm['wm_type'] = 'overlay';
								$configwm['wm_opacity'] = '100';
								$configwm['wm_vrt_alignment'] = 'middle';
								$configwm['wm_hor_alignment'] = 'center';
								$this->image_lib->initialize($configwm);
								$this->image_lib->watermark();						
								unset($data['watermark']);
							}else{				
								unset($data['watermark']);								
							}								
						}
						$result = $this->model->add_gallery($data);			
						$notification['success']  = false;
						$notification['type']     = 'added';
						if($result){
							$notification['success'] = true;
						}
						$this->session->set_flashdata('success','Successfullly added gallery.');
						redirect("ct_backend/gallery_page");	
					}else{	
						$this->session->set_flashdata('error','Faild to add gallery.');
						redirect("ct_backend/gallery_page");	
					}
				}
			}else{	
				$this->session->set_flashdata('error','You are not permitted to add gallery');	
				redirect('ct_backend/index');		
			}	
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access gallery');	
			redirect('ct_backend/index');		
		}	
	}

	// 9.5) Edit Gallery
	public function edit_gallery($id){	
		if($this->gallery_permission == 1){	
			if($this->edit_permission == 1){			
				$this->form_validation->set_rules('caption', 'caption', 'trim|required|min_length[5]');			
				if ($this->form_validation->run() == FALSE){	
					$this->session->set_flashdata('error','Validation faild! Please fill correctly.');				
					$data = array();
					$data['controller'] = $this;
					$data['site_title'] = $this->model->site_title($site_title_id = 1);		
					$data['page_title'] = "Gallery";
					$data['site_footer']     = $this->model->site_footer($site_footer_id = 1);			
					$this->load->view('backend/gallery', $data);
				}else{			
					$data = $this->input->post();					
					if(!empty($_FILES['image']['name'])){
						$image_address = $this->model->single_gallery_data($id); 	
						$remove_image_address = $image_address->image;
						@unlink('assets/images/gallery/'.$remove_image_address);		
						
						$image = md5(uniqid(rand(), true));
						$config = array(
							'upload_path' => 'assets/images/gallery',
							'allowed_types' => "gif|jpg|png|jpeg",
							'file_name' => $image
						);		
						
						$this->load->library('upload', $config);	
						$this->upload->initialize($config);					
						if($this->upload->do_upload('image')){
							$file_data      = $this->upload->data();
							$data['image']  = $file_data['file_name'];
														
							//Watermark
							if($data['watermark'] == 1){
								$path = 'assets/images/gallery/' . $data['image'];	
								$configwm['source_image'] = $path;
								$configwm['wm_overlay_path'] = 'assets/images/default/watermark.png';
								$configwm['wm_type'] = 'overlay';
								$configwm['wm_opacity'] = '100';
								$configwm['wm_vrt_alignment'] = 'middle';
								$configwm['wm_hor_alignment'] = 'center';
								$this->image_lib->initialize($configwm);
								$this->image_lib->watermark();						
								unset($data['watermark']);
							}else{				
								unset($data['watermark']);								
							}						
						}
						$result = $this->model->edit_gallery($id, $data);
						$this->session->set_flashdata('success','Successfullly edited gallery.');
						redirect("ct_backend/gallery_page");	
					}else{	
						$this->session->set_flashdata('error','Faild to updat gallery.');
						redirect("ct_backend/gallery_page");	
					}	
				}
			}else{	
				$this->session->set_flashdata('error','You are not permitted to edit gallery');	
				redirect('ct_backend/index');		
			}	
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access gallery');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 9.6) Delete Gallery
	public function delete_gallery($id){	
		if($this->gallery_permission == 1){	
			if($this->delete_permission == 1){			
				$image_address = $this->model->single_gallery_data($id);
				$remove_image_address = $image_address->image;
				@unlink('assets/images/gallery/'.$remove_image_address);		
				$result = $this->model->delete_gallery($id);
				echo json_encode($result);
			}else{	
				$this->session->set_flashdata('error','You are not permitted to delete gallery');	
				redirect('ct_backend/index');		
			}	
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access gallery');	
			redirect('ct_backend/index');		
		}	
	}	
	
	// 10.1) Video
	public function video_page(){
		if($this->video_permission == 1){	
			$data = array();
			$data['controller'] = $this;
			$data['site_title'] = $this->model->site_title($site_title_id = 1);		
			$data['page_title'] = "Video";
			$data['site_footer']     = $this->model->site_footer($site_footer_id = 1);		
			$data['total_video']  = $this->model->total_video();		
			$this->load->view('backend/video', $data);
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access video');	
			redirect('ct_backend/index');		
		}	
	}	
	
	// 10.2) Show Video
	public function show_video(){
		if($this->video_permission == 1){	
			$result = $this->model->show_video();
			if(!empty($result)){
				foreach($result as $result_row){
					$id            = $result_row->id;
					$link          = html_entity_decode($result_row->link);
					$publisher_id  = $result_row->publisher_id;
					$publisher     = '<a href="user_view/'.$publisher_id.'">'.$result_row->publisher_name.'</a>';
					$published     = nice_date($result_row->video_published, 'M j,y');	
					
					$link_html = '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$link.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
					
					$button_html ='<a href="javascript:;" class="btn btn-info btn-sm video-edit" data_id="'.$id.'" title="Edit"><span class="fa fa-pencil-alt"></span></a>
					<a href="javascript:;" class="btn btn-danger btn-sm video-delete" data_id="'.$id.'" title="Delete"><span class="fa fa-trash"></span></a>';							
					$row = array($link_html, $publisher, $published, $button_html);
					$data[] = $row;	
				}
				$output = array(
					"data" => $data
				);
				echo json_encode($output);	
			}else{				
				$output = "";
				echo json_encode($output);	
			}
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access video');	
			redirect('ct_backend/index');		
		}			
	}
	
	// 10.3) Single Video Data
	public function single_video_data($id){
		if($this->video_permission == 1){	
			$result = $this->model->single_video_data($id);
			echo json_encode($result);
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access video');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 10.4) Add Video
	public function add_video(){	
		if($this->video_permission == 1){
			if($this->add_permission == 1){			
				$data = $this->input->post();		
				$find_equal_on_video_link = '=';
				$video_string_position = strpos($data['link'], $find_equal_on_video_link);
				$data['link'] = substr($data['link'], $video_string_position+1);
				
				$result = $this->model->add_video($data);			
				$notification['success'] = false;
				$notification['type'] = 'added';
				
				if($result){
					$notification['success'] = true;
				}
				echo json_encode($notification);
			}else{	
				$this->session->set_flashdata('error','You are not permitted to add video');	
				redirect('ct_backend/index');		
			}				
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access video');	
			redirect('ct_backend/index');		
		}		
	}
	
	// 10.5) Edit Video
	public function edit_video($id){
		if($this->video_permission == 1){	
			if($this->edit_permission == 1){
				$data = $this->input->post();		
				$find_equal_on_video_link = '=';
				$video_string_position = strpos($data['link'], $find_equal_on_video_link);
				$data['link'] = substr($data['link'], $video_string_position+1);
				
				$result = $this->model->edit_video($id, $data);			
				$notification['success'] = false;
				$notification['type'] = 'updated';
				
				if($result){
					$notification['success'] = true;
				}
				echo json_encode($notification);
			}else{	
				$this->session->set_flashdata('error','You are not permitted to edit video');	
				redirect('ct_backend/index');		
			}			
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access video');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 10.6) Delete Video
	public function delete_video($id){
		if($this->video_permission == 1){
			if($this->delete_permission == 1){
				$result = $this->model->delete_video($id);
				echo json_encode($result);
			}else{	
				$this->session->set_flashdata('error','You are not permitted to delete video');	
				redirect('ct_backend/index');		
			}		
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access video');	
			redirect('ct_backend/index');		
		}	
	}	
	
	// 11.1) Ad
	public function ad_page(){	
		if($this->advertisement_permission == 1){	
			$data = array();
			$data['controller']   = $this;	
			$data['site_title']   = $this->model->site_title($site_title_id = 1);	
			$data['page_title']   = "Ad";
			$data['site_footer']  = $this->model->site_footer($site_footer_id = 1);	
			$data['total_ad']     = $this->model->total_ad();				
			$this->load->view('backend/advertisement', $data);
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access advertisement');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 11.2) Show Ad
	public function show_ad(){	
		if($this->advertisement_permission == 1){	
			$result = $this->model->show_ad();
			if(!empty($result)){
				foreach($result as $result_row){
					$id            = $result_row->id;
					$input         = html_entity_decode($result_row->input);
					$publisher_id  = $result_row->publisher_id;
					$type          = $result_row->type;
					$publisher     = '<a href="user_view/'.$publisher_id.'">'.$result_row->publisher_name.'</a>';		
					$status        = $result_row->status;	
					$published     = nice_date($result_row->published, 'M j,y');
					
					if($status == 1){
						$status = '<a href="javascript:;" class="ad-hide" data_id="'.$id.'" title="Hide">
							<input type="checkbox" checked />					
						</a>';
					}else{
						$status = '<a href="javascript:;" class="ad-show" data_id="'.$id.'" title="Show">
							<input type="checkbox" />
						</a>';
					}		
					
					$button_html ='<a href="javascript:;" class="btn btn-info btn-sm ad-edit" data_id="'.$id.'" title="Edit"><span class="fa fa-pencil-alt"></span></a>
					<a href="javascript:;" class="btn btn-danger btn-sm ad-delete" data_id="'.$id.'" title="Delete"><span class="fa fa-trash"></span></a>';	
					
					$row = array($input, $publisher, $type, $status, $published, $button_html);
					$data[] = $row;				
				}		
				$output = array(
					"data" => $data
				);
				echo json_encode($output);	
			}else{						
				$output = "";
				echo json_encode($output);	
			}		
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access advertisement');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 11.3) Single Ad Data
	public function single_ad_data($id){	
		if($this->advertisement_permission == 1){	
			$result = $this->model->single_ad_data($id);
			echo json_encode($result);
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access advertisement');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 11.4) Add Ad
	public function add_ad(){	
		if($this->advertisement_permission == 1){
			if($this->add_permission == 1){
				$data = $this->input->post();
				$data['status'] = 1;
				$result = $this->model->add_ad($data);			
				$notification['success'] = false;
				$notification['type'] = 'added';
				
				if($result){
					$notification['success'] = true;
				}
				echo json_encode($notification);
			}else{	
				$this->session->set_flashdata('error','You are not permitted to add advertisement');	
				redirect('ct_backend/index');		
			}		
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access advertisement');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 11.5) Edit Ad
	public function edit_ad($id){	
		if($this->advertisement_permission == 1){
			if($this->edit_permission == 1){
				$data = $this->input->post();
				$result = $this->model->edit_ad($id, $data);			
				$notification['success'] = false;
				$notification['type'] = 'updated';
				
				if($result){
					$notification['success'] = true;
				}
				echo json_encode($notification);			
			}else{	
				$this->session->set_flashdata('error','You are not permitted to edit advertisement');	
				redirect('ct_backend/index');		
			}							
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access advertisement');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 11.6) Delete Ad
	public function delete_ad($id){	
		if($this->advertisement_permission == 1){			
			if($this->delete_permission == 1){			
				$result = $this->model->delete_ad($id);
				echo json_encode($result);
			}else{	
				$this->session->set_flashdata('error','You are not permitted to delete advertisement');	
				redirect('ct_backend/index');		
			}	
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access advertisement');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 11.7) Set visible Ad
	public function set_ad_show($id){
		if($this->advertisement_permission == 1){
			$publisher_id = $this->model->single_ad_data($id)->publisher_id;
			if($this->edit_permission == 1 || $this->logged_user_id == $publisher_id){			
				$data['status'] = 1;
				$result = $this->model->edit_ad($id, $data);			
				$notification['success'] = false;
				$notification['type'] = 'updated';
				
				if($result){
					$notification['success'] = true;
				}
				echo json_encode($notification);
			}else{	
				$this->session->set_flashdata('error','You are not permitted to show ad');	
				redirect('ct_backend/index');		
			}			
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access ad');	
			redirect('ct_backend/index');		
		}		
	}
	
	// 11.8) Set hide Ad
	public function set_ad_hide($id){
		if($this->advertisement_permission == 1){
			$publisher_id = $this->model->single_ad_data($id)->publisher_id;
			if($this->edit_permission == 1 || $this->logged_user_id == $publisher_id){			
				$data['status'] = 0;
				$result = $this->model->edit_ad($id, $data);			
				$notification['success'] = false;
				$notification['type'] = 'updated';
				
				if($result){
					$notification['success'] = true;
				}
				echo json_encode($notification);
			}else{	
				$this->session->set_flashdata('error','You are not permitted to hide ad');	
				redirect('ct_backend/index');		
			}			
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access ad');	
			redirect('ct_backend/index');		
		}		
	}
		
	// 12.1) SEO
	public function seo_page(){
		if($this->seo_permission == 1){	
			$data = array();
			$data['controller'] = $this;	
			$data['site_title'] = $this->model->site_title($site_title_id = 1);	
			$data['page_title'] = "SEO";	
			$data['site_footer']     = $this->model->site_footer($site_footer_id = 1);		
			$data['seo_data'] = $this->model->single_seo_data($id = 1);	
			$this->load->view('backend/seo', $data);
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access SEO');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 12.2) Edit SEO
	public function edit_seo($id){
		if($this->seo_permission == 1){	
			if($this->edit_permission == 1){			
				$data = $this->input->post();
				$result = $this->model->edit_seo($id, $data);			
				$notification['success'] = false;
				$notification['type'] = 'updated';
				
				if($result){
					$notification['success'] = true;
				}
				echo json_encode($notification);
			}else{	
				$this->session->set_flashdata('error','You are not permitted to edit SEO');	
				redirect('ct_backend/index');		
			}			
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access SEO');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 13.1) Widget
	public function widget_page(){
		if($this->widget_permission == 1){
			$data = array();
			$data['controller'] = $this;
			$data['site_title'] = $this->model->site_title($site_title_id = 1);		
			$data['page_title'] = "Widget";
			$data['site_footer']     = $this->model->site_footer($site_footer_id = 1);	
			$data['total_widget']  = $this->model->total_widget();			
			$this->load->view('backend/widget', $data);	
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access widget');	
			redirect('ct_backend/index');		
		}	
	}	
	
	// 13.2) Show Widget
	public function show_widget(){
		if($this->widget_permission == 1){	
			$result = $this->model->show_widget();
			if(!empty($result)){
				foreach($result as $result_row){
					$id            = $result_row->id;
					$title         = $result_row->title;
					$input         = html_entity_decode($result_row->input);
					$publisher_id  = $result_row->publisher_id;
					$publisher     = '<a href="user_view/'.$publisher_id.'">'.$result_row->publisher_name.'</a>';
					$status        = $result_row->status;	
					$published     = nice_date($result_row->published, 'M j,y');
					
					if($status == 1){
						$status = '<a href="javascript:;" class="widget-hide" data_id="'.$id.'" title="Hide">
							<input type="checkbox" checked />					
						</a>';
					}else{
						$status = '<a href="javascript:;" class="widget-show" data_id="'.$id.'" title="Show">
							<input type="checkbox" />
						</a>';
					}	
					
					$button_html ='<a href="javascript:;" class="btn btn-info btn-sm widget-edit" data_id="'.$id.'" title="Edit"><span class="fa fa-pencil-alt"></span></a>
					<a href="javascript:;" class="btn btn-danger btn-sm widget-delete" data_id="'.$id.'" title="Delete"><span class="fa fa-trash"></span></a>';	
					
					$row = array($title, $input, $publisher, $status, $published, $button_html);
					$data[] = $row;	
				}		
				$output = array(
					"data" => $data
				);
				echo json_encode($output);	
			}else{					
				$output = "";
				echo json_encode($output);
			}
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access widget');	
			redirect('ct_backend/index');		
		}			
	}
	
	// 13.3) Single Widget Data
	public function single_widget_data($id){
		if($this->widget_permission == 1){	
			$result = $this->model->single_widget_data($id);
			echo json_encode($result);
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access widget');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 13.4) Add Widget
	public function add_widget(){	
		if($this->widget_permission == 1){	
			if($this->add_permission == 1){			
				$data = $this->input->post();
				$data['status'] = 1;
				$result = $this->model->add_widget($data);			
				$notification['success'] = false;
				$notification['type'] = 'added';
				
				if($result){
					$notification['success'] = true;
				}
				echo json_encode($notification);	
			}else{	
				$this->session->set_flashdata('error','You are not permitted to add widget');	
				redirect('ct_backend/index');		
			}		
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access widget');	
			redirect('ct_backend/index');		
		}		
	}
	
	// 13.5) Edit Widget
	public function edit_widget($id){
		if($this->widget_permission == 1){	
			if($this->edit_permission == 1){			
				$data = $this->input->post();
				$result = $this->model->edit_widget($id, $data);			
				$notification['success'] = false;
				$notification['type'] = 'updated';
				
				if($result){
					$notification['success'] = true;
				}
				echo json_encode($notification);	
			}else{	
				$this->session->set_flashdata('error','You are not permitted to edit widget');	
				redirect('ct_backend/index');		
			}	
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access widget');	
			redirect('ct_backend/index');		
		}		
	}
	
	// 13.6) Delete Widget
	public function delete_widget($id){
		if($this->widget_permission == 1){	
			if($this->delete_permission == 1){			
				$result = $this->model->delete_widget($id);
				echo json_encode($result);
			}else{	
				$this->session->set_flashdata('error','You are not permitted to delete widget');	
				redirect('ct_backend/index');		
			}	
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access widget');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 13.7) Set visible Widget
	public function set_widget_show($id){
		if($this->widget_permission == 1){
			$publisher_id = $this->model->single_widget_data($id)->publisher_id;
			if($this->edit_permission == 1 || $this->logged_user_id == $publisher_id){			
				$data['status'] = 1;
				$result = $this->model->edit_widget($id, $data);			
				$notification['success'] = false;
				$notification['type'] = 'updated';
				
				if($result){
					$notification['success'] = true;
				}
				echo json_encode($notification);
			}else{	
				$this->session->set_flashdata('error','You are not permitted to show widget');	
				redirect('ct_backend/index');		
			}			
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access widget');	
			redirect('ct_backend/index');		
		}		
	}
	
	// 13.8) Set hide Widget
	public function set_widget_hide($id){
		if($this->widget_permission == 1){
			$publisher_id = $this->model->single_widget_data($id)->publisher_id;
			if($this->edit_permission == 1 || $this->logged_user_id == $publisher_id){			
				$data['status'] = 0;
				$result = $this->model->edit_widget($id, $data);			
				$notification['success'] = false;
				$notification['type'] = 'updated';
				
				if($result){
					$notification['success'] = true;
				}
				echo json_encode($notification);
			}else{	
				$this->session->set_flashdata('error','You are not permitted to hide widget');	
				redirect('ct_backend/index');		
			}			
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access widget');	
			redirect('ct_backend/index');		
		}		
	}
	
	// 14.1) Poll
	public function poll_page(){
		if($this->poll_permission == 1){
			$data = array();
			$data['controller']   = $this;
			$data['site_title']   = $this->model->site_title($site_title_id = 1);		
			$data['page_title']   = "Poll";
			$data['site_footer']  = $this->model->site_footer($site_footer_id = 1);	
			$data['total_poll']   = $this->model->total_poll();			
			$this->load->view('backend/poll', $data);	
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access poll');	
			redirect('ct_backend/index');		
		}	
	}	
	
	//14.2) Show Poll
	public function show_poll(){
		if($this->poll_permission == 1){	
			$result = $this->model->show_poll();
			if(!empty($result)){
				foreach($result as $result_row){
					$id            = $result_row->id;
					$question      = $result_row->question;
					$publisher_id  = $result_row->publisher_id;
					$publisher     = '<a href="user_view/'.$publisher_id.'">'.$result_row->publisher_name.'</a>';
					$status        = $result_row->status;	
					$published     = nice_date($result_row->published, 'M j,y');
					
					if($status == 1){
						$status = '<a href="javascript:;" class="poll-hide" data_id="'.$id.'" title="Hide">
							<input type="checkbox" checked />					
						</a>';
					}else{
						$status = '<a href="javascript:;" class="poll-show" data_id="'.$id.'" title="Show">
							<input type="checkbox" />
						</a>';
					}					
					
					$button_html ='<a href="javascript:;" class="btn btn-info btn-sm poll-edit" data_id="'.$id.'" title="Edit"><span class="fa fa-pencil-alt"></span></a><a href="javascript:;" class="btn btn-dark btn-sm show-poll-options" data_id="'.$id.'" title="Options">Options</a>
					<a href="javascript:;" class="btn btn-danger btn-sm poll-delete" data_id="'.$id.'" title="Delete"><span class="fa fa-trash"></span></a>';
					
					$row = array($question, $publisher, $status, $published, $button_html);
					$data[] = $row;	
				}		
				$output = array(
					"data" => $data
				);
				echo json_encode($output);	
			}else{					
				$output = "";
				echo json_encode($output);
			}
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access poll');	
			redirect('ct_backend/index');		
		}			
	}
	
	//14.3) Single Poll Data
	public function single_poll_data($id){
		if($this->poll_permission == 1){	
			$result = $this->model->single_poll_data($id);
			echo json_encode($result);
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access poll');	
			redirect('ct_backend/index');		
		}	
	}
	
	//14.4) Add Poll
	public function add_poll(){	
		if($this->poll_permission == 1){	
			if($this->add_permission == 1){			
				$data = $this->input->post();
				$question = array('question'=>$data['question'], 'publisher_id'=>$data['publisher_id'], 'status'=>1);
				$poll_id = $this->model->add_poll($question);	
				
				$option = $data['option'];	
				$add_option_result = $this->model->add_poll_option($poll_id, $option);
				
				$notification['success'] = false;
				$notification['type'] = 'added';
				
				if($add_option_result){
					$notification['success'] = true;
				}
				echo json_encode($notification);	
			}else{	
				$this->session->set_flashdata('error','You are not permitted to add poll');	
				redirect('ct_backend/index');		
			}		
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access poll');	
			redirect('ct_backend/index');		
		}		
	}
	
	//14.5) Edit Poll
	public function edit_poll($id){
		if($this->poll_permission == 1){	
			if($this->edit_permission == 1){			
				$data = $this->input->post();
				unset($data['option']);
				$result = $this->model->edit_poll($id, $data);			
				$notification['success'] = false;
				$notification['type'] = 'updated';

				if($result){
					$notification['success'] = true;
				}
				echo json_encode($notification);	
			}else{	
				$this->session->set_flashdata('error','You are not permitted to edit poll');	
				redirect('ct_backend/index');		
			}	
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access poll');	
			redirect('ct_backend/index');		
		}		
	}
	
	//14.6) Delete Poll
	public function delete_poll($id){
		if($this->poll_permission == 1){	
			if($this->delete_permission == 1){			
				$result = $this->model->delete_poll($id);
				echo json_encode($result);
			}else{	
				$this->session->set_flashdata('error','You are not permitted to delete poll');	
				redirect('ct_backend/index');		
			}	
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access poll');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 14.7) Set visible Poll
	public function set_poll_show($id){
		if($this->poll_permission == 1){
			$publisher_id = $this->model->single_poll_data($id)->publisher_id;
			if($this->edit_permission == 1 || $this->logged_user_id == $publisher_id){			
				$data['status'] = 1;
				$result = $this->model->edit_poll($id, $data);			
				$notification['success'] = false;
				$notification['type'] = 'updated';
				
				if($result){
					$notification['success'] = true;
				}
				echo json_encode($notification);
			}else{	
				$this->session->set_flashdata('error','You are not permitted to show poll');	
				redirect('ct_backend/index');		
			}			
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access poll');	
			redirect('ct_backend/index');		
		}		
	}
	
	// 14.8) Set hide Poll
	public function set_poll_hide($id){
		if($this->poll_permission == 1){
			$publisher_id = $this->model->single_poll_data($id)->publisher_id;
			if($this->edit_permission == 1 || $this->logged_user_id == $publisher_id){			
				$data['status'] = 0;
				$result = $this->model->edit_poll($id, $data);			
				$notification['success'] = false;
				$notification['type'] = 'updated';
				
				if($result){
					$notification['success'] = true;
				}
				echo json_encode($notification);
			}else{	
				$this->session->set_flashdata('error','You are not permitted to hide poll');	
				redirect('ct_backend/index');		
			}			
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access poll');	
			redirect('ct_backend/index');		
		}		
	}
	
	//14.9) Show Poll Options
	public function show_poll_options($id){
		if($this->poll_permission == 1){	
			$result = $this->model->show_poll_options($id);
			if(!empty($result)){
				foreach($result as $result_row){
					$id            = $result_row->id;
					$options       = $result_row->option;
					$vote          = $result_row->vote;				
					
					$row = array($options, $vote);
					$data[] = $row;	
				}		
				$output = array(
					"data" => $data
				);
				echo json_encode($output);	
			}else{					
				$output = "";
				echo json_encode($output);
			}
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access poll');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 14.10) Poll Options Edit page
	public function poll_option_edit_page($id){
		if($this->poll_permission == 1){			
			$publisher_id = $this->model->single_poll_data($id)->publisher_id;
			if($this->edit_permission == 1 || $this->logged_user_id == $publisher_id){			
				$data = array();
				$data['controller']           = $this;	
				$data['site_title']           = $this->model->site_title($site_title_id = 1);	
				$data['site_footer']          = $this->model->site_footer($site_footer_id = 1);		
				$data['target_poll']          = $this->model->single_poll_data($id);		
				$data['target_poll_options']  = $this->model->single_poll_options($id);		
				
				if($data['target_poll'] != FALSE){			
					$data['page_title']       = $data['target_poll']->question;	
					$this->load->view('backend/edit_poll_option', $data);
				}else{
					//If the page does not exist
					show_error('Page Not Found!', '', 'An Error Was Encountered');
				}	
			}else{	
				$this->session->set_flashdata('error','You are not permitted to edit poll');	
				redirect('ct_backend/index');		
			}				
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access poll');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 14.11) Add Poll Options
	public function add_target_poll_option($poll_id){	
		if($this->poll_permission == 1){	
			if($this->add_permission == 1){				
				$data = $this->input->post();	
				$option = $data['option'];	
				$add_option_result = $this->model->add_poll_option($poll_id, $option);
				$this->session->set_flashdata('success','Successfullly added poll option.');
				
				if ($this->agent->is_referral()){
					redirect($this->agent->referrer());
				}else{
					$this->load->view('backend/news_list', $data);
				}	
			}else{	
				$this->session->set_flashdata('error','You are not permitted to add poll');	
				redirect('ct_backend/index');		
			}		
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access poll');	
			redirect('ct_backend/index');		
		}		
	}
	
	// 14.11) Poll Options Edit page
	public function poll_option_edit($id){
		if($this->poll_permission == 1){
			if($this->edit_permission == 1){			
				$data = $this->input->post();
				unset($data['submit']);		
				$result = $this->model->poll_option_edit($id, $data);	
				$this->session->set_flashdata('success','Successfullly edited poll option.');
				
				if ($this->agent->is_referral()){
					redirect($this->agent->referrer());
				}else{
					redirect('ct_backend/index');		
				}	
			}else{	
				$this->session->set_flashdata('error','You are not permitted to edit poll option');	
				redirect('ct_backend/index');		
			}		
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access poll');	
			redirect('ct_backend/index');		
		}	
	}
	
	//14.12) Delete Poll opt
	public function delete_poll_option($id){
		if($this->poll_permission == 1){	
			if($this->delete_permission == 1){			
				$result = $this->model->delete_poll_option($id);
				echo json_encode($result);
			}else{	
				$this->session->set_flashdata('error','You are not permitted to delete poll');	
				redirect('ct_backend/index');		
			}	
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access poll');	
			redirect('ct_backend/index');		
		}	
	}	
		
	// 15.1) User	
	public function user_list_page(){
		if($this->user_permission == 1){
			$data = array();
			$data['controller'] = $this;	
			$data['site_title'] = $this->model->site_title($site_title_id = 1);	
			$data['page_title'] = "User List";
			$data['site_footer']     = $this->model->site_footer($site_footer_id = 1);	
			$data['total_user']  = $this->model->total_user();			
			$this->load->view('backend/user_list', $data);	
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access user');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 15.2) Show User	
	public function show_user(){
		if($this->user_permission == 1){	
			$result = $this->model->show_user();		
			if(!empty($result)){
				foreach($result as $result_row){
					$id                   = $result_row->id;
					$name                 = $result_row->first_name." ".$result_row->last_name;
					
					$image                = '<a href="'.base_url()."assets/images/user/".$result_row->image.'">
					<img class="img-thumbnail" src="'.base_url()."assets/images/user/".$result_row->image.'" alt="user imag" width="80" />
					</a>';
					
					$email                = $result_row->email;
					$position             = $result_row->position;
					$referenced_by_id     = $result_row->referenced_by;
					$referenced_by_name   = $this->model->single_user_data($result_row->referenced_by)->first_name;
					$referenced_by        = '<a href="user_view/'.$referenced_by_id.'">'.$referenced_by_name.'</a>';
					$joined               = nice_date($result_row->joined, 'M j,y');		
					
					$button_html ='<a href="user_view/'.$id.'" class="btn btn-primary btn-sm news-view" title="View"><span class="fa fa-eye"></span></a>
					<a href="edit_user_page/'.$id.'" class="btn btn-info btn-sm user-edit" title="Edit"><span class="fa fa-pencil-alt"></span></a>
					<a href="javascript:;" class="btn btn-danger btn-sm user-delete" data_id="'.$id.'" title="Delete"><span class="fa fa-trash"></span></a>';							
					$row = array($image, $name, $email, $position, $referenced_by, $joined, $button_html);
					$data[] = $row;	
				}		
				$output = array(
					"data" => $data
				);
				echo json_encode($output);		
			}else{					
				$output = "";
				echo json_encode($output);
			}	
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access user');	
			redirect('ct_backend/index');		
		}		
	}
	public function single_user_data($id){
		$user_data = $this->model->single_user_data($id);		
		return $user_data;
	}
	
	// 15.3) User View	
	public function user_view($id){
		if($this->user_permission == 1 || $this->logged_user_id == $id){	
			if($this->view_permission == 1 || $this->logged_user_id == $id){			
				$data = array();
				$data['controller'] = $this;	
				$data['site_title'] = $this->model->site_title($site_title_id = 1);
				$data['site_footer']     = $this->model->site_footer($site_footer_id = 1);
				$data['user_data'] = $this->model->single_user_data($id);			
				
				if($data['user_data'] != FALSE){					
					$data['user_news']       = $this->model->show_user_news($id);	
					$data['user_news_count'] = $this->model->user_news_count($id);	
					$data['page_title']      = $data['user_data']->first_name;	
					$this->load->view('backend/user_view', $data);
				}else{
					//If the page does not exist
					show_error('Page Not Found!', '', 'An Error Was Encountered');
				}	
			}else{	
				$this->session->set_flashdata('error','You are not permitted to view user');	
				redirect('ct_backend/index');		
			}	
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access user');	
			redirect('ct_backend/index');		
		}			
	}
	
	// 15.4) Edit User Page	
	public function edit_user_page($id){
		if($this->user_permission == 1 || $this->logged_user_id == $id){	
			$data = array();
			$data['controller'] = $this;	
			$data['site_title'] = $this->model->site_title($site_title_id = 1);
			$data['site_footer']     = $this->model->site_footer($site_footer_id = 1);			
			$data['user_data'] = $this->model->single_user_data($id);
			
			if($data['user_data'] != FALSE){					
				$data['page_title'] = $data['user_data']->first_name;
				$this->load->view('backend/edit_user', $data);
			}else{
				//If the page does not exist
				show_error('Page Not Found!', '', 'An Error Was Encountered');
			}		
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access user');	
			redirect('ct_backend/index');		
		}			
	}
	
	// 15.5) Add User Page		
	public function add_user_page(){
		if($this->user_permission == 1){
			$data = array();
			$data['controller'] = $this;
			$data['site_title'] = $this->model->site_title($site_title_id = 1);		
			$data['page_title'] = "Add User";
			$data['site_footer']     = $this->model->site_footer($site_footer_id = 1);			
			$this->load->view('backend/add_user', $data);	
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access user');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 15.6) Add User 	
	public function add_user(){		
		if($this->user_permission == 1){
			if($this->add_permission == 1){			
				$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[8]');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
				$this->form_validation->set_rules('re_password', 'Re password', 'trim|required|min_length[6]|matches[password]');	
				
				if ($this->form_validation->run() == FALSE){
					$this->session->set_flashdata('error','Validation faild! Please fill correctly.');
					$data = array();
					$data['controller'] = $this;
					$data['site_title'] = $this->model->site_title($site_title_id = 1);		
					$data['page_title'] = "Add User";
					$data['site_footer']     = $this->model->site_footer($site_footer_id = 1);			
					$this->load->view('backend/add_user', $data);
				}else{			
					$data = $this->input->post();			
					$email_check = $this->model->email_check($data['email']);
					
					if($email_check == True){							
						$data['password'] = $this->encryption->encrypt($data['password']);		
						unset($data['re_password']);
						
						if(!empty($_FILES['image']['name'])){
							$image = md5(uniqid(rand(), true));
							$config = array(
								'upload_path' => 'assets/images/user',
								'allowed_types' => "gif|jpg|png|jpeg",
								'file_name' => $image
							);		
							
							$this->load->library('upload', $config);	
							$this->upload->initialize($config);					
							if($this->upload->do_upload('image')){
								$file_data      = $this->upload->data();
								$data['image']  = $file_data['file_name'];	
								
								$result                   = $this->model->add_user($data);			
								$notification['success']  = false;
								$notification['type']     = 'added';
								if($result){
									$notification['success'] = true;
								}
								$this->session->set_flashdata('success','Successfullly added user.');
								redirect("ct_backend/add_user_page");	
							}
						}else{	
							$this->session->set_flashdata('error','Upload user photo .');
							redirect("ct_backend/add_user_page");	
						}
					}else{	
							$this->session->set_flashdata('error','This email id already taken.');
							redirect("ct_backend/add_user_page");	
					}		
				}
			}else{	
				$this->session->set_flashdata('error','You are not permitted to add user');	
				redirect('ct_backend/index');		
			}		
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access user');	
			redirect('ct_backend/index');		
		}		
	}
	
	// 15.6) Edit User 	
	public function edit_user($id){	
		if($this->user_permission == 1 || $this->logged_user_id == $id){
			if($this->edit_permission == 1 || $this->logged_user_id == $id){			
				$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[8]');		
				if ($this->form_validation->run() == FALSE){
					$this->session->set_flashdata('error','Validation faild! Please fill correctly.');		
					$data = array();
					$data['controller'] = $this;	
					$data['site_title'] = $this->model->site_title($site_title_id = 1);
					$data['user_data'] = $this->model->single_user_data($id);	
					$data['page_title'] = $data['user_data']->first_name;
					$data['site_footer']     = $this->model->site_footer($site_footer_id = 1);		
					$this->load->view('backend/edit_user', $data);
				}else{		
					$data = $this->input->post();			
					$email_check = $this->model->email_check($data['email']);
					
					if($email_check == True || $this->session->userdata('email') == $data['email']){
						
						if(!empty($_FILES['image']['name'])){
							$image_address = $this->model->single_user_data($id); 	
							$remove_image_address = $image_address->image;
							@unlink('assets/images/user/'.$remove_image_address);	
												
							$image = md5(uniqid(rand(), true));
							$config = array(
								'upload_path' => 'assets/images/user',
								'allowed_types' => "gif|jpg|png|jpeg",
								'file_name' => $image
							);		
							
							$this->load->library('upload', $config);	
							$this->upload->initialize($config);
							
							if($this->upload->do_upload('image')){
								$file_data      = $this->upload->data();
								$data['image']  = $file_data['file_name'];	
								
								$result                   = $this->model->edit_user($id, $data);
								$this->session->set_flashdata('success','Successfullly edited user.');	
								$data = array();
								$data['controller'] = $this;	
								$data['site_title'] = $this->model->site_title($site_title_id = 1);
								$data['user_data'] = $this->model->single_user_data($id);	
								$data['page_title'] = $data['user_data']->first_name;
								$data['site_footer']     = $this->model->site_footer($site_footer_id = 1);				
								$this->load->view('backend/edit_user', $data);
							}
						}else{						
							$result = $this->model->edit_user($id, $data);
							$this->session->set_flashdata('success','Successfullly edited user.');
							$data = array();
							$data['controller'] = $this;	
							$data['site_title'] = $this->model->site_title($site_title_id = 1);
							$data['user_data'] = $this->model->single_user_data($id);	
							$data['page_title'] = $data['user_data']->first_name;
							$data['site_footer']     = $this->model->site_footer($site_footer_id = 1);				
							$this->load->view('backend/edit_user', $data);
						}
					}else{	
						$this->session->set_flashdata('error','This email id already taken.');
						if ($this->agent->is_referral()){
							redirect($this->agent->referrer());
						}else{
							redirect('ct_backend/index');		
						}	
					}
				}	
			}else{	
				$this->session->set_flashdata('error','You are not permitted to edit user');	
				redirect('ct_backend/index');		
			}	
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access user');	
			redirect('ct_backend/index');		
		}			
	}
		
	// 15.7) Change Password Page
	public function change_password_page($id){	
		if($this->user_permission == 1 || $this->logged_user_id == $id){	
			$data = array();		
			$data['controller'] = $this;
			$data['site_title'] = $this->model->site_title($site_title_id = 1);
			$data['site_footer']     = $this->model->site_footer($site_footer_id = 1);		
			$data['user_data']  = $this->model->single_user_data($id);	
			$data['page_title'] = $data['user_data']->first_name;	
			$this->load->view('backend/change_password', $data);
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access user');	
			redirect('ct_backend/index');		
		}			
	}
		
	// 15.8) Change Password
	public function change_password($id){	
		if($this->user_permission == 1 || $this->logged_user_id == $id){
			if($this->edit_permission == 1 || $this->logged_user_id == $id){			
				$data = array();		
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
				$this->form_validation->set_rules('re_password', 'Re password', 'trim|required|min_length[6]|matches[password]');
				
				if ($this->form_validation->run() == FALSE){
					$this->session->set_flashdata('error','Validation faild! Please fill correctly.');	
					$data = array();			
					$data['controller'] = $this;
					$data['site_title'] = $this->model->site_title($site_title_id = 1);
					$data['site_footer']     = $this->model->site_footer($site_footer_id = 1);		
					$data['user_data']  = $this->model->single_user_data($id);	
					$data['page_title'] = $data['user_data']->first_name;	
					$this->load->view('backend/change_password', $data);
				}else{				
					$user_data  = $this->model->single_user_data($id);			
					$old_password        = $this->encryption->decrypt($user_data->password);
					$data                = $this->input->post();
					$input_old_password  =  $data['input_old_password'];
								
					if($old_password === $input_old_password){						
						unset($data['input_old_password']);
						unset($data['re_password']);
						$data['password'] =  $this->encryption->encrypt($data['password']);
						
						$result = $this->model->edit_user($id, $data);							
						setcookie('email', "", 0, "/");
						setcookie('password', "", 0, "/");		
						$this->session->unset_userdata('email');
						$this->session->set_flashdata('success','Password has been changed successfully please login with new password.');		
						redirect('ct_login/login_view');		
					}else{
						$this->session->set_flashdata('error','Old does not matched!');						
						$data = array();		
						$data['controller'] = $this;
						$data['site_title']  = $this->model->site_title($site_title_id = 1);
						$data['site_footer'] = $this->model->site_footer($site_footer_id = 1);		
						$data['user_data']   = $this->model->single_user_data($id);	
						$data['page_title']  = $data['user_data']->first_name;	
						$this->load->view('backend/change_password', $data);			
					}
				}
			}else{	
				$this->session->set_flashdata('error','You are not permitted to edit user');	
				redirect('ct_backend/index');		
			}		
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access user');	
			redirect('ct_backend/index');		
		}			
	}
		
	// 15.9) Delete User 	
	public function delete_user($id){	
		if($this->user_permission == 1){	
			if($this->delete_permission == 1){			
				$image_address = $this->model->single_user_data($id);
				$remove_image_address = $image_address->image;
				@unlink('assets/images/user/'.$remove_image_address);
				$permission = $this->model->delete_user_permission($id);				
				$result     = $this->model->delete_user($id);
				echo json_encode($result);
			}else{	
				$this->session->set_flashdata('error','You are not permitted to delete user');	
				redirect('ct_backend/index');		
			}	
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access user');	
			redirect('ct_backend/index');		
		}	
	}

	// 16.1) User Permission
	public function user_permission($logged_user_id){
		return $user_permission = $this->model->user_permission($logged_user_id);
	}

	// 16.2) Edit User Permission Page
	public function edit_user_permission_page($id){
		if($this->user_permission_page_permission == 1){			
			$data = array();
			$data['target_user_permission']  = $this->model->user_permission($id);			
			if($data['target_user_permission'] != FALSE){		
				$data['controller']              = $this;	
				$data['site_title']              = $this->model->site_title($site_title_id = 1);	
				$data['page_title']              = "User Permission";	
				$data['site_footer']             = $this->model->site_footer($site_footer_id = 1);	
				$this->load->view('backend/edit_user_permission', $data);
			}else{
				//If the page does not exist
				show_error('Page Not Found!', '', 'An Error Was Encountered');
			}
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access user permission');	
			redirect('ct_backend/index');		
		}		
	}
	
	// 16.2) Edit User Permission Page
	public function edit_user_permission($id){	
		if($this->user_permission_page_permission == 1){			
			if($this->edit_permission == 1){
				$data   = $this->input->post();		
				$result = $this->model->edit_user_permission($id, $data);			
				$notification['success'] = false;
				$notification['type'] = 'updated';
				
				if($result){
					$notification['success'] = true;
				}
				echo json_encode($notification);
			}else{	
				$this->session->set_flashdata('error','You are not permitted to edit user');	
				redirect('ct_backend/index');		
			}		
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access user permission');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 17.1) Sketch
	public function sketch_page(){
		if($this->sketch_permission == 1){	
			$data = array();
			$data['controller']    = $this;	
			$data['site_title']    = $this->model->site_title($site_title_id = 1);	
			$data['page_title']    = "Sketch";	
			$data['site_footer']   = $this->model->site_footer($site_footer_id = 1);		
			$data['sketch_list']   = $this->model->sketch_list($id = 1);		
			$data['category_list'] = $this->model->show_category();	
			$this->load->view('backend/sketch', $data);
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access sketch');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 17.2) Edit Sketch
	public function edit_sketch($id){	
		if($this->sketch_permission == 1){	
			if($this->edit_permission == 1){					
				$data   = $this->input->post();		
				$result = $this->model->edit_sketch($id, $data);			
				$notification['success'] = false;
				$notification['type'] = 'updated';
				
				if($result){
					$notification['success'] = true;
				}
				echo json_encode($notification);	
			}else{	
				$this->session->set_flashdata('error','You are not permitted to edit sketch');	
				redirect('ct_backend/index');		
			}			
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access sketch');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 17.3) Sketch category
	public function sketch_category($id){	
		if($this->sketch_permission == 1){	
			if($this->edit_permission == 1){
				$result = $this->model->sketch_category($id);
				return $result;
			}else{	
				$this->session->set_flashdata('error','You are not permitted to edit sketch');	
				redirect('ct_backend/index');		
			}			
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access sketch');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 18.1.1) General Setting
	public function general_setting(){
		if($this->setting_permission == 1){	
			$data = array();
			$data['controller'] = $this;	
			$data['site_title'] = $this->model->site_title($site_title_id = 1);	
			$data['page_title'] = "General Setting";	
			$data['site_footer']     = $this->model->site_footer($site_footer_id = 1);			
			$data['setting_data'] = $this->model->general_setting_view($id = 1);	
			$this->load->view('backend/general_setting', $data);
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access setting');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 18.1.2) Edit General Setting
	public function edit_general_setting($id){
		if($this->setting_permission == 1){	
			if($this->edit_permission == 1){					
				$this->form_validation->set_rules('phone', 'phone', 'trim|required|min_length[11]');
				$this->form_validation->set_rules('email', 'email', 'trim|required|min_length[8]');
				$this->form_validation->set_rules('facebook', 'facebook', 'trim|required');
				$this->form_validation->set_rules('twitter', 'twitter', 'trim|required');
				$this->form_validation->set_rules('google', 'google', 'trim|required');
				$this->form_validation->set_rules('youtube', 'youtube', 'trim|required');
				$this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[20]');
				$this->form_validation->set_rules('copyright', 'copyright', 'trim|required|min_length[5]');
				$this->form_validation->set_rules('footer_text', 'footer text', 'trim|required|min_length[20]');
				
				if ($this->form_validation->run() == FALSE){	
					$this->session->set_flashdata('error','Validation faild! Please fill correctly.');
					$data = array();
					$data['controller'] = $this;	
					$data['site_title'] = $this->model->site_title($site_title_id = 1);	
					$data['page_title'] = "General Setting";	
					$data['site_footer']     = $this->model->site_footer($site_footer_id = 1);			
					$data['setting_data'] = $this->model->general_setting_view($id = 1);	
					$this->load->view('backend/setting', $data);
				}else{						
					$data = $this->input->post();
					
					// Logo
					if(!empty($_FILES['logo']['name'])){	
						@unlink('assets/images/default/logo.png');
						
						$image = "logo";
						$config = array(
							'upload_path' => 'assets/images/default',
							'allowed_types' => "png",
							'file_name' => $image
						);		
						
						$this->load->library('upload', $config);	
						$this->upload->initialize($config);			
						$this->upload->do_upload('logo');
					}		
					unset($data['logo']);
					
					// Collapsed Logo
					if(!empty($_FILES['collapsed_logo']['name'])){	
						@unlink('assets/images/default/collapsed_logo.png');
						
						$image = "collapsed_logo";
						$config = array(
							'upload_path' => 'assets/images/default',
							'allowed_types' => "png",
							'file_name' => $image
						);		
						
						$this->load->library('upload', $config);	
						$this->upload->initialize($config);			
						$this->upload->do_upload('collapsed_logo');
					}		
					unset($data['collapsed_logo']);	

					// Favicon
					if(!empty($_FILES['favicon']['name'])){	
						@unlink('assets/images/default/favicon.png');
						
						$image = "favicon";
						$config = array(
							'upload_path' => 'assets/images/default',
							'allowed_types' => "png",
							'file_name' => $image
						);		
						
						$this->load->library('upload', $config);	
						$this->upload->initialize($config);			
						$this->upload->do_upload('favicon');
					}		
					unset($data['favicon']);

					// Footer Logo
					if(!empty($_FILES['footer_logo']['name'])){	
						@unlink('assets/images/default/footer_logo.png');
						
						$image = "footer_logo";
						$config = array(
							'upload_path' => 'assets/images/default',
							'allowed_types' => "png",
							'file_name' => $image
						);		
						
						$this->load->library('upload', $config);	
						$this->upload->initialize($config);			
						$this->upload->do_upload('footer_logo');
					}		
					unset($data['footer_logo']);	

					// Watermark
					if(!empty($_FILES['watermark']['name'])){	
						@unlink('assets/images/default/watermark.png');
						
						$image = "watermark";
						$config = array(
							'upload_path' => 'assets/images/default',
							'allowed_types' => "png",
							'file_name' => $image
						);		
						
						$this->load->library('upload', $config);	
						$this->upload->initialize($config);			
						$this->upload->do_upload('watermark');
					}		
					unset($data['watermark']);		

					// Default News Image
					if(!empty($_FILES['default_news_image']['name'])){	
						@unlink('assets/images/news_featured_image/blank_news.png');
						
						$image = "blank_news";
						$config = array(
							'upload_path' => 'assets/images/news_featured_image',
							'allowed_types' => "png",
							'file_name' => $image
						);		
						
						$this->load->library('upload', $config);	
						$this->upload->initialize($config);			
						$this->upload->do_upload('default_news_image');
					}		
					unset($data['default_news_image']);		

					// Background Image
					if(!empty($_FILES['background_image']['name'])){	
						@unlink('assets/images/default/background.png');
						
						$image = "background";
						$config = array(
							'upload_path' => 'assets/images/default',
							'allowed_types' => "png",
							'file_name' => $image
						);		
						
						$this->load->library('upload', $config);	
						$this->upload->initialize($config);			
						$this->upload->do_upload('background_image');
					}		
					unset($data['background_image']);	
					
					$result = $this->model->edit_general_setting($id, $data);
					$this->session->set_flashdata('success','Successfullly edited setting.');
					redirect("ct_backend/general_setting");
				}
			}else{	
				$this->session->set_flashdata('error','You are not permitted to edit setting');	
				redirect('ct_backend/index');		
			}	
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access setting');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 18.2.1) SMTP Setting
	public function smtp_setting(){
		if($this->setting_permission == 1 && $this->message_permission == 1){	
			$data = array();
			$data['controller']   = $this;	
			$data['site_title']   = $this->model->site_title($site_title_id = 1);	
			$data['page_title']   = "SMTP Setting";	
			$data['site_footer']  = $this->model->site_footer($site_footer_id = 1);			
			$data['setting_data'] = $this->model->smtp_setting_view($id = 1);	
			$this->load->view('backend/smtp_setting', $data);
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access setting');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 18.2.2) Edit SMTP Setting
	public function edit_smtp_setting($id){
		if($this->setting_permission == 1 && $this->message_permission == 1){	
			if($this->edit_permission == 1){	
				$data = $this->input->post();	
				$data['sending_email_password'] = $this->encryption->encrypt($data['sending_email_password']);
				$result = $this->model->edit_smtp_setting($id, $data);						
				$notification['success'] = false;
				$notification['type'] = 'updated';
				if($result){
					$notification['success'] = true;
				}
				echo json_encode($notification);
			}else{	
				$this->session->set_flashdata('error','You are not permitted to edit setting');	
				redirect('ct_backend/index');		
			}	
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access setting');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 18.3.1) Color Setting
	public function color_setting(){
		if($this->setting_permission == 1){	
			$data = array();
			$data['controller']     		 = $this;	
			$data['site_title']     		 = $this->model->site_title($site_title_id = 1);	
			$data['page_title']      		 = "Color Setting";	
			$data['site_footer']     	     = $this->model->site_footer($site_footer_id = 1);	
			$this->load->view('backend/color_setting', $data);
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access setting');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 18.3.1) Single color data
	public function single_color_data($class_section){
		if($this->setting_permission == 1){	
			return $color_code = $this->model->single_color_data($class_section);				
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access setting');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 18.3.2) Color edit
	public function edit_color_setting(){
		if($this->setting_permission == 1){					
			if($this->edit_permission == 1){	
				$data            = $this->input->post();
				$result = $this->model->edit_color_setting($data);							
				$this->session->set_flashdata('success','Successfullly edited colors.');
				redirect("ct_backend/color_setting");		
			}else{	
				$this->session->set_flashdata('error','You are not permitted to edit setting');	
				redirect('ct_backend/index');		
			}
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access setting');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 18.3.3) Color reset
	public function reset_color_setting(){
		if($this->setting_permission == 1){					
			if($this->edit_permission == 1){							
				$section_class  = array('header_bar_bg', 'header_bar_color', 'search_bg', 'search_color', 'menu_bg', 'menu_item_bg', 'menu_item_color', 'menu_item_hover_bg', 'menu_item_hover_color', 'menu_item_active_bg', 'menu_item_active_color', 'menu_sub_item_bg', 'menu_sub_item_color', 'menu_sub_item_hover_bg', 'menu_sub_item_hover_color', 'footer_bar_bg', 'footer_bar_color', 'footer_bar_anchor_color', 'footer_copyright_bg', 'footer_copyright_color', 'side_bar_tab_item_bg', 'side_bar_tab_item_color', 'side_bar_tab_active_item_bg', 'side_bar_tab_active_item_color', 'side_bar_archive_bg', 'side_bar_archive_color', 'side_bar_archive_date_hover_bg', 'side_bar_archive_date_hover_color', 'side_bar_archive_date_active_bg', 'side_bar_archive_date_active_color', 'side_bar_poll_bg', 'side_bar_poll_color', 'side_bar_poll_option_color', 'side_bar_poll_button_bg', 'side_bar_poll_button_color', 'featured_news_category_bg', 'featured_news_category_color', 'thumbnail_news_category_bg', 'thumbnail_news_category_color', 'section_title_bg', 'section_title_color', 'pagination_item_bg', 'pagination_item_color', 'pagination_item_hover_bg', 'pagination_item_hover_color', 'pagination_item_active_bg', 'pagination_item_active_color', 'scroll_up_bg', 'scroll_up_color', 'scroll_up_hover_bg', 'scroll_up_hover_color', 'user_profile_tab_item_bg', 'user_profile_tab_item_color', 'user_profile_tab_item_active_bg', 'user_profile_tab_item_active_color', 'notice_bg', 'notice_border', 'notice_color', 'breaking_news_bg', 'breaking_news_heading_bg', 'breaking_news_heading_color', 'breaking_news_item_color', 'news_title_color', 'news_description_color', 'home_13_section_1_news_bg', 'home_13_section_1_news_title_color', 'home_13_section_1_news_description_color', 'home_14_section_news_bg', 'home_14_section_news_title_color', 'category_1_2_news_bg', 'category_1_2_news_title_color', 'category_1_2_news_description_color', 'category_3_news_bg', 'category_3_news_news_title_color', 'category_3_news_description_color', 'news_page_bg', 'news_breadcrumb_bg', 'news_breadcrumb_1_list_bg', 'news_breadcrumb_1_list_color', 'news_breadcrumb_2_list_bg', 'news_breadcrumb_2_list_color', 'news_breadcrumb_3_list_color', 'news_page_heading_bg', 'news_page_heading_border', 'news_page_news_title_color', 'news_page_news_sub_title_color', 'news_page_news_information_color', 'news_page_news_description_color', 'video_title_bg', 'video_title_color', 'page_heading_color', 'page_description_color', 'contact_page_icon_bg', 'contact_page_icon_color', 'contact_page_link_color', 'contact_page_form_button_bg', 'contact_page_form_button_color');
				
				$color_code     = array('linear-gradient(to right, #ffffff, #F5F6F7)', '#666666', '#000000', '#ffffff', '#f8f9f9', 'transparent', '#000000', '#CE2525', '#ffffff', '#000000', '#ffffff', '#3d4753', '#ffffff', '#55ACEE', 'aliceblue', '#55acee', '#ffffff', '#ffffff', '#F5F6F7', '#666666', '#03244b', '#ffffff', '#ce2525', '#ffffff', '#03244b', '#ffffff', '#ce2525', '#ffffff', '#03244b', '#ffffff', '#03244b', '#ffffff', '#03244b', '#03244b', '#ffffff', '#55acee', '#ffffff', '#ce2525', '#ffffff', '#ce2525', '#ffffff', 'transparent', '#686868', '#000000', '#ffffff', '#55acee', '#ffffff', '#000000', '#ffffff', '#000000', '#ffffff', '#03244b', '#ffffff', '#ce2525', '#ffffff', '#f5f6f7', '#b7c2ca', '#ffffff', '#F8F9F9', '#ce2525', '#ffffff', '#03244b', '#03244B', '#000000', '#f5f6f7', '#03244B', '#000000', '#F5F6F7', '#000000', '#f5f6f7', '#03244B', '#000000', '#f5f6f7', '#03244B', '#000000', '#ffffff', '#F8F9F9', '#03244b', '#ffffff', '#CE2525', '#ffffff', '#03244b', '#f8f9f9', '#55acee', '#03244b', '#ce2525', '#03244b', '#000000', '#F5F6F7', '#03244b', '#3c3d3e', '#212529', '#000000', '#ffffff', '#212529', '#000000', '#ffffff');
								
				$data = array('section_class'=>$section_class, 'color_code'=>$color_code);
				
				$result = $this->model->edit_color_setting($data);							
				$this->session->set_flashdata('success','Successfullly restored colors.');
				redirect("ct_backend/color_setting");		
			}else{	
				$this->session->set_flashdata('error','You are not permitted to edit setting');	
				redirect('ct_backend/index');		
			}
		}else{	
			$this->session->set_flashdata('error','You are not permitted to access setting');	
			redirect('ct_backend/index');		
		}	
	}
	
	// 18.4) Time Zone
	public function set_timezone(){
		$data = array();		
		$data['setting_data'] = $this->model->general_setting_view($id = 1);	
		date_default_timezone_set($data['setting_data']->timezone);
	}
	
}
