<?
// Главная страница проекта
?>
<div class="container" >

	<script>
	
	function isNormTemp1() {
		var r = Math.abs(parseInt($('#vozd-t_kam').val()) - parseInt($('#vozd-t_kip').val()));
		if(r < 5) {
			return {
				result : false,
				title : '1. Температура кипения слишком высокая',
			};
		} else {
			return {
				result : true,
				title : '',
			};
		}
	}
	
	function isNormTemp2() {
		var r = Math.abs(parseInt($('#vozd-t_kam').val()) - parseInt($('#vozd-t_kip').val()));
		if(r > 12) {
			return {
				result : false,
				title : '2. Температура кипения слишком низкая',
			};
		} else {
			return {
				result : true,
				title : '',
			};
		}
	}
	
	function isNormKam() {
		var result = true;
		var v = parseInt($('#vozd-t_kam').val());
		var r = Math.abs(parseInt($('#vozd-t_kam').val()) - parseInt($('#vozd-t_kip').val()));
		
		if(v > 0 && v < 11) {
			if(r > 6) {
				return {
					result : true,
					title : '',
				};
			} else {
				return {
					result : false,
					title : '3. Температура кипения слишком высокая',
				};
			}
		} else if(v > -10 && v < 1) {
			if(r > 5) {
				return {
					result : true,
					title : '',
				};
			} else {
				return {
					result : false,
					title : '4. Температура кипения слишком высокая',
				};
			}
		} else if(v > -36 && v < -25) {
			if(r < 11) {
				return {
					result : true,
					title : '',
				};
			} else {
				return {
					result : false,
					title : '5. Температура кипения слишком низкая',
				};
			}
		} else if(v > -26 && v < -9) {
			if(r < 12) {
				return {
					result : true,
					title : '',
				};
			} else {
				return {
					result : false,
					title : '6. Температура кипения слишком низкая',
				};
			}
		}
	}
	
	function isChecked(el) {
		return el.prop('checked');
	}
	
	$(document).ready(function(){
		
		$('#vozd-type').on('change',function(){
			
			var sel = $(this);
			var opt = sel.find('option:selected').eq(0);
			
			var flt = opt.attr('data-filter');
			
			$('#vozd-step option:selected').prop('selected', false);
			$('#vozd-step option:not(.flt-' + flt + ')').hide();
			$('#vozd-step option.flt-' + flt).show();
			
			if(flt == 2) {
				$('.not-flt-' + flt).hide().find('input[type="checkbox"]').prop('checked', false);
			} else {
				$('.not-flt-2').show();
			}
			
			
		});
	
	
			cmsAPI.callbacks.CalcVozdCB = function(resp) {
				var div = $('#vozd-CalcVozdCB');
				div.html('');
				
				
				$('<div/>',{
					html:resp.info.info_msg,
				}).appendTo(div);
				
				
				console.log(resp.info.info_msg);
				
				$('<div/>',{
					html:'Найдено: ' + resp.info.item_count,
				}).a
				
				if(resp.info.item_count) {
					for(var i=0; i<resp.response.item_list.length; i++) {
						var item=resp.response.item_list[i];
						$('<div/>',{
							html:'<br /><br /><br /><br />' + item.title + '<br />' + JSON.stringify(item) + '<hr />',
						}).appendTo(div);
					}
				}
				
				$('#vozd-dev-log').html(resp.info.info_msg);
				
			};
			
			$('form#vozd-calc').on('submit', function(event){
				event.preventDefault();
				
				var result;
				
				result = isNormTemp1();
				if(!result.result) {
					alert(result.title);
				}
				
				result = isNormTemp2();
				if(!result.result) {
					alert(result.title);
				}
				
				result = isNormKam();
				if(!result.result) {
					alert(result.title);
				}
				
				
				if(1) {
					var power = $('#vozd-power').val() || 0;
					var t_kam = $('#vozd-t_kam').val() || 0;
					var t_kip = $('#vozd-t_kip').val() || 0;
					var type = $('#vozd-type').val() || 0;
					var step = $('#vozd-step').val() || 0;
					var circ = $('#vozd-circ').val() || 0;
					var ott_block = $('#vozd-ott_block').val() || 0;
					var ott_poddon = $('#vozd-ott_poddon').val() || 0;
					var dbl_poddon = isChecked($('#vozd-dbl_poddon'));
					var nozhki = isChecked($('#vozd-nozhki'));
					var el_obogrev = isChecked($('#vozd-el_obogrev'));
					
					
					cmsAPI.call({
						service : 'ohm',
						method : 'calc_vozd',
						
						power : power,
						t_kam : t_kam,
						t_kip : t_kip,
						type : type,
						step : step,
						circ : circ,
						ott_block : ott_block,
						ott_poddon : ott_poddon,
						dbl_poddon : dbl_poddon,
						nozhki : nozhki,
						el_obogrev : el_obogrev,
						
						callback : 'CalcVozdCB',
					});
				}
				
				return false;
				
			});
	
	
	
	});
	</script>

	<div class="row" >
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
			
			<h2>Расчет воздухоохладителей</h2>
			
			<form id="vozd-calc" >
				
				<div class="form-group">
					<label for="power">Нагрузка на аппарат</label>
					<input class="form-control type-value" id="vozd-power" name="power" type="text" value="15" placeholder="" />
				</div>
				
				<div class="form-group">
					<label for="t_kam">Температура в камере</label>
					<input class="form-control" id="vozd-t_kam" name="t_kam" type="text" value="-8" placeholder="" />
				</div>
				
				<div class="form-group">
					<label for="t_kip">Температура кипения</label>
					<input class="form-control" id="vozd-t_kip" name="t_kip" type="text" value="-15" placeholder="" />
				</div>
				
				<div class="form-group">
					<label for="type">Тип аппарата</label>
					<select class="form-control" id="vozd-type" name="type" >
						<option value="1" data-filter="1" >Однопоточный</option>
						<option value="2" data-filter="2" >Двухпоточный</option>
					</select>
				</div>
				
				<div class="form-group">
					<label for="step">Шаг ламели</label>
					<select class="form-control" id="vozd-step" name="step" >
						<option class="flt-1 flt-2" value="8" >8</option>
						<option class="flt-1 " value="12" >12</option>
					</select>
				</div>
				
				<!--
				<div class="form-group">
					<label for="circ">Кратность циркуляции</label>
					<input class="form-control" id="vozd-circ" name="circ" type="text" value="3.5" placeholder="" />
				</div>
				-->
				<input id="vozd-circ" name="circ" type="hidden" value="3.5" />
				
				<h3>Опции</h3>
				
				<div class="form-group">
					<label for="ott_block">Оттайка блока</label>
					<select class="form-control" id="vozd-ott_block" name="ott_block" >
						<option value="воздухом" >воздухом (стандарт)</option>
						<option value="электрооттайка" >электрооттайка</option>
						<option value="горячими парами" >горячими парами</option>
					</select>
				</div>
				
				<div class="form-group">
					<label for="ott_poddon">Оттайка поддона</label>
					<select class="form-control" id="vozd-ott_poddon" name="ott_poddon" >
						<option value="воздухом" >воздухом (стандарт)</option>
						<option value="электрооттайка" >электрооттайка</option>
						<option value="горячими парами" >горячими парами</option>
					</select>
				</div>
				
				<div class="form-group">
					<label for="dbl_poddon">
						<input id="vozd-dbl_poddon" name="dbl_poddon" type="checkbox" value="1" placeholder="" />
						Двойной поддон с теплоизоляцией
					</label>
				</div>
				
				<div class="form-group not-flt-2">
					<label for="nozhki">
						<input id="vozd-nozhki" name="nozhki" type="checkbox" value="1" placeholder="" />
						Ножки для напольной установки
					</label>
				</div>
				
				<div class="form-group not-flt-2">
					<label for="el_obogrev">
						<input id="vozd-el_obogrev" name="el_obogrev" type="checkbox" value="1" placeholder="" />
						Электрообогрев диффузора вентилятора
					</label>
				</div>
				
				<button type="submit" id="vozd-calc-btn" class="btn btn-default">Расчитать и найти охладитель</button>
			</form>
			
			<div id="vozd-CalcVozdCB" ></div>
		</div>
		
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
			&nbsp;
			<div id="vozd-dev-log" ></div>
		</div>
		
	</div>

</div>