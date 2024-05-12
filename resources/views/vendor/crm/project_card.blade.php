@foreach($projects as $project)
<a href="projects/{{$project->id}}">
    <div class="info-box" id="outline-{{$project->id}}">
        <div class="info-box-content">
            <div class="row">
                <div class="col-2">
                    <small class="direct-chat-timestamp">{{__('adminlte::menu.title')}}</small>
                    <p>{{$project->title}}</p>
                </div>
                <div class="col-2">
                    <small class="direct-chat-timestamp">Менеджер</small>
                    <p>{{$project->manager->first_name .' '. $project->manager->name .' '. $project->manager->last_name}}</p>
                </div>
                <div class="col-2">
                    <div class="col-12">
                        <small class="direct-chat-timestamp" style="padding-left: 17%">Плановые сроки</small>
                    </div>
                    <div class="col-12 row">
                        <div class="col-6">
                            <small class="direct-chat-timestamp">Начало</small>
                            @if($project->start_date_plan !== '-')
                                <p>{{Carbon\Carbon::parse($project->start_date_plan)->format('d.m.Y')}}</p>
                            @else
                                <p>{{$project->start_date_plan}}</p>
                            @endif
                        </div>
                        <div class="col-6">
                            <small class="direct-chat-timestamp">Окончание</small>
                            @if($project->end_date_plan !== '-')
                                <p>{{Carbon\Carbon::parse($project->end_date_plan)->format('d.m.Y')}}</p>
                            @else
                                <p>{{$project->end_date_plan}}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="col-12">
                        <small class="direct-chat-timestamp text-center" style="padding-left: 16%">Фактические сроки</small>
                    </div>
                    <div class="col-12 row">
                        <div class="col-6">
                            <small class="direct-chat-timestamp">Начало</small>
                            @if($project->start_date_fact !== '-')
                                <p>{{Carbon\Carbon::parse($project->start_date_fact)->format('d.m.Y')}}</p>
                            @else
                                <p>{{$project->start_date_fact}}</p>
                            @endif
                        </div>
                        <div class="col-6">
                            <small class="direct-chat-timestamp">Окончание</small>
                            @if($project->end_date_fact !== '-')
                                <p>{{Carbon\Carbon::parse($project->end_date_fact)->format('d.m.Y')}}</p>
                            @else
                                <p>{{$project->end_date_fact}}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <small class="direct-chat-timestamp">{{__('adminlte::menu.client')}}</small>
                    <p>{{$project->client->first_name .' '. $project->client->name .' '. $project->client->last_name}}</p>
                </div>
                <div class="col-2 row">
                    <div class="col-6 float-left">
                        <small class="direct-chat-timestamp">Приоритет</small>
                        <p><span class="badge badge-{{$project->priority->color}}" title="Приоритет">{{$project->priority->title}}</span></p>
                    </div>
                    <div class="col-6 float-right">
                        <small class="direct-chat-timestamp">Статус</small>
                        <p><span class="badge badge-{{$project->status->color}}" title="Статус">{{$project->status->title}}</span></p>
                    </div>
                </div>
            </div>
            <div class="progress">
                <div class="progress-bar bg-success" style="width: {{$project->readiness}}%"></div>
            </div>
        </div>
    </div>
</a>
    <style>
        #outline-{{$project->id}} {
            border-top: 3px solid {{$project->color}};
            color: #000000;
            /*border-bottom: 3px solid #28a745;*/
        }
    </style>
@endforeach
