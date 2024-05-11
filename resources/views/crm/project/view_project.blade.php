@extends('adminlte::page')
@section('title', $project->title)
@section('content')
    <div class="row">
        <input value="{{$project->id}}" id="project_id" hidden="hidden">
        <div class="col-12" id="header">
            @include('vendor.crm.project_header')
        </div>
        <div class="col-6 row" style="margin: 0%; padding: 0%">
            <div class="col-12 row">
                <div class="col-3">
                    <div class="card">
                        <div class="card-header" >
                            <b class="card-title"><i class="fa-regular fa-flag"></i> Начало</b>
                        </div>
                        <div class="p-2">
                            <b>План: </b><span class="float-right">{{$project->start_date_plan}}</span></br>
                            <b>Факт: </b><span class="float-right">{{$project->start_date_fact}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-header">
                            <b class="card-title"><i class="fa-solid fa-flag-checkered"></i> Окончание </b>
                        </div>
                        <div class="p-2">
                            <b>План: </b><span class="float-right">{{$project->end_date_plan}}</span></br>
                            <b>Факт: </b><span class="float-right">{{$project->end_date_fact}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-header">
                            <b class="card-title"><i class="fa-solid fa-money-bills"></i> Бюджет</b>
                        </div>
                        <div class="p-2">
                            <b>План: </b><span class="float-right">{{$project->budget_plan}} <i class="fa-solid fa-ruble-sign"></i></span></br>
                            <b>Факт: </b><span class="float-right">{{$project->budget_fact}}</span>
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
                        <div class="p-2 direct-chat-messages">
                            <ul class="list-group list-group-flush" style="min-height: 6.7vh; max-height: 12vh;">
                                @if($project->employees->isNotEmpty())
                                    @foreach($project->employees as $list)
                                        <li class="list-group-item">
                                            {{$list->employee->first_name .' '. $list->employee->name .' '. $list->employee->last_name}}
                                        </li>
                                    @endforeach
                                @else
                                    <li>Нет назначенных сотрудников</li>
                                @endif
                            </ul>
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
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">{{$project->manager->first_name .' '. $project->manager->name .' ' . $project->manager->last_name}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <b class="card-title"><i class="fa-solid fa-handshake-simple"></i> Часы</b>
                            </div>
                            <div class="p-2" style="min-height: 6.7vh; max-height: 12vh">
                                <b>План: </b><span class="float-right">{{$project->hours}}</span><br/>
                                <b>Факт: </b><span class="float-right">-</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <b class="card-title"><i class="fa-solid fa-handshake-simple"></i> Цвет</b>
                            </div>
                            <div class="card-body" style="min-height: 6.7vh; max-height: 12vh; background-color:{{$project->color}}">
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
                        <ul class="nav nav-tabs border-bottom-0" id="myTab" role="tablist">
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
                    <div class="card-body p-3" style="overflow-y: scroll">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                                <div class="row p-0">
                                    <div class="col-2"><b>Specific</b></div>
                                    <div class="col-10">@isset($project->specific){{$project->specific}}@endisset</div>

                                    <div class="col-2"><b>Measurable</b></div>
                                    <div class="col-10">@isset($project->measurable){{$project->measurable}}@endisset</div>

                                    <div class="col-2"><b>Achievable</b></div>
                                    <div class="col-10">@isset($project->achievable){{$project->achievable}}@endisset</div>

                                    <div class="col-2"><b>Relevant</b></div>
                                    <div class="col-10">@isset($project->relevant){{$project->relevant}}@endisset</div>

                                    <div class="col-2"><b>Time-bound</b></div>
                                    <div class="col-10">@isset($project->time_bound){{$project->time_bound}}@endisset</div>
                                </div>
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
                                <div class="col-12">
                                    @include('vendor.crm.document_table', ['documents' => $project->documents])
                                </div>
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
                        @if(Auth::user()->id === $project->manager_id)
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" id="createTask">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        @endif
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
                <div class="direct-chat-messages" id="chat-body">
                    @foreach($project->project_chat as $message)
                        @if($message->employee_id == Auth::user()->id)
                            @include('vendor.crm.project_message_my')
                        @else
                            @include('vendor.crm.project_message_other')
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="card-footer" id="chat">
                <input type="text" name="employee_id"  value="{{Auth::user()->id}}" hidden="hidden">
                <div class="input-group">
                    <input type="text" name="text" id="text" placeholder="Введите сообщение ..." class="form-control">
                    <span class="input-group-append">
                        <button type="button" class="btn btn-secondary" id="send">
                            <i class="fa-solid fa-paper-plane"></i>
                        </button>
                    </span>
                </div>
                @csrf
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" id="calendarModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                @include('crm.project.calendar')
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" id="taskModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                @include('crm.task.create')
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
            $('#edit').click(function () {
                $('#editProject').modal('show');
                $('#project_edit').html('Редактировать проект');
            });
            $('#calendarGraph').click(function () {
                $('#calendarModal').modal('show');
            });
            $('#createTask').click(function () {
                $('#action_title').html('Создать задачу');
                $('#taskModal').modal('show');
                $('#update').hidden();
            });
            $('.editStatus').click(function () {
                projectStatusUpdate($('#project_id').val(), $(this).attr('id'));
            })

            $('#delete_project').click(function () {
                $('#deletionСonfirmationModal').modal('show');
                $('#deleted_project').text($('#project_name').text());
            });
            $('#send').click(function (){
                addMessage($('#project_id').val())
            });

            $('#destroy').click(function () {
                if(confirm('Вы действительно хотите удалить проект?')){
                    projectDestroy($('#project_id').val());
                }
            });

            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'ru',
                firstDay: '1',
                height: 650,
            });
            calendar.render();

            jQuery.prototype.getDivData = function () {
                data = {};
                $(this).find('input, select').each(function(){
                    data[$(this).attr('name')] = $(this).val();
                })
                return data;
            };

            function projectStatusUpdate(id, status_id) {
                $.ajax({
                    type: 'PUT',
                    url: '/projects/'+ id +'/status_update/',
                    data: {
                        'status_id': status_id,
                        '_token': '{{ @csrf_token() }}'
                    },
                    success: function (response) {
                        $('#header').html("")
                        $('#header').html(response);
                        $('.editStatus').click(function () {
                            projectStatusUpdate($('#project_id').val(), $(this).attr('id'));
                        })
                    },
                    error: function (xhr, status, error) {
                        let errors = ($.parseJSON(xhr.responseText));
                        $.each(errors.errors, function () {
                            toastr.error($(this)[0]);
                        })
                    },
                });
            }
        });

        function addMessage(id) {
            $.ajax({
                type: 'PUT',
                url: '/projects/'+ id +'/message',
                data: $('#chat').getDivData(),
                success: function (response) {
                    $('#chat-body').append(response);
                    $('#text').val("");
                },
                error: function (xhr, status, error) {
                    toastr.error(xhr.responseJSON.error);
                },
            });
        }

        function projectDestroy(id){
            $.ajax({
                type: 'DELETE',
                url: '/projects/'+ id,
                data: {'_token': '{{ @csrf_token() }}'},
                success: function (response) {

                },
                error: function (xhr, status, error) {
                    let errors = ($.parseJSON(xhr.responseText));
                    $.each(errors.errors, function () {
                        toastr.error($(this)[0]);
                    })
                },
            });
        }

    </script>
@stop
