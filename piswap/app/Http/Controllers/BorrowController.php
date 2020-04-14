<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Datetime;
use \DateInterval;
use App\Borrow;
use App\Book;
use App\User;

class BorrowController extends Controller
{
    private $_rules = [
        'id' => ['optional', 'digits:4'],
        //'date_from' => ['required', 'date_format:Y-m-d H:i:s|nullable'],
        //'date_to' => ['required', 'date_format:Y-m-d H:i:s|nullable'],
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
        $count = 1;
        foreach($data['borrows'] as $key) {
            $now = time();
            $your_date = strtotime($key['date_to']);
            $datediff = $now - $your_date;
            $datediff = round($datediff / (60 * 60 * 24));
            if ($datediff > 0) {
                $fine[$count] = ($datediff);
            } else {
                $fine[$count] = 0;
            }
            $count = $count + 1;
        }
        return view('borrows.list')->with('data', $data)->with('fine', $fine);
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
        $borrow->date_from = (new DateTime('now'))->format('Y-m-d H:i:s');
        $borrow->date_to = (new DateTime('now'))->add(new DateInterval('P30D'))->format('Y-m-d H:i:s');

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

    public function prolong($id)
    {
        $borrow = Borrow::find($id);
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        $date = new DateTime($borrow->date_to);
        $date->add(new DateInterval('P1M'));
        $borrow->date_to = $date;
        $borrow->save();

        $data = [
            'borrows' => Borrow::get(),
        ];

        return view('borrows.list')->with('data', $data);

    }
}
