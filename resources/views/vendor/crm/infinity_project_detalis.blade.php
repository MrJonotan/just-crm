<div class="card">
    <div class="card-header">
        <h3 class="card-title">Детали</h3>
    </div>
    <div class="card-body row">
        <div class="col-12">
            <div class="col-12">
                <span class="direct-chat-timestamp">Название</span>
                <input class="form-control" id="title" name="title" @isset($project) value="{{$project->title}}" @endisset>
            </div>
        </div>
        <div class="col-7">
            <div class="col-12">
                <span class="direct-chat-timestamp">Менеджер</span>
                <select class="form-control" id="manager" name="manager_id">
                    @foreach($managers as $manager)
                        @if(isset($project) && $project->manager_id == $manager->id)
                            <option selected value="{{$manager->id}}">{{$manager->first_name." ".$manager->name." ".$manager->last_name. " (" . $manager->position->title.")"}}</option>
                        @else
                            <option value="{{$manager->id}}">{{$manager->first_name." ".$manager->name." ".$manager->last_name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
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
        <div class="col-2">
            <div class="col-12">
                <span class="direct-chat-timestamp">Цвет</span>
                <input class="form-control" type="color" id="color"  style="padding: 0; border: hidden" @isset($project) value="{{$project->color}}" @else value="#00fbfa" @endisset>
            </div>
        </div>
    </div>
</div>
