<?
// CMS Azbn.ru Публичная версия

class Main
{
public $class_name='main';

	function __construct()
	{
		
	}
	
	public function index(&$param)
	{
		
		$param['page_html']['seo']=$this->FE->CMS->getSEO(2);
		
		$param['mdl']['page_header'] = $this->class_name.'/page_header';
		$param['mdl']['page_footer'] = $this->class_name.'/page_footer';
		
		$this->FE->load(array('path'=>$this->FE->config['app_path'],'class'=>'Viewer','var'=>'Viewer'));
		$this->FE->Viewer->startofpage($param);
		$this->FE->Viewer->form('main/index',$param);
		/*
		$param['mdl']['mainpage_index']='main/index';
		$this->FE->Viewer->module('mainpage_index',$param,$this->FE->as_int($param['mainpage_view']['cache_time']*60));
		*/
		$this->FE->Viewer->endofpage($param);
		
	}
	
	public function __import_plen(&$param)
	{
		//$this->FE->DB->dbDelete($this->FE->DB->dbtables['i_plen'], "WHERE 1");
		$this->FE->DB->dbQuery("TRUNCATE TABLE `{$this->FE->DB->dbtables['i_plen']}`");
		$param['news_list'] = $this->FE->DB->dbSelect("SELECT * FROM `_i_imp` WHERE 1 ORDER BY id");
		while($row=mysql_fetch_array($param['news_list'])) {
			$param['new_el'] = array(
				'product_id' => '0',
				'surface' => $row['surface'],
				'volume' => $row['volume'],
				'w_min' => $row['w_min'],
				'w_max' => $row['w_max'],
				'weight' => $row['weight'],
				'title' => $row['title'],
			);
			$param['new_el']['id'] = $this->FE->DB->dbInsert($this->FE->DB->dbtables['i_plen'],$param['new_el']);
			echo $param['new_el']['id'].'<br />';
		}
	}
	
	public function __import_product(&$param)
	{
		//$this->FE->DB->dbDelete($this->FE->DB->dbtables['i_plen'], "WHERE 1");
		
		$this->FE->DB->dbQuery("TRUNCATE TABLE `{$this->FE->DB->dbtables['t_product']}`");
		
		$item_list = $this->FE->DB->dbSelect("SELECT * FROM `".$this->FE->DB->dbtables['i_plen']."` WHERE 1 ORDER BY id");
		while($row=mysql_fetch_array($item_list)) {
			$param['new_el'] = array(
				'created_at'=>$this->FE->date,
				'cat'=>1,
				'visible'=>1,
				'seo'=>2,
				'rating'=>999999999,
				'user'=>1,
				'count'=>0,
				'cost'=>111,
				'oldcost'=>222,
				'unit'=>'шт.',
				'uid'=>$this->FE->hash($this->FE->date, $row['id'], 'product-plen'),
				'title'=>$row['title'],
				'url'=>'plen-'.$row['id'],
				'img'=>'',
				'gal'=>'',
				'preview'=>'',
				'tag'=>'',
				'main_info'=>'',
				'filter'=>'',
				'param'=>serialize(array()),
			);
			$param['new_el']['id'] = $this->FE->DB->dbInsertIgnore($this->FE->DB->dbtables['t_product'],$param['new_el']);
			
			$this->FE->DB->dbUpdateArr($this->FE->DB->dbtables['i_plen'],array('product_id' => $param['new_el']['id'],),"WHERE id='{$row['id']}'");
			
			echo $param['new_el']['id'].'<br />';
		}
		
		$item_list = $this->FE->DB->dbSelect("SELECT * FROM `".$this->FE->DB->dbtables['i_vozd']."` WHERE 1 ORDER BY id");
		while($row=mysql_fetch_array($item_list)) {
			$param['new_el'] = array(
				'created_at'=>$this->FE->date,
				'cat'=>2,
				'visible'=>1,
				'seo'=>2,
				'rating'=>999999999,
				'user'=>1,
				'count'=>0,
				'cost'=>111,
				'oldcost'=>222,
				'unit'=>'шт.',
				'uid'=>$this->FE->hash($this->FE->date, $row['id'], 'product-vozd'),
				'title'=>$row['title'],
				'url'=>'vozd-'.$row['id'],
				'img'=>'',
				'gal'=>'',
				'preview'=>'',
				'tag'=>'',
				'main_info'=>'',
				'filter'=>'',
				'param'=>serialize(array()),
			);
			$param['new_el']['id'] = $this->FE->DB->dbInsertIgnore($this->FE->DB->dbtables['t_product'],$param['new_el']);
			
			$this->FE->DB->dbUpdateArr($this->FE->DB->dbtables['i_vozd'],array('product_id' => $param['new_el']['id'],),"WHERE id='{$row['id']}'");
			
			echo $param['new_el']['id'].'<br />';
		}
		
	}
	
	public function pageByTpl(&$param)
	{
		$path=$this->FE->c_s($param['req_arr']['param_1']);
		$tpl=$this->FE->c_s($param['req_arr']['param_2']);
		
		$this->FE->load(array('path'=>$this->FE->config['app_path'],'class'=>'Viewer','var'=>'Viewer'));
		$this->FE->Viewer->form('main/pageByTpl/'.$path.'/'.$tpl,$param);
	}
	
	public function defaultpage(&$param)
	{
		if($this->FE->is_num($param['req_arr']['param_1'])) {
			$uid=$this->FE->as_int($param['req_arr']['param_1']);
			$uid_str='id';
		} else {
			$uid=$this->FE->c_s($param['req_arr']['param_1']);
			$uid_str='url';
		}
		
		$param['item_id']=$this->FE->DB->dbSelectFirstRow("SELECT * FROM `".$this->FE->DB->dbtables['t_page']."` WHERE ($uid_str='$uid' AND visible='1')");
		$param['cat_id']=$this->FE->DB->dbSelectFirstRow("SELECT * FROM `".$this->FE->DB->dbtables['t_pagecat']."` WHERE (id='{$param['item_id']['cat']}')");
		
		$param['mdl']['page_header'] = 'default/page_header';
		$param['mdl']['page_footer'] = 'default/page_footer';
		
		//$param['page_html']['seo']=$this->FE->CMS->getSEO($param['item_id']['seo']);
		$this->FE->PluginMng->event('cms:item_id:after_select', $param);
		
		$this->FE->load(array('path'=>$this->FE->config['app_path'],'class'=>'Viewer','var'=>'Viewer'));
		$this->FE->Viewer->startofpage($param);
		if($param['item_id']['id']) {
			$param['item_id']['param']=unserialize($param['item_id']['param']);
			$this->FE->Viewer->form($param['req_arr']['cont'].'/pageByTpl/defaultpage/'.$uid,$param);
		} else {
			$this->FE->Viewer->form('no',$param);
		}
		$this->FE->Viewer->endofpage($param);
	}
	
	public function sitemap(&$param)
	{
		$type=$this->FE->c_s($param['req_arr']['param_1']);
		
		if(strlen($type)) {
			
			switch($type) {
				
				case 'news':{
					$param['news_list']=$this->FE->DB->dbSelect("SELECT * FROM `".$this->FE->DB->dbtables['t_news']."` WHERE visible='1' ORDER BY id DESC");
					}
					break;
				
				case 'post':{
					$param['post_list']=$this->FE->DB->dbSelect("SELECT * FROM `".$this->FE->DB->dbtables['t_post']."` WHERE visible='1' ORDER BY id DESC");
					}
					break;
				
				case 'page':{
					$param['page_list']=$this->FE->DB->dbSelect("SELECT * FROM `".$this->FE->DB->dbtables['t_page']."` WHERE visible='1' ORDER BY id DESC");
					}
					break;
				
				}
			
			$tpl='main/sitemap/'.$type;
			
			} else {
				
				$param['news_list']=$this->FE->DB->dbSelect("SELECT * FROM `".$this->FE->DB->dbtables['t_news']."` WHERE visible='1' ORDER BY id DESC");
				$param['post_list']=$this->FE->DB->dbSelect("SELECT * FROM `".$this->FE->DB->dbtables['t_post']."` WHERE visible='1' ORDER BY id DESC");
				$param['page_list']=$this->FE->DB->dbSelect("SELECT * FROM `".$this->FE->DB->dbtables['t_page']."` WHERE visible='1' ORDER BY id DESC");
				
				$tpl='main/sitemap/index';
				
				}
		
		$this->FE->load(array('path'=>$this->FE->config['app_path'],'class'=>'Viewer','var'=>'Viewer'));
		$this->FE->Viewer->form($tpl,$param);
	}
	
	public function lazy(&$param)
	{
		echo 'start<br />';
		
		$this->FE->setLazy('test','emptyRunnable',$param);
		$this->FE->runLazy('test');
		
		echo 'final<br />';
		
	}
	
	public function phpm(&$param)
	{
		
		$str=mb_strtoupper('мама мыла раму и читала интересную книгу лопрылаыв',$this->FE->config['charset']);
		
		//$words=preg_split('/[^a-zA-Zа-яА-Я0-9]+/', $str, -1, PREG_SPLIT_NO_EMPTY);
		$words=explode(' ',$str);
		
		$morphy_path='./import/cms.azbn.ru/phpmorphy/';
		require_once($morphy_path.'src/common.php');
		$morphy = new phpMorphy($morphy_path.'dicts/'.$this->FE->config['charset'].'/', 'ru_RU', array(
			// PHPMORPHY_STORAGE_FILE - использовать файл
			// PHPMORPHY_STORAGE_SHM - загружать словать в общую память(нужно расширение shmop)
			// PHPMORPHY_STORAGE_MEM - загружать словать в общую память при каждой инициализации phpmorphy
			'storage' => PHPMORPHY_STORAGE_FILE,
			'predict_by_suffix' => true,
			'predict_by_db' => true,
			'graminfo_as_text' => true,
			));
		
		echo '<pre>';
		echo $morphy->getEncoding()."\n";
		/*
		foreach($words as $i=>$w) {
			var_dump($morphy->getBaseForm(array($w)));
			//var_dump($morphy->getPseudoRoot(array($w)));
			//var_dump($morphy->getAllForms(array($w)));
		}
		*/
		
		//var_dump($morphy->getBaseForm($words))."\n";
		//var_dump($morphy->getPseudoRoot($words))."\n";
		//var_dump($morphy->getAllForms($words))."\n";
		
		$forms=array();
		
		foreach($morphy->getBaseForm($words) as $w=>$form_arr) {
			if(count($form_arr)) {
				foreach($form_arr as $f) {
					$forms[]=$f;
				}
			}
		}
		echo implode(' ',$forms);
		
		echo '</pre>';
		
	}
	
	public function trans(&$param)
	{
		echo $this->FE->ru2en('те"Ст$%');
	}
	
}

?>