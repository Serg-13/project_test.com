@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3>Добавление нового задания:</h3>
                        @if(count($errors) > 0)
                            <div class = "alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li> {{ $error }} </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(session('message'))
                            <div class = "alert alert-success">
                                {{ session('message') }}

                            </div>
                        @endif
                        <form method="post" action="{{ route('add_task') }}">
                        <input type='hidden' name="_token" value="{{ csrf_token() }}">
                        <div class ="form-group">
                            <label for = "task">Задание:</label>
                            <textarea class="form-control" id="task" name="task" rows="3" required autofocus>{{ old('task') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Добавить</button>      
                </div>
            </div>
        </div>
    </div>
@endsection
