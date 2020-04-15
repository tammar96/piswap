<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Datetime;
use \DateInterval;
use App\Reservations;
use App\Book;
use App\User;
use App\Borrow;

class ReservationController extends Controller
{
    private $_rules = [
        'date' => ['required', 'date_format:Y-m-d H:i:s|nullable'],
        'user_email' => ['required', 'exists:users,email'],
        'book_isbn' => ['required', 'exists:books,isbn']
    ];

    public function __construct()
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
            'reservations' => Reservations::get()
        ];
        foreach($data['reservations'] as $key) {
            $now = time();
            $your_date = strtotime($key['date']);
            $datediff = $now - $your_date;
            $datediff = round($datediff / (60 * 60 * 24));
            if ($datediff > 7) {
                Reservations::destroy($key['id']);
            }
        }
        return view('reservations.list')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'user_email' => User::get(),
            'book_isbn' => Book::get(),
            'date' => (new DateTime('now'))->format('Y-m-d H:i:s')
        ];
        return view('reservations.create')->with('data', $data);
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

        $reservation = new Reservation();
        $reservation->date = $request->input('date');
        $user = User::find($request->input('user_email'));
        $reservation->user()->associate($user);
        $book = Book::find($request->input('book_isbn'));
        $reservation->book()->associate($book);
        $reservation->save();

        $data = [
            'reservation' => $reservation
        ];

        // return view('reservations.show')->with('data', $data);
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
            'reservation' => Reservation::find($id)
        ];

        // return view('borrows.details')->with('data', $data);
    }

    public function storeAPI(Request $request)
    {
        $this->validate($request, ['book_isbn' => ['required', 'exists:books,isbn']]);

        $reservation = new Reservations();
        $reservation->date = date("Y-m-d");
        $user = User::find(auth()->user()->email);
        $reservation->user()->associate($user);
        $book = Book::find($request->input('book_isbn'));
        $reservation->book()->associate($book);
        $reservation->save();

        $data = [
            'reservation' => $reservation
        ];

        return response()->json($data);
    }

    public function showAPI($isbn)
    {
        $reservation = Reservations::where('user_email', '=', auth()->user()->email)->where('book_isbn', '=', $isbn)->first();
        $data = [
            'reservation' => $reservation
        ];

        return response()->json($data);
    }

    public function destroyAPI($id)
    {
        Reservation::destroy($id);
        $data = [
            'reservations' => Reservation::get()
        ];
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
            'reservation' => Reservation::find($id)
        ];

        // return view('reservations.edit')->with('data', $data);
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

        $reservation = Reservation::find($id);
        $reservation->date = $request->input('date');
        $user = User::find($request->input('user_email'));
        $reservation->user()->associate($user);
        $book = Book::find($request->input('book_isbn'));
        $reservation->book()->associate($book);
        $reservation->save();

        $data = [
            'reservation' => $reservation
        ];

        // return view('reservations.show')->with('data', $data);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Reservations::destroy($id);
        $data = [
            'reservations' => Reservations::get()
        ];
        return view('reservations.list')->with('data', $data);
    }

    public function approve($id)
    {
        $reservation = Reservations::find($id);
        $user = User::find($reservation['user_email']);
        $book = Book::find($reservation['book_isbn']);

        $borrow = new Borrow();
        $borrow->date_from = (new DateTime('now'))->format('Y-m-d H:i:s');
        $borrow->date_to = (new DateTime('now'))->add(new DateInterval('P30D'))->format('Y-m-d H:i:s');
        $borrow->user()->associate($user);
        $borrow->book()->associate($book);
        $borrow->save();

        Reservations::destroy($id);
        $data = [
            'reservations' => Reservations::get()
        ];
        return view('reservations.list')->with('data', $data);
    }

    public function askDelete($id)
    {
        // return view('reservations.ask-delete')->with('reservation', Reservation::find($id));
    }
}
