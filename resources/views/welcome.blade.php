<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=edit" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=delete" />
    <title>Document</title>
</head>
<body>

  <div class="row">

    @session('sucess')
      <div class="p-4 bg-green-100">
        {{ $value }}
      </div>
    @endsession

  </div>

    <form action="{{url('create')}}" method="POST">
        @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label" >Name</label>
        <input type="text" name="name" class="@error('name') is-invalid @enderror form-control" id="exampleFormControlInput1" placeholder="">
      </div>

      @error('name')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">your Content</label>
        <textarea name="content" class=" @error('content') is-invalid @enderror form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>

      @error('content')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">Create Task</button>
      </div>

    </form>

    <div class="row mt-4">
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Content</th>
              <th scope="col">Date</th>
              <th scope="col">Action</th>
            </tr>
          </thead>

          <tbody>
              @foreach($tasks as $index => $task)
              <tr>
                <td>{{$index +1}}</td>
                <td>{{$task->name}}</td>
                <td>{{$task->content}}</td>
                <td>{{$task->created_at}}</td>
                <td>
                  {{-- <a href="{{url('/edit', $task->id)}}"> --}}
                     <a href="{{url('/edit', $task->name)}}">
                  <span class="material-symbols-outlined">
                    edit
                    </span>
                    <form action="{{url('delete', $task->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">
                        delete
                      </button>
                    </form>
                  </a>
                </td>
              </tr>
              @endforeach
          </tbody>
        </table>
        {{$tasks->links()}}
      </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/get-google-fonts@1.2.2/main.min.js"></script>
</body>
</html>