$(document).ready(function(){

    var validator = $("#contactform").validate({
        errorClass:'has-error',
        validClass:'has-success',
        errorElement:'div',
        highlight: function (element, errorClass, validClass) {
            $(element).closest('.form-control').addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents(".has-error").removeClass(errorClass).addClass(validClass);
        },
        rules: {
            firstname: {
                required: true,
                minlength: 2,
            },
            phone: {
                required: true,
                minlength: 7,
                phoneUS: true
            },
            
            gender: {
                required: true
            }
        },
        messages: {
            firstname: {
                required: '<span class="help-block">Как вас зовут.</span>',required: '<span class="help-block">Как вас зовут.</span>',
                minlength: jQuery.format('<span class="help-block">Имя должно состоять из {0}-х и более символов.</span>')
            },


            phone: {
                required: '<span class="help-block">Введитье номер мобильного.</span>',
                minlength: jQuery.format('<span class="help-block">Телефон должен состоять из {0}-х и более цифр.</span>'),
                phone: jQuery.format('<span class="help-block">Введитье верный номер мобильного.</span>')
            },
            gender: {
                required: '<span class="help-block">Вам нужно указать пол.</span>'
            },

        }
    });
    /*
    $('#contactform').validator().on('submit', function (e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
        } else {
            $.ajax({
                url: 'vendor/send_data.php',
                type: 'post',
                dataType: 'json',
                success: function (data) {
                    $('#target').html(data.msg);
                },
                data: person
            });
        }
    })
    */
});
