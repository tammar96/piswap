<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProfileController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('profile');
    }

    public function show()
    {
        if($user = auth()->user())
        {

            $addr = explode(",", $user->address);

            $street = $addr[0];
            $city = $addr[1];
            $country = $addr[2];

            $data = [
                'data' => $user,
                'street' => $street,
                'city' => $city,
                'country' => $country,
            ];


        return view('profile')->with('data', $data);
        }
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

        if($user = auth()->user())
        {

            $addr = explode(",", $user->address);

            $street = $addr[0];
            $city = $addr[1];
            $country = $addr[2];

            $data = [
                'data' => $user,
                'street' => $street,
                'city' => $city,
                'country' => $country,
            ];


        return view('profile')->with('data', $data);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // fixme store

        if($user = auth()->user())
        {

            $addr = explode(",", $user->address);

            $street = $addr[0];
            $city = $addr[1];
            $country = $addr[2];

            $data = [
                'data' => $user,
                'street' => $street,
                'city' => $city,
                'country' => $country,
            ];


        return view('profile')->with('data', $data);
        }
    }
}
