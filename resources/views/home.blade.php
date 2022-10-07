@extends('layout')

@section('content')

    <h1>TODO:</h1>

    <form action="{{ route('add') }}" method="post" class="row my-4">
        @csrf
        <div class="col-4">
            <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="title" name="title">
            @error('title') 
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col">
            <input type="text" class="form-control @error('description') is-invalid @enderror" placeholder="description" name="description">
            @error('description') 
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-auto">
            <input type="submit" value="ADD" class="btn btn-dark">
        </div>
    </form>

    <ul class="list-group list-group-flush"> 
        @foreach ($todos as $todo)
            <li class="list-group-item gap-3">
                <div class="row align-items-center">
                <div class="col">
                    <div class="fs-5 fw-semibold @if ($todo->status == 'COMPLETE') text-decoration-line-through  @endif">{{$todo->title}}</div>
                    <div>{{$todo->description}}</div>
                </div>
                
                <div class="dropdown col-2">
                    <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                      {{$todo->status}}
                    </button >
                  
                    <ul class="dropdown-menu">
                        @foreach ($statuses as $status)
                            @if ($status != $todo->status)
                                <li><a class="dropdown-item" href="{{ route('change_status', ['id' => $todo->id, 'status' => $status]) }}">
                                    {{$status}}
                                </a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>

                <div class="col-auto">
                    <a href="{{ route('edit', ['id' => $todo->id] ) }}" class="btn btn-outline-dark">
                        <i class="bi bi-pen"></i>
                    </a>
                </div>

                <div class="col-auto">
                    <a href="{{ route('remove', ['id' => $todo->id]) }}" class="btn btn-outline-dark">
                        <i class="bi bi-trash3"></i>
                    </a>
                </div>
            </div>
            </li>
        @endforeach
    </ul>

@endsection