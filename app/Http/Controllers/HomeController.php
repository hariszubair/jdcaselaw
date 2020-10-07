<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Statute;
use App\Models\Forum;
use App\Models\Punishment;
use Illuminate\Support\Facades\Auth;

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
    public function statute()
    {
        $statutes=Statute::all();
        return view('statute', compact('statutes'));
    }
    public function add_statute(Request $request)
    {
        Statute::create(['name' => $request->statute_name]);
        return redirect()->back();
    }
    public function edit_statute(Request $request)
    {
        Statute::where('id',$request->id)->update(['name' => $request->statute_name]);
        return redirect()->back();
    }
    public function delete_statute($id)
    {
        Statute::find($id)->delete();
        return redirect()->back();
    }
    public function forum()
    {
        $forums=Forum::all();
        return view('forum', compact('forums'));
    }
    public function add_forum(Request $request)
    {
        Forum::create(['name' => $request->forum_name]);
        return redirect()->back();
    }
    public function edit_forum(Request $request)
    {
        Forum::where('id',$request->id)->update(['name' => $request->forum_name]);
        return redirect()->back();
    }
    public function delete_forum($id)
    {
        Forum::find($id)->delete();
        return redirect()->back();
    }
    public function punishment()
    {
        $punishments=Punishment::all();
        return view('punishment', compact('punishments'));
    }
    public function add_punishment(Request $request)
    {
        Punishment::create(['name' => $request->punishment_name]);
        return redirect()->back();
    }
    public function edit_punishment(Request $request)
    {
        Punishment::where('id',$request->id)->update(['name' => $request->punishment_name]);
        return redirect()->back();
    }
    public function delete_punishment($id)
    {
        Punishment::find($id)->delete();
        return redirect()->back();
    }
}
