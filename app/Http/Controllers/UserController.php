<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function get_profile($slug){
//        $profile = Book::with('users','genre')->get();
//        $profile = User::where('slug', $slug)->with('books')->firstOrFail();
        $profile = User::with(['books' => function($q){
            $q->with('genre');
        }])
            ->where('slug', $slug)
            ->firstOrFail();
        return view('users.profile',['profile'=>$profile]);
    }
}
