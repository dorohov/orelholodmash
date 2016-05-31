<?
// CMS Azbn.ru Публичная версия

class News
{
public $class_name='news';

	function __construct()
	{

		}
		
	public function index(&$param)
	{
		$this->FE->go2('/'.$param['req_arr']['cont'].'/all/');
		}
	
	public function all(&$param)
	{
		
		$param['simplesearch']['text'] = mb_strtolower($this->FE->_get('text'), $this->FE->config['charset']);
		
		if($param['simplesearch']['text'] != '') {
			$filter_str = "title LIKE '%{$param['simplesearch']['text']}%' OR preview LIKE '%{$param['simplesearch']['text']}%' OR main_info LIKE '%{$param['simplesearch']['text']}%' OR tag LIKE '%{$param['simplesearch']['text']}%'";
		} else {
			$filter_str = '1';
		}
		
		$param['item_list']=$this->FE->DB->dbSelect("SELECT * FROM `".$this->FE->DB->dbtables['t_'.$param['req_arr']['cont']]."` WHERE visible='1' AND ($filter_str) ORDER BY date DESC");
		$param['page_html']['seo']=$this->FE->CMS->getSEO(2);
		
		$this->FE->load(array('path'=>$this->FE->config['app_path'],'class'=>'Viewer','var'=>'Viewer'));
		$this->FE->Viewer->startofpage($param);
		$this->FE->Viewer->form($param['req_arr']['cont'].'/all',$param);
		$this->FE->Viewer->endofpage($param);
		
	}
	
	public function by_month(&$param)
	{
		$param['news_archive'] = array(
			'y' => $this->FE->as_int($param['req_arr']['param_1']),
			'm' => $this->FE->as_int($param['req_arr']['param_2']),
		);
		
		$param['news_archive']['start_at'] = mktime(0, 0, 0, $param['news_archive']['m'], 1, $param['news_archive']['y']) - 1;
		$param['news_archive']['stop_at'] = mktime(0, 0, 0, $param['news_archive']['m'], 31, $param['news_archive']['y']) + 1;
		
		$param['item_list']=$this->FE->DB->dbSelect("SELECT * FROM `".$this->FE->DB->dbtables['t_'.$param['req_arr']['cont']]."` WHERE visible='1' AND (date > '{$param['news_archive']['start_at']}' AND date < '{$param['news_archive']['stop_at']}') ORDER BY title");
		$param['page_html']['seo']=$this->FE->CMS->getSEO(2);
		
		$this->FE->load(array('path'=>$this->FE->config['app_path'],'class'=>'Viewer','var'=>'Viewer'));
		$this->FE->Viewer->startofpage($param);
		$this->FE->Viewer->form($param['req_arr']['cont'].'/by_month',$param);
		$this->FE->Viewer->endofpage($param);
		
	}
	
	public function cat(&$param)
	{
		if($this->FE->is_num($param['req_arr']['param_1'])) {
			$uid=$this->FE->as_int($param['req_arr']['param_1']);
			$uid_str='id';
		} else {
			$uid=$this->FE->c_s($param['req_arr']['param_1']);
			$uid_str='url';
		}
		
		$param['cat_id']=$this->FE->DB->dbSelectFirstRow("SELECT * FROM `".$this->FE->DB->dbtables['t_'.$param['req_arr']['cont'].'cat']."` WHERE ($uid_str='$uid' AND visible='1')");
		$param['item_list']=$this->FE->DB->dbSelect("SELECT * FROM `".$this->FE->DB->dbtables['t_'.$param['req_arr']['cont']]."` WHERE cat='{$param['cat_id']['id']}' AND visible='1' ORDER BY rating");
		
		//$param['page_html']['seo']=$this->FE->CMS->getSEO($param['cat_id']['seo']);
		$this->FE->PluginMng->event('cms:cat_id:after_select', $param);
		
		$this->FE->load(array('path'=>$this->FE->config['app_path'],'class'=>'Viewer','var'=>'Viewer'));
		$this->FE->Viewer->startofpage($param);
		$this->FE->Viewer->form($param['req_arr']['cont'].'/cat',$param);
		$this->FE->Viewer->endofpage($param);
		}
	
	public function item(&$param)
	{
		if($this->FE->is_num($param['req_arr']['param_1'])) {
			$uid=$this->FE->as_int($param['req_arr']['param_1']);
			$uid_str='id';
		} else {
			$uid=$this->FE->c_s($param['req_arr']['param_1']);
			$uid_str='url';
		}
		
		$param['item_id']=$this->FE->DB->dbSelectFirstRow("SELECT * FROM `".$this->FE->DB->dbtables['t_'.$param['req_arr']['cont']]."` WHERE ($uid_str='$uid' AND visible='1')");
		$param['cat_id']=$this->FE->DB->dbSelectFirstRow("SELECT * FROM `".$this->FE->DB->dbtables['t_'.$param['req_arr']['cont'].'cat']."` WHERE (id='{$param['item_id']['cat']}')");
		
		//$param['page_html']['seo']=$this->FE->CMS->getSEO($param['item_id']['seo']);
		$this->FE->PluginMng->event('cms:item_id:after_select', $param);
		
		$this->FE->load(array('path'=>$this->FE->config['app_path'],'class'=>'Viewer','var'=>'Viewer'));
		$this->FE->Viewer->startofpage($param);
		if($param['item_id']['id']) {
			$param['item_id']['param']=unserialize($param['item_id']['param']);
			$this->FE->Viewer->form($param['req_arr']['cont'].'/item',$param);
			} else {
				$this->FE->Viewer->form('no',$param);
				}
		$this->FE->Viewer->endofpage($param);
		}
	
}

?>