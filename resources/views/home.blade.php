@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if(session('message'))
                            <div class = "alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        <p class = 'but ringt_group'><a href = '/add_task'>Добавить задание</a></p>
                        @foreach($tasks as $task)
                            <div id='rew' class = 'tok row'>
                                <div class = 'col-md-6'>
                                    <img src = '/img/task_img/{{ $task->name_image }}'>
                                </div>
                                <div class ='col-md-6'>
                                    @if($task->status == 'yes')
                                        <p>Статус: Выполнено !</p>
                                    @elseif($task->status == 'no')
                                        <p>Статус: В процеси выполнения</p>
                                    @endif
                                    Создал: {{ $task->name }}

                                    <br>Email:  {{ $task->email }}

                                    <br>Задание: {{ $task->task }}

                                    <div id='bun'>
                                        <form method='get'>
                                            @if($access == "admin")
                                                <button class = 'but but_edit' formaction = '/update/{{ $task->id }}'>
                                                    Редактировать
                                                </button>
                                                @if($task->status == 'no')
                                                    <button  class = 'but but_edit' formaction = '/done_yes/{{ $task->id }}'>
                                                        Выполнено
                                                    </button>
                                                @elseif($task->status == 'yes')
                                                    <button class = 'but but_edit' formaction = '/done_no/{{ $task->id }}'>
                                                        Не выполнино
                                                    </button>
                                                @endif
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection