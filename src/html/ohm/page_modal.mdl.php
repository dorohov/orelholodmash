<?
/* Пустой файл модуля. НЕ УДАЛЯТЬ! */
?>


<!-- modal/enter.html -->
<div class="modal fade modal-site " id="modal-form-enter" tabindex="-1"  >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Вход на сайт</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="/profile/start/" method="POST" class="form-modal">
					<input type="hidden" name="back_url" value="<?=$_SERVER['REQUEST_URI'];?>" />
					<div class="form-group"> 
						<label for="login" class="_formS__label">Ваш E-mail</label>
						<div class="_formS__input">
							<input type="name" name="login" class="form-control" id="login" placeholder="Введите ваше имя">
						</div>
					</div>
					<div class="form-group"> 
						<label for="pass" class="_formS__label">Пароль</label>
						<div class="_formS__input">
							<input type="password" name="pass" class="form-control" id="pass" placeholder="Введите пароль">
						</div>
					</div>
					<div class="_formS__btn">
						<button type="submit" class="btn-form btn-enter">Войти</button>
						
						<?
						if(!$_SESSION['profile']['id']) {
						?>
						<button tupe="button" class="_formS__btn-link" id="getModal" data-toggle="modal" data-target="#modal-form-reg">Зарегистрироваться</button>
						<?
						}
						?>
						
					</div>
				</form>	
			</div>
		</div>
	</div>
</div>




<!-- modal/consultations.html -->
<div class="modal fade modal-site " id="modal-form-cons" tabindex="-1"  >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Заказ консультации</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="" class="form-modal azbn-api-call-ohm-orderconsult">
					<div class="form-group"> 
						<label for="fio" class="_formS__label">Ваше имя</label>
						<div class="_formS__input">
							<input type="name" name="name" class="form-control" id="fio" placeholder="Введите ваше имя" value="<?=$_SESSION['profile']['param']['name2'];?> <?=$_SESSION['profile']['param']['name1'];?>" >
						</div>
					</div>
					<div class="form-group"> 
						<label for="firm" class="_formS__label">Организация</label>
						<div class="_formS__input">
							<input type="name" name="org" class="form-control" id="firm" placeholder="Введите название организации" value="<?=$_SESSION['profile']['param']['org'];?>" >
						</div>
					</div>
					<div class="form-group"> 
						<label for="tel" class="_formS__label">Телефон</label>
						<div class="_formS__input">
							<input type="tel" name="phone" class="form-control" id="tel" placeholder="Введите ваш телефон"  value="<?=$_SESSION['profile']['param']['phone'];?>" >
						</div>
					</div>
					<div class="form-group"> 
						<label for="production" class="_formS__label">Продукт</label>
						<div class="_formS__input">
							<input type="name"  name="product" class="form-control" id="production" placeholder="Введите название продукта" >
						</div>
					</div>
					<div class="_formS__btn">
						<button type="submit" class="btn-form btn-zakaz">Заказать</button>
					</div>					
				</form>	
			</div>
		</div>
	</div>
</div>




<!-- modal/registration.html -->
<div class="modal fade modal-site " id="modal-form-reg" tabindex="-1"  >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Регистрация</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="/profile/create/" method="POST" class="form-modal">
					<input type="hidden" name="back_url" value="<?=$_SERVER['REQUEST_URI'];?>" />
					<div class="form-group"> 
						<label for="fam" class="_formS__label">Фамилия<sup>*</sup></label>
						<div class="_formS__input">
							<input type="name" name="name2" class="form-control" id="fam" placeholder="Введите вашу фамилию" value="<?=$_SESSION['tmp']['registration']['name2'];?>" >
						</div>
					</div>
					<div class="form-group"> 
						<label for="name" class="_formS__label">Имя<sup>*</sup></label>
						<div class="_formS__input">
							<input type="name" name="name1" class="form-control" id="name" placeholder="Введите ваше имя" value="<?=$_SESSION['tmp']['registration']['name1'];?>" >
						</div>
					</div>
					<div class="form-group"> 
						<label for="mname" class="_formS__label">Отчество</label>
						<div class="_formS__input">
							<input type="name" name="name3" class="form-control" id="mname" placeholder="Введите ваше отчество" value="<?=$_SESSION['tmp']['registration']['name3'];?>" >
						</div>
					</div>
					<div class="form-group"> 
						<label for="email" class="_formS__label">Ваш e-mail<sup>*</sup></label>
						<div class="_formS__input">
							<input type="email" name="email" class="form-control" id="email" placeholder="Введите ваш e-mail" value="<?=$_SESSION['tmp']['registration']['email'];?>" >
						</div>
					</div>
					<div class="form-group"> 
						<label for="tel" class="_formS__label">Телефон<sup>*</sup></label>
						<div class="_formS__input">
							<input type="tel" name="phone" class="form-control" id="tel" placeholder="Введите ваш телефон" value="<?=$_SESSION['tmp']['registration']['phone'];?>" >
						</div>
					</div>
					<div class="form-group"> 
						<label for="company" class="_formS__label">Предприятие<sup>*</sup></label>
						<div class="_formS__input">
							<input type="text" name="org" class="form-control" id="company" placeholder="Введите название предприятия" value="<?=$_SESSION['tmp']['registration']['org'];?>" >
						</div>
					</div>
					<div class="form-group full"> 
						<label for="region" class="_formS__label">Регион<sup>*</sup></label>
						<div class="_formS__input">
							<select id="region" name="region" class="form-control">
								<option disabled selected >Начните вводить, или выберите из списка</option>
								<?
								$reg_list = $this->FE->DB->dbSelect("SELECT * FROM `".$this->FE->DB->dbtables['t_region']."` WHERE visible='1' ORDER BY code");
								if(mysql_num_rows($reg_list)) {
									while($row=mysql_fetch_array($reg_list)) {
										?>
										<option value="<?=$row['id'];?>"><?=$row['title'];?></option>
										<?
									}
									mysql_data_seek($reg_list,0);
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group"> 
						<label for="pass1" class="_formS__label">Пароль<sup>*</sup></label>
						<div class="_formS__input">
							<input type="password" name="pass" class="form-control" id="pass1" placeholder="Введите пароль">
						</div>
					</div>
					<div class="form-group"> 
						<label for="pass2" class="_formS__label">Подтвердите пароль<sup>*</sup></label>
						<div class="_formS__input">
							<input type="password" name="pass_confirm" class="form-control" id="pass2" placeholder="Введите пароль">
						</div>
					</div>
					<div class="_formS__btn">
						<button type="submit" class="btn-form btn-reg">Зарегистрироваться</button>
					</div>					
				</form>	
			</div>
		</div>
	</div>
</div>






<!-- modal/calc.html -->
<div class="modal fade modal-site calc-block " id="modal-form-calc" tabindex="-1"  >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Подбор и расчёт стоимости</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<ul class="_calcb__nav">
					<li class="active"><a href="#calc-vozd" data-toggle="tab">Воздухоохладители</a></li>
					<li><a href="#calc-kond" data-toggle="tab">Конденсаторы</a></li>
					<li><a href="#calc-plen" data-toggle="tab">Пленочные охладители</a></li>
					<li><a href="#calc-teploob" data-toggle="tab">Теплообменники</a></li>
				</ul>
				<div class="tab-content">
					<?
					$param['mdl']['calc/vozd'] = 'calc/vozd';
					$this->FE->Viewer->module_live('calc/vozd', $param);
					
					$param['mdl']['calc/kond'] = 'calc/kond';
					$this->FE->Viewer->module_live('calc/kond', $param);
					
					$param['mdl']['calc/plen'] = 'calc/plen';
					$this->FE->Viewer->module_live('calc/plen', $param);
					
					$param['mdl']['calc/teploob'] = 'calc/teploob';
					$this->FE->Viewer->module_live('calc/teploob', $param);
					?>
				</div>
			</div>
		</div>
	</div>
</div>





<!-- modal/buy.html -->
<div class="modal fade modal-site buy-block " id="modal-form-bay" tabindex="-1"  >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Заявка на покупку</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="" class="form-modal azbn-api-call-ohm-orderproduct ">
					<input type="hidden" name="product_id" value="<?=$param['item_id']['id']?>" />
					<input type="hidden" name="product_title" value="<?=$param['cat_id']['title']?>: <?=$param['item_id']['title']?>" />
					<div class="form-group"> 
						<label for="fio" class="_formS__label">Контактное лицо</label>
						<div class="_formS__input">
							<input type="text" name="name" class="form-control" id="fio" placeholder="Введите ваше имя" value="<?=$_SESSION['profile']['param']['name2'];?> <?=$_SESSION['profile']['param']['name1'];?>" >
						</div>
					</div>
					<div class="form-group"> 
						<label for="firm" class="_formS__label">Организация</label>
						<div class="_formS__input">
							<input type="text" name="org" class="form-control" id="firm" placeholder="Введите название организации" value="<?=$_SESSION['profile']['param']['org'];?>" >
						</div>
					</div>
					<div class="form-group"> 
						<label for="tel" class="_formS__label">E-mail или телефон</label>
						<div class="_formS__input">
							<input type="text" name="email" class="form-control" id="tel" placeholder="Введите ваш E-mail или телефон" value="<?=$_SESSION['profile']['param']['email'];?>">
						</div>
					</div>
					<div class="form-group"> 
						<label for="post" class="_formS__label">Должность</label>
						<div class="_formS__input">
							<input type="text" name="position" class="form-control" id="post" placeholder="Введите вашу должность">
						</div>
					</div>
					<div class="form-group full"> 
						<label for="note" class="_formS__label">Коментарий</label>
						<div class="_formS__input _formS__textarea">
							<textarea id="note" name="comment" class="form-control" placeholder="Коментарий к заказу"></textarea>
						</div>
					</div>
					<div class="_formS__btn">
						<button type="submit" class="btn-form btn-zakaz">Заказать</button>
					</div>					
				</form>	
			</div>
		</div>
	</div>
</div>