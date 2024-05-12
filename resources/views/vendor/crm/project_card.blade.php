@foreach($projects as $project)
    <a href="{{'projects/'. $project->id}}">
        <div class="col-12 row" style="color: #000000; border: 2px solid #eeeeefde; border-radius: 5px; margin-bottom: 0.5%">
            <div class="col-2 align-self-center">
                <small class="direct-chat-timestamp">Название</small>
                <p>{{$project->title}}</p>
            </div>
            <div class="col-2 align-self-center">
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
                        @if($project->begin_start_date_plan !== '-')
                            <p>{{Carbon\Carbon::parse($project->begin_start_date_plan)->format('d.m.Y')}}</p>
                        @else
                            <p>{{$project->begin_start_date_plan}}</p>
                        @endif
                    </div>
                    <div class="col-6">
                        <small class="direct-chat-timestamp">Окончание</small>
                        @if($project->begin_end_date_plan !== '-')
                            <p>{{Carbon\Carbon::parse($project->begin_end_date_plan)->format('d.m.Y')}}</p>
                        @else
                            <p>{{$project->begin_end_date_plan}}</p>
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
            <div class="col-1 align-self-center">
                <small class="direct-chat-timestamp">Приоритет</small>
                <p><span class="badge badge-{{$project->priority->color}}" title="Приоритет">{{$project->priority->title}}</span></p>
            </div>
            <div class="col-1 align-self-center">
                <small class="direct-chat-timestamp">Статус</small>
                <p><span class="badge badge-{{$project->status->color}}" title="Статус">{{$project->status->title}}</span></p>
            </div>
            <div class="col-2 align-self-center">
                <div class="col-12 row">
                    <div class="col-11">
                        <small class="direct-chat-timestamp">Готовность</small>
                        <div class="progress" style="width: 75%">
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{$project->readiness}}%; color: #000000" aria-valuenow="{{$project->readiness}}" aria-valuemin="0" aria-valuemax="100" >{{$project->readiness}}%</div>
                        </div>
                    </div>
                    @if(Auth::user()->id == $project->manager->id)
                        <div class="col-1">
                            <button class="btn btn-light btn-sm dropdown-toggle float-lg-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li class="dropdown-item edit" id="19" >Редактировать</li>
                                <li class="dropdown-item" href="#">Удалить</li>
                                {{--                <a class="dropdown-item" href="#">Something else here</a>--}}
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </a>
@endforeach
