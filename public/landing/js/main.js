$(document).ready(function() {
    /** Navbar Shrink */
    $(window).on("scroll", function() {
        if($(this).scrollTop() > 90){
            $(".navbar").addClass("navbar-shrink");
        }else{
            $(".navbar").removeClass("navbar-shrink");
        }
    });

    /** Vlms Fitur Carousel */
    $('.list-carousel').owlCarousel({
        loop:true,
        margin:0,
        autoplay:true,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:2,
            },
            1000:{
                items:3,
                loop:true
            }
        }
    });

    /** Smooth scroll with scrollit */
    $.scrollIt({
        topOffset: -50
    });

	/** Search Blog */
    const searchButton = document.getElementById('search-button');
    const searchInput = document.getElementById('search-input');
    searchButton.addEventListener('click', () => {
        const inputValue = searchInput.value;
        alert(inputValue);
    });

    /** Navbar Collapse */
    // $(".nav-link").on("click", function(){
    //     $(".navbar-collapse").collapse("hide");
    // });

});


