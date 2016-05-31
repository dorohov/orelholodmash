<?
// ГдеДостать
?>

<div class="contacts-content-block content-site _second-page__content-site ">
	<div class="container">
		<div class="heading-block _ctcb__heading-block">
			<h1 class="heading-site">Контакты</h1>
		</div>
		<ul class="_cs__flex _ctcb__tabs">
			<li class="active _cs__col"><a href="#cont-item1" data-toggle="tab">Общие контакты</a></li>
			<li class="_cs__col"><a href="#cont-item2" data-toggle="tab">Коммерческий блок</a></li>
			<li class="_cs__col"><a href="#cont-item3" data-toggle="tab">Технический блок</a></li>
			<li class="_cs__col"><a href="#cont-item4" data-toggle="tab">Финансово-экономический блок</a></li>
			<li class="_cs__col"><a href="#cont-item5" data-toggle="tab">Административно-хозяйственный блок</a></li>
		</ul>

		
		<div class="_cs__flex _ctcb__flex">
			<div class="_cs__col _ctcb__contacts">
				<div class="tab-content">
					<?=$param['item_id']['main_info'];?>
				</div>
			</div>
			<div class="_cs__col _ctcb__map">
				<script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=tBiqyB8oL34nFrCyUzYxJbKi7CjQ4xSw&width=100%&height=350&lang=ru_RU&sourceType=constructor"></script>
			</div>
		</div>		
	</div>
</div>