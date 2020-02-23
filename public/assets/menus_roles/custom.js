$('.menu_role').change(function() {
    var data = {
        menu_id: $(this).data('menuid'),
        role_id: $(this).val(),
        _token: $('input[name=_token]').val()
    };
    if ($(this).is(':checked')) {
        data.estado = 1
    } else {
        data.estado = 0
    }
    ajaxRequest('/admin/menus_roles', data);
});
function ajaxRequest (url, data) {
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        success: function (respuesta) {

            $('div.flash-message').html('<div class="alert alert-success" >' +respuesta + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');   
        
        }
    });
}