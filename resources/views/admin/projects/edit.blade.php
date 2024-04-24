@extends('layouts.app')

@section('content')
    <div class="container py-5">

        <h1>Modifica il post</h1>

        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name">Titolo</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                    placeholder="Titolo" aria-describedby="nameHelper" value="{{ old('name') ?? $project->name }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <small id="titleHelper" class="text-muted">Titolo del post, massimo 255 caratteri</small>
            </div>

            <div class="mb-4">
                <label for="description">Contenuto</label>
                <textarea class="form-control  @error('description') is-invalid @enderror" name="description" id="description"
                    rows="4">{{ old('description') ?? $project->description }}</textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="code">Linguaggio</label>
                <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror"
                    placeholder="Titolo" aria-describedby="codeHelper" value="{{ old('code') ?? $project->code }}">
                @error('code')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <small id="titleHelper" class="text-muted">Titolo del post, massimo 255 caratteri</small>
            </div>

            <div class="mb-4">
                <label for="link">Link</label>
                <input type="text" name="link" id="link" class="form-control @error('link') is-invalid @enderror"
                    placeholder="Titolo" aria-describedby="linkHelper" value="{{ old('link') ?? $project->link }}">
                @error('link')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <small id="titleHelper" class="text-muted">Titolo del post, massimo 255 caratteri</small>
            </div>

            <div class="mb-4">

                <label class="mb-2" for="type_id">Categoria</label>

                <select class="form-select" name="type_id" id="type_id">

                    <option value=""></option>

                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ $type->id == old('type_id') ? 'selected' : '' }}>
                            {{ $type->type }}</option>
                    @endforeach

                </select>

            </div>

            <div class="mb-4">
                <img src="{{ asset('storage/' . $project->cover_image) }}" alt="Copertina immagine">
                <label for="cover_image">Immagine di copertina</label>
                <input type="file" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image">
                @error('cover_image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>



            <button class="btn btn-primary">Aggiungi</button>

        </form>

    </div>
@endsection
