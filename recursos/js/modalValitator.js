$('#myModal').on('hidden.bs.modal', function() {
    $('#formModal').formValidation('resetForm', true);
})

$(document).ready(function() {
    $('#formModal').formValidation({
        framework: 'bootstrap',
        excluded: [':disabled'],
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nombre: {
                validators: {
                    notEmpty: {
                        message: 'The username is required'
                    }
                }
            },
            func: {
                validators: {
                    notEmpty: {
                        message: 'The password is required'
                    }
                }
            }
        }
    });
});