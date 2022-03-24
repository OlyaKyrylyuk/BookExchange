@extends('templates.main')
@section('content')

    <div class="container" style ="padding-bottom: 35px;">
            <h2>Notifications</h2>
            <ul class="responsive-table">
{{--                {{$request_book}}--}}
                <li class="table-header">
                    <div class="col col-4">Book Name</div>
                    <div class="col col-5">User Name</div>
                    <div class="col col-3">Request Sent</div>
                    <div class="col col-1"></div>
                    <div class="col col-2"></div>
                </li>
                @foreach($request_book as $key => $row)
                    <li class="table-row">
                        <div class="col col-4">{{ $row['name'] }}</div>
                        <div class="col col-5">{{$user_from[$key]->username}}</div>
                        <div class="col col-3">{{$exchanges[$key]->created_at->format('j F, Y h:i:s A')}}</div>
                        <div class="col col-2">
                            <form method="GET" action="{{url('/exchanges/' . $exchanges[$key]->id . '/choose_exchange_book')}}">
                            <button class="btn-info" style="border-radius:10px">Look books</button>
                            </form>
                        </div>
                        <div class="col col-1">
                            <form method="POST" action="{{url('/exchange/' . $exchanges[$key]->id . '/delete')}}">
                            @csrf
                                <button class="btn-danger" style="border-radius:10px">Decline</button>
                            </form>
                        </div>

                    </li>
                @endforeach
{{--                @foreach(array_merge($exchanges, $user_from, $request_book) as $item)--}}
{{--                    <li class="table-header">--}}
{{--                        <div class="col col-1">{{$request_book->name}}</div>--}}
{{--                        <div class="col col-2">{{$user_from->name}}</div>--}}
{{--                    </li>--}}
{{--                @endforeach--}}

            </ul>
    </div>
@endsection
