<?
// ГдеДостать
?>


<div class="geography-content-block content-site _second-page__content-site ">
	<div class="container">
		<div class="heading-block _gcb__heading-block">
			<h1 class="heading-site big">География объектов</h1>
		</div>
		<?=$param['item_id']['main_info'];?>
		<div><img src="/img/geography/map.jpg" alt="" ></div>
	</div>
</div>

<?
$item_list = $this->FE->DB->dbSelect("SELECT * FROM `".$this->FE->DB->dbtables['t_galleryitem']."` WHERE visible='1' AND gal='5' ORDER BY rating,id");
if(mysql_num_rows($item_list)) {
?>

<div class="geography-slider-block block-shadow ">
	<div class="container">	
		<div class="heading-block _gsb__heading-block">
			<h2 class="heading-site  _gsb__heading-site">Наше оборудование на предприятиях</h2>
		</div>
		<div class="owl-carousel">

<?
	while($row = mysql_fetch_array($item_list)) {
	?>
	
			<div class="_gsb__item">
				<img src="<?=$row['img'];?>" alt="">
				<div class="_gsb__item-heading">
					<?=$row['title'];?>
				</div> 
			</div>
	
	<?
	}
	mysql_data_seek($item_list,0);
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
(function() {
	"use strict";

	var toggles = document.querySelectorAll(".c-hamburger");
	for (var i = toggles.length - 1; i >= 0; i--) {
		var toggle = toggles[i];
		toggleHandler(toggle);
	};

	function toggleHandler(toggle) {
		toggle.addEventListener( "click", function(e) {
			e.preventDefault();
			(this.classList.contains("is-active") === true) ? this.classList.remove("is-active") : this.classList.add("is-active");
		});
	}
})();

$(document).ready(function() {
	$('.owl-carousel').owlCarousel({
		loop:false,
		margin:50,
		responsiveClass:true,
		navText: [],
		responsive:{
			0:{
				items:1,
				nav:true
			},
			768:{
				items:2,
				nav:true
			},
			900:{
				items:3,
				nav:true
			},
		}
	});
})
</script>