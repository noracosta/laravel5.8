$(document).ready(function () {
    $('#nestable').nestable('expandAll');
    
    $('#nestable').nestable().on('change', function () {
        const data = {
            menu: window.JSON.stringify($('#nestable').nestable('serialize')),
            _token: $('input[name=_token]').val()
        };
        $.ajax({
            url: '/admin/menus/update_order',
            type: 'POST',
            dataType: 'JSON',
            data: data,
            success: function (respuesta) {
            }
        });
    });

    $('#nestable').nestable('expandAll');
});