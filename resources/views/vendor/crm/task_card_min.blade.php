@foreach($tasks as $task)

    <div class="card element status-{{$task->status_id}}">
        <div class="card-body row p-2">
            <div class="col-12">
                <small class="badge badge-{{$task->priority->color}} float-left" >{{$task->priority->title}}</small>
                <small class="direct-chat-timestamp float-right">{{$task->manager->first_name.' '.$task->manager->name.' '.$task->manager->last_name }}</small>
                <br>
                <p><a href="tasks/{{$task->id}}">{{$task->title}}</p>
            </div>
        </div>
        <div class="card-footer">
            <span class="direct-chat-timestamp float-left">{{$task->created_at}}</span>
            <span class="direct-chat-timestamp float-right">{{$task->hours}}</span>
        </div>
    </div>
@endforeach
