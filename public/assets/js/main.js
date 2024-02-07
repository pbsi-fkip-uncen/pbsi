//SLICK JS
$(document).ready(function(){
	if ( $('.single-item').length > 0 ) {
		$('.single-item').slick();
	}
});


//Responsive Slides
$(document).ready(function(){
if ( $('.rslides').length > 0 ) {
	$('.rslides').responsiveSlides({
			auto: false,
			speed: 500,
			timeout: 10000,
			nav: false,
			pager: true,
			manualControls: '#nav',
	});
}
});

function openGallery(evt, galleryName) {
	var i, tabcontent, tablinks;
	tabcontent = document.getElementsByClassName("tabcontent-1");
	for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
	}
	tablinks = document.getElementsByClassName("tablinks");
	for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
	}
	document.getElementById(galleryName).style.display = "block";
	evt.currentTarget.className += " active"
}

function openVM(evt, name) {
	var i, tabcontent, tablinks;
	tabcontent = document.getElementsByClassName("tabcontent");
	for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
	}
	tablinks = document.getElementsByClassName("tablinks");
	for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
	}
	document.getElementById(name).style.display = "block";
	evt.currentTarget.className += " active"
}

window.addEventListener('load', function() {
	baguetteBox.run('.div-img-galeri', {
		animation: 'fadeIn',
		noScrollbars: true
});
});