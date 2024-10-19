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
<div class="content">
    <h1>Записи из базы данных бот @Donater_bot_ua</h1>
    <div class="mb-3">
        <a href="#" class="btn btn-success">Добавить новую запись</a>
    </div>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>userId</th>
            <th>firstName</th>
            <th>username</th>
            <th>Ответ 1</th>
            <th>Ответ 2</th>
            <th>Ответ 3</th>
            <th>Ответ 4</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($records as $record)
            <tr>
                <td>{{ $record->userId }}</td>
                <td>{{ $record->firstName }}</td>
                <td>{{ $record->username }}</td>
                <td>{{ $record->answer1 }}</td>
                <td>{{ $record->answer2 }}</td>
                <td>{{ $record->answer3 }}</td>
                <td>{{ $record->answer4 }}</td>
                <td>
                    <!-- Кнопка для редактирования -->
                    <a href="#" class="btn btn-warning btn-sm">Редактировать</a>

                    <!-- Форма для удаления -->
                    <form action="#" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
