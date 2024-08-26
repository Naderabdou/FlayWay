$(document).ready(function(){
    $('.owl-one').owlCarousel({
        loop:true,
        margin:20,
        nav:true,
        dots:true,
        autoplay:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1024:{
                items:3 
            },
            1440:{
                items:4
            }
        }
    })
    $('.owl-two').owlCarousel({
        loop:true,
        margin:20,
        nav:false,
        center:true,
        autoplay:true,
        autoplayTimeout:2500,
    autoplayHoverPause:true,
    smartSpeed:1500,
        dots:true,
        responsive:{
            0:{
                items:2 
            },
            600:{
                items:2
            },
            900:{
                items:4
            },
            1024:{
                items:6 
            },
            1640:{
                items:6
            }
        }
    })
    $('.owl-three').owlCarousel({
        loop:true,
        margin:30,
        nav:false,
        dots:true,
        center:true,
        autoplay:true,
        autoplayTimeout:6000,
        smartSpeed:2000,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            900:{
                items:2
            },
            1024:{
                items:2
            
        }
    }
})
  });


$(".remove_mune").click(function () {
    $("#menu-div").removeClass("active");
    $(".bg_menu").removeClass("active");
  });
  
  function open() {
    $(".navicon").addClass("is-active");
    $("#menu-div").addClass("active");
    $("#times-ican").addClass("active");
    $(".bg_menu").addClass("active");
  }
  
  function close() {
    $(".navicon").removeClass("is-active");
    $("#menu-div").removeClass("active");
    $("#times-ican").removeClass("active");
    $(".bg_menu").removeClass("active");
    $(".dropdowm-language").slideUp();
    $(".dropdowm-language-mune").slideUp();
    $(".dropdowm-element").slideUp();
    $(".dropdowm-element-mune").slideUp();
  
    $(".remove-mune").click(function () {
      $("#menu-div").removeClass("active");
      $(".bg_menu").removeClass("active");
      $(".times-ican").removeClass("active");
    });
  }
  
  $("#times-ican").click(function () {
    if ($(this).hasClass("active")) {
      close();
    } else {
      open();
    }
  });
  
  $(".btns_menu_responsive").click(function (e) {
    close();
  });
  
  $(".remove-mune").click(function () {
    $("#menu-div").removeClass("active");
    $(".bg_menu").removeClass("active");
    $(".times-ican").removeClass("active");
    $(".navicon").removeClass("is-active");
  });
  
  $("#menu-div a").click(function () {
    e.preventDefault();
  });
  
  
var $winl = $(window); // or $box parent container
var $boxl = $(
  "#menu-div, #times-ican , .click-element   , .dropdowm-element-mune"
);
$winl.on("click.Bst", function (event) {
  if (
    $boxl.has(event.target).length === 0 && //checks if descendants of $box was clicked
    !$boxl.is(event.target) //checks if the $box itself was clicked
  ) {
    close();
  }
});


// 






document.querySelector('.icon__arrow').addEventListener('click', function() {
  const selectElement = document.getElementById('custom-select');
  selectElement.focus();
  selectElement.click(); // This triggers the dropdown to open
});