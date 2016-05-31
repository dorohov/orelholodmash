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
					<li class="active"><a href="#calc-item1" data-toggle="tab">Воздухоохладители</a></li>
					<li><a href="#calc-item2" data-toggle="tab">Конденсаторы</a></li>
					<li><a href="#calc-item3" data-toggle="tab">Пленочные охладители</a></li>
					<li><a href="#calc-item4" data-toggle="tab">Теплообменники</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade in active" id="calc-item1">		
						<form action="" class="form-modal coolers-form _cs__flex" >
							<div class="_cs__col _clrf__col">
								<div class="_clrf__inner _cs__flex">		
									<div class="_calcb__form-group _cs__col"> 
										<label for="power" class="_calcb__label">Нагрузка на аппарат, кВт</label>
										<div class="_calcb__input _calcb__width">
											<input type="name" class="form-control" id="power" value="15">
										</div>
									</div>		
									<div class="_calcb__form-group _cs__col"> 
										<label for="t_kam" class="_calcb__label">Температура в камере, &#8451;</label>
										<div class="_calcb__input _calcb__width">
											<input id="t_kam" name="t_kam" type="text" value="-8" placeholder="" class="form-control">
										</div>
									</div>					
									<div class="_calcb__form-group _cs__col"> 
										<label for="t_kip" class="_calcb__label">Температура кипения, &#8451;</label>
										<div class="_calcb__input _calcb__width">
											<input class="form-control" id="t_kip" name="t_kip" type="text" value="-15" placeholder="">
										</div>
									</div>				
									<div class="_calcb__form-group _cs__col"> 
										<label for="type" class="_calcb__label">Тип аппарата</label>
										<div class="_calcb__input _calcb__width-sel">
											<select class="form-control" id="type" name="type">
												<option value="1" data-filter="1">Однопоточный</option>
												<option value="2" data-filter="2">Двухпоточный</option>
											</select>
										</div>
									</div>				
									<div class="_calcb__form-group _cs__col"> 
										<label for="step" class="_calcb__label">Шаг ламели</label>
										<div class="_calcb__input _calcb__width">
											<select class="form-control" id="step" name="step">
												<option class="flt-1 flt-2" value="8">8</option>
												<option class="flt-1 " value="12">12</option>
											</select>
										</div> 									
									</div>
								</div>
							</div>
							<div class="_cs__col _clrf__col">
								<div class="_clrf__opt-heading">Опции</div>
								<div class="_clrf__inner _clrf__opt _cs__flex">		
									<div class="_calcb__form-group _calcb__checkbox _cs__col"> 
										<label for="dbl_poddon" class="_calcb__label">Двойной поддон с теплоизоляцией</label>
										<div class="_calcb__input _calcb__width">
											<input id="dbl_poddon" name="dbl_poddon" type="checkbox" value="1" placeholder="">
										</div>
									</div>		
									<div class="_calcb__form-group _cs__col"> 
										<label for="ott_block" class="_calcb__label">Оттайка блока</label>
										<div class="_calcb__input _calcb__width-sel">
											<select class="form-control" id="ott_block" name="ott_block">
												<option value="воздухом">воздухом (стандарт)</option>
												<option value="электрооттайка">электрооттайка</option>
												<option value="горячими парами">горячими парами</option>
											</select>
										</div>
									</div>		
									<div class="_calcb__form-group _cs__col _calcb__checkbox"> 
										<label for="nozhki" class="_calcb__label">Ножки для напольной установки</label>
										<div class="_calcb__input _calcb__width">
											<input id="nozhki" name="nozhki" type="checkbox" value="1" placeholder="">
										</div>
									</div>		
									<div class="_calcb__form-group _cs__col"> 
										<label for="ott_poddon" class="_calcb__label">Оттайка поддона</label>
										<div class="_calcb__input _calcb__width-sel">
											<select class="form-control" id="ott_poddon" name="ott_poddon">
												<option value="воздухом">воздухом (стандарт)</option>
												<option value="электрооттайка">электрооттайка</option>
												<option value="горячими парами">горячими парами</option>
											</select>
										</div>
									</div>
									<div class="_calcb__form-group _cs__col _calcb__checkbox"> 
										<label for="el_obogrev" class="_calcb__label">Электрообогрев диффузора вентилятора</label>
										<div class="_calcb__input _calcb__width">
											<input id="el_obogrev" name="el_obogrev" type="checkbox" value="1" placeholder="">
										</div>
									</div>	
								</div>
							</div>
							<div class="_evpf__btn">
								<button type="submit" class="btn-red-border">Подобрать</button>
							</div>									
						</form>
					</div>
					<div class="tab-pane fade" id="calc-item2">
					</div>
					<div class="tab-pane fade" id="calc-item3">		
						<form action="" class="form-modal evaporator-form _cs__flex" >
							<div class="_cs__col _evpf__left-col">
								<h5 class="_calcb__form-heading">Вода</h5>
								<div class="_evpf__left-inner _cs__flex">				
									<div class="_calcb__form-group _cs__col"> 
										<label for="t_w_0" class="_calcb__label">Начальная температура, &#8451;</label>
										<div class="_calcb__input _calcb__width">
											<input type="name" class="form-control" id="t_w_0" >
										</div>
									</div>						
									<div class="_calcb__form-group _cs__col"> 
										<label for="consumption" class="_calcb__label">Объемный расход, м<sup>3</sup>/ч</label>
										<div class="_calcb__input _calcb__width">
											<input type="name" class="form-control" id="consumption" >
										</div>
									</div>					
									<div class="_calcb__form-group _cs__col"> 
										<label for="t_w_1" class="_calcb__label">Конечная температура, &#8451;</label>
										<div class="_calcb__input _calcb__width">
											<input type="name" class="form-control" id="t_w_1" >
										</div>
									</div>				
									<div class="_calcb__form-group _cs__col"> 
										<label for="power" class="_calcb__label">Нагрузка на аппарат, кВт</label>
										<div class="_calcb__input _calcb__width">
											<input type="name" class="form-control" id="power" >
										</div>
									</div>
								</div>
							</div>
							<div class="_cs__col _evpf__right-col">
								<h5 class="_calcb__form-heading">Хладагент</h5>	
								<div class="_evpf__right-inner _cs__flex">		
									<div class="_calcb__form-group _cs__col"> 
										<label for="hagent" class="_calcb__label">Наименование хладагента</label>
										<div class="_calcb__input _calcb__width">	<select class="form-control" id="hagent" name="hagent">
												<option value="3" data-t_kip="-3">R22</option>
												<option value="2" data-t_kip="-3">R404a</option>
												<option value="4" data-t_kip="-3">R407</option>
												<option value="5" data-t_kip="-3">R507</option>
												<option value="1" data-t_kip="-3">Аммиак (NH3)</option>
											</select>
										</div>
									</div>			
									<!--<div class="_calcb__form-group _cs__col"> 
										<label for="tboil" class="_calcb__label">Температура кипения, &#8451;</label>
										<div class="_calcb__input _calcb__width">
											<input type="name" class="form-control" id="tboil" >
										</div>
									</div>-->
								</div>
							</div>
							<div class="_evpf__btn">
								<button type="submit" class="btn-red-border">Рассчитать</button>
								<!--<button type="submit" class="btn-red-border">Пересчитать</button>-->
							</div>									
						</form>	
						<div class="_evpf__calculation">
							<div class="_evpf__calc-preview">
								<img src="/img/img-modal.jpg" alt="">
							</div>
							<div class="table-responsive _evpf__table">
								<table class="table table-bordered ">
									<thead>
										<tr>
											<td rowspan="2">Модель</td>
											<td rowspan="2">Поверхность, м<sup>2</sup></td>
											<td rowspan="2">Внутренний объём панелей, дм<sup>3</sup></td>
											<td colspan="2" rowspan="1">Расход воды, м<sup>3</sup>/ч</td>
											<td rowspan="2">Масса, кг</td>
										</tr>
										<tr>
											<td>мин</td>
											<td>макс</td>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th>ИП-60П-Н-20-1-1</th>
											<th>60</th>
											<th>104,75</th>
											<th>26.4</th>
											<th>40.6</th>
											<th>900</th>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="_block__warning">Заданный раход воды меньше допустимого. За консультацией обратитесь к <a href="#" data-toggle="modal" data-target="#modal-form-cons" id="getModal3">менеджеру</a></div>
							<div class="_calcb__note">
								<div>
									Пленочный испаритель предназначен для получения ледяной воды, используемой в качестве хладоносителя в различных отралсях промышленности. 
								</div>
								<div>
									Пленочный испаритель - аппарат “открытого” типа с высоким коэффециентом теплопередачи и малой ёмкостью хладогента.
									Модуль охлаждения представляет  собой конструкцию с вертикально установенными теплообменными панелями из нержавеющей стали и распределительного бака. Вода из распределительного бака равномерно стекает по поверхности теплообменных  панелей в виде тонкой плёнки в распологаемый ниже накопительный бак. При этом вода охлаждается до температур, близких к 0 °С, без риска размораживания теплообменного аппарата. Требуемый объём подачи воды обеспечивается кострукцией распределительного бака.
								</div>
							</div>
							<div class="_calcb__cost">
								<span>Стоимость подобранного аппарата:</span> Доступно только для авторизованных пользователей. (<a href="#" data-toggle="modal" data-target="#modal-form-enter" id="getModal2">Войти</a>)
							</div>
							<div class="_evpf__btn">
								<button type="button" class="btn-red-border">Сохранить в PDF</button>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="calc-item4">...</div>
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
				<form action="" class="form-modal">
					<div class="form-group"> 
						<label for="fio" class="_formS__label">Контактное лицо</label>
						<div class="_formS__input">
							<input type="text" class="form-control" id="fio" placeholder="Введите ваше имя">
						</div>
					</div>
					<div class="form-group"> 
						<label for="firm" class="_formS__label">Организация</label>
						<div class="_formS__input">
							<input type="text" class="form-control" id="firm" placeholder="Введите название организации">
						</div>
					</div>
					<div class="form-group"> 
						<label for="tel" class="_formS__label">E-mail или телефон</label>
						<div class="_formS__input">
							<input type="text" class="form-control" id="tel" placeholder="Введите ваш E-mail или телефон">
						</div>
					</div>
					<div class="form-group"> 
						<label for="post" class="_formS__label">Должность</label>
						<div class="_formS__input">
							<input type="text" class="form-control" id="post" placeholder="Введите вашу должность">
						</div>
					</div>
					<div class="form-group full"> 
						<label for="note" class="_formS__label">Коментарий</label>
						<div class="_formS__input _formS__textarea">
							<textarea id="note" class="form-control" placeholder="Коментарий к заказу"></textarea>
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