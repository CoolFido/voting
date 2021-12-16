@extends('layouts.app')

@section('content')

   <div class="min-vh-100 container">
        <div class="row d-flex justify-content-center">
            @foreach([1, 2, 3, 4, 5] as $o)
                <project></project>
            @endforeach
        </div>
   </div>

@endsection
