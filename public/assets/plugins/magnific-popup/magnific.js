//   Magnific popup video
$('.popup-video').magnificPopup({
    disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-zoom-in',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: true
});

//   Magnific popup image
$('.image-popup').magnificPopup({
	type: 'image',
	removalDelay: 160,
	callbacks: {
		beforeOpen: function () {
			this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
			this.st.mainClass = this.st.el.attr('data-effect');
		}
	},
	closeOnContentClick: true,
	midClick: true,
	fixedContentPos: false,
	fixedBgPos: true
});