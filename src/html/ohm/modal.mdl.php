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
				<form action="" class="form-modal">
					<div class="form-group"> 
						<label for="login" class="_formS__label">Ваше имя</label>
						<div class="_formS__input">
							<input type="name" class="form-control" id="login" placeholder="Введите ваше имя">
						</div>
					</div>
					<div class="form-group"> 
						<label for="pass" class="_formS__label">Пароль</label>
						<div class="_formS__input">
							<input type="password" class="form-control" id="pass" placeholder="Введите пароль">
						</div>
					</div>
					<div class="_formS__btn">
						<button type="submit" class="btn-form btn-enter">Войти</button>
						<button tupe="button" class="_formS__btn-link" id="getModal" data-toggle="modal" data-target="#modal-form-reg">Зарегистрироваться</button>
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
				<form action="" class="form-modal">
					<div class="form-group"> 
						<label for="fio" class="_formS__label">Ваше имя</label>
						<div class="_formS__input">
							<input type="name" class="form-control" id="fio" placeholder="Введите ваше имя">
						</div>
					</div>
					<div class="form-group"> 
						<label for="firm" class="_formS__label">Организация</label>
						<div class="_formS__input">
							<input type="name" class="form-control" id="firm" placeholder="Введите название организации">
						</div>
					</div>
					<div class="form-group"> 
						<label for="tel" class="_formS__label">Телефон</label>
						<div class="_formS__input">
							<input type="tel" class="form-control" id="tel" placeholder="Введите ваш телефон">
						</div>
					</div>
					<div class="form-group"> 
						<label for="production" class="_formS__label">Продукт</label>
						<div class="_formS__input">
							<input type="name" class="form-control" id="production" placeholder="Введите название продукта">
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
				<form action="" class="form-modal">
					<div class="form-group"> 
						<label for="fam" class="_formS__label">Фамилия<sup>*</sup></label>
						<div class="_formS__input">
							<input type="name" class="form-control" id="fam" placeholder="Введите вашу фамилию">
						</div>
					</div>
					<div class="form-group"> 
						<label for="name" class="_formS__label">Имя<sup>*</sup></label>
						<div class="_formS__input">
							<input type="name" class="form-control" id="name" placeholder="Введите ваше имя">
						</div>
					</div>
					<div class="form-group"> 
						<label for="mname" class="_formS__label">Отчество</label>
						<div class="_formS__input">
							<input type="name" class="form-control" id="mname" placeholder="Введите ваше отчество">
						</div>
					</div>
					<div class="form-group"> 
						<label for="email" class="_formS__label">Ваш e-mail<sup>*</sup></label>
						<div class="_formS__input">
							<input type="email" class="form-control" id="email" placeholder="Введите ваш e-mail">
						</div>
					</div>
					<div class="form-group"> 
						<label for="tel" class="_formS__label">Телефон<sup>*</sup></label>
						<div class="_formS__input">
							<input type="tel" class="form-control" id="tel" placeholder="Введите ваш телефон">
						</div>
					</div>
					<div class="form-group"> 
						<label for="company" class="_formS__label">Предприятие<sup>*</sup></label>
						<div class="_formS__input">
							<input type="text" class="form-control" id="company" placeholder="Введите название предприятия">
						</div>
					</div>
					<div class="form-group full"> 
						<label for="region" class="_formS__label">Регион<sup>*</sup></label>
						<div class="_formS__input">
							<select id="region" class="form-control">
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
							<input type="password" class="form-control" id="pass1" placeholder="Введите пароль">
						</div>
					</div>
					<div class="form-group"> 
						<label for="pass2" class="_formS__label">Подтвердите пароль<sup>*</sup></label>
						<div class="_formS__input">
							<input type="password" class="form-control" id="pass2" placeholder="Введите пароль">
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