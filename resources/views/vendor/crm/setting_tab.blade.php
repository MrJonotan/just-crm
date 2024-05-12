<div class="col-lg-12 row" id="setting_table">
    @permission('create-system-setting|update-system-setting')
        <div class="col-lg-7">
    @else
        <div class="col-lg-12">
    @endpermission
        <div class="col-lg-12 card m-2" style="overflow-y: scroll; max-height: 71.5vh;">
            <table class="table table-head-fixed">
                <thead>
                <tr>
                    @foreach($columns as $column)
                        @if($column != 'default')
                            <th>{{ __('adminlte::menu.' . $column) }}</th>
                        @endif
                    @endforeach
                    <th>{{ __('adminlte::menu.empty') }}</th>
                </tr>
                </thead>
                <body>
                @foreach($table as $row)
                    <tr id="row_{{$row['id']}}">
                        @foreach($row as $key => $value)
                            @if($key != 'default')
                                @if($key != 'color')
                                    <td id="cell_{{$key}}">{{$value}}</td>
                                @else
                                    <td id="cell_{{$key}}"><span class="badge badge-{{$value}} p-1">{{$value}}</span></td>
                                @endif
                            @endif
                        @endforeach
                        <td id="actions">
                            <div class="float-right">
                                @if(!isset($row['default']))
                                    @permission('update-system-setting')
                                    <button class="btn btn-tool edit" id="{{$row['id']}}"><i class="fa-solid fa-pen-to-square"></i></button>
                                    @endpermission
                                    @permission('delete-system-setting')
                                        <button class="btn btn-tool delete" id="{{$row['id']}}"><i class="fa-solid fa-trash"></i></button>
                                    @endpermission
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
                </body>
            </table>
        </div>
    </div>
    @permission('create-system-setting|update-system-setting')
    <div class="col-lg-5">
        <div class="col-lg-12 m-2 card">
            <div class="card-header">
                <p class="h3">{{__('adminlte::menu.add')}} / {{mb_strtolower(__('adminlte::menu.edit'))}} {{__('adminlte::menu.record')}}</p>
            </div>
            <div class="card-body">
                <div class="justify-content-center row add_element" id="add_elements">
                    @foreach($columns as $column)
                        <div class="col-{{__('adminlte::size.' . $column)}}">
                            @if($column == "color")
                                <span class="direct-chat-timestamp">{{ __('adminlte::menu.' . $column) }}</span>
                                <select class="form-control {{$column}}" id="{{$column}}" type="{{ __('adminlte::type.' . $column) }}" {{ __('adminlte::attribute.' . $column) }} >
                                    <option value="primary" class="text-primary">primary</option>
                                    <option value="secondary" class="text-secondary">secondary</option>
                                    <option value="success" class="text-success">success</option>
                                    <option value="danger" class="text-danger">danger</option>
                                    <option value="warning" class="text-warning">warning</option>
                                    <option value="info" class="text-info">info</option>
                                    <option value="light" class="text-light">light</option>
                                    <option value="dark" class="text-dark">dark</option>
                                </select>
                            @elseif($column != "id" && $column != 'default')
                                <span class="direct-chat-timestamp">{{ __('adminlte::menu.' . $column) }}</span>
                                <input class="form-control {{$column}}" id="{{$column}}" type="{{ __('adminlte::type.' . $column) }}">
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card-footer">
                @permission('create-system-setting')
                    <button class="btn btn-success float-right m-1 add" id="add">{{__('adminlte::menu.add')}}</button>
                @endpermission
                @permission('update-system-setting')
                    <button class="btn btn-warning float-right m-1 update" hidden="hidden">{{__('adminlte::menu.update')}}</button>
                    <button class="btn btn-danger float-right m-1 cancel" hidden="hidden">{{__('adminlte::menu.cancel')}}</button>
                @endpermission
            </div>
        </div>
    </div>
    @endpermission

