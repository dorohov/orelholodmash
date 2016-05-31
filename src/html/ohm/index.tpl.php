<?
// Главная страница проекта
?>

<div class="index-informer-block ">
	<div class="container">
		<div class="_iib__list ">
			<div class="dropdown _iib__item">
				<button class="_iib__dropdown-toggle dropdown-toggle" data-toggle="dropdown" type="button" data-url="proektirovanie">Проектирование</button>
				<div class="dropdown-menu _iib__dropdown-menu ">
					<div class="_iib__dropdown-menu-flex">
						<div class="_iib__dropdown-menu-note">Создание проектов систем холодоснабжения и вентиляции промышленных предприятий любой сложности по разделам</div>
						<ul class="snow-list _iib__dropdown-menu-list">
							<li>Холодоснабжение</li>
							<li>Автоматизация систем холодоснабжения</li>
							<li>Отопление и вентиляция</li>
							<li>Автоматизация системы отопления и вентиляции</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="dropdown _iib__item">
				<button class="_iib__dropdown-toggle dropdown-toggle" data-toggle="dropdown" type="button" data-url="ekspertiza">Экспертиза</button>
				<div class="dropdown-menu _iib__dropdown-menu ">
					<div class="_iib__dropdown-menu-flex">
						<div class="_iib__dropdown-menu-note">Создание проектов систем холодоснабжения и вентиляции промышленных предприятий любой сложности по разделам</div>
						<ul class="snow-list _iib__dropdown-menu-list">
							<li>Холодоснабжение</li>
							<li>Автоматизация систем холодоснабжения</li>
							<li>Отопление и вентиляция</li>
							<li>Автоматизация системы отопления и вентиляции</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="dropdown _iib__item">
				<button class="_iib__dropdown-toggle dropdown-toggle" data-toggle="dropdown" type="button" data-url="proizvodstvo">Производство</button>
				<div class="dropdown-menu _iib__dropdown-menu ">
					<div class="_iib__dropdown-menu-flex">
						<div class="_iib__dropdown-menu-note">Создание проектов систем холодоснабжения и вентиляции промышленных предприятий любой сложности по разделам</div>
						<ul class="snow-list _iib__dropdown-menu-list">
							<li>Холодоснабжение</li>
							<li>Автоматизация систем холодоснабжения</li>
							<li>Отопление и вентиляция</li>
							<li>Автоматизация системы отопления и вентиляции</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="dropdown _iib__item">
				<button class="_iib__dropdown-toggle dropdown-toggle" data-toggle="dropdown" type="button" data-url="komplektatsiya">Комплектация</button>
				<div class="dropdown-menu _iib__dropdown-menu ">
					<div class="_iib__dropdown-menu-flex">
						<div class="_iib__dropdown-menu-note">Создание проектов систем холодоснабжения и вентиляции промышленных предприятий любой сложности по разделам</div>
						<ul class="snow-list _iib__dropdown-menu-list">
							<li>Холодоснабжение</li>
							<li>Автоматизация систем холодоснабжения</li>
							<li>Отопление и вентиляция</li>
							<li>Автоматизация системы отопления и вентиляции</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="dropdown _iib__item">
				<button class="_iib__dropdown-toggle dropdown-toggle" data-toggle="dropdown" type="button" data-url="montazh">Монтаж</button>
				<div class="dropdown-menu _iib__dropdown-menu ">
					<div class="_iib__dropdown-menu-flex">
						<div class="_iib__dropdown-menu-note">Создание проектов систем холодоснабжения и вентиляции промышленных предприятий любой сложности по разделам</div>
						<ul class="snow-list _iib__dropdown-menu-list">
							<li>Холодоснабжение</li>
							<li>Автоматизация систем холодоснабжения</li>
							<li>Отопление и вентиляция</li>
							<li>Автоматизация системы отопления и вентиляции</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="dropdown _iib__item">
				<button class="_iib__dropdown-toggle dropdown-toggle" data-toggle="dropdown" type="button" data-url="servis">Сервис</button>
				<div class="dropdown-menu _iib__dropdown-menu ">
					<div class="_iib__dropdown-menu-flex">
						<div class="_iib__dropdown-menu-note">Создание проектов систем холодоснабжения и вентиляции промышленных предприятий любой сложности по разделам</div>
						<ul class="snow-list _iib__dropdown-menu-list">
							<li>Холодоснабжение</li>
							<li>Автоматизация систем холодоснабжения</li>
							<li>Отопление и вентиляция</li>
							<li>Автоматизация системы отопления и вентиляции</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>





<div class="index-content-block content-site ">
	<div class="container">
		<div class="heading-block _space-between">
			<h1 class="heading-site ">Каталог продукции</h1>
			<a href="/catalog.html" class="heading-block__link ">Перейти в каталог</a> 
		</div>
		<div class="_cs__flex">
			<div class="_cs__col _cs__left">
				
				<form action="/product/all/" class="search-site _icb__search">
					<div class="input-group">
						<input type="text" name="text" class="form-control" placeholder="Поиск товаров" value="<?=$param['simplesearch']['text'];?>" >
						<span class="input-group-btn">
							<button class="btn-search" type="submit"></button>
						</span>
					</div>
				</form>
				
				<?
				$param['mdl']['product/cat_list'] = 'product/cat_list';
				$this->FE->Viewer->module('product/cat_list', $param);
				?>
				
			</div>
			<div class="_cs__col _cs__right">
				<div class="_icb__price-item">
					<div class="_icb__price-col col-left">
						<h2 class="_icb__price-heading">Воздухоохладители</h2>
						<img src="/img/index/price-item.jpg" alt="">
					</div>
					<div class="_icb__price-col col-right">
						<div class="_icb__price-note">
							<div>
								<span>К</span>убические, навесные (постаментные) и двухпоточные потолочные воздухоохладители используются на промышленных предприятиях для охлаждения воздуха в камерах хранения и замораживания продуктов в распределительных, производственных и заготовительных холодильниках (помещениях) с использованием различных типов хладагентов (хладоносителей) <!--при насосной подаче хладагента и прямом расширении.-->
							</div>
							<div>Воздухоохладители производства компании «Орелхолодмаш» разделяются  на несколько типов (серий) по назначению, конструкции и исполнению (используемые материалы, технология изготовления; температуры, шаг ламелей; хладагенты и т.д.).
							</div>
						</div>
						<div class="_icb__price-btn"><a href="/product/cat/vozduhoohladiteli/" class="btn-red">Подробнее о товаре</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<?
$item_list = $this->FE->DB->dbSelect("SELECT * FROM `".$this->FE->DB->dbtables['t_news']."` WHERE visible='1' ORDER BY date DESC LIMIT 3");
if(mysql_num_rows($item_list)) {
?>
<div class="index-news-block block-shadow ">
	<div class="container">	
		<div class="heading-block no-border">
			<h2 class="heading-site">Новости и статьи</h2>
		</div>
		<div class="_inb__flex">
<?
	while($row = mysql_fetch_array($item_list)) {
		$link = $this->FE->CMS->genLink($row, 'news', true, true);
		?>
			
			<article class="news-element _inb__item">
				<div class="news-element__inner _inb__inner">
					<div class="news-element__date"><?=date('d.m.Y', $row['date']);?></div>
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
	</div>
</div>
<?
}
?>