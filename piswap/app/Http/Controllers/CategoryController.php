<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    private $_rules = [
        'title' => ['required', 'string'],
        'description' => ['required', 'string']
    ];

    public function __construct()
    {
        $this->middleware('role:librarian')->except([index, show]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'categories' => Category::get()
        ];

        return view('categories.list')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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

        $category = new Category();
        $category->title = $request->input('title');
        $category->description = $request->input('description');
        $category->save();

        $data = [
            'categories' => Category::get()
        ];

        return view('categories.list')->with('data', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
            'category' => Category::find($id)
        ];

        return view('categories.edit')->with('data', $data);
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

        $category = Category::find($id);
        $category->title = $request->input('title');
        $category->description = $request->input('description');
        $category->save();

        $data = [
            'categories' => Category::get()
        ];

        return view('categories.list')->with('data', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('categories');
    }

    public function askDelete($id)
    {
        $data = [
            'category' => Category::find($id)
        ];

        return view('categories.ask-delete')->with('data', $data);
    }
}
