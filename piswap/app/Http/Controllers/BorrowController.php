<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Datetime;
use \DateInterval;
use App\Borrow;
use App\Reservations;
use App\Book;
use App\User;
use Auth;
use Validator;

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

    public function countFine($data) {
        $fine[0] = 0;
        foreach($data['borrows'] as $key) {
            $now = time();
            $your_date = strtotime($key['date_to']);
            $datediff = $now - $your_date;
            $datediff = round($datediff / (60 * 60 * 24));
            if ($datediff > 0) {
                $fine[$key['id']] = $datediff;
            } else {
                $fine[$key['id']] = 0;
            }
        }
        return $fine;
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
        $fine = $this->countFine($data);
        return view('borrows.list')->with('data', $data)->with('fine', $fine);
    }

    public function userindex()
    {
        $user = Auth::user();

        $borrows = Borrow::where('user_email', 'like', $user['email'])->get();
        $data = [
            'borrows' => $borrows
        ];

        $reservations = Reservations::where('user_email', 'like', $user['email'])->get();
        $datares = [
            'reservations' => $reservations
        ];
        $fine = $this->countFine($data);
        return view('borrows.listuser')->with('data', $data)->with('fine', $fine)->with('reservations', $datares);
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
        $validator = Validator::make($request->all(), $this->_rules);

        $book = Book::find($request->input('isbn'));  
        $quantity = $book['quantity'];      
        if($quantity <= 0)
        {
            $validator->getMessageBag()->add('quantity', 'Book is not currently on stock.');
            return redirect('/borrows/create')->withErrors($validator)->withInput();
        }

        if ($validator->fails()) {
            return redirect('/borrows/create')->withErrors($validator)->withInput();
        }

        $borrow = new Borrow();
        $borrow->date_from = (new DateTime('now'))->format('Y-m-d H:i:s');
        $borrow->date_to = (new DateTime('now'))->add(new DateInterval('P30D'))->format('Y-m-d H:i:s');

        $user = User::find($request->input('reader'));
        $borrow->user()->associate($user);   
        $book['quantity'] = $quantity - 1;
        $book->save();
        $borrow->book()->associate($book);
        $borrow->save();

        $data = [
            'borrows' => Borrow::get()
        ];
        $fine = $this->countFine($data);
        return view('borrows.list')->with('data', $data)->with('fine', $fine);
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
        $fine = $this->countFine($data);
        return view('borrows.list')->with('data', $data)->with('fine', $fine);
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
        $validator = Validator::make($request->all(), $this->_rules);
        if ($validator->fails()) {
            return redirect('/borrows')->withErrors($validator)->withInput();
        }

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

        $fine = $this->countFine($data);
        return view('borrows.list')->with('data', $data)->with('fine', $fine);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $borrow = Borrow::find($id);
        // increment the quantity of this book available
        $book = Book::find($borrow['book_isbn']);
        $quantity = $book['quantity'];
        $book['quantity'] = $quantity + 1;
        $book->save();
        // destroy the borrow
        Borrow::destroy($id);
        $data = [
            'borrows' => Borrow::get(),
        ];
        // TODO quantity + 1
        $fine = $this->countFine($data);
        return view('borrows.list')->with('data', $data)->with('fine', $fine);
    }

    public function askDelete($id)
    {
        return view('borrows.ask-delete')->with('borrow', Borrow::find($id));
    }

    public function returnBookForm($id)
    {
        $borrow = Borrow::find($id);

        $now = time();
        $your_date = strtotime($borrow['date_to']);
        $datediff = $now - $your_date;
        $datediff = round($datediff / (60 * 60 * 24));
        if ($datediff > 0) {
            // Fine! Where is the money Lebowsky
            $fine = $datediff;
            return view('borrows.return')->with('borrow', $borrow)->with('fine', $fine);
        } else {
            $borrow = Borrow::find($id);
            // increment the quantity of this book available
            $book = Book::find($borrow['book_isbn']);
            $quantity = $book['quantity'];
            $book['quantity'] = $quantity + 1;
            $book->save();
            // destroy the borrow
            Borrow::destroy($id);
            $data = [
                'borrows' => Borrow::get(),
            ];
            $fine = $this->countFine($data);
            return view('borrows.list')->with('data', $data)->with('fine', $fine);
        }
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
        $fine = $this->countFine($data);
        return view('borrows.list')->with('data', $data)->with('fine', $fine);

    }
    public function userprolong($id)
    {
        $borrow = Borrow::find($id);
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        $date = new DateTime($borrow->date_to);
        $date->add(new DateInterval('P1M'));
        $borrow->date_to = $date;
        $borrow->save();

        $user = Auth::user();

        $borrows = Borrow::where('user_email', 'like', $user['email'])->get();
        $data = [
            'borrows' => $borrows
        ];

        $reservations = Reservations::where('user_email', 'like', $user['email'])->get();
        $datares = [
            'reservations' => $reservations
        ];
        $fine = $this->countFine($data);
        return view('borrows.listuser')->with('data', $data)->with('fine', $fine)->with('reservations', $datares);
    }
}
