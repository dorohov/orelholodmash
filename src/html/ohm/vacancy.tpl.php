<?
// ГдеДостать
?>

<div class="vacancy-content-block content-site _second-page__content-site ">
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
				<li class="_cs__col"><a href="<?=$link;?>"><?=$row['title'];?></a></li>
			<?
			}
			mysql_data_seek($item_list,0);
			?>
			<!--
			<li class="_cs__col"><a href="/vacancy-item.html">Специалист технического  отдела</a></li>
			<li class="_cs__col"><a href="/vacancy-item.html">Допустим сварщик</a></li>
			<li class="_cs__col"><a href="/vacancy-item.html">Технический специалист</a></li>
			<li class="_cs__col"><a href="/vacancy-item.html">Водитель</a></li>
			-->
		</ul>
		<?
		}
		?>
		
		<div class="_vcb__note">
			<?=$param['item_id']['main_info'];?>
		</div>
	</div>
</div>