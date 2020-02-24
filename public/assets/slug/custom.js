$(document).ready(function () {
    $('#name').on('change',function(){
        $('#slug').val($(this).val().toLowerCase().replace(/ /g, '-'))
    })
});