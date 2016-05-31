<?
// Главная страница проекта
?>
<div class="container" >

	<script>
	$(document).ready(function(){
	
	
			cmsAPI.callbacks.CalcKondCB = function(resp) {
				var div = $('#kond-CalcKondCB');
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
							html:item.title + '<br /><img class="img-responsive" src="' + item.img + '" /><br /><br />' + JSON.stringify(item),
						}).appendTo(div);
					}
				}
				
				$('#kond-dev-log').html(resp.info.info_msg);
				
			};
			
			$('form#kond-calc').on('submit', function(event){
				event.preventDefault();
				
				if(1) {
					var power = $('#kond-power').val() || 0;
					var t_vl = $('#kond-t_vl').val() || 0;
					var t_k = $('#kond-t_k').val() || 0;
					
					
					cmsAPI.call({
						service : 'ohm',
						method : 'calc_kond',
						
						power : power,
						t_vl : t_vl,
						t_k : t_k,
						
						callback : 'CalcKondCB',
					});
				}
				
				return false;
				
			});
	
	
	
	});
	</script>

	<div class="row" >
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
			
			<h2>Расчет кондиционеров</h2>
			
			<form id="kond-calc" >
				
				<div class="form-group">
					<label for="power">Мощность аппарата</label>
					<input class="form-control type-value" id="kond-power" name="power" type="text" value="0" placeholder="" />
				</div>
				
				
				<div class="form-group">
					<label for="power">Твл</label>
					<input class="form-control type-value" id="kond-t_vl" name="t_vl" type="text" value="0" placeholder="" />
				</div>
				
				<div class="form-group">
					<label for="power">Тк</label>
					<input class="form-control type-value" id="kond-t_k" name="t_k" type="text" value="0" placeholder="" />
				</div>
				
				
				<button type="submit" id="kond-calc-btn" class="btn btn-default">Расчитать и найти кондиционер</button>
			</form>
			
			<div id="kond-CalcKondCB" ></div>
		</div>
		
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
			&nbsp;
			<div id="kond-dev-log" ></div>
		</div>
		
	</div>

</div>