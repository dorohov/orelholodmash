<?
// ГдеДостать
?>

<div class="about-content-block content-site _second-page__content-site ">
	<div class="container">
		<div class="heading-block _srcb__heading-block">
			<h1 class="heading-site big">О компании</h1>
		</div>
		<ul class="_cs__flex _acb__nav">
			<li class="_cs__col _acb__nav-col"><a href="/certificate/">Сертификаты</a></li>
			<li class="_cs__col _acb__nav-col"><a href="/geography/">География объектов</a></li>
			<li class="_cs__col _acb__nav-col"><a href="/calc/">Программы расчёта</a></li>
			<li class="_cs__col _acb__nav-col"><a href="/vacancy/">Вакансии</a></li>
			<li class="_cs__col _acb__nav-col"><a href="/review/">Отзывы</a></li>
		</ul>
		<div class="_acb__text">
			<h2 class="_acb__text-heading"><?=$param['item_id']['preview'];?></h2>
			<div><?=$param['item_id']['main_info'];?></div>
			<div class="_acb__text-btn">
				<a href="/geography/" class="btn-form">Посмотреть географию объектов</a>
			</div>
		</div>
		

<?
$item_list = $this->FE->DB->dbSelect("SELECT * FROM `".$this->FE->DB->dbtables['t_page']."` WHERE visible='1' AND cat='2' ORDER BY rating,id");
if(mysql_num_rows($item_list)) {
?>
	
		<div class="_hcb__block">			
			<div class="heading-block _hcb__heading-block">
				<h2 class="heading-site big">Наша история</h2>
			</div>
			<div class="owl-carousel _hcb__carousel ">
	
<?
	while($row = mysql_fetch_array($item_list)) {
		//$link = $this->FE->CMS->genLink($row, 'page', true, true);
		?>
				
				<div class="_hcb__item _cs__flex">
					<div class="_cs__col _hcb__col-left">
						<img src="<?=$row['img'];?>" alt="">
					</div>
					<div class="_cs__col _hcb__col-right">
						<h3 class="_hcb__heading"><?=$row['title'];?></h3>
						<div><?=$row['main_info'];?></div>
					</div> 
				</div>
				
		<?
	}
	mysql_data_seek($item_list,0);
?>
			</div>
		</div>
<?
}
?>

	</div>
</div>






<?
$item_list = $this->FE->DB->dbSelect("SELECT * FROM `".$this->FE->DB->dbtables['t_banner']."` WHERE view_at='1' ORDER BY rating,id");
if(mysql_num_rows($item_list)) {
	
	$banner_arr = array();
	
	while($row = mysql_fetch_array($item_list)) {
		$banner_arr[] = $row;
	}
	mysql_data_seek($item_list,0);
	
	$banner_arr = array_chunk($banner_arr, 5, true);
	
?>

<div class="about-slider-block block-shadow ">
	<div class="container">	
		<div class="heading-block _asb__heading-block">
			<h2 class="heading-site  _asb__heading-site">Наши клиенты</h2>
		</div>
		<div class="owl-carousel _asb__carousel">
	<?
	foreach($banner_arr as $b_arr) {
		?>
			<div class="_asb__item">
			<?
			foreach($b_arr as $b) {
			?>
				<div><img src="<?=$b['img'];?>" alt="<?=$b['title'];?>"></div>
			<?
			}
			?>
			</div>
		<?
	}
	?>
		</div>
	</div>
</div>

<?
}
?>





<link rel="stylesheet" href="/plugins/owl.carousel/owl.carousel.css">
<script src="/plugins/owl.carousel/owl.carousel.min.js"></script>
<script>
$(document).ready(function() {
	$('._hcb__carousel').owlCarousel({
		loop:false,
		margin:0,
		responsiveClass:true,
		navText: [],
		responsive:{
			0:{
				items:1,
				nav:true,
				margin: 20
			},
			768:{
				items:1,
				nav:true
			}
		}
	});
	$('._asb__carousel').owlCarousel({
		loop:false,
		margin:40,
		responsiveClass:true,
		navText: [],
		responsive:{
			0:{
				items:2,
				nav:true 
			},
			768:{
				items:4,
				nav:true
			},
			900:{
				items: 5,
				nav:true
			}
		}
	});
})
</script>