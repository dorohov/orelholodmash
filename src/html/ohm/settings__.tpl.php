<?
// ЦМС

if(isset($_POST['contact_email'])) {
	$this->FE->CMS->setParamValue('contact_email', $this->FE->_post('contact_email'));
}
if(isset($_POST['contact_phone'])) {
	$this->FE->CMS->setParamValue('contact_phone', $this->FE->_post('contact_phone'));
}
if(isset($_POST['ok_page'])) {
	$this->FE->CMS->setParamValue('ok_page', $this->FE->_post('ok_page'));
}
if(isset($_POST['vk_page'])) {
	$this->FE->CMS->setParamValue('vk_page', $this->FE->_post('vk_page'));
}
if(isset($_POST['fb_page'])) {
	$this->FE->CMS->setParamValue('fb_page', $this->FE->_post('fb_page'));
}
if(isset($_POST['tw_page'])) {
	$this->FE->CMS->setParamValue('tw_page', $this->FE->_post('tw_page'));
}

/*
if(isset($_POST['product_delivery_main_info'])) {
	$this->FE->CMS->setParamValue('product_delivery_main_info', $_POST['product_delivery_main_info']);
}
*/

?>

<div class="page-header" >
	<h3>
		Настройки сайта
	</h3>
</div>

<div class="row" >
	
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
		
		<form method="POST" >
			
			<div class="form-group">
				<label for="contact_email" >Email</label>
				<input type="text" class="form-control" name="contact_email" value="<?=$this->FE->CMS->getParamValue('contact_email');?>" />
			</div>
			
			<div class="form-group">
				<label for="contact_phone" >Телефон</label>
				<input type="text" class="form-control" name="contact_phone" value="<?=$this->FE->CMS->getParamValue('contact_phone');?>" />
			</div>
			
			<div class="form-group">
				<label for="ok_page" >Страница в Одноклассниках</label>
				<input type="text" class="form-control" name="ok_page" value="<?=$this->FE->CMS->getParamValue('ok_page');?>" />
			</div>
			
			<div class="form-group">
				<label for="vk_page" >Страница ВКонтакте</label>
				<input type="text" class="form-control" name="vk_page" value="<?=$this->FE->CMS->getParamValue('vk_page');?>" />
			</div>
			
			<div class="form-group">
				<label for="fb_page" >Страница Facebook</label>
				<input type="text" class="form-control" name="fb_page" value="<?=$this->FE->CMS->getParamValue('fb_page');?>" />
			</div>
			
			<div class="form-group">
				<label for="tw_page" >Twitter</label>
				<input type="text" class="form-control" name="tw_page" value="<?=$this->FE->CMS->getParamValue('tw_page');?>" />
			</div>
			
			<?
			/*
			<div class="form-group">
				<label for="main_info" >Описание условий доставки для страницы товаров</label>
				<?
				$param['run_editor']=array(
					'element'=>array(
						'name'=>'product_delivery_main_info',
						'value'=>$this->FE->CMS->getParamValue('product_delivery_main_info'),
						'upload_path'=>'product/main_info',
						),
					);
				$this->FE->Viewer->form('admin/form_editor_html',$param);
				?>
			</div>
			*/
			?>
			
			<div class="form-group">
				<button type="submit" class="btn btn-success" >Обновить</button>
			</div>
			
		</form>
	
	</div>
	
</div>