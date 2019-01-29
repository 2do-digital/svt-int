const filter = $('.filter--label')
const filterItem = $('.filter--item')

filter.on('click', function () {
    let filterName = $(this).attr('data-filter')
    window.location = "/products?category=" + filterName
    console.log(filterName)
})

// GET Variable aus URL

function getQueryVariable(variable) {
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        if (pair[0] == variable) { return pair[1]; }
    }
    return (false);
}

if (getQueryVariable('category') === 'applications') {
    document.getElementById('applications').checked = true
} else { console.log('false') }