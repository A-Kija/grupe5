@if (session()->has('info_zinute'))
    <div class="alert alert-info">
        {{ session('info_zinute') }}
    </div>
@endif