@extends('adminlte::page')
@section('title', $client->first_name . ' '. $client->name . ' '. $client->last_name)
@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                @permission('update-client')
                <ol class="breadcrumb float-right">
                    <li><button type="button" class="btn btn-tool" id="addClient"><i class="fa-solid fa-pencil" title="Редактировать клиента"></i></button></li>
                </ol>
                @endpermission
                <ol class="breadcrumb m-1">
                    <li class="breadcrumb-item"><a href="/clients">Клиенты</a></li>
                    <li class="breadcrumb-item active">{{$client->first_name . ' '. $client->name . ' '. $client->last_name}}</li>
                </ol>
            </nav>
        </div>
        <div class="col-5">
            <div class="card" >
                <div class="card-header">
                    <b class="card-title"><i class="fa-solid fa-circle-info"></i> Информация о клиенте</b>
                </div>
                <div class="card-body row" style="height: 27vh;">
                    <div class="col-4">
                        <img src="{{$client->photo}}" alt="{{$client->first_name . ' '. $client->name . ' '. $client->last_name}}" style="width: 100%; border-radius: 15px">
                    </div>
                    <div class="col-6">
                        <label>Место работы: </label> <span>{{$client->organization}}</span><br>
                        <label>Номер телефона: </label> <span>{{$client->phone}}</span><br>
                        <label>Электронная почта: </label> <span>{{$client->email}}</span><br>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card" >
                <div class="card-header">
                    <b class="card-title"><i class="fa-solid fa-star"></i> Заказ</b>
                </div>
                <div class="card-body" style="height: 27vh;">
                    Разработать проект жилищного компекса на 7 зданий с удобным размещением на пересечении улиц Плеханова и Шоссе Энутзиастов в городе Москва.
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card" >
                <div class="card-header">
                    <b class="card-title"><i class="fa-solid fa-bars-progress"></i> Сведения о проекте</b>
                </div>
                <div class="card-body" style="height: 27vh;">
                    <div class="col-12 row">
                        <div class="col-9">
                            <h4><a href="/projects/{{$client->projects->last()->id}}">{{$client->projects->last()->title}}</a></h4>
                        </div>
                        <div class="col-3">
                            <span class="badge badge-{{$client->projects->last()->priority->color}}" title="Приоритет">{{$client->projects->last()->priority->title}}</span>
                            <span class="badge badge-{{$client->projects->last()->status->color}}" title="Статус">{{$client->projects->last()->status->title}}</span>
                        </div>
                        <div class="col-12">
                            <small class="direct-chat-timestamp">Готовность</small>
                            <div class="progress" style="width: 75%">
                                <div class="progress-bar bg-success" role="progressbar" style="color: #000000" aria-valuenow="{{$client->projects->last()->status->readiness}}" aria-valuemin="0" aria-valuemax="100" >{{$client->projects->last()->status->readiness}}%</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <small class="direct-chat-timestamp">Актуальная задача</small>
                            @isset($client->projects->last()->tasks->last()->title)
                                <span>{{$client->projects->last()->tasks->last()->title}}</span>
                            @else
                                <h3>Нет актуальных задач</h3>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <b class="card-title"><i class="fa-solid fa-clock-rotate-left"></i> История взаимодействия</b>
                </div>
                <div class="card-body" style="overflow-y: scroll; height: 38.9vh">
                    <div class="col-12 row justify-content-center">
                        <h1>Нет истории взаимодействия с клиентом</h1>
                    </div>
                </div>
                <div class="card-footer">
                    <form action="#" method="post">
                        <div class="input-group">
                            <input type="text" name="message" placeholder="" class="form-control">
                            <span class="input-group-append">
                                    <button type="button" class="btn btn-success"><i
                                            class="fa-solid fa-paper-plane"></i></button>
                                </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
