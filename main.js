function toggleMenu(){var n=document.getElementById('mainNav'); if(n){n.className=n.className==='open'?'':'open';}}
window.onscroll=function(){var b=document.querySelector('.to-top'); if(b)b.style.display=(window.pageYOffset>350?'flex':'none');};
var currentSlide=0;
var slideTimer;
function showSlide(index){
  var slides=document.querySelectorAll('.hero-slider .slide');
  var dots=document.querySelectorAll('.slider-dots .dot');
  if(!slides.length)return;
  if(index>=slides.length)index=0;
  if(index<0)index=slides.length-1;
  currentSlide=index;
  for(var i=0;i<slides.length;i++){slides[i].className='slide'+(i===index?' active':''); if(dots[i])dots[i].className='dot'+(i===index?' active':'');}
}
function goToSlide(index){showSlide(index); restartSlider();}
function changeSlide(step){showSlide(currentSlide+step); restartSlider();}
function restartSlider(){clearInterval(slideTimer);slideTimer=setInterval(function(){showSlide(currentSlide+1);},6000);}
window.addEventListener('load',function(){if(document.getElementById('homeSlider')){showSlide(0);restartSlider();}});
