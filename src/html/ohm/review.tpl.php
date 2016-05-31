<?
// ГдеДостать

$item_list = $this->FE->DB->dbSelect("SELECT * FROM `".$this->FE->DB->dbtables['t_galleryitem']."` WHERE visible='1' AND gal='6' ORDER BY rating,id");
if(mysql_num_rows($item_list)) {
?>


<div class="reviews-content-block content-site _second-page__content-site ">
	<div class="container">
		<div class="heading-block _rcb__heading-block">
			<h1 class="heading-site big">Отзывы наших клиентов</h1>
		</div>
		<div class="_cs__flex _rcb__flex">
			
			<?
			while($row = mysql_fetch_array($item_list)) {
			?>
			
			<div class="_cs__col _rcb__item">
				<div class="_rcb__preview">
					<a class="fancybox-buttons" data-fancybox-group="review" href="<?=$row['img'];?>" data-title="<?=$row['title'];?>" ><img src="<?=$row['img'];?>" alt="" /></a>
				</div>				
				<div class="_rcb__heading"><?=$row['title'];?></div>
				<div class="_rcb__city"><?=$row['tag'];?></div>
			</div>
			
			<?
			}
			mysql_data_seek($item_list,0);
			?>
			
		</div>
		<div class="_rcb__btn">
			<button type="button" class="btn-form-border">Загрузить ещё</button> 
		</div>
	</div>
</div>


<?
}
?>




<link rel="stylesheet" type="text/css" href="/plugins/fancybox/source/jquery.fancybox.css?v=2.1.4" media="screen" />
<link rel="stylesheet" type="text/css" href="/plugins/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />	 	

<script src="/plugins/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<script src="/plugins/fancybox/source/jquery.fancybox.js?v=2.1.4"></script>
<script src="/plugins/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script>
$(document).ready(function() {
	$('.fancybox').fancybox(); 
	// конструкция для активации fancybox <a class="fancybox-buttons" data-fancybox-group="button" href="" data-title=""><img src="" alt="" /></a>
	$('.fancybox-buttons').fancybox({
		openEffect  : 'none',
		closeEffect : 'none',
		prevEffect : 'none',
		nextEffect : 'none',
		closeBtn  : false,
		helpers : {
			title : {
				type : 'inside'
			},
			buttons	: {}
		},
		afterLoad : function() {
			this.title = this.title;
		}	
	});
});
</script>