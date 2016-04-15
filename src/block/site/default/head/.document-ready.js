$('img').addClass('img-responsive');
var url = window.location.pathname;
$('.navbar-nav a[href="'+url+'"]').parent().addClass('active');
$('._fs__nav-item a[href="'+url+'"]').parent().addClass('active');
//$('.navbar-block__list a[data-post_id="1"]').parent().addClass('active');
$('#getModal').click(function(){
	$('#modal-form-enter').modal('hide');
	setTimeout(function() {$('#modal-form-reg').modal('show');}, 500)
	return false;
})