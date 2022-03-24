@extends('templates.main')
@section('content')


    <div class="container" style ="padding-bottom: 35px;">
        <h1>Choose book for exchanging</h1>
        <div style="display:flex; flex-direction: row; justify-content: center; align-content: center; ">
            <div>
                <form method="get" action="/exchange_notifications">
                    <button type="submit">  RETURN BACK</button>
                </form>
            </div>
            <div style="margin-left:10px;">
                <form method="POST" action="{{url('/exchange/' . $exchange->id . '/delete')}}">
                    @csrf
                    <button type="submit" class="btn-danger">DECLINE REQUEST</button>
                </form>
            </div>
        </div>


        <div class="booklist_style__parent">
            @foreach($user_profile as $key => $book)
                <div class="booklist_style">

                    <form method="POST" action="{{url('/exchanges/' . $exchange->id . '/accept/'.$book->books->id)}}">
                    @csrf
                        <div>
                            <img class="image_size"  src="/images/books/{{$book->books->photo}}"/>

                        </div>
                        <div>

                                <button  class="button_choose_book_style" >Choose</button>


                        </div>

                    </form>

                </div>
            @endforeach
        </div>
    </div>

@endsection
