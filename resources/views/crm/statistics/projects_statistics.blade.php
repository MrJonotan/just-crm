@extends('adminlte::page')
@section('content')
    <div class="row col-12">

        <div class="card-header col-12 p-1">
            <div class="card-tools" style="padding-top: 15px">
                <button type="button" class="btn btn-tool float-right" id="create"><i class="fa-solid fa-plus" title="Добавить проект"></i></button>
            </div>
            <h3>Статистика по проектам</h3>
        </div>

        <div class="col-12" style="margin-top: 2vh;">
            <div class="card">
                <div class="card-header">
                    <b class="card-title"><i class="fa-solid fa-filter"></i> Фильтры</b>
                </div>
                <div class="card-body">
                    <div class="col-12 row justify-content-center">
                        <div class="col-5 row">
                            <div class="col-11" style="border: 2px solid #eeeeefde; border-radius: 5px; padding-bottom: 7px; margin-right: 3px">
                                <small class="direct-chat-timestamp">Название</small>
                                <select class="form-control" id="projects">
                                    <option>Приемная компания 2023</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="col-11" style="border: 2px solid #eeeeefde; border-radius: 5px; padding-bottom: 7px; margin-right: 3px">
                                <small class="direct-chat-timestamp">Начало периода</small>
                                <input class="form-control" type="date" id="start_period">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="col-11" style="border: 2px solid #eeeeefde; border-radius: 5px; padding-bottom: 7px; margin-right: 3px">
                                <small class="direct-chat-timestamp">Конец периода</small>
                                <input class="form-control" type="date" id="end_period">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-success btn-sm float-right">Применить</button>
                </div>
            </div>
    </div>
@stop
