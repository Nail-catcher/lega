<?php

namespace App\Http\Controllers;

use App\Path_eat;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PathEatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $path_eats = Path_eat::paginate(15);
        return view('admin.patheat.index', compact('path_eats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::all();
        return view('admin.patheat.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path_eat = Path_eat::create($request->all()); 
        if($request->categories)  {     
        foreach ($request->categories as $category){
        $path_eat->categories()->attach($category);}}
        return redirect()->route('path_eat');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Path_eat  $path_eat
     * @return \Illuminate\Http\Response
     */
    public function show(Path_eat $path_eat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Path_eat  $path_eat
     * @return \Illuminate\Http\Response
     */
    public function edit(Path_eat $path_eat)
    {
       return view('admin.patheat.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Path_eat  $path_eat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Path_eat $path_eat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Path_eat  $path_eat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Path_eat $path_eat)
    {
        //
    }
}
