<?
// ГдеДостать
?>

<div class="exposition-content-block content-site _second-page__content-site ">
	<div class="container">
		<div class="heading-block">
			<h1 class="heading-site big">Выставки</h1>
		</div>
		
		<?
		$item_list = $this->FE->DB->dbSelect("SELECT * FROM `".$this->FE->DB->dbtables['t_page']."` WHERE visible='1' AND cat='5' ORDER BY rating,id");
		if(mysql_num_rows($item_list)) {
			while($row = mysql_fetch_array($item_list)) {
		?>
		
		<div class="_cs__flex _ecb__item _ecb__flex">
			<div class="_cs__col _ecb__col-left">
				<div class="news-element__date"><?=date('d.m.Y', $row['created_at']);?></div>
				<h2 class="_ecb__item-heading"><?=$row['title'];?></h2>
				
				<?=$row['main_info'];?>
				
			</div>
			<div class="_cs__col _ecb__col-right">
				<img alt="" src="<?=$row['img'];?>">
			</div>
		</div>
		
		<?
			}
			mysql_data_seek($item_list,0);
		}
		?>
		
	</div>
</div>