const filterInput = $('.filter--input')

// filter.on('click', function () {
//     let filterName = $(this).attr('data-filter')
//     window.location = "/products?category=" + filterName
//     console.log(filterName)
// })

// GET Variable aus URL

$(function getQueryVariable() {
    var query = window.location.search.substring(1);
    var vars = query.split("&");

    filterInput.prop('checked', false);
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        let filters = vars[i].substring(vars[i].indexOf("=") + 1)



        if (query) {
            $("#" + filters).prop('checked', true);
        } else {

            $("#all").prop('checked', true);
        }




    }
    return (false);
})

$('#all').change(function () {
    if ($(this).is(':checked')) {
        filterInput.prop('checked', false);
        $(this).prop('checked', true);
    }
})
filterInput.change(function () {


    if (!$(this).is(document.getElementById('all'))) {
        //console.log('not all')
        $('#all').prop('checked', false);
    } else { //console.log('is all') 
    }
})



// if (getQueryVariable('category') === 'applications') {
//     document.getElementById('applications').checked = true
// } else { console.log('false') }