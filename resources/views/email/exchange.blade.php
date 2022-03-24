@extends('email.master')

@section('content')
    <h1>Congratulations, {{$user1->username}}</h1>
    <h3>You have created exchange with {{$user2->username}}</h3>
    <h3>You can connect with user in order to discuss further actions</h3>
    <h3>Email: {{$user2->email}}</h3>
    <h3>Your book: {{$book2->name}}</h3>
    <h3>{{$user2->username}} book: {{$book1->name}}</h3>
@endsection
