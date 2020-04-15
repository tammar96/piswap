<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Book;
use DB;
class BookController extends Controller
{
    private $_rules = [
        'isbn' => ['required','unique:books'],
        'title' => ['required', 'string', 'max:255'],
        'author' =>  ['required', 'string', 'max:64'],
        'publisher' => ['required', 'string', 'max:64'],
        'date' => ['required', 'date_format:Y-m-d'],
        'bond' => ['nullable', 'string'],
        'numberOfPages' => ['nullable'],
        'description' => ['required', 'string'],
        'department' => ['nullable', 'string'],
        'genre' => ['required', 'string'],
        'quantity' => ['required', 'string'],
        'rack' => ['optional'],
        'language' => ['required', 'string', 'max:64']
    ];

    public function __construct()
    {
        $this->middleware('role:librarian')->except(['index', 'listAPI', 'showAPI']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'books' => Book::get()
        ];

        return view('books.list')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.add');
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
        $book->quantity = $request->input('quantity');
        $book->rack = $request->input('rack');
        $book->language = $request->input('language');

        $book->save();

        $data = [
            'books' => Book::get()
        ];

        return view('books.list')->with('data', $data);
    }

    public function listAPI(Request $request)
    {
        $url = $request->fullUrl();
        $parsed = parse_url($url);
        // If there is filter selected make it happen, otherwise show all
        if (isset($parsed['query'])) {
            // Parse URI
            parse_str($parsed['query'], $filtratedArray);
            // Get the fields we expect
            $text = isset($filtratedArray['text']) ? $filtratedArray['text'] : "";
            $year = isset($filtratedArray['year']) ? "AND YEAR(date)=" . $filtratedArray['year'] : "";
            $availability = isset($filtratedArray['available']) ? $filtratedArray['available'] : 0;
            // Edit the text in form the SQL expects
            $textParsed = "'%" . $text . "%'";
            // Prepare the query
            $query = "SELECT * FROM `books` WHERE (isbn LIKE " . $textParsed . " OR title LIKE " . $textParsed . " OR publisher LIKE " . $textParsed . "OR genre LIKE " . $textParsed . ")" . $year . " AND quantity>=" . $availability;
            // Call the query
            $books = DB::select($query);
        } else {
            $query = "SELECT * FROM `books`";
            $books = DB::select($query);
        }
        return response()->json([
            'books' => $books
        ]);
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAPI($id)
    {
        $data = [
            'book' => Book::find($id)
        ];
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($isbn)
    {
        $data = [
            'book' => Book::find($isbn),
        ];

        return view('books.edit')->with('data', $data);
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
        $book->quantity = $request->input('quantity');
        $book->rack = $request->input('rack');
        $book->language = $request->input('language');

        $book->save();

        $data = [
            'books' => Book::get()
        ];

        return view('books.list')->with('data', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($isbn)
    {
        Book::destroy($isbn);
        $data = [
            'books' => Book::get(),
        ];

        return view('books.list')->with('data', $data);
    }

    public function askDelete($id)
    {
        $data =[
            'book' => Book::find($id)
        ];
        return view('books.ask-delete')->with('data', $data);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        $data = [];
        return view('books.search')->with('data', $data);
    }

}
