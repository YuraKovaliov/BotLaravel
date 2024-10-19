<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админка</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
        }
        .sidebar {
            min-width: 200px;
            background: #f8f9fa;
            padding: 15px;
            border-right: 1px solid #ddd;
        }
        .content {
            flex-grow: 1;
            padding: 15px;
        }
        .nav-link {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="sidebar">
    <h5>Навигация</h5>
    <a href="/" class="nav-link btn btn-light">Главная</a>
    <a href="/db" class="nav-link btn btn-light">База</a>
    <a href="#" class="nav-link btn btn-light">Профиль</a>
    <a href="#" class="nav-link btn btn-light">Категории</a>
</div>
<div class="text-center mb-4">
{{--    <a  target="_blank">--}}
{{--        <img src="" alt="Описание изображения" class="img-fluid" style="max-width: 100%; height: auto; width: 1000px; height: 600px;">--}}
{{--    </a>--}}
    <h2>О проекте</h2>
    <p>
        Наш проект посвящен созданию уникальных ботов для различных платформ, включая Telegram, WhatsApp и другие. Мы предлагаем гибкие решения для автоматизации задач, улучшения взаимодействия с клиентами и упрощения процессов.
    </p>
    <p>
        Наша команда профессионалов использует передовые технологии и методы разработки, чтобы предоставить вам высококачественные и надежные боты, которые помогут вам достичь ваших бизнес-целей.
    </p>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
