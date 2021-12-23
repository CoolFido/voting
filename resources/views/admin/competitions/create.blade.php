@extends('layouts.admin')

@section('title', 'Nová soutěž')
@section('content')
    <h1>Nová soutěž</h1>
    <form action="{{ route('admin.competitions.store') }}" method="POST">
    @csrf
        <div class="form-group mb-2">
            <label for="name">Název</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="name" value="{{ old('name') }}" required>

            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-2">
            <label for="from">Od</label>
            <input type="date" class="form-control {{ $errors->has('from') ? 'is-invalid' : '' }}" name="from" id="from" value="{{ old('from') }}" required>

            @error('from')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-2">
            <label for="to">Do</label>
            <input type="date" class="form-control {{ $errors->has('to') ? 'is-invalid' : '' }}" name="to" id="to" value="{{ old('to') }}" required>

            @error('to')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-2">
            <button type="submit" class="btn btn-outline-primary">
                Vytvořit <i class="bi bi-check-lg"></i>
            </button>
        </div>
    </form>
@endsection
