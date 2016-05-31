<?
// CMS Azbn.ru Публичная версия
?>

<footer class="footer-site ">
	<div class="footer-nav">
		<div class="container">
			<div class="_fs__nav-flex">
				<div class="_fs__nav-item">
					<ul>
						<li class="disabled">О компании</li>
						<li><a href="/certificate/">Сертификаты</a></li>
						<li><a href="/geography/">География объектов</a></li>
						<li><a href="/calc/">Программы расчёта</a></li>
						<li><a href="/vacancy/">Вакансии</a></li>
						<li><a href="/review/">Отзывы</a></li>
					</ul>
				</div>
				<div class="_fs__nav-item">
					<ul>
						<li class="disabled">Каталог продукции</li>
						<!--
						<li><a href="/catalog.html">Воздухоохладители</a></li>
						<li><a href="/catalog.html">Испарительные конденсаторы</a></li>
						<li><a href="/catalog.html">Системы подготовки ледяной воды</a></li>
						<li><a href="/catalog.html">Чиллеры</a></li>
						<li><a href="/catalog.html">Теплообменники пластинчатые</a></li>
						<li><a href="/catalog.html">Оребрённая труба и батареи</a></li>
						<li><a href="/catalog.html">Панели теплообменные из нержавеющей стали</a></li>
						<li><a href="/catalog.html">Ремкомплекты</a></li>
						-->
					</ul>
				</div>
				<div class="_fs__nav-item">
					<ul>
						<li class="disabled">Услуги и производство</li>
						
						<?
						$item_list = $this->FE->DB->dbSelect("SELECT * FROM `".$this->FE->DB->dbtables['t_page']."` WHERE visible='1' AND cat='4' ORDER BY rating,id");
						if(mysql_num_rows($item_list)) {
							
							while($row = mysql_fetch_array($item_list)) {
								$link = $this->FE->CMS->genLink($row, 'page', true, true);
							?>
								<li><a href="<?=$link;?>" ><?=$row['title'];?></a></li>
							<?
							}
							mysql_data_seek($item_list,0);
							
						}
						?>
						
					</ul>
				</div>
				<div class="_fs__nav-item">
					<ul>
						<li class="disabled">Отрасли применения</li>
						<li><a href="#">Пищевая промышленность</a></li>
						<li><a href="#">Другие отрасли</a></li>
					</ul>
				</div>
				<div class="_fs__nav-item">
					<ul>
						<li class="disabled">Информация</li>
						<li><a href="/news/">Новости и статьи</a></li>
						<li><a href="/video/">Видеопрезентации</a></li>
						<li><a href="/exposition/">Выставки</a></li>
						<li><a href="/client/">Клиентам</a></li>	
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-block">		
		<div class="container">
			<div class="header-site _hs__flex _hs__top">
				<div class="_fs__logotip">
					<a href="/"><img src="/img/logotip.png" alt=""></a>
				</div>
				<div>
					<?
					$adr_index = $this->FE->CMS->getParamValue('adr_index');
					$adr = $this->FE->CMS->getParamValue('adr');
					$email1 = $this->FE->CMS->getParamValue('email1');
					?>
					<div class="_hs__address"><?=($adr_index.', '.$adr)?></div>
					<div class="_hs__email"><a href="mailto:<?=$email1;?>"><?=$email1;?></a></div>
				</div>
				<div>
					<?
					$phone1 = $this->FE->CMS->getParamValue('phone1');
					$phone2 = $this->FE->CMS->getParamValue('phone2');
					?>
					<div class="_hs__phone"><a href="tel:+<?=$this->FE->CMS->as_phone($phone1);?>"><?=$phone1;?></a></div>
					<div class="_hs__phone"><a href="tel:+<?=$this->FE->CMS->as_phone($phone2);?>"><?=$phone2;?></a></div>
				</div>
				<div class="_fs__map">
					<a href="/contact/">Схема проезда</a>
				</div>
				<div class="_fs__dorohovdesign">
					<a href="http://www.dorohovdesign.ru/" target="_blank">Создание сайта</a>
					<a href="http://www.dorohovdesign.ru/" target="_blank"><img src="/img/dorohovdesign.png" alt="" ></a>
				</div>
			</div> 
		</div>
	</div>
</footer>

<?

$param['mdl']['page_modal']='default/page_modal';
$this->FE->Viewer->module_live('page_modal',$param);

//$param['mdl']['page_footer']='admin/menu_entityitem_list';
$this->FE->Viewer->module_live('page_footer',$param);

$this->FE->PluginMng->event('viewer:body:after', $param);
?>

</body>
</html>