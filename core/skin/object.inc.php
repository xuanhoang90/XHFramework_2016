<?php
	//check access
	if (!defined('ROOT_ACCESS')) {
		echo "Access denies!";exit;
	}
	$CMS->object_data = new FrontObjectData();
	class FrontObjectData{
		public function __construct(){
			return true;
		}
		public function ConvertPostData($data = false){
			global $CMS, $DB;
			if($data){
				$res = array();
				foreach($data as $post){
					$tmp = "";
					$tmp['id'] = $post['id'];
					$tmp['viewed'] = $post['viewed'];
					$tmp['date_created'] = $post['date_created'];
					$tmp['image'] = $CMS->vars['root_domain']."/".$post['image'];
					$tmp['name'] = $post['name'];
					$tmp['nice_url'] = $CMS->vars['root_domain']."/post/".$post['nice_url'];
					$tmp['short_descripton'] = $post['short_descripton'];
					$tmp['content'] = $post['content'];
					array_push($res, $tmp);
				}
				return $res;
			}else{
				return false;
			}
		}
		public function ConvertCategoryData($data = false){
			global $CMS, $DB;
			if($data){
				$res = array();
				foreach($data as $post){
					$tmp = "";
					$tmp['id'] = $post['id'];
					$tmp['image'] = $CMS->vars['root_domain']."/".$post['image'];
					$tmp['name'] = $post['name'];
					$tmp['nice_url'] = $CMS->vars['root_domain']."/post_category/".$post['nice_url'];
					array_push($res, $tmp);
				}
				return $res;
			}else{
				return false;
			}
		}
		public function LoadPostList($post_type = false, $object_id = false, $post_number = 10){
			global $CMS, $DB;
			$DB->query("use ".WEBSITE_DBNAME);
			$limit = "0,".$post_number;
			if($post_type == "newest"){
				$sql = $DB->query("SELECT * FROM object o,object_description od WHERE o.id=od.object_id AND od.lang_id='1' AND 1=1 AND o.type='3' AND o.delete='0' AND o.parent LIKE '%,{$object_id},%' ORDER BY o.id DESC LIMIT {$limit}");
				if($data = $sql->fetchAll()){
					return $this->ConvertPostData($data);
				}else{
					return false;
				}
			}
			if($post_type == "most_view"){
				$sql = $DB->query("SELECT * FROM object o,object_description od WHERE o.id=od.object_id AND od.lang_id='1' AND 1=1 AND o.type='3' AND o.delete='0' AND o.parent LIKE '%,{$object_id},%' ORDER BY o.viewed DESC LIMIT {$limit}");
				if($data = $sql->fetchAll()){
					return $this->ConvertPostData($data);
				}else{
					return false;
				}
			}
			if($post_type == "newest_all"){
				$sql = $DB->query("SELECT * FROM object o,object_description od WHERE o.id=od.object_id AND od.lang_id='1' AND 1=1 AND o.type='3' AND o.delete='0' ORDER BY o.id DESC LIMIT {$limit}");
				if($data = $sql->fetchAll()){
					return $this->ConvertPostData($data);
				}else{
					return false;
				}
			}
			if($post_type == "most_view_all"){
				$sql = $DB->query("SELECT * FROM object o,object_description od WHERE o.id=od.object_id AND od.lang_id='1' AND 1=1 AND o.type='3' AND o.delete='0' ORDER BY o.viewed DESC LIMIT {$limit}");
				if($data = $sql->fetchAll()){
					return $this->ConvertPostData($data);
				}else{
					return false;
				}
			}
		}
		public function LoadSubObject($post_type = false, $object_id = false, $post_number = 10){
			global $CMS, $DB;
			$DB->query("use ".WEBSITE_DBNAME);
			$limit = "0,".$post_number;
			if($post_type == "yes"){
				//load post list 
				$sql = $DB->query("SELECT * FROM object o,object_description od WHERE o.id=od.object_id AND od.lang_id='1' AND 1=1 AND o.type='3' AND o.delete='0' AND o.parent LIKE '%,{$object_id},%' ORDER BY o.id DESC LIMIT {$limit}");
				if($data = $sql->fetchAll()){
					return $this->ConvertPostData($data);
				}else{
					return false;
				}
			}else{
				//load sub cat
				$sql = $DB->query("SELECT * FROM object o,object_description od WHERE o.id=od.object_id AND od.lang_id='1' AND 1=1 AND o.type='1' AND o.delete='0' AND o.parent LIKE '%,{$object_id},%' ORDER BY o.id DESC LIMIT {$limit}");
				if($data = $sql->fetchAll()){
					return $this->ConvertCategoryData($data);
				}else{
					return false;
				}
			}
		}
		public function GetPostDetail(){
			global $CMS, $DB;
			$DB->query("use ".WEBSITE_DBNAME);
			if($CMS->input['post'] != ""){
				$sql = $DB->query("SELECT * FROM object o,object_description od WHERE o.id=od.object_id AND od.lang_id='1' AND 1=1 AND o.type='3' AND o.delete='0' AND od.nice_url='{$CMS->input['post']}'");
				if($data = $sql->fetchAll()){
					return $this->ConvertPostData($data);
				}else{
					return false;
				}
			}else{
				$sql = $DB->query("SELECT * FROM object o,object_description od WHERE o.id=od.object_id AND od.lang_id='1' AND 1=1 AND o.type='3' AND o.delete='0'");
				if($data = $sql->fetchAll()){
					return $this->ConvertPostData($data);
				}else{
					return false;
				}
			}
			return;
		}
	}
?>