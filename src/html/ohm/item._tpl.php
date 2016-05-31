<?
$id = get_the_ID();
$img_sm = $this->Imgs->postImg($id, 'full');
if($img_sm == '') {
	$img_sm = $this->path('img').'/bg/bg-news-item.jpg';
}

$prev = get_previous_post(false);
$next = get_next_post(false);

?>
<div id="fullpage-second" class="fullpage-site">

<?
$this->tpl('_/top-nav', array());
?>

<div class="section news-item__section section-green page-section" style="background: url(<?=$img_sm;?>) no-repeat center;">
	<div class="_ps__rel">
		<header class="header-block _sg__header">
			<div class="_hb__flex">
				<div>
					<button type="button" class="_ps__btn _sg__btn" data-toggle="modal" data-target="#modal-navbar">
						<span class="_ps__btn-line">
							<span></span>
							<span></span>
							<span></span>
						</span>					
						меню сайта
					</button>
				</div>
				<div class="_hb__logotip">
					<div>
						<a href="/"><img src="<?php echo $this->path('img');?>/index/logotip-green.png" alt=""></a>
					</div>				
				</div>
				<div class="_hb__phone _sg__phone ">
					<div>Заказ столов <a href="tel:+74862543054"><span>+7 (4862)</span> 54-30-54</a></div>
					<button type="button" class="btn-order" data-toggle="modal" data-target="#modal-contactme" ></button>
				</div>
			</div>
		</header>
		<div class="_ps__inside-line _sg__inside-line _newsI__flex">
			<div class="_newsI__date"><?=get_the_date();?></div>
			<h1 class="_newsI__heading"><? the_title();?></h1>
			<div class="_ih__btn-scroll">Прокрутите вниз</div>
			
			<?
			if($prev) {
			?>
			<a href="<?=l($prev->ID);?>" class="_newsI__prevArticle _newsI__controls">предыдущая статья</a>
			<?
			}
			?>
			
			<?
			if($next) {
			?>
			<a href="<?=l($next->ID);?>" class="_newsI__nextArticle _newsI__controls">Следующая статья</a>
			<?
			}
			?>
			
			
		</div>
	</div>
</div>


<div class="section newsI-page__section section-grey page-section">
	<div class="_ps__rel" style="height:initial;" >
		<header class="header-block _sgr__header">
			<div class="_hb__flex">
				<div>
					<button type="button" class="_ps__btn _sgr__btn" data-toggle="modal" data-target="#modal-navbar">
						<span class="_ps__btn-line _sgr__btn-line">
							<span></span>
							<span></span>
							<span></span>
						</span>					
						меню сайта
					</button>
				</div>
				<div class="_hb__logotip">
					<div>
						<a href="/"><img src="<?php echo $this->path('img');?>/index/logotip-green.png" alt=""></a>
					</div>				
				</div>
				<div class="_hb__phone _sgr__phone ">
					<div>Заказ столов <a href="tel:+74862543054"><span>+7 (4862)</span> 54-30-54</a></div>
					<button type="button" class="btn-order" data-toggle="modal" data-target="#modal-contactme"></button>
				</div>
			</div>
		</header>
		<div class="_ps__inside-line _sgr__inside-line " style="padding-bottom: 100px;">
			<div class="_newsI-text__flex">
				
				<div id="overflow-container" class=" _newsI-text__scroll-hide scroll-recalc " style="height:initial;">
					<div class="overflow-container _newsI-text__scroll-element">
						<div class="overflowed scroll-overflow _newsI-text__scroll-overflow">
							<? the_content();?>
						</div>
					</div>
				</div>
				
				<!--
				<div id="overflow-container" class="scroll-hide _newsI-text__scroll-hide scroll-recalc ">
					<div class="overflow-container scroll-element _newsI-text__scroll-element">
						<div class="overflowed scroll-overflow _newsI-text__scroll-overflow">
							<? the_content();?>
						</div>
					</div>
				</div>
				
				<div class="scroll-container vertical right" data-target="#overflow-container" >
					<div class="scroll-line" >
						<div class="scroll" ></div>
					</div>
				</div>
				-->
				
			</div>
			<div class="_newsI-text__soc">
				<div>Поделиться в социальных сетях</div>
				<div>
					<a href="https://vk.com/share.php?url=<?=urlencode(get_the_permalink());?>&title=<?=urlencode(get_the_title());?>" class="_newsI-text__soc-item vk-icon"></a>
					<a href="https://www.facebook.com/sharer.php?u=<?=urlencode(get_the_permalink());?>" class="_newsI-text__soc-item fb-icon"></a>
				</div>
			</div>
			
			<?
			if($prev) {
			?>
			<a href="<?=l($prev->ID);?>" class="_newsI__prevArticle _newsI__controls">предыдущая статья</a>
			<?
			}
			?>
			
			<?
			if($next) {
			?>
			<a href="<?=l($next->ID);?>" class="_newsI__nextArticle _newsI__controls">Следующая статья</a>
			<?
			}
			?>
			
			<button class="_ps__btn-news _sgr__btn-news _azbn_news-archive-open">
				Архив публикаций
			</button>
			
			<div class="_newsP__panel  _azbn_news-archive">
				<button type="button" class="_nPanel__btn _azbn_news-archive-close"></button>
				<div id="overflow-container" class="scroll-hide _nPanel__scroll-hide" >
					<div class="overflow-container scroll-element _nPanel__scroll-element" >
						<div class="overflowed scroll-overflow _nPanel__scroll-overflow _azbn_news-archive-list" >						
								<div class="_nPanel__item _azbn_news-archive-item "><a href="#">Декабрь <span>2015</span></a></div><!-- active -->
								<div class="_nPanel__item _azbn_news-archive-item "><a href="#">Декабрь <span>2015</span></a></div>
								<div class="_nPanel__item _azbn_news-archive-item "><a href="#">Декабрь <span>2015</span></a></div>
								<div class="_nPanel__item _azbn_news-archive-item "><a href="#">Декабрь <span>2015</span></a></div>
								<div class="_nPanel__item _azbn_news-archive-item "><a href="#">Декабрь <span>2015</span></a></div><!-- active -->
								<div class="_nPanel__item _azbn_news-archive-item "><a href="#">Декабрь <span>2015</span></a></div>
								<div class="_nPanel__item _azbn_news-archive-item "><a href="#">Декабрь <span>2015</span></a></div>
								<div class="_nPanel__item _azbn_news-archive-item "><a href="#">Декабрь <span>2015</span></a></div>
								<div class="_nPanel__item _azbn_news-archive-item "><a href="#">Декабрь <span>2015</span></a></div><!-- active -->
								<div class="_nPanel__item _azbn_news-archive-item "><a href="#">Декабрь <span>2015</span></a></div>
								<div class="_nPanel__item _azbn_news-archive-item "><a href="#">Декабрь <span>2015</span></a></div>
								<div class="_nPanel__item _azbn_news-archive-item "><a href="#">Декабрь <span>2015</span></a></div>
								<div class="_nPanel__item _azbn_news-archive-item "><a href="#">Декабрь <span>2015</span></a></div><!-- active -->
								<div class="_nPanel__item _azbn_news-archive-item "><a href="#">Декабрь <span>2015</span></a></div>
								<div class="_nPanel__item _azbn_news-archive-item "><a href="#">Декабрь <span>2015</span></a></div>
								<div class="_nPanel__item _azbn_news-archive-item "><a href="#">Декабрь <span>2015</span></a></div>
								<div class="_nPanel__item _azbn_news-archive-item "><a href="#">Декабрь <span>2015</span></a></div><!-- active -->
								<div class="_nPanel__item _azbn_news-archive-item "><a href="#">Декабрь <span>2015</span></a></div>
								<div class="_nPanel__item _azbn_news-archive-item "><a href="#">Декабрь <span>2015</span></a></div>
								<div class="_nPanel__item _azbn_news-archive-item "><a href="#">Декабрь <span>2015</span></a></div>
								<div class="_nPanel__item _azbn_news-archive-item "><a href="#">Декабрь <span>2015</span></a></div><!-- active -->
								<div class="_nPanel__item _azbn_news-archive-item "><a href="#">Декабрь <span>2015</span></a></div>
								<div class="_nPanel__item _azbn_news-archive-item "><a href="#">Декабрь <span>2015</span></a></div>
								<div class="_nPanel__item _azbn_news-archive-item "><a href="#">Декабрь <span>2015</span></a></div>
						</div>
					</div>
				</div>
				
				<div class="scroll-container horizontal bottom" data-target="#overflow-container" >
					<div class="scroll-line" >
						<div class="scroll" ></div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>



<?
$this->tpl('_/section-footer-block', array());
?>

</div>

<?
$this->tpl('_/menu-modal', array());

?>
		<script>
			/*
			if(device.desktop()) {
				$('#fullpage-second').fullpage({
					navigation: true,
					navigationPosition: 'right',
					navigation: false,
				});
			}
			*/
			$(document).ready(function(){
				$('.scroll-container').trigger('init');
				
				
				$(window).on('resize', function(){
					if(!device.mobile()) {
						$('.section.news-item__section.section-green').height($(window).height());
					}
				})
					.trigger('resize');
			})
		</script>