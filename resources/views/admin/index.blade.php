@extends('layouts.app')

@section('content')
    <div class="container py-5">

        <h1>Pagina di amministrazione</h1>

        <h2>Benvenuto {{ $user->name }}</h2>
        {{-- @dump($user) --}}


        <a href="{{ route('admin.projects.index') }}" class="btn btn-info">Guarda i miei progetti!</a>

    </div>
@endsection
