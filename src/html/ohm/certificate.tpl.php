<?
// ГдеДостать

$cat_list = $this->FE->DB->dbSelect("SELECT * FROM `".$this->FE->DB->dbtables['t_gallery']."` WHERE visible='1' AND parent='1' ORDER BY id");

if(mysql_num_rows($cat_list)) {
	
	$cat_arr = array();
	
	while($row = mysql_fetch_array($cat_list)) {
		$cat_arr[] = $row;
	}
	mysql_data_seek($cat_list,0);
}

?>

<div class="certificates-content-block content-site _second-page__content-site ">
	<div class="container">
		<div class="heading-block _cercb__heading-block">
			<h1 class="heading-site big">Свидетельства и сертификаты</h1>
		</div>
		<ul class="_cs__flex _cercb__nav">
			<?
			if(count($cat_arr)) {
				$i=0;
				foreach($cat_arr as $cat){
			?>
			<li class="_cs__col _cercb__col <?if($i == 0){echo 'active';}?> "><a href="#<?=$cat['url'];?>" data-flt="<?=$cat['url'];?>" ><?=$cat['title'];?></a></li>
			<?
				$i++;
				}
			}
			?>
		</ul>
		<div class="_cs__flex _cercb__flex"> 
			
			<?
			if(count($cat_arr)) {
				$i=0;
				foreach($cat_arr as $cat){
					
					$item_list = $this->FE->DB->dbSelect("SELECT * FROM `".$this->FE->DB->dbtables['t_galleryitem']."` WHERE visible='1' AND gal='".$cat['id']."' ORDER BY rating,id");
					while($row = mysql_fetch_array($item_list)) {
			?>
			
			<div class="_cs__col _cercb__item">
				<div class="_cercb__inner">
					<a class="fancybox-buttons" data-fancybox-group="<?=$cat['url'];?>" href="<?=$row['img'];?>" data-title="<?=$row['title'];?>"><img src="<?=$row['img'];?>" alt="" /></a>				
					<div class="_cercb__note">
						<div class="_cercb__heading"><?=$row['title'];?></div>
						<div class="_cercb__text"><?=$row['tag'];?></div>
					</div>
				</div>
			</div>
			
			<?
					}
					mysql_data_seek($item_list,0);
					
				$i++;
				}
			}
			?>
			
		</div>
		<div class="_rcb__btn">
			<button type="button" class="btn-form-border">Загрузить ещё</button> 
		</div>
	</div>
</div>

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