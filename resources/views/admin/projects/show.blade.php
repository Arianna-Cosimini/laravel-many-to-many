{{-- @extends('layouts.app')

@section('content')
    <div class="container py-5">

        <img src="{{ $project->thumb }}" alt="">
        <h1>{{ $project->name }}</h1>


        <p>
            {{ $project->description }}
        </p>

        <img src="{{ $project->src }}" alt="">

        <div class="py-5">
            <a href="{{ route('projects.edit', $project->id) }}"class="btn btn-danger">Modifica</a>

            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Elimina
            </button>

        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina il progetto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    Sei sicuro che vuoi eliminare il progetto? "{{ $project->name }}"
                </div>


                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                       
                        <button class="btn btn-danger">Elimina</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection --}}

@extends('layouts.app')

@section('content')
    <div class="container py-5">

        <h1>{{ $project->name }}</h1>

        <div class="mb-4 text-center">
            <img src="{{ asset('storage/' . $project->cover_image) }}" alt="Copertina immagine">
        </div>


        <small>{{ $project->type?->type }}</small>

        <p>
            {{ $project->description }}
        </p>

        <p>
            {{ $project->code }}
        </p>

        <p>
            {{ $project->link }}
        </p>

        <hr>

        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning">Modifica</a>

        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
            Elimina
        </button>

        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteModalLabel">Elimina il Progetto</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        Sei sicuro di voler eliminare il progetto "{{ $project->name }}"?
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Elimina</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>


    </div>
@endsection
