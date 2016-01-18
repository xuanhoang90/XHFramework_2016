<?php
	//check access
	if (!defined('ROOT_ACCESS')) {
		echo "Access denies!";exit;
	}
	$CMS->skin = new SkinInterface();
	class SkinInterface{
		public function __construct(){
			return true;
		}
		public function Start(){
			global $CMS, $DB;
			//check site
			if(!$CMS->input['site']){
				$CMS->input['site'] = "home";
			}
			$CMS->lang->LoadLanguage("global");
			$output = "";
			$output .= $this->SkinHeader();
			$output .=<<<HERE
				<!-- Content Wrapper. Contains page content -->
				<div class="content-wrapper">
					<!-- Content Header (Page header) -->
					<section class="content-header">
						{$this->AdminPannel()}
					</section>

					<!-- Main content -->
					{$this->DisplayPage()}
					
					<section class="content-footer">
						{$this->ManagerAction()}
					</section>
				</div><!-- /.content-wrapper -->
HERE;
			$output .= $this->SkinFooter();
			print $output;exit;
			return true;
		}
		public function AdminPannel(){
			global $CMS, $DB, $USER;
			$output = "";
			if($USER->action->IsManager()){
				$output .=<<<HERE
				<div class="admin-pan">
					<div class="init">
						<div class="logo pull-left">
							<a class="acp" href="{$CMS->vars['root_domain']}/taka_acp">XHFramework</a>
						</div>
						<div class="member pull-right">
							<div class="btn-group">
								<a class="member-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fa fa-user"></i> {$USER->data['display_name']} <span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li><a href="{$CMS->vars['root_domain']}/taka_acp">Admin pannel</a></li>
									<li role="separator" class="divider"></li>
									<li><a href="{$CMS->vars['root_domain']}/?site=admin&page=logout">Sign out</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="admin-padding-top"></div>
HERE;
			}
			return $output;
		}
		public function ManagerAction(){
			global $CMS, $DB, $USER;
			$output = "";
			if($USER->action->IsManager()){
				$output .=<<<HERE
					<a class="admin-edit-page" href="{$CMS->vars['root_domain']}/?site=admin&page=edit_tpl&acton=viewlist&id={$CMS->vars['current_page_id']}"><i class="fa fa-pencil-square-o"></i></a>
HERE;
			}
			return $output;
		}
		public function SkinHeader(){
			global $CMS, $DB;
			$data = array(
				"style_dir" => $CMS->vars['root_domain']."/themes/".$CMS->vars['tpl_name'],
				"title" => $CMS->vars['lang']['page_title_'.$CMS->input['site']],
			);
			$CMS->tpl->data = $data;
			$tmp = $CMS->tpl->Display($CMS->vars['tpl_name']."/header", false);
			return $tmp;
		}
		public function SkinFooter(){
			global $CMS, $DB;
			$data = array(
				"style_dir" => $CMS->vars['root_domain']."/themes/".$CMS->vars['tpl_name'],
			);
			$CMS->tpl->data = $data;
			$tmp = $CMS->tpl->Display($CMS->vars['tpl_name']."/footer", false);
			return $tmp;
		}
		public function DisplayPage(){
			global $CMS, $DB;
			$PageData = $this->LoadPageData();
			$CMS->vars['current_page_id'] = $PageData['id'];
			$output = "";
			if($PageData['data'] != ""){
				$RowData = unserialize($PageData['data']);
				//loop row
				if(is_array($RowData)){
					foreach($RowData as $Row){
						//open row
						if($Row['setting']){
							$rowSetting = $Row['setting'];
							$bgurl = $rowSetting['bgurl'];
							$wfull = $rowSetting['wfull'];
							$bgfull = $rowSetting['bgfull'];
							$bgcolor = $rowSetting['bgcolor'];
							$bordertype = $rowSetting['bordertype'];
							$bordersize = $rowSetting['bordersize'];
							$bordercolor = $rowSetting['bordercolor'];
							$bordertop = $rowSetting['bordertop'];
							$borderleft = $rowSetting['borderleft'];
							$borderright = $rowSetting['borderright'];
							$borderbottom = $rowSetting['borderbottom'];
						}else{
							$rowSetting = "";
							$bgurl = "";
							$wfull = "";
							$bgfull = "";
							$bgcolor = "";
							$bordertype = "";
							$bordersize = "";
							$bordercolor = "";
							$bordertop = "";
							$borderleft = "";
							$borderright = "";
							$borderbottom = "";
						}
						if($bordertop == 'true'){
							$CssBtop = $bordersize."px ".$bordertype." ".$bordercolor;
						}else{
							$CssBtop = "none";
						}
						if($borderleft == 'true'){
							$CssBleft = $bordersize."px ".$bordertype." ".$bordercolor;
						}else{
							$CssBleft = "none";
						}
						if($borderright == 'true'){
							$CssBright = $bordersize."px ".$bordertype." ".$bordercolor;
						}else{
							$CssBright = "none";
						}
						if($borderbottom == 'true'){
							$CssBbottom = $bordersize."px ".$bordertype." ".$bordercolor;
						}else{
							$CssBbottom = "none";
						}
						if($bgfull == "true"){
							$cssbgfull = "background-color: {$bgcolor};background-image: url({$bgurl}); border-top: {$CssBtop}; border-left: {$CssBleft}; border-right: {$CssBright}; border-bottom: {$CssBbottom};";
							$cssbg = "";
						}else{
							$cssbgfull = "";
							$cssbg = "background-color: {$bgcolor}; background-image: url({$bgurl}); border-top: {$CssBtop}; border-left: {$CssBleft}; border-right: {$CssBright}; border-bottom: {$CssBbottom};";
						}
						if($wfull == "true"){
							$wfull = "x-row-wfull";
						}else{
							$wfull = "";
						}
						
						//<section class="content">
						$output .=<<<HERE
						<section class="content" style="{$cssbgfull}">
							<div class='row {$wfull}' style="{$cssbg}">
HERE;
							//loop subrow
							if(is_array($Row['data'])){
								foreach($Row['data'] as $Subrow){
									//open subrow
									$output .=<<<HERE
									<div class='col-xs-12 x-col-xs-12'>
HERE;
										//loop columb
										if(is_array($Subrow['data'])){
											foreach($Subrow['data'] as $Col){
												$size = $Col['size'];
												$responsive = "";
												if($size == 3){
													$responsive = "col-sm-3 col-xs-12";
												}
												if($size == 4){
													$responsive = "col-sm-4 col-xs-12";
												}
												if($size == 6){
													$responsive = "col-sm-6 col-xs-12";
												}
												if($size == 8){
													$responsive = "col-sm-8 col-xs-12";
												}
												if($size == 9){
													$responsive = "col-sm-9 col-xs-12";
												}
												if($size == 12){
													$responsive = "col-sm-12 col-xs-12";
												}
												//open columb
												$output .=<<<HERE
													<div class='col-md-{$size} {$responsive} x-col-md-responsive'>
HERE;
													//loop block
													if(is_array($Col['data'])){
														foreach($Col['data'] as $Block){
															if($Block['required'] == "1"){
																$required = "mainblock";
															}else{
																$required = "";
															}
															//open block content
															$output .=<<<HERE
															<div class='row x-row'>
																<div class='block-content'>
HERE;
																//load block data
																if($required != ""){
																	//main
																	//load main frame by page nice url
																	//$output .= $CMS->unit[$Block['data']['moduleType']]->ReloadBlock($Block['data']);
																	//print($CMS->input['site']);exit;
																	$output .= $CMS->frame[$CMS->input['site']]->Start($Block['data']);
																}else{
																	//unit
																	if($Block['data']['moduleType'] != ""){
																		$output .= $CMS->unit[$Block['data']['moduleType']]->ReloadBlock($Block['data']);
																	}
																}
															//close block content
															$output .=<<<HERE
																</div>
															</div>
HERE;
														}
													}
													
												//close columb
												$output .=<<<HERE
													</div>
HERE;
											}
										}
										
									//close subrow
									$output .=<<<HERE
									</div>
HERE;
								}
							}
						//close row
						$output .=<<<HERE
							</div>
						</section>
HERE;
					}
				}
			}
			return $output;
		}
		public function LoadPageData(){
			global $CMS, $DB;
			$DB->query("use ".WEBSITE_DBNAME);
			$sql = $DB->query("SELECT p.id, p.data FROM page p,page_description pd WHERE p.id=pd.page_id AND pd.nice_url='{$CMS->input['site']}' AND pd.lang_id='1'");
			if($data = $sql->fetchAll()){
				return $data[0];
			}else{
				return false;
			}
		}
	}
?>