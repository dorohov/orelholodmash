<?
// Главная страница проекта
?>
<div class="container" >

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
					$('<div/>',{
						html:item.title + '<br /><img class="img-responsive" src="' + item.img + '" /><br /><br />' + JSON.stringify(item),
					}).appendTo(div);
				}
			}
			
			$('#plen-dev-log').html(resp.info.info_msg);
			
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

	<div class="row" >
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
			
			<h2>Расчет пленочных охладителей</h2>
			
			<form id="plen-calc" >
				
				<div class="form-group">
					<label for="t_w_0">Температура на входе</label>
					<input class="form-control" id="plen-t_w_0" name="t_w_0" type="text" value="9" placeholder="" />
				</div>
				
				<div class="form-group">
					<label for="t_w_1">Температура на выходе</label>
					<input class="form-control" id="plen-t_w_1" name="t_w_1" type="text" value="1" placeholder="" />
				</div>
				
				<!--
				<div class="form-group">
					<label for="type">Расчет по</label>
					<select class="form-control" id="plen-type" name="type" >
						<option value="consumption" >Объемный расход</option>
						<option value="power" >Нагрузка на аппарат</option>
					</select>
				</div>
				-->
				<input type="hidden" id="plen-type" name="type" value="" />
				
				<div class="form-group">
					<label for="consumption">Объемный расход</label>
					<input class="form-control type-value" id="plen-consumption" name="consumption" type="text" value="0" placeholder="" />
				</div>
				
				<div class="form-group">
					<label for="power">Нагрузка на аппарат</label>
					<input class="form-control type-value" id="plen-power" name="power" type="text" value="0" placeholder="" />
				</div>
				
				<div class="form-group">
					<label for="type">Хладогент</label>
					<select class="form-control" id="plen-hagent" name="hagent" >
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
				
				<!--
				<div class="form-group">
					<label for="power">Температура кипения хладогента</label>
					<input class="form-control" id="plen-t_kip" name="t_kip" type="text" value="0" placeholder="" />
				</div>
				-->
				
				<button type="submit" id="plen-calc-btn" class="btn btn-default">Расчитать и найти охладитель</button>
			</form>
			
			<div id="plen-CalcPlenCB" ></div>
		</div>
		
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
			&nbsp;
			<div id="plen-dev-log" ></div>
		</div>
		
	</div>

</div>