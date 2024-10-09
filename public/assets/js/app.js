// Initialize Wow
new WOW().init();


$(".banner-slider").slick({
  autoplay: true,
  autoplaySpeed: 2000,
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: true,
  dots: true,
});
$(".testimonials_slider").slick({
  autoplay: true,
  autoplaySpeed: 2000,
  slidesToShow: 3,
  slidesToScroll: 1,
  arrows: true,
  dots: true,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});



$(document).ready(function(){

  $(".mycart").click(function(){
    $(".sidenav").addClass("show"); 
    $(".cart").addClass("ovelay"); 
  });
  
  $(".closebtn").click(function(){ 
    $(".sidenav").removeClass("show");
    $(".cart").removeClass("ovelay");
  });

})

// detail counter js start

function incrementValue() {
  var inputValue = parseInt(document.getElementById('counter').value);
  document.getElementById('counter').value = inputValue + 1;
}

function decrementValue() {
  var inputValue = parseInt(document.getElementById('counter').value);
  if (inputValue > 1) {
      document.getElementById('counter').value = inputValue - 1;
  }
}

// detail counter js end

function incrementQuantity(button) {
  var input = button.parentNode.querySelector('input[type=text]');
  var value = parseInt(input.value, 10);
  value = isNaN(value) ? 1 : value;
  value++;
  input.value = value;
}

function decrementQuantity(button) {
  var input = button.parentNode.querySelector('input[type=text]');
  var value = parseInt(input.value, 10);
  value = isNaN(value) ? 1 : value;
  value = value > 1 ? value - 1 : 1;
  input.value = value;
}
 
 // Siderbar
function openside() {
    document.querySelector(".responsive_header").classList.add("show");
}

function closeside() {
    document.querySelector(".responsive_header").classList.remove("show");
}