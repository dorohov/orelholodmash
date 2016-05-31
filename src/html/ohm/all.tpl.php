<?
// CMS Azbn.ru Публичная версия
?>

<div class="catalog-content-block content-site _second-page__content-site ">
	<div class="container">
		<div class="heading-block _space-between">
			<h1 class="heading-site ">Каталог продукции</h1>
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
			
			<!--
			<div class="_cs__col _cs__right">
				<h2 class="_catalogP__heading">Конденсаторы испарительного типа ECA - 1200</h2>
				<div class="_cs__flex _catalogP__flex">
					<div class="_cs__col _catalogP__preview _catalogP__left">
						<img src="/img/index/price-item-1.jpg" alt="">
					</div>
					<div class="_cs__col _catalogP__right">
						<div class="_catalogP__note">
							<h4 class="_catalogP__note-heading">Особенности модели</h4>
							<div class="_icon _icon-resize">Компактный теплообменник</div>
							<div class="_icon _icon-fan">Мощные бесшумные вентиляторы</div>
							<div class="_icon _icon-kg">Малый вес и габариты</div>
							<div class="_icon _icon-steel">Равнопрочный стальной корпус</div>
						</div>
						<div class="_icb__price-btn _catalogP__price-btn">
							<a href="#" data-toggle="modal" data-target="#modal-form-calc" class="btn-red-border">Подобрать оборудование</a>
						</div>
						<div class="_icb__price-btn _catalogP__price-btn"><a href="#" class="btn-red" data-toggle="modal" data-target="#modal-form-bay">Оставить заявку на покупку</a></div>
					</div>
				</div>
			</div>
			-->
			
			<style>
			._azbn__product-grid {
				width:70%;
			}
			._azbn__product-grid__flex-wrap {
				flex-wrap: wrap;
			}
			._azbn__product-grid__item {
				width:20%;
			}
			</style>
			
			<div class="_cs__col _azbn__product-grid">
				<?
				if($param['cat_id']['id']) {
				?>
				
				<div class="heading-block ">
					<h4 class="_csb__heading"><?=$param['cat_id']['title'];?></h4>
				</div>
				
				<?
				} else {
					
				}
				?>
				
				<div class="_cs__flex _azbn__product-grid__flex-wrap">
					
					<?
					if(mysql_num_rows($param['item_list'])) {
						while($row=mysql_fetch_array($param['item_list'])) {
							$link = $this->FE->CMS->genLink($row, 'product', true, true);
					?>
					
					<div class="_cs__col _azbn__product-grid__item">
						<div class="_csb__model-heading"><a href="<?=$link;?>"><?=$row['title'];?></a></div>
						<div class="_csb__model-preview">
							<a href="<?=$link;?>">
								<img src="<?=$row['img'];?>" alt="">
							</a>
						</div>
					</div>
					
					<?
						}
						mysql_data_seek($param['item_list'], 0);
					}
					?>
					
				</div>
			</div>
			
			
		</div>
	</div>
</div>


<!--
<div class="catalog-specifications-block block-shadow ">
	<div class="container">
		<div class="_cs__flex _csb__flex">
			<div class="_cs__col _csb__col-left">
				<div class="heading-block _csb__heading-block">
					<h4 class="_csb__heading">Другие модели</h4>
				</div>
				<div class="_cs__flex _csb__model-list">
					<div class="_cs__col _csb__model-item">
						<div class="_csb__model-heading"><a href="#">ЕСА - 400</a></div>
						<div class="_csb__model-preview">
							<a href="/catalog.html">
								<img src="/img/catalog/item1.jpg" alt="">
							</a>
						</div>
					</div>
					<div class="_cs__col _csb__model-item">
						<div class="_csb__model-heading"><a href="#">ЕСА - 800</a></div>
						<div class="_csb__model-preview">
							<a href="/catalog.html">
								<img src="/img/catalog/item2.jpg" alt="">
							</a>
						</div>
					</div>
					<div class="_cs__col _csb__model-item">
						<div class="_csb__model-heading"><a href="#">ЕСА - 1600</a></div>
						<div class="_csb__model-preview">
							<a href="/catalog.html">
								<img src="/img/catalog/item3.jpg" alt="">
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="_cs__col _csb__col-right">
				<ul class="nav site-nav-tabs">
					<li class="active"><a href="#spec-item1" data-toggle="tab">Описание</a></li>
					<li><a href="#spec-item2" data-toggle="tab">Технические характеристики</a></li>
					<li><a href="#spec-item3" data-toggle="tab">Чертежи и документы</a></li>
					<li><a href="#spec-item4" data-toggle="tab">Технология изготовления</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane _csb__tab-pane fade in active" id="spec-item1">
						<div>Конденсатор испарительной марки ЕСА предназначен для охлаждения и конденсации паров аммиака в холодильной установке. Конденсатор применяется в составе аммиачных холодильных установок на предприятиях по хранению 	и переработки пищевых продуктов, а также в других тенологических процессах. Принцип действия конденсатора основан на передаче избыточного тепла от холодильного агента-аммиака, который необходимо охладить через теплообменник в окружающую среду, посредством испарения воды, омывающие оцинкованные теплообменные секции и воздушного потока.</div>
						<div>Конденсаторы испарительного типав являются эффективной альтернативой сухому охлаждению с применением орёбрённых труб и вентиляторов. А применение ЕСА вместо открытых градирен, соединённых с пластинчатыми или кожухотрубными теплообменниками, является ещё и экономичным обоснованием.</div>
					</div>
					<div class="tab-pane fade" id="spec-item2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo eos beatae pariatur officia, harum excepturi quis aliquid distinctio a, soluta fugit quos! Modi nemo maxime ullam quae, possimus esse, fugiat.</div>
					<div class="tab-pane fade" id="spec-item3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum dicta nemo, aliquid, temporibus, ad magni quo, perspiciatis voluptatibus commodi obcaecati veritatis facilis totam est.</div>
					<div class="tab-pane fade" id="spec-item4">...</div>
				</div>
			</div>
		</div> 
	</div>
</div>
-->
