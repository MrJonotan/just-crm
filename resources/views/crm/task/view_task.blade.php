@extends('adminlte::page')
@section('title', $task->title)
@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb float-right">
                    @if(Auth::user()->id === $task->manager_id)
                        <li>
                            <button type="button" class="btn btn-tool" id="edit">
                                <i class="fa-solid fa-pen" title="Редактировать"></i>
                            </button>
                        </li>
                        <li>
                            <button type="button" class="btn btn-tool" id="destroy">
                                <i class="fa-solid fa-trash" title="Удалить"></i>
                            </button>
                        <li>
                    @endif
                    <li class="breadcrumb-item"><span class="badge badge-{{$task->priority->color}}" title="Приоритет">{{$task->priority->title}}</span></li>
                    <li class="breadcrumb-item"><span class="badge badge-{{$task->status->color}}" title="Статус">{{$task->status->title}}</span></li>
                </ol>
                <ol class="breadcrumb m-1">
                    <li class="breadcrumb-item"><a href="/projects">Проекты</a></li>
                    <li class="breadcrumb-item"><a href="/projects/{{$task->project->id}}">{{$task->project->title}}</a></li>
                    <li class="breadcrumb-item active">{{$task->title}}</a></li>
                </ol>
            </nav>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header" style="padding: 0;">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="home" aria-selected="true">Описание задачи</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="docs-tab" data-toggle="tab" href="#docs" role="tab" aria-controls="profile" aria-selected="false">Документы</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body" style="overflow-y: scroll">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="statistic-tab">
                            {{$task->description}}
                        </div>
                        <div class="tab-pane fade" id="docs" role="docs" aria-labelledby="docs-tab">
                            <div class="justify-content-center">
                                <h3>Нет документов по данной задаче</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4 row" style="margin: 0%; padding: 0%">
            <div class="col-12">
                <div class="card" style="width: 100%">
                    <div class="card-header">
                        <h5 class="card-title">Сведения по задаче</h5>
                    </div>
                    <div class="card-body row" style="padding-top: 1vh">
                        <div class="col-9">
                            <h5 class="direct-chat-timestamp">Отвественные сотрудники</h5>
                            <b>Исполнитель :</b> {{$task->employee->first_name .' '. $task->employee->name .' '.$task->employee->last_name}}</br>
                            <b>Ответсвенный :</b> {{$task->manager->first_name .' '. $task->manager->name .' '.$task->manager->last_name}}
                        </div>
                        <div class="col-3">
                            <h5 class="direct-chat-timestamp">Часы</h5>
                            <b>План :</b> {{$task->hours}}</br>
                            <b>Факт :</b> -
                        </div>
                        <div class="col-12 row" style="margin-left: 0">
                            <div class="col-12">
                                <h5 class="direct-chat-timestamp ">Сроки выполнения</h5>
                            </div>
                            <div class="col-6 float-left">
                                <h5 class="direct-chat-timestamp">Начало</h5>
                                <b>План :</b> {{$task->begin_start_date_plan}}</br>
                                <b>Факт :</b> {{$task->start_date_fact}}</br>
                                @if(Auth::user()->id == $task->manager_id)
                                    <b>Крайняя :</b> {{$task->last_start_date_plan}}</br>
                                @endif
                            </div>
                            <div class="col-6 float-right">
                                <h5 class="direct-chat-timestamp">Окончание</h5>
                                <b>План :</b> {{$task->begin_end_date_plan}}</br>
                                <b>Факт :</b> {{$task->end_date_fact}}</br>
                                @if(Auth::user()->id == $task->manager_id)
                                    <b>Крайняя :</b> {{$task->last_end_date_plan}}</br>
                                @endif
                            </div>
                        </div>
                        <div class="col-12">
                            <h5 class="direct-chat-timestamp">Готовность</h5>
                            @if($task->readiness > 100)
                                <div class="progress">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{$task->readiness}}%; color: #000000" aria-valuenow="{{$task->readiness}}" aria-valuemin="0" aria-valuemax="100" >{{$task->readiness}}%</div>
                                </div>
                            @else
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: {{$task->readiness}}%; color: #000000" aria-valuenow="{{$task->readiness}}" aria-valuemin="0" aria-valuemax="100" >{{$task->readiness}}%</div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-7">
            <div class="card" style="height: 45vh; width: 100%">
                <div class="card-header">
                    <div class="card-tools" style="padding-top: 1.3vh">
                        <button type="button" class="btn btn-tool float-right" id="addProgress">
                            <i class="fas fa-plus" title="Добавить ход выполнения"></i>
                        </button>
                    </div>
                    <h5>Ход реализации</h5>
                </div>
                <div class="card-body" style="overflow-y: scroll; padding-top: 1vh">
                    <table class="table table-head-fixed">
                        <thead>
                        <tr>
                            <td>Дата выполнения</td><td>Описание</td><td>Количество часов</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($task->subtasks as $subtask)
                            <tr>
                                <td>{{$subtask->created_at}}</td><td>{{$subtask->title}}</td><td>{{$subtask->hours}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-5">
            <div class="card" style="height: 45vh; width: 100%">
                <div class="card-header">
                    <h5>Комментарии</h5>
                </div>
                <div class="card-body" style="overflow-y: scroll;">
                    @include("vendor.crm.comment_message")
                </div>
                <div class="card-footer">
                    <form action="#" method="post">
                        <div class="input-group">
                            <input type="text" name="message" placeholder="Текст комментария ..." class="form-control">
                            <span class="input-group-append">
                                <button type="button" class="btn btn-warning"><i
                                        class="fa-solid fa-paper-plane"></i></button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg" id="addTaskProgress" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Добавить ход выполнения</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body row">
                        <div class="col-11">
                            <span class="direct-chat-timestamp">Описание</span>
                            <input class="form-control">
                        </div>
                        <div class="col-1">
                            <span class="direct-chat-timestamp">Часы</span>
                            <input class="form-control" id="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="save_changes">Сохранить</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        $('document').ready(function () {
            $('#addProgress').click(function (){
                $('#addTaskProgress').modal('show');
            });
        });


    </script>
@stop
