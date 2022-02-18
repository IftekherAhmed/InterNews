<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/****************************
    Model Map
	1) Count
	2) Site Title
	3) Site Footer
	4) Dashboard
		4.1) Draft
	5) Category
	6) Message
	7) Notice
	8) Page
	9) News	
	10) Gallery
	11) Video
	12) Ad
		12.1) Header Ad
		12.2) Sidebar Ad
		12.3) Body Ad
	13) SEO
	14) Widget
	15) Poll
	16) User
	17) User Permission
	18) Sketch
	19) Setting
****************************/

class md_backend extends CI_Model {		
	// 1.1) Draft Count	
	public function total_draft(){	
		$total_number = $this->db->get('draft');
		if($total_number->num_rows() >= 1){
			$result = $total_number->num_rows();
		}else{
			$result = 0;
		}
		return $result;
	}	
	
	// 1.2) Category Count	
	public function total_category(){
		$total_number = $this->db->get('category');
		if($total_number->num_rows() >= 1){
			$result = $total_number->num_rows();
		}else{
			$result = 0;
		}
		return $result;
	}
	
	// 1.3.1) Message Count	
	public function total_message(){
		$total_number = $this->db->get('message');
		if($total_number->num_rows() >= 1){
			$result = $total_number->num_rows();
		}else{
			$result = 0;
		}
		return $result;
	}
	
	// 1.3.2) Unseen Message Count	
	public function total_unseen_message(){
		$this->db->where('watched', 0);
		$this->db->where('type', 'received');
		$total_number = $this->db->get('message');
		if($total_number->num_rows() >= 1){
			$result = $total_number->num_rows();
		}else{
			$result = 0;
		}
		return $result;
	}
	
	// 1.3.2) Send Message Count	
	public function total_send_message(){
		$this->db->where('type', 'send');
		$total_number = $this->db->get('message');
		if($total_number->num_rows() >= 1){
			$result = $total_number->num_rows();
		}else{
			$result = 0;
		}
		return $result;
	}
	
	// 1.4) Notice Count	
	public function total_notice(){	
		$total_number = $this->db->get('notice');
		if($total_number->num_rows() >= 1){
			$result = $total_number->num_rows();
		}else{
			$result = 0;
		}
		return $result;
	}
	
	// 1.5) Page Count	
	public function total_page(){	
		$total_number = $this->db->get('page');
		if($total_number->num_rows() >= 1){
			$result = $total_number->num_rows();
		}else{
			$result = 0;
		}
		return $result;
	}	
	
	// 1.6.1) News Count	
	public function total_news(){	
		$total_number = $this->db->get('news');
		if($total_number->num_rows() >= 1){
			$result = $total_number->num_rows();
		}else{
			$result = 0;
		}
		return $result;
	}	
	
	// 1.6.2) Pending News Count	
	public function total_pending_news(){	
		$this->db->where('status', 0);
		$total_number = $this->db->get('news');
		if($total_number->num_rows() >= 1){
			$result = $total_number->num_rows();
		}else{
			$result = 0;
		}
		return $result;
	}
	
	// 1.6.3) Pending News Count	
	public function total_news_addional_images(){	
		$total_number = $this->db->get('news_extra_images');
		if($total_number->num_rows() >= 1){
			$result = $total_number->num_rows();
		}else{
			$result = 0;
		}
		return $result;
	}
	
	// 1.7) Gallery Count			
	public function total_gallery(){
		$total_number = $this->db->get('gallery');
		if($total_number->num_rows() >= 1){
			$result = $total_number->num_rows();
		}else{
			$result = 0;
		}
		return $result;
	}
	
	// 1.8) Video Count	
	public function total_video(){	
		$total_number = $this->db->get('video');
		if($total_number->num_rows() >= 1){
			$result = $total_number->num_rows();
		}else{
			$result = 0;
		}
		return $result;
	}	
	
	// 1.9) Ad Count
	public function total_ad(){
		$total_number = $this->db->get('ad');
		if($total_number->num_rows() >= 1){
			$result = $total_number->num_rows();
		}else{
			$result = 0;
		}
		return $result;
	}
	
	// 1.10) Widget Count	
	public function total_widget(){	
		$total_number = $this->db->get('widget');
		if($total_number->num_rows() >= 1){
			$result = $total_number->num_rows();
		}else{
			$result = 0;
		}
		return $result;
	}
	
	// 1.11) Poll Count	
	public function total_poll(){	
		$total_number = $this->db->get('poll');
		if($total_number->num_rows() >= 1){
			$result = $total_number->num_rows();
		}else{
			$result = 0;
		}
		return $result;
	}
	
	// 1.12.1) User Count	
	public function total_user(){	
		$total_number = $this->db->get('user');
		if($total_number->num_rows() >= 1){
			$result = $total_number->num_rows();
		}else{
			$result = 0;
		}
		return $result;
	}
	
	// 1.12.2) Admin Count	
	public function total_admin(){	
		$this->db->where('position', 'Admin');
		$total_number = $this->db->get('user');
		if($total_number->num_rows() >= 1){
			$result = $total_number->num_rows();
		}else{
			$result = 0;
		}
		return $result;
	}
	
	// 1.12.3) Moderator Count	
	public function total_moderator(){	
		$this->db->where('position', 'Moderator');
		$total_number = $this->db->get('user');
		if($total_number->num_rows() >= 1){
			$result = $total_number->num_rows();
		}else{
			$result = 0;
		}
		return $result;
	}
	
	// 1.12.4) Reporter Count	
	public function total_reporter(){	
		$this->db->where('position', 'Reporter');
		$total_number = $this->db->get('user');
		if($total_number->num_rows() >= 1){
			$result = $total_number->num_rows();
		}else{
			$result = 0;
		}
		return $result;
	}
	
	// 2) Site Title
	public function site_title($id){
		$this->db->where('id', $id);
		$query = $this->db->get('seo');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	
	// 3) Site Footer
	public function site_footer($id){
		$this->db->where('id', $id);
		$query = $this->db->get('general_setting');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	
	// 4.1.1) Show Draft
	public function show_draft(){		
		$this->db->select('*');
		$this->db->join('user', 'user.id = draft.publisher_id', 'LEFT');

		$this->db->select("user.id AS 'publisher_id'");
		$this->db->select("user.first_name AS 'publisher_name'");	
		
		$this->db->select("draft.title AS 'draft_title'");
		$this->db->select("draft.published AS 'draft_published'");
		$this->db->select("draft.id AS 'id'");
		
		$this->db->order_by('draft.id', 'desc');
		$query = $this->db->get('draft');		
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 4.1.2) Single Draft Data
	public function single_draft_data($id){
		$this->db->where('id', $id);
		$query = $this->db->get('draft');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	
	// 4.1.3) Add Draft
	public function add_draft($data){
		$this->db->insert('draft', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 4.1.4) Edit Draft
	public function edit_draft($id, $data){
		$this->db->where('id', $id);
		$this->db->update('draft', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 4.1.5) Delete Draft
	function delete_draft($id){
		$this->db->where('id', $id);
		$this->db->delete('draft');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 4.2.1) Show Last Week Date
	public function last_week_data(){
		$this->db->where('published BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('news');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}	
	
	// 4.3.1) Show site visitor
	public function show_site_visitor(){		
		$this->db->select("count(id) as total");
		$this->db->select("date as date");
		$this->db->group_by('date'); 
		$this->db->order_by('date', 'desc');
		$this->db->limit(15);
		$query = $this->db->get('visitor');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}		
	
	// 4.3.2) Add site visitor
	public function add_site_visitor($data){
		$this->db->insert('visitor', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}	
	
	// 5.1) Show Category
	public function show_category(){		
		$this->db->select('*');
		$this->db->join('user', 'user.id = category.publisher_id', 'LEFT');
		
		$this->db->select("user.id AS 'publisher_id'");
		$this->db->select("user.first_name AS 'publisher_name'");	
		
		$this->db->select("category.title AS 'category_title'");
		$this->db->select("category.published AS 'category_published'");
		$this->db->select("category.id AS 'id'");
		
		$this->db->order_by('category.id', 'desc');
		$query = $this->db->get('category');		
		
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 5.2) Single Category Data
	public function single_category_data($id){
		$this->db->where('id', $id);
		$query = $this->db->get('category');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	
	// 5.3) Parent Category Name
	public function parent_category_name($id){
		$this->db->where('id', $id);
		$query = $this->db->get('category');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	
	// 5.4) Parent Category Type Set
	public function parent_type_set($id){
		$data = array(
		'type'         => 'Parent',
		'parent_id'    => '',
		'parent_title' => ''
		);
		$this->db->where('id', $id);
		$this->db->update('category', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 5.5) Add Category
	public function add_category($data){
		$this->db->insert('category', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 5.6) Edit Category
	public function edit_category($id, $data){
		$this->db->where('id', $id);
		$this->db->update('category', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 5.7) Delete Category
	function delete_category($id){
		$this->db->where('id', $id);
		$this->db->delete('category');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 6.1) Show Message
	public function show_message(){
		$this->db->where('type', 'received');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('message');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	public function show_send_message(){
		$this->db->where('type', 'send');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('message');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 6.2) Single Message Data
	public function single_message_data($id){
		$this->db->where('id', $id);
		$query = $this->db->get('message');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	
	// 6.3) Edit Message Watched
	public function message_watched($id){
		$data = array('watched' => 1);   
		$this->db->where('id', $id);
		$this->db->update('message', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 6.4) Send Mail
	public function send_mail($data){
		$this->db->insert('message', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 6.5) Reply Mail
	public function reply_mail($data){
		$this->db->insert('message', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 6.6) Delete message
	function delete_message($id){
		$this->db->where('id', $id);
		$this->db->delete('message');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 7.1) Show Notice
	public function show_notice(){
		$this->db->select('*');
		$this->db->join('user', 'user.id = notice.publisher_id', 'LEFT');
		
		$this->db->select("notice.id AS 'id'");
		$this->db->select("notice.publisher_id AS 'publisher_id'");
		$this->db->select("notice.published AS 'ad_published'");
		
		$this->db->select("user.first_name AS 'publisher_name'");		
		
		$this->db->order_by('notice.id', 'desc');
		$query = $this->db->get('notice');	
		
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 7.2) Single Notice Data
	public function single_notice_data($id){
		$this->db->where('id', $id);
		$query = $this->db->get('notice');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	
	// 7.3) Add Notice
	public function add_notice($data){
		$this->db->insert('notice', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 7.4) Edit Notice
	public function edit_notice($id, $data){
		$this->db->where('id', $id);
		$this->db->update('notice', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 7.4) Delete Notice
	function delete_notice($id){
		$this->db->where('id', $id);
		$this->db->delete('notice');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 8.1) Show page
	public function show_page(){	
		$this->db->select('*');
		$this->db->join('user', 'user.id = page.publisher_id', 'LEFT');	
		
		$this->db->select("user.id AS 'publisher_id'");
		$this->db->select("user.first_name AS 'publisher_name'");	
		
		$this->db->select("page.title AS 'page_title'");
		$this->db->select("page.published AS 'page_published'");
		$this->db->select("page.id AS 'id'");
		
		$this->db->order_by('page.id', 'desc');
		$query = $this->db->get('page');	
		
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 8.2) Single page Data
	public function single_page_data($id){
		$this->db->where('id', $id);
		$query = $this->db->get('page');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	
	// 8.3) Add page
	public function add_page($data){
		$this->db->insert('page', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 8.4) Edit page
	public function edit_page($id, $data){
		$this->db->where('id', $id);
		$this->db->update('page', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 8.5) Delete page
	function delete_page($id){
		$this->db->where('id', $id);
		$this->db->delete('page');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 9.1) Show News
	public function show_news(){	
		$this->db->select('*');
		$this->db->join('category', 'category.id = news.category_id', 'LEFT');
		$this->db->join('user', 'user.id = news.publisher_id', 'LEFT');		
		
		$this->db->select("category.id AS 'category_id'");
		$this->db->select("category.title AS 'category_title'");
		$this->db->select("category.publisher_id AS 'category_publisher_id'");
		$this->db->select("category.published AS 'category_published'");
		
		$this->db->select("user.id AS 'user_id'");
		$this->db->select("user.first_name AS 'news_publisher_name'");
		$this->db->select("user.position AS 'news_publisher_positon'");
		$this->db->select("user.image AS 'publisher_image'");
		
		$this->db->select("news.title AS 'news_title'");
		$this->db->select("news.status AS 'news_status'");
		$this->db->select("news.publisher_id AS 'news_publisher_id'");
		$this->db->select("news.published AS 'news_published'");
		$this->db->select("news.id AS 'id'");
		$this->db->select("news.image AS 'image'");
		
		$this->db->order_by('news.id', 'desc');
		$query = $this->db->get('news');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 9.2.1) Single News Data
	public function single_news_data($id){
		$this->db->where('id', $id);
		$query = $this->db->get('news');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	
	// 9.2.2) Multiple News Data
	public function multiple_news_data($id){
		$this->db->where_in('id', $id);
		$query = $this->db->get('news');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 9.3) News View
	public function news_view($slug){		
		$this->db->select('*');
		$this->db->join('category', 'category.id = news.category_id', 'LEFT');
		$this->db->join('user', 'user.id = news.publisher_id', 'LEFT');	
		
		$this->db->select("category.id AS 'category_id'");
		$this->db->select("category.title AS 'category_title'");
		$this->db->select("category.publisher_id AS 'category_publisher_id'");
		$this->db->select("category.published AS 'category_published'");
		
		$this->db->select("user.id AS 'user_id'");
		$this->db->select("user.first_name AS 'news_publisher_name'");
		$this->db->select("user.position AS 'news_publisher_positon'");
		$this->db->select("user.image AS 'publisher_image'");
		
		$this->db->select("news.title AS 'news_title'");
		$this->db->select("news.status AS 'news_status'");
		$this->db->select("news.publisher_id AS 'news_publisher_id'");
		$this->db->select("news.published AS 'news_published'");
		$this->db->select("news.id AS 'id'");
		$this->db->select("news.image AS 'image'");
		
		$this->db->where('news.slug', $slug);
		$query = $this->db->get('news');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	
	// 9.4) Show User News List
	public function show_user_news($id){	
		$this->db->select('*');
		$this->db->join('category', 'category.id = news.category_id', 'LEFT');
		$this->db->join('user', 'user.id = news.publisher_id', 'LEFT');	
		
		$this->db->select("category.id AS 'category_id'");
		$this->db->select("category.title AS 'category_title'");
		$this->db->select("category.publisher_id AS 'category_publisher_id'");
		$this->db->select("category.published AS 'category_published'");
		
		$this->db->select("user.id AS 'user_id'");
		$this->db->select("user.first_name AS 'news_publisher_name'");
		$this->db->select("user.position AS 'news_publisher_positon'");
		$this->db->select("user.image AS 'publisher_image'");
		
		$this->db->select("news.title AS 'news_title'");
		$this->db->select("news.status AS 'news_status'");
		$this->db->select("news.publisher_id AS 'news_publisher_id'");
		$this->db->select("news.published AS 'news_published'");
		$this->db->select("news.id AS 'id'");
		$this->db->select("news.image AS 'image'");
		
		$this->db->where('news.publisher_id', $id);		
		$this->db->order_by('news.id', 'desc');		
		$query = $this->db->get('news');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 9.5) User News Count
	public function user_news_count($id){
		$this->db->where('publisher_id', $id);
		$total_number = $this->db->get('news');
		return $total_number->num_rows();
	}	
	
	// 9.6) Update News Hit
	function update_hit_count($slug) {
		$this->db->where('slug', $slug);
		$this->db->select('hit');
		$count = $this->db->get('news')->row();
		
		// increase by one 
		$this->db->where('slug', $slug);
		$this->db->set('hit', ($count->hit + 1));
		$this->db->update('news');
	}
	
	// 9.7) Add News
	public function add_news($data){	
		if(isset($data['category_id'])){
			$i = 0;
			foreach($data['category_id'] as $category_id){
				$data = array(
					'category_id'    =>  $category_id,
					'image'          =>  $data['image'],
					'image_caption'  =>  $data['image_caption'],
					'video_link'     =>  $data['video_link'],
					'title'          =>  $data['title'],
					'sub_title'      =>  $data['sub_title'],
					'slug'           =>  $data['slug'].$category_id,
					'description'    =>  $data['description'],
					'tags'           =>  $data['tags'],
					'status'         =>  $data['status'],
					'exclusive'      =>  $data['exclusive'],
					'publisher_id'   =>  $data['publisher_id'],
					'news_courtesy'  =>  $data['news_courtesy'],
					'news_behalf_as' =>  $data['news_behalf_as']
				);
				$this->db->insert('news', $data);
				$i++;
			}
		}else{
			$data['category_id'] = 1;
			$this->db->insert('news', $data);
		}		
		
		if($this->db->affected_rows() > 0){
			$insert_id = $this->db->insert_id();
		   return  $insert_id;
		}else{
			return false;
		}
		
	}
	
	// 9.8) Quick Edit News
	public function quick_edit_news($id, $data){
		$this->db->where('id', $id);
		$this->db->update('news', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 9.9) Edit News
	public function edit_news($id, $data){
		$this->db->where('id', $id);
		$this->db->update('news', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 9.10.1) Delete News
	function delete_news($id){
		$this->db->where('id', $id);
		$this->db->delete('news');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 9.10.2) Delete Multiple News
	function delete_multiple_news($news_id){
		$this->db->where_in('id', $news_id);
		$this->db->delete('news');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}	
	
	// 9.11) Add News extra imgaes
	public function add_news_extra_images($data){
		$this->db->insert('news_extra_images', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 9.12.1) News extra imgaes list
	public function news_images_list(){		
		$this->db->select('*');
		$this->db->join('user', 'user.id = news_extra_images.publisher_id', 'LEFT');
		
		$this->db->select("user.first_name AS 'publisher_name'");
		$this->db->select("user.image AS 'publisher_image'");
		
		$this->db->select("news_extra_images.image AS 'news_extra_image'");
		$this->db->select("news_extra_images.published AS 'news_extra_images_published'");
		$this->db->select("news_extra_images.publisher_id AS 'news_extra_images_publisher_id'");
		$this->db->select("news_extra_images.id AS 'id'");
		
		$this->db->order_by('news_extra_images.id', 'desc');

		$query = $this->db->get('news_extra_images');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 9.12.2) News extra imgaes list for add news page
	public function news_images_list_add_news_page(){		
		$this->db->select('*');
		$this->db->join('user', 'user.id = news_extra_images.publisher_id', 'LEFT');
		
		$this->db->select("user.first_name AS 'publisher_name'");
		$this->db->select("user.image AS 'publisher_image'");
		
		$this->db->select("news_extra_images.image AS 'news_extra_image'");
		$this->db->select("news_extra_images.published AS 'news_extra_images_published'");
		$this->db->select("news_extra_images.publisher_id AS 'news_extra_images_publisher_id'");
		$this->db->select("news_extra_images.id AS 'id'");
		
		$this->db->limit(12);
		$this->db->order_by('news_extra_images.id', 'desc');

		$query = $this->db->get('news_extra_images');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 9.13.1) Single News extra imgaes list
	public function single_news_images_list($id){
		$this->db->where('news_id', $id);
		$query = $this->db->get('news_extra_images');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 9.13.2) Multiple News extra imgaes list
	public function multiple_news_images_list($id){
		$this->db->where_in('news_id', $id);
		$query = $this->db->get('news_extra_images');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 9.14.1) News' Single extra imgae data
	public function news_single_images_data($id){
		$this->db->where('id', $id);
		$query = $this->db->get('news_extra_images');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	
	// 9.14.2) News' Multiple extra imgaes data
	public function news_multiple_images_data($id){
		$this->db->where_in('id', $id);
		$query = $this->db->get('news_extra_images');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 9.15) Edit News extra image
	public function edit_news_extra_images($id, $data){
		$this->db->where('id', $id);
		$this->db->update('news_extra_images', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 9.16.1) Delete News extra image
	function delete_news_extra_images($id){
		$this->db->where('id', $id);
		$this->db->delete('news_extra_images');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 9.16.2) Delete News multiple extra image
	function delete_news_multiple_extra_images($images_id){
		$this->db->where_in('id', $images_id);
		$this->db->delete('news_extra_images');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 9.16.3) Delete News extra image group
	function delete_news_extra_images_group($id){
		$this->db->where('news_id', $id);
		$this->db->delete('news_extra_images');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 9.16.4) Delete Multiple News extra image
	function delete_multiple_news_extra_images($news_id){
		$this->db->where_in('news_id', $news_id);
		$this->db->delete('news_extra_images');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 10.1) Show Gallery
	public function show_gallery(){	
		$this->db->select('*');
		$this->db->join('user', 'user.id = gallery.publisher_id', 'LEFT');
		
		$this->db->select("user.first_name AS 'publisher_name'");
		$this->db->select("user.image AS 'publisher_image'");
		
		$this->db->select("gallery.image AS 'gallery_image'");
		$this->db->select("gallery.published AS 'gallery_published'");
		$this->db->select("gallery.publisher_id AS 'gallery_publisher_id'");
		$this->db->select("gallery.id AS 'id'");
		
		$this->db->order_by('gallery.id', 'desc');
		$query = $this->db->get('gallery');	
		
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 10.2) Single Gallery Data
	public function single_gallery_data($id){
		$this->db->where('id', $id);
		$query = $this->db->get('gallery');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	
	// 10.3) Add Gallery
	public function add_gallery($data){
		$this->db->insert('gallery', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 10.4) Edit Gallery
	public function edit_gallery($id, $data){
		$this->db->where('id', $id);
		$this->db->update('gallery', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 10.5) Delete Gallery
	function delete_gallery($id){
		$this->db->where('id', $id);
		$this->db->delete('gallery');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 11.1) Show Video
	public function show_video(){
		$this->db->select('*');
		$this->db->join('user', 'user.id = video.publisher_id', 'LEFT');
		
		$this->db->select("user.id AS 'publisher_id'");
		$this->db->select("user.first_name AS 'publisher_name'");
		
		$this->db->select("video.published AS 'video_published'");
		$this->db->select("video.id AS 'id'");
		
		$this->db->order_by('video.id', 'desc');
		$query = $this->db->get('video');	
		
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 11.2) Single Video Data
	public function single_video_data($id){
		$this->db->where('id', $id);
		$query = $this->db->get('video');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	
	// 11.3) Add Video
	public function add_video($data){
		$this->db->insert('video', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 11.4) Edit Video
	public function edit_video($id, $data){
		$this->db->where('id', $id);
		$this->db->update('video', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	// 11.5) Delete Video
	function delete_video($id){
		$this->db->where('id', $id);
		$this->db->delete('video');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}	
	
	// 12.1) Show Ad
	public function show_ad(){
		$this->db->select('*');
		$this->db->join('user', 'user.id = ad.publisher_id', 'LEFT');
		
		$this->db->select("ad.id AS 'id'");
		$this->db->select("ad.publisher_id AS 'publisher_id'");
		$this->db->select("ad.published AS 'ad_published'");
		
		$this->db->select("user.first_name AS 'publisher_name'");
		
		$this->db->order_by('ad.type', 'desc');
		$query = $this->db->get('ad');	
		
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 12.2) Single Ad Data
	public function single_ad_data($id){
		$this->db->where('id', $id);
		$query = $this->db->get('ad');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	
	// 12.3) Add Ad
	public function add_ad($data){
		$this->db->insert('ad', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 12.4) Edit Ad
	public function edit_ad($id, $data){
		$this->db->where('id', $id);
		$this->db->update('ad', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 12.4) Delete Ad
	function delete_ad($id){
		$this->db->where('id', $id);
		$this->db->delete('ad');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 13.1) Single SEO Data
	public function single_seo_data($id){
		$this->db->where('id', $id);
		$query = $this->db->get('seo');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	
	// 13.2) Edit SEO Data
	public function edit_seo($id, $data){
		$this->db->where('id', $id);
		$this->db->update('seo', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}	
	
	// 14.1) Show Widget
	public function show_widget(){
		$this->db->select('*');
		$this->db->join('user', 'user.id = widget.publisher_id', 'LEFT');
		
		$this->db->select("widget.id AS 'id'");
		$this->db->select("widget.publisher_id AS 'publisher_id'");
		$this->db->select("widget.published AS 'widget_published'");
		
		$this->db->select("user.first_name AS 'publisher_name'");
		
		$this->db->order_by('widget.id', 'desc');
		$query = $this->db->get('widget');			
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 14.2) Single Widget Data
	public function single_widget_data($id){
		$this->db->where('id', $id);
		$query = $this->db->get('widget');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	
	// 14.3) Add Widget
	public function add_widget($data){
		$this->db->insert('widget', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 14.4) Edit Widget
	public function edit_widget($id, $data){
		$this->db->where('id', $id);
		$this->db->update('widget', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 14.5) Delete Widget
	function delete_widget($id){
		$this->db->where('id', $id);
		$this->db->delete('widget');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}	
	
	// 15.1) Show Poll
	public function show_poll(){
		$this->db->select('*');
		$this->db->join('user', 'user.id = poll.publisher_id', 'LEFT');
		
		$this->db->select("poll.id AS 'id'");
		$this->db->select("poll.publisher_id AS 'publisher_id'");
		$this->db->select("poll.published AS 'poll_published'");
		
		$this->db->select("user.first_name AS 'publisher_name'");
		
		$this->db->order_by('poll.id', 'desc');
		$query = $this->db->get('poll');			
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 15.2) Single Poll Data
	public function single_poll_data($id){
		$this->db->where('id', $id);
		$query = $this->db->get('poll');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	
	// 15.3) Add Poll
	public function add_poll($question){
		$this->db->insert('poll', $question);		
		if($this->db->affected_rows() > 0){
			$insert_id = $this->db->insert_id();
		    return  $insert_id;
		}else{
			return false;
		}
	}
	
	// 15.4) Edit Poll
	public function edit_poll($id, $data){
		$this->db->where('id', $id);
		$this->db->update('poll', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 15.5) Delete Poll
	function delete_poll($id){
		$this->db->where('id', $id);
		$this->db->delete('poll');
		$this->db->where('poll_id', $id);
		$this->db->delete('poll_option');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 15.6) Add Poll option
	public function add_poll_option($poll_id, $option){
		$i = 0;
		foreach($option as $poll_option){
			$data = array(
				'poll_id'        =>  $poll_id,
				'option'         =>  $poll_option,
				'vote'           =>  0
			);
			$this->db->insert('poll_option', $data);
			$i++;
		}
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}	
	
	// 15.7) Show Poll Options
	public function show_poll_options($id){
		$this->db->where('poll_id', $id);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('poll_option');			
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 15.8) Single Poll's options
	public function single_poll_options($id){
		$this->db->where('poll_id', $id);
		$query = $this->db->get('poll_option');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 15.9) Edit Poll otion
	public function poll_option_edit($id, $data){
		$this->db->where('id', $id);
		$this->db->update('poll_option', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 15.10 Delete Poll option
	function delete_poll_option($id){
		$this->db->where('id', $id);
		$this->db->delete('poll_option');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 16.1) Show User
	public function show_user(){
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('user');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	// 16.2) Single User Data
	public function single_user_data($id){
		$this->db->where('id', $id);
		$query = $this->db->get('user');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	// 16.3) User Email Check
	public function email_check($email){
		$this->db->where('email', $email);
		$query = $this->db->get('user');	
		if($query->num_rows() > 0){
			return false;
		}else{
			return true;
		}
	}
	
	// 16.4) Add User
	public function add_user($data){	
		$permission = array();		   
		$this->db->insert('user', $data);
		
		if($this->db->affected_rows() > 0){
			$insert_id = $this->db->insert_id();
			
			if($data['position'] == "Admin"){	
				$permission['user_id']       = $insert_id;
				$permission['add_data']      = 1;
				$permission['edit_data']     = 1;
				$permission['view_data']     = 1;
				$permission['delete_data']   = 1;
				$permission['category']      = 1;
				$permission['message']       = 1;
				$permission['page']          = 1;
				$permission['news']          = 1;
				$permission['gallery']       = 1;
				$permission['video']         = 1;
				$permission['advertisement'] = 1;
				$permission['seo']           = 1;
				$permission['widget']        = 1;
				$permission['poll']          = 1;
				$permission['user']          = 1;
				$permission['sketch']        = 1;
				$permission['setting']       = 1;   
				$this->db->insert('user_permission', $permission);
			}else if($data['position'] == "Moderator"){	
				$permission['user_id']       = $insert_id;
				$permission['add_data']      = 1;
				$permission['edit_data']     = 1;
				$permission['view_data']     = 1;
				$permission['delete_data']   = 1;
				$permission['category']      = 1;
				$permission['message']       = 1;
				$permission['page']          = 1;
				$permission['news']          = 1;
				$permission['gallery']       = 1;
				$permission['video']         = 1;
				$permission['advertisement'] = 1;
				$permission['seo']           = 0;
				$permission['widget']        = 0;
				$permission['poll']          = 0;
				$permission['user']          = 0;
				$permission['sketch']        = 0;
				$permission['setting']       = 0;   
				$this->db->insert('user_permission', $permission);			
			}else if($data['position'] == "Reporter"){
				$permission['user_id']       = $insert_id;
				$permission['add_data']      = 1;
				$permission['edit_data']     = 0;
				$permission['view_data']     = 1;
				$permission['delete_data']   = 0;
				$permission['category']      = 0;
				$permission['message']       = 0;
				$permission['page']          = 0;
				$permission['news']          = 1;
				$permission['gallery']       = 1;
				$permission['video']         = 1;
				$permission['advertisement'] = 0;
				$permission['seo']           = 0;
				$permission['widget']        = 0;
				$permission['poll']          = 0;
				$permission['user']          = 0;
				$permission['sketch']        = 0;
				$permission['setting']       = 0;   
				$this->db->insert('user_permission', $permission);
			}	
		}else{
			return false;
		}
	}
	
	// 16.5) Edit User
	public function edit_user($id, $data){
		$this->db->where('id', $id);
		$this->db->update('user', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	// 16.6.1) Delete User permission
	function delete_user_permission($id){
		$this->db->where('user_id', $id);
		$this->db->delete('user_permission');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	// 16.6.2) Delete User
	function delete_user($id){
		$this->db->where('id', $id);
		$this->db->delete('user');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 17.1) User Permission
	public function user_permission($id){	
		$this->db->where('user_id', $id);
		$result = $this->db->get('user_permission');
		if($this->db->affected_rows() > 0){
			return $result->row();
		}else{
			return false;
		}
	}	
	
	// 17.2) Edit User Permission
	public function edit_user_permission($id, $data){
		$this->db->where('user_id', $id);
		$this->db->update('user_permission', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 18.1) Edit Sketch
	public function edit_sketch($id, $data){
		$this->db->where('id', $id);
		$this->db->update('sketch', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 18.2) Sketch List
	public function sketch_list($id){
		$this->db->where('id', $id);
		$query = $this->db->get('sketch');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	
	// 18.3) Sketch Category
	public function sketch_category($id){
		$this->db->where('id', $id);
		$query = $this->db->get('category');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	
	// 19.1.1) Single Gerneral Setting View
	public function general_setting_view($id){
		$this->db->where('id', $id);
		$query = $this->db->get('general_setting');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	
	// 19.1.2) Edit Gerneral Setting
	public function edit_general_setting($id, $data){
		$this->db->where('id', $id);
		$this->db->update('general_setting', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}	
	
	// 19.2.1) Single Message Setting View
	public function smtp_setting_view($id){
		$this->db->where('id', $id);
		$query = $this->db->get('smtp_setting');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	
	// 19.2.2) Edit Message Setting
	public function edit_smtp_setting($id, $data){
		$this->db->where('id', $id);
		$this->db->update('smtp_setting', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	// 19.3.1) Single Color Data
	public function single_color_data($class_section){
		$this->db->where('section_class', $class_section);
		$query = $this->db->get('color_setting');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}	
	
	// 19.3.2) Edit Color Setting
	public function edit_color_setting($data){		
		$color_code           = $data['color_code'];		
		$section_class        = $data['section_class'];
		
		$i = 0;
		foreach($color_code as $color_code_row){
			$data = array(
				'color_code'  =>  $color_code_row,
			);
			for($a=0; $a<count($color_code); $a++) {	
				$this->db->where('section_class', $section_class[$i]);
			}
			$this->db->update('color_setting', $data);
			$i++;			
			
		}
	}
	
 }