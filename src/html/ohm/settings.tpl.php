<?
// ГдеДостать

if(isset($_POST['adr'])) {
	$this->FE->CMS->setParamValue('adr', $this->FE->_post('adr'));
}

if(isset($_POST['adr_index'])) {
	$this->FE->CMS->setParamValue('adr_index', $this->FE->_post('adr_index'));
}

if(isset($_POST['email1'])) {
	$this->FE->CMS->setParamValue('email1', $this->FE->_post('email1'));
}

if(isset($_POST['phone1'])) {
	$this->FE->CMS->setParamValue('phone1', $this->FE->_post('phone1'));
}

if(isset($_POST['phone2'])) {
	$this->FE->CMS->setParamValue('phone2', $this->FE->_post('phone2'));
}

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
				<label for="adr" >Адрес</label>
				<input type="text" class="form-control" name="adr" value="<?=$this->FE->CMS->getParamValue('adr');?>" />
			</div>
			
			<div class="form-group">
				<label for="adr_index" >Почтовый индекс</label>
				<input type="text" class="form-control" name="adr_index" value="<?=$this->FE->CMS->getParamValue('adr_index');?>" />
			</div>
			
			<div class="form-group">
				<label for="email1" >Email 1</label>
				<input type="text" class="form-control" name="email1" value="<?=$this->FE->CMS->getParamValue('email1');?>" />
			</div>
			
			<div class="form-group">
				<label for="phone1" >Телефон 1</label>
				<input type="text" class="form-control" name="phone1" value="<?=$this->FE->CMS->getParamValue('phone1');?>" />
			</div>
			
			<div class="form-group">
				<label for="phone2" >Телефон 2</label>
				<input type="text" class="form-control" name="phone2" value="<?=$this->FE->CMS->getParamValue('phone2');?>" />
			</div>
			
			<div class="form-group">
				<button type="submit" class="btn btn-success" >Обновить</button>
			</div>
			
		</form>
	
	</div>
	
</div>