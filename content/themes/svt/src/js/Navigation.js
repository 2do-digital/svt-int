const mobileMenu = document.querySelector('.menu-elements');

document.getElementById('burgerIcon').addEventListener('click', function () {
    this.classList.toggle('active');
    mobileMenu.classList.toggle('active');

});


// $(function () {
//     setNavigation();
// });

// function setNavigation() {
//     var path = window.location.pathname;
//     path = path.replace(/\//g, '');
//     // if (path == 'ausschreibungen') {
//     //     $('.menu-item').css({
//     //         color: 'black'
//     //     })
//     // }
//     $(".menu-item > a").each(function () {
//         var href = $(this).attr('href');
//         if (path.substring(0, href.length) === href) {
//             $(this).addClass('active');
//         }
//     });
// }