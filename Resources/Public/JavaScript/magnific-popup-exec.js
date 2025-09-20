$(document).ready(function () {
  $('.lightbox').magnificPopup({
    type:'image',
    gallery: {enabled: true},
    removalDelay: 500,
    callbacks: {
      beforeOpen: function () {
        this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
        this.st.mainClass = 'mfp-zoom-in';
      }
    }
  })
});
