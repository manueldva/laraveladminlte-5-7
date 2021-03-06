
/*
document.querySelector('#confirm_delete').addEventListener('submit', function(e) {
    var form = this;
    e.preventDefault();
    swal({
        title: "¿Estas seguro que deseas eliminar este registro?",
        text: "Si eliminas este registro, no podras recuperarlo",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: '¡Si, estoy seguro!',
        cancelButtonText: "Cancelar",
        closeOnConfirm: false,
        closeOnCancel: true
    },
    function(isConfirm) {
        if (isConfirm) {
            form.submit();
        } 
    });
});*/

$('table[data-form="Form"]').on('click', '.form-delete', function(e){
    e.preventDefault();
    var $form=$(this);
    $('#confirm').modal({ backdrop: 'static', keyboard: false })
        .on('click', '#delete-btn', function(){
            $form.submit();
        });
});


$('.btnDeleteImage').on('click', function(e){
    e.preventDefault();
    $('#idhiddenimg').val($(this).data('id'));
    $('#mdDeleteImage').modal('show');
});

$('#btnMdDeleteImg').on('click', function(){
     window.App = { host: '{{ url("/") }}/' }
    var id = $('#idhiddenimg').val();

    $.ajax({
    url: "../../imagedestroy/" + id
    })
    .done(function( data ) {
        $('#mdDeleteImage').modal('hide');
        $('#element'+data).remove();
    });     
}); 