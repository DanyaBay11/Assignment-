<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1>Cписок работников </h1>
    <div class="d-flex mb-3">
        <table class="p-2 table table-dark table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Full Name</th>
                <th>Post</th>
                <th>Date</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{$employee->id}}</td>
                    <td>{{$employee->fullName}}</td>
                    <td>{{$employee->post}}</td>
                    <td>{{$employee->date}}</td>
                    <td></td>
                    <td>
                        <form action="{{route('admin.destroy',$employee->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn-close" aria-label="Close"></button>
                        </form>
                    </td>
                    <td>
                        <a href="{{route('admin.edit',$employee->id)}}">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <form action="{{route('admin.store')}}" method="post" class="p-2">
            @csrf
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">ФИО</label>
                <input name="fullName" type="text" class="form-control" placeholder="Ex: Ivan Ivanov">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Должность</label>
                <input name="post" type="text" class="form-control" placeholder="Ex: Manager">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Дата</label>
                <input name="date" type="date" class="form-control">
            </div>
            <input type="submit" class="btn btn-warning" placeholder="Submit">
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"></script>
</body>
</html>
