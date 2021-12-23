@extends('layouts.admin')

@section('title', 'Projekty soutěže')
@section('content')
    <h1>Projekty soutěže "{{ $competition->name }}"</h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Název</th>
                <th>Autor</th>
                <th>Počet hlasů</th>
                <th>Skóre</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td title="{{ $project->description }}">{{ $project->name }}</td>
                    <td>
                        <img
                            src="https://cdn.discordapp.com/avatars/{{ $project->user->discord_id }}/{{ $project->user->avatar_hash }}.png" alt="Avatar uživatele {{ $project->user->name }}"
                            width="32" height="32" class="rounded me-2"
                        >
                        {{ $project->user->name }}
                    </td>
                    <td>{{ $project->evaluations->count() }}</td>
                    <td>{{ $project->total }}</td>
                    <td class="text-end text-nowrap">
                        <a href="{{ $project->code_url }}" class="btn btn-outline-primary">
                            <i class="bi bi-archive"></i>
                        </a>
                        @if($project->production_url)
                            <a href="{{ $project->production_url }}" class="btn btn-outline-primary">
                                <i class="bi bi-link"></i>
                            </a>
                        @endif
                        <a href="{{ route('admin.projects.destroy', $project) }}" class="btn btn-outline-danger" onclick="return confirm('Opravdu chceš odstranit projekt {{ $project->name }}?')">
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
