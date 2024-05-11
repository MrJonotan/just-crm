<div class="direct-chat-msg right">
    <div class="direct-chat-infos clearfix">
        <span class="direct-chat-name float-right">@if(isset($sent_message)) {{$sent_message->user_name}}@endif</span>
        <span class="direct-chat-timestamp float-left">@if(isset($sent_message)) {{$sent_message->sent_datetime}}@endif</span>
    </div>
    <img class="direct-chat-img" @if(isset($sent_message)) src="{{$sent_message->sent_user_photo}}" @endif alt="message user image">
    <div class="direct-chat-text">
        @if(isset($sent_message)) {{$sent_message->message_text}}@endif
    </div>
</div>
