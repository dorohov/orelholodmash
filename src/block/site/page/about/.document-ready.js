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
})
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
})