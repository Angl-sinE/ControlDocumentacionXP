$(document).ready(function() {
    $('#formulario')
        .bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            locale: 'es_ES',
            fields: {
                firstName: {
                    validators: {
                        notEmpty: {
                            message: 'El nombre es requerido, el campo no puede estar vacio'
                        }
                    }
                },
                lastName: {
                    validators: {
                        regexp: {
                            regexp: /^[a-zA-Z0-9_\.]+$/,
                            message: 'Solo caracteres numericos y alfanumericos'
                        },
                        
                    }
                },
                username: {
                    message: 'nombre de usuario invalido',
                    validators: {
                        notEmpty: {
                            message: 'El nombre de usuario es requerido, el campo no puede estar vacio'
                        },
                        stringLength: {
                            min: 3,
                            max: 30,
                            message: 'El nombre es requerido,debe tener entre 6 y 20 caracteres'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9_\.]+$/,
                            message: 'Solo caracteres numericos y alfanumericos'
                        },
                        different: {
                            field: 'password',
                            message: 'La contraseña y el nombre de usuario no pueden ser el mismo'
                        }
                    }
                },
                email: {
                    validators: {
                        emailAddress: {
                            message: 'Direccion de email invalida'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'El nombre de usuario es requerido, el campo no puede estar vacio'
                        },
                        different: {
                            field: 'username',
                            message: 'La contraseña y el nombre de usuario no pueden ser el mismo'
                        },
                        stringLength: {
                            min: 3,
                            max: 8,
                            message: 'La contraseña es requerido, debe tener entre 6 y 8 caracteres'
                        }
                    }
                },
                confirmPassword: {
                validators: {
                    notEmpty: {},
                    identical: {
                        field: 'password'
                    },
                    different: {
                        field: 'username',
                        message: 'La contraseña y el nombre de usuario no pueden ser el mismo'
                    }
                }
            },
                
            }
        })
        .on('error.field.bv', function(e, data) {
            var messages = data.bv.getMessages(data.field);
            $('#errors').find('li[data-bv-for="' + data.field + '"]').remove();
            for (var i in messages) {
                $('<li/>').attr('data-bv-for', data.field).html(messages[i]).appendTo('#errors');
            }
            $('#errors').parents('.form-group').removeClass('hide');
        })
        .on('success.field.bv', function(e, data) {
            $('#errors').find('li[data-bv-for="' + data.field + '"]').remove();
        })
        .on('success.form.bv', function(e) {
            $('#errors')
                .html('')
                .parents('.form-group').addClass('hide');
        });
});
   