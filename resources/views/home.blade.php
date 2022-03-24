@extends('templates.main')
@section('content')
    <div class="container" style ="padding-bottom: 35px;">

    <h1>My Books</h1>
    <a href = "/books/create">Create new book</a>
        <div class="booklist_style__parent" style="margin-bottom: 470px;">
            @foreach($books as $book)
                <div class="booklist_style">

                    <a href="/books/{{$book->slug}}" ><img class="image_size" src="/images/books/{{$book->photo}}"/></a>

                </div>
            @endforeach
        </div>
    </div>


    </div>
@endsection


<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
<script>
    @if($message = session('message'))
    swal("{{ $message }}");

@endif
</script>
