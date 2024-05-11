@foreach($clients as $client)
    <div class="col-4">
        <div class="card bg-light d-flex flex-fill">
            <div class="card-header text-muted border-bottom-0">
                <a href="clients/{{$client->id}}">
                    <h2 class="card-title">{{$client->first_name . ' ' . $client->name . ' ' . $client->last_name}}</h2>
                </a>
            </div>
            <div class="card-body row " style="height: 220px">
                <div class="col-3 photo float-left">
                    <a href="clients/{{$client->id}}">
                        <img class="img-fluid" src="{{$client->photo}}" alt="{{$client->first_name . ' ' . $client->name . ' ' . $client->last_name}}" style="width: 120px; border-radius: 15px;">
                    </a>
                </div>
                <div class="col-9 p-1 ">
                    @if($client->projects->last() && $client->projects->last()->status_id !== 1)
                        <h1 class="lead"><b>{{$client->projects->last()->title}}</b></h1>
                    @else
                        <h1 class="lead"><b>Нет активных проектов</b></h1>
                    @endif
                    @isset($client->status->title)

                        <h5 class="text-muted text-lg"><b>{{$client->status->title}}</b></h5>
                    @endisset
                    <ul class="ml-4 mb-0 fa-ul text-muted ">
                        <li><span class="fa-li float-right"><i class="fas fa-lg fa-building"></i></span> {{$client->organization}}</li>
                        <li>
                            <span class="fa-li "><i class="fas fa-lg fa-phone"></i></span> {{$client->phone}} /
                            <span><i class="fa-solid fa-at"></i></span><a href="mailto:{{$client->email}}"> {{$client->email}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endforeach

