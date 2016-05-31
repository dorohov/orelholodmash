<?
/* Пустой файл модуля. НЕ УДАЛЯТЬ! */
?>

<div class="header-site _hs__flex _hs__top">
	<div class="_hs__logotip hidden-sm">
		<a href="/"><img src="/img/logotip.png" alt=""></a>
	</div>
	<div class="_hs__address-block">
		<?
		$adr_index = $this->FE->CMS->getParamValue('adr_index');
		$adr = $this->FE->CMS->getParamValue('adr');
		$email1 = $this->FE->CMS->getParamValue('email1');
		?>
		<div class="_hs__address"><?=($adr_index.', '.$adr)?></div>
		<div class="_hs__email"><a href="mailto:<?=$email1;?>"><?=$email1;?></a></div>
	</div>
	<div class="_hs__phone-block">
		<?
		$phone1 = $this->FE->CMS->getParamValue('phone1');
		$phone2 = $this->FE->CMS->getParamValue('phone2');
		?>
		<div class="_hs__phone"><a href="tel:+<?=$this->FE->CMS->as_phone($phone1);?>"><?=$phone1;?></a></div>
		<div class="_hs__phone"><a href="tel:+<?=$this->FE->CMS->as_phone($phone2);?>"><?=$phone2;?></a></div>
	</div>
	<div class="_hs__btn-consult">
		<button class="btn-white-trans" type="button" data-toggle="modal" data-target="#modal-form-cons">Заказать консультацию</button>
	</div>
	<div class="_hs__link-group">
		<div>
			<?
			if(!$_SESSION['profile']['id']) {
			?>
			<button type="button" class="_hs__enter" data-toggle="modal" data-target="#modal-form-enter"><span>Войти на сайт<span></button>
			<?
			} else {
			?>
			<a href="/profile/off/" class="_hs__enter" ><span>Выйти<span></a>
			<?
			}
			?>
		</div>
		<div><a href="/contact/" class="_hs__map"><span>Схема проезда</span></a></div>
	</div>
</div> 
<nav class="navbar navbar-default">
	<div class="navbar-header">
		<div class="_hs__logotip">
			<a href="/"><img src="/img/logotip.png" alt=""></a>
		</div>
		<!--<button type="button" class="c-hamburger c-hamburger--htx " data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>-->
		<button class="c-hamburger c-hamburger--htx" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span>toggle menu</span>
		</button>
	</div>
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			<li><a href="/">Главная</a></li>
			<li><a href="/product/">Каталог продукции</a></li>
			<li><a href="/service/">Услуги и производство</a></li>
			<li><a href="/about/">О компании</a></li>
			<li><a href="/news/">Новости и статьи</a></li>
			<li><a href="/contact/">Контакты</a></li>
		</ul>
	</div>
</nav>
