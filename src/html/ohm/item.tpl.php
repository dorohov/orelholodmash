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
			
			<div class="_cs__col _cs__right">
				<h2 class="_catalogP__heading"><?=$param['cat_id']['title'];?>: <?=$param['item_id']['title'];?></h2>
				<div class="_cs__flex _catalogP__flex">
					<div class="_cs__col _catalogP__preview _catalogP__left">
						<img src="<?=$param['item_id']['img'];?>" alt="">
					</div>
					<div class="_cs__col _catalogP__right">
						<div class="_catalogP__note">
							<h4 class="_catalogP__note-heading">Особенности модели</h4>
							<?=$param['item_id']['main_info'];?>
						</div>
						<div class="_icb__price-btn _catalogP__price-btn">
							<a href="#" data-toggle="modal" data-target="#modal-form-calc" class="btn-red-border">Подобрать оборудование</a>
						</div>
						<div class="_icb__price-btn _catalogP__price-btn"><a href="#" class="btn-red" data-toggle="modal" data-target="#modal-form-bay">Оставить заявку на покупку</a></div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>


<div class="catalog-specifications-block block-shadow ">
	<div class="container">
		<div class="_cs__flex _csb__flex">
			<div class="_cs__col _csb__col-left">
				
				<?
				$item_list = $this->FE->DB->dbSelect("SELECT * FROM `".$this->FE->DB->dbtables['t_product']."` WHERE visible='1' AND (cat='".$param['item_id']['cat']."') ORDER BY RAND() LIMIT 3");
				if(mysql_num_rows($item_list)) {
				?>
				<div class="heading-block _csb__heading-block">
					<h4 class="_csb__heading">Другие модели</h4>
				</div>
				<div class="_cs__flex _csb__model-list">
				<?
					while($row=mysql_fetch_array($item_list)) {
					$link = $this->FE->CMS->genLink($row, 'product', true, true);
					?>
					
					<div class="_cs__col _csb__model-item">
						<div class="_csb__model-heading"><a href="<?=$link;?>"><?=$row['title'];?></a></div>
						<div class="_csb__model-preview">
							<a href="<?=$link;?>">
								<img src="<?=$row['img'];?>" alt="">
							</a>
						</div>
					</div>
					
					<?
					}
					mysql_data_seek($item_list, 0);
				?>
				</div>
				<?
				}
				?>
				
				
			</div>
			<div class="_cs__col _csb__col-right">
				<ul class="nav site-nav-tabs">
					<li class="active"><a href="#spec-item1" data-toggle="tab">Описание</a></li>
					<li><a href="#spec-item2" data-toggle="tab">Технические характеристики</a></li>
					<li><a href="#spec-item3" data-toggle="tab">Чертежи и документы</a></li>
					<li><a href="#spec-item4" data-toggle="tab">Технология изготовления</a></li>
				</ul>
				<div class="tab-content">
					<?
					$option = array(
						'about' => $this->FE->DB->dbSelectFirstRow("SELECT * FROM `".$this->FE->DB->dbtables['t_product_option']."` WHERE (product_id='".$param['item_id']['id']."' AND uid='about')"),
						'technical' => $this->FE->DB->dbSelectFirstRow("SELECT * FROM `".$this->FE->DB->dbtables['t_product_option']."` WHERE (product_id='".$param['item_id']['id']."' AND uid='technical')"),
						'cad' => $this->FE->DB->dbSelectFirstRow("SELECT * FROM `".$this->FE->DB->dbtables['t_product_option']."` WHERE (product_id='".$param['item_id']['id']."' AND uid='cad')"),
						'technology' => $this->FE->DB->dbSelectFirstRow("SELECT * FROM `".$this->FE->DB->dbtables['t_product_option']."` WHERE (product_id='".$param['item_id']['id']."' AND uid='technology')"),
					)
					?>
					<div class="tab-pane _csb__tab-pane fade in active" id="spec-item1">
						<?=$option['about']['value'];?>
					</div>
					<div class="tab-pane fade" id="spec-item2">
						<?=$option['technical']['value'];?>
					</div>
					<div class="tab-pane fade" id="spec-item3">
						<?=$option['cad']['value'];?>
					</div>
					<div class="tab-pane fade" id="spec-item4">
						<?=$option['technology']['value'];?>
					</div>
				</div>
			</div>
		</div> 
	</div>
</div>
