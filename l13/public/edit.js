$(document).ready(processEditPopup);

function processEditPopup()
{
    $('.edit-button').on('click', function (e) {
        e.preventDefault();
        e.stopPropagation();

        let oldName = $(this).data('oldName');
        let rout = $(this).data('rout');

        let form = $('#exampleModal .modal-body form');
        form.find('input[name="old_name"]').val(oldName);
        form.attr('action', 'actions/rename.php?rout=' + rout);

        $('#exampleModalLabel')
            .text('Rename element "' + oldName + '"');

        let modal = new bootstrap.Modal($('#exampleModal'));
        modal.show();
    });

    $('#renameButton').on('click', function (e) {
        e.preventDefault();
        e.stopPropagation();

        let form = $('#exampleModal .modal-body form');

        $.ajax({
            url: form.attr('action'),
            method: form.attr('method'),
            data: form.serialize(),
            success: function(redirectTo) {
                window.location.href = redirectTo;
            }
        });
    });
}
