<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');	

/****************************
    Model Map
	1) Site Title
	2) Site Footer
	3) Meta Tag
	4) Page List
	5) Category and Tags
		5.1) Category  List	
		5.2) Container Category  List	
		5.3) Sub Category List	
		5.4) Category View	
		5.5) News Count by Category
		5.6) Single Category Data
		5.7) Tags View	
		5.8) News Count by Tags
	6) Breaking News List	
	7) Sketch
		7.1) Sketch For Home	
		7.2) Sketch Wise News List 
		7.3) Sketch Wise Category Data
	8) Gallery List
	9) Video
		9.1) video count	
		9.2) Video List
		9.3) video page query
	10) Ad
		10.1) Header Ad 
		10.2) Sidebar Ad 
		10.3) Body Ad  
	12) Widget List
	13) Page View
		13.1) Send Message
	14) News
		14.1) Popular News List
		14.2) News Search
		14.3) Archive News Search
		14.4) News Count by Search input
		14.5) News Count by Archive Search input
		14.6) News View
		14.7) Single News Images List
		14.8) Update News Hit
		14.9) News last date
	15) User	
		15.1) User view
		15.2) User News
	16) Notice List
	17) Poll
	18) Setting
		18.1) Time Zone
		18.2) Color Data
	19) Add site visitor
****************************/

class md_home extends CI_Model {	
	// 1) Site Title
	public function site_title($id){
		$this->db->where('id', $id);
		$query = $this->db->get('seo');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	
	// 2) Site Footer
	public function site_footer($id){
		$this->db->where('id', $id);
		$query = $this->db->get('general_setting');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	
	// 3) Meta Tag
	public function meta_tag($id){
		$this->db->where('id', $id);
		$query = $this->db->get('seo');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	
	// 4) Page List
	public function page_list(){
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('page');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 5) Category	
	// 5.1) Category  List
	public function category_list(){
		$this->db->order_by('title', 'asc');
		$query = $this->db->get('category');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 5.2) Container Category  List
	public function container_category_list(){
		$this->db->order_by('title', 'asc');
		$this->db->where('parent_id', 0);
		$query = $this->db->get('category');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 5.3) Sub Category List
	public function sub_category_list($id){
		$this->db->order_by('title', 'asc');
		$this->db->where('parent_id', $id);
		$query = $this->db->get('category');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 5.4) Category View
	public function category_view($id, $limit, $offset){		
		$this->db->select('*');
		$this->db->join('category', 'category.id = news.category_id', 'LEFT');
		$this->db->join('user', 'user.id = news.publisher_id', 'LEFT');		
		
		$this->db->select("category.id AS 'category_id'");
		$this->db->select("category.title AS 'category_title'");
		$this->db->select("category.publisher_id AS 'category_publisher_id'");
		$this->db->select("category.published AS 'category_published'");
		
		$this->db->select("news.id AS 'id'");
		$this->db->select("news.title AS 'news_title'");
		$this->db->select("news.image AS 'news_image'");
		$this->db->select("news.publisher_id AS 'news_publisher_id'");
		$this->db->select("news.status AS 'news_position'");
		$this->db->select("news.published AS 'news_published'");
		
		$this->db->select("user.first_name AS 'publisher_name'");
		$this->db->select("user.position AS 'publisher_position'");
		
		$this->db->order_by('news.id', 'desc');
		$this->db->where('category.id', $id);
		$this->db->where('news.status', 1);
		$this->db->limit($limit);
		$this->db->offset($offset);
		$query = $this->db->get('news');		
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 5.5) News Count by Category
	public function count_news_by_category($id){		
		$this->db->where('category_id', $id);
		$this->db->where('news.status', 1);
		$total_news = $this->db->get('news');
		return $total_news->num_rows();
	}
	
	// 5.6) Single Category Data
	public function single_category_data($id){			
		$this->db->where('id', $id);
		$query = $this->db->get('category');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	
	// 5.7) Tag View
	public function tag_view($tag, $limit, $offset){		
		$this->db->select('*');
		$this->db->join('category', 'category.id = news.category_id', 'LEFT');
		$this->db->join('user', 'user.id = news.publisher_id', 'LEFT');		
		
		$this->db->select("category.id AS 'category_id'");
		$this->db->select("category.title AS 'category_title'");
		$this->db->select("category.publisher_id AS 'category_publisher_id'");
		$this->db->select("category.published AS 'category_published'");
		
		$this->db->select("news.id AS 'id'");
		$this->db->select("news.title AS 'news_title'");
		$this->db->select("news.image AS 'news_image'");
		$this->db->select("news.publisher_id AS 'news_publisher_id'");
		$this->db->select("news.status AS 'news_position'");
		$this->db->select("news.published AS 'news_published'");
		
		$this->db->select("user.first_name AS 'publisher_name'");
		$this->db->select("user.position AS 'publisher_position'");
		
		$this->db->order_by('news.id', 'desc');	
		$this->db->like('news.tags', $tag);
		$this->db->where('news.status', 1);
		$this->db->limit($limit);
		$this->db->offset($offset);
		$query = $this->db->get('news');		
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 5.8) News Count by Tag
	public function count_news_by_tag($tag){
		$this->db->like('tags', $tag);	
		$this->db->where('news.status', 1);
		$total_news = $this->db->get('news');
		return $total_news->num_rows();
	}
	
	// 6) Breaking News List
	public function breaking_news_list(){
		$this->db->limit(8);
		$this->db->where('category_id', 1);
		$this->db->where('news.status', 1);
		$this->db->order_by('news.id', 'desc');
		$query = $this->db->get('news');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 7) Sketch
	// 7.1) Sketch For Home
	public function home_sketch($id){
		$this->db->where('id', $id);
		$query = $this->db->get('sketch');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	
	// 7.2) Sketch Wise News List
	public function sketch_news_list($id, $limit, $offset){			
		$this->db->select('*');
		$this->db->join('category', 'category.id = news.category_id', 'LEFT');
		$this->db->join('user', 'user.id = news.publisher_id', 'LEFT');		
		
		$this->db->select("category.id AS 'category_id'");
		$this->db->select("category.title AS 'category_title'");
		$this->db->select("category.publisher_id AS 'category_publisher_id'");
		$this->db->select("category.published AS 'category_published'");
		
		$this->db->select("news.id AS 'id'");
		$this->db->select("news.title AS 'news_title'");
		$this->db->select("news.image AS 'news_image'");
		$this->db->select("news.publisher_id AS 'news_publisher_id'");
		$this->db->select("news.status AS 'news_position'");
		$this->db->select("news.published AS 'news_published'");
		
		$this->db->select("user.first_name AS 'publisher_name'");
		$this->db->select("user.position AS 'publisher_position'");
		
		$this->db->order_by('news.id', 'desc');
		$this->db->where('category.id', $id);
		$this->db->where('news.status', 1);
		$this->db->limit($limit);
		$this->db->offset($offset);
		$query = $this->db->get('news');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 7.3) Sketch Wise Category Title
	public function sketch_category_data($id){	
		$this->db->where('id', $id);
		$query = $this->db->get('category');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	
	// 8) Gallery List
	public function gallery_list(){
		$this->db->order_by('id', 'DESC');
		$this->db->limit(5);
		$query = $this->db->get('gallery');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 9) Video	
	// 9.1) video count	
	public function count_video(){	
		$total_video = $this->db->get('video');
		return $total_video->num_rows();
	}
	
	// 9.2) video List
	public function video_list($limit, $offset){
		$this->db->order_by('id', 'DESC');
		$this->db->limit($limit);
		$this->db->offset($offset);
		$query = $this->db->get('video');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 9.3) video page query	
	public function video_page($limit, $offset){			
		$this->db->order_by('id', 'desc');
		$this->db->limit($limit);
		$this->db->offset($offset);
		$query = $this->db->get('video');		
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}	
	
	// 10) Ad
	// 10.1) Header Ad
	public function header_ad(){
		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		$this->db->where('type', 'Header');
		$this->db->where('status', 1);
		$query = $this->db->get('ad');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 10.2) Sidebar Ad
	public function sidebar_ad($limit, $offset){
		$this->db->order_by('id', 'DESC');
		$this->db->limit($limit);
		$this->db->offset($offset);
		$this->db->where('type', 'Sidebar');
		$this->db->where('status', 1);
		$query = $this->db->get('ad');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 10.3) Body Ad
	public function body_ad($limit, $offset){
		$this->db->order_by('id', 'DESC');
		$this->db->limit($limit);
		$this->db->offset($offset);
		$this->db->where('type', 'Body');
		$this->db->where('status', 1);
		$query = $this->db->get('ad');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 12) Widget List
	public function widget_list(){
		$this->db->where('status', 1);
		$this->db->order_by('id', 'ASC');
		$query = $this->db->get('widget');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 13) Page View
	public function page_view($id){
		$this->db->where('id', $id);
		$query = $this->db->get('page');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	
	// 13.1) Send Message	
	public function send_message($data){
		$this->db->insert('message', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	
	// 14) News 
	// 14.1.1) Exclusive News List
	public function exclusive_news_list(){
		$this->db->order_by('id', 'DESC');
		$this->db->limit(10);
		$this->db->where('news.exclusive', 1);
		$this->db->where('news.status', 1);
		$query = $this->db->get('news');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 14.1.2) Recent News List
	public function recent_news_list(){
		$this->db->order_by('id', 'DESC');
		$this->db->limit(10);
		$this->db->where('news.status', 1);
		$query = $this->db->get('news');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 14.1.3) Popular News List
	public function popular_news(){
		$this->db->order_by('hit', 'DESC');
		$this->db->limit(10);
		$this->db->where('news.status', 1);
		$query = $this->db->get('news');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	// 14.2) News Search	
	public function news_search($input, $limit, $offset){			
		$this->db->select('*');
		$this->db->join('category', 'category.id = news.category_id', 'LEFT');
		$this->db->join('user', 'user.id = news.publisher_id', 'LEFT');		
		
		$this->db->select("category.id AS 'category_id'");
		$this->db->select("category.title AS 'category_title'");
		$this->db->select("category.publisher_id AS 'category_publisher_id'");
		$this->db->select("category.published AS 'category_published'");
		
		$this->db->select("news.id AS 'id'");
		$this->db->select("news.title AS 'news_title'");
		$this->db->select("news.image AS 'news_image'");
		$this->db->select("news.publisher_id AS 'news_publisher_id'");
		$this->db->select("news.status AS 'news_position'");
		$this->db->select("news.published AS 'news_published'");
		
		$this->db->select("user.first_name AS 'publisher_name'");
		$this->db->select("user.position AS 'publisher_position'");
		
		$this->db->order_by('news.id', 'desc');
		$this->db->like('news.title', $input);
		$this->db->where('news.status', 1);
		$this->db->limit($limit);
		$this->db->offset($offset);
		$query = $this->db->get('news');		
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 14.3) Archive News Search	
	public function archive_news_search($search_date, $limit, $offset){			
		$this->db->select('*');
		$this->db->join('category', 'category.id = news.category_id', 'LEFT');
		$this->db->join('user', 'user.id = news.publisher_id', 'LEFT');		
		
		$this->db->select("category.id AS 'category_id'");
		$this->db->select("category.title AS 'category_title'");
		$this->db->select("category.publisher_id AS 'category_publisher_id'");
		$this->db->select("category.published AS 'category_published'");
		
		$this->db->select("news.id AS 'id'");
		$this->db->select("news.title AS 'news_title'");
		$this->db->select("news.image AS 'news_image'");
		$this->db->select("news.publisher_id AS 'news_publisher_id'");
		$this->db->select("news.status AS 'news_position'");
		$this->db->select("news.published AS 'news_published'");
		
		$this->db->select("user.first_name AS 'publisher_name'");
		$this->db->select("user.position AS 'publisher_position'");
		
		$this->db->order_by('news.id', 'desc');
		$this->db->like('news.published', $search_date);
		$this->db->where('news.status', 1);
		$this->db->limit($limit);
		$this->db->offset($offset);
		$query = $this->db->get('news');		
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 14.4) News Count by Search input
	public function count_news_by_search_input($input){		
		$this->db->like('news.title', $input);
		$this->db->where('news.status', 1);
		$total_news = $this->db->get('news');
		return $total_news->num_rows();
	}
	
	// 14.5) News Count by Archive Search input
	public function count_news_by_archive_search_input($search_date){	
		$this->db->like('published', $search_date);
		$this->db->where('news.status', 1);
		$total_news = $this->db->get('news');
		return $total_news->num_rows();
	}
	
	// 14.6) News View
	public function news_view($slug){			
		$this->db->select('*');
		$this->db->join('category', 'category.id = news.category_id', 'LEFT');
		$this->db->join('user', 'user.id = news.publisher_id', 'LEFT');		
		
		$this->db->select("category.id AS 'category_id'");
		$this->db->select("category.title AS 'category_title'");
		$this->db->select("category.publisher_id AS 'category_publisher_id'");
		$this->db->select("category.published AS 'category_published'");
		
		$this->db->select("news.id AS 'id'");
		$this->db->select("news.title AS 'news_title'");
		$this->db->select("news.image AS 'news_image'");
		$this->db->select("news.publisher_id AS 'news_publisher_id'");
		$this->db->select("news.status AS 'news_position'");
		$this->db->select("news.published AS 'news_published'");
		
		$this->db->select("user.first_name AS 'publisher_name'");
		$this->db->select("user.position AS 'publisher_position'");
		
		$this->db->where('slug', $slug);
		$this->db->where('news.status', 1);
		$query = $this->db->get('news');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	
	// 14.7) Single News Images List
	public function single_news_images_list($id){
		$this->db->where('news_id', $id);
		$query = $this->db->get('news_extra_images');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 14.8) Update News Hit
	function update_hit_count($slug) {
		$this->db->where('slug', $slug);
		$this->db->select('hit');
		$count = $this->db->get('news')->row();
		
		// increase by one 
		$this->db->where('slug', $slug);
		$this->db->set('hit', ($count->hit + 1));
		$this->db->update('news');
	}
	
	// 14.9) News last date
	public function news_last_date(){
		$this->db->limit(1);		
		$this->db->order_by('published', 'desc');
		$query = $this->db->get('news');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	
	// 15) User
		// 15.1) User view
	public function user_view($id){
		$this->db->where('id', $id);
		$query = $this->db->get('user');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	
	// 15.2) User News
	public function user_news($id){			
		$this->db->select('*');
		$this->db->join('category', 'category.id = news.category_id', 'LEFT');
		$this->db->join('user', 'user.id = news.publisher_id', 'LEFT');		
		
		$this->db->select("category.id AS 'category_id'");
		$this->db->select("category.title AS 'category_title'");
		$this->db->select("category.publisher_id AS 'category_publisher_id'");
		$this->db->select("category.published AS 'category_published'");
		
		$this->db->select("news.id AS 'id'");
		$this->db->select("news.title AS 'news_title'");
		$this->db->select("news.image AS 'news_image'");
		$this->db->select("news.publisher_id AS 'news_publisher_id'");
		$this->db->select("news.status AS 'news_position'");
		$this->db->select("news.published AS 'news_published'");
		
		$this->db->select("user.first_name AS 'publisher_name'");
		$this->db->select("user.position AS 'publisher_position'");
		
		$this->db->order_by('news.id', 'desc');
		$this->db->where('news.publisher_id', $id);
		$this->db->where('news.status', 1);
		$query = $this->db->get('news');		
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 5.5) News Count by Category
	public function count_news_by_categorya($id){		
		$this->db->where('category_id', $id);
		$this->db->where('news.status', 1);
		$total_news = $this->db->get('news');
		return $total_news->num_rows();
	}
	
	// 16) Notice List
	public function notice_list($limit, $offset){
		$this->db->order_by('id', 'DESC');
		$this->db->limit($limit);
		$this->db->offset($offset);
		$query = $this->db->get('notice');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 17) Poll
	// 17.1) Poll List
	public function poll_list(){
		$this->db->order_by('id', 'desc');
		$this->db->where('status', 1);
		$query = $this->db->get('poll');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 17.2) Poll Options List
	public function poll_options_list($poll_id){
		$this->db->order_by('id', 'asc');
		$this->db->where('poll_id', $poll_id);
		$query = $this->db->get('poll_option');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 17.3) Add vote
	function add_vote($poll_option_id) {
		$this->db->where('id', $poll_option_id);
		$this->db->select('vote');
		$count = $this->db->get('poll_option')->row();
		
		// increase by one 
		$this->db->where('id', $poll_option_id);
		$this->db->set('vote', ($count->vote + 1));
		$this->db->update('poll_option');
	}
	
	// 18) Setting
	// 18.1) Single Setting View
	public function single_setting_view($id){
		$this->db->where('id', $id);
		$query = $this->db->get('general_setting');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}	
	
	// 18.2) Color Data
	public function single_color_data($class_section){
		$this->db->where('section_class', $class_section);
		$query = $this->db->get('color_setting');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}	
	
	// 19) Add site visitor
	public function add_site_visitor($data){
		$this->db->insert('visitor', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	

 }