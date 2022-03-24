@extends('templates.main')
@section('content')


    <!--image slider start-->
    <div class="slider">
        <div class="slides">
            <!--radio buttons start-->
            <input type="radio" name="radio-btn" id="radio1">
            <input type="radio" name="radio-btn" id="radio2">
            <input type="radio" name="radio-btn" id="radio3">
            <input type="radio" name="radio-btn" id="radio4">
            <!--radio buttons end-->
            <!--slide images start-->
            <div class="slide first">
                <img src="/images/464143.jpg" alt="">
            </div>
            <div class="slide">
                <img src="/images/hero_wesley-hilario-3ctv8GJ5K0U-unsplash-min-copy.jpg" alt="">
            </div>
            <div class="slide">
                <img src="/images/image.jpg" alt="">
            </div>
            <div class="slide">
                <img src="/images/photo.jpg" alt="">
            </div>
            <!--slide images end-->
            <!--automatic navigation start-->
            <div class="navigation-auto">
                <div class="auto-btn1"></div>
                <div class="auto-btn2"></div>
                <div class="auto-btn3"></div>
                <div class="auto-btn4"></div>
            </div>
            <!--automatic navigation end-->
        </div>
        <!--manual navigation start-->
        <div class="navigation-manual">
            <label for="radio1" style="display:none" class="manual-btn"></label>
            <label for="radio2"  class="manual-btn"></label>
            <label for="radio3" class="manual-btn"></label>
            <label for="radio4" class="manual-btn"></label>
        </div>
        <!--manual navigation end-->
    </div>
    <!--image slider end-->
    <div class="container" style ="padding-bottom: 35px;">
        <h1>Books</h1>

        <div class="booklist_style__parent" style="margin-bottom: 470px;">
            @foreach($books as $book)
                <div class="booklist_style">

                    <a href="/books/{{$book->slug}}" ><img class="image_size" src="/images/books/{{$book->photo}}"/></a>

                </div>
            @endforeach
        </div>
    </div>

    <script type="text/javascript">
        var counter = 1;
        setInterval(function(){
            document.getElementById('radio' + counter).checked = true;
            counter++;
            if(counter > 4){
                counter = 1;
            }
        }, 5000);
    </script>
@endsection
