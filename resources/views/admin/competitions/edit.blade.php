@extends('layouts.admin')

@section('title', 'Upravit soutěž')
@section('content')
    <h1>Upravit soutěž</h1>
    <form action="{{ route('admin.competitions.update', $competition) }}" method="POST">
    @method('PUT')
    @csrf
        <div class="form-group mb-2">
            <label for="name">Název</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="name" value="{{ old('name', $competition->name) }}" required>

            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-2">
            <label for="from">Od</label>
            <input type="date" class="form-control {{ $errors->has('from') ? 'is-invalid' : '' }}" name="from" id="from" value="{{ old('from', $competition->from->format('Y-m-d')) }}" required>

            @error('from')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-2">
            <label for="to">Do</label>
            <input type="date" class="form-control {{ $errors->has('to') ? 'is-invalid' : '' }}" name="to" id="to" value="{{ old('to', $competition->to->format('Y-m-d')) }}" required>

            @error('to')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-2">
            <button type="submit" class="btn btn-outline-primary">
                Uložit změny <i class="bi bi-check-lg"></i>
            </button>
        </div>
    </form>
@endsection
