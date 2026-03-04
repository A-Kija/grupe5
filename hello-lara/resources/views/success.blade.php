@if (session()->has('success_zinute'))
    <div class="alert alert-success">
        {{ session('success_zinute') }}
    </div>
@endif