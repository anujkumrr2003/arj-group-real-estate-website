window.addEventListener('load', function () {
  const modalElement = document.getElementById('exampleModalPopup');
  if (modalElement) {
    const bootstrapModal = new bootstrap.Modal(modalElement);
    bootstrapModal.hide(); 
    setTimeout(function () {
      bootstrapModal.show();
    
    }, 3000);
  }
});


function autoHeaderAdjust() {
  if (window.innerWidth <= 767) {
    const header = document.querySelector('header');
    const banner = document.querySelector('.home-banner');

    if (header && banner) {
      const headerHeight = header.offsetHeight;
      banner.style.paddingTop = `${headerHeight}px`; 
    }
  }
}
window.addEventListener('load', autoHeaderAdjust);
// window.addEventListener('resize', autoHeaderAdjust);
// window.addEventListener('scroll', autoHeaderAdjust);