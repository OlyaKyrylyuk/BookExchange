<?php


namespace App\Services;


use App\Models\Book;
use App\Models\Exchange;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BookService
{
    public function saveBook($input, $genres, bool $hasFile, $name, $photo)
    {
        $input['user_id'] = Auth::user()->id;
        $input['genre_id'] = $genres;
        $input['slug'] = Str::slug($name, '-');
        $newPhotoName = "";
        if($hasFile) {
            $newPhotoName = time() . '-' . $name . "." . $photo->extension();
            $photo->move(public_path('images/books'), $newPhotoName);
        }

        $input['photo'] =  $newPhotoName;
        Book::create($input);
    }
    public function sendRequest($slug)
    {
        $current_user = $user = auth()->user();
        $book_request = Book::with('user')->where('slug', $slug)->get();

        Exchange::create([
            'user1_id' => $current_user->id,
            'user2_id' => $book_request[0]->user->id,
            'book1_id' => $book_request[0]->id,
                             ]);

    }
    public function showOneBook($slug)
    {
        $current_user = $user = auth()->user();
        $book = Book::with('user')->where('slug',$slug)->first();

        $exchange = Exchange::with(
            ['book' => function($q) use ($book){
                $q->where('id', $book->id);
            }
            ],
            ['user' => function($q) use ($current_user){
                $q->where('id', $current_user->id );
            }
            ])->where('user1_id', $current_user->id)
            ->get();

//        $exchange = Book::with(['exchanges', 'user'=>function($q) use ($current_user){
//                $q->where('id', $current_user->id );
//            }])->get();
//        dd($exchange);
        return [$book, $current_user, $exchange];
    }

}
