var swiper = new Swiper('.swiper-container', {
    effect: 'coverflow',
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: 'auto',
    coverflowEffect: {
      rotate: 0,
      stretch: 0,
      depth: 200,
      modifier: 1,
      slideShadows: false,
    },
    pagination: {
      el: '.swiper-pagination',
    },
    loop : true,

  });

  function toggleMenu(){
      const menuToggle = document.querySelector('.toggle');
      const navigation = document.querySelector('.navigation');
      menuToggle.classList.toggle('active')
      navigation.classList.toggle('active')
  }

const button = document.querySelectorAll('.button');
button.forEach(btn =>{
btn.addEventListener('click', function(e){
  let x = e.clientX - e.target.offsetLeft;
  let y = e.clientY - e.target.offsetTop;
   let ripples = document.createElement('span');
   ripples.style.left = x + 'px';
   ripples.style.top + y + 'px';
   this.appendChild(ripples);

   setTimeout(()=>{
     ripples.remove()
   },1000);
})
}) 



var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}