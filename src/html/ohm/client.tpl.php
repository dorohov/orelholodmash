<?
// ГдеДостать

$param['simplesearch']['text'] = mb_strtolower($this->FE->_get('text'), $this->FE->config['charset']);

if($param['simplesearch']['text'] != '') {
	$filter_str = "title LIKE '%{$param['simplesearch']['text']}%' OR preview LIKE '%{$param['simplesearch']['text']}%' OR main_info LIKE '%{$param['simplesearch']['text']}%' OR tag LIKE '%{$param['simplesearch']['text']}%'";
} else {
	$filter_str = '1';
}

$item_list = $this->FE->DB->dbSelect("SELECT * FROM `".$this->FE->DB->dbtables['t_page']."` WHERE visible='1' AND cat='6' AND ($filter_str) ORDER BY rating,id");
if(mysql_num_rows($item_list)) {
?>

<div class="clients-content-block content-site _second-page__content-site ">
	<div class="container">
		<div class="heading-block _ccb__heading-block">
			<?
			if($param['simplesearch']['text'] != '') {
			?>
			<h1 class="heading-site big">Поиск <em><?=$param['simplesearch']['text'];?></em> в разделе Клиентам</h1>
			<?
			} else {
			?>
			<h1 class="heading-site big">Клиентам</h1>
			<?
			}
			?>
		</div>
		<div class="_cs__flex _ccb__flex">
			<div class="_cs__col _ccb__col-left azbn-jqfeShowMoreBtn-container ">
			
<?
	while($row = mysql_fetch_array($item_list)) {
		$row['param'] = unserialize($row['param']);
?>
				
				<div class="_ccb__item azbn-jqfeShowMoreBtn-item ">
					<div class="_ccb__item-heading">
						<?=$row['title'];?>
					</div>
					<div class="_ccb__item-content">
						<?=$row['main_info'];?>
						<div class="_ccb__item-flex">
							<a href="https://docs.google.com/viewer?embedded=true&url=<?=$row['param']['attach'];?>" class="_ccb__item-link " target="_blank" >Открыть</a>
							<a href="<?=$row['param']['attach'];?>" class="_ccb__item-link _red" download >Скачать PDF</a>
						</div>
					</div>
				</div>
				
<?
	}
	mysql_data_seek($item_list,0);
?>

				<div class="_ccb__btn-block">
					<button class="btn-form-border azbn-jqfeShowMoreBtn-btn " type="button">Загрузить еще</button>
				</div>
			</div>
			<div class="_cs__col _ccb__col-right">
				<form action="" class="search-site _ccb__search">
					<div class="input-group"> 
						<input type="text" name="text" class="form-control" placeholder="Поиск по документам" value="<?=$param['simplesearch']['text'];?>" >
						<span class="input-group-btn">
							<button class="btn-search-text" type="submit">Найти</button>
						</span>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?
}
?>
