<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use DB;
use Auth;

class UserController extends Controller
{

    private $_rules = [
        'name' => ['required', 'string', 'max:255'],
        'surname' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'address' => ['required', 'string', 'max:255'],
        'number' => ['required', 'string'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
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
            'users' => User::get()
        ];

        return view('users.list')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // $data = [
        //     'user' => User::find(Auth::user()->id),
        // ];

        // return view('profile')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        //$this->validate($request, $this->_rules);
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $street = $request->input('street');
        $city = $request->input('city');
        $country = $request->input('country');
        $user->address = implode(",", array($street, $city, $country));

        $user->save();

        $data = [
            'street' => $street,
            'city' => $city,
            'country' => $country,
        ];

        return view('profile')->with('data', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function profile()
    {
        $addr = explode(",", Auth::user()->address);

        $street = $addr[0];
        $city = $addr[1];
        $country = $addr[2];

        $data = [
            'street' => $street,
            'city' => $city,
            'country' => $country,
        ];

        return view('profile')->with('data', $data);
    }
}
