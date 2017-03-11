$(function () {
      $('.stations').popover({
        html: true,
        placement: "right",
        trigger: "hover",
        title: function () {
            return $(this).find('.pop-title').html();
        },
        content: function () {
            return $(this).find('.pop-content').html();
        }
      });
    });


$(document).ready(function() {
    $('#contact_form').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },

        fields: {
            imie: {
                validators: {
                    stringLength: {
                        min: 2,
                    },

                    notEmpty: {
                        message: 'Proszę wpisz swoje imię'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Proszę wpisz swój adres Email'
                    },
                    emailAddress: {
                        message: 'Proszę wpisz swój poprawny adres Email'
                    }
                }
            },
            miasto: {
                validators: {
                    stringLength: {
                        min: 4,
                    },
                    notEmpty: {
                        message: 'Proszę wpisz swoje miasto'
                    }
                }
            },
            state: {
                validators: {
                    notEmpty: {
                        message: 'Proszę wybierz swoje województwo'
                    }
                }
            },
            comment: {
                validators: {
                    stringLength: {
                        min: 10,
                        max: 400,
                        message: 'Proszę wpisać co najmniej 10 znaków i nie więcej niż 400'
                    },
                    notEmpty: {
                        message: 'Proszę wprowadzić wiadomość'
                    }
                    }
                }
            }
        })
        .on('success.form.bv', function(e){
            $('#success_message').slideDown({ opacity: "show"}, "slow")
                $('contact_form').data('bootstrapValidator').resetForm();

            e.preventDefault();

            var $form = $(e.target);

            var bv = $form.data('bootstrapValidator');

            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
    });
       

