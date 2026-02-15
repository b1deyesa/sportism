import './bootstrap';
import Splide from '@splidejs/splide';

// Input Search

$(document).on('input focus', '.search input[type="search"]', function () {
    const wrap = $(this).closest('.search');
    const hasValue = $(this).val().length > 0;

    wrap.toggleClass('active', this === document.activeElement);
    wrap.find('.fa-xmark').toggle(hasValue);
});

$(document).on('blur', '.search input[type="search"]', function () {
    const wrap = $(this).closest('.search');
    wrap.removeClass('active');

    if (!$(this).val()) {
        wrap.find('.fa-xmark').hide();
    }
});

$(document).on('click', '.search .fa-xmark', function () {
    const wrap = $(this).closest('.search');
    const input = wrap.find('input[type="search"]');

    input.val('').trigger('input').focus();
});


const splide = new Splide('#event__splide', {
    type: 'slide',
    perPage: 3,
    perMove: 1,
    gap: '1.5rem',
    rewind: false,
    arrows: true,
    pagination: false,
    breakpoints: {
        1024: {
          perPage: 2,
        },
        640: {
          perPage: 1,
          arrows: false
        }
      }
}).mount();
