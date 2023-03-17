@extends('layouts.main')

@section('title', 'Fiche d\'un spectacle')

@section('content')
    <h1>{{ $show->title }}</h1>

    <div><a href="{{ route('show.edit' ,$show->id) }}">Modifier</a></div>

    <form method="post" action="{{ route('show.delete', $show->id) }}">
		@csrf
		@method('DELETE')
		<button>Supprimer</button>
    </form>

    <nav><a href="{{ route('show.index') }}">Retour à l'index</a></nav>
@endsection
