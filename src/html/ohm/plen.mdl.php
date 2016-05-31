<?
/* Пустой файл модуля. НЕ УДАЛЯТЬ! */
?>
<script>
	$(document).ready(function(){
		
		$('#plen-consumption').on('keydown blur focus',function(){
			var v = parseInt($(this).val());
			if(v > 0) {
				//$('#plen-power').attr('disabled', 'disabled');
				$('#plen-power').val('');
				$('#plen-type').val('consumption');
			} else {
				//$('#plen-power').attr('disabled', false);
			}
		});
		$('#plen-power').on('keydown blur focus',function(){
			var v = parseInt($(this).val());
			if(v > 0) {
				//$('#plen-consumption').attr('disabled', 'disabled');
				$('#plen-consumption').val('');
				$('#plen-type').val('power');
			} else {
				//$('#plen-consumption').attr('disabled', false);
			}
		});
		
		cmsAPI.callbacks.CalcPlenCB = function(resp) {
			var div = $('#plen-CalcPlenCB');
			div.html('');
			
			/*
			$('<div/>',{
				html:resp.info.info_msg,
			}).appendTo(div);
			*/
			
			console.log(resp.info.info_msg);
			
			$('<div/>',{
				html:'Найдено: ' + resp.info.item_count,
			}).a
			
			if(resp.info.item_count) {
				for(var i=0; i<resp.response.item_list.length; i++) {
					var item=resp.response.item_list[i];
					/*
					переписать на таблицу!
					$('<div/>',{
						html:item.title + '<br /><img class="img-responsive" src="' + item.img + '" /><br /><br />' + JSON.stringify(item),
					}).appendTo(div);
					*/
					
					$('<tr/>',{
						html : '<th>' + item.title + '</th><th>' + item.surface + '</th><th>' + item.volume + '</th><th>' + item.w_min + '</th><th>' + item.w_max + '</th><th>' + item.weight + '</th>',
						//html:item.title + '<br /><img class="img-responsive" src="' + item.img + '" /><br /><br />' + JSON.stringify(item),
					})
						.attr('data-cost', item.cost)
						.appendTo(div);
				}
				
				$('#plen-selected-product-img').attr('src', resp.response.item_list[0].img);
			}
			
			//$('#plen-dev-log').html(resp.info.info_msg);
			
			if($('#plen-type').val() == 'power') {
				$('#plen-consumption').val(resp.response.recalc.consumption);
			} else if($('#plen-type').val() == 'consumption') {
				$('#plen-power').val(resp.response.recalc.power);
			}
			
		};
		
		$('form#plen-calc').on('submit', function(event){
			event.preventDefault();
			
			var hagent = $('#plen-hagent').val() || 0;
			
			var t_w_0 = $('#plen-t_w_0').val() || 0;
			var t_w_1 = $('#plen-t_w_1').val() || 0;
			var t_kip = $('#plen-t_kip').val() || 0;
			
			var type = $('#plen-type').val() || 'consumption';
			
			if(type == 'consumption') {
				var consumption = $('#plen-consumption').val() || 0;
			} else if(type == 'power') {
				var power = $('#plen-power').val() || 0;
			}
			
			cmsAPI.call({
				service : 'ohm',
				method : 'calc_plen',
				
				type : type,
				consumption : consumption,
				power : power,
				hagent : hagent,
				t_w_0 : t_w_0,
				t_w_1 : t_w_1,
				t_kip : t_kip,
				
				callback : 'CalcPlenCB',
			});
			
		});
		
	});
	</script>


<div class="tab-pane fade" id="calc-plen">		
	<form id="plen-calc" action="" class="form-modal evaporator-form _cs__flex" >
		<div class="_cs__col _evpf__left-col">
			<h5 class="_calcb__form-heading">Вода</h5>
			<div class="_evpf__left-inner _cs__flex">				
				<div class="_calcb__form-group _cs__col"> 
					<label for="t_w_0" class="_calcb__label">Начальная температура, &#8451;</label>
					<div class="_calcb__input _calcb__width">
						<input type="name" class="form-control" id="plen-t_w_0" >
					</div>
				</div>						
				<div class="_calcb__form-group _cs__col"> 
					<label for="consumption" class="_calcb__label">Объемный расход, м<sup>3</sup>/ч</label>
					<div class="_calcb__input _calcb__width">
						<input type="name" class="form-control" id="plen-consumption" >
					</div>
				</div>					
				<div class="_calcb__form-group _cs__col"> 
					<label for="t_w_1" class="_calcb__label">Конечная температура, &#8451;</label>
					<div class="_calcb__input _calcb__width">
						<input type="name" class="form-control" id="plen-t_w_1" >
					</div>
				</div>				
				<div class="_calcb__form-group _cs__col"> 
					<label for="power" class="_calcb__label">Нагрузка на аппарат, кВт</label>
					<div class="_calcb__input _calcb__width">
						<input type="name" class="form-control" id="plen-power" >
					</div>
				</div>
			</div>
		</div>
		<div class="_cs__col _evpf__right-col">
			<h5 class="_calcb__form-heading">Хладагент</h5>	
			<div class="_evpf__right-inner _cs__flex">		
				<div class="_calcb__form-group _cs__col"> 
					<label for="hagent" class="_calcb__label">Наименование хладагента</label>
					<div class="_calcb__input _calcb__width">
						<select class="form-control" id="plen-hagent" name="hagent">
							<?
							$ha = $this->FE->DB->dbSelect("SELECT * FROM `".$this->FE->DB->dbtables['hagent']."` WHERE 1 ORDER BY title");
							while($row=mysql_fetch_array($ha)) {
							?>
							<option value="<?=$row['id'];?>" data-t_kip="<?=$row['t_kip'];?>" ><?=$row['title'];?></option>
							<?
							}
							?>
						</select>
					</div>
				</div>			
				<!--<div class="_calcb__form-group _cs__col"> 
					<label for="tboil" class="_calcb__label">Температура кипения, &#8451;</label>
					<div class="_calcb__input _calcb__width">
						<input type="name" class="form-control" id="plen-tboil" >
					</div>
				</div>-->
			</div>
		</div>
		<div class="_evpf__btn">
			<button type="submit" id="plen-calc-btn" class="btn-red-border">Рассчитать</button>
			<!--<button type="submit" class="btn-red-border">Пересчитать</button>-->
		</div>									
	</form>	
	<div class="_evpf__calculation">
		<div class="_evpf__calc-preview">
			<img id="plen-selected-product-img" src="/img/img-modal.jpg" alt="">
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
				<tbody id="plen-CalcPlenCB" >
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
		<div class="_block__warning" id="plen-dev-log" >Заданный раход воды меньше допустимого. За консультацией обратитесь к <a href="#">менеджеру</a></div>
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
			<span>Стоимость подобранного аппарата:</span> Доступно только для авторизованных пользователей. (<a href="#" data-toggle="modal" data-target="#modal-form-enter">Войти</a>)
		</div>
		<div class="_evpf__btn">
			<button type="button" class="btn-red-border">Сохранить в PDF</button>
		</div>
	</div>
</div>