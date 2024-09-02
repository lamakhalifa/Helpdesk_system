<?php

namespace App\Http\Controllers;

use App\Category;
//use App\Ticket;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if((Auth::user()->role == 'customer') ){
            return abort(403);
        }else{
            $categories = Category::all();
            return view('categories.index', compact('categories'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if((Auth::user()->role == 'customer') ){
            return abort(403);
        }else
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
        if((Auth::user()->role == 'customer') ){
            return abort(403);
        } else {
            //validate input
            $request->validate([
                'title' => 'required|max:50'
            ]);
            // create new category after validate input
            Category::create([
                'title' => $request->title
            ]);
            return redirect()->route('category.index');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        if((Auth::user()->role == 'customer') ){
            return abort(403);
        }else{
            $categories = Category::find($category->id);
            return view('categories.update', compact('categories'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if((Auth::user()->role == 'customer') ){
            return abort(403);
        }else{
            //validate input
            $request->validate([
                'title' => 'required|max:50'
            ]);
            // update category title
            $category = Category::find($category->id);
            $category->update([
                'title' => $request->title
            ]);
            return redirect()->route('category.index')->with('success', 'Category updated successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');
    }
}
