

@if (Auth::check() && Auth::user()->avatar)
    <img src="{{ asset(Auth::user()->avatar) }}" alt="Avatar">
@else

    <img src="{{ asset('path/to/default/avatar.jpg') }}" alt="Default Avatar">
@endif
