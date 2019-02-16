const toggleHead = $('.toggle--header');

$(function () {
    $('.toggle--body').hide();
})

toggleHead.on('click', function () {
    $(this).next('.toggle--body').slideToggle();
    $(this).toggleClass('active');
})