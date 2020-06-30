
@extends('layouts.app')

@section('content')

        <h1 class="text-center my-5">TODOS PAGE</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        Todos
                    </div>
                    <div class="card-body">

                        <ui class="list-group">
                            @foreach($todos as $todo)

                                <li class="list-group-item">{{$todo->name}}
                                    @if(!$todo->completed)
                                    <a href="/Todo/public/todos/{{$todo->id}}/completed">
                                        <button style="color: white" class="btn btn-warning btn-sm float-right">Complete</button></a>
                                    @endif
                                        <a href="/Todo/public/todos/{{$todo->id}}">
                                        <button class="btn btn-primary btn-sm float-right mr-2">View</button></a>

                                </li>

                            @endforeach
                        </ui>
                    </div>
                </div>
            </div>
        </div>

    @endsection




