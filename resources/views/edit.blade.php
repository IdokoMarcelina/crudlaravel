<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=edit" />
    <title>Document</title>
</head>
<body>
    <div class="row">
        
    <form action="{{url('update', $myTask->id)}}" method="POST">
        @csrf
        @method('PUT')
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label" >Name</label>
        <input type="text" name="name" class="@error('name') is-invalid @enderror form-control" id="exampleFormControlInput1" placeholder="" value="{{$myTask->name ?? ''}}">
      </div>

      @error('name')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Content</label>
        <textarea name="content" class=" @error('content') is-invalid @enderror form-control" id="exampleFormControlTextarea1" rows="3">
            {{$myTask->content ?? ''}}
        </textarea>
      </div>

      @error('content')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">Update Task</button>
      </div>

    </form>
    </div>
</body>
</html>