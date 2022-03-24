@extends('templates.main')
@section('content')
    <h1>Profile</h1>
    <h1>{{ $profile->username }}</h1>
    @foreach($profile->books as $book)
    <h1>{{ $book->name }}</h1>
    <h1>{{ $book->author }}</h1>
    <h1>{{ $book->photo }}</h1>
    <h1>{{ $book->genre->name }}</h1>
    @endforeach
@endsection
