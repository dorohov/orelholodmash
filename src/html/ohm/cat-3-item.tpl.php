<?
// ЦМС
?>

<div class="vacancy-item-content-block content-site _second-page__content-site ">
	<div class="container">
		<div class="heading-block _vcb__heading-block ">
			<h1 class="heading-site ">Вакансии</h1>
		</div>
		
		<?
		$item_list = $this->FE->DB->dbSelect("SELECT * FROM `".$this->FE->DB->dbtables['t_page']."` WHERE visible='1' AND cat='3' ORDER BY rating,id");
		if(mysql_num_rows($item_list)) {
		?>
		<ul class="_cs__flex _vcb__flex _vcb__spec-list">
			<?
			while($row = mysql_fetch_array($item_list)) {
				$link = $this->FE->CMS->genLink($row, 'page', true, true);
			?>
				<li class="_cs__col <?if($param['item_id']['id'] == $row['id']){echo 'active';}?> "><a href="<?=$link;?>"><?=$row['title'];?></a></li>
			<?
			}
			mysql_data_seek($item_list,0);
			?>
		</ul>
		<?
		}
		?>
		
		<div class="panel-group _vicb__panel-group" id="accordion">
			<?=$param['item_id']['main_info'];?>
		</div>
		
		<div class="_vicb__btn">
			<button type="button" class="btn-red-border" data-toggle="modal" data-target="#modal-form-resume">Отправить резюме</button>
		</div>
	</div>
</div> 