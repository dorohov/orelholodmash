<?
// ЦМС
// =$this->FE->CMS->genLink($param['cat_id'],'newscat',true,true);
// if(strlen($param['item_id']['param']['yt_video'])) {
?>

<div class="newsI-content-block content-site _second-page__content-site ">
	<div class="container">
		<div class="_cs__flex _ccb__flex">
			<div class="_cs__col _ccb__col-left">
				<div class="_nicb__preview"><img src="<?=$param['item_id']['img'];?>" alt=""></div>
				<h1 class="_nicb__heading"><?=$param['item_id']['title'];?></h1>
				<div class="news-element__date _nicb__date"><?=date('d.m.Y',$param['item_id']['date']);?></div>
				<div class="_nicb__note">					
					<?=$param['item_id']['main_info'];?>
					<!--
					<div>ОАО "Орелхолодмаш" принимает участие в традиционной выставке "Chillventa Россия-2014", которая будет проходить с 4 по 6 февраля 2014г. в выставочном центре "Крокус Экспо" (г.Москва)</div>
					<div>"Chillventa Россия" – международная специализированная выставка холодильного оборудования, климатической техники и тепловых насосов для промышленности, торговли и строительства. При ее организации за основу была взята чрезвычайно успешная концепция Нюрнбергской „Chillventa“, которая своей премьерой в 2008г. сразу же завоевала доверие специалистов мирового сообщества. „Chillventa Россия“ задумана как профессиональная отраслевая платформа для презентации новейшего холодильного оборудования, климатической техники, тепловых насосов, а также передовых технологий.</div>
					-->
				</div>
				<div class="site-soc line">
					Поделиться 
					<button type="button" class="icon icon-vk"></button>
					<button type="button" class="icon icon-fb"></button>
					<button type="button" class="icon icon-ok"></button>
				</div>
				
<?
$item_list = $this->FE->DB->dbSelect("SELECT * FROM `".$this->FE->DB->dbtables['t_news']."` WHERE visible='1' AND id<>'".$param['item_id']['id']."' ORDER BY RAND() LIMIT 3");
if(mysql_num_rows($item_list)) {
?>
				<h3 class="_nicb__more-heading">Также читайте</h3>
				<div class="_cs__flex _nicb__more">
<?
	while($row = mysql_fetch_array($item_list)) {
		$link = $this->FE->CMS->genLink($row, 'news', true, true);
		?>
					
					<article class="news-element _cs__col _nicb__more-item">
						<div class="news-element__inner">
							<div class="news-element__date"><?=date('d.m.Y', $row['created_at']);?></div>
							<h4 class="news-element__heading"><a href="<?=$link;?>"><?=$row['title'];?></a></h4>
							<div class="news-element__note"><?=$row['preview'];?></div>
							<div class="news-element__link"><a href="<?=$link;?>">подробнее</a></div>
						</div>
					</article>
					
		<?
	}
	mysql_data_seek($item_list,0);
?>
				</div>
<?
}
?>
			</div>
			<div class="_cs__col _ccb__col-right">
				<form action="" class="search-site _ccb__search">
					<div class="input-group"> 
						<input type="text" class="form-control" placeholder="Поиск по статьям">
						<span class="input-group-btn">
							<button class="btn-search-text" type="submit">Найти</button>
						</span>
					</div>
				</form>
				<ul class="_cs__arhive _nicb__arhive ">
					<li class="disable">Архив новостей</li>
					<li><a href="#">Апрель 2015</a></li>
					<li><a href="#">Март 2015</a></li>
					<li><a href="#">Май 2015</a></li>
					<li><a href="#">Сентябрь 2015</a></li>
					<li><a href="#">Октябрь 2015</a></li>
					<li><a href="#">Ноябрь 2014</a></li>
				</ul>
			</div>
		</div>	
	</div>
</div>