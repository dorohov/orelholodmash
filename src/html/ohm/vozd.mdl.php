<?
/* Пустой файл модуля. НЕ УДАЛЯТЬ! */
?>

<div class="tab-pane fade in active" id="calc-vozd">		
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
			<div class="_clrf__inner _cs__flex _clrf__opt">		
				<div class="_calcb__form-group _cs__col _calcb__checkbox"> 
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
				<div class="_calcb__form-group _cs__col "> 
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