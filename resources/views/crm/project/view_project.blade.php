@extends('adminlte::page')
@section('title', $project->title)
@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb float-right">
                    <li>
                        <button type="button" class="btn btn-tool" id="calendarGraph">
                            <i class="fa-solid fa-calendar-week" title="Календарный график"></i>
                        </button>
                    </li>
                    @if(Auth::user()->id === $project->manager_id)
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
                    <li class="breadcrumb-item"><span class="badge badge-{{$project->priority->color}}" title="Приоритет">{{$project->priority->title}}</span></li>
                    <li class="breadcrumb-item"><span class="badge badge-{{$project->status->color}}" title="Статус">{{$project->status->title}}</span></li>
                </ol>
                <ol class="breadcrumb m-1">
                    <li class="breadcrumb-item"><a href="/projects">Проекты</a></li>
                    <li class="breadcrumb-item active">{{$project->title}}</a></li>
                </ol>
            </nav>
        </div>
        <div class="col-6 row" style="margin: 0%; padding: 0%">
            <div class="col-12 row">
                <div class="col-3">
                    <div class="card">
                        <div class="card-header" >
                            <b class="card-title"><i class="fa-regular fa-flag"></i> Начало</b>
                        </div>
                        <div class="p-2">
                            <b>План: </b><span>{{$project->begin_start_date_plan}}</span></br>
                            <b>Факт: </b><span>{{$project->start_date_fact}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-header">
                            <b class="card-title"><i class="fa-solid fa-flag-checkered"></i> Окончание </b>
                        </div>
                        <div class="p-2">
                            <b>План: </b><span>{{$project->begin_end_date_plan}}</span></br>
                            <b>Факт: </b><span>{{$project->end_date_fact}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-header">
                            <b class="card-title"><i class="fa-solid fa-money-bills"></i> Бюджет</b>
                        </div>
                        <div class="p-2">
                            <b>План: </b><span>{{$project->budget_plan}} <i class="fa-solid fa-ruble-sign"></i></span></br>
                            <b>Факт: </b><span>{{$project->budget_fact}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-header">
                            <b class="card-title"><i class="fa-solid fa-handshake-simple"></i> Заказчик</b>
                        </div>
                        <div class="p-2" style="min-height: 6.7vh; max-height: 12vh">
                            <span><a href="/clients/{{$project->client->id}}">{{$project->client->organization}}</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 row">
                <div class="col-7">
                    <div class="card" style="min-height: 26.5vh; max-height: 26.5vh">
                        <div class="card-header">
                            <b class="card-title"><i class="fa-solid fa-people-group"></i> Команда</b>
                        </div>
                        <div class="p-2" style="min-height: 6.7vh; max-height: 12vh; overflow-y: scroll">
                            @if($project->employees->isNotEmpty())
                                @foreach($project->employees as $list)
                                    {{$list->employee->first_name .' '. $list->employee->name .' '. $list->employee->last_name}}</br>
                                @endforeach
                            @else
                                <p>Нет назначенных сотрудников</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-5 row" style="margin: 0%; padding: 0%">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <b class="card-title"><i class="fa-solid fa-user-tie"></i> Менеджер</b>
                            </div>
                            <div class="p-2" style="min-height: 6.7vh; max-height: 12vh">
                                <span>{{$project->manager->first_name .' '. $project->manager->name .' ' . $project->manager->last_name}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <b class="card-title"><i class="fa-solid fa-handshake-simple"></i> Часы</b>
                            </div>
                            <div class="p-2" style="min-height: 6.7vh; max-height: 12vh">
                                {{--                        <span>{{$project->client->first_name .' '. $project->client->name . ' '. $project->client->last_name}}</span>--}}
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <b class="card-title"><i class="fa-solid fa-handshake-simple"></i> Цвет</b>
                            </div>
                            <div class="p-2" style="min-height: 6.7vh; max-height: 12vh">
                                {{--                        <span>{{$project->client->first_name .' '. $project->client->name . ' '. $project->client->last_name}}</span>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 row" style="margin: 0%; padding: 0%">
            <div class="col-12 row">
                <div class="card row float-right" style="width: 48.9vw; min-width: 40.5vw; height: 376px">
                    <div class="card-header" style="padding: 0;">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true"><i class="fa-solid fa-bars"></i> Описание</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="statistic-tab" data-toggle="tab" href="#statistic" role="tab" aria-controls="statistic" aria-selected="false"><i class="fa-solid fa-chart-pie"></i> Статистика</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="docs-tab" data-toggle="tab" href="#docs" role="tab" aria-controls="docs" aria-selected="false"><i class="fa-solid fa-folder-open"></i> Документы</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">

                            <div class="tab-pane fade show active row" id="description" role="tabpanel" aria-labelledby="description-tab">
                                {{htmlentities($project->description)}}<br/>
                                Gjitk yf [eq <br/> Uyblf
                            </div>

                            <div class="tab-pane fade row" id="statistic" role="tabpanel" aria-labelledby="statistic-tab">
                                <div class="col-6">
                                    <span class="direct-chat-timestamp">Прогресс</span>
                                    <div id="chartPie">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <span class="direct-chat-timestamp">Статистика по задачам</span>
                                    <div id="projectChartPie">
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="docs" role="docs" aria-labelledby="docs-tab" style="overflow-y: scroll;">
                                <table class="table">
                                    @if(!empty($project->documents))
                                        @foreach($project->documents as $document)
                                            <tr>
                                                <td>{{$document->title}}</td> <td><button class="btn btn-success btn-sm" id="{{$document->id}}">Скачать</button></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-8" style="margin: 0%; padding: 0%">
            <div class="col-12">
                <div class="card" style="height: 42.5vh">
                    <div class="card-header">
                        <b class="card-title"><i class="fa-solid fa-list-check"></i> Список задач</b>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="overflow-y: scroll; height: 37vh; padding-top: 0">
                        <table class="table table-head-fixed">
                            <thead style="position: sticky; top: -3vh; background-color: #ffffff; height: 7vh">
                                <th>Название задачи</th>
                                <th>Дата создания</th>
                                <th>Срок, часов</th>
                                <th>Приоритет</th>
                                <th>Исполнитель</th>
                                <th>Статус</th>
                            </thead>
                            <tbody>
                            @if($project->tasks->isNotEmpty())
                                @foreach($project->tasks as $task)
                                    <tr>
                                        <td><a href="{{'/tasks/' . $task->id}}">{{$task->title}}</a></td>
                                        <td>{{$task->created_at}}</td>
                                        <td>{{$task->hours}}</td>
                                        <td>{{$task->priority->title}}</td>
                                        <td>{{$task->employee->first_name .' '. $task->employee->name .' '. $task->employee->last_name}}</td>
                                        <td>{{$task->status->title}}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6"><b class="display-3">Для данного проекта нет задач</b></td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>




        <div class="card direct-chat direct-chat-success col-4">
            <div class="card-header">
                <b class="card-title"><i class="fa-solid fa-comments"></i> Чат</b>
                <div class="card-tools">
                    <span title="3 New Messages" class="badge badge-danger"></span>
                </div>
            </div>
            <div class="card-body">
                <div class="direct-chat-messages">
                    @foreach($chat as $message)
                        {{$message}}
                    @endforeach
                </div>
            </div>

            <div class="card-footer">
                <form action="#" method="post">
                    <div class="input-group">
                        <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                        <span class="input-group-append">
                            <button type="button" class="btn btn-warning">Send</button>
                            </span>
                    </div>
                </form>
            </div>

        </div>






{{--        <div class="col-4 row" style="margin: 0%; padding: 0%">--}}
{{--            <div class="col-12 row" style="margin-left: 0.1%;">--}}
{{--                <div class="card float-right" style="width: 45vw; min-width: 28vw; height: 42.5vh">--}}
{{--                    <div class="card-header">--}}
{{--                        <b class="card-title"><i class="fa-solid fa-comments"></i> Чат</b>--}}
{{--                    </div>--}}
{{--                    <div class="direct-chat-messages" style="height: 30.2vh; overflow-y: scroll;">--}}
{{--                        @foreach($chat as $message)--}}
{{--                            {{$message}}--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                    <div class="card-footer">--}}
{{--                        <form action="#" method="post">--}}
{{--                            <div class="input-group">--}}
{{--                                <input type="text" name="message" placeholder="Напишите сообщение ..." class="form-control">--}}
{{--                                <span class="input-group-append">--}}
{{--                                        <button type="button" class="btn btn-warning"><i--}}
{{--                                                class="fa-solid fa-paper-plane"></i></button>--}}
{{--                                    </span>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="modal fade bd-example-modal-lg" id="editProject" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                @include('crm.project.create')
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" id="calendarModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                @include('crm.project.calendar')
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" id="deletionСonfirmationModal" tabindex="-3" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Подтверждение действия</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3>Вы действительно хотите удалить "<a id="deleted_project"></a>"?</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="deleted" data-dismiss="modal">Да</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Нет</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        $('document').ready(function () {
            $('#edit').click(function (){
                $('#editProject').modal('show');
                $('#project_edit').html('Редактировать проект');
            });
            $('#calendarGraph').click(function (){
                $('#calendarModal').modal('show');
            });

            $('#delete_project').click(function (){
                $('#deletionСonfirmationModal').modal('show');
                $('#deleted_project').text($('#project_name').text());
            });
            $('#deleted').click(function (){
                window.location.replace("{{'/projects'}}");
            });

            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'ru',
                firstDay: '1',
                height: 650,
            });
            calendar.render();

            const ctx = $('#projectChartPie');

            var chart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Red', 'Blue', 'Green'],
                    datasets: [{
                        label: 'Задачи',
                        data: [2, 9, 15],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            chart.render();
        });


    </script>
@stop
