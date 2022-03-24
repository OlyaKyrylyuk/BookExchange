@extends('email.master')

@section('content')
    <h1>Congratulations, {{$user2->username}}</h1>
    <h3>You have created exchange with {{$user1->username}}</h3>
    <h3>You can connect with user in order to discuss further actions</h3>
    <h3>Email: {{$user1->email}}</h3>
    <h3>Your book: {{$book1->name}}</h3>
    <h3>{{$user1->username}} book: {{$book2->name}}</h3>
@endsection
