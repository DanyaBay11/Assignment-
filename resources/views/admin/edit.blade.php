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
    <div class="d-flex mb-3">
        <form action="{{route('admin.update',$employee->id)}}" method="post" class="p-2">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Full Name</label>
                <input name="fullName" type="text" class="form-control" placeholder="Ex: Ivan Ivanov">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Post </label>
                <input name="post" type="text" class="form-control" placeholder="Ex: Manager">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Date</label>
                <input name="date" type="date" class="form-control">
            </div>
            <input type="submit" class="btn btn-warning" placeholder="Submit">
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"></script>
</body>
</html>
