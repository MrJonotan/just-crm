<div class="card">
    <div class="card-header">
        <h3 class="card-title">Детали</h3>
    </div>
    <div class="card-body row">
        <div class="col-8">
            <div class="col-12">
                <span class="direct-chat-timestamp">Название</span>
                <input class="form-control" id="title" name="title" @isset($project) value="{{$project->title}}" @endisset>
            </div>
        </div>
        <div class="col-4">
            <div class="col-12">
                <span class="direct-chat-timestamp">Статус</span>
                <select class="form-control" id="status" name="status_id">
                    @foreach($statuses as $status)
                        @if(isset($project) && $project->status_id == $status->id)
                            <option value="{{$status->id}}" selected>{{$status->title}}</option>
                        @else
                            <option value="{{$status->id}}">{{$status->title}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-4">
            <div class="col-12">
                <span class="direct-chat-timestamp">Приоритет</span>
                <select class="form-control" id="proritet" name="priority_id">
                    @foreach($priorities as $priority)
                        @if(isset($project) && $project->priority_id == $priority->id)
                            <option value="{{$priority->id}}" selected>{{$priority->title}}</option>
                        @else
                            <option value="{{$priority->id}}">{{$priority->title}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="col-12">
                <span class="direct-chat-timestamp">Начало</span>
                <input class="form-control" type="date" id="start_date_plan" name="start_date_plan" @isset($project)
                value="{{\Carbon\Carbon::parse($project->start_date_plan)->format('Y-m-d')}}" @endisset>
            </div>
        </div>
        <div class="col-2">
            <div class="col-12">
                <span class="direct-chat-timestamp">Часы</span>
                <input class="form-control" type="number" id="hours" name="hours" @isset($project) value="{{$project->hours}}" @endisset>
            </div>
        </div>
        <div class="col-3">
            <div class="col-12">
                <span class="direct-chat-timestamp">Окончание</span>
                <input class="form-control" type="date" id="end_date_plan" name="end_date_plan" @isset($project)
                value="{{\Carbon\Carbon::parse($project->end_date_plan)->format('Y-m-d')}}" @endisset>
            </div>
        </div>
        @isset($project)
            <div class="col-7">
                <div class="col-12">
                    <span class="direct-chat-timestamp">Менеджер</span>
                    <select class="form-control" id="manager" name="manager_id">
                        @foreach($managers as $manager)
                            <option
                                @if(isset($project) && $project->manager_id == $manager->id)
                                    selected
                                @endif
                                value="{{$manager->id}}">{{$manager->first_name." ".$manager->name." ".$manager->last_name. " (" . $manager->position->title.")"}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        @else
            <select class="form-control" id="manager" name="manager_id" hidden="hidden">
                <option selected value="{{Auth::user()->id}}"></option>
            </select>
        @endisset
        @isset($clients)
            <div class="col-5">
                <div class="col-12">
                    <span class="direct-chat-timestamp">Клиент</span>
                    <select class="form-control" id="client" name="client_id">
                        @foreach($clients as $client)
                            <option value="{{$client->id}}">{{$client->organization}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        @endisset
        <div class="col-5">
            <div class="col-12">
                <span class="direct-chat-timestamp">Бюджет (план)</span>
                <input class="form-control" id="budget_plan" name="budget_plan" @isset($project) value="{{$project->budget_plan}}" @endisset>
            </div>
        </div>
        <div class="col-5">
            <div class="col-12">
                <span class="direct-chat-timestamp">Бюджет (факт)</span>
                <input class="form-control" id="budget_fact" name="budget_fact" @isset($project) value="{{$project->budget_fact}}" @endisset>
            </div>
        </div>
        <div class="col-2">
            <div class="col-12">
                <span class="direct-chat-timestamp">Цвет</span>
                <input class="form-control" type="color" id="color" name="color" style="padding: 0; border: hidden" @isset($project) value="{{$project->color}}" @else value="#00fbfa" @endisset>
            </div>
        </div>
    </div>
</div>
