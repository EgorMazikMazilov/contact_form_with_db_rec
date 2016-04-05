<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Boostrap Validator</title>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"> </script>
    </head>

    <body>
        <div class="container">
            <form id="contactForm" method="post" class="form-horizontal" action="send_data.php">
                <div class="form-group">
                    <label class="col-md-3 control-label">Имя</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="fullName" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Телефон</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="phone" />
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-md-3 control-label">Пол</label>
                    <div class="col-md-6">
                        <select class="form-control" name="gender" id="gender">
                            <option value="0">не выбран</option>
                            <option value="1">пол мужской</option>
                            <option value="2">пол женский</option>
                        </select>
                    </div>
                </div>
                <!-- #messages is where the messages are placed inside -->
                <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                        <div id="messages"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-3 control-label" id="captchaOperation"></label>
                    <div class="col-xs-4">
                        <input type="text" class="form-control" name="captcha" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                        <button type="submit" id="submit" name="submit" class="btn btn-default">Отправить</button>
                    </div>
                </div>
            </form>
            <script>
                $(document).ready(function() {
                    // Generate a simple captcha
                    function randomNumber(min, max) {
                        return Math.floor(Math.random() * (max - min + 1) + min);
                    }
                    $('#captchaOperation').html([randomNumber(1, 12), '+', randomNumber(1, 12), '='].join(' '));

                    $('#contactForm').bootstrapValidator({
                        container: '#messages',
                        feedbackIcons: {
                            valid: 'glyphicon glyphicon-ok',
                            invalid: 'glyphicon glyphicon-remove',
                            validating: 'glyphicon glyphicon-refresh'
                        },
                        fields: {
                            fullName: {
                                validators: {
                                    notEmpty: {
                                        message: 'Введите имя'
                                    },
                                    stringLength: {
                                        min: 2,
                                        max: 30,
                                        message: 'Количество символов не меньше 2-х и не больше 30'
                                    },
                                    regexp: {
                                        regexp: /^[а-яА-Я_\.]+$/,
                                        message: 'Используйте только буквы'
                                    }
                                }
                            },
                            phone: {
                                row: '.col-xs-3',
                                validators: {
                                    notEmpty: {
                                        message: 'Введите мобильный телефон'
                                    },
                                    stringLength: {
                                        min: 10,
                                        max: 12,
                                        message: 'Количество символов не меньше 10-и и не больше 12'
                                    },
                                    regexp: {
                                        regexp: /^[a-zA-Z0-9_\.]+$/,
                                        message: 'Используйте только цифры'
                                    }
                                }
                            },
                            captcha: {
                                validators: {
                                    callback: {
                                        message: 'Введите правильный ответ',
                                        callback: function(value, validator, $field) {
                                            var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                                            return value == sum;
                                        }
                                    }
                                }
                            },
                            gender : {
                                validators : {
                                    greaterThan : {
                                        value: 1,
                                        message: "Укажите ваш пол"
                                    }
                                }
                            }

                        }
                    });
                });
            </script>

        </div>
        </div><!-- col -->
    </div><!-- row -->
</div> <!-- /container -->
</body>
</html>
