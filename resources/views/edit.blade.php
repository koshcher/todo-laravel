@extends('layout')

@section('content')

    <h1>EDIT:</h1>

  <form action="{{ route('update', ['id'=>$todo->id]) }}" method="post" class="d-flex flex-column gap-4 mt-4">
    @csrf
    <div>
      <span>TITLE</span>
      <input type="text" class="form-control @error('title') is-invalid @enderror" 
        placeholder="title" name="title" value="{{$todo->title}}">
      @error('title') 
        <span class="text-danger">{{$message}}</span>
      @enderror
      </div>
      <div>
        <span>DESCRIPTION</span>
        <textarea type="text" class="form-control @error('description') is-invalid @enderror" 
          placeholder="description" name="description">{{$todo->description}}</textarea>
        @error('description') 
          <span class="text-danger">{{$message}}</span>
        @enderror
      </div>

      <select name="status" class="form-select">
        @foreach ($statuses as $status)
          <option value="{{$status}}">{{$status}}</option>    
        @endforeach

      </select>
        
      <input type="submit" value="UPDATE" class="btn btn-dark w-100">
  </form>

@endsection