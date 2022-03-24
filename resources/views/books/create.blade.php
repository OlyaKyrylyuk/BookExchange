@extends('templates.main')
@section('content')
    <div class="container" style ="padding-bottom: 35px;">
    <h1>Create Book</h1>
    <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
{{--    <form  enctype="multipart/form-data" class="form">--}}
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Book name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Author</label>
            <input type="text" name="author" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter author">
        </div>
        <div class="form-group">
            <i class="fa fa-cloud"></i>
            <label for="picture_input">Photo</label>
            <div class="wrapper">
                <div class="file-upload">
                    <input type="file" class="upload" name="photo" id="picture_input" accept="image/png, image/jpeg, image/jpg"/>
                    <h1 id = "uploadfile_text" name="uploadfile_text">Choose photo</h1>
                    <input id="photo_path" type="hidden" name="photo_path" />
                    <div class="file-upload__image">

                    </div>

                </div>
            </div>
            </div>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Genre</label>
            <select  class="form-control" name="genres">
                @foreach($genres as $genre)
                    <option value= " {{ $genre->id }} "> {{$genre->name}} </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="form-control btn btn-primary">Submit</button>
        </div>
    </form>
    </div>
@endsection

@section('JS')
<script type="text/javascript" >

    $(document).ready(function(){

        $('input.upload').on('change', addFile);

        // document.querySelector('.form').addEventListener('submit',()=>{
        //
        //     let formData = new FormData(document.querySelector('.form'))
        //     // formData.set('photo', document.querySelector('.form .upload').files[0].name);
        //     let base_URL= document.querySelector('.file-upload__image img').src;
        //     console.log(document.querySelector('.form .upload').files[0])
        //     console.log(formData.get('photo'))
        //
        //     console.log(formData.get('_token'))
        //     $.ajax({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         type:'POST',
        //         url:'/books',
        //         processData: false,
        //         contentType: false,
        //         data : formData,
        //         success:function(data){
        //             console.log(data);
        //         }
        //     });
        // })
    });
    function addFile (event) {
        document.getElementById("uploadfile_text").style.display = 'none';
        var jqDisplay = $('div.file-upload__image');
        var reader = new FileReader();
        var selectedFile = event.target.files[0];

        reader.onload = function (event) {
            var imageSrc = event.target.result;
            document.getElementById("photo_path").value = imageSrc;
            jqDisplay.html('<img src="' + imageSrc + '"  alt="uploaded Image" class="uploaded_image">');

        };
        reader.readAsDataURL(selectedFile);
    }
</script>
@endsection
