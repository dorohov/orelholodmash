$('img').addClass('img-responsive');
var url = window.location.pathname;
$('.navbar-nav a[href="'+url+'"]').parent().addClass('active');
$('._fs__nav-item a[href="'+url+'"]').parent().addClass('active');
$('._ncb__nav a[href="'+url+'"]').parent().addClass('active');
$('._srcb__nav a[href="'+url+'"]').parent().addClass('active');
//$('.navbar-block__list a[data-post_id="1"]').parent().addClass('active');

$('#getModal').click(function(){
	$('#modal-form-enter').modal('hide');
	setTimeout(function() {$('#modal-form-reg').modal('show');}, 500)
	return false;
});
$('#getModal2').click(function(){
	$('#modal-form-calc').modal('hide');
	setTimeout(function() {$('#modal-form-enter').modal('show');}, 500)
	return false;
});
$('#getModal3').click(function(){
	$('#modal-form-calc').modal('hide');
	setTimeout(function() {$('#modal-form-cons').modal('show');}, 500)
	return false;
});

if (device.mobile() || device.tablet()) {
	$('.navbar').addClass('navbar-fixed-top');
} else {
	$('.navbar').removeClass('navbar-fixed-top');

	$("._iib__item").hover(
		function(){
			$(this).addClass('open');
		},
		function(){
			$(this).removeClass('open');
		}
	);
	$(".product-item").hover(
		function(){
			$(this).addClass('hover');
		},
		function(){
			$(this).removeClass('hover');
		}
	);
	$(".navbar-default .dropdown").hover(
		function(){
			$(this).addClass('open');
		},
		function(){
			$(this).removeClass('open');
		}
	);
}
$("nav.navbar-fixed-top").autoHidingNavbar();
$('._iib__dropdown-menu-flex ul').addClass('_iib__dropdown-menu-note snow-list');
$('._icb__price-note :first-child').addClass('first');


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
$('._cat-item__table').fixedHeaderTable({
	autoShow: true,
	height: 500,  
	footer: false, 
	cloneHeadToFoot: false, 
	fixedColumn: false 
});