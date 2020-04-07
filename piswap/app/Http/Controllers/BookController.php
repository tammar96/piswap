<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Book;
use DB;
class BookController extends Controller
{
    private $_rules = [
        'isbn' => ['required', 'digits:16', 'unique:books'],
        'title' => ['required', 'string', 'max:255'],
        'author' =>  ['required', 'string', 'max:64'],
        'publisher' => ['required', 'string', 'max:64'],
        'date' => ['required', 'date'],
        'bond' => ['nullable', 'string'],
        'numberOfPages' => ['nullable', 'digits:6'],
        'description' => ['required', 'string'],
        'department' => ['nullable', 'string'],
        'genre' => ['required', 'string'],
        'rack' => ['optional', 'digits:4'],
        'language' => ['required', 'string', 'max:64']
    ];  

    public function __construct()
    {   
        $this->middleware('auth'); // TODO use another middleware
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = DB::select('select * from books');
        // return view('books',['books'=>$books]);
        return response()->json([
            'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->_rules);

        $book = new Book();
        $book->isbn = $request->input('isbn');
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->publisher = $request->input('publisher');
        $book->date = $request->input('date');
        $book->bond = $request->input('bond');
        $book->numberOfPages = $request->input('numberOfPages');
        $book->description = $request->input('description');
        $book->department = $request->input('department');
        $book->genre = $request->input('genre');
        $book->rack = $request->input('rack');
        $book->language = $request->input('language');

        $book->save();

        $data = [
            'book' => $book
        ];

        // return view('books.show')->with('data', $data); TODO frontend
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'book' => Book::find($id)
        ];

        // return view('books.details')->with('data', $data); TODO frontend
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'book' => Book::find($id),
        ];

        // return view('books.edit')->with('data', $data); TODO frontend
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $book = Book::find($id);
        $this->validate($request, $this->_rules);

        $book->isbn = $request->input('isbn');
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->publisher = $request->input('publisher');
        $book->date = $request->input('date');
        $book->bond = $request->input('bond');
        $book->numberOfPages = $request->input('numberOfPages');
        $book->description = $request->input('description');
        $book->department = $request->input('department');
        $book->genre = $request->input('genre');
        $book->rack = $request->input('rack');
        $book->language = $request->input('language');
        
        $book->save();

        $data = [
            'books' => Book::get()
        ];

        // return view('books.show')->with('data', $data); TODO frontend
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id                                                                                                                                                                       
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::destroy($id);
        $data = [
            'books' => Book::get(),
        ];

        // return view('books.show')->with('data', $data); TODO frontend
    }

    public function askDelete($id)
    {
        return view('books.ask-delete')->with('book', Book::find($id));
    }
}
