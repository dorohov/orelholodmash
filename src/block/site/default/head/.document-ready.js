$('img').addClass('img-responsive');
var url = window.location.pathname;
$('.navbar-nav a[href="'+url+'"]').parent().addClass('active');
$('._fs__nav-item a[href="'+url+'"]').parent().addClass('active');
//$('.navbar-block__list a[data-post_id="1"]').parent().addClass('active');
/*
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

*/
$('#getModal').click(function(){
	$('#modal-form-enter').modal('hide');
	setTimeout(function() {$('#modal-form-reg').modal('show');}, 500)
	return false;
})