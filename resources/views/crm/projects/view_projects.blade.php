@extends('adminlte::page')
@section('title', 'Проекты')
@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                @permission('create-project')
                    <ol class="breadcrumb float-right">
                        <li><a href="/projects/create" type="button" id="create" class="btn btn-tool" ><i class="fa-solid fa-plus" title="Добавить проект"></i></a></li>
                    </ol>
                @endpermission
                <ol class="breadcrumb m-1">
                    <li class="breadcrumb-item active">Проекты</li>
                </ol>
            </nav>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header ui-sortable-handle" style="cursor: move;">
                    <h3 class="card-title"><i class="fa-solid fa-filter"></i> Фильтры</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body" id="filters" style="padding-top: 1vh; display: block;">
                    <div class="col-12 row">
                        <div class="col-3" >
                            <small class="direct-chat-timestamp">Название</small>
                            <input class="form-control" name="title" id="title" aria-describedby="basic-addon3" type="text">
                        </div>
                        <div class="col-3">
                            <small class="direct-chat-timestamp">Менеджер</small>
                            <select class="form-control" name="manager_id" id="manager_id">
                                @foreach($managers as $manager)
                                    <option value="{{$manager->id}}">{{$manager->first_name .' '. $manager->name .' '. $manager->last_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-2">
                            <small class="direct-chat-timestamp">Приотритет</small>
                            <select class="form-control" name="priority_id" id="manager_id">
                                @foreach($priorities as $priority)
                                    <option value="{{$priority->id}}">{{$priority->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-2">
                            <small class="direct-chat-timestamp">Статус</small>
                            <select class="form-control" name="status_id" id="manager_id">
                                @foreach($statuses as $status)
                                    <option value="{{$status->id}}">{{$status->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        @csrf
                        <div class="col-2">
                            <br/>
                            <button class="btn btn-danger float-right" id="reset">{{__('adminlte::menu.reset')}} {{mb_strtolower(__('adminlte::menu.filters'))}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <b class="card-title"><i class="fa-solid fa-list-alt"></i> Список проектов</b>
                </div>
                <div class="card-body" style="overflow-y: scroll; height: 58.5vh;">
                    <div class="col-12" id="projects_list">
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade bd-example-modal-lg" id="createProject" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
{{--            @include('crm.project.create')--}}
        </div>
    </div>
@stop
@section('js')
    <script>
        $('document').ready(function () {
            projectsFilter();
        });

        $('#filters').find('select').change(function (){
            projectsFilter();
        });

        $('#title').keyup(function (e){
            if(e.which == 13){
                projectsFilter();
            }
        });

        function getDivData() {
            data = {};
            $(this).find('input, select').each(function(){
                data[$(this).attr('name')] = $(this).val();
            })
            return data;
        };
        jQuery.prototype.getDivData = getDivData;

        function projectsFilter(){
            $('#projects_list').empty();
            $.ajax({
                url: '/projects_search',
                type: 'POST',
                data:  $('#filters').getDivData(),
                success: function (data) {
                    $('#projects_list').append(data);
                },
            });
        }
        // function employeesFilter(){
        //     $('#employess_list').empty();
        //     $.ajax({
        //         url: '/employee_search',
        //         type: 'POST',
        //         data:  $('#filters').getDivData(),
        //         success: function (data) {
        //             $('#employess_list').append(data);
        //         },
        //     });
        // }

        $('#reset').click(function() {
            $('#filter').find('input, select').each(function() {
                $(this).val("");
            });
        });
    </script>
@stop
