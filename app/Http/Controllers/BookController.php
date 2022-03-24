<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Book;
use App\Models\Exchange;
use App\Models\User;
use App\Services\BookService;
use Illuminate\Http\Request;
use App\Events\SuccessExchange;

class BookController extends Controller
{
    private $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }
    public function home()
    {
        $user = auth()->user();
        $books = Book::with(['genre', 'user'])->where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        return view('home', ['books'=>$books]);
    }
    public function index(){
        $books = Book::with(['genre', 'user'])->orderBy('created_at', 'desc')->get();
        return view('books.index', ['books'=>$books]);
    }
    public function show($slug)
    {
       $data =  $this->bookService->showOneBook($slug);
       $book = $data[0];
        $current_user = $data[1];
        $exchange = $data[2];
        return view('/books/single_book',['book'=>$book, 'current_user'=>$current_user, 'exchange'=> $exchange]);
    }
    public function create(){
        $genres = Genre::all();
        return view('books.create', ['genres'=>$genres]);
    }
    public function store(Request $request)
    {
        $input = $request->except(['genres']);
        $this->bookService->saveBook($input, $request->genres, $request->hasFile('photo'), $request->name, $request->photo);
        return redirect()->route('books.index');
    }

    public function bookRequest($slug)
    {
        $this->bookService->sendRequest($slug);
        return redirect()->back()->with('message', 'IT WORKS!');
    }

    public function choose_exchange_book($id)
    {

        $exchange = Exchange::where('id', $id)->first();
        $user_profile = User::with('books')->where('id', $exchange->user1_id)->get();
        return view('books.choose_exchange_book', ['user_profile'=>$user_profile, 'exchange'=>$exchange]);
    }
    public function accept_exchange_book($id, $book_id)
    {
        $exchange = Exchange::where('id', $id)->first();
        $exchange->book2_id = $book_id;
        $exchange->status = 'success';
        $exchange->save();
        $user_from = User::where('id',$exchange->user1_id)->first();
        $book1 = Book::where('id', $exchange->book1_id);
        $book2 = Book::where('id', $exchange->book2_id);
        event(new SuccessExchange(auth()->user(), $user_from, $book1, $book2));

        return redirect('/home')->with('message', 'Request was sent to user! Wait for the message on your email about applying or declining request!');
    }

    public function welcome()
    {
        $books = Book::with(['genre', 'user'])->orderBy('created_at', 'desc')->get();
        return view('books.welcome', ['books'=>$books]);
    }
}
