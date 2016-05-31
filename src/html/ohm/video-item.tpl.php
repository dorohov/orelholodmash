<?
// CMS Azbn.ru Публичная версия
?>

<div class="videoI-content-block content-site _second-page__content-site ">
	<div class="container">
		<div class="heading-block ">
			<h1 class="heading-site big _vbc__heading-site">Видеопрезентации</h1>
		</div> 
		<div class="_vicb__video">
			<iframe width="100%" height="315" src="https://www.youtube.com/embed/<?=$param['item_id']['param']['yt_video'];?>" frameborder="0" allowfullscreen></iframe>
			<div class="_vicb__video-note">
				<?=$param['item_id']['main_info'];?>
			</div>
		</div>

<?
$entity = $this->FE->DB->dbSelectFirstRow("SELECT * FROM `".$this->FE->DB->dbtables['t_entity']."` WHERE id='1'");
$table = $this->FE->config['mysql_prefix'].'_'.$entity['url'];

$item_list = $this->FE->DB->dbSelect("SELECT * FROM `$table` WHERE visible='1' AND id<>'".$param['item_id']['id']."' ORDER BY RAND() DESC LIMIT 8");
if(mysql_num_rows($item_list)) {
?>

		<div class="heading-block _vibc__block-more">
			<h1 class="heading-site _vibc__heading-more">Другие презентации</h1>
		</div> 
		<div class="_cs__flex _vbc__list">
	
	<?
	while($row = mysql_fetch_array($item_list)) {
		$row['param'] = unserialize($row['param']);
		$row['entity'] = $entity['url'];
		$link = $this->FE->CMS->genLink($row, 'entityitem', true, true);
	?>
		
		<div class="_cs__col _vbc__item">
			<a href="<?=$link;?>" class="_vbc__item-inner">
				<div class="_vbc__item-preview"><img src="<?=$row['param']['yt_img'];?>" alt=""></div>
				<div class="_vbc__item-heading"><?=$row['title'];?></div>
			</a>
		</div>
		
	<?
	}
	mysql_data_seek($item_list,0);
	?>
	
		</div>
		
<?
}
?>

	</div>
</div>