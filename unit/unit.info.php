<?php
	//check access
	if (!defined('ROOT_ACCESS')) {
		echo "Access denies!";exit;
	}
	$CMS->unit['info'] = new ClassUnitInfo();
	class ClassUnitInfo{
		public function GetBlockSetting($data){
			global $CMS, $DB;
			$output = "";
			if($data != ""){
				$DefaultData = $data;
				foreach($DefaultData as $tmp){
					if($tmp['name'] == "show_company"){
						$show_company = $tmp['value'];
					}
					if($tmp['name'] == "show_email"){
						$show_email = $tmp['value'];
					}
					if($tmp['name'] == "show_phone"){
						$show_phone = $tmp['value'];
					}
					if($tmp['name'] == "show_blog"){
						$show_blog = $tmp['value'];
					}
				}
			}else{
				$show_company = "";
				$show_email = "";
				$show_phone = "";
				$show_blog = "";
			}
			$output =<<<HERE
			<form>
				<div class="block-title row form-group">
					<label class="control-label col-md-3" for="show_company">Show company: </label>
					<div class="col-md-9">
HERE;
				if($show_company == 'yes'){
					$output.=<<<HERE
						<p class="radio-button"><input class="show_company" name="show_company" checked="true" type="radio" value="yes"> Yes</p>
						<p class="radio-button"><input class="show_company" name="show_company" type="radio" value="no"> No</p>
HERE;
				}else{
					$output.=<<<HERE
						<p class="radio-button"><input class="show_company" name="show_company" type="radio" value="yes"> Yes</p>
						<p class="radio-button"><input class="show_company" name="show_company" checked="true" type="radio" value="no"> No</p>
HERE;
				}
				$output.=<<<HERE
					</div>
				</div>
				<div class="block-title row form-group">
					<label class="control-label col-md-3" for="show_email">Show email contact: </label>
					<div class="col-md-9">
HERE;
				if($show_email == 'yes'){
					$output.=<<<HERE
						<p class="radio-button"><input class="show_email" name="show_email" checked="true" type="radio" value="yes"> Yes</p>
						<p class="radio-button"><input class="show_email" name="show_email" type="radio" value="no"> No</p>
HERE;
				}else{
					$output.=<<<HERE
						<p class="radio-button"><input class="show_email" name="show_email" type="radio" value="yes"> Yes</p>
						<p class="radio-button"><input class="show_email" name="show_email" checked="true" type="radio" value="no"> No</p>
HERE;
				}
				$output.=<<<HERE
					</div>
				</div>
				<div class="block-title row form-group">
					<label class="control-label col-md-3" for="show_phone">Show phone: </label>
					<div class="col-md-9">
HERE;
				if($show_phone == 'yes'){
					$output.=<<<HERE
						<p class="radio-button"><input class="show_phone" name="show_phone" checked="true" type="radio" value="yes"> Yes</p>
						<p class="radio-button"><input class="show_phone" name="show_phone" type="radio" value="no"> No</p>
HERE;
				}else{
					$output.=<<<HERE
						<p class="radio-button"><input class="show_phone" name="show_phone" type="radio" value="yes"> Yes</p>
						<p class="radio-button"><input class="show_phone" name="show_phone" checked="true" type="radio" value="no"> No</p>
HERE;
				}
				$output.=<<<HERE
					</div>
				</div>
				<div class="block-title row form-group">
					<label class="control-label col-md-3" for="show_blog">Show blog: </label>
					<div class="col-md-9">
HERE;
				if($show_blog == 'yes'){
					$output.=<<<HERE
						<p class="radio-button"><input class="show_blog" name="show_blog" checked="true" type="radio" value="yes"> Yes</p>
						<p class="radio-button"><input class="show_blog" name="show_blog" type="radio" value="no"> No</p>
HERE;
				}else{
					$output.=<<<HERE
						<p class="radio-button"><input class="show_blog" name="show_blog" type="radio" value="yes"> Yes</p>
						<p class="radio-button"><input class="show_blog" name="show_blog" checked="true" type="radio" value="no"> No</p>
HERE;
				}
				$output.=<<<HERE
					</div>
				</div>
			</form>
HERE;
			return $output;
		}
		public function ReloadBlock($data){
			global $CMS, $DB;
			if($data){
				$Data = $data;
				if($Data['moduleData'] != ""){
					$DefaultData = $Data['moduleData'];
					foreach($DefaultData as $tmp){
						if($tmp['name'] == "show_company"){
							$show_company = $tmp['value'];
						}
						if($tmp['name'] == "show_email"){
							$show_email = $tmp['value'];
						}
						if($tmp['name'] == "show_phone"){
							$show_phone = $tmp['value'];
						}
						if($tmp['name'] == "show_blog"){
							$show_blog = $tmp['value'];
						}
					}
				}else{
					$show_company = "";
					$show_email = "";
					$show_phone = "";
					$show_blog = "";
				}
				//load config data
				$DB->query("use ".WEBSITE_DBNAME);
				$sql = $DB->query("SELECT value FROM config WHERE `key` LIKE 'config_info'");
				if($data = $sql->fetchAll()){
					$data = unserialize($data[0]['value']);
					$pagename = $data['pagename'];
					$company = $data['company'];
					$email = $data['email'];
					$phone = $data['phone'];
					$blog = $data['blog'];
				}else{
					$pagename = '';
					$company = '';
					$email = '';
					$phone = '';
					$blog = '';
				}
				$data = array(
					"show_company" => $show_company,
					"show_email" => $show_email,
					"show_phone" => $show_phone,
					"show_blog" => $show_blog,
					"pagename" => $pagename,
					"company" => $company,
					"email" => $email,
					"phone" => $phone,
					"blog" => $blog,
				);
				$CMS->tpl->data = $data;
				$tmp = $CMS->tpl->Display($CMS->vars['tpl_name']."/block.info", false);
				$output = $tmp;
			}else{
				$output = "";
			}
			return $output;
		}
	}
?>