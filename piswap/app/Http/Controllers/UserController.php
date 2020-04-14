<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\User;
use App\Borrow;
use DB;
use Auth;

class UserController extends Controller
{

    private $_rules = [
        'name' => ['required', 'string', 'max:255'],
        'surname' => ['required', 'alpha_dash', 'max:255'],
        'email' => ['required', 'email', 'string', 'max:255'],
        // 'password' => ['password:api'],
        'street' => ['required', 'regex:/[A-z0-9\s\/]*/i', 'string', 'max:255'],
        'city' => ['required', 'alpha', 'max:255'],
        'zipcode' => ['required', 'digits:5', 'string'],
        'country' => ['required', 'alpha', 'max:255]'],
    ];


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = Borrow::groupBy('user_email')->select(DB::raw('user_email, COUNT(*) as user_id_count'))->get();
        $borrows=[];
        foreach ($requests as $request) {
            $borrows[$request->user_email] = $request->user_id_count;
        }

        $data = [
            'users' => User::get(),
            'borrows' => $borrows,
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
        $this->validate($request, $this->_rules);

        $user = new User();
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = $request->input('role');

        $street = $request->input('street');
        $city = $request->input('city');
        $country = $request->input('country');
        $zipcode = $request->input('zipcode');
        $user->address = implode(",", array($street, $city, $zipcode));
        $user->save();


        $data = [
            'users' => User::get()
        ];

        return view('users.list')->with('data', $data);
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
        $addr = explode(", ", User::find($id)->address);

        $street = $addr[0];
        $city = $addr[1];
        $zipcode = $addr[2];
        $country = $addr[3];

        $data = [
            'street' => $street,
            'city' => $city,
            'zipcode' => $zipcode,
            'country' => $country,
            'user' => User::find($id),
        ];


        return view('users.edit')->with('data', $data);
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
        $this->validate($request, $this->_rules);

        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $street = $request->input('street');
        $city = $request->input('city');
        $zipcode = $request->input('zipcode');
        $country = $request->input('country');
        $user->address = implode(",", array($street, $city, $zipcode, $country));

        $user->save();

        $data = [
            'street' => $street,
            'city' => $city,
            'zipcode' => $zipcode,
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
    public function destroy($email)
    {
        if ($email != Auth::user()->email) // Delete when it's not the account I am using right now
            User::Destroy($email);

        $data = [
            'users' => User::get()
        ];

        return view('users.list')->with('data', $data);
    }

    public function profile()
    {
        $addr = explode(", ", Auth::user()->address);

        $street = $addr[0];
        $city = $addr[1];
        $zipcode = $addr[2];
        $country = $addr[3];

        $data = [
            'street' => $street,
            'city' => $city,
            'zipcode' => $zipcode,
            'country' => $country,
        ];

        return view('profile')->with('data', $data);
    }

    /**
     * Returns json with current user
     */
    public function getCurrentUserAPI()
    {
        if($user = auth()->user())
        {
            $data = [
                'email' => $user->email
            ];

            return response()->json($data);
        }
    }

    public function updateSomeone(Request $request, $email)
    {
        $user = User::find($email);
        $this->validate($request, $this->_rules);
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $street = $request->input('street');
        $city = $request->input('city');
        $zipcode = $request->input('zipcode');
        $country = $request->input('country');
        $user->address = implode(",", array($street, $city, $zipcode, $country));

        $user->save();

        $data = [
            'users' => User::get()
        ];

        return view('users.list')->with('data', $data);
    }
}
