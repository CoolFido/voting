@extends('layouts.app')

@section('title', 'Probíhající soutěže')
@section('content')
    <home></home>

    @can('admin')
        <div class="text-center">
            <a href="/admin" class="btn btn-outline-primary rounded-0">Administrace</a>
        </div>
    @endcan
@endsection
