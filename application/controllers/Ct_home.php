<?php defined('BASEPATH') OR exit('No direct script access allowed');

/****************************
	Controller Map
	1) Construct
	2) Timestamp 
	3) Header	
		3.1) Show Page
		3.2) Show Container Category
		3.3) Show Sub Category
		3.4) Show Breaking News		
	4) Home
		4.1) Index
		4.2) Sketch Wise News List
		4.3) Sketch Wise Category Data
		4.4) Gallery Data
		4.5) Video Data
		4.6) Header Ad
		4.7) Body Ad
		4.8) Popular News
	5) Page	
		5.1) Contact Page
		5.1.1) Send Message
		5.2) Dynamic Page
	6) Category	and Tags
		6.1) Category List	
		6.2) Category View	
		6.3) Tags View	
	7) News
		7.1) News View
		7.2) Single News Images List
		7.3) Add Hit
		7.4) News Search
			7.4.1) News Search
			7.4.2) News Search Result
		7.5) Archive News Search
			7.5.1) Archive News Search
			7.5.2) Archive News Search Result	
		7.6) News last date
		7.7) Exclusive news list
		7.8) Recent news list
	8) Video
	9) User		
		9.1) User view	
	10) Sidebar
		10.1) Notice List
		10.2) Sidebar Ad
		10.3) Widget List
		10.4) Poll List
	11) Setting
		11.1) Time Zone
		11.2) Color Data
****************************/

class ct_home extends CI_Controller {	
    
	// 1) Construct
	function __construct(){		
		parent::__construct();			
		$this->load->model('md_home', 'model');			
		$this->load->model('md_login', 'login_model');	
		
		//Default Time Zone
		$this->set_timezone();
		
		//Set session user data by browser cookie
		if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){
			$data = array();
			$data['email']    = $_COOKIE['email'];
			$data['password'] = $_COOKIE['password'];
			
			$user_query_data = $this->login_model->single_user_data($data['email']);
			$user_query_password = $this->encryption->decrypt($user_query_data->password);
			if($data['password'] === $user_query_password){				
				$user_data = array(
					'id'         => $user_query_data->id , 
					'image'      => $user_query_data->image,
					'first_name' => $user_query_data->first_name,
					'last_name'  => $user_query_data->last_name,
					'dob'        => $user_query_data->dob,
					'mobile'     => $user_query_data->mobile,
					'link'       => $user_query_data->web_link,
					'email'      => $user_query_data->email,
					'gender'     => $user_query_data->gender,
					'position'   => $user_query_data->position,
					'address'    => $user_query_data->address,
					'password'   => $user_query_data->password,
					'joined'     => $user_query_data->joined
				);				
				$this->session->set_userdata($user_data);
			}			
		}
	}

	// 2) Timestamp
	public function timestamp($given_time){
		$given_time = strtotime($given_time);
        $current_time = time();
        if($current_time >= $given_time){
            $different_time = $current_time - $given_time;

            $seconds = $different_time;
            $minutes = round($different_time / (60));
            $hours   = round($different_time / (60*60));
            $days    = round($different_time / (60*60*24));
            $weeks   = round($different_time / (60*60*24*7));
            $months  = round($different_time / (60*60*24*7*4.35));
            $years   = round($different_time / (60*60*24*30*12));
            $decades   = round($different_time / (60*60*24*30*12*10));

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
           // return "The given time is grater than now.";
        }//count is the. whether time is valid.
	}	
	
	// 3) Header		
	// 3.1) Show Page
	public function page_list(){				
		$data['page_list'] = $this->model->page_list();			
		if($data['page_list'] != FALSE){
			return $data['page_list'];
		}else{
		}		
	}	
	
	// 3.2) Show Container Category
	public function container_category_list(){				
		$data['container_category_list'] = $this->model->container_category_list();			
		if($data['container_category_list'] != FALSE){
			return $data['container_category_list'];
		}else{
		}		
	}	
	
	// 3.3) Show Sub Category
	public function sub_category_list($id){				
		$data['sub_category_list'] = $this->model->sub_category_list($id);			
		if($data['sub_category_list'] != FALSE){
			return $data['sub_category_list'];
		}else{
		}			
	}		
	
	// 3.4) Show Breaking News
	public function breaking_news_list(){				
		$data['breaking_news_list'] = $this->model->breaking_news_list();			
		if($data['breaking_news_list'] != FALSE){
			return $data['breaking_news_list'];
		}else{
		}
	}		
	// End Header		
	
	// 4) Home	
	// 4.1.1) Index
	public function index(){
		$data = array();		
		$data['controller']   = $this;	
		$data['site_title']   = $this->model->site_title($site_title_id = 1);			
		$data['site_footer']  = $this->model->site_footer($site_footer_id = 1);
		$data['meta_tag']     = $this->model->meta_tag($meta_id = 1);
		$data['home_sketch']  = $this->model->home_sketch($home_sketch = 1);
		$data['setting_data'] = $this->model->single_setting_view($setting_id = 1);
		$data['page_title']   = "Home";
		
		$cookie_name = "Site_visited_date_".date("Y-m-d");
		// It will count the hit of site
		$this->add_site_visitor($cookie_name);
		$this->load->view('home/home', $data);
	}	
	
	// 4.1.2) Add Hit
	public function add_site_visitor($cookie_name){
		$check_visitor = $this->input->cookie($cookie_name, FALSE);		
		// visitor ip address
		$ip = $this->input->ip_address();
		if ($check_visitor == false) { 
			setcookie($cookie_name, $ip, time() + 3600, "/"); // 1 hour (60*60*1)
			$data = array();
			$data['ip'] = $ip;		
			$data['date'] = date("Y-m-d");			
			$this->model->add_site_visitor($data);
		}
	}
	
	// 4.2) Sketch Wise News List
	public function sketch_news_list($id, $limit, $offset){		
		$data['sketch_news_list'] = $this->model->sketch_news_list($id, $limit, $offset);			
		if($data['sketch_news_list'] != FALSE){
			return $data['sketch_news_list'];
		}else{
		}		
	}	
	
	// 4.3) Sketch Wise Category Data
	public function sketch_category_data($id){		
		$data['sketch_category_data'] = $this->model->sketch_category_data($id);			
		if($data['sketch_category_data'] != FALSE){
			return $data['sketch_category_data'];
		}else{			
		}		
	}
	
	// 4.4) Gallery List
	public function gallery_list(){		
		$data['gallery_list'] = $this->model->gallery_list();			
		if($data['gallery_list'] != FALSE){
			return $data['gallery_list'];
		}else{
		}		
	}
	
	// 4.5) Video List
	public function video_list($limit, $offset){		
		$data['video_list'] = $this->model->video_list($limit, $offset);			
		if($data['video_list'] != FALSE){
			return $data['video_list'];
		}else{
		}		
	}
	
	// 4.6) Header Ad
	public function header_ad(){		
		$data['header_ad'] = $this->model->header_ad();			
		if($data['header_ad'] != FALSE){
			return $data['header_ad'];
		}else{
		}		
	}
	
	// 4.7) Body Ad
	public function body_ad($limit, $offset){		
		$data['body_ad'] = $this->model->body_ad($limit, $offset);			
		if($data['body_ad'] != FALSE){
			return $data['body_ad'];
		}else{
		}		
	}
	
	// 4.8) Popular News
	public function popular_news(){		
		$data['popular_news'] = $this->model->popular_news();			
		if($data['popular_news'] != FALSE){
			return $data['popular_news'];
		}else{
		}		
	}
	
	// 5) Page
	// 5.1) Contact Page
	public function contact_page(){
		$data = array();		
		$data['controller']   = $this;
		$data['site_title']   = $this->model->site_title($site_title_id = 1);			
		$data['site_footer']  = $this->model->site_footer($site_footer_id = 1);	
		$data['setting_data'] =  $this->model->single_setting_view($setting_id = 1);		
		$data['meta_tag']     = $this->model->meta_tag($meta_id = 1);
		$data['page_title']   = "Contact";
		$this->load->view('home/contact_page', $data);
	}
		
	// 5.1.1) Send Message	
	public function send_message(){	
		$this->form_validation->set_rules('from_email', 'Email', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('message', 'Message', 'trim|required|min_length[6]');
		
		if ($this->form_validation->run() == FALSE){	
			$this->session->set_flashdata('error','Validation faild! Please fill correctly.');
			$data = array();		
			$data['controller']   = $this;
			$data['site_title']   = $this->model->site_title($site_title_id = 1);			
			$data['site_footer']  = $this->model->site_footer($site_footer_id = 1);	
			$data['setting_data'] =  $this->model->single_setting_view($setting_id = 1);		
			$data['meta_tag']     = $this->model->meta_tag($meta_id = 1);
			$data['page_title']   = "Contact";
			$this->load->view('home/contact_page', $data);
		}else{
			$data = $this->input->post();
			$data = $this->security->xss_clean($data);	
			$data['watched'] = 0;
			unset($data['submit']);
			$result = $this->model->send_message($data);
			$this->session->set_flashdata('success','Message send successfully.');
			$data = array();		
			$data['controller']   = $this;
			$data['site_title']   = $this->model->site_title($site_title_id = 1);			
			$data['site_footer']  = $this->model->site_footer($site_footer_id = 1);	
			$data['setting_data'] =  $this->model->single_setting_view($setting_id = 1);		
			$data['meta_tag']     = $this->model->meta_tag($meta_id = 1);
			$data['page_title']   = "Contact";
			$this->load->view('home/contact_page', $data);
		}	
	}
	
	// 5.2) Dynamic Page
	public function page_view($id){
		$data = array();		
		$data['controller']   = $this;
		$data['site_title']   = $this->model->site_title($site_title_id = 1);			
		$data['site_footer']  = $this->model->site_footer($site_footer_id = 1);	
		$data['setting_data'] =  $this->model->single_setting_view($setting_id = 1);		
		$data['meta_tag']     = $this->model->meta_tag($meta_id = 1);		
		$data['page_view']    = $this->model->page_view($id);		
		if($data['page_view'] != FALSE){
			$data['page_title']  = $data['page_view']->title;	
			$this->load->view('home/page_view', $data);			
		}else{
			//If the page does not exist
			show_error('Page Not Found!', '', 'An Error Was Encountered');
		}
	}	
	
	// 6) Category 
	// 6.1) Category List	
	public function category_list(){			
		$data['category_list'] = $this->model->category_list();			
		if($data['category_list'] != FALSE){
			return $data['category_list'];
		}else{}		
	}
	
	// 6.2) Category View	
	public function category_view($id){
		$data = array();		
		$data['controller']        = $this;
		$data['site_title']        = $this->model->site_title($site_title_id = 1);			
		$data['site_footer']       = $this->model->site_footer($site_footer_id = 1);			
		$data['meta_tag']          = $this->model->meta_tag($meta_id = 1);
		
		///News pagination		
		$config = array(		
			'base_url' 		  => base_url('ct_home/category_view/').$id,
			'per_page' 		  => 21,
			'total_rows' 	  => $this->model->count_news_by_category($id),
			'uri_segment' 	  => 4,
			'full_tag_open'   => '<ul class="pagination justify-content-center pagination-content">',
			'full_tag_close'  => '</ul>',
			'first_tag_open'  => '<li class="page-item">',
			'first_tag_close' => '</li>',
			'last_tag_open'   => '<li>',
			'last_tag_close'  => '</li>',
			'next_tag_open'   => '<li>',
			'next_tag_close'  => '</li>',
			'prev_tag_open'   => '<li>',
			'prev_tag_close'  => '</li>',
			'num_tag_open'    => '<li>',
			'num_tag_close'   => '</li>',
			'cur_tag_open'    => '<li class="page-item active"><a href="#"  class="page-link">',
			'cur_tag_close'   => '</a></li>',
			'prev_link' 	  => '&laquo Previous',
			'next_link'		  => 'Next &raquo'
		);		
		$limit = $config['per_page'];
		$offset = $this->uri->segment(4);
		$this->pagination->initialize($config);
		/// End News pagination		
		
		$data['category_view']     = $this->model->category_view($id, $limit, $offset);		
		if($data['category_view'] != FALSE){
			$category_data = $this->model->single_category_data($id);
			$data['page_title']    = $category_data->title;			
			$data['setting_data'] =  $this->model->single_setting_view($setting_id = 1);
			$this->load->view('home/category_view', $data);
		}else{			
			$data['page_title']    = "No news found";			
			$data['setting_data'] =  $this->model->single_setting_view($setting_id = 1);
			$this->load->view('home/category_view', $data);			
		}		
	}
	
	// 6.3) Tag View	
	public function tag_view($tag){
		$data = array();		
		$data['controller']        = $this;
		$data['site_title']        = $this->model->site_title($site_title_id = 1);			
		$data['site_footer']       = $this->model->site_footer($site_footer_id = 1);			
		$data['meta_tag']          = $this->model->meta_tag($meta_id = 1);
		
		///News pagination		
		$config = array(		
			'base_url' 		  => base_url('ct_home/tag_view/').$tag,
			'per_page' 		  => 21,
			'total_rows' 	  => $this->model->count_news_by_tag($tag),
			'uri_segment' 	  => 4,
			'full_tag_open'   => '<ul class="pagination justify-content-center pagination-content">',
			'full_tag_close'  => '</ul>',
			'first_tag_open'  => '<li class="page-item">',
			'first_tag_close' => '</li>',
			'last_tag_open'   => '<li>',
			'last_tag_close'  => '</li>',
			'next_tag_open'   => '<li>',
			'next_tag_close'  => '</li>',
			'prev_tag_open'   => '<li>',
			'prev_tag_close'  => '</li>',
			'num_tag_open'    => '<li>',
			'num_tag_close'   => '</li>',
			'cur_tag_open'    => '<li class="page-item active"><a href="#"  class="page-link">',
			'cur_tag_close'   => '</a></li>',
			'prev_link' 	  => '&laquo Previous',
			'next_link'		  => 'Next &raquo'
		);	
		
		$limit = $config['per_page'];
		$offset = $this->uri->segment(4);		
		$this->pagination->initialize($config);
		/// End News pagination		
		
		$data['tag_view']     = $this->model->tag_view($tag, $limit, $offset);		
		if($data['tag_view'] != FALSE){
			$data['page_title']    = $tag;			
			$data['setting_data'] =  $this->model->single_setting_view($setting_id = 1);
			$this->load->view('home/tag_view', $data);
		}else{			
			$data['page_title']    = "No news found";			
			$data['setting_data'] =  $this->model->single_setting_view($setting_id = 1);
			$this->load->view('home/tag_view', $data);			
		}	
	}
	
	// 7) News	
	// 7.1) News View	
	public function news_view($slug){
		$data = array();		
		$data['controller']         = $this;	
		$data['site_title']         = $this->model->site_title($site_title_id = 1);			
		$data['site_footer']        = $this->model->site_footer($site_footer_id = 1);		
		$data['meta_tag']           = $this->model->news_view($slug);			
		$data['news_data']          = $this->model->news_view($slug);		
		if($data['news_data'] != FALSE){					
			$data['meta_tag']->title    = $data['meta_tag']->news_title;	
			$data['meta_tag_image']     = $data['meta_tag']->news_image;
			
			// It will count the hit of each news
			$this->add_hit($slug);		
			$data['page_title']         = $data['news_data']->news_title;			
			$data['setting_data'] =  $this->model->single_setting_view($setting_id = 1);
			$this->load->view('home/news_view', $data);			
		}else{
			//If the page does not exist
			show_error('Page Not Found!', '', 'An Error Was Encountered');
		}			
	}	
	
	// 7.2) Single News Images list
	public function single_news_images_list($id){	
		$result = $this->model->single_news_images_list($id);	
		return $result;
	}
	
	// 7.3) Add Hit
	function add_hit($slug){
		$check_visitor = $this->input->cookie(urldecode($slug), FALSE);		
		// visitor ip address
		$ip = $this->input->ip_address();
		if ($check_visitor == false) {
			setcookie(urldecode($slug), $ip, time() + 3600, "/"); // 1 hour (60*60*1)
			$this->model->update_hit_count(urldecode($slug));
		}
	}
	
	// 7.4.1) News Search	
	public function news_search(){		
		$this->form_validation->set_rules('search_input', 'Search', 'trim|required');	
		if ($this->form_validation->run() == FALSE){
			redirect($this->agent->referrer());
		}else{
			$input = $this->input->post('search_input');
			$security_input = $this->security->xss_clean($input);
			return redirect("search/$security_input");
		}
	}
	
	// 7.4.2) News Search Result
	public function news_search_result($security_input){
		$data = array();		
		$data['controller'] = $this;			
		$data['site_title'] = $this->model->site_title($site_title_id = 1);			
		$data['site_footer'] = $this->model->site_footer($site_footer_id = 1);		
		$data['meta_tag']     = $this->model->meta_tag($meta_id = 1);
		
		///News pagination		
		$config = array(		
			'base_url' 		       => base_url('ct_home/news_search_result/').$security_input,
			'per_page' 		       => 21,
			'total_rows' 	       => $this->model->count_news_by_search_input($security_input),
			'uri_segment' 	  	   => 4,
			'full_tag_open'        => '<ul class="pagination justify-content-center pagination-content">',
			'full_tag_close'       => '</ul>',
			'first_tag_open'       => '<li class="page-item">',
			'first_tag_close'      => '</li>',
			'last_tag_open'        => '<li>',
			'last_tag_close'       => '</li>',
			'next_tag_open'        => '<li>',
			'next_tag_close'       => '</li>',
			'prev_tag_open'        => '<li>',
			'prev_tag_close'       => '</li>',
			'num_tag_open'         => '<li>',
			'num_tag_close'        => '</li>',
			'cur_tag_open'         => '<li class="page-item active"><a href="#"  class="page-link">',
			'cur_tag_close'        => '</a></li>',
			'prev_link' 	       => '&laquo Previous',
			'next_link'		       => 'Next &raquo'
		);	
		
		$limit = $config['per_page'];
		$offset = $this->uri->segment(4);		
		$this->pagination->initialize($config);
		/// End News pagination		
		
		$data['search']  = $this->model->news_search($security_input, $limit, $offset);	
		$data['page_title'] = $security_input;	
		$data['setting_data'] =  $this->model->single_setting_view($setting_id = 1);
		$this->load->view('home/search', $data);		
	}
	
	// 7.5.1) Archive News Search	
	public function archive_news_search($search_date){
		$data = array();		
		$data['controller'] = $this;			
		$data['site_title'] = $this->model->site_title($site_title_id = 1);			
		$data['site_footer'] = $this->model->site_footer($site_footer_id = 1);		
		$data['meta_tag']     = $this->model->meta_tag($meta_id = 1);	
		
		///News pagination		
		$config = array(		
			'base_url' 		  => base_url('ct_home/archive_news_search/').$search_date,
			'per_page' 		  => 21,
			'total_rows' 	  => $this->model->count_news_by_archive_search_input($search_date),
			'uri_segment' 	  => 4,
			'full_tag_open'   => '<ul class="pagination justify-content-center pagination-content">',
			'full_tag_close'  => '</ul>',
			'first_tag_open'  => '<li class="page-item">',
			'first_tag_close' => '</li>',
			'last_tag_open'   => '<li>',
			'last_tag_close'  => '</li>',
			'next_tag_open'   => '<li>',
			'next_tag_close'  => '</li>',
			'prev_tag_open'   => '<li>',
			'prev_tag_close'  => '</li>',
			'num_tag_open'    => '<li>',
			'num_tag_close'   => '</li>',
			'cur_tag_open'    => '<li class="page-item active"><a href="#"  class="page-link">',
			'cur_tag_close'   => '</a></li>',
			'prev_link' 	  => '&laquo Previous',
			'next_link'		  => 'Next &raquo'
		);	
		
		$limit = $config['per_page'];
		$offset = $this->uri->segment(4);		
		$this->pagination->initialize($config);
		/// End News pagination		
		
		$data['search']  = $this->model->archive_news_search($search_date, $limit, $offset);
		$data['page_title'] = $search_date;	
		$data['setting_data'] =  $this->model->single_setting_view($setting_id = 1);
		$this->load->view('home/search', $data);
	}
	
	//7.6) News last date
	public function news_last_date(){		
		$news_last_date_query = $this->model->news_last_date();	
		if(isset($news_last_date_query->published)){			
			$news_last_date = $this->timestamp($news_last_date_query->published);
			return $news_last_date;
		}else{
			return "No news found";
		}
	}
	
	// 7.7) exclusive News
	public function exclusive_news_list(){				
		$data['exclusive_news_list'] = $this->model->exclusive_news_list();			
		if($data['exclusive_news_list'] != FALSE){
			return $data['exclusive_news_list'];
		}else{
		}
	}
	
	// 7.8) recent News
	public function recent_news_list(){				
		$data['recent_news_list'] = $this->model->recent_news_list();			
		if($data['recent_news_list'] != FALSE){
			return $data['recent_news_list'];
		}else{
		}
	}	

	// 8) Video	
	public function video_page(){
		$data = array();		
		$data['controller']        = $this;
		$data['site_title']        = $this->model->site_title($site_title_id = 1);			
		$data['site_footer']       = $this->model->site_footer($site_footer_id = 1);			
		$data['meta_tag']          = $this->model->meta_tag($meta_id = 1);
		
		///News pagination		
		$config = array(		
			'base_url' 		  => base_url('ct_home/video_page/'),
			'per_page' 		  => 16,
			'total_rows' 	  => $this->model->count_video(),
			'uri_segment' 	  => 3,
			'full_tag_open'   => '<ul class="pagination justify-content-center pagination-content">',
			'full_tag_close'  => '</ul>',
			'first_tag_open'  => '<li class="page-item">',
			'first_tag_close' => '</li>',
			'last_tag_open'   => '<li>',
			'last_tag_close'  => '</li>',
			'next_tag_open'   => '<li>',
			'next_tag_close'  => '</li>',
			'prev_tag_open'   => '<li>',
			'prev_tag_close'  => '</li>',
			'num_tag_open'    => '<li>',
			'num_tag_close'   => '</li>',
			'cur_tag_open'    => '<li class="page-item active"><a href="#"  class="page-link">',
			'cur_tag_close'   => '</a></li>',
			'prev_link' 	  => '&laquo Previous',
			'next_link'		  => 'Next &raquo'
		);	
		
		$limit = $config['per_page'];
		$offset = $this->uri->segment(3);		
		$this->pagination->initialize($config);
		/// End News pagination		
		
		$data['video_list']     = $this->model->video_page($limit, $offset);		
		if($data['video_list'] != FALSE){
			$data['page_title']    = "Video";
			$data['setting_data'] =  $this->model->single_setting_view($setting_id = 1);
			$this->load->view('home/video', $data);
		}else{		
			$data['page_title']    = "No video found";	
			$data['page_title']    = "Video";
			$data['setting_data'] =  $this->model->single_setting_view($setting_id = 1);
			$this->load->view('home/video', $data);
		}	
	}
	
	// 9) User
	// 9.1) User view
	public function user_view($id){	
		$data = array();		
		$data['controller']    = $this;
		$data['site_title']    = $this->model->site_title($site_title_id = 1);			
		$data['site_footer']   = $this->model->site_footer($site_footer_id = 1);	
		$data['setting_data']  =  $this->model->single_setting_view($setting_id = 1);		
		$data['meta_tag']      = $this->model->meta_tag($meta_id = 1);		
		$data['user_data']     = $this->model->user_view($id);		
		$data['user_news']     = $this->model->user_news($id);	
		if($data['user_data'] != FALSE){
			$data['page_title']  = $data['user_data']->first_name;	
			$this->load->view('home/user_view', $data);			
		}else{
			//If the page does not exist
			show_error('Page Not Found!', '', 'An Error Was Encountered');
		}
	}		
	
	// 10) Sidebar	
	// 10.1) Notice List
	public function notice_list($limit, $offset){		
		$data['notice_list'] = $this->model->notice_list($limit, $offset);			
		if($data['notice_list'] != FALSE){
			return $data['notice_list'];
		}else{}		
	}
	
	// 10.2) Sidebar Ad
	public function sidebar_ad($limit, $offset){		
		$data['sidebar_ad'] = $this->model->sidebar_ad($limit, $offset);			
		if($data['sidebar_ad'] != FALSE){
			return $data['sidebar_ad'];
		}else{}		
	}
	
	// 10.3) Widget List
	public function widget_list(){		
		$data['widget_list'] = $this->model->widget_list();			
		if($data['widget_list'] != FALSE){
			return $data['widget_list'];
		}else{}		
	}
	
	// 10.4.1) Poll List
	public function poll_list(){				
		$data['poll_list'] = $this->model->poll_list();			
		if($data['poll_list'] != FALSE){
			return $data['poll_list'];
		}else{}		
	}	
	
	// 10.4.2) Poll Options List
	public function poll_options_list($poll_id){				
		$data['poll_options_list'] = $this->model->poll_options_list($poll_id);			
		if($data['poll_options_list'] != FALSE){
			return $data['poll_options_list'];
		}else{}			
	}	
	
	// 10.5) Add Vote to poll option
	public function add_vote(){	
		$data               = $this->input->post();	
		$poll_id            = $data['poll_id'];
		$poll_option_id     = $data['poll_option_id'];
		
		$cookie_name = "poll_id_".$poll_id; 
		$check_visitor = $this->input->cookie($cookie_name, FALSE);		
		// visitor ip address
		$ip = $this->input->ip_address();
		if ($check_visitor == false) {	
			setcookie($cookie_name, $ip, time() + (86400 * 30), "/"); // 86400 = 1day * 30 = 30 days					
			$this->model->add_vote($poll_option_id);				
			$this->session->set_flashdata('success','Thanks for your valuable vote.');
			if ($this->agent->is_referral()){
				redirect($this->agent->referrer());
			}else{
				redirect('ct_home/index');		
			}
		}
	}		
	
	// 11) Setting
	// 11.1) Time Zone
	public function set_timezone(){
		$data = array();		
		$data['setting_data'] = $this->model->single_setting_view($id = 1);	
		date_default_timezone_set($data['setting_data']->timezone);
	}
	
	// 12.2) Color data
	public function single_color_data($class_section){
		return $color_code = $this->model->single_color_data($class_section);
	}
	
	
	
}
