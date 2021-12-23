@extends('layouts.admin')

@section('title', 'Soutěže')
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Soutěže</h1>
        <a href="{{ route('admin.competitions.create') }}" class="btn btn-outline-success">
            <i class="bi bi-plus-lg"></i>
        </a>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Název</th>
                <th>Od, do</th>
                <th>Projekty</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($competitions as $competition)
                <tr>
                    <td>{{ $competition->name }}</td>
                    <td>
                        {{ $competition->from->format('d.m.Y') }}<br>
                        {{ $competition->to->format('d.m.Y') }}
                    </td>
                    <td>{{ $competition->projects->count() }}</td>
                    <td class="text-end text-nowrap">
                        <a href="{{ route('admin.competitions.show', $competition) }}" class="btn btn-outline-primary">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('admin.competitions.edit', $competition) }}" class="btn btn-outline-warning">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="{{ route('admin.competitions.destroy', $competition) }}" class="btn btn-outline-danger" onclick="return confirm('Opravdu chceš odstranit soutěž {{ $competition->name }}?')">
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
