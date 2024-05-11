<table class="table">
    <thead>
    <tr>
        <th>Название документа</th><th>Проект/Задача/Клиент</th><th></th>
    </tr>
    </thead>
    <body>
        @if($documents->isNotEmpty())
            @foreach($documents as $document)
                <tr>
                    <td hidden="hidden">{{$document->id}}</td>
                    <td>{{$document->title}}</td>
                    <td>
                        @if($document->project_id !== null)
                            <a href="projects/{{$document->project->id}}">{{$document->project->title}}</a></td>
                        @elseif($document->task_id !== null)
                            <a href="tasks/{{$document->task->id}}">{{$document->task->title}}</a></td>
                        @else
                            <a href="clients/{{$document->client->id}}">{{$document->client->first_name.' '.$document->client->name.' '.$document->client->last_name}}</a></td>
                        @endif
                    <td>
                        <div class="card-tools float-right">
                            <button class="btn btn-tool download" title="Скачать"><i class="fa-solid fa-file-arrow-down"></i></button>
                            <button class="btn btn-tool delete" title="Удалить"><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="3"><h2>Нет документов</h2></td>
            </tr>
        @endif
    </body>
</table>
