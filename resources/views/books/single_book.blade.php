@extends('templates.main')
@section('content')
    <div class="single_book_content">
    <div class="single_book__first">
    <img  src="/images/books/{{$book->photo}}" class="image_show" />
     </div>
     <div class="single_book__second">
         <h1>{{$book->name}}</h1>
         <div class="single_book__text">
         <h6>wrote by </h6><h4>{{$book->author}}</h4>
         </div>
         <div class="single_book__text">
             <h6>genre </h6><h4>{{$book->genre->name}}</h4>
         </div>

    @if($book->user->email!=$current_user->email && $exchange==null)
             <form action="{{url('/books/' . $book->slug . '/exchange_request')}}">
                 <button class="choose_book" onClick="">Choose book for exchanging</button>
             </form>
    @elseif($book->user->email!=$current_user->email && $exchange!=null)
        <p style="color:green">You have already sent request. Wait for the answer.</p>
{{--        <form action="{{url('books/' . $book->name . '/exchange')}}" method="POST">--}}
{{--            <button>Exchange</button>--}}
{{--        </form>--}}

    @endif

    </div>
    </div>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    <script>

    @if($message = session('message'))

        swal("{{ $message }}");

        @endif


    </script>

@endsection
