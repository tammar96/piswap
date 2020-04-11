<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Datetime;
use App\Reservation;
use App\Book;
use App\User;

class ReservationController extends Controller
{
    private $_rules = [
        'date' => ['required', 'date_format:Y-m-d H:i:s|nullable'],
        'user_id' => ['required', 'exists:users,email'],
        'book_id' => ['required', 'exists:books,isbn']
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $user = User::find($request->input('user_id'));
        $reservation->user()->associate($user);
        $book = Book::find($request->input('book_id'));
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
        $this->validate($request, ['book_id' => ['required', 'exists:books,isbn']]);

        $reservation = new Reservation();
        $reservation->date = date("Y-m-d");
        $user = User::find(auth()->user()->id);
        $reservation->user()->associate($user);
        $book = Book::find($request->input('book_id'));
        $reservation->book()->associate($book);
        $reservation->save();

        $data = [
            'reservation' => $reservation
        ];

        return response()->json($data);
    }

    public function showAPI($id)
    {
        $data = [
            'reservation' => Reservation::find($id)
        ];

        return response()->json($data);
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
        $user = User::find($request->input('user_id'));
        $reservation->user()->associate($user);
        $book = Book::find($request->input('book_id'));
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
        Reservation::destroy($id);
        $data = [
            'reservations' => Reservation::get()
        ];

        //return view('reservations.show')->with('data', $data);
    }

    public function askDelete($id)
    {
        // return view('reservations.ask-delete')->with('reservation', Reservation::find($id));
    }
}
