<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Подтверждение адреса электронной почты</title>
    <style>
        .my_btn {
            display: block;
            width: 150px;
            text-align: center;
            margin: 30px auto;
            color: #fff;
            background: #222;
            border-radius: 5px;
            text-decoration: none;
            padding: 10px 25px;
        }
        .container {
            background: #fff;
            width: 50vw;
            color: #222;
            padding: 25px;
            border-radius: 10px;
            margin: 50px 0;
        }
        @media all and (max-width: 998px) {
            .container {
                width: 90vw;
            }
        }
        @media all and (max-width: 320px) {
            .container {
                width: 95vw;
            }
        }
        p {
            color: #777;
        }
        h1 {
            font-weight: bold;
        }
    </style>
</head>
<body style="background: #cccccc; display: flex; justify-content: center;">
<div class="container">
    <h1>Здравствуйте!</h1>
    <p>Вы получили данное письмо, так как зарегистрировались на Всероссийский форум школьных спортивных клубов. Для подтверждения адреса электронной почты нажмите кнопку "Подтвердить".</p>
    <a href="{{ $url }}" class="my_btn">Подтвердить</a>
    <p>Если вы не регистрировались на форум, никаких дальнейших действий не требуется.</p>
    <hr>
    <p style="font-size: 12px">Если у вас возникли проблемы с нажатием кнопки «Подтвердить», скопируйте и вставьте указанный ниже URL-адрес в адресную строку вашего веб-браузера: <a href="{{ $url }}">{{ $url }}</a> </p>
</div>
</body>
</html>
