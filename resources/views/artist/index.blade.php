@extends('layouts.main')

@section('title', 'Liste des artistes')

@section('content')
<h1>Liste des artistes</h1>
<table>
    <thead>
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
        </tr>
    </thead>
    <tbody>
        @foreach($artists as $artist)
        <tr>
            <td>{{ $artist->firstname }}</td>
            <td>
                <a href="{{ route('artist.show', $artist->id) }}">{{ $artist->lastname }}</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('artist.create') }}">Ajouter un artiste</a>
@endsection