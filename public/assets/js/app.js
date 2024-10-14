// Initialize Wow
new WOW().init();

// Dummy Slider
$(".cata_slider").slick({
  autoplay: false,
  slidesToShow: 6,
  slidesToScroll: 1,
  arrows: true,
  dots: false,
});

$(".cata_botSlider").slick({
  autoplay: true,
  speed:3000,
  autoplaySpeed:0,
  cssEase:'linear',
  slidesToShow: 4,
  slidesToScroll: 1,
  arrows: false,
  dots: false,
  variableWidth: true
});


$('.pro_main_slider').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: true,
  fade: false,
  dots: false, 
  asNavFor: '.pro_sub_slider'
});
$('.pro_sub_slider').slick({
  slidesToShow: 5,
  slidesToScroll: 1,
  asNavFor: '.pro_main_slider',
  dots: false, 
  focusOnSelect: true,
  arrows: false,
});


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
$('.srh_btn').click(function(){
  $('.overlay').addClass('active')
  $('.search_main').addClass('active')
})
$('.srh_cross').click(function(){
  $('.overlay').removeClass('active')
  $('.search_main').removeClass('active')
})
