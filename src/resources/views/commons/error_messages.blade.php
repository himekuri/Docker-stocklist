@if (count($errors) > 0)
    <ul class="bl_alert">
        @foreach ($errors->all() as $error)
            <li class="hp_ml">{{ $error }}</li>
        @endforeach
    </ul>
@endif