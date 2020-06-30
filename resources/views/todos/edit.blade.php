@extends('layouts.app')

@section('content')

    <h1 class="text-center my-5">Edit Todo</h1>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Edit your todo</div>

                <div class="card-body">
                    <form action=" {{route('todos.update',$todo->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="todo_id" value="{{$todo->id}}">
                        <div class="form-group">
                            <input type="text" class="form-control"  name="name" value="{{$todo->name}}">
                        </div>
                        <div class="form-group">
                            <input class="form-control" value="{{$todo->description}}" name="description" >
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit" >Update Todo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    @endsection
