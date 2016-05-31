<?
// ГдеДостать
?>

<div class="services-content-block content-site _second-page__content-site ">
	<div class="container">
		<div class="heading-block _srcb__heading-block">
			<h1 class="heading-site big">Услуги и производство</h1>
		</div>
		
		<?
		$item_list = $this->FE->DB->dbSelect("SELECT * FROM `".$this->FE->DB->dbtables['t_page']."` WHERE visible='1' AND cat='4' ORDER BY rating,id");
		if(mysql_num_rows($item_list)) {
		?>
		<ul class="_cs__flex _srcb__nav">
			<?
			while($row = mysql_fetch_array($item_list)) {
				$link = $this->FE->CMS->genLink($row, 'page', true, true);
			?>
				<li class="_cs__col _srcb__nav-col <?if($param['item_id']['id'] == $row['id']){echo 'active';}?> "><a href="<?=$link;?>"><?=$row['title'];?></a></li>
			<?
			}
			mysql_data_seek($item_list,0);
			?>
		</ul>
		<?
		}
		?>
		
		<div class="_cs__flex _srcb__flex"> 
			<div class="_cs__col _srcb__col">
				<?=$param['item_id']['main_info'];?>
			</div>
			<div class="_cs__col _srcb__col _srcb__col-right">
				<img src="<?=$param['item_id']['img'];?>" alt="">
			</div>
		</div>
		<div class="_srcb__step-block">
			<h2 class="_srcb__step-heading">Этапы работ</h2>
			
			<div class="_srcb__step-flex">
				<div class="_srcb__step-col">
					<div class="_srcb__step-item  dropdown">
						<div class="_srcb__item-inner" data-toggle="dropdown" aria-expanded="false">
							<div class="_srcb__item-num">1</div>
							<div class="_srcb__item-heading">Оценка состояния систем холодоснабжения</div>
							<div class="_srcb__item-icon"></div>
						</div>
						<div class="dropdown-menu _srcb__dropdown-menu" aria-labelledby="dLabel">
							Обследование объекта, сбор исходных данных. Фиксация и формулировка технико-экономических требований заказчика.
						</div>
					</div>
				</div>
				<div class="_srcb__step-col">
					<div class="_srcb__step-item dropdown">
						<div class="_srcb__item-inner" data-toggle="dropdown" aria-expanded="false">
							<div class="_srcb__item-num">2</div>
							<div class="_srcb__item-heading">Предпроектные работы</div>
							<div class="_srcb__item-icon"></div>
						</div>
						<div class="dropdown-menu _srcb__dropdown-menu" aria-labelledby="dLabel">
							Обследование объекта, сбор исходных данных. Фиксация и формулировка технико-экономических требований заказчика.
						</div>
					</div>
				</div>
				<div class="_srcb__step-col">
					<div class="_srcb__step-item dropdown">
						<div class="_srcb__item-inner" data-toggle="dropdown" aria-expanded="false">
							<div class="_srcb__item-num">3</div>
							<div class="_srcb__item-heading">Проектирование</div>
							<div class="_srcb__item-icon"></div>
						</div>
						<div class="dropdown-menu _srcb__dropdown-menu" aria-labelledby="dLabel">
							Обследование объекта, сбор исходных данных. Фиксация и формулировка технико-экономических требований заказчика.
						</div>
					</div>
				</div>
				<div class="_srcb__step-col">
					<div class="_srcb__step-item dropdown">
						<div class="_srcb__item-inner" data-toggle="dropdown" aria-expanded="false">
							<div class="_srcb__item-num">4</div>
							<div class="_srcb__item-heading">Экспертиза промышленной безопасности</div>
							<div class="_srcb__item-icon"></div>
						</div>
						<div class="dropdown-menu _srcb__dropdown-menu" aria-labelledby="dLabel">
							Обследование объекта, сбор исходных данных. Фиксация и формулировка технико-экономических требований заказчика.
						</div>
					</div>
				</div>
				<div class="_srcb__step-col">
					<div class="_srcb__step-item dropdown">
						<div class="_srcb__item-inner" data-toggle="dropdown" aria-expanded="false">
							<div class="_srcb__item-num">5</div>
							<div class="_srcb__item-heading">Поставка<br> оборудования<br> и арматуры</div>
							<div class="_srcb__item-icon"></div>
						</div>
						<div class="dropdown-menu _srcb__dropdown-menu" aria-labelledby="dLabel">
							Обследование объекта, сбор исходных данных. Фиксация и формулировка технико-экономических требований заказчика.
						</div>
					</div>
				</div> 
				<div class="_srcb__step-col">
					<div class="_srcb__step-item dropdown">
						<div class="_srcb__item-inner" data-toggle="dropdown" aria-expanded="false">
							<div class="_srcb__item-num">6</div>
							<div class="_srcb__item-heading">Монтаж оборудования</div>
							<div class="_srcb__item-icon"></div>
						</div>
						<div class="dropdown-menu _srcb__dropdown-menu" aria-labelledby="dLabel">
							Обследование объекта, сбор исходных данных. Фиксация и формулировка технико-экономических требований заказчика.
						</div>
					</div>
				</div>
				<div class="_srcb__step-col">
					<div class="_srcb__step-item dropdown">
						<div class="_srcb__item-inner" data-toggle="dropdown" aria-expanded="false">
							<div class="_srcb__item-num">7</div>
							<div class="_srcb__item-heading">Обучение<br> персонала<br> заказчика</div>
							<div class="_srcb__item-icon"></div>
						</div>
						<div class="dropdown-menu _srcb__dropdown-menu" aria-labelledby="dLabel">
							Обследование объекта, сбор исходных данных. Фиксация и формулировка технико-экономических требований заказчика.
						</div>
					</div>
				</div>
				<div class="_srcb__step-col">
					<div class="_srcb__step-item dropdown">
						<div class="_srcb__item-inner" data-toggle="dropdown" aria-expanded="false">
							<div class="_srcb__item-num">8</div>
							<div class="_srcb__item-heading">Гарантийное<br> и послегарантийное<br> обслуживание</div>
							<div class="_srcb__item-icon"></div>
						</div>
						<div class="dropdown-menu _srcb__dropdown-menu" aria-labelledby="dLabel">
							Обследование объекта, сбор исходных данных. Фиксация и формулировка технико-экономических требований заказчика.
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>