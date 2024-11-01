//-----JS for Price Range slider-----

$(function () {
  $("#slider-range").slider({
    range: true,
    min: 5,
    max: 22,
    values: [10, 15],
    slide: function (event, ui) {
      $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
    }
  });
  $("#amount").val("$" + $("#slider-range").slider("values", 0) +
    " - $" + $("#slider-range").slider("values", 1));
});

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
  speed: 3000,
  autoplaySpeed: 0,
  cssEase: 'linear',
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
$('.srh_btn').click(function () {
  $('.overlay').addClass('active')
  $('.search_main').addClass('active')
})
$('.srh_cross').click(function () {
  $('.overlay').removeClass('active')
  $('.search_main').removeClass('active')
})


$('.filter_btn').click(function () {
  $('.filter_card').addClass('active')
  $('.overlay').addClass('active')
})
$('.cross_btn').click(function () {
  $('.filter_card').removeClass('active')
  $('.overlay').removeClass('active')
})
$('.overlay').click(function () {
  $('.filter_card').removeClass('active')
  $('.overlay').removeClass('active')
})



$('.pro_detailSlider').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  dots: false,
  asNavFor: '.pro_navSlider'
});
$('.pro_navSlider').slick({
  slidesToShow: 5,
  slidesToScroll: 1,
  asNavFor: '.pro_detailSlider',
  dots: false,
  infinite: false,
  arrows: false,
  centerMode: false,
  focusOnSelect: true
});
(function () {
  const quantityContainer = document.querySelector(".quantity");

  if (quantityContainer) {
    const minusBtn = quantityContainer.querySelector(".minus");
    const plusBtn = quantityContainer.querySelector(".plus");
    const inputBox = quantityContainer.querySelector(".input-box");

    updateButtonStates();

    quantityContainer.addEventListener("click", handleButtonClick);
    inputBox.addEventListener("input", handleQuantityChange);

    function updateButtonStates() {
      const value = parseInt(inputBox.value);
      minusBtn.disabled = value <= 1;
      plusBtn.disabled = value >= parseInt(inputBox.max);
    }

    function handleButtonClick(event) {
      if (event.target.classList.contains("minus")) {
        decreaseValue();
      } else if (event.target.classList.contains("plus")) {
        increaseValue();
      }
    }

    function decreaseValue() {
      let value = parseInt(inputBox.value);
      value = isNaN(value) ? 1 : Math.max(value - 1, 1);
      inputBox.value = value;
      updateButtonStates();
      handleQuantityChange();
    }

    function increaseValue() {
      let value = parseInt(inputBox.value);
      value = isNaN(value) ? 1 : Math.min(value + 1, parseInt(inputBox.max));
      inputBox.value = value;
      updateButtonStates();
      handleQuantityChange();
    }

    function handleQuantityChange() {
      let value = parseInt(inputBox.value);
      value = isNaN(value) ? 1 : value;
      console.log("Quantity changed:", value);
    }
  }
})();
