@extends('layouts.app')

@section('content')

<div class="min-vh-100 d-flex justify-content-center align-items-center">
    @foreach(['success', 'danger'] as $type)
        @if(Session::has($type))
            <p class="alert bg-{{ $type }} text-light container">
                {!! Session::get($type) !!}
            </p>
        @endif
    @endforeach
    <div class="card rounded-0 p-5 bg-dark shadow-lg text-secondary mx-sm-0 mx-5">
        
        <h1>GalaxyCode voting system</h1>
        <a href="" class="text-decoration-none">
            <h3 class="text-primary ">Log in</h3>
        </a>

    </div>

</div> 

@endsection
