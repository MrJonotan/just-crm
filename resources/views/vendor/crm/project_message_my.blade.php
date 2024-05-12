<div class="direct-chat-msg right">
    <div class="direct-chat-infos clearfix">
        <span class="direct-chat-name float-right">{{$message->employee->first_name .' '. $message->employee->name}}</span>
        <span class="direct-chat-timestamp float-left">{{$message->created_at}}</span>
    </div>

    <img class="direct-chat-img" src="/{{$message->employee->photo}}" alt="message user image">

    <div class="direct-chat-text">
        {{$message->text}}
    </div>
</div>
