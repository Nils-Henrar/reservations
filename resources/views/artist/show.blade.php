@extends('layouts.app')

@section('title', 'Fiche d\'un artiste')

@section('content')
<h1>{{ $artist->firstname }} {{ $artist->lastname }}</h1>

<div><a href="{{ route('artist.edit' , $artist->id) }}"> Modifier </a></div>

<!-- Supprimer un artiste -->
<form action="{{ route('artist.delete', $artist->id) }}" method="post">
    @csrf
    @method('DELETE')
    <button>Supprimer</button>
</form>

<nav><a href="{{ route('artist.index') }}">Retour à la liste des artistes</a></nav>
@endsection