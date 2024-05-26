<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Main Page</title>
    <link href="{{ asset('css\mainPage.css') }} " rel="stylesheet" />
</head>
<body>
@include('layouts.header')
<div class="content-container">
    <h1>Головна сторінка </h1> <br>
    <h2>Завжди мріяли знати все про новинки кіноідустрії та виглядати справжнім кіноманом?<br>
    Тоді в нас є для тебе гарні новини! Сайт EasyMovie надасть тобі можливість переглядати всі наявні фільми, переглядати оцінки від інших користувачів та надасть вам можливість самим їх оцінювати. <br>
    Вже зацікавлені? Тоді не гальмуйте та приєднюйтесь до нас!
    </h2>
    <button id="registerButton" class="register-button">Реєстрація</button>

</div>
</body>
</html>

<script>
    document.getElementById('registerButton').addEventListener('click', function() {
        window.location.href = "{{ route('info.about') }}";
    });
</script>
