@foreach($clients as $client)

    <div class="col-4">
        <a href="{{"clients/$client->id"}}">
            <div class="card" style="color: #000000">
                <div class="card-header">
                    @include('.vendor.crm.update_delete_buttons', ['permission' => 'client', 'model' => $client])
{{--                    @permission('delete-client')--}}
{{--                        <button class=" badge btn-danger float-right p-1 m-1 delete" id="{{$client->id}}"><i class="fa-solid fa-trash"></i></button>--}}
{{--                    @endpermission--}}
{{--                    @permission('update-client')--}}
{{--                        <button class="badge btn-warning float-right p-1 m-1 update" id="{{$client->id}}"><i class="fa-solid fa-pen-to-square"></i></button>--}}
{{--                    @endpermission--}}
                    <h3 class="card-title">{{$client->first_name .' '. $client->name .' '. $client->last_name}}</h3>
                </div>
                <div class="card-body row" style="height: 185px">
                    @if(isset($client->photo))
                        <div class="col-3">
                            <img src="{{$client->photo}}" alt="{{$client->first_name .' '. $client->name .' '. $client->last_name}}" style="width: 5vw; border-radius: 15px">
                        </div>
                        <div class="col-9">
                    @else
                        <div class="col-12 row">
                    @endif
                            <p><b>Организация:</b> <span>{{$client->organization}}</span></p>
                            <p><b>Почта: </b><span>{{$client->email}}</span></p>
                            <p><b>Телефон: </b><span>{{$client->phone}}</span></p>
                    </div>
                </div>
            </div>
        </a>
    </div>

@endforeach

