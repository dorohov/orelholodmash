<?
// Страница

$gal_items = $this->FE->DB->dbSelect("SELECT * FROM `".$this->FE->DB->dbtables['t_galleryitem']."` WHERE visible = '1' AND gal IN (".$param['item_id']['gal'].") ORDER BY rating");
$action_items = $this->FE->DB->dbSelect("SELECT * FROM `".$this->FE->DB->dbtables['t_company_action']."` WHERE visible = '1' AND company = '".$param['item_id']['id']."' ORDER BY rating");
$review_items = $this->FE->DB->dbSelect("SELECT * FROM `".$this->FE->DB->dbtables['t_company_review']."` WHERE visible = '1' AND company = '".$param['item_id']['id']."' ORDER BY created_at DESC");
?>


<div class="col-lg-9 _cb__left-col">

	<div class="company-item-page ">
		<div class="heading-block _space-between">
			<h1 class="heading-site"><?=$param['item_id']['title'];?></h1>
			
			<div class="_cb__flex _cip__btn-group">
				<div class="order-btn btn-yellow-border review-icon">
					<button type="button" class="btn-yellow" data-toggle="modal" data-target="#modal-subscr">Подписаться</button>
				</div>
				<?
					if($param['item_id']['param']['service']['order_table']) {
				?>
				<div class="order-btn btn-yellow-border">
					<button type="button" class="btn-yellow" data-toggle="modal" data-target="#modal-order">Заказать столик</button>
				</div>
				<?
				}
				?>
			</div>			
		</div>
		<div class="_cip__panel">
			<div class="_cip__panel-inner">
				<div class="_cip__panel-item">
					<div>
						<div class="_elem__starr starrr" data-rating="<?=ceil($param['item_id']['star_ball'] / $param['item_id']['star_count']);?>" data-starrr-readonly="1" ></div>
					</div>
					<div><a href="#reviews-company" class="icon-link icon-reviews scrollto" ><span>Отзывы</span></a></div>
					<div><button type="button" class="icon-link icon-location" data-toggle="modal" data-target="#modal-map"><span>найти на карте</span></button></div>
				</div>
				<div class="_cip__panel-item">
					<div><span>Адрес:</span> <?=$param['item_id']['param']['info']['adr'];?></div>
					<div><span>Телефон:</span> <a href="tel:<?=$this->FE->CMS->as_phone($param['item_id']['param']['info']['phone']);?>"><?=$param['item_id']['param']['info']['phone'];?></a></div>
					<div><span>E-mail:</span> <a href="mailto:<?=$param['item_id']['param']['info']['email'];?>"><?=$param['item_id']['param']['info']['email'];?></a></div>
					<div><span>Сайт:</span> <a href="<?=$param['item_id']['param']['info']['site'];?>" target="_blank" rel="nofollow"><?=$param['item_id']['param']['info']['site'];?></a></div>
				</div>
				<div class="_cip__panel-item">
					<div><span>Режим работы:</span> <?=$param['item_id']['param']['info']['worktime'];?></div>
					<?
					if($param['item_id']['param']['info']['discount'] != '') {
					?>
					<div><span>Скидки:</span> <?=$param['item_id']['param']['info']['discount'];?></div>
					<?
					}
					?>
					
					<?
					if($param['item_id']['param']['info']['discount'] != '') {
					?>
					<div><span>Акции:</span> <?=$param['item_id']['param']['info']['action'];?></div>
					<?
					}
					?>
					
					
					<div><span>Метод оплаты:</span> <?=$param['item_id']['param']['info']['pay'];?></div>
				</div> 
			</div>
		</div>
		<div class="_cip__spoiler">
			<div class="_cip__spoiler-short-text"><p><?=$param['item_id']['preview'];?></p></div>
			<div class="_cip__spoiler-text azbn__spoiler-text">
				<div>
					<?=$param['item_id']['main_info'];?>
				</div>
			</div>
			<button type="button" class="_cip__spoiler-link azbn__spoiler-link"><span>Все описание</span></button>
		</div>
		
		<?
		if(mysql_num_rows($gal_items)) {
		?>
		
		<div class="_cip__flexslider">
			<div id="slider" class="flexslider">
				<ul class="slides">
					
					<?
					while($row=mysql_fetch_array($gal_items)) {
					?>
					<li>
						<img src="<?=$row['img'];?>" alt="<?=$row['title'];?>" />
					</li>
					<?
					}
					mysql_data_seek($gal_items, 0);
					?>
					<!--
					<li>
						<img src="/img/slides/item-lock.png" alt="" />
					</li>
					-->
				</ul>
			</div>
			<div id="carousel" class="flexslider">
				<ul class="slides">
					
					<?
					while($row=mysql_fetch_array($gal_items)) {
					?>
					<li>
						<img src="<?=$row['img'];?>" alt="<?=$row['title'];?>" />
					</li>
					<?
					}
					mysql_data_seek($gal_items, 0);
					?>
					
				</ul>
			</div>
		</div>
		
		<?
		}
		?>
		
		<?
		if(mysql_num_rows($action_items)) {
		?>
		
		<div class="heading-block ">
			<h2 class="heading-site small">Действующие акции</h2>
		</div>
		<div class="_cip__spoiler-action">
			<div class="_cip__spoiler-action-th">
				<div class="_cip__spoiler-action-flex">
					
					<?
					$i = 0;
					while($row=mysql_fetch_array($action_items)) {
						if($i < 3) {
						?>
						<div class="element-items">
							<a href="<?=$this->FE->CMS->genLink($row, 'company_action', true, true);?>"><img src="<?=$row['img'];?>" alt="" class="img-responsive"></a>
						</div>
						<?
						}
						$i++;
					}
					mysql_data_seek($action_items, 0);
					?>
					
				</div>
			</div>
			<div class="_cip__spoiler-action-th-hidden _azbn-company-action-showAll-prev">			
				<div class="_cip__spoiler-action-flex">
					
					<?
					$i = 0;
					while($row=mysql_fetch_array($action_items)) {
						if($i > 2) {
						?>
						<div class="element-items">
							<a href="<?=$this->FE->CMS->genLink($row, 'company_action', true, true);?>"><img src="<?=$row['img'];?>" alt="" class="img-responsive"></a>
						</div>
						<?
						}
						$i++;
					}
					mysql_data_seek($action_items, 0);
					?>
					
				</div>
			</div>
			<button type="button" class="_cip__spoiler-action-link btn-yellow _azbn-company-action-showAll">Все акции</button>
		</div>
		
		<?
		}
		?>
		
		
		<div class="share-block">
			<?
			$link = urlencode('http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);//urlencode($this->FE->config['base_url'].$this->FE->CMS->genLink($param['item_id'], 'company', true, true));
			?>
			Поделиться:
			
			<a href="https://vk.com/share.php?url=<?=$link;?>&title=<?=urlencode($param['item_id']['title']);?>" target="_blank" class="_shb__icon icon-vk"></a>
			<a href="https://www.facebook.com/sharer.php?u=<?=$link;?>" target="_blank" class="_shb__icon icon-fb"></a>
			<a href="https://twitter.com/intent/tweet?text=<?=urlencode($param['item_id']['title'] . ' ');?><?=$link;?>" target="_blank" class="_shb__icon icon-tw"></a>
			<a href="https://plus.google.com/share?url=<?=$link;?>" target="_blank" class="_shb__icon icon-gp"></a>
			<a href="http://www.ok.ru/dk?st.cmd=addShare&st.s=1&st._surl=<?=$link;?>&st.comments=<?=urlencode($param['item_id']['title']);?>" target="_blank" class="_shb__icon icon-ok"></a>
		</div>
		
		
		
		
		
		<div class="heading-block _cip-reviews__heading-block _space-between" id="reviews-company">
			<h2 class="heading-site small">Отзывы</h2>
			<div class="review-btn btn-yellow-border">
				<button type="button" class="btn-yellow" data-toggle="modal" data-target="#modal-reviews">Написать отзыв</button>
			</div>
		</div>
		
		<?
		if(mysql_num_rows($review_items)) {
		?>
		<div class="_cip__reviews">
		
			<?
			$i = 0;
			while($row=mysql_fetch_array($review_items)) {
				if(1) {
				?>
			
			<div class="_cip__reviews-items">
				<div class="_elem__inner">			
					<div class="_elem__heading small"><?=$param['item_id']['title'];?></div>
					<div class="_elem__star">
						<div class="_elem__starr starrr" data-rating="<?=$row['star_ball'];?>" data-starrr-readonly="1" ></div>
					</div>				
					<div class="_elem__note"><?=$row['main_info'];?></div>
					<div class="_elem__client"><?=$row['review_name'];?></div>
				</div>
			</div>
			
				<?
				}
				$i++;
			}
			mysql_data_seek($review_items, 0);
			?>
			
			<!--<button type="button" class="_cip__spoiler-link"><span>Все отзывы</span></button>-->
			
		</div>
		
		<?
		}
		?>
		
		
		
	</div>

	<div class="modal fade" id="modal-order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Заказ столика</h4>
				</div>
				<div class="modal-body">
					<form class="site-form _cip__form _cip__form-order" method="POST" action="/company/service_order_table/" >
						<input type="hidden" name="company" value="<?=$param['item_id']['id'];?>" />
						<label>
							<div>Имя<sup>*</sup></div>
							<input type="text" name="order[name]" value="" />
						</label>
						<label>
							<div>Дата</div>
							<input type="date" name="order[date]" id="datepicker"  value="" />
						</label>
						<label>
							<div>Телефон<sup>*</sup></div>
							<input type="tel" name="order[phone]" >
						</label>
						<label class="clockpicker">
							<div>Время</div>
							<input type="time" name="order[time]" value="" >
						</label>
						<label>
							<div>Количество человек</div>
							<input type="number" min="0" step="1" name="order[person]" >
						</label>
						<label class="_sf__textarea">
							<div>Ваши пожелания</div>
							<textarea name="order[main_info]" ></textarea>
						</label>
						<div class="_sf__btn">
							<button type="submit" class="btn-yellow">Отправить заявку</button>
						</div>
						<div>
							<div>поля отмеченые звездочкой (<sup>*</sup>)</div>
							<div>обязательны для заполнения</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<div class="_cip__modal-footer">
						<div>вы так же можете сделать заявку по телефону:</div>
						<div><a href="tel:<?=$this->FE->CMS->as_phone($param['item_id']['param']['info']['phone']);?>"><?=$param['item_id']['param']['info']['phone'];?></a></div>
					</div>
				</div>
			</div>
			<button type="button" class="modal-close" data-dismiss="modal" aria-hidden="true"></button>
		</div>
	</div>
	
	
	<div class="modal fade" id="modal-reviews" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Оставить отзыв</h4>
				</div>
				<div class="modal-body">
					<form class="site-form _cip__form" method="POST" action="/company/create_review/" >
						<input type="hidden" name="company" value="<?=$param['item_id']['id'];?>" />
						<label>
							<div>Имя<sup>*</sup></div>
							<input type="text" name="review_name">
						</label>
						<label>
							<div>E-mail<sup>*</sup></div>
							<input type="email" name="review_email">
						</label>
						<label class="_sf__textarea">
							<div>Ваш отзыв<sup>*</sup></div>
							<textarea name="main_info"></textarea>
						</label>
						
						<label>
							<div>Оценка заведения</div>
							<input type="hidden" id="star_ball" name="star_ball" value="0" />
							<div class="_elem__starr starrr" data-rating="0" data-starrr-readonly="0" data-target="#star_ball" ></div>
						</label>
						
						<div class="_sf__btn">
							<button type="submit" class="btn-yellow">Добавить отзыв</button>
						</div>
						<div>
							<div>поля отмеченые звездочкой (<sup>*</sup>)</div>
							<div>обязательны для заполнения</div>
						</div>
					</form>
				</div>
			</div>
			<button type="button" class="modal-close" data-dismiss="modal" aria-hidden="true"></button>
		</div>
	</div>
	
	
	<div class="modal fade" id="modal-subscr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Оформить подписку на новости</h4>
				</div>
				<div class="modal-body">
					<form class="site-form _cip__form company-subscr-form" method="POST"  >
						<input type="hidden" name="company" value="<?=$param['item_id']['id'];?>" />
						<label>
							<div>Имя<sup>*</sup></div>
							<input type="text" name="name">
						</label>
						<label>
							<div>E-mail<sup>*</sup></div>
							<input type="email" name="email">
						</label>
						<div class="_sf__btn">
							<button type="submit" class="btn-yellow">Отправить</button>
						</div>
					</form>
				</div>
			</div>
			<button type="button" class="modal-close" data-dismiss="modal" aria-hidden="true"></button>
		</div>
	</div>
	
	
	<div class="modal fade" id="modal-map" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Название заведения на карте</h4>
				</div>
				<div class="modal-body">
					<div id="map2gis-modal"></div>
				</div>
			</div>
			<button type="button" class="modal-close" data-dismiss="modal" aria-hidden="true"></button>
		</div>
	</div>

</div>

<div class="col-lg-3 _cb__right-col">
	<?
	//$param['mdl']['main/site-banner']='main/site-banner';
	//$this->FE->Viewer->module('main/site-banner', $param);
	
	$this->FE->Viewer->view_banner(array(
		'view_at'=>1,
		'tpl'=>'banner/right-col',
		'limit'=>4,
		'cache_time'=>3600,
		'order_by'=>'rating',
	),$param);
	
	?>
	<!--
	<div class="site-banner site-banner__map "> 
		<div class="_site-banner__item _map__item"> 
			<div class="_map__item-block">
				<div id="map2gis"></div>
			</div>
		</div>
		<div class="_site-banner__item"> 
			<img src="/img/index/banner-item.jpg" alt="">
		</div>
		<div class="_site-banner__item"> 
			<img src="/img/index/banner-item.jpg" alt="">
		</div>
	</div>
	-->
</div>