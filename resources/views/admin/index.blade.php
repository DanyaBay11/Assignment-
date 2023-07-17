<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
<div class="container">
    <div>
        <h1>Список Работников</h1>
        <table cellspacing="0">
            <thead>
            <tr class="thead_title">
                <th>Полное Имя</th>
                <th>Должность</th>
                <th>Дата</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr class="employees" data-id="{{$employee->id}}">
                    <td class="fullName">{{$employee->fullName}}</td>
                    <td class="post">{{$employee->post}}</td>
                    <td class="date">{{$employee->date}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="form">
        <form action="{{route('admin.process')}}" method="post">
            @csrf
            <div class="inputs">
                <input name="fullName" type="text" id="fullName" placeholder="Полное имя">
                <input name="post" type="text" id="post" placeholder="Должность">
                <input name="date" type="date" id="date">
            </div>

            <input type="hidden" name="action" id="action" value="">
            <input type="hidden" name="id" id="id" value="">

            <div class="action">
                <div class="actions">
                    <button type="submit" name="action" value="create" class="add">Добавить</button>
                    <button type="submit" name="action" value="update" class="update">Обновить</button>
                    <button type="submit" name="action" value="delete" class="delete">Удалить</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="{{asset('js/main.js')}}"></script>
</body>
</html>
