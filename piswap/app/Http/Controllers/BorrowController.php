<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Datetime;
use App\Borrow;
use App\Book;
use App\User;

class BorrowController extends Controller
{
    private $_rules = [
        'id' => ['optional', 'digits:4'],
        //'date' => ['required', 'date_format:Y-m-d H:i:s|nullable'],
        'reader' => ['exists:users,email'],
        'isbn' => ['exists:books,isbn']
    ];

    public function __contruct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [
            'borrows' => Borrow::get()
        ];

        return view('borrows.list')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'users' => User::get(),
            'books' => Book::where('quantity', '>', 0)->get()
        ];
        return view('borrows.create')->with('data', $data);
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

        $borrow = new Borrow();
        $borrow->date = (new DateTime('now'))->format('Y-m-d H:i:s');

        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        $out->writeln($request->input('isbn'));
        $out->writeln($request->input('reader'));
        $user = User::find($request->input('reader'));
        $borrow->user()->associate($user);
        $book = Book::find($request->input('isbn'));
        $borrow->book()->associate($book);
        $borrow->save();

        $data = [
            'borrows' => Borrow::get()
        ];

        return view('borrows.list')->with('data', $data);
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
            'borrow' => Borrow::find($id)
        ];

        return view('borrows.show')->with('data', $data);
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
            'borrows' => Borrow::find($id)
        ];

        return view('borrows.edit')->with('data', $data);
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
        $this->validate($request, $this->_rules);
        $borrow = Borrow::find($id);

        $borrow->date = $request->input('date');
        $user = User::find($request->input('user_email'));
        $borrow->user()->associate($user);
        $book = User::find($request->input('book_isbn'));
        $borrow->book()->associate($book);
        $borrow->save();

        $data = [
            'borrows' => Borrow::get()
        ];

        return view('borrows.show')->with('data', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Borrow::destroy($id);
        $data = [
            'borrows' => Borrow::get(),
        ];

        return view('borrows.list')->with('data', $data);
    }

    public function askDelete($id)
    {
        return view('borrows.ask-delete')->with('borrow', Borrow::find($id));
    }

    public function returnBookForm()
    {
        return view('borrows.return');
    }
}
