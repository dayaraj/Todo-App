
@extends('layouts.app')

@section('content')
    <h1 class="text-center my-5">{{$todo->name}}</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-default">
                <div class="card-header">
                  Details
                </div>
                <div class="card-body">
                    {{$todo->description}}
                </div>
            </div>
            <a href="/Todo/public/todos/{{$todo->id}}/edit" class="btn btn-info my-2">Edit</a>
            <form action="{{route('todos.destroy',$todo->id)}}" method="POST">
                @csrf
                @method('DELETE')
            <button class="btn btn-danger my-2" type="submit">Delete</button>
            </form>
        </div>
</div>


    @endsection

