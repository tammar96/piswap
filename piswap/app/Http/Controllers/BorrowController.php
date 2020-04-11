<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Datetime;
use App\Borrow;
use App\Book;

class BorrowController extends Controller
{
    private $_rules = [
        'id' => ['optional', 'digits:4'],
        'date' => ['required', 'date_format:Y-m-d H:i:s|nullable'],
        'user_id' => ['exists:users,email']
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
            'borrow' => Book::get()
        ];

        return view('borrows.show')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('borrows.add');
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
        $borrow->date = $request->input('date');

        $user = User::find($request->input('user_id'));
        $borrow->user()->associate($user);
        $borrow->save();

        $data = [
            'borrow' => $borrow
        ];

        return view('borrows.show')->with('data', $data); // TODO frontend
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

        // return view('borrows.show')->with('data', $data); // TODO frontend
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
            'borrow' => Borrow::find($id)
        ];

        // return view('borrows.edit')->with('data', $data); // TODO frontend
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
        $borrow = Borrow::find($id);
        $this->validate($request, $this->_rules);

        $borrow->date = $request->input('date');
        $user = User::find($id);
        $borrow->user()->associate($user);
        $borrow->save();

        $data = [
            'borrows' => Borrow::get()
        ];

        return view('borrows.show')->with('data', $data); // TODO frontend
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

        return view('borrows.show')->with('data', $data); // TODO frontend
    }

    public function askDelete($id)
    {
        // return view('borrows.ask-delete')->with('borrow', Borrow::find($id)); // TODO frontend
    }
}
