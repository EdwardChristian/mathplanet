var slideIndex = 1;
showSlides(slideIndex);

// controale
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail controale
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
function valideazaForm() {
  var x = document.forms["form"]["nume"].value;
  if (x == "") {
    alert("Va rugam introduceti-va numele");
    return false;
  }
}
function functieNav() {
  var x = document.getElementById("navigatie");
  if (x.className === "nav-ul") {
    x.className += " responsive";
  } else {
    x.className = "nav-ul";
  }
}
function arataMeniu() {
  var x = document.getElementById("nav-ascuns");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
