<div class="justify-content-center" id="not_found">
        <img src="/vendor/adminlte/dist/img/not_found.png" style="width: 100%">
        @if($message !== null)
            <p class="display-3 offset-2">{{ $message }}</p>
        @else
            <p class="display-3 offset-3">Неизвестная ошибка</p>
        @endif
</div>

