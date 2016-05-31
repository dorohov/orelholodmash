<?
// CMS Azbn.ru Публичная версия
?>

<div class="news-content-block content-site _second-page__content-site ">
	<div class="container">
		<div class="heading-block _ctcb__heading-block">
			<h1 class="heading-site ">Архив новостей за <?=($this->FE->CMS->str_month($param['news_archive']['m']).'/'.$param['news_archive']['y']);?></h1>
		</div>
		<ul class="_cs__flex _ncb__nav">
			<li class="_cs__col _ncb__col active"><a href="/news/">Новости и выставки</a></li>
			<li class="_cs__col _ncb__col"><a href="/post/">Статьи</a></li>
		</ul>
		<div class="_cs__flex _ncb__news-list azbn-jqfeShowMoreBtn-container ">
<?
//$item_list = $this->FE->DB->dbSelect("SELECT * FROM `".$this->FE->DB->dbtables['t_news']."` WHERE visible='1' ORDER BY date DESC LIMIT 3");
if(mysql_num_rows($param['item_list'])) {
	while($row = mysql_fetch_array($param['item_list'])) {
		$link = $this->FE->CMS->genLink($row, 'news', true, true);
		?>
			
			<article class="news-element _cs__col _ncb__item azbn-jqfeShowMoreBtn-item">
				<div class="news-element__inner">
					<a href="<?=$link;?>" class="news-element__preview">
						<img src="<?=$row['img'];?>" alt="">
					</a>
					<div class="news-element__date"><?=date('d.m.Y', $row['date']);?></div>
					<h4 class="news-element__heading"><a href="<?=$link;?>"><?=$row['title'];?></a></h4>
					<div class="news-element__note"><?=$row['preview'];?></div>
					<div class="news-element__link"><a href="<?=$link;?>">подробнее</a></div>
				</div>
			</article>
			
		<?
	}
	mysql_data_seek($param['item_list'],0);
}
?>
		</div>
		<div class="_ncb__btn">
			<button type="button" class="btn-form azbn-jqfeShowMoreBtn-btn ">Ещё новости</button> 
		</div>
	</div>
</div>