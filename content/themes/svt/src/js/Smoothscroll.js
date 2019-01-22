$(function () {
  "use strict";
  $('a[href*="#"]:not([href="#"])').click(function () {
    if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });

  if ($(window).scrollTop() > 100) {
    navbar.addClass('scrolled')
  } else {
    navbar.removeClass('scrolled')

  }
});

const header = $('#gmh--home-header');
const projHeader = $('#gmh--projekte-header')
const karriereHeader = $('#gmh--karriere-header')
const navigation = $('#gmh-header-outer');
const navbar = $('#page-header > .soft-row')


function parallax() {
  const wScroll = $(this).scrollTop();
  header.css('top', wScroll / 2 + 'px');
  projHeader.css('top', wScroll / 2 + 'px');
  karriereHeader.css('top', wScroll / 2 + 'px');
  if (wScroll > 100) {
    navbar.addClass('scrolled')
  } else {
    navbar.removeClass('scrolled')
  }


}






$(window).scroll(debounce(parallax, 0, 20))

$(document).ready(function () {
  if (window.location.hash.length > 0) {
    window.scrollTo(0, $(window.location.hash).offset().top);
  }
});