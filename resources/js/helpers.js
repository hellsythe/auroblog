window.$ = window.jQuery = require('jquery');


$(document).on('submit', '.question', function(event){
    if (!confirm($(this).data('question'))) {
        return false;
    }
});

$(document).on('click', '.show', function(event){
    $($(this).data('target')).removeClass('d-none');
    $(this).removeClass('show');
    $(this).addClass('hide');
});

$(document).on('click', '.hide', function(event){
   $($(this).data('target')).addClass('d-none');
   $(this).addClass('show');
   $(this).removeClass('hide');
});