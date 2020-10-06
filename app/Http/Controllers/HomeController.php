<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class HomeController extends Controller
{
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
        return view('home');
    }
    public function category()
    {
        $categories=Category::all();
        return view('category', compact('categories'));
    }
    public function add_category(Request $request)
    {
        Category::create(['name' => $request->category_name]);
        return redirect()->back();
    }
    public function edit_category(Request $request)
    {
        Category::where('id',$request->id)->update(['name' => $request->category_name]);
        return redirect()->back();
    }
    public function delete_category($id)
    {
        Category::find($id)->delete();
        return redirect()->back();
    }
}
