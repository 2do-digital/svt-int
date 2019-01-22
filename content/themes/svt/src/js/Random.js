// Startseiten Tabs
const tabSwitch = $('.gmh--tab-switch');
const tabContent = $('.gmh--project-teaser');
// Ausschreibungen Produkftfotos
const ausschreibungenBild1 = $('.gmh--image-toggle.gmh--col-2')
const ausschreibungenBild2 = $('.gmh--image-toggle.gmh--col-1')

tabSwitch.on('click', function () {
    let target = this.dataset.target;
    tabContent.removeClass('active');
    $('#' + target).addClass('active');
    tabSwitch.removeClass('active')
    $(this).addClass('active')
})

$(function () {
    let rnd = Math.round((Math.random()) + 1)
    $('.gmh--tab-switch:nth-child(' + rnd + ')').addClass('active');
    $('#gmh--projekt-' + rnd).addClass('active');

})
$(function () {
    let rndImage = Math.round((Math.random()) * 2 + 1)
    console.log(ausschreibungenBild1.attr('data-image' + rndImage))
    ausschreibungenBild1.css({
        background: "url(/content/uploads/" + ausschreibungenBild1.attr('data-image' + rndImage) + ") center no-repeat / cover"
    })
    ausschreibungenBild2.css({
        background: "url(/content/uploads/" + ausschreibungenBild2.attr('data-image' + rndImage) + ") center no-repeat / cover"
    })
})
