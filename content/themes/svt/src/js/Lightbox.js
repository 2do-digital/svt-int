const projectItem = $('.gmh--projekt-grid > .gmh--project-teaser-img');
const lightbox = $('#lightbox');
const close = $('#lightbox > .close');

function closeOverlay() {
    lightbox.hide();
}


function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function (m, key, value) {
        vars[key] = value;
    });
    return vars;
}



$(window).load(function () {
    let get = getUrlVars()["id"];
    if (get) {
        var yOffset = $("#" + get).offset().top;
        $("body, html").scrollTop(yOffset);
    }

});